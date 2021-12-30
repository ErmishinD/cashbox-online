<?php

namespace Tests\Feature\Api;

use App\Models\Company;
use App\Models\Shop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShopControllerTest extends TestCase
{
    use RefreshDatabase;

    private $base_route = '/api/shops/';
    private $table = 'shops';

    public function test_can_get_all_shops() {
        Company::factory()->create();
        Shop::factory()->create();
        Shop::factory()->create();

        $response = $this->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(2, $response['data']);
    }

    public function test_can_create_shop_without_address() {
        $company = Company::factory()->create();
        $shop_name = 'Shop 1';
        $response = $this->postJson($this->base_route, [
            'name' => $shop_name,
            'company_id' => $company->id
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => $shop_name, 'address' => null]
            ]);
        $this->assertDatabaseHas($this->table, [
            'name' => $shop_name, 'company_id' => $company->id, 'address' => null
        ]);
    }

    public function test_can_create_shop_with_address() {
        $company = Company::factory()->create();
        $shop_name = 'Shop 2';
        $response = $this->postJson($this->base_route, [
            'name' => $shop_name,
            'company_id' => $company->id,
            'address' => 'some address'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => $shop_name, 'address' => 'some address']
            ]);
        $this->assertDatabaseHas($this->table, [
            'name' => $shop_name, 'company_id' => $company->id, 'address' => 'some address'
        ]);
    }

    public function test_can_get_shop() {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id, 'name' => 'Shop 3']);
        $response = $this->get($this->base_route.$shop->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'Shop 3']
            ]);
    }

    public function test_can_edit_shop_name() {
        $company = Company::factory()->create(['name' => 'Company name']);
        $shop = Shop::factory()->create(['company_id' => $company->id, 'name' => 'Shop name', 'address' => 'some address']);
        $response = $this->patchJson($this->base_route.$shop->id, ['name' => 'NEW Shop name']);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'NEW Shop name', 'address' => 'some address']
            ]);

        $this->assertDatabaseHas($this->table, [
            'company_id' => $company->id, 'name' => 'NEW Shop name', 'address' => 'some address'
        ]);
    }

    public function test_can_edit_shop_address() {
        $company = Company::factory()->create(['name' => 'My Company name']);
        $shop = Shop::factory()->create(['company_id' => $company->id, 'name' => 'My Shop name']);
        $response = $this->patchJson($this->base_route.$shop->id, [
            'name' => 'NEW My Shop name', 'address' => 'my address'
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'NEW My Shop name', 'address' => 'my address']
            ]);
        $this->assertDatabaseHas($this->table, [
            'company_id' => $company->id, 'name' => 'NEW My Shop name', 'address' => 'my address'
        ]);
    }

    public function test_can_delete_shop() {
        $company = Company::factory()->create(['name' => 'My company']);
        $shop = Shop::factory()->create(['company_id' => $company->id, 'name' => 'Shop name']);
        $response = $this->deleteJson($this->base_route.$shop->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertDatabaseMissing($this->table, ['name' => 'Shop name']);
    }
}
