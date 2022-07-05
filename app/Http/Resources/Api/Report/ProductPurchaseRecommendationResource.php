<?php

namespace App\Http\Resources\Api\Report;

use App\Http\Resources\Api\MeasureType\DefaultResource as MainMeasureTypeResource;
use App\Http\Resources\Api\MeasureType\DefaultResource as MeasureTypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductPurchaseRecommendationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'main_measure_type' => MainMeasureTypeResource::make($this->main_measure_type),
            'type' => $this->type,
            'photo' => $this->media->where('collection_name', 'photo')->isNotEmpty() ? $this->media->where('collection_name', 'photo')->first()->getUrl() : asset('images/default_card_img.png'),
            'measure_types' => MeasureTypeResource::collection($this->measure_types),
            'cashbox_sum_quantity' => $this->consumption_cashbox_sum_quantity ?? 0,
            'cashbox_sum_cost' => $this->consumption_cashbox_sum_cost ?? 0,
            'write_off_sum_quantity' => $this->consumption_write_off_sum_quantity ?? 0,
            'write_off_sum_cost' => $this->consumption_write_off_sum_cost ?? 0,
        ];
    }
}
