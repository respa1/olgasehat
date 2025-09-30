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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/daftaruser', function () {
    return view('daftaruser');
});

Route::get('/editprofile', function () {
    return view('editprofile');
});
Route::get('/riwayat komunitas', function () {
    return view('riwayatkomunitas');
});
Route::get('/riwayatclub', function () {
    return view('riwayatclub');
});
Route::get('/riwayatpayment', function () {
    return view('riwayatpayment');
});
Route::get('/loginpengelolavenue', function () {
    return view('loginpengelolavenue');
});
Route::get('/regispengelola', function () {
    return view('regispengelola');
});
Route::get('/isidata', function () {
    return view('isidata');
});
Route::get('/loginuser', function () {
    return view('loginuser');
});
Route::get('/registeremail', function () {
    return view('registeremail');
});
Route::get('/loginemail', function () {
    return view('loginemail');
});
Route::get('/resetpassword', function () {
    return view('resetpassword');
});