<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Cashbox;
use App\Models\Company;
use App\Models\Counterparty;
use App\Models\MeasureType;
use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\SellProduct;
use App\Models\SellProductGroup;
use App\Models\Shop;
use App\Models\Storage;
use App\Models\User;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CashboxControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $base_route = '/api/cashbox/';
    private $table = 'cashboxes';

    /**
     * @var User
     */
    private $user;

    /**
     * @var User
     */
    private $admin;
    private $base_measure_type_volume;
    private $base_measure_type_weight;
    private $base_measure_type_quantity;

    public function setUp(): void
    {
        parent::setUp();
        $this->setUpFaker();

        $this->seed(RolesPermissionsSeeder::class);
        $company = Company::factory()->create();

        $this->base_measure_type_volume = BaseMeasureType::create(['type' => '_volume', 'name' => 'мл']);
        $this->base_measure_type_weight = BaseMeasureType::create(['type' => '_weight', 'name' => 'г']);
        $this->base_measure_type_quantity = BaseMeasureType::create(['type' => '_quantity', 'name' => 'шт']);

        Company::factory()->create();

        MeasureType::factory()->create([
            'base_measure_type_id' => $this->base_measure_type_volume->id,
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->randomElement([10, 100, 1000, 10000]),
            'company_id' => Company::inRandomOrder()->get()->first()->id,
            'is_common' => $this->faker->boolean(35),
        ]);
        MeasureType::factory()->create([
            'base_measure_type_id' => $this->base_measure_type_weight->id,
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->randomElement([10, 100, 1000, 10000]),
            'company_id' => Company::inRandomOrder()->get()->first()->id,
            'is_common' => $this->faker->boolean(35),
        ]);
        MeasureType::factory()->create([
            'base_measure_type_id' => $this->base_measure_type_quantity->id,
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->randomElement([10, 100, 1000, 10000]),
            'company_id' => Company::inRandomOrder()->get()->first()->id,
            'is_common' => $this->faker->boolean(35),
        ]);

        Shop::factory()->create(['company_id' => $company->id]);
        ProductType::factory(10)->create();
        SellProduct::factory(4)->create();
        SellProductGroup::factory(6)->create();
        $this->user = User::factory()->create();

        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');
    }

    public function test_admin_can_get_all_cashbox_transactions()
    {
        $shop = Shop::factory()->create();
        // create _in _card transactions
        Cashbox::factory()->create(['shop_id' => $shop->id, 'payment_type' => '_card', 'transaction_type' => '_in', 'amount' => 100, 'collected_at' => null]);

        // create _in _cash transactions
        Cashbox::factory()->create(['shop_id' => $shop->id, 'payment_type' => '_cash', 'transaction_type' => '_in', 'amount' => 150, 'collected_at' => null]);
        Cashbox::factory()->create(['shop_id' => $shop->id, 'payment_type' => '_cash', 'transaction_type' => '_in', 'amount' => 550.50, 'collected_at' => null]);

        // create _out _card transactions
        Cashbox::factory()->create(['shop_id' => $shop->id, 'payment_type' => '_card', 'transaction_type' => '_out', 'amount' => 30, 'collected_at' => null]);
        Cashbox::factory()->create(['shop_id' => $shop->id, 'payment_type' => '_card', 'transaction_type' => '_out', 'amount' => 60, 'collected_at' => null]);

        // create _out _cash transactions
        Cashbox::factory()->create(['shop_id' => $shop->id, 'payment_type' => '_cash', 'transaction_type' => '_out', 'amount' => 10, 'collected_at' => null]);

        $this->withoutExceptionHandling();
        $response = $this->actingAs($this->admin)->getJson($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [],
                'balance' => [
                    'in' => [
                        'sum' => 800.50,
                        'card' => 100,
                        'cash' => 700.50,
                    ],
                    'out' => [
                        'sum' => 100,
                        'card' => 90,
                        'cash' => 10,
                    ],
                    'all' => [
                        'sum' => 700.50,
                        'card' => 10,
                        'cash' => 690.50,
                    ],
                ]
            ]);
        $this->assertCount(6, $response['data']);
    }

    public function test_admin_can_create_cashbox_out_transaction()
    {
        $shop = Shop::factory()->create();
        session()->put('shop_id', $shop->id);
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'shop_id' => $shop->id,
            'transaction_type' => '_out',
            'payment_type' => '_cash',
            'amount' => 100,
            'description' => 'some description',
        ]);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    'shop_id' => $shop->id,
                    'transaction_type' => '_out',
                    'payment_type' => '_cash',
                    'amount' => 100,
                    'description' => 'some description',
                    'operator_id' => $this->admin->id,
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'shop_id' => $shop->id,
            'transaction_type' => '_out',
            'payment_type' => '_cash',
            'amount' => 100,
            'description' => 'some description',
            'operator_id' => $this->admin->id,
        ]);
    }

    public function test_admin_can_create_cashbox_in_transaction()
    {
        $shop = Shop::factory()->create();
        session()->put('shop_id', $shop->id);
        $sell_product = SellProduct::factory()->create();
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'company_id' => $shop->company_id,
            'shop_id' => $shop->id,
            'transaction_type' => '_in',
            'sell_product_id' => $sell_product->id,
            'payment_type' => '_cash',
            'amount' => 200,
            'operator_id' => $this->admin->id,
        ]);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    'shop_id' => $shop->id,
                    'transaction_type' => '_in',
                    'sell_product_id' => $sell_product->id,
                    'payment_type' => '_cash',
                    'amount' => 200,
                    'operator_id' => $this->admin->id,
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'shop_id' => $shop->id,
            'transaction_type' => '_in',
            'sell_product_id' => $sell_product->id,
            'payment_type' => '_cash',
            'amount' => 200,
            'operator_id' => $this->admin->id,
        ]);
    }

    public function test_admin_can_get_cashbox_transaction()
    {
        $shop = Shop::factory()->create();
        $cashbox = Cashbox::factory()->create([
            'transaction_type' => '_out', 'amount' => 111, 'description' => 'my description',
            'shop_id' => $shop->id, 'company_id' => $shop->company_id
        ]);
        $response = $this->actingAs($this->admin)->get($this->base_route . $cashbox->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'transaction_type' => '_out',
                    'sell_products' => [
                        [
                            'amount' => 111,
                            'description' => 'my description'
                        ]
                    ],
                ]
            ]);
    }

    public function test_admin_can_edit_cashbox_transaction()
    {
        $shop = Shop::factory()->create();
        session()->put('shop_id', $shop->id);
        $cashbox = Cashbox::factory()->create([
            'company_id' => $shop->company_id,
            'shop_id' => $shop->id,
            'transaction_type' => Cashbox::TRANSACTION_TYPES['out'],
            'amount' => 333.33
        ]);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route . $cashbox->id, [
            'payment_type' => Cashbox::PAYMENT_TYPES['card']
        ]);
        $response
            ->assertStatus(202)
            ->assertJson([
                'success' => true,
                'data' => [
                    'transaction_type' => Cashbox::TRANSACTION_TYPES['out'],
                    'payment_type' => Cashbox::PAYMENT_TYPES['card']
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'transaction_type' => Cashbox::TRANSACTION_TYPES['out'], 'amount' => $cashbox->amount,
            'payment_type' => Cashbox::PAYMENT_TYPES['card']
        ]);
    }

    public function test_admin_can_delete_cashbox_transaction()
    {
        $shop = Shop::factory()->create();
        session()->put('shop_id', $shop->id);
        $cashbox = Cashbox::create([
            'company_id' => $shop->company_id,
            'shop_id' => $shop->id,
            'sell_product_id' => null,
            'transaction_type' => '_out',
            'payment_type' => '_cash',
            'amount' => 155,
            'description' => null,
            'operator_id' => $this->admin->id,
            'collected_at' => null,
            'collector_id' => null,
        ]);
        $response = $this->actingAs($this->admin)->deleteJson($this->base_route . $cashbox->id);
        $response
            ->assertStatus(202)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertSoftDeleted($this->table, ['id' => $cashbox->id]);
    }

    public function test_operator_can_sell_many_products()
    {
        $company = Company::factory()->create();
        $this->admin->update(['company_id' => $company->id]);

        // create shop
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $counterparty = Counterparty::factory()->create(['company_id' => $shop->company_id]);
        session()->put('shop_id', $shop->id);
        $storage = Storage::factory()->create(['company_id' => $company->id, 'shop_id' => $shop->id]);

        // create product types with purchases
        $product_type1 = ProductType::factory()->create(['company_id' => $shop->company_id, 'type' => '_imperishable']);
        ProductPurchase::factory()->create([
            'product_type_id' => $product_type1->id, 'quantity' => 1000, 'current_quantity' => 1000, 'storage_id' => $storage->id,
            'user_id' => $this->admin->id, 'counterparty_id' => $counterparty->id
        ]);

        $product_type2 = ProductType::factory()->create(['company_id' => $shop->company_id, 'type' => '_imperishable']);
        ProductPurchase::factory()->create([
            'product_type_id' => $product_type2->id, 'quantity' => 2500, 'current_quantity' => 2500, 'storage_id' => $storage->id,
            'user_id' => $this->admin->id, 'counterparty_id' => $counterparty->id
        ]);

        $product_type3 = ProductType::factory()->create(['company_id' => $shop->company_id, 'type' => '_imperishable']);
        ProductPurchase::factory()->create([
            'product_type_id' => $product_type3->id, 'quantity' => 1700, 'current_quantity' => 1700, 'storage_id' => $storage->id,
            'user_id' => $this->admin->id, 'counterparty_id' => $counterparty->id
        ]);

        $product_type4 = ProductType::factory()->create(['company_id' => $shop->company_id, 'type' => '_imperishable']);
        ProductPurchase::factory()->create([
            'product_type_id' => $product_type4->id, 'quantity' => 1000, 'current_quantity' => 1000, 'storage_id' => $storage->id,
            'user_id' => $this->admin->id, 'counterparty_id' => $counterparty->id
        ]);
        ProductPurchase::factory()->create([
            'product_type_id' => $product_type4->id, 'quantity' => 1000, 'current_quantity' => 1000, 'storage_id' => $storage->id,
            'user_id' => $this->admin->id, 'counterparty_id' => $counterparty->id
        ]);


        // create sell products (with related product types)
        $sell_product1 = SellProduct::factory()->create(['company_id' => $shop->company_id]);
        DB::table('sell_product_product_type')->insert([
            'product_type_id' => $product_type1->id, 'sell_product_id' => $sell_product1->id, 'quantity' => 100
        ]);
        DB::table('sell_product_product_type')->insert([
            'product_type_id' => $product_type2->id, 'sell_product_id' => $sell_product1->id, 'quantity' => 200
        ]);

        $sell_product2 = SellProduct::factory()->create(['company_id' => $shop->company_id]);
        DB::table('sell_product_product_type')->insert([
            'product_type_id' => $product_type1->id, 'sell_product_id' => $sell_product2->id, 'quantity' => 100
        ]);
        DB::table('sell_product_product_type')->insert([
            'product_type_id' => $product_type3->id, 'sell_product_id' => $sell_product2->id, 'quantity' => 100
        ]);
        DB::table('sell_product_product_type')->insert([
            'product_type_id' => $product_type4->id, 'sell_product_id' => $sell_product2->id, 'quantity' => 100
        ]);

        $sell_product3 = SellProduct::factory()->create(['company_id' => $shop->company_id]);
        DB::table('sell_product_product_type')->insert([
            'product_type_id' => $product_type4->id, 'sell_product_id' => $sell_product3->id, 'quantity' => 500
        ]);

        // create sell product groups (with related sell products)
        $sell_product_group1 = SellProductGroup::factory()->create(['company_id' => $shop->company_id]);
        DB::table('sell_product_product_group')->insert([
            'sell_product_group_id' => $sell_product_group1->id, 'sell_product_id' => $sell_product2->id, 'price' => 110
        ]);
        DB::table('sell_product_product_group')->insert([
            'sell_product_group_id' => $sell_product_group1->id, 'sell_product_id' => $sell_product3->id, 'price' => 110
        ]);
        DB::table('sell_product_product_group')->insert([
            'sell_product_group_id' => $sell_product_group1->id, 'sell_product_id' => $sell_product3->id, 'price' => 110
        ]);


        // product_type1: 1000 - 200
        // product_type2: 2500 - 200
        // product_type3: 1700 - 100
        // product_type4: (1000 + 1000) - 1100
        $this->user->syncPermissions(['Cashbox_create']);
        $response = $this->actingAs($this->user)->postJson($this->base_route . 'mass_create', [
            'shop_id' => $shop->id,
            'transaction_type' => '_in',
            'payment_type' => '_cash',
            'amount' => 545,
            'sell_products' => [
                [
                    'sell_product_id' => $sell_product1->id,
                    'amount' => 200,
                    'product_types' => [
                        ['id' => $product_type1->id, 'quantity' => 100, 'type' => $product_type1->type],
                        ['id' => $product_type2->id, 'quantity' => 200, 'type' => $product_type2->type]
                    ]
                ],
                [
                    'sell_product_id' => $sell_product2->id,
                    'amount' => 110,
                    'product_types' => [
                        ['id' => $product_type1->id, 'quantity' => 100, 'type' => $product_type1->type],
                        ['id' => $product_type3->id, 'quantity' => 100, 'type' => $product_type3->type],
                        ['id' => $product_type4->id, 'quantity' => 100, 'type' => $product_type4->type],
                    ]
                ],
                [
                    'sell_product_id' => $sell_product3->id,
                    'amount' => 110,
                    'product_types' => [
                        ['id' => $product_type4->id, 'quantity' => 500, 'type' => $product_type4->type],
                    ]
                ],
                [
                    'sell_product_id' => $sell_product3->id,
                    'amount' => 115,
                    'product_types' => [
                        ['id' => $product_type4->id, 'quantity' => 500, 'type' => $product_type3->type],
                    ]
                ],
            ],
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas($this->table, [
            'shop_id' => $shop->id,
            'transaction_type' => '_in',
            'sell_product_id' => $sell_product1->id,
            'payment_type' => '_cash',
            'amount' => 200,
            'operator_id' => $this->user->id,
        ]);
        $this->assertDatabaseHas($this->table, [
            'shop_id' => $shop->id,
            'transaction_type' => '_in',
            'sell_product_id' => $sell_product2->id,
            'payment_type' => '_cash',
            'amount' => 110,
            'operator_id' => $this->user->id,
        ]);
        $this->assertDatabaseHas($this->table, [
            'shop_id' => $shop->id,
            'transaction_type' => '_in',
            'sell_product_id' => $sell_product3->id,
            'payment_type' => '_cash',
            'amount' => 110,
            'operator_id' => $this->user->id,
        ]);
        $this->assertDatabaseHas($this->table, [
            'shop_id' => $shop->id,
            'transaction_type' => '_in',
            'sell_product_id' => $sell_product3->id,
            'payment_type' => '_cash',
            'amount' => 115,
            'operator_id' => $this->user->id,
        ]);

        $this->assertDatabaseHas('product_purchases', [
            'product_type_id' => $product_type1->id,
            'current_quantity' => 800,
        ]);
        $this->assertDatabaseHas('product_purchases', [
            'product_type_id' => $product_type2->id,
            'current_quantity' => 2300,
        ]);
        $this->assertDatabaseHas('product_purchases', [
            'product_type_id' => $product_type3->id,
            'current_quantity' => 1600,
        ]);
        $this->assertDatabaseHas('product_purchases', [
            'product_type_id' => $product_type4->id,
            'current_quantity' => 0,
        ]);
        $this->assertDatabaseHas('product_purchases', [
            'product_type_id' => $product_type4->id,
            'current_quantity' => 900,
        ]);
    }

    public function test_can_get_current_balance()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $this->admin->company_id = $company->id;
        $this->admin->save();

        // create _in _card transactions
        Cashbox::factory()->create(['shop_id' => $shop->id, 'payment_type' => '_card', 'transaction_type' => '_in', 'amount' => 100, 'collected_at' => null]);

        // create _in _cash transactions
        Cashbox::factory()->create(['shop_id' => $shop->id, 'payment_type' => '_cash', 'transaction_type' => '_in', 'amount' => 150, 'collected_at' => null]);
        Cashbox::factory()->create(['shop_id' => $shop->id, 'payment_type' => '_cash', 'transaction_type' => '_in', 'amount' => 550.50, 'collected_at' => null]);

        // create _out _card transactions
        Cashbox::factory()->create(['shop_id' => $shop->id, 'payment_type' => '_card', 'transaction_type' => '_out', 'amount' => 30, 'collected_at' => null]);
        Cashbox::factory()->create(['shop_id' => $shop->id, 'payment_type' => '_card', 'transaction_type' => '_out', 'amount' => 60, 'collected_at' => null]);

        // create _out _cash transactions
        Cashbox::factory()->create(['shop_id' => $shop->id, 'payment_type' => '_cash', 'transaction_type' => '_out', 'amount' => 10, 'collected_at' => null]);

        $response = $this->actingAs($this->admin)->getJson($this->base_route . 'get_current_balance');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'in' => [
                        'sum' => 800.50,
                        'card' => 100,
                        'cash' => 700.50,
                    ],
                    'out' => [
                        'sum' => 100,
                        'card' => 90,
                        'cash' => 10,
                    ],
                    'all' => [
                        'sum' => 700.50,
                        'card' => 10,
                        'cash' => 690.50,
                    ],
                ]
            ]);
    }

    public function test_can_collect_payments()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $this->admin->company_id = $company->id;
        $this->admin->save();

        // create _in _card transactions
        $payments = Cashbox::factory(10)->create(['shop_id' => $shop->id, 'collected_at' => null]);

        // collect payments
        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'collect', ['ids' => $payments->pluck('id')]);
        $response->assertStatus(200);

        $this->assertCount(10, Cashbox::where('shop_id', $shop->id)
            ->where('collector_id', $this->admin->id)->whereNotNull('collected_at')
            ->get()
        );
        $this->assertCount(0, Cashbox::where('shop_id', $shop->id)
            ->whereNull('collector_id')->whereNull('collected_at')
            ->get()
        );
    }

    public function test_can_get_collection_history()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $this->admin->company_id = $company->id;
        $this->admin->save();

        $collected_time1 = now()->subMonth();
        Cashbox::factory()->create([
            'shop_id' => $shop->id, 'collected_at' => $collected_time1, 'collector_id' => $this->admin->id,
            'transaction_type' => Cashbox::TRANSACTION_TYPES['in'], 'amount' => 200
        ]);
        Cashbox::factory()->create([
            'shop_id' => $shop->id, 'collected_at' => $collected_time1, 'collector_id' => $this->admin->id,
            'transaction_type' => Cashbox::TRANSACTION_TYPES['out'], 'amount' => 100
        ]);
        Cashbox::factory()->create([
            'shop_id' => $shop->id, 'collected_at' => $collected_time1, 'collector_id' => $this->admin->id,
            'transaction_type' => Cashbox::TRANSACTION_TYPES['in'], 'amount' => 100
        ]);

        $collected_time2 = now()->subWeek();
        Cashbox::factory()->create([
            'shop_id' => $shop->id, 'collected_at' => $collected_time2, 'collector_id' => $this->admin->id,
            'transaction_type' => Cashbox::TRANSACTION_TYPES['in'], 'amount' => 500
        ]);
        Cashbox::factory()->create([
            'shop_id' => $shop->id, 'collected_at' => $collected_time2, 'collector_id' => $this->admin->id,
            'transaction_type' => Cashbox::TRANSACTION_TYPES['out'], 'amount' => 200
        ]);
        Cashbox::factory()->create([
            'shop_id' => $shop->id, 'collected_at' => $collected_time2, 'collector_id' => $this->admin->id,
            'transaction_type' => Cashbox::TRANSACTION_TYPES['in'], 'amount' => 100
        ]);

        $response = $this->actingAs($this->admin)->getJson($this->base_route . 'collection_history');
        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    [
                        'collected_at' => $collected_time2->format('Y-m-d H:i:s'),
                        'amount' => 400,
                        'collector' => [
                            'id' => $this->admin->id,
                            'name' => $this->admin->name,
                        ]
                    ],
                    [
                        'collected_at' => $collected_time1->format('Y-m-d H:i:s'),
                        'amount' => 200,
                        'collector' => [
                            'id' => $this->admin->id,
                            'name' => $this->admin->name,
                        ]
                    ],
                ]
            ]);
    }

    public function test_can_get_payments_from_history()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $this->admin->company_id = $company->id;
        $this->admin->save();

        $collected_time = now()->subMonth();
        $sell_product = SellProduct::factory()->create(['company_id' => $company->id]);
        $payment1 = Cashbox::factory()->create([
            'shop_id' => $shop->id, 'collected_at' => $collected_time, 'collector_id' => $this->admin->id, 'operator_id' => $this->admin->id,
            'transaction_type' => Cashbox::TRANSACTION_TYPES['in'], 'amount' => 200, 'sell_product_id' => $sell_product->id
        ]);
        $payment2 = Cashbox::factory()->create([
            'shop_id' => $shop->id, 'collected_at' => $collected_time, 'collector_id' => $this->admin->id, 'operator_id' => $this->admin->id,
            'transaction_type' => Cashbox::TRANSACTION_TYPES['out'], 'amount' => 100, 'sell_product_id' => $sell_product->id
        ]);
        $payment3 = Cashbox::factory()->create([
            'shop_id' => $shop->id, 'collected_at' => $collected_time, 'collector_id' => $this->admin->id, 'operator_id' => $this->admin->id,
            'transaction_type' => Cashbox::TRANSACTION_TYPES['in'], 'amount' => 100, 'sell_product_id' => $sell_product->id
        ]);
        Cashbox::factory()->create([
            'shop_id' => $shop->id, 'collected_at' => now(), 'collector_id' => $this->admin->id, 'operator_id' => $this->admin->id,
            'transaction_type' => Cashbox::TRANSACTION_TYPES['in'], 'amount' => 100, 'sell_product_id' => $sell_product->id
        ]);
        $another_company = Company::factory()->create();
        $another_company_shop = Shop::factory()->create(['company_id' => $another_company->id]);
        Cashbox::factory()->create([
            'shop_id' => $another_company_shop->id, 'collected_at' => $collected_time, 'collector_id' => $this->admin->id,
            'transaction_type' => Cashbox::TRANSACTION_TYPES['in'], 'amount' => 100
        ]);

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'payments_from_history', [
            'collected_at' => $collected_time->format('Y-m-d H:i:s')
        ]);
        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    [
                        'id' => $payment1->id,
                        'shop' => [
                            'id' => $payment1->shop_id
                        ],
                        'amount' => $payment1->amount,
                        'payment_type' => $payment1->payment_type,
                        'transaction_type' => $payment1->transaction_type,
                        'sell_product' => $payment1->sell_product_id
                            ? [
                                'id' => $payment1->sell_product_id,
                            ]
                            : null,
                        'operator' => [
                            'id' => $payment1->operator_id
                        ],
                        'description' => $payment1->description,
                        'created_at' => $payment1->created_at->format('Y-m-d H:i')
                    ],
                    [
                        'id' => $payment2->id,
                        'shop' => [
                            'id' => $payment2->shop_id
                        ],
                        'amount' => $payment2->amount,
                        'payment_type' => $payment2->payment_type,
                        'transaction_type' => $payment2->transaction_type,
                        'sell_product' => $payment2->sell_product_id
                            ? [
                                'id' => $payment2->sell_product_id,
                            ]
                            : null,
                        'operator' => [
                            'id' => $payment2->operator_id
                        ],
                        'description' => $payment2->description,
                        'created_at' => $payment2->created_at->format('Y-m-d H:i')
                    ],
                    [
                        'id' => $payment3->id,
                        'shop' => [
                            'id' => $payment3->shop_id
                        ],
                        'amount' => $payment3->amount,
                        'payment_type' => $payment3->payment_type,
                        'transaction_type' => $payment3->transaction_type,
                        'sell_product' => $payment3->sell_product_id
                            ? [
                                'id' => $payment3->sell_product_id,
                            ]
                            : null,
                        'operator' => [
                            'id' => $payment3->operator_id
                        ],
                        'description' => $payment3->description,
                        'created_at' => $payment3->created_at->format('Y-m-d H:i')
                    ],
                ]
            ]);
    }
}
