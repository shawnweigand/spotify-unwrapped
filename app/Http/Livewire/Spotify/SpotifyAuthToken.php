<?php

namespace App\Http\Livewire\Spotify;

use Livewire\Component;

class SpotifyAuthToken extends Component
{

    public $response = 'placeholder';

    public function render()
    {
        return view('livewire.spotify.spotify-auth-token');
    }

    public function authToken()
    {
        $this->response = 'hello';
        dd($this->response);
    }
}