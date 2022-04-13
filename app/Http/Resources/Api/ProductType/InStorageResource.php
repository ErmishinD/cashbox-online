<?php

namespace App\Http\Resources\Api\ProductType;

use App\Http\Resources\Api\MeasureType\ByProductTypeResource;
use App\Models\ProductType;
use Illuminate\Http\Resources\Json\JsonResource;

class InStorageResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
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
            'type' => $this->type,
            'photo' => $this->media->where('collection_name', 'photo')->isNotEmpty() ? $this->media->where('collection_name', 'photo')->first()->getUrl() : asset('images/default_card_img.png'),
            'main_measure_type' => new ByProductTypeResource($this->main_measure_type),
            'current_quantity' => $this->product_purchases_sum_current_quantity,
            'current_quantity_in_main_measure_type' => $this->product_purchases_sum_current_quantity / $this->main_measure_type->quantity,
        ];
    }
}
