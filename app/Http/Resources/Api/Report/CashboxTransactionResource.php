<?php

namespace App\Http\Resources\Api\Report;

use App\Http\Resources\Api\User\DefaultResource as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CashboxTransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'payment_type' => $this->payment_type,
            'sell_product' => [
                'id' => $this->sell_product->id,
                'name' => $this->sell_product->name,
            ],
            'amount' => $this->amount,
            'self_cost' => $this->self_cost,
            'profit' => $this->profit,
            'operator' => UserResource::make($this->operator),
            'collector' => UserResource::make($this->collector),
            'collected_at' => $this->collected_at ? $this->collected_at->format('Y-m-d H:i') : null,
            'created_at' => $this->created_at->format('Y-m-d H:i'),
        ];
    }
}
