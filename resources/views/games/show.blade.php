@extends('layouts.app')
@section('title')
管理者 試合詳細 {{ $game->date->format("n月j日") }}({{ $week }}) {{ $game -> team1 -> name}}対{{ $game -> team2 -> name }}
@endsection
@section('content')
    <h1 class="date">
        {{ $game->date->format("n月j日") }}
    </h1>
    
    <div class="content">
        <div class="content__game">
            <h2>
                <div class='time'>試合開始時刻：{{ date("G時i分",strtotime($game->time)) }}</div>
                <div class='place'>場所：{{ $game->place->name }}</div>
                <div class='team_1対team_2'>
                    対戦カード：{{ $game->team1->name}}対{{ $game->team2->name }}
                </div>  
                <div class="reason">
                    変更点：{{ $game->reason }}
                </div>
            </h2>
            
        </div>
    </div>
    
    <div class="edit">
        <a href="/games/{{ $game->id }}/edit">
            試合情報変更
        </a>
    </div>
    
    <div class="footer">
        <a href="/games">戻る</a>
    </div>
@endsection