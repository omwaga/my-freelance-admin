{{-- Success is as dangerous as failure. --}}
<div wire:poll.500ms="checkIfUserActivated">
    @if($active == 0)
        <button wire:click="activateUser({{ $user_id }})"
                class="bg-blue-600 hover:bg-blue-800 hover:shadow-2xl text-white font-bold py-2 px-4 rounded inline-flex items-center">
            Activate
        </button>
    @else
        <button wire:click="deactivateUser({{ $user_id }})"
                class="bg-red-500 hover:bg-red-800 hover:shadow-2xl text-white font-bold py-2 px-4 rounded inline-flex items-center">
            Deactivate
        </button>
    @endif
</div>

