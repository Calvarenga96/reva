<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Venue;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tournament>
 */
class TournamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $venues = Venue::pluck('id')->toArray();

        return [
            'name' => $this->faker->randomElement(["torneo 1", "torneo 2", "torneo 3"]),
            'date' => $this->faker->dateTimeBetween('now', '+30 days'),
            'venue_id' => $this->faker->randomElement($venues),
        ];
    }
}
