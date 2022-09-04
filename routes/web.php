<?php

use App\Http\Controllers\AnggotaController;
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



// route::get('/dashboard', function () {
//     return view('layouts.template');
// // });

Auth::routes();

// // Admin
Route::get('/admin/dataanggota', [App\Http\Controllers\AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/admin/tambahanggota', [App\Http\Controllers\AnggotaController::class, 'create'])->name('anggota.create');
// Route::get('/admin/{pengguna}/show', [App\Http\Controllers\PenggunaController::class, 'show'])->name('admin.show');
// Route::get('/admin/dashboard', [App\Http\Controllers\PenggunaController::class, 'dashboard'])->name('admin.dashboard');
// Route::get('/admin/list-pengguna', [App\Http\Controllers\PenggunaController::class, 'index'])->name('pengguna.index');
// Route::get('/admin/create-pengguna', [App\Http\Controllers\PenggunaController::class, 'create'])->name('pengguna.create');

// //anggota
Route::get('/anggota/index', [App\Http\Controllers\AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/create', [App\Http\Controllers\AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota/store', [App\Http\Controllers\AnggotaController::class, 'store'])->name('anggota.store');
Route::get('/anggota/{anggota}/edit', [App\Http\Controllers\AnggotaController::class, 'edit'])->name('anggota.edit');
Route::match(['put', 'patch'],'/anggota/{id}', [App\Http\Controllers\AnggotaController::class, 'update'])->name('anggota.update');
Route::post('/anggota/{id}', [App\Http\Controllers\AnggotaController::class, 'destroy'])->name('anggota.destroy');
Route::get('/anggota/{anggota}', [App\Http\Controllers\AnggotaController::class, 'show'])->name('anggota.show');


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