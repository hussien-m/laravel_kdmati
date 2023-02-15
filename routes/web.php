<?php

use App\Events\RealTimeMessageEvent;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RegisterNewNotification;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('cat-s',function(){

    $data['categories_services'] = DB::table('services')
    ->join('categories','services.category_id','categories.id')
    ->select(

        'categories.id AS cat_id',
        'categories.name AS cat_name',
        'categories.slug AS cat_slug',
        'categories.slug AS cat_image',

        'services.id AS serv_id',
        'services.title AS serv_title',
        'services.slug AS serv_slug',
        'services.images AS serv_images',
        )

    ->take(8)
    ->get();

    dd($data);
});

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('ad',function(){

    Admin::create([
        'name' => 'Super Admin',
        'username' => 'super_admin',
        'email' => 'admin@app.com',
        'password'=> Hash::make('password')
    ]);

});


Route::get('/new',function(){


    //$admins = Admin::all();
    //Notification::send($admins , new RegisterNewNotification("تم تسجيل مستخدم جديد"));
    event( new RealTimeMessageEvent("asdsd"));

    return "Noti Sent";
});
