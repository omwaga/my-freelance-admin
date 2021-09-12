<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class language extends Controller
{
    public function index()
    {
        $results = DB::table('settings_languages')
            ->orderBy('language')
            ->paginate();

        return view('settings.language', ['languages' => $results]);
    }
}
