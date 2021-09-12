<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mr-auto">
                {{ __('Add Type') }}
            </h2>

            @include('layouts.settings-top')

        </div>
    </x-slot>

    <div class="container mt-50 p-10">
        @livewire('settings.disciplines.add')
    </div>
</x-app-layout>
