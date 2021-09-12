<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WritersWaitingApproval extends Controller
{
    public function index() {
        $writersWaitingApproval = DB::table('writers')->where('approved', '=', 0)->paginate(10);

        return view('dashboard', ['writers'=>$writersWaitingApproval]);
    }
}
