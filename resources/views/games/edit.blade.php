@extends('layouts.app')
@section('title')
管理者 編集 {{ $game->date->format("n月j日") }}({{ $week }}) {{ $game -> team1 -> name}}対{{ $game -> team2 -> name }} 編集画面
@endsection
@section('content')

    <div class="content">
        <form action="/games/{{ $game->id }}" method="POST">
            @csrf
            @method('PUT')
            
        <div class="date">
            <h2>日付</h2>
            <input type="date" name="game[date]" value="{{ date('Y-m-d',strtotime($game->date)) }}"></input> <!--カレンダー-->
        </div>
        
        <div class="time">
            <h2>時間</h2>
            <input type="time" name="game[time]" value="{{ date("H:i",strtotime($game->time))}}" />
        </div>
        
        <div class="place">
            <h2>球場</h2>
            <select name="game[place_id]">
                @foreach($places as $place)
                 @if($place->id == $game->place->id)
                 <option value="{{ $place->id }}" selected>{{ $place->name }}</option>
                 @else
                 <option value="{{ $place->id }}">{{ $place->name }}</option>
                 @endif
                @endforeach
            </select>
        </div>
        
        <div class="team1">
            <h2>ホームチーム</h2>
            <select name="game[team_id1]">
                @foreach($teams as $team)
                @if($team->id == $game->team1->id)
                <option value="{{ $team->id }}" selected>{{ $team->name }}</option>
                @else
                <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        
        <div class="team2">
            <h2>アウェイチーム</h2>
            <select name="game[team_id2]">
                @foreach($teams as $team)
                @if($team->id == $game->team2->id)
                <option value="{{ $team->id }}" selected>{{ $team->name }}</option>
                @else
                <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        
        <div class="reason">
            <h2>変更点</h2>
            <textarea name="game[reason]" cols="50" rows="2">{{ $game->reason }}</textarea>
        </div>
    
        <input type="submit" value="保存">
        </form>
        
        
        <div class="footer">
            <a href="/games/{{ $game->id }}">
                戻る
            </a>
        </div>
    </div>
@endsection