<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Constants\Months;

class BookingChartComponent extends Component
{
    public $bookings = [];
    public $months;


    public function render()
    {
        $this->months = Months::getMonthsInSpanish();
        $this->bookings = Booking::all()->toArray();
        return view('livewire.booking-chart-component');
    }
}
