<?php

namespace App\Events;

use App\Contracts\SystemLoggableEvent;
use App\Models\Cashbox;
use App\Models\SystemLog;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MoneyCollected implements SystemLoggableEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $cashbox_transactions;
    public $action = SystemLog::ACTIONS['collected'];
    public $user_id;
    public $company_id;

    public function __construct($payment_ids, User $user)
    {
        $this->cashbox_transactions = Cashbox::whereIn('id', $payment_ids)->get();
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
        return get_class($this->cashbox_transactions->first());
    }

    public function getLoggableId(): ?int
    {
        return $this->cashbox_transactions->first()->id;
    }

    public function getAdditionalText(): ?string
    {
        $sum = $this->cashbox_transactions->where('transaction_type', Cashbox::TRANSACTION_TYPES['in'])->sum('amount');
        $sum -= $this->cashbox_transactions->where('transaction_type', Cashbox::TRANSACTION_TYPES['out'])->sum('amount');
        return __('на сумму: ') . $sum;
    }
}
