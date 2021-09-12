<?php

namespace App\Http\Livewire\MoneyManagement;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Approved extends Component
{
    public $approved;

    public function mount()
    {
        $this->approved = DB::table('fund_withdrawal_requests')->where('status', '=', 1)->count();
    }

    public function render()
    {
        return view('livewire.money-management.approved');
    }
}
