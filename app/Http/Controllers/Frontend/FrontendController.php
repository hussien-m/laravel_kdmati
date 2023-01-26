<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        if(Auth::guard('web')->check()){

            return view('layouts.frontend.front');

        }

        return view('welcome');
    }

    public function test()
    {
        if(Auth::guard('web')->check()){

            return view('layouts.frontend.front-app');

        }

        return view('welcome');
    }
}
