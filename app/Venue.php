<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * The events that belong to the venue.
     */
    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
