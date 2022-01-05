<?php

namespace Tests\Feature\Api;

use App\Models\Company;
use App\Models\SellProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SellProductControllerTest extends TestCase
{
    use RefreshDatabase;

    private $base_route = '/api/sell_products/';
    private $table = 'sell_products';

    public function setUp(): void
    {
        parent::setUp();
        Company::factory()->create();
    }

    public function test_can_get_all_sell_products() {
        SellProduct::factory(5)->create();

        $response = $this->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(5, $response['data']);
    }

    public function test_can_create_sell_product() {
        $company = Company::inRandomOrder()->first();
        $response = $this->postJson($this->base_route, [
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

    public function test_can_get_sell_product() {
        $sell_product = SellProduct::factory()->create(['name' => 'Sell Product 2', 'price' => 100]);
        $response = $this->get($this->base_route.$sell_product->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'Sell Product 2', 'price' => 100]
            ]);
    }

    public function test_can_edit_sell_product() {
        $sell_product = SellProduct::factory()->create(['name' => 'Sell Product 3', 'price' => 333.33]);
        $response = $this->patchJson($this->base_route.$sell_product->id, [
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

    public function test_can_delete_sell_product() {
        $sell_product = SellProduct::factory()->create();
        $response = $this->deleteJson($this->base_route.$sell_product->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertDatabaseMissing($this->table, ['id' => $sell_product->id]);
    }
}
