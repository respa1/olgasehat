<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InformasiController;

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

// ================================
// PUBLIC ROUTES (No Authentication Required)
// ================================
Route::get('/', fn() => view('frontend.home'))->name('home');

// Public Frontend Routes
Route::get('/blog-news', fn() => view('frontend.blog-news'))->name('frontend.blog-news');
Route::get('/blog-news-detail', fn() => view('frontend.blog&news_detail'))->name('frontend.blog-news-detail');
Route::get('/membership-detail', fn() => view('frontend.membership_detail'))->name('frontend.membership-detail');
Route::get('/community', fn() => view('frontend.community'))->name('frontend.community');
Route::get('/community-detail', fn() => view('frontend.community_detail'))->name('frontend.community-detail');
Route::get('/confirm', fn() => view('frontend.confirm'))->name('frontend.confirm');
Route::get('/daftar-pemilik', fn() => view('frontend.daftar_pemilik'))->name('frontend.daftar-pemilik');
Route::get('/daftar-pemilik-detail', fn() => view('frontend.daftar_pemilik_detail'))->name('frontend.daftar-pemilik-detail');
Route::get('/login-pemilik', fn() => view('frontend.login_pemilik'))->name('frontend.login-pemilik');
Route::get('/payment', fn() => view('frontend.payment'))->name('frontend.payment');
Route::get('/success', fn() => view('frontend.success'))->name('frontend.success');
Route::get('/venue', fn() => view('frontend.venue'))->name('frontend.venue');
Route::get('/healthy', fn() => view('frontend.healthy'))->name('frontend.healthy');
Route::get('/venue-detail', fn() => view('frontend.venue_detail'))->name('frontend.venue-detail');

// ================================
// AUTHENTICATION ROUTES
// ================================
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/loginproses', 'loginproses')->name('loginproses');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/userlogout', 'userLogout')->name('user.logout');

    // User Registration
    Route::get('/registeruser', 'registerUserForm')->name('registeruser.form');
    Route::get('/daftaruser', 'registerUserForm')->name('user.register.form'); // Alias for consistency
    Route::post('/registeruser', 'registerUser')->name('registeruser.submit');
    Route::post('/daftaruser', 'registerUser')->name('user.register.submit'); // Alias

    // Pemilik Lapangan Registration
    Route::get('/registerpemilik', 'registerPemilikForm')->name('registerpemilik.form');
    Route::post('/registerpemilik', 'registerPemilik')->name('registerpemilik.submit');
});

// ================================
// USER ROUTES (Authenticated with role:user)
// ================================
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/editprofile', [LoginController::class, 'editProfile'])->name('user.editprofile');
    Route::post('/editprofile', [LoginController::class, 'updateProfile'])->name('user.updateprofile');
});

// User-specific views (assuming these require auth, but not role-specific; adjust if needed)
Route::middleware(['auth'])->group(function () {
    Route::get('/riwayatkomunitas', function () { return view('user.riwayatkomunitas'); })->name('user.riwayatkomunitas');
    Route::get('/riwayatclub', function () { return view('user.riwayatclub'); })->name('user.riwayatclub');
    Route::get('/riwayatpayment', function () { return view('user.riwayatpayment'); })->name('user.riwayatpayment');
    Route::get('/registeremail', function () { return view('user.registeremail'); })->name('user.registeremail');
    Route::get('/loginemail', function () { return view('user.loginemail'); })->name('user.loginemail');
    Route::get('/resetpassword', function () { return view('user.resetpassword'); })->name('user.resetpassword');
    Route::get('/homeuser', function () { return view('user.homeuser'); })->name('user.homeuser');
    Route::get('/venueuser', function () { return view('user.venueuser'); })->name('user.venueuser');
    Route::get('/venueuser_detail', function () { return view('user.venueuser_detail'); })->name('user.venueuser_detail');
    Route::get('/communityuser', function () { return view('user.communityuser'); })->name('user.communityuser');
    Route::get('/communityuser_detail', function () { return view('user.communityuser_detail'); })->name('user.communityuser_detail');
    Route::get('/bloguser_news', function () { return view('user.bloguser_news'); })->name('user.bloguser_news');
    Route::get('/bloguser_detail', function () { return view('user.bloguser_detail'); })->name('user.bloguser_detail');
    Route::get('/loginuser', function () { return view('user.loginuser'); })->name('user.loginuser');
});

// ================================
// PEMILIK LAPANGAN ROUTES (Authenticated with role:pemiliklapangan)
// ================================
Route::middleware(['auth', 'role:pemiliklapangan'])->group(function () {
    Route::get('/pemiliklapangan/dashboard', function () { return view('pemiliklapangan.Dashboard.dashboard'); })->name('pemilik.dashboard');

    // Mitra (Pemilik) Data Management
    Route::get('/isidata', [App\Http\Controllers\MitraController::class, 'create'])->name('mitra.create');
    Route::post('/isidata', [App\Http\Controllers\MitraController::class, 'store'])->name('mitra.store');

    // Informasi Routes (assuming for pemilik)
    Route::get('/informasi', [InformasiController::class, 'informasi'])->name('pemilik.informasi');
    Route::get('/detail', [InformasiController::class, 'detail'])->name('pemilik.detail');
    Route::get('/syarat', [InformasiController::class, 'syarat'])->name('pemilik.syarat');
    Route::get('/end', [InformasiController::class, 'end'])->name('pemilik.end');
});

// Pemilik Registration/Login Views (Public)
Route::get('/loginpengelolavenue', function () { return view('pemiliklapangan.loginpengelolavenue'); })->name('pemilik.login');
Route::get('/regispengelola', function () { return view('pemiliklapangan.regispengelola'); })->name('pemilik.register');

// ================================
// SUPERADMIN ROUTES (Authenticated with role:superadmin)
// ================================
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

    // Galeri Management
    Route::get('/galeri', [GaleriController::class, 'galeri'])->name('galeri');
    Route::get('/tambahgaleri', [GaleriController::class, 'tambahgaleri'])->name('tambahgaleri');
    Route::post('/insertgaleri', [GaleriController::class, 'insertgaleri'])->name('insertgaleri');
    Route::get('/tampilkangaleri/{id}', [GaleriController::class, 'tampilkangaleri'])->name('tampilkangaleri');
    Route::post('/updategaleri/{id}', [GaleriController::class, 'updategaleri'])->name('updategaleri');
    Route::get('/deletegaleri/{id}', [GaleriController::class, 'deletegaleri'])->name('deletegaleri');

    // News (Berita) Management
    Route::get('/newss', [BeritaController::class, 'newss'])->name('newss');
    Route::get('/tambahdata', [BeritaController::class, 'tambahdata'])->name('tambahdata');
    Route::post('/insertdata', [BeritaController::class, 'insertdata'])->name('insertdata');
    Route::get('/tampilkandata/{id}', [BeritaController::class, 'tampilkandata'])->name('tampilkandata');
    Route::post('/updatedata/{id}', [BeritaController::class, 'updatedata'])->name('updatedata');
    Route::get('/deletenews/{id}', [BeritaController::class, 'deletenews'])->name('deletenews');
    Route::get('/exportpdf', [BeritaController::class, 'exportpdf'])->name('exportpdf');

    // Review Management
    Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
    Route::get('/tambah_review', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/simpan_review', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/edit_review/{id}', [ReviewController::class, 'edit'])->name('review.edit');
    Route::put('/update_review/{id}', [ReviewController::class, 'update'])->name('review.update');
    Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');

    // Category Management
    Route::get('/category', [CategoryController::class, 'category'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Program Management
    Route::get('/programs', [ProgramController::class, 'programs'])->name('programs');
    Route::get('/tambahprogram', [ProgramController::class, 'tambahprogram'])->name('tambahprogram');
    Route::post('/insertprogram', [ProgramController::class, 'insertprogram'])->name('insertprogram');
    Route::get('/tampilkanprogram/{id}', [ProgramController::class, 'tampilkanprogram'])->name('tampilkanprogram');
    Route::post('/updateprogram/{id}', [ProgramController::class, 'updateprogram'])->name('updateprogram');
    Route::get('/deleteprogram/{id}', [ProgramController::class, 'deleteprogram'])->name('deleteprogram');

    // Account Management
    Route::get('/akun', [LoginController::class, 'akun'])->name('akun');
    Route::get('/add', [LoginController::class, 'add'])->name('add');
    Route::post('/insertacc', [LoginController::class, 'insertacc'])->name('insertacc');
    Route::get('/tampilkanacc/{id}', [LoginController::class, 'tampilkanacc'])->name('tampilkanacc');
    Route::post('/updateacc/{id}', [LoginController::class, 'updateacc'])->name('updateacc');
    Route::delete('/deleteacc/{id}', [LoginController::class, 'deleteacc'])->name('deleteacc');

    // Mitra Verification
    Route::get('/verifikasi-mitra', [App\Http\Controllers\MitraController::class, 'index'])->name('mitra.index');
    Route::put('/verifikasi-mitra/{id}', [App\Http\Controllers\MitraController::class, 'verify'])->name('mitra.verify');
    Route::get('/datapemiliklapangan', [App\Http\Controllers\MitraController::class, 'index'])->name('mitra.datapemiliklapangan');
});
