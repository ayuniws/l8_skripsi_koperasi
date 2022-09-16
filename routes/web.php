<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaControllers;
use App\http\Controllers\SimpananController;
use App\http\Controllers\PinjamanController;
use App\http\Controllers\BagianController;
use App\http\Controllers\JabatanController;
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
// Route::get('/admin/{pengguna}/show', [App\Http\Controllers\PenggunaController::class, 'show'])->name('admin.show');
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
// Route::resource('anggota',AnggotaController::class);
Route::get('/anggota/dashboard', [App\Http\Controllers\AnggotaController::class, 'dashboard'])->name('anggota.dashboard');
Route::get('/data-anggota', [App\Http\Controllers\AnggotaController::class, 'index'])->name('anggota.index');
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
Route::get('/ketua/pengajuan-diajukan', [App\Http\Controllers\AnggotaController::class, 'showPengajuanPinjaman'])->name('pinjaman.pengajuan-diajukan');

//laporan
Route::get('/laporan/laporan-angsuran', [App\Http\Controllers\LaporanController::class, 'laporanAngsuran'])->name('laporan.angsuran');
Route::get('/laporan/laporan-pinjaman', [App\Http\Controllers\LaporanController::class, 'laporanPinjaman'])->name('laporan.pinjaman');
Route::get('/laporan/laporan-simpanan', [App\Http\Controllers\LaporanController::class, 'laporanSimpanan'])->name('laporan.simpanan');

//Jabatan
Route::resource('jabatan',JabatanController::class);
//Bagian
Route::resource('bagian',BagianController::class);
//Angsuran
Route::resource('angsuran',AngsuranController::class);
//Simpanan
Route::resource('simpanan',SimpananController::class);
//Pinjaman
Route::resource('pinjaman',PinjamanController::class);
Route::get('pinjaman.pengajuan', [App\Http\Controllers\PinjamanController::class, 'getPengajuan'])->name('pinjaman.pengajuan');
Route::post('/pinjaman/{id}', [App\Http\Controllers\PinjamanController::class, 'destroy'])->name('pinjaman.proses');
Route::get('/pengajuan/{pinjaman}/approve', [App\Http\Controllers\PinjamanController::class, 'approve'])->name('pengajuan.approve');
Route::get('/pengajuan/{pinjaman}/reject', [App\Http\Controllers\PinjamanController::class, 'reject'])->name('pengajuan.reject');
Route::get('/form-pengajuan', [App\Http\Controllers\PinjamanController::class, 'getFormPengajuan'])->name('form-pengajuan');

Route::resource('sisw',SiswaControllers::class);


