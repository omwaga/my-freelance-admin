<?php

namespace App\Http\Livewire\Settings\Degrees;

use App\Models\SettingsDegree;
use Livewire\Component;

class Add extends Component
{
    public $name;

    protected $rules = [
        'name' => 'regex:/^[\pL\s\-]+$/u|required|min:2|unique:settings_degrees,name'
    ];

    protected $messages = [
        'name.regex' => 'Only letters, spaces and hyphens are allowed.',
        'name.unique' => 'This degree has already been added.',
        'name.required' => 'The degree field is required.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addDegree()
    {
        $this->validate();

        SettingsDegree::create([
            'name' => $this->name
        ]);

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'New degree added!']);
    }

    public function render()
    {
        return view('livewire.settings.degrees.add');
    }
}
