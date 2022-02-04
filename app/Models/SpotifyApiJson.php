<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotifyApiJson extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'top_items_l',
        'top_items_m',
        'top_items_s',
    ];
}
