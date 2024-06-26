<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rental>
 */
class RentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        return [
            'month'=> $this->faker->dateTimeBetween('28-05-2024', '28-07-2024'),
            'payment_status' => $this->faker->randomElement(['on_hold', 'paid', 'late']),
            'prev_payment_status' => $this->faker->randomElement(['paid', 'late']),
        ];
    }
}
