<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\MitraDashboardController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\DaftarLowonganController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'postLogin']);
Route::get('/registrasi', [AuthController::class, 'registrasi']);
Route::post('/registrasi', [AuthController::class, 'postRegistrasi']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    
    Route::get('/admin/kelola_user', [UserController::class, 'index']);
    Route::get('/admin/kelola_user/tambah', [UserController::class, 'tambahuser']);
    Route::post('/admin/kelola_user/tambah', [UserController::class, 'tambahuseraction']);
    Route::get('/admin/kelola_user/edit/id={id}', [UserController::class, 'edituser']);
    Route::post('/admin/kelola_user/edit/id={id}', [UserController::class, 'updateuser']);
    Route::get('/admin/kelola_user/delete/id={id}', [UserController::class, 'deleteuser']);
    
    Route::get('/admin/kelola_mitra', [MitraController::class, 'index']);
    Route::get('/admin/kelola_mitra/tambah', [MitraController::class, 'tambahmitra']);
    Route::post('/admin/kelola_mitra/tambah', [MitraController::class, 'tambahmitraaction']);
    Route::get('/admin/kelola_mitra/edit/id={id}', [MitraController::class, 'editmitra']);
    Route::post('/admin/kelola_mitra/edit/id={id}', [MitraController::class, 'updatemitra']);
    Route::get('/admin/kelola_mitra/delete/id={id}', [MitraController::class, 'deletemitra']);

});

Route::group(['middleware' => 'mitra'], function() {
    Route::get('/mitra/dashboard', [MitraDashboardController::class, 'index']);

    Route::get('/mitra/kelola_lowongan', [LowonganController::class, 'index']);
    Route::get('/mitra/kelola_lowongan/tambah', [LowonganController::class, 'tambahlowongan']);
    Route::post('/mitra/kelola_lowongan/tambah', [LowonganController::class, 'tambahlowonganaction']);
    Route::get('/mitra/kelola_lowongan/edit/id={id}', [LowonganController::class, 'editlowongan']);
    Route::post('/mitra/kelola_lowongan/edit/id={id}', [LowonganController::class, 'updatelowongan']);
    Route::get('/mitra/kelola_lowongan/delete/id={id}', [LowonganController::class, 'deletemitra']);

    Route::get('/mitra/kelola_lowongan/id={id}', [DaftarLowonganController::class, 'kelolalowongan']);
    Route::get('/mitra/kelola_pelamar/edit/id={id}', [DaftarLowonganController::class, 'kelolapelamar']);
    Route::post('/mitra/kelola_pelamar/edit/id={id}', [DaftarLowonganController::class, 'kelolapelamarupdate']);
});


Route::group(['middleware' => 'user'], function() {
    Route::get('/', [UserDashboardController::class, 'index']);
    Route::get('/profile', [UserDashboardController::class, 'profile']);
    Route::post('/updateprofile', [UserDashboardController::class, 'updateprofile']);
    Route::post('/updateperlengkapanberkas', [UserDashboardController::class, 'updateperlengkapanberkas']);
    Route::post('/updatepassword', [UserDashboardController::class, 'updatepassword']);

    Route::get('/pendaftaran_mitra', [MitraController::class, 'pendaftaran_mitra']);
    Route::post('/pendaftaran_mitra', [MitraController::class, 'insert_pendaftaran_mitra']);

    Route::get('/lowongan/id={id}', [DaftarLowonganController::class, 'daftarlowongan']);
    Route::post('/lowongan/id={id}', [DaftarLowonganController::class, 'daftarlowonganaction']);
});
