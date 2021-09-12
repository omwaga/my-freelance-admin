{{-- Success is as dangerous as failure. --}}
<div wire:poll.500ms="checkIfRequestApproved">
    @if($status == 0)
        <button wire:click="approveRequest({{ $withdrawal_id }})"
                class="bg-red-600 hover:bg-red-800 hover:shadow-2xl text-white font-bold py-2 px-4 rounded inline-flex items-center">
            Denied
        </button>
    @else
        <button wire:click="denyRequest({{ $withdrawal_id }})"
                class="bg-green-500 hover:bg-green-800 hover:shadow-2xl text-white font-bold py-2 px-4 rounded inline-flex items-center">
            Approved
        </button>
    @endif
</div>

