<?php

namespace App\Events;

use App\Contracts\SystemLoggableEvent;
use App\Http\Traits\CrudLoggableEvent;
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

class StorageCreated implements SystemLoggableEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    use CrudLoggableEvent;

    public $object;
    public $action = SystemLog::ACTIONS['created'];
    public $user_id;
    public $company_id;

    public function __construct(Storage $object, User $user)
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
