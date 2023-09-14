<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\barangController;
use App\Http\Controllers\SessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// http://127.0.0.1:8000/ ==> view welcome
Route::get('/', function () {
    return view('welcome');
});

Route::get('barang', [barangController::class, 'index']);
Route::get('login', [SessionController::class, 'login'])->name('login');
Route::post('/loginProses', [SessionController::class, 'loginProses'])->name('loginProses');
Route::get('register', [SessionController::class, 'register'])->name('register');
Route::post('/registerProses', [SessionController::class, 'registerProses'])->name('registerProses');
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');
Route::post('/sesi/login', [SessionController::class, 'login']);

Route::get('barang/tambah', [barangController::class, 'tambah']);
Route::post('barang', [BarangController::class, 'store'])->name('barang');
Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/delete/{idBarang}', [barangController::class, 'delete'])->name('barang.hapus');

Route::get('/apibarang', [barangController::class]);


