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




route::middleware('guest')->group(function () {
    //welcome page
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/antrian', function () {
        return view('antrian');
    });
    
    Route::get('/login', [loginController::class, 'index'])->name('login');
    Route::resource('reservasi', reservasiController::class);
    Route::post('/login', [loginController::class, 'authenticate']);
    Route::resource('/register', registerController::class);
    Route::resource('/reservasi', reservasiController::class);
    Route::get('/jadwal_lapangan', reservasiController::class);
    Route::get('/tabel_reservasi', reservasiController::class);
});


route::middleware('auth')->group(function () {
    //siswa
    Route::resource('siswa', siswaController::class);

    //admin
    Route::resource('admin', adminController::class);
    Route::resource('akses', aksesController::class);

    //nambah route function
    Route::get('admin/tambah', [adminController::class, 'tambah'])->name('admin.tambah');
    Route::get('admin/{id}/hapus', [adminController::class, 'hapus'])->name('admin.hapus');
    Route::post('logout', [loginController::class, 'logout']);
});




//nambah function
Route::get('reservasi/tambah', [reservasiController::class, 'tambah'])->name('reservasi.tambah');
