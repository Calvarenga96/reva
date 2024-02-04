<div class="bg-white p-4 rounded-md shadow-md" x-data="{ open: $openModal }">

    @teleport('.modal')
        <div class="absolute w-1/2 bg-blur">
            {{-- This modal is rendered by its own class --}}
            <livewire:booking-modal :venues="$venues" />
        </div>
    @endteleport

    <div wire:ignore class="mb-8">
        <h3 class="text-xl font-semibold mb-4 modal">Reservas</h3>
    </div>

    <button @click="open=true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
        Crear reserva
    </button>

    <div class="overflow-x-auto modal">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b">Local</th>
                    <th class="py-2 px-4 border-b">Fecha</th>
                    <th class="py-2 px-4 border-b">Estatus</th>
                    <th class="py-2 px-4 border-b">Precio</th>
                    <th class="py-2 px-4 border-b">Pagado</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $booking->venue->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $booking->date }}</td>
                        <td class="py-2 px-4 border-b">{{ $booking->status }}</td>
                        <td class="py-2 px-4 border-b">{{ $booking->total_price }}</td>
                        <td class="py-2 px-4 border-b">{{ $booking->is_paid ? 'Si' : 'No' }}</td>
                        <td class="py-2 px-4 border-b">
                            <button wire:click="read({{ $booking->id }})"
                                class="text-blue-500 hover:underline focus:outline-none">Editar</button>
                            <button wire:click="delete({{ $booking->id }})"
                                class="text-red-500 hover:underline focus:outline-none">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
