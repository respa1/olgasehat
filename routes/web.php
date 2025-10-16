<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ActivityTypeController;
use App\Http\Controllers\PendaftaranController;

// ======================================================
// PUBLIC ROUTES (No Authentication Required)
// ======================================================
Route::get('/', fn() => view('frontend.home'));

Route::get('/blog-news', fn() => view('frontend.blog-news'));
Route::get('/blog-news-detail', fn() => view('frontend.blog&news_detail'));
Route::get('/membership-detail', fn() => view('frontend.membership_detail'));
Route::get('/community', fn() => view('frontend.community'));
Route::get('/buat-aktivitas', fn() => view('frontend.buat_aktivitas_baru'));
Route::get('/community-detail', fn() => view('frontend.community_detail'));
Route::get('/confirm', fn() => view('frontend.confirm'));
Route::get('/daftar-pemilik', fn() => view('frontend.daftar_pemilik'));
Route::get('/daftar-pemilik-detail', fn() => view('frontend.daftar_pemilik_detail'));
Route::get('/login-pemilik', fn() => view('frontend.login_pemilik'));
Route::get('/payment', fn() => view('frontend.payment'));
Route::get('/success', fn() => view('frontend.success'));
Route::get('/venue', fn() => view('frontend.venue'));
Route::get('/healthy', fn() => view('frontend.healthy'));
Route::get('/venue-detail', fn() => view('frontend.venue_detail'));
Route::get('/klinik', fn() => view('frontend.klinik'));

// ======================================================
// AUTHENTICATION ROUTES
// ======================================================
Route::controller(LoginController::class)->group(function () {
    // Login & Logout
    Route::get('/login', 'login')->name('login');
    Route::post('/loginproses', 'loginproses')->name('loginproses');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/userlogout', 'userLogout')->name('user.logout');

    // User Registration
    Route::get('/loginuser', fn() => view('user.loginuser'));
    Route::get('/registeruser', 'registerUserForm')->name('registeruser.form');
    Route::post('/registeruser', 'registerUser')->name('registeruser.submit');

    // Pemilik Lapangan Registration
    Route::get('/registerpemilik', 'registerPemilikForm')->name('registerpemilik.form');
    Route::post('/registerpemilik', 'registerPemilik')->name('registerpemilik.submit');
});

// ======================================================
// USER ROUTES (Authenticated + Role: User)
// ======================================================
Route::get('/daftaruser', [LoginController::class, 'registerUserForm'])->name('user.register.form');
Route::post('/daftaruser', [LoginController::class, 'registerUser'])->name('user.register.submit');

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboarduser', [LoginController::class, 'editProfile'])->name('user.editprofile');
    Route::post('/editprofile', [LoginController::class, 'updateProfile'])->name('user.updateprofile');
});

Route::get('/riwayat komunitas', function () {return view('user.riwayatkomunitas');});
Route::get('/riwayatclub', function () {return view('user.riwayatclub');});
Route::get('/riwayatpayment', function () {return view('user.riwayatpayment');});
Route::get('/registeremail', function () {return view('user.registeremail');});
Route::get('/loginemail', function () { return view('user.loginemail');});
Route::get('/resetpassword', function () {return view('user.resetpassword'); });
Route::get('/homeuser', function () {return view('user.homeuser'); });
Route::get('/venueuser', function () {return view('user.venueuser'); });
Route::get('/venueuser_detail', function () {return view('user.venueuser_detail'); });
Route::get('/communityuser', function () {return view('user.communityuser'); });
Route::get('/communityuser_detail', function () {return view('user.communityuser_detail'); });
Route::get('/bloguser_news', function () {return view('user.bloguser_news'); });
Route::get('/bloguser_detail', function () {return view('user.bloguser_detail'); });
Route::get('/confirmuser', function () {return view('user.confirmuser'); });
Route::get('/paymentuser', function () {return view('user.paymentuser'); });
Route::get('/success_user', function () {return view('user.success_user'); });



Route::get('/edit-profile-user', fn() => view('user.editprofile_user'));
Route::get('/riwayat-komunitas', fn() => view('user.riwayatkomunitas'));
Route::get('/riwayatmembership', fn() => view('user.riwayatmembership'));
Route::get('/riwayatpayment', fn() => view('user.riwayatpayment'));
Route::get('/registeremail', fn() => view('user.registeremail'));
Route::get('/loginemail', fn() => view('user.loginemail'));
Route::get('/resetpassword', fn() => view('user.resetpassword'));
Route::get('/homeuser', fn() => view('user.homeuser'));
Route::get('/venueuser', fn() => view('user.venueuser'));
Route::get('/venueuser_detail', fn() => view('user.venueuser_detail'));
Route::get('/communityuser', fn() => view('user.communityuser'));
Route::get('/communityuser_detail', fn() => view('user.communityuser_detail'));
Route::get('/membership-user-detail', fn() => view('user.membershipuser_detail'));
Route::get('/bloguser_news', fn() => view('user.bloguser_news'));
Route::get('/bloguser_detail', fn() => view('user.bloguser_detail'));

// ======================================================
// PEMILIK / MITRA ROUTES
// ======================================================
Route::get('/loginpengelolavenue', fn() => view('pemiliklapangan.loginpengelolavenue'));
Route::get('/regispengelola', fn() => view('pemiliklapangan.regispengelola'));
Route::get('/isidata', [App\Http\Controllers\MitraController::class, 'create'])->name('mitra.create');
Route::post('/isidata', [App\Http\Controllers\MitraController::class, 'store'])->name('mitra.store');

Route::middleware(['auth', 'role:pemiliklapangan'])->group(function () {
    Route::get('/pemiliklapangan/dashboard', fn() => view('pemiliklapangan.Dashboard.dashboard'));
    Route::get('/informasi', [PendaftaranController::class, 'informasi'])->name('informasi');
    Route::get('/detail', [PendaftaranController::class, 'detail'])->name('detail');
    Route::get('/syarat', [PendaftaranController::class, 'syarat'])->name('syarat');
    Route::get('/end', [PendaftaranController::class, 'end'])->name('end');
});

// ======================================================
// SUPERADMIN / BACKOFFICE ROUTES (Authenticated + Role: Superadmin)
// ======================================================
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

    Route::middleware(['role:superadmin'])->group(function () {
        // Dashboard Admin
        Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

        // GALERI
        Route::get('/galeri', [GaleriController::class, 'galeri'])->name('galeri');
        Route::get('/tambahgaleri', [GaleriController::class, 'tambahgaleri'])->name('tambahgaleri');
        Route::post('/insertgaleri', [GaleriController::class, 'insertgaleri'])->name('insertgaleri');
        Route::get('/tampilkangaleri/{id}', [GaleriController::class, 'tampilkangaleri'])->name('tampilkangaleri');
        Route::post('/updategaleri/{id}', [GaleriController::class, 'updategaleri'])->name('updategaleri');
        Route::get('/deletegaleri/{id}', [GaleriController::class, 'deletegaleri'])->name('deletegaleri');

        // NEWS
        Route::get('/newss', [BeritaController::class, 'newss'])->name('newss');
        Route::get('/tambahdata', [BeritaController::class, 'tambahdata'])->name('tambahdata');
        Route::post('/insertdata', [BeritaController::class, 'insertdata'])->name('insertdata');
        Route::get('/tampilkandata/{id}', [BeritaController::class, 'tampilkandata'])->name('tampilkandata');
        Route::post('/updatedata/{id}', [BeritaController::class, 'updatedata'])->name('updatedata');
        Route::get('/deletenews/{id}', [BeritaController::class, 'deletenews'])->name('deletenews');
        Route::get('/exportpdf', [BeritaController::class, 'exportpdf'])->name('exportpdf');

        // REVIEW
        Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
        Route::get('/tambah_review', [ReviewController::class, 'create'])->name('review.create');
        Route::post('/simpan_review', [ReviewController::class, 'store'])->name('review.store');
        Route::get('/edit_review/{id}', [ReviewController::class, 'edit'])->name('review.edit');
        Route::put('/update_review/{id}', [ReviewController::class, 'update'])->name('review.update');
        Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');

        // CATEGORY
        Route::get('/category', [CategoryController::class, 'category'])->name('category.index');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

        // PROGRAM
        Route::get('/programs', [ProgramController::class, 'programs'])->name('programs');
        Route::get('/tambahprogram', [ProgramController::class, 'tambahprogram'])->name('tambahprogram');
        Route::post('/insertprogram', [ProgramController::class, 'insertprogram'])->name('insertprogram');
        Route::get('/tampilkanprogram/{id}', [ProgramController::class, 'tampilkanprogram'])->name('tampilkanprogram');
        Route::post('/updateprogram/{id}', [ProgramController::class, 'updateprogram'])->name('updateprogram');
        Route::get('/deleteprogram/{id}', [ProgramController::class, 'deleteprogram'])->name('deleteprogram');

        // ACCOUNT
        Route::get('/akun', [LoginController::class, 'akun'])->name('akun');
        Route::get('/add', [LoginController::class, 'add'])->name('add');
        Route::post('/insertacc', [LoginController::class, 'insertacc'])->name('insertacc');
        Route::get('/tampilkanacc/{id}', [LoginController::class, 'tampilkanacc'])->name('tampilkanacc');
        Route::post('/updateacc/{id}', [LoginController::class, 'updateacc'])->name('updateacc');
        Route::delete('/deleteacc/{id}', [LoginController::class, 'deleteacc'])->name('deleteacc');

        // VERIFIKASI MITRA
        Route::get('/verifikasi-mitra', [App\Http\Controllers\MitraController::class, 'index'])->name('mitra.index');
        Route::put('/verifikasi-mitra/{id}', [App\Http\Controllers\MitraController::class, 'verify'])->name('mitra.verify');
        Route::get('/datapemiliklapangan', [App\Http\Controllers\MitraController::class, 'index'])->name('mitra.datapemiliklapangan');


        // ACTIVITY TYPES
        Route::resource('activity-types', ActivityTypeController::class);
        Route::get('activity-types-daftar', [ActivityTypeController::class, 'daftar'])->name('activity-types.daftar');

        // PAPAN JADWAL

    });
});

