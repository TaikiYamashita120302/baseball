<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>試合詳細画面</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    
    <body>
        <h1 class="date">
            {{ $game->date->format("m月d日の試合") }}
        </h1>
        
        <div class="content">
            
            <div class="content__game">
                <p class='time'>{{ $game -> time}}試合開始</p>
                <p class='place'>{{ $game -> place -> name}}</p>
                <p class='team_1'>{{ $game -> team1 -> name}}</p>
                <p class='team_2'>{{ $game -> team2 -> name}}</p>    
            </div>
            
        </div>
        
        <p class="edit">
            <a href="/games/{{ $game->id }}/edit">
                試合情報変更
            </a>
        </p>
        
        <form class= "delete" action="/games/{{ $game->id }}" id="form_{{ $game->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type = "submit">
                試合削除
            </button>
        </form> 
        
        <!-- form_deleteはhtml記載の際、必要 -->
        <!-- style="display:inlineはいらない気がするが一応置いておく -->
        <!-- javascriptを使ってのポップアップは使用しない、管理者だけだしとりあえずはいらないかなって思って -->
        <div class="footer">
            <a href="/games">戻る</a>
        </div>
    </body>
</html>