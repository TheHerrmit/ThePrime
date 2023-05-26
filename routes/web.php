<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\Users\LoginController;
use \App\Http\Controllers\admin\MainController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\admin\MenuController;
use \App\Http\Controllers\admin\ProductController;
use \App\Http\Controllers\admin\UploadController;
use App\Http\Controllers\Admin\SliderController;

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
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}',[ProductController::class,'show'] );
            Route::post('edit/{product}',[ProductController::class,'update'] );
            Route::DELETE('destroy',[ProductController::class,'destroy'] );
        });
        #upload
        Route::post('upload/services',[UploadController::class,'store']);

        #Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });
    });
});

Route::get('/',[\App\Http\Controllers\MainController::class,'index']);
Route::post('/services/load-product',[\App\Http\Controllers\MainController::class,'loadProduct']);

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);
Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('/carts/delete/{id}',[\App\Http\Controllers\CartController::class,'remove']);

