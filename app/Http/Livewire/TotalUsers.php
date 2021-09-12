<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TotalUsers extends Component
{
    public $totalUsers;

    public function mount() {
        $this->totalUsers =  DB::table('users')->count();
    }

    public function render()
    {
        return view('livewire.total-users');
    }
}
