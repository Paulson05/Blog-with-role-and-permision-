<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

      // homepage
Route::get('/', [BlogController::class, 'homePage'])->name('homepage');
    // user
Route::prefix('user')->group(function (){
    Route::middleware(['guest'])->group(function (){
        Route::get('/getlogin', [UserController::class, 'getLogin'])->name('user.getlogin');
        Route::post('/postlogin', [UserController::class, 'postLogin'])->name('user.postlogin');
        Route::get('/getregister', [UserController::class, 'getRegister'])->name('user.getregister');
        Route::post('/postregister', [UserController::class, 'PostRegister'])->name('user.postregister');
//        Route::post('/check', [AdminController::class, 'check'])->name('admin.check');

    });
    Route::middleware(['auth:user'])->group(function (){
        Route::get('/home', [AdminController::class, 'dashboard'])->name('user.home');
        Route::get('/logout', [AdminController::class, 'logout'])->name('user.logout');

    });
});
     //Admin
Route::prefix('admin')->group(function (){
    Route::middleware(['guest'])->group(function (){
        Route::get('/getlogin', [AdminController::class, 'getLogin'])->name('admin.getlogin');
        Route::post('/postlogin', [AdminController::class, 'postLogin'])->name('admin.postlogin');
        Route::get('/getregister', [AdminController::class, 'getRegister'])->name('admin.getregister');
        Route::post('/postregister', [AdminController::class, 'PostRegister'])->name('admin.postregister');
//        Route::post('/check', [AdminController::class, 'check'])->name('admin.check');

    });
    Route::middleware(['auth:admin'])->group(function (){
        Route::get('/home', [AdminController::class, 'dashboard'])->name('admin.home');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    });
});
// slug to access single  page

Route::get('blog/{post:slug}', [BlogController::class, 'getSinglePost'])->name('getSinglePost')
    ->where('slug', '[\w\d\-\_]+');
// post
Route::resource('/post', PostController::class)->except('create');
// tag
Route::resource('/tag',TagController::class)->except('create');
// category
Route::resource('/category', CategoryController::class)->except('create');

Route::post('/comments', [CommentController::class, 'postComment'])->name('comment.post');

// modal reload


Route::get('/fetchpost', [PostController::class, 'fetchPost'])->name('post.fetch');

Auth::routes();

