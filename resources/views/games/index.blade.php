<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Game</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        
        <h1>トップページ</h1>
        
        <div class='postgame'>
            [<a href='/games/create'>試合投稿</a>]
        </div> 
        
        
        <div class='games'>
            @foreach($games as $game)
                <div class='game'>
                    <h2 class='date'>
                        <a href= "/games/{{ $game->id }}">
                            {{ $game -> date}}</a>
                    </h2>
                </div>
            @endforeach
        </div>
        
        <div class='paginate'>
            {{ $games->links() }}
        </div>
        
    </body>
</html>