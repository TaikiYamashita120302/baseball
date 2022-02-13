<!--マイページ-->

@extends('layouts.app')
@section('title')
{{ $user->name }}さんのマイページ
@endsection
@section('content')

<div class="user">
    <p>
        {{ $user->name }}
    </p>
    
    <p>
        <a href="/user/{{ $user->id }}/edit">
            プロフィールを編集
        </a>
    </p>
    <p>
        {{ $user->profile }}
    </p>
</div>

<div class="follow">
    <P>
        <a href='/other_user/{{ $user->id }}/showfollow'>フォロー<span class="badge"></span></a>{{ $user->followings()->count() }}
    </P>
    
    <P>
        <a href='/other_user/{{ $user->id }}/showfollower'>フォロワー<span class="badge"></span></a>{{ $user->followers()->count() }}
    </P>
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
        
    <div class="top">
        <p>
            <a href="/">
                ホームへ
            </a>
        </p>
    </div>
   
        <div class='paginate'>
            {{ $own_posts->links() }}
        </div>
    </div>

@endsection