<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Cashbox;
use App\Models\Company;
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

    public function test_admin_can_get_all_cashbox_transactions() {
        Cashbox::factory(5)->create();

        $response = $this->actingAs($this->admin)->getJson($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(5, $response['data']);
    }

    public function test_user_can_get_cashbox_transactions()
    {
        Cashbox::factory()->count(10)->create();  // те транзакции, которые не должны быть в списке


        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);

        $this->user->company_id = $company->id;
        $this->user->save();

        $this->user->syncPermissions(['Cashbox_access']);

        $transaction1 = Cashbox::factory()->create(['shop_id' => $shop->id, 'operator_id' => $this->user->id, 'collector_id' => null]);
        $transaction2 = Cashbox::factory()->create(['shop_id' => $shop->id, 'operator_id' => $this->admin->id, 'collector_id' => null]);

        $response = $this->actingAs($this->user)->postJson($this->base_route . 'get_paginated');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'pagination' => [
                    'data' => [
                        [
                            'id' => $transaction1->id,
                            'shop' => ['id' => $shop->id],
                            'amount' => strval($transaction1->amount),
                            'payment_type' => $transaction1->payment_type,
                            'transaction_type' => $transaction1->transaction_type,
                            'sell_product' => $transaction1->sell_product_id
                                ? ['id' => $transaction1->sell_product_id, 'name' => $transaction1->sell_product->name]
                                : null,
                            'product_purchase' => $transaction1->product_purchase_id
                                ? ['id' => $transaction1->product_purchase]
                                : null,
                            'operator' => ['id' => $transaction1->operator_id, 'name' => $transaction1->operator->name],
                            'description' => $transaction1->description,
                            'created_at' => $transaction1->created_at->format('Y-m-d H:i:s'),
                        ],
                        [
                            'id' => $transaction2->id,
                            'shop' => ['id' => $shop->id],
                            'amount' => strval($transaction2->amount),
                            'payment_type' => $transaction2->payment_type,
                            'transaction_type' => $transaction2->transaction_type,
                            'sell_product' => $transaction2->sell_product_id
                                ? ['id' => $transaction2->sell_product_id, 'name' => $transaction2->sell_product->name]
                                : null,
                            'product_purchase' => $transaction2->product_purchase_id
                                ? ['id' => $transaction2->product_purchase]
                                : null,
                            'operator' => ['id' => $transaction2->operator_id, 'name' => $transaction2->operator->name],
                            'description' => $transaction2->description,
                            'created_at' => $transaction2->created_at->format('Y-m-d H:i:s'),
                        ],
                    ]
                ]
            ]);
    }

    public function test_admin_can_create_cashbox_out_transaction() {
        $shop = Shop::factory()->create();
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'shop_id' => $shop->id,
            'transaction_type' => '_out',
            'payment_type' => '_cash',
            'amount' => 100,
            'description' => 'some description',
        ]);
        $response
            ->assertStatus(200)
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

    public function test_admin_can_create_cashbox_in_transaction() {
        $shop = Shop::factory()->create();
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
            ->assertStatus(200)
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

    public function test_admin_can_get_cashbox_transaction() {
        $cashbox = Cashbox::factory()->create(['transaction_type' => '_out', 'amount' => 111, 'description' => 'my description']);
        $response = $this->actingAs($this->admin)->get($this->base_route.$cashbox->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['transaction_type' => '_out', 'amount' => 111, 'description' => 'my description']
            ]);
    }

    public function test_admin_can_edit_cashbox_transaction() {
        $cashbox = Cashbox::factory()->create(['transaction_type' => '_out', 'amount' => 333.33]);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route.$cashbox->id, [
            'amount' => 666.66
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['transaction_type' => '_out', 'amount' => 666.66]
            ]);
        $this->assertDatabaseHas($this->table, ['transaction_type' => '_out', 'amount' => 666.66]);
    }

    public function test_admin_can_delete_cashbox_transaction() {
        $cashbox = Cashbox::factory()->create();
        $response = $this->actingAs($this->admin)->deleteJson($this->base_route.$cashbox->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertDatabaseMissing($this->table, ['id' => $cashbox->id]);
    }

    public function test_operator_can_sell_many_products()
    {
        // create shop
        $shop = Shop::factory()->create();
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);

        // create product types with purchases
        $product_type1 = ProductType::factory()->create(['company_id' => $shop->company_id, 'type' => '_imperishable']);
        ProductPurchase::factory()->create([
            'product_type_id' => $product_type1->id, 'quantity' => 1000, 'current_quantity' => 1000
        ]);

        $product_type2 = ProductType::factory()->create(['company_id' => $shop->company_id, 'type' => '_imperishable']);
        ProductPurchase::factory()->create([
            'product_type_id' => $product_type2->id, 'quantity' => 2500, 'current_quantity' => 2500
        ]);

        $product_type3 = ProductType::factory()->create(['company_id' => $shop->company_id, 'type' => '_imperishable']);
        ProductPurchase::factory()->create([
            'product_type_id' => $product_type3->id, 'quantity' => 1700, 'current_quantity' => 1700
        ]);

        $product_type4 = ProductType::factory()->create(['company_id' => $shop->company_id, 'type' => '_imperishable']);
        ProductPurchase::factory()->create([
            'product_type_id' => $product_type4->id, 'quantity' => 1000, 'current_quantity' => 1000
        ]);
        ProductPurchase::factory()->create([
            'product_type_id' => $product_type4->id, 'quantity' => 1000, 'current_quantity' => 1000
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
        $response = $this->actingAs($this->user)->postJson($this->base_route.'mass_create', [
            'shop_id' => $shop->id,
            'transaction_type' => '_in',
            'payment_type' => '_cash',
            'amount' => 545,
            'sell_products' => [
                [
                    'sell_product_id' => $sell_product1->id,
                    'amount' => 200,
                    'product_types' => [
                        ['id' => $product_type1->id, 'quantity' => 100],
                        ['id' => $product_type2->id, 'quantity' => 200]
                    ]
                ],
                [
                    'sell_product_id' => $sell_product2->id,
                    'amount' => 110,
                    'product_types' => [
                        ['id' => $product_type1->id, 'quantity' => 100],
                        ['id' => $product_type3->id, 'quantity' => 100],
                        ['id' => $product_type4->id, 'quantity' => 100],
                    ]
                ],
                [
                    'sell_product_id' => $sell_product3->id,
                    'amount' => 110,
                    'product_types' => [
                        ['id' => $product_type4->id, 'quantity' => 500],
                    ]
                ],
                [
                    'sell_product_id' => $sell_product3->id,
                    'amount' => 115,
                    'product_types' => [
                        ['id' => $product_type4->id, 'quantity' => 500],
                    ]
                ],
            ],
        ]);

        $response->assertStatus(200);

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
}
