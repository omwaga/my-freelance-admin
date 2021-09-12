<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="font-semibold text-xl text-blue-500 font-bold leading-tight mr-auto">
                {{ __('Settings') }}
            </h2>

            @include('layouts.settings-top')

        </div>
    </x-slot>

    <div class="container mt-50 p-10">
        <div class="container">
            @livewire('settings.forms.social-links-settings', ['instagram_url' => $instagram_url, 'linkedin_url' =>
            $linkedin_url, 'twitter_url' => $twitter_url, 'facebook_url' => $facebook_url])
        </div>
    </div>
</x-app-layout>
