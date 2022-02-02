<?php

namespace App\Http\Controllers;

use App\Game;
use App\Place;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GameController extends Controller
{
    public function index(Game $game, Request $request){
        
        $search_date = $request->input('search_date'); #カレンダー、日付検索機能で入力した日付> search_dateはformの名前とリンク
        
        return view('games/index') -> with(['games' => $game->getSearchByDate($search_date),'search_date' => $search_date]);#関数をgameモデルに渡す、何を渡すかは名称ではなく順番
    }
    
    public function show(Game $game){
        
        return view('games/show')->with(['game' => $game]);
        
    }
    
    public function create(Place $place, Team $team){
    
        return view('games/create')->with(['places' => $place->get()]) -> with(['teams' => $team->get()]);
        
    }
    
    public function store(Request $request, Game $game){
    
        $input = $request['game']; #$request['game']がgameをキーに持つ（カラムの構成がgame）入力情報がinputへ
        $game->fill($input)->save();
        return redirect('/games');
        
        
    }
    
    public function edit(Game $game, Place $place, Team $team){#$game は以前入力していたgameデータだから、createには、'Game $game'がない
        
        return view('games/edit')->with(['game' => $game])->with(['places' => $place->get()]) -> with(['teams' => $team->get()]);
        
    }
    
    public function update(Request $request, Game $game){
        $input = $request['game'];
        $game->fill($input)->save();
        return redirect('/games/' . $game->id);
    }
    
    public function delete(Game $game){
        $game -> delete();#Modelクラスの関数でdeleteというものが用意されているため、それを用いるだけで簡単に実装できる。
        return redirect('/games');
    }
}
