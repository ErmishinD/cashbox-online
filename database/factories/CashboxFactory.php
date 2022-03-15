<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\SellProduct;
use App\Models\SellProductGroup;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CashboxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $shop_id = (isset($attribues['shop_id'])) ?: $this->faker->randomElement(Shop::pluck('id'));
        $sell_product_id = (isset($attribues['sell_product_id'])) ?: $this->faker->randomElement(SellProduct::pluck('id'));
        $operator_id = (isset($attribues['operator_id'])) ?: $this->faker->randomElement(User::pluck('id'));

        return [
            'shop_id' => $shop_id,
            'sell_product_id' => $sell_product_id,
            'transaction_type' => $this->faker->randomElement(['_in', '_out']),
            'payment_type' => $this->faker->randomElement(['_cash', '_card']),
            'amount' => $this->faker->randomFloat(2, 50, 1000),
            'description' => $this->faker->sentence,
            'operator_id' => $operator_id,
            'collected_at' => null,
            'collector_id' => null,
        ];
    }
}
