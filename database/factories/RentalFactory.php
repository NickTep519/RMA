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

        $status_payment = $this->faker->boolean(50)  ; 
        
        if ($status_payment) {
            $month = $this->faker->dateTimeBetween('-4 months', '-2 months') ; 
        } else {
            $month = $this->faker->dateTimeBetween('-2 months', 'now') ; 
        }
        

        return [
            'month'=> $month,
            'payment_status' => $status_payment,
            'prev_payment_status' => $this->faker->boolean(80)
        ];
    }
}
