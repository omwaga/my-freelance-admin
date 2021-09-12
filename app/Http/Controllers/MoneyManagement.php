<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MoneyManagement extends Controller
{
    public function index()
    {
        $moneyRequests = DB::table('fund_withdrawal_requests')->paginate(15);

        return view('money-management', ['requests' => $moneyRequests]);
    }

    public function summary()
    {
        $trans = DB::table('fund_withdrawal_requests')->where('id', '=', $id)->first();

        return view('money-management.summar', ['trans' => $trans]);
    }
}
