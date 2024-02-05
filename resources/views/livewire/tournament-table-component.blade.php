<div class="p-4">
    <div class="mb-4">
        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-md">Crear Torneo</button>
    </div>

    <table class="w-full border border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4">Nombre</th>
                <th class="py-2 px-4">Inicio</th>
                <th class="py-2 px-4">Fin</th>
                <th class="py-2 px-4">Local</th>
                <th class="py-2 px-4">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tournaments as $tournament)
                <tr class="border-t">
                    <td class="py-2 px-4">{{ $tournament['title'] }}</td>
                    <td class="py-2 px-4">{{ $tournament['start'] }}</td>
                    <td class="py-2 px-4">{{ $tournament['end'] }}</td>
                    <td class="py-2 px-4">{{ $tournament['venue']['name'] }}</td>
                    <td class="py-2 px-4">
                        <button class="bg-green-500 text-white px-3 py-1 rounded-md"
                            wire:click="edit({{ $tournament['id'] }})">Editar</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded-md"
                            wire:click="destroy({{ $tournament['id'] }})">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($editing)
        <dialog>
            <div class="border-t">
                <div colspan="4">
                    <form wire:submit.prevent="update">
                        <input type="text" wire:model="editedTournamentTitle" class="border p-2 rounded-md mb-4">
                        <input type="date" wire:model="editedTournamentStart" class="border p-2 rounded-md mb-4">
                        <input type="date" wire:model="editedTournamentEnd" class="border p-2 rounded-md mb-4">
                        <input type="text" wire:model="editedTournamentVenue" class="border p-2 rounded-md mb-4">
                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded-md">Guardar</button>
                        <button type="button" wire:click="cancelEdit"
                            class="bg-red-500 text-white px-3 py-1 rounded-md">Cancelar</button>
                    </form>
                </div>
            </div>
        </dialog>
    @endif
</div>
