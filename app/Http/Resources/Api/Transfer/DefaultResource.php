<?php

namespace App\Http\Resources\Api\Transfer;

use App\Models\Transfer;
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
        /** @var Transfer $this */
        return [
            'id' => $this->id,
            'from_storage_id' => $this->from_storage_id,
            'to_storage_id' => $this->to_storage_id,
            'product_type_id' => $this->product_type_id,
            'quantity' => $this->quantity,
            'confirmed_by' => $this->confirmed_by,
        ];
    }
}
