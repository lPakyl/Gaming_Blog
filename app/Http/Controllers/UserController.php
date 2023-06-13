<?php

namespace App\Http\Controllers;

use App\Models\Console;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        //$consoles = Console::where('user_id', Auth::user()->id)
        //                    ->orderBy('created_at', 'DESC')
        //                    ->get();

        

        return view('user.profile');
    }

    public function destroy(){
        $user_consoles = Auth::user()->consoles;

        foreach($user_consoles as $user_console){
            $user_console->update([
                'user_id' => NULL,
            ]);
        }
 
        Auth::user()->delete();

        return redirect(route('homepage'))->with('userDeleted', 'Hai cnacellato il tuo account. Speriamo di rivederti presto');
    }
}    