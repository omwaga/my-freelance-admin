<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class settings extends Controller
{
    public function index()
    {
        $instagram_url = DB::table('social_links')->where('platform', 'instagram')->value('url');
        $twitter_url = DB::table('social_links')->where('platform', 'twitter')->value('url');
        $linkedin_url = DB::table('social_links')->where('platform', 'linkedin')->value('url');
        $facebook_url = DB::table('social_links')->where('platform', 'facebook')->value('url');

        return view('settings', ['instagram_url' => $instagram_url, 'twitter_url' => $twitter_url,
            'linkedin_url' => $linkedin_url, 'facebook_url' => $facebook_url]);
    }
}
