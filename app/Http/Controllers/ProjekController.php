<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Projek;
use App\Models\KriteriaEphBangunan;
use App\Models\KriteriaEphJalan;
use App\Models\KriteriaGpssBangunan;
use App\Models\KriteriaGpssJalan;

class ProjekController extends Controller
{

    public function senarai_projek(Request $request) {
        $projeks = Projek::all();
        return view('projek.senarai', compact('projeks'));
    }

    public function borang_projek(Request $request) {
        return view('projek.borang');
    }

    public function cipta_projek(Request $request) {
        
        $projek = New Projek;

        $projek->nama = $request->nama;
        $projek->alamat = $request->alamat;
        $projek->poskod = $request->poskod;
        $projek->bandar = $request->bandar;
        $projek->negeri = $request->negeri;
        $projek->keluasanTapak = $request->keluasanTapak;
        $projek->jumlahBlokBangunan = $request->jumlahBlokBangunan;
        $projek->tarikhJangkaMulaPembinaan = $request->tarikhJangkaMulaPembinaan;
        $projek->tarikhJangkaSiapPembinaan = $request->tarikhJangkaSiapPembinaan;
        $projek->kaedahPelaksanaan = $request->kaedahPelaksanaan;
        $projek->jenisPerolehan = $request->jenisPerolehan;
        $projek->kosProjek = $request->kosProjek;
        $projek->jenisProjek = $request->jenisProjek;
        $projek->kategori = $request->kategori;

        if($projek->kategori == 'phJKR Bangunan') {
            $kriteria = New KriteriaEphBangunan;
            $kriteria->projek_id = $projek->id;
            $kriteria->save();
        } else if($projek->kategori == 'phJKR Jalan') {
            $kriteria = New KriteriaEphJalan;
            $kriteria->projek_id = $projek->id;
            $kriteria->save();
        } else if($projek->kategori == 'GPSS Bangunan') {
            $kriteria = New KriteriaGpssBangunan;
            $kriteria->projek_id = $projek->id;
            $kriteria->save();
        } else if($projek->kategori == 'GPSS Jalan') {
            $kriteria = New KriteriaGpssJalan;
            $kriteria->projek_id = $projek->id;
            $kriteria->save();          
        }          

        $projek->save();

        return back();
    }

    public function satu_projek(Request $request) {
        
        $id = (int)$request->route('id');
        $projek = Projek::find($id);        

        if($projek->kategori == 'phJKR Bangunan') {
            $kriteria = KriteriaEphBangunan::where('projek_id', $projek->id)->first();
            return view('projek.satu_eph_bangunan', compact('projek', 'kriteria'));            
        } else if($projek->kategori == 'phJKR Jalan') {
            $kriteria = KriteriaEphBangunan::where('projek_id', $projek->id)->first();
            // $kriteria = KriteriaEphJalan::where('projek_id', $projek->id)->first();
            return view('projek.satu_eph_jalan', compact('projek', 'kriteria'));            
        } else if($projek->kategori == 'GPSS Bangunan') {
            $kriteria = KriteriaEphBangunan::where('projek_id', $projek->id)->first();
            // $kriteria = KriteriaGpssBangunan::where('projek_id', $projek->id)->first();
            return view('projek.satu_gpss_bangunan', compact('projek', 'kriteria'));            
        } else if($projek->kategori == 'GPSS Jalan') {
            $kriteria = KriteriaEphBangunan::where('projek_id', $projek->id)->first();
            // $kriteria = KriteriaGpssJalan::where('projek_id', $projek->id)->first();
            return view('projek.satu_gpss_jalan', compact('projek', 'kriteria'));            
        }
        
    }




}
