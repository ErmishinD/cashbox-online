<?php

namespace App\Http\Resources\Api\MeasureType;

use App\Models\MeasureType;
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
        /** @var MeasureType $this */
        return [
            'id' => $this->id,
            'base_measure_type_id' => $this->base_measure_type_id,
            'base_measure_type_name' => $this->base_measure_type->name,
            'name' => $this->name,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'is_common' => $this->is_common,
        ];
    }
}
