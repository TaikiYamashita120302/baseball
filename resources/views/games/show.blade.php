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
    
    <form class= "delete" action="/games/{{ $game->id }}" id="form_{{ $game->id }}" method="post" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            投稿削除
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">！！注意！！</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                試合を削除してよろしいですか？
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">戻る</button>
                <button type="submit" class="btn btn-primary">削除</button>
              </div>
            </div>
          </div>
        </div>
    </form> 
        
    <div class="edit">
        <a href="/games/{{ $game->id }}/edit">
            試合情報変更
        </a>
    </div>
    
    <div class="footer">
        <a href="/games">戻る</a>
    </div>
@endsection