<?php

use App\Models\Barang;
use App\Models\UnitKerja;
use App\Models\PengadaanDetail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DPAController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\UsulanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\KodeRekeningController;
use App\Http\Controllers\NotaDinasController;
use App\Http\Controllers\UsulanDetailController;
use App\Http\Controllers\PengadaanDetailController;

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
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/master', [MasterController::class, 'index'])->name('master')->middleware('auth');

Route::get('/master/koderekening', [KodeRekeningController::class, 'index'])->name('list-kode-rekening')->middleware('auth');
Route::get('/master/koderekening/create', [KodeRekeningController::class, 'create'])->name('create_kode_rekening')->middleware('auth');
Route::post('/master/koderekening/store', [KodeRekeningController::class, 'store'])->name('store_kode_rekening')->middleware('auth');
Route::get('/master/koderekening/edit', [KodeRekeningController::class, 'edit'])->name('edit_kode_rekening')->middleware('auth');
Route::post('/master/koderekening/update', [KodeRekeningController::class, 'update'])->name('update_kode_rekening')->middleware('auth');

Route::get('/master/user', [UserController::class, 'index'])->name('list-user')->middleware('auth');
Route::resource('/master/unit-kerja', UnitKerjaController::class)->middleware('auth');
Route::resource('/master/barang', BarangController::class)->middleware('auth');
Route::resource('/usulan', UsulanController::class)->middleware('auth');
// Route::resource('/usulan-detail', UsulanDetailController::class)->middleware('auth');


Route::get('/usulan-detail/{id}', [UsulanDetailController::class, 'show'])->name('usulan-detail')->middleware('auth');
Route::get('/usulan-detail/create/{id}', [UsulanDetailController::class, 'create'])->name('create-usulan-detail')->middleware('auth');
Route::post('/usulan-detail/store', [UsulanDetailController::class, 'store'])->name('store-usulan-detail')->middleware('auth');
Route::post('/usulan-detail/verifikasi', [UsulanDetailController::class, 'verifikasi'])->name('verifikasi-usulan-detail')->middleware('auth');
Route::get('/usulan-detail/view/{id}', [UsulanDetailController::class, 'view'])->name('view-usulan-detail')->middleware('auth');

Route::resource('/pengadaan', PengadaanController::class)->middleware('auth');

Route::resource('/dpa', DPAController::class)->middleware('auth');
// Route::resource('/pengadaan_detail', PengadaanDetail::class)->middleware('auth');
Route::get('/pengadaan-detail/{id}', [PengadaanDetailController::class, 'index'])->name('pengadaan-detail')->middleware('auth');
Route::get('/pengadaan-detail/view/{id}', [PengadaanDetailController::class, 'view'])->name('view-pengadaan-detail')->middleware('auth');

Route::resource('/nota_dinas', NotaDinasController::class)->middleware('auth');
