<?php

namespace App\Events;

use App\Http\Traits\CrudLoggableEvent;
use App\Models\ProductPurchase;
use App\Models\SystemLog;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductPurchaseEdited
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    use CrudLoggableEvent;

    public $object;
    public $action = SystemLog::ACTIONS['edited'];
    public $user_id;
    public $company_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ProductPurchase $object, User $user)
    {
        $this->object = $object;
        $this->user_id = $user->id;
        $this->company_id = $user->company_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
