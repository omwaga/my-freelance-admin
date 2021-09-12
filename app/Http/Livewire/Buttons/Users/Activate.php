<?php

namespace App\Http\Livewire\Buttons\Users;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Activate extends Component
{
    public $user_id;
    public $active;

    public function activateUser($id)
    {
        DB::table('users')
            ->where('id', '=', $id)
            ->update(['active' => true]);
        flash('Your request was successful!')->livewire($this);
    }

    public function deactivateUser($withdrawal)
    {
        DB::table('users')
            ->where('id', '=', $withdrawal)
            ->update(['active' => false]);
    }

    public function checkIfUserActivated()
    {
        $this->active = DB::table('users')->where('id', '=', $this->user_id)->value('active');
    }

    public function render()
    {
        return view('livewire.buttons.users.activate');
    }
}
