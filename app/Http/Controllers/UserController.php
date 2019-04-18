<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getBonus()
    {
        if ($this->user->last_bonus !== null) {
            $lastBonus = Carbon::parse($this->user->last_bonus);
            $now = Carbon::now();

            $diff = $now->timestamp - $lastBonus->timestamp;
            $lastBonus->addHour(24);

            $secondsInAMinute = 60;
            $secondsInAnHour  = 60 * $secondsInAMinute;
            $secondsInADay    = 24 * $secondsInAnHour;

            $hourSeconds = ($lastBonus->timestamp - $now->timestamp) % $secondsInADay;
            $hours = floor($hourSeconds / $secondsInAnHour);

            $minuteSeconds = $hourSeconds % $secondsInAnHour;
            $minutes = floor($minuteSeconds / $secondsInAMinute);

            if ($diff < 86400) return response()->json(['error' => ['text' => 'До бонуса '.$hours.'ч '.$minutes.'мин']]);
        }

        $this->user->update([
            'last_bonus' => Carbon::now(),
            'balance' => $this->user->balance + 5
        ]);

        return response()->json([
            'success' => 1
        ]);
    }
}
