<?php

namespace App\Http\Resources\Api\MeasureType;

use App\Models\MeasureType;
use Illuminate\Http\Resources\Json\JsonResource;

class ByProductTypeResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'quantity' => $this->quantity,
        ];
    }
}
