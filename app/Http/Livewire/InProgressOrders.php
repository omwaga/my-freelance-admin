<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class InProgressOrders extends Component
{
    public $inProgressOrders;

    public function mount(){
        $this->inProgressOrders = DB::table('orders')->where('in_progress', '=', 1)->count();
    }

    public function render()
    {
        return view('livewire.in-progress-orders');
    }
}
