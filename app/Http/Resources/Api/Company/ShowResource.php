<?php

namespace App\Http\Resources\Api\Company;

use App\Http\Resources\Api\Shop\DefaultResource as ShopResource;
use App\Http\Resources\Api\User\EmployeeResource;
use App\Models\Company;
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
        /** @var Company $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'shops' => ShopResource::collection($this->shops),
            'employees' => EmployeeResource::collection($this->employees),
        ];
    }
}
