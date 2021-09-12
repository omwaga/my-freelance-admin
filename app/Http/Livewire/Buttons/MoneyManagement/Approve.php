<?php

namespace App\Http\Livewire\Buttons\MoneyManagement;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Approve extends Component
{
    public $withdrawal_id;
    public $status;

    public function approveRequest($withdrawal)
    {
        DB::table('fund_withdrawal_requests')
            ->where('id', '=', $withdrawal)
            ->update(['status' => true]);
        flash('Your request was successful!')->livewire($this);
    }

    public function denyRequest($withdrawal)
    {
        DB::table('fund_withdrawal_requests')
            ->where('id', '=', $withdrawal)
            ->update(['status' => false]);
    }

    public function checkIfRequestApproved()
    {
        $this->status = DB::table('fund_withdrawal_requests')->where('id', '=', $this->withdrawal_id)->value('status');
    }

    public function render()
    {
        return view('livewire.buttons.money-management.approve');
    }
}
