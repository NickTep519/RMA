<?php

namespace Database\Factories\Admin ;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
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
            'neighborhood' => $this->faker->word(), 
            'sold' => false,
            'rent_advance' => 3,
            'rent_prepaid' => 3,
            'cee' => $this->faker->numberBetween(10000, 50000),
            'commission' => $this->faker->numberBetween(1,3),
            'visit_fees' => $this->faker->numberBetween(3000, 10000)
        ];
    }
}