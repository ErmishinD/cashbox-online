<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\SellProduct;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExternalSale>
 */
class ExternalSaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $company_id = (isset($attribues['company_id'])) ?: $this->faker->randomElement(Company::pluck('id'));
        $shop_id = (isset($attribues['shop_id'])) ?: $this->faker->randomElement(Shop::where('company_id', $company_id)->pluck('id'));
        $sell_product_id = (isset($attribues['sell_product_id'])) ?: $this->faker->randomElement(SellProduct::pluck('id'));

        return [
            'company_id' => $company_id,
            'shop_id' => $shop_id,
            'amount' => $this->faker->randomFloat(2, 50, 1000),
            'sell_product_id' => $sell_product_id,
            'payment_type' => $this->faker->randomElement(['_cash', '_card']),
            'description' => 'Admin отметил(а), что Воруй Ирина посетил(а) массаж (2022-10-01)'
        ];
    }
}
