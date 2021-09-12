<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Question') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        @livewire('grammar.edit-question', ['answer'=>$answer, 'choice_one' => $choice_one, 'question' => $question,
        'choice_two'=>$choice_two, 'choice_three'=>$choice_three, 'choice_four' => $choice_four, 'questionID' =>
        $questionID])
    </x-slot>
</x-app-layout>
