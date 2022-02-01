<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>試合投稿</title>
    </head>
    <body>
        <h1>試合投稿</h1>
        
        <form action="/games" method="POST">
            @csrf
            <div class="date">
                <h2>日付</h2>
                <input type="date" name="game[date]" value = "<?php echo date('Y-m-d');?>"/>
            </div>
            
            <div class="time">
                <h2>時間</h2>
                <input type="time" name="game[time]" />
            </div>
            
            <div class="team1">
                <h2>ホームチーム</h2>
                <select name="game[team_id1]">
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="team2">
                <h2>アウェイチーム</h2>
                <select name="game[team_id2]">
                    @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="place">
                <h2>球場</h2>
                <select name="game[place_id]">
                    @foreach($places as $place)
                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <input type="submit" value="保存"/>
        </form>
        
        <div class="back">[<a href="/games">back</a>]</div>
    </body>
</html>