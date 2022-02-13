@extends('layouts.app')
@section('title')
{{ $user -> name }}さんのフォロー欄
@endsection
@section('content')

@foreach($follows as $follow)

<a href='/other_user/{{ $follow->id }}/'>{{ $follow -> name }}</a><!--フォローしている人一覧-->

@endforeach

<a href='/other_user/{{ $user->id }}/'>戻る</a>


@endsection