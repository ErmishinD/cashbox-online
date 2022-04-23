<?php

namespace Tests\Feature\Api;


use App\Models\Company;
use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\Shop;
use App\Models\Storage;
use App\Models\Transfer;
use App\Models\User;
use App\Models\WriteOff;
use App\Repositories\RoleRepository;
use Database\Seeders\BaseMeasureTypeSeeder;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransferControllerTest extends TestCase
{
    use RefreshDatabase;

    private $base_route = '/api/transfers/';
    private $table = 'transfers';
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
        $storage1 = Storage::factory()->create(['company_id' => $this->admin->company_id, 'shop_id' => $shop->id]);
        $storage2 = Storage::factory()->create(['company_id' => $this->admin->company_id, 'shop_id' => $shop->id]);
        ProductType::factory()->count(5)->create(['company_id' => $this->admin->company_id]);

        $product_purchase = ProductPurchase::factory()->create(['company_id' => $this->admin->company_id, 'storage_id' => $storage2->id]);

        Transfer::factory()->create([
            'company_id' => $this->admin->company_id,
            'from_storage_id' => $storage1->id,
            'to_storage_id' => $storage2->id,
            'transferred_by' => $this->admin->id,
            'product_purchase_id' => $product_purchase->id
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
        $storage1 = Storage::factory()->create(['company_id' => $this->admin->company_id, 'shop_id' => $shop->id]);
        $storage2 = Storage::factory()->create(['company_id' => $this->admin->company_id, 'shop_id' => $shop->id]);
        ProductType::factory()->count(5)->create(['company_id' => $this->admin->company_id]);

        $product_purchase = ProductPurchase::factory()->create(['company_id' => $this->admin->company_id, 'storage_id' => $storage2->id]);

        Transfer::factory()->count(5)->create([
            'company_id' => $this->admin->company_id,
            'from_storage_id' => $storage1->id,
            'to_storage_id' => $storage2->id,
            'transferred_by' => $this->admin->id,
            'product_purchase_id' => $product_purchase->id
        ]);

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_paginated', [
            'per_page' => 1,
            'page' => 2
        ]);
        $response->assertStatus(200)->assertJsonCount(1, 'pagination.data');
    }

    public function test_can_get_transfer()
    {
        $shop = Shop::factory()->create(['company_id' => $this->admin->company_id]);
        $storage1 = Storage::factory()->create(['company_id' => $this->admin->company_id, 'shop_id' => $shop->id]);
        $storage2 = Storage::factory()->create(['company_id' => $this->admin->company_id, 'shop_id' => $shop->id]);
        ProductType::factory()->count(5)->create(['company_id' => $this->admin->company_id]);

        $product_purchase = ProductPurchase::factory()->create(['company_id' => $this->admin->company_id, 'storage_id' => $storage2->id]);

        $transfer1 = Transfer::factory()->create([
            'company_id' => $this->admin->company_id,
            'from_storage_id' => $storage1->id,
            'to_storage_id' => $storage2->id,
            'transferred_by' => $this->admin->id,
            'product_purchase_id' => $product_purchase->id
        ]);
        Transfer::factory()->count(4)->create([
            'company_id' => $this->admin->company_id,
            'from_storage_id' => $storage1->id,
            'to_storage_id' => $storage2->id,
            'transferred_by' => $this->admin->id,
            'product_purchase_id' => $product_purchase->id,
            'parent_id' => $transfer1->id
        ]);


        $response = $this->actingAs($this->admin)->get($this->base_route . $transfer1->id);

        $response->assertStatus(200)->assertJsonCount(5, 'data.product_types');
    }
}
