<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\ProductType;
use App\Models\Storage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WriteOff>
 */
class WriteOffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $company_id = (isset($attribues['company_id'])) ?: $this->faker->randomElement(Company::pluck('id'));
        $storage_id = (isset($attribues['storage_id'])) ?: $this->faker->randomElement(Storage::where('company_id', $company_id)->pluck('id'));
        $user_id = (isset($attribues['user_id'])) ?: $this->faker->randomElement(User::where('company_id', $company_id)->pluck('id'));
        $product_type_id = (isset($attribues['product_type_id'])) ?: $this->faker->randomElement(ProductType::where('company_id', $company_id)->pluck('id'));
        return [
            'company_id' => $company_id,
            'storage_id' => $storage_id,
            'user_id' => $user_id,
            'product_type_id' => $product_type_id,
            'quantity' => $this->faker->numberBetween(1, 10000),
        ];
    }
}
