<?php

namespace App\Http\Livewire\Settings\Disciplines;

use App\Models\SettingsDiscipline;
use Livewire\Component;

class Add extends Component
{
    public $disciplines;

    protected $rules = [
        'disciplines' => 'required|min:2|regex:/^[\pL\s\-]+$/u|unique:settings_disciplines,disciplines'
    ];

    protected $messages = [
        'disciplines.required' => 'The type field is required.',
        'disciplines.regex' => 'Only letters, spaces and hyphens are allowed.',
        'disciplines.unique' => 'This type of paper has already been added.',
    ];

    public function updated($propertyName)
    {
            $this->validateOnly($propertyName);
    }

    public function addDiscipline()
    {
        $this->validate();

        SettingsDiscipline::create([
            'disciplines' => $this->disciplines
        ]);

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'New type added!']);
    }

    public function render()
    {
        return view('livewire.settings.disciplines.add');
    }
}
