<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }


    public function create(){
        return view('game.create');
    }

    public function store(GameRequest $request){
        //METODO SAVE
        //$game = new Game();
        //$game->title = $request->title;
        //$game->producer = $request->producer;
        //$game->description = $request->description;
        //$game->truffa = "ahahah ti ho fregato";

        //$game->save();
    

        //PROTECTED MASS ASSIGNMENT
        $game = Game::create([
            'title' => $request->title,
            'producer' => $request->producer,
            'description' => $request->description,
            'cover' => $request->file('cover')->store('public/covers'),
        ]);
        
        return redirect(route('homepage'))->with('gameCreated', 'Hai inserito con successo un videogame!');
    }

    public function index(){
        $games = Game::all();


        return view('game.index', compact('games'));
    }
}