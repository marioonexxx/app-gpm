<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeksiController;
use App\Http\Controllers\SubseksiController;
use App\Http\Middleware\Subseksi;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/cek', function () {
    return view('subseksi.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//role subseksi
Route::middleware('auth','verified','Subseksi')->group(function(){
    Route::get('/subseksi/dashboard',[SubseksiController::class, 'index'])->name('subseksi.dashboard');
    Route::get('/subseksi/usulan',[SubseksiController::class, 'usulan_index'])->name('subseksi.usulan');
    Route::post('/subseksi/usulan',[SubseksiController::class, 'usulan_store'])->name('subseksi.usulan_store');    
    Route::put('/subseksi/usulan/{id}', [SubseksiController::class, 'usulan_update'])->name('subseksi.usulan_update');
    Route::delete('/subseksi/usulan/{id}',[SubseksiController::class, 'usulan_destroy'])->name('subseksi_usulan_destroy');

});
//role seksi
Route::middleware('auth','verified','Seksi')->group(function(){
    Route::get('/seksi/dashboard',[SeksiController::class, 'index'])->name('seksi.dashboard');
    Route::get('/seksi/verifikasi',[SeksiController::class, 'verifikasi_index'])->name('seksi.verifikasi');
    Route::patch('/seksi/verifikasi/{id}/terima',[SeksiController::class], 'verifikasi_terima')->name('seksi.verifikasi_terima');
    Route::patch('/seksi/verifikasi/{id}/tolak',[SeksiController::class], 'verifikasi_tolak')->name('seksi.verifikasi_tolak');

});

require __DIR__.'/auth.php';
