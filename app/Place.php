<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function games(){
        return $this->hasMany('App\game');
    }
    
    public function team(){
        return $this->belongTo('App\Team');
    }
}
