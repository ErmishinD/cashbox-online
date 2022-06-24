<?php

namespace App\Http\Resources\Api\Cashbox;

use App\Models\Cashbox;
use Illuminate\Http\Resources\Json\JsonResource;

class DefaultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var Cashbox $this */
        return [
            'id' => $this->id,
            'shop_id' => $this->shop_id,
            'sell_product_id' => $this->sell_product_id,
            'product_purchase_id' => $this->product_purchase_id,
            'data' => $this->data,
            'amount' => $this->amount,
            'self_cost' => $this->self_cost,
            'profit' => $this->profit,
            'transaction_type' => $this->transaction_type,
            'payment_type' => $this->payment_type,
            'operator_id' => $this->operator_id,
            'description' => $this->description,
            'collected_at' => $this->collected_at,
            'collector_id' => $this->collector_id,
            'created_at' => $this->created_at
        ];
    }
}
