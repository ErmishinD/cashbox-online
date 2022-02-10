<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class SellProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => Company::inRandomOrder()->first()->id,
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'has_discount' => $this->faker->boolean(20),
        ];
    }
}
