<?php

namespace App\Http\Livewire\Grammar;

use App\Models\Grammar_test;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class EditQuestion extends Component
{
    public $question;
    public $choice_one;
    public $choice_two;
    public $choice_three;
    public $choice_four;
    public $answer;
    public $questionID;

    protected $rules = [
        'question' => 'required|min:6',
        'choice_one' => 'required|min:2|different:question',
        'choice_two' => 'required|min:2|different:choice_one',
        'choice_three' => 'required|min:2|different:choice_two',
        'choice_four' => 'required|min:2|different:choice_three',
        'answer' => 'required|integer'
    ];

    public function updated($propertyName)
    {
        try {
            $this->validateOnly($propertyName);
        } catch (ValidationException $e) {
        }
    }

    public function editQuestion()
    {
        $this->validate();

        if ($this->answer == 1) {
            $this->answer = $this->choice_one;
        } elseif ($this->answer == 2) {
            $this->answer = $this->choice_two;
        } elseif ($this->answer == 3) {
            $this->answer = $this->choice_three;
        } elseif ($this->answer == 4) {
            $this->answer = $this->choice_four;
        }

        DB::table('grammar_tests')->where('id', $this->questionID)
            ->update([
                'question' => $this->question,
                'choice_one' => $this->choice_one,
                'choice_two' => $this->choice_two,
                'choice_three' => $this->choice_three,
                'choice_four' => $this->choice_four
            ]);


        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'Question edited successfully!']);
    }

    public function render()
    {
        return view('livewire.grammar.edit-question');
    }
}
