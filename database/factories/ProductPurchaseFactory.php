<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\ProductType;
use App\Models\Storage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

class ProductPurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $company_id = (isset($attribues['company_id'])) ?: $this->faker->randomElement(Company::pluck('id'));
        $storage_id = (isset($attribues['storage_id'])) ?: $this->faker->randomElement(Storage::where('company_id', $company_id)->pluck('id'));

        $user_id = (isset($attribues['user_id'])) ?: (Auth::id() ?? $this->faker->randomElement(User::where('company_id', $company_id)->pluck('id')));

        $quantity = $this->faker->randomElement([1, 5, 10, 20, 50, 100, 1000, 1500, 2000]);

        $expiration_date = null;
        if (!isset($attribues['product_type_id']) && !isset($attribues['expiration_date'])) {
            $product_type = $this->faker->randomElement(ProductType::where('company_id', $company_id)->select('id', 'type')->get());

            if (!$product_type) {
                $product_type = ProductType::factory()->create(['company_id' => $company_id]);
            }
            $product_type_id = $product_type->id;
            if ($product_type->type == ProductType::TYPES['perishable']) {
                $expiration_date = $this->faker->dateTimeBetween('+1 week', '+1 year');
            }
        }
        else {
            $product_type_id = $attribues['product_type_id'];
        }

        return [
            'company_id' => $company_id,
            'storage_id' => $storage_id,
            'product_type_id' => $product_type_id,
            'quantity' => $quantity,
            'current_quantity' => $quantity,
            'cost' => $this->faker->randomElement([100, 250, 500, 1000, 2500]),
            'expiration_date' => $expiration_date,
            'user_id' => $user_id,
        ];
    }
}
