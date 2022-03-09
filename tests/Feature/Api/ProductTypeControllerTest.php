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

class ProductTypeControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $base_route = '/api/product_types/';
    private $table = 'product_types';
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

    public function test_admin_cant_get_all_product_types() {
        $response = $this->actingAs($this->admin)->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => false
            ]);
    }

    public function test_admin_can_get_paginated_product_types()
    {
        ProductType::factory(30)->create();
        $response = $this->actingAs($this->admin)->post($this->base_route.'get_paginated', ['per_page' => 3, 'page' => 1]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'pagination' => [
                    'current_page' => 1,
                    'last_page' => 10,
                    'per_page' => 3,
                    'total' => 30,
                ]
            ]);
    }

    public function test_admin_can_create_product_type() {
        $company = Company::inRandomOrder()->get()->first();
        $base_measure_type = BaseMeasureType::inRandomOrder()->get()->first();
        $main_measure_type_id = MeasureType::factory()->create(['base_measure_type_id' => $base_measure_type->id]);
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'company_id' => $company->id,
            'base_measure_type_id' => $base_measure_type->id,
            'name' => 'First product',
            'type' => '_imperishable',
            'main_measure_type_id' => $main_measure_type_id->id,
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'company_id' => $company->id,
                    'name' => 'First product',
                    'type' => '_imperishable',
                    'base_measure_type_id' => $base_measure_type->id,
                    'main_measure_type_id' => $main_measure_type_id->id,
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'company_id' => $company->id,
            'base_measure_type_id' => $base_measure_type->id,
            'name' => 'First product',
            'type' => '_imperishable',
        ]);
    }

    public function test_admin_can_get_product_type() {
        $product_type = ProductType::factory()->create(['name' => 'my custom name']);
        $measure_type = MeasureType::factory()->create(['name' => 'custom measure type']);
        $sell_product1 = SellProduct::factory()->create();
        $sell_product2 = SellProduct::factory()->create();
        DB::table('product_type_measures')->insert([
            'product_type_id' => $product_type->id, 'measure_type_id' => $measure_type->id
        ]);
        DB::table('sell_product_product_type')->insert([
            'product_type_id' => $product_type->id, 'sell_product_id' => $sell_product1->id, 'quantity' => 300
        ]);
        DB::table('sell_product_product_type')->insert([
            'product_type_id' => $product_type->id, 'sell_product_id' => $sell_product2->id, 'quantity' => 400
        ]);

        $response = $this->actingAs($this->admin)->get($this->base_route.$product_type->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'name' => 'my custom name',
                    'measure_types' => [
                        ['name' => 'custom measure type',]
                    ],
                    'sell_products' => [
                        [
                            'id' => $sell_product1->id,
                            'company_id' => $sell_product1->company_id,
                            'name' => $sell_product1->name,
                            'price' => $sell_product1->price,
                            'has_discount' => intval($sell_product1->has_discount),
                            'quantity' => 300
                        ],
                        [
                            'id' => $sell_product2->id,
                            'company_id' => $sell_product2->company_id,
                            'name' => $sell_product2->name,
                            'price' => $sell_product2->price,
                            'has_discount' => intval($sell_product2->has_discount),
                            'quantity' => 400
                        ],

                    ]
                ]
            ]);
    }

    public function test_admin_can_edit_product_type() {
        $product_type = ProductType::factory()->create(['name' => 'ProductType name']);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route.$product_type->id, [
            'name' => 'NEW name'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'NEW name']
            ]);
        $this->assertDatabaseHas($this->table, ['name' => 'NEW name']);
    }

    public function test_admin_can_delete_product_type() {
        $product_type = ProductType::factory()->create();
        $response = $this->actingAs($this->admin)->deleteJson($this->base_route.$product_type->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertSoftDeleted($this->table, ['id' => $product_type->id]);
    }

    public function test_admin_can_remove_measure_types() {
        $product_type = ProductType::factory()->create(['name' => 'test product']);
        $measure_type1 = MeasureType::factory()->create(['name' => 'test measure type 1']);
        $measure_type2 = MeasureType::factory()->create(['name' => 'test measure type 2']);
        DB::table('product_type_measures')->insert([
            'product_type_id' => $product_type->id, 'measure_type_id' => $measure_type1->id
        ]);
        DB::table('product_type_measures')->insert([
            'product_type_id' => $product_type->id, 'measure_type_id' => $measure_type2->id
        ]);

        $response = $this->actingAs($this->admin)->postJson($this->base_route.'remove_measure_types', [
            'product_type_id' => $product_type->id,
            'measure_types' => [$measure_type1->id, $measure_type2->id]
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

        $this->assertDatabaseMissing('product_type_measures', [
            'product_type_id' => $product_type->id, 'measure_type_id' => $measure_type1->id
        ]);
        $this->assertDatabaseMissing('product_type_measures', [
            'product_type_id' => $product_type->id, 'measure_type_id' => $measure_type2->id
        ]);
    }

    public function test_admin_can_get_for_purchase()
    {
        $company = Company::factory()->create();

        $base_measure_type = $this->base_measure_type_weight;

        $main_measure_type = MeasureType::factory()->create(['name' => 'main measure type', 'base_measure_type_id' => $base_measure_type->id, 'quantity' => 333]);
        $measure_type = MeasureType::factory()->create(['base_measure_type_id' => $base_measure_type->id, 'quantity' => 500]);
        $product_type = ProductType::factory()->create([
            'company_id' => $company->id,
            'base_measure_type_id' => $base_measure_type->id,
            'main_measure_type_id' => $main_measure_type->id
        ]);

        DB::table('product_type_measures')->insert([
            'product_type_id' => $product_type->id, 'measure_type_id' => $measure_type->id
        ]);

        $response = $this->actingAs($this->admin)->postJson($this->base_route.'get_for_purchase', [
            'company_id' => $company->id
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'pagination' => [
                    'data' => [
                        [
                            'id' => $product_type->id,
                            'name' => $product_type->name,
                            'measure_types' => [
                                ['name' => $measure_type->name, 'quantity' => $measure_type->quantity],
                                ['name' => $main_measure_type->name, 'quantity' => $main_measure_type->quantity],
                                ['name' => $base_measure_type->name, 'quantity' => 1],
                            ]
                        ]
                    ],
                ]
            ]);
    }

    // filter / sort tests

    public function test_can_filter_by_name()
    {
        $company = Company::factory()->create();
        ProductType::factory()->create(['company_id' => $company->id, 'name' => 'my product']);
        ProductType::factory()->create(['company_id' => $company->id, 'name' => 'my product 2']);
        ProductType::factory()->create(['company_id' => $company->id, 'name' => 'something']);

        $this->admin->company_id = $company->id;
        $this->admin->save();

        $response = $this->actingAs($this->admin)->postJson($this->base_route.'get_paginated', [
            'columnFilters' => ['name' => 'my']
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(2, 'pagination.data');
    }

    public function test_can_filter_by_type()
    {
        $company = Company::factory()->create();
        ProductType::factory()->create(['company_id' => $company->id, 'type' => ProductType::TYPES['perishable']]);
        ProductType::factory()->create(['company_id' => $company->id, 'type' => ProductType::TYPES['perishable']]);
        ProductType::factory()->create(['company_id' => $company->id, 'type' => ProductType::TYPES['imperishable']]);

        $this->admin->company_id = $company->id;
        $this->admin->save();

        $response = $this->actingAs($this->admin)->postJson($this->base_route.'get_paginated', [
            'columnFilters' => ['type' => ProductType::TYPES['imperishable']]
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(1, 'pagination.data');
    }

    public function test_can_filter_by_base_measure_type_id()
    {
        $company = Company::factory()->create();
        ProductType::factory()->create(['company_id' => $company->id, 'base_measure_type_id' => $this->base_measure_type_weight->id]);
        ProductType::factory()->create(['company_id' => $company->id, 'base_measure_type_id' => $this->base_measure_type_volume->id]);
        ProductType::factory()->create(['company_id' => $company->id, 'base_measure_type_id' => $this->base_measure_type_quantity->id]);

        $this->admin->company_id = $company->id;
        $this->admin->save();

        $response = $this->actingAs($this->admin)->postJson($this->base_route.'get_paginated', [
            'columnFilters' => ['base_measure_type_id' => $this->base_measure_type_quantity->id]
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(1, 'pagination.data');
    }

    public function test_can_sort_by_name()
    {
        $company = Company::factory()->create();
        $product_type1 = ProductType::factory()->create(['company_id' => $company->id, 'name' => 'Banana']);
        $product_type2 = ProductType::factory()->create(['company_id' => $company->id, 'name' => 'Apple']);
        $product_type3 = ProductType::factory()->create(['company_id' => $company->id, 'name' => 'Coconut']);

        $this->admin->company_id = $company->id;
        $this->admin->save();

        $response = $this->actingAs($this->admin)->postJson($this->base_route.'get_paginated', [
            'sort' => [['field' => 'name', 'type' => 'asc']]
        ]);

        $response->assertStatus(200)->assertJson([
            'pagination' => [
                'data' => [
                    ['id' => $product_type2->id],
                    ['id' => $product_type1->id],
                    ['id' => $product_type3->id],
                ]
            ]
        ]);
    }
}
