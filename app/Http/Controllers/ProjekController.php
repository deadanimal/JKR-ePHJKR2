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
        
        // $user = $request->user();
        // if($user->hasRole('pentadbir|sekretariat')) {
        //     $projeks = Projek::all();
        // } else {

        // }

        if($request->ajax()) {
            return DataTables::collection($projeks)
            ->addIndexColumn()   
            ->addColumn('peranan', function (Projek $projek) {
                $projek_users = $projek->users;
                $html_button = '-';
                foreach($projek_users as $projek_user){
                    $html_button = $projek_user->role->display_name;
                }
                return $html_button;
            })             
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
            ->rawColumns(['tindakan', 'peranan'])
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

        $projek->save();

        return back();
    }

    public function satu_projek(Request $request) {

        
        
        $id = (int)$request->route('id');
        $projek = Projek::find($id);  
        $user = $request->user();      
        $users = User::all();
        $lantikans = ProjekRoleUser::where('projek_id', $id)->get();

        $user_role = ProjekRoleUser::where([
            ['projek_id', '=', $id],
            ['user_id', '=',$user->id],
        ])->first();        

        if($request->ajax()) {
            $markahs = Markah::where('projek_id', $id)->get();
            return DataTables::collection($markahs)
            ->addIndexColumn()    
            ->addColumn('kriteria_', function (Markah $markah) {
                $html_button = $markah->kriteria->kod.' - '.$markah->kriteria->nama;
                return $html_button;
            })
            ->rawColumns(['kriteria_'])
            ->make(true);
        }            


        if ($projek->kategori ==  'phJKR Bangunan Baru A') {
            $kriterias = Kriteria::where('borang', 'BARU A')->get();            
            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans'));             
        } else if ($projek->kategori ==  'phJKR Bangunan Baru B') {
            $kriterias = Kriteria::where('borang', 'BARU B')->get();            
            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans'));             
        } else if ($projek->kategori ==  'phJKR Bangunan Baru C') {
            $kriterias = Kriteria::where('borang', 'BARU C')->get();            
            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans')); 
        } else if ($projek->kategori ==  'phJKR Bangunan Baru D') {
            $kriterias = Kriteria::where('borang', 'BARU D')->get();            
            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans')); 
        } else if ($projek->kategori ==  'phJKR Bangunan PUN A') {
            $kriterias = Kriteria::where('borang', 'PUN A')->get();            
            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans')); 
        } else if ($projek->kategori ==  'phJKR Bangunan PUN B') {
            $kriterias = Kriteria::where('borang', 'PUN B')->get();            
            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans')); 
        } else if ($projek->kategori ==  'phJKR Bangunan PUN C') {
            $kriterias = Kriteria::where('borang', 'PUN C')->get();            
            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans')); 
        } else if ($projek->kategori ==  'phJKR Bangunan PUN D') {
            $kriterias = Kriteria::where('borang', 'PUN D')->get();            
            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans')); 
        } else if ($projek->kategori ==  'phJKR Bangunan Sediaada A') {
            $kriterias = Kriteria::where('borang', 'Sediaada A')->get();            
            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans')); 
        } else if ($projek->kategori ==  'phJKR Bangunan Sediaada B') {
            $kriterias = Kriteria::where('borang', 'Sediaada B')->get();            
            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans')); 
        } else if ($projek->kategori ==  'phJKR Bangunan Sediaada C') {
            $kriterias = Kriteria::where('borang', 'Sediaada C')->get();            
            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans')); 
        } else if ($projek->kategori ==  'phJKR Bangunan Sediaada D') {
            $kriterias = Kriteria::where('borang', 'Sediaada D')->get();            
            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans')); 
        } else if ($projek->kategori ==  'phJKR Jalan Baru') {
            $kriterias = Kriteria::where('borang', 'NEW ROADS')->get();            
            return view('projek.satu_eph_jalan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans')); 
        } else if ($projek->kategori ==  'phJKR Jalan Lama') {
            $kriterias = Kriteria::where('borang', 'UPGRADING ROADS')->get();            
            return view('projek.satu_eph_jalan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans')); 
        } else if ($projek->kategori ==  'GPSS Bangunan 1') {
            $kriterias = Kriteria::where('borang', 'NEW ROADS')->get();            
            return view('projek.satu_gpss_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans')); 
        } else if ($projek->kategori ==  'GPSS Bangunan 2') {
            $kriterias = Kriteria::where('borang', 'UPGRADING ROADS')->get();                
            return view('projek.satu_gpss_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans'));         
        } else if ($projek->kategori ==  'GPSS Bangunan 3') {
            $kriterias = Kriteria::where('borang', 'UPGRADING ROADS')->get();             
            return view('projek.satu_gpss_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans'));   
        }  else if ($projek->kategori ==  'GPSS Jalan') {
            $kriterias = Kriteria::where('borang', 'UPGRADING ROADS')->get();            
            return view('projek.satu_gpss_jalan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans'));       
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

        $kriteria = Kriteria::find($request->kriteria);
        if ($request->markah >$kriteria->maksimum) {
            Alert::error('Salah Markah', 'Sila letakkan markah kurang dari maksimum');
            return back();
        }

        $markah = New Markah;
        $markah->projek_id = $id;
        $markah->user_id = $user->id;
        $markah->kriteria_id = $request->kriteria;
        $markah->markah = $request->markah;
        $markah->ulasan = $request->ulasan;
        $markah->fasa = $request->fasa;
        if ($request->hasFile('dokumen1')) {
            $markah->dokumen1 = $request->file('dokumen1')->store('jkr-ephjkr/uploads');
        } else {
            if ($request->markah > 0) {
                Alert::error('Dokumen diperlukan', 'Jika markah melebihi 0, silakan letakkan sekurang-kurangnya satu dokumen lampiran');
                return back();
            }            
        }    
        if ($request->hasFile('dokumen2')) {
            $markah->dokumen2 = $request->file('dokumen2')->store('jkr-ephjkr/uploads');
        }     
        if ($request->hasFile('dokumen3')) {
            $markah->dokumen3 = $request->file('dokumen3')->store('jkr-ephjkr/uploads');
        }     
        if ($request->hasFile('dokumen4')) {
            $markah->dokumen4 = $request->file('dokumen4')->store('jkr-ephjkr/uploads');
        }     
        if ($request->hasFile('dokumen5')) {
            $markah->dokumen5 = $request->file('dokumen5')->store('jkr-ephjkr/uploads');
        }                         

        $markah->save();

        return back();


    }    




}
