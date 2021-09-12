<div class="mx-auto w-full flex justify-content-center">
    {{-- In work, do what you enjoy. --}}
    <form wire:submit.prevent="addCitation" class="mx-auto w-1/2">
        @csrf
        <h1 class="text-center text-2xl mb-3">Add Style</h1>
        <label for="citation" class="mt-3">
            Citation
        </label>
        <br>
        <input type="text" placeholder="MLA" id="citation" wire:model="citation" name="citation"
               class="w-full p-2 rounded-lg">
        @error('citation') <span class="error text-red-400">{{ $message }}</span> @enderror

        <br>
        <input type="submit" class="bg-blue-500 hover:bg-blue-800 mt-3 p-2 text-white rounded mx-auto">
    </form>
</div>
