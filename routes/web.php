<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [TokoController::class, 'index2'])->name('home');
Route::post('/', [PesananController::class, 'store'])->name('tokostore');


Route::get('/admin', function () {
    return view('admin.index', ['title' => 'Dashboard']);
});

Route::get('/admin/dataProduk', [TokoController::class, 'index'])->name('admin.produk.index');
Route::get('/admin/dataProduk/tambah', [TokoController::class, 'create'])->name('Tambah Produk');
Route::post('/admin/dataProduk/tambah', [TokoController::class, 'store']);
Route::get('/admin/dataProduk/edit/{toko:id}', [TokoController::class, 'edit'])->name('admin.produk.edit');
Route::put('/admin/dataProduk/edit/{toko:id}', [TokoController::class, 'update']);
Route::delete('/admin/dataProduk/delete/{toko:id}', [TokoController::class, 'destroy'])->name('admin.produk.destroy');
Route::get('/admin/dataPesanan', [PesananController::class, 'index'])->name('admin.pesanan.index');
Route::get('/admin/dataPesanan/edit/{pesanan:id}', [PesananController::class, 'edit'])->name('admin.pesanan.edit');
Route::put('/admin/dataPesanan/edit/{pesanan:id}', [PesananController::class, 'update']);
Route::delete('/admin/dataPesanan/delete/{pesanan:id}', [PesananController::class, 'destroy'])->name('admin.pesanan.destroy');
Route::get('/admin/dataUser', [UserController::class, 'index'])->name('admin.user.index');
Route::get('/admin/dataUser/tambah', [UserController::class, 'create'])->name('admin.user.create');
Route::post('/admin/dataUser/tambah', [UserController::class, 'store']);
Route::get('/admin/dataUser/edit/{user:id}', [UserController::class, 'edit'])->name('admin.user.edit');
Route::put('/admin/dataUser/edit/{user:id}', [UserController::class, 'update']);
Route::delete('/admin/dataUser/delete/{user:id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

Route::get('/kasir', [PesananController::class, 'index2'])->name('kasir.index');
Route::get('/kasir/accept/{pesanan:id}', [PesananController::class, 'edit2'])->name('kasir.accept');
Route::put('/kasir/accept/{pesanan:id}', [PesananController::class, 'update2']);

Route::get('/register', [RegisterController::class, 'index'])->name('register.index')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
