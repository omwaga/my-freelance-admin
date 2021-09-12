<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class VerifiedUsers extends Component
{
    public $verifiedUsers;

    public function mount() {
        $this->verifiedUsers = DB::table('users')->where('email_verified_at', '<>', null)->count();
    }

    public function render()
    {
        return view('livewire.verified-users');
    }
}
