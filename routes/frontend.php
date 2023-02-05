<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\MessagesController;
use App\Http\Controllers\Frontend\ServicesController;
use Illuminate\Support\Facades\Route;

Route::name('user.')->group(function(){

        Route::get('/',[FrontendController::class,'index'])->name('index.page');
        Route::get('/test',[FrontendController::class,'test']);
});



Route::middleware(['auth'])->group(function(){

    Route::post('logout',[LoginController::class,'destroy'])->name('user.logout');
    Route::get('new/service',[ServicesController::class,'create'])->name('add-service');
    Route::post('post/service',[ServicesController::class,'post'])->name('post-service');

    Route::post('post/service/upload',[ServicesController::class,'upload'])->name('image.upload')
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

    Route::get('/get-sub-category',function (){
        $category_id = \Illuminate\Support\Facades\Request::get('category_id');
        $category = \App\Models\Category::where('parent_id','=',$category_id)->whereStatus(1)->get();
        return response()->json($category);
    })->name('get-sub-category');

    Route::get('category/{slug}',[ServicesController::class,'categorySlug'])->name('categorySlug');
    Route::get('services/{slug}',[ServicesController::class,'service'])->name('service.show');

    Route::get('new/message/{service_id}',[MessagesController::class,'showFormMessage'])->name('message.new');

    Route::get('messages/{conv_id}',[MessagesController::class,'showmessage'])->name('show.messages');



    Route::post('front/send/message',[MessagesController::class,'sendMessage'])->name('user.sendMessage');
    Route::post('now/send/message',[MessagesController::class,'sendMessageNow'])->name('sendMessageNow');
    Route::post('upload/record',[MessagesController::class,'uploadRecord'])
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);


});
