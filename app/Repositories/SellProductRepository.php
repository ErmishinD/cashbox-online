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

    public function all(array $columns = ['*'])
    {
        return parent::all($columns);
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
