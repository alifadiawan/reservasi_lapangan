<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\reservasiController;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\aksesController;
use App\Http\Controllers\lapanganController;
use App\Http\Controllers\statusController;

// Route::resource('loginsiswa', loginsiswaController::class);
// Route::resource('siswa', siswaController::class);
// Route::resource('admin', adminController::class);
// Route::resource('loginadmin', loginadminController::class);

// Route::resource('register', registerController::class);




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

// print all

Route::get('/', function () {
    return view('welcome');
});
Route::get('/antrian', function () {
    return view('antrian');
});


route::middleware('guest')->group(function () {
    Route::resource('reservasi', reservasiController::class);
    Route::resource('/register', registerController::class);
    Route::resource('/reservasi', reservasiController::class);
    Route::get('/jadwal_lapangan', reservasiController::class);
    Route::get('/tabel_reservasi', reservasiController::class);
    Route::get('/login', [loginController::class, 'index'])->name('login');
    Route::post('/login', [loginController::class, 'authenticate']);
});


Route::post('logout', [loginController::class, 'logout']);


//siswa
route::middleware(['siswa'])->group(function () {
    Route::resource('siswa', siswaController::class);
    route::get('ooo', [siswaController::class, 'ooo']);
});


//admin
route::middleware(['admin'])->group(function () {
    Route::resource('admin', adminController::class);
    Route::resource('status', statusController::class);
    Route::resource('akses', aksesController::class);

    //nambah route function
    Route::get('admin/tambah', [adminController::class, 'tambah'])->name('admin.tambah');
    Route::get('admin/{id}/konfirmasi', [adminController::class, 'konfirmasi'])->name('admin.konfirmasi');
    Route::get('/admin/{id}/cetak_pdf', [adminController::class, 'cetak_pdf'])->name('admin.cetakpdf');
    Route::get('/cari', [adminController::class, 'cari'])->name('cari');
    Route::get('admin/{id}/hapus', [adminController::class, 'hapus'])->name('admin.hapus');
    Route::get('reservasi/{id}/hapus', [reservasiController::class, 'hapus'])->name('reservasi.hapus');
    Route::get('admin/{id}/hapusreservasi', [adminController::class, 'hapus'])->name('admin.hapusreservasi');
});


//nambah function
Route::get('reservasi/tambah', [reservasiController::class, 'tambah'])->name('reservasi.tambah');
