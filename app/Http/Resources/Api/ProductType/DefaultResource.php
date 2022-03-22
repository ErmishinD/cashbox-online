<?php

namespace App\Http\Resources\Api\ProductType;

use App\Models\ProductType;
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
        /** @var ProductType $this */
        return [
            'id' => $this->id,
            'company_id' => $this->company_id,
            'name' => $this->name,
            'type' => $this->type,
            'photo' => $this->media->isNotEmpty() ? $this->media->first()->getUrl() : asset('images/default_card_img.png'),
            'base_measure_type_id' => $this->base_measure_type_id,
            'main_measure_type_id' => $this->main_measure_type_id,
            'barcode' => $this->barcode
        ];
    }
}
