<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\halaman_pengajuan_mhs_controller;
use App\Http\Controllers\pengajuan_dosen;
use App\Http\Controllers\monitoring_mahasiswa;
use App\Http\Controllers\monitoring_dosen;

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

Route::get('/', function () {
    return view('login_register.dashboard_login');
});

Route::resource('/mahasiswa/pengajuan_mahasiswa', halaman_pengajuan_mhs_controller::class);

Route::resource('/dosen/pengajuan_dosen', pengajuan_dosen::class);

Route::resource('/mahasiswa/monitoring_mahasiswa', monitoring_mahasiswa::class);

Route::resource('/dosen/monitoring_dosen', monitoring_dosen::class);
