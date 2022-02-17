<!--マイページ 編集-->

@extends('layouts.app')
@section('title')
{{ $user->name }}さん プロフィール変更
@endsection
@section('css')
<link href="/css/users/edit.css" rel="stylesheet" media="all">
@endsection
@section('content')
    <div class="main">
        
    
        <div class="content">
            <form action="/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class='content__name'>
                    <h2>名前</h2>
                    <input type="text" name="user[name]" value="{{ $user->name }}">
                </div>
                <div class='content_image'>
                    <h2>写真</h2>
                    <input type="file" name="image" value="{{ $user->image_path }}">
                </div>
                <div class='content__profile'>
                    <h2>プロフィール文</h2>
                    <textarea name="user[profile]" cols="50" rows="4" placeholder="200文字以内で投稿して下さい。">{{ $user->profile }}</textarea>
                </div>
                <input type="submit" value="保存">
            </form>
        </div>
        <p>
            <a href="/user">
                マイページへ
            </a>
        </p>
    </div>

@endsection