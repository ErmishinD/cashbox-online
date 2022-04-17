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

class ProductsTransferred implements SystemLoggableEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $transfers;
    public $action = SystemLog::ACTIONS['transferred'];
    public $user_id;
    public $company_id;
    public $from_storage;
    public $to_storage;

    public function __construct($transfers, User $user)
    {
        $this->transfers = $transfers;
        $this->user_id = $user->id;
        $this->company_id = $user->company_id;
        $this->from_storage = $transfers->first()->from_storage;
        $this->to_storage = $transfers->first()->to_storage;
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
        return get_class($this->transfers->first());
    }

    public function getLoggableId(): ?int
    {
        return $this->transfers->first()->id;
    }

    public function getAdditionalData(): ?array
    {
        $sum = 0;
        foreach ($this->transfers as $transfer) {
            foreach ($transfer->data as $transfer_data) {
                $sum += $transfer_data['cost'];
            }
        }
        return [
            'from_storage_name' => $this->from_storage->name,
            'to_storage_name' => $this->to_storage->name,
            'sum' => $sum
        ];
    }
}
