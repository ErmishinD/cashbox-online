<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Company;
use App\Models\MeasureType;
use App\Models\ProductType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
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

    public function test_can_create_product_type_with_measure_types() {
        $company = Company::inRandomOrder()->get()->first();
        $base_measure_type = BaseMeasureType::inRandomOrder()->get()->first();
        $measure_type1 = MeasureType::factory()->create(['base_measure_type_id' => $base_measure_type->id, 'name' => 'measure 1']);
        $measure_type2 = MeasureType::factory()->create(['base_measure_type_id' => $base_measure_type->id, 'name' => 'measure 2']);
        $response = $this->postJson($this->base_route, [
            'company_id' => $company->id,
            'base_measure_type_id' => $base_measure_type->id,
            'name' => 'First product',
            'type' => '_imperishable',
            'measure_types' => [$measure_type1->id, $measure_type2->id],
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
                    'measure_types' => [
                        ['name' => 'measure 1',],
                        ['name' => 'measure 2',],
                    ],
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'company_id' => $company->id,
            'base_measure_type_id' => $base_measure_type->id,
            'name' => 'First product',
            'type' => '_imperishable',
        ]);
        $this->assertDatabaseHas('product_type_measures', [
            'product_type_id' => $response['data']['id'], 'measure_type_id' => $measure_type1->id
        ]);
        $this->assertDatabaseHas('product_type_measures', [
            'product_type_id' => $response['data']['id'], 'measure_type_id' => $measure_type2->id
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

    public function test_can_get_product_type_with_measure_types() {
        $product_type = ProductType::factory()->create(['name' => 'my custom name']);
        $measure_type = MeasureType::factory()->create(['name' => 'custom measure type']);
        DB::table('product_type_measures')->insert([
            'product_type_id' => $product_type->id, 'measure_type_id' => $measure_type->id
        ]);
        $response = $this->get($this->base_route.$product_type->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'name' => 'my custom name',
                    'measure_types' => [
                        ['name' => 'custom measure type',]
                    ],
                ]
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

    public function test_can_edit_product_type_with_measure_types() {
        $product_type = ProductType::factory()->create(['name' => 'My ProductType name']);
        $measure_type1 = MeasureType::factory()->create(['name' => 'measure_type 1']);
        $measure_type2 = MeasureType::factory()->create(['name' => 'measure_type 2']);
        $measure_type3 = MeasureType::factory()->create(['name' => 'measure_type 3']);
        DB::table('product_type_measures')->insert([
            'product_type_id' => $product_type->id, 'measure_type_id' => $measure_type1->id
        ]);
        $response = $this->patchJson($this->base_route.$product_type->id, [
            'name' => 'My NEW name',
            'measure_types' => [$measure_type2->id, $measure_type3->id]
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'name' => 'My NEW name',
                    'measure_types' => [
                        ['name' => 'measure_type 2',],
                        ['name' => 'measure_type 3',]
                    ],
                ]
            ]);
        $this->assertDatabaseHas($this->table, ['name' => 'My NEW name']);
        $this->assertDatabaseHas('product_type_measures', [
            'product_type_id' => $product_type->id, 'measure_type_id' => $measure_type2->id
        ]);
        $this->assertDatabaseHas('product_type_measures', [
            'product_type_id' => $product_type->id, 'measure_type_id' => $measure_type3->id
        ]);
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

    public function test_can_remove_measure_types() {
        $product_type = ProductType::factory()->create(['name' => 'test product']);
        $measure_type1 = MeasureType::factory()->create(['name' => 'test measure type 1']);
        $measure_type2 = MeasureType::factory()->create(['name' => 'test measure type 2']);
        DB::table('product_type_measures')->insert([
            'product_type_id' => $product_type->id, 'measure_type_id' => $measure_type1->id
        ]);
        DB::table('product_type_measures')->insert([
            'product_type_id' => $product_type->id, 'measure_type_id' => $measure_type2->id
        ]);

        $response = $this->postJson($this->base_route.'remove_measure_types', [
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
}
