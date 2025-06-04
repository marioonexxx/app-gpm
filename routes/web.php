<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekretarisController;
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


// ROLE SEKRETARIS
Route::middleware('auth','verified','Sekretaris')->group(function(){
    Route::get('/sekretaris/dashboard',[SekretarisController::class, 'index'])->name('sekretaris.dashboard');

    Route::get('/sekretaris/program_index',[SekretarisController::class, 'program_index'])->name('program_index');

    //profile
    Route::get('/sekretaris/profile',[SekretarisController::class, 'profile_index'])->name('sekretaris.profile_index');
});



//role subseksi
Route::middleware('auth','verified','Subseksi')->group(function(){

    Route::get('/subseksi/dashboard',[SubseksiController::class, 'index'])->name('subseksi.dashboard');
    Route::get('/subseksi/usulan',[SubseksiController::class, 'usulan_index'])->name('subseksi.usulan');
    Route::get('/subseksi/usulan_pra',[SubseksiController::class, 'usulan_pra'])->name('subseksi.usulan_prasidang');
    Route::get('/subseksi/usulan_approve',[SubseksiController::class, 'usulan_approve'])->name('subseksi.usulan_disetujui');
    Route::get('/subseksi/usulan_rejected',[SubseksiController::class, 'usulan_rejected'])->name('subseksi.usulan_ditolak');
    Route::post('/subseksi/usulan',[SubseksiController::class, 'usulan_store'])->name('subseksi.usulan_store');    
    Route::put('/subseksi/usulan/{id}', [SubseksiController::class, 'usulan_update'])->name('subseksi.usulan_update');
    Route::delete('/subseksi/usulan/{id}',[SubseksiController::class, 'usulan_destroy'])->name('subseksi_usulan_destroy');


    Route::get('/subseksi/monev',[SubseksiController::class, 'monev_index'])->name('subseksi.monev');
    Route::post('/subseksi/monev',[SubseksiController::class, 'monev_store'])->name('subseksi.monev_store');
    Route::get('/subseksi/monev_waiting',[SubseksiController::class, 'monev_waiting'])->name('subseksi.monev_waiting');
    Route::get('/subseksi/monev_approve',[SubseksiController::class, 'monev_approve'])->name('subseksi.monev_approve');
    Route::get('/subseksi/monev_revisi',[SubseksiController::class, 'monev_revisi_input'])->name('subseksi.monev_revisi_input');
    Route::put('/subseksi/monev_update_revisi/{id}',[SubseksiController::class, 'monev_update_revisi'])->name('subseksi.monev_update_revisi');

    //PROFILE

    Route::get('/subseksi/profile',[SubseksiController::class, 'profile_index'])->name('subseksi.profile_index');
   

});
//role seksi
Route::middleware('auth','verified','Seksi')->group(function(){
    Route::get('/seksi/dashboard',[SeksiController::class, 'index'])->name('seksi.dashboard');

    Route::get('/seksi/verifikasi',[SeksiController::class, 'verifikasi_index'])->name('seksi.verifikasi');
    Route::put('/seksi/verifkasi_update/{id}',[SeksiController::class, 'verifikasi_update'])->name('seksi.verifikasi_update');
    Route::get('/seksi/verifikasi_pra',[SeksiController::class, 'verifikasi_prasidang_index'])->name('seksi.verifikasi_prasidang');
    Route::get('/seksi/verifikasi_approve',[SeksiController::class, 'verifikasi_disetujui_index'])->name('seksi.verifikasi_disetujui');
    Route::get('/seksi/verifikasi_reject',[SeksiController::class, 'verifikasi_ditolak_index'])->name('seksi.verifikasi_ditolak');    
   
    Route::get('/seksi/monev',[SeksiController::class, 'monev_index'])->name('seksi.monev');
    Route::get('/seksi/monev_verifikasi',[SeksiController::class, 'monev_verif_index'])->name('seksi.verif_index');
    Route::post('/seksi/monev_verifikasi/{id}',[SeksiController::class, 'monev_verifikasi'])->name('seksi.verifikasi_monev');
    Route::post('/seksi/monev_verifikasi_revisi/{id}',[SeksiController::class, 'monev_verifikasi_revisi'])->name('seksi.verifikasi_monev_revisi');
    Route::post('/seksi/monev_input_revisi',[SeksiController::class, 'monev_input_revisi'])->name('seksi.verifikasi_input_revisi');
    Route::get('/seksi/monev_revisi_index',[SeksiController::class, 'monev_revisi_index'])->name('seksi.monev_revisi_index');
    //PROFILE
    Route::get('/seksi/profile',[SeksiController::class, 'profile_index'])->name('seksi.profile_index');
   
    

});

require __DIR__.'/auth.php';
