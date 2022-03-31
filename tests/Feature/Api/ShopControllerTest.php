<?php

namespace Tests\Feature\Api;

use App\Models\Company;
use App\Models\Shop;
use App\Models\Storage;
use App\Models\User;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShopControllerTest extends TestCase
{
    use RefreshDatabase;

    private $base_route = '/api/shops/';
    private $table = 'shops';
    /**
     * @var User
     */
    private $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesPermissionsSeeder::class);
        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');

        $this->withoutExceptionHandling();
    }

    public function test_admin_can_get_all_shops()
    {
        Company::factory()->create();
        Shop::factory()->create();
        Shop::factory()->create();

        $response = $this->actingAs($this->admin)->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(2, $response['data']);
    }

    public function test_admin_can_create_shop_without_address()
    {
        $company = Company::factory()->create();
        $shop_name = 'Shop 1';
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'name' => $shop_name,
            'company_id' => $company->id
        ]);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => ['name' => $shop_name, 'address' => null]
            ]);
        $this->assertDatabaseHas($this->table, [
            'name' => $shop_name, 'company_id' => $company->id, 'address' => null
        ]);
    }

    public function test_admin_can_create_shop_with_storage()
    {
        $company = Company::factory()->create();
        $shop_name = 'My shop';
        $storage_name = 'Storage in My Shop';
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'name' => $shop_name,
            'company_id' => $company->id,
            'storage_names' => [$storage_name]
        ]);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    'name' => $shop_name,
                    'address' => null,
                    'storages' => [
                        ['name' => $storage_name,]
                    ]
                ]
            ]);
        $this->assertDatabaseHas($this->table, [
            'name' => $shop_name, 'company_id' => $company->id, 'address' => null
        ]);
        $this->assertDatabaseHas('storages', [
            'name' => $storage_name
        ]);
    }

    public function test_admin_can_create_shop_with_address()
    {
        $company = Company::factory()->create();
        $shop_name = 'Shop 2';
        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'name' => $shop_name,
            'company_id' => $company->id,
            'address' => 'some address'
        ]);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => ['name' => $shop_name, 'address' => 'some address']
            ]);
        $this->assertDatabaseHas($this->table, [
            'name' => $shop_name, 'company_id' => $company->id, 'address' => 'some address'
        ]);
    }

    public function test_admin_can_get_shop()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id, 'name' => 'Shop 3']);
        $storage1 = Storage::factory()->create(['shop_id' => $shop->id, 'name' => 'storage1 in shop 3']);
        $storage2 = Storage::factory()->create(['shop_id' => $shop->id, 'name' => 'storage2 in shop 3']);
        $response = $this->actingAs($this->admin)->get($this->base_route . $shop->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $shop->id,
                    'name' => $shop->name,
                    'storages' => [
                        [
                            'id' => $storage1->id,
                            'name' => $storage1->name,
                            'shop_id' => $storage1->shop_id
                        ],
                        [
                            'id' => $storage2->id,
                            'name' => $storage2->name,
                            'shop_id' => $storage2->shop_id
                        ],
                    ]
                ]
            ]);
    }

    public function test_admin_can_edit_shop_name()
    {
        $company = Company::factory()->create(['name' => 'Company name']);
        $shop = Shop::factory()->create(['company_id' => $company->id, 'name' => 'Shop name', 'address' => 'some address']);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route . $shop->id, [
            'name' => 'NEW Shop name', 'address' => $shop->address
        ]);
        $response
            ->assertStatus(202)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'NEW Shop name', 'address' => 'some address']
            ]);

        $this->assertDatabaseHas($this->table, [
            'company_id' => $company->id, 'name' => 'NEW Shop name', 'address' => 'some address'
        ]);
    }

    public function test_admin_can_edit_shop_address()
    {
        $company = Company::factory()->create(['name' => 'My Company name']);
        $shop = Shop::factory()->create(['company_id' => $company->id, 'name' => 'My Shop name']);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route . $shop->id, [
            'name' => 'NEW My Shop name', 'address' => 'my address'
        ]);
        $response
            ->assertStatus(202)
            ->assertJson([
                'success' => true,
                'data' => ['name' => 'NEW My Shop name', 'address' => 'my address']
            ]);
        $this->assertDatabaseHas($this->table, [
            'company_id' => $company->id, 'name' => 'NEW My Shop name', 'address' => 'my address'
        ]);
    }

    public function test_admin_can_add_storage_when_editing()
    {
        $company = Company::factory()->create(['name' => 'Super Company']);
        $shop = Shop::factory()->create(['company_id' => $company->id, 'name' => 'Super Shop']);
        $storage = Storage::factory()->create(['shop_id' => $shop->id, 'name' => 'First Super Storage']);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route . $shop->id, [
            'name' => 'NEW Super Shop name',
            'storage_names' => ['Super Storage']
        ]);
        $response
            ->assertStatus(202)
            ->assertJson([
                'success' => true,
                'data' => [
                    'name' => 'NEW Super Shop name',
                    'storages' => [
                        ['name' => $storage->name],
                        ['name' => 'Super Storage']
                    ]
                ]
            ]);

        $this->assertDatabaseHas($this->table, [
            'company_id' => $company->id, 'name' => 'NEW Super Shop name'
        ]);

        $this->assertDatabaseHas('storages', [
            'shop_id' => $shop->id, 'name' => 'First Super Storage'
        ]);
        $this->assertDatabaseHas('storages', [
            'shop_id' => $shop->id, 'name' => 'Super Storage'
        ]);
    }

    public function test_admin_can_delete_shop()
    {
        $company = Company::factory()->create(['name' => 'My company']);
        $shop = Shop::factory()->create(['company_id' => $company->id, 'name' => 'Shop name']);
        $response = $this->actingAs($this->admin)->deleteJson($this->base_route . $shop->id);
        $response
            ->assertStatus(202)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertSoftDeleted($this->table, ['name' => 'Shop name']);
    }

    public function test_admin_get_shops_for_select()
    {
        $company = Company::factory()->create();
        $shop1 = Shop::factory()->create(['company_id' => $company->id]);
        $shop2 = Shop::factory()->create(['company_id' => $company->id]);
        $shop3 = Shop::factory()->create(['company_id' => $company->id]);
        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'get_by_company', ['company_id' => $company->id]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    ['id' => $shop1->id, 'name' => $shop1->name],
                    ['id' => $shop2->id, 'name' => $shop2->name],
                    ['id' => $shop3->id, 'name' => $shop3->name],
                ]
            ]);
    }
}
