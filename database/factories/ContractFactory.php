<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tenant_name' => $this->faker->name(), 
            'tenant_phone' => $this->faker->phoneNumber(), 
            'idl' =>$this->faker->randomNumber(6, true),
            'npi' => $this->faker->randomNumber(6, true), 
            'profession' => $this->faker->word(),
            'rent' => $this->faker->numberBetween(15000, 100000),
            'integration_date' => $this->faker->dateTime($max = 'now', NULL), 
        ];
    }
}
