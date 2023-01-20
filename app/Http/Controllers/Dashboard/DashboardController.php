<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }
    public function index()
    {
        $data['notis'] =Auth::user()->unReadNotifications;
        $data['c']     =$data['notis']->count();
        return view('dashboard.home',$data);
    }
}
