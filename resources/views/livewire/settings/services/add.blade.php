<div class="mx-auto w-full flex justify-content-center">
    {{-- In work, do what you enjoy. --}}
    <form wire:submit.prevent="addService" class="mx-auto w-1/2">
        @csrf
        <h1 class="text-center text-2xl mb-3">Add Service</h1>
        <label for="service" class="mt-3">
            Service
        </label>
        <br>
        <input type="text" placeholder="Writing from scratch" id="service" wire:model="service" name="service"
               class="w-full p-2 rounded-lg">
        @error('service') <span class="error text-red-400">{{ $message }}</span> @enderror

        <br>
        <input type="submit" class="bg-blue-500 hover:bg-blue-800 mt-3 p-2 text-white rounded mx-auto">
    </form>
</div>
