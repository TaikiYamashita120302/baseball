<?php

namespace App\Http\Controllers;

use App\Post; #忘れがちだからしっかりと記載
use App\Game;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Game $game, Request $request){
        
        $search_date = $request->input('search_date'); 
        //dd(gettype($search_date));
        if($search_date==null){
            $search_date = date('Y-m-d');#string型 Y-m-dの表記でカレンダー表示可能
            //dd(gettype($search_date));
        }
                //カレンダー、日付検索機能で入力した日付> search_dateはformの名前とリンク
        
        return view('posts/index') -> with(['games' => $game->getSearchByDate($search_date),'search_date' => $search_date]);#関数をgameモデルに渡す、何を渡すかは名称ではなく順番
    }
    
    public function show(Post $post, Game $game){
        $posts = $game->posts;
        return view('posts/show') -> with(['posts' => $posts, 'game'=>$game]);#$gameのあとにgetつかないのは、web.phpで{game}としているから！ちなみにgamesじゃないのは詳細画面は1ゲームにつき一つだから
    }
    
    public function create(Game $game){#作成するわけだから現データベースのデータの受け渡しは不要
        return view('posts/create') -> with(['game' => $game]);
    }
    
    public function store(Request $request, Game $game, Post $post){#$requestで一旦ユーザーのデータを受け取る。 $postは空のpostインスタンス 
        $input = $request['post'];#$request['post']を利用すると、postをキー（データのカラム）にもつリクエストパラメータを取得することができる。つまり、この式の後$inputはpostのカラムで構成され$requestで渡されたデータが入っている、今回だとuse_id以外bodyとuser_idが付与されている
        $input += ['user_id' => $request->user()->id];
        $input += ['game_id' => $game->id];    //createで使う'game_id'はURIで指定している$gameのidだよ、という意。
        $post->fill($input)->save();#先ほどまで空だったPostインスタンスのプロパティを受け取ったキーごとに上書き
        return redirect('/posts/' . $game->id);#/posts/1 のようにidを取得して記事詳細画面に行く
    }
    
    public function delete(Post $post){
        $post->delete();
        return redirect('/user');
    }
}
