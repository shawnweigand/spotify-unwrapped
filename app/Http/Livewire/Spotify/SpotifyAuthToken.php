<?php

namespace App\Http\Livewire\Spotify;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SpotifyAuthToken extends Component
{

    public $response = 'placeholder';
    public $result;

    public function render()
    {
        return view('livewire.spotify.spotify-auth-token');
    }

    public function authToken()
    {
        $result = Http::get('https://accounts.spotify.com/authorize?'.
                            'client_id='.env('SPOTIFY_CLIENT_ID').'&'.
                            'response_type=code&'.
                            'redirect_uri='.urlencode('http://localhost:8000/').'&'.
                            'scope=user-top-read user-read-recently-played');
        //need to redirect
        // $this->response = 'hello';
        dd($result);
    }
}