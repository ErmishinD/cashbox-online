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
        $sellable_type = $this->faker->randomElement([SellProduct::class, SellProductGroup::class]);
        if ($sellable_type == SellProduct::class) {
            $sellable_id = SellProduct::inRandomOrder()->first();
        }
        else {
            $sellable_id = SellProductGroup::inRandomOrder()->first();
        }
        $operator = User::inRandomOrder()->first();;

        $collected_at = null;
        $collector_id = null;
        if ($this->faker->boolean) {
            $collector = User::factory()->create();
            $collector_id = $collector->id;
            $collected_at = $this->faker->dateTime;
        }
        return [
            'shop_id' => Shop::inRandomOrder()->first()->id,
            'sellable_type' => $sellable_type,
            'sellable_id' => $sellable_id,
            'transaction_type' => $this->faker->randomElement(['_in', '_out']),
            'payment_type' => $this->faker->randomElement(['_cash', '_card']),
            'amount' => $this->faker->randomFloat(2, 50, 1000),
            'description' => $this->faker->sentence,
            'operator_id' => $operator->id,
            'collected_at' => $collected_at,
            'collector_id' => $collector_id,
        ];
    }
}
