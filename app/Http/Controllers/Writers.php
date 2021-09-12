<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Writers extends Controller
{
    public function index() {
        $writers = DB::table('writers')->paginate(15);

        return view('writers', ['writers'=>$writers]);
    }
}
