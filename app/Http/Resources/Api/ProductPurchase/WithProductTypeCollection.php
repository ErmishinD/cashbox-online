<?php

namespace App\Http\Resources\Api\ProductPurchase;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class WithProductTypeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $result = collect();
        foreach ($this->collection as $created_at => $purchases) {
            $result->push(
                [
                    'mode' => 'span',
                    'label' => Carbon::parse($created_at)->format('Y-m-d H:i:s'),
                    'html' => false,
                    'children' => WithProductTypeResource::collection($purchases)
                ]
            );
        }

        return $result->toArray();
    }
}
