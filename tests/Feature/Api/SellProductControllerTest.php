<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Company;
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
    use RefreshDatabase;

    private $base_route = '/api/sell_products/';
    private $table = 'sell_products';
    /**
     * @var User
     */
    private $admin;

    public function setUp(): void
    {
        parent::setUp();
        Company::factory()->create();
        BaseMeasureType::create(['type' => '_volume', 'name' => 'мл']);
        BaseMeasureType::create(['type' => '_weight', 'name' => 'г']);

        $this->seed(RolesPermissionsSeeder::class);
        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');
    }

    public function test_admin_can_get_all_sell_products() {
        SellProduct::factory(5)->create();

        $response = $this->actingAs($this->admin)->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(5, $response['data']);
    }

    public function test_admin_can_create_sell_product() {
        $company = Company::inRandomOrder()->first();
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'company_id' => $company->id,
            'name' => 'Sell Product 1',
            'price' => 250.5,
            'has_discount' => false,
        ]);
        $response
            ->assertStatus(200)
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

    public function test_admin_can_create_sell_product_with_product_types() {
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
                ['product_type_id' => $product_type1->id, 'quantity' => 250],
                ['product_type_id' => $product_type2->id, 'quantity' => 50],
                ['product_type_id' => $product_type3->id, 'quantity' => 5],
            ]
        ]);
        $response
            ->assertStatus(200)
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

    public function test_admin_can_get_sell_product() {
        $sell_product = SellProduct::factory()->create(['name' => 'Sell Product 2', 'price' => 100]);
        $response = $this->actingAs($this->admin)->get($this->base_route.$sell_product->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'Sell Product 2', 'price' => 100]
            ]);
    }

    public function test_admin_can_get_sell_product_with_product_types() {
        $product_type1 = ProductType::factory()->create(['name' => 'product type 1']);
        $product_type2 = ProductType::factory()->create(['name' => 'product type 2']);
        $sell_product = SellProduct::factory()->create(['name' => 'Sell Product 2', 'price' => 100]);
        DB::table('sell_product_product_type')->insert([
            'product_type_id' => $product_type1->id, 'sell_product_id' => $sell_product->id, 'quantity' => 15
        ]);
        DB::table('sell_product_product_type')->insert([
            'product_type_id' => $product_type2->id, 'sell_product_id' => $sell_product->id, 'quantity' => 250
        ]);

        $response = $this->actingAs($this->admin)->get($this->base_route.$sell_product->id);
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

    public function test_admin_can_edit_sell_product() {
        $sell_product = SellProduct::factory()->create(['name' => 'Sell Product 3', 'price' => 333.33]);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route.$sell_product->id, [
            'price' => 666.66
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'Sell Product 3', 'price' => 666.66]
            ]);
        $this->assertDatabaseHas($this->table, ['name' => 'Sell Product 3', 'price' => 666.66]);
    }

    public function test_admin_can_edit_sell_product_with_product_types() {

    }

    public function test_admin_can_delete_sell_product() {
        $sell_product = SellProduct::factory()->create();
        $response = $this->actingAs($this->admin)->deleteJson($this->base_route.$sell_product->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertSoftDeleted($this->table, ['id' => $sell_product->id]);
    }

    public function test_admin_can_remove_product_types() {

    }
}
