<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GasStation>
 */
class GasStationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'src_id' => $this->faker->unique()->randomNumber(5),
            'brand_id' => Brand::factory(),
            'brand_src_id' => $this->faker->randomNumber(3),
            'name' => $this->faker->company,
            'city' => $this->faker->city,
            'address' => $this->faker->address,
            'lat' => $this->faker->latitude,
            'lon' => $this->faker->longitude
        ];
    }
}
