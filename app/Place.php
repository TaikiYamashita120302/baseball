<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function games(){
        return $this->hasMany('App\Game');
    }
    
    public function team(){
        return $this->belongsTo('App\Team');
    }
}
