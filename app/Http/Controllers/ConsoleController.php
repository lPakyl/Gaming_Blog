<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Console;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consoles = Console::all();

        return view('console.index', compact('consoles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $games = Game::all();
        return view('console.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $console = Console::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);



        if($request->logo){
            $console->update([
                'logo' => $request->file('logo')->store('public/logos'),
            ]);
        }

        $console->games()->attach($request->games);
    
        return redirect(route('console.index'))->with('consoleCreated', 'Hai creato con successo la tua console');
    }

    /**
     * Display the specified resource.
     */
    public function show(Console $console)
    {
        $games = Game::all();
        return view('console.show', compact('console'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Console $console)
    {
        $games = Game::all();
        return view('console.edit', compact('console', 'games'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Console $console)
    {
        $console->update([
                'name' => $request->name,
                'brand' => $request->brand,
                'description' => $request->description,
                'user_id' => Auth::user()->id
            ]);
        
        if($request->logo){
                $console->update([
                    'logo' => $request->file('logo')->store('public/logos'),
                ]);           
            }

            $console->games()->attach($request->games);

        return redirect(route('console.index'))->with('consoleUpdated', 'Hai correttamente aggiorato la console');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Console $console)
    {

        $console->games()->detach($console->games);

        $console->delete();

        return redirect(route('console.index'))->with('consoleDeleted', 'Hai eliminato con successo la console');
    }
    public function detach(console $console, Game $game){
        

        $console->games()->detach($game);

        return redirect()->back()->with('gameDetached', 'Hai eliminato la relazione');
    }
}