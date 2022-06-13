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

Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('admin.index', ['title' => 'Dashboard']);
});

Route::get('/admin/dataProduk', [TokoController::class, 'index'])->name('Data Produk');
Route::get('/admin/dataPesanan', [PesananController::class, 'index'])->name('Data Pesanan');
Route::get('/admin/dataUser', [UserController::class, 'index'])->name('Data User');
