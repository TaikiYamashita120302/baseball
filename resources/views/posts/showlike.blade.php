@extends('layouts.app')
@section('title')
いいね欄
@endsection
@section('css')
<link href="/css/posts/showlike.css" rel="stylesheet" media="all">
@endsection
@section('content')

@foreach($users as $user)

    <div class="user_name">
        <img src="{{ $user->image_path }}"id="user_image">
            <a href="/other_user/{{ $user->id }}">
                {{ $user->name }}
            </a>
    </div>
    <!--ユーザーのプロフィール画面へ-->

@endforeach
    <div class="back">
        <a href="/posts/{{ $game->id }}">戻る</a>
    </div>

@endsection