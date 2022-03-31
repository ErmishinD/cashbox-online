<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Cashbox;
use App\Models\Company;
use App\Models\MeasureType;
use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\Shop;
use App\Models\Storage;
use App\Models\User;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductPurchaseControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $base_route = '/api/product_purchases/';
    private $table = 'product_purchases';

    /**
     * @var User
     */
    private $admin;
    /**
     * @var BaseMeasureType
     */
    private $base_measure_type_volume;
    /**
     * @var BaseMeasureType
     */
    private $base_measure_type_weight;
    /**
     * @var BaseMeasureType
     */
    private $base_measure_type_quantity;

    public function setUp(): void
    {
        parent::setUp();
        $this->setUpFaker();

        $this->seed(RolesPermissionsSeeder::class);

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

        $company = Company::factory()->create();
        Shop::factory()->count(2)
            ->has(Storage::factory()->count(1))
            ->create();
        MeasureType::factory()->create(['company_id' => $company->id]);
        ProductType::factory()->count(5)->create(['company_id' => $company->id]);

        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');
    }

    public function test_admin_can_get_all_product_purchases()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['company_id' => $company->id, 'shop_id' => $shop->id]);
        $main_measure_type = MeasureType::factory()->create(['company_id' => $company->id, 'base_measure_type_id' => $this->base_measure_type_volume->id]);
        ProductType::create([
            'company_id' => $company->id,
            'type' => '_imperishable',
            'base_measure_type_id' => $this->base_measure_type_volume->id,
            'main_measure_type_id' => $main_measure_type->id,
            'name' => $this->faker->word,
            'barcode' => $this->faker->numerify('##########')
        ]);

        ProductPurchase::factory(5)->create(['company_id' => $company->id, 'storage_id' => $storage->id]);

        $response = $this->actingAs($this->admin)->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(5, $response['data']);
    }

    public function test_admin_can_create_product_purchase()
    {
        $storage = Storage::inRandomOrder()->first();
        $product_type = ProductType::inRandomOrder()->first();
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'storage_id' => $storage->id,
            'product_type_id' => $product_type->id,
            'quantity' => 100,
            'cost' => 1000,
        ]);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    'storage_id' => $storage->id,
                    'product_type_id' => $product_type->id,
                    'quantity' => 100,
                    'current_quantity' => 100,
                    'cost' => 1000,
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'storage_id' => $storage->id,
            'product_type_id' => $product_type->id,
            'quantity' => 100,
            'current_quantity' => 100,
            'cost' => 1000,
        ]);
    }

    public function test_admin_can_get_product_purchase()
    {
        $product_purchase = ProductPurchase::factory()->create(['quantity' => 111, 'cost' => 333]);
        $response = $this->actingAs($this->admin)->get($this->base_route . $product_purchase->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['quantity' => 111, 'cost' => 333]
            ]);
    }

    public function test_admin_can_edit_product_purchase()
    {
        $product_purchase = ProductPurchase::factory()->create(['quantity' => 111, 'cost' => 222]);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route . $product_purchase->id, [
            'cost' => 666
        ]);
        $response
            ->assertStatus(403);
//            ->assertJson([
//                'success' => true,
//                'data' => ['quantity' => 111, 'cost' => 666]
//            ]);
//        $this->assertDatabaseHas($this->table, ['quantity' => 111, 'cost' => 666]);
    }

    public function test_admin_can_delete_product_purchase()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['company_id' => $company->id, 'shop_id' => $shop->id]);
        ProductType::factory()->create(['company_id' => $company->id]);
        $product_purchase = ProductPurchase::factory()->create(['company_id' => $company->id, 'storage_id' => $storage->id]);
        $response = $this->actingAs($this->admin)->deleteJson($this->base_route . $product_purchase->id);
        $response
            ->assertStatus(202)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertDatabaseMissing($this->table, ['id' => $product_purchase->id]);
    }

    public function test_admin_can_get_info_for_dashboard()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        session()->put('shop_id', $shop->id);
        $storage1 = Storage::factory()->create(['company_id' => $shop->company_id, 'shop_id' => $shop->id]);
        $storage2 = Storage::factory()->create(['company_id' => $shop->company_id, 'shop_id' => $shop->id]);

        $main_measure_type = MeasureType::factory()->create(['base_measure_type_id' => $this->base_measure_type_volume->id]);
        $product_type1 = ProductType::create([
            'company_id' => $company->id,
            'type' => '_imperishable',
            'base_measure_type_id' => $this->base_measure_type_volume->id,
            'main_measure_type_id' => $main_measure_type->id,
            'name' => $this->faker->word,
            'barcode' => $this->faker->numerify('##########')
        ]);
        $product_purchase1 = ProductPurchase::factory()->create([
            'storage_id' => $storage1->id, 'product_type_id' => $product_type1->id, 'company_id' => $storage1->company_id
        ]);

        $current_quantity1 = $product_purchase1->current_quantity / $main_measure_type->quantity;

        $product_type2 = ProductType::create([
            'company_id' => $company->id,
            'type' => '_imperishable',
            'base_measure_type_id' => $this->base_measure_type_volume->id,
            'main_measure_type_id' => $main_measure_type->id,
            'name' => $this->faker->word,
            'barcode' => $this->faker->numerify('##########')
        ]);
        $product_purchase2 = ProductPurchase::factory()->create([
            'storage_id' => $storage2->id, 'product_type_id' => $product_type2->id, 'company_id' => $storage2->company_id
        ]);

        $current_quantity2 = $product_purchase2->current_quantity / $main_measure_type->quantity;

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_for_dashboard', ['shop_id' => $shop->id]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    [
                        'id' => $product_type1->id,
                        'name' => $product_type1->name,
                        'current_quantity' => $product_purchase1->current_quantity,
                        'current_quantity_in_main_measure_type' => $current_quantity1,
                        'main_to_base_equivalent' => $main_measure_type->quantity,
                    ],
                    [
                        'id' => $product_type2->id,
                        'name' => $product_type2->name,
                        'current_quantity' => $product_purchase2->current_quantity,
                        'current_quantity_in_main_measure_type' => $current_quantity2,
                        'main_to_base_equivalent' => $main_measure_type->quantity,
                    ],
                ]
            ]);
    }

    public function test_admin_can_mass_create_product_purchase()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);

        $product_type1 = ProductType::factory()->create(['company_id' => $company->id, 'type' => ProductType::TYPES['perishable']]);
        $product_type2 = ProductType::factory()->create(['company_id' => $company->id, 'type' => ProductType::TYPES['imperishable']]);

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'mass_create', [
            'storage_id' => $storage->id,
            'payment_type' => Cashbox::PAYMENT_TYPES['cash'],
            'product_types' => [
                [
                    'id' => $product_type1->id,
                    'quantity' => 100,
                    'cost' => 50,
                    'expiration_date' => '2022-02-02',
                ],
                [
                    'id' => $product_type2->id,
                    'quantity' => 200,
                    'cost' => 100,
                ],

            ]
        ]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    [
                        'product_type_id' => $product_type1->id,
                        'storage_id' => $storage->id,
                        'quantity' => 100,
                        'current_quantity' => 100,
                        'cost' => 50,
                        'expiration_date' => '2022-02-02'
                    ],
                    [
                        'product_type_id' => $product_type2->id,
                        'storage_id' => $storage->id,
                        'quantity' => 200,
                        'current_quantity' => 200,
                        'cost' => 100,
                        'expiration_date' => null
                    ],

                ]
            ]);

        $this->assertDatabaseHas($this->table, [
            'product_type_id' => $product_type1->id,
            'storage_id' => $storage->id,
            'quantity' => 100,
            'current_quantity' => 100,
            'cost' => 50,
            'expiration_date' => '2022-02-02'
        ]);
        $this->assertDatabaseHas($this->table, [
            'product_type_id' => $product_type2->id,
            'storage_id' => $storage->id,
            'quantity' => 200,
            'current_quantity' => 200,
            'cost' => 100,
            'expiration_date' => null
        ]);

        $this->assertDatabaseHas('cashboxes', [
            'shop_id' => $shop->id,
            'transaction_type' => Cashbox::TRANSACTION_TYPES['out'],
            'payment_type' => Cashbox::PAYMENT_TYPES['cash'],
            'amount' => 50,
            'operator_id' => $this->admin->id
        ]);
        $this->assertDatabaseHas('cashboxes', [
            'shop_id' => $shop->id,
            'transaction_type' => Cashbox::TRANSACTION_TYPES['out'],
            'payment_type' => Cashbox::PAYMENT_TYPES['cash'],
            'amount' => 100,
            'operator_id' => $this->admin->id
        ]);
    }

    // filter / sort tests

    public function test_can_filter_storage_id()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage1 = Storage::factory()->create(['shop_id' => $shop->id, 'company_id' => $company->id]);
        $storage2 = Storage::factory()->create(['shop_id' => $shop->id, 'company_id' => $company->id]);

        ProductPurchase::factory()->create(['storage_id' => $storage1->id, 'company_id' => $company->id]);
        ProductPurchase::factory()->create(['storage_id' => $storage1->id, 'company_id' => $company->id]);
        ProductPurchase::factory()->create(['storage_id' => $storage2->id, 'company_id' => $company->id]);

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', [
            'columnFilters' => ['storage_id' => $storage1->id]
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(2, 'pagination.data');
    }

    public function test_can_filter_product_type_id()
    {
        $company = Company::factory()->create();
        $this->admin->update(['company_id' => $company->id]);

        $product_type1 = ProductType::factory()->create(['company_id' => $company->id]);
        $product_type2 = ProductType::factory()->create(['company_id' => $company->id]);

        ProductPurchase::factory()->create(['product_type_id' => $product_type1->id]);
        ProductPurchase::factory()->create(['product_type_id' => $product_type1->id]);
        ProductPurchase::factory()->create(['product_type_id' => $product_type2->id]);

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', [
            'columnFilters' => ['product_type_id' => $product_type2->id]
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(1, 'pagination.data');
    }

    public function test_can_sort_by_cost()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $this->admin->update(['company_id' => $shop->company_id]);
        $storage = Storage::factory()->create(['company_id' => $shop->company_id, 'shop_id' => $shop->id]);

        $purchase1 = ProductPurchase::factory()->create([
            'company_id' => $shop->company_id, 'storage_id' => $storage->id,'cost' => 100
        ]);
        $purchase2 = ProductPurchase::factory()->create([
            'company_id' => $shop->company_id, 'storage_id' => $storage->id,'cost' => 200
        ]);
        $purchase3 = ProductPurchase::factory()->create([
            'company_id' => $shop->company_id, 'storage_id' => $storage->id,'cost' => 300
        ]);

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', [
            'sort' => [['field' => 'cost', 'type' => 'desc']]
        ]);

        $response->assertStatus(200)->assertJson([
            'pagination' => [
                'data' => [
                    ['id' => $purchase3->id],
                    ['id' => $purchase2->id],
                    ['id' => $purchase1->id],
                ]
            ]
        ]);
    }

    public function test_can_sort_by_expiration_date()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $this->admin->update(['company_id' => $shop->company_id]);
        $storage = Storage::factory()->create(['company_id' => $shop->company_id, 'shop_id' => $shop->id]);
        $product_type = ProductType::factory()->create([
            'company_id' => $shop->company_id, 'type' => ProductType::TYPES['perishable']
        ]);

        $purchase1 = ProductPurchase::factory()->create([
            'company_id' => $shop->company_id, 'storage_id' => $storage->id,
            'expiration_date' => '2022-02-23', 'product_type_id' => $product_type->id
        ]);
        $purchase2 = ProductPurchase::factory()->create([
            'company_id' => $shop->company_id, 'storage_id' => $storage->id,
            'expiration_date' => '2022-02-22', 'product_type_id' => $product_type->id
        ]);
        $purchase3 = ProductPurchase::factory()->create([
            'company_id' => $shop->company_id, 'storage_id' => $storage->id,
            'expiration_date' => '2022-02-24', 'product_type_id' => $product_type->id
        ]);

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', [
            'sort' => [['field' => 'expiration_date', 'type' => 'asc']]
        ]);

        $response->assertStatus(200)->assertJson([
            'pagination' => [
                'data' => [
                    ['id' => $purchase2->id],
                    ['id' => $purchase1->id],
                    ['id' => $purchase3->id],
                ]
            ]
        ]);
    }

    public function test_can_sort_by_created_at()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $this->admin->update(['company_id' => $shop->company_id]);
        $storage = Storage::factory()->create(['company_id' => $shop->company_id, 'shop_id' => $shop->id]);
        ProductType::factory()->create(['company_id' => $shop->company_id]);

        $purchase1 = ProductPurchase::factory()->create(['company_id' => $shop->company_id, 'storage_id' => $storage->id]);
        $purchase1->created_at = '2022-02-01 18:00';
        $purchase1->save();

        $purchase2 = ProductPurchase::factory()->create(['company_id' => $shop->company_id, 'storage_id' => $storage->id]);
        $purchase2->created_at = '2022-02-01 19:00';
        $purchase2->save();

        $purchase3 = ProductPurchase::factory()->create(['company_id' => $shop->company_id, 'storage_id' => $storage->id]);
        $purchase3->created_at = '2022-01-31 10:00';
        $purchase3->save();

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', [
            'sort' => [['field' => 'created_at', 'type' => 'desc']]
        ]);

        $response->assertStatus(200)->assertJson([
            'pagination' => [
                'data' => [
                    ['id' => $purchase2->id],
                    ['id' => $purchase1->id],
                    ['id' => $purchase3->id],
                ]
            ]
        ]);
    }
}
