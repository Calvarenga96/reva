<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Venue;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $venues = Venue::pluck('id')->toArray();
        // Get the current date
        $currentDate = Carbon::now();

        // Generate a random number of days between 0 and 365 (a year)
        $randomDays = rand(0, 365);

        // Add the random days interval to the current date
        $randomDate = $currentDate->addDays($randomDays);

        return [
            'venue_id' => $this->faker->randomElement($venues),
            'date' => $randomDate->toDateString(),
            'status' => $this->faker->randomElement(['pendiente', 'confirmado', 'cancelado']),
            'notes' => $this->faker->paragraph,
            'total_price' => $this->faker->randomElement([150000, 200000, 300000]),
            'is_paid' => $this->faker->boolean,
        ];
    }
}
