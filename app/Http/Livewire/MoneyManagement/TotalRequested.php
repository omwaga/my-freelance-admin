<?php

namespace App\Http\Livewire\MoneyManagement;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TotalRequested extends Component
{

    public $total_requested;

    public function mount()
    {
        $this->total_requested = DB::table('fund_withdrawal_requests')->sum('amount_requested');
    }

    public function render()
    {
        return view('livewire.money-management.total-requested');
    }
}
