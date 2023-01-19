<?php

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


    $admins = Admin::all();

    DB::beginTransaction();
     try{


             User::create([
                'first_name' => "hyy",
                'last_name' => "asashudas",
                'email' => "hsd@lph.hsjkd",
                'password' => Hash::make('password'),
            ]);

            Notification::send($admins , new RegisterNewNotification("تم تسجيل مستخدم جديد"));

            DB::commit();


    } catch (Exception $ex){
        DB::rollBack();
        return $ex->getMessage();
    }

});
