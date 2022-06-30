<?php

namespace App\Http\Resources\Api\Report;

use Illuminate\Http\Resources\Json\JsonResource;

class PopularSellProductResource extends JsonResource
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
            'count' => $this->cashbox_count
        ];
    }
}
