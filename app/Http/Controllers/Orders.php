<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Orders extends Controller
{
    public function index() {
        $orders = DB::table('orders')->paginate(15);

        return view('orders', ["orders"=>$orders]);
    }
}
