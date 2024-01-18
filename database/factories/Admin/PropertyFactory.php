<?php

namespace Database\Factories\Admin ;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentences(2, true),
            'surface' => $this->faker->numberBetween(10, 500),
            'rooms'=> $this->faker->numberBetween(1, 20),
            'bedrooms'=> $this->faker->numberBetween(1,30),
            'floor' =>$this->faker->numberBetween(1,5),
            'price' => $this->faker->numberBetween(10000, 500000), 
            'neighborhood' => $this->faker->words(2, true), 
            'sold' => false
        ];
    }
}
