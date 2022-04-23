<?php

namespace App\Http\Resources\Api\Transfer;

use App\Models\Transfer;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var Transfer $this */
        return [
            'id' => $this->id,
            'transferred_by' => [
                'id' => $this->transferred_by_user->id,
                'name' => $this->transferred_by_user->name,
            ],
            'from_storage' => [
                'id' => $this->from_storage->id,
                'name' => $this->from_storage->name,
            ],
            'to_storage' => [
                'id' => $this->to_storage->id,
                'name' => $this->to_storage->name,
            ],
            'product_type' => [
                'id' => $this->product_purchase->product_type->id,
                'name' => $this->product_purchase->product_type->name,
                'main_measure_type' => [
                    'id' => $this->product_purchase->product_type->main_measure_type->id,
                    'name' => $this->product_purchase->product_type->main_measure_type->name,
                    'quantity' => $this->product_purchase->product_type->main_measure_type->quantity
                ],
                'product_purchase_id' => $this->product_purchase_id,
                'quantity' => $this->product_purchase->quantity,
            ],
            'created_at' => $this->created_at->format('Y-m-d H:i')
        ];
    }
}
