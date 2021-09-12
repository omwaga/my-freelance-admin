<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ApprovedWriters extends Component
{
    public $approvedWriters;

    public function mount() {
        $this->approvedWriters = DB::table('writers')->where('approved', '=', 1)->count();
    }

    public function render()
    {
        return view('livewire.approved-writers');
    }
}
