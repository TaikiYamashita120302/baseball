@extends('layouts.app')
@section('title')
{{ $game->date->format("n月j日") }}({{ $week }}) {{ $game -> team1 -> name}}対{{ $game -> team2 -> name }} 投稿一覧
@endsection
@section('css')
<link href="/css/posts/show.css" rel="stylesheet" media="all">
@endsection
@section('content')
<div class="main">
    
    <div class="header">
        
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
        
        <div class="lower_header">
            <div class="home_button">
                <a href="/">ホーム</a>
            </div>
            <div class="post_button">
                <a href='/posts/{{ $game->id }}/create'>投稿</a>
            </div>
        </div>
    </div>
    
    <div class = 'posts'>
        @foreach($posts as $post)
        <div class = 'each_post'>
            <div class="user_name">
                <img src="{{ $post->user->image_path }}"id="user_image">
                <a href="/other_user/{{ $post->user->id }}">
                    {{ $post->user->name }}
                </a>
            </div>
            <div class="body">
                {{ $post->body }}
            </div>
            <div class="time_like">
                {{ $post->created_at->format("Y年n月j日 G:i") }}
                @if($post->is_liked_by_auth_user())
                <a href='/posts/{{ $game->id }}/{{ $post->id }}/unlike' class="btn btn-success btn-sm">いいね<span class="badge">{{ $post->likes()->count() }}</span></a>
                @else
                <a href='/posts/{{ $game->id }}/{{ $post->id }}/like' class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post->likes()->count() }}</span></a>
                @endif
                <a href='/posts/{{ $game->id }}/{{ $post->id }}/showlike'>いいね欄</a>
            </div>
        </div>
        @endforeach
        
        <div class='paginate'>
            {{ $posts->links() }}
        </div>

    </div>
</div>
@endsection