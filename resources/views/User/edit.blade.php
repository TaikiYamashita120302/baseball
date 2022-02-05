<!--
マイページ
-->

@extends('layouts.app')

@section('content')

    <body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/user/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__profile'>
                <h2>プロフィール文</h2>
                <textarea name="user[profile]" cols="50" rows="3">{{ $user->profile }}</textarea>;
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>
        <p>
            <a href="/user">
                マイページへ
            </a>
        </p>

@endsection