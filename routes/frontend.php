<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ServicesController;
use Illuminate\Support\Facades\Route;

Route::name('user.')->group(function(){

        Route::get('/',[FrontendController::class,'index']);
        Route::get('/test',[FrontendController::class,'test']);
});



Route::middleware(['auth'])->group(function(){

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
});
