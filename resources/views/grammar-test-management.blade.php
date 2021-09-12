<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="font-semibold text-xl text-blue-500 font-bold leading-tight">
                {{ __('Grammar Test Management') }}
            </h2>
            <div class="ml-auto">
                <a href="/question/add"
                   class="self-end bg-blue-500 hover:bg-blue-600 px-4 py-2 text-white font-bold rounded shadow-lg hover:shadow-xl transition duration-200">Add
                    Question</a>
            </div>
        </div>
    </x-slot>

    <div class="mt-5 mb-5 p-3">
        <h1 class="pl-5 pr-5 pt-2 pb-2 text-2xl">Grammar Test Questions</h1>
        <table class="table table-fixed min-w-full leading-normal">
            <thead>
            <tr>
                <th class="px-5 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    #
                </th>
                <th class="px-5 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Question
                </th>
                <th class="px-5 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Choice One
                </th>
                <th class="px-5 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Choice Two
                </th>
                <th class="px-5 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Choice Three
                </th>
                <th class="px-5 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Choice Four
                </th>
                <th class="px-5 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Answer
                </th>
                <th class="px-5 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                </th>
                <th class="px-5 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($grammarQuestions as $index=>$grammarQuestion)
                <tr>
                    <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                        {{ $index+1 }}</td>
                    <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                        {{ $grammarQuestion->question }}</td>
                    <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                        {{ $grammarQuestion->choice_one }}</td>
                    <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                        {{ ucfirst($grammarQuestion->choice_two) }}
                    </td>
                    <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                        {{ $grammarQuestion->choice_three }}
                    </td>
                    <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                        {{ $grammarQuestion->choice_four }}
                    </td>
                    <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                        {{ $grammarQuestion->answer }}
                    </td>
                    <td class="px-2 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                        <a href="/question/edit/{{$grammarQuestion->id}}"
                           class="bg-blue-600 hover:bg-blue-800 hover:shadow-2xl text-white py-1 px-4 rounded">
                            Edit
                        </a>
                    </td>
                    <td class="px-2 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                        @livewire('buttons.enable-question', ['questionID' => $grammarQuestion->id, 'status' =>
                        $grammarQuestion->active])
                    </td>
                    <td class="px-2 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                        @livewire('buttons.delete-button', ['questionID' => $grammarQuestion->id, 'status' =>
                        $grammarQuestion->active])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-5">
        {{ $grammarQuestions->links() }}
    </div>
</x-app-layout>
