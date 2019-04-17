<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{
    public function index()
    {
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
