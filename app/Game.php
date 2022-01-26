<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model{
    
    public function posts(){
        return $this->hasMany('App\Post');
    }
        
    public function place(){
        return $this->belongsTo('App\Place','place_id');
    }
    
    public function team1(){
        return $this->belongsTo('App\Team','team_id1'); #基本的に第二引数に外部idを書く
    }
    
    public function team2(){
        return $this->belongsTo('App\Team','team_id2');
    }
    
    public function getPaginateByLimit(int $limit_count = 5){
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
        
}