<?php

namespace App\Http\Resources\Api\ProductType;

use App\Http\Resources\Api\BaseMeasureType\DefaultResource as BaseMeasureTypeResource;
use App\Http\Resources\Api\Category\SelectResource as CategoryResource;
use App\Http\Resources\Api\MeasureType\DefaultResource as MeasureTypeResource;
use App\Http\Resources\Api\SellProduct\DefaultResource as SellProductResource;
use App\Models\ProductType;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
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
            'company_id' => $this->company_id,
            'name' => $this->name,
            'type' => $this->type,
            'photo' => $this->media->where('collection_name', 'photo')->isNotEmpty() ? $this->media->where('collection_name', 'photo')->first()->getUrl() : asset('images/default_card_img.png'),
            'base_measure_type_id' => $this->base_measure_type_id,
            'barcode' => $this->barcode,
            'base_measure_type' => new BaseMeasureTypeResource($this->base_measure_type),
            'main_measure_type' => new MeasureTypeResource($this->main_measure_type),
            'measure_types' => MeasureTypeResource::collection($this->measure_types),
            'sell_products' => SellProductResource::collection($this->sell_products),
            'category' => new CategoryResource($this->category),
            'warning_threshold' => $this->warning_threshold
        ];
    }
}
