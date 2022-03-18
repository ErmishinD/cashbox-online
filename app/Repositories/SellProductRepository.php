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
            ->with('product_types.main_measure_type')
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
            $sell_product->product_types()->attach($data['product_types']);
        }
        return $sell_product;
    }

    public function update($sell_product, $data)
    {
        $sell_product->update($data);

        if (!empty($data['product_types'])) {
            $sell_product->product_types()->sync($data['product_types']);
        }
        return $sell_product;
    }

    public function remove_product_types($data): void
    {
        $sell_product = $this->model->find($data['sell_product_id']);
        $sell_product->product_types()->detach($data['product_types']);
    }
}
