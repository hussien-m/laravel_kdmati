<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;


Route::name('user.')->group(function(){



        Route::get('/',[FrontendController::class,'index']);
        Route::get('/test',[FrontendController::class,'test']);




});



Route::middleware(['auth:web'])->group(function(){


});
