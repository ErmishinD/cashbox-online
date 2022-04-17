<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\ProductPurchase;
use App\Models\Storage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transfer>
 */
class TransferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $company_id = (isset($attribues['company_id'])) ?: $this->faker->randomElement(Company::pluck('id'));
        $from_storage_id = (isset($attribues['from_storage_id'])) ?: $this->faker->randomElement(Storage::where('company_id', $company_id)->pluck('id'));
        $to_storage_id = (isset($attribues['to_storage_id'])) ?: $this->faker->randomElement(Storage::where('company_id', $company_id)->pluck('id'));
        $transferred_by = (isset($attribues['transferred_by'])) ?: $this->faker->randomElement(User::where('company_id', $company_id)->pluck('id'));
        $product_purchase_id = (isset($attribues['product_purchase_id'])) ?: ProductPurchase::factory()->create(['company_id' => $company_id, 'storage_id' => $to_storage_id]);
        return [
            'company_id' => $company_id,
            'from_storage_id' => $from_storage_id,
            'to_storage_id' => $to_storage_id,
            'transferred_by' => $transferred_by,
            'product_purchase_id' => $product_purchase_id,
        ];
    }
}
