<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    public function registration(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'login' => 'required|unique:users,username|max:15|min:4',
            'pass' => 'required|min:5',
            'email' => 'required|unique:users,email|email'
        ]);

        $client = new Client();
        $res = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', ['form_params' => [
            'secret' => env('GOOGLE_API_RECAPTCHA'),
            'response' => $r->rc
        ]]);

        $response = (string) $res->getBody();
        $data = json_decode($response, true);

        if (!$data['success']) {
            return response()->json(['error' => 'Введите каптчу']);
        }

        if ($validator->fails())
        {
            if (isset($validator->errors()->get('login')[0])) switch ($validator->errors()->get('login')[0])
            {
                case 'validation.required':
                    return response()->json([
                        'error' => 'Введите логин'
                    ]);
                    break;
                case 'validation.min.string':
                    return response()->json([
                        'error' => 'Мин. кол-во символов в логине: 4'
                    ]);
                    break;
                case 'validation.max.string':
                    return response()->json([
                        'error' => 'Макс. кол-во символов в логине: 15'
                    ]);
                    break;
                case 'validation.unique':
                    return response()->json([
                        'error' => 'Пользователь с данным логином уже есть'
                    ]);
                    break;
            }
            if (isset($validator->errors()->get('pass')[0])) switch ($validator->errors()->get('pass')[0])
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
            if (isset($validator->errors()->get('email')[0])) switch ($validator->errors()->get('email')[0])
            {
                case 'validation.required':
                    return response()->json([
                        'error' => 'Введите почту'
                    ]);
                    break;
                case 'validation.unique':
                    return response()->json([
                        'error' => 'Пользователь с данной почтой уже есть'
                    ]);
                    break;
                case 'validation.email':
                    return response()->json([
                        'error' => 'Укажите правильную почту'
                    ]);
                    break;
            }
        }
        else
        {
            $referred = null;

            if ($r->session()->has('ref'))
            {
                $userReferred = User::where('id', session('ref'))->first();
                if ($userReferred) $referred = session('ref');
            }

            $user = User::create([
               'username' => $r->login,
               'password' => md5($r->pass),
               'email' => $r->email,
               'ref' => $referred,
               'ip' => request()->ip()
            ]);

            GameController::setHash($user);
            Auth::login($user, true);

            return response()->json(['success' => true]);
        }
    }

    public function login(Request $r)
    {
        $user = User::where('username', $r->login)->where('password', md5($r->pass))->where('vkId', NULL)->first();

        if (!$user) return response()->json(['error' => 'Пользователь не найден']);

        $user->update([
            'ip' => request()->ip()
        ]);

        GameController::setHash($user);
        Auth::login($user, true);

        return response()->json(['success' => true]);
    }

    public function authVK()
    {
        return Socialite::with('vkontakte')->redirect();
    }

    public function vkCallback(Request $r)
    {
        $user = Socialite::driver('vkontakte')->user();
        $data = $user->user;

        $userBD = User::where('vkId', $data['id'])->first();

        if (!$userBD)
        {
            $referred = null;

            if ($r->session()->has('ref'))
            {
                $userReferred = User::where('id', session('ref'))->first();
                if ($userReferred) $referred = session('ref');
            }

            $userBD = User::create([
                'username' => $data['first_name'].' '.$data['last_name'],
                'email' => $user->accessTokenResponseBody['email'],
                'vkId' => $data['id'],
                'ref' => $referred
            ]);
        }

        $userBD->update([
            'ip' => request()->ip()
        ]);

        GameController::setHash($userBD);
        Auth::login($userBD, true);

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
