<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// halaman utama
Route::get('/', fn() => view('frontend.home'));

// Authentication Routes
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/loginproses', 'loginproses')->name('loginproses');
    Route::post('/logout', 'logout')->name('logout');
});

// Public Frontend Routes
// frontend publik
Route::get('/blog-news', fn() => view('frontend.blog_news'));
Route::get('/blog-news-detail', fn() => view('frontend.blog_news_detail'));
Route::get('/club', fn() => view('frontend.club'));
Route::get('/club-detail', fn() => view('frontend.club_detail'));
Route::get('/community', fn() => view('frontend.community'));
Route::get('/community-detail', fn() => view('frontend.community_detail'));
Route::get('/confirm', fn() => view('frontend.confirm'));
Route::get('/daftar-pemilik', fn() => view('frontend.daftar_pemilik'));
Route::get('/daftar-pemilik-detail', fn() => view('frontend.daftar_pemilik_detail'));
Route::get('/login-pemilik', fn() => view('frontend.login_pemilik'));
Route::get('/payment', fn() => view('frontend.payment'));
Route::get('/success', fn() => view('frontend.success'));
Route::get('/venue', fn() => view('frontend.venue'));
Route::get('/venue-detail', fn() => view('frontend.venue_detail'));

// public frontend user
Route::get('/daftaruser', function () { return view('frontend.daftaruser');});
Route::get('/editprofile', function () { return view('frontend.editprofile');});
Route::get('/riwayat komunitas', function () {return view('frontend.riwayatkomunitas');});
Route::get('/riwayatclub', function () {return view('frontend.riwayatclub');});
Route::get('/riwayatpayment', function () {return view('frontend.riwayatpayment');});
Route::get('/registeremail', function () {return view('frontend.registeremail');});
Route::get('/loginemail', function () { return view('frontend.loginemail');});
Route::get('/resetpassword', function () {return view('frontend.resetpassword'); });

// login pengelola
Route::get('/loginpengelolavenue', function () { return view('pemiliklapangan.loginpengelolavenue');});
Route::get('/regispengelola', function () {return view('pemiliklapangan.regispengelola');});
Route::get('/isidata', function () {return view('pemiliklapangan.isidata');});
Route::get('/loginuser', function () {return view('frontend.loginuser');});

// Protected Backoffice Routes
Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

//backend
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::get('/galeri', [GaleriController::class, 'galeri'])->name('galeri');
Route::get('/tambahgaleri',[GaleriController::class, 'tambahgaleri'])->name('tambahgaleri');
Route::post('/insertgaleri',[GaleriController::class, 'insertgaleri'])->name('insertgaleri');
Route::get('/tampilkangaleri/{id}',[GaleriController::class, 'tampilkangaleri'])->name('tampilkangaleri');
Route::post('/updategaleri/{id}',[GaleriController::class, 'updategaleri'])->name('updategaleri');
Route::get('/deletegaleri/{id}',[GaleriController::class, 'deletegaleri'])->name('deletegaleri');
// ## NEWS ## //
Route::get('/newss',[BeritaController::class, 'newss'])->name('newss');
Route::get('/tambahdata',[BeritaController::class, 'tambahdata'])->name('tambahdata');
Route::post('/insertdata',[BeritaController::class, 'insertdata'])->name('insertdata');
Route::get('/tampilkandata/{id}',[BeritaController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}',[BeritaController::class, 'updatedata'])->name('updatedata');
Route::get('/deletenews/{id}',[BeritaController::class, 'deletenews'])->name('deletenews');
Route::get('/exportpdf',[BeritaController::class, 'exportpdf'])->name('exportpdf');
// ## RIVIEW ## //
Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
Route::get('/tambah_review', [ReviewController::class, 'create'])->name('review.create');
Route::post('/simpan_review', [ReviewController::class, 'store'])->name('review.store');
Route::get('/edit_review/{id}', [ReviewController::class, 'edit'])->name('review.edit');
Route::put('/update_review/{id}', [ReviewController::class, 'update'])->name('review.update');
Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');
// ## CATEGORY ## //
Route::get('/category', [CategoryController::class, 'category'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
// ## PROGRAM ## //
Route::get('/programs',[ProgramController::class, 'programs'])->name('programs');
Route::get('/tambahprogram',[ProgramController::class, 'tambahprogram'])->name('tambahprogram');
Route::post('/insertprogram',[ProgramController::class, 'insertprogram'])->name('insertprogram');
Route::get('/tampilkanprogram/{id}',[ProgramController::class, 'tampilkanprogram'])->name('tampilkanprogram');
Route::post('/updateprogram/{id}',[ProgramController::class, 'updateprogram'])->name('updateprogram');
Route::get('/deleteprogram/{id}',[ProgramController::class, 'deleteprogram'])->name('deleteprogram');
// ## ACCOUNT ## //
Route::get('/akun', [LoginController::class, 'akun'])->name('akun');
Route::get('/add', [LoginController::class, 'add'])->name('add');
Route::post('/insertacc',[LoginController::class, 'insertacc'])->name('insertacc');
Route::get('/tampilkanacc/{id}', [LoginController::class, 'tampilkanacc'])->name('tampilkanacc');
Route::post('/updateacc/{id}', [LoginController::class, 'updateacc'])->name('updateacc');
Route::delete('/deleteacc/{id}', [LoginController::class, 'deleteacc'])->name('deleteacc');

});

//ownervenue

//ownerhealth