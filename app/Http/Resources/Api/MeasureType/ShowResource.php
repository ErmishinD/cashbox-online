<?php

namespace App\Http\Resources\Api\MeasureType;

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
        return [
            'id' => $this->id,
            'base_measure_type_id' => $this->base_measure_type_id,
            'name' => $this->name,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'is_common' => $this->is_common,
            'can_edit_base_measure_type' => $this->product_types->isEmpty() && $this->main_product_types->isEmpty()
        ];
    }
}
