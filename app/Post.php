<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getPaginateByLimit(int $limit_count = 10){
        // updated_atで降順(DESC)に並べたあと、limitで件数制限をかける
        #return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
        
    }
    
    
    //「1対多」の関係なので単数系に
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function game(){
        return $this->belongsTo('App\Game');
    }
    
    protected $fillable = [
    'body',
];
}
