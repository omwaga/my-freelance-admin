<?php

namespace App\Http\Livewire\MoneyManagement;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Requests extends Component
{
    public $allRequests;

    public function mount()
    {
        $this->allRequests = DB::table('fund_withdrawal_requests')->count();
    }


    public function render()
    {
        return view('livewire.money-management.requests');
    }
}
