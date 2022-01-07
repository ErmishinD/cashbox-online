<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Company;
use App\Models\MeasureType;
use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\Shop;
use App\Models\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductPurchaseControllerTest extends TestCase
{
    use RefreshDatabase;

    private $base_route = '/api/product_purchases/';
    private $table = 'product_purchases';

    public function setUp(): void
    {
        parent::setUp();
        BaseMeasureType::create(['type' => '_volume', 'name' => 'мл']);
        BaseMeasureType::create(['type' => '_weight', 'name' => 'г']);
        $company = Company::factory()->create();
        Shop::factory()->count(2)
            ->has(Storage::factory()->count(1))
            ->create();
        MeasureType::factory()->create(['company_id' => $company->id]);
        ProductType::factory()->count(5)->create(['company_id' => $company->id]);
    }

    public function test_can_get_all_product_purchases() {
        ProductPurchase::factory(5)->create();

        $response = $this->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(5, $response['data']);
    }

    public function test_can_create_product_purchase() {
        $storage = Storage::inRandomOrder()->first();
        $product_type = ProductType::inRandomOrder()->first();
        $measure_type = MeasureType::inRandomOrder()->first();
        $response = $this->postJson($this->base_route, [
            'storage_id' => $storage->id,
            'product_type_id' => $product_type->id,
            'measure_type_id' => $measure_type->id,
            'quantity' => 100,
            'cost' => 1000,
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'storage_id' => $storage->id,
                    'product_type_id' => $product_type->id,
                    'measure_type_id' => $measure_type->id,
                    'quantity' => 100,
                    'current_quantity' => 100,
                    'cost' => 1000,
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'storage_id' => $storage->id,
            'product_type_id' => $product_type->id,
            'measure_type_id' => $measure_type->id,
            'quantity' => 100,
            'current_quantity' => 100,
            'cost' => 1000,
        ]);
    }

    public function test_can_get_product_purchase() {
        $product_purchase = ProductPurchase::factory()->create(['quantity' => 111, 'cost' => 333]);
        $response = $this->get($this->base_route.$product_purchase->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['quantity' => 111, 'cost' => 333]
            ]);
    }

    public function test_can_edit_product_purchase() {
        $product_purchase = ProductPurchase::factory()->create(['quantity' => 111, 'cost' => 222]);
        $response = $this->patchJson($this->base_route.$product_purchase->id, [
            'cost' => 666
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['quantity' => 111, 'cost' => 666]
            ]);
        $this->assertDatabaseHas($this->table, ['quantity' => 111, 'cost' => 666]);
    }

    public function test_can_delete_product_purchase() {
        $product_purchase = ProductPurchase::factory()->create();
        $response = $this->deleteJson($this->base_route.$product_purchase->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertDatabaseMissing($this->table, ['id' => $product_purchase->id]);
    }
}
