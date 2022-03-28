<?php

namespace App\Http\Resources\Api\ProductType;

use App\Models\ProductType;
use Illuminate\Http\Resources\Json\JsonResource;

class SelectForSellProductResource extends JsonResource
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
        ];
    }
}
