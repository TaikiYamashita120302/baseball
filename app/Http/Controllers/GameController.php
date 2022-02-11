<?php

namespace App\Http\Controllers;

use App\Game;
use App\Place;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

function week($date){//$dateは日付、string型 date関数はstring型で返される
    //指定日の曜日を取得する
    $week_id = date('w', strtotime($date));
    //配列を使用し、要素順に(日:0〜土:6)を設定する
    $week_array = [
        '日', //0
        '月', //1
        '火', //2
        '水', //3
        '木', //4
        '金', //5
        '土', //6
    ];
    
    return $week_array[$week_id];
}

class GameController extends Controller
{
    public function index(Game $game, Request $request){
        
        $search_date = $request->input('search_date'); #カレンダー、日付検索機能で入力した日付> search_dateはformの名前とリンク
        if($search_date==null){
            $search_date = date('Y-m-d');#string型 Y-m-dの表記でカレンダー表示可能
        }
        $week = week($search_date);
        return view('games/index') -> with(['games' => $game->getSearchByDate($search_date),'search_date' => $search_date,'week'=>$week]);#関数をgameモデルに渡す、何を渡すかは名称ではなく順番
    }
    
    public function show(Game $game){
        $week = week($game->date);
        return view('games/show')->with(['game' => $game, 'week'=>$week]);
        
    }
    
    public function create(Place $place, Team $team){#$game は以前入力していたgameデータだから、createには、'Game $game'がない
    
        return view('games/create')->with(['places' => $place->get(), 'teams' => $team->get()]);
        
    }
    
    public function store(Request $request, Game $game){
    
        $input = $request['game']; #$request['game']がgameをキーに持つ（カラムの構成がgame）入力情報がinputへ
        $game->fill($input)->save();
        return redirect('/games');
        
        
    }
    
    public function edit(Game $game, Place $place, Team $team){
        $week = week($game->date);
        return view('games/edit')->with(['game' => $game,'places' => $place->get(), 'teams' => $team->get(), 'week'=>$week]);
    }
    
    public function update(Request $request, Game $game){
        $input = $request['game'];//editのformから送られてくるnameとリンク
        $game->fill($input)->save();
        return redirect('/games/' . $game->id);
    }
    

    
    /*
    public function delete(Game $game){
        $game -> delete();#Modelクラスの関数でdeleteというものが用意されているため、それを用いるだけで簡単に実装できる。
        return redirect('/games');
        
        (ブレード記載してた文)
        <form class= "delete" action="/games/{{ $game->id }}" id="form_{{ $game->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type = "submit">
                試合削除
            </button>
        </form> 
    }
    */
}
