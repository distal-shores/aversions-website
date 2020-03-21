<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The bands that belong to the event.
     */
    public function bands()
    {
        return $this->belongsToMany('App\Band');
    }
    /**
     * The bands that belong to the event that aren't Aversions.
     */
    public function otherBands()
    {
        return $this->bands()->where('id', '!=', 1);
    }
    /**
     * The venue that the event belongs to.
     */
    public function venue()
    {
        return $this->belongsTo('App\Venue');
    }
}
