<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth; //Userクラス定義の前に追加

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile',
        'user_id', 'follow_id','image_path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function posts(){
        return $this->hasMany('App\Post');
    }
    
    public function likes(){
        return $this->belongsToMany('App\Post','user_post');
    }
    
    //このユーザーがフォローしている人を取得
    public function followings(){
        return $this->belongsToMany('App\User', 'user_follow', 'user_id', 'follow_id')->withTimestamps();
        //withTimestamps()これをつけておけばcreated_atとかが追加されるので便利
        //第一引数には使用するモデル,第二引数には使用するテーブル名,第三引数にはリレーションを定義しているモデルの外部キー名,第四引数には結合するモデルの外部キー名
    }
    
    //このユーザーをフォローしている人を取得=フォロワー
    public function followers(){
        return $this->belongsToMany('App\User', 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function is_followed_by_auth_user(){
        
        $follower = $this->followers()->find(Auth::user()); //findはオブジェクト型で返す オブジェクト型じゃないとid中のカラムは出せない where句はcollection＝配列型で返していたため使わない 
        
        if($follower == null){
            return false;
        }else if($follower->id == Auth::user()->id){
            return true;
        }
          
    }
    
    public function getOwnPaginateByLimit(int $limit_count = 5){
        return $this::with('posts')->find(Auth::id())->posts()->orderBy('updated_at', 'DESC')->paginate($limit_count);//ここでユーザーの指定を行ない、その投稿のみを返している
    }
    
    public function getOwnUser(){ //user_tableのidとログインしたときのidが一致したとき、そのuser情報を取ってくる
        return $this->find(Auth::id());
    }
    
}
