<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjekController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HebahanController;
use App\Http\Controllers\MaklumbalasController;
use App\Http\Controllers\ManualController;

use App\Http\Controllers\KriteriaEphBangunanController;
use App\Http\Controllers\KriteriaEphJalanController;
use App\Http\Controllers\KriteriaGpssBangunanController;
use App\Http\Controllers\KriteriaGpssJalanController;

Route::get('', [UserController::class, 'home']);
Route::get('about', [UserController::class, 'about']); 
Route::get('contact', [UserController::class, 'contact']); 
Route::get('keselamatan', [UserController::class, 'keselamatan']); 
Route::get('privasi', [UserController::class, 'privasi']); 
Route::get('faq', [FaqController::class, 'senarai']);
Route::get('loginjkr', [UserController::class, 'loginjkr']);
Route::get('daftarjkr', [UserController::class, 'daftarjkr']);

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [UserController::class, 'dashboard']); 
    Route::get('laporan', [UserController::class, 'laporan']); 
    Route::get('profil', [UserController::class, 'profil']);

    Route::get('projek', [ProjekController::class, 'senarai_projek']); 
    Route::get('projek/borang', [ProjekController::class, 'borang_projek']); 
    Route::get('myskala', [ProjekController::class, 'papar_semua_projek']);
    Route::get('myskala2/{id}', [ProjekController::class, 'papar_semua_projek2']);
    Route::post('myskala2/simpan', [ProjekController::class, 'simpan_skala']);
    // Route::get('myskala2', [ProjekController::class, 'myskala2']);
    Route::post('projek', [ProjekController::class, 'cipta_projek']); 
    Route::get('projek/{id}', [ProjekController::class, 'satu_projek']); 
    Route::put('projek/{id}', [ProjekController::class, 'kemaskini_projek']); 
    Route::post('projek/{id}/lantik', [ProjekController::class, 'lantik']); 
    Route::post('projek/{id}/markah', [ProjekController::class, 'markah']); 

    Route::post('projek/{id}/eph-bangunan/rekabentuk', [KriteriaEphBangunanController::class, 'simpan']); 
    Route::post('projek/{id}/eph-bangunan/verifikasi', [ProjekController::class, 'simpan_ephb_verifikasi']); 
    Route::post('projek/{id}/eph-bangunan/validasi', [ProjekController::class, 'simpan_ephb_validasi']); 

    Route::post('projek/{id}/eph-jalan/rekabentuk', [ProjekController::class, 'simpan_ephj_rekabentuk']); 
    Route::post('projek/{id}/eph-jalan/verifikasi', [ProjekController::class, 'simpan_ephj_verifikasi']);    

    Route::post('projek/{id}/keb', [KriteriaEphBangunanController::class, 'simpan_keb']); 
    Route::post('projek/{id}/kej', [KriteriaEphJalanController::class, 'simpan_kej']); 
    Route::post('projek/{id}/kgb', [KriteriaEphBangunanController::class, 'simpan_kgb']); 
    Route::post('projek/{id}/kgj', [KriteriaEphJalanController::class, 'simpan_kgj']); 

    Route::get('manual', [ManualController::class, 'senarai']); 
    Route::post('manual', [ManualController::class, 'cipta']); 
    Route::get('manual/{id}', [ManualController::class, 'satu']); 
    Route::put('manual/{id}', [ManualController::class, 'kemaskini']);  
    Route::delete('manual/{id}', [ManualController::class, 'buang']); 
    
    Route::get('hebahan', [HebahanController::class, 'senarai']); 
    Route::post('hebahan', [HebahanController::class, 'cipta']); 
    Route::get('hebahan/{id}', [HebahanController::class, 'satu']); 
    Route::put('hebahan/{id}', [HebahanController::class, 'kemaskini']);  
    Route::delete('hebahan/{id}', [HebahanController::class, 'buang']);  
    
    Route::post('faq', [FaqController::class, 'cipta']); 
    Route::put('faq/{id}', [FaqController::class, 'kemaskini']);    
    
    Route::get('maklumbalas', [MaklumbalasController::class, 'senarai']); 
    Route::post('maklumbalas', [MaklumbalasController::class, 'cipta']); 
    Route::get('maklumbalas/{id}', [MaklumbalasController::class, 'satu']); 
    Route::put('maklumbalas/{id}', [MaklumbalasController::class, 'kemaskini']); 

    Route::get('selenggara', [UserController::class, 'selenggara']); 

});


require __DIR__.'/auth.php';
