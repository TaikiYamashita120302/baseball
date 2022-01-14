<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function games(){
        return $this->hasMany('App\Game');
    }
    
    public function places(){
        return $this->hasMany('App\Place');
    }
}
