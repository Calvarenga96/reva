<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Venue;

class VenueComponent extends Component
{
    public $venues;
    public $name;
    public $description;

    public function render()
    {
        $this->venues = Venue::all();

        return view('livewire.venue-component');
    }

    public function createVenue()
    {
        $this->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Venue::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = '';
        $this->description = '';
    }
}
