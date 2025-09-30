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

Route::get('/', function () { return view('welcome');});

// FRONTEND
Route::get('/daftaruser', function () { return view('FRONTEND.daftaruser');});
Route::get('/editprofile', function () { return view('FRONTEND.editprofile');});
Route::get('/riwayat komunitas', function () {return view('FRONTEND.riwayatkomunitas');});
Route::get('/riwayatclub', function () {return view('FRONTEND.riwayatclub');});
Route::get('/riwayatpayment', function () {return view('FRONTEND.riwayatpayment');});
Route::get('/loginpengelolavenue', function () { return view('FRONTEND.loginpengelolavenue');});
Route::get('/regispengelola', function () {return view('FRONTEND.regispengelola');});
Route::get('/isidata', function () {return view('FRONTEND.isidata');});
Route::get('/loginuser', function () {return view('FRONTEND.loginuser');});
Route::get('/registeremail', function () {return view('FRONTEND.registeremail');});
Route::get('/loginemail', function () { return view('FRONTEND.loginemail');});
Route::get('/resetpassword', function () {return view('FRONTEND.resetpassword'); });