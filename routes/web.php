<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\halaman_pengajuan_mhs_controller;
use App\Http\Controllers\pengajuan_dosen;
use App\Http\Controllers\monitoring_mahasiswa;
use App\Http\Controllers\monitoring_dosen;
use App\Http\Controllers\proposal_mhs;
use App\Http\Controllers\proposal_dsn;
use App\Http\Controllers\form_dsn;
use App\Http\Controllers\form_mhs;
use App\Http\Controllers\loginController;
use App\Http\Controllers\form_admin;



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
    return view('login.dashboard_login');
});

Route::post('/loginUser', [loginController::class, 'auth'])->name('loginUser.auth');

Route::post('/logout', [loginController::class, 'logout'])->name('loginUser.logout');


Route::middleware([
    'dosen'
])->group(function () {
    Route::resource('dosen/proposal_dosen', proposal_dsn::class);
    Route::resource('/dosen/monitoring_dosen', monitoring_dosen::class);
    Route::resource('/dosen/pengajuan_dosen', pengajuan_dosen::class);
    Route::get('/dosen', function () {
        return view('/dosen.main_dsn');
    });
});

Route::middleware([
    'mahasiswa'
])->group(function () {
    Route::resource('/mahasiswa/pengajuan_mahasiswa', halaman_pengajuan_mhs_controller::class);
    Route::resource('/mahasiswa/monitoring_mahasiswa', monitoring_mahasiswa::class);
    Route::resource('/mahasiswa/proposal_mahasiswa', proposal_mhs::class);
    Route::get('/mahasiswa', function () {
        return view('mahasiswa.main_mhs');
    });
});

Route::middleware([
    'admin'
])->group(function () {
    Route::resource('/register/dosen', form_dsn::class);
    Route::resource('/register/mahasiswa', form_mhs::class);
    Route::resource('/register/admin', form_admin::class);
    Route::get('/admin', function () {
        return view('admin.main_admin');
    });
});
