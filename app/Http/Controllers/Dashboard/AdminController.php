<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends DashboardController
{
    public function index()
    {
        return view('dashboard.admin.index');
    }
}
