<?php

namespace Tests\Feature\Api;

use App\Events\ProductTypeCreated;
use App\Events\ProductTypeEdited;
use App\Models\Company;
use App\Models\ProductType;
use App\Models\User;
use App\Repositories\RoleRepository;
use Database\Seeders\BaseMeasureTypeSeeder;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SystemLogControllerTest extends TestCase
{
    use RefreshDatabase;

    private $base_route = '/api/system_logs/';
    private $table = 'system_logs';
    /**
     * @var User
     */
    private $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesPermissionsSeeder::class);
        $this->seed(BaseMeasureTypeSeeder::class);
        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');

        $company = Company::factory()->create();
        app(RoleRepository::class)->createDefaultCompanyRoles($company->id);
        $this->admin->update(['company_id' => $company->id]);
    }

    public function test_can_get_first_page()
    {
        $product_type = ProductType::factory()->create();
        ProductTypeCreated::dispatch($product_type, $this->admin);

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', [
            'per_page' => 1,
            'page' => 1
        ]);
        $response->assertStatus(200)->assertJsonCount(1, 'pagination.data');
    }

    public function test_can_get_second_page()
    {
        $product_type = ProductType::factory()->create();
        ProductTypeCreated::dispatch($product_type, $this->admin);

        $product_type->update(['name' => 'some name']);
        ProductTypeEdited::dispatch($product_type, $this->admin);

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', [
            'per_page' => 1,
            'page' => 2
        ]);
        $response->assertStatus(200)->assertJsonCount(1, 'pagination.data');
    }
}
