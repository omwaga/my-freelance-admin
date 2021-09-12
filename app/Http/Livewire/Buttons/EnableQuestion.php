<?php

namespace App\Http\Livewire\Buttons;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EnableQuestion extends Component
{
    public $questionID;
    public $status;

    public function activateQuestion($question) {
        DB::table('grammar_tests')
            ->where('id', '=', $question)
            ->update(['active' => true]);
        flash('Your request was successful!')->livewire($this);
    }

    public function deactivateQuestion($question) {
        DB::table('grammar_tests')
            ->where('id', '=', $question)
            ->update(['active' => false]);
    }

    public function checkStatus($question) {
        $this->status = DB::table('grammar_tests')->where('id', '=', $question)->value('active');
    }

    public function render()
    {
        return view('livewire.buttons.enable-question');
    }
}
