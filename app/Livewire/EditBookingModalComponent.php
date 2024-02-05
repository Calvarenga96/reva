<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Venue;
use Livewire\Attributes\Validate;

class EditBookingModalComponent extends Component
{
    public $bookingId;
    #[Validate('required')]
    public $venue_id;
    #[Validate('required|date')]

    public $date;
    #[Validate('required|in:pendiente,confirmado,cancelado')]

    public $status;
    public $notes;
    #[Validate('required|numeric|min:0')]

    public $total_price;
    #[Validate('boolean')]

    public $is_paid;
    public $venues;

    public function mount($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);

        $this->bookingId = $booking->id;
        $this->venue_id = $booking->venue_id;
        $this->date = $booking->date;
        $this->status = $booking->status;
        $this->notes = $booking->notes;
        $this->total_price = $booking->total_price;
        $this->is_paid = $booking->is_paid;

        $this->venues = Venue::all();
    }

    public function update()
    {
        $booking = Booking::find($this->bookingId);

        $booking->update([
            'venue_id' => $this->venue_id,
            'date' => $this->date,
            'status' => $this->status,
            'notes' => $this->notes,
            'total_price' => $this->total_price,
            'is_paid' => $this->is_paid,
        ]);

        $this->resetForm();
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

    public function render()
    {
        return view('livewire.edit-booking-modal-component');
    }
}
