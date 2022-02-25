<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth; //Userクラス定義の前に追加、Authという関数

class Post extends Model
{
    protected $fillable = [
    'body',
    'user_id',
    'game_id',
    ];
       //「1対多」の関係なので単数系に
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function game(){
        return $this->belongsTo('App\Game');
    }
    
    //いいね機能、多対多
    public function likes(){
        return $this->belongsToMany('App\User','user_post');
    }
    
    public function getSearchByDate($search_date){
        return $this #これは公式ドキュメントを参照
                ->whereDate('date', $search_date)#第一引数がカラムで第二引数が比較したい日付
                ->get(); #これはgamesテーブルの$search_dateと一致する日付を返してね、ということ
    }
    /**
  * リプライにLIKEを付いているかの判定
  *
  * @return bool true:Likeがついてる false:Likeがついてない
  */
  public function is_liked_by_auth_user(){
      $id = Auth::id();
      
      $likers_id = array();
          $post_users = $this->likes; //ここで選んだ投稿をいいねしている投稿者の情報をリレーションにより取得（複数）
          foreach($post_users as $post_user){
              array_push($likers_id, $post_user->id);//投稿者のidを配列へ１つずつ格納
            }
            
    if (in_array($id, $likers_id)){//in_arrayは第一引数に値、第二引数に配列で、配列に値が入っているかを確かめる関数
        //ログインしているユーザーのIDが、いいねしているユーザーのID群の中にいたら、trueを返す
        return true;
        
    }else{
        return false;
    }
  }
    
}
