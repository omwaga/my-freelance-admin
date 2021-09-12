<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CancelledOrders extends Component
{
    public $cancelledOrders;

    public function mount() {
        $this->cancelledOrders = DB::table('orders')->where('cancelled', '=', 1)->count();
    }

    public function render()
    {
        return view('livewire.cancelled-orders');
    }
}
