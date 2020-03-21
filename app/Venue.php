<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    /**
     * The events that belong to the venue.
     */
    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
