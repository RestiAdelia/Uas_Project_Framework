<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PelaporController;
use App\Http\Controllers\ResponController;

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\JumlahPengaduanController;
use App\Models\complain;

Route::get('/', [JumlahPengaduanController::class, 'index']);



Route::get('login', [AuthController::class, 'loginform'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/homeadmin', [AuthController::class, 'index'])->name('homeadmin');
    Route::get('/complaints/list', [ComplaintController::class, 'list'])->name('complaints.list');
    Route::get('/complain/{id}/respon', [ComplaintController::class, 'formRespon'])->name('complain.formRespon');
    Route::post('/complain/{id}/respon', [ComplaintController::class, 'kirimRespon'])->name('complain.kirimRespon');
    Route::get('/respon/{id}', [ResponController::class, 'show'])->name('respon.show');
    Route::post('/respon/store', [ResponController::class, 'store'])->name('respon.store');
    Route::delete('/respons/{id}', [ResponController::class, 'destroy'])->name('respons.destroy');
    Route::delete('/complain/{id}', [ComplaintController::class, 'destroy'])->name('complain.destroy');
    Route::put('/complain/status/{id}', [ComplaintController::class, 'updateStatus'])->name('complain.updateStatus');
    Route::resource('complaints', ComplaintController::class);
    Route::resource('respon', ResponController::class);
    Route::resource('category', CategoryController::class)->names('category');
});
 Route::resource('pelapor', PelaporController::class);
Route::get('/complain', [ComplaintController::class, 'index'])->name('complain.index');
Route::get('/pelapor/create', [PelaporController::class, 'create'])->name('pelapor.create');
Route::get('/complain/create/{id_pelapor}', [ComplaintController::class, 'create'])->name('complain.create');
Route::post('/complain', [ComplaintController::class, 'store'])->name('complain.store');
Route::post('/complain/store', [ComplaintController::class, 'store'])->name('complain.store');
Route::get('/complain/{id}', [ComplaintController::class, 'show'])->name('complain.show'); // Untuk 1 data spesifik
