<?php

namespace App\Http\Livewire\Settings\Forms;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class SocialLinksSettings extends Component
{
    public $instagram_url;
    public $facebook_url;
    public $linkedin_url;
    public $twitter_url;

    protected $rules = [
        'facebook_url' => 'url|required|min:6',
        'twitter_url' => 'url|required|min:6|different:facebook_url',
        'linkedin_url' => 'url|required|min:6|different:twitter_url',
        'instagram_url' => 'url|required|min:6|different:linkedin_url',
    ];

    public function updated($propertyName)
    {
        try {
            $this->validateOnly($propertyName);
        } catch (ValidationException $e) {
        }
    }

    public function saveSocials()
    {
        $this->validate();

        DB::table('social_links')->where('platform', '=', 'facebook')
            ->update(['url' => $this->facebook_url]);
        DB::table('social_links')->where('platform', '=', 'twitter')
            ->update(['url' => $this->twitter_url]);
        DB::table('social_links')->where('platform', '=', 'linkedin')
            ->update(['url' => $this->linkedin_url]);
        DB::table('social_links')->where('platform', '=', 'instagram')
            ->update(['url' => $this->instagram_url]);


        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'Social Links Updated!']);
    }

    public function render()
    {
        return view('livewire.settings.forms.social-links-settings');
    }
}
