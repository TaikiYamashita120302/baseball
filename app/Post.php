<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //「1対多」の関係なので単数系に
    public function user(){
        return $this->belongTo('App\User');
    }
    
    public function game(){
        return $this->belongTo('App\Game');
    }
}
