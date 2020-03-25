<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * The events that belong to the band.
     */
    public function events()
    {
        return $this->belongsToMany('App\Event');
    }
    /**
     * The press clippings that belong to the band.
     */
    public function clippings()
    {
        return $this->hasMany('App\Clipping');
    }   
}
