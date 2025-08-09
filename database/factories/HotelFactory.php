<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company . ' Hotel',
            'location' => $this->faker->city . ', ' . $this->faker->country,
            'price_per_night' => $this->faker->randomFloat(2, 50, 500),
            'available_rooms' => $this->faker->numberBetween(0, 20),
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'source' => $this->faker->randomElement(['supplier_a', 'supplier_b', 'supplier_c', 'supplier_d']),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];
    }

    public function fromSupplier(string $supplier)
    {
        return $this->state(fn() => ['source' => $supplier]);
    }
}
