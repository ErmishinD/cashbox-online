<?php

namespace App\Http\Resources\Api\ProductType;

use App\Http\Resources\Api\MeasureType\ByProductTypeResource as MeasureTypeResource;
use App\Models\ProductType;
use App\Services\ProductPurchaseService;
use Illuminate\Http\Resources\Json\JsonResource;

class BySellProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var ProductType $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'quantity' => $this->pivot->quantity,
            'main_measure_type' => new MeasureTypeResource($this->main_measure_type),
            'quantity_in_main_measure_type' => round($this->pivot->quantity / $this->main_measure_type->quantity, 3),
            'measure_types' => MeasureTypeResource::collection($this->measure_types),
            'price_per_unit' => ProductPurchaseService::get_price_per_unit($this->product_purchases->first())
        ];
    }
}
