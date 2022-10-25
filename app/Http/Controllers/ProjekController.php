<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use DataTables;
use DateTime;
use Carbon\Carbon;
use Alert;

use App\Models\User;
use App\Models\Projek;
use App\Models\Kriteria;
use App\Models\Markah;
use App\Models\ProjekRoleUser;

use App\Models\KriteriaEphBangunan;
use App\Models\KriteriaEphJalan;
use App\Models\KriteriaGpssBangunan;
use App\Models\KriteriaGpssJalan;

class ProjekController extends Controller
{

    public function senarai_projek(Request $request) {
        $projeks = Projek::all();
        if($request->ajax()) {
            return DataTables::collection($projeks)
            ->addIndexColumn()    
            ->addColumn('tindakan', function (Projek $projek) {
                $url = '/projek/'.$projek->id;
                $html_button = '<a href="'.$url.'"><button class="btn btn-primary">Lihat</button></a>';
                return $html_button;
            })
            ->editColumn('created_at', function (Projek $projek) {
                return [
                    'display' => ($projek->created_at && $projek->created_at != '0000-00-00 00:00:00') ? with(new Carbon($projek->created_at))->format('d F Y') : '',
                    'timestamp' => ($projek->created_at && $projek->created_at != '0000-00-00 00:00:00') ? with(new Carbon($projek->created_at))->timestamp : ''
                ];
            })
            ->rawColumns(['tindakan'])
            ->make(true);
        }        
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
        $users = User::all();
        $lantikans = ProjekRoleUser::where('projek_id', $id)->get();

        if($projek->kategori == 'phJKR Bangunan Baru A' || $projek->kategori == 'phJKR Bangunan Baru B' || $projek->kategori == 'phJKR Bangunan Baru C' || 'phJKR Bangunan Baru D' ||
        $projek->kategori == 'phJKR Bangunan PUN A' || $projek->kategori == 'phJKR Bangunan PUN B' || $projek->kategori == 'phJKR Bangunan PUN C' || 'phJKR Bangunan PUN D' ||
        $projek->kategori == 'phJKR Bangunan Sediaada A' || $projek->kategori == 'phJKR Bangunan Sediaada B' || $projek->kategori == 'phJKR Bangunan Sediaada C' || 'phJKR Bangunan Sediaada D') {            
            
            if ($projek->kategori ==  'phJKR Bangunan Baru A') {
                $kriterias = Kriteria::where('borang', 'BARU A')->get();
            } else if ($projek->kategori ==  'phJKR Bangunan Baru B') {
                $kriterias = Kriteria::where('borang', 'BARU B')->get();
            } else if ($projek->kategori ==  'phJKR Bangunan Baru C') {
                $kriterias = Kriteria::where('borang', 'BARU C')->get();
            }


            $kriteria = KriteriaEphBangunan::where('projek_id', $projek->id)->first();
            return view('projek.satu_eph_bangunan', compact('projek', 'kriteria', 'kriterias', 'users', 'lantikans'));            

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

    public function lantik(Request $request) {
        $user = $request->user();
        $id = (int)$request->route('id');

        $projek_role = New ProjekRoleUser;
        $projek_role->projek_id = $id;
        $projek_role->user_id = (int)$request->user_id;
        $projek_role->role_id = (int)$request->role_id;
        $projek_role->save();

        return back();
    }

    public function markah(Request $request) {
        $user = $request->user();
        $id = (int)$request->route('id');

        $markah = New Markah;
        $markah->projek_id = $id;
        $markah->user_id = $user->id;
        $markah->kriteria_id = $request->kriteria;
        $markah->markah = $request->markah;
        $markah->ulasan = $request->ulasan;
        $markah->dokumen1 = $request->file('dokumen1')->store('jkr-ephjkr/uploads');
        $markah->dokumen2 = $request->file('dokumen2')->store('jkr-ephjkr/uploads');
        $markah->dokumen3 = $request->file('dokumen3')->store('jkr-ephjkr/uploads');
        $markah->dokumen4 = $request->file('dokumen4')->store('jkr-ephjkr/uploads');
        $markah->dokumen5 = $request->file('dokumen5')->store('jkr-ephjkr/uploads');

        $markah->save();

        return back();


    }    




}
