<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

//SATUAN
Route::get('/data-satuan', [\App\Http\Controllers\SatuanController::class, 'index'])->name('data-satuan');
Route::get('/create-satuan', [\App\Http\Controllers\SatuanController::class, 'create'])->name('create-satuan');
Route::post('/create-satuan', [\App\Http\Controllers\SatuanController::class, 'store'])->name('save-satuan');
Route::get('/edit-satuan/{id}', [\App\Http\Controllers\SatuanController::class, 'edit'])->name('edit-satuan');
Route::put('/edit-satuan/{id}', [\App\Http\Controllers\SatuanController::class, 'update'])->name('update-satuan');
Route::delete('/hapus-satuan/{id}', [\App\Http\Controllers\SatuanController::class, 'destroy'])->name('destroy-satuan');
Route::get('/data-satuan-dihapus', [\App\Http\Controllers\SatuanController::class, 'deleted'])->name('data-satuan-dihapus');
Route::get('/restore-satuan-dihapus{id}', [\App\Http\Controllers\SatuanController::class, 'restore'])->name('restore-satuan-dihapus');


//BARANG
Route::get('/barang', [\App\Http\Controllers\BarangController::class, 'index'])->name('data-barang');
Route::get('/create-barang', [\App\Http\Controllers\BarangController::class, 'create'])->name('create-barang');
Route::post('/create-barang', [\App\Http\Controllers\BarangController::class, 'store'])->name('save-barang');
Route::get('/edit-barang/{id}', [\App\Http\Controllers\BarangController::class, 'edit'])->name('edit-barang');
Route::put('/edit-barang/{id}', [\App\Http\Controllers\BarangController::class, 'update'])->name('update-barang');
Route::delete('/hapus-barang/{id}', [\App\Http\Controllers\BarangController::class, 'destroy'])->name('destroy-barang');
Route::get('/data-barang-dihapus', [\App\Http\Controllers\BarangController::class, 'deleted'])->name('data-barang-dihapus');
Route::get('/restore-barang-dihapus{id}', [\App\Http\Controllers\BarangController::class, 'restore'])->name('restore-barang-dihapus');


//VENDOR
Route::get('/data-vendor', [\App\Http\Controllers\VendorController::class, 'index'])->name('data-vendor');
Route::get('/create-vendor', [\App\Http\Controllers\VendorController::class, 'create'])->name('create-vendor');
Route::post('/create-vendor', [\App\Http\Controllers\VendorController::class, 'store'])->name('save-vendor');
Route::get('/edit-vendor/{id}', [\App\Http\Controllers\VendorController::class, 'edit'])->name('edit-vendor');
Route::put('/edit-vendor/{id}', [\App\Http\Controllers\VendorController::class, 'update'])->name('update-vendor');
Route::delete('/hapus-vendor/{id}', [\App\Http\Controllers\VendorController::class, 'destroy'])->name('destroy-vendor');
Route::get('/data-vendor-dihapus', [\App\Http\Controllers\VendorController::class, 'deleted'])->name('data-vendor-dihapus');
Route::get('/restore-vendor-dihapus{id}', [\App\Http\Controllers\VendorController::class, 'restore'])->name('restore-vendor-dihapus');


//USER
Route::get('/data-user', [\App\Http\Controllers\UserController::class, 'index'])->name('data-user');
Route::get('/create-user', [\App\Http\Controllers\UserController::class, 'create'])->name('create-user');
Route::post('/create-user', [\App\Http\Controllers\UserController::class, 'store'])->name('save-user');
Route::get('/edit-user/{id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('edit-user');
Route::put('/edit-user/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('update-user');
Route::delete('/hapus-user/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('destroy-user');
Route::get('/data-user-dihapus', [\App\Http\Controllers\UserController::class, 'deleted'])->name('data-user-dihapus');
Route::get('/restore-user-dihapus{id}', [\App\Http\Controllers\UserController::class, 'restore'])->name('restore-user-dihapus');


Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

//AUTHENTICATION
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login-proses', [\App\Http\Controllers\AuthController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

