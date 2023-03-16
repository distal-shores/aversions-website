<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    /**
     * The songs that belong to the album.
     */
    public function events()
    {
        return $this->hasMany('App\Song');
    }
}
