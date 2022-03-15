<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class StorageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shop_id' => (isset($attribues['company_id'])) ?: $this->faker->randomElement(Shop::pluck('id')),
            'name' => 'Storage ' . $this->faker->word,
        ];
    }
}
