<?php

namespace Database\Factories;

use App\Models\BaseMeasureType;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeasureTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'base_measure_type_id' => BaseMeasureType::inRandomOrder()->get()->first()->id,
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->randomElement([10, 100, 1000, 10000]),
            'company_id' => Company::inRandomOrder()->get()->first()->id,
            'is_common' => $this->faker->boolean(35),
        ];
    }
}
