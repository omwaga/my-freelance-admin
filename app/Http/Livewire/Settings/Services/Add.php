<?php

namespace App\Http\Livewire\Settings\Services;

use App\Models\SettingsService;
use Livewire\Component;

class Add extends Component
{
    public $service;

    protected $rules = [
        'service' => "required|min:2|unique:settings_services,name|regex:/^[\pL\s\-]+$/u|"
    ];

    protected $messages = [
        'service.unique' => 'This service name has already been added.',
        'service.regex' => 'Only letters, spaces and hyphens are allowed.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addService()
    {
        $this->validate();

        SettingsService::create([
            'name' => $this->service,
        ]);

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'New service added!']);
    }

    public function render()
    {
        return view('livewire.settings.services.add');
    }
}
