<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Company;
use App\Models\MeasureType;
use App\Models\ProductType;
use App\Models\SellProduct;
use App\Models\User;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SellProductControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $base_route = '/api/sell_products/';
    private $table = 'sell_products';
    /**
     * @var User
     */
    private $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->setUpFaker();

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

        $this->seed(RolesPermissionsSeeder::class);
        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');
    }

    public function test_admin_can_get_all_sell_products()
    {
        SellProduct::factory(5)->create();

        $response = $this->actingAs($this->admin)->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(5, $response['data']);
    }

    public function test_admin_can_create_sell_product()
    {
        $company = Company::inRandomOrder()->first();
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'company_id' => $company->id,
            'name' => 'Sell Product 1',
            'price' => 250.5,
            'has_discount' => false,
        ]);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    'company_id' => $company->id,
                    'name' => 'Sell Product 1',
                    'price' => 250.5,
                    'has_discount' => false,
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'company_id' => $company->id,
            'name' => 'Sell Product 1',
            'price' => 250.5,
            'has_discount' => false,
        ]);
    }

    public function test_admin_can_create_sell_product_with_product_types()
    {
        $this->withoutExceptionHandling();
        $company = Company::inRandomOrder()->first();
        $product_type1 = ProductType::factory()->create(['name' => 'First Product Type']);
        $product_type2 = ProductType::factory()->create(['name' => 'Second Product Type']);
        $product_type3 = ProductType::factory()->create(['name' => 'Third Product Type']);
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'company_id' => $company->id,
            'name' => 'First Sell Product',
            'price' => 111.11,
            'has_discount' => false,
            'product_types' => [
                $product_type1->id => ['quantity' => 250],
                $product_type2->id => ['quantity' => 50],
                $product_type3->id => ['quantity' => 5],
            ]
        ]);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    'company_id' => $company->id,
                    'name' => 'First Sell Product',
                    'price' => 111.11,
                    'has_discount' => false,
                    'product_types' => [
                        ['name' => 'First Product Type'],
                        ['name' => 'Second Product Type'],
                        ['name' => 'Third Product Type'],
                    ]
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'company_id' => $company->id,
            'name' => 'First Sell Product',
            'price' => 111.11,
            'has_discount' => false,
        ]);
        $this->assertDatabaseHas('sell_product_product_type', [
            'product_type_id' => $product_type1->id,
            'quantity' => 250,
        ]);
        $this->assertDatabaseHas('sell_product_product_type', [
            'product_type_id' => $product_type2->id,
            'quantity' => 50,
        ]);
        $this->assertDatabaseHas('sell_product_product_type', [
            'product_type_id' => $product_type3->id,
            'quantity' => 5,
        ]);
    }

    public function test_admin_can_get_sell_product()
    {
        $sell_product = SellProduct::factory()->create(['name' => 'Sell Product 2', 'price' => 100]);
        $response = $this->actingAs($this->admin)->get($this->base_route . $sell_product->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'Sell Product 2', 'price' => 100]
            ]);
    }

    public function test_admin_can_get_sell_product_with_product_types()
    {
        $product_type1 = ProductType::factory()->create(['name' => 'product type 1']);
        $product_type2 = ProductType::factory()->create(['name' => 'product type 2']);
        $sell_product = SellProduct::factory()->create(['name' => 'Sell Product 2', 'price' => 100]);
        DB::table('sell_product_product_type')->insert([
            'product_type_id' => $product_type1->id, 'sell_product_id' => $sell_product->id, 'quantity' => 15
        ]);
        DB::table('sell_product_product_type')->insert([
            'product_type_id' => $product_type2->id, 'sell_product_id' => $sell_product->id, 'quantity' => 250
        ]);

        $response = $this->actingAs($this->admin)->get($this->base_route . $sell_product->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'name' => 'Sell Product 2',
                    'price' => 100,
                    'product_types' => [
                        ['name' => 'product type 1'],
                        ['name' => 'product type 2'],
                    ]
                ]
            ]);
    }

    public function test_admin_can_edit_sell_product()
    {
        $sell_product = SellProduct::factory()->create(['name' => 'Sell Product 3', 'price' => 333.33]);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route . $sell_product->id, [
            'name' => $sell_product->name,
            'price' => 666.66
        ]);
        $response
            ->assertStatus(202)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'Sell Product 3', 'price' => 666.66]
            ]);
        $this->assertDatabaseHas($this->table, ['name' => 'Sell Product 3', 'price' => 666.66]);
    }

    public function test_admin_can_edit_sell_product_with_product_types()
    {
        $product_type1 = ProductType::factory()->create();
        $product_type2 = ProductType::factory()->create();
        $sell_product = SellProduct::factory()->create();
        $sell_product->product_types()->attach([$product_type1->id => ['quantity' => 100]]);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route . $sell_product->id, [
            'name' => $sell_product->name,
            'price' => $sell_product->price,
            'product_types' => [$product_type2->id => ['quantity' => 200]],
        ]);
        $response->assertStatus(202);
        $this->assertDatabaseHas('sell_product_product_type', [
            'product_type_id' => $product_type2->id,
            'sell_product_id' => $sell_product->id,
            'quantity' => 200
        ]);
        $this->assertDatabaseMissing('sell_product_product_type', [
            'product_type_id' => $product_type1->id,
            'sell_product_id' => $sell_product->id,
        ]);
    }

    public function test_admin_can_delete_sell_product()
    {
        $sell_product = SellProduct::factory()->create();
        $response = $this->actingAs($this->admin)->deleteJson($this->base_route . $sell_product->id);
        $response
            ->assertStatus(202)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertSoftDeleted($this->table, ['id' => $sell_product->id]);
    }

    // filter / sort tests

    public function test_can_filter_by_name()
    {
        $company = Company::factory()->create();
        SellProduct::factory()->create(['company_id' => $company->id, 'name' => 'my product']);
        SellProduct::factory()->create(['company_id' => $company->id, 'name' => 'my product 2']);
        SellProduct::factory()->create(['company_id' => $company->id, 'name' => 'something']);

        $this->admin->company_id = $company->id;
        $this->admin->save();

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', [
            'columnFilters' => ['name' => 'my']
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(2, 'pagination.data');
    }

    public function test_can_filter_by_discount()
    {
        $company = Company::factory()->create();
        SellProduct::factory()->create(['company_id' => $company->id, 'has_discount' => true]);
        SellProduct::factory()->create(['company_id' => $company->id, 'has_discount' => false]);
        SellProduct::factory()->create(['company_id' => $company->id, 'has_discount' => false]);

        $this->admin->company_id = $company->id;
        $this->admin->save();

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', [
            'columnFilters' => ['has_discount' => 'false']
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(2, 'pagination.data');

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', [
            'columnFilters' => ['has_discount' => 'true']
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(1, 'pagination.data');

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', [
            'columnFilters' => ['has_discount' => '']
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(3, 'pagination.data');
    }

    public function test_can_sort_by_name()
    {
        $company = Company::factory()->create();
        $sell_product1 = SellProduct::factory()->create(['company_id' => $company->id, 'name' => 'Banana']);
        $sell_product2 = SellProduct::factory()->create(['company_id' => $company->id, 'name' => 'Apple']);
        $sell_product3 = SellProduct::factory()->create(['company_id' => $company->id, 'name' => 'Coconut']);

        $this->admin->company_id = $company->id;
        $this->admin->save();

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', [
            'sort' => [['field' => 'name', 'type' => 'asc']]
        ]);

        $response->assertStatus(200)->assertJson([
            'pagination' => [
                'data' => [
                    ['id' => $sell_product2->id],
                    ['id' => $sell_product1->id],
                    ['id' => $sell_product3->id],
                ]
            ]
        ]);
    }

    public function test_can_sort_by_price()
    {
        $company = Company::factory()->create();
        $sell_product1 = SellProduct::factory()->create(['company_id' => $company->id, 'price' => 500]);
        $sell_product2 = SellProduct::factory()->create(['company_id' => $company->id, 'price' => 300]);
        $sell_product3 = SellProduct::factory()->create(['company_id' => $company->id, 'price' => 150]);

        $this->admin->company_id = $company->id;
        $this->admin->save();

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', [
            'sort' => [['field' => 'price', 'type' => 'asc']]
        ]);

        $response->assertStatus(200)->assertJson([
            'pagination' => [
                'data' => [
                    ['id' => $sell_product3->id],
                    ['id' => $sell_product2->id],
                    ['id' => $sell_product1->id],
                ]
            ]
        ]);
    }
}
