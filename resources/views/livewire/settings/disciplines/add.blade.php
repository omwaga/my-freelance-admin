<div class="mx-auto w-full flex justify-content-center">
    {{-- In work, do what you enjoy. --}}
    <form wire:submit.prevent="addDiscipline" class="mx-auto w-1/2">
        @csrf
        <h1 class="text-center text-2xl mb-3">Add Type of Paper</h1>
        <label for="disciplines" class="mt-3">
            Type
        </label>
        <br>
        <input type="text" placeholder="Research Paper" id="discipline" wire:model="disciplines" name="disciplines"
               class="w-full p-2 rounded-lg">
        @error('disciplines') <span class="error text-red-400"> {{ $message }}</span> @enderror
        <br>
        <input type="submit" class="bg-blue-500 hover:bg-blue-800 mt-3 p-2 text-white rounded mx-auto">
    </form>
</div>
