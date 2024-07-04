<?php

namespace Database\Factories;

use App\Models\Dimension;
use App\Models\Fuel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FuelPrice>
 */
class FuelPriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fuel_id' => Fuel::factory(),
            'dimension_id' => Dimension::factory(),
            'price' => $this->faker->randomFloat(2, 1, 100), // Generates a random price between 1 and 100
            'date' => $this->faker->date()
        ];
    }
}
