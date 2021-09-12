<?php

namespace App\Http\Livewire\Grammar;

use App\Models\Grammar_test;
use Livewire\Component;

class AddUpdate extends Component
{
    public $question, $choice_one, $choice_two, $choice_three, $choice_four, $answer;

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
        $this->validateOnly($propertyName);
    }

    public function saveQuestion()
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

        Grammar_test::create([
            'question' => $this->question,
            'choice_one' => $this->choice_one,
            'choice_two' => $this->choice_two,
            'choice_three' => $this->choice_three,
            'choice_four' => $this->choice_four,
            'answer' => $this->answer
        ]);

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'New question added!']);
    }

    public function render()
    {
        return view('livewire.grammar.add-update');
    }
}
