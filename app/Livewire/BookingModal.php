<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Booking;

class BookingModal extends Component
{
    public $venues;
    #[Validate('required')]

    public $date;
    #[Validate('required|date')]

    public $status = 'pendiente';
    public $notes = null;
    #[Validate('required|numeric|min:150000')]

    public $total_price;
    #[Validate('boolean')]

    public $is_paid = false;
    #[Validate('required')]
    public $venue_id;
    public $openModal = false;

    public function render()
    {
        return <<<'HTML'
            <div x-show="open" class="inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center mx-auto">
                <div class="inset-0 flex items-center justify-center mx-auto">
                    <div class="bg-white p-4 rounded-md shadow-md w-full max-w-md">
                        <form wire:submit.prevent="create">
                            <label for="venue_id">Local:</label>
                            <select wire:model="venue_id" id="venue_id" name="venue_id" required class="w-full border p-2 rounded-md mb-4">
                                @foreach ($venues as $venue)
                                    <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                                @endforeach
                            </select>

                            <label for="date">Fecha:</label>
                            <input wire:model="date" type="date" id="date" name="date" required class="w-full border p-2 rounded-md mb-4">

                            <label for="status">Estatus:</label>
                            <select wire:model="status" id="status" name="status" required class="w-full border p-2 rounded-md mb-4">
                                <option value="pendiente">Pendiente</option>
                                <option value="confirmado">Confirmado</option>
                                <option value="cancelado">Cancelado</option>
                            </select>

                            <label for="notes">Notas adicionales:</label>
                            <textarea wire:model="notes" id="notes" name="notes" class="w-full border p-2 rounded-md mb-4"></textarea>

                            <label for="total_price">Precio:</label>
                            <input wire:model="total_price" type="number" id="total_price" name="total_price" step="0.01" required class="w-full border p-2 rounded-md mb-4">

                            <label for="is_paid">Pagado:</label>
                            <input wire:model="is_paid" type="checkbox" id="is_paid" name="is_paid" class="mb-4">

                            <div class="flex justify-between">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md" @click="$wire.create" @click="open=false">Guardar</button>
                                <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md" @click="open=false">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        HTML;
    }

    public function create()
    {

        $booking = new Booking;

        $booking->venue_id = $this->venue_id;
        $booking->date = $this->date;
        $booking->status = $this->status;
        $booking->notes = $this->notes;
        $booking->total_price = $this->total_price;
        $booking->is_paid = $this->is_paid;

        // dd([$this->venue_id, $this->date]);

        $booking->save();

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->venue_id = null;
        $this->date = null;
        $this->status = 'pendiente';
        $this->notes = null;
        $this->total_price = 150000;
        $this->is_paid = false;
    }
}
