<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Venue;

class BookingByVenueChartComponent extends Component
{
    public $venuesData = [];
    protected $listenes = ['addedData'];


    public function render()
    {
        $this->venuesData = $this->getVenuesData();
        return view('livewire.booking-by-venue-chart-component');
    }

    private function getVenuesData()
    {
        $venues = Venue::withCount('bookings')->get();
        return $venues->pluck('bookings_count', 'name')->toArray();
    }
}
