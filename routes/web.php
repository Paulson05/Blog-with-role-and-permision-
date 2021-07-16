<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Auth;
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
Auth::routes();
      // hompage

Route::get('/', [HomeController::class, 'homepage'])->name('homepage');

     //Admin



Route::prefix('admin')->group(function (){

    Route::middleware(['guest'])->group(function (){
        Route::get('/getlogin', [AdminController::class, 'getLogin'])->name('admin.getlogin');
        Route::post('/postlogin', [AdminController::class, 'postLogin'])->name('admin.postlogin');
        Route::get('/getregister', [AdminController::class, 'getRegister'])->name('admin.getregister');
        Route::post('/postregister', [AdminController::class, 'PostRegister'])->name('admin.postregister');
        Route::post('/check', [AdminController::class, 'check'])->name('admin.check');

    });
    Route::middleware(['auth:admin'])->group(function (){
        Route::get('/home', [AdminController::class, 'dashboard'])->name('admin.home');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    });
});

// post
Route::resource('/post', PostController::class)->except('create');
// tag
Route::resource('/tag',TagController::class)->except('create');
// category
Route::resource('/category', CategoryController::class)->except('create');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
