<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Withdraw;
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
                        'error' => ['text' => 'Введите пароль']
                    ]);
                    break;
                case 'validation.min.string':
                    return response()->json([
                        'error' => ['text' => 'Мин. кол-во символов в пароле: 5']
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

    public function deposit(Request $r)
    {
        $sum = $r->size;

        $validator = Validator::make($r->all(), [
            'size' => 'required|numeric',
        ]);

        if ($validator->fails())
        {
            if (isset($validator->errors()->get('sum')[0])) switch ($validator->errors()->get('sum')[0])
            {
                case 'validation.required':
                    return response()->json([
                        'error' => ['text' => 'Введите сумму']
                    ]);
                    break;
                case 'validation.numeric':
                    return response()->json([
                        'error' => ['text' => 'Введите корректную сумму']
                    ]);
                    break;
            }
        }

        if ($sum < 20) return response()->json(['error' => ['text' => 'Минимальная сумма депозита - 20N']]);

        $payment = Payment::create([
            'user_id' => $this->user->id,
            'sum' => $sum
        ]);

        return response()->json(['success' => ['location' => 'http://vk.com/']]);
    }

    public function withdraw(Request $r)
    {
        if (\Cache::has('withdraw.user.' . $this->user->id)) return response()->json(['error' => ['text' => 'Не так быстро']]);
        \Cache::put('withdraw.user.' . $this->user->id, '', 0.02);

        $validator = Validator::make($r->all(), [
            'system' => 'required|numeric',
            'size' => 'required|numeric',
            'wallet' => 'required|min:5'
        ]);

        if ($validator->fails())
        {
            if (isset($validator->errors()->get('system')[0])) switch ($validator->errors()->get('system')[0])
            {
                case 'validation.required':
                    return response()->json([
                        'error' => ['text' => 'Выберите платежную систему']
                    ]);
                    break;
                case 'validation.numeric':
                    return response()->json([
                        'error' => ['text' => 'Выберите корректную платежную систему']
                    ]);
                    break;
            }
            if (isset($validator->errors()->get('size')[0])) switch ($validator->errors()->get('size')[0])
            {
                case 'validation.required':
                    return response()->json([
                        'error' => ['text' => 'Введите сумму']
                    ]);
                    break;
                case 'validation.numeric':
                    return response()->json([
                        'error' => ['text' => 'Введите корректную сумму']
                    ]);
                    break;
            }
            if (isset($validator->errors()->get('wallet')[0])) switch ($validator->errors()->get('wallet')[0])
            {
                case 'validation.required':
                    return response()->json([
                        'error' => ['text' => 'Введите кошелек']
                    ]);
                    break;
                case 'validation.min.string':
                    return response()->json([
                        'error' => ['text' => 'Введите правильный кошелек']
                    ]);
                    break;
            }
        }

        $sum = $r->size;
        $system = $r->system;
        $number = $r->wallet;

        if ($system < 1 || $system > 10) return response()->json(['error' => ['text' => 'Выберите корректную платежную систему']]);
        if ($sum < 200) return response()->json(['error' => ['text' => 'Минимальная сумма вывода - 200N']]);
        if ($this->user->balance < $sum) return response()->json(['error' => ['text' => 'Не достаточно средств']]);

        $this->user->update([
            'balance' => $this->user->balance - $sum
        ]);

        $w = Withdraw::create([
            'user_id' => $this->user->id,
            'sum' => $sum,
            'system' => $system,
            'number' => $number
        ]);

        return response()->json([
            'success' => [
                'balance' => $this->user->balance + $sum,
                'new_balance' => $this->user->balance,
                'add_bd' => view('includes.withdraw', compact('w'))->render()
            ]
        ]);
    }

    public function removeWithdraw(Request $r)
    {
        if (\Cache::has('removeWithdraw.user.' . $this->user->id)) return response()->json(['error' => ['text' => 'Не так быстро']]);
        \Cache::put('removeWithdraw.user.' . $this->user->id, '', 0.02);

        $id = $r->id;

        $validator = Validator::make($r->all(), [
            'id' => 'required|numeric',
        ]);

        if ($validator->fails())
        {
            if (isset($validator->errors()->get('system')[0])) switch ($validator->errors()->get('system')[0])
            {
                case 'validation.required':
                    return response()->json([
                        'error' => ['text' => 'Выберите транзакцию']
                    ]);
                    break;
                case 'validation.numeric':
                    return response()->json([
                        'error' => ['text' => 'Выберите правильную транзакцию']
                    ]);
                    break;
            }
        }

        $withdraw = Withdraw::where('id', $id)->where('user_id', $this->user->id)->where('status', 0)->first();

        if (!$withdraw) return response()->json(['error' => ['text' => 'Выберите транзакцию']]);

        $sum = $withdraw->sum;
        $withdraw->delete();

        $this->user->update([
            'balance' => $this->user->balance + $sum
        ]);

        return response()->json(['success' => ['balance' => $this->user->balance - $sum, 'new_balance' => $this->user->balance]]);
    }
}
