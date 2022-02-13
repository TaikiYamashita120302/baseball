@extends('layouts.app')
@section('title')
{{ $user -> name }}さんのフォロワー欄
@endsection
@section('content')

@foreach($followers as $follower)

<a href='/other_user/{{ $follower->id }}/'>{{ $follower -> name }}</a><!--フォロワー一覧-->

@endforeach

<a href='/other_user/{{ $user->id }}/'>戻る</a>


@endsection