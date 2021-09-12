<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="font-semibold text-xl text-blue-500 font-bold leading-tight">
                {{ __('Add Question') }}
            </h2>
            <div class="absolute right-20">
                <a href="{{ \Illuminate\Support\Facades\URL::previous() }}"
                   class="self-end bg-blue-500 hover:bg-blue-600 px-4 py-2 text-white font-bold rounded shadow-lg hover:shadow-xl transition duration-200">Back</a>
            </div>
        </div>
    </x-slot>
    <x-slot name="slot">
        @livewire('grammar.add-update')
    </x-slot>
</x-app-layout>
