<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Company;
use App\Models\MeasureType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MeasureTypeControllerTest extends TestCase
{
    use RefreshDatabase;

    private $base_route = '/api/measure_types/';
    private $table = 'measure_types';

    public function setUp(): void
    {
        parent::setUp();
        BaseMeasureType::create(['type' => '_volume', 'name' => 'мл']);
        BaseMeasureType::create(['type' => '_weight', 'name' => 'г']);
        Company::factory()->create();
    }


    public function test_can_get_all_measure_types() {
        MeasureType::factory(5)->create();

        $response = $this->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(5, $response['data']);
    }

    public function test_can_create_measure_type() {
        $company = Company::factory()->create();
        $base_measure_type = BaseMeasureType::inRandomOrder()->get()->first();
        $response = $this->postJson($this->base_route, [
            'company_id' => $company->id,
            'base_measure_type_id' => $base_measure_type->id,
            'name' => 'l',
            'description' => 'some description',
            'quantity' => 100,
            'is_common' => true,
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'base_measure_type_id' => $base_measure_type->id,
                    'name' => 'l',
                    'description' => 'some description',
                    'quantity' => 100,
                    'is_common' => true,
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'base_measure_type_id' => $base_measure_type->id,
            'name' => 'l',
            'description' => 'some description',
            'quantity' => 100,
            'is_common' => true,
        ]);
    }

    public function test_can_get_measure_type() {
        $measure_type = MeasureType::factory()->create(['name' => 'my custom name']);
        $response = $this->get($this->base_route.$measure_type->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'my custom name']
            ]);
    }

    public function test_can_edit_measure_type() {
        $measure_type = MeasureType::factory()->create(['name' => 'MeasureType name']);
        $response = $this->patchJson($this->base_route.$measure_type->id, [
            'name' => 'NEW name', 'description' => 'some description'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'NEW name', 'description' => 'some description']
            ]);
        $this->assertDatabaseHas($this->table, ['name' => 'NEW name', 'description' => 'some description']);
    }

    public function test_can_delete_measure_type() {
        $measure_type = MeasureType::factory()->create();
        $response = $this->deleteJson($this->base_route.$measure_type->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertDatabaseMissing($this->table, ['id' => $measure_type->id]);
    }
}
