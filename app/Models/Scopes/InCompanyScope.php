<?php

namespace App\Models\Scopes;

use App\Models\Shop;
use App\Models\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class InCompanyScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $company_id = session()->get('company_id');
        if ($company_id) {
            $table = $model->getTable();

            if ($this->does_column_exists($table, 'company_id')) {
                $builder->where('company_id', $company_id);
            } elseif ($this->does_column_exists($table, 'shop_id')) {
                $shop_ids = Shop::where('company_id', $company_id)->pluck('id');
                $builder->whereIn('shop_id', $shop_ids);
            } elseif ($this->does_column_exists($table, 'storage_id')) {
                $shop_ids = Shop::where('company_id', $company_id)->pluck('id');
                $storage_ids = Storage::whereIn('shop_id', $shop_ids)->pluck('id');
                $builder->whereIn('storage_id', $storage_ids);
            }
        }
    }

    public function does_column_exists($table_name, $column): bool
    {
        $tables_with_tenant = [
            'users' => 'company_id',
            'product_types' => 'company_id',
            'measure_types' => 'company_id',
            'sell_products' => 'company_id',
            'sell_product_groups' => 'company_id',
            'shops' => 'company_id',
            'roles' => 'company_id',
            'storages' => 'shop_id',
            'cashboxes' => 'shop_id',
            'product_purchases' => 'storage_id',
        ];
        if (array_key_exists($table_name, $tables_with_tenant)) {
            return $tables_with_tenant[$table_name] == $column;
        }
        return Schema::hasColumn($table_name, $column);
    }

}
