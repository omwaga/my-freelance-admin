<?php

namespace App\Http\Livewire\Settings\Languages;

use App\Models\SettingsLanguage;
use Livewire\Component;

class Add extends Component
{
    public $language;

    protected $rules = [
        'language' => 'required|min:2|unique:settings_languages,language',
    ];

    protected $messages = [
        'language.required' => 'The subject field is required.',
        'language.min' => 'The subject must be atleast 2 characters.',
        'language.unique' => 'The subject name is already taken.'
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addLanguage()
    {

        $this->validate();

        SettingsLanguage::create([
            'language' => $this->language
        ]);

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'New subject added!']);

    }


    public function render()
    {
        return view('livewire.settings.languages.add');
    }
}
