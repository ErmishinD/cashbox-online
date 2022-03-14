<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Company;
use App\Models\MeasureType;
use App\Models\ProductType;
use App\Models\SellProduct;
use App\Models\SellProductGroup;
use App\Models\Shop;
use App\Models\User;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SellableControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $base_route = '/api/sellable/';

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

    public function test_admin_can_get_paginated_sellable()
    {
        $company = Company::factory()->create();
        ProductType::factory()->count(20)->create(['company_id' => $company->id]);
        SellProduct::factory()->count(20)->create(['company_id' => $company->id]);
        SellProductGroup::factory()->count(20)->create(['company_id' => $company->id]);

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'pagination' => [
                    'current_page' => 1,
                    'per_page' => 10,
                    'total' => 40,
                ]
            ]);
    }

    public function test_admin_can_get_different_pages_of_sellable()
    {
        $company = Company::factory()->create();
        ProductType::factory()->count(20)->create(['company_id' => $company->id]);
        SellProduct::factory()->count(20)->create(['company_id' => $company->id]);
        SellProductGroup::factory()->count(20)->create(['company_id' => $company->id]);

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', ['per_page' => 5, 'page' => 2]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'pagination' => [
                    'current_page' => 2,
                    'per_page' => 5,
                    'total' => 40,
                ]
            ]);
    }

    public function test_admin_can_search_sellable()
    {
        $company = Company::factory()->create();
        ProductType::factory()->count(20)->create(['company_id' => $company->id]);
        $sell_product1 = SellProduct::factory()->create(['company_id' => $company->id, 'name' => "Вода"]);
        $sell_product2 = SellProduct::factory()->create(['company_id' => $company->id, 'name' => "Кофе"]);
        $sell_product3 = SellProduct::factory()->create(['company_id' => $company->id, 'name' => "Чай"]);

        $sell_product_group1 = SellProductGroup::factory()->create(['company_id' => $company->id, 'name' => "Чайный набор"]);
        $sell_product_group2 = SellProductGroup::factory()->create(['company_id' => $company->id, 'name' => "Два бутерброда"]);

        $response = $this->actingAs($this->admin)->postJson(
            $this->base_route . 'get_paginated', ['columnFilters' => ['name' => 'вода']]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'pagination' => [
                    'total' => 1,
                    'data' => [
                        [
                            'id' => $sell_product1->id,
                            'sellable_type' => get_class($sell_product1),
                            'company_id' => $company->id,
                            'name' => $sell_product1->name,
                            'price' => $sell_product1->price,
                            'has_discount' => $sell_product1->has_discount,
                        ]
                    ]
                ]
            ]);

        $response = $this->actingAs($this->admin)->postJson(
            $this->base_route . 'get_paginated', ['columnFilters' => ['name' => 'чай']]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'pagination' => [
                    'total' => 2,
                    'data' => [
                        [
                            'id' => $sell_product_group1->id,
                            'sellable_type' => get_class($sell_product_group1),
                            'company_id' => $company->id,
                            'name' => $sell_product_group1->name,
                        ],
                        [
                            'id' => $sell_product3->id,
                            'sellable_type' => get_class($sell_product3),
                            'company_id' => $company->id,
                            'name' => $sell_product3->name,
                        ],
                    ]
                ]
            ]);
    }
}
