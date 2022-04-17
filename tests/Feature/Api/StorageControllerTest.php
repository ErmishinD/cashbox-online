<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Cashbox;
use App\Models\Company;
use App\Models\MeasureType;
use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\Shop;
use App\Models\Storage;
use App\Models\User;
use App\Models\WriteOff;
use Database\Seeders\RolesPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StorageControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $base_route = '/api/storages/';
    private $table = 'storages';
    /**
     * @var User
     */
    private $admin;
    /**
     * @var BaseMeasureType
     */
    private $base_measure_type_volume;
    /**
     * @var BaseMeasureType
     */
    private $base_measure_type_weight;
    /**
     * @var BaseMeasureType
     */
    private $base_measure_type_quantity;
    /**
     * @var User
     */
    private $user_without_roles;

    protected function setUp(): void
    {
        parent::setUp();
        $this->setUpFaker();

        $this->base_measure_type_volume = BaseMeasureType::create(['type' => '_volume', 'name' => 'мл']);
        $this->base_measure_type_weight = BaseMeasureType::create(['type' => '_weight', 'name' => 'г']);
        $this->base_measure_type_quantity = BaseMeasureType::create(['type' => '_quantity', 'name' => 'шт']);

        $this->seed(RolesPermissionsSeeder::class);
        $this->admin = User::factory()->create();
        $this->admin->assignRole('Super Admin');

        $this->user_without_roles = User::factory()->create();
    }

    public function test_admin_can_get_all_storages()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        Storage::factory(4)->create(['shop_id' => $shop->id]);

        $response = $this->actingAs($this->admin)->get($this->base_route);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
        $this->assertCount(4, $response['data']);
    }

    public function test_user_without_roles_cannot_get_all_storages()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        Storage::factory(4)->create(['shop_id' => $shop->id]);

        $response = $this->actingAs($this->user_without_roles)->get($this->base_route);
        $response->assertStatus(403);
    }

    public function test_admin_can_create_storage()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        session()->put('shop_id', $shop->id);

        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
            'shop_id' => $shop->id
        ]);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => ['shop_id' => $shop->id]
            ]);
        $this->assertDatabaseHas($this->table, [
            'shop_id' => $shop->id
        ]);
    }

    public function test_user_without_roles_cannot_create_storage()
    {
        $company = Company::factory()->create();
        $this->user_without_roles->company_id = $company->id;
        $this->user_without_roles->save();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        session()->put('shop_id', $shop->id);

        $response = $this->actingAs($this->user_without_roles)->postJson($this->base_route, [
            'shop_id' => $shop->id
        ]);
        $response->assertStatus(403);
    }

    public function test_admin_can_get_storage()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $response = $this->actingAs($this->admin)->get($this->base_route . $storage->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['id' => $storage->id, 'shop_id' => $storage->shop_id, 'name' => $storage->name]
            ]);
    }

    public function test_user_without_roles_cannot_get_storage()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $response = $this->actingAs($this->user_without_roles)->get($this->base_route . $storage->id);
        $response->assertStatus(403);
    }

    public function test_admin_can_get_storage_with_product_purchase()
    {
        $company = Company::factory()->create();
        $this->admin->update(['company_id' => $company->id]);
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);

        $main_measure_type = MeasureType::factory()->create(['base_measure_type_id' => $this->base_measure_type_volume->id]);
        $measure_type = MeasureType::factory()->create(['base_measure_type_id' => $this->base_measure_type_volume->id]);
        $product_type = ProductType::create([
            'company_id' => $company->id,
            'type' => '_imperishable',
            'base_measure_type_id' => $this->base_measure_type_volume->id,
            'main_measure_type_id' => $main_measure_type->id,
            'name' => $this->faker->word,
            'barcode' => $this->faker->numerify('##########')
        ]);
        $product_purchase = ProductPurchase::factory()->create([
            'storage_id' => $storage->id, 'product_type_id' => $product_type->id
        ]);

        $current_quantity = $product_purchase->current_quantity / $main_measure_type->quantity;


        $response = $this->actingAs($this->admin)->get($this->base_route . $storage->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $storage->id,
                    'shop_id' => $storage->shop_id,
                    'name' => $storage->name,
                    'product_types' => [
                        [
                            'id' => $product_type->id,
                            'name' => $product_type->name,
                            'type' => $product_type->type,
                            'main_measure_type' => ['id' => $main_measure_type->id],
                            'current_quantity_in_main_measure_type' => $current_quantity,
                        ]
                    ],
                ]
            ]);
    }

    public function test_admin_can_edit_storage()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $shop_2 = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $response = $this->actingAs($this->admin)->patchJson($this->base_route . $storage->id, [
            'name' => 'some new storage name'
        ]);
        $response
            ->assertStatus(202)
            ->assertJson([
                'success' => true,
            ]);

        $this->assertDatabaseHas($this->table, [
            'shop_id' => $shop->id, 'id' => $storage->id
        ]);
    }

    public function test_user_without_roles_cannot_edit_storage()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $shop_2 = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $response = $this->actingAs($this->user_without_roles)->patchJson($this->base_route . $storage->id, [
            'shop_id' => $shop_2->id, 'name' => 'some name'
        ]);
        $response->assertStatus(403);
    }

    public function test_admin_can_delete_storage()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $response = $this->actingAs($this->admin)->deleteJson($this->base_route . $storage->id);
        $response
            ->assertStatus(202)
            ->assertJson([
                'success' => true,
            ]);
        $this->assertDatabaseMissing($this->table, ['name' => 'Shop name']);
    }

    public function test_user_without_roles_cannot_delete_storage()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $response = $this->actingAs($this->user_without_roles)->deleteJson($this->base_route . $storage->id);
        $response->assertStatus(403);
    }

    public function test_admin_can_get_storage_balance()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $this->admin->update(['company_id' => $company->id]);

        $purchase1 = ProductPurchase::factory()->create(['company_id' => $company->id, 'storage_id' => $storage->id]);
        $purchase1->update(['cost' => 100, 'current_cost' => 75]);
        $purchase2 = ProductPurchase::factory()->create(['company_id' => $company->id, 'storage_id' => $storage->id]);

        $response = $this->actingAs($this->admin)->post($this->base_route . 'get_balance', ['storage_ids' => []]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'all_balance' => round($purchase1->current_cost + $purchase2->current_cost, 2),
                    'storages' => [
                        [
                            'id' => $storage->id,
                            'name' => $storage->name,
                            'balance' => round($purchase1->current_cost + $purchase2->current_cost, 2),
                        ]
                    ]
                ]
            ]);
    }

    public function test_admin_can_write_off_product_types()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $this->admin->update(['company_id' => $company->id]);

        $product_type1 = ProductType::factory()->create(['company_id' => $company->id]);
        $product_type2 = ProductType::factory()->create(['company_id' => $company->id]);

        $purchase1 = ProductPurchase::factory()->create([
            'company_id' => $company->id, 'storage_id' => $storage->id, 'product_type_id' => $product_type1->id,
            'quantity' => 100, 'current_quantity' => 100, 'cost' => 100, 'current_cost' => 100
        ]);
        $purchase2 = ProductPurchase::factory()->create([
            'company_id' => $company->id, 'storage_id' => $storage->id, 'product_type_id' => $product_type2->id,
            'quantity' => 1000, 'current_quantity' => 1000, 'cost' => 500, 'current_cost' => 500
        ]);

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'write_off', [
            'storage_id' => $storage->id,
            'product_types' => [
                [
                    'id' => $product_type1->id,
                    'quantity' => 50,
                ],
                [
                    'id' => $product_type2->id,
                    'quantity' => 250,
                ],

            ]
        ]);

        $response->assertNoContent();

        $this->assertDatabaseHas('product_purchases', [
            'company_id' => $company->id,
            'storage_id' => $storage->id,
            'product_type_id' => $product_type1->id,
            'quantity' => 100,
            'current_quantity' => 50,
            'cost' => 100,
            'current_cost' => 50
        ]);
        $this->assertDatabaseHas('product_purchases', [
            'company_id' => $company->id,
            'storage_id' => $storage->id,
            'product_type_id' => $product_type2->id,
            'quantity' => 1000,
            'current_quantity' => 750,
            'cost' => 500,
            'current_cost' => 375
        ]);

//        $write_off1_from_db = WriteOff::query()
//            ->where('company_id', $company->id)
//            ->where('storage_id', $storage->id)
//            ->where('product_type_id', $product_type1->id)
//            ->where('quantity', 50)
//            ->get();
//        $this->assertCount(1, $write_off1_from_db);
//        $write_off1_from_db = $write_off1_from_db->first();
//        $this->assertEquals($purchase1->id, $write_off1_from_db->data[0]['id']);
//        $this->assertEquals(50, $write_off1_from_db->data[0]['quantity']);
//        $this->assertEquals(50, $write_off1_from_db->data[0]['cost']);
//        $purchase1_expiration_date = $purchase1->expiration_date
//            ? $purchase1->expiration_date->format('Y-m-d')
//            : null;
//        $this->assertEquals($purchase1_expiration_date, $write_off1_from_db->data[0]['expiration_data']);
//
//        $write_off2_from_db = WriteOff::query()
//            ->where('company_id', $company->id)
//            ->where('storage_id', $storage->id)
//            ->where('product_type_id', $product_type2->id)
//            ->where('quantity', 250)
//            ->get();
//        $this->assertCount(1, $write_off2_from_db);
//        $write_off2_from_db = $write_off2_from_db->first();
//        $this->assertEquals($purchase2->id, $write_off2_from_db->data[0]['id']);
//        $this->assertEquals(250, $write_off2_from_db->data[0]['quantity']);
//        $this->assertEquals(125, $write_off2_from_db->data[0]['cost']);
//        $purchase2_expiration_date = $purchase2->expiration_date
//            ? $purchase2->expiration_date->format('Y-m-d')
//            : null;
//        $this->assertEquals($purchase2_expiration_date, $write_off2_from_db->data[0]['expiration_data']);

        $this->assertDatabaseHas('product_purchases', [
            'company_id' => $company->id,
            'storage_id' => $storage->id,
            'product_type_id' => $product_type1->id,
            'quantity' => 100,
            'current_quantity' => 50,
            'cost' => 100,
            'current_cost' => 50
        ]);
        $this->assertDatabaseHas('product_purchases', [
            'company_id' => $company->id,
            'storage_id' => $storage->id,
            'product_type_id' => $product_type2->id,
            'quantity' => 1000,
            'current_quantity' => 750,
            'cost' => 500,
            'current_cost' => 375
        ]);

        $this->assertDatabaseHas('write_offs', [
            'company_id' => $company->id,
            'storage_id' => $storage->id,
            'product_type_id' => $product_type1->id,
            'quantity' => 50,
            'data' => $this->castAsJson([
                [
                    'id' => $purchase1->id,
                    'quantity' => 50,
                    'cost' => 50,
                    'expiration_date' => $purchase1->expiration_date
                        ? $purchase1->expiration_date->format('Y-m-d')
                        : null
                ]
            ])
        ]);
        $this->assertDatabaseHas('write_offs', [
            'company_id' => $company->id,
            'storage_id' => $storage->id,
            'product_type_id' => $product_type2->id,
            'quantity' => 250,
            'data' => $this->castAsJson([
                [
                    'id' => $purchase2->id,
                    'quantity' => 250,
                    'cost' => 125,
                    'expiration_date' => $purchase2->expiration_date
                        ? $purchase2->expiration_date->format('Y-m-d')
                        : null
                ]
            ])
        ]);
    }

    public function test_admin_can_transfer_product_types()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $storage2 = Storage::factory()->create(['shop_id' => $shop->id]);
        $this->admin->update(['company_id' => $company->id]);

        $product_type1 = ProductType::factory()->create(['company_id' => $company->id]);
        $product_type2 = ProductType::factory()->create(['company_id' => $company->id]);

        $purchase1 = ProductPurchase::factory()->create([
            'company_id' => $company->id, 'storage_id' => $storage->id, 'product_type_id' => $product_type1->id,
            'quantity' => 100, 'current_quantity' => 100, 'cost' => 100, 'current_cost' => 100
        ]);
        $purchase2 = ProductPurchase::factory()->create([
            'company_id' => $company->id, 'storage_id' => $storage->id, 'product_type_id' => $product_type2->id,
            'quantity' => 1000, 'current_quantity' => 1000, 'cost' => 500, 'current_cost' => 500
        ]);

        $response = $this->actingAs($this->admin)->postJson($this->base_route . 'transfer', [
            'from_storage_id' => $storage->id,
            'to_storage_id' => $storage2->id,
            'product_types' => [
                [
                    'id' => $product_type1->id,
                    'quantity' => 50,
                ],
                [
                    'id' => $product_type2->id,
                    'quantity' => 250,
                ],

            ]
        ]);

        $response->assertNoContent();

        $this->assertDatabaseHas('product_purchases', [
            'company_id' => $company->id,
            'storage_id' => $storage->id,
            'product_type_id' => $product_type1->id,
            'quantity' => 100,
            'current_quantity' => 50,
            'cost' => 100,
            'current_cost' => 50
        ]);
        $this->assertDatabaseHas('product_purchases', [
            'company_id' => $company->id,
            'storage_id' => $storage2->id,
            'product_type_id' => $product_type1->id,
            'quantity' => 50,
            'current_quantity' => 50,
            'cost' => 50,
            'current_cost' => 50
        ]);

        $this->assertDatabaseHas('product_purchases', [
            'company_id' => $company->id,
            'storage_id' => $storage->id,
            'product_type_id' => $product_type2->id,
            'quantity' => 1000,
            'current_quantity' => 750,
            'cost' => 500,
            'current_cost' => 375
        ]);
        $this->assertDatabaseHas('product_purchases', [
            'company_id' => $company->id,
            'storage_id' => $storage2->id,
            'product_type_id' => $product_type2->id,
            'quantity' => 250,
            'current_quantity' => 250,
            'cost' => 125,
            'current_cost' => 125
        ]);

        $this->assertDatabaseHas('transfers', [
            'company_id' => $company->id,
            'from_storage_id' => $storage->id,
            'to_storage_id' => $storage2->id,
            'transferred_by' => $this->admin->id,
            'data' => $this->castAsJson([
                [
                    'id' => $purchase1->id,
                    'quantity' => 50,
                    'cost' => 50,
                    'expiration_date' => $purchase1->expiration_date
                        ? $purchase1->expiration_date->format('Y-m-d')
                        : null
                ]
            ])
        ]);
        $this->assertDatabaseHas('transfers', [
            'company_id' => $company->id,
            'from_storage_id' => $storage->id,
            'to_storage_id' => $storage2->id,
            'transferred_by' => $this->admin->id,
            'data' => $this->castAsJson([
                [
                    'id' => $purchase2->id,
                    'quantity' => 250,
                    'cost' => 125,
                    'expiration_date' => $purchase2->expiration_date
                        ? $purchase2->expiration_date->format('Y-m-d')
                        : null
                ]
            ])
        ]);
    }

}
