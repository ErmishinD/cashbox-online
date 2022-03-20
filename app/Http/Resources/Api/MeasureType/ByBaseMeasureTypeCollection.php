<?php

namespace App\Http\Resources\Api\MeasureType;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ByBaseMeasureTypeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $result = collect();
        foreach ($this->collection as $type => $measure_types) {
            $result->put($type, collect());
            foreach ($measure_types as $measure_type) {
                $result[$type]->push([
                    'id' => $measure_type->id,
                    'base_measure_type_id' => $measure_type->base_measure_type_id,
                    'name' => $measure_type->name,
                    'description' => $measure_type->description,
                    'quantity' => $measure_type->quantity,
                    'is_common' => $measure_type->is_common,
                ]);
            }
        }
        return $result->toArray();
    }
}
