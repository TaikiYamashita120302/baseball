<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>トップページ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        
        <h1>トップページ</h1>
        
        <div class='postgame'>
            [<a href='/games/create'>試合投稿</a>]
        </div> 
        
        
        <div class='games'>
        
        <form action="/games" method="GET"> 
            <input type="date" name="search_date"></input> <!--カレンダー、日付検索機能-->
            <input type="submit" value="検索">
            
        </form>
        
            @foreach($games as $game)
                <div class='game'>
                    <h2 class='date'>
                        <a href= "/games/{{ $game->id }}">
                            {{ $game -> date}}</a>
                    </h2>
                </div>
            @endforeach
        </div>
        
        
        
    </body>
</html>