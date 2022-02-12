@extends('layouts.app')
@section('title')
ユーザー画面
@endsection
@section('content')
<p>
    {{ $user->name }}
</p>
<p>
    {{ $user->profile }}
</p>

@if($user->is_followed_by_auth_user())
    <a href='/other_user/{{ $user->id }}/unfollow' class="btn btn-success btn-sm">フォロー解除<span class="badge">{{ $user->followers()->count() }}</span></a>
@else
    <a href='/other_user/{{ $user->id }}/follow' class="btn btn-success btn-sm">フォロー<span class="badge">{{ $user->followers()->count() }}</span></a>
@endif



<a href='/'>トップページへ</a>
@endsection