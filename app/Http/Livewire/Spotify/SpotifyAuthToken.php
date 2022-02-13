<?php

namespace App\Http\Livewire\Spotify;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
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
            'http://127.0.0.1:8000/callback'
        );

        $state = $session->generateState();
        $options = [
            'scope' => [
                'playlist-read-private',
                'user-read-private',
            ],
            // 'state' => $state,
        ];

        return Redirect::to($session->getAuthorizeUrl($options));
    }

    public function callback()
    {
        $session = new Session(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET'),
            'http://127.0.0.1:8000/callback'
        );

        // $state = $_GET['state'];

        // Fetch the stored state value from somewhere. A session for example

        // if ($state !== $storedState) {
        //     // The state returned isn't the same as the one we've stored, we shouldn't continue
        //     die('State mismatch');
        // }

        // Request a access token using the code from Spotify
        $session->requestAccessToken($_GET['code']);

        $accessToken = $session->getAccessToken();
        $refreshToken = $session->getRefreshToken();

        // Store the access and refresh tokens somewhere. In a session for example

        // Send the user along and fetch some data!
        return redirect('/');
    }
}
