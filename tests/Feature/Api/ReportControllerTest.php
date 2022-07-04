<?php

namespace Tests\Feature\Api;

use App\Models\Company;
use App\Models\Shop;
use App\Models\Storage;
use App\Models\User;
use App\Repositories\RoleRepository;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesPermissionsSeeder::class);

        $company = Company::factory()->create();

        $role_repository = app(RoleRepository::class);
        $role_repository->createDefaultCompanyRoles($company->id);

        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');
        $this->admin->update(['company_id' => $company->id]);

        $this->actingAs($this->admin);
    }

    public function test_get_warning_threshold_by_storages()
    {
        $response = $this->get('/api/reports/warning_threshold');

        $response->assertOk();
    }

    public function test_get_warning_threshold_in_storage()
    {
        $shop = Shop::factory()->create(['company_id' => $this->admin->company_id]);
        $storage = Storage::factory()->create(['company_id' => $this->admin->company_id, 'shop_id' => $shop->id]);

        $response = $this->get('/api/reports/warning_threshold/' . $storage->id);

        $response->assertOk();
    }

    public function test_get_purchase_recommendations()
    {
        $response = $this->get('/api/reports/purchase_recommendations');

        $response->assertOk();
    }

    public function test_get_profit()
    {
        $response = $this->get('/api/reports/profit');

        $response->assertOk();
    }

    public function test_get_profit_by_day()
    {
        $response = $this->get('/api/reports/profit_by_day');

        $response->assertOk();
    }

    public function test_get_profit_by_category()
    {
        $response = $this->get('/api/reports/profit_by_category');

        $response->assertOk();
    }

    public function test_get_paginated_transactions()
    {
        $response = $this->get('/api/reports/get_paginated_transactions');

        $response->assertOk();
    }

    public function test_get_popular_sell_products()
    {
        $response = $this->get('/api/reports/popular_sell_products');

        $response->assertOk();
    }
}
