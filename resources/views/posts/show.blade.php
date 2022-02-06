@extends('layouts.app')

@section('content')

<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>口コミ詳細画面</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    
    <body>
        <h1 class="date">
            {{ $game->date->format("n月j日") }}
        </h1>
        
        <div class="game">
            
            <div class="content__game">
                <p class='time'>{{ $game -> time }}試合開始</p>
                <p class='place'>{{ $game -> place -> name }}</p>
                <p class='team_1対team_2'>
                    {{ $game -> team1 -> name}}対{{ $game -> team2 -> name }}
                </p>    
            </div>
            
        </div>
        
        <div class='create'>
            [<a href='/posts/{{ $game->id }}/create'>口コミ投稿</a>]
        </div> 
        
        <div class = 'posts'> 
            
            @foreach($posts as $post)
            <p>
               {{ $post->user->name }}
                {{ $post->body }}
                
            <div>
                
                @if($post->is_liked_by_auth_user())
                <a href='/posts/{{ $game->id }}/{{ $post->id }}/unlike' class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->likes()->count() }}</span></a>
                @else
                <a href='/posts/{{ $game->id }}/{{ $post->id }}/like' class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes()->count() }}</span></a>
                @endif
                
            </div>
            
            </p>
            @endforeach
            
        </div>
        <!-- form_deleteはhtml記載の際、必要 -->
        <!-- style="display:inlineはいらない気がするが一応置いておく -->
        <!-- javascriptを使ってのポップアップは使用しない、管理者だけだしとりあえずはいらないかなって思って -->
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>

@endsection