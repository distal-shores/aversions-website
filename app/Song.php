<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The album that the song belongs to.
     */
    public function song()
    {
        return $this->belongsTo('App\Song');
    }
}
