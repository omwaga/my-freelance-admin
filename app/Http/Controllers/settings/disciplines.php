<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class disciplines extends Controller
{
    public function index() {
        $results = DB::table('settings_disciplines')
            ->orderBy('disciplines')
            ->paginate();

        return view('settings.disciplines', ['disciplines' => $results]);
    }
}
