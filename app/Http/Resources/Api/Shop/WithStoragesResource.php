<?php

namespace App\Http\Resources\Api\Shop;

use App\Http\Resources\Api\Storage\GroupedByShopResource;
use App\Models\Shop;
use Illuminate\Http\Resources\Json\JsonResource;

class WithStoragesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var Shop $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'storages' => GroupedByShopResource::collection($this->storages)
        ];
    }
}
