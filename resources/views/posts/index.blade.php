@extends('layouts.app')
@section('title','トップページ')
@section('css')
<link href="/css/style.css" rel="stylesheet" media="all">
@endsection
@section('javascript')
<script src="{{ asset('js/alert.js') }}"></script>
@endsection
@section('content')


        
       
        
        <div class="header">
            <div class="head_element">
                <a href="/user">
                    マイページ
                </a>
            </div>
            <div class="head_element">
                <form action="/" method="GET">
                    <button type="submit" name="search_date" value="{{ date('Y-m-d', strtotime($search_date . '-1 day')) }}">昨日の試合</button>
                </form>
            </div>
            <div class="head_element">
                {{ date('n月j日',strtotime($search_date)) }}({{ $week }})
            </div>
            <div class="head_element">
                <form action="/" method="GET">
                    <button type="submit" class="tomorrow_button" name="search_date" value="{{ date('Y-m-d', strtotime($search_date . '+1 day')) }}">明日の試合</button>
                </form>
            </div>
            <div class="head_element">
                <form action="/" method="GET">
                    <input type="date" name="search_date" value="{{ $search_date }}"></input> <!--カレンダー-->
                    <input type="submit" value="検索">
                </form>
            </div>
        </div>
        
        <div class="main">
            @foreach($games as $game)
            <div class='game'>
                <h2>
                    <a href= "/posts/{{ $game->id }}">
                        {{ $game->team1->name }} 対 {{ $game->team2->name }}
                    </a>
                    
                    @if($game->reason)
                    <button id="btn">CLICK</button>
                     <p id="txt"></p>
                    {{ $game->reason }}
                    @endif
                </h2>
               
            </div>
            @endforeach
        </div>
            
        
        <div class="admin">
            @can('admin')
            <a href= "/games">
                管理者画面へ
            </a>
            @endcan
        </div>
        @endsection
        
       

