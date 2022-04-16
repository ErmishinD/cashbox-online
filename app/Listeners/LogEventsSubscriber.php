<?php

namespace App\Listeners;

use App\Events\MoneyCollected;
use App\Events\OrderSold;
use App\Events\ProductPurchaseMade;
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
use App\Models\SystemLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogEventsSubscriber
{
    public function handle($event)
    {
        SystemLog::create([
            'company_id' => $event->company_id,
            'user_id' => $event->user_id,
            'action' => $event->action,
            'loggable_type' => $event->getLoggableType(),
            'loggable_id' => $event->getLoggableId(),
            'data' => $event->getAdditionalData(),
        ]);
    }

    public function subscribe($events)
    {
        return [
            ProductTypeCreated::class => 'handle',
            ProductTypeEdited::class => 'handle',
            ProductTypeDeleted::class => 'handle',

            SellProductCreated::class => 'handle',
            SellProductEdited::class => 'handle',
            SellProductDeleted::class => 'handle',

            ShopCreated::class => 'handle',
            ShopEdited::class => 'handle',
            ShopDeleted::class => 'handle',

            StorageCreated::class => 'handle',
            StorageEdited::class => 'handle',
            StorageDeleted::class => 'handle',

            UserChangedShop::class => 'handle',
            UserCreated::class => 'handle',
            UserEdited::class => 'handle',
            UserDeleted::class => 'handle',

            MoneyCollected::class => 'handle',
            OrderSold::class => 'handle',

            ProductPurchaseMade::class => 'handle',

            ProductsWrittenOff::class => 'handle',
        ];
    }
}
