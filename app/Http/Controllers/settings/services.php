<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class services extends Controller
{
    public function index()
    {
        $results = DB::table('settings_services')
            ->orderBy('name')
            ->paginate();

        return view('settings.services', ['services' => $results]);
    }
}
