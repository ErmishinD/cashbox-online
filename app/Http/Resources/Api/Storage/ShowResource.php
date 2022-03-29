<?php

namespace App\Http\Resources\Api\Storage;

use App\Http\Resources\Api\ProductType\InStorageResource;
use App\Models\Storage;
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
        /** @var Storage $this */
        return [
            'id' => $this->id,
            'shop_id' => $this->shop_id,
            'name' => $this->name,
            'product_types' => !empty($this->product_types) ? InStorageResource::collection($this->product_types) : null,
        ];
    }
}
