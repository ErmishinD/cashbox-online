<?php

namespace App\Http\Resources\Api\Storage;

use App\Models\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupedByShopResource extends JsonResource
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
            'name' => $this->name,
        ];
    }
}
