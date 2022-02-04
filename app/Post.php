<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
       //「1対多」の関係なので単数系に
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function game(){
        return $this->belongsTo('App\Game');
    }
    
     public function getSearchByDate($search_date){
        return $this #これは公式ドキュメントを参照
                ->whereDate('date', $search_date)#第一引数がカラムで第二引数が比較したい日付
                ->get(); #これはgamesテーブルの$search_dateと一致する日付を返してね、ということ
    }
    
     public function getPaginateByLimit(){
        // updated_atで降順(DESC)に並べたあと、limitで件数制限をかける
        // return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
        return $this::with('user')->orderBy('updated_at', 'DESC')->get();//今は使ってない
        //paginate($limit_count);
        
    }
    
    protected $fillable = [
    'body',
    'user_id',
    'game_id',
    ];
}
