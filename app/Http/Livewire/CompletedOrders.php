<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CompletedOrders extends Component
{
    public $completeOrders;

    public function mount() {
        $this->completeOrders = DB::table('orders')->where('completed', '=', false)->count();
    }

    public function render()
    {
        return view('livewire.completed-orders');
    }
}
