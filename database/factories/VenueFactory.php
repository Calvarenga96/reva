<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venue>
 */
class VenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElements(['local 1', 'local 2', 'local 3', 'local 4', 'local 5'], 1, false)[0],
            'description' => $this->faker->text(50),
            'created_at' => $this->faker->dateTimeBetween('2024-01-01', '2024-12-31')
        ];
    }
}
