<?php

namespace App\Http\Controllers;

use App\Game;
use App\Place;
use App\Team;
use Illuminate\Http\Request;


class GameController extends Controller
{
    public function index(Game $game){
        return view('games/index') -> with(['games' => $game->getPaginateByLimit()]);
    }
}
