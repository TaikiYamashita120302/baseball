<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;#論理削除において必要
use Illuminate\Support\Facades\DB;

class Game extends Model{
    
    use SoftDeletes;
    
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
    
    public function getPaginateByLimit(int $limit_count = 10){
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count); #現在使ってはいない。
    }
    
    public function getSearchByDate($search_date){
        return $this #これは公式ドキュメントを参照
                ->whereDate('date', $search_date)#第一引数がカラムで第二引数が比較したい日付
                ->get(); #これはgamesテーブルの$search_dateと一致する日付を返してね、ということ
    }
    
    protected $dates = [
        'date',
    ];
    
    protected $fillable = [
    'date',
    'time',
    'place_id',
    'team_id1',
    'team_id2',
    ];
        
}