<?php

namespace App\Http\Controllers;

use App\Post; #忘れがちだからしっかりと記載
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post){
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post){
        return view('posts/show') -> with(['post' => $post]);#詳細画面は一つのタイトルにつき一つ
    }
    
    public function create(User $user, Game $game){#作成するわけだから現データベースのデータの受け渡しは不要
        return view('posts/create') -> with(['users' => $user->get()]) -> with(['games' => $game->get()]);
    }
    
    public function store(Request $request, Post $post){#$requestで一旦ユーザーのデータを受け取る。 $postは空のpostインスタンス 
        $input = $request['post'];#$request['post']を利用すると、postをキー（データのカラム）にもつリクエストパラメータを取得することができる。
        $post->fill($input)->save();#先ほどまで空だったPostインスタンスのプロパティを受け取ったキーごとに上書き
        return redirect('/posts/' . $post->id);#/posts/1 のようにidを取得して記事詳細画面に行く
    }
}
