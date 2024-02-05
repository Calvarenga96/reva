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
            'name' => $this->faker->randomElements(["torneo 1", "torneo 2", "torneo 3", "torneo 4", "torneo 5", "torneo 6", "torneo 7", "torneo 8", "torneo 9"])[0],
            'start_date' => $this->faker->dateTimeBetween('now', '+30 days'),
            'end_date' => $this->faker->dateTimeBetween('+30 day', '+35 day'),
            'venue_id' => $this->faker->randomElement($venues),
        ];
    }
}
