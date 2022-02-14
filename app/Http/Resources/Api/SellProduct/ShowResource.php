<?php

namespace App\Http\Resources\Api\SellProduct;

use App\Http\Resources\Api\ProductType\DefaultResource as ProductTypeResource;
use App\Models\SellProduct;
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
        /** @var SellProduct $this */
        return [
            'id' => $this->id,
            'company_id' => $this->company_id,
            'photo' => $this->photo ? asset($this->photo) : asset('images/default_card_img.png'),
            'name' => $this->name,
            'price' => $this->price,
            'has_discount' => $this->has_discount,
            'product_types' => ProductTypeResource::collection($this->product_types),
        ];
    }
}
