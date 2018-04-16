<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bin extends Model
{
    //
    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function observations() {
    	return $this->hasMany('App\Observation');
    }
}
