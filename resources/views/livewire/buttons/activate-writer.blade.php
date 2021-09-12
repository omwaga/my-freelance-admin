{{-- Success is as dangerous as failure. --}}
<div wire:poll.500ms="checkIfWriterApproved">
    @if($approved == 0)
        <button wire:click="activateWriter({{ $writer_id }})"
                class="bg-blue-600 hover:bg-blue-800 hover:shadow-2xl text-white font-bold py-2 px-4 rounded inline-flex items-center">
            Approve
        </button>
    @else
        <button wire:click="deActivateWriter({{ $writer_id }})"
                class="bg-red-400 hover:bg-red-800 hover:shadow-2xl text-white font-bold py-2 px-4 rounded inline-flex items-center">
            Disapprove
        </button>
    @endif
</div>

