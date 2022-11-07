<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vehicle;

class MotorcycleFactory extends Factory
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
            'suspension' => $this->faker->word(),
            'transmission' => $this->faker->word(),
            'vehicleable_id' => 1,
            'vehicleable_type' => Vehicle::class
        ];
    }
}
