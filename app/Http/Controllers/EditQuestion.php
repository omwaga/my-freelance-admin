<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditQuestion extends Controller
{
    public function index($id)
    {
        $question = DB::table('grammar_tests')->where('id', $id)->value('question');
        $choice_one = DB::table('grammar_tests')->where('id', $id)->value('choice_one');
        $choice_two = DB::table('grammar_tests')->where('id', $id)->value('choice_two');
        $choice_three = DB::table('grammar_tests')->where('id', $id)->value('choice_three');
        $choice_four = DB::table('grammar_tests')->where('id', $id)->value('choice_four');
        $answer = DB::table('grammar_tests')->where('id', $id)->value('answer');

        return view('grammar-questions.edit-question', ['question' => $question, 'choice_one' => $choice_one,
            'choice_two' => $choice_two, 'choice_three' => $choice_three, 'choice_four' => $choice_four, 'answer' => $answer, 'questionID' => $id]);
    }
}
