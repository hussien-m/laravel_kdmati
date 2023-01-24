<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\AuthenticationException;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest:admin')->except('logout');
    }
    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function processLogin(Request $request)
    {

        if(Auth::guard('admin')->attempt($request->except(['_token']))){
            $user = Auth::guard('admin')->user()->name;
            toast("مرحبا بك $user",'success');
            return redirect(RouteServiceProvider::DASH);
        }

        toast('تاكد من البريد الالكتروني او كلمة المرور','danger');
        return redirect()->action([
                AdminLoginController::class,
                'login'
        ]);

    }
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
