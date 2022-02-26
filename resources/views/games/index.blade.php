@extends('layouts.app')
@section('title')
管理者側トップページ {{ date('n月j日',strtotime($search_date)) }}({{ $week }})の試合
@endsection
@section('css')
<link href="/css/games/index.css" rel="stylesheet" media="all">
@endsection
@section('content')

    <div class="header">
        <div class='head_element_left'>
            <a href='/games/create'>試合作成</a>
        </div> 
        
        <div class="head_element">
            <form action="/games" method="GET">
                <button type="submit" name="search_date" value="{{ date('Y-m-d', strtotime($search_date . '-1 day')) }}">昨日の試合</button>
            </form>
        </div>
        
        <div class="date">
            {{ date('n月j日',strtotime($search_date)) }}({{ $week }})
        </div>
        
        <div class="head_element">
            <form action="/games" method="GET">
                <button type="submit" class="tomorrow_button" name="search_date" value="{{ date('Y-m-d', strtotime($search_date . '+1 day')) }}">明日の試合</button>
            </form>
        </div>
        
        <div class="head_element">
            <form action="/games" method="GET">
                <input type="date" name="search_date" value="{{ $search_date }}"></input> <!--カレンダー、日付検索機能、その日の日付を入力するにはどうすればいいだろう-->
                <input type="submit" value="検索">
            </form>
        </div>
    </div>
    
    <div class="main">
        @foreach($games as $game)
            <div class='game'>
                <h2>
                    <a href= "/games/{{ $game->id }}">
                        {{ $game->team1->name }} 対 {{ $game->team2->name }}
                    </a>
                    @if($game->reason)
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="fa-solid fa-exclamation"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">お知らせ</h5>
                              </div>
                              <div class="modal-body">
                                {{ $game->reason }}
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    @endif
                    <div class="detail">
                        {{ $game->place->name }}
                    <p>
                        {{ date("G時i分",strtotime($game->time))}}開始
                    </p>
                    </div>
                </h2>
            </div>
        @endforeach
    </div>
        
    <div class="user">
        <a href= "/">
            ユーザー側画面へ
        </a>
    </div>

@endsection