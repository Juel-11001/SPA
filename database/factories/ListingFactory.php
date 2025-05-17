<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'beds'=>fake()->numberBetween(1,7),
            'bath'=>fake()->numberBetween(1,7),
            'area'=>fake()->numberBetween(10, 500),
            'city'=>fake()->city(),
            'code'=>fake()->postcode(),
            'street'=>fake()->streetName(),
            'street_number'=>fake()->numberBetween(10,211),
            'price'=>fake()->numberBetween(50_000, 2_00_000)
        ];
    }
}
