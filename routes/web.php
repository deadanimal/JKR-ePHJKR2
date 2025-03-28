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
// Route::get('about', [UserController::class, 'about']); 
Route::get('about', [UserController::class, 'about']); 
Route::get('about/about1', [UserController::class, 'about1']); 
Route::get('about/about2', [UserController::class, 'about2']); 
Route::get('about/about3', [UserController::class, 'about3']); 
Route::get('about/about4', [UserController::class, 'about4']); 
Route::get('about/about5', [UserController::class, 'about5']); 
Route::get('about/about6', [UserController::class, 'about6']); 
Route::get('about/about7', [UserController::class, 'about7']); 
Route::get('about/about8', [UserController::class, 'about8']); 

Route::get('contact', [UserController::class, 'contact']); 
Route::get('keselamatan', [UserController::class, 'keselamatan']); 
Route::get('privasi', [UserController::class, 'privasi']); 
Route::get('pengguna_luar', [FaqController::class, 'pengguna_luar']);
Route::get('loginjkr', [UserController::class, 'loginjkr']);
Route::get('daftarjkr', [UserController::class, 'daftarjkr']);

Route::get('maklumbalas/pengguna_luar', [MaklumbalasController::class, 'pengguna_luar']);
Route::post('maklumbalas/cipta_pengguna_luar', [MaklumbalasController::class, 'cipta_pengguna_luar']); 



// Route::get('lupa', [UserController::class, 'lupa']);
// Route::post('lupa', [UserController::class, 'lupa_katalaluan']);


// Route::post('custom-login', [UserController::class, 'custom_login']);

//lupa password
Route::get('lupa', [UserController::class, 'tunjuk_lupa']);
Route::put('lupa', [UserController::class, 'cipta_lupa']);

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [UserController::class, 'dashboard']); 
    Route::get('laporan', [UserController::class, 'laporan']); 
    Route::get('profil', [UserController::class, 'profil']);
    Route::get('profil/profil_kemaskini/{id}', [UserController::class, 'kemaskini_profil']);
    Route::put('profil/simpan_kemaskini/{id}', [UserController::class, 'simpan_kemaskini']);
    Route::get('profil/tukar_peranan/{id}', [UserController::class, 'tukar_peranan']);
    Route::get('profil/tukar_peranan2/{id}', [UserController::class, 'tukar_peranan2']);
    Route::delete('profil/tolak_tukar_peranan2/{id}', [UserController::class, 'tolak_tukar_peranan2']);
    Route::put('profil/sah_tukar_peranan2/{id}', [UserController::class, 'sah_tukar_peranan2']);

    Route::post('profil/simpan_tukar_peranan2/{id}', [UserController::class, 'simpan_tukar_peranan2']);
    Route::put('profil/simpan_tukar_peranan/{id}', [UserController::class, 'simpan_tukar_peranan']);
    Route::put('profil/simpan2_tukar_peranan/{id}', [UserController::class, 'simpan2_tukar_peranan']);
    Route::put('profil/simpan3_tukar_peranan/{id}', [UserController::class, 'simpan3_tukar_peranan']);
    Route::get('senaraiPengguna', [UserController::class, 'senaraiPengguna']);
    Route::get('senaraiPengguna/cipta', [UserController::class, 'cipta']);
    Route::post('senaraiPengguna/cipta_pengguna', [UserController::class, 'cipta_pengguna']);
    Route::get('senaraiPengguna/kemaskini_pengguna/{id}', [UserController::class, 'kemaskini_pengguna']);
    Route::put('senaraiPengguna/simpan_kemaskini_pengguna/{id}', [UserController::class, 'simpan_kemaskini_pengguna']);
    Route::put('senaraiPengguna/simpan_tukar_status/{id}', [UserController::class, 'simpan_tukar_status']);
    Route::put('senaraiPengguna/simpan2_tukar_status/{id}', [UserController::class, 'simpan2_tukar_status']);
    Route::put('senaraiPengguna/simpan3_tukar_status/{id}', [UserController::class, 'simpan3_tukar_status']);
    Route::put('senaraiPengguna/simpan4_tukar_status/{id}', [UserController::class, 'simpan4_tukar_status']);
    // Route::put('senaraiPengguna/simpan2_kemaskini_pengguna/{id}', [UserController::class, 'simpan2_kemaskini_pengguna']);
    Route::get('senaraiPengguna/senarai_tukar_peranan', [UserController::class, 'senarai_tukar_peranan']);
    Route::get('senaraiPengguna/sembunyi', [UserController::class, 'senarai_sembunyi']);
    Route::get('senaraiPengguna/pengesahan_akaun_baru', [UserController::class, 'senarai_pengesahan_akaun']);
    Route::delete('senaraiPengguna/tolak_sah_akaun/{id}', [UserController::class, 'tolak_sah_akaun']);    
    Route::put('senaraiPengguna/simpan_sah_akaun/{id}', [UserController::class, 'simpan_sah_akaun']);
    Route::get('senaraiPengguna/papar/{id}', [UserController::class, 'papar_pengguna']);
    Route::delete('senaraiPengguna/gugur_pengguna/{id}', [UserController::class, 'gugur_pengguna']);    



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


    //gugurprojek
    // Route::get('projek/gugur/senarai_gugur_projek', [ProjekController::class, 'senarai_gugur_projek']);
    Route::get('projek/gugur_projek/{id}', [ProjekController::class, 'gugur_projek']);
    Route::put('permohonan/gugur_projek/{id}', [ProjekController::class, 'simpan_permohonan_gugur']);
    Route::get('projek/gugur/senarai_gugur_projek', [ProjekController::class, 'senarai_gugur_projek']);
    Route::delete('Pengesahan/{id}', [ProjekController::class, 'Pengesahan']);


    // Mai tambah
    Route::post('projek/{id}/markah', [ProjekController::class, 'markah_eph']); 
    Route::post('projek/{id}/markah-eph-rayuan', [ProjekController::class, 'markah_eph_rayuan']); 
    Route::post('projek/{id}/markah-eph-jalan', [ProjekController::class, 'markah_eph_jalan']); 
    Route::post('projek/{id}/markah-eph-jalan-rayuan', [ProjekController::class, 'markah_eph_jalan_rayuan']); 
    Route::post('projek/{id}/markah-gpss', [ProjekController::class, 'markah_gpss']); 
    Route::post('projek/{id}/markah-gpss-rayuan', [ProjekController::class, 'markah_gpss_rayuan']); 
    Route::post('projek/{id}/sah', [ProjekController::class, 'sah_projek']); 
    Route::post('projek/{id}/sah-eph-rayuan', [ProjekController::class, 'sah_projek_eph_rayuan']); 
    Route::post('projek/{id}/sah-gpss-bangunan', [ProjekController::class, 'sah_projek_gpss']);
    Route::post('projek/{id}/sah-gpss-jalan', [ProjekController::class, 'sah_projek_gpss_jalan']);
    Route::post('projek/{id}/sah-gpss-bangunan-rayuan', [ProjekController::class, 'sah_projek_gpss_rayuan']); 
    Route::post('projek/{id}/sah-gpss-jalan-rayuan', [ProjekController::class, 'sah_projek_gpss_jalan_rayuan']); 
    Route::post('projek/{id}/sah-eph-jalan-baru', [ProjekController::class, 'sah_projek_eph_jalan_baru']);
    Route::post('projek/{id}/sah-eph-jalan-naiktaraf', [ProjekController::class, 'sah_projek_eph_jalan_naiktaraf']);
    Route::post('projek/{id}/sah-eph-jalan-rayuan-baru', [ProjekController::class, 'sah_projek_eph_jalan_baru_rayuan']);
    Route::post('projek/{id}/sah-eph-jalan-rayuan-naiktaraf', [ProjekController::class, 'sah_projek_eph_jalan_naiktaraf_rayuan']);
    Route::get('projek/{id}/cetak-maklumat', [ProjekController::class, 'cetak_maklumat_projek']);
    Route::get('projek/{id}/sijil-eph-bangunan-rekabentuk', [ProjekController::class, 'sijil_eph_bangunan_rekabentuk']);
    Route::get('projek/{id}/sijil-eph-bangunan-verifikasi', [ProjekController::class, 'sijil_eph_bangunan_verifikasi']);
    Route::get('projek/{id}/sijil-eph-bangunan-validasi', [ProjekController::class, 'sijil_eph_bangunan_validasi']);
    Route::get('projek/{id}/sijil-eph-bangunan-rayuan', [ProjekController::class, 'sijil_eph_bangunan_rayuan']);
    Route::get('projek/{id}/sijil-eph-jalan-rekabentuk', [ProjekController::class, 'sijil_eph_jalan_rekabentuk']);
    Route::get('projek/{id}/sijil-eph-jalan-verifikasi', [ProjekController::class, 'sijil_eph_jalan_verifikasi']);
    Route::get('projek/{id}/sijil-eph-jalan-rayuan-rekabentuk', [ProjekController::class, 'sijil_eph_jalan_rayuan_rekabentuk']);
    Route::get('projek/{id}/sijil-eph-jalan-rayuan-verifikasi', [ProjekController::class, 'sijil_eph_jalan_rayuan_verifikasi']);
    Route::get('projek/{id}/sijil-gpss-bangunan-rekabentuk', [ProjekController::class, 'sijil_gpss_bangunan_rekabentuk']);
    Route::get('projek/{id}/sijil-gpss-bangunan-verifikasi', [ProjekController::class, 'sijil_gpss_bangunan_verifikasi']);
    Route::get('projek/{id}/sijil-gpss-bangunan-rayuan', [ProjekController::class, 'sijil_gpss_bangunan_rayuan']);
    Route::get('projek/{id}/sijil-gpss-jalan-rekabentuk', [ProjekController::class, 'sijil_gpss_jalan_rekabentuk']);
    Route::get('projek/{id}/sijil-gpss-jalan-verifikasi', [ProjekController::class, 'sijil_gpss_jalan_verifikasi']);
    Route::get('projek/{id}/sijil-gpss-jalan-rayuan', [ProjekController::class, 'sijil_gpss_jalan_rayuan']);



    Route::get('projek/{id}/pengesahan-penilaian', [ProjekController::class, 'pengesahan_penilaian']);

 





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
    
    Route::get('faq', [FaqController::class, 'senarai']); 
    Route::post('faq', [FaqController::class, 'cipta']); 
    Route::put('faq/{id}', [FaqController::class, 'kemaskini']);
    Route::get('faq/{id}', [FaqController::class, 'satu']);
    Route::delete('faq/{id}', [FaqController::class, 'buang']);    
    
    Route::get('maklumbalas', [MaklumbalasController::class, 'senarai']); 
    Route::post('maklumbalas', [MaklumbalasController::class, 'cipta']); 
    // Route::get('maklumbalas/satu/{id}', [MaklumbalasController::class, 'satu']); 
    // Route::put('maklumbalas/kemaskini/{id}', [MaklumbalasController::class, 'kemaskini']);
    Route::get('maklumbalas/papar/{id}', [MaklumbalasController::class, 'papar']);
    Route::put('maklumbalas/{id}/mesej', [MaklumbalasController::class, 'hantar_mesej']); 
    Route::delete('maklumbalas/{id}', [MaklumbalasController::class, 'buang']);    

 




    Route::get('selenggara', [UserController::class, 'selenggara']); 
    Route::post('selenggara/cipta', [UserController::class, 'cipta_peranan']); 
    // Route::get('selenggara/senarai', [UserController::class, 'senarai_selenggara_peranan']);
    Route::get('selenggara/kemaskini_peranan/{id}', [UserController::class, 'kemaskini_peranan']);
    Route::put('selenggara/simpankemaskini_peranan/{id}', [UserController::class, 'simpankemaskini_peranan']);
    Route::put('selenggara/aktif/{id}', [UserController::class, 'selenggara_aktif']); 

    Route::post('selenggara/cipta_statusprojek', [UserController::class, 'cipta_statusprojek']); 
    // Route::get('selenggara/senarai_status', [UserController::class, 'senarai_selenggara_status']);
    Route::get('selenggara/kemaskini_status/{id}', [UserController::class, 'kemaskini_status']);
    Route::put('selenggara/simpankemaskini_status/{id}', [UserController::class, 'simpankemaskini_status']);
    Route::delete('buang_status/{id}', [UserController::class, 'buang_status']);

    //selenggarakriteria
    Route::post('selenggara/cipta_kriteria', [UserController::class, 'cipta_kriteria']); 
    Route::get('selenggara/kemaskini_kriteria/{id}', [UserController::class, 'kemaskini_kriteria']);
    Route::put('selenggara/simpankemaskini_kriteria/{id}', [UserController::class, 'simpankemaskini_kriteria']);
    Route::delete('selenggara/buang_kriteria/{id}', [UserController::class, 'buang_kriteria']);    

    //selenggaragpsskriteria
    Route::post('selenggara/cipta_gpss_kriteria', [UserController::class, 'cipta_gpss_kriteria']); 
    Route::get('selenggara/kemaskini_gpss_kriteria/{id}', [UserController::class, 'kemaskini_gpss_kriteria']);
    Route::put('selenggara/simpankemaskini_gpss_kriteria/{id}', [UserController::class, 'simpankemaskini_gpss_kriteria']);
    Route::delete('selenggara/buang_gpsskriteria/{id}', [UserController::class, 'buang_gpssKriteria']);    

    //email
    Route::get('projek/{id}/gugur_projek', [ProjekController::class, 'email_gugur_projek']);

    




});


require __DIR__.'/auth.php';
