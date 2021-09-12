<?php

namespace App\Http\Livewire\MoneyManagement;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Denied extends Component
{

    public $denied;

    public function mount()
    {
        $this->denied = DB::table('fund_withdrawal_requests')->where('status', '=', 0)->count();
    }

    public function render()
    {
        return view('livewire.money-management.denied');
    }
}
