<?php

namespace App\Http\Livewire\Buttons;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ActivateWriter extends Component
{
    public $writer_id;
    public $approved;

    public function activateWriter($writer) {
        DB::table('writers')
            ->where('id', '=', $writer)
            ->update(['approved' => true]);
        flash('Your request was successful!')->livewire($this);
    }

    public function deActivateWriter($writer) {
        DB::table('writers')
            ->where('id', '=', $writer)
            ->update(['approved' => false]);
    }

    public function checkIfWriterApproved() {
        $this->approved = DB::table('writers')->where('id', '=', $this->writer_id)->value('approved');
    }

    public function render()
    {
        return view('livewire.buttons.activate-writer');
    }
}
