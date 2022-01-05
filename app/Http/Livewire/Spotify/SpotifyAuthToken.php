<?php

namespace App\Http\Livewire\Spotify;

use Livewire\Component;

class SpotifyAuthToken extends Component
{
    public function render()
    {
        return view('livewire.spotify.spotify-auth-token');
    }

    public function authToken()
    {
        dd('hello');
        return;
    }
}