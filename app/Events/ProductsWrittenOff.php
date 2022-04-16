<?php

namespace App\Events;

use App\Contracts\SystemLoggableEvent;
use App\Models\Storage;
use App\Models\SystemLog;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductsWrittenOff implements SystemLoggableEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $write_offs;
    public $action = SystemLog::ACTIONS['write_off'];
    public $user_id;
    public $company_id;
    public $storage;

    public function __construct($write_offs, User $user)
    {
        $this->write_offs = $write_offs;
        $this->user_id = $user->id;
        $this->company_id = $user->company_id;
        $this->storage = Storage::find($this->write_offs->first()->storage_id);
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
        return get_class($this->write_offs->first());
    }

    public function getLoggableId(): ?int
    {
        return $this->write_offs->first()->id;
    }

    public function getAdditionalData(): ?array
    {
        $sum = 0;
        foreach ($this->write_offs as $write_off) {
            foreach ($write_off->data as $purchase_data) {
                $sum += $purchase_data['cost'];
            }
        }
        return [
            'sum' => round($sum, 2),
            'storage_name' => $this->storage->name
        ];
    }
}
