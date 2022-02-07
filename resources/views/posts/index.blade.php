@extends('layouts.app')

@section('content')

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>トップページ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        
        <h1>ユーザー側画面</h1>
        
        
        <P>
            <a href="/user">
                マイページ
            </a>
        </P>
        
        <form action="/" method="GET">
           
            <button type="submit" name="search_date" value="{{ date('Y-m-d') }}">本日の試合</button>
            
        </form>
        
        <form action="/" method="GET">
           
            <button type="submit" name="search_date" value="{{ date('Y-m-d', strtotime($search_date . '-1 day')) }}">昨日の試合</button>
            
        </form>
        
        <form action="/" method="GET">
           
            <button type="submit" name="search_date" value="{{ date('Y-m-d', strtotime($search_date . '+1 day')) }}">明日の試合</button>
           
        </form>
    
        
        <div class='games'>
        
        <form action="/" method="GET">
             
            <input type="date" name="search_date" value="{{ $search_date }}"></input> <!--カレンダー、日付検索機能、その日の日付を入力するにはどうすればいいだろう-->
            <input type="submit" value="検索">
            
        </form>
        
        {{ date('m月d日',strtotime($search_date)) }}の試合
        
            @foreach($games as $game)
                <div class='game'>
                    <h2 class='date'>
                       
                        <a href= "/posts/{{ $game->id }}">
                            {{ $game->team1->name }} 対 {{ $game->team2->name }}
                        </a>
                        
                    </h2>
                </div>
            @endforeach
            
        </div>
        
        {{ Auth::user()->name }}
        
        @can('admin')
        <P>
            <a href= "/games">
                管理者画面へ
            </a>
        </P>
        @endcan
         
    </body>
</html>

@endsection