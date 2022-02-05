<!--
マイページ
-->

@extends('layouts.app')

@section('content')

<div user>
    <p>
        <a href="/user/{{ $user->id }}/edit">
            プロフィールを編集
        </a>
    </p>
    <p>
        {{ $user->profile }}
    </p>
</div>

    <div class="own_posts">
        
        @foreach($own_posts as $post)
            <div>
                <h4>
                    <a href="/posts/{{ $post->game->id }}">
                        {{ $post->game->date->format('n月j日') }}の試合
                    </a>
                 </h4>
                 
                <small>{{ $post->user->name }}</small>
                <p>{{ $post->body }}</p>
                
                <form class= "delete" action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type = "submit">
                        投稿削除
                    </button>
                </form> 
                
            </div>
        @endforeach
        
    <div class="top">
        <p>
            <a href="/posts">
                ホームへ
            </a>
        </p>
    </div>
   
        <div class='paginate'>
            {{ $own_posts->links() }}
        </div>
    </div>

@endsection