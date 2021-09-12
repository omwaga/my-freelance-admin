<?php

namespace App\Http\Livewire\Settings\Citations;

use App\Models\SettingsCitation;
use Livewire\Component;

class Add extends Component
{
    public $citation;

    protected $rules = [
        'citation' => 'required|regex:/^[\pL\s\-]+$/u|min:2|unique:settings_citations,style'
    ];

    protected $messages = [
        'citation.unique' => 'The citation style has already been added.',
        'citation.regex' => 'Only letters, spaces and hyphens are allowed.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addCitation()
    {
        $this->validate();

        SettingsCitation::create([
            'style' => $this->citation
        ]);

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'New citation added!']);
    }

    public function render()
    {
        return view('livewire.settings.citations.add');
    }
}
