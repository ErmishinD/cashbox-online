<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Company;
use App\Models\ExternalSale;
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

class ExternalSaleControllerTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    private $base_route = '/api/external_sales/';
    private $table = 'external_sales';

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

        $this->base_measure_type_volume = BaseMeasureType::create(['type' => '_volume', 'name' => 'мл']);
        $this->base_measure_type_weight = BaseMeasureType::create(['type' => '_weight', 'name' => 'г']);
        $this->base_measure_type_quantity = BaseMeasureType::create(['type' => '_quantity', 'name' => 'шт']);

        $company = Company::factory()->create();

        MeasureType::factory()->create([
            'base_measure_type_id' => $this->base_measure_type_volume->id,
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->randomElement([10, 100, 1000, 10000]),
            'company_id' => $company->id,
            'is_common' => $this->faker->boolean(35),
        ]);
        MeasureType::factory()->create([
            'base_measure_type_id' => $this->base_measure_type_weight->id,
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->randomElement([10, 100, 1000, 10000]),
            'company_id' => $company->id,
            'is_common' => $this->faker->boolean(35),
        ]);
        MeasureType::factory()->create([
            'base_measure_type_id' => $this->base_measure_type_quantity->id,
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->randomElement([10, 100, 1000, 10000]),
            'company_id' => $company->id,
            'is_common' => $this->faker->boolean(35),
        ]);

        Shop::factory()->create(['company_id' => $company->id]);
        ProductType::factory(10)->create();
        SellProduct::factory(4)->create();
        $this->user = User::factory()->create();

        $this->admin = User::factory()->create(['company_id' => $company->id]);
        $this->admin->assignRole('Super Admin');
    }

    public function test_can_get_paginated_external_sales()
    {
        $shop = Shop::factory()->create(['company_id' => $this->admin->company_id]);

        session()->put('shop_id', $shop->id);

        $external_sale = ExternalSale::factory()->create(['company_id' => $this->admin->company_id, 'shop_id' => $shop->id]);

        $response = $this->actingAs($this->admin)->post($this->base_route . 'get_paginated');


        $response->assertJson([
            'pagination' => [
                'data' => [
                    [
                        'id' => $external_sale->id,
                        'sell_product' => [
                            'id' => $external_sale->sell_product_id
                        ]
                    ]
                ]
            ]
        ]);
    }

    public function test_can_delete_external_sale()
    {
        $shop = Shop::factory()->create(['company_id' => $this->admin->company_id]);
        session()->put('shop_id', $shop->id);
        $external_sale = ExternalSale::factory()->create(['company_id' => $this->admin->company_id, 'shop_id' => $shop->id]);

        $response = $this->actingAs($this->admin)->deleteJson($this->base_route . $external_sale->id);

        $response->assertNoContent();
        $this->assertSoftDeleted($this->table, ['id' => $external_sale->id]);
    }
}
