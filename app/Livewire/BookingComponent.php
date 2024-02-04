<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Venue;
use Livewire\WithPagination;

class BookingComponent extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $venue_id;
    public $date;
    public $status = 'pendiente';
    public $notes = null;
    public $total_price = 1500000;
    public $is_paid = false;

    public function render()
    {
        $bookings = Booking::with('venue')->paginate(10);
        $venues = Venue::all();

        return view('livewire.booking-component', [
            'bookings' => $bookings,
            'venues' => $venues,
        ]);
    }

    public function read($id)
    {
        $booking = Booking::findOrFail($id);
        $this->venue_id = $booking->venue_id;
        $this->date = $booking->date;
        $this->status = $booking->status;
        $this->notes = $booking->notes;
        $this->total_price = $booking->total_price;
        $this->is_paid = $booking->is_paid;

        $this->modalFormVisible = true;
    }

    public function update()
    {
        $this->validate([
            'venue_id' => 'required',
            'date' => 'required|date',
            'status' => 'required|in:pendiente,confirmado,cancelado',
            'total_price' => 'required|numeric|min:0',
            'is_paid' => 'boolean',
        ]);

        $booking = Booking::find($this->modelId);

        $booking->update([
            'venue_id' => $this->venueId,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'status' => $this->status,
            'notes' => $this->notes,
            'total_price' => $this->total_price,
            'is_paid' => $this->is_paid,
        ]);

        $this->modalFormVisible = false;
        $this->resetForm();
    }

    public function delete($id)
    {
        Booking::find($id)->delete();
    }

    public function resetForm()
    {
        $this->venue_id = null;
        $this->date = null;
        $this->status = 'pendiente';
        $this->notes = null;
        $this->total_price = null;
        $this->is_paid = false;
    }
}
