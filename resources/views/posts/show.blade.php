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
        <div class="header">
            <div class="upper_header">
                <div class="game_card">
                    {{ $game -> team1 -> name}}対{{ $game -> team2 -> name }}
                </div>
                <div class="date_place">
                    {{ $game->date->format("n月j日") }}({{ $week }})
                    {{ date("G時i分",strtotime($game->time))}}
                    {{ $game->place->name }}
                </div>
            </div>
            <div class="lower_header">
                <a href="/">ホーム</a>
                <a href='/posts/{{ $game->id }}/create'>投稿</a>
            </div>
        </div>
        
        <div class = 'posts'>
            @foreach($posts as $post)
            <div class="user_name">
                {{ $post->user->name }}
            </div>
            <div class="posts_body">
                {{ $post->body }}
            </div>
            {{ $post->created_at->format("Y年n月j日 G:i") }}
            @if($post->is_liked_by_auth_user())
            <a href='/posts/{{ $game->id }}/{{ $post->id }}/unlike' class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->likes()->count() }}</span></a>
            @else
            <a href='/posts/{{ $game->id }}/{{ $post->id }}/like' class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes()->count() }}</span></a>
            @endif
            @endforeach
        </div>
    </body>
</html>

@endsection