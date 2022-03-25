<?php

namespace App\Http\Resources\Api\Sellable;

use App\Http\Resources\Api\ProductType\BySellProductResource as ProductTypeResource;
use App\Http\Resources\Api\SellProduct\IndexResource;
use App\Models\SellProduct;
use App\Models\SellProductGroup;
use Illuminate\Http\Resources\Json\JsonResource;

class DashboardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $result = [
            'id' => $this->id,
            'sellable_type' => get_class($this->resource),
            'company_id' => $this->company_id,
            'photo' => $this->photo ? asset($this->photo) : asset('images/default_card_img.png'),
            'name' => $this->name,
            'price' => $this->price,
            'has_discount' => $this->has_discount,
        ];

        if ($result['sellable_type'] == SellProduct::class) {
            $result['product_types'] = ProductTypeResource::collection($this->product_types);
        }
        elseif ($result['sellable_type'] == SellProductGroup::class) {
            $result['sell_products'] = IndexResource::collection($this->sell_products);
        }
        return $result;
    }
}
