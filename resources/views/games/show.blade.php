<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>試合詳細画面</title>
        <!-- Style -->
        <link href="/css/game_show.css" rel="stylesheet" media="all">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    
    <body>
        <h1 class="date">
            {{ $game->date->format("n月j日") }}
        </h1>
        
        <div class="content">
            
            <div class="content__game">
                <p class='time'>{{ $game -> time }}試合開始</p>
                <p class='place'>{{ $game -> place -> name }}</p>
                <p class='team_1対team_2'>
                    {{ $game -> team1 -> name}}対{{ $game -> team2 -> name }}
                </p>    
            </div>
            
        </div>
        
        <p class="edit">
            <a href="/games/{{ $game->id }}/edit">
                試合情報変更
            </a>
        </p>
        
        {{ $game->reason }}
        
        <div class="footer">
            <a href="/games">戻る</a>
        </div>
    </body>
</html>