<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vehicle;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'engine' => $this->faker->word(),
            'seats' => $this->faker->numberBetween(2, 4),
            'type' => $this->faker->word(),
            'vehicleable_id' => 1,
            'vehicleable_type' => Vehicle::class
        ];
    }
}
