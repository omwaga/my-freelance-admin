<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WritersOnline extends Component
{
    public $writersOnline;

    public function mount() {
        $this->writersOnline = 0;
    }

    public function render()
    {
        return view('livewire.writers-online');
    }
}
