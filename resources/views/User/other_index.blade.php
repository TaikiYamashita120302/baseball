@extends('layouts.app')
@section('title')
{{ $user->name }}さんのプロフィール
@endsection
@section('css')
<link href="/css/users/other_index.css" rel="stylesheet" media="all">
@endsection
@section('content')

<div class="main">

    <div class="user">
        @if ($user->image_path)
        <!-- 画像を表示 -->
          <img src="{{ $user->image_path }}"id="user_image">
        @endif
        
        <div class="name">
            {{ $user->name }}
        </div>
        
        @if($user->is_followed_by_auth_user())
        <a href='/other_user/{{ $user->id }}/unfollow' class="btn btn-success btn-sm">フォロー解除<span class="badge"></span></a>
        @else
        <a href='/other_user/{{ $user->id }}/follow' class="btn btn-success btn-sm">フォロー<span class="badge"></span></a>
        @endif

        
        <div class="follow">
            <a href='/other_user/{{ $user->id }}/showfollow'>フォロー<span class="badge"></span></a>{{ $user->followings()->count() }}
            <a href='/other_user/{{ $user->id }}/showfollower'>フォロワー<span class="badge"></span></a>{{ $user->followers()->count() }}
        </div>
        
        <div class="profile">
            <p>
                {{ $user->profile }}
            </p>
        </div>
    </div>
    
        <div class="own_posts">
            
            @foreach($posts as $post)
                <div class="each_post">
                    <h4>
                        <a href="/posts/{{ $post->game->id }}">
                            {{ $post->game->date->format('n月j日') }}の試合
                        </a>
                     </h4>
                    <p>{{ $post->body }}</p>
                </div>
            @endforeach
            
        <div class="back">
            <a href="/">ホームへ</a>
        </div>
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
        </div>
</div>

@endsection