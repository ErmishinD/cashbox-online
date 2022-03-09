<?php

namespace App\Repositories;

use App\Models\Cashbox;
use App\Models\ProductPurchase;
use App\Models\Shop;
use App\Models\Storage;
use App\Services\EnumDbCol;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class CashboxRepository.
 */
class CashboxRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Cashbox::class;
    }

    protected function get_enum($column_name) {
        $enums = [];
        $enumKeys = EnumDbCol::getEnumValues($this->model->getTable(), $column_name);

        foreach($enumKeys as $k => $v) $enums[$k] = __($v);

        return $enums;
    }

    public function getTransactionTypes() {
        return $this->get_enum('transaction_type');
    }

    public function getPaymentTypes() {
        return $this->get_enum('payment_type');
    }

    public function mass_create(array $data)
    {
        $payments = collect();
        $parent_id = null;
        foreach ($data['sell_products'] as $sell_product) {
            if ($payments->isNotEmpty()) {
                $parent_id = $payments->first()->id;
            }
            $data['sell_product_id'] = $sell_product['sell_product_id'];
            $data['amount'] = $sell_product['amount'];
            $data['data'] = json_encode($sell_product['product_types']);
            $data['parent_id'] = $parent_id;
            $payment = $this->model->create($data);
            $payments->push($payment);

            // отнять нужное кол-во продуктов со склада
            $storage_ids = Storage::select('id', 'shop_id')->where('shop_id', $data['shop_id'])->get()->pluck('id');

            $product_type_ids = collect();
            foreach ($sell_product['product_types'] as $product_type) {
                $product_type_ids->push($product_type['id']);
            }
            $product_purchases = ProductPurchase::whereIn('storage_id', $storage_ids)
                ->whereIn('product_type_id', $product_type_ids)
                ->where('current_quantity', '>', 0)
                ->orderBy('created_at')
                ->get();

            foreach ($sell_product['product_types'] as $product_type) {
                foreach ($product_purchases->where('product_type_id', $product_type['id']) as $product_purchase) {
                    if ($product_purchase->current_quantity >= $product_type['quantity']) {
                        $product_purchase->current_quantity = $product_purchase->current_quantity - $product_type['quantity'];
                        $product_purchase->save();
                        break;
                    }

                    $product_type['quantity'] = $product_type['quantity'] - $product_purchase->current_quantity;
                    $product_purchase->current_quantity = 0;
                    $product_purchase->save();
                }
            }
        }

        return $payments;
    }

    public function get_not_collected()
    {
        $cashbox_transactions =  $this->model
            ->with(['sell_product', 'product_purchase.product_type', 'operator', 'shop'])
            ->onlyInCompany()
            ->notCollected()
            ->get();
        return $cashbox_transactions;
    }

    public function get_for_balance()
    {
        return $this->model
            ->select('transaction_type', 'payment_type', 'amount')
            ->onlyInCompany()
            ->notCollected()
            ->get();
    }
}
