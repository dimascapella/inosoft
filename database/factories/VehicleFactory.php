<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year_of_release' => 2022,
            'color' => $this->faker->colorName(),
            'price' => $this->faker->numberBetween(10, 100) * 1000000
        ];
    }
}
