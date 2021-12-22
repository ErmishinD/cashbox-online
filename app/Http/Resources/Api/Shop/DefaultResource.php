<?php

namespace App\Http\Resources\Api\Shop;

use App\Models\Shop;
use Illuminate\Http\Resources\Json\JsonResource;

class DefaultResource extends JsonResource
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
            'name' => $this->name,
            'address' => $this->address,
        ];
    }
}
