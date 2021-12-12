<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KejuruanController;
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
Route::get('/kategori', [HomeController::class, 'indexKategori']);
Route::get('/kategori/{category:slug}', [HomeController::class, 'showKategori']);

Route::get('/pengumuman', [HomeController::class, 'indexPengumuman']);
Route::get('/pengumuman/{pengumuman:slug}', [HomeController::class, 'showPengumuman']);

Route::get('/galeri', [HomeController::class, 'indexGaleri']);
Route::get('/galeri/{gallery:slug}', [HomeController::class, 'showGaleri']);

Route::get('/kejuruan', [HomeController::class, 'indexKejuruan']);
Route::get('/downloadkurikulum', [HomeController::class, 'downloadKurikulum']);

Route::group(['middleware' => ['is_admin', 'auth']], function() {
    Route::get('/admin', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('admin.home');
    
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

    Route::resource('/admin/kejuruan', KejuruanController::class);
    
    Route::get('/admin/account', [UserController::class, 'account'])->name('admin.account');
    Route::put('/admin/account/update/{id}', [UserController::class, 'accountUpdate'])->name('admin.account.update');
    Route::resource('/admin/user', UserController::class);

    Route::resource('/admin/profile', ProfileController::class);
});

Route::group(['middleware' => ['is_author', 'auth']], function () {
    Route::get('/penulis', [App\Http\Controllers\PenulisHomeController::class, 'index'])->name('penulis.home');
    
    Route::get('/penulis/post/recyclebin', [PostController::class, 'recyclebin'])->name('penulis.post.recyclebin');
    Route::get('/penulis/post/restore/{id}', [PostController::class, 'restore'])->name('penulis.post.restore');
    Route::delete('/penulis/post/deletepermanently/{id}', [PostController::class, 'deletePermanently'])->name('penulis.post.deletepermanently');
    Route::get('/penulis/post', [PostController::class, 'index'])->name('penulis.post.index');
    Route::get('/penulis/post/create', [PostController::class, 'create'])->name('penulis.post.create');
    Route::post('/penulis/post/store', [PostController::class, 'store'])->name('penulis.post.store');
    Route::get('/penulis/post/edit/{id}', [PostController::class, 'edit'])->name('penulis.post.edit');
    Route::put('/penulis/post/update/{id}', [PostController::class, 'update'])->name('penulis.post.update');
    Route::delete('/penulis/post/destroy/{id}', [PostController::class, 'destroy'])->name('penulis.post.destroy');
    
    Route::get('/penulis/pengumuman/recyclebin', [PengumumanController::class, 'recyclebin'])->name('penulis.pengumuman.recyclebin');
    Route::get('/penulis/pengumuman/restore/{id}', [PengumumanController::class, 'restore'])->name('penulis.pengumuman.restore');
    Route::delete('/penulis/pengumuman/deletepermanently/{id}', [PengumumanController::class, 'deletePermanently'])->name('penulis.pengumuman.deletepermanently');
    Route::get('/penulis/pengumuman', [PengumumanController::class, 'index'])->name('penulis.pengumuman.index');
    Route::get('/penulis/pengumuman/create', [PengumumanController::class, 'create'])->name('penulis.pengumuman.create');
    Route::post('/penulis/pengumuman/store', [PengumumanController::class, 'store'])->name('penulis.pengumuman.store');
    Route::get('/penulis/pengumuman/edit/{id}', [PengumumanController::class, 'edit'])->name('penulis.pengumuman.edit');
    Route::put('/penulis/pengumuman/update/{id}', [PengumumanController::class, 'update'])->name('penulis.pengumuman.update');
    Route::delete('/penulis/pengumuman/destroy/{id}', [PengumumanController::class, 'destroy'])->name('penulis.pengumuman.destroy');

    Route::get('/penulis/gallery', [GalleryController::class, 'index'])->name('penulis.gallery.index');
    Route::get('/penulis/gallery/create', [GalleryController::class, 'create'])->name('penulis.gallery.create');
    Route::post('/penulis/gallery/store', [GalleryController::class, 'store'])->name('penulis.gallery.store');
    Route::get('/penulis/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('penulis.gallery.edit');
    Route::put('/penulis/gallery/update/{id}', [GalleryController::class, 'update'])->name('penulis.gallery.update');
    Route::delete('/penulis/gallery/destroy/{id}', [GalleryController::class, 'destroy'])->name('penulis.gallery.destroy');

    Route::get('/penulis/account', [UserController::class, 'index'])->name('penulis.account');
    Route::put('/penulis/account/update/{id}', [UserController::class, 'update'])->name('penulis.account.update');
});