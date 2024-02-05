<div>
    <form wire:submit.prevent="update">
        <label for="venue_id">Local:</label>
        <select wire:model="venue_id" id="venue_id" name="venue_id" required>
            @foreach ($venues as $venue)
                <option value="{{ $venue->id }}">{{ $venue->name }}</option>
            @endforeach
        </select>



        <div class="flex justify-evenly mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Guardar</button>
            <button @click="resetForm" type="button"
                class="bg-red-500 text-white px-4 py-2 rounded-md">Cancelar</button>
        </div>
    </form>
</div>
