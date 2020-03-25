<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * The press clippings that belong to the publication.
     */
    public function clippings()
    {
        return $this->hasMany('App\Clipping');
    } 
}
