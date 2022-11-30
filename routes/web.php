<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\adminController;
use App\http\Controllers\siswaController;
use App\http\Controllers\loginController;
use App\http\Controllers\reservasiController;
use App\http\Controllers\welcomeController;
use App\http\Controllers\registerController;
use App\http\Controllers\lapanganController;


// Route::resource('loginsiswa', loginsiswaController::class);
Route::resource('siswa', siswaController::class);
Route::resource('admin', adminController::class);
// Route::resource('loginadmin', loginadminController::class);
Route::resource('reservasi', reservasiController::class);
Route::resource('welcome', welcomeController::class);
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




route::middleware('guest')->group(function () {
    Route::get('/login', [loginController::class, 'index'])->name('login');
    Route::post('/login', [loginController::class, 'authenticate']);
    Route::resource('register', registerController::class);
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/tabel_reservasi', function () {
        return view('tabel_reservasi');
    });
    Route::get('/jadwal_lapangan', function () {
        return view('jadwal_lapangan');
    });
});


route::middleware('auth')->group(function () {

    Route::resource('siswa', siswaController::class);
    Route::resource('admin', adminController::class);

    Route::resource('reservasi', reservasiController::class);

    Route::get('admin/tambah', [adminController::class, 'tambah'])->name('admin.tambah');
    Route::get('admin/{id}/hapus', [adminController::class, 'hapus'])->name('admin.hapus');
    Route::post('logout', [loginController::class, 'logout']);
});




//nambah function
Route::get('reservasi/tambah', [reservasiController::class, 'tambah'])->name('reservasi.tambah');
