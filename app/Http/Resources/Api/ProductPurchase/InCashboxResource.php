<?php

namespace App\Http\Resources\Api\ProductPurchase;

use App\Models\ProductPurchase;
use Illuminate\Http\Resources\Json\JsonResource;

class InCashboxResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var ProductPurchase $this */
        return [
            'id' => $this->id,
            'product_type' => ['id' => $this->product_type_id, 'name' => $this->product_type->name],
            'quantity' => $this->quantity,
            'current_quantity' => $this->current_quantity,
            'expiration_date' => $this->expiration_date,
        ];
    }
}
