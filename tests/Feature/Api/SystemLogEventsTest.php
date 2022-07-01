<?php

namespace Tests\Feature\Api;

use App\Events\MoneyCollected;
use App\Events\OrderSold;
use App\Events\ProductPurchaseMade;
use App\Events\ProductsTransferred;
use App\Events\ProductsWrittenOff;
use App\Events\ProductTypeCreated;
use App\Events\ProductTypeDeleted;
use App\Events\ProductTypeEdited;
use App\Events\SellProductCreated;
use App\Events\SellProductDeleted;
use App\Events\SellProductEdited;
use App\Events\ShopCreated;
use App\Events\ShopDeleted;
use App\Events\ShopEdited;
use App\Events\StorageCreated;
use App\Events\StorageDeleted;
use App\Events\StorageEdited;
use App\Events\UserChangedShop;
use App\Events\UserCreated;
use App\Events\UserDeleted;
use App\Events\UserEdited;
use App\Models\Cashbox;
use App\Models\Company;
use App\Models\MeasureType;
use App\Models\ProductConsumption;
use App\Models\ProductPurchase;
use App\Models\ProductType;
use App\Models\SellProduct;
use App\Models\Shop;
use App\Models\Storage;
use App\Models\SystemLog;
use App\Models\Transfer;
use App\Models\User;
use App\Models\WriteOff;
use Database\Seeders\BaseMeasureTypeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SystemLogEventsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $table = 'system_logs';

    /**
     * @var User
     */
    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpFaker();

        $this->seed(BaseMeasureTypeSeeder::class);

        $company = Company::factory()->create();

        $this->user = User::factory()->create(['company_id' => $company->id]);
    }

    private function assertSystemLogsHave($action, $object, $data = null)
    {
        $this->assertDatabaseHas($this->table, [
            'company_id' => $this->user->company_id,
            'user_id' => $this->user->id,
            'action' => $action,
            'loggable_type' => get_class($object),
            'loggable_id' => $object->id,
            'data' => $data ? $this->castAsJson($data) : null,
        ]);
    }

    public function test_product_type_crud_events_are_working()
    {
        $main_measure_type = MeasureType::factory()->create(['company_id' => $this->user->company_id]);
        $product_type = ProductType::factory()->create([
            'company_id' => $this->user->company_id, 'main_measure_type_id' => $main_measure_type->id
        ]);

        ProductTypeCreated::dispatch($product_type, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['created'], $product_type);

        ProductTypeEdited::dispatch($product_type, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['edited'], $product_type);

        ProductTypeDeleted::dispatch($product_type, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['deleted'], $product_type);
    }

    public function test_sell_product_crud_events_are_working()
    {
        $main_measure_type = MeasureType::factory()->create(['company_id' => $this->user->company_id]);
        ProductType::factory()->create([
            'company_id' => $this->user->company_id, 'main_measure_type_id' => $main_measure_type->id
        ]);

        $sell_product = SellProduct::factory()->create(['company_id' => $this->user->company_id]);

        SellProductCreated::dispatch($sell_product, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['created'], $sell_product);

        SellProductEdited::dispatch($sell_product, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['edited'], $sell_product);

        SellProductDeleted::dispatch($sell_product, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['deleted'], $sell_product);
    }

    public function test_shop_crud_events_are_working()
    {
        $shop = Shop::factory()->create(['company_id' => $this->user->company_id]);

        ShopCreated::dispatch($shop, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['created'], $shop);

        ShopEdited::dispatch($shop, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['edited'], $shop);

        ShopDeleted::dispatch($shop, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['deleted'], $shop);
    }

    public function test_storage_crud_events_are_working()
    {
        $shop = Shop::factory()->create(['company_id' => $this->user->company_id]);
        $storage = Storage::factory()->create(['company_id' => $this->user->company_id, 'shop_id' => $shop->id]);

        StorageCreated::dispatch($storage, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['created'], $storage);

        StorageEdited::dispatch($storage, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['edited'], $storage);

        StorageDeleted::dispatch($storage, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['deleted'], $storage);
    }

    public function test_user_crud_events_are_working()
    {
        $user = User::factory()->create(['company_id' => $this->user->company_id]);

        UserCreated::dispatch($user, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['created'], $user);

        UserEdited::dispatch($user, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['edited'], $user);

        UserDeleted::dispatch($user, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['deleted'], $user);
    }

    public function test_user_changed_event_is_working()
    {
        $shop = Shop::factory()->create(['company_id' => $this->user->company_id]);

        UserChangedShop::dispatch($shop, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['changed_shop'], $shop);
    }

    public function test_order_sold_event_is_working()
    {
        $shop = Shop::factory()->create(['company_id' => $this->user->company_id]);
        $payments = Cashbox::factory()->count(5)->create([
            'company_id' => $this->user->company_id, 'shop_id' => $shop->id, 'transaction_type' => Cashbox::TRANSACTION_TYPES['in']
        ]);

        $sum = round($payments->sum('amount'), 2);

        OrderSold::dispatch($payments, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['sold'], $payments->first(), ['sum' => $sum]);
    }

    public function test_product_purchase_made_event_is_working()
    {
        $shop = Shop::factory()->create(['company_id' => $this->user->company_id]);
        $storage = Storage::factory()->create(['company_id' => $this->user->company_id, 'shop_id' => $shop->id]);

        $purchases = ProductPurchase::factory()->count(5)->create([
            'company_id' => $this->user->company_id, 'storage_id' => $storage->id,
        ]);

        $sum = round($purchases->sum('cost'), 2);

        ProductPurchaseMade::dispatch($purchases, $this->user);
        $this->assertSystemLogsHave(SystemLog::ACTIONS['purchased'], $purchases->first(), ['sum' => $sum]);
    }

    public function test_money_collected_event_is_working()
    {
        $shop = Shop::factory()->create(['company_id' => $this->user->company_id]);
        $payments = Cashbox::factory()->count(5)->create(['company_id' => $this->user->company_id, 'shop_id' => $shop->id]);

        Cashbox::whereIn('id', $payments->pluck('id'))->update(['collector_id' => $this->user->id, 'collected_at' => now()]);
        MoneyCollected::dispatch($payments->pluck('id'), $this->user);

        $sum = round($payments->where('transaction_type', Cashbox::TRANSACTION_TYPES['in'])->sum('amount') - $payments->where('transaction_type', Cashbox::TRANSACTION_TYPES['out'])->sum('amount'), 2);

        $this->assertSystemLogsHave(SystemLog::ACTIONS['collected'], $payments->first(), ['sum' => $sum]);
    }

    public function test_products_written_off_event_is_working()
    {
        $shop = Shop::factory()->create(['company_id' => $this->user->company_id]);
        $storage = Storage::factory()->create(['company_id' => $this->user->company_id, 'shop_id' => $shop->id]);

        $main_measure_type = MeasureType::factory()->create(['company_id' => $this->user->company_id]);
        $product_types = ProductType::factory()->count(2)->create([
            'company_id' => $this->user->company_id, 'main_measure_type_id' => $main_measure_type->id
        ]);
        $product_purchase1 = ProductPurchase::factory()->create([
            'company_id' => $this->user->company_id, 'storage_id' => $storage->id,
            'product_type_id' => $product_types->first()->id,
        ]);
        $product_purchase2 = ProductPurchase::factory()->create([
            'company_id' => $this->user->company_id, 'storage_id' => $storage->id,
            'product_type_id' => $product_types->last()->id
        ]);

        $write_off1 = WriteOff::factory()->create([
            'company_id' => $this->user->company_id,
            'storage_id' => $storage->id,
            'product_type_id' => $product_purchase1->product_type_id,
            'quantity' => 50,
            'user_id' => $this->user->id,
        ]);
        $product_consumption1 = ProductConsumption::create([
            'company_id' => $this->user->company_id,
            'product_purchase_id' => $product_purchase1->id,
            'consumable_type' => WriteOff::class,
            'consumable_id' => $write_off1->id,
            'quantity' => 50,
            'cost' => $product_purchase1->cost / 50,
            'income' => 0,
            'profit' => -($product_purchase1->cost / 50),
        ]);
        $write_off2 = WriteOff::factory()->create([
            'company_id' => $this->user->company_id,
            'storage_id' => $storage->id,
            'product_type_id' => $product_purchase2->product_type_id,
            'quantity' => 100,
            'user_id' => $this->user->id,
            'parent_id' => $write_off1->parent_id
        ]);
        $product_consumption2 = ProductConsumption::create([
            'company_id' => $this->user->company_id,
            'product_purchase_id' => $product_purchase2->id,
            'consumable_type' => WriteOff::class,
            'consumable_id' => $write_off2->id,
            'quantity' => 100,
            'cost' => $product_purchase2->cost / 100,
            'income' => 0,
            'profit' => -($product_purchase2->cost / 100),
        ]);
        $write_offs = collect([$write_off1, $write_off2]);

        ProductsWrittenOff::dispatch($write_offs, $this->user);

        $this->assertSystemLogsHave(
            SystemLog::ACTIONS['write_off'],
            $write_offs->first(),
            ['sum' => $product_consumption1->cost + $product_consumption2->cost, 'storage_name' => $storage->name]
        );
    }

    public function test_products_transferred_event_is_working()
    {
        $shop = Shop::factory()->create(['company_id' => $this->user->company_id]);
        $storage1 = Storage::factory()->create(['company_id' => $this->user->company_id, 'shop_id' => $shop->id]);
        $storage2 = Storage::factory()->create(['company_id' => $this->user->company_id, 'shop_id' => $shop->id]);

        $main_measure_type = MeasureType::factory()->create(['company_id' => $this->user->company_id]);
        $product_types = ProductType::factory()->count(2)->create([
            'company_id' => $this->user->company_id, 'main_measure_type_id' => $main_measure_type->id
        ]);
        $product_purchase1 = ProductPurchase::factory()->create([
            'company_id' => $this->user->company_id, 'storage_id' => $storage2->id,
            'product_type_id' => $product_types->first()->id,
        ]);
        $product_purchase2 = ProductPurchase::factory()->create([
            'company_id' => $this->user->company_id, 'storage_id' => $storage2->id,
            'product_type_id' => $product_types->last()->id
        ]);

        $transfer1 = Transfer::factory()->create([
            'company_id' => $this->user->company_id,
            'from_storage_id' => $storage1->id,
            'to_storage_id' => $storage2->id,
            'product_purchase_id' => $product_purchase1->id,
            'transferred_by' => $this->user->id,
            'data' => [
                [
                    'id' => $product_purchase1->id,
                    'quantity' => 50,
                    'cost' => 50,
                    'expiration_date' => $product_purchase1->expiration_date
                        ? $product_purchase1->expiration_date->format('Y-m-d')
                        : null
                ]
            ]
        ]);
        $transfer2 = Transfer::factory()->create([
            'company_id' => $this->user->company_id,
            'from_storage_id' => $storage1->id,
            'to_storage_id' => $storage2->id,
            'product_purchase_id' => $product_purchase2->id,
            'transferred_by' => $this->user->id,
            'data' => [
                [
                    'id' => $product_purchase1->id,
                    'quantity' => 100,
                    'cost' => 50,
                    'expiration_date' => $product_purchase2->expiration_date
                        ? $product_purchase2->expiration_date->format('Y-m-d')
                        : null
                ]
            ],
            'parent_id' => $transfer1->id
        ]);
        $transfers = collect([$transfer1, $transfer2]);

        ProductsTransferred::dispatch($transfers, $this->user);

        $this->assertSystemLogsHave(
            SystemLog::ACTIONS['transferred'],
            $transfers->first(),
            [
                'sum' => 100,
                'from_storage_name' => $storage1->name,
                'to_storage_name' => $storage2->name,
            ]
        );
    }
}
