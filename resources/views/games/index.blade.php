<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Game</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Game Name</h1>
        <div class='games'>
            @foreach($games as $game)
                <div class='game'>
                    <h2 class='date'>{{ $game -> date}}</h2>
                    <p class='time'>{{ $game -> time}}試合開始</p>
                    <p class='place'>{{ $game -> place -> name}}</p>
                    <p class='team_1'>{{ $game -> team1 -> name}}</p>
                    <p class='team_2'>{{ $game -> team2 -> name}}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>