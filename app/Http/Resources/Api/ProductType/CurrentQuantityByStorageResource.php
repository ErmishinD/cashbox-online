<?php

namespace App\Http\Resources\Api\ProductType;

use App\Http\Resources\Api\BaseMeasureType\DefaultResource as BaseMeasureTypeResource;
use App\Http\Resources\Api\Category\SelectResource as CategoryResource;
use App\Http\Resources\Api\MeasureType\DefaultResource as MeasureTypeResource;
use App\Http\Resources\Api\SellProduct\DefaultResource as SellProductResource;
use App\Models\ProductType;
use App\Models\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrentQuantityByStorageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var Storage $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'current_quantity' => $this->current_quantity ?? 0,
            'current_cost' => $this->current_cost ?? 0,
            'expired_current_quantity' => $this->expired_current_quantity ?? 0,
            'expired_current_cost' => $this->expired_current_cost ?? 0,
        ];
    }
}
