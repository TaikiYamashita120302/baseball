@extends('layouts.app')
@section('title')
{{ $user -> name }}さんのフォロー欄
@endsection
@section('css')
<link href="/css/users/follow.css" rel="stylesheet" media="all">
@endsection
@section('content')

@foreach($follows as $follow)

 <div class="user">
        @if ($follow->image_path)
        <!-- 画像を表示 -->
          <img src="{{ $follow->image_path }}"id="user_image">
        @endif
        
        <div class="name">
            <a href='/other_user/{{ $follow->id }}/'>{{ $follow->name }}</a><!--フォローしている人一覧-->
        </div>
 </div>

@endforeach

<div class="back">
   <a href='/other_user/{{ $user->id }}/'>戻る</a> 
</div>

@endsection