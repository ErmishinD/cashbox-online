<?php

namespace App\Repositories;

use App\Filters\ProductTypeFilter;
use App\Models\ProductType;
use App\Services\EnumDbCol;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class ProductTypeRepository.
 */
class ProductTypeRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return ProductType::class;
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        $enums = [];
        $enumKeys = EnumDbCol::getEnumValues($this->model->getTable(), 'type');

        foreach($enumKeys as $k => $v) $enums[$k] = __($v);

        return $enums;
    }

    public function getForSelect($company_id) {
        return $this->model->select('id', 'name', 'company_id')
            ->with('base_measure_type')
            ->with('main_measure_type')
            ->with(['measure_types' => function($query) {
                $query->orderBy('quantity');
            }])
            ->where('company_id', $company_id)
            ->get()
            ->each(function ($product_type) {
                $product_type->measure_types->push($product_type->main_measure_type);

                $base_measure_type = new \stdClass();
                $base_measure_type->name = $product_type->base_measure_type->name;
                $base_measure_type->quantity = 1;
                $base_measure_type->description = '';

                $product_type->measure_types->push($base_measure_type);
            });
    }

    public function getForShow($id) {
        $product_type = $this->model->with(['measure_types', 'sell_products'])->find($id);
        return $product_type;
    }

    public function create(array $data)
    {
        $product_type = parent::create($data);
        if (!empty($data['measure_types'])) {
            foreach ($data['measure_types'] as $measure_type_id) {
                DB::table('product_type_measures')->insert([
                    'product_type_id' => $product_type->id, 'measure_type_id' => $measure_type_id
                ]);
            }
        }
        return $product_type;
    }

    public function update($id, $data) {
        $product_type = $this->getById($id);
        $product_type->update($data);

        // удалить все единицы измерения для данного продукта
        DB::table('product_type_measures')->where('product_type_id', $id)->delete();

        // добавить единицы измерения к продукту
        if (!empty($data['measure_types'])) {
            foreach ($data['measure_types'] as $measure_type_id) {
                DB::table('product_type_measures')->insert([
                    'product_type_id' => $product_type->id, 'measure_type_id' => $measure_type_id
                ]);
            }
        }
        return $product_type;
    }

    public function remove_measure_types($data) {
        $product_type_id = $data['product_type_id'];
        foreach ($data['measure_types'] as $measure_type_id) {
            DB::table('product_type_measures')
                ->where('product_type_id', $product_type_id)
                ->where('measure_type_id', $measure_type_id)
                ->delete();
        }
    }

    public function get_paginated($paginate_data, $filters)
    {
        return $this->model->filter($filters)->paginate($paginate_data['per_page'], ['*'], 'page', $paginate_data['page']);
    }
}
