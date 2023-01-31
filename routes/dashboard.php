<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AdminLoginController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\GeneralSettingController;
use App\Http\Controllers\Dashboard\NotificationsController;
use App\Http\Controllers\Dashboard\ServicesController;
use App\Http\Controllers\Dashboard\UserController;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\Frontend\AcceptUserService;
use App\Notifications\NewUserRegister;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;


Route::get('n',function(){

    Notification::send(\App\Models\Admin::all(),new NewUserRegister('تم تسجيل مستخدم جديد'));
    $user = User::findOrFail(4214);
    $user->notify(new AcceptUserService("Hello","Serive"));

});




Route::name('admin.')->prefix('admin')->group(function(){

    Route::namespace('Auth')->middleware('guest:admin')->group(function(){

        Route::get('login',[AdminLoginController::class,'login'])->name('login');

        Route::post('login/post',[AdminLoginController::class,'processLogin'])->name('loginPost');



    });


    Route::middleware(['auth:admin','admin_active'])->group(function(){


        Route::post('/logout',[AdminLoginController::class,'destroy'])->name('logout');

        Route::get('settings',[GeneralSettingController::class,'index'])->name('settings');
        Route::post('settings/save',[GeneralSettingController::class,'save'])->name('setting.save');

        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

        Route::get('admins',[AdminController::class,'index'])->name('admins');

        Route::resource('users',UserController::class);

        Route::get('pagination/fetch_data',[UserController::class,'fetch_data'])->name('user.paginate');
       // Route::get('search/fetch_data',[UserController::class,'search_fetch_data'])->name('user.paginate');



        Route::get('wait/active',[UserController::class,'unActiveUser'])->name('unactive.users');

        Route::get('wait/active/user',[UserController::class,'fetch_data_unactive'])->name('unactive.user.paginate');



        Route::get('user/activate/{id}',[UserController::class,'activate'])->name('user.activate');
        Route::get('user/deActivate/{id}',[UserController::class,'deActivate'])->name('user.deActivate');



        Route::resource('categories',CategoryController::class);
        Route::get('sub/category/{slug}',[CategoryController::class,'subCategory'])->name('sub.category');

        Route::get('notifications',[NotificationsController::class,'index']);

        Route::get('services',[ServicesController::class,'index'])->name('services.index');
        Route::get('service/activate/{id}',[ServicesController::class,'activate'])->name('service.activate');
        Route::get('service/deActivate/{id}',[ServicesController::class,'deActivate'])->name('service.deActivate');

    });


});

