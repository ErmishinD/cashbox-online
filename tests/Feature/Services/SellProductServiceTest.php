<?php

namespace Tests\Feature\Services;

use App\Models\Company;
use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\SellProduct;
use App\Models\Shop;
use App\Models\Storage;
use App\Models\User;
use App\Services\SellProductService;
use Database\Seeders\BaseMeasureTypeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SellProductServiceTest extends TestCase
{
    use RefreshDatabase;

    private $company;
    private $shop;
    private $storage;
    private $user;
    private $product_types;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(BaseMeasureTypeSeeder::class);

        $this->company = Company::factory()->create();
        $this->shop = Shop::factory()->create(['company_id' => $this->company->id]);
        $this->storage = Storage::factory()->create(['company_id' => $this->company->id, 'shop_id' => $this->shop->id]);
        $this->user = User::factory()->create(['company_id' => $this->company->id]);
        $this->product_types = ProductType::factory()->count(5)->create(['company_id' => $this->company->id]);
    }

    public function test_get_cost_price()
    {
        $purchase1 = ProductPurchase::factory()->create([
            'company_id' => $this->company->id,
            'storage_id' => $this->storage->id,
            'product_type_id' => $this->product_types[0],
            'quantity' => 100,
            'cost' => 100
        ]);
        ProductPurchase::factory()->create([
            'company_id' => $this->company->id,
            'storage_id' => $this->storage->id,
            'product_type_id' => $this->product_types[0],
            'quantity' => 1000,
            'cost' => 100
        ]);

        $purchase2 = ProductPurchase::factory()->create([
            'company_id' => $this->company->id,
            'storage_id' => $this->storage->id,
            'product_type_id' => $this->product_types[1],
            'quantity' => 200,
            'cost' => 10
        ]);
        ProductPurchase::factory()->create([
            'company_id' => $this->company->id,
            'storage_id' => $this->storage->id,
            'product_type_id' => $this->product_types[1],
            'quantity' => 1000,
            'cost' => 100
        ]);


        $sell_product = SellProduct::factory()->create(['company_id' => $this->company->id]);

        $sell_product->product_types()->attach($this->product_types[0]->id, ['quantity' => 100]);
        $sell_product->product_types()->attach($this->product_types[1]->id, ['quantity' => 10]);

        $this->assertEquals(100.5, SellProductService::get_cost_price($sell_product));
    }
}
