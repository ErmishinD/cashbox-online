<?php

namespace App\Http\Resources\Api\ProductPurchase;

use App\Http\Resources\Api\MeasureType\ByProductTypeResource;
use App\Http\Resources\Api\Storage\GroupedByShopResource;
use App\Models\ProductPurchase;
use Illuminate\Http\Resources\Json\JsonResource;

class WithProductTypeResource extends JsonResource
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
            'product_type' => [
                'id' => $this->product_type->id,
                'name' => $this->product_type->name,
                'main_measure_type' => new ByProductTypeResource($this->product_type->main_measure_type),
            ],
            'storage_id' => new GroupedByShopResource($this->storage),
            'quantity' => $this->quantity,
            'current_quantity' => $this->current_quantity,
            'cost' => $this->cost,
            'expiration_date' => $this->expiration_date ? $this->expiration_date->format('Y-m-d') : null,
            'created_at' => $this->created_at->format('Y-m-d H:i'),
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ]
        ];
    }
}
