<?php

namespace App\Http\Controllers;

use App\Game;
use App\Place;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GameController extends Controller
{
    public function index(Game $game){
        
        return view('games/index') -> with(['games' => $game->getPaginateByLimit()]);
    }
    
    public function create(Place $place, Team $team){
    
        return view('games/create')->with(['places' => $place->get()]) -> with(['teams' => $team->get()]);
        
    }
    
    public function store(Request $request, Game $game){
        
        $input = $request['game']; #$request['game']がgameをキーに持つ（カラムの構成がgame）入力情報がinputへ
        $game->fill($input)->save();
        return redirect('/games');
        
    }
}
