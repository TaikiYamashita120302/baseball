<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>トップページ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        
        <h1>管理者画面</h1>
        
        <div class='postgame'>
            [<a href='/games/create'>試合投稿</a>]
        </div> 
        
        <P>
            <?php
            if($search_date == null){
            echo now()->format('m月d日の試合'); //現在日付
            }else{
            echo date("m月d日", strtotime($search_date)) . "の試合";
            }
            ?>
        </P>
        
        
        <div class='games'>
        
        <form action="/games" method="GET"> 
            <input type="date" name="search_date" value="<?php echo date('Y-m-d');?>"></input> <!--カレンダー、日付検索機能、その日の日付を入力するにはどうすればいいだろう-->
            <input type="submit" value="検索">
            
        </form>
        
        
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
            <a href= "/posts">
                ユーザー側画面へ
            </a>
        </P>
        
    </body>
</html>