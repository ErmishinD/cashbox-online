<?php

namespace App\Http\Resources\Api\SystemLog;

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
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name
            ],
            'action' => $this->action,
            'object_type' => $this->loggable_type,
            'object' => [
                'data' => $this->loggable->getDataForAudit(),
                'description' => $this->loggable->getDescriptionForAudit(),
            ],
            'created_at' => $this->created_at->format('Y-m-d H:i'),
        ];
    }
}
