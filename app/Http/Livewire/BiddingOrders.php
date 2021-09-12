<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BiddingOrders extends Component
{

    public $biddingOrders;

    public function mount() {
        $this->biddingOrders = DB::table('orders')->where('bidding', '=', 1)->count();
    }

    public function render()
    {
        return view('livewire.bidding-orders');
    }
}
