<!--マイページ-->

@extends('layouts.app')
@section('title')
{{ $user->name }}さんのマイページ
@endsection
@section('css')
<link href="/css/users/index.css" rel="stylesheet" media="all">
@endsection
@section('content')

<div class="main">

    <div class="user">
        @if ($user->image_path)
        <!-- 画像を表示 -->
          <img src="{{ $user->image_path }}"id="user_image">
        @endif
        
        <div class="edit_profile">
            <a href="/user/{{ $user->id }}/edit">
                プロフィールを編集
            </a>
        </div>
        
        <div class="name">
            {{ $user->name }}
        </div>
        
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
            
            @foreach($own_posts as $post)
                <div class="each_post">
                    <h4>
                        <a href="/posts/{{ $post->game->id }}">
                            {{ $post->game->date->format('n月j日') }}の試合
                        </a>
                     </h4>
                     
                    <p>{{ $post->body }}</p>
                    
                    <form class= "delete" action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        投稿削除
                        </button>
    
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">！！注意！！</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                一度投稿を消すと復元できません。削除しますか？
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">戻る</button>
                                <button type="submit" class="btn btn-primary">削除</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </form> 
                </div>
            @endforeach
            
        <div class="back">
            <a href="/">ホームへ</a>
        </div>
            <div class='paginate'>
                {{ $own_posts->links() }}
            </div>
        </div>
</div>
@endsection