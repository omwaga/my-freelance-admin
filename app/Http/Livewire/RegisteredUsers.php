<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RegisteredUsers extends Component
{
    public $registeredUsers;

    public function mount() {
        $this->registeredUsers = DB::table('users')->get()->count();
    }

    public function render()
    {
        return view('livewire.registered-users');
    }
}
