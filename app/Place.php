<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function games(){
        return $this->hasMany('App\Game');
    }
    
    public function teams(){
        return $this->belongsToMany('App\Team');
    }
}
