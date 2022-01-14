<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model{
    
    public function posts(){
        return $this->hasMany('App\Post');
        
    }
        
    public function place(){
        return $this->belongTo('App\Place');
    }
    
    public function team(){
        return $this->belongTo('App\Team');
        
    }
        
}