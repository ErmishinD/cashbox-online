<?php

namespace App\Events;

use App\Models\ProductType;
use App\Models\SystemLog;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductTypeCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $object;
    public $action = SystemLog::ACTIONS['created'];
    public $user_id;
    public $company_id;

    public function __construct(ProductType $object, User $user)
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
