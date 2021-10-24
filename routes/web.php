<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/category', CategoryController::class);
    Route::resource('/tag', TagController::class);
    Route::get('/post/recyclebin', [PostController::class, 'recyclebin'])->name('post.recyclebin');
    Route::get('/post/restore/{id}', [PostController::class, 'restore'])->name('post.restore');
    Route::delete('/post/deletepermanently/{id}', [PostController::class, 'deletePermanently'])->name('post.deletepermanently');
    Route::resource('/post', PostController::class);
});

