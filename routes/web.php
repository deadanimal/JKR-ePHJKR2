<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjekController;
use App\Http\Controllers\KriteriaEphBangunanController;
use App\Http\Controllers\KriteriaEphJalanController;
use App\Http\Controllers\KriteriaGpssBangunanController;
use App\Http\Controllers\KriteriaGpssJalanController;


// Route::middleware(['auth'])->group(function () {

    Route::get('', [UserController::class, 'home']); 

    Route::get('projek', [ProjekController::class, 'senarai_projek']); 
    Route::get('projek/borang', [ProjekController::class, 'borang_projek']); 
    Route::post('projek', [ProjekController::class, 'cipta_projek']); 
    Route::get('projek/{id}', [ProjekController::class, 'satu_projek']); 
    Route::put('projek/{id}', [ProjekController::class, 'kemaskini_projek']); 

    Route::post('projek/{id}/eph-bangunan/rekabentuk', [KriteriaEphBangunanController::class, 'simpan']); 
    Route::post('projek/{id}/eph-bangunan/verifikasi', [ProjekController::class, 'simpan_ephb_verifikasi']); 
    Route::post('projek/{id}/eph-bangunan/validasi', [ProjekController::class, 'simpan_ephb_validasi']); 

    Route::post('projek/{id}/eph-jalan/rekabentuk', [ProjekController::class, 'simpan_ephj_rekabentuk']); 
    Route::post('projek/{id}/eph-jalan/verifikasi', [ProjekController::class, 'simpan_ephj_verifikasi']);    

    Route::post('projek/{id}/keb', [KriteriaEphBangunanController::class, 'simpan_keb']); 
    Route::post('projek/{id}/kej', [KriteriaEphJalanController::class, 'simpan_kej']); 
    Route::post('projek/{id}/kgb', [KriteriaEphBangunanController::class, 'simpan_kgb']); 
    Route::post('projek/{id}/kgj', [KriteriaEphJalanController::class, 'simpan_kgj']); 

    Route::get('manual', [manualController::class, 'senarai_manual']); 
    Route::post('manual', [manualController::class, 'cipta_manual']); 
    Route::get('manual/{id}', [manualController::class, 'satu_manual']); 
    Route::put('manual/{id}', [manualController::class, 'kemaskini_manual']);  
    
    Route::get('hebahan', [hebahanController::class, 'senarai_hebahan']); 
    Route::post('hebahan', [hebahanController::class, 'cipta_hebahan']); 
    Route::get('hebahan/{id}', [hebahanController::class, 'satu_hebahan']); 
    Route::put('hebahan/{id}', [hebahanController::class, 'kemaskini_hebahan']);  
    
    Route::get('faq', [faqController::class, 'senarai_faq']); 
    Route::post('faq', [faqController::class, 'cipta_faq']); 
    Route::get('faq/{id}', [faqController::class, 'satu_faq']); 
    Route::put('faq/{id}', [faqController::class, 'kemaskini_faq']);    
    
    Route::get('maklumbalas', [maklumbalasController::class, 'senarai_maklumbalas']); 
    Route::post('maklumbalas', [maklumbalasController::class, 'cipta_maklumbalas']); 
    Route::get('maklumbalas/{id}', [maklumbalasController::class, 'satu_maklumbalas']); 
    Route::post('maklumbalas/{id}/hantar', [maklumbalasController::class, 'hantar_maklumbalas']);     

// });


require __DIR__.'/auth.php';
