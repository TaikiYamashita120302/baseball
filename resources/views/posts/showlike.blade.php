@extends('layouts.app')
@section('title')
いいね欄
@endsection
@section('content')

@foreach($users as $user)

<a href='/other_user/{{ $user->id }}'>{{ $user->name }}</a><!--ユーザーのプロフィール画面へ-->

@endforeach

<a href='/posts/{{ $game->id }}'>戻る</a>

@endsection