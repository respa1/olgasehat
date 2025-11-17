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
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\AboutUsController;

// ======================================================
// PUBLIC ROUTES (No Authentication Required)
// ======================================================
Route::get('/', function() {
    $programs = \App\Models\Program::orderBy('created_at', 'desc')->get();
    $homeBanners = \App\Models\Galeri::where('kategori', 'home_banner')
                                      ->orderBy('urutan', 'asc')
                                      ->orderBy('created_at', 'desc')
                                      ->limit(4)
                                      ->get();
    $lapanganBanners = \App\Models\Galeri::where('kategori', 'lapangan_banner')
                                         ->orderBy('urutan', 'asc')
                                         ->orderBy('created_at', 'desc')
                                         ->limit(4)
                                         ->get();
    $kesehatanBanners = \App\Models\Galeri::where('kategori', 'kesehatan_banner')
                                           ->orderBy('urutan', 'asc')
                                           ->orderBy('created_at', 'desc')
                                           ->limit(4)
                                           ->get();
    return view('FRONTEND.home', compact('programs', 'homeBanners', 'lapanganBanners', 'kesehatanBanners'));
});

Route::get('/tentang', fn() => view('FRONTEND.tentang'))->name('tentang');
Route::get('/blog-news', [BeritaController::class, 'index'])->name('frontend.blog-news');
Route::get('/blog-news-detail/{id}', [BeritaController::class, 'show'])->name('frontend.blog-news-detail');
Route::get('/membership-detail', fn() => view('FRONTEND.membership_detail'));
Route::get('/community', [App\Http\Controllers\ActivityController::class, 'index'])->name('community');
Route::get('/community-detail/{id}', [App\Http\Controllers\ActivityController::class, 'showDetail'])->name('community.detail');
Route::get('/confirm', fn() => view('FRONTEND.confirm'));
Route::get('/daftar-pemilik', fn() => view('FRONTEND.daftar_pemilik'));
Route::get('/daftar-pemilik-detail', fn() => view('FRONTEND.daftar_pemilik_detail'));
Route::get('/login-pemilik', fn() => view('FRONTEND.login_pemilik'));
Route::get('/payment', fn() => view('FRONTEND.payment'));
Route::get('/success', fn() => view('FRONTEND.success'));
Route::get('/venue', [App\Http\Controllers\VenueFrontendController::class, 'index'])->name('frontend.venue');
Route::get('/healthy', fn() => view('FRONTEND.healthy'));
Route::get('/venue-detail/{id}', [App\Http\Controllers\VenueFrontendController::class, 'show'])->name('frontend.venue.detail');
Route::get('/venue-detail/{id}/slots', [App\Http\Controllers\VenueFrontendController::class, 'getSlots'])->name('frontend.venue.slots');
Route::get('/venue/search', [App\Http\Controllers\VenueFrontendController::class, 'search'])->name('frontend.venue.search');
Route::get('/venue/categories', [App\Http\Controllers\VenueFrontendController::class, 'getCategories'])->name('frontend.venue.categories');
Route::get('/venue/filter', [App\Http\Controllers\VenueFrontendController::class, 'filter'])->name('frontend.venue.filter');
Route::get('/klinik', fn() => view('FRONTEND.klinik'));
Route::get('/venue-management', fn() => view('FRONTEND.venue_management'))->name('venue.management');
Route::get('/health-management', fn() => view('FRONTEND.health_management'))->name('health.management');

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
Route::get('/venueuser', [App\Http\Controllers\VenueFrontendController::class, 'index'])->name('user.venue');
Route::get('/venueuser_detail/{id}', [App\Http\Controllers\VenueFrontendController::class, 'show'])->name('user.venue.detail');
Route::get('/buat-aktivitas', fn() => view('user.user_buat_aktivitas'));
Route::post('/buat-aktivitas', [App\Http\Controllers\ActivityController::class, 'storeFromUser'])->name('activities.store.user');
Route::get('/communityuser', [App\Http\Controllers\ActivityController::class, 'indexUser'])->name('user.community');
Route::get('/communityuser_detail/{id}', [App\Http\Controllers\ActivityController::class, 'showUser'])->name('user.community.detail');
Route::get('/bloguser_news', [BeritaController::class, 'indexUser'])->name('user.bloguser_news');
Route::get('/bloguser_detail/{id}', [BeritaController::class, 'showUser'])->name('user.bloguser_detail');
Route::get('/confirmuser', function () {return view('user.confirmuser'); });
Route::get('/paymentuser', function () {return view('user.paymentuser'); });
Route::get('/success_user', function () {return view('user.success_user'); });



Route::get('/edit-profile-user', fn() => view('user.editprofile_user'));
Route::get('/riwayat-komunitas', [App\Http\Controllers\ActivityController::class, 'riwayatKomunitas'])->name('user.riwayat-komunitas');
Route::get('/riwayat-komunitas/{id}/edit', [App\Http\Controllers\ActivityController::class, 'editUserActivity'])->name('user.aktivitas.edit');
Route::put('/riwayat-komunitas/{id}', [App\Http\Controllers\ActivityController::class, 'updateUserActivity'])->name('user.aktivitas.update');
Route::get('/riwayatmembership', fn() => view('user.riwayatmembership'));
Route::get('/riwayatpayment', fn() => view('user.riwayatpayment'));
Route::get('/registeremail', fn() => view('user.registeremail'));
Route::get('/loginemail', fn() => view('user.loginemail'));
Route::get('/resetpassword', fn() => view('user.resetpassword'));
Route::get('/homeuser', function() {
    $programs = \App\Models\Program::orderBy('created_at', 'desc')->get();
    $homeBanners = \App\Models\Galeri::where('kategori', 'home_banner')
                                      ->orderBy('urutan', 'asc')
                                      ->orderBy('created_at', 'desc')
                                      ->limit(4)
                                      ->get();
    $lapanganBanners = \App\Models\Galeri::where('kategori', 'lapangan_banner')
                                         ->orderBy('urutan', 'asc')
                                         ->orderBy('created_at', 'desc')
                                         ->limit(4)
                                         ->get();
    $kesehatanBanners = \App\Models\Galeri::where('kategori', 'kesehatan_banner')
                                           ->orderBy('urutan', 'asc')
                                           ->orderBy('created_at', 'desc')
                                           ->limit(4)
                                           ->get();
    $activities = \App\Models\Activity::where('status', 'approved')
                                      ->orderBy('created_at', 'desc')
                                      ->limit(3)
                                      ->get();
    return view('user.homeuser', compact('programs', 'homeBanners', 'lapanganBanners', 'kesehatanBanners', 'activities'));
});
// Route venueuser sudah diupdate di atas menggunakan controller
Route::get('/membership-user-detail', fn() => view('user.membershipuser_detail'));
Route::get('/healthyuser', fn() => view('user.healthyuser'));
Route::get('/venue_management_user', fn() => view('user.venue_management_user'));
Route::get('/tentang_user', fn() => view('user.tentang_user'));
// ======================================================
// PEMILIK / MITRA ROUTES
// ======================================================
Route::get('/loginpengelolavenue', fn() => view('pemiliklapangan.loginpengelolavenue'));
Route::get('/regispengelola', fn() => view('pemiliklapangan.regispengelola'));
Route::get('/isidata', [App\Http\Controllers\MitraController::class, 'create'])->name('mitra.create');
Route::post('/isidata', [App\Http\Controllers\MitraController::class, 'store'])->name('mitra.store');

Route::middleware(['auth', 'role:pemiliklapangan'])->group(function () {
    Route::get('/pemiliklapangan/dashboard', fn() => view('pemiliklapangan.Dashboard.dashboard'));
    Route::get('/pemiliklapangan/analytics', fn() => view('pemiliklapangan.Analytics.index'))->name('pemilik.analytics');
    Route::get('/analytics', fn() => view('pemiliklapangan.Analytics.index'))->name('pemilik.analytics.short');
    Route::get('/pemiliklapangan/komunitas', fn() => view('pemiliklapangan.pemilik_buat_komunitas'))->name('pemilik.komunitas');
    Route::post('/pemiliklapangan/komunitas', [App\Http\Controllers\ActivityController::class, 'storeFromPemilik'])->name('activities.store.pemilik');
    Route::get('/pemiliklapangan/membership', fn() => view('pemiliklapangan.pemilik_buat_membership'))->name('pemilik.membership');
    Route::get('/pemiliklapangan/event', fn() => view('pemiliklapangan.pemilik_buat_event'))->name('pemilik.event');
    // Route untuk proses pendaftaran venue
    Route::get('/informasi', [PendaftaranController::class, 'informasi'])->name('informasi');
    Route::post('/insertinform', [PendaftaranController::class, 'insertinform'])->name('insertinform');

    // Route detail - GET untuk menampilkan form, POST untuk menyimpan
    Route::get('/detail/{id?}', [PendaftaranController::class, 'detail'])->name('detail');
    Route::post('/insertdetail', [PendaftaranController::class, 'insertdetail'])->name('insertdetail');

    Route::get('/syarat', [PendaftaranController::class, 'syarat'])->name('syarat');
    Route::get('/end', [PendaftaranController::class, 'end'])->name('end');
    Route::get('/fasilitas/venue/{venue}/lapangan/{lapangan}/jadwal', [PendaftaranController::class, 'showLapanganSchedule'])->name('fasilitas.lapangan.jadwal');

    // Route untuk halaman fasilitas
    Route::get('/fasilitas', [PendaftaranController::class, 'venue'])->name('fasilitas');
    Route::get('/fasilitas/venue/{id}', [PendaftaranController::class, 'showVenue'])->name('fasilitas.detail');
    Route::get('/fasilitas/venue/{id}/edit', [PendaftaranController::class, 'editVenue'])->name('fasilitas.edit');
    Route::post('/fasilitas/venue/{id}/update', [PendaftaranController::class, 'updateVenue'])->name('fasilitas.update');
    Route::post('/fasilitas/venue/{id}/lapangan', [PendaftaranController::class, 'storeLapangan'])->name('fasilitas.lapangan.store');
    Route::get('/fasilitas/venue/{venue}/lapangan/{lapangan}/jadwal', [PendaftaranController::class, 'showLapanganSchedule'])->name('fasilitas.lapangan.jadwal');
    Route::get('/fasilitas/venue/{venue}/lapangan/{lapangan}/jadwal/api', [PendaftaranController::class, 'getSlotsByDate'])->name('fasilitas.lapangan.jadwal.api');
    Route::post('/fasilitas/venue/{venue}/lapangan/{lapangan}/jadwal', [PendaftaranController::class, 'storeLapanganSlot'])->name('fasilitas.lapangan.jadwal.store');
    Route::post('/fasilitas/venue/{venue}/lapangan/{lapangan}/jadwal/bulk', [PendaftaranController::class, 'storeBulkLapanganSlots'])->name('fasilitas.lapangan.jadwal.bulk');
    Route::get('/fasilitas/venue/{venue}/lapangan/{lapangan}/jadwal/{slot}/edit', [PendaftaranController::class, 'editLapanganSlot'])->name('fasilitas.lapangan.jadwal.edit');
    Route::put('/fasilitas/venue/{venue}/lapangan/{lapangan}/jadwal/{slot}', [PendaftaranController::class, 'updateLapanganSlot'])->name('fasilitas.lapangan.jadwal.update');
    Route::delete('/fasilitas/venue/{venue}/lapangan/{lapangan}/jadwal/{slot}', [PendaftaranController::class, 'deleteLapanganSlot'])->name('fasilitas.lapangan.jadwal.delete');
    Route::get('/papan', [PendaftaranController::class, 'papan'])->name('papan');
    Route::get('/pemiliklapangan/promo', [PendaftaranController::class, 'promo'])->name('pemilik.promo');
    
    Route::prefix('keuangan')->group(function () {
        Route::get('/fasilitas', fn() => view('pemiliklapangan.Keuangan.fasilitas'))->name('keuangan.fasilitas');
        Route::get('/komunitas', fn() => view('pemiliklapangan.Keuangan.komunitas'))->name('keuangan.komunitas');
        Route::get('/membership', fn() => view('pemiliklapangan.Keuangan.membership'))->name('keuangan.membership');
        Route::get('/event', fn() => view('pemiliklapangan.Keuangan.event'))->name('keuangan.event');
    });
    Route::get('/pemiliklapangan/pengaturan', [App\Http\Controllers\MitraController::class, 'pengaturan'])->name('pemilik.pengaturan');
    Route::post('/pemiliklapangan/pengaturan/update', [App\Http\Controllers\MitraController::class, 'updatePengaturan'])->name('pemilik.pengaturan.update');
        
    });

// ======================================================
// PENGELOLA KESEHATAN ROUTES
// ======================================================
Route::get('/loginpengelolakesehatan', fn() => view('pemilikkesehatan.loginpengelolakesehatan'));
Route::get('/regispengelolakesehatan', fn() => view('pemilikkesehatan.regispengelolakesehatan'));
Route::get('/isidatakesehatan', [App\Http\Controllers\PengelolaKesehatanController::class, 'create'])->name('pengelolakesehatan.create');
Route::post('/isidatakesehatan', [App\Http\Controllers\PengelolaKesehatanController::class, 'store'])->name('pengelolakesehatan.store');

Route::middleware(['auth', 'role:pengelolakesehatan'])->group(function () {
    Route::get('/pengelolakesehatan/dashboard', fn() => view('pemilikkesehatan.Dashboard.dashboard'))->name('pengelolakesehatan.dashboard');
    Route::get('/pengelolakesehatan/analytics', fn() => view('pemilikkesehatan.Analytics.index'))->name('pengelolakesehatan.analytics');
    Route::get('/pengelolakesehatan/pengaturan', [App\Http\Controllers\PengelolaKesehatanController::class, 'pengaturan'])->name('pengelolakesehatan.pengaturan');
    Route::post('/pengelolakesehatan/pengaturan/update', [App\Http\Controllers\PengelolaKesehatanController::class, 'updatePengaturan'])->name('pengelolakesehatan.pengaturan.update');
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
        Route::get('/galeri/home-banner', [GaleriController::class, 'homeBanner'])->name('galeri.home-banner');
        Route::get('/galeri/lapangan-banner', [GaleriController::class, 'lapanganBanner'])->name('galeri.lapangan-banner');
        Route::get('/galeri/kesehatan-banner', [GaleriController::class, 'kesehatanBanner'])->name('galeri.kesehatan-banner');
        Route::get('/galeri/venue-banner', [GaleriController::class, 'venueBanner'])->name('galeri.venue-banner');
        Route::get('/tambahgaleri/{kategori}', [GaleriController::class, 'tambahgaleri'])->name('tambahgaleri.kategori');
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
        Route::get('/verifikasi-mitra/{id}', [App\Http\Controllers\MitraController::class, 'show'])->name('mitra.show');
        Route::delete('/verifikasi-mitra/{id}', [App\Http\Controllers\MitraController::class, 'destroy'])->name('mitra.destroy');

        // MANAJEMEN USER (ADMIN)
        Route::get('/users', [AdminController::class, 'listUsers'])->name('admin.users.list');
        Route::get('/users/{id}', [AdminController::class, 'showUser'])->name('admin.users.show');
        Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

        // MANAJEMEN VENUE (ADMIN)
        Route::get('/data-venue', [App\Http\Controllers\AdminController::class, 'listVenue'])->name('admin.venue.list');
        Route::get('/data-venue/{id}', [App\Http\Controllers\AdminController::class, 'showVenue'])->name('admin.venue.show');
        Route::get('/data-venue/{id}/edit', [App\Http\Controllers\AdminController::class, 'editVenue'])->name('admin.venue.edit');
        Route::put('/data-venue/{id}', [App\Http\Controllers\AdminController::class, 'updateVenue'])->name('admin.venue.update');
        Route::put('/data-venue/{id}/verify', [App\Http\Controllers\AdminController::class, 'verifyVenue'])->name('admin.venue.verify');
        Route::put('/data-venue/{id}/reject', [App\Http\Controllers\AdminController::class, 'rejectVenue'])->name('admin.venue.reject');
        Route::delete('/data-venue/{id}', [App\Http\Controllers\AdminController::class, 'deleteVenue'])->name('admin.venue.delete');

        // TEMPAT SEHAT (Pengelola Kesehatan)
        Route::get('/tempat-sehat', [App\Http\Controllers\TempatSehatController::class, 'index'])->name('tempat-sehat.index');
        Route::get('/tempat-sehat/{id}', [App\Http\Controllers\TempatSehatController::class, 'show'])->name('tempat-sehat.show');
        Route::put('/tempat-sehat/{id}/verify', [App\Http\Controllers\TempatSehatController::class, 'verify'])->name('tempat-sehat.verify');
        Route::delete('/tempat-sehat/{id}', [App\Http\Controllers\TempatSehatController::class, 'destroy'])->name('tempat-sehat.destroy');


        // ACTIVITY TYPES
        Route::resource('activity-types', ActivityTypeController::class);
        Route::get('activity-types-daftar', [App\Http\Controllers\ActivityController::class, 'daftar'])->name('activity-types.daftar');
        
        // ACTIVITIES (Verifikasi)
        Route::get('activities/{id}', [App\Http\Controllers\ActivityController::class, 'show'])->name('activities.show');
        Route::put('activities/{id}/approve', [App\Http\Controllers\ActivityController::class, 'approve'])->name('activities.approve');
        Route::put('activities/{id}/reject', [App\Http\Controllers\ActivityController::class, 'reject'])->name('activities.reject');

        // EXTRA - SOCIAL MEDIA
        Route::get('/social-media', [SocialMediaController::class, 'index'])->name('social-media.index');
        Route::get('/social-media/create', [SocialMediaController::class, 'create'])->name('social-media.create');
        Route::post('/social-media', [SocialMediaController::class, 'store'])->name('social-media.store');
        Route::get('/social-media/{id}/edit', [SocialMediaController::class, 'edit'])->name('social-media.edit');
        Route::put('/social-media/{id}', [SocialMediaController::class, 'update'])->name('social-media.update');
        Route::delete('/social-media/{id}', [SocialMediaController::class, 'destroy'])->name('social-media.destroy');

        // EXTRA - CONTACT US
        Route::get('/contact', [ContactUsController::class, 'index'])->name('contact-us.index');
        Route::get('/contact/create', [ContactUsController::class, 'create'])->name('contact-us.create');
        Route::post('/contact', [ContactUsController::class, 'store'])->name('contact-us.store');
        Route::get('/contact/{id}/edit', [ContactUsController::class, 'edit'])->name('contact-us.edit');
        Route::put('/contact/{id}', [ContactUsController::class, 'update'])->name('contact-us.update');
        Route::delete('/contact/{id}', [ContactUsController::class, 'destroy'])->name('contact-us.destroy');

        // EXTRA - ABOUT US
        Route::get('/about', [AboutUsController::class, 'index'])->name('about-us.index');
        Route::get('/about/create', [AboutUsController::class, 'create'])->name('about-us.create');
        Route::post('/about', [AboutUsController::class, 'store'])->name('about-us.store');
        Route::get('/about/{id}/edit', [AboutUsController::class, 'edit'])->name('about-us.edit');
        Route::put('/about/{id}', [AboutUsController::class, 'update'])->name('about-us.update');
        Route::delete('/about/{id}', [AboutUsController::class, 'destroy'])->name('about-us.destroy');

        // PAPAN JADWAL

    });
});

