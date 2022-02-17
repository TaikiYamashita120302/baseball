@extends('layouts.app')
@section('title')
{{ $user -> name }}さんのフォロワー欄
@endsection
@section('css')
<link href="/css/users/follow.css" rel="stylesheet" media="all">
@endsection
@section('content')

@foreach($followers as $follower)

 <div class="user">
        @if ($follower->image_path)
        <!-- 画像を表示 -->
          <img src="{{ $follower->image_path }}"id="user_image">
        @endif
        
        <div class="name">
            <a href='/other_user/{{ $follower->id }}/'>{{ $follower->name }}</a><!--フォロワー一覧-->
        </div>
 </div>

@endforeach

<div class="back">
   <a href='/other_user/{{ $user->id }}/'>戻る</a> 
</div>

@endsection