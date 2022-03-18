<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Company;
use App\Models\MeasureType;
use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\Shop;
use App\Models\Storage;
use App\Models\User;
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

        $response = $this->actingAs($this->admin)->postJson($this->base_route, [
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

    public function test_user_without_roles_cannot_create_storage()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);

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
            'photo' => $this->faker->imageUrl,
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
                    'product_purchases' => [
                        $product_type->name => [
                            'current_quantity_in_main_measure_type' => $current_quantity,
                            'product_type' => [
                                'id' => $product_type->id,
                                'name' => $product_type->name,
                                'type' => $product_type->type,
                                'photo' => $product_type->photo,
                                'base_measure_type_id' => $product_type->base_measure_type_id,
                                'barcode' => $product_type->barcode
                            ],
                            'measure_type' => [
                                'id' => $main_measure_type->id,
                                'base_measure_type_id' => $main_measure_type->base_measure_type_id,
                                'name' => $main_measure_type->name,
                                'description' => $main_measure_type->description,
                                'quantity' => $main_measure_type->quantity,
                            ],
                            'data' => [
                                [
                                    'id' => $product_purchase->id,
                                    'product_type_id' => $product_purchase->product_type_id,
                                    'measure_type_id' => $product_purchase->measure_type_id,
                                    'quantity' => $product_purchase->quantity,
                                    'current_quantity' => $product_purchase->current_quantity,
                                    'cost' => $product_purchase->cost,
                                    'expiration_date' => $product_purchase->expiration_date,
                                ]
                            ]
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
        $response = $this->actingAs($this->admin)->patchJson($this->base_route . $storage->id, ['shop_id' => $shop_2->id]);
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

    public function test_user_without_roles_cannot_edit_storage()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $shop_2 = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $response = $this->actingAs($this->user_without_roles)->patchJson($this->base_route . $storage->id, ['shop_id' => $shop_2->id]);
        $response->assertStatus(403);
    }

    public function test_admin_can_delete_storage()
    {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $response = $this->actingAs($this->admin)->deleteJson($this->base_route . $storage->id);
        $response
            ->assertStatus(200)
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

//    public function test_admin_can_get_info_for_dashboard()
//    {
//        $company = Company::factory()->create();
//        $shop = Shop::factory()->create(['company_id' => $company->id]);
//        $storage1 = Storage::factory()->create(['shop_id' => $shop->id]);
//        $storage2 = Storage::factory()->create(['shop_id' => $shop->id]);
//
//        $main_measure_type = MeasureType::factory()->create(['base_measure_type_id' => $this->base_measure_type_volume->id]);
//        $measure_type = MeasureType::factory()->create(['base_measure_type_id' => $this->base_measure_type_volume->id]);
//        $product_type1 = ProductType::create([
//            'company_id' => $company->id,
//            'type' => '_imperishable',
//            'base_measure_type_id' => $this->base_measure_type_volume->id,
//            'main_measure_type_id' => $main_measure_type->id,
//            'name' => $this->faker->word,
//            'photo' => $this->faker->imageUrl,
//            'barcode' => $this->faker->numerify('##########')
//        ]);
//        $product_purchase1 = ProductPurchase::factory()->create([
//            'storage_id' => $storage1->id, 'measure_type_id' => $measure_type->id, 'product_type_id' => $product_type1->id
//        ]);
//
//        $current_quantity1 = ($product_purchase1->current_quantity * $measure_type->quantity) / $main_measure_type->quantity;
//
//        $product_type2 = ProductType::create([
//            'company_id' => $company->id,
//            'type' => '_imperishable',
//            'base_measure_type_id' => $this->base_measure_type_volume->id,
//            'main_measure_type_id' => $main_measure_type->id,
//            'name' => $this->faker->word,
//            'photo' => $this->faker->imageUrl,
//            'barcode' => $this->faker->numerify('##########')
//        ]);
//        $product_purchase2 = ProductPurchase::factory()->create([
//            'storage_id' => $storage2->id, 'measure_type_id' => $measure_type->id, 'product_type_id' => $product_type2->id
//        ]);
//
//        $current_quantity2 = ($product_purchase2->current_quantity * $measure_type->quantity) / $main_measure_type->quantity;
//
//        $response = $this->actingAs($this->admin)->postJson($this->base_route.'get_for_dashboard', ['shop_id' => $shop->id]);
//
//        $response
//            ->assertStatus(200)
//            ->assertJson([
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => $product_type1->id,
//                        'name' => $product_type1->name,
//                        'current_quantity' => $product_purchase1->current_quantity
//                    ]
//                ]
//            ]);
//        $response
//            ->assertStatus(200)
//            ->assertJson([
//                'success' => true,
//                'data' => [
//                    [
//                        'id' => $storage1->id,
//                        'shop_id' => $storage1->shop_id,
//                        'name' => $storage1->name,
//                        'product_purchases' => [
//                            $product_type1->name => [
//                                'current_quantity' => $current_quantity1,
//                                'product_type' => [
//                                    'id' => $product_type1->id,
//                                    'company_id' => $product_type1->company_id,
//                                    'name' => $product_type1->name,
//                                    'type' => $product_type1->type,
//                                    'photo' => $product_type1->photo,
//                                    'base_measure_type_id' => $product_type1->base_measure_type_id,
//                                    'barcode' => $product_type1->barcode
//                                ],
//                                'measure_type' => [
//                                    'id' => $main_measure_type->id,
//                                    'base_measure_type_id' => $main_measure_type->base_measure_type_id,
//                                    'name' => $main_measure_type->name,
//                                    'description' => $main_measure_type->description,
//                                    'quantity' => $main_measure_type->quantity,
//                                    'company_id' => $main_measure_type->company_id,
//                                    'is_common' => $main_measure_type->is_common,
//                                ],
//                                'data' => [
//                                    [
//                                        'id' => $product_purchase1->id,
//                                        'product_type_id' => $product_purchase1->product_type_id,
//                                        'measure_type_id' => $product_purchase1->measure_type_id,
//                                        'quantity' => $product_purchase1->quantity,
//                                        'current_quantity' => $product_purchase1->current_quantity,
//                                        'cost' => $product_purchase1->cost,
//                                        'expiration_date' => $product_purchase1->expiration_date,
//                                    ]
//                                ]
//                            ]
//                        ],
//                    ],
//                    [
//                        'id' => $storage2->id,
//                        'shop_id' => $storage2->shop_id,
//                        'name' => $storage2->name,
//                        'product_purchases' => [
//                            $product_type2->name => [
//                                'current_quantity' => $current_quantity2,
//                                'product_type' => [
//                                    'id' => $product_type2->id,
//                                    'company_id' => $product_type2->company_id,
//                                    'name' => $product_type2->name,
//                                    'type' => $product_type2->type,
//                                    'photo' => $product_type2->photo,
//                                    'base_measure_type_id' => $product_type2->base_measure_type_id,
//                                    'barcode' => $product_type2->barcode
//                                ],
//                                'measure_type' => [
//                                    'id' => $main_measure_type->id,
//                                    'base_measure_type_id' => $main_measure_type->base_measure_type_id,
//                                    'name' => $main_measure_type->name,
//                                    'description' => $main_measure_type->description,
//                                    'quantity' => $main_measure_type->quantity,
//                                    'company_id' => $main_measure_type->company_id,
//                                    'is_common' => $main_measure_type->is_common,
//                                ],
//                                'data' => [
//                                    [
//                                        'id' => $product_purchase2->id,
//                                        'product_type_id' => $product_purchase2->product_type_id,
//                                        'measure_type_id' => $product_purchase2->measure_type_id,
//                                        'quantity' => $product_purchase2->quantity,
//                                        'current_quantity' => $product_purchase2->current_quantity,
//                                        'cost' => $product_purchase2->cost,
//                                        'expiration_date' => $product_purchase2->expiration_date,
//                                    ]
//                                ]
//                            ]
//                        ],
//                    ],
//                ]
//            ]);
//    }
}
