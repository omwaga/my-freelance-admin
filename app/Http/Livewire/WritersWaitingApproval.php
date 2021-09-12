<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WritersWaitingApproval extends Component
{
    public $writers;

    public function mount() {
            $this->writers = DB::table('writers')->where('approved', '=', 0)->paginate(10);
        }

    public function render()
    {
        return view('livewire.writers-waiting-approval');
    }
}
