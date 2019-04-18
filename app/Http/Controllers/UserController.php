<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

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

    public function resetPass(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'newPass' => 'required|min:5',
        ]);

        if ($validator->fails())
        {
            if (isset($validator->errors()->get('newPass')[0])) switch ($validator->errors()->get('newPass')[0])
            {
                case 'validation.required':
                    return response()->json([
                        'error' => 'Введите пароль'
                    ]);
                    break;
                case 'validation.min.string':
                    return response()->json([
                        'error' => 'Мин. кол-во символов в пароле: 5'
                    ]);
                    break;
            }
        }

        $this->user->update([
            'password' => md5($r->newPass)
        ]);

        return response()->json([
            'success' => true
        ]);
    }
}
