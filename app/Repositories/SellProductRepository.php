<?php

namespace App\Repositories;

use App\Models\SellProduct;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class SellProductRepository.
 */
class SellProductRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return SellProduct::class;
    }

    public function get_paginated($paginate_data, $filters)
    {
        $sell_product_paginator =  $this->model
            ->filter($filters)
            ->paginate($paginate_data['per_page'], ['*'], 'page', $paginate_data['page']);

        $sell_product_paginator->getCollection()->transform(function ($sell_product) {
            foreach ($sell_product->product_types as $product_type) {
                $product_type->quantity_in_main_measure_type = $product_type->pivot->quantity / $product_type->main_measure_type->quantity;
            }
            return $sell_product;
        });

        return $sell_product_paginator;
    }

    public function all(array $columns = ['*'])
    {
        return $this->model->with('product_types.main_measure_type')
            ->get()
            ->each(function ($sell_product) {
                foreach ($sell_product->product_types as $product_type) {
                    $product_type->quantity_in_main_measure_type = $product_type->pivot->quantity / $product_type->main_measure_type->quantity;
                }
            });
    }

    public function create(array $data)
    {
        $sell_product = parent::create($data);
        if (!empty($data['product_types'])) {
            foreach ($data['product_types'] as $item) {
                DB::table('sell_product_product_type')->insert([
                    'sell_product_id' => $sell_product->id, 'product_type_id' => $item['product_type_id'],
                    'quantity' => $item['quantity']
                ]);
            }
        }
        return $sell_product;
    }
}
