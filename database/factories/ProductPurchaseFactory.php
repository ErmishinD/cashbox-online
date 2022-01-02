<?php

namespace Database\Factories;

use App\Models\MeasureType;
use App\Models\ProductType;
use App\Models\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $quantity = $this->faker->randomElement([1, 5, 10, 20, 50, 100]);
        $product_type = ProductType::inRandomOrder()->first();
        $measure_type = MeasureType::inRandomOrder()->first();
        $expiration_date = null;
        if ($product_type->type == '_perishable') {
            $expiration_date = $this->faker->dateTimeBetween('+1 week', '+1 year');
        }
        return [
            'storage_id' => Storage::inRandomOrder()->first()->id,
            'product_type_id' => $product_type->id,
            'measure_type_id' => $measure_type->id,
            'quantity' => $quantity,
            'current_quantity' => $quantity,
            'cost' => $this->faker->randomElement([100, 250, 500, 1000, 2500]),
            'expiration_date' => $expiration_date,
        ];
    }
}
