<?php

namespace App\Services;


use App\Models\ProductType;

class ProductTypeService
{
    public static function prepare_measure_types($product_type)
    {
        $product_type->measure_types->prepend($product_type->main_measure_type);

        $product_type->base_measure_type->quantity = 1;
        $product_type->base_measure_type->description = '';
        $product_type->measure_types->push($product_type->base_measure_type);

        $product_type->measure_types = $product_type->measure_types->unique('quantity')->sortByDesc('quantity');
        return $product_type;
    }

    public static function is_part_of_sell_products($product_type): bool
    {
        return $product_type->sell_products->count() > 0;
    }

    public static function get_current_quantity(
        $filters, array $storage_ids, bool $with_expired = false, array $paginate_params = []
    )
    {
        $product_types_query = ProductType::query()
            ->filter($filters)
            ->with(['media', 'main_measure_type'])
            ->withSum(['product_purchases' => function ($query) use ($storage_ids) {
                $query
                    ->whereIn('storage_id', $storage_ids)
                    ->where(function ($q) {
                        $q->whereNull('expiration_date')
                            ->orWhere('expiration_date', '>', now());
                    });
            }], 'current_quantity')
            ->when($with_expired, function ($query) use ($storage_ids) {
                $query
                    ->withSum(['product_purchases AS product_purchases_expired_sum_current_quantity' => function ($sub_query) use ($storage_ids) {
                        $sub_query
                            ->whereIn('storage_id', $storage_ids)
                            ->where(function ($q) {
                                $q->whereNotNull('expiration_date')
                                    ->where('expiration_date', '<', now());
                            });
                    }], 'current_quantity');
            })
            ->orderByDesc('product_purchases_sum_current_quantity');

        if (!empty($paginate_params) && !empty($paginate_params['per_page'] && !empty($paginate_params['page']))) {
            return $product_types_query->paginate($paginate_params['per_page'], ['*'], 'page', $paginate_params['page']);
        } else {
            return $product_types_query->get();
        }
    }
}


