<?php

namespace App\Http\Resources\Api\Shop;

use App\Http\Resources\Api\Storage\DefaultResource as StorageResource;
use App\Models\Shop;
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
        /** @var Shop $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'storages' => StorageResource::collection($this->storages),
        ];
    }
}
