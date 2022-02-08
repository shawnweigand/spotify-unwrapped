<?php

namespace App\Http\Livewire\Spotify;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use SpotifyWebAPI\Session;

require __DIR__ . '/../../../../vendor/autoload.php';

class SpotifyAuthToken extends Component
{

    public $result;

    public function render()
    {
        return view('livewire.spotify.spotify-auth-token');
    }

    public function authToken()
    {
        $session = new Session(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET'),
            env('SPOTIFY_REDIRECT_URI')
        );

        $state = $session->generateState();
        $options = [
            'scope' => [
                'playlist-read-private',
                'user-read-private',
            ],
            'state' => $state,
        ];

        header('Location: ' . $session->getAuthorizeUrl($options));
        die();

        // dd(__DIR__.'/../../../../vendor/autoload.php');
        // $result = Http::get();
        // dd($result);
    }
}
