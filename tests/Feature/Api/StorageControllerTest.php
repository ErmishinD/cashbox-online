<?php

namespace Tests\Feature\Api;

use App\Models\Company;
use App\Models\Shop;
use App\Models\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StorageControllerTest extends TestCase
{
    use RefreshDatabase;

    private $base_route = '/api/storages/';
    private $table = 'storages';

    public function test_can_get_all_storages() {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        Storage::factory(4)->create(['shop_id' => $shop->id]);

        $response = $this->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(4, $response['data']);
    }

    public function test_can_create_storage() {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);

        $response = $this->postJson($this->base_route, [
            'shop_id' => $shop->id
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['shop_id' => $shop->id]
            ]);
        $this->assertDatabaseHas($this->table, [
            'shop_id' => $shop->id
        ]);
    }

    public function test_can_get_storage() {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $response = $this->get($this->base_route.$storage->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['id' => $storage->id, 'shop_id' => $storage->shop_id]
            ]);
    }

    public function test_can_edit_storage() {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $shop_2 = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $response = $this->patchJson($this->base_route.$storage->id, ['shop_id' => $shop_2->id]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['shop_id' => $shop_2->id]
            ]);

        $this->assertDatabaseHas($this->table, [
            'shop_id' => $shop_2->id, 'id' => $storage->id
        ]);
    }

    public function test_can_delete_shop() {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $response = $this->deleteJson($this->base_route.$storage->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertDatabaseMissing($this->table, ['name' => 'Shop name']);
    }
}
