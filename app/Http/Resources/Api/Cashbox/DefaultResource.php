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
            'company_id' => $this->company_id,
            'shop_id' => $this->shop_id,
            'sellable_type' => $this->sellable_type,
            'sellable_id' => $this->sellable_id,
            'amount' => $this->amount,
            'payment_type' => $this->payment_type,
            'operator_id' => $this->operator_id,
            'description' => $this->description,
            'transaction_type' => $this->transaction_type,
            'collected_at' => $this->collected_at,
            'collector_id' => $this->collector_id,
        ];
    }
}
