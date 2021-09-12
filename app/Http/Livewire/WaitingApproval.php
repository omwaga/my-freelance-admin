<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WaitingApproval extends Component
{
    public $writersWaitingApproval;

    public function mount() {
        $this->writersWaitingApproval = DB::table('writers')->where('approved', '=', 0)->count();
    }

    public function render()
    {
        return view('livewire.waiting-approval');
    }
}
