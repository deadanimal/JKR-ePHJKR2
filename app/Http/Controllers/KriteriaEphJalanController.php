<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KriteriaEphJalan;
use App\Models\Projek;

class KriteriaEphJalanController extends Controller
{
    public function simpan(Request $request) {

        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        $kriteria = KriteriaEphJalan::where('projek_id', $projek->id)->first();

        //UTK PRB PH JALAN
            //UTK SM1 TATGET POINT DESIGN
            $kriteria->SM1_1_TP_DESIGN = $request->SM1_1_TP_DESIGN;
            $kriteria->SM1_2_TP_DESIGN = $request->SM1_2_TP_DESIGN;
            $kriteria->SM1_3_TP_DESIGN = $request->SM1_3_TP_DESIGN;
            $kriteria->SM1_4_TP_DESIGN = $request->SM1_4_TP_DESIGN;
            $kriteria->SM1_5_TP_DESIGN = $request->SM1_5_TP_DESIGN;
            $kriteria->SM1_6_TP_DESIGN = $request->SM1_6_TP_DESIGN;
            $kriteria->SM1_7_TP_DESIGN = $request->SM1_7_TP_DESIGN;
            $kriteria->SM1_8_TP_DESIGN = $request->SM1_8_TP_DESIGN;
            $kriteria->SM1_9_TP_DESIGN = $request->SM1_9_TP_DESIGN;
            $kriteria->SM1_10_TP_DESIGN = $request->SM1_10_TP_DESIGN;
            $kriteria->SM1_11_TP_DESIGN = $request->SM1_11_TP_DESIGN;

            //UTK SM1 COMMENT DESIGN
            $kriteria->SM1_1_COMMENT_DESIGN = $request->SM1_1_COMMENT_DESIGN;
            $kriteria->SM1_2_COMMENT_DESIGN = $request->SM1_2_COMMENT_DESIGN;
            $kriteria->SM1_3_COMMENT_DESIGN = $request->SM1_3_COMMENT_DESIGN;
            $kriteria->SM1_4_COMMENT_DESIGN = $request->SM1_4_COMMENT_DESIGN;
            $kriteria->SM1_5_COMMENT_DESIGN = $request->SM1_5_COMMENT_DESIGN;
            $kriteria->SM1_6_COMMENT_DESIGN = $request->SM1_6_COMMENT_DESIGN;
            $kriteria->SM1_7_COMMENT_DESIGN = $request->SM1_7_COMMENT_DESIGN;
            $kriteria->SM1_8_COMMENT_DESIGN = $request->SM1_8_COMMENT_DESIGN;
            $kriteria->SM1_9_COMMENT_DESIGN = $request->SM1_9_COMMENT_DESIGN;
            $kriteria->SM1_10_COMMENT_DESIGN = $request->SM1_10_COMMENT_DESIGN;
            $kriteria->SM1_11_COMMENT_DESIGN = $request->SM1_11_COMMENT_DESIGN;

            //UTK SM2 TATGET POINT DESIGN
            $kriteria->SM2_1_TP_DESIGN = $request->SM2_1_TP_DESIGN;
            $kriteria->SM2_2_TP_DESIGN = $request->SM2_2_TP_DESIGN;
            $kriteria->SM2_3_TP_DESIGN = $request->SM2_3_TP_DESIGN;
            $kriteria->SM2_4_TP_DESIGN = $request->SM2_4_TP_DESIGN;
            $kriteria->SM2_5_TP_DESIGN = $request->SM2_5_TP_DESIGN;
            $kriteria->SM2_6_TP_DESIGN = $request->SM2_6_TP_DESIGN;
            $kriteria->SM2_7_TP_DESIGN = $request->SM2_7_TP_DESIGN;
            $kriteria->SM2_8_TP_DESIGN = $request->SM2_8_TP_DESIGN;

            //UTK SM2 COMMENT DESIGN
            $kriteria->SM2_1_COMMENT_DESIGN = $request->SM2_1_COMMENT_DESIGN;
            $kriteria->SM2_2_COMMENT_DESIGN = $request->SM2_1_COMMENT_DESIGN;
            $kriteria->SM2_3_COMMENT_DESIGN = $request->SM2_1_COMMENT_DESIGN;
            $kriteria->SM2_4_COMMENT_DESIGN = $request->SM2_1_COMMENT_DESIGN;
            $kriteria->SM2_5_COMMENT_DESIGN = $request->SM2_1_COMMENT_DESIGN;
            $kriteria->SM2_6_COMMENT_DESIGN = $request->SM2_1_COMMENT_DESIGN;
            $kriteria->SM2_7_COMMENT_DESIGN = $request->SM2_1_COMMENT_DESIGN;
            $kriteria->SM2_8_COMMENT_DESIGN = $request->SM2_1_COMMENT_DESIGN;

            //UTK SM3 TATGET POINT DESIGN
            $kriteria->SM3_1_TP_DESIGN = $request->SM3_1_TP_DESIGN;
            $kriteria->SM3_2_TP_DESIGN = $request->SM3_2_TP_DESIGN;
            $kriteria->SM3_3_TP_DESIGN = $request->SM3_3_TP_DESIGN;
            $kriteria->SM3_4_TP_DESIGN = $request->SM3_4_TP_DESIGN;
            $kriteria->SM3_5_TP_DESIGN = $request->SM3_5_TP_DESIGN;
            $kriteria->SM3_6_TP_DESIGN = $request->SM3_6_TP_DESIGN;
            

            //UTK SM3 COMMENT DESIGN
            $kriteria->SM3_1_COMMENT_DESIGN = $request->SM3_1_COMMENT_DESIGN;
            $kriteria->SM3_2_COMMENT_DESIGN = $request->SM3_2_COMMENT_DESIGN;
            $kriteria->SM3_3_COMMENT_DESIGN = $request->SM3_3_COMMENT_DESIGN;
            $kriteria->SM3_4_COMMENT_DESIGN = $request->SM3_4_COMMENT_DESIGN;
            $kriteria->SM3_5_COMMENT_DESIGN = $request->SM3_5_COMMENT_DESIGN;
            $kriteria->SM3_6_COMMENT_DESIGN = $request->SM3_6_COMMENT_DESIGN;

            //UTK SM4 TATGET POINT DESIGN
            $kriteria->SM4_1_TP_DESIGN = $request->SM4_1_TP_DESIGN;
            $kriteria->SM4_2_TP_DESIGN = $request->SM4_2_TP_DESIGN;
            $kriteria->SM4_3_TP_DESIGN = $request->SM4_3_TP_DESIGN;
            
            //UTK SM4 COMMENT DESIGN
            $kriteria->SM4_1_COMMENT_DESIGN = $request->SM4_1_COMMENT_DESIGN;
            $kriteria->SM4_2_COMMENT_DESIGN = $request->SM4_2_COMMENT_DESIGN;
            $kriteria->SM4_3_COMMENT_DESIGN = $request->SM4_3_COMMENT_DESIGN;

            //UTK PT1 TATGET POINT DESIGN
            $kriteria->PT1_1_TP_DESIGN = $request->PT1_1_TP_DESIGN;
            $kriteria->PT1_2_TP_DESIGN = $request->PT1_2_TP_DESIGN;
            $kriteria->PT1_3_TP_DESIGN = $request->PT1_3_TP_DESIGN;
            $kriteria->PT1_4_TP_DESIGN = $request->PT1_4_TP_DESIGN;
            $kriteria->PT1_5_TP_DESIGN = $request->PT1_5_TP_DESIGN;
            
            //UTK PT1 COMMENT DESIGN
            $kriteria->PT1_1_COMMENT_DESIGN = $request->PT1_1_COMMENT_DESIGN;
            $kriteria->PT1_2_COMMENT_DESIGN = $request->PT1_2_COMMENT_DESIGN;
            $kriteria->PT1_3_COMMENT_DESIGN = $request->PT1_3_COMMENT_DESIGN;
            $kriteria->PT1_4_COMMENT_DESIGN = $request->PT1_4_COMMENT_DESIGN;
            $kriteria->PT1_5_COMMENT_DESIGN = $request->PT1_5_COMMENT_DESIGN;

            //UTK PT2 TATGET POINT DESIGN
            $kriteria->PT2_1_TP_DESIGN = $request->PT2_1_TP_DESIGN;
            $kriteria->PT2_2_TP_DESIGN = $request->PT2_2_TP_DESIGN;
            $kriteria->PT2_3_TP_DESIGN = $request->PT2_3_TP_DESIGN;
            
            //UTK PT2 COMMENT DESIGN
            $kriteria->PT2_1_COMMENT_DESIGN = $request->PT2_1_COMMENT_DESIGN;
            $kriteria->PT2_2_COMMENT_DESIGN = $request->PT2_2_COMMENT_DESIGN;
            $kriteria->PT2_3_COMMENT_DESIGN = $request->PT2_3_COMMENT_DESIGN;

            //UTK PT3 TATGET POINT DESIGN
            $kriteria->PT3_1_TP_DESIGN = $request->PT3_1_TP_DESIGN;
            
            
            //UTK PT3 COMMENT DESIGN
            $kriteria->PT3_1_COMMENT_DESIGN = $request->PT3_1_COMMENT_DESIGN;

            //UTK PT4 TATGET POINT DESIGN
            $kriteria->PT4_1_TP_DESIGN = $request->PT4_1_TP_DESIGN;
            $kriteria->PT4_2_TP_DESIGN = $request->PT4_2_TP_DESIGN;
            $kriteria->PT4_3_TP_DESIGN = $request->PT4_3_TP_DESIGN;
            $kriteria->PT4_4_TP_DESIGN = $request->PT4_4_TP_DESIGN;
            
            
            //UTK PT4 COMMENT DESIGN
            $kriteria->PT4_1_COMMENT_DESIGN = $request->PT4_1_COMMENT_DESIGN;
            $kriteria->PT4_2_COMMENT_DESIGN = $request->PT4_2_COMMENT_DESIGN;
            $kriteria->PT4_3_COMMENT_DESIGN = $request->PT4_3_COMMENT_DESIGN;
            $kriteria->PT4_4_COMMENT_DESIGN = $request->PT4_4_COMMENT_DESIGN;
            
            //UTK EW1 TATGET POINT DESIGN
            $kriteria->EW1_1_TP_DESIGN = $request->EW1_1_TP_DESIGN;
            
            
            //UTK EW1 COMMENT DESIGN
            $kriteria->EW1_1_COMMENT_DESIGN = $request->EW1_1_COMMENT_DESIGN;

            //UTK EW2 TATGET POINT DESIGN
            $kriteria->EW2_1_TP_DESIGN = $request->EW2_1_TP_DESIGN;
            $kriteria->EW2_2_TP_DESIGN = $request->EW2_2_TP_DESIGN;
            
            
            //UTK EW2 COMMENT DESIGN
            $kriteria->EW2_1_COMMENT_DESIGN = $request->EW2_1_COMMENT_DESIGN;
            $kriteria->EW2_2_COMMENT_DESIGN = $request->EW2_2_COMMENT_DESIGN;

            //UTK AE1 TATGET POINT DESIGN
            $kriteria->AE1_1_TP_DESIGN = $request->AE1_1_TP_DESIGN;
            $kriteria->AE1_2_TP_DESIGN = $request->AE1_2_TP_DESIGN;
            $kriteria->AE1_3_TP_DESIGN = $request->AE1_3_TP_DESIGN;
            $kriteria->AE1_4_TP_DESIGN = $request->AE1_4_TP_DESIGN;
            
            
            //UTK AE1 COMMENT DESIGN
            $kriteria->AE1_1_COMMENT_DESIGN = $request->AE1_1_COMMENT_DESIGN;
            $kriteria->AE1_2_COMMENT_DESIGN = $request->AE1_2_COMMENT_DESIGN;
            $kriteria->AE1_3_COMMENT_DESIGN = $request->AE1_3_COMMENT_DESIGN;
            $kriteria->AE1_4_COMMENT_DESIGN = $request->AE1_4_COMMENT_DESIGN;

            //UTK CA1 TATGET POINT DESIGN
            $kriteria->CA1_1_TP_DESIGN = $request->CA1_1_TP_DESIGN;
            
            
            //UTK CA1 COMMENT DESIGN
            $kriteria->CA1_1_COMMENT_DESIGN = $request->CA1_1_TP_DESIGN;

            //UTK CA2 TATGET POINT DESIGN
            $kriteria->CA2_1_TP_DESIGN = $request->CA2_1_TP_DESIGN;
            $kriteria->CA2_2_TP_DESIGN = $request->CA2_2_TP_DESIGN;
            
            
            //UTK CA2 COMMENT DESIGN
            $kriteria->CA2_1_COMMENT_DESIGN = $request->CA2_1_COMMENT_DESIGN;
            $kriteria->CA2_2_COMMENT_DESIGN = $request->CA2_2_COMMENT_DESIGN;

            //UTK CA3 TATGET POINT DESIGN
            $kriteria->CA3_1_TP_DESIGN = $request->CA3_1_TP_DESIGN;
            $kriteria->CA3_2_TP_DESIGN = $request->CA3_2_TP_DESIGN;
            $kriteria->CA3_3_TP_DESIGN = $request->CA3_3_TP_DESIGN;
            $kriteria->CA3_4_TP_DESIGN = $request->CA3_4_TP_DESIGN;
            
            
            //UTK CA3 COMMENT DESIGN
            $kriteria->CA3_1_COMMENT_DESIGN = $request->CA3_1_COMMENT_DESIGN;
            $kriteria->CA3_2_COMMENT_DESIGN = $request->CA3_2_COMMENT_DESIGN;
            $kriteria->CA3_3_COMMENT_DESIGN = $request->CA3_3_COMMENT_DESIGN;
            $kriteria->CA3_4_COMMENT_DESIGN = $request->CA3_4_COMMENT_DESIGN;
           
            //UTK CA4 TATGET POINT DESIGN
            $kriteria->CA4_1_TP_DESIGN = $request->CA4_1_TP_DESIGN;
            $kriteria->CA4_2_TP_DESIGN = $request->CA4_2_TP_DESIGN;
            $kriteria->CA4_3_TP_DESIGN = $request->CA4_3_TP_DESIGN;
            
            //UTK CA4 COMMENT DESIGN
            $kriteria->CA4_1_COMMENT_DESIGN = $request->CA4_1_COMMENT_DESIGN;
            $kriteria->CA4_2_COMMENT_DESIGN = $request->CA4_1_COMMENT_DESIGN;
            $kriteria->CA4_3_COMMENT_DESIGN = $request->CA4_1_COMMENT_DESIGN;

            //UTK CA5 TATGET POINT DESIGN
            $kriteria->CA5_1_TP_DESIGN = $request->CA5_1_TP_DESIGN;
            
            
            //UTK CA5 COMMENT DESIGN
            $kriteria->CA5_1_COMMENT_DESIGN = $request->C5_1_COMMENT_DESIGN;

            //UTK CA6 TATGET POINT DESIGN
            $kriteria->CA6_1_TP_DESIGN = $request->CA6_1_COMMENT_DESIGN;
            
            
            //UTK CA6 COMMENT DESIGN
            $kriteria->CA6_1_COMMENT_DESIGN = $request->CA6_1_COMMENT_DESIGN;
            
            //UTK CA7 TATGET POINT DESIGN
            $kriteria->CA7_1_TP_DESIGN = $request->CA7_1_TP_DESIGN;
            $kriteria->CA7_2_TP_DESIGN = $request->CA7_2_TP_DESIGN;
            $kriteria->CA7_3_TP_DESIGN = $request->CA7_3_TP_DESIGN;
            
            //UTK CA7 COMMENT DESIGN
            $kriteria->CA7_1_COMMENT_DESIGN = $request->CA7_1_COMMENT_DESIGN;
            $kriteria->CA7_2_COMMENT_DESIGN = $request->CA7_1_COMMENT_DESIGN;
            $kriteria->CA7_3_COMMENT_DESIGN = $request->CA7_1_COMMENT_DESIGN;

            //UTK MR1 TATGET POINT DESIGN
            $kriteria->MR1_1_TP_DESIGN = $request->MR1_1_TP_DESIGN;
            $kriteria->MR1_2_TP_DESIGN = $request->MR1_2_TP_DESIGN;
            $kriteria->MR1_3_TP_DESIGN = $request->MR1_3_TP_DESIGN;
            $kriteria->MR1_4_TP_DESIGN = $request->MR1_4_TP_DESIGN;
            $kriteria->MR1_5_TP_DESIGN = $request->MR1_5_TP_DESIGN;
            
            //UTK MR1 COMMENT DESIGN
            $kriteria->MR1_1_COMMENT_DESIGN = $request->MR1_1_COMMENT_DESIGN;
            $kriteria->MR1_2_COMMENT_DESIGN = $request->MR1_2_COMMENT_DESIGN;
            $kriteria->MR1_3_COMMENT_DESIGN = $request->MR1_3_COMMENT_DESIGN;
            $kriteria->MR1_4_COMMENT_DESIGN = $request->MR1_4_COMMENT_DESIGN;
            $kriteria->MR1_5_COMMENT_DESIGN = $request->MR1_5_COMMENT_DESIGN;

            //UTK MR2 TATGET POINT DESIGN
            $kriteria->MR2_1_TP_DESIGN = $request->MR2_1_TP_DESIGN;
            $kriteria->MR2_2_TP_DESIGN = $request->MR2_2_TP_DESIGN;
            $kriteria->MR2_3_TP_DESIGN = $request->MR2_3_TP_DESIGN;
            $kriteria->MR2_4_TP_DESIGN = $request->MR2_4_TP_DESIGN;
            
            
            //UTK MR2 COMMENT DESIGN
            $kriteria->MR2_1_COMMENT_DESIGN = $request->MR2_1_COMMENT_DESIGN;
            $kriteria->MR2_2_COMMENT_DESIGN = $request->MR2_2_COMMENT_DESIGN;
            $kriteria->MR2_3_COMMENT_DESIGN = $request->MR2_3_COMMENT_DESIGN;
            $kriteria->MR2_4_COMMENT_DESIGN = $request->MR2_4_COMMENT_DESIGN;
            
            //UTK MR3 TATGET POINT DESIGN
            $kriteria->MR3_1_TP_DESIGN = $request->MR3_1_TP_DESIGN;
            $kriteria->MR3_2_TP_DESIGN = $request->MR3_2_TP_DESIGN;
            
            
            //UTK MR3 COMMENT DESIGN
            $kriteria->MR3_1_COMMENT_DESIGN = $request->MR3_1_COMMENT_DESIGN;
            $kriteria->MR3_2_COMMENT_DESIGN = $request->MR3_2_COMMENT_DESIGN;

            //UTK MR4 TATGET POINT DESIGN
            $kriteria->MR4_1_TP_DESIGN = $request->MR4_1_TP_DESIGN;
            
            
            //UTK MR4 COMMENT DESIGN
            $kriteria->MR4_1_COMMENT_DESIGN = $request->MR4_1_COMMENT_DESIGN;

            //UTK ECSM5_EC TATGET POINT DESIGN
            $kriteria->ECSM5_EC_1_TP_DESIGN = $request->ECSM5_EC_1_TP_DESIGN;
            $kriteria->ECSM5_EC_2_TP_DESIGN = $request->ECSM5_EC_2_TP_DESIGN;
            $kriteria->ECSM5_EC_3_TP_DESIGN = $request->ECSM5_EC_3_TP_DESIGN;
            
            //UTK ECSM5_EC COMMENT DESIGN
            $kriteria->ECSM5_EC_1_COMMENT_DESIGN = $request->ECSM5_EC_1_COMMENT_DESIGN;
            $kriteria->ECSM5_EC_2_COMMENT_DESIGN = $request->ECSM5_EC_2_COMMENT_DESIGN;
            $kriteria->ECSM5_EC_3_COMMENT_DESIGN = $request->ECSM5_EC_3_COMMENT_DESIGN;

            //UTK ECSM6_EC TATGET POINT DESIGN
            $kriteria->ECSM6_EC_1_TP_DESIGN = $request->ECSM6_EC_1_TP_DESIGN;
            $kriteria->ECSM6_EC_2_TP_DESIGN = $request->ECSM6_EC_1_TP_DESIGN;
            $kriteria->ECSM6_EC_3_TP_DESIGN = $request->ECSM6_EC_1_TP_DESIGN;
            
            //UTK ECSM6_EC COMMENT DESIGN
            $kriteria->ECSM6_EC_1_COMMENT_DESIGN = $request->ECSM6_EC_1_COMMENT_DESIGN;
            $kriteria->ECSM6_EC_2_COMMENT_DESIGN = $request->ECSM6_EC_2_COMMENT_DESIGN;
            $kriteria->ECSM6_EC_3_COMMENT_DESIGN = $request->ECSM6_EC_3_COMMENT_DESIGN;

            //UTK ECEW3_EC TATGET POINT DESIGN
            $kriteria->ECEW3_EC_1_TP_DESIGN = $request->ECEW3_EC_1_TP_DESIGN;
            
            
            //UTK ECEW3_EC COMMENT DESIGN
            $kriteria->ECEW3_EC_1_COMMENT_DESIGN = $request->ECEW3_EC_1_TP_DESIGN;

            //UTK ECAE2_EC TATGET POINT DESIGN
            $kriteria->ECAE2_EC_1_TP_DESIGN = $request->ECAE2_EC_1_TP_DESIGN;
            
            
            //UTK ECAE2_EC COMMENT DESIGN
            $kriteria->ECAE2_EC_1_COMMENT_DESIGN = $request->ECAE2_EC_1_COMMENT_DESIGN;

            //UTK ECAE3_EC TATGET POINT DESIGN
            $kriteria->ECAE3_EC_1_TP_DESIGN = $request->ECAE3_EC_1_TP_DESIGN;
            $kriteria->ECAE3_EC_2_TP_DESIGN = $request->ECAE3_EC_2_TP_DESIGN;
            $kriteria->ECAE3_EC_3_TP_DESIGN = $request->ECAE3_EC_3_TP_DESIGN;
            $kriteria->ECAE3_EC_4_TP_DESIGN = $request->ECAE3_EC_4_TP_DESIGN;
            
            
            //UTK ECAE3_EC COMMENT DESIGN
            $kriteria->ECAE3_EC_1_COMMENT_DESIGN = $request->ECAE3_EC_1_COMMENT_DESIGN;
            $kriteria->ECAE3_EC_2_COMMENT_DESIGN = $request->ECAE3_EC_2_COMMENT_DESIGN;
            $kriteria->ECAE3_EC_3_COMMENT_DESIGN = $request->ECAE3_EC_3_COMMENT_DESIGN;
            $kriteria->ECAE3_EC_4_COMMENT_DESIGN = $request->ECAE3_EC_4_COMMENT_DESIGN;

            //UTK ECAE4_EC TATGET POINT DESIGN
            $kriteria->ECAE4_EC_1_TP_DESIGN = $request->ECAE4_EC_TP_DESIGN;
            $kriteria->ECAE4_EC_2_TP_DESIGN = $request->ECAE4_EC_TP_DESIGN;
            $kriteria->ECAE4_EC_3_TP_DESIGN = $request->ECAE4_EC_TP_DESIGN;
            $kriteria->ECAE4_EC_4_TP_DESIGN = $request->ECAE4_EC_TP_DESIGN;
            
            
            //UTK ECAE4_EC COMMENT DESIGN
            $kriteria->ECAE4_EC_1_COMMENT_DESIGN = $request->ECAE4_EC_1_COMMENT_DESIGN;
            $kriteria->ECAE4_EC_2_COMMENT_DESIGN = $request->ECAE4_EC_2_COMMENT_DESIGN;
            $kriteria->ECAE4_EC_3_COMMENT_DESIGN = $request->ECAE4_EC_3_COMMENT_DESIGN;
            $kriteria->ECAE4_EC_4_COMMENT_DESIGN = $request->ECAE4_EC_4_COMMENT_DESIGN;

            //UTK ECAE5_EC TATGET POINT DESIGN
            $kriteria->ECAE5_EC_1_TP_DESIGN = $request->ECAE5_EC_1_TP_DESIGN;
            
            
            //UTK ECAE5_EC COMMENT DESIGN
            $kriteria->ECAE5_EC_1_COMMENT_DESIGN = $request->ECAE5_EC_1_COMMENT_DESIGN;

            //UTK ECAE6_EC TATGET POINT DESIGN
            $kriteria->ECAE6_EC_1_TP_DESIGN = $request->ECAE6_EC_1_TP_DESIGN;
            $kriteria->ECAE6_EC_2_TP_DESIGN = $request->ECAE6_EC_2_TP_DESIGN;
            
            
            //UTK ECAE6_EC COMMENT DESIGN
            $kriteria->ECAE6_EC_1_COMMENT_DESIGN = $request->ECAE6_EC_1_COMMENT_DESIGN;
            $kriteria->ECAE6_EC_2_COMMENT_DESIGN = $request->ECAE6_EC_2_COMMENT_DESIGN;

            //UTK IN1 TATGET POINT DESIGN
            $kriteria->IN1_1_TP_DESIGN = $request->IN1_1_TP_DESIGN;
            
            
            //UTK IN1 COMMENT DESIGN
            $kriteria->IN1_1_COMMENT_DESIGN = $request->IN1_1_TP_DESIGN;


            //UTK VERIFIKASI PH JALAN
            //UTK SM1 TATGET POINT VERIFIKASI
            $kriteria->SM1_1_TP_VERIFIKASI = $request->SM1_1_TP_VERIFIKASI;
            $kriteria->SM1_2_TP_VERIFIKASI = $request->SM1_2_TP_VERIFIKASI;
            $kriteria->SM1_3_TP_VERIFIKASI = $request->SM1_3_TP_VERIFIKASI;
            $kriteria->SM1_4_TP_VERIFIKASI = $request->SM1_4_TP_VERIFIKASI;
            $kriteria->SM1_5_TP_VERIFIKASI = $request->SM1_5_TP_VERIFIKASI;
            $kriteria->SM1_6_TP_VERIFIKASI = $request->SM1_6_TP_VERIFIKASI;
            $kriteria->SM1_7_TP_VERIFIKASI = $request->SM1_7_TP_VERIFIKASI;
            $kriteria->SM1_8_TP_VERIFIKASI = $request->SM1_8_TP_VERIFIKASI;
            $kriteria->SM1_9_TP_VERIFIKASI = $request->SM1_9_TP_VERIFIKASI;
            $kriteria->SM1_10_TP_VERIFIKASI = $request->SM1_10_TP_VERIFIKASI;
            $kriteria->SM1_11_TP_VERIFIKASI = $request->SM1_11_TP_VERIFIKASI;

            //UTK SM1 COMMENT VERIFIKASI
            $kriteria->SM1_1_COMMENT_VERIFIKASI = $request->SM1_1_COMMENT_VERIFIKASI;
            $kriteria->SM1_2_COMMENT_VERIFIKASI = $request->SM1_2_COMMENT_VERIFIKASI;
            $kriteria->SM1_3_COMMENT_VERIFIKASI = $request->SM1_3_COMMENT_VERIFIKASI;
            $kriteria->SM1_4_COMMENT_VERIFIKASI = $request->SM1_4_COMMENT_VERIFIKASI;
            $kriteria->SM1_5_COMMENT_VERIFIKASI = $request->SM1_5_COMMENT_VERIFIKASI;
            $kriteria->SM1_6_COMMENT_VERIFIKASI = $request->SM1_6_COMMENT_VERIFIKASI;
            $kriteria->SM1_7_COMMENT_VERIFIKASI = $request->SM1_7_COMMENT_VERIFIKASI;
            $kriteria->SM1_8_COMMENT_VERIFIKASI = $request->SM1_8_COMMENT_VERIFIKASI;
            $kriteria->SM1_9_COMMENT_VERIFIKASI = $request->SM1_9_COMMENT_VERIFIKASI;
            $kriteria->SM1_10_COMMENT_VERIFIKASI = $request->SM1_10_COMMENT_VERIFIKASI;
            $kriteria->SM1_11_COMMENT_VERIFIKASI = $request->SM1_11_COMMENT_VERIFIKASI;

            //UTK SM2 TATGET POINT VERIFIKASI
            $kriteria->SM2_1_TP_VERIFIKASI = $request->SM2_1_TP_VERIFIKASI;
            $kriteria->SM2_2_TP_VERIFIKASI = $request->SM2_2_TP_VERIFIKASI;
            $kriteria->SM2_3_TP_VERIFIKASI = $request->SM2_3_TP_VERIFIKASI;
            $kriteria->SM2_4_TP_VERIFIKASI = $request->SM2_4_TP_VERIFIKASI;
            $kriteria->SM2_5_TP_VERIFIKASI = $request->SM2_5_TP_VERIFIKASI;
            $kriteria->SM2_6_TP_VERIFIKASI = $request->SM2_6_TP_VERIFIKASI;
            $kriteria->SM2_7_TP_VERIFIKASI = $request->SM2_7_TP_VERIFIKASI;
            $kriteria->SM2_8_TP_VERIFIKASI = $request->SM2_8_TP_VERIFIKASI;

            //UTK SM2 COMMENT VERIFIKASI
            $kriteria->SM2_1_COMMENT_VERIFIKASI = $request->SM2_1_COMMENT_VERIFIKASI;
            $kriteria->SM2_2_COMMENT_VERIFIKASI = $request->SM2_1_COMMENT_VERIFIKASI;
            $kriteria->SM2_3_COMMENT_VERIFIKASI = $request->SM2_1_COMMENT_VERIFIKASI;
            $kriteria->SM2_4_COMMENT_VERIFIKASI = $request->SM2_1_COMMENT_VERIFIKASI;
            $kriteria->SM2_5_COMMENT_VERIFIKASI = $request->SM2_1_COMMENT_VERIFIKASI;
            $kriteria->SM2_6_COMMENT_VERIFIKASI = $request->SM2_1_COMMENT_VERIFIKASI;
            $kriteria->SM2_7_COMMENT_VERIFIKASI = $request->SM2_1_COMMENT_VERIFIKASI;
            $kriteria->SM2_8_COMMENT_VERIFIKASI = $request->SM2_1_COMMENT_VERIFIKASI;

            //UTK SM3 TATGET POINT VERIFIKASI
            $kriteria->SM3_1_TP_VERIFIKASI = $request->SM3_1_TP_VERIFIKASI;
            $kriteria->SM3_2_TP_VERIFIKASI = $request->SM3_2_TP_VERIFIKASI;
            $kriteria->SM3_3_TP_VERIFIKASI = $request->SM3_3_TP_VERIFIKASI;
            $kriteria->SM3_4_TP_VERIFIKASI = $request->SM3_4_TP_VERIFIKASI;
            $kriteria->SM3_5_TP_VERIFIKASI = $request->SM3_5_TP_VERIFIKASI;
            $kriteria->SM3_6_TP_VERIFIKASI = $request->SM3_6_TP_VERIFIKASI;
            

            //UTK SM3 COMMENT VERIFIKASI
            $kriteria->SM3_1_COMMENT_VERIFIKASI = $request->SM3_1_COMMENT_VERIFIKASI;
            $kriteria->SM3_2_COMMENT_VERIFIKASI = $request->SM3_2_COMMENT_VERIFIKASI;
            $kriteria->SM3_3_COMMENT_VERIFIKASI = $request->SM3_3_COMMENT_VERIFIKASI;
            $kriteria->SM3_4_COMMENT_VERIFIKASI = $request->SM3_4_COMMENT_VERIFIKASI;
            $kriteria->SM3_5_COMMENT_VERIFIKASI = $request->SM3_5_COMMENT_VERIFIKASI;
            $kriteria->SM3_6_COMMENT_VERIFIKASI = $request->SM3_6_COMMENT_VERIFIKASI;

            //UTK SM4 TATGET POINT VERIFIKASI
            $kriteria->SM4_1_TP_VERIFIKASI = $request->SM4_1_TP_VERIFIKASI;
            $kriteria->SM4_2_TP_VERIFIKASI = $request->SM4_2_TP_VERIFIKASI;
            $kriteria->SM4_3_TP_VERIFIKASI = $request->SM4_3_TP_VERIFIKASI;
            
            //UTK SM4 COMMENT VERIFIKASI
            $kriteria->SM4_1_COMMENT_VERIFIKASI = $request->SM4_1_COMMENT_VERIFIKASI;
            $kriteria->SM4_2_COMMENT_VERIFIKASI = $request->SM4_2_COMMENT_VERIFIKASI;
            $kriteria->SM4_3_COMMENT_VERIFIKASI = $request->SM4_3_COMMENT_VERIFIKASI;

            //UTK PT1 TATGET POINT VERIFIKASI
            $kriteria->PT1_1_TP_VERIFIKASI = $request->PT1_1_TP_VERIFIKASI;
            $kriteria->PT1_2_TP_VERIFIKASI = $request->PT1_2_TP_VERIFIKASI;
            $kriteria->PT1_3_TP_VERIFIKASI = $request->PT1_3_TP_VERIFIKASI;
            $kriteria->PT1_4_TP_VERIFIKASI = $request->PT1_4_TP_VERIFIKASI;
            $kriteria->PT1_5_TP_VERIFIKASI = $request->PT1_5_TP_VERIFIKASI;
            
            //UTK PT1 COMMENT VERIFIKASI
            $kriteria->PT1_1_COMMENT_VERIFIKASI = $request->PT1_1_COMMENT_VERIFIKASI;
            $kriteria->PT1_2_COMMENT_VERIFIKASI = $request->PT1_2_COMMENT_VERIFIKASI;
            $kriteria->PT1_3_COMMENT_VERIFIKASI = $request->PT1_3_COMMENT_VERIFIKASI;
            $kriteria->PT1_4_COMMENT_VERIFIKASI = $request->PT1_4_COMMENT_VERIFIKASI;
            $kriteria->PT1_5_COMMENT_VERIFIKASI = $request->PT1_5_COMMENT_VERIFIKASI;

            //UTK PT2 TATGET POINT VERIFIKASI
            $kriteria->PT2_1_TP_VERIFIKASI = $request->PT2_1_TP_VERIFIKASI;
            $kriteria->PT2_2_TP_VERIFIKASI = $request->PT2_2_TP_VERIFIKASI;
            $kriteria->PT2_3_TP_VERIFIKASI = $request->PT2_3_TP_VERIFIKASI;
            
            //UTK PT2 COMMENT VERIFIKASI
            $kriteria->PT2_1_COMMENT_VERIFIKASI = $request->PT2_1_COMMENT_VERIFIKASI;
            $kriteria->PT2_2_COMMENT_VERIFIKASI = $request->PT2_2_COMMENT_VERIFIKASI;
            $kriteria->PT2_3_COMMENT_VERIFIKASI = $request->PT2_3_COMMENT_VERIFIKASI;

            //UTK PT3 TATGET POINT VERIFIKASI
            $kriteria->PT3_1_TP_VERIFIKASI = $request->PT3_1_TP_VERIFIKASI;
            
            
            //UTK PT3 COMMENT VERIFIKASI
            $kriteria->PT3_1_COMMENT_VERIFIKASI = $request->PT3_1_COMMENT_VERIFIKASI;

            //UTK PT4 TATGET POINT VERIFIKASI
            $kriteria->PT4_1_TP_VERIFIKASI = $request->PT4_1_TP_VERIFIKASI;
            $kriteria->PT4_2_TP_VERIFIKASI = $request->PT4_2_TP_VERIFIKASI;
            $kriteria->PT4_3_TP_VERIFIKASI = $request->PT4_3_TP_VERIFIKASI;
            $kriteria->PT4_4_TP_VERIFIKASI = $request->PT4_4_TP_VERIFIKASI;
            
            
            //UTK PT4 COMMENT VERIFIKASI
            $kriteria->PT4_1_COMMENT_VERIFIKASI = $request->PT4_1_COMMENT_VERIFIKASI;
            $kriteria->PT4_2_COMMENT_VERIFIKASI = $request->PT4_2_COMMENT_VERIFIKASI;
            $kriteria->PT4_3_COMMENT_VERIFIKASI = $request->PT4_3_COMMENT_VERIFIKASI;
            $kriteria->PT4_4_COMMENT_VERIFIKASI = $request->PT4_4_COMMENT_VERIFIKASI;
            
            //UTK EW1 TATGET POINT VERIFIKASI
            $kriteria->EW1_1_TP_VERIFIKASI = $request->EW1_1_TP_VERIFIKASI;
            
            
            //UTK EW1 COMMENT VERIFIKASI
            $kriteria->EW1_1_COMMENT_VERIFIKASI = $request->EW1_1_COMMENT_VERIFIKASI;

            //UTK EW2 TATGET POINT VERIFIKASI
            $kriteria->EW2_1_TP_VERIFIKASI = $request->EW2_1_TP_VERIFIKASI;
            $kriteria->EW2_2_TP_VERIFIKASI = $request->EW2_2_TP_VERIFIKASI;
            
            
            //UTK EW2 COMMENT VERIFIKASI
            $kriteria->EW2_1_COMMENT_VERIFIKASI = $request->EW2_1_COMMENT_VERIFIKASI;
            $kriteria->EW2_2_COMMENT_VERIFIKASI = $request->EW2_2_COMMENT_VERIFIKASI;

            //UTK AE1 TATGET POINT VERIFIKASI
            $kriteria->AE1_1_TP_VERIFIKASI = $request->AE1_1_TP_VERIFIKASI;
            $kriteria->AE1_2_TP_VERIFIKASI = $request->AE1_2_TP_VERIFIKASI;
            $kriteria->AE1_3_TP_VERIFIKASI = $request->AE1_3_TP_VERIFIKASI;
            $kriteria->AE1_4_TP_VERIFIKASI = $request->AE1_4_TP_VERIFIKASI;
            
            
            //UTK AE1 COMMENT VERIFIKASI
            $kriteria->AE1_1_COMMENT_VERIFIKASI = $request->AE1_1_COMMENT_VERIFIKASI;
            $kriteria->AE1_2_COMMENT_VERIFIKASI = $request->AE1_2_COMMENT_VERIFIKASI;
            $kriteria->AE1_3_COMMENT_VERIFIKASI = $request->AE1_3_COMMENT_VERIFIKASI;
            $kriteria->AE1_4_COMMENT_VERIFIKASI = $request->AE1_4_COMMENT_VERIFIKASI;

            //UTK CA1 TATGET POINT VERIFIKASI
            $kriteria->CA1_1_TP_VERIFIKASI = $request->CA1_1_TP_VERIFIKASI;
            
            
            //UTK CA1 COMMENT VERIFIKASI
            $kriteria->CA1_1_COMMENT_VERIFIKASI = $request->CA1_1_TP_VERIFIKASI;

            //UTK CA2 TATGET POINT VERIFIKASI
            $kriteria->CA2_1_TP_VERIFIKASI = $request->CA2_1_TP_VERIFIKASI;
            $kriteria->CA2_2_TP_VERIFIKASI = $request->CA2_2_TP_VERIFIKASI;
            
            
            //UTK CA2 COMMENT VERIFIKASI
            $kriteria->CA2_1_COMMENT_VERIFIKASI = $request->CA2_1_COMMENT_VERIFIKASI;
            $kriteria->CA2_2_COMMENT_VERIFIKASI = $request->CA2_2_COMMENT_VERIFIKASI;

            //UTK CA3 TATGET POINT VERIFIKASI
            $kriteria->CA3_1_TP_VERIFIKASI = $request->CA3_1_TP_VERIFIKASI;
            $kriteria->CA3_2_TP_VERIFIKASI = $request->CA3_2_TP_VERIFIKASI;
            $kriteria->CA3_3_TP_VERIFIKASI = $request->CA3_3_TP_VERIFIKASI;
            $kriteria->CA3_4_TP_VERIFIKASI = $request->CA3_4_TP_VERIFIKASI;
            
            
            //UTK CA3 COMMENT VERIFIKASI
            $kriteria->CA3_1_COMMENT_VERIFIKASI = $request->CA3_1_COMMENT_VERIFIKASI;
            $kriteria->CA3_2_COMMENT_VERIFIKASI = $request->CA3_2_COMMENT_VERIFIKASI;
            $kriteria->CA3_3_COMMENT_VERIFIKASI = $request->CA3_3_COMMENT_VERIFIKASI;
            $kriteria->CA3_4_COMMENT_VERIFIKASI = $request->CA3_4_COMMENT_VERIFIKASI;
           
            //UTK CA4 TATGET POINT VERIFIKASI
            $kriteria->CA4_1_TP_VERIFIKASI = $request->CA4_1_TP_VERIFIKASI;
            $kriteria->CA4_2_TP_VERIFIKASI = $request->CA4_2_TP_VERIFIKASI;
            $kriteria->CA4_3_TP_VERIFIKASI = $request->CA4_3_TP_VERIFIKASI;
            
            //UTK CA4 COMMENT VERIFIKASI
            $kriteria->CA4_1_COMMENT_VERIFIKASI = $request->CA4_1_COMMENT_VERIFIKASI;
            $kriteria->CA4_2_COMMENT_VERIFIKASI = $request->CA4_1_COMMENT_VERIFIKASI;
            $kriteria->CA4_3_COMMENT_VERIFIKASI = $request->CA4_1_COMMENT_VERIFIKASI;

            //UTK CA5 TATGET POINT VERIFIKASI
            $kriteria->CA5_1_TP_VERIFIKASI = $request->CA5_1_TP_VERIFIKASI;
            
            
            //UTK CA5 COMMENT VERIFIKASI
            $kriteria->CA5_1_COMMENT_VERIFIKASI = $request->C5_1_COMMENT_VERIFIKASI;

            //UTK CA6 TATGET POINT VERIFIKASI
            $kriteria->CA6_1_TP_VERIFIKASI = $request->CA6_1_COMMENT_VERIFIKASI;
            
            
            //UTK CA6 COMMENT VERIFIKASI
            $kriteria->CA6_1_COMMENT_VERIFIKASI = $request->CA6_1_COMMENT_VERIFIKASI;
            
            //UTK CA7 TATGET POINT VERIFIKASI
            $kriteria->CA7_1_TP_VERIFIKASI = $request->CA7_1_TP_VERIFIKASI;
            $kriteria->CA7_2_TP_VERIFIKASI = $request->CA7_2_TP_VERIFIKASI;
            $kriteria->CA7_3_TP_VERIFIKASI = $request->CA7_3_TP_VERIFIKASI;
            
            //UTK CA7 COMMENT VERIFIKASI
            $kriteria->CA7_1_COMMENT_VERIFIKASI = $request->CA7_1_COMMENT_VERIFIKASI;
            $kriteria->CA7_2_COMMENT_VERIFIKASI = $request->CA7_1_COMMENT_VERIFIKASI;
            $kriteria->CA7_3_COMMENT_VERIFIKASI = $request->CA7_1_COMMENT_VERIFIKASI;

            //UTK MR1 TATGET POINT VERIFIKASI
            $kriteria->MR1_1_TP_VERIFIKASI = $request->MR1_1_TP_VERIFIKASI;
            $kriteria->MR1_2_TP_VERIFIKASI = $request->MR1_2_TP_VERIFIKASI;
            $kriteria->MR1_3_TP_VERIFIKASI = $request->MR1_3_TP_VERIFIKASI;
            $kriteria->MR1_4_TP_VERIFIKASI = $request->MR1_4_TP_VERIFIKASI;
            $kriteria->MR1_5_TP_VERIFIKASI = $request->MR1_5_TP_VERIFIKASI;
            
            //UTK MR1 COMMENT VERIFIKASI
            $kriteria->MR1_1_COMMENT_VERIFIKASI = $request->MR1_1_COMMENT_VERIFIKASI;
            $kriteria->MR1_2_COMMENT_VERIFIKASI = $request->MR1_2_COMMENT_VERIFIKASI;
            $kriteria->MR1_3_COMMENT_VERIFIKASI = $request->MR1_3_COMMENT_VERIFIKASI;
            $kriteria->MR1_4_COMMENT_VERIFIKASI = $request->MR1_4_COMMENT_VERIFIKASI;
            $kriteria->MR1_5_COMMENT_VERIFIKASI = $request->MR1_5_COMMENT_VERIFIKASI;

            //UTK MR2 TATGET POINT VERIFIKASI
            $kriteria->MR2_1_TP_VERIFIKASI = $request->MR2_1_TP_VERIFIKASI;
            $kriteria->MR2_2_TP_VERIFIKASI = $request->MR2_2_TP_VERIFIKASI;
            $kriteria->MR2_3_TP_VERIFIKASI = $request->MR2_3_TP_VERIFIKASI;
            $kriteria->MR2_4_TP_VERIFIKASI = $request->MR2_4_TP_VERIFIKASI;
            
            
            //UTK MR2 COMMENT VERIFIKASI
            $kriteria->MR2_1_COMMENT_VERIFIKASI = $request->MR2_1_COMMENT_VERIFIKASI;
            $kriteria->MR2_2_COMMENT_VERIFIKASI = $request->MR2_2_COMMENT_VERIFIKASI;
            $kriteria->MR2_3_COMMENT_VERIFIKASI = $request->MR2_3_COMMENT_VERIFIKASI;
            $kriteria->MR2_4_COMMENT_VERIFIKASI = $request->MR2_4_COMMENT_VERIFIKASI;
            
            //UTK MR3 TATGET POINT VERIFIKASI
            $kriteria->MR3_1_TP_VERIFIKASI = $request->MR3_1_TP_VERIFIKASI;
            $kriteria->MR3_2_TP_VERIFIKASI = $request->MR3_2_TP_VERIFIKASI;
            
            
            //UTK MR3 COMMENT VERIFIKASI
            $kriteria->MR3_1_COMMENT_VERIFIKASI = $request->MR3_1_COMMENT_VERIFIKASI;
            $kriteria->MR3_2_COMMENT_VERIFIKASI = $request->MR3_2_COMMENT_VERIFIKASI;

            //UTK MR4 TATGET POINT VERIFIKASI
            $kriteria->MR4_1_TP_VERIFIKASI = $request->MR4_1_TP_VERIFIKASI;
            
            
            //UTK MR4 COMMENT VERIFIKASI
            $kriteria->MR4_1_COMMENT_VERIFIKASI = $request->MR4_1_COMMENT_VERIFIKASI;

            //UTK ECSM5_EC TATGET POINT VERIFIKASI
            $kriteria->ECSM5_EC_1_TP_VERIFIKASI = $request->ECSM5_EC_1_TP_VERIFIKASI;
            $kriteria->ECSM5_EC_2_TP_VERIFIKASI = $request->ECSM5_EC_2_TP_VERIFIKASI;
            $kriteria->ECSM5_EC_3_TP_VERIFIKASI = $request->ECSM5_EC_3_TP_VERIFIKASI;
            
            //UTK ECSM5_EC COMMENT VERIFIKASI
            $kriteria->ECSM5_EC_1_COMMENT_VERIFIKASI = $request->ECSM5_EC_1_COMMENT_VERIFIKASI;
            $kriteria->ECSM5_EC_2_COMMENT_VERIFIKASI = $request->ECSM5_EC_2_COMMENT_VERIFIKASI;
            $kriteria->ECSM5_EC_3_COMMENT_VERIFIKASI = $request->ECSM5_EC_3_COMMENT_VERIFIKASI;

            //UTK ECSM6_EC TATGET POINT VERIFIKASI
            $kriteria->ECSM6_EC_1_TP_VERIFIKASI = $request->ECSM6_EC_1_TP_VERIFIKASI;
            $kriteria->ECSM6_EC_2_TP_VERIFIKASI = $request->ECSM6_EC_1_TP_VERIFIKASI;
            $kriteria->ECSM6_EC_3_TP_VERIFIKASI = $request->ECSM6_EC_1_TP_VERIFIKASI;
            
            //UTK ECSM6_EC COMMENT VERIFIKASI
            $kriteria->ECSM6_EC_1_COMMENT_VERIFIKASI = $request->ECSM6_EC_1_COMMENT_VERIFIKASI;
            $kriteria->ECSM6_EC_2_COMMENT_VERIFIKASI = $request->ECSM6_EC_2_COMMENT_VERIFIKASI;
            $kriteria->ECSM6_EC_3_COMMENT_VERIFIKASI = $request->ECSM6_EC_3_COMMENT_VERIFIKASI;

            //UTK ECEW3_EC TATGET POINT VERIFIKASI
            $kriteria->ECEW3_EC_1_TP_VERIFIKASI = $request->ECEW3_EC_1_TP_VERIFIKASI;
            
            
            //UTK ECEW3_EC COMMENT VERIFIKASI
            $kriteria->ECEW3_EC_1_COMMENT_VERIFIKASI = $request->ECEW3_EC_1_TP_VERIFIKASI;

            //UTK ECAE2_EC TATGET POINT VERIFIKASI
            $kriteria->ECAE2_EC_1_TP_VERIFIKASI = $request->ECAE2_EC_1_TP_VERIFIKASI;
            
            
            //UTK ECAE2_EC COMMENT VERIFIKASI
            $kriteria->ECAE2_EC_1_COMMENT_VERIFIKASI = $request->ECAE2_EC_1_COMMENT_VERIFIKASI;

            //UTK ECAE3_EC TATGET POINT VERIFIKASI
            $kriteria->ECAE3_EC_1_TP_VERIFIKASI = $request->ECAE3_EC_1_TP_VERIFIKASI;
            $kriteria->ECAE3_EC_2_TP_VERIFIKASI = $request->ECAE3_EC_2_TP_VERIFIKASI;
            $kriteria->ECAE3_EC_3_TP_VERIFIKASI = $request->ECAE3_EC_3_TP_VERIFIKASI;
            $kriteria->ECAE3_EC_4_TP_VERIFIKASI = $request->ECAE3_EC_4_TP_VERIFIKASI;
            
            
            //UTK ECAE3_EC COMMENT VERIFIKASI
            $kriteria->ECAE3_EC_1_COMMENT_VERIFIKASI = $request->ECAE3_EC_1_COMMENT_VERIFIKASI;
            $kriteria->ECAE3_EC_2_COMMENT_VERIFIKASI = $request->ECAE3_EC_2_COMMENT_VERIFIKASI;
            $kriteria->ECAE3_EC_3_COMMENT_VERIFIKASI = $request->ECAE3_EC_3_COMMENT_VERIFIKASI;
            $kriteria->ECAE3_EC_4_COMMENT_VERIFIKASI = $request->ECAE3_EC_4_COMMENT_VERIFIKASI;

            //UTK ECAE4_EC TATGET POINT VERIFIKASI
            $kriteria->ECAE4_EC_1_TP_VERIFIKASI = $request->ECAE4_EC_TP_VERIFIKASI;
            $kriteria->ECAE4_EC_2_TP_VERIFIKASI = $request->ECAE4_EC_TP_VERIFIKASI;
            $kriteria->ECAE4_EC_3_TP_VERIFIKASI = $request->ECAE4_EC_TP_VERIFIKASI;
            $kriteria->ECAE4_EC_4_TP_VERIFIKASI = $request->ECAE4_EC_TP_VERIFIKASI;
            
            
            //UTK ECAE4_EC COMMENT VERIFIKASI
            $kriteria->ECAE4_EC_1_COMMENT_VERIFIKASI = $request->ECAE4_EC_1_COMMENT_VERIFIKASI;
            $kriteria->ECAE4_EC_2_COMMENT_VERIFIKASI = $request->ECAE4_EC_2_COMMENT_VERIFIKASI;
            $kriteria->ECAE4_EC_3_COMMENT_VERIFIKASI = $request->ECAE4_EC_3_COMMENT_VERIFIKASI;
            $kriteria->ECAE4_EC_4_COMMENT_VERIFIKASI = $request->ECAE4_EC_4_COMMENT_VERIFIKASI;

            //UTK ECAE5_EC TATGET POINT VERIFIKASI
            $kriteria->ECAE5_EC_1_TP_VERIFIKASI = $request->ECAE5_EC_1_TP_VERIFIKASI;
            
            
            //UTK ECAE5_EC COMMENT VERIFIKASI
            $kriteria->ECAE5_EC_1_COMMENT_VERIFIKASI = $request->ECAE5_EC_1_COMMENT_VERIFIKASI;

            //UTK ECAE6_EC TATGET POINT VERIFIKASI
            $kriteria->ECAE6_EC_1_TP_VERIFIKASI = $request->ECAE6_EC_1_TP_VERIFIKASI;
            $kriteria->ECAE6_EC_2_TP_VERIFIKASI = $request->ECAE6_EC_2_TP_VERIFIKASI;
            
            
            //UTK ECAE6_EC COMMENT VERIFIKASI
            $kriteria->ECAE6_EC_1_COMMENT_VERIFIKASI = $request->ECAE6_EC_1_COMMENT_VERIFIKASI;
            $kriteria->ECAE6_EC_2_COMMENT_VERIFIKASI = $request->ECAE6_EC_2_COMMENT_VERIFIKASI;

            //UTK IN1 TATGET POINT VERIFIKASI
            $kriteria->IN1_1_TP_VERIFIKASI = $request->IN1_1_TP_VERIFIKASI;
            
            
            //UTK IN1 COMMENT VERIFIKASI
            $kriteria->IN1_1_COMMENT_VERIFIKASI = $request->IN1_1_TP_VERIFIKASI;


            //UTK BORANG RAYUAN PH JALAN
            //UTK SM1 TATGET POINT DESIGN_RAYUAN
            $kriteria->SM1_1_TP_DESIGN_RAYUAN = $request->SM1_1_TP_DESIGN_RAYUAN;
            $kriteria->SM1_2_TP_DESIGN_RAYUAN = $request->SM1_2_TP_DESIGN_RAYUAN;
            $kriteria->SM1_3_TP_DESIGN_RAYUAN = $request->SM1_3_TP_DESIGN_RAYUAN;
            $kriteria->SM1_4_TP_DESIGN_RAYUAN = $request->SM1_4_TP_DESIGN_RAYUAN;
            $kriteria->SM1_5_TP_DESIGN_RAYUAN = $request->SM1_5_TP_DESIGN_RAYUAN;
            $kriteria->SM1_6_TP_DESIGN_RAYUAN = $request->SM1_6_TP_DESIGN_RAYUAN;
            $kriteria->SM1_7_TP_DESIGN_RAYUAN = $request->SM1_7_TP_DESIGN_RAYUAN;
            $kriteria->SM1_8_TP_DESIGN_RAYUAN = $request->SM1_8_TP_DESIGN_RAYUAN;
            $kriteria->SM1_9_TP_DESIGN_RAYUAN = $request->SM1_9_TP_DESIGN_RAYUAN;
            $kriteria->SM1_10_TP_DESIGN_RAYUAN = $request->SM1_10_TP_DESIGN_RAYUAN;
            $kriteria->SM1_11_TP_DESIGN_RAYUAN = $request->SM1_11_TP_DESIGN_RAYUAN;

            //UTK SM1 COMMENT DESIGN_RAYUAN
            $kriteria->SM1_1_COMMENT_DESIGN_RAYUAN = $request->SM1_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM1_2_COMMENT_DESIGN_RAYUAN = $request->SM1_2_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM1_3_COMMENT_DESIGN_RAYUAN = $request->SM1_3_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM1_4_COMMENT_DESIGN_RAYUAN = $request->SM1_4_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM1_5_COMMENT_DESIGN_RAYUAN = $request->SM1_5_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM1_6_COMMENT_DESIGN_RAYUAN = $request->SM1_6_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM1_7_COMMENT_DESIGN_RAYUAN = $request->SM1_7_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM1_8_COMMENT_DESIGN_RAYUAN = $request->SM1_8_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM1_9_COMMENT_DESIGN_RAYUAN = $request->SM1_9_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM1_10_COMMENT_DESIGN_RAYUAN = $request->SM1_10_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM1_11_COMMENT_DESIGN_RAYUAN = $request->SM1_11_COMMENT_DESIGN_RAYUAN;

            //UTK SM2 TATGET POINT DESIGN_RAYUAN
            $kriteria->SM2_1_TP_DESIGN_RAYUAN = $request->SM2_1_TP_DESIGN_RAYUAN;
            $kriteria->SM2_2_TP_DESIGN_RAYUAN = $request->SM2_2_TP_DESIGN_RAYUAN;
            $kriteria->SM2_3_TP_DESIGN_RAYUAN = $request->SM2_3_TP_DESIGN_RAYUAN;
            $kriteria->SM2_4_TP_DESIGN_RAYUAN = $request->SM2_4_TP_DESIGN_RAYUAN;
            $kriteria->SM2_5_TP_DESIGN_RAYUAN = $request->SM2_5_TP_DESIGN_RAYUAN;
            $kriteria->SM2_6_TP_DESIGN_RAYUAN = $request->SM2_6_TP_DESIGN_RAYUAN;
            $kriteria->SM2_7_TP_DESIGN_RAYUAN = $request->SM2_7_TP_DESIGN_RAYUAN;
            $kriteria->SM2_8_TP_DESIGN_RAYUAN = $request->SM2_8_TP_DESIGN_RAYUAN;

            //UTK SM2 COMMENT DESIGN_RAYUAN
            $kriteria->SM2_1_COMMENT_DESIGN_RAYUAN = $request->SM2_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM2_2_COMMENT_DESIGN_RAYUAN = $request->SM2_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM2_3_COMMENT_DESIGN_RAYUAN = $request->SM2_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM2_4_COMMENT_DESIGN_RAYUAN = $request->SM2_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM2_5_COMMENT_DESIGN_RAYUAN = $request->SM2_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM2_6_COMMENT_DESIGN_RAYUAN = $request->SM2_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM2_7_COMMENT_DESIGN_RAYUAN = $request->SM2_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM2_8_COMMENT_DESIGN_RAYUAN = $request->SM2_1_COMMENT_DESIGN_RAYUAN;

            //UTK SM3 TATGET POINT DESIGN_RAYUAN
            $kriteria->SM3_1_TP_DESIGN_RAYUAN = $request->SM3_1_TP_DESIGN_RAYUAN;
            $kriteria->SM3_2_TP_DESIGN_RAYUAN = $request->SM3_2_TP_DESIGN_RAYUAN;
            $kriteria->SM3_3_TP_DESIGN_RAYUAN = $request->SM3_3_TP_DESIGN_RAYUAN;
            $kriteria->SM3_4_TP_DESIGN_RAYUAN = $request->SM3_4_TP_DESIGN_RAYUAN;
            $kriteria->SM3_5_TP_DESIGN_RAYUAN = $request->SM3_5_TP_DESIGN_RAYUAN;
            $kriteria->SM3_6_TP_DESIGN_RAYUAN = $request->SM3_6_TP_DESIGN_RAYUAN;
            

            //UTK SM3 COMMENT DESIGN_RAYUAN
            $kriteria->SM3_1_COMMENT_DESIGN_RAYUAN = $request->SM3_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM3_2_COMMENT_DESIGN_RAYUAN = $request->SM3_2_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM3_3_COMMENT_DESIGN_RAYUAN = $request->SM3_3_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM3_4_COMMENT_DESIGN_RAYUAN = $request->SM3_4_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM3_5_COMMENT_DESIGN_RAYUAN = $request->SM3_5_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM3_6_COMMENT_DESIGN_RAYUAN = $request->SM3_6_COMMENT_DESIGN_RAYUAN;

            //UTK SM4 TATGET POINT DESIGN_RAYUAN
            $kriteria->SM4_1_TP_DESIGN_RAYUAN = $request->SM4_1_TP_DESIGN_RAYUAN;
            $kriteria->SM4_2_TP_DESIGN_RAYUAN = $request->SM4_2_TP_DESIGN_RAYUAN;
            $kriteria->SM4_3_TP_DESIGN_RAYUAN = $request->SM4_3_TP_DESIGN_RAYUAN;
            
            //UTK SM4 COMMENT DESIGN_RAYUAN
            $kriteria->SM4_1_COMMENT_DESIGN_RAYUAN = $request->SM4_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM4_2_COMMENT_DESIGN_RAYUAN = $request->SM4_2_COMMENT_DESIGN_RAYUAN;
            $kriteria->SM4_3_COMMENT_DESIGN_RAYUAN = $request->SM4_3_COMMENT_DESIGN_RAYUAN;

            //UTK PT1 TATGET POINT DESIGN_RAYUAN
            $kriteria->PT1_1_TP_DESIGN_RAYUAN = $request->PT1_1_TP_DESIGN_RAYUAN;
            $kriteria->PT1_2_TP_DESIGN_RAYUAN = $request->PT1_2_TP_DESIGN_RAYUAN;
            $kriteria->PT1_3_TP_DESIGN_RAYUAN = $request->PT1_3_TP_DESIGN_RAYUAN;
            $kriteria->PT1_4_TP_DESIGN_RAYUAN = $request->PT1_4_TP_DESIGN_RAYUAN;
            $kriteria->PT1_5_TP_DESIGN_RAYUAN = $request->PT1_5_TP_DESIGN_RAYUAN;
            
            //UTK PT1 COMMENT DESIGN_RAYUAN
            $kriteria->PT1_1_COMMENT_DESIGN_RAYUAN = $request->PT1_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->PT1_2_COMMENT_DESIGN_RAYUAN = $request->PT1_2_COMMENT_DESIGN_RAYUAN;
            $kriteria->PT1_3_COMMENT_DESIGN_RAYUAN = $request->PT1_3_COMMENT_DESIGN_RAYUAN;
            $kriteria->PT1_4_COMMENT_DESIGN_RAYUAN = $request->PT1_4_COMMENT_DESIGN_RAYUAN;
            $kriteria->PT1_5_COMMENT_DESIGN_RAYUAN = $request->PT1_5_COMMENT_DESIGN_RAYUAN;

            //UTK PT2 TATGET POINT DESIGN_RAYUAN
            $kriteria->PT2_1_TP_DESIGN_RAYUAN = $request->PT2_1_TP_DESIGN_RAYUAN;
            $kriteria->PT2_2_TP_DESIGN_RAYUAN = $request->PT2_2_TP_DESIGN_RAYUAN;
            $kriteria->PT2_3_TP_DESIGN_RAYUAN = $request->PT2_3_TP_DESIGN_RAYUAN;
            
            //UTK PT2 COMMENT DESIGN_RAYUAN
            $kriteria->PT2_1_COMMENT_DESIGN_RAYUAN = $request->PT2_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->PT2_2_COMMENT_DESIGN_RAYUAN = $request->PT2_2_COMMENT_DESIGN_RAYUAN;
            $kriteria->PT2_3_COMMENT_DESIGN_RAYUAN = $request->PT2_3_COMMENT_DESIGN_RAYUAN;

            //UTK PT3 TATGET POINT DESIGN_RAYUAN
            $kriteria->PT3_1_TP_DESIGN_RAYUAN = $request->PT3_1_TP_DESIGN_RAYUAN;
            
            
            //UTK PT3 COMMENT DESIGN_RAYUAN
            $kriteria->PT3_1_COMMENT_DESIGN_RAYUAN = $request->PT3_1_COMMENT_DESIGN_RAYUAN;

            //UTK PT4 TATGET POINT DESIGN_RAYUAN
            $kriteria->PT4_1_TP_DESIGN_RAYUAN = $request->PT4_1_TP_DESIGN_RAYUAN;
            $kriteria->PT4_2_TP_DESIGN_RAYUAN = $request->PT4_2_TP_DESIGN_RAYUAN;
            $kriteria->PT4_3_TP_DESIGN_RAYUAN = $request->PT4_3_TP_DESIGN_RAYUAN;
            $kriteria->PT4_4_TP_DESIGN_RAYUAN = $request->PT4_4_TP_DESIGN_RAYUAN;
            
            
            //UTK PT4 COMMENT DESIGN_RAYUAN
            $kriteria->PT4_1_COMMENT_DESIGN_RAYUAN = $request->PT4_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->PT4_2_COMMENT_DESIGN_RAYUAN = $request->PT4_2_COMMENT_DESIGN_RAYUAN;
            $kriteria->PT4_3_COMMENT_DESIGN_RAYUAN = $request->PT4_3_COMMENT_DESIGN_RAYUAN;
            $kriteria->PT4_4_COMMENT_DESIGN_RAYUAN = $request->PT4_4_COMMENT_DESIGN_RAYUAN;
            
            //UTK EW1 TATGET POINT DESIGN_RAYUAN
            $kriteria->EW1_1_TP_DESIGN_RAYUAN = $request->EW1_1_TP_DESIGN_RAYUAN;
            
            
            //UTK EW1 COMMENT DESIGN_RAYUAN
            $kriteria->EW1_1_COMMENT_DESIGN_RAYUAN = $request->EW1_1_COMMENT_DESIGN_RAYUAN;

            //UTK EW2 TATGET POINT DESIGN_RAYUAN
            $kriteria->EW2_1_TP_DESIGN_RAYUAN = $request->EW2_1_TP_DESIGN_RAYUAN;
            $kriteria->EW2_2_TP_DESIGN_RAYUAN = $request->EW2_2_TP_DESIGN_RAYUAN;
            
            
            //UTK EW2 COMMENT DESIGN_RAYUAN
            $kriteria->EW2_1_COMMENT_DESIGN_RAYUAN = $request->EW2_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->EW2_2_COMMENT_DESIGN_RAYUAN = $request->EW2_2_COMMENT_DESIGN_RAYUAN;

            //UTK AE1 TATGET POINT DESIGN_RAYUAN
            $kriteria->AE1_1_TP_DESIGN_RAYUAN = $request->AE1_1_TP_DESIGN_RAYUAN;
            $kriteria->AE1_2_TP_DESIGN_RAYUAN = $request->AE1_2_TP_DESIGN_RAYUAN;
            $kriteria->AE1_3_TP_DESIGN_RAYUAN = $request->AE1_3_TP_DESIGN_RAYUAN;
            $kriteria->AE1_4_TP_DESIGN_RAYUAN = $request->AE1_4_TP_DESIGN_RAYUAN;
            
            
            //UTK AE1 COMMENT DESIGN_RAYUAN
            $kriteria->AE1_1_COMMENT_DESIGN_RAYUAN = $request->AE1_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->AE1_2_COMMENT_DESIGN_RAYUAN = $request->AE1_2_COMMENT_DESIGN_RAYUAN;
            $kriteria->AE1_3_COMMENT_DESIGN_RAYUAN = $request->AE1_3_COMMENT_DESIGN_RAYUAN;
            $kriteria->AE1_4_COMMENT_DESIGN_RAYUAN = $request->AE1_4_COMMENT_DESIGN_RAYUAN;

            //UTK CA1 TATGET POINT DESIGN_RAYUAN
            $kriteria->CA1_1_TP_DESIGN_RAYUAN = $request->CA1_1_TP_DESIGN_RAYUAN;
            
            
            //UTK CA1 COMMENT DESIGN_RAYUAN
            $kriteria->CA1_1_COMMENT_DESIGN_RAYUAN = $request->CA1_1_TP_DESIGN_RAYUAN;

            //UTK CA2 TATGET POINT DESIGN_RAYUAN
            $kriteria->CA2_1_TP_DESIGN_RAYUAN = $request->CA2_1_TP_DESIGN_RAYUAN;
            $kriteria->CA2_2_TP_DESIGN_RAYUAN = $request->CA2_2_TP_DESIGN_RAYUAN;
            
            
            //UTK CA2 COMMENT DESIGN_RAYUAN
            $kriteria->CA2_1_COMMENT_DESIGN_RAYUAN = $request->CA2_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->CA2_2_COMMENT_DESIGN_RAYUAN = $request->CA2_2_COMMENT_DESIGN_RAYUAN;

            //UTK CA3 TATGET POINT DESIGN_RAYUAN
            $kriteria->CA3_1_TP_DESIGN_RAYUAN = $request->CA3_1_TP_DESIGN_RAYUAN;
            $kriteria->CA3_2_TP_DESIGN_RAYUAN = $request->CA3_2_TP_DESIGN_RAYUAN;
            $kriteria->CA3_3_TP_DESIGN_RAYUAN = $request->CA3_3_TP_DESIGN_RAYUAN;
            $kriteria->CA3_4_TP_DESIGN_RAYUAN = $request->CA3_4_TP_DESIGN_RAYUAN;
            
            
            //UTK CA3 COMMENT DESIGN_RAYUAN
            $kriteria->CA3_1_COMMENT_DESIGN_RAYUAN = $request->CA3_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->CA3_2_COMMENT_DESIGN_RAYUAN = $request->CA3_2_COMMENT_DESIGN_RAYUAN;
            $kriteria->CA3_3_COMMENT_DESIGN_RAYUAN = $request->CA3_3_COMMENT_DESIGN_RAYUAN;
            $kriteria->CA3_4_COMMENT_DESIGN_RAYUAN = $request->CA3_4_COMMENT_DESIGN_RAYUAN;
           
            //UTK CA4 TATGET POINT DESIGN_RAYUAN
            $kriteria->CA4_1_TP_DESIGN_RAYUAN = $request->CA4_1_TP_DESIGN_RAYUAN;
            $kriteria->CA4_2_TP_DESIGN_RAYUAN = $request->CA4_2_TP_DESIGN_RAYUAN;
            $kriteria->CA4_3_TP_DESIGN_RAYUAN = $request->CA4_3_TP_DESIGN_RAYUAN;
            
            //UTK CA4 COMMENT DESIGN_RAYUAN
            $kriteria->CA4_1_COMMENT_DESIGN_RAYUAN = $request->CA4_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->CA4_2_COMMENT_DESIGN_RAYUAN = $request->CA4_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->CA4_3_COMMENT_DESIGN_RAYUAN = $request->CA4_1_COMMENT_DESIGN_RAYUAN;

            //UTK CA5 TATGET POINT DESIGN_RAYUAN
            $kriteria->CA5_1_TP_DESIGN_RAYUAN = $request->CA5_1_TP_DESIGN_RAYUAN;
            
            
            //UTK CA5 COMMENT DESIGN_RAYUAN
            $kriteria->CA5_1_COMMENT_DESIGN_RAYUAN = $request->C5_1_COMMENT_DESIGN_RAYUAN;

            //UTK CA6 TATGET POINT DESIGN_RAYUAN
            $kriteria->CA6_1_TP_DESIGN_RAYUAN = $request->CA6_1_COMMENT_DESIGN_RAYUAN;
            
            
            //UTK CA6 COMMENT DESIGN_RAYUAN
            $kriteria->CA6_1_COMMENT_DESIGN_RAYUAN = $request->CA6_1_COMMENT_DESIGN_RAYUAN;
            
            //UTK CA7 TATGET POINT DESIGN_RAYUAN
            $kriteria->CA7_1_TP_DESIGN_RAYUAN = $request->CA7_1_TP_DESIGN_RAYUAN;
            $kriteria->CA7_2_TP_DESIGN_RAYUAN = $request->CA7_2_TP_DESIGN_RAYUAN;
            $kriteria->CA7_3_TP_DESIGN_RAYUAN = $request->CA7_3_TP_DESIGN_RAYUAN;
            
            //UTK CA7 COMMENT DESIGN_RAYUAN
            $kriteria->CA7_1_COMMENT_DESIGN_RAYUAN = $request->CA7_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->CA7_2_COMMENT_DESIGN_RAYUAN = $request->CA7_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->CA7_3_COMMENT_DESIGN_RAYUAN = $request->CA7_1_COMMENT_DESIGN_RAYUAN;

            //UTK MR1 TATGET POINT DESIGN_RAYUAN
            $kriteria->MR1_1_TP_DESIGN_RAYUAN = $request->MR1_1_TP_DESIGN_RAYUAN;
            $kriteria->MR1_2_TP_DESIGN_RAYUAN = $request->MR1_2_TP_DESIGN_RAYUAN;
            $kriteria->MR1_3_TP_DESIGN_RAYUAN = $request->MR1_3_TP_DESIGN_RAYUAN;
            $kriteria->MR1_4_TP_DESIGN_RAYUAN = $request->MR1_4_TP_DESIGN_RAYUAN;
            $kriteria->MR1_5_TP_DESIGN_RAYUAN = $request->MR1_5_TP_DESIGN_RAYUAN;
            
            //UTK MR1 COMMENT DESIGN_RAYUAN
            $kriteria->MR1_1_COMMENT_DESIGN_RAYUAN = $request->MR1_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->MR1_2_COMMENT_DESIGN_RAYUAN = $request->MR1_2_COMMENT_DESIGN_RAYUAN;
            $kriteria->MR1_3_COMMENT_DESIGN_RAYUAN = $request->MR1_3_COMMENT_DESIGN_RAYUAN;
            $kriteria->MR1_4_COMMENT_DESIGN_RAYUAN = $request->MR1_4_COMMENT_DESIGN_RAYUAN;
            $kriteria->MR1_5_COMMENT_DESIGN_RAYUAN = $request->MR1_5_COMMENT_DESIGN_RAYUAN;

            //UTK MR2 TATGET POINT DESIGN_RAYUAN
            $kriteria->MR2_1_TP_DESIGN_RAYUAN = $request->MR2_1_TP_DESIGN_RAYUAN;
            $kriteria->MR2_2_TP_DESIGN_RAYUAN = $request->MR2_2_TP_DESIGN_RAYUAN;
            $kriteria->MR2_3_TP_DESIGN_RAYUAN = $request->MR2_3_TP_DESIGN_RAYUAN;
            $kriteria->MR2_4_TP_DESIGN_RAYUAN = $request->MR2_4_TP_DESIGN_RAYUAN;
            
            
            //UTK MR2 COMMENT DESIGN_RAYUAN
            $kriteria->MR2_1_COMMENT_DESIGN_RAYUAN = $request->MR2_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->MR2_2_COMMENT_DESIGN_RAYUAN = $request->MR2_2_COMMENT_DESIGN_RAYUAN;
            $kriteria->MR2_3_COMMENT_DESIGN_RAYUAN = $request->MR2_3_COMMENT_DESIGN_RAYUAN;
            $kriteria->MR2_4_COMMENT_DESIGN_RAYUAN = $request->MR2_4_COMMENT_DESIGN_RAYUAN;
            
            //UTK MR3 TATGET POINT DESIGN_RAYUAN
            $kriteria->MR3_1_TP_DESIGN_RAYUAN = $request->MR3_1_TP_DESIGN_RAYUAN;
            $kriteria->MR3_2_TP_DESIGN_RAYUAN = $request->MR3_2_TP_DESIGN_RAYUAN;
            
            
            //UTK MR3 COMMENT DESIGN_RAYUAN
            $kriteria->MR3_1_COMMENT_DESIGN_RAYUAN = $request->MR3_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->MR3_2_COMMENT_DESIGN_RAYUAN = $request->MR3_2_COMMENT_DESIGN_RAYUAN;

            //UTK MR4 TATGET POINT DESIGN_RAYUAN
            $kriteria->MR4_1_TP_DESIGN_RAYUAN = $request->MR4_1_TP_DESIGN_RAYUAN;
            
            
            //UTK MR4 COMMENT DESIGN_RAYUAN
            $kriteria->MR4_1_COMMENT_DESIGN_RAYUAN = $request->MR4_1_COMMENT_DESIGN_RAYUAN;

            //UTK ECSM5_EC TATGET POINT DESIGN_RAYUAN
            $kriteria->ECSM5_EC_1_TP_DESIGN_RAYUAN = $request->ECSM5_EC_1_TP_DESIGN_RAYUAN;
            $kriteria->ECSM5_EC_2_TP_DESIGN_RAYUAN = $request->ECSM5_EC_2_TP_DESIGN_RAYUAN;
            $kriteria->ECSM5_EC_3_TP_DESIGN_RAYUAN = $request->ECSM5_EC_3_TP_DESIGN_RAYUAN;
            
            //UTK ECSM5_EC COMMENT DESIGN_RAYUAN
            $kriteria->ECSM5_EC_1_COMMENT_DESIGN_RAYUAN = $request->ECSM5_EC_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->ECSM5_EC_2_COMMENT_DESIGN_RAYUAN = $request->ECSM5_EC_2_COMMENT_DESIGN_RAYUAN;
            $kriteria->ECSM5_EC_3_COMMENT_DESIGN_RAYUAN = $request->ECSM5_EC_3_COMMENT_DESIGN_RAYUAN;

            //UTK ECSM6_EC TATGET POINT DESIGN_RAYUAN
            $kriteria->ECSM6_EC_1_TP_DESIGN_RAYUAN = $request->ECSM6_EC_1_TP_DESIGN_RAYUAN;
            $kriteria->ECSM6_EC_2_TP_DESIGN_RAYUAN = $request->ECSM6_EC_1_TP_DESIGN_RAYUAN;
            $kriteria->ECSM6_EC_3_TP_DESIGN_RAYUAN = $request->ECSM6_EC_1_TP_DESIGN_RAYUAN;
            
            //UTK ECSM6_EC COMMENT DESIGN_RAYUAN
            $kriteria->ECSM6_EC_1_COMMENT_DESIGN_RAYUAN = $request->ECSM6_EC_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->ECSM6_EC_2_COMMENT_DESIGN_RAYUAN = $request->ECSM6_EC_2_COMMENT_DESIGN_RAYUAN;
            $kriteria->ECSM6_EC_3_COMMENT_DESIGN_RAYUAN = $request->ECSM6_EC_3_COMMENT_DESIGN_RAYUAN;

            //UTK ECEW3_EC TATGET POINT DESIGN_RAYUAN
            $kriteria->ECEW3_EC_1_TP_DESIGN_RAYUAN = $request->ECEW3_EC_1_TP_DESIGN_RAYUAN;
            
            
            //UTK ECEW3_EC COMMENT DESIGN_RAYUAN
            $kriteria->ECEW3_EC_1_COMMENT_DESIGN_RAYUAN = $request->ECEW3_EC_1_TP_DESIGN_RAYUAN;

            //UTK ECAE2_EC TATGET POINT DESIGN_RAYUAN
            $kriteria->ECAE2_EC_1_TP_DESIGN_RAYUAN = $request->ECAE2_EC_1_TP_DESIGN_RAYUAN;
            
            
            //UTK ECAE2_EC COMMENT DESIGN_RAYUAN
            $kriteria->ECAE2_EC_1_COMMENT_DESIGN_RAYUAN = $request->ECAE2_EC_1_COMMENT_DESIGN_RAYUAN;

            //UTK ECAE3_EC TATGET POINT DESIGN_RAYUAN
            $kriteria->ECAE3_EC_1_TP_DESIGN_RAYUAN = $request->ECAE3_EC_1_TP_DESIGN_RAYUAN;
            $kriteria->ECAE3_EC_2_TP_DESIGN_RAYUAN = $request->ECAE3_EC_2_TP_DESIGN_RAYUAN;
            $kriteria->ECAE3_EC_3_TP_DESIGN_RAYUAN = $request->ECAE3_EC_3_TP_DESIGN_RAYUAN;
            $kriteria->ECAE3_EC_4_TP_DESIGN_RAYUAN = $request->ECAE3_EC_4_TP_DESIGN_RAYUAN;
            
            
            //UTK ECAE3_EC COMMENT DESIGN_RAYUAN
            $kriteria->ECAE3_EC_1_COMMENT_DESIGN_RAYUAN = $request->ECAE3_EC_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->ECAE3_EC_2_COMMENT_DESIGN_RAYUAN = $request->ECAE3_EC_2_COMMENT_DESIGN_RAYUAN;
            $kriteria->ECAE3_EC_3_COMMENT_DESIGN_RAYUAN = $request->ECAE3_EC_3_COMMENT_DESIGN_RAYUAN;
            $kriteria->ECAE3_EC_4_COMMENT_DESIGN_RAYUAN = $request->ECAE3_EC_4_COMMENT_DESIGN_RAYUAN;

            //UTK ECAE4_EC TATGET POINT DESIGN_RAYUAN
            $kriteria->ECAE4_EC_1_TP_DESIGN_RAYUAN = $request->ECAE4_EC_TP_DESIGN_RAYUAN;
            $kriteria->ECAE4_EC_2_TP_DESIGN_RAYUAN = $request->ECAE4_EC_TP_DESIGN_RAYUAN;
            $kriteria->ECAE4_EC_3_TP_DESIGN_RAYUAN = $request->ECAE4_EC_TP_DESIGN_RAYUAN;
            $kriteria->ECAE4_EC_4_TP_DESIGN_RAYUAN = $request->ECAE4_EC_TP_DESIGN_RAYUAN;
            
            
            //UTK ECAE4_EC COMMENT DESIGN_RAYUAN
            $kriteria->ECAE4_EC_1_COMMENT_DESIGN_RAYUAN = $request->ECAE4_EC_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->ECAE4_EC_2_COMMENT_DESIGN_RAYUAN = $request->ECAE4_EC_2_COMMENT_DESIGN_RAYUAN;
            $kriteria->ECAE4_EC_3_COMMENT_DESIGN_RAYUAN = $request->ECAE4_EC_3_COMMENT_DESIGN_RAYUAN;
            $kriteria->ECAE4_EC_4_COMMENT_DESIGN_RAYUAN = $request->ECAE4_EC_4_COMMENT_DESIGN_RAYUAN;

            //UTK ECAE5_EC TATGET POINT DESIGN_RAYUAN
            $kriteria->ECAE5_EC_1_TP_DESIGN_RAYUAN = $request->ECAE5_EC_1_TP_DESIGN_RAYUAN;
            
            
            //UTK ECAE5_EC COMMENT DESIGN_RAYUAN
            $kriteria->ECAE5_EC_1_COMMENT_DESIGN_RAYUAN = $request->ECAE5_EC_1_COMMENT_DESIGN_RAYUAN;

            //UTK ECAE6_EC TATGET POINT DESIGN_RAYUAN
            $kriteria->ECAE6_EC_1_TP_DESIGN_RAYUAN = $request->ECAE6_EC_1_TP_DESIGN_RAYUAN;
            $kriteria->ECAE6_EC_2_TP_DESIGN_RAYUAN = $request->ECAE6_EC_2_TP_DESIGN_RAYUAN;
            
            
            //UTK ECAE6_EC COMMENT DESIGN_RAYUAN
            $kriteria->ECAE6_EC_1_COMMENT_DESIGN_RAYUAN = $request->ECAE6_EC_1_COMMENT_DESIGN_RAYUAN;
            $kriteria->ECAE6_EC_2_COMMENT_DESIGN_RAYUAN = $request->ECAE6_EC_2_COMMENT_DESIGN_RAYUAN;

            //UTK IN1 TATGET POINT DESIGN_RAYUAN
            $kriteria->IN1_1_TP_DESIGN_RAYUAN = $request->IN1_1_TP_DESIGN_RAYUAN;
            
            
            //UTK IN1 COMMENT DESIGN_RAYUAN
            $kriteria->IN1_1_COMMENT_DESIGN_RAYUAN = $request->IN1_1_TP_DESIGN_RAYUAN;



            //UTK BORANG RAYUAN PH JALAN
            //UTK SM1 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->SM1_1_TP_VERIFIKASI_RAYUAN = $request->SM1_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM1_2_TP_VERIFIKASI_RAYUAN = $request->SM1_2_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM1_3_TP_VERIFIKASI_RAYUAN = $request->SM1_3_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM1_4_TP_VERIFIKASI_RAYUAN = $request->SM1_4_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM1_5_TP_VERIFIKASI_RAYUAN = $request->SM1_5_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM1_6_TP_VERIFIKASI_RAYUAN = $request->SM1_6_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM1_7_TP_VERIFIKASI_RAYUAN = $request->SM1_7_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM1_8_TP_VERIFIKASI_RAYUAN = $request->SM1_8_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM1_9_TP_VERIFIKASI_RAYUAN = $request->SM1_9_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM1_10_TP_VERIFIKASI_RAYUAN = $request->SM1_10_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM1_11_TP_VERIFIKASI_RAYUAN = $request->SM1_11_TP_VERIFIKASI_RAYUAN;

            //UTK SM1 COMMENT VERIFIKASI_RAYUAN
            $kriteria->SM1_1_COMMENT_VERIFIKASI_RAYUAN = $request->SM1_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM1_2_COMMENT_VERIFIKASI_RAYUAN = $request->SM1_2_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM1_3_COMMENT_VERIFIKASI_RAYUAN = $request->SM1_3_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM1_4_COMMENT_VERIFIKASI_RAYUAN = $request->SM1_4_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM1_5_COMMENT_VERIFIKASI_RAYUAN = $request->SM1_5_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM1_6_COMMENT_VERIFIKASI_RAYUAN = $request->SM1_6_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM1_7_COMMENT_VERIFIKASI_RAYUAN = $request->SM1_7_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM1_8_COMMENT_VERIFIKASI_RAYUAN = $request->SM1_8_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM1_9_COMMENT_VERIFIKASI_RAYUAN = $request->SM1_9_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM1_10_COMMENT_VERIFIKASI_RAYUAN = $request->SM1_10_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM1_11_COMMENT_VERIFIKASI_RAYUAN = $request->SM1_11_COMMENT_VERIFIKASI_RAYUAN;

            //UTK SM2 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->SM2_1_TP_VERIFIKASI_RAYUAN = $request->SM2_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM2_2_TP_VERIFIKASI_RAYUAN = $request->SM2_2_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM2_3_TP_VERIFIKASI_RAYUAN = $request->SM2_3_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM2_4_TP_VERIFIKASI_RAYUAN = $request->SM2_4_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM2_5_TP_VERIFIKASI_RAYUAN = $request->SM2_5_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM2_6_TP_VERIFIKASI_RAYUAN = $request->SM2_6_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM2_7_TP_VERIFIKASI_RAYUAN = $request->SM2_7_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM2_8_TP_VERIFIKASI_RAYUAN = $request->SM2_8_TP_VERIFIKASI_RAYUAN;

            //UTK SM2 COMMENT VERIFIKASI_RAYUAN
            $kriteria->SM2_1_COMMENT_VERIFIKASI_RAYUAN = $request->SM2_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM2_2_COMMENT_VERIFIKASI_RAYUAN = $request->SM2_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM2_3_COMMENT_VERIFIKASI_RAYUAN = $request->SM2_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM2_4_COMMENT_VERIFIKASI_RAYUAN = $request->SM2_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM2_5_COMMENT_VERIFIKASI_RAYUAN = $request->SM2_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM2_6_COMMENT_VERIFIKASI_RAYUAN = $request->SM2_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM2_7_COMMENT_VERIFIKASI_RAYUAN = $request->SM2_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM2_8_COMMENT_VERIFIKASI_RAYUAN = $request->SM2_1_COMMENT_VERIFIKASI_RAYUAN;

            //UTK SM3 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->SM3_1_TP_VERIFIKASI_RAYUAN = $request->SM3_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM3_2_TP_VERIFIKASI_RAYUAN = $request->SM3_2_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM3_3_TP_VERIFIKASI_RAYUAN = $request->SM3_3_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM3_4_TP_VERIFIKASI_RAYUAN = $request->SM3_4_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM3_5_TP_VERIFIKASI_RAYUAN = $request->SM3_5_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM3_6_TP_VERIFIKASI_RAYUAN = $request->SM3_6_TP_VERIFIKASI_RAYUAN;
            

            //UTK SM3 COMMENT VERIFIKASI_RAYUAN
            $kriteria->SM3_1_COMMENT_VERIFIKASI_RAYUAN = $request->SM3_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM3_2_COMMENT_VERIFIKASI_RAYUAN = $request->SM3_2_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM3_3_COMMENT_VERIFIKASI_RAYUAN = $request->SM3_3_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM3_4_COMMENT_VERIFIKASI_RAYUAN = $request->SM3_4_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM3_5_COMMENT_VERIFIKASI_RAYUAN = $request->SM3_5_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM3_6_COMMENT_VERIFIKASI_RAYUAN = $request->SM3_6_COMMENT_VERIFIKASI_RAYUAN;

            //UTK SM4 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->SM4_1_TP_VERIFIKASI_RAYUAN = $request->SM4_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM4_2_TP_VERIFIKASI_RAYUAN = $request->SM4_2_TP_VERIFIKASI_RAYUAN;
            $kriteria->SM4_3_TP_VERIFIKASI_RAYUAN = $request->SM4_3_TP_VERIFIKASI_RAYUAN;
            
            //UTK SM4 COMMENT VERIFIKASI_RAYUAN
            $kriteria->SM4_1_COMMENT_VERIFIKASI_RAYUAN = $request->SM4_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM4_2_COMMENT_VERIFIKASI_RAYUAN = $request->SM4_2_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->SM4_3_COMMENT_VERIFIKASI_RAYUAN = $request->SM4_3_COMMENT_VERIFIKASI_RAYUAN;

            //UTK PT1 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->PT1_1_TP_VERIFIKASI_RAYUAN = $request->PT1_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->PT1_2_TP_VERIFIKASI_RAYUAN = $request->PT1_2_TP_VERIFIKASI_RAYUAN;
            $kriteria->PT1_3_TP_VERIFIKASI_RAYUAN = $request->PT1_3_TP_VERIFIKASI_RAYUAN;
            $kriteria->PT1_4_TP_VERIFIKASI_RAYUAN = $request->PT1_4_TP_VERIFIKASI_RAYUAN;
            $kriteria->PT1_5_TP_VERIFIKASI_RAYUAN = $request->PT1_5_TP_VERIFIKASI_RAYUAN;
            
            //UTK PT1 COMMENT VERIFIKASI_RAYUAN
            $kriteria->PT1_1_COMMENT_VERIFIKASI_RAYUAN = $request->PT1_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->PT1_2_COMMENT_VERIFIKASI_RAYUAN = $request->PT1_2_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->PT1_3_COMMENT_VERIFIKASI_RAYUAN = $request->PT1_3_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->PT1_4_COMMENT_VERIFIKASI_RAYUAN = $request->PT1_4_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->PT1_5_COMMENT_VERIFIKASI_RAYUAN = $request->PT1_5_COMMENT_VERIFIKASI_RAYUAN;

            //UTK PT2 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->PT2_1_TP_VERIFIKASI_RAYUAN = $request->PT2_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->PT2_2_TP_VERIFIKASI_RAYUAN = $request->PT2_2_TP_VERIFIKASI_RAYUAN;
            $kriteria->PT2_3_TP_VERIFIKASI_RAYUAN = $request->PT2_3_TP_VERIFIKASI_RAYUAN;
            
            //UTK PT2 COMMENT VERIFIKASI_RAYUAN
            $kriteria->PT2_1_COMMENT_VERIFIKASI_RAYUAN = $request->PT2_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->PT2_2_COMMENT_VERIFIKASI_RAYUAN = $request->PT2_2_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->PT2_3_COMMENT_VERIFIKASI_RAYUAN = $request->PT2_3_COMMENT_VERIFIKASI_RAYUAN;

            //UTK PT3 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->PT3_1_TP_VERIFIKASI_RAYUAN = $request->PT3_1_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK PT3 COMMENT VERIFIKASI_RAYUAN
            $kriteria->PT3_1_COMMENT_VERIFIKASI_RAYUAN = $request->PT3_1_COMMENT_VERIFIKASI_RAYUAN;

            //UTK PT4 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->PT4_1_TP_VERIFIKASI_RAYUAN = $request->PT4_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->PT4_2_TP_VERIFIKASI_RAYUAN = $request->PT4_2_TP_VERIFIKASI_RAYUAN;
            $kriteria->PT4_3_TP_VERIFIKASI_RAYUAN = $request->PT4_3_TP_VERIFIKASI_RAYUAN;
            $kriteria->PT4_4_TP_VERIFIKASI_RAYUAN = $request->PT4_4_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK PT4 COMMENT VERIFIKASI_RAYUAN
            $kriteria->PT4_1_COMMENT_VERIFIKASI_RAYUAN = $request->PT4_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->PT4_2_COMMENT_VERIFIKASI_RAYUAN = $request->PT4_2_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->PT4_3_COMMENT_VERIFIKASI_RAYUAN = $request->PT4_3_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->PT4_4_COMMENT_VERIFIKASI_RAYUAN = $request->PT4_4_COMMENT_VERIFIKASI_RAYUAN;
            
            //UTK EW1 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->EW1_1_TP_VERIFIKASI_RAYUAN = $request->EW1_1_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK EW1 COMMENT VERIFIKASI_RAYUAN
            $kriteria->EW1_1_COMMENT_VERIFIKASI_RAYUAN = $request->EW1_1_COMMENT_VERIFIKASI_RAYUAN;

            //UTK EW2 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->EW2_1_TP_VERIFIKASI_RAYUAN = $request->EW2_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->EW2_2_TP_VERIFIKASI_RAYUAN = $request->EW2_2_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK EW2 COMMENT VERIFIKASI_RAYUAN
            $kriteria->EW2_1_COMMENT_VERIFIKASI_RAYUAN = $request->EW2_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->EW2_2_COMMENT_VERIFIKASI_RAYUAN = $request->EW2_2_COMMENT_VERIFIKASI_RAYUAN;

            //UTK AE1 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->AE1_1_TP_VERIFIKASI_RAYUAN = $request->AE1_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->AE1_2_TP_VERIFIKASI_RAYUAN = $request->AE1_2_TP_VERIFIKASI_RAYUAN;
            $kriteria->AE1_3_TP_VERIFIKASI_RAYUAN = $request->AE1_3_TP_VERIFIKASI_RAYUAN;
            $kriteria->AE1_4_TP_VERIFIKASI_RAYUAN = $request->AE1_4_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK AE1 COMMENT VERIFIKASI_RAYUAN
            $kriteria->AE1_1_COMMENT_VERIFIKASI_RAYUAN = $request->AE1_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->AE1_2_COMMENT_VERIFIKASI_RAYUAN = $request->AE1_2_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->AE1_3_COMMENT_VERIFIKASI_RAYUAN = $request->AE1_3_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->AE1_4_COMMENT_VERIFIKASI_RAYUAN = $request->AE1_4_COMMENT_VERIFIKASI_RAYUAN;

            //UTK CA1 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->CA1_1_TP_VERIFIKASI_RAYUAN = $request->CA1_1_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK CA1 COMMENT VERIFIKASI_RAYUAN
            $kriteria->CA1_1_COMMENT_VERIFIKASI_RAYUAN = $request->CA1_1_TP_VERIFIKASI_RAYUAN;

            //UTK CA2 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->CA2_1_TP_VERIFIKASI_RAYUAN = $request->CA2_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->CA2_2_TP_VERIFIKASI_RAYUAN = $request->CA2_2_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK CA2 COMMENT VERIFIKASI_RAYUAN
            $kriteria->CA2_1_COMMENT_VERIFIKASI_RAYUAN = $request->CA2_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->CA2_2_COMMENT_VERIFIKASI_RAYUAN = $request->CA2_2_COMMENT_VERIFIKASI_RAYUAN;

            //UTK CA3 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->CA3_1_TP_VERIFIKASI_RAYUAN = $request->CA3_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->CA3_2_TP_VERIFIKASI_RAYUAN = $request->CA3_2_TP_VERIFIKASI_RAYUAN;
            $kriteria->CA3_3_TP_VERIFIKASI_RAYUAN = $request->CA3_3_TP_VERIFIKASI_RAYUAN;
            $kriteria->CA3_4_TP_VERIFIKASI_RAYUAN = $request->CA3_4_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK CA3 COMMENT VERIFIKASI_RAYUAN
            $kriteria->CA3_1_COMMENT_VERIFIKASI_RAYUAN = $request->CA3_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->CA3_2_COMMENT_VERIFIKASI_RAYUAN = $request->CA3_2_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->CA3_3_COMMENT_VERIFIKASI_RAYUAN = $request->CA3_3_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->CA3_4_COMMENT_VERIFIKASI_RAYUAN = $request->CA3_4_COMMENT_VERIFIKASI_RAYUAN;
           
            //UTK CA4 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->CA4_1_TP_VERIFIKASI_RAYUAN = $request->CA4_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->CA4_2_TP_VERIFIKASI_RAYUAN = $request->CA4_2_TP_VERIFIKASI_RAYUAN;
            $kriteria->CA4_3_TP_VERIFIKASI_RAYUAN = $request->CA4_3_TP_VERIFIKASI_RAYUAN;
            
            //UTK CA4 COMMENT VERIFIKASI_RAYUAN
            $kriteria->CA4_1_COMMENT_VERIFIKASI_RAYUAN = $request->CA4_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->CA4_2_COMMENT_VERIFIKASI_RAYUAN = $request->CA4_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->CA4_3_COMMENT_VERIFIKASI_RAYUAN = $request->CA4_1_COMMENT_VERIFIKASI_RAYUAN;

            //UTK CA5 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->CA5_1_TP_VERIFIKASI_RAYUAN = $request->CA5_1_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK CA5 COMMENT VERIFIKASI_RAYUAN
            $kriteria->CA5_1_COMMENT_VERIFIKASI_RAYUAN = $request->C5_1_COMMENT_VERIFIKASI_RAYUAN;

            //UTK CA6 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->CA6_1_TP_VERIFIKASI_RAYUAN = $request->CA6_1_COMMENT_VERIFIKASI_RAYUAN;
            
            
            //UTK CA6 COMMENT VERIFIKASI_RAYUAN
            $kriteria->CA6_1_COMMENT_VERIFIKASI_RAYUAN = $request->CA6_1_COMMENT_VERIFIKASI_RAYUAN;
            
            //UTK CA7 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->CA7_1_TP_VERIFIKASI_RAYUAN = $request->CA7_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->CA7_2_TP_VERIFIKASI_RAYUAN = $request->CA7_2_TP_VERIFIKASI_RAYUAN;
            $kriteria->CA7_3_TP_VERIFIKASI_RAYUAN = $request->CA7_3_TP_VERIFIKASI_RAYUAN;
            
            //UTK CA7 COMMENT VERIFIKASI_RAYUAN
            $kriteria->CA7_1_COMMENT_VERIFIKASI_RAYUAN = $request->CA7_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->CA7_2_COMMENT_VERIFIKASI_RAYUAN = $request->CA7_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->CA7_3_COMMENT_VERIFIKASI_RAYUAN = $request->CA7_1_COMMENT_VERIFIKASI_RAYUAN;

            //UTK MR1 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->MR1_1_TP_VERIFIKASI_RAYUAN = $request->MR1_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->MR1_2_TP_VERIFIKASI_RAYUAN = $request->MR1_2_TP_VERIFIKASI_RAYUAN;
            $kriteria->MR1_3_TP_VERIFIKASI_RAYUAN = $request->MR1_3_TP_VERIFIKASI_RAYUAN;
            $kriteria->MR1_4_TP_VERIFIKASI_RAYUAN = $request->MR1_4_TP_VERIFIKASI_RAYUAN;
            $kriteria->MR1_5_TP_VERIFIKASI_RAYUAN = $request->MR1_5_TP_VERIFIKASI_RAYUAN;
            
            //UTK MR1 COMMENT VERIFIKASI_RAYUAN
            $kriteria->MR1_1_COMMENT_VERIFIKASI_RAYUAN = $request->MR1_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->MR1_2_COMMENT_VERIFIKASI_RAYUAN = $request->MR1_2_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->MR1_3_COMMENT_VERIFIKASI_RAYUAN = $request->MR1_3_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->MR1_4_COMMENT_VERIFIKASI_RAYUAN = $request->MR1_4_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->MR1_5_COMMENT_VERIFIKASI_RAYUAN = $request->MR1_5_COMMENT_VERIFIKASI_RAYUAN;

            //UTK MR2 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->MR2_1_TP_VERIFIKASI_RAYUAN = $request->MR2_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->MR2_2_TP_VERIFIKASI_RAYUAN = $request->MR2_2_TP_VERIFIKASI_RAYUAN;
            $kriteria->MR2_3_TP_VERIFIKASI_RAYUAN = $request->MR2_3_TP_VERIFIKASI_RAYUAN;
            $kriteria->MR2_4_TP_VERIFIKASI_RAYUAN = $request->MR2_4_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK MR2 COMMENT VERIFIKASI_RAYUAN
            $kriteria->MR2_1_COMMENT_VERIFIKASI_RAYUAN = $request->MR2_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->MR2_2_COMMENT_VERIFIKASI_RAYUAN = $request->MR2_2_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->MR2_3_COMMENT_VERIFIKASI_RAYUAN = $request->MR2_3_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->MR2_4_COMMENT_VERIFIKASI_RAYUAN = $request->MR2_4_COMMENT_VERIFIKASI_RAYUAN;
            
            //UTK MR3 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->MR3_1_TP_VERIFIKASI_RAYUAN = $request->MR3_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->MR3_2_TP_VERIFIKASI_RAYUAN = $request->MR3_2_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK MR3 COMMENT VERIFIKASI_RAYUAN
            $kriteria->MR3_1_COMMENT_VERIFIKASI_RAYUAN = $request->MR3_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->MR3_2_COMMENT_VERIFIKASI_RAYUAN = $request->MR3_2_COMMENT_VERIFIKASI_RAYUAN;

            //UTK MR4 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->MR4_1_TP_VERIFIKASI_RAYUAN = $request->MR4_1_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK MR4 COMMENT VERIFIKASI_RAYUAN
            $kriteria->MR4_1_COMMENT_VERIFIKASI_RAYUAN = $request->MR4_1_COMMENT_VERIFIKASI_RAYUAN;

            //UTK ECSM5_EC TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->ECSM5_EC_1_TP_VERIFIKASI_RAYUAN = $request->ECSM5_EC_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->ECSM5_EC_2_TP_VERIFIKASI_RAYUAN = $request->ECSM5_EC_2_TP_VERIFIKASI_RAYUAN;
            $kriteria->ECSM5_EC_3_TP_VERIFIKASI_RAYUAN = $request->ECSM5_EC_3_TP_VERIFIKASI_RAYUAN;
            
            //UTK ECSM5_EC COMMENT VERIFIKASI_RAYUAN
            $kriteria->ECSM5_EC_1_COMMENT_VERIFIKASI_RAYUAN = $request->ECSM5_EC_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->ECSM5_EC_2_COMMENT_VERIFIKASI_RAYUAN = $request->ECSM5_EC_2_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->ECSM5_EC_3_COMMENT_VERIFIKASI_RAYUAN = $request->ECSM5_EC_3_COMMENT_VERIFIKASI_RAYUAN;

            //UTK ECSM6_EC TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->ECSM6_EC_1_TP_VERIFIKASI_RAYUAN = $request->ECSM6_EC_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->ECSM6_EC_2_TP_VERIFIKASI_RAYUAN = $request->ECSM6_EC_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->ECSM6_EC_3_TP_VERIFIKASI_RAYUAN = $request->ECSM6_EC_1_TP_VERIFIKASI_RAYUAN;
            
            //UTK ECSM6_EC COMMENT VERIFIKASI_RAYUAN
            $kriteria->ECSM6_EC_1_COMMENT_VERIFIKASI_RAYUAN = $request->ECSM6_EC_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->ECSM6_EC_2_COMMENT_VERIFIKASI_RAYUAN = $request->ECSM6_EC_2_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->ECSM6_EC_3_COMMENT_VERIFIKASI_RAYUAN = $request->ECSM6_EC_3_COMMENT_VERIFIKASI_RAYUAN;

            //UTK ECEW3_EC TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->ECEW3_EC_1_TP_VERIFIKASI_RAYUAN = $request->ECEW3_EC_1_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK ECEW3_EC COMMENT VERIFIKASI_RAYUAN
            $kriteria->ECEW3_EC_1_COMMENT_VERIFIKASI_RAYUAN = $request->ECEW3_EC_1_TP_VERIFIKASI_RAYUAN;

            //UTK ECAE2_EC TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->ECAE2_EC_1_TP_VERIFIKASI_RAYUAN = $request->ECAE2_EC_1_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK ECAE2_EC COMMENT VERIFIKASI_RAYUAN
            $kriteria->ECAE2_EC_1_COMMENT_VERIFIKASI_RAYUAN = $request->ECAE2_EC_1_COMMENT_VERIFIKASI_RAYUAN;

            //UTK ECAE3_EC TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->ECAE3_EC_1_TP_VERIFIKASI_RAYUAN = $request->ECAE3_EC_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->ECAE3_EC_2_TP_VERIFIKASI_RAYUAN = $request->ECAE3_EC_2_TP_VERIFIKASI_RAYUAN;
            $kriteria->ECAE3_EC_3_TP_VERIFIKASI_RAYUAN = $request->ECAE3_EC_3_TP_VERIFIKASI_RAYUAN;
            $kriteria->ECAE3_EC_4_TP_VERIFIKASI_RAYUAN = $request->ECAE3_EC_4_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK ECAE3_EC COMMENT VERIFIKASI_RAYUAN
            $kriteria->ECAE3_EC_1_COMMENT_VERIFIKASI_RAYUAN = $request->ECAE3_EC_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->ECAE3_EC_2_COMMENT_VERIFIKASI_RAYUAN = $request->ECAE3_EC_2_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->ECAE3_EC_3_COMMENT_VERIFIKASI_RAYUAN = $request->ECAE3_EC_3_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->ECAE3_EC_4_COMMENT_VERIFIKASI_RAYUAN = $request->ECAE3_EC_4_COMMENT_VERIFIKASI_RAYUAN;

            //UTK ECAE4_EC TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->ECAE4_EC_1_TP_VERIFIKASI_RAYUAN = $request->ECAE4_EC_TP_VERIFIKASI_RAYUAN;
            $kriteria->ECAE4_EC_2_TP_VERIFIKASI_RAYUAN = $request->ECAE4_EC_TP_VERIFIKASI_RAYUAN;
            $kriteria->ECAE4_EC_3_TP_VERIFIKASI_RAYUAN = $request->ECAE4_EC_TP_VERIFIKASI_RAYUAN;
            $kriteria->ECAE4_EC_4_TP_VERIFIKASI_RAYUAN = $request->ECAE4_EC_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK ECAE4_EC COMMENT VERIFIKASI_RAYUAN
            $kriteria->ECAE4_EC_1_COMMENT_VERIFIKASI_RAYUAN = $request->ECAE4_EC_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->ECAE4_EC_2_COMMENT_VERIFIKASI_RAYUAN = $request->ECAE4_EC_2_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->ECAE4_EC_3_COMMENT_VERIFIKASI_RAYUAN = $request->ECAE4_EC_3_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->ECAE4_EC_4_COMMENT_VERIFIKASI_RAYUAN = $request->ECAE4_EC_4_COMMENT_VERIFIKASI_RAYUAN;

            //UTK ECAE5_EC TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->ECAE5_EC_1_TP_VERIFIKASI_RAYUAN = $request->ECAE5_EC_1_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK ECAE5_EC COMMENT VERIFIKASI_RAYUAN
            $kriteria->ECAE5_EC_1_COMMENT_VERIFIKASI_RAYUAN = $request->ECAE5_EC_1_COMMENT_VERIFIKASI_RAYUAN;

            //UTK ECAE6_EC TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->ECAE6_EC_1_TP_VERIFIKASI_RAYUAN = $request->ECAE6_EC_1_TP_VERIFIKASI_RAYUAN;
            $kriteria->ECAE6_EC_2_TP_VERIFIKASI_RAYUAN = $request->ECAE6_EC_2_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK ECAE6_EC COMMENT VERIFIKASI_RAYUAN
            $kriteria->ECAE6_EC_1_COMMENT_VERIFIKASI_RAYUAN = $request->ECAE6_EC_1_COMMENT_VERIFIKASI_RAYUAN;
            $kriteria->ECAE6_EC_2_COMMENT_VERIFIKASI_RAYUAN = $request->ECAE6_EC_2_COMMENT_VERIFIKASI_RAYUAN;

            //UTK IN1 TATGET POINT VERIFIKASI_RAYUAN
            $kriteria->IN1_1_TP_VERIFIKASI_RAYUAN = $request->IN1_1_TP_VERIFIKASI_RAYUAN;
            
            
            //UTK IN1 COMMENT VERIFIKASI_RAYUAN
            $kriteria->IN1_1_COMMENT_VERIFIKASI_RAYUAN = $request->IN1_1_TP_VERIFIKASI_RAYUAN;


            $kriteria->save();
            return back();

    }

}
