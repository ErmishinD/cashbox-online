<?php

namespace Database\Factories;

use App\Models\Shop;
use App\Models\Storage;
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
            'shop_id' => Storage::inRandomOrder()->first(),
            'name' => 'Storage ' . $this->faker->word,
        ];
    }
}
