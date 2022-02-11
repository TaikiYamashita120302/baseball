@extends('layouts.app')
@section('title')
管理者トップページ {{ date('n月j日',strtotime($search_date)) }}({{ $week }})の試合
@endsection
@section('content')
    <div class='postgame'>
        [<a href='/games/create'>試合作成</a>]
    </div> 
    
    <div class='games'>
        <div class="head_element">
            <form action="/games" method="GET">
                <button type="submit" name="search_date" value="{{ date('Y-m-d', strtotime($search_date . '-1 day')) }}">昨日の試合</button>
            </form>
        </div>
        
        <div class="head_element">
            <form action="/games" method="GET">
                <button type="submit" class="tomorrow_button" name="search_date" value="{{ date('Y-m-d', strtotime($search_date . '+1 day')) }}">明日の試合</button>
            </form>
        </div>
    
        <form action="/games" method="GET">
            <input type="date" name="search_date" value="{{ $search_date }}"></input> <!--カレンダー、日付検索機能、その日の日付を入力するにはどうすればいいだろう-->
            <input type="submit" value="検索">
        </form>
        {{ date('n月j日',strtotime($search_date)) }}({{ $week }})の試合
        
        @foreach($games as $game)
            <div class='game'>
                <h2 class='date'>
                    <a href= "/games/{{ $game->id }}">
                        {{ $game->team1->name }} 対 {{ $game->team2->name }}
                    </a>
                </h2>
            </div>
        @endforeach
        
    </div>
    
    <P>
        <a href= "/">
            ユーザー側画面へ
        </a>
    </P>
        

@endsection