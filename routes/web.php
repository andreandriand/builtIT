<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesananController;

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
Route::get('/admin/dataPesanan', [PesananController::class, 'index'])->name('Data Pesanan');
Route::get('/admin/dataUser', [UserController::class, 'index'])->name('Data User');

Route::get('/kasir', [PesananController::class, 'index2'])->name('Data Pesanan');
