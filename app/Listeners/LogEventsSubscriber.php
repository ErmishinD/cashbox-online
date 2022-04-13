<?php

namespace App\Listeners;

use App\Events\ProductTypeCreated;
use App\Events\ProductTypeDeleted;
use App\Events\ProductTypeEdited;
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
            'loggable_type' => get_class($event->object),
            'loggable_id' => $event->object->id
        ]);
    }

    public function subscribe($events)
    {
        return [
            ProductTypeCreated::class => 'handle',
            ProductTypeEdited::class => 'handle',
            ProductTypeDeleted::class => 'handle',
        ];
    }
}
