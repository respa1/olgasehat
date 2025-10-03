<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return view('frontend.home');});

// frontend publik
Route::get('/blog-news', fn() => view('frontend.blog_news'));
Route::get('/blog-news-detail', fn() => view('frontend.blog_news_detail'));
Route::get('/club', fn() => view('frontend.club'));
Route::get('/club-detail', fn() => view('frontend.club_detail'));
Route::get('/community', fn() => view('frontend.community'));
Route::get('/community-detail', fn() => view('frontend.community_detail'));
Route::get('/confirm', fn() => view('frontend.confirm'));
Route::get('/payment', fn() => view('frontend.payment'));
Route::get('/success', fn() => view('frontend.success'));
Route::get('/venue', fn() => view('frontend.venue'));
Route::get('/venue-detail', fn() => view('frontend.venue_detail'));

// frontend user
Route::get('/daftaruser', function () { return view('frontend.daftaruser');});
Route::get('/editprofile', function () { return view('frontend.editprofile');});
Route::get('/riwayat komunitas', function () {return view('frontend.riwayatkomunitas');});
Route::get('/riwayatclub', function () {return view('frontend.riwayatclub');});
Route::get('/riwayatpayment', function () {return view('frontend.riwayatpayment');});
Route::get('/loginpengelolavenue', function () { return view('frontend.loginpengelolavenue');});
Route::get('/regispengelola', function () {return view('frontend.regispengelola');});
Route::get('/isidata', function () {return view('frontend.isidata');});
Route::get('/loginuser', function () {return view('frontend.loginuser');});
Route::get('/registeremail', function () {return view('frontend.registeremail');});
Route::get('/loginemail', function () { return view('frontend.loginemail');});
Route::get('/resetpassword', function () {return view('frontend.resetpassword'); });

// backend

// ownervenue

// ownerhealth