<div class="mx-auto bg-white p-4 rounded-md shadow-md">
    <form wire:submit.prevent="createVenue" class="mb-8">

        <h1 class="text-xl font-semibold mb-4">Instalaciones</h1>

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">Nombre:</label>
            <input wire:model="name" type="text" id="name" required class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-600">Descripción:</label>
            <textarea wire:model="description" id="description" class="mt-1 p-2 w-full border rounded-md"></textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Agregar Instalación
            Deportiva</button>
    </form>

    <ul>
        @foreach ($venues as $venue)
            <li class="border-b py-2">
                {{ $venue->name }} - {{ $venue->description }}
            </li>
        @endforeach
    </ul>

</div>
