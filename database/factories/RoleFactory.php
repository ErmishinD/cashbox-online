<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $company_id = (isset($attribues['company_id'])) ?: $this->faker->randomElement(Company::pluck('id'));
        $role_human_name = $this->faker->word;

        return [
            'name' => Str::slug($role_human_name) . '.' . $company_id,
            'human_name' => $role_human_name,
            'company_id' => $company_id,
            'guard_name' => 'web'
        ];
    }
}
