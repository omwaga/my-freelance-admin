<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrammarTestManagement extends Controller
{
    public function index() {
        $grammarQuestions = DB::table('grammar_tests')->orderBy('id', 'desc')->paginate(10);

        return view('grammar-test-management', ['grammarQuestions' => $grammarQuestions]);
    }
}
