<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FailedWriters extends Component
{

    public $failedWriters;

    public function mount() {
        $this->failedWriters = DB::table('writers')->where('failed_test', '=', 1)->count();
    }

    public function render()
    {
        return view('livewire.failed-writers');
    }
}
