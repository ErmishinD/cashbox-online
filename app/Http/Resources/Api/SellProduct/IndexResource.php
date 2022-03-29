<?php

namespace App\Http\Resources\Api\SellProduct;

use App\Http\Resources\Api\ProductType\BySellProductResource as ProductTypeResource;
use App\Models\SellProduct;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
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
            'photo' => $this->media->where('collection_name', 'photo')->isNotEmpty() ? $this->media->where('collection_name', 'photo')->first()->getUrl() : asset('images/default_card_img.png'),
            'name' => $this->name,
            'price' => $this->price,
            'has_discount' => $this->has_discount,
            'product_types' => ProductTypeResource::collection($this->product_types),
        ];
    }
}
