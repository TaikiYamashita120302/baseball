<?php

namespace App\Http\Controllers;

use App\Post; #忘れがちだからしっかりと記載
use App\Game;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Auth; //Userクラス定義の前に追加

function week($date){//$dateは日付、string型 date関数はstring型で返される
        //指定日の曜日を取得する
        $week_id = date('w', strtotime($date));
        //配列を使用し、要素順に(日:0〜土:6)を設定する
        $week_array = [
            '日', //0
            '月', //1
            '火', //2
            '水', //3
            '木', //4
            '金', //5
            '土', //6
        ];
        
        return $week_array[$week_id];
    }
    
class PostController extends Controller
{
    public function index(Game $game, Request $request){
        
        $search_date = $request->input('search_date'); 
        //dd(($search_date));
        if($search_date==null){
            $search_date = date('Y-m-d');
        //$search_dateはstring型 <input type="date"～で送られてくるやつもstring型 Y-m-dの表記でカレンダーへの表示可能、これは今日の日付
        }
        
        $week = week($search_date);

        return view('posts/index') -> with(['games' => $game->getSearchByDate($search_date),'search_date' => $search_date, 'week'=>$week]);#関数をgameモデルに渡す、何を渡すかは名称ではなく順番
    }
    
    public function show(Game $game){
        //持ってきたidをインスタンス化すると、そのgameの全カラムから取得可能。
        $posts = $game->posts()->get(); // $posts = $game->postsでもとれるが、関数としてちゃんと扱うようにposts()->get()とした方が望ましい。
        $week = week($game->date);//曜日を返す

        return view('posts/show') -> with(['posts' => $posts, 'game' => $game, 'week' => $week]);#$gameのあとにgetつかないのは、web.phpで{game}としているから！ちなみにgamesじゃないのは詳細画面は1ゲームにつき一つだから
    }
    
    public function create(Game $game){
        $week = week($game->date);//曜日を返す
        return view('posts/create') -> with(['game' => $game, 'week' => $week]);
    }
    
    public function store(Request $request, Game $game, Post $post){#$requestで一旦ユーザーのデータを受け取る。 $postは空のpostインスタンス 
        $input = $request['post'];#$request['post']を利用すると、postをキー（データのカラム）にもつリクエストパラメータを取得することができる。つまり、この式の後$inputはpostのカラムで構成され$requestで渡されたデータが入っている、今回だとuse_id以外bodyとuser_idが付与されている
        $input += ['user_id' => $request->user()->id];
        $input += ['game_id' => $game->id];    //createで使う'game_id'はURIで指定している$gameのidだよ、という意。
        $post->fill($input)->save();#先ほどまで空だったPostインスタンスのプロパティを受け取ったキーごとに上書き
        return redirect('/posts/' . $game->id);#/posts/1 のようにidを取得して記事詳細画面に行く
    }
    
    public function like($game, $post){//中身はid;
        //ルーティングの{}もってくるときはインスタンス化しなくてよい。また、{}が複数あるときは、２個なら２個、ちゃんと書いてあげる。
        Auth::user()->likes()->attach($post);//userからlikes関数を使い（リレーション）、中間テーブルの自分のidのところのpostをとってくる
        //リレーション時、今回は多対多であるが親もしくは親のように主のものからの方がとりやすい
        //user()->likes()で中間テーブルにアクセスしている
        return redirect()->back();
    }
    
    public function unlike($game, $post){
        
        Auth::user()->likes()->detach($post);//attachの反対でdetach、これで切り離す
        
        return redirect()->back();
    }
    
    public function showlike(Game $game, Post $post){
        $users = $post->likes()->get();//その投稿をいいねしているユーザー
        
        return view('posts/showlike') -> with(['game' => $game, 'users' => $users]);
    }
    
    
    public function delete(Post $post){
        $post->delete();
        return redirect('/user');
    }
}
