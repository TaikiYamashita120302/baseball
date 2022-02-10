@extends('layouts.app')
@section('title')
{{ $game->date->format("n月j日") }}({{ $week }}) {{ $game -> team1 -> name}}対{{ $game -> team2 -> name }} 投稿画面
@endsection
@section('content')

    <form action="/posts/{{ $game->id }}" method="POST">
        @csrf
        <div class="body">
            <textarea name="post[body]" placeholder="255文字以内で投稿して下さい。"></textarea>
        </div>
        <input type="submit" value="投稿"/>
    </form>
    
    <div class="back">[<a href="/posts/{{ $game->id }}">back</a>]</div>


@endsection