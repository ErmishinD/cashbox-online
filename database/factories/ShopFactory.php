<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => (isset($attribues['company_id'])) ?: $this->faker->randomElement(Company::pluck('id')),
            'name' => 'Shop ' . $this->faker->word,
            'address' => $this->faker->address
        ];
    }
}
