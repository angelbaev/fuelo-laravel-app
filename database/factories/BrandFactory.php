<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
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
            'logo' => $this->faker->imageUrl(),
            'name' => $this->faker->company,
            'status' => $this->faker->randomElement([0, 1])
        ];
    }
}
