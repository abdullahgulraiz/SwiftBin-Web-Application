<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
	protected $fillable = ['weight', 'infrared'];
    //
    public function bin() {
    	return $this->belongsTo('App\Bin');
    }
}
