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
    Route::post('/userlogout', 'userLogout')->name('user.logout');
});

// Protected Backoffice Routes
Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

    // User profile edit routes protected by role:user middleware
    Route::middleware(['role:user'])->group(function () {
        Route::get('/editprofile', [LoginController::class, 'editProfile'])->name('editprofile');
        Route::post('/editprofile', [LoginController::class, 'updateProfile'])->name('updateprofile');
    });
});

// Authentication Routes
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/loginproses', 'loginproses')->name('loginproses');
    Route::post('/logout', 'logout')->name('logout');

    // User registration
    Route::get('/registeruser', 'registerUserForm')->name('registeruser.form');
    Route::post('/registeruser', 'registerUser')->name('registeruser.submit');

    // Pemilik Lapangan registration
    Route::get('/registerpemilik', 'registerPemilikForm')->name('registerpemilik.form');
    Route::post('/registerpemilik', 'registerPemilik')->name('registerpemilik.submit');
});

// Public Frontend Routes
// frontend publik
Route::get('/blog-news', fn() => view('frontend.blog-news'));
Route::get('/blog-news-detail', fn() => view('frontend.blog_news_detail'));
Route::get('/membership-detail', fn() => view('frontend.membership_detail'));
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

// frontend user
Route::get('/daftaruser', [LoginController::class, 'registerUserForm'])->name('user.register.form');
Route::post('/daftaruser', [LoginController::class, 'registerUser'])->name('user.register.submit');

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/editprofile', [LoginController::class, 'editProfile'])->name('user.editprofile');
    Route::post('/editprofile', [LoginController::class, 'updateProfile'])->name('user.updateprofile');
});
Route::get('/riwayat komunitas', function () {return view('user.riwayatkomunitas');});
Route::get('/riwayatclub', function () {return view('user.riwayatclub');});
Route::get('/riwayatpayment', function () {return view('user.riwayatpayment');});
Route::get('/registeremail', function () {return view('user.registeremail');});
Route::get('/loginemail', function () { return view('user.loginemail');});
Route::get('/resetpassword', function () {return view('user.resetpassword'); });

// login pengelola
Route::get('/loginpengelolavenue', function () { return view('pemiliklapangan.loginpengelolavenue');});
Route::get('/regispengelola', function () {return view('pemiliklapangan.regispengelola');});
Route::get('/isidata', [App\Http\Controllers\MitraController::class, 'create'])->name('mitra.create');
Route::post('/isidata', [App\Http\Controllers\MitraController::class, 'store'])->name('mitra.store');
Route::get('/loginuser', function () {return view('user.loginuser');});

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

// ## VERIFIKASI MITRA ## //
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/verifikasi-mitra', [App\Http\Controllers\MitraController::class, 'index'])->name('mitra.index');
    Route::put('/verifikasi-mitra/{id}', [App\Http\Controllers\MitraController::class, 'verify'])->name('mitra.verify');

    // New route for datapemiliklapangan view
    Route::get('/datapemiliklapangan', [App\Http\Controllers\MitraController::class, 'index'])->name('mitra.datapemiliklapangan');
});

});

Route::get('/pemiliklapangan/dashboard', function () {
    return view('pemiliklapangan.Dashboard.dashboard');
});

//ownervenue

//ownerhealth
