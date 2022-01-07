<?php

namespace App\Http\Resources\Api\SellProduct;

use App\Models\SellProduct;
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
        /** @var SellProduct $this */
        return [
            'id' => $this->id,
            'company_id' => $this->company_id,
            'name' => $this->name,
            'price' => $this->price,
            'has_discount' => $this->has_discount,
        ];
    }
}