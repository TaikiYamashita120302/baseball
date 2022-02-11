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

<a href='/'>トップページへ</a>
@endsection