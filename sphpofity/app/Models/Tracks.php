<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracks extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name_tracks',
        'URL',
        'artist',
        'genre',
        'create_at',
        'foto'
    ];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
