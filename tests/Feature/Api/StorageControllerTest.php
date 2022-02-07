<?php

namespace Tests\Feature\Api;

use App\Models\BaseMeasureType;
use App\Models\Company;
use App\Models\MeasureType;
use App\Models\ProductPurchase;
use App\Models\ProductType;
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

    protected function setUp(): void
    {
        parent::setUp();
        BaseMeasureType::create(['type' => '_volume', 'name' => 'мл']);
        BaseMeasureType::create(['type' => '_weight', 'name' => 'г']);
        BaseMeasureType::create(['type' => '_quantity', 'name' => 'шт']);

//        $this->withoutExceptionHandling();
    }

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

    public function test_can_get_storage_with_one_product_purchase() {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $product_type = ProductType::factory()->create(['company_id' => $company->id, 'type' => '_imperishable']);
        $measure_type = MeasureType::factory()->create(['base_measure_type_id' => $product_type->base_measure_type_id]);
        $product_purchase = ProductPurchase::factory()->create([
            'storage_id' => $storage->id, 'measure_type_id' => $measure_type->id, 'product_type_id' => $product_type->id
            ]);
        $response = $this->get($this->base_route.$storage->id);
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
                            'current_quantity' => $product_purchase->current_quantity,
                            'data' => [
                                [
                                    'id' => $product_purchase->id,
                                    'product_type_id' => $product_purchase->product_type_id,
                                    'measure_type_id' => $product_purchase->measure_type_id,
                                    'quantity' => $product_purchase->quantity,
                                    'current_quantity' => $product_purchase->current_quantity,
                                    'cost' => $product_purchase->cost,
                                    'expiration_date' => $product_purchase->expiration_date,
                                    'product_type' => [
                                        'id' => $product_type->id,
                                        'company_id' => $product_type->company_id,
                                        'name' => $product_type->name,
                                        'type' => $product_type->type,
                                        'photo' => $product_type->photo,
                                        'base_measure_type_id' => $product_type->base_measure_type_id,
                                        'barcode' => $product_type->barcode
                                    ],
                                ]
                            ]
                        ]
                    ],
                ]
            ]);
    }

    public function test_can_get_storage_with_some_product_purchases_but_one_product() {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $product_type = ProductType::factory()->create(['company_id' => $company->id, 'type' => '_imperishable']);
        $measure_type = MeasureType::factory()->create(['base_measure_type_id' => $product_type->base_measure_type_id]);
        $product_purchase1 = ProductPurchase::factory()->create([
            'storage_id' => $storage->id, 'measure_type_id' => $measure_type->id, 'product_type_id' => $product_type->id
            ]);
        $product_purchase2 = ProductPurchase::factory()->create([
            'storage_id' => $storage->id, 'measure_type_id' => $measure_type->id, 'product_type_id' => $product_type->id
            ]);

        $response = $this->get($this->base_route.$storage->id);
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
                            'current_quantity' => $product_purchase1->current_quantity + $product_purchase2->current_quantity,
                            'data' => [
                                [
                                    'id' => $product_purchase1->id,
                                    'product_type_id' => $product_purchase1->product_type_id,
                                    'measure_type_id' => $product_purchase1->measure_type_id,
                                    'quantity' => $product_purchase1->quantity,
                                    'current_quantity' => $product_purchase1->current_quantity,
                                    'cost' => $product_purchase1->cost,
                                    'expiration_date' => $product_purchase1->expiration_date,
                                    'product_type' => [
                                        'id' => $product_type->id,
                                        'company_id' => $product_type->company_id,
                                        'name' => $product_type->name,
                                        'type' => $product_type->type,
                                        'photo' => $product_type->photo,
                                        'base_measure_type_id' => $product_type->base_measure_type_id,
                                        'barcode' => $product_type->barcode
                                    ],
                                ],
                                [
                                    'id' => $product_purchase2->id,
                                    'product_type_id' => $product_purchase2->product_type_id,
                                    'measure_type_id' => $product_purchase2->measure_type_id,
                                    'quantity' => $product_purchase2->quantity,
                                    'current_quantity' => $product_purchase2->current_quantity,
                                    'cost' => $product_purchase2->cost,
                                    'expiration_date' => $product_purchase2->expiration_date,
                                    'product_type' => [
                                        'id' => $product_type->id,
                                        'company_id' => $product_type->company_id,
                                        'name' => $product_type->name,
                                        'type' => $product_type->type,
                                        'photo' => $product_type->photo,
                                        'base_measure_type_id' => $product_type->base_measure_type_id,
                                        'barcode' => $product_type->barcode
                                    ],
                                ],
                            ]
                        ]
                    ],
                ]
            ]);
    }

    public function test_can_get_storage_with_some_products_but_one_product_purchase_for_each() {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $product_type1 = ProductType::factory()->create(['company_id' => $company->id, 'type' => '_imperishable']);
        $product_type2 = ProductType::factory()->create(['company_id' => $company->id, 'type' => '_imperishable']);
        $measure_type1 = MeasureType::factory()->create(['base_measure_type_id' => $product_type1->base_measure_type_id]);
        $measure_type2 = MeasureType::factory()->create(['base_measure_type_id' => $product_type2->base_measure_type_id]);
        $product_purchase1 = ProductPurchase::factory()->create([
            'storage_id' => $storage->id, 'measure_type_id' => $measure_type1->id, 'product_type_id' => $product_type1->id
        ]);
        $product_purchase2 = ProductPurchase::factory()->create([
            'storage_id' => $storage->id, 'measure_type_id' => $measure_type2->id, 'product_type_id' => $product_type2->id
        ]);

        $response = $this->get($this->base_route.$storage->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $storage->id,
                    'shop_id' => $storage->shop_id,
                    'name' => $storage->name,
                    'product_purchases' => [
                        $product_type1->name => [
                            'current_quantity' => $product_purchase1->current_quantity,
                            'data' => [
                                [
                                    'id' => $product_purchase1->id,
                                    'product_type_id' => $product_purchase1->product_type_id,
                                    'measure_type_id' => $product_purchase1->measure_type_id,
                                    'quantity' => $product_purchase1->quantity,
                                    'current_quantity' => $product_purchase1->current_quantity,
                                    'cost' => $product_purchase1->cost,
                                    'expiration_date' => $product_purchase1->expiration_date,
                                    'product_type' => [
                                        'id' => $product_type1->id,
                                        'company_id' => $product_type1->company_id,
                                        'name' => $product_type1->name,
                                        'type' => $product_type1->type,
                                        'photo' => $product_type1->photo,
                                        'base_measure_type_id' => $product_type1->base_measure_type_id,
                                        'barcode' => $product_type1->barcode
                                    ],
                                ],
                            ]
                        ],
                        $product_type2->name => [
                            'current_quantity' => $product_purchase2->current_quantity,
                            'data' => [
                                [
                                    'id' => $product_purchase2->id,
                                    'product_type_id' => $product_purchase2->product_type_id,
                                    'measure_type_id' => $product_purchase2->measure_type_id,
                                    'quantity' => $product_purchase2->quantity,
                                    'current_quantity' => $product_purchase2->current_quantity,
                                    'cost' => $product_purchase2->cost,
                                    'expiration_date' => $product_purchase2->expiration_date,
                                    'product_type' => [
                                        'id' => $product_type2->id,
                                        'company_id' => $product_type2->company_id,
                                        'name' => $product_type2->name,
                                        'type' => $product_type2->type,
                                        'photo' => $product_type2->photo,
                                        'base_measure_type_id' => $product_type2->base_measure_type_id,
                                        'barcode' => $product_type2->barcode
                                    ],
                                ],
                            ]
                        ],
                    ],
                ]
            ]);
    }

    public function test_can_get_storage_with_some_product_purchases_for_some_products() {
        $company = Company::factory()->create();
        $shop = Shop::factory()->create(['company_id' => $company->id]);
        $storage = Storage::factory()->create(['shop_id' => $shop->id]);
        $product_type1 = ProductType::factory()->create(['company_id' => $company->id, 'type' => '_imperishable']);
        $product_type2 = ProductType::factory()->create(['company_id' => $company->id, 'type' => '_imperishable']);
        $measure_type1 = MeasureType::factory()->create(['base_measure_type_id' => $product_type1->base_measure_type_id]);
        $measure_type2 = MeasureType::factory()->create(['base_measure_type_id' => $product_type2->base_measure_type_id]);
        $product_purchase1 = ProductPurchase::factory()->create([
            'storage_id' => $storage->id, 'measure_type_id' => $measure_type1->id, 'product_type_id' => $product_type1->id
        ]);
        $product_purchase2 = ProductPurchase::factory()->create([
            'storage_id' => $storage->id, 'measure_type_id' => $measure_type1->id, 'product_type_id' => $product_type1->id
        ]);

        $product_purchase3 = ProductPurchase::factory()->create([
            'storage_id' => $storage->id, 'measure_type_id' => $measure_type2->id, 'product_type_id' => $product_type2->id
        ]);
        $product_purchase4 = ProductPurchase::factory()->create([
            'storage_id' => $storage->id, 'measure_type_id' => $measure_type2->id, 'product_type_id' => $product_type2->id
        ]);

        $response = $this->get($this->base_route.$storage->id);
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $storage->id,
                    'shop_id' => $storage->shop_id,
                    'name' => $storage->name,
                    'product_purchases' => [
                        $product_type1->name => [
                            'current_quantity' => $product_purchase1->current_quantity + $product_purchase2->current_quantity,
                            'data' => [
                                [
                                    'id' => $product_purchase1->id,
                                    'product_type_id' => $product_purchase1->product_type_id,
                                    'measure_type_id' => $product_purchase1->measure_type_id,
                                    'quantity' => $product_purchase1->quantity,
                                    'current_quantity' => $product_purchase1->current_quantity,
                                    'cost' => $product_purchase1->cost,
                                    'expiration_date' => $product_purchase1->expiration_date,
                                    'product_type' => [
                                        'id' => $product_type1->id,
                                        'company_id' => $product_type1->company_id,
                                        'name' => $product_type1->name,
                                        'type' => $product_type1->type,
                                        'photo' => $product_type1->photo,
                                        'base_measure_type_id' => $product_type1->base_measure_type_id,
                                        'barcode' => $product_type1->barcode
                                    ],
                                ],
                                [
                                    'id' => $product_purchase2->id,
                                    'product_type_id' => $product_purchase2->product_type_id,
                                    'measure_type_id' => $product_purchase2->measure_type_id,
                                    'quantity' => $product_purchase2->quantity,
                                    'current_quantity' => $product_purchase2->current_quantity,
                                    'cost' => $product_purchase2->cost,
                                    'expiration_date' => $product_purchase2->expiration_date,
                                    'product_type' => [
                                        'id' => $product_type1->id,
                                        'company_id' => $product_type1->company_id,
                                        'name' => $product_type1->name,
                                        'type' => $product_type1->type,
                                        'photo' => $product_type1->photo,
                                        'base_measure_type_id' => $product_type1->base_measure_type_id,
                                        'barcode' => $product_type1->barcode
                                    ],
                                ],
                            ]
                        ],
                        $product_type2->name => [
                            'current_quantity' => $product_purchase3->current_quantity + $product_purchase4->current_quantity,
                            'data' => [
                                [
                                    'id' => $product_purchase3->id,
                                    'product_type_id' => $product_purchase3->product_type_id,
                                    'measure_type_id' => $product_purchase3->measure_type_id,
                                    'quantity' => $product_purchase3->quantity,
                                    'current_quantity' => $product_purchase3->current_quantity,
                                    'cost' => $product_purchase3->cost,
                                    'expiration_date' => $product_purchase3->expiration_date,
                                    'product_type' => [
                                        'id' => $product_type2->id,
                                        'company_id' => $product_type2->company_id,
                                        'name' => $product_type2->name,
                                        'type' => $product_type2->type,
                                        'photo' => $product_type2->photo,
                                        'base_measure_type_id' => $product_type2->base_measure_type_id,
                                        'barcode' => $product_type2->barcode
                                    ],
                                ],
                                [
                                    'id' => $product_purchase4->id,
                                    'product_type_id' => $product_purchase4->product_type_id,
                                    'measure_type_id' => $product_purchase4->measure_type_id,
                                    'quantity' => $product_purchase4->quantity,
                                    'current_quantity' => $product_purchase4->current_quantity,
                                    'cost' => $product_purchase4->cost,
                                    'expiration_date' => $product_purchase4->expiration_date,
                                    'product_type' => [
                                        'id' => $product_type2->id,
                                        'company_id' => $product_type2->company_id,
                                        'name' => $product_type2->name,
                                        'type' => $product_type2->type,
                                        'photo' => $product_type2->photo,
                                        'base_measure_type_id' => $product_type2->base_measure_type_id,
                                        'barcode' => $product_type2->barcode
                                    ],
                                ],
                            ]
                        ],
                    ],
                ]
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

    public function test_can_delete_storage() {
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
