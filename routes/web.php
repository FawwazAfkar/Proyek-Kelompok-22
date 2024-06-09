<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Car\CarController;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Transaksi\TransaksiController;
use App\Http\Controllers\User\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route untuk Multi Role Login =========

// user route
Route::middleware(['auth' , 'userMiddleware'])->group(function(){
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
});
// admin
Route::middleware(['auth' , 'adminMiddleware'])->prefix('/admin')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::prefix('/mobil')->group(function() {
        Route::get('/', [CarController::class, 'index'])->name('admin.mobil.index');
        // Additional routes for 'mobil' can be added here
    });
    Route::prefix('/user-admin')->group(function() {
        Route::get('/', [UsersController::class,'indexAdmin'])->name('admin.user-admin.index');
        Route::post('/tambahAdmin', [UsersController::class, 'tambahAdmin'])->name('admin.user-admin.tambah');
        Route::post('/editAdmin/{id}', [UsersController::class,'editAdmin'])->name('admin.user-admin.edit');
        Route::delete('/hapus/{id}', [UsersController::class, 'hapusAdmin'])->name('admin.user-admin.hapus');
    });
    Route::prefix('/user-customer')->group(function() {
        Route::get('/', [UsersController::class, 'indexUser'])->name('admin.user-customer.index');
    });
    Route::prefix('/transaksi-berlangsung')->group(function() {
        Route::get('/', [TransaksiController::class,'index1'])->name('admin.transaksi-berlangsung.index');
    });
    Route::prefix('/riwayat-transaksi')->group(function() {
        Route::get('/', [TransaksiController::class,'index2'])->name('admin.riwayat-transaksi.index');
    });
});
