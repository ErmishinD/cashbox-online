<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Company;
use App\Models\ProductType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTypeControllerTest extends TestCase
{
    use RefreshDatabase;

    private $base_route = '/api/product_types/';
    private $table = 'product_types';

    public function setUp(): void
    {
        parent::setUp();
        BaseMeasureType::create(['type' => '_volume', 'name' => 'мл']);
        BaseMeasureType::create(['type' => '_weight', 'name' => 'г']);
        Company::factory()->create();
    }

    public function test_can_get_all_product_types() {
        ProductType::factory(5)->create();

        $response = $this->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(5, $response['data']);
    }

    public function test_can_create_product_type() {
        $company = Company::inRandomOrder()->get()->first();
        $base_measure_type = BaseMeasureType::inRandomOrder()->get()->first();
        $response = $this->postJson($this->base_route, [
            'company_id' => $company->id,
            'base_measure_type_id' => $base_measure_type->id,
            'name' => 'First product',
            'type' => '_imperishable'
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
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'company_id' => $company->id,
            'base_measure_type_id' => $base_measure_type->id,
            'name' => 'First product',
            'type' => '_imperishable',
        ]);
    }

    public function test_can_get_product_type() {
        $product_type = ProductType::factory()->create(['name' => 'my custom name']);
        $response = $this->get($this->base_route.$product_type->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'my custom name']
            ]);
    }

    public function test_can_edit_product_type() {
        $product_type = ProductType::factory()->create(['name' => 'ProductType name']);
        $response = $this->patchJson($this->base_route.$product_type->id, [
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

    public function test_can_delete_product_type() {
        $product_type = ProductType::factory()->create();
        $response = $this->deleteJson($this->base_route.$product_type->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertDatabaseMissing($this->table, ['id' => $product_type->id]);
    }
}
