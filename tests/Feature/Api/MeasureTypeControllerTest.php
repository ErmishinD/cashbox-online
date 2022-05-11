<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Company;
use App\Models\MeasureType;
use App\Models\User;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MeasureTypeControllerTest extends TestCase
{
    use RefreshDatabase;

    private $base_route = '/api/measure_types/';
    private $table = 'measure_types';

    /**
     * @var BaseMeasureType
     */
    private $base_measure_type_volume;
    /**
     * @var BaseMeasureType
     */
    private $base_measure_type_weight;

    /**
     * @var User
     */
    private $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesPermissionsSeeder::class);
        $this->base_measure_type_volume = BaseMeasureType::create(['type' => '_volume', 'name' => 'мл']);
        $this->base_measure_type_weight = BaseMeasureType::create(['type' => '_weight', 'name' => 'г']);
        Company::factory()->create();

        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');
    }

    public function test_admin_can_get_by_base_measure_type()
    {
        $company = Company::factory()->create();
        session()->put('company_id', $company->id);
        $this->admin->company_id = $company->id;
        $this->admin->save();

        MeasureType::factory(5)->create(['company_id' => $company->id, 'base_measure_type_id' => $this->base_measure_type_weight->id]);
        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_by_base_measure_type', [
            'base_measure_type_id' => $this->base_measure_type_weight->id
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(5, $response['data']);
    }

    public function test_admin_can_get_all_measure_types()
    {
        $company = Company::factory()->create();
        session()->put('company_id', $company->id);
        $this->admin->company_id = $company->id;
        $this->admin->save();

        MeasureType::factory(5)->create(['company_id' => $company->id]);

        $response = $this->actingAs($this->admin)->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(5, $response['data']);
    }

    public function test_admin_can_create_measure_type()
    {
        $company = Company::factory()->create();
        $base_measure_type = BaseMeasureType::inRandomOrder()->get()->first();
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'company_id' => $company->id,
            'base_measure_type_id' => $base_measure_type->id,
            'name' => 'l',
            'description' => 'some description',
            'quantity' => 100,
            'is_common' => true,
        ]);
        $response
            ->assertStatus(201)
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

    public function test_admin_can_get_measure_type()
    {
        $measure_type = MeasureType::factory()->create(['name' => 'my custom name']);
        $response = $this->actingAs($this->admin)->get($this->base_route . $measure_type->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'my custom name']
            ]);
    }

    public function test_admin_can_edit_measure_type()
    {
        $measure_type = MeasureType::factory()->create(['name' => 'MeasureType name']);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route . $measure_type->id, [
            'name' => 'NEW name', 'description' => 'some description', 'quantity' => $measure_type->quantity,
            'base_measure_type_id' => $measure_type->base_measure_type_id
        ]);
        $response
            ->assertStatus(202)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'NEW name', 'description' => 'some description']
            ]);
        $this->assertDatabaseHas($this->table, ['name' => 'NEW name', 'description' => 'some description']);
    }

    public function test_admin_can_delete_measure_type()
    {
        $measure_type = MeasureType::factory()->create();
        $response = $this->actingAs($this->admin)->deleteJson($this->base_route . $measure_type->id);
        $response
            ->assertStatus(202)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertSoftDeleted($this->table, ['id' => $measure_type->id]);
    }

    public function test_admin_can_get_grouped_by_base_measure_type()
    {
        $another_company = Company::factory()->create();
        MeasureType::factory()->count(15)->create([
            'company_id' => $another_company->id
        ]);

        $company = Company::factory()->create();
        session()->put('company_id', $company->id);
        $this->admin->company_id = $company->id;
        $this->admin->save();

        $measure_type_volume1 = MeasureType::factory()->create([
            'company_id' => $company->id, 'base_measure_type_id' => $this->base_measure_type_volume->id
        ]);
        $measure_type_volume2 = MeasureType::factory()->create([
            'company_id' => $company->id, 'base_measure_type_id' => $this->base_measure_type_volume->id
        ]);

        $measure_type_weight1 = MeasureType::factory()->create([
            'company_id' => $company->id, 'base_measure_type_id' => $this->base_measure_type_weight->id
        ]);
        $measure_type_weight2 = MeasureType::factory()->create([
            'company_id' => $company->id, 'base_measure_type_id' => $this->base_measure_type_weight->id
        ]);
        $measure_type_weight3 = MeasureType::factory()->create([
            'company_id' => $company->id, 'base_measure_type_id' => $this->base_measure_type_weight->id
        ]);

        $response = $this->actingAs($this->admin)->get($this->base_route . 'get_grouped_by_base');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    MeasureType::TYPES['volume'] => [
                        ['id' => $measure_type_volume1->id],
                        ['id' => $measure_type_volume2->id],
                    ],
                    MeasureType::TYPES['weight'] => [
                        ['id' => $measure_type_weight1->id],
                        ['id' => $measure_type_weight2->id],
                        ['id' => $measure_type_weight3->id],
                    ],
                ]
            ]);
    }
}
