<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\Users\LoginController;
use \App\Http\Controllers\admin\MainController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\admin\MenuController;
use \App\Http\Controllers\admin\ProductController;
use \App\Http\Controllers\admin\UploadController;


Route::get ('admin/users/login', [LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store',[LoginController::class,'store']);

Route::middleware(['auth'])->group(function (){

    Route::prefix('admin')->group(function (){

        Route::get('/',[MainController::class,'index'])->name('admin');
        Route::get('/main',[MainController::class,'index']);

        #Menu
        Route::prefix('menus')->group(function (){
            Route::get('add',[MenuController::class,'create'] );
            Route::post('add',[MenuController::class,'store'] );
            Route::get('list',[MenuController::class,'index'] );
            Route::get('edit/{menu}',[MenuController::class,'show'] );
            Route::post('edit/{menu}',[MenuController::class,'update'] );
            Route::DELETE('destroy',[MenuController::class,'destroy'] );
        });

        #Product
        Route::prefix('product')->group(function (){
            Route::get('add',[ProductController::class,'create'] );
            Route::post('add',[ProductController::class,'store'] );
            Route::get('list',[ProductController::class,'index'] );
            Route::get('edit/{menu}',[ProductController::class,'show'] );
            Route::post('edit/{menu}',[ProductController::class,'update'] );
            Route::DELETE('destroy',[ProductController::class,'destroy'] );
        });
        #upload
            Route::post('upload/services',[UploadController::class,'store']);

    });
});


