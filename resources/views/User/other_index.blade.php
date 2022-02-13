@extends('layouts.app')
@section('title')
{{ $user->name }}さんのプロフィール
@endsection
@section('content')
<p>
    {{ $user->name }}
</p>
<p>
    {{ $user->profile }}
</p>

@if($user->is_followed_by_auth_user())
    <a href='/other_user/{{ $user->id }}/unfollow' class="btn btn-success btn-sm">フォロー解除<span class="badge"></span></a>
@else
    <a href='/other_user/{{ $user->id }}/follow' class="btn btn-success btn-sm">フォロー<span class="badge"></span></a>
@endif

<P>
  <a href='/other_user/{{ $user->id }}/showfollow'>フォロー<span class="badge"></span></a>{{ $user->followings()->count() }}
</P>

<P>
  <a href='/other_user/{{ $user->id }}/showfollower'>フォロワー<span class="badge"></span></a>{{ $user->followers()->count() }}
</P>


<a href='/'>トップページへ</a>
@endsection