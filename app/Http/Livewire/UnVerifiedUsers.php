<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UnVerifiedUsers extends Component
{
    public $unVerifiedUsers;

    public function mount() {
        $this->unVerifiedUsers = DB::table('users')->where('email_verified_at', '=', null)->count();
    }

    public function render()
    {
        return view('livewire.un-verified-users');
    }
}
