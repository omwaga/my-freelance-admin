<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class degree extends Controller
{
    public function index() {
        $results = DB::table('settings_degrees')
            ->orderBy('name')
            ->paginate();

        return view('settings.degrees', ['degrees' => $results]);
    }
}
