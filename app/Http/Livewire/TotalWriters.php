<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TotalWriters extends Component
{
    public $totalWriters;

    public function mount() {
        $this->totalWriters = DB::table('writers')->count();
    }

    public function render()
    {
        return view('livewire.total-writers');
    }
}
