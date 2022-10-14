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

// });


require __DIR__.'/auth.php';
