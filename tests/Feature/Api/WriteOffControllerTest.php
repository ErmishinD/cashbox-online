<?php

namespace Tests\Feature\Api;


use App\Models\Company;
use App\Models\ProductType;
use App\Models\Shop;
use App\Models\Storage;
use App\Models\User;
use App\Models\WriteOff;
use App\Repositories\RoleRepository;
use Database\Seeders\BaseMeasureTypeSeeder;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WriteOffControllerTest extends TestCase
{
    use RefreshDatabase;

    private $base_route = '/api/write_offs/';
    private $table = 'write_offs';
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
        $shop = Shop::factory()->create(['company_id' => $this->admin->company_id]);
        $storage = Storage::factory()->create(['company_id' => $this->admin->company_id, 'shop_id' => $shop->id]);
        $product_type = ProductType::factory()->create(['company_id' => $this->admin->company_id]);

        WriteOff::factory()->count(5)->create([
            'company_id' => $this->admin->company_id,
            'storage_id' => $storage->id,
            'product_type_id' => $product_type->id,
            'user_id' => $this->admin->id
        ]);

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', [
            'per_page' => 1,
            'page' => 1
        ]);
        $response->assertStatus(200)->assertJsonCount(1, 'pagination.data');
    }

    public function test_can_get_second_page()
    {
        $shop = Shop::factory()->create(['company_id' => $this->admin->company_id]);
        $storage = Storage::factory()->create(['company_id' => $this->admin->company_id, 'shop_id' => $shop->id]);
        $product_type = ProductType::factory()->create(['company_id' => $this->admin->company_id]);

        WriteOff::factory()->count(5)->create([
            'company_id' => $this->admin->company_id,
            'storage_id' => $storage->id,
            'product_type_id' => $product_type->id,
            'user_id' => $this->admin->id
        ]);

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', [
            'per_page' => 1,
            'page' => 2
        ]);
        $response->assertStatus(200)->assertJsonCount(1, 'pagination.data');
    }

    public function test_can_get_write_off()
    {
        $shop = Shop::factory()->create(['company_id' => $this->admin->company_id]);
        $storage = Storage::factory()->create(['company_id' => $this->admin->company_id, 'shop_id' => $shop->id]);
        $product_type = ProductType::factory()->create(['company_id' => $this->admin->company_id]);

        $write_off1 = WriteOff::factory()->create([
            'company_id' => $this->admin->company_id,
            'storage_id' => $storage->id,
            'product_type_id' => $product_type->id,
            'user_id' => $this->admin->id
        ]);
        WriteOff::factory()->count(4)->create([
            'company_id' => $this->admin->company_id,
            'storage_id' => $storage->id,
            'product_type_id' => $product_type->id,
            'user_id' => $this->admin->id,
            'parent_id' => $write_off1->id
        ]);

        $response = $this->actingAs($this->admin)->get($this->base_route . $write_off1->id);

        $response->assertStatus(200)->assertJsonCount(5, 'data.product_types');
    }
}
