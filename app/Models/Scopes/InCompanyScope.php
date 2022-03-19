<?php

namespace App\Models\Scopes;

use App\Models\Shop;
use App\Models\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class InCompanyScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $company_id = optional(Auth::user())->company_id;
        if ($company_id) {
            if (!empty($model->attributes['shop_id'])) {
                $shop_ids = Shop::where('company_id', $company_id)->pluck('id');
                $builder->whereIn('shop_id', $shop_ids);
            } elseif (!empty($model->attributes['storage_id'])) {
                $shop_ids = Shop::where('company_id', $company_id)->pluck('id');
                $storage_ids = Storage::whereIn('shop_id', $shop_ids)->pluck('id');
                $builder->whereIn('storage_id', $storage_ids);
            }
            else {
                $builder->where('company_id', $company_id);
            }
        }
    }

}
