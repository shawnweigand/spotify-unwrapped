<?php

use App\Http\Livewire\Spotify\SpotifyAuthToken;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return 
    // dd(json_decode(file_get_contents(storage_path()."/json/toptracksTest.json"),true));
    view('dashboard', ['tableContent' => json_decode(file_get_contents(storage_path()."/json/toptracksTest.json"),true)]);
})->middleware(['auth'])->name('dashboard');

Route::get('/api', function () {
    return view('livewire/spotify/spotify-auth-token');
});

Route::controller(SpotifyAuthToken::class)->group(function() {
    Route::get('/callback', 'callback');
    // Route::get('/spotifylogin', 'login');
});

Route::get('/callback', [SpotifyAuthToken::class, 'callback']);

require __DIR__.'/auth.php';