<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{
    public function index(Request $r)
    {
        if(isset($r->i))
        {
            $r->session()->put('ref', $r->i);
        }
        if (Auth::check())
        {
            return view('logged');
        }
        else
        {
            return view('auth');
        }
    }

    public function game(Request $r)
    {
        $game = Game::with(['user'])->find($r->id);

        if (!$game) return Redirect::back();

        return view('game', compact('game'));
    }
}
