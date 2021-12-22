<?php

namespace App\Http\Resources\Api\ProductPurchase;

use App\Models\ProductPurchase;
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
        /** @var ProductPurchase $this */
        return [
            'id' => $this->id,
            'product_type_id' => $this->product_type_id,
            'storage_id' => $this->storage_id,
            'measure_type_id' => $this->measure_type_id,
            'quantity' => $this->quantity,
            'current_quantity' => $this->current_quantity,
            'cost' => $this->cost,
            'expiration_date' => $this->expiration_date
        ];
    }
}
