<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\District>
 */
class DistrictFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'src_id' => $this->faker->unique()->numberBetween(1, 100000),
            'name' => $this->faker->city,
            'status' => $this->faker->randomElement([0, 1])
        ];
    }
}
