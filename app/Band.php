<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    /**
     * The events that belong to the band.
     */
    public function events()
    {
        return $this->belongsToMany('App\Event');
    }
}
