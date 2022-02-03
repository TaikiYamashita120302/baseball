@extends('layouts.app')

@section('content')

<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>投稿画面</h1>
        
        <form action="/posts/{{ $game->id }}" method="POST">
            @csrf
            <div class="body">
                <h2>投稿</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。"></textarea>
            </div>
            
            <div class="user">
                <h2>ユーザー</h2>
                <select name="post[user_id]">
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            
            
            
            <input type="submit" value="投稿"/>
        </form>
        
        <div class="back">[<a href="/posts">back</a>]</div>
    </body>
</html>

@endsection