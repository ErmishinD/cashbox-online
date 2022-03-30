<?php

namespace App\Http\Resources\Api\Role;

use App\Models\Role;
use Illuminate\Http\Resources\Json\JsonResource;

class ByUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var Role $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'human_name' => $this->human_name,
        ];
    }
}
