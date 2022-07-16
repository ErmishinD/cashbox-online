<?php

namespace App\Http\Resources\Api\ProductConsumption;

use App\Http\Resources\Api\Cashbox\IndexResource as CashboxResource;
use App\Http\Resources\Api\Transfer\IndexResource as TransferResource;
use App\Http\Resources\Api\WriteOff\IndexResource as WriteOffResource;
use App\Models\Cashbox;
use App\Models\Transfer;
use App\Models\WriteOff;
use Illuminate\Http\Resources\Json\JsonResource;

class PaginateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $consumable_type = '';
        $consumable = [];
        if ($this->consumable_type == Cashbox::class) {
            $consumable_type = 'sell';
            $consumable = CashboxResource::make($this->consumable);
        } elseif ($this->consumable_type == WriteOff::class) {
            $consumable_type = 'writeoff';
            $consumable = WriteOffResource::make($this->consumable);
        } elseif ($this->consumable_type == Transfer::class) {
            $consumable_type = 'transfer';
            $consumable = TransferResource::make($this->consumable);
        }

        return [
            'id' => $this->id,
            'consumable_type' => $consumable_type,
            'consumable' => $consumable,
            'quantity' => $this->quantity,
            'cost' => $this->cost,
            'income' => $this->income,
            'profit' => $this->profit,
            'created_at' => $this->created_at->format('Y-m-d H:i'),
        ];
    }
}
