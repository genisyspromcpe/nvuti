<?php

namespace App\Http\Controllers;

use App\Game;
use App\Payment;
use App\User;
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
            $referrals = User::where('ref', $this->user->id)->get();
            $referralsP = [];
            $allSum = 0;

            foreach ($referrals as $refer)
            {
                $payments = Payment::where('user_id', $refer->id)->where('status', 1)->sum('sum');
                $allSum += $payments / 2;
                $referralsP[] = [
                    'user' => $refer,
                    'sum' => $payments / 2
                ];
            }
            return view('logged', compact('referralsP', 'allSum'));
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
