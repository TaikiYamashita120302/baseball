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
@endsection