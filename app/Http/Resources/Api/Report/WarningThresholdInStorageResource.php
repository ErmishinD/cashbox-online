<?php

namespace App\Http\Resources\Api\Report;

use App\Http\Resources\Api\MeasureType\DefaultResource as MainMeasureTypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class WarningThresholdInStorageResource extends JsonResource
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
            'warning_threshold' => $this->warning_threshold,
            'current_quantity' => $this->product_purchases_sum_current_quantity ?? 0,
            'main_measure_type' => MainMeasureTypeResource::make($this->main_measure_type)
        ];
    }
}
