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
            'month'=> $this->faker->dateTimeBetween('-4 months', 'now'),
            'payment_status' => $this->faker->randomElement(['En attente', 'Payé ✔️', 'En retard ❌']),
            'prev_payment_status' => $this->faker->randomElement(['Payé ✔️', 'En retard ❌']),
        ];
    }
}
