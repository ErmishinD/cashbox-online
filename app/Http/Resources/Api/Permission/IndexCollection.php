<?php

namespace App\Http\Resources\Api\Permission;

use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        foreach ($this->collection as $permission) {
            list($model, $ability) = explode('_', $permission->name);
            $permission->model = $model;
            $permission->ability = $ability;

        }

        $result = collect();
        $permissionsByModel = $this->collection->groupBy('model');
        foreach ($permissionsByModel as $model => $permissions) {
            $result->put($model, collect());
            foreach ($permissions as $permission) {
                $result[$model]->push(['id' => $permission->id, 'ability' => $permission->ability]);
            }
        }

        return $result->toArray();
    }
}
