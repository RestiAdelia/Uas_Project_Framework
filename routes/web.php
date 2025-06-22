<?php

use App\Http\Controllers\Admin\ComplainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelaporController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ResponController;

use App\Http\Controllers\ComplaintController;
Route::get('/', function () {
    return view('index');

});
Route::get('/', [ComplaintController::class, 'index'])->name('home');


Route::get('login',[AuthController::class,'loginform'])->name('login');
Route::post('/login',[AuthController::class,'login']);


Route::get('/pelapor/create', [PelaporController::class, 'create'])->name('pelapor.create');
Route::post('/pelapor', [PelaporController::class, 'store'])->name('pelapor.store');

Route::get('/complain', [ComplaintController::class, 'index'])->name('complain.index');
Route::get('/complain/create/{id_pelapor}', [ComplaintController::class, 'create'])->name('complain.create');
Route::post('/complain', [ComplaintController::class, 'store'])->name('complain.store');
Route::post('/complain/store', [ComplaintController::class, 'store'])->name('complain.store');
Route::get('/complain/{id}/edit', [ComplaintController::class, 'edit'])->name('complain.edit');
Route::put('/complain/{id}', [ComplaintController::class, 'update'])->name('complain.update');
Route::delete('/complain/{id}', [ComplaintController::class, 'destroy'])->name('complain.destroy');

// Respon (opsional)
Route::get('/respon/{id}', [ResponController::class, 'show'])->name('respon.show');

Route::get('/respon/create/{id_complain}', [ResponController::class, 'create'])->name('respon.create');
Route::post('/respon/store', [ResponController::class, 'store'])->name('respon.store');
