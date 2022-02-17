@extends('layouts.app')
@section('title')
{{ $game->date->format("n月j日") }}({{ $week }}) {{ $game -> team1 -> name}}対{{ $game -> team2 -> name }} 投稿画面
@endsection
@section('css')
<link href="/css/posts/create.css" rel="stylesheet" media="all">
@endsection
@section('content')

    <div class="upper_header">
        <div class="game_card">
            <p>
                {{ $game -> team1 -> name}}対{{ $game -> team2 -> name }}
            </p>
        </div>
            
        <div class="date_place">
            <p>
                {{ $game->date->format("n月j日") }}({{ $week }})
                {{ date("G時i分",strtotime($game->time))}}
                {{ $game->place->name }}
            </p>
                
        </div>
    </div>

    <form action="/posts/{{ $game->id }}" method="POST">
        @csrf
        <div class="body">
            <textarea cols="70" rows="4" name="post[body]" placeholder="255文字以内で投稿して下さい。"></textarea>
        </div>
        <input type="submit" value="投稿"/>
    </form>
    
    <div class="back">
        <a href="/posts/{{ $game->id }}">戻る</a>
    </div>


@endsection