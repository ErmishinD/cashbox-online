<?php

namespace App\Events;

use App\Contracts\SystemLoggableEvent;
use App\Models\SystemLog;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductPurchaseMade implements SystemLoggableEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $product_purchases;
    public $action = SystemLog::ACTIONS['purchased'];
    public $user_id;
    public $company_id;

    public function __construct($product_purchases, User $user)
    {
        $this->product_purchases = $product_purchases;
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

    public function getLoggableType(): ?string
    {
        return get_class($this->product_purchases->first());
    }

    public function getLoggableId(): ?int
    {
        return $this->product_purchases->first()->id;
    }

    public function getAdditionalData(): ?array
    {
        return ['sum' => round($this->product_purchases->sum('cost'), 2)];
    }
}
