<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clipping extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
	/**
     * The band that this clipping belongs to.
     */
    public function band()
    {
        return $this->belongsTo('App\Band');
    }
	/**
     * The publication this clipping belongs to.
     */
    public function publication()
    {
        return $this->belongsTo('App\Publication');
    } 
}
