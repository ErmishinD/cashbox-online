<?php

namespace Database\Factories;

use App\Models\Company;
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
        $company_id = (isset($attribues['company_id'])) ?: $this->faker->randomElement(Company::pluck('id'));
        return [
            'shop_id' => (isset($attribues['shop_id'])) ?: $this->faker->randomElement(Shop::where('company_id', $company_id)->pluck('id')),
            'name' => 'Storage ' . $this->faker->word,
            'company_id' => $company_id,
        ];
    }
}
