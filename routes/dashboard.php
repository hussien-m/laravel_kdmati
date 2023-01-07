<?php

use App\Events\RealTimeMessageEvent;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AdminLoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('noti',function(){

    event(new RealTimeMessageEvent('Hello'));
    echo "message Sent";
});

Route::name('admin.')->prefix('admin')->group(function(){

    Route::namespace('Auth')->middleware('guest:admin')->group(function(){

        Route::get('login',[AdminLoginController::class,'login'])->name('login');

        Route::post('login/post',[AdminLoginController::class,'processLogin'])->name('loginPost');



    });


    Route::middleware(['auth:admin','admin_active'])->group(function(){

        Route::post('/logout',[AdminLoginController::class,'destroy'])->name('logout');

        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

        Route::get('admins',[AdminController::class,'index'])->name('admins');

    });


});

