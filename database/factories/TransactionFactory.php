<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Car;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'purchase_date' => now(),
            'buyer_name' => $this->faker->name(),
            'unit' => $this->faker->randomDigit(),
            'unitable_id' => 1,
            'unitable_type' => Car::class
        ];
    }
}
