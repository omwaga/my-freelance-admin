<?php

namespace App\Http\Livewire\Buttons;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DeleteButton extends Component
{
    public $questionID;
    public $status;

    public function deleteQuestion($question)
    {
        DB::table('grammar_tests')->delete($this->questionID);

        $this->redirect('/grammar-test-management');
    }

    public function render()
    {
        return view('livewire.buttons.delete-button');
    }
}
