<?php

namespace App\Http\Resources\Api\Category;

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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'photo' => $this->media->where('collection_name', 'photo')->isNotEmpty()
                ? $this->media->where('collection_name', 'photo')->first()->getUrl()
                : asset('images/default_card_img.png'),
            'product_types_count' => $this->product_types_count ?? 0,
            'sell_products_count' => $this->sell_products_count ?? 0,
        ];
    }
}
