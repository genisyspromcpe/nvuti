<?php

namespace App\Http\Controllers;

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
}
