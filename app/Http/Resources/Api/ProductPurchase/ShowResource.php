<?php

namespace App\Http\Resources\Api\ProductPurchase;

use App\Http\Resources\Api\MeasureType\ByProductTypeResource;
use App\Services\ProductTypeService;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this->product_type = ProductTypeService::prepare_measure_types($this->product_type);

        return [
            'id' => $this->id,
            'product_type' => [
                'id' => $this->product_type->id,
                'name' => $this->product_type->name,
                'main_measure_type' => [
                    'id' => $this->product_type->main_measure_type->id,
                    'name' => $this->product_type->main_measure_type->name,
                    'quantity' => $this->product_type->main_measure_type->quantity
                ],
                'measure_types' => ByProductTypeResource::collection($this->product_type->measure_types),
            ],
            'expiration_date' => $this->expiration_date ? $this->expiration_date->format('Y-m-d') : null,
            'quantity' => $this->quantity,
            'current_quantity' => $this->current_quantity,
            'cost' => $this->cost,
            'current_cost' => $this->current_cost,
            'storage_id' => $this->storage_id,
            'counterparty_id' => $this->counterparty_id
        ];
    }
}
