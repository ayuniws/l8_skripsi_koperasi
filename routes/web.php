<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaControllers;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Route::get('/home', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Admin
Route::get('/admin/{pengguna}/show', [App\Http\Controllers\PenggunaController::class, 'show'])->name('admin.show');
Route::get('/admin/dashboard', [App\Http\Controllers\PenggunaController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/list-pengguna', [App\Http\Controllers\PenggunaController::class, 'index'])->name('pengguna.index');
Route::get('/admin/create-pengguna', [App\Http\Controllers\PenggunaController::class, 'create'])->name('pengguna.create');
// Pengguna
Route::post('/pengguna/store', [App\Http\Controllers\PenggunaController::class, 'store'])->name('pengguna.store');
Route::get('/pengguna/{pengguna}/edit', [App\Http\Controllers\PenggunaController::class, 'edit'])->name('pengguna.edit');
Route::match(['put', 'patch'],'/pengguna/{id}', [App\Http\Controllers\PenggunaController::class, 'update'])->name('pengguna.update');
Route::post('/pengguna/{id}', [App\Http\Controllers\PenggunaController::class, 'destroy'])->name('pengguna.destroy');
Route::get('/pengguna/{pengguna}', [App\Http\Controllers\PenggunaController::class, 'show'])->name('pengguna.show');
 //anggota
Route::get('/anggota/dashboard', [App\Http\Controllers\AnggotaController::class, 'dashboard'])->name('anggota.dashboard');
Route::get('/anggota/index', [App\Http\Controllers\AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/create', [App\Http\Controllers\AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota/store', [App\Http\Controllers\AnggotaController::class, 'store'])->name('anggota.store');
Route::get('/anggota/{anggota}/edit', [App\Http\Controllers\AnggotaController::class, 'edit'])->name('anggota.edit');
Route::match(['put', 'patch'],'/anggota/{id}', [App\Http\Controllers\AnggotaController::class, 'update'])->name('anggota.update');
Route::post('/anggota/{id}', [App\Http\Controllers\AnggotaController::class, 'destroy'])->name('anggota.destroy');
Route::get('/anggota/{anggota}', [App\Http\Controllers\AnggotaController::class, 'show'])->name('anggota.show');
//ketua
Route::get('/ketua/{pengguna}/show', [App\Http\Controllers\PenggunaController::class, 'show'])->name('ketua.show');
Route::get('/ketua/dashboard', [App\Http\Controllers\AnggotaController::class, 'dashboardKetua'])->name('ketua.dashboard');
Route::match(['put', 'patch'],'/anggota/{id}', [App\Http\Controllers\AnggotaController::class, 'update'])->name('anggota.update');
Route::post('/anggota/{id}', [App\Http\Controllers\AnggotaController::class, 'destroy'])->name('anggota.destroy');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('sisw',SiswaControllers::class);

Route::get('/crud/create', function () {
    return view('crud.create');
});

Route::get('/crud/index', function () {
    return view('crud.index');
});


Route::get('/user/index', function () {
    return view('user.index');
});

Route::get('/user/create', function () {
    return view('user.create');
})->name('user.create');

Route::get('/admin/create', function () {
    return view('admin.create');
});

Route::get('/admin/index', function () {
    return view('admin.index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
