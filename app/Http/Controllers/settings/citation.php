<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class citation extends Controller
{
    public function index() {
        $results = DB::table('settings_citations')
            ->orderBy('style')
            ->paginate();

        return view('settings.citations', ['citations' => $results]);
    }
}
