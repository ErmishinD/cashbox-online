<?php

namespace App\Http\Resources\Api\WriteOff;

use App\Models\WriteOff;
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
        /** @var WriteOff $this */
        return [
            'id' => $this->id,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'storage' => [
                'id' => $this->storage->id,
                'name' => $this->storage->name,
            ],
            'product_type' => [
                'id' => $this->product_type->id,
                'name' => $this->product_type->name,
                'main_measure_type' => [
                    'id' => $this->product_type->main_measure_type->id,
                    'name' => $this->product_type->main_measure_type->name,
                    'quantity' => $this->product_type->main_measure_type->quantity
                ]
            ],
            'quantity' => $this->quantity,
            'created_at' => $this->created_at->format('Y-m-d H:i')
        ];
    }
}
