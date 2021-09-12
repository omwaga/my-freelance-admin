<div class="mx-auto w-full flex justify-content-center">
    {{-- In work, do what you enjoy. --}}
    <form wire:submit.prevent="addLanguage" class="mx-auto w-1/2">
        @csrf
        <h1 class="text-center text-2xl mb-3">Add Subject</h1>
        <label for="language" class="mt-3">
            Subject
        </label>
        <br>
        <input type="text" placeholder="Nursing" id="language" wire:model="language" name="language"
               class="w-full p-2 rounded-lg">
        @error('language') <span class="error text-red-400">{{ $message }}</span> @enderror
        <br>
        <input type="submit" class="bg-blue-500 hover:bg-blue-800 mt-3 p-2 text-white rounded mx-auto">
    </form>
</div>
