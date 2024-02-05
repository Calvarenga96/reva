<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Venue;
use App\Constants\Months;

class BookingEvolutionChartComponent extends Component
{
    public $chartData;

    public function render()
    {
        $this->chartData = $this->getChartData();

        return view('livewire.booking-evolution-chart-component');
    }

    private function getChartData()
    {
        $data = Venue::all();
        $monthCounts = [];

        foreach ($data as $venue) {
            $month = $this->formatMonthToSpanish($venue->created_at);

            // Increments the counter for the current month
            $monthCounts[$month] = ($monthCounts[$month] ?? 0) + 1;
        }

        // Get months in Spanish from the Months class
        $monthsInSpanish = Months::getMonthsInSpanish();

        // Sorts the associative array based on the order of the Months class.
        $sortedMonthCounts = [];

        foreach ($monthsInSpanish as $month) {
            $sortedMonthCounts[$month] = $monthCounts[$month] ?? 0;
        }

        $labels = array_keys($sortedMonthCounts);
        $data = array_values($sortedMonthCounts);

        return compact('labels', 'data');
    }

    private function formatMonthToSpanish($date)
    {
        $monthsToSpanish = Months::getMonthsFromEnglishToSpanish();

        $getMonth = \Carbon\Carbon::parse($date)->format('F');

        return $monthsToSpanish[$getMonth];
    }
}
