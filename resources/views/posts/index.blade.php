@extends('layouts.app')
@section('title')
{{ date('n月j日',strtotime($search_date)) }}({{ $week }})の試合
@endsection
@section('css')
<link href="/css/posts/index.css" rel="stylesheet" media="all">
@endsection
@section('content')
    
    <div class="header">
        <div class="head_element">
            <a href="/user">
                マイページ
            </a>
        </div>
        <div class="head_element">
            <form action="/" method="GET">
                <button type="submit" name="search_date" value="{{ date('Y-m-d', strtotime($search_date . '-1 day')) }}">昨日の試合</button>
            </form>
        </div>
        <div class="head_element">
            {{ date('n月j日',strtotime($search_date)) }}({{ $week }})
        </div>
        <div class="head_element">
            <form action="/" method="GET">
                <button type="submit" class="tomorrow_button" name="search_date" value="{{ date('Y-m-d', strtotime($search_date . '+1 day')) }}">明日の試合</button>
            </form>
        </div>
        <div class="head_element">
            <form action="/" method="GET">
                <input type="date" name="search_date" value="{{ $search_date }}"></input> <!--カレンダー-->
                <input type="submit" value="検索">
            </form>
        </div>
    </div>
    
    <div class="main">
        @foreach($games as $game)
        <div class='game'>
            <h2>
                <a href= "/posts/{{ $game->id }}">
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
            </h2>
        </div>
        @endforeach
    </div>
    
    <div class="admin">
        @can('admin')
        <a href= "/games">
            管理者画面へ
        </a>
        @endcan
    </div>
    
    
    
@endsection

