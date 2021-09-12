<div wire:poll="checkStatus({{$questionID}})">
    {{-- The Master doesn't talk, he acts. --}}
    @if($status == 1)
        <button wire:click="deactivateQuestion({{$questionID}})" class="bg-green-600 hover:bg-green-800 hover:shadow-2xl text-white py-1 px-4 rounded">Active</button>
    @else
        <button wire:click="activateQuestion({{$questionID}})" class="bg-red-600 hover:bg-red-800 hover:shadow-2xl text-white py-1 px-4 rounded">Inactive</button>
    @endif
</div>
