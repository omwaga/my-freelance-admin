<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NewUsers extends Component
{

    public $newUsers;

    public function mount() {
        $this->newUsers = DB::table('users')->whereMonth('member_since', now()->month)->count();
    }

    public function render()
    {
        return view('livewire.new-users');
    }
}
