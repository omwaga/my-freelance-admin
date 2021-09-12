<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DraftOrders extends Component
{
    public $draftOrders;

    public function mount() {
        $this->draftOrders = DB::table('orders')->where('draft', '=', 1)->count();
    }

    public function render()
    {
        return view('livewire.draft-orders');
    }
}
