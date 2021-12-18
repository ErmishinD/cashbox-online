<?php

namespace Database\Factories;

use App\Models\BaseMeasureType;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductTypeFactory extends Factory
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
            'type' => $this->faker->randomElement(['_perishable', '_imperishable']),
            'photo' => $this->faker->imageUrl,
            'base_measure_type_id' => BaseMeasureType::inRandomOrder()->first()->id,
            'barcode' => $this->faker->numerify('##########')
        ];
    }
}
