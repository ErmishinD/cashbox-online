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

    public function getForSelect() {
        return $this->model->select('id', 'name')->get();
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
