<?php

namespace App\Http\Resources\Api\Company;

use App\Models\Company;
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
        /** @var Company $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
