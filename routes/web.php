<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/profil', [HomeController::class, 'indexProfil']);
Route::get('/visimisi', [HomeController::class, 'indexVisimisi']);
Route::get('/sambutankepala', [HomeController::class, 'indexSambutan']);
Route::get('/strukturorganisasi', [HomeController::class, 'indexStruktur']);

Route::get('/berita', [HomeController::class, 'indexBerita']);
Route::get('/berita/{post:slug}', [HomeController::class, 'showBerita']);
Route::get('/kategori/{category:slug}', [HomeController::class, 'showKategori']);

Route::get('/pengumuman', [HomeController::class, 'indexPengumuman']);
Route::get('/galeri', [HomeController::class, 'indexGaleri']);
Route::get('/kejuruan', [HomeController::class, 'indexKejuruan']);

Route::group(['middleware' => 'is_admin'], function() {
    Route::get('/admin/home', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('admin.home');
    
    Route::resource('/admin/category', CategoryController::class);
    
    Route::resource('/admin/tag', TagController::class);

    Route::get('/admin/post/recyclebin', [PostController::class, 'recyclebin'])->name('post.recyclebin');
    Route::get('/admin/post/restore/{id}', [PostController::class, 'restore'])->name('post.restore');
    Route::delete('/admin/post/deletepermanently/{id}', [PostController::class, 'deletePermanently'])->name('post.deletepermanently');
    Route::resource('/admin/post', PostController::class);

    Route::get('/admin/pengumuman/recyclebin', [PengumumanController::class, 'recyclebin'])->name('pengumuman.recyclebin');
    Route::get('/admin/pengumuman/restore/{id}', [PengumumanController::class, 'restore'])->name('pengumuman.restore');
    Route::delete('/admin/pengumuman/deletepermanently/{id}', [PengumumanController::class, 'deletePermanently'])->name('pengumuman.deletepermanently');
    Route::resource('/admin/pengumuman', PengumumanController::class);

    Route::delete('/admin/gallery/deleteimage/{id}', [GalleryController::class, 'deleteImage'])->name('gallery.deleteimage');
    Route::resource('/admin/gallery', GalleryController::class);
    
    Route::resource('/admin/user', UserController::class);

    Route::resource('/admin/profile', ProfileController::class);
});