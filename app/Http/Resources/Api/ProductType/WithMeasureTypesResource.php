<?php

namespace App\Http\Resources\Api\ProductType;

use App\Http\Resources\Api\MeasureType\ByProductTypeResource;
use App\Models\ProductType;
use Illuminate\Http\Resources\Json\JsonResource;

class WithMeasureTypesResource extends JsonResource
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
            'photo' => $this->media->where('collection_name', 'photo')->isNotEmpty() ? $this->media->where('collection_name', 'photo')->first()->getUrl() : asset('images/default_card_img.png'),
            'type' => $this->type,
            'measure_types' => ByProductTypeResource::collection($this->measure_types),
            'cost_price' => optional($this->product_purchases->first())->get_cost_price()
        ];
    }
}
