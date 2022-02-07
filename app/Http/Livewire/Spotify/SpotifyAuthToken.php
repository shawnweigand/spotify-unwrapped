<?php

namespace App\Http\Livewire\Spotify;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

require __DIR__.'/../../../../vendor/autoload.php';

class SpotifyAuthToken extends Component
{

    public $result;

    public function render()
    {
        return view('livewire.spotify.spotify-auth-token');
    }

    public function authToken()
    {
        require __DIR__.'/../../../../vendor/autoload.php';

        $session = new SpotifyWebAPI\Session(
            'CLIENT_ID',
            'CLIENT_SECRET',
            'REDIRECT_URI'
        );
        dd(__DIR__.'/../../../../vendor/autoload.php');
        $result = Http::get();
        dd($result);
    }
}