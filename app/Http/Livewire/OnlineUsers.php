<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OnlineUsers extends Component
{

    public $onlineUsers = 0;

    public function mount() {
        $this->onlineUsers = 0;
    }

    public function render()
    {
        return view('livewire.online-users');
    }
}
