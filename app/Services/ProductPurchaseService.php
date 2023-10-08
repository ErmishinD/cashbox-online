<?php

namespace App\Services;

use Illuminate\Validation\ValidationException;

class ProductPurchaseService
{
    public static function subtract_product_types($product_purchases, $data)
    {
        $used_purchases = [];

        foreach ($data['product_types'] as $product_type) {
            $product_purchases = $product_purchases->where('product_type_id', $product_type['id']);
            if ($product_purchases->isEmpty() || $product_purchases->sum('current_quantity') < $product_type['quantity']) {
                throw ValidationException::withMessages([$product_type['name'] => 'Не достаточно товара "'.$product_type['name'].'"']);
            }
            foreach ($product_purchases as $product_purchase) {
                if ($product_purchase->current_quantity >= $product_type['quantity']) {
                    $cost_difference = ($product_purchase->cost / $product_purchase->quantity) * $product_type['quantity'];

                    $used_purchases[$product_type['id']][] = [
                        'id' => $product_purchase->id,
                        'quantity' => $product_type['quantity'],
                        'cost' => round($cost_difference, 2),
                        'expiration_date' => $product_purchase->expiration_date
                            ? $product_purchase->expiration_date->format('Y-m-d')
                            : null,
                        'counterparty_id' => $product_purchase->counterparty_id
                    ];

                    $product_purchase->current_quantity -= $product_type['quantity'];
                    $product_purchase->current_cost -= round($cost_difference, 2);
                    $product_purchase->save();
                    break;
                }

                $product_type['quantity'] = $product_type['quantity'] - $product_purchase->current_quantity;

                $used_purchases[$product_type['id']][] = [
                    'id' => $product_purchase->id,
                    'quantity' => $product_purchase->current_quantity,
                    'cost' => $product_purchase->current_cost,
                    'expiration_date' => $product_purchase->expiration_date
                        ? $product_purchase->expiration_date->format('Y-m-d')
                        : null,
                    'counterparty_id' => $product_purchase->counterparty_id
                ];

                $product_purchase->current_quantity = 0;
                $product_purchase->current_cost = 0;
                $product_purchase->save();
            }
        }

        return $used_purchases;
    }

    public static function get_price_per_unit($purchase)
    {
        if (!$purchase) {
            return null;
        }
        return $purchase->cost / $purchase->quantity;
    }
}


