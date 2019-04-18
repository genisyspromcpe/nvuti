<?php

namespace App\Http\Controllers;

use App\Config;
use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GameController extends Controller
{

    public function bet(Request $r)
    {
        if (\Cache::has('game.user.' . $this->user->id)) return response()->json(['error' => ['text' => 'Не так быстро']]);
        \Cache::put('game.user.' . $this->user->id, '', 0.02);

        $type = $r->type;
        $hash = $r->hash;
        $bet = $r->betSize;
        $percent = $r->betPercent;

        $game = json_decode($this->user->game);

        if ($percent < 1 || $percent > 85) return response()->json(['error' => ['text' => 'Процент не может быть меньше 1 или больше 85']]);
        if ($bet <= 0) return response()->json(['error' => ['text' => 'Ставка не может быть меньше либо равна 0']]);
        if ($hash !== $game->hash) return response()->json(['new' => ['hash' => $game->hash, 'text' => 'Обновился hash игры']]);
        if ($this->user->balance < $bet) return response()->json(['error' => ['text' => 'Не достаточно средств на балансе']]);

        GameController::setHash($this->user);

        $this->user->update([
            'balance' => $this->user->balance - $bet
        ]);

        $win = round((100 / $percent) * $bet, 2);
        $min =  floor(($percent / 100) * 999999);
        $max = 999999 - floor(($percent / 100) * 999999);

        $gameBD = Game::create([
            'user_id' => $this->user->id,
            'betPercent' => $percent,
            'betType' => 0,
            'win_number' => $game->win_number,
            'bet' => $bet,
            'win' => 0,
            'game' => json_encode($game)
        ]);

        if ($type == 'betMin')
        {
            $gameBD->update([
                'betType' => '0-'.$min
            ]);
        }
        else
        {
            $gameBD->update([
                'betType' => $max.'-999999'
            ]);
        }

        if ( ($type == 'betMin' && $game->win_number <= $min) || ($type == 'betMax' && $game->win_number >= $max) )
        {
            $gameBD->update([
                'win' => $win
            ]);
            $this->user->update([
                'balance' => $this->user->balance + $win
            ]);
            return response()->json([
                'success' => [
                    'check_bet' => $gameBD->id,
                    'type' => 'win',
                    'profit' => $win,
                    'hash' => json_decode($this->user->game)->hash,
                    'balance' => $this->user->balance + $bet,
                    'new_balance' => $this->user->balance
                ]
            ]);
        }
        else
        {
            $gameBD->update([
                'win' => 0
            ]);
            return response()->json([
                'success' => [
                    'check_bet' => $gameBD->id,
                    'type' => 'lose',
                    'number' => $game->win_number,
                    'hash' => json_decode($this->user->game)->hash,
                    'balance' => $this->user->balance + $bet,
                    'new_balance' => $this->user->balance
                ]
            ]);
        }
    }

    public static function setHash($user)
    {
        $win_number = mt_rand(0,999999);
        $salt1 = Str::random(15).'|';
        $salt2 = '|'.Str::random(15);
        $hash = hash('sha512',$salt1.''.$win_number.''.$salt2);

        $user->update([
            'game' => json_encode([
                'win_number' => $win_number,
                'salt1' => $salt1,
                'salt2' => $salt2,
                'hash' => $hash
            ])
        ]);
    }
}
