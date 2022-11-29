<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DataTables;
use DateTime;
use Carbon\Carbon;
use Alert;
use App\Mail\GugurProjek;
use App\Mail\PengesahanPenilaian;
use App\Models\User;
use App\Models\Projek;
use App\Models\Kriteria;
use App\Models\RayuanKriteria;
use App\Models\GpssKriteria;
use App\Models\Markah;
use App\Models\MarkahRayuan;
use App\Models\GpssMarkah;
use App\Models\GpssMarkahRayuan;
use App\Models\ProjekRoleUser;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;


use App\Models\KriteriaEphBangunan;
use App\Models\KriteriaEphJalan;
use App\Models\KriteriaGpssBangunan;
use App\Models\KriteriaGpssJalan;
use Illuminate\Support\Facades\Auth;

class ProjekController extends Controller
{

    public function senarai_projek(Request $request) {
        
        $user = $request->user();
        // dd($user); //bawak id user yg tgah login
        if($user->hasRole('pentadbir|sekretariat|pengurusan-atasan')) {
            $projeks = Projek::all();
        // dd($projeks); //bawak id projek total 73 projek


            // dd($projeks);
        } else if ($user->hasRole('ketua-pasukan|penolong-ketua-pasukan|pemudah-cara|ketua-penilai|ketua-validasi|pasukan-validasi|ketua-pemudah-cara|penilai') ){
            $projek_roles = ProjekRoleUser::where('user_id', $user->id)->get();
            // dd($projek_roles); //utk user pemudah cara dye bawak id then list 8 projeks dlm table projekroleuser
            // $projeks = collect($projek_roles);
            $projeks = collect();
            // dd($projeks); //kosong tiada item yg di collect //null
            foreach($projek_roles as $projek_role) {
                // dd($projek_role);
                $projek = Projek::where('id', $projek_role->projek_id)->first();
                // dd($projek); //diplay satu projek jeee
                $projeks->add($projek);
                // dd($projeks); //null

            }
        }
        // dd('$projeks');

        // $projeks = Projek::all();
        //dd('$projeks');

        if($request->ajax()) {
            return DataTables::collection($projeks)
            ->addIndexColumn()   
            // ->addColumn('peranan', function (Projek $projek) {
            //     $projek_users = $projek->users;
            //     $html_button = '-';
            //     foreach($projek_users as $projek_user){
            //         $html_button = $projek_user->role->display_name;
            //     }
            //     return $html_button;
            // })             
            ->addColumn('tindakan', function (Projek $projek) {
                $url = '/projek/'.$projek->id;
                $html_button = '<div class="row mt-3"><div class="col text-center">
                <a href="'.$url.'"><button class="btn btn-primary">Lihat</button></a>
                </div></div>';
                return $html_button;
            })
            ->addColumn('gugur', function (Projek $projek, Request $request) {
                // $user = $request->user();
                $url = '/projek/gugur_projek/'.$projek->id;
                // if($user) {
                    // if($user->hasRole(['ketua-pasukan', 'penolong-ketua-pasukan'])){
                        $html_button = '<div class="row mt-3"><div class="col text-center">
                        <a href="'.$url.'"><button class="btn btn-primary">gugur</button></a>
                        </div></div>';
                        return $html_button;
                    // }
                // }
                // return $html_button;
            })
            ->editColumn('created_at', function (Projek $projek) {
                return [
                    'display' => ($projek->created_at && $projek->created_at != '0000-00-00 00:00:00') ? with(new Carbon($projek->created_at))->format('d F Y') : '',
                    'timestamp' => ($projek->created_at && $projek->created_at != '0000-00-00 00:00:00') ? with(new Carbon($projek->created_at))->timestamp : ''
                ];
            })
            ->rawColumns(['tindakan', 'gugur', 'created_at'])
            ->make(true);
        }        
        return view('projek.senarai', compact('projeks'));
    }

    public function borang_projek(Request $request) {
        return view('projek.borang');
    }

    public function papar_semua_projek() 
    { 

        $url = 'http://admin3-skala.jkr.gov.my/~vnisa/2022-devpskala/web/www/api/ephjkr-api.php';
        $response = Http::get($url, [
            'id_pengguna' => '850703045020', //$id_sso_skala //
        ]);
        
        $response = json_decode($response, true) ['data'];
        
        // foreach ($response as $k=>$v){
        //     $url2 = 'http://admin3-skala.jkr.gov.my/~vnisa/2022-devpskala/web/www/api/ephjkr-api2.php';
        //     $response2 = Http::get($url2, [
        //         'id_pengguna' => '850703045020', 
        //         'ruj_projek' => $v['ruj_projek']
        //     ]);

        //     // $response2 = json_decode($response2, true);

        //     echo "<br>aaaaa<pre>".var_dump($v).'</pre>';
        //     // $t = (int)preg_replace("/[^0-9.]/", "", $v['records']['kos_projek']['kos_projek_semasa']);

        //     // if ($v['records']['pelanggan_pejabat_bertanggungjawab']['pejabat_hopt'] == 'BHG. BANGUNAN (SEL)' &&  $t >= 20000000){ 
            
        //     // }elseif ($v['records']['pelanggan_pejabat_bertanggungjawab']['pejabat_hopt'] == 'JALAN' &&  $t >= 50000000){ 

        //     // }else{
        //     //     unset($response[$k]);
        //     // }
        // }

        // dd($response);
        
        
        // echo($response2);
        // (int)preg_replace("/[^0-9.]/", "", $res['records']['kos_projek']['kos_projek_semasa']);

        // foreach ($response as $k=>$v){
            // echo "<br><pre>".var_dump($v).'</pre>';
            // $t = (int)preg_replace("/[^0-9.]/", "", $v['records']['kos_projek']['kos_projek_semasa']);

            // if ($v['records']['pelanggan_pejabat_bertanggungjawab']['pejabat_hopt'] == 'BHG. BANGUNAN (SEL)' &&  $t >= 20000000){ 
            
            // }elseif ($v['records']['pelanggan_pejabat_bertanggungjawab']['pejabat_hopt'] == 'JALAN' &&  $t >= 50000000){ 

            // }else{
            //     unset($response[$k]);
            // }
        // }

        //dd($response);
        return view('myskala', [
            'projeks' => $response,
            // 'projek' => $response2
        ]);


    }

    public function papar_semua_projek2($id) 
    {

        $url = 'http://admin3-skala.jkr.gov.my/~vnisa/2022-devpskala/web/www/api/ephjkr-api.php';
        $response = Http::get($url, [
            'id_pengguna' => '850703045020', //$id_sso_skala //
        ]);

        $url2 = 'http://admin3-skala.jkr.gov.my/~vnisa/2022-devpskala/web/www/api/ephjkr-api2.php';
        $response2 = Http::get($url2, [
            'id_pengguna' => '850703045020', 
            'ruj_projek' => $id
        ]);

        //dd($response);
        $response = json_decode($response, true) ['data'];
        $response2 = json_decode($response2, true);
        //dd($response2);

        //dd($response);
        return view('myskala2', [
            'projeks' => $response,
            'projek' => $response2
        ]);


    }

    public function simpan_skala(Request $request) {
        // dd($request);

        //check kalo dah wujud
        $proj = Projek::where('nama',$request->tajuk_projek)->get();
        if(count($proj) > 0){
            alert()->Error('Maklumat telah wujud', 'Gagal');
            return redirect('/projek');
        }

        //check kalo lebih certain amount
        // $t = (int)preg_replace("/[^0-9.]/", "", $request->kosProjek);

        // if (($request->jenis_projek == 'BANGUNAN' && 
            // $t >= 20000000) 
            // || ($request->jenis_projek == 'JALAN' &&  $t >= 50000000)
            // ){ 
            $projek = New Projek;
            $projek->nama = $request->tajuk_projek;
            $projek->alamat = $request->lokasi_tapak;
            $projek->kaedahPelaksanaan = $request->kaedahPelaksanaan;
            $projek->jenisPerolehan = $request->jenisPerolehan;
            $projek->kosProjek = $request->kosProjek;
            $projek->kategori = $request->kategori;
            $projek->jenisProjek = $request->jenisProjek;
            $projek->save();
        // }else{
            // alert()->success('Maklumat tidak melebihi syarat ditetapkan', 'Gagal');
            // return redirect('/projek');
        // }

        alert()->success('Projek SKALA telah Daftar', 'Berjaya');
        return redirect('/projek');

        // return back();
    }

    //gugurprojek
    public function gugur_projek(Request $request) {
        $id = (int)$request->route('id'); 
        $projek = Projek::find($id);
        return view('projek.gugur_projek', compact('projek'));
    }

    public function simpan_permohonan_gugur(Request $request) {  
        $id = (int)$request->route('id'); 
        $projek = Projek::find($id);
        $projek->alasan = $request->alasan;
        $projek->gugur = true;

        $projek->save();
        alert()->success('Permohonan Gugur Projek telah dihantar', 'Berjaya');
        return redirect('/projek');
    }

    // public function senarai_gugur_projek(Request $request) { 
    //     $projek = Projek::all();
    //     return view('projek.senarai_gugur_projek', compact('projek'));
    // }
    public function senarai_gugur_projek(Request $request) {
        // $id = (int)$request->route('id'); 
        $projek = Projek::where('gugur','1')->get();
        return view('projek.senarai_gugur_projek',compact('projek'));
    }

    public function Pengesahan(Request $request) {
        $id = (int)$request->route('id'); 
        $projek = Projek::find($id);
        $projek->delete();
        // $projek->aktif = false;
        // $projek->save();

        alert()->success('Maklumat telah disahkan', 'Berjaya');
        return redirect('/projek/gugur/senarai_gugur_projek');
    }

    // public function buang(Request $request) {  
    //     $id = (int)$request->route('id'); 
    //     $peranan = Role::find($id); 
    //     $peranan->delete();

    //     alert()->success('Maklumat telah dibuang', 'Berjaya');
    //     return redirect('/selenggara');
    // }

    //email
    public function email_gugur_projek(Request $request){
        $user = $request->user();
        $id = (int)$request->route('id');
        $projek = Projek::find($id);
        Mail::to('maisarah.musa@pipeline-network.com')->send(new GugurProjek($projek));
        // $email = Auth::user()->email;
        // Mail::to($user->email)->send(new ProjekStatusBerubah($projek));
        return back();
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

        alert('Projek Baharu telah Daftar','Berjaya');
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

        if($request->ajax() && $projek->kategori ==  'phJKR Bangunan Baru A') {
            $kriterias = Kriteria::where('borang', 'BARU A')->get();
            return DataTables::collection($kriterias)
            ->addIndexColumn()
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah != null) {
                        $html_button = $markah->markah;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei != null) {
                        $html_button = $markah->markah_bei;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            }) 
            ->addColumn('markah_rekabentuk_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_rekabentuk != null) {
                        $html_button = $markah->markah_rekabentuk;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_verifikasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_verifikasi != null) {
                        $html_button = $markah->markah_verifikasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_validasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_validasi != null) {
                        $html_button = $markah->markah_validasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei_rekabentuk', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_rekabentuk != null) {
                        $html_button = $markah->markah_bei_rekabentuk;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_verifikasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_verifikasi != null) {
                        $html_button = $markah->markah_bei_verifikasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_validasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_validasi != null) {
                        $html_button = $markah->markah_bei_validasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_', 
            'markah_rekabentuk_', 'markah_verifikasi_', 'markah_validasi_','markah_bei_rekabentuk', 'markah_bei_verifikasi', 'markah_bei_validasi', 'ulasan_rayuan', 'dokumen_rayuan'
            ])
            ->make(true);
        } 
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Baru B') {
            $kriterias = Kriteria::where('borang', 'BARU B')->get();
            return DataTables::collection($kriterias)
            ->addIndexColumn()
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah != null) {
                        $html_button = $markah->markah;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei != null) {
                        $html_button = $markah->markah_bei;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            }) 
            ->addColumn('markah_rekabentuk_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_rekabentuk != null) {
                        $html_button = $markah->markah_rekabentuk;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_verifikasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_verifikasi != null) {
                        $html_button = $markah->markah_verifikasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_validasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_validasi != null) {
                        $html_button = $markah->markah_validasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei_rekabentuk', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_rekabentuk != null) {
                        $html_button = $markah->markah_bei_rekabentuk;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_verifikasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_verifikasi != null) {
                        $html_button = $markah->markah_bei_verifikasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_validasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_validasi != null) {
                        $html_button = $markah->markah_bei_validasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_', 
            'markah_rekabentuk_', 'markah_verifikasi_', 'markah_validasi_','markah_bei_rekabentuk', 'markah_bei_verifikasi', 'markah_bei_validasi', 'ulasan_rayuan', 'dokumen_rayuan'
            ])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Baru C') {
            $kriterias = Kriteria::where('borang', 'BARU C')->get();
            return DataTables::collection($kriterias)
            ->addIndexColumn()
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah != null) {
                        $html_button = $markah->markah;
                    }
                }      
                // dd($markah);          
                return $html_button;     
            })
            ->addColumn('markah_bei', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei != null) {
                        $html_button = $markah->markah_bei;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            }) 
            ->addColumn('markah_rekabentuk_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_rekabentuk != null) {
                        $html_button = $markah->markah_rekabentuk;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_verifikasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_verifikasi != null) {
                        $html_button = $markah->markah_verifikasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_validasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_validasi != null) {
                        $html_button = $markah->markah_validasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei_rekabentuk', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_rekabentuk != null) {
                        $html_button = $markah->markah_bei_rekabentuk;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_verifikasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_verifikasi != null) {
                        $html_button = $markah->markah_bei_verifikasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_validasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_validasi != null) {
                        $html_button = $markah->markah_bei_validasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_', 
            'markah_rekabentuk_', 'markah_verifikasi_', 'markah_validasi_','markah_bei_rekabentuk', 'markah_bei_verifikasi', 'markah_bei_validasi', 'ulasan_rayuan', 'dokumen_rayuan'
            ])
            ->make(true);
        } 
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Baru D') {
            $kriterias = Kriteria::where('borang', 'BARU D')->get();
            return DataTables::collection($kriterias)
            ->addIndexColumn()
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah != null) {
                        $html_button = $markah->markah;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei != null) {
                        $html_button = $markah->markah_bei;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            }) 
            ->addColumn('markah_rekabentuk_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_rekabentuk != null) {
                        $html_button = $markah->markah_rekabentuk;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_verifikasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_verifikasi != null) {
                        $html_button = $markah->markah_verifikasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_validasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_validasi != null) {
                        $html_button = $markah->markah_validasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei_rekabentuk', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_rekabentuk != null) {
                        $html_button = $markah->markah_bei_rekabentuk;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_verifikasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_verifikasi != null) {
                        $html_button = $markah->markah_bei_verifikasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_validasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_validasi != null) {
                        $html_button = $markah->markah_bei_validasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_', 
            'markah_rekabentuk_', 'markah_verifikasi_', 'markah_validasi_','markah_bei_rekabentuk', 'markah_bei_verifikasi', 'markah_bei_validasi', 'ulasan_rayuan', 'dokumen_rayuan'
            ])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan PUN A') {
            $kriterias = Kriteria::where('borang', 'PUN A')->get();
            return DataTables::collection($kriterias)
            ->addIndexColumn()
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah != null) {
                        $html_button = $markah->markah;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei != null) {
                        $html_button = $markah->markah_bei;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            }) 
            ->addColumn('markah_rekabentuk_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_rekabentuk != null) {
                        $html_button = $markah->markah_rekabentuk;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_verifikasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_verifikasi != null) {
                        $html_button = $markah->markah_verifikasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_validasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_validasi != null) {
                        $html_button = $markah->markah_validasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei_rekabentuk', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_rekabentuk != null) {
                        $html_button = $markah->markah_bei_rekabentuk;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_verifikasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_verifikasi != null) {
                        $html_button = $markah->markah_bei_verifikasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_validasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_validasi != null) {
                        $html_button = $markah->markah_bei_validasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_', 
            'markah_rekabentuk_', 'markah_verifikasi_', 'markah_validasi_','markah_bei_rekabentuk', 'markah_bei_verifikasi', 'markah_bei_validasi', 'ulasan_rayuan', 'dokumen_rayuan'
            ])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan PUN B') {
            $kriterias = Kriteria::where('borang', 'PUN B')->get();
            return DataTables::collection($kriterias)
            ->addIndexColumn()
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah != null) {
                        $html_button = $markah->markah;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei != null) {
                        $html_button = $markah->markah_bei;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            }) 
            ->addColumn('markah_rekabentuk_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_rekabentuk != null) {
                        $html_button = $markah->markah_rekabentuk;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_verifikasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_verifikasi != null) {
                        $html_button = $markah->markah_verifikasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_validasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_validasi != null) {
                        $html_button = $markah->markah_validasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei_rekabentuk', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_rekabentuk != null) {
                        $html_button = $markah->markah_bei_rekabentuk;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_verifikasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_verifikasi != null) {
                        $html_button = $markah->markah_bei_verifikasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_validasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_validasi != null) {
                        $html_button = $markah->markah_bei_validasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_', 
            'markah_rekabentuk_', 'markah_verifikasi_', 'markah_validasi_','markah_bei_rekabentuk', 'markah_bei_verifikasi', 'markah_bei_validasi', 'ulasan_rayuan', 'dokumen_rayuan'
            ])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan PUN C') {
            $kriterias = Kriteria::where('borang', 'PUN C')->get();
            return DataTables::collection($kriterias)
            ->addIndexColumn()
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah != null) {
                        $html_button = $markah->markah;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei != null) {
                        $html_button = $markah->markah_bei;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            }) 
            ->addColumn('markah_rekabentuk_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_rekabentuk != null) {
                        $html_button = $markah->markah_rekabentuk;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_verifikasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_verifikasi != null) {
                        $html_button = $markah->markah_verifikasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_validasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_validasi != null) {
                        $html_button = $markah->markah_validasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei_rekabentuk', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_rekabentuk != null) {
                        $html_button = $markah->markah_bei_rekabentuk;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_verifikasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_verifikasi != null) {
                        $html_button = $markah->markah_bei_verifikasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_validasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_validasi != null) {
                        $html_button = $markah->markah_bei_validasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_', 
            'markah_rekabentuk_', 'markah_verifikasi_', 'markah_validasi_','markah_bei_rekabentuk', 'markah_bei_verifikasi', 'markah_bei_validasi', 'ulasan_rayuan', 'dokumen_rayuan'
            ])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan PUN D') {
            $kriterias = Kriteria::where('borang', 'PUN D')->get();
            return DataTables::collection($kriterias)
            ->addIndexColumn()
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah != null) {
                        $html_button = $markah->markah;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei != null) {
                        $html_button = $markah->markah_bei;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            }) 
            ->addColumn('markah_rekabentuk_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_rekabentuk != null) {
                        $html_button = $markah->markah_rekabentuk;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_verifikasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_verifikasi != null) {
                        $html_button = $markah->markah_verifikasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_validasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_validasi != null) {
                        $html_button = $markah->markah_validasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei_rekabentuk', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_rekabentuk != null) {
                        $html_button = $markah->markah_bei_rekabentuk;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_verifikasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_verifikasi != null) {
                        $html_button = $markah->markah_bei_verifikasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_validasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_validasi != null) {
                        $html_button = $markah->markah_bei_validasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_', 
            'markah_rekabentuk_', 'markah_verifikasi_', 'markah_validasi_','markah_bei_rekabentuk', 'markah_bei_verifikasi', 'markah_bei_validasi', 'ulasan_rayuan', 'dokumen_rayuan'
            ])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Sedia Ada A') {
            $kriterias = Kriteria::where('borang', 'SEDIA ADA A')->get();
            return DataTables::collection($kriterias)
            ->addIndexColumn()
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah != null) {
                        $html_button = $markah->markah;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei != null) {
                        $html_button = $markah->markah_bei;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            }) 
            ->addColumn('markah_rekabentuk_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_rekabentuk != null) {
                        $html_button = $markah->markah_rekabentuk;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_verifikasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_verifikasi != null) {
                        $html_button = $markah->markah_verifikasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_validasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_validasi != null) {
                        $html_button = $markah->markah_validasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei_rekabentuk', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_rekabentuk != null) {
                        $html_button = $markah->markah_bei_rekabentuk;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_verifikasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_verifikasi != null) {
                        $html_button = $markah->markah_bei_verifikasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_validasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_validasi != null) {
                        $html_button = $markah->markah_bei_validasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_', 
            'markah_rekabentuk_', 'markah_verifikasi_', 'markah_validasi_','markah_bei_rekabentuk', 'markah_bei_verifikasi', 'markah_bei_validasi', 'ulasan_rayuan', 'dokumen_rayuan'
            ])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Sedia Ada B') {
            $kriterias = Kriteria::where('borang', 'SEDIA ADA B')->get();
            return DataTables::collection($kriterias)
            ->addIndexColumn()
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah != null) {
                        $html_button = $markah->markah;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei != null) {
                        $html_button = $markah->markah_bei;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            }) 
            ->addColumn('markah_rekabentuk_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_rekabentuk != null) {
                        $html_button = $markah->markah_rekabentuk;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_verifikasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_verifikasi != null) {
                        $html_button = $markah->markah_verifikasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_validasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_validasi != null) {
                        $html_button = $markah->markah_validasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei_rekabentuk', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_rekabentuk != null) {
                        $html_button = $markah->markah_bei_rekabentuk;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_verifikasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_verifikasi != null) {
                        $html_button = $markah->markah_bei_verifikasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_validasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_validasi != null) {
                        $html_button = $markah->markah_bei_validasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_', 
            'markah_rekabentuk_', 'markah_verifikasi_', 'markah_validasi_','markah_bei_rekabentuk', 'markah_bei_verifikasi', 'markah_bei_validasi', 'ulasan_rayuan', 'dokumen_rayuan'
            ])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Sedia Ada C') {
            $kriterias = Kriteria::where('borang', 'SEDIA ADA C')->get();
            return DataTables::collection($kriterias)
            ->addIndexColumn()
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah != null) {
                        $html_button = $markah->markah;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei != null) {
                        $html_button = $markah->markah_bei;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            }) 
            ->addColumn('markah_rekabentuk_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_rekabentuk != null) {
                        $html_button = $markah->markah_rekabentuk;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_verifikasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_verifikasi != null) {
                        $html_button = $markah->markah_verifikasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_validasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_validasi != null) {
                        $html_button = $markah->markah_validasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei_rekabentuk', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_rekabentuk != null) {
                        $html_button = $markah->markah_bei_rekabentuk;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_verifikasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_verifikasi != null) {
                        $html_button = $markah->markah_bei_verifikasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_validasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_validasi != null) {
                        $html_button = $markah->markah_bei_validasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_', 
            'markah_rekabentuk_', 'markah_verifikasi_', 'markah_validasi_','markah_bei_rekabentuk', 'markah_bei_verifikasi', 'markah_bei_validasi', 'ulasan_rayuan', 'dokumen_rayuan'
            ])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Sedia Ada D') {
            $kriterias = Kriteria::where('borang', 'SEDIA ADA D')->get();
            return DataTables::collection($kriterias)
            ->addIndexColumn()
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah != null) {
                        $html_button = $markah->markah;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei != null) {
                        $html_button = $markah->markah_bei;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            }) 
            ->addColumn('markah_rekabentuk_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_rekabentuk != null) {
                        $html_button = $markah->markah_rekabentuk;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_verifikasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_verifikasi != null) {
                        $html_button = $markah->markah_verifikasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_validasi_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_validasi != null) {
                        $html_button = $markah->markah_validasi;
                    }
                }                
                return $html_button;     
            })
            ->addColumn('markah_bei_rekabentuk', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_rekabentuk != null) {
                        $html_button = $markah->markah_bei_rekabentuk;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_verifikasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_verifikasi != null) {
                        $html_button = $markah->markah_bei_verifikasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('markah_bei_validasi', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->markah_bei_validasi != null) {
                        $html_button = $markah->markah_bei_validasi;
                    }
                }              
                return $html_button;   
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->ulasan != null) {
                        $html_button = $markah->ulasan;
                    }
                }               
                return $html_button;
            }) 
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_', 
            'markah_rekabentuk_', 'markah_verifikasi_', 'markah_validasi_','markah_bei_rekabentuk', 'markah_bei_verifikasi', 'markah_bei_validasi', 'ulasan_rayuan', 'dokumen_rayuan'
            ])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'GPSS Bangunan 1') {
            $gpss_kriterias = GpssKriteria::where('borang', 'CATEGORY 1')->get();
            return DataTables::collection($gpss_kriterias)
            ->addIndexColumn()    
            ->addColumn('markah_point_allocated', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                // dd($markah);      
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();                
                if($markah) {  
                    if ($markah->point_allocated != null) {
                        $html_button = $markah->point_allocated;
                    }                                       
                }         
                return $html_button;   
            })
            ->addColumn('markah_point_req_design', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?'; 
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();                    
                if($markah) {                     
                    if ($markah->point_req_design != null) {
                        $html_button = $markah->point_req_design;
                    }                    
                }         
                return $html_button;
            })
            ->addColumn('markah_point_req_construction', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?'; 
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                    ['fasa', '=', 'verifikasi']
                ])->first();                  
                if($markah) {
                    if($markah->point_req_construction != null) {
                        $html_button = $markah->point_req_construction;
                    }
                                            
                }         
                return $html_button;
            })
            ->addColumn('markah_point_awarded', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';    
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();                   
                if($markah) { 
                    if ($markah->point_awarded != null) {
                        $html_button = $markah->point_awarded;
                    }                                    
                }         
                return $html_button;
            })
            ->addColumn('remarks_', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';  
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                ])->first();                     
                if($markah) {
                    if ($markah->remarks != null) {
                        $html_button = $markah->remarks;
                    }                    
                }         
                return $html_button;
            })     
            ->addColumn('dokumen_', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';    
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                ])->first();                  
                if($markah) {
                     
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })   
            ->addColumn('markah_point_allocated_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                // dd($markah);      
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();                
                if($markah) {  
                    if ($markah->point_allocated != null) {
                        $html_button = $markah->point_allocated;
                    }                                       
                }         
                return $html_button;   
            })
            ->addColumn('markah_point_req_design_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?'; 
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();                    
                if($markah) {                     
                    if ($markah->point_req_design != null) {
                        $html_button = $markah->point_req_design;
                    }                    
                }         
                return $html_button;
            })
            ->addColumn('markah_point_req_construction_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?'; 
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                    ['fasa', '=', 'verifikasi']
                ])->first();                  
                if($markah) {
                    if($markah->point_req_construction != null) {
                        $html_button = $markah->point_req_construction;
                    }
                                            
                }         
                return $html_button;
            })
            ->addColumn('markah_point_awarded_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';    
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();                   
                if($markah) { 
                    if ($markah->point_awarded != null) {
                        $html_button = $markah->point_awarded;
                    }                                    
                }         
                return $html_button;
            })
            ->addColumn('remarks_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';  
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                ])->first();                     
                if($markah) {
                    if ($markah->remarks != null) {
                        $html_button = $markah->remarks;
                    }                    
                }         
                return $html_button;
            })     
            ->addColumn('dokumen_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';    
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                ])->first();                  
                if($markah) {
                     
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })                     
            ->rawColumns(['markah_point_allocated', 'markah_point_req_design', 'markah_point_req_construction', 'markah_point_awarded', 'remarks_', 'dokumen_',
            'markah_point_allocated_r', 'markah_point_req_design_r', 'markah_point_req_construction_r', 'markah_point_awarded_r', 'remarks_r', 'dokumen_r'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'GPSS Bangunan 2') {
            $gpss_kriterias = GpssKriteria::where('borang', 'CATEGORY 2')->get();
            return DataTables::collection($gpss_kriterias)
            ->addIndexColumn()    
            ->addColumn('markah_point_allocated', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first(); 
                // dd($markah);      
                if($markah) {  
                    if ($markah->point_allocated != null) {
                        $html_button = $markah->point_allocated;
                    }                                       
                }         
                return $html_button;   
            })
            ->addColumn('markah_point_req_design', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();       
                if($markah) {                     
                    if ($markah->point_req_design != null) {
                        $html_button = $markah->point_req_design;
                    }                    
                }         
                return $html_button;
            })
            ->addColumn('markah_point_req_construction', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                    ['fasa', '=', 'verifikasi']
                ])->first();       
                if($markah) {
                    if($markah->point_req_construction != null) {
                        $html_button = $markah->point_req_construction;
                    }
                                            
                }         
                return $html_button;
            })
            ->addColumn('markah_point_awarded', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();       
                if($markah) { 
                    if ($markah->point_awarded != null) {
                        $html_button = $markah->point_awarded;
                    }                                    
                }         
                return $html_button;
            })
            ->addColumn('remarks_', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                ])->first();       
                if($markah) {
                    if ($markah->remarks != null) {
                        $html_button = $markah->remarks;
                    }                    
                }          
                return $html_button;
            })     
            ->addColumn('dokumen_', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                ])->first();       
                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            }) 
            ->addColumn('markah_point_allocated_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                // dd($markah);      
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();                
                if($markah) {  
                    if ($markah->point_allocated != null) {
                        $html_button = $markah->point_allocated;
                    }                                       
                }         
                return $html_button;   
            })
            ->addColumn('markah_point_req_design_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?'; 
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();                    
                if($markah) {                     
                    if ($markah->point_req_design != null) {
                        $html_button = $markah->point_req_design;
                    }                    
                }         
                return $html_button;
            })
            ->addColumn('markah_point_req_construction_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?'; 
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                    ['fasa', '=', 'verifikasi']
                ])->first();                  
                if($markah) {
                    if($markah->point_req_construction != null) {
                        $html_button = $markah->point_req_construction;
                    }
                                            
                }         
                return $html_button;
            })
            ->addColumn('markah_point_awarded_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';    
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();                   
                if($markah) { 
                    if ($markah->point_awarded != null) {
                        $html_button = $markah->point_awarded;
                    }                                    
                }         
                return $html_button;
            })
            ->addColumn('remarks_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';  
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                ])->first();                     
                if($markah) {
                    if ($markah->remarks != null) {
                        $html_button = $markah->remarks;
                    }                    
                }         
                return $html_button;
            })     
            ->addColumn('dokumen_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';    
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                ])->first();                  
                if($markah) {
                     
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })                     
            ->rawColumns(['markah_point_allocated', 'markah_point_req_design', 'markah_point_req_construction', 'markah_point_awarded', 'remarks_', 'dokumen_',
            'markah_point_allocated_r', 'markah_point_req_design_r', 'markah_point_req_construction_r', 'markah_point_awarded_r', 'remarks_r', 'dokumen_r'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'GPSS Bangunan 3') {
            $gpss_kriterias = GpssKriteria::where('borang', 'CATEGORY 3')->get();
            return DataTables::collection($gpss_kriterias)
            ->addIndexColumn()    
            ->addColumn('markah_point_allocated', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first(); 
                // dd($markah);      
                if($markah) {  
                    if ($markah->point_allocated != null) {
                        $html_button = $markah->point_allocated;
                    }                                       
                }          
                return $html_button;   
            })
            ->addColumn('markah_point_req_design', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();       
                if($markah) {                     
                    if ($markah->point_req_design != null) {
                        $html_button = $markah->point_req_design;
                    }                    
                }         
                return $html_button;
            })
            ->addColumn('markah_point_req_construction', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                    ['fasa', '=', 'verifikasi']
                ])->first();       
                if($markah) {
                    if($markah->point_req_construction != null) {
                        $html_button = $markah->point_req_construction;
                    }
                                            
                }         
                return $html_button;
            })
            ->addColumn('markah_point_awarded', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();       
                if($markah) { 
                    if ($markah->point_awarded != null) {
                        $html_button = $markah->point_awarded;
                    }                                    
                }         
                return $html_button;
            })
            ->addColumn('remarks_', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                ])->first();       
                if($markah) {
                    if ($markah->remarks != null) {
                        $html_button = $markah->remarks;
                    }                    
                }         
                return $html_button;
            })     
            ->addColumn('dokumen_', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                ])->first();       
                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            }) 
            ->addColumn('markah_point_allocated_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                // dd($markah);      
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();                
                if($markah) {  
                    if ($markah->point_allocated != null) {
                        $html_button = $markah->point_allocated;
                    }                                       
                }         
                return $html_button;   
            })
            ->addColumn('markah_point_req_design_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?'; 
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();                    
                if($markah) {                     
                    if ($markah->point_req_design != null) {
                        $html_button = $markah->point_req_design;
                    }                    
                }         
                return $html_button;
            })
            ->addColumn('markah_point_req_construction_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?'; 
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                    ['fasa', '=', 'verifikasi']
                ])->first();                  
                if($markah) {
                    if($markah->point_req_construction != null) {
                        $html_button = $markah->point_req_construction;
                    }
                                            
                }         
                return $html_button;
            })
            ->addColumn('markah_point_awarded_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';    
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();                   
                if($markah) { 
                    if ($markah->point_awarded != null) {
                        $html_button = $markah->point_awarded;
                    }                                    
                }         
                return $html_button;
            })
            ->addColumn('remarks_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';  
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                ])->first();                     
                if($markah) {
                    if ($markah->remarks != null) {
                        $html_button = $markah->remarks;
                    }                    
                }         
                return $html_button;
            })     
            ->addColumn('dokumen_r', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';    
                $markah = GpssMarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                ])->first();                  
                if($markah) {
                     
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })                     
            ->rawColumns(['markah_point_allocated', 'markah_point_req_design', 'markah_point_req_construction', 'markah_point_awarded', 'remarks_', 'dokumen_',
            'markah_point_allocated_r', 'markah_point_req_design_r', 'markah_point_req_construction_r', 'markah_point_awarded_r', 'remarks_r', 'dokumen_r'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'GPSS Jalan') {
            $gpss_kriterias = GpssKriteria::where('borang', 'ROAD')->get();
            return DataTables::collection($gpss_kriterias)
            ->addIndexColumn()    
            ->addColumn('markah_point_allocated', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first(); 
                // dd($markah);      
                if($markah) {  
                    if ($markah->point_allocated != null) {
                        $html_button = $markah->point_allocated;
                    }                                       
                }         
                return $html_button;   
            })
            ->addColumn('markah_point_req_design', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();       
                if($markah) {                     
                    if ($markah->point_req_design != null) {
                        $html_button = $markah->point_req_design;
                    }                    
                }         
                return $html_button;
            })
            ->addColumn('markah_point_req_construction', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                    ['fasa', '=', 'verifikasi']
                ])->first();       
                if($markah) {
                    if($markah->point_req_construction != null) {
                        $html_button = $markah->point_req_construction;
                    }
                                            
                }         
                return $html_button;
            })
            ->addColumn('markah_point_awarded', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id]
                ])->first();       
                if($markah) { 
                    if ($markah->point_awarded != null) {
                        $html_button = $markah->point_awarded;
                    }                                    
                }         
                return $html_button;
            })
            ->addColumn('remarks_', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                ])->first();       
                if($markah) {
                    if ($markah->remarks != null) {
                        $html_button = $markah->remarks;
                    }                    
                }         
                return $html_button;
            })     
            ->addColumn('dokumen_', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button = '?';
                $markah = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                ])->first();       
                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })                        
            ->rawColumns(['markah_point_allocated', 'markah_point_req_design', 'markah_point_req_construction', 'markah_point_awarded', 'remarks_', 'dokumen_'])
            ->make(true);
        } 
        elseif($request->ajax() && $projek->kategori ==  'phJKR Jalan Baru') {
            $kriterias = Kriteria::where('borang', 'NEW ROADS')->get();
            return DataTables::collection($kriterias)
            ->addColumn('targetpoint_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->target_point != null) {
                        $html_button = $markah->target_point;
                    }
                }               
                return $html_button;
            })
            ->addColumn('assessmentpoint_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->assessment_point != null) {
                        $html_button = $markah->assessment_point;
                    }
                }             
                return $html_button;
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->comment != null) {
                        $html_button = $markah->comment;
                    }
                }          
                return $html_button;
            })
            ->addColumn('dokumen_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })
            ->addColumn('targetpoint_r', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->target_point != null) {
                        $html_button = $markah->target_point;
                    }
                }               
                return $html_button;
            })
            ->addColumn('assessmentpoint_r', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->assessment_point != null) {
                        $html_button = $markah->assessment_point;
                    }
                }             
                return $html_button;
            })
            ->addColumn('ulasan_r', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->comment_on_appeal != null) {
                        $html_button = $markah->comment_on_appeal;
                    }
                }          
                return $html_button;
            })
            ->addColumn('dokumen_r', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })
            ->rawColumns(['targetpoint_', 'assessmentpoint_', 'ulasan_', 'dokumen_', 
            'targetpoint_r', 'assessmentpoint_r', 'ulasan_r', 'dokumen_r'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Jalan Naiktaraf') {
            $kriterias = Kriteria::where('borang', 'NEW ROADS')->get();
            return DataTables::collection($kriterias)
            ->addColumn('targetpoint_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();   
                if($markah){
                    if($markah->target_point != null) {
                        $html_button = $markah->target_point;
                    }
                }             
                return $html_button;
            })
            ->addColumn('assessmentpoint_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();  
                if($markah){
                    if($markah->assessment_point != null) {
                        $html_button = $markah->assessment_point;
                    }
                }        
                return $html_button;
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->comment != null) {
                        $html_button = $markah->comment;
                    }
                }          
                return $html_button;
            })
            ->addColumn('dokumen_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })
            ->addColumn('targetpoint_r', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->target_point != null) {
                        $html_button = $markah->target_point;
                    }
                }               
                return $html_button;
            })
            ->addColumn('assessmentpoint_r', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->assessment_point != null) {
                        $html_button = $markah->assessment_point;
                    }
                }             
                return $html_button;
            })
            ->addColumn('ulasan_r', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
                if($markah){
                    if($markah->comment_on_appeal != null) {
                        $html_button = $markah->comment_on_appeal;
                    }
                }          
                return $html_button;
            })
            ->addColumn('dokumen_r', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = MarkahRayuan::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();      

                if($markah) {
                    if($markah->dokumen1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button = $html_button.' <a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })
            ->rawColumns(['targetpoint_', 'assessmentpoint_', 'ulasan_', 'dokumen_', 
            'targetpoint_r', 'assessmentpoint_r', 'ulasan_r', 'dokumen_r'])
            ->make(true);
        }

        
        
        //Calculation Part
        if ($projek->kategori ==  'phJKR Bangunan Baru A') {
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'BARU A'],
                ['fasa','=', 'rekabentuk']
            ])->get();    

            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU A'],
                ['fasa','=', 'verifikasi']
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU A'],
                ['fasa','=', 'validasi']
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'BARU A'],
                ['fasa','=', 'validasi']
            ])->get();

            // Rekabentuk borang BARU A
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 6]])->get();
            $in_mr = 0;

            // Verifikasi borang BARU A
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 6]])->get();
            $in_mv = 0;

            // Validasi borang BARU A
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 6]])->get();
            $in_ml = 0;

            //Rayuan
            // Rekabentuk borang BARU A
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 1]])->get();
            $tl_mr_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 2]])->get();
            $kt_mr_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 3]])->get();
            $sb_mr_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 4]])->get();
            $pa_mr_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 5]])->get();
            $pd_mr_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 6]])->get();
            $in_mr_r = 0;

            // Verifikasi borang BARU A
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 1]])->get();
            $tl_mv_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 2]])->get();
            $kt_mv_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 3]])->get();
            $sb_mv_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 4]])->get();
            $pa_mv_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 5]])->get();
            $pd_mv_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 6]])->get();
            $in_mv_r = 0;

            // Validasi borang BARU A
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 1]])->get();
            $tl_ml_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 2]])->get();
            $kt_ml_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 3]])->get();
            $sb_ml_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 4]])->get();
            $pa_ml_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 5]])->get();
            $pd_ml_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 6]])->get();
            $in_ml_r = 0;
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    if($markah_tl_mr->markah > 0){
                        $tl_mr +=  $markah_tl_mr->markah;
                    }
                } 
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                } 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                if($markah_tl_mr_r){
                    if($markah_tl_mr_r->markah_rekabentuk > 0){
                        $tl_mr_r +=  $markah_tl_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_tl_mv_r){
                    if($markah_tl_mv_r->markah_verifikasi > 0){
                        $tl_mv_r += $markah_tl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_tl_ml_r){
                    if($markah_tl_ml_r->markah_validasi > 0){
                        $tl_ml_r += $markah_tl_ml_r->markah_validasi;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_kt_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();

                if($markah_kt_mr){
                    if($markah_kt_mr->markah > 0){
                        $kt_mr +=  $markah_kt_mr->markah;
                    }
                }
                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                if($markah_kt_mr_r){
                    if($markah_kt_mr_r->markah_rekabentuk > 0){
                        $kt_mr_r +=  $markah_kt_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_kt_mv_r){
                    if($markah_kt_mv_r->markah_verifikasi > 0){
                        $kt_mv_r += $markah_kt_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_kt_ml_r){
                    if($markah_kt_ml_r->markah_validasi > 0){
                        $kt_ml_r += $markah_kt_ml_r->markah_validasi;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    if($markah_sb_mr->markah > 0){
                        $sb_mr +=  $markah_sb_mr->markah;
                    }
                } 
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                if($markah_sb_mr_r){
                    if($markah_sb_mr_r->markah_rekabentuk > 0){
                        $sb_mr_r +=  $markah_sb_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_sb_mv_r){
                    if($markah_sb_mv_r->markah_verifikasi > 0){
                        $sb_mv_r += $markah_sb_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_sb_ml_r){
                    if($markah_sb_ml_r->markah_validasi > 0){
                        $sb_ml_r += $markah_sb_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pa_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_pa_mr){
                    if($markah_pa_mr->markah > 0){
                        $pa_mr +=  $markah_pa_mr->markah;
                    }
                } 
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                if($markah_pa_mr_r){
                    if($markah_pa_mr_r->markah_rekabentuk > 0){
                        $pa_mr_r +=  $markah_pa_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_pa_mv_r){
                    if($markah_pa_mv_r->markah_verifikasi > 0){
                        $pa_mv_r += $markah_pa_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pa_ml_r){
                    if($markah_pa_ml_r->markah_validasi > 0){
                        $pa_ml_r += $markah_pa_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pd_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_pd_mr){
                    if($markah_pd_mr->markah > 0){
                        $pd_mr +=  $markah_pd_mr->markah;
                    }
                } 
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                if($markah_pd_mr_r){
                    if($markah_pd_mr_r->markah_rekabentuk > 0){
                        $pd_mr_r +=  $markah_pd_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_pd_mv_r){
                    if($markah_pd_mv_r->markah_verifikasi > 0){
                        $pd_mv_r += $markah_pd_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pd_ml_r){
                    if($markah_pd_ml_r->markah_validasi > 0){
                        $pd_ml_r += $markah_pd_ml_r->markah_validasi;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    if($markah_in_mr->markah > 0){
                        $in_mr +=  $markah_in_mr->markah;
                    }
                } 
                if ($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                if($markah_in_mr_r){
                    if($markah_in_mr_r->markah_rekabentuk > 0){
                        $in_mr_r +=  $markah_in_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_in_mv_r){
                    if($markah_in_mv_r->markah_verifikasi > 0){
                        $in_mv_r += $markah_in_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_in_ml_r){
                    if($markah_in_ml_r->markah_validasi > 0){
                        $in_ml_r += $markah_in_ml_r->markah_validasi;
                    }
                }                           
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $in_ml; 
            $total_mr_r = $tl_mr_r + $kt_mr_r + $sb_mr_r + $pa_mr_r + $pd_mr_r + $in_mr_r; 
            $total_mv_r = $tl_mv_r + $kt_mv_r + $sb_mv_r + $pa_mv_r + $pd_mv_r + $in_mv_r; 
            $total_ml_r = $tl_ml_r + $kt_ml_r + $sb_ml_r + $pa_ml_r + $pd_ml_r + $in_ml_r; 

            $peratusan_mr = $total_mr/101 *100;     
            if($peratusan_mr >= 80) {
                $bintang_mr = 5;
            } elseif($peratusan_mr >= 65 && $peratusan_mr < 80) {
                $bintang_mr = 4;
            } elseif($peratusan_mr >= 45 && $peratusan_mr < 65) {
                $bintang_mr = 3;
            } elseif($peratusan_mr >= 30 && $peratusan_mr < 45) {
                $bintang_mr = 2;
            } else {
                $bintang_mr = 1;
            }

            $peratusan_mv = $total_mv/103 * 100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

            $peratusan_ml = $total_ml/103 * 100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

            //Rayuan
            $peratusan_mr_r = $total_mr_r/101 * 100;     
            if($peratusan_mr_r >= 80) {
                $bintang_mr_r = 5;
            } elseif($peratusan_mr_r >= 65 && $peratusan_mr_r < 80) {
                $bintang_mr_r = 4;
            } elseif($peratusan_mr_r >= 45 && $peratusan_mr_r < 65) {
                $bintang_mr_r = 3;
            } elseif($peratusan_mr_r >= 30 && $peratusan_mr_r < 45) {
                $bintang_mr_r = 2;
            } else {
                $bintang_mr_r = 1;
            }

            $peratusan_mv_r = $total_mv_r/103 * 100;     
            if($peratusan_mv_r >= 80) {
                $bintang_mv_r = 5;
            } elseif($peratusan_mv_r >= 65 && $peratusan_mv_r < 80) {
                $bintang_mv_r = 4;
            } elseif($peratusan_mv_r >= 45 && $peratusan_mv_r < 65) {
                $bintang_mv_r = 3;
            } elseif($peratusan_mv_r >= 30 && $peratusan_mv_r < 45) {
                $bintang_mv_r = 2;
            } else {
                $bintang_mv_r = 1;
            }

            $peratusan_ml_r = $total_ml_r/103 *100;     
            if($peratusan_ml_r >= 80) {
                $bintang_ml_r = 5;
            } elseif($peratusan_ml_r >= 65 && $peratusan_ml_r < 80) {
                $bintang_ml_r = 4;
            } elseif($peratusan_ml_r >= 45 && $peratusan_ml_r < 65) {
                $bintang_ml_r = 3;
            } elseif($peratusan_ml_r >= 30 && $peratusan_ml_r < 45) {
                $bintang_ml_r = 2;
            } else {
                $bintang_ml_r = 1;
            }

            // dd($kt_mr);   
            return view('projek.satu_eph_bangunan', compact(
                'projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 
                'rayuan_kriterias','users', 'lantikans',
                'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
                'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'in_mr','total_mr', 
                'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'in_mv','total_mv',
                'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'in_ml', 'total_ml',
                'peratusan_mr_r', 'peratusan_mv_r', 'peratusan_ml_r', 'bintang_mr_r', 'bintang_mv_r', 'bintang_ml_r',
                'tl_mr_r','kt_mr_r','sb_mr_r','pa_mr_r','pd_mr_r', 'in_mr_r','total_mr_r', 
                'tl_mv_r','kt_mv_r','sb_mv_r','pa_mv_r','pd_mv_r', 'in_mv_r','total_mv_r',
                'tl_ml_r','kt_ml_r','sb_ml_r','pa_ml_r','pd_ml_r', 'in_ml_r', 'total_ml_r'
        ));             
        } elseif ($projek->kategori ==  'phJKR Bangunan Baru B') {
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'BARU B'],
                ['fasa','=', 'rekabentuk']
            ])->get();    

            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU B'],
                ['fasa','=', 'verifikasi']
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU B'],
                ['fasa','=', 'validasi']
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'BARU B'],
                ['fasa','=', 'validasi']
            ])->get();
        
            // Rekabentuk borang BARU B
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 6]])->get();
            $fl_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 7]])->get();
            $in_mr = 0;

            // Verifikasi borang BARU B
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            // Validasi borang BARU B
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 7]])->get();
            $in_ml = 0;
            
            //Rayuan
            // Rekabentuk borang BARU B
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 1]])->get();
            $tl_mr_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 2]])->get();
            $kt_mr_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 3]])->get();
            $sb_mr_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 4]])->get();
            $pa_mr_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 5]])->get();
            $pd_mr_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 6]])->get();
            $fl_mr_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 7]])->get();
            $in_mr_r = 0;

            // Verifikasi borang BARU B
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 1]])->get();
            $tl_mv_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 2]])->get();
            $kt_mv_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 3]])->get();
            $sb_mv_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 4]])->get();
            $pa_mv_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 5]])->get();
            $pd_mv_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 6]])->get();
            $fl_mv_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 7]])->get();
            $in_mv_r = 0;

            // Validasi borang BARU B
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 1]])->get();
            $tl_ml_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 2]])->get();
            $kt_ml_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 3]])->get();
            $sb_ml_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 4]])->get();
            $pa_ml_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 5]])->get();
            $pd_ml_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 6]])->get();
            $fl_ml_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 7]])->get();
            $in_ml_r = 0;
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    if($markah_tl_mr->markah > 0){
                        $tl_mr +=  $markah_tl_mr->markah;
                    }
                } 
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                } 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                if($markah_tl_mr_r){
                    if($markah_tl_mr_r->markah_rekabentuk > 0){
                        $tl_mr_r +=  $markah_tl_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_tl_mv_r){
                    if($markah_tl_mv_r->markah_verifikasi > 0){
                        $tl_mv_r += $markah_tl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_tl_ml_r){
                    if($markah_tl_ml_r->markah_validasi > 0){
                        $tl_ml_r += $markah_tl_ml_r->markah_validasi;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_kt_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();

                if($markah_kt_mr){
                    if($markah_kt_mr->markah > 0){
                        $kt_mr +=  $markah_kt_mr->markah;
                    }
                }
                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                if($markah_kt_mr_r){
                    if($markah_kt_mr_r->markah_rekabentuk > 0){
                        $kt_mr_r +=  $markah_kt_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_kt_mv_r){
                    if($markah_kt_mv_r->markah_verifikasi > 0){
                        $kt_mv_r += $markah_kt_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_kt_ml_r){
                    if($markah_kt_ml_r->markah_validasi > 0){
                        $kt_ml_r += $markah_kt_ml_r->markah_validasi;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    if($markah_sb_mr->markah > 0){
                        $sb_mr +=  $markah_sb_mr->markah;
                    }
                } 
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                if($markah_sb_mr_r){
                    if($markah_sb_mr_r->markah_rekabentuk > 0){
                        $sb_mr_r +=  $markah_sb_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_sb_mv_r){
                    if($markah_sb_mv_r->markah_verifikasi > 0){
                        $sb_mv_r += $markah_sb_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_sb_ml_r){
                    if($markah_sb_ml_r->markah_validasi > 0){
                        $sb_ml_r += $markah_sb_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pa_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_pa_mr){
                    if($markah_pa_mr->markah > 0){
                        $pa_mr +=  $markah_pa_mr->markah;
                    }
                } 
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                if($markah_pa_mr_r){
                    if($markah_pa_mr_r->markah_rekabentuk > 0){
                        $pa_mr_r +=  $markah_pa_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_pa_mv_r){
                    if($markah_pa_mv_r->markah_verifikasi > 0){
                        $pa_mv_r += $markah_pa_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pa_ml_r){
                    if($markah_pa_ml_r->markah_validasi > 0){
                        $pa_ml_r += $markah_pa_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pd_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_pd_mr){
                    if($markah_pd_mr->markah > 0){
                        $pd_mr +=  $markah_pd_mr->markah;
                    }
                } 
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                if($markah_pd_mr_r){
                    if($markah_pd_mr_r->markah_rekabentuk > 0){
                        $pd_mr_r +=  $markah_pd_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_pd_mv_r){
                    if($markah_pd_mv_r->markah_verifikasi > 0){
                        $pd_mv_r += $markah_pd_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pd_ml_r){
                    if($markah_pd_ml_r->markah_validasi > 0){
                        $pd_ml_r += $markah_pd_ml_r->markah_validasi;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_fl_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_fl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_fl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_fl_mr){
                    if($markah_fl_mr->markah > 0){
                        $fl_mr +=  $markah_fl_mr->markah;
                    }
                } 
                if ($markah_fl_mv){
                    if($markah_fl_mv->markah > 0){
                        $fl_mv += $markah_fl_mv->markah;
                    }
                }
                if ($markah_fl_ml){
                    if($markah_fl_ml->markah > 0){
                        $fl_ml += $markah_fl_ml->markah;
                    }
                }
                if($markah_fl_mr_r){
                    if($markah_fl_mr_r->markah_rekabentuk > 0){
                        $fl_mr_r +=  $markah_fl_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_fl_mv_r){
                    if($markah_fl_mv_r->markah_verifikasi > 0){
                        $fl_mv_r += $markah_fl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_fl_ml_r){
                    if($markah_fl_ml_r->markah_validasi > 0){
                        $fl_ml_r += $markah_fl_ml_r->markah_validasi;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    if($markah_in_mr->markah > 0){
                        $in_mr +=  $markah_in_mr->markah;
                    }
                } 
                if ($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                if($markah_in_mr_r){
                    if($markah_in_mr_r->markah_rekabentuk > 0){
                        $in_mr_r +=  $markah_in_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_in_mv_r){
                    if($markah_in_mv_r->markah_verifikasi > 0){
                        $in_mv_r += $markah_in_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_in_ml_r){
                    if($markah_in_ml_r->markah_validasi > 0){
                        $in_ml_r += $markah_in_ml_r->markah_validasi;
                    }
                }                           
            }                                  
                 
            // dd($in_mr);
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + + $fl_ml + $in_ml; 
            $total_mr_r = $tl_mr_r + $kt_mr_r + $sb_mr_r + $pa_mr_r + $pd_mr_r + $fl_mr_r +$in_mr_r; 
            $total_mv_r = $tl_mv_r + $kt_mv_r + $sb_mv_r + $pa_mv_r + $pd_mv_r + $fl_mv_r + $in_mv_r; 
            $total_ml_r = $tl_ml_r + $kt_ml_r + $sb_ml_r + $pa_ml_r + $pd_ml_r + $fl_ml_r + $in_ml_r; 

            $peratusan_mr = $total_mr/131 *100;     
            if($peratusan_mr >= 80) {
                $bintang_mr = 5;
            } elseif($peratusan_mr >= 65 && $peratusan_mr < 80) {
                $bintang_mr = 4;
            } elseif($peratusan_mr >= 45 && $peratusan_mr < 65) {
                $bintang_mr = 3;
            } elseif($peratusan_mr >= 30 && $peratusan_mr < 45) {
                $bintang_mr = 2;
            } else {
                $bintang_mr = 1;
            }

            $peratusan_mv = $total_mv/138 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

            $peratusan_ml = $total_ml/138 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

            //Rayuan
            $peratusan_mr_r = $total_mr_r/131 *100;     
            if($peratusan_mr_r >= 80) {
                $bintang_mr_r = 5;
            } elseif($peratusan_mr_r >= 65 && $peratusan_mr_r < 80) {
                $bintang_mr_r = 4;
            } elseif($peratusan_mr_r >= 45 && $peratusan_mr_r < 65) {
                $bintang_mr_r = 3;
            } elseif($peratusan_mr_r >= 30 && $peratusan_mr_r < 45) {
                $bintang_mr_r = 2;
            } else {
                $bintang_mr_r = 1;
            }

            $peratusan_mv_r = $total_mv_r/138 *100;     
            if($peratusan_mv_r >= 80) {
                $bintang_mv_r = 5;
            } elseif($peratusan_mv_r >= 65 && $peratusan_mv_r < 80) {
                $bintang_mv_r = 4;
            } elseif($peratusan_mv_r >= 45 && $peratusan_mv_r < 65) {
                $bintang_mv_r = 3;
            } elseif($peratusan_mv_r >= 30 && $peratusan_mv_r < 45) {
                $bintang_mv_r = 2;
            } else {
                $bintang_mv_r = 1;
            }

            $peratusan_ml_r = $total_ml_r/138 *100;     
            if($peratusan_ml_r >= 80) {
                $bintang_ml_r = 5;
            } elseif($peratusan_ml_r >= 65 && $peratusan_ml_r < 80) {
                $bintang_ml_r = 4;
            } elseif($peratusan_ml_r >= 45 && $peratusan_ml_r < 65) {
                $bintang_ml_r = 3;
            } elseif($peratusan_ml_r >= 30 && $peratusan_ml_r < 45) {
                $bintang_ml_r = 2;
            } else {
                $bintang_ml_r = 1;
            }
   
            return view('projek.satu_eph_bangunan', compact(
                'projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 
                'rayuan_kriterias','users', 'lantikans',
                'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
                'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr', 'in_mr','total_mr', 
                'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv', 'in_mv','total_mv',
                'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml', 'in_ml', 'total_ml',
                'peratusan_mr_r', 'peratusan_mv_r', 'peratusan_ml_r', 'bintang_mr_r', 'bintang_mv_r', 'bintang_ml_r',
                'tl_mr_r','kt_mr_r','sb_mr_r','pa_mr_r','pd_mr_r', 'fl_mr_r','in_mr_r','total_mr_r', 
                'tl_mv_r','kt_mv_r','sb_mv_r','pa_mv_r','pd_mv_r', 'fl_mv_r','in_mv_r','total_mv_r',
                'tl_ml_r','kt_ml_r','sb_ml_r','pa_ml_r','pd_ml_r', 'fl_ml_r', 'in_ml_r', 'total_ml_r'
        ));             
        } elseif ($projek->kategori ==  'phJKR Bangunan Baru C') {
            // $kriterias = Kriteria::where('borang', 'BARU C')->get(); 
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'BARU C'],
                ['fasa','=', 'rekabentuk']
            ])->get();    

            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU C'],
                ['fasa','=', 'verifikasi']
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU C'],
                ['fasa','=', 'validasi']
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'BARU C'],
                ['fasa', '=', 'validasi']
            ])->get();
            
            // Rekabentuk borang BARU C
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 6]])->get();
            $fl_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 7]])->get();
            $in_mr = 0;

            // Verifikasi borang BARU C
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            // Validasi borang BARU C
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 7]])->get();
            $in_ml = 0;
            
            //Rayuan
            // Rekabentuk borang BARU C
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 1]])->get();
            $tl_mr_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 2]])->get();
            $kt_mr_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 3]])->get();
            $sb_mr_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 4]])->get();
            $pa_mr_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 5]])->get();
            $pd_mr_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 6]])->get();
            $fl_mr_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 7]])->get();
            $in_mr_r = 0;

            // Verifikasi borang BARU C
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 1]])->get();
            $tl_mv_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 2]])->get();
            $kt_mv_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 3]])->get();
            $sb_mv_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 4]])->get();
            $pa_mv_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 5]])->get();
            $pd_mv_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 6]])->get();
            $fl_mv_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 7]])->get();
            $in_mv_r = 0;

            // Validasi borang BARU C
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 1]])->get();
            $tl_ml_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 2]])->get();
            $kt_ml_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 3]])->get();
            $sb_ml_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 4]])->get();
            $pa_ml_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 5]])->get();
            $pd_ml_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 6]])->get();
            $fl_ml_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 7]])->get();
            $in_ml_r = 0;
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    if($markah_tl_mr->markah > 0){
                        $tl_mr +=  $markah_tl_mr->markah;
                    }
                } 
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                } 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                if($markah_tl_mr_r){
                    if($markah_tl_mr_r->markah_rekabentuk > 0){
                        $tl_mr_r +=  $markah_tl_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_tl_mv_r){
                    if($markah_tl_mv_r->markah_verifikasi > 0){
                        $tl_mv_r += $markah_tl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_tl_ml_r){
                    if($markah_tl_ml_r->markah_validasi > 0){
                        $tl_ml_r += $markah_tl_ml_r->markah_validasi;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_kt_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();

                if($markah_kt_mr){
                    if($markah_kt_mr->markah > 0){
                        $kt_mr +=  $markah_kt_mr->markah;
                    }
                }
                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                if($markah_kt_mr_r){
                    if($markah_kt_mr_r->markah_rekabentuk > 0){
                        $kt_mr_r +=  $markah_kt_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_kt_mv_r){
                    if($markah_kt_mv_r->markah_verifikasi > 0){
                        $kt_mv_r += $markah_kt_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_kt_ml_r){
                    if($markah_kt_ml_r->markah_validasi > 0){
                        $kt_ml_r += $markah_kt_ml_r->markah_validasi;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    if($markah_sb_mr->markah > 0){
                        $sb_mr +=  $markah_sb_mr->markah;
                    }
                } 
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                if($markah_sb_mr_r){
                    if($markah_sb_mr_r->markah_rekabentuk > 0){
                        $sb_mr_r +=  $markah_sb_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_sb_mv_r){
                    if($markah_sb_mv_r->markah_verifikasi > 0){
                        $sb_mv_r += $markah_sb_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_sb_ml_r){
                    if($markah_sb_ml_r->markah_validasi > 0){
                        $sb_ml_r += $markah_sb_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pa_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_pa_mr){
                    if($markah_pa_mr->markah > 0){
                        $pa_mr +=  $markah_pa_mr->markah;   
                    }
                } 
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                if($markah_pa_mr_r){
                    if($markah_pa_mr_r->markah_rekabentuk > 0){
                        $pa_mr_r +=  $markah_pa_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_pa_mv_r){
                    if($markah_pa_mv_r->markah_verifikasi > 0){
                        $pa_mv_r += $markah_pa_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pa_ml_r){
                    if($markah_pa_ml_r->markah_validasi > 0){
                        $pa_ml_r += $markah_pa_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pd_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_pd_mr){
                    if($markah_pd_mr->markah > 0){
                        $pd_mr +=  $markah_pd_mr->markah;
                    }
                } 
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                if($markah_pd_mr_r){
                    if($markah_pd_mr_r->markah_rekabentuk > 0){
                        $pd_mr_r +=  $markah_pd_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_pd_mv_r){
                    if($markah_pd_mv_r->markah_verifikasi > 0){
                        $pd_mv_r += $markah_pd_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pd_ml_r){
                    if($markah_pd_ml_r->markah_validasi > 0){
                        $pd_ml_r += $markah_pd_ml_r->markah_validasi;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_fl_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_fl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_fl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_fl_mr){
                    if($markah_fl_mr->markah > 0){
                        $fl_mr +=  $markah_fl_mr->markah;
                    }
                } 
                if ($markah_fl_mv){
                    if($markah_fl_mv->markah > 0){
                        $fl_mv += $markah_fl_mv->markah;
                    }
                }
                if ($markah_fl_ml){
                    if($markah_fl_ml->markah > 0){
                        $fl_ml += $markah_fl_ml->markah;
                    }
                }
                if($markah_fl_mr_r){
                    if($markah_fl_mr_r->markah_rekabentuk > 0){
                        $fl_mr_r +=  $markah_fl_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_fl_mv_r){
                    if($markah_fl_mv_r->markah_verifikasi > 0){
                        $fl_mv_r += $markah_fl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_fl_ml_r){
                    if($markah_fl_ml_r->markah_validasi > 0){
                        $fl_ml_r += $markah_fl_ml_r->markah_validasi;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    if($markah_in_mr->markah > 0){
                        $in_mr +=  $markah_in_mr->markah;
                    }
                } 
                if ($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                if($markah_in_mr_r){
                    if($markah_in_mr_r->markah_rekabentuk > 0){
                        $in_mr_r +=  $markah_in_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_in_mv_r){
                    if($markah_in_mv_r->markah_verifikasi > 0){
                        $in_mv_r += $markah_in_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_in_ml_r){
                    if($markah_in_ml_r->markah_validasi > 0){
                        $in_ml_r += $markah_in_ml_r->markah_validasi;
                    }
                }                           
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + + $fl_ml + $in_ml; 
            $total_mr_r = $tl_mr_r + $kt_mr_r + $sb_mr_r + $pa_mr_r + $pd_mr_r + $fl_mr_r +$in_mr_r; 
            $total_mv_r = $tl_mv_r + $kt_mv_r + $sb_mv_r + $pa_mv_r + $pd_mv_r + $fl_mv_r + $in_mv_r; 
            $total_ml_r = $tl_ml_r + $kt_ml_r + $sb_ml_r + $pa_ml_r + $pd_ml_r + $fl_ml_r + $in_ml_r; 

            $peratusan_mr = $total_mr/159 *100;     
            if($peratusan_mr >= 80) {
                $bintang_mr = 5;
            } elseif($peratusan_mr >= 65 && $peratusan_mr < 80) {
                $bintang_mr = 4;
            } elseif($peratusan_mr >= 45 && $peratusan_mr < 65) {
                $bintang_mr = 3;
            } elseif($peratusan_mr >= 30 && $peratusan_mr < 45) {
                $bintang_mr = 2;
            } else {
                $bintang_mr = 1;
            }

            $peratusan_mv = $total_mv/166 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

            $peratusan_ml = $total_ml/166 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

            //Rayuan
            $peratusan_mr_r = $total_mr_r/159 *100;     
            if($peratusan_mr_r >= 80) {
                $bintang_mr_r = 5;
            } elseif($peratusan_mr_r >= 65 && $peratusan_mr_r < 80) {
                $bintang_mr_r = 4;
            } elseif($peratusan_mr_r >= 45 && $peratusan_mr_r < 65) {
                $bintang_mr_r = 3;
            } elseif($peratusan_mr_r >= 30 && $peratusan_mr_r < 45) {
                $bintang_mr_r = 2;
            } else {
                $bintang_mr_r = 1;
            }

            $peratusan_mv_r = $total_mv_r/166 *100;     
            if($peratusan_mv_r >= 80) {
                $bintang_mv_r = 5;
            } elseif($peratusan_mv_r >= 65 && $peratusan_mv_r < 80) {
                $bintang_mv_r = 4;
            } elseif($peratusan_mv_r >= 45 && $peratusan_mv_r < 65) {
                $bintang_mv_r = 3;
            } elseif($peratusan_mv_r >= 30 && $peratusan_mv_r < 45) {
                $bintang_mv_r = 2;
            } else {
                $bintang_mv_r = 1;
            }

            $peratusan_ml_r = $total_ml_r/166 *100;     
            if($peratusan_ml_r >= 80) {
                $bintang_ml_r = 5;
            } elseif($peratusan_ml_r >= 65 && $peratusan_ml_r < 80) {
                $bintang_ml_r = 4;
            } elseif($peratusan_ml_r >= 45 && $peratusan_ml_r < 65) {
                $bintang_ml_r = 3;
            } elseif($peratusan_ml_r >= 30 && $peratusan_ml_r < 45) {
                $bintang_ml_r = 2;
            } else {
                $bintang_ml_r = 1;
            }

            // dd($kt_mr);   
            return view('projek.satu_eph_bangunan', compact(
                'projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 
                'rayuan_kriterias','users', 'lantikans',
                'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
                'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr', 'in_mr','total_mr', 
                'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv', 'in_mv','total_mv',
                'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml', 'in_ml', 'total_ml',
                'peratusan_mr_r', 'peratusan_mv_r', 'peratusan_ml_r', 'bintang_mr_r', 'bintang_mv_r', 'bintang_ml_r',
                'tl_mr_r','kt_mr_r','sb_mr_r','pa_mr_r','pd_mr_r', 'fl_mr_r','in_mr_r','total_mr_r', 
                'tl_mv_r','kt_mv_r','sb_mv_r','pa_mv_r','pd_mv_r', 'fl_mv_r','in_mv_r','total_mv_r',
                'tl_ml_r','kt_ml_r','sb_ml_r','pa_ml_r','pd_ml_r', 'fl_ml_r', 'in_ml_r', 'total_ml_r'
        ));
        } elseif ($projek->kategori ==  'phJKR Bangunan Baru D') {
            // $kriterias = Kriteria::where('borang', 'BARU D')->get(); 
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'BARU D'],
                ['fasa','=', 'rekabentuk'],
            ])->get();    

            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU D'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU D'],
                ['fasa','=', 'validasi'],
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'BARU D'],
                ['fasa', '=', 'validasi']
            ])->get();  
            
            // Rekabentuk borang BARU D
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 6]])->get();
            $fl_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 7]])->get();
            $in_mr = 0;

            // Verifikasi borang BARU D
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            // Validasi borang BARU D
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 7]])->get();
            $in_ml = 0;
             
            //Rayuan
            // Rekabentuk borang BARU D
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 1]])->get();
            $tl_mr_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 2]])->get();
            $kt_mr_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 3]])->get();
            $sb_mr_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 4]])->get();
            $pa_mr_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 5]])->get();
            $pd_mr_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 6]])->get();
            $fl_mr_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 7]])->get();
            $in_mr_r = 0;

            // Verifikasi borang BARU D
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 1]])->get();
            $tl_mv_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 2]])->get();
            $kt_mv_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 3]])->get();
            $sb_mv_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 4]])->get();
            $pa_mv_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 5]])->get();
            $pd_mv_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 6]])->get();
            $fl_mv_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 7]])->get();
            $in_mv_r = 0;

            // Validasi borang BARU D
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 1]])->get();
            $tl_ml_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 2]])->get();
            $kt_ml_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 3]])->get();
            $sb_ml_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 4]])->get();
            $pa_ml_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 5]])->get();
            $pd_ml_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 6]])->get();
            $fl_ml_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 7]])->get();
            $in_ml_r = 0;
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    if($markah_tl_mr->markah > 0){
                        $tl_mr +=  $markah_tl_mr->markah;
                    }
                } 
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                } 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                if($markah_tl_mr_r){
                    if($markah_tl_mr_r->markah_rekabentuk > 0){
                        $tl_mr_r +=  $markah_tl_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_tl_mv_r){
                    if($markah_tl_mv_r->markah_verifikasi > 0){
                        $tl_mv_r += $markah_tl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_tl_ml_r){
                    if($markah_tl_ml_r->markah_validasi > 0){
                        $tl_ml_r += $markah_tl_ml_r->markah_validasi;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_kt_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();

                if($markah_kt_mr){
                    if($markah_kt_mr->markah > 0){
                        $kt_mr +=  $markah_kt_mr->markah;
                    }
                }
                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                if($markah_kt_mr_r){
                    if($markah_kt_mr_r->markah_rekabentuk > 0){
                        $kt_mr_r +=  $markah_kt_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_kt_mv_r){
                    if($markah_kt_mv_r->markah_verifikasi > 0){
                        $kt_mv_r += $markah_kt_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_kt_ml_r){
                    if($markah_kt_ml_r->markah_validasi > 0){
                        $kt_ml_r += $markah_kt_ml_r->markah_validasi;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    if($markah_sb_mr->markah > 0){
                        $sb_mr +=  $markah_sb_mr->markah;
                    }
                } 
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                if($markah_sb_mr_r){
                    if($markah_sb_mr_r->markah_rekabentuk > 0){
                        $sb_mr_r +=  $markah_sb_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_sb_mv_r){
                    if($markah_sb_mv_r->markah_verifikasi > 0){
                        $sb_mv_r += $markah_sb_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_sb_ml_r){
                    if($markah_sb_ml_r->markah_validasi > 0){
                        $sb_ml_r += $markah_sb_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pa_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_pa_mr){
                    if($markah_pa_mr->markah > 0){
                        $pa_mr +=  $markah_pa_mr->markah;
                    }
                } 
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                if($markah_pa_mr_r){
                    if($markah_pa_mr_r->markah_rekabentuk > 0){
                        $pa_mr_r +=  $markah_pa_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_pa_mv_r){
                    if($markah_pa_mv_r->markah_verifikasi > 0){
                        $pa_mv_r += $markah_pa_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pa_ml_r){
                    if($markah_pa_ml_r->markah_validasi > 0){
                        $pa_ml_r += $markah_pa_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pd_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_pd_mr){
                    if($markah_pd_mr->markah > 0){
                        $pd_mr +=  $markah_pd_mr->markah;
                    }
                } 
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                if($markah_pd_mr_r){
                    if($markah_pd_mr_r->markah_rekabentuk > 0){
                        $pd_mr_r +=  $markah_pd_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_pd_mv_r){
                    if($markah_pd_mv_r->markah_verifikasi > 0){
                        $pd_mv_r += $markah_pd_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pd_ml_r){
                    if($markah_pd_ml_r->markah_validasi > 0){
                        $pd_ml_r += $markah_pd_ml_r->markah_validasi;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_fl_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_fl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_fl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_fl_mr){
                    if($markah_fl_mr->markah > 0){
                        $fl_mr +=  $markah_fl_mr->markah;
                    }
                } 
                if ($markah_fl_mv){
                    if($markah_fl_mv->markah > 0){
                        $fl_mv += $markah_fl_mv->markah;
                    }
                }
                if ($markah_fl_ml){
                    if($markah_fl_ml->markah > 0){
                        $fl_ml += $markah_fl_ml->markah;
                    }
                }
                if($markah_fl_mr_r){
                    if($markah_fl_mr_r->markah_rekabentuk > 0){
                        $fl_mr_r +=  $markah_fl_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_fl_mv_r){
                    if($markah_fl_mv_r->markah_verifikasi > 0){
                        $fl_mv_r += $markah_fl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_fl_ml_r){
                    if($markah_fl_ml_r->markah_validasi > 0){
                        $fl_ml_r += $markah_fl_ml_r->markah_validasi;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    if($markah_in_mr->markah > 0){
                        $in_mr +=  $markah_in_mr->markah;
                    }
                } 
                if ($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                if($markah_in_mr_r){
                    if($markah_in_mr_r->markah_rekabentuk > 0){
                        $in_mr_r +=  $markah_in_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_in_mv_r){
                    if($markah_in_mv_r->markah_verifikasi > 0){
                        $in_mv_r += $markah_in_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_in_ml_r){
                    if($markah_in_ml_r->markah_validasi > 0){
                        $in_ml_r += $markah_in_ml_r->markah_validasi;
                    }
                }                           
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + + $fl_ml + $in_ml; 
            $total_mr_r = $tl_mr_r + $kt_mr_r + $sb_mr_r + $pa_mr_r + $pd_mr_r + $fl_mr_r +$in_mr_r; 
            $total_mv_r = $tl_mv_r + $kt_mv_r + $sb_mv_r + $pa_mv_r + $pd_mv_r + $fl_mv_r + $in_mv_r; 
            $total_ml_r = $tl_ml_r + $kt_ml_r + $sb_ml_r + $pa_ml_r + $pd_ml_r + $fl_ml_r + $in_ml_r; 

            $peratusan_mr = $total_mr/166 * 100;     
            if($peratusan_mr >= 80) {
                $bintang_mr = 5;
            } elseif($peratusan_mr >= 65 && $peratusan_mr < 80) {
                $bintang_mr = 4;
            } elseif($peratusan_mr >= 45 && $peratusan_mr < 65) {
                $bintang_mr = 3;
            } elseif($peratusan_mr >= 30 && $peratusan_mr < 45) {
                $bintang_mr = 2;
            } else {
                $bintang_mr = 1;
            }

            $peratusan_mv = $total_mv/173 * 100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

            $peratusan_ml = $total_ml/173 * 100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

            //Rayuan
            $peratusan_mr_r = $total_mr_r/166 * 100;     
            if($peratusan_mr_r >= 80) {
                $bintang_mr_r = 5;
            } elseif($peratusan_mr_r >= 65 && $peratusan_mr_r < 80) {
                $bintang_mr_r = 4;
            } elseif($peratusan_mr_r >= 45 && $peratusan_mr_r < 65) {
                $bintang_mr_r = 3;
            } elseif($peratusan_mr_r >= 30 && $peratusan_mr_r < 45) {
                $bintang_mr_r = 2;
            } else {
                $bintang_mr_r = 1;
            }

            $peratusan_mv_r = $total_mv_r/173 * 100;     
            if($peratusan_mv_r >= 80) {
                $bintang_mv_r = 5;
            } elseif($peratusan_mv_r >= 65 && $peratusan_mv_r < 80) {
                $bintang_mv_r = 4;
            } elseif($peratusan_mv_r >= 45 && $peratusan_mv_r < 65) {
                $bintang_mv_r = 3;
            } elseif($peratusan_mv_r >= 30 && $peratusan_mv_r < 45) {
                $bintang_mv_r = 2;
            } else {
                $bintang_mv_r = 1;
            }

            $peratusan_ml_r = $total_ml_r/173 * 100;     
            if($peratusan_ml_r >= 80) {
                $bintang_ml_r = 5;
            } elseif($peratusan_ml_r >= 65 && $peratusan_ml_r < 80) {
                $bintang_ml_r = 4;
            } elseif($peratusan_ml_r >= 45 && $peratusan_ml_r < 65) {
                $bintang_ml_r = 3;
            } elseif($peratusan_ml_r >= 30 && $peratusan_ml_r < 45) {
                $bintang_ml_r = 2;
            } else {
                $bintang_ml_r = 1;
            }

            // dd($kt_mr);   
            return view('projek.satu_eph_bangunan', compact(
                'projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 
                'rayuan_kriterias','users', 'lantikans',
                'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
                'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr', 'in_mr','total_mr', 
                'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv', 'in_mv','total_mv',
                'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml', 'in_ml', 'total_ml',
                'peratusan_mr_r', 'peratusan_mv_r', 'peratusan_ml_r', 'bintang_mr_r', 'bintang_mv_r', 'bintang_ml_r',
                'tl_mr_r','kt_mr_r','sb_mr_r','pa_mr_r','pd_mr_r', 'fl_mr_r','in_mr_r','total_mr_r', 
                'tl_mv_r','kt_mv_r','sb_mv_r','pa_mv_r','pd_mv_r', 'fl_mv_r','in_mv_r','total_mv_r',
                'tl_ml_r','kt_ml_r','sb_ml_r','pa_ml_r','pd_ml_r', 'fl_ml_r', 'in_ml_r', 'total_ml_r'
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan PUN A') {
            // $kriterias = Kriteria::where('borang', 'PUN A')->get();
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'PUN A'],
                ['fasa','=', 'rekabentuk'],
            ])->get();    

            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN A'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN A'],
                ['fasa','=', 'validasi'],
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'PUN A'],
                ['fasa', '=', 'validasi']
            ])->get();
            
            // Rekabentuk borang PUN A
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;

            // Verifikasi borang PUN A
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;

            // Validasi borang PUN A
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            
            //Rayuan
            // Rekabentuk borang PUN A
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 1]])->get();
            $tl_mr_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 2]])->get();
            $kt_mr_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 3]])->get();
            $sb_mr_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 4]])->get();
            $pa_mr_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 5]])->get();
            $pd_mr_r = 0;

            // Verifikasi borang PUN A
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 1]])->get();
            $tl_mv_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 2]])->get();
            $kt_mv_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 3]])->get();
            $sb_mv_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 4]])->get();
            $pa_mv_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 5]])->get();
            $pd_mv_r = 0;
            
            // Validasi borang PUN A
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 1]])->get();
            $tl_ml_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 2]])->get();
            $kt_ml_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 3]])->get();
            $sb_ml_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 4]])->get();
            $pa_ml_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 5]])->get();
            $pd_ml_r = 0;
           
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    if($markah_tl_mr->markah > 0){
                        $tl_mr +=  $markah_tl_mr->markah;
                    }
                } 
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                } 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                if($markah_tl_mr_r){
                    if($markah_tl_mr_r->markah_rekabentuk > 0){
                        $tl_mr_r +=  $markah_tl_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_tl_mv_r){
                    if($markah_tl_mv_r->markah_verifikasi > 0){
                        $tl_mv_r += $markah_tl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_tl_ml_r){
                    if($markah_tl_ml_r->markah_validasi > 0){
                        $tl_ml_r += $markah_tl_ml_r->markah_validasi;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_kt_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();

                if($markah_kt_mr){
                    if($markah_kt_mr->markah > 0){
                        $kt_mr +=  $markah_kt_mr->markah;
                    }
                }
                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                if($markah_kt_mr_r){
                    if($markah_kt_mr_r->markah_rekabentuk > 0){
                        $kt_mr_r +=  $markah_kt_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_kt_mv_r){
                    if($markah_kt_mv_r->markah_verifikasi > 0){
                        $kt_mv_r += $markah_kt_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_kt_ml_r){
                    if($markah_kt_ml_r->markah_validasi > 0){
                        $kt_ml_r += $markah_kt_ml_r->markah_validasi;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    if($markah_sb_mr->markah > 0){
                        $sb_mr +=  $markah_sb_mr->markah;
                    }
                } 
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                if($markah_sb_mr_r){
                    if($markah_sb_mr_r->markah_rekabentuk > 0){
                        $sb_mr_r +=  $markah_sb_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_sb_mv_r){
                    if($markah_sb_mv_r->markah_verifikasi > 0){
                        $sb_mv_r += $markah_sb_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_sb_ml_r){
                    if($markah_sb_ml_r->markah_validasi > 0){
                        $sb_ml_r += $markah_sb_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pa_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_pa_mr){
                    if($markah_pa_mr->markah > 0){
                        $pa_mr +=  $markah_pa_mr->markah;
                    }
                } 
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                if($markah_pa_mr_r){
                    if($markah_pa_mr_r->markah_rekabentuk > 0){
                        $pa_mr_r +=  $markah_pa_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_pa_mv_r){
                    if($markah_pa_mv_r->markah_verifikasi > 0){
                        $pa_mv_r += $markah_pa_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pa_ml_r){
                    if($markah_pa_ml_r->markah_validasi > 0){
                        $pa_ml_r += $markah_pa_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pd_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_pd_mr){
                    if($markah_pd_mr->markah > 0){
                        $pd_mr +=  $markah_pd_mr->markah;
                    }
                } 
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                if($markah_pd_mr_r){
                    if($markah_pd_mr_r->markah_rekabentuk > 0){
                        $pd_mr_r +=  $markah_pd_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_pd_mv_r){
                    if($markah_pd_mv_r->markah_verifikasi > 0){
                        $pd_mv_r += $markah_pd_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pd_ml_r){
                    if($markah_pd_ml_r->markah_validasi > 0){
                        $pd_ml_r += $markah_pd_ml_r->markah_validasi;
                    }
                }
            }                                
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml; 
            $total_mr_r = $tl_mr_r + $kt_mr_r + $sb_mr_r + $pa_mr_r + $pd_mr_r; 
            $total_mv_r = $tl_mv_r + $kt_mv_r + $sb_mv_r + $pa_mv_r + $pd_mv_r; 
            $total_ml_r = $tl_ml_r + $kt_ml_r + $sb_ml_r + $pa_ml_r + $pd_ml_r; 

            $peratusan_mr = $total_mr/73 *100;     
            if($peratusan_mr >= 80) {
                $bintang_mr = 5;
            } elseif($peratusan_mr >= 65 && $peratusan_mr < 80) {
                $bintang_mr = 4;
            } elseif($peratusan_mr >= 45 && $peratusan_mr < 65) {
                $bintang_mr = 3;
            } elseif($peratusan_mr >= 30 && $peratusan_mr < 45) {
                $bintang_mr = 2;
            } else {
                $bintang_mr = 1;
            }

            $peratusan_mv = $total_mv/76 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

            $peratusan_ml = $total_ml/76 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

            //Rayuan
            $peratusan_mr_r = $total_mr_r/73 *100;     
            if($peratusan_mr_r >= 80) {
                $bintang_mr_r = 5;
            } elseif($peratusan_mr_r >= 65 && $peratusan_mr_r < 80) {
                $bintang_mr_r = 4;
            } elseif($peratusan_mr_r >= 45 && $peratusan_mr_r < 65) {
                $bintang_mr_r = 3;
            } elseif($peratusan_mr_r >= 30 && $peratusan_mr_r < 45) {
                $bintang_mr_r = 2;
            } else {
                $bintang_mr_r = 1;
            }

            $peratusan_mv_r = $total_mv_r/76 *100;     
            if($peratusan_mv_r >= 80) {
                $bintang_mv_r = 5;
            } elseif($peratusan_mv_r >= 65 && $peratusan_mv_r < 80) {
                $bintang_mv_r = 4;
            } elseif($peratusan_mv_r >= 45 && $peratusan_mv_r < 65) {
                $bintang_mv_r = 3;
            } elseif($peratusan_mv_r >= 30 && $peratusan_mv_r < 45) {
                $bintang_mv_r = 2;
            } else {
                $bintang_mv_r = 1;
            }

            $peratusan_ml_r = $total_ml_r/76 *100;     
            if($peratusan_ml_r >= 80) {
                $bintang_ml_r = 5;
            } elseif($peratusan_ml_r >= 65 && $peratusan_ml_r < 80) {
                $bintang_ml_r = 4;
            } elseif($peratusan_ml_r >= 45 && $peratusan_ml_r < 65) {
                $bintang_ml_r = 3;
            } elseif($peratusan_ml_r >= 30 && $peratusan_ml_r < 45) {
                $bintang_ml_r = 2;
            } else {
                $bintang_ml_r = 1;
            }

            // dd($kt_mr);   
            return view('projek.satu_eph_bangunan', compact(
                'projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 
                'rayuan_kriterias','users', 'lantikans',
                'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
                'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'total_mr', 
                'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'total_mv',
                'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'total_ml',
                'peratusan_mr_r', 'peratusan_mv_r', 'peratusan_ml_r', 'bintang_mr_r', 'bintang_mv_r', 'bintang_ml_r',
                'tl_mr_r','kt_mr_r','sb_mr_r','pa_mr_r','pd_mr_r', 'total_mr_r', 
                'tl_mv_r','kt_mv_r','sb_mv_r','pa_mv_r','pd_mv_r', 'total_mv_r',
                'tl_ml_r','kt_ml_r','sb_ml_r','pa_ml_r','pd_ml_r', 'total_ml_r'
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan PUN B') {
            // $kriterias = Kriteria::where('borang', 'PUN B')->get();
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'PUN B'],
                ['fasa','=', 'rekabentuk']
            ])->get();    

            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN B'],
                ['fasa','=', 'verifikasi']
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN B'],
                ['fasa','=', 'validasi']
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'PUN B'],
                ['fasa', '=', 'validasi']
            ])->get(); 
            
            // Rekabentuk borang PUN B
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 6]])->get();
            $fl_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 7]])->get();
            $in_mr = 0;

            // Verifikasi borang PUN B
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            // Validasi borang PUN B
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 7]])->get();
            $in_ml = 0;
            
            //Rayuan
            // Rekabentuk borang PUN B
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 1]])->get();
            $tl_mr_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 2]])->get();
            $kt_mr_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 3]])->get();
            $sb_mr_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 4]])->get();
            $pa_mr_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 5]])->get();
            $pd_mr_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 6]])->get();
            $fl_mr_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 7]])->get();
            $in_mr_r = 0;

            // Verifikasi borang PUN B
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 1]])->get();
            $tl_mv_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 2]])->get();
            $kt_mv_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 3]])->get();
            $sb_mv_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 4]])->get();
            $pa_mv_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 5]])->get();
            $pd_mv_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 6]])->get();
            $fl_mv_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 7]])->get();
            $in_mv_r = 0;

            // Validasi borang PUN B
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 1]])->get();
            $tl_ml_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 2]])->get();
            $kt_ml_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 3]])->get();
            $sb_ml_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 4]])->get();
            $pa_ml_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 5]])->get();
            $pd_ml_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 6]])->get();
            $fl_ml_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 7]])->get();
            $in_ml_r = 0;
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    if($markah_tl_mr->markah > 0){
                        $tl_mr +=  $markah_tl_mr->markah;
                    }
                } 
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                } 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                if($markah_tl_mr_r){
                    if($markah_tl_mr_r->markah_rekabentuk > 0){
                        $tl_mr_r +=  $markah_tl_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_tl_mv_r){
                    if($markah_tl_mv_r->markah_verifikasi > 0){
                        $tl_mv_r += $markah_tl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_tl_ml_r){
                    if($markah_tl_ml_r->markah_validasi > 0){
                        $tl_ml_r += $markah_tl_ml_r->markah_validasi;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_kt_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();

                if($markah_kt_mr){
                    if($markah_kt_mr->markah > 0){
                        $kt_mr +=  $markah_kt_mr->markah;
                    }
                }
                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                if($markah_kt_mr_r){
                    if($markah_kt_mr_r->markah_rekabentuk > 0){
                        $kt_mr_r +=  $markah_kt_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_kt_mv_r){
                    if($markah_kt_mv_r->markah_verifikasi > 0){
                        $kt_mv_r += $markah_kt_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_kt_ml_r){
                    if($markah_kt_ml_r->markah_validasi > 0){
                        $kt_ml_r += $markah_kt_ml_r->markah_validasi;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    if($markah_sb_mr->markah > 0){
                        $sb_mr +=  $markah_sb_mr->markah;
                    }
                } 
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                if($markah_sb_mr_r){
                    if($markah_sb_mr_r->markah_rekabentuk > 0){
                        $sb_mr_r +=  $markah_sb_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_sb_mv_r){
                    if($markah_sb_mv_r->markah_verifikasi > 0){
                        $sb_mv_r += $markah_sb_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_sb_ml_r){
                    if($markah_sb_ml_r->markah_validasi > 0){
                        $sb_ml_r += $markah_sb_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pa_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_pa_mr){
                    if($markah_pa_mr->markah > 0){
                        $pa_mr +=  $markah_pa_mr->markah;
                    }
                } 
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                if($markah_pa_mr_r){
                    if($markah_pa_mr_r->markah_rekabentuk > 0){
                        $pa_mr_r +=  $markah_pa_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_pa_mv_r){
                    if($markah_pa_mv_r->markah_verifikasi > 0){
                        $pa_mv_r += $markah_pa_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pa_ml_r){
                    if($markah_pa_ml_r->markah_validasi > 0){
                        $pa_ml_r += $markah_pa_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pd_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_pd_mr){
                    if($markah_pd_mr->markah > 0){
                        $pd_mr +=  $markah_pd_mr->markah;
                    }
                } 
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                if($markah_pd_mr_r){
                    if($markah_pd_mr_r->markah_rekabentuk > 0){
                        $pd_mr_r +=  $markah_pd_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_pd_mv_r){
                    if($markah_pd_mv_r->markah_verifikasi > 0){
                        $pd_mv_r += $markah_pd_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pd_ml_r){
                    if($markah_pd_ml_r->markah_validasi > 0){
                        $pd_ml_r += $markah_pd_ml_r->markah_validasi;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_fl_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_fl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_fl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_fl_mr){
                    if($markah_fl_mr->markah > 0){
                        $fl_mr +=  $markah_fl_mr->markah;
                    }
                } 
                if ($markah_fl_mv){
                    if($markah_fl_mv->markah > 0){
                        $fl_mv += $markah_fl_mv->markah;
                    }
                }
                if ($markah_fl_ml){
                    if($markah_fl_ml->markah > 0){
                        $fl_ml += $markah_fl_ml->markah;
                    }
                }
                if($markah_fl_mr_r){
                    if($markah_fl_mr_r->markah_rekabentuk > 0){
                        $fl_mr_r +=  $markah_fl_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_fl_mv_r){
                    if($markah_fl_mv_r->markah_verifikasi > 0){
                        $fl_mv_r += $markah_fl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_fl_ml_r){
                    if($markah_fl_ml_r->markah_validasi > 0){
                        $fl_ml_r += $markah_fl_ml_r->markah_validasi;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    if($markah_in_mr->markah > 0){
                        $in_mr +=  $markah_in_mr->markah;
                    }
                } 
                if ($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah; 
                    }
                }
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                if($markah_in_mr_r){
                    if($markah_in_mr_r->markah_rekabentuk > 0){
                        $in_mr_r +=  $markah_in_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_in_mv_r){
                    if($markah_in_mv_r->markah_verifikasi > 0){
                        $in_mv_r += $markah_in_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_in_ml_r){
                    if($markah_in_ml_r->markah_validasi > 0){
                        $in_ml_r += $markah_in_ml_r->markah_validasi;
                    }
                }                           
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + + $fl_ml + $in_ml; 
            $total_mr_r = $tl_mr_r + $kt_mr_r + $sb_mr_r + $pa_mr_r + $pd_mr_r + $fl_mr_r +$in_mr_r; 
            $total_mv_r = $tl_mv_r + $kt_mv_r + $sb_mv_r + $pa_mv_r + $pd_mv_r + $fl_mv_r + $in_mv_r; 
            $total_ml_r = $tl_ml_r + $kt_ml_r + $sb_ml_r + $pa_ml_r + $pd_ml_r + $fl_ml_r + $in_ml_r; 

            $peratusan_mr = $total_mr/118 *100;     
            if($peratusan_mr >= 80) {
                $bintang_mr = 5;
            } elseif($peratusan_mr >= 65 && $peratusan_mr < 80) {
                $bintang_mr = 4;
            } elseif($peratusan_mr >= 45 && $peratusan_mr < 65) {
                $bintang_mr = 3;
            } elseif($peratusan_mr >= 30 && $peratusan_mr < 45) {
                $bintang_mr = 2;
            } else {
                $bintang_mr = 1;
            }

            $peratusan_mv = $total_mv/126 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

            $peratusan_ml = $total_ml/126 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

            //Rayuan
            $peratusan_mr_r = $total_mr_r/118 *100;     
            if($peratusan_mr_r >= 80) {
                $bintang_mr_r = 5;
            } elseif($peratusan_mr_r >= 65 && $peratusan_mr_r < 80) {
                $bintang_mr_r = 4;
            } elseif($peratusan_mr_r >= 45 && $peratusan_mr_r < 65) {
                $bintang_mr_r = 3;
            } elseif($peratusan_mr_r >= 30 && $peratusan_mr_r < 45) {
                $bintang_mr_r = 2;
            } else {
                $bintang_mr_r = 1;
            }

            $peratusan_mv_r = $total_mv_r/126 *100;     
            if($peratusan_mv_r >= 80) {
                $bintang_mv_r = 5;
            } elseif($peratusan_mv_r >= 65 && $peratusan_mv_r < 80) {
                $bintang_mv_r = 4;
            } elseif($peratusan_mv_r >= 45 && $peratusan_mv_r < 65) {
                $bintang_mv_r = 3;
            } elseif($peratusan_mv_r >= 30 && $peratusan_mv_r < 45) {
                $bintang_mv_r = 2;
            } else {
                $bintang_mv_r = 1;
            }

            $peratusan_ml_r = $total_ml_r/126 *100;     
            if($peratusan_ml_r >= 80) {
                $bintang_ml_r = 5;
            } elseif($peratusan_ml_r >= 65 && $peratusan_ml_r < 80) {
                $bintang_ml_r = 4;
            } elseif($peratusan_ml_r >= 45 && $peratusan_ml_r < 65) {
                $bintang_ml_r = 3;
            } elseif($peratusan_ml_r >= 30 && $peratusan_ml_r < 45) {
                $bintang_ml_r = 2;
            } else {
                $bintang_ml_r = 1;
            }

            // dd($kt_mr);   
            return view('projek.satu_eph_bangunan', compact(
                'projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 
                'rayuan_kriterias','users', 'lantikans',
                'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
                'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr', 'in_mr','total_mr', 
                'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv', 'in_mv','total_mv',
                'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml', 'in_ml', 'total_ml',
                'peratusan_mr_r', 'peratusan_mv_r', 'peratusan_ml_r', 'bintang_mr_r', 'bintang_mv_r', 'bintang_ml_r',
                'tl_mr_r','kt_mr_r','sb_mr_r','pa_mr_r','pd_mr_r', 'fl_mr_r','in_mr_r','total_mr_r', 
                'tl_mv_r','kt_mv_r','sb_mv_r','pa_mv_r','pd_mv_r', 'fl_mv_r','in_mv_r','total_mv_r',
                'tl_ml_r','kt_ml_r','sb_ml_r','pa_ml_r','pd_ml_r', 'fl_ml_r', 'in_ml_r', 'total_ml_r'
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan PUN C') {
            // $kriterias = Kriteria::where('borang', 'PUN C')->get();
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'PUN C'],
                ['fasa','=', 'rekabentuk']
            ])->get();    

            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN C'],
                ['fasa','=', 'verifikasi']
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN C'],
                ['fasa','=', 'validasi']
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'PUN C'],
                ['fasa', '=', 'validasi']
            ])->get();
            
            // Rekabentuk borang PUN C
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 6]])->get();
            $fl_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 7]])->get();
            $in_mr = 0;

            // Verifikasi borang PUN C
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            // Validasi borang PUN C
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 7]])->get();
            $in_ml = 0;
            
            //Rayuan
            // Rekabentuk borang PUN C
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 1]])->get();
            $tl_mr_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 2]])->get();
            $kt_mr_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 3]])->get();
            $sb_mr_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 4]])->get();
            $pa_mr_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 5]])->get();
            $pd_mr_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 6]])->get();
            $fl_mr_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 7]])->get();
            $in_mr_r = 0;

            // Verifikasi borang PUN C
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 1]])->get();
            $tl_mv_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 2]])->get();
            $kt_mv_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 3]])->get();
            $sb_mv_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 4]])->get();
            $pa_mv_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 5]])->get();
            $pd_mv_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 6]])->get();
            $fl_mv_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 7]])->get();
            $in_mv_r = 0;

            // Validasi borang PUN C
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 1]])->get();
            $tl_ml_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 2]])->get();
            $kt_ml_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 3]])->get();
            $sb_ml_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 4]])->get();
            $pa_ml_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 5]])->get();
            $pd_ml_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 6]])->get();
            $fl_ml_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 7]])->get();
            $in_ml_r = 0;
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    if($markah_tl_mr->markah > 0){
                        $tl_mr +=  $markah_tl_mr->markah;
                    }
                } 
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                } 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                if($markah_tl_mr_r){
                    if($markah_tl_mr_r->markah_rekabentuk > 0){
                        $tl_mr_r +=  $markah_tl_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_tl_mv_r){
                    if($markah_tl_mv_r->markah_verifikasi > 0){
                        $tl_mv_r += $markah_tl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_tl_ml_r){
                    if($markah_tl_ml_r->markah_validasi > 0){
                        $tl_ml_r += $markah_tl_ml_r->markah_validasi;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_kt_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();

                if($markah_kt_mr){
                    if($markah_kt_mr->markah > 0){
                        $kt_mr +=  $markah_kt_mr->markah;
                    }
                }
                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                if($markah_kt_mr_r){
                    if($markah_kt_mr_r->markah_rekabentuk > 0){
                        $kt_mr_r +=  $markah_kt_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_kt_mv_r){
                    if($markah_kt_mv_r->markah_verifikasi > 0){
                        $kt_mv_r += $markah_kt_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_kt_ml_r){
                    if($markah_kt_ml_r->markah_validasi > 0){
                        $kt_ml_r += $markah_kt_ml_r->markah_validasi;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    if($markah_sb_mr->markah > 0){
                        $sb_mr +=  $markah_sb_mr->markah;
                    }
                } 
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                if($markah_sb_mr_r){
                    if($markah_sb_mr_r->markah_rekabentuk > 0){
                        $sb_mr_r +=  $markah_sb_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_sb_mv_r){
                    if($markah_sb_mv_r->markah_verifikasi > 0){
                        $sb_mv_r += $markah_sb_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_sb_ml_r){
                    if($markah_sb_ml_r->markah_validasi > 0){
                        $sb_ml_r += $markah_sb_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pa_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_pa_mr){
                    if($markah_pa_mr->markah > 0){
                        $pa_mr +=  $markah_pa_mr->markah;
                    }
                } 
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                if($markah_pa_mr_r){
                    if($markah_pa_mr_r->markah_rekabentuk > 0){
                        $pa_mr_r +=  $markah_pa_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_pa_mv_r){
                    if($markah_pa_mv_r->markah_verifikasi > 0){
                        $pa_mv_r += $markah_pa_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pa_ml_r){
                    if($markah_pa_ml_r->markah_validasi > 0){
                        $pa_ml_r += $markah_pa_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pd_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_pd_mr){
                    if($markah_pd_mr->markah > 0){
                        $pd_mr +=  $markah_pd_mr->markah;
                    }
                } 
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                if($markah_pd_mr_r){
                    if($markah_pd_mr_r->markah_rekabentuk > 0){
                        $pd_mr_r +=  $markah_pd_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_pd_mv_r){
                    if($markah_pd_mv_r->markah_verifikasi > 0){
                        $pd_mv_r += $markah_pd_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pd_ml_r){
                    if($markah_pd_ml_r->markah_validasi > 0){
                        $pd_ml_r += $markah_pd_ml_r->markah_validasi;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_fl_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_fl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_fl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();               
                if ($markah_fl_mr){
                    if($markah_fl_mr->markah > 0){
                        $fl_mr +=  $markah_fl_mr->markah;
                    }
                } 
                if ($markah_fl_mv){
                    if($markah_fl_mv->markah > 0){
                        $fl_mv += $markah_fl_mv->markah;
                    }
                }
                if ($markah_fl_ml){
                    if($markah_fl_ml->markah > 0){
                        $fl_ml += $markah_fl_ml->markah;
                    }
                }
                if($markah_fl_mr_r){
                    if($markah_fl_mr_r->markah_rekabentuk > 0){
                        $fl_mr_r +=  $markah_fl_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_fl_mv_r){
                    if($markah_fl_mv_r->markah_verifikasi > 0){
                        $fl_mv_r += $markah_fl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_fl_ml_r){
                    if($markah_fl_ml_r->markah_validasi > 0){
                        $fl_ml_r += $markah_fl_ml_r->markah_validasi;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    if($markah_in_mr->markah > 0){
                        $in_mr +=  $markah_in_mr->markah;
                    }
                } 
                if($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }
                if($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                if($markah_in_mr_r){
                    if($markah_in_mr_r->markah_rekabentuk > 0){
                        $in_mr_r +=  $markah_in_mr_r->markah_rekabentuk;
                    }
                } 
                if($markah_in_mv_r){
                    if($markah_in_mv_r->markah_verifikasi > 0){
                        $in_mv_r += $markah_in_mv_r->markah_verifikasi;
                    }
                } 
                if($markah_in_ml_r){
                    if($markah_in_ml_r->markah_validasi > 0){
                        $in_ml_r += $markah_in_ml_r->markah_validasi;
                    }
                }                           
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + + $fl_ml + $in_ml; 
            $total_mr_r = $tl_mr_r + $kt_mr_r + $sb_mr_r + $pa_mr_r + $pd_mr_r + $fl_mr_r +$in_mr_r; 
            $total_mv_r = $tl_mv_r + $kt_mv_r + $sb_mv_r + $pa_mv_r + $pd_mv_r + $fl_mv_r + $in_mv_r; 
            $total_ml_r = $tl_ml_r + $kt_ml_r + $sb_ml_r + $pa_ml_r + $pd_ml_r + $fl_ml_r + $in_ml_r; 

            $peratusan_mr = $total_mr/151 *100;     
            if($peratusan_mr >= 80) {
                $bintang_mr = 5;
            } elseif($peratusan_mr >= 65 && $peratusan_mr < 80) {
                $bintang_mr = 4;
            } elseif($peratusan_mr >= 45 && $peratusan_mr < 65) {
                $bintang_mr = 3;
            } elseif($peratusan_mr >= 30 && $peratusan_mr < 45) {
                $bintang_mr = 2;
            } else {
                $bintang_mr = 1;
            }

            $peratusan_mv = $total_mv/159 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

            $peratusan_ml = $total_ml/159 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

            //Rayuan
            $peratusan_mr_r = $total_mr_r/151 *100;     
            if($peratusan_mr_r >= 80) {
                $bintang_mr_r = 5;
            } elseif($peratusan_mr_r >= 65 && $peratusan_mr_r < 80) {
                $bintang_mr_r = 4;
            } elseif($peratusan_mr_r >= 45 && $peratusan_mr_r < 65) {
                $bintang_mr_r = 3;
            } elseif($peratusan_mr_r >= 30 && $peratusan_mr_r < 45) {
                $bintang_mr_r = 2;
            } else {
                $bintang_mr_r = 1;
            }

            $peratusan_mv_r = $total_mv_r/159 *100;     
            if($peratusan_mv_r >= 80) {
                $bintang_mv_r = 5;
            } elseif($peratusan_mv_r >= 65 && $peratusan_mv_r < 80) {
                $bintang_mv_r = 4;
            } elseif($peratusan_mv_r >= 45 && $peratusan_mv_r < 65) {
                $bintang_mv_r = 3;
            } elseif($peratusan_mv_r >= 30 && $peratusan_mv_r < 45) {
                $bintang_mv_r = 2;
            } else {
                $bintang_mv_r = 1;
            }

            $peratusan_ml_r = $total_ml_r/159 *100;     
            if($peratusan_ml_r >= 80) {
                $bintang_ml_r = 5;
            } elseif($peratusan_ml_r >= 65 && $peratusan_ml_r < 80) {
                $bintang_ml_r = 4;
            } elseif($peratusan_ml_r >= 45 && $peratusan_ml_r < 65) {
                $bintang_ml_r = 3;
            } elseif($peratusan_ml_r >= 30 && $peratusan_ml_r < 45) {
                $bintang_ml_r = 2;
            } else {
                $bintang_ml_r = 1;
            }

            // dd($kt_mr);   
            return view('projek.satu_eph_bangunan', compact(
                'projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 
                'rayuan_kriterias','users', 'lantikans',
                'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
                'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr', 'in_mr','total_mr', 
                'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv', 'in_mv','total_mv',
                'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml', 'in_ml', 'total_ml',
                'peratusan_mr_r', 'peratusan_mv_r', 'peratusan_ml_r', 'bintang_mr_r', 'bintang_mv_r', 'bintang_ml_r',
                'tl_mr_r','kt_mr_r','sb_mr_r','pa_mr_r','pd_mr_r', 'fl_mr_r','in_mr_r','total_mr_r', 
                'tl_mv_r','kt_mv_r','sb_mv_r','pa_mv_r','pd_mv_r', 'fl_mv_r','in_mv_r','total_mv_r',
                'tl_ml_r','kt_ml_r','sb_ml_r','pa_ml_r','pd_ml_r', 'fl_ml_r', 'in_ml_r', 'total_ml_r'
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan PUN D') {
            // $kriterias = Kriteria::where('borang', 'PUN D')->get(); 
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'PUN D'],
                ['fasa','=', 'rekabentuk']
            ])->get();    

            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN D'],
                ['fasa','=', 'verifikasi']
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN D'],
                ['fasa','=', 'validasi']
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'PUN D'],
                ['fasa', '=', 'validasi']
            ])->get();
            
            // Rekabentuk borang PUN D
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 6]])->get();
            $fl_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 7]])->get();
            $in_mr = 0;

            // Verifikasi borang PUN D
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            // Validasi borang PUN D
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 7]])->get();
            $in_ml = 0;
            
            
            //Rayuan
            // Rekabentuk borang PUN D
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 1]])->get();
            $tl_mr_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 2]])->get();
            $kt_mr_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 3]])->get();
            $sb_mr_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 4]])->get();
            $pa_mr_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 5]])->get();
            $pd_mr_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 6]])->get();
            $fl_mr_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', ]])->get();
            $in_mr_r = 0;

            // Verifikasi borang PUN D
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 1]])->get();
            $tl_mv_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 2]])->get();
            $kt_mv_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 3]])->get();
            $sb_mv_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 4]])->get();
            $pa_mv_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 5]])->get();
            $pd_mv_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 5]])->get();
            $fl_mv_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 6]])->get();
            $in_mv_r = 0;

            // Validasi borang PUN D
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 1]])->get();
            $tl_ml_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 2]])->get();
            $kt_ml_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 3]])->get();
            $sb_ml_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 4]])->get();
            $pa_ml_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 5]])->get();
            $pd_ml_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 5]])->get();
            $fl_ml_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 6]])->get();
            $in_ml_r = 0;
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    if($markah_tl_mr->markah > 0){
                        $tl_mr +=  $markah_tl_mr->markah;
                    }
                } 
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                } 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                if($markah_tl_mr_r){
                    if($markah_tl_mr_r->markah_rekabentuk > 0){
                        $tl_mr_r +=  $markah_tl_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_tl_mv_r){
                    if($markah_tl_mv_r->markah_verifikasi > 0){
                        $tl_mv_r += $markah_tl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_tl_ml_r){
                    if($markah_tl_ml_r->markah_validasi > 0){
                        $tl_ml_r += $markah_tl_ml_r->markah_validasi;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_kt_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();

                if($markah_kt_mr){
                    if($markah_kt_mr->markah > 0){
                        $kt_mr +=  $markah_kt_mr->markah;
                    }
                }
                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                if($markah_kt_mr_r){
                    if($markah_kt_mr_r->markah_rekabentuk > 0){
                        $kt_mr_r +=  $markah_kt_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_kt_mv_r){
                    if($markah_kt_mv_r->markah_verifikasi > 0){
                        $kt_mv_r += $markah_kt_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_kt_ml_r){
                    if($markah_kt_ml_r->markah_validasi > 0){
                        $kt_ml_r += $markah_kt_ml_r->markah_validasi;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    $sb_mr +=  $markah_sb_mr->markah;
                } 
                if ($markah_sb_mv){
                    $sb_mv += $markah_sb_mv->markah;
                }
                if ($markah_sb_ml){
                    $sb_ml += $markah_sb_ml->markah;
                }
                if($markah_sb_mr_r){
                    if($markah_sb_mr_r->markah_rekabentuk > 0){
                        $sb_mr_r +=  $markah_sb_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_sb_mv_r){
                    if($markah_sb_mv_r->markah_verifikasi > 0){
                        $sb_mv_r += $markah_sb_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_sb_ml_r){
                    if($markah_sb_ml_r->markah_validasi > 0){
                        $sb_ml_r += $markah_sb_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pa_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_pa_mr){
                    $pa_mr +=  $markah_pa_mr->markah;
                } 
                if ($markah_pa_mv){
                    $pa_mv += $markah_pa_mv->markah;
                }
                if ($markah_pa_ml){
                    $pa_ml += $markah_pa_ml->markah;
                }
                if($markah_pa_mr_r){
                    if($markah_pa_mr_r->markah_rekabentuk > 0){
                        $pa_mr_r +=  $markah_pa_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_pa_mv_r){
                    if($markah_pa_mv_r->markah_verifikasi > 0){
                        $pa_mv_r += $markah_pa_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pa_ml_r){
                    if($markah_pa_ml_r->markah_validasi > 0){
                        $pa_ml_r += $markah_pa_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pd_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_pd_mr){
                    $pd_mr +=  $markah_pd_mr->markah;
                } 
                if ($markah_pd_mv){
                    $pd_mv += $markah_pd_mv->markah;
                }
                if ($markah_pd_ml){
                    $pd_ml += $markah_pd_ml->markah;
                }
                if($markah_pd_mr_r){
                    if($markah_pd_mr_r->markah_rekabentuk > 0){
                        $pd_mr_r +=  $markah_pd_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_pd_mv_r){
                    if($markah_pd_mv_r->markah_verifikasi > 0){
                        $pd_mv_r += $markah_pd_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pd_ml_r){
                    if($markah_pd_ml_r->markah_validasi > 0){
                        $pd_ml_r += $markah_pd_ml_r->markah_validasi;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_fl_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_fl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_fl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();               
                if($markah_fl_mr){
                    $fl_mr +=  $markah_fl_mr->markah;
                } 
                if ($markah_fl_mv){
                    $fl_mv += $markah_fl_mv->markah;
                }
                if ($markah_fl_ml){
                    $fl_ml += $markah_fl_ml->markah;
                }
                if($markah_fl_mr_r){
                    if($markah_fl_mr_r->markah_rekabentuk > 0){
                        $fl_mr_r +=  $markah_fl_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_fl_mv_r){
                    if($markah_fl_mv_r->markah_verifikasi > 0){
                        $fl_mv_r += $markah_fl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_fl_ml_r){
                    if($markah_fl_ml_r->markah_validasi > 0){
                        $fl_ml_r += $markah_fl_ml_r->markah_validasi;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    $in_mr +=  $markah_in_mr->markah;
                } 
                if ($markah_in_mv){
                    $in_mv += $markah_in_mv->markah;
                }
                if ($markah_in_ml){
                    $in_ml += $markah_in_ml->markah;
                } 
                if($markah_in_mr_r){
                    if($markah_in_mr_r->markah_rekabentuk > 0){
                        $in_mr_r +=  $markah_in_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_in_mv_r){
                    if($markah_in_mv_r->markah_verifikasi > 0){
                        $in_mv_r += $markah_in_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_in_ml_r){
                    if($markah_in_ml_r->markah_validasi > 0){
                        $in_ml_r += $markah_in_ml_r->markah_validasi;
                    }
                }                           
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + + $fl_ml + $in_ml; 
            $total_mr_r = $tl_mr_r + $kt_mr_r + $sb_mr_r + $pa_mr_r + $pd_mr_r + $fl_mr_r +$in_mr_r; 
            $total_mv_r = $tl_mv_r + $kt_mv_r + $sb_mv_r + $pa_mv_r + $pd_mv_r + $fl_mv_r + $in_mv_r; 
            $total_ml_r = $tl_ml_r + $kt_ml_r + $sb_ml_r + $pa_ml_r + $pd_ml_r + $fl_ml_r + $in_ml_r; 

            $peratusan_mr = $total_mr/156 *100;     
            if($peratusan_mr >= 80) {
                $bintang_mr = 5;
            } elseif($peratusan_mr >= 65 && $peratusan_mr < 80) {
                $bintang_mr = 4;
            } elseif($peratusan_mr >= 45 && $peratusan_mr < 65) {
                $bintang_mr = 3;
            } elseif($peratusan_mr >= 30 && $peratusan_mr < 45) {
                $bintang_mr = 2;
            } else {
                $bintang_mr = 1;
            }

            $peratusan_mv = $total_mv/164 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

            $peratusan_ml = $total_ml/164 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

            //Rayuan
            $peratusan_mr_r = $total_mr_r/156 *100;     
            if($peratusan_mr_r >= 80) {
                $bintang_mr_r = 5;
            } elseif($peratusan_mr_r >= 65 && $peratusan_mr_r < 80) {
                $bintang_mr_r = 4;
            } elseif($peratusan_mr_r >= 45 && $peratusan_mr_r < 65) {
                $bintang_mr_r = 3;
            } elseif($peratusan_mr_r >= 30 && $peratusan_mr_r < 45) {
                $bintang_mr_r = 2;
            } else {
                $bintang_mr_r = 1;
            }

            $peratusan_mv_r = $total_mv_r/164 *100;     
            if($peratusan_mv_r >= 80) {
                $bintang_mv_r = 5;
            } elseif($peratusan_mv_r >= 65 && $peratusan_mv_r < 80) {
                $bintang_mv_r = 4;
            } elseif($peratusan_mv_r >= 45 && $peratusan_mv_r < 65) {
                $bintang_mv_r = 3;
            } elseif($peratusan_mv_r >= 30 && $peratusan_mv_r < 45) {
                $bintang_mv_r = 2;
            } else {
                $bintang_mv_r = 1;
            }

            $peratusan_ml_r = $total_ml_r/164 *100;     
            if($peratusan_ml_r >= 80) {
                $bintang_ml_r = 5;
            } elseif($peratusan_ml_r >= 65 && $peratusan_ml_r < 80) {
                $bintang_ml_r = 4;
            } elseif($peratusan_ml_r >= 45 && $peratusan_ml_r < 65) {
                $bintang_ml_r = 3;
            } elseif($peratusan_ml_r >= 30 && $peratusan_ml_r < 45) {
                $bintang_ml_r = 2;
            } else {
                $bintang_ml_r = 1;
            }

            // dd($kt_mr);   
            return view('projek.satu_eph_bangunan', compact(
                'projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 
                'rayuan_kriterias','users', 'lantikans',
                'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
                'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr', 'in_mr','total_mr', 
                'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv', 'in_mv','total_mv',
                'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml', 'in_ml', 'total_ml',
                'peratusan_mr_r', 'peratusan_mv_r', 'peratusan_ml_r', 'bintang_mr_r', 'bintang_mv_r', 'bintang_ml_r',
                'tl_mr_r','kt_mr_r','sb_mr_r','pa_mr_r','pd_mr_r', 'fl_mr_r','in_mr_r','total_mr_r', 
                'tl_mv_r','kt_mv_r','sb_mv_r','pa_mv_r','pd_mv_r', 'fl_mv_r','in_mv_r','total_mv_r',
                'tl_ml_r','kt_ml_r','sb_ml_r','pa_ml_r','pd_ml_r', 'fl_ml_r', 'in_ml_r', 'total_ml_r'
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan Sedia Ada A') {
            // $kriterias = Kriteria::where('borang', 'SEDIA ADA A')->get();
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA A'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA A'],
                ['fasa','=', 'validasi'],
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA A'],
                ['fasa', '=', 'validasi']
            ])->get(); 

            // Verifikasi borang SEDIA ADA A
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            // Validasi borang SEDIA ADA A
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 7]])->get();
            $in_ml = 0;
             
            //Rayuan
            // Rekabentuk borang SEDIA ADA A
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 1]])->get();
            $tl_mr_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 2]])->get();
            $kt_mr_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 3]])->get();
            $sb_mr_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 4]])->get();
            $pa_mr_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 5]])->get();
            $pd_mr_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 5]])->get();
            $fl_mr_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 6]])->get();
            $in_mr_r = 0;

            // Verifikasi borang SEDIA ADA A
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 1]])->get();
            $tl_mv_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 2]])->get();
            $kt_mv_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 3]])->get();
            $sb_mv_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 4]])->get();
            $pa_mv_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 5]])->get();
            $pd_mv_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 5]])->get();
            $fl_mv_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 6]])->get();
            $in_mv_r = 0;

            // Validasi borang SEDIA ADA A
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 1]])->get();
            $tl_ml_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 2]])->get();
            $kt_ml_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 3]])->get();
            $sb_ml_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 4]])->get();
            $pa_ml_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 5]])->get();
            $pd_ml_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 5]])->get();
            $fl_ml_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 6]])->get();
            $in_ml_r = 0;
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                } 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                if ($markah_tl_mv_r){
                    if($markah_tl_mv_r->markah_verifikasi > 0){
                        $tl_mv_r += $markah_tl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_tl_ml_r){
                    if($markah_tl_ml_r->markah_validasi > 0){
                        $tl_ml_r += $markah_tl_ml_r->markah_validasi;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_kt_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();

                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                if ($markah_kt_mv_r){
                    if($markah_kt_mv_r->markah_verifikasi > 0){
                        $kt_mv_r += $markah_kt_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_kt_ml_r){
                    if($markah_kt_ml_r->markah_validasi > 0){
                        $kt_ml_r += $markah_kt_ml_r->markah_validasi;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                if ($markah_sb_mv_r){
                    if($markah_sb_mv_r->markah_verifikasi > 0){
                        $sb_mv_r += $markah_sb_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_sb_ml_r){
                    if($markah_sb_ml_r->markah_validasi > 0){
                        $sb_ml_r += $markah_sb_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pa_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();               
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                if ($markah_pa_mv_r){
                    if($markah_pa_mv_r->markah_verifikasi > 0){
                        $pa_mv_r += $markah_pa_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pa_ml_r){
                    if($markah_pa_ml_r->markah_validasi > 0){
                        $pa_ml_r += $markah_pa_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pd_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();               
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                if ($markah_pd_mv_r){
                    if($markah_pd_mv_r->markah_verifikasi > 0){
                        $pd_mv_r += $markah_pd_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pd_ml_r){
                    if($markah_pd_ml_r->markah_validasi > 0){
                        $pd_ml_r += $markah_pd_ml_r->markah_validasi;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_fl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_fl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();               
                if ($markah_fl_mv){
                    if($markah_fl_mv->markah > 0){
                        $fl_mv += $markah_fl_mv->markah;
                    }
                }
                if ($markah_fl_ml){
                    if($markah_fl_ml->markah > 0){
                        $fl_ml += $markah_fl_ml->markah;
                    }
                }
                if ($markah_fl_mv_r){
                    if($markah_fl_mv_r->markah_verifikasi > 0){
                        $fl_mv_r += $markah_fl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_fl_ml_r){
                    if($markah_fl_ml_r->markah_validasi > 0){
                        $fl_ml_r += $markah_fl_ml_r->markah_validasi;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if ($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                if ($markah_in_mv_r){
                    if($markah_in_mv_r->markah_verifikasi > 0){
                        $in_mv_r += $markah_in_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_in_ml_r){
                    if($markah_in_ml_r->markah_validasi > 0){
                        $in_ml_r += $markah_in_ml_r->markah_validasi;
                    }
                }                           
            }                                  
                 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + + $fl_ml + $in_ml; 
            $total_mv_r = $tl_mv_r + $kt_mv_r + $sb_mv_r + $pa_mv_r + $pd_mv_r + $fl_mv_r + $in_mv_r; 
            $total_ml_r = $tl_ml_r + $kt_ml_r + $sb_ml_r + $pa_ml_r + $pd_ml_r + $fl_ml_r + $in_ml_r; 

            $peratusan_mv = $total_mv /62 * 100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

            $peratusan_ml = $total_ml /62 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

            //Rayuan
            $peratusan_mv_r = $total_mv_r/62 *100;     
            if($peratusan_mv_r >= 80) {
                $bintang_mv_r = 5;
            } elseif($peratusan_mv_r >= 65 && $peratusan_mv_r < 80) {
                $bintang_mv_r = 4;
            } elseif($peratusan_mv_r >= 45 && $peratusan_mv_r < 65) {
                $bintang_mv_r = 3;
            } elseif($peratusan_mv_r >= 30 && $peratusan_mv_r < 45) {
                $bintang_mv_r = 2;
            } else {
                $bintang_mv_r = 1;
            }

            $peratusan_ml_r = $total_ml_r/62 *100;     
            if($peratusan_ml_r >= 80) {
                $bintang_ml_r = 5;
            } elseif($peratusan_ml_r >= 65 && $peratusan_ml_r < 80) {
                $bintang_ml_r = 4;
            } elseif($peratusan_ml_r >= 45 && $peratusan_ml_r < 65) {
                $bintang_ml_r = 3;
            } elseif($peratusan_ml_r >= 30 && $peratusan_ml_r < 45) {
                $bintang_ml_r = 2;
            } else {
                $bintang_ml_r = 1;
            }

            // dd($kt_mr);   
            return view('projek.satu_eph_bangunan', compact(
                'projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 
                'rayuan_kriterias','users', 'lantikans',
                'peratusan_mv', 'peratusan_ml', 'bintang_mv', 'bintang_ml',
                'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv', 'in_mv','total_mv',
                'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml', 'in_ml', 'total_ml',
                'peratusan_mr_r', 'peratusan_mv_r', 'peratusan_ml_r', 'bintang_mv_r', 'bintang_ml_r',
                'tl_mv_r','kt_mv_r','sb_mv_r','pa_mv_r','pd_mv_r', 'fl_mv_r','in_mv_r','total_mv_r',
                'tl_ml_r','kt_ml_r','sb_ml_r','pa_ml_r','pd_ml_r', 'fl_ml_r', 'in_ml_r', 'total_ml_r'
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan Sedia Ada B') {
            // $kriterias = Kriteria::where('borang', 'SEDIA ADA B')->get(); 
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA B'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA B'],
                ['fasa','=', 'validasi'],
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA B'],
                ['fasa', '=', 'validasi']
            ])->get();
            
            // Verifikasi borang SEDIA ADA B
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            // Validasi borang SEDIA ADA B
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 7]])->get();
            $in_ml = 0;
            
            
            //Rayuan
            // Verifikasi borang SEDIA ADA B
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 1]])->get();
            $tl_mv_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 2]])->get();
            $kt_mv_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 3]])->get();
            $sb_mv_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 4]])->get();
            $pa_mv_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 5]])->get();
            $pd_mv_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 6]])->get();
            $fl_mv_r= 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 7]])->get();
            $in_mv_r = 0;

            // Validasi borang SEDIA ADA B
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 1]])->get();
            $tl_ml_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 2]])->get();
            $kt_ml_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 3]])->get();
            $sb_ml_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 4]])->get();
            $pa_ml_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 5]])->get();
            $pd_ml_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 6]])->get();
            $fl_ml_r= 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 7]])->get();
            $in_ml_r = 0;
            
            //Rayuan
            // Verifikasi borang SEDIA ADA B
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 1]])->get();
            $tl_mv_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 2]])->get();
            $kt_mv_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 3]])->get();
            $sb_mv_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 4]])->get();
            $pa_mv_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 5]])->get();
            $pd_mv_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 6]])->get();
            $fl_mv_r= 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 7]])->get();
            $in_mv_r = 0;

            // Validasi borang SEDIA ADA B
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 1]])->get();
            $tl_ml_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 2]])->get();
            $kt_ml_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 3]])->get();
            $sb_ml_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 4]])->get();
            $pa_ml_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 5]])->get();
            $pd_ml_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 6]])->get();
            $fl_mv_r= 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 7]])->get();
            $in_ml_r = 0;
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                } 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                if ($markah_tl_mv_r){
                    if($markah_tl_mv_r->markah_verifikasi > 0){
                        $tl_mv_r += $markah_tl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_tl_ml_r){
                    if($markah_tl_ml_r->markah_validasi > 0){
                        $tl_ml_r += $markah_tl_ml_r->markah_validasi;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_kt_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();

                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                if ($markah_kt_mv_r){
                    if($markah_kt_mv_r->markah_verifikasi > 0){
                        $kt_mv_r += $markah_kt_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_kt_ml_r){
                    if($markah_kt_ml_r->markah_validasi > 0){
                        $kt_ml_r += $markah_kt_ml_r->markah_validasi;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                if ($markah_sb_mv_r){
                    if($markah_sb_mv_r->markah_verifikasi > 0){
                        $sb_mv_r += $markah_sb_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_sb_ml_r){
                    if($markah_sb_ml_r->markah_validasi > 0){
                        $sb_ml_r += $markah_sb_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pa_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();               
                if ($markah_pa_mv > 0){
                    if($markah_pa_mv->markah){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                if ($markah_pa_mv_r){
                    if($markah_pa_mv_r->markah_verifikasi > 0){
                        $pa_mv_r += $markah_pa_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pa_ml_r){
                    if($markah_pa_ml_r->markah_validasi > 0){
                        $pa_ml_r += $markah_pa_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pd_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();               
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                if ($markah_pd_mv_r){
                    if($markah_pd_mv_r->markah_verifikasi > 0){
                        $pd_mv_r += $markah_pd_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pd_ml_r){
                    if($markah_pd_ml_r->markah_validasi > 0){
                        $pd_ml_r += $markah_pd_ml_r->markah_validasi;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if ($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                if ($markah_in_mv_r){
                    if($markah_in_mv_r->markah_verifikasi > 0){
                        $in_mv_r += $markah_in_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_in_ml_r){
                    if($markah_in_ml_r->markah_validasi > 0){
                        $in_ml_r += $markah_in_ml_r->markah_validasi;
                    }
                }                           
            }                                  
                 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $in_ml; 
            $total_mv_r = $tl_mv_r + $kt_mv_r + $sb_mv_r + $pa_mv_r + $pd_mv_r + $in_mv_r; 
            $total_ml_r = $tl_ml_r + $kt_ml_r + $sb_ml_r + $pa_ml_r + $pd_ml_r + $in_ml_r; 

            $peratusan_mv = $total_mv/108 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

            $peratusan_ml = $total_ml/108 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

            //Rayuan
            $peratusan_mv_r = $total_mv_r/108 *100;     
            if($peratusan_mv_r >= 80) {
                $bintang_mv_r = 5;
            } elseif($peratusan_mv_r >= 65 && $peratusan_mv_r < 80) {
                $bintang_mv_r = 4;
            } elseif($peratusan_mv_r >= 45 && $peratusan_mv_r < 65) {
                $bintang_mv_r = 3;
            } elseif($peratusan_mv_r >= 30 && $peratusan_mv_r < 45) {
                $bintang_mv_r = 2;
            } else {
                $bintang_mv_r = 1;
            }

            $peratusan_ml_r = $total_ml_r/108 *100;     
            if($peratusan_ml_r >= 80) {
                $bintang_ml_r = 5;
            } elseif($peratusan_ml_r >= 65 && $peratusan_ml_r < 80) {
                $bintang_ml_r = 4;
            } elseif($peratusan_ml_r >= 45 && $peratusan_ml_r < 65) {
                $bintang_ml_r = 3;
            } elseif($peratusan_ml_r >= 30 && $peratusan_ml_r < 45) {
                $bintang_ml_r = 2;
            } else {
                $bintang_ml_r = 1;
            }

            // dd($kt_mr);   
            return view('projek.satu_eph_bangunan', compact(
                'projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 
                'rayuan_kriterias','users', 'lantikans',
                'tl_mv', 'kt_mv', 'sb_mv', 'pa_mv', 'pd_mv', 'in_mv', 'total_mv',
                'tl_ml', 'kt_ml', 'sb_ml', 'pa_ml', 'pd_ml', 'in_ml', 'total_ml',
                'tl_mv_r', 'kt_mv_r', 'sb_mv_r', 'pa_mv_r', 'pd_mv_r', 'in_mv_r', 'total_mv_r',
                'tl_ml_r', 'kt_ml_r', 'sb_ml_r', 'pa_ml_r','pd_ml_r', 'in_ml_r', 'total_ml_r',
                'peratusan_mv', 'peratusan_ml', 'bintang_mv', 'bintang_ml',
                'peratusan_mv_r', 'peratusan_ml_r', 'bintang_mv_r', 'bintang_ml_r',
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan Sedia Ada C') {
            // $kriterias = Kriteria::where('borang', 'SEDIA ADA C')->get(); 
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA C'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA C'],
                ['fasa','=', 'validasi'],
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA C'],
                ['fasa', '=', 'validasi']
            ])->get();
            
            // Verifikasi borang SEDIA ADA C
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            // Validasi borang SEDIA ADA C
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 7]])->get();
            $in_ml = 0;
            
            //Rayuan
            // Verifikasi borang SEDIA ADA C
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 1]])->get();
            $tl_mv_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 2]])->get();
            $kt_mv_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 3]])->get();
            $sb_mv_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 4]])->get();
            $pa_mv_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 5]])->get();
            $pd_mv_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 6]])->get();
            $fl_mv_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 7]])->get();
            $in_mv_r = 0;

            // Validasi borang SEDIA ADA C
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 1]])->get();
            $tl_ml_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 2]])->get();
            $kt_ml_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 3]])->get();
            $sb_ml_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 4]])->get();
            $pa_ml_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 5]])->get();
            $pd_ml_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 6]])->get();
            $fl_ml_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 7]])->get();
            $in_ml_r = 0;
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                } 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                if ($markah_tl_mv_r){
                    if($markah_tl_mv_r->markah_verifikasi > 0){
                        $tl_mv_r += $markah_tl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_tl_ml_r){
                    if($markah_tl_ml_r->markah_validasi > 0){
                        $tl_ml_r += $markah_tl_ml_r->markah_validasi;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_kt_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();

                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                if ($markah_kt_mv_r){
                    if($markah_kt_mv_r->markah_verifikasi > 0){
                        $kt_mv_r += $markah_kt_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_kt_ml_r){
                    if($markah_kt_ml_r->markah_validasi > 0){
                        $kt_ml_r += $markah_kt_ml_r->markah_validasi;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                if ($markah_sb_mv_r){
                    if($markah_sb_mv_r->markah_verifikasi > 0){
                        $sb_mv_r += $markah_sb_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_sb_ml_r){
                    if($markah_sb_ml_r->markah_validasi > 0){
                        $sb_ml_r += $markah_sb_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pa_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();               
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                if ($markah_pa_mv_r){
                    if($markah_pa_mv_r->markah_verifikasi > 0){
                        $pa_mv_r += $markah_pa_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pa_ml_r){
                    if($markah_pa_ml_r->markah_validasi > 0){
                        $pa_ml_r += $markah_pa_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pd_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();               
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                if ($markah_pd_mv_r){
                    if($markah_pd_mv_r->markah_verifikasi > 0){
                        $pd_mv_r += $markah_pd_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pd_ml_r){
                    if($markah_pd_ml_r->markah_validasi > 0){
                        $pd_ml_r += $markah_pd_ml_r->markah_validasi;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_fl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_fl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();               
                if ($markah_fl_mv){
                    if($markah_fl_mv->markah > 0){
                        $fl_mv += $markah_fl_mv->markah;
                    }
                }
                if ($markah_fl_ml){
                    if($markah_fl_ml->markah > 0){
                        $fl_ml += $markah_fl_ml->markah;
                    }
                }
                if ($markah_fl_mv_r){
                    if($markah_fl_mv_r->markah_verifikasi > 0){
                        $fl_mv_r += $markah_fl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_fl_ml_r){
                    if($markah_fl_ml_r->markah_validasi > 0){
                        $fl_ml_r += $markah_fl_ml_r->markah_validasi;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if ($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                if ($markah_in_mv_r){
                    if($markah_in_mv_r->markah_verifikasi > 0){
                        $in_mv_r += $markah_in_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_in_ml_r){
                    if($markah_in_ml_r->markah_validasi > 0){
                        $in_ml_r += $markah_in_ml_r->markah_validasi;
                    }
                }                           
            }                                  
                 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + + $fl_ml + $in_ml; 
            $total_mv_r = $tl_mv_r + $kt_mv_r + $sb_mv_r + $pa_mv_r + $pd_mv_r + $fl_mv_r + $in_mv_r; 
            $total_ml_r = $tl_ml_r + $kt_ml_r + $sb_ml_r + $pa_ml_r + $pd_ml_r + $fl_ml_r + $in_ml_r; 

            $peratusan_mv = $total_mv/140 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

            $peratusan_ml = $total_ml/140 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

            //Rayuan
            $peratusan_mv_r = $total_mv_r/140 *100;     
            if($peratusan_mv_r >= 80) {
                $bintang_mv_r = 5;
            } elseif($peratusan_mv_r >= 65 && $peratusan_mv_r < 80) {
                $bintang_mv_r = 4;
            } elseif($peratusan_mv_r >= 45 && $peratusan_mv_r < 65) {
                $bintang_mv_r = 3;
            } elseif($peratusan_mv_r >= 30 && $peratusan_mv_r < 45) {
                $bintang_mv_r = 2;
            } else {
                $bintang_mv_r = 1;
            }

            $peratusan_ml_r = $total_ml_r/140 *100;     
            if($peratusan_ml_r >= 80) {
                $bintang_ml_r = 5;
            } elseif($peratusan_ml_r >= 65 && $peratusan_ml_r < 80) {
                $bintang_ml_r = 4;
            } elseif($peratusan_ml_r >= 45 && $peratusan_ml_r < 65) {
                $bintang_ml_r = 3;
            } elseif($peratusan_ml_r >= 30 && $peratusan_ml_r < 45) {
                $bintang_ml_r = 2;
            } else {
                $bintang_ml_r = 1;
            }

            // dd($kt_mr);   
            return view('projek.satu_eph_bangunan', compact(
                'projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 
                'rayuan_kriterias','users', 'lantikans',
                'peratusan_mv', 'peratusan_ml', 'bintang_mv', 'bintang_ml',
                'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv', 'in_mv','total_mv',
                'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml', 'in_ml', 'total_ml',
                'peratusan_mr_r', 'peratusan_mv_r', 'peratusan_ml_r', 'bintang_mv_r', 'bintang_ml_r',
                'tl_mv_r','kt_mv_r','sb_mv_r','pa_mv_r','pd_mv_r', 'fl_mv_r','in_mv_r','total_mv_r',
                'tl_ml_r','kt_ml_r','sb_ml_r','pa_ml_r','pd_ml_r', 'fl_ml_r', 'in_ml_r', 'total_ml_r'
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan Sedia Ada D') {
            // $kriterias = Kriteria::where('borang', 'SEDIA ADA D')->get(); 
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA D'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA D'],
                ['fasa','=', 'validasi'],
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA D'],
                ['fasa', '=', 'validasi']
            ])->get();

            // Verifikasi borang SEDIA ADA D
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            // Validasi borang SEDIA ADA D
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 7]])->get();
            $in_ml = 0;
             
            //Rayuan
            // Verifikasi borang SEDIA ADA D
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 1]])->get();
            $tl_mv_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 2]])->get();
            $kt_mv_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 3]])->get();
            $sb_mv_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 4]])->get();
            $pa_mv_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 5]])->get();
            $pd_mv_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 6]])->get();
            $fl_mv_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 7]])->get();
            $in_mv_r = 0;

            // Validasi borang SEDIA ADA D
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 1]])->get();
            $tl_ml_r = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 2]])->get();
            $kt_ml_r = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 3]])->get();
            $sb_ml_r = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 4]])->get();
            $pa_ml_r = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 5]])->get();
            $pd_ml_r = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 6]])->get();
            $fl_ml_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 7]])->get();
            $in_ml_r = 0;
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                } 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                if ($markah_tl_mv_r){
                    if($markah_tl_mv_r->markah_verifikasi > 0){
                        $tl_mv_r += $markah_tl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_tl_ml_r){
                    if($markah_tl_ml_r->markah_validasi > 0){
                        $tl_ml_r += $markah_tl_ml_r->markah_validasi;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_kt_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();
                $markah_kt_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();

                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                if ($markah_kt_mv_r){
                    if($markah_kt_mv_r->markah_verifikasi > 0){
                        $kt_mv_r += $markah_kt_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_kt_ml_r){
                    if($markah_kt_ml_r->markah_validasi > 0){
                        $kt_ml_r += $markah_kt_ml_r->markah_validasi;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                $markah_sb_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                if ($markah_sb_mv_r){
                    if($markah_sb_mv_r->markah_verifikasi > 0){
                        $sb_mv_r += $markah_sb_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_sb_ml_r){
                    if($markah_sb_ml_r->markah_validasi > 0){
                        $sb_ml_r += $markah_sb_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pa_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pa_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();               
                if ($markah_pa_mv > 0){
                    if($markah_pa_mv->markah){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                if ($markah_pa_mv_r){
                    if($markah_pa_mv_r->markah_verifikasi > 0){
                        $pa_mv_r += $markah_pa_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pa_ml_r){
                    if($markah_pa_ml_r->markah_validasi > 0){
                        $pa_ml_r += $markah_pa_ml_r->markah_validasi;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_pd_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();
                $markah_pd_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();               
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                if ($markah_pd_mv_r){
                    if($markah_pd_mv_r->markah_verifikasi > 0){
                        $pd_mv_r += $markah_pd_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_pd_ml_r){
                    if($markah_pd_ml_r->markah_validasi > 0){
                        $pd_ml_r += $markah_pd_ml_r->markah_validasi;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                $markah_fl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_fl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();               
                if ($markah_fl_mv){
                    if($markah_fl_mv->markah > 0){
                        $fl_mv += $markah_fl_mv->markah;
                    }
                }
                if ($markah_fl_ml){
                    if($markah_fl_ml->markah > 0){
                        $fl_ml += $markah_fl_ml->markah;
                    }
                }
                if ($markah_fl_mv_r){
                    if($markah_fl_mv_r->markah_verifikasi > 0){
                        $fl_mv_r += $markah_fl_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_fl_ml_r){
                    if($markah_fl_ml_r->markah_validasi > 0){
                        $fl_ml_r += $markah_fl_ml_r->markah_validasi;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if ($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                if ($markah_in_mv_r){
                    if($markah_in_mv_r->markah_verifikasi > 0){
                        $in_mv_r += $markah_in_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_in_ml_r){
                    if($markah_in_ml_r->markah_validasi > 0){
                        $in_ml_r += $markah_in_ml_r->markah_validasi;
                    }
                }                           
            }                                  
                 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + + $fl_ml + $in_ml; 
            $total_mv_r = $tl_mv_r + $kt_mv_r + $sb_mv_r + $pa_mv_r + $pd_mv_r + $fl_mv_r + $in_mv_r; 
            $total_ml_r = $tl_ml_r + $kt_ml_r + $sb_ml_r + $pa_ml_r + $pd_ml_r + $fl_ml_r + $in_ml_r; 

            $peratusan_mv = $total_mv/145 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

            $peratusan_ml = $total_ml/145 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

            //Rayuan
            $peratusan_mv_r = $total_mv_r/145 *100;     
            if($peratusan_mv_r >= 80) {
                $bintang_mv_r = 5;
            } elseif($peratusan_mv_r >= 65 && $peratusan_mv_r < 80) {
                $bintang_mv_r = 4;
            } elseif($peratusan_mv_r >= 45 && $peratusan_mv_r < 65) {
                $bintang_mv_r = 3;
            } elseif($peratusan_mv_r >= 30 && $peratusan_mv_r < 45) {
                $bintang_mv_r = 2;
            } else {
                $bintang_mv_r = 1;
            }

            $peratusan_ml_r = $total_ml_r/145 *100;     
            if($peratusan_ml_r >= 80) {
                $bintang_ml_r = 5;
            } elseif($peratusan_ml_r >= 65 && $peratusan_ml_r < 80) {
                $bintang_ml_r = 4;
            } elseif($peratusan_ml_r >= 45 && $peratusan_ml_r < 65) {
                $bintang_ml_r = 3;
            } elseif($peratusan_ml_r >= 30 && $peratusan_ml_r < 45) {
                $bintang_ml_r = 2;
            } else {
                $bintang_ml_r = 1;
            }

            // dd($kt_mr);   
            return view('projek.satu_eph_bangunan', compact(
                'projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 
                'rayuan_kriterias','users', 'lantikans',
                'peratusan_mv', 'peratusan_ml', 'bintang_mv', 'bintang_ml',
                'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv', 'in_mv','total_mv',
                'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml', 'in_ml', 'total_ml',
                'peratusan_mr_r', 'peratusan_mv_r', 'peratusan_ml_r', 'bintang_mv_r', 'bintang_ml_r',
                'tl_mv_r','kt_mv_r','sb_mv_r','pa_mv_r','pd_mv_r', 'fl_mv_r','in_mv_r','total_mv_r',
                'tl_ml_r','kt_ml_r','sb_ml_r','pa_ml_r','pd_ml_r', 'fl_ml_r', 'in_ml_r', 'total_ml_r'
        )); 
        } elseif ($projek->kategori ==  'phJKR Jalan Baru') {
            // $kriterias = Kriteria::where('borang', 'NEW ROADS')->get();
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'NEW ROADS'],
                ['fasa','=', 'rekabentuk'],
            ])->get();    

            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'NEW ROADS'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $rayuan_rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'NEW ROADS'],
                ['fasa','=', 'rekabentuk'],

            ])->get();  

            $rayuan_verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'NEW ROADS'],
                ['fasa','=', 'verifikasi'],

            ])->get();
        
            // Rekabentuk borang NEW ROADS 
            $sm_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 1]])->get();
            $sm_td = 0;
            $pt_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 2]])->get();
            $pt_td = 0;
            $ew_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 3]])->get();
            $ew_td = 0;
            $ae_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 4]])->get();
            $ae_td = 0;
            $ca_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 5]])->get();
            $ca_td = 0;
            $mr_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 6]])->get();
            $mr_td = 0;
            $ec_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 7]])->get();
            $ec_td = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 8]])->get();
            $in_td = 0;
            $sm_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 1]])->get();
            $sm_ad = 0;
            $pt_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 2]])->get();
            $pt_ad = 0;
            $ew_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 3]])->get();
            $ew_ad = 0;
            $ae_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 4]])->get();
            $ae_ad = 0;
            $ca_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 5]])->get();
            $ca_ad = 0;
            $mr_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 6]])->get();
            $mr_ad = 0;
            $ec_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 7]])->get();
            $ec_ad = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 8]])->get();
            $in_ad = 0;

            // Verifikasi borang NEW ROADS 
            $sm_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 1]])->get();
            $sm_tv = 0;
            $pt_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 2]])->get();
            $pt_tv = 0;
            $ew_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 3]])->get();
            $ew_tv = 0;
            $ae_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 4]])->get();
            $ae_tv = 0;
            $ca_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 5]])->get();
            $ca_tv = 0;
            $mr_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 6]])->get();
            $mr_tv = 0;
            $ec_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 7]])->get();
            $ec_tv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 8]])->get();
            $in_tv = 0;
            $sm_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 1]])->get();
            $sm_av = 0;
            $pt_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 2]])->get();
            $pt_av = 0;
            $ew_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 3]])->get();
            $ew_av = 0;
            $ae_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 4]])->get();
            $ae_av = 0;
            $ca_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 5]])->get();
            $ca_av = 0;
            $mr_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 6]])->get();
            $mr_av = 0;
            $ec_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 7]])->get();
            $ec_av = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 8]])->get();
            $in_av = 0;

            //Rayuan
            // Rekabentuk borang NEW ROADS 
            $sm_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 1]])->get();
            $sm_td_r = 0;
            $pt_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 2]])->get();
            $pt_td_r = 0;
            $ew_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 3]])->get();
            $ew_td_r = 0;
            $ae_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 4]])->get();
            $ae_td_r = 0;
            $ca_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 5]])->get();
            $ca_td_r = 0;
            $mr_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 6]])->get();
            $mr_td_r = 0;
            $ec_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 7]])->get();
            $ec_td_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 8]])->get();
            $in_td_r = 0;
            $sm_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 1]])->get();
            $sm_ad_r = 0;
            $pt_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 2]])->get();
            $pt_ad_r = 0;
            $ew_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 3]])->get();
            $ew_ad_r = 0;
            $ae_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 4]])->get();
            $ae_ad_r = 0;
            $ca_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 5]])->get();
            $ca_ad_r = 0;
            $mr_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 6]])->get();
            $mr_ad_r = 0;
            $ec_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 7]])->get();
            $ec_ad_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 8]])->get();
            $in_ad_r = 0;

            // Verifikasi borang NEW ROADS D
            $sm_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 1]])->get();
            $sm_tv_r = 0;
            $pt_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 2]])->get();
            $pt_tv_r = 0;
            $ew_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 3]])->get();
            $ew_tv_r = 0;
            $ae_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 4]])->get();
            $ae_tv_r = 0;
            $ca_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 5]])->get();
            $ca_tv_r = 0;
            $mr_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 6]])->get();
            $mr_tv_r = 0;
            $ec_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 7]])->get();
            $ec_tv_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 8]])->get();
            $in_tv_r = 0;
            $sm_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 1]])->get();
            $sm_av_r = 0;
            $pt_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 2]])->get();
            $pt_av_r = 0;
            $ew_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 3]])->get();
            $ew_av_r = 0;
            $ae_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 4]])->get();
            $ae_av_r = 0;
            $ca_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 5]])->get();
            $ca_av_r = 0;
            $mr_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 6]])->get();
            $mr_av_r = 0;
            $ec_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 7]])->get();
            $ec_av_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'NEW ROADS'],['borang_seq','=', 8]])->get();
            $in_av_r = 0;
            
            
            foreach($sm_kriterias as $sm_kriteria) {                
                $markah_sm_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sm_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sm_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sm_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sm_td_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sm_ad_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sm_tv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sm_av_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_sm_td){
                    if($markah_sm_td->target_point > 0){
                        $sm_td += $markah_sm_td->target_point;
                    }
                } 
                if ($markah_sm_ad){
                    if($markah_sm_ad->assessment_point > 0){
                        $sm_ad += $markah_sm_ad->assessment_point;
                    }
                }
                if ($markah_sm_tv){
                    if($markah_sm_tv->target_point > 0){
                        $sm_tv += $markah_sm_tv->target_point;
                    }
                }
                if ($markah_sm_av){
                    if($markah_sm_av->assessment_point > 0){
                        $sm_av += $markah_sm_av->assessment_point;
                    }
                }
                if ($markah_sm_td_r){
                    if($markah_sm_td_r->target_point > 0){
                        $sm_td_r += $markah_sm_td_r->target_point;
                    }
                } 
                if ($markah_sm_ad_r){
                    if($markah_sm_ad_r->assessment_point > 0){
                        $sm_ad_r += $markah_sm_ad_r->assessment_point;
                    }
                }
                if ($markah_sm_tv_r){
                    if($markah_sm_tv_r->target_point > 0){
                        $sm_tv_r += $markah_sm_tv_r->target_point;
                    }
                }
                if ($markah_sm_av_r){
                    if($markah_sm_av_r->assessment_point > 0){
                        $sm_av_r += $markah_sm_av_r->assessment_point;
                    }
                }                   
                // dd($markah_sm_ad);              
            }  
            foreach($pt_kriterias as $pt_kriteria) {                
                $markah_pt_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pt_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pt_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pt_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pt_td_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pt_ad_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pt_tv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pt_av_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_pt_td){
                    if($markah_pt_td->target_point > 0){
                        $pt_td += $markah_pt_td->target_point;
                    }
                } 
                if ($markah_pt_ad){
                    if($markah_pt_ad->assessment_point > 0){
                        $pt_ad += $markah_pt_ad->assessment_point;
                    }
                }
                if ($markah_pt_tv){
                    if($markah_pt_tv->target_point > 0){
                        $pt_tv += $markah_pt_tv->target_point;
                    }
                }
                if ($markah_pt_av){
                    if($markah_pt_av->assessment_point > 0){
                        $pt_av += $markah_pt_av->assessment_point;
                    }
                } 
                if ($markah_pt_td_r){
                    if($markah_pt_td_r->target_point > 0){
                        $pt_td_r += $markah_pt_td_r->target_point;
                    }
                } 
                if ($markah_pt_ad_r){
                    if($markah_pt_ad_r->assessment_point > 0){
                        $pt_ad_r += $markah_pt_ad_r->assessment_point;
                    }
                }
                if ($markah_pt_tv_r){
                    if($markah_pt_tv_r->target_point > 0){
                        $pt_tv_r += $markah_pt_tv_r->target_point;
                    }
                }
                if ($markah_pt_av_r){
                    if($markah_pt_av_r->assessment_point > 0){
                        $pt_av_r += $markah_pt_av_r->assessment_point;
                    }
                }                               
            } 
            foreach($ew_kriterias as $ew_kriteria) {                
                $markah_ew_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_td_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_ad_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_tv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_av_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_ew_td){
                    if($markah_ew_td->target_point > 0){
                        $ew_td += $markah_ew_td->target_point;
                    }
                } 
                if ($markah_ew_ad){
                    if($markah_ew_ad->assessment_point > 0){
                        $ew_ad += $markah_ew_ad->assessment_point;
                    }
                } 
                if ($markah_ew_tv){
                    if($markah_ew_tv->target_point > 0){
                        $ew_tv += $markah_ew_tv->target_point;
                    }
                }  
                if ($markah_ew_av){
                    if($markah_ew_av->assessment_point > 0){
                        $ew_av += $markah_ew_av->assessment_point;
                    }
                }
                if ($markah_ew_td_r){
                    if($markah_ew_td_r->target_point > 0){
                        $ew_td_r += $markah_ew_td_r->target_point;
                    }
                } 
                if ($markah_ew_ad_r){
                    if($markah_ew_ad_r->assessment_point > 0){
                        $ew_ad_r += $markah_ew_ad_r->assessment_point;
                    }
                } 
                if ($markah_ew_tv_r){
                    if($markah_ew_tv_r->target_point > 0){
                        $ew_tv_r += $markah_ew_tv_r->target_point;
                    }
                }  
                if ($markah_ew_av_r){
                    if($markah_ew_av_r->assessment_point > 0){
                        $ew_av_r += $markah_ew_av_r->assessment_point;
                    }
                }                             
            } 
            foreach($ae_kriterias as $ae_kriteria) {                
                $markah_ae_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ae_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ae_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ae_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ae_td_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ae_ad_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ae_tv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ae_av_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_ae_td){
                    if($markah_ae_td->target_point > 0){
                        $ae_td += $markah_ae_td->target_point;
                    }
                } 
                if ($markah_ae_ad){
                    if($markah_ae_ad->assessment_point > 0){
                        $ae_ad += $markah_ae_ad->assessment_point;
                    }
                }
                if ($markah_ae_tv){
                    if($markah_ae_tv->target_point > 0){
                        $ae_tv += $markah_ae_tv->target_point;
                    }
                }  
                if ($markah_ae_av){
                    if($markah_ae_av->assessment_point > 0){
                        $ae_av += $markah_ae_av->assessment_point;
                    }
                }  
                if ($markah_ae_td_r){
                    if($markah_ae_td_r->target_point > 0){
                        $ae_td_r += $markah_ae_td_r->target_point;
                    }
                } 
                if ($markah_ae_ad_r){
                    if($markah_ae_ad_r->assessment_point > 0){
                        $ae_ad_r += $markah_ae_ad_r->assessment_point;
                    }
                }
                if ($markah_ae_tv_r){
                    if($markah_ae_tv_r->target_point > 0){
                        $ae_tv_r += $markah_ae_tv_r->target_point;
                    }
                }  
                if ($markah_ae_av_r){
                    if($markah_ae_av_r->assessment_point > 0){
                        $ae_av_r += $markah_ae_av_r->assessment_point;
                    }
                }                               
            }
            foreach($ca_kriterias as $ca_kriteria) {                
                $markah_ca_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ca_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ca_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ca_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ca_td_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ca_ad_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ca_tv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ca_av_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_ca_td){
                    if($markah_ca_td->target_point > 0){
                        $ca_td += $markah_ca_td->target_point;
                    }
                } 
                if ($markah_ca_ad){
                    if($markah_ca_ad->assessment_point > 0){
                        $ca_ad += $markah_ca_ad->assessment_point;
                    }
                }   
                if ($markah_ca_tv){
                    if($markah_ca_tv->target_point > 0){
                        $ca_tv += $markah_ca_tv->target_point;
                    }
                }  
                if ($markah_ca_av){
                    if($markah_ca_av->assessment_point > 0){
                        $ca_av += $markah_ca_av->assessment_point;
                    }
                } 
                if ($markah_ca_td_r){
                    if($markah_ca_td_r->target_point > 0){
                        $ca_td_r += $markah_ca_td_r->target_point;
                    }
                } 
                if ($markah_ca_ad_r){
                    if($markah_ca_ad_r->assessment_point > 0){
                        $ca_ad_r += $markah_ca_ad_r->assessment_point;
                    }
                }   
                if ($markah_ca_tv_r){
                    if($markah_ca_tv_r->target_point > 0){
                        $ca_tv_r += $markah_ca_tv_r->target_point;
                    }
                }  
                if ($markah_ca_av_r){
                    if($markah_ca_av_r->assessment_point > 0){
                        $ca_av_r += $markah_ca_av_r->assessment_point;
                    }
                }                             
            } 
            foreach($mr_kriterias as $mr_kriteria) {                
                $markah_mr_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mr_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mr_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mr_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mr_td_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mr_ad_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mr_tv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mr_av_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_mr_td){
                    if($markah_mr_td->target_point > 0){
                        $mr_td += $markah_mr_td->target_point;
                    }
                } 
                if ($markah_mr_ad){
                    if($markah_mr_ad->assessment_point > 0){
                        $mr_ad += $markah_mr_ad->assessment_point;
                    }
                }    
                if ($markah_mr_tv){
                    if($markah_mr_tv->target_point > 0){
                        $mr_tv += $markah_mr_tv->target_point;
                    }
                }  
                if ($markah_mr_av){
                    if($markah_mr_av->assessment_point > 0){
                        $mr_av += $markah_mr_av->assessment_point;
                    }
                }
                if ($markah_mr_td_r){
                    if($markah_mr_td_r->target_point > 0){
                        $mr_td_r += $markah_mr_td_r->target_point;
                    }
                } 
                if ($markah_mr_ad_r){
                    if($markah_mr_ad_r->assessment_point > 0){
                        $mr_ad_r += $markah_mr_ad_r->assessment_point;
                    }
                }    
                if ($markah_mr_tv_r){
                    if($markah_mr_tv_r->target_point > 0){
                        $mr_tv_r += $markah_mr_tv_r->target_point;
                    }
                }  
                if ($markah_mr_av_r){
                    if($markah_mr_av_r->assessment_point > 0){
                        $mr_av_r += $markah_mr_av_r->assessment_point;
                    }
                }                             
            }
            foreach($ec_kriterias as $ec_kriteria) {                
                $markah_ec_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ec_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ec_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ec_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ec_td_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ec_ad_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ec_tv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ec_av_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_ec_td){
                    if($markah_ec_td->target_point > 0){
                        $ec_td += $markah_ec_td->target_point;
                    }
                } 
                if ($markah_ec_ad){
                    if($markah_ec_ad->assessment_point > 0){
                        $ec_ad += $markah_ec_ad->assessment_point;
                    }
                }
                if ($markah_ec_tv){
                    if($markah_ec_tv->target_point > 0){
                        $ec_tv += $markah_ec_tv->target_point;
                    }
                }  
                if ($markah_ec_av){
                    if($markah_ec_av->assessment_point > 0){
                        $ec_av += $markah_ec_av->assessment_point;
                    }
                }
                if ($markah_ec_td_r){
                    if($markah_ec_td_r->target_point > 0){
                        $ec_td_r += $markah_ec_td_r->target_point;
                    }
                } 
                if ($markah_ec_ad_r){
                    if($markah_ec_ad_r->assessment_point > 0){
                        $ec_ad_r += $markah_ec_ad_r->assessment_point;
                    }
                }
                if ($markah_ec_tv_r){
                    if($markah_ec_tv_r->target_point > 0){
                        $ec_tv_r += $markah_ec_tv_r->target_point;
                    }
                }  
                if ($markah_ec_av_r){
                    if($markah_ec_av_r->assessment_point > 0){
                        $ec_av_r += $markah_ec_av_r->assessment_point;
                    }
                }                                 
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_td_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_ad_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_tv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_av_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_in_td){
                    if($markah_in_td->target_point > 0){
                        $in_td += $markah_in_td->target_point;
                    }
                } 
                if ($markah_in_ad){
                    if($markah_in_ad->assessment_point > 0){
                        $in_ad += $markah_in_ad->assessment_point;
                    }
                }
                if ($markah_in_tv){
                    if($markah_in_tv->target_point > 0){
                        $in_tv += $markah_in_tv->target_point;
                    }
                }  
                if ($markah_in_av){
                    if($markah_in_av->assessment_point > 0){
                        $in_av += $markah_in_av->assessment_point;
                    }
                }
                if ($markah_in_td_r){
                    if($markah_in_td_r->target_point > 0){
                        $in_td_r += $markah_in_td_r->target_point;
                    }
                } 
                if ($markah_in_ad_r){
                    if($markah_in_ad_r->assessment_point > 0){
                        $in_ad_r += $markah_in_ad_r->assessment_point;
                    }
                }
                if ($markah_in_tv_r){
                    if($markah_in_tv_r->target_point > 0){
                        $in_tv_r += $markah_in_tv_r->target_point;
                    }
                }  
                if ($markah_in_av_r){
                    if($markah_in_av_r->assessment_point > 0){
                        $in_av_r += $markah_in_av_r->assessment_point;
                    }
                }                                 
            }                               
             
            //Rekabentuk Design
            $totalcp_td = $sm_td + $pt_td + $ew_td + $ae_td + $ca_td + $mr_td; 
            $totaleip_td = $ec_td + $in_td;
            $totalcp_ad = $sm_ad + $pt_ad + $ew_ad + $ae_ad + $ca_ad + $mr_ad; 
            $totaleip_ad = $ec_ad + $in_ad;

            //Verifikasi
            $totalcp_tv = $sm_tv + $pt_tv + $ew_tv + $ae_tv + $ca_tv + $mr_tv;
            $totaleip_tv = $ec_tv + $in_tv;
            $totalcp_av = $sm_av + $pt_av + $ew_av + $ae_av + $ca_av + $mr_av; 
            $totaleip_av = $ec_av + $in_av;

            //Rayuan
            //Rekabentuk Design
            $totalcp_td_r = $sm_td_r + $pt_td_r + $ew_td_r + $ae_td_r + $ca_td_r + $mr_td_r; 
            $totaleip_td_r = $ec_td_r + $in_td_r;
            $totalcp_ad_r = $sm_ad_r + $pt_ad_r + $ew_ad_r + $ae_ad_r + $ca_ad_r + $mr_ad_r; 
            $totaleip_ad_r = $ec_ad_r + $in_ad_r;

            //Verifikasi
            $totalcp_tv_r = $sm_tv_r + $pt_tv_r + $ew_tv_r + $ae_tv_r + $ca_tv_r + $mr_tv_r;
            $totaleip_tv_r = $ec_tv_r + $in_tv_r;
            $totalcp_av_r = $sm_av_r + $pt_av_r + $ew_av_r + $ae_av_r + $ca_av_r + $mr_av_r; 
            $totaleip_av_r = $ec_av_r + $in_av_r;


            //Total Core Point (Target Summary Design)
            $final_score = $totalcp_td / 68 * 0.85 + ($totaleip_td + $totaleip_ad + $totaleip_tv + $totaleip_av);
            if($final_score >=85){
                $bintang_fs = 5;
                $bintang_fss = 'GLOBAL EXCELLENCE';
            } elseif($final_score >=70 && $final_score < 84){
                $bintang_fs = 4;
                $bintang_fss = 'NATIONAL EXCELLENCE';
            } elseif($final_score >= 50 && $final_score < 69){
                $bintang_fs = 3;
                $bintang_fss = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score >=41 && $final_score < 49){
                $bintang_fs = 2;
                $bintang_fss = 'POTENTIAL RECOGNITION';
            } elseif($final_score < 40){
                $bintang_fs = 0;
                $bintang_fss = 'NO RECOGNITION';
            }

            //Total Core Point (Target Summary Verification)
            $final_score2 = $totalcp_tv / 68 * 0.85 + ($totaleip_td + $totaleip_ad + $totaleip_tv + $totaleip_av);
            if($final_score2 >=85){
                $bintang_fs2 = 5;
                $bintang_fss2 = 'GLOBAL EXCELLENCE';
            } elseif($final_score2 >=70 && $final_score2 < 84){
                $bintang_fs2 = 4;
                $bintang_fss2 = 'NATIONAL EXCELLENCE';
            } elseif($final_score2 >= 50 && $final_score2 < 69){
                $bintang_fs2 = 3;
                $bintang_fss2 = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score2 >=41 && $final_score2 < 49){
                $bintang_fs2 = 2;
                $bintang_fss2 = 'POTENTIAL RECOGNITION';
            } elseif($final_score2 < 40){
                $bintang_fs2 = 0;
                $bintang_fss2 = 'NO RECOGNITION';
            }

            //Design Assessment 
            $final_score3 = $totalcp_ad / 68 * 0.85 + ($totaleip_td + $totaleip_ad + $totaleip_tv + $totaleip_av);
            if($final_score3 >=85){
                $bintang_fs3 = 5;
                $bintang_fss3 = 'GLOBAL EXCELLENCE';
            } elseif($final_score3 >=70 && $final_score3 < 84){
                $bintang_fs3 = 4;
                $bintang_fss3 = 'NATIONAL EXCELLENCE';
            } elseif($final_score3 >= 50 && $final_score3 < 69){
                $bintang_fs3 = 3;
                $bintang_fss3 = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score3 >=40 && $final_score3 < 49){
                $bintang_fs3 = 2;
                $bintang_fss3 = 'POTENTIAL RECOGNITION';
            } else {
                $bintang_fs3 = 0;
                $bintang_fss3 = 'NO RECOGNITION';
            }
            
            //Verification Assessment 
            $final_score4 = $totalcp_av / 68 * 0.85 + ($totaleip_td + $totaleip_ad + $totaleip_tv + $totaleip_av);
            if($final_score4 >=85){
                $bintang_fs4 = 5;
                $bintang_fss4 = 'GLOBAL EXCELLENCE';
            } elseif($final_score4 >=70 && $final_score4 < 84){
                $bintang_fs4 = 4;
                $bintang_fss4 = 'NATIONAL EXCELLENCE';
            } elseif($final_score4 >= 50 && $final_score4 < 69){
                $bintang_fs4 = 3;
                $bintang_fss4 = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score4 >=40 && $final_score4 < 49){
                $bintang_fs4 = 2;
                $bintang_fss4 = 'POTENTIAL RECOGNITION';
            } else {
                $bintang_fs4 = 0;
                $bintang_fss4 = 'NO RECOGNITION';
            }

            //Rayuan
            //Total Core Point (Target Summary Design)
            $final_score_r = $totalcp_td_r / 68 * 0.85 + ($totaleip_td_r + $totaleip_ad_r + $totaleip_tv_r + $totaleip_av_r);
            if($final_score_r >=85){
                $bintang_fs_r = 5;
                $bintang_fss_r = 'GLOBAL EXCELLENCE';
            } elseif($final_score_r >=70 && $final_score_r < 84){
                $bintang_fs_r = 4;
                $bintang_fss_r = 'NATIONAL EXCELLENCE';
            } elseif($final_score_r >= 50 && $final_score_r < 69){
                $bintang_fs_r = 3;
                $bintang_fss_r = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score_r >=41 && $final_score_r < 49){
                $bintang_fs_r = 2;
                $bintang_fss_r = 'POTENTIAL RECOGNITION';
            } elseif($final_score_r < 40){
                $bintang_fs_r = 0;
                $bintang_fss_r = 'NO RECOGNITION';
            }

            //Total Core Point (Target Summary Verification)
            $final_score2_r = $totalcp_tv_r / 68 * 0.85 + ($totaleip_td_r + $totaleip_ad_r + $totaleip_tv_r + $totaleip_av_r);
            if($final_score2_r >=85){
                $bintang_fs2_r = 5;
                $bintang_fss2_r = 'GLOBAL EXCELLENCE';
            } elseif($final_score2_r >=70 && $final_score2_r < 84){
                $bintang_fs2_r = 4;
                $bintang_fss2_r = 'NATIONAL EXCELLENCE';
            } elseif($final_score2_r >= 50 && $final_score2_r < 69){
                $bintang_fs2_r = 3;
                $bintang_fss2_r = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score2_r >=41 && $final_score2_r < 49){
                $bintang_fs2_r = 2;
                $bintang_fss2_r = 'POTENTIAL RECOGNITION';
            } elseif($final_score2_r < 40){
                $bintang_fs2_r = 0;
                $bintang_fss2_r = 'NO RECOGNITION';
            }

            //Design Assessment 
            $final_score3_r = $totalcp_ad_r / 68 * 0.85 + ($totaleip_td_r + $totaleip_ad_r + $totaleip_tv_r + $totaleip_av_r);
            if($final_score3_r >=85){
                $bintang_fs3_r = 5;
                $bintang_fss3_r = 'GLOBAL EXCELLENCE';
            } elseif($final_score3_r >=70 && $final_score3_r < 84){
                $bintang_fs3_r = 4;
                $bintang_fss3_r = 'NATIONAL EXCELLENCE';
            } elseif($final_score3_r >= 50 && $final_score3_r < 69){
                $bintang_fs3_r = 3;
                $bintang_fss3_r = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score3_r >=40 && $final_score3_r < 49){
                $bintang_fs3_r = 2;
                $bintang_fss3_r = 'POTENTIAL RECOGNITION';
            } else {
                $bintang_fs3_r = 0;
                $bintang_fss3_r = 'NO RECOGNITION';
            }
            
            //Verification Assessment 
            $final_score4_r = $totalcp_av_r / 68 * 0.85 + ($totaleip_td_r + $totaleip_ad_r + $totaleip_tv_r + $totaleip_av_r);
            if($final_score4_r >=85){
                $bintang_fs4_r = 5;
                $bintang_fss4_r = 'GLOBAL EXCELLENCE';
            } elseif($final_score4_r >=70 && $final_score4_r < 84){
                $bintang_fs4_r = 4;
                $bintang_fss4_r = 'NATIONAL EXCELLENCE';
            } elseif($final_score4_r >= 50 && $final_score4_r < 69){
                $bintang_fs4_r = 3;
                $bintang_fss4_r = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score4_r >=40 && $final_score4_r < 49){
                $bintang_fs4_r = 2;
                $bintang_fss4_r = 'POTENTIAL RECOGNITION';
            } else {
                $bintang_fs4_r = 0;
                $bintang_fss4_r = 'NO RECOGNITION';
            }

            // dd($sm_td_r);
    

            return view('projek.satu_eph_jalan_baru', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'rayuan_rekabentuk_kriterias', 'rayuan_verifikasi_kriterias', 'users', 'lantikans',
            'totalcp_td', 'totaleip_td', 'totalcp_ad', 'totalcp_av','totaleip_ad', 'totaleip_ad', 'totalcp_tv', 'totaleip_ad', 'totaleip_av', 'totaleip_tv', 
            'sm_td', 'pt_td', 'ew_td', 'ae_td', 'ca_td', 'mr_td', 'ec_td', 'in_td' ,'sm_ad', 'pt_ad', 'ew_ad', 'ae_ad', 'ca_ad', 'mr_ad', 'ec_ad', 'in_ad', 'sm_tv', 'sm_av', 'pt_tv', 
            'pt_av', 'ew_tv', 'ew_av', 'ae_tv', 'ae_av', 'ca_tv', 'ca_av','mr_av', 'mr_tv', 'ec_tv', 'ec_av', 'in_td', 'in_ad', 'in_tv', 'in_av', 
            'final_score', 'bintang_fs', 'bintang_fss', 'final_score2', 'final_score3', 'final_score4', 'bintang_fss3', 'bintang_fss2', 'bintang_fss4', 'bintang_fs4',
            'totalcp_td_r', 'totaleip_td_r', 'totalcp_ad_r', 'totalcp_av_r','totaleip_ad_r', 'totaleip_ad_r', 'totalcp_tv_r', 'totaleip_ad_r', 'totaleip_av_r', 'totaleip_tv_r', 
            'sm_td_r', 'pt_td_r', 'ew_td_r', 'ae_td_r', 'ca_td_r', 'mr_td_r', 'ec_td_r', 'in_td_r' ,'sm_ad_r', 'pt_ad_r', 'ew_ad_r', 'ae_ad_r', 'ca_ad_r', 'mr_ad_r', 'ec_ad_r', 'sm_tv_r', 'sm_av_r', 'pt_tv_r', 
            'pt_av_r', 'ew_tv_r', 'ew_av_r', 'ae_tv_r', 'ae_av_r', 'ca_tv_r', 'ca_av_r','mr_av_r', 'mr_tv_r', 'ec_tv_r', 'ec_av_r', 'in_td_r', 'in_ad_r', 'in_tv_r', 'in_av_r', 
            'final_score_r', 'bintang_fs_r', 'bintang_fss_r', 'final_score2_r', 'final_score3_r', 'final_score4_r', 'bintang_fss3_r', 'bintang_fss2_r', 'bintang_fss4_r', 'bintang_fs4_r'
        )); 
        } elseif ($projek->kategori ==  'phJKR Jalan Naiktaraf') {
            // $kriterias = Kriteria::where('borang', 'UPGRADING ROADS')->get();
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'UPGRADING ROADS'],
                ['fasa','=', 'rekabentuk'],
            ])->get();    

            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'UPGRADING ROADS'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $rayuan_rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'UPGRADING ROADS'],
                ['fasa', '=', 'rekabentuk']
            ])->get();
            
            $rayuan_verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'UPGRADING ROADS'],
                ['fasa', '=', 'verifikasi']
            ])->get(); 
            
            // Rekabentuk borang UPGRADING ROADS
            $sm_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 1]])->get();
            $sm_td = 0;
            $pt_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 2]])->get();
            $pt_td = 0;
            $ew_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 3]])->get();
            $ew_td = 0;
            $ae_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 4]])->get();
            $ae_td = 0;
            $ca_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 5]])->get();
            $ca_td = 0;
            $mr_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 6]])->get();
            $mr_td = 0;
            $ec_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 7]])->get();
            $ec_td = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 8]])->get();
            $in_td = 0;
            $sm_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 1]])->get();
            $sm_ad = 0;
            $pt_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 2]])->get();
            $pt_ad = 0;
            $ew_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 3]])->get();
            $ew_ad = 0;
            $ae_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 4]])->get();
            $ae_ad = 0;
            $ca_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 5]])->get();
            $ca_ad = 0;
            $mr_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 6]])->get();
            $mr_ad = 0;
            $ec_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 7]])->get();
            $ec_ad = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 8]])->get();
            $in_ad = 0;

            // Verifikasi borang UPGRADING ROADS
            $sm_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 1]])->get();
            $sm_tv = 0;
            $pt_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 2]])->get();
            $pt_tv = 0;
            $ew_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 3]])->get();
            $ew_tv = 0;
            $ae_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 4]])->get();
            $ae_tv = 0;
            $ca_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 5]])->get();
            $ca_tv = 0;
            $mr_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 6]])->get();
            $mr_tv = 0;
            $ec_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 7]])->get();
            $ec_tv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 8]])->get();
            $in_tv = 0;
            $sm_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 1]])->get();
            $sm_av = 0;
            $pt_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 2]])->get();
            $pt_av = 0;
            $ew_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 3]])->get();
            $ew_av = 0;
            $ae_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 4]])->get();
            $ae_av = 0;
            $ca_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 5]])->get();
            $ca_av = 0;
            $mr_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 6]])->get();
            $mr_av = 0;
            $ec_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 7]])->get();
            $ec_av = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 8]])->get();
            $in_av = 0;
            
            //Rayuan
            // Rekabentuk borang UPGRADING ROADS 
            $sm_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 1]])->get();
            $sm_td_r = 0;
            $pt_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 2]])->get();
            $pt_td_r = 0;
            $ew_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 3]])->get();
            $ew_td_r = 0;
            $ae_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 4]])->get();
            $ae_td_r = 0;
            $ca_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 5]])->get();
            $ca_td_r = 0;
            $mr_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 6]])->get();
            $mr_td_r = 0;
            $ec_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 7]])->get();
            $ec_td_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 8]])->get();
            $in_td_r = 0;
            $sm_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 1]])->get();
            $sm_ad_r = 0;
            $pt_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 2]])->get();
            $pt_ad_r = 0;
            $ew_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 3]])->get();
            $ew_ad_r = 0;
            $ae_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 4]])->get();
            $ae_ad_r = 0;
            $ca_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 5]])->get();
            $ca_ad_r = 0;
            $mr_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 6]])->get();
            $mr_ad_r = 0;
            $ec_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 7]])->get();
            $ec_ad_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 8]])->get();
            $in_ad_r = 0;

            // Verifikasi borang UPGRADING ROADS D
            $sm_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 1]])->get();
            $sm_tv_r = 0;
            $pt_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 2]])->get();
            $pt_tv_r = 0;
            $ew_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 3]])->get();
            $ew_tv_r = 0;
            $ae_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 4]])->get();
            $ae_tv_r = 0;
            $ca_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 5]])->get();
            $ca_tv_r = 0;
            $mr_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 6]])->get();
            $mr_tv_r = 0;
            $ec_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 7]])->get();
            $ec_tv_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 8]])->get();
            $in_tv_r = 0;
            $sm_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 1]])->get();
            $sm_av_r = 0;
            $pt_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 2]])->get();
            $pt_av_r = 0;
            $ew_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 3]])->get();
            $ew_av_r = 0;
            $ae_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 4]])->get();
            $ae_av_r = 0;
            $ca_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 5]])->get();
            $ca_av_r = 0;
            $mr_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 6]])->get();
            $mr_av_r = 0;
            $ec_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 7]])->get();
            $ec_av_r = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'UPGRADING ROADS'],['borang_seq','=', 8]])->get();
            $in_av_r = 0;
            
            
            foreach($sm_kriterias as $sm_kriteria) {                
                $markah_sm_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sm_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sm_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sm_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sm_td_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sm_ad_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sm_tv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sm_av_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_sm_td){
                    if($markah_sm_td->target_point > 0){
                        $sm_td += $markah_sm_td->target_point;
                    }
                } 
                if ($markah_sm_ad){
                    if($markah_sm_ad->assessment_point > 0){
                        $sm_ad += $markah_sm_ad->assessment_point;
                    }
                }
                if ($markah_sm_tv){
                    if($markah_sm_tv->target_point > 0){
                        $sm_tv += $markah_sm_tv->target_point;
                    }
                }
                if ($markah_sm_av){
                    if($markah_sm_av->assessment_point > 0){
                        $sm_av += $markah_sm_av->assessment_point;
                    }
                }
                if ($markah_sm_td_r){
                    if($markah_sm_td_r->target_point > 0){
                        $sm_td_r += $markah_sm_td_r->target_point;
                    }
                } 
                if ($markah_sm_ad_r){
                    if($markah_sm_ad_r->assessment_point > 0){
                        $sm_ad_r += $markah_sm_ad_r->assessment_point;
                    }
                }
                if ($markah_sm_tv_r){
                    if($markah_sm_tv_r->target_point > 0){
                        $sm_tv_r += $markah_sm_tv_r->target_point;
                    }
                }
                if ($markah_sm_av_r){
                    if($markah_sm_av_r->assessment_point > 0){
                        $sm_av_r += $markah_sm_av_r->assessment_point;
                    }
                }                   
                // dd($markah_sm_ad);              
            }  
            foreach($pt_kriterias as $pt_kriteria) {                
                $markah_pt_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pt_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pt_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pt_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pt_td_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pt_ad_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pt_tv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pt_av_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_pt_td){
                    if($markah_pt_td->target_point > 0){
                        $pt_td += $markah_pt_td->target_point;
                    }
                } 
                if ($markah_pt_ad){
                    if($markah_pt_ad->assessment_point > 0){
                        $pt_ad += $markah_pt_ad->assessment_point;
                    }
                }
                if ($markah_pt_tv){
                    if($markah_pt_tv->target_point > 0){
                        $pt_tv += $markah_pt_tv->target_point;
                    }
                }
                if ($markah_pt_av){
                    if($markah_pt_av->assessment_point > 0){
                        $pt_av += $markah_pt_av->assessment_point;
                    }
                } 
                if ($markah_pt_td_r){
                    if($markah_pt_td_r->target_point > 0){
                        $pt_td_r += $markah_pt_td_r->target_point;
                    }
                } 
                if ($markah_pt_ad_r){
                    if($markah_pt_ad_r->assessment_point > 0){
                        $pt_ad_r += $markah_pt_ad_r->assessment_point;
                    }
                }
                if ($markah_pt_tv_r){
                    if($markah_pt_tv_r->target_point > 0){
                        $pt_tv_r += $markah_pt_tv_r->target_point;
                    }
                }
                if ($markah_pt_av_r){
                    if($markah_pt_av_r->assessment_point > 0){
                        $pt_av_r += $markah_pt_av_r->assessment_point;
                    }
                }                               
            } 
            foreach($ew_kriterias as $ew_kriteria) {                
                $markah_ew_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_td_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_ad_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_tv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_av_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_ew_td){
                    if($markah_ew_td->target_point > 0){
                        $ew_td += $markah_ew_td->target_point;
                    }
                } 
                if ($markah_ew_ad){
                    if($markah_ew_ad->assessment_point > 0){
                        $ew_ad += $markah_ew_ad->assessment_point;
                    }
                } 
                if ($markah_ew_tv){
                    if($markah_ew_tv->target_point > 0){
                        $ew_tv += $markah_ew_tv->target_point;
                    }
                }  
                if ($markah_ew_av){
                    if($markah_ew_av->assessment_point > 0){
                        $ew_av += $markah_ew_av->assessment_point;
                    }
                }
                if ($markah_ew_td_r){
                    if($markah_ew_td_r->target_point > 0){
                        $ew_td_r += $markah_ew_td_r->target_point;
                    }
                } 
                if ($markah_ew_ad_r){
                    if($markah_ew_ad_r->assessment_point > 0){
                        $ew_ad_r += $markah_ew_ad_r->assessment_point;
                    }
                } 
                if ($markah_ew_tv_r){
                    if($markah_ew_tv_r->target_point > 0){
                        $ew_tv_r += $markah_ew_tv_r->target_point;
                    }
                }  
                if ($markah_ew_av_r){
                    if($markah_ew_av_r->assessment_point > 0){
                        $ew_av_r += $markah_ew_av_r->assessment_point;
                    }
                }                             
            } 
            foreach($ae_kriterias as $ae_kriteria) {                
                $markah_ae_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ae_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ae_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ae_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ae_td_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ae_ad_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ae_tv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ae_av_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_ae_td){
                    if($markah_ae_td->target_point > 0){
                        $ae_td += $markah_ae_td->target_point;
                    }
                } 
                if ($markah_ae_ad){
                    if($markah_ae_ad->assessment_point > 0){
                        $ae_ad += $markah_ae_ad->assessment_point;
                    }
                }
                if ($markah_ae_tv){
                    if($markah_ae_tv->target_point > 0){
                        $ae_tv += $markah_ae_tv->target_point;
                    }
                }  
                if ($markah_ae_av){
                    if($markah_ae_av->assessment_point > 0){
                        $ae_av += $markah_ae_av->assessment_point;
                    }
                }  
                if ($markah_ae_td_r){
                    if($markah_ae_td_r->target_point > 0){
                        $ae_td_r += $markah_ae_td_r->target_point;
                    }
                } 
                if ($markah_ae_ad_r){
                    if($markah_ae_ad_r->assessment_point > 0){
                        $ae_ad_r += $markah_ae_ad_r->assessment_point;
                    }
                }
                if ($markah_ae_tv_r){
                    if($markah_ae_tv_r->target_point > 0){
                        $ae_tv_r += $markah_ae_tv_r->target_point;
                    }
                }  
                if ($markah_ae_av_r){
                    if($markah_ae_av_r->assessment_point > 0){
                        $ae_av_r += $markah_ae_av_r->assessment_point;
                    }
                }                               
            }
            foreach($ca_kriterias as $ca_kriteria) {                
                $markah_ca_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ca_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ca_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ca_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ca_td_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ca_ad_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ca_tv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ca_av_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_ca_td){
                    if($markah_ca_td->target_point > 0){
                        $ca_td += $markah_ca_td->target_point;
                    }
                } 
                if ($markah_ca_ad){
                    if($markah_ca_ad->assessment_point > 0){
                        $ca_ad += $markah_ca_ad->assessment_point;
                    }
                }   
                if ($markah_ca_tv){
                    if($markah_ca_tv->target_point > 0){
                        $ca_tv += $markah_ca_tv->target_point;
                    }
                }  
                if ($markah_ca_av){
                    if($markah_ca_av->assessment_point > 0){
                        $ca_av += $markah_ca_av->assessment_point;
                    }
                } 
                if ($markah_ca_td_r){
                    if($markah_ca_td_r->target_point > 0){
                        $ca_td_r += $markah_ca_td_r->target_point;
                    }
                } 
                if ($markah_ca_ad_r){
                    if($markah_ca_ad_r->assessment_point > 0){
                        $ca_ad_r += $markah_ca_ad_r->assessment_point;
                    }
                }   
                if ($markah_ca_tv_r){
                    if($markah_ca_tv_r->target_point > 0){
                        $ca_tv_r += $markah_ca_tv_r->target_point;
                    }
                }  
                if ($markah_ca_av_r){
                    if($markah_ca_av_r->assessment_point > 0){
                        $ca_av_r += $markah_ca_av_r->assessment_point;
                    }
                }                             
            } 
            foreach($mr_kriterias as $mr_kriteria) {                
                $markah_mr_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mr_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mr_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mr_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mr_td_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mr_ad_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mr_tv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mr_av_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_mr_td){
                    if($markah_mr_td->target_point > 0){
                        $mr_td += $markah_mr_td->target_point;
                    }
                } 
                if ($markah_mr_ad){
                    if($markah_mr_ad->assessment_point > 0){
                        $mr_ad += $markah_mr_ad->assessment_point;
                    }
                }    
                if ($markah_mr_tv){
                    if($markah_mr_tv->target_point > 0){
                        $mr_tv += $markah_mr_tv->target_point;
                    }
                }  
                if ($markah_mr_av){
                    if($markah_mr_av->assessment_point > 0){
                        $mr_av += $markah_mr_av->assessment_point;
                    }
                }
                if ($markah_mr_td_r){
                    if($markah_mr_td_r->target_point > 0){
                        $mr_td_r += $markah_mr_td_r->target_point;
                    }
                } 
                if ($markah_mr_ad_r){
                    if($markah_mr_ad_r->assessment_point > 0){
                        $mr_ad_r += $markah_mr_ad_r->assessment_point;
                    }
                }    
                if ($markah_mr_tv_r){
                    if($markah_mr_tv_r->target_point > 0){
                        $mr_tv_r += $markah_mr_tv_r->target_point;
                    }
                }  
                if ($markah_mr_av_r){
                    if($markah_mr_av_r->assessment_point > 0){
                        $mr_av_r += $markah_mr_av_r->assessment_point;
                    }
                }                             
            }
            foreach($ec_kriterias as $ec_kriteria) {                
                $markah_ec_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ec_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ec_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ec_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ec_td_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ec_ad_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ec_tv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ec_av_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_ec_td){
                    if($markah_ec_td->target_point > 0){
                        $ec_td += $markah_ec_td->target_point;
                    }
                } 
                if ($markah_ec_ad){
                    if($markah_ec_ad->assessment_point > 0){
                        $ec_ad += $markah_ec_ad->assessment_point;
                    }
                }
                if ($markah_ec_tv){
                    if($markah_ec_tv->target_point > 0){
                        $ec_tv += $markah_ec_tv->target_point;
                    }
                }  
                if ($markah_ec_av){
                    if($markah_ec_av->assessment_point > 0){
                        $ec_av += $markah_ec_av->assessment_point;
                    }
                }
                if ($markah_ec_td_r){
                    if($markah_ec_td_r->target_point > 0){
                        $ec_td_r += $markah_ec_td_r->target_point;
                    }
                } 
                if ($markah_ec_ad_r){
                    if($markah_ec_ad_r->assessment_point > 0){
                        $ec_ad_r += $markah_ec_ad_r->assessment_point;
                    }
                }
                if ($markah_ec_tv_r){
                    if($markah_ec_tv_r->target_point > 0){
                        $ec_tv_r += $markah_ec_tv_r->target_point;
                    }
                }  
                if ($markah_ec_av_r){
                    if($markah_ec_av_r->assessment_point > 0){
                        $ec_av_r += $markah_ec_av_r->assessment_point;
                    }
                }                                 
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_td_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ad_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_tv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_av_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_in_td){
                    if($markah_in_td->target_point > 0){
                        $in_td += $markah_in_td->target_point;
                    }
                } 
                if ($markah_in_ad){
                    if($markah_in_ad->assessment_point > 0){
                        $in_ad += $markah_in_ad->assessment_point;
                    }
                }
                if ($markah_in_tv){
                    if($markah_in_tv->target_point > 0){
                        $in_tv += $markah_in_tv->target_point;
                    }
                }  
                if ($markah_in_av){
                    if($markah_in_av->assessment_point > 0){
                        $in_av += $markah_in_av->assessment_point;
                    }
                }
                if ($markah_in_td_r){
                    if($markah_in_td_r->target_point > 0){
                        $in_td_r += $markah_in_td_r->target_point;
                    }
                } 
                if ($markah_in_ad_r){
                    if($markah_in_ad_r->assessment_point > 0){
                        $in_ad_r += $markah_in_ad_r->assessment_point;
                    }
                }
                if ($markah_in_tv_r){
                    if($markah_in_tv_r->target_point > 0){
                        $in_tv_r += $markah_in_tv_r->target_point;
                    }
                }  
                if ($markah_in_av_r){
                    if($markah_in_av_r->assessment_point > 0){
                        $in_av_r += $markah_in_av_r->assessment_point;
                    }
                }                                 
            }                               
             
            //Rekabentuk Design
            $totalcp_td = $sm_td + $pt_td + $ew_td + $ae_td + $ca_td + $mr_td; 
            $totaleip_td = $ec_td + $in_td;
            $totalcp_ad = $sm_ad + $pt_ad + $ew_ad + $ae_ad + $ca_ad + $mr_ad; 
            $totaleip_ad = $ec_ad + $in_ad;

            //Verifikasi
            $totalcp_tv = $sm_tv + $pt_tv + $ew_tv + $ae_tv + $ca_tv + $mr_tv;
            $totaleip_tv = $ec_tv + $in_tv;
            $totalcp_av = $sm_av + $pt_av + $ew_av + $ae_av + $ca_av + $mr_av; 
            $totaleip_av = $ec_av + $in_av;

            //Rayuan
            //Rekabentuk Design
            $totalcp_td_r = $sm_td_r + $pt_td_r + $ew_td_r + $ae_td_r + $ca_td_r + $mr_td_r; 
            $totaleip_td_r = $ec_td_r + $in_td_r;
            $totalcp_ad_r = $sm_ad_r + $pt_ad_r + $ew_ad_r + $ae_ad_r + $ca_ad_r + $mr_ad_r; 
            $totaleip_ad_r = $ec_ad_r + $in_ad_r;

            //Verifikasi
            $totalcp_tv_r = $sm_tv_r + $pt_tv_r + $ew_tv_r + $ae_tv_r + $ca_tv_r + $mr_tv_r;
            $totaleip_tv_r = $ec_tv_r + $in_tv_r;
            $totalcp_av_r = $sm_av_r + $pt_av_r + $ew_av_r + $ae_av_r + $ca_av_r + $mr_av_r; 
            $totaleip_av_r = $ec_av_r + $in_av_r;


            //Total Core Point (Target Summary Design)
            $final_score = $totalcp_td / 68 * 0.85 + ($totaleip_td + $totaleip_ad + $totaleip_tv + $totaleip_av);
            if($final_score >=85){
                $bintang_fs = 5;
                $bintang_fss = 'GLOBAL EXCELLENCE';
            } elseif($final_score >=70 && $final_score < 84){
                $bintang_fs = 4;
                $bintang_fss = 'NATIONAL EXCELLENCE';
            } elseif($final_score >= 50 && $final_score < 69){
                $bintang_fs = 3;
                $bintang_fss = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score >=41 && $final_score < 49){
                $bintang_fs = 2;
                $bintang_fss = 'POTENTIAL RECOGNITION';
            } elseif($final_score < 40){
                $bintang_fs = 0;
                $bintang_fss = 'NO RECOGNITION';
            }

            //Total Core Point (Target Summary Verification)
            $final_score2 = $totalcp_tv / 68 * 0.85 + ($totaleip_td + $totaleip_ad + $totaleip_tv + $totaleip_av);
            if($final_score2 >=85){
                $bintang_fs2 = 5;
                $bintang_fss2 = 'GLOBAL EXCELLENCE';
            } elseif($final_score2 >=70 && $final_score2 < 84){
                $bintang_fs2 = 4;
                $bintang_fss2 = 'NATIONAL EXCELLENCE';
            } elseif($final_score2 >= 50 && $final_score2 < 69){
                $bintang_fs2 = 3;
                $bintang_fss2 = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score2 >=41 && $final_score2 < 49){
                $bintang_fs2 = 2;
                $bintang_fss2 = 'POTENTIAL RECOGNITION';
            } elseif($final_score2 < 40){
                $bintang_fs2 = 0;
                $bintang_fss2 = 'NO RECOGNITION';
            }

            //Design Assessment 
            $final_score3 = $totalcp_ad / 68 * 0.85 + ($totaleip_td + $totaleip_ad + $totaleip_tv + $totaleip_av);
            if($final_score3 >=85){
                $bintang_fs3 = 5;
                $bintang_fss3 = 'GLOBAL EXCELLENCE';
            } elseif($final_score3 >=70 && $final_score3 < 84){
                $bintang_fs3 = 4;
                $bintang_fss3 = 'NATIONAL EXCELLENCE';
            } elseif($final_score3 >= 50 && $final_score3 < 69){
                $bintang_fs3 = 3;
                $bintang_fss3 = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score3 >=40 && $final_score3 < 49){
                $bintang_fs3 = 2;
                $bintang_fss3 = 'POTENTIAL RECOGNITION';
            } else {
                $bintang_fs3 = 0;
                $bintang_fss3 = 'NO RECOGNITION';
            }
            
            //Verification Assessment 
            $final_score4 = $totalcp_av / 68 * 0.85 + ($totaleip_td + $totaleip_ad + $totaleip_tv + $totaleip_av);
            if($final_score4 >=85){
                $bintang_fs4 = 5;
                $bintang_fss4 = 'GLOBAL EXCELLENCE';
            } elseif($final_score4 >=70 && $final_score4 < 84){
                $bintang_fs4 = 4;
                $bintang_fss4 = 'NATIONAL EXCELLENCE';
            } elseif($final_score4 >= 50 && $final_score4 < 69){
                $bintang_fs4 = 3;
                $bintang_fss4 = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score4 >=40 && $final_score4 < 49){
                $bintang_fs4 = 2;
                $bintang_fss4 = 'POTENTIAL RECOGNITION';
            } else {
                $bintang_fs4 = 0;
                $bintang_fss4 = 'NO RECOGNITION';
            }

            //Rayuan
            //Total Core Point (Target Summary Design)
            $final_score_r = $totalcp_td_r / 68 * 0.85 + ($totaleip_td_r + $totaleip_ad_r + $totaleip_tv_r + $totaleip_av_r);
            if($final_score_r >=85){
                $bintang_fs_r = 5;
                $bintang_fss_r = 'GLOBAL EXCELLENCE';
            } elseif($final_score_r >=70 && $final_score_r < 84){
                $bintang_fs_r = 4;
                $bintang_fss_r = 'NATIONAL EXCELLENCE';
            } elseif($final_score_r >= 50 && $final_score_r < 69){
                $bintang_fs_r = 3;
                $bintang_fss_r = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score_r >=41 && $final_score_r < 49){
                $bintang_fs_r = 2;
                $bintang_fss_r = 'POTENTIAL RECOGNITION';
            } elseif($final_score_r < 40){
                $bintang_fs_r = 0;
                $bintang_fss_r = 'NO RECOGNITION';
            }

            //Total Core Point (Target Summary Verification)
            $final_score2_r = $totalcp_tv_r / 68 * 0.85 + ($totaleip_td_r + $totaleip_ad_r + $totaleip_tv_r + $totaleip_av_r);
            if($final_score2_r >=85){
                $bintang_fs2_r = 5;
                $bintang_fss2_r = 'GLOBAL EXCELLENCE';
            } elseif($final_score2_r >=70 && $final_score2_r < 84){
                $bintang_fs2_r = 4;
                $bintang_fss2_r = 'NATIONAL EXCELLENCE';
            } elseif($final_score2_r >= 50 && $final_score2_r < 69){
                $bintang_fs2_r = 3;
                $bintang_fss2_r = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score2_r >=41 && $final_score2_r < 49){
                $bintang_fs2_r = 2;
                $bintang_fss2_r = 'POTENTIAL RECOGNITION';
            } elseif($final_score2_r < 40){
                $bintang_fs2_r = 0;
                $bintang_fss2_r = 'NO RECOGNITION';
            }

            //Design Assessment 
            $final_score3_r = $totalcp_ad_r / 68 * 0.85 + ($totaleip_td_r + $totaleip_ad_r + $totaleip_tv_r + $totaleip_av_r);
            if($final_score3_r >=85){
                $bintang_fs3_r = 5;
                $bintang_fss3_r = 'GLOBAL EXCELLENCE';
            } elseif($final_score3_r >=70 && $final_score3_r < 84){
                $bintang_fs3_r = 4;
                $bintang_fss3_r = 'NATIONAL EXCELLENCE';
            } elseif($final_score3_r >= 50 && $final_score3_r < 69){
                $bintang_fs3_r = 3;
                $bintang_fss3_r = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score3_r >=40 && $final_score3_r < 49){
                $bintang_fs3_r = 2;
                $bintang_fss3_r = 'POTENTIAL RECOGNITION';
            } else {
                $bintang_fs3_r = 0;
                $bintang_fss3_r = 'NO RECOGNITION';
            }
            
            //Verification Assessment 
            $final_score4_r = $totalcp_av_r / 68 * 0.85 + ($totaleip_td_r + $totaleip_ad_r + $totaleip_tv_r + $totaleip_av_r);
            if($final_score4_r >=85){
                $bintang_fs4_r = 5;
                $bintang_fss4_r = 'GLOBAL EXCELLENCE';
            } elseif($final_score4_r >=70 && $final_score4_r < 84){
                $bintang_fs4_r = 4;
                $bintang_fss4_r = 'NATIONAL EXCELLENCE';
            } elseif($final_score4_r >= 50 && $final_score4_r < 69){
                $bintang_fs4_r = 3;
                $bintang_fss4_r = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score4_r >=40 && $final_score4_r < 49){
                $bintang_fs4_r = 2;
                $bintang_fss4_r = 'POTENTIAL RECOGNITION';
            } else {
                $bintang_fs4_r = 0;
                $bintang_fss4_r = 'NO RECOGNITION';
            }
    

            return view('projek.satu_eph_jalan_naiktaraf', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'rayuan_rekabentuk_kriterias', 'rayuan_verifikasi_kriterias', 'users', 'lantikans',
            'totalcp_td', 'totaleip_td', 'totalcp_ad', 'totalcp_av','totaleip_ad', 'totaleip_ad', 'totalcp_tv', 'totaleip_ad', 'totaleip_av', 'totaleip_tv', 
            'sm_td', 'pt_td', 'ew_td', 'ae_td', 'ca_td', 'mr_td', 'ec_td', 'in_td' ,'sm_ad', 'pt_ad', 'ew_ad', 'ae_ad', 'ca_ad', 'mr_ad', 'ec_ad', 'in_ad', 'sm_tv', 'sm_av', 'pt_tv', 
            'pt_av', 'ew_tv', 'ew_av', 'ae_tv', 'ae_av', 'ca_tv', 'ca_av','mr_av', 'mr_tv', 'ec_tv', 'ec_av', 'in_td', 'in_ad', 'in_tv', 'in_av', 
            'final_score', 'bintang_fs', 'bintang_fss', 'final_score2', 'final_score3', 'final_score4', 'bintang_fss3', 'bintang_fss2', 'bintang_fss4', 'bintang_fs4',
            'totalcp_td_r', 'totaleip_td_r', 'totalcp_ad_r', 'totalcp_av_r','totaleip_ad_r', 'totaleip_ad_r', 'totalcp_tv_r', 'totaleip_ad_r', 'totaleip_av_r', 'totaleip_tv_r', 
            'sm_td_r', 'pt_td_r', 'ew_td_r', 'ae_td_r', 'ca_td_r', 'mr_td_r', 'ec_td_r', 'in_td_r' ,'sm_ad_r', 'pt_ad_r', 'ew_ad_r', 'ae_ad_r', 'ca_ad_r', 'mr_ad_r', 'ec_ad_r', 'sm_tv_r', 'sm_av_r', 'pt_tv_r', 
            'pt_av_r', 'ew_tv_r', 'ew_av_r', 'ae_tv_r', 'ae_av_r', 'ca_tv_r', 'ca_av_r','mr_av_r', 'mr_tv_r', 'ec_tv_r', 'ec_av_r', 'in_td_r', 'in_ad_r', 'in_tv_r', 'in_av_r', 
            'final_score_r', 'bintang_fs_r', 'bintang_fss_r', 'final_score2_r', 'final_score3_r', 'final_score4_r', 'bintang_fss3_r', 'bintang_fss2_r', 'bintang_fss4_r', 'bintang_fs4_r'
        )); 
        } elseif ($projek->kategori ==  'GPSS Bangunan 1') {
            // $gpss_kriterias = GpssKriteria::where('borang', 'CATEGORY 1')->get();            
            // $gpss_kriterias = GpssKriteria::where('borang', 'like', '%CATEGORY 1%')->get();                      
            // dd($gpss_kriterias);            
            $rekabentuk_kriterias = GpssKriteria::where([
                ['borang','like', '%CATEGORY 1%'],
                ['fasa','=', 'rekabentuk'],
            ])->get(); 
            // dd($rekabentuk_kriterias);   

            
            $verifikasi_kriterias = GpssKriteria::where([
                ['borang','=', 'CATEGORY 1'],
                ['fasa','=', 'verifikasi'],
            ])->get();
            // dd($verifikasi_kriterias);

            $rayuan_kriterias = GpssKriteria::where([
                ['borang','=', 'CATEGORY 1'],
                ['fasa', '=', 'verifikasi']
            ])->get();
            
            // Rekabentuk borang CATEGORY 1
            //Point Allocated - Rekabentuk
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 1]])->get();
            $aw_pa = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 2]])->get();
            $mw_pa = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 3]])->get();
            $ew_pa = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 4]])->get();
            $cw_pa = 0;

            //Point Requested (Design) - Rekabentuk
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 1]])->get();
            $aw_ds = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 2]])->get();
            $mw_ds = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 3]])->get();
            $ew_ds = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 4]])->get();
            $cw_ds = 0;

            // Verifikasi borang CATEGORY 1
            //Point Requested (Construction) - Verifikasi
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 1]])->get();
            $aw_cs = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 2]])->get();
            $mw_cs = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 3]])->get();
            $ew_cs = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 4]])->get();
            $cw_cs = 0;

            //Point Awarded - Verifikasi
            $aw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 1]])->get();
            $aw_pad = 0;
            $mw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 2]])->get();
            $mw_pad = 0;
            $ew_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 3]])->get();
            $ew_pad = 0;
            $cw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 4]])->get();
            $cw_pad = 0;

            //Rayuan
            //Point Allocated - Rekabentuk
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 1]])->get();
            $aw_pa_r = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 2]])->get();
            $mw_pa_r = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 3]])->get();
            $ew_pa_r = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 4]])->get();
            $cw_pa_r = 0;

            //Point Requested (Design) - Rekabentuk
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 1]])->get();
            $aw_ds_r = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 2]])->get();
            $mw_ds_r = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 3]])->get();
            $ew_ds_r = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 4]])->get();
            $cw_ds_r = 0;

            //Point Requested (Construction) - Verifikasi
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 1]])->get();
            $aw_cs_r = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 2]])->get();
            $mw_cs_r = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 3]])->get();
            $ew_cs_r = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 4]])->get();
            $cw_cs_r = 0;

            //Point Awarded - Verifikasi
            $aw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 1]])->get();
            $aw_pad_r = 0;
            $mw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 2]])->get();
            $mw_pad_r = 0;
            $ew_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 3]])->get();
            $ew_pad_r = 0;
            $cw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 4]])->get();
            $cw_pad_r = 0;
            

            //Point Requested (Design & Construction) | Point Allocated
            foreach($aw_kriterias as $aw_kriteria) {                
                $markah_aw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_aw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_aw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_aw_ds_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_aw_cs_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_aw_pa_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_aw_ds){
                    if ($markah_aw_ds->point_req_design > 0) {
                        $aw_ds +=  $markah_aw_ds->point_req_design;
                    }                    
                }  
                if($markah_aw_cs){
                    if ($markah_aw_cs->point_req_construction > 0) {
                        $aw_cs +=  $markah_aw_cs->point_req_construction;
                    }                    
                }  
                if($markah_aw_pa){
                    if ($markah_aw_pa->point_allocated > 0) {
                        $aw_pa += $markah_aw_pa->point_allocated;
                    }                    
                } 
                if($markah_aw_ds_r){
                    if ($markah_aw_ds_r->point_req_design > 0) {
                        $aw_ds_r +=  $markah_aw_ds_r->point_req_design;
                    }                    
                }  
                if($markah_aw_cs_r){
                    if ($markah_aw_cs_r->point_req_construction > 0) {
                        $aw_cs_r +=  $markah_aw_cs_r->point_req_construction;
                    }                    
                }  
                if($markah_aw_pa_r){
                    if ($markah_aw_pa_r->point_allocated > 0) {
                        $aw_pa_r += $markah_aw_pa_r->point_allocated;
                    }                    
                }                          
            }
            foreach($mw_kriterias as $mw_kriteria) {                
                $markah_mw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mw_ds_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mw_cs_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mw_pa_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_mw_ds){
                    if($markah_mw_ds->point_req_design > 0){
                        $mw_ds +=  $markah_mw_ds->point_req_design;
                    }                } 
                if($markah_mw_cs){
                    if($markah_mw_cs->point_req_construction > 0){
                        $mw_cs +=  $markah_mw_cs->point_req_construction;
                    }
                }
                if($markah_mw_pa){
                    if($markah_mw_pa->point_allocated > 0){
                        $mw_pa += $markah_mw_pa->point_allocated;
                    }
                    // dd($markah_mw_pa);
                }
                if($markah_mw_ds_r){
                    if ($markah_mw_ds_r->point_req_design > 0) {
                        $mw_ds_r +=  $markah_mw_ds_r->point_req_design;
                    }                    
                }  
                if($markah_mw_cs_r){
                    if ($markah_mw_cs_r->point_req_construction > 0) {
                        $mw_cs_r +=  $markah_mw_cs_r->point_req_construction;
                    }                    
                }  
                if($markah_mw_pa_r){
                    if ($markah_mw_pa_r->point_allocated > 0) {
                        $mw_pa_r += $markah_mw_pa_r->point_allocated;
                    }                    
                }
            }
            foreach($ew_kriterias as $ew_kriteria) {                
                $markah_ew_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_ds_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_cs_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_pa_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_ew_ds){
                    if($markah_ew_ds->point_req_design){
                        $ew_ds +=  $markah_ew_ds->point_req_design;
                    }
                }
                if($markah_ew_cs){
                    if($markah_ew_cs->point_req_construction > 0){
                        $ew_cs +=  $markah_ew_cs->point_req_construction;
                    }
                }
                if($markah_ew_pa){
                    if($markah_ew_pa->point_allocated > 0){
                        $ew_pa += $markah_ew_pa->point_allocated;
                    }
                } 
                if($markah_ew_ds_r){
                    if ($markah_ew_ds_r->point_req_design > 0) {
                        $ew_ds_r +=  $markah_ew_ds_r->point_req_design;
                    }                    
                }  
                if($markah_ew_cs_r){
                    if ($markah_ew_cs_r->point_req_construction > 0) {
                        $ew_cs_r +=  $markah_ew_cs_r->point_req_construction;
                    }                    
                }  
                if($markah_ew_pa_r){
                    if ($markah_ew_pa_r->point_allocated > 0) {
                        $ew_pa_r += $markah_ew_pa_r->point_allocated;
                    }                    
                }
            }
            foreach($cw_kriterias as $cw_kriteria) {                
                $markah_cw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_cw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_cw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_cw_ds_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_cw_cs_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_cw_pa_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_cw_ds){
                    if($markah_cw_ds->point_req_design > 0){
                        $cw_ds +=  $markah_cw_ds->point_req_design;
                    }
                } 
                if($markah_cw_cs){
                    if($markah_cw_cs->point_req_construction > 0){
                        $cw_cs +=  $markah_cw_cs->point_req_construction;
                    }
                }
                if($markah_cw_pa){
                    if($markah_cw_pa->point_allocated > 0){
                        $cw_pa += $markah_cw_pa->point_allocated;
                    }
                    // dd($markah_aw_pa);
                }
                if($markah_cw_ds_r){
                    if ($markah_cw_ds_r->point_req_design > 0) {
                        $cw_ds_r +=  $markah_cw_ds_r->point_req_design;
                    }                    
                }  
                if($markah_cw_cs_r){
                    if ($markah_cw_cs_r->point_req_construction > 0) {
                        $cw_cs_r +=  $markah_cw_cs_r->point_req_construction;
                    }                    
                }  
                if($markah_cw_pa_r){
                    if ($markah_cw_pa_r->point_allocated > 0) {
                        $cw_pa_r += $markah_cw_pa_r->point_allocated;
                    }                    
                }
            }

            // //Point Awarded
            foreach($aw_pad_kriterias as $aw) {
                $markah_aw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw->id],['fasa','=','verifikasi']])->first();
                $markah_aw_pad_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw->id],['fasa','=','verifikasi']])->first();

                if($markah_aw_pad){
                    if($markah_aw_pad->point_awarded > 0){
                        $aw_pad +=  $markah_aw_pad->point_awarded;
                    }
                }
                if($markah_aw_pad_r){
                    if($markah_aw_pad_r->point_awarded > 0){
                        $aw_pad_r +=  $markah_aw_pad_r->point_awarded;
                    }
                }  
            }
            foreach($mw_pad_kriterias as $mw) {
                $markah_mw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw->id],['fasa','=','verifikasi']])->first();
                $markah_mw_pad_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw->id],['fasa','=','verifikasi']])->first();

                if($markah_mw_pad){
                    if($markah_mw_pad->point_awarded > 0){
                        $mw_pad +=  $markah_mw_pad->point_awarded;
                    }
                }
                if($markah_mw_pad_r){
                    if($markah_mw_pad_r->point_awarded > 0){
                        $mw_pad_r +=  $markah_mw_pad_r->point_awarded;
                    }
                }  
            }
            foreach($ew_pad_kriterias as $ew) {
                $markah_ew_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew->id],['fasa','=','verifikasi']])->first();
                $markah_ew_pad_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew->id],['fasa','=','verifikasi']])->first();

                if($markah_ew_pad){
                    if($markah_ew_pad->point_awarded > 0){
                        $ew_pad +=  $markah_ew_pad->point_awarded;
                    }
                } 
                if($markah_ew_pad_r){
                    if($markah_ew_pad_r->point_awarded > 0){
                        $ew_pad_r +=  $markah_ew_pad_r->point_awarded;
                    }
                } 
            }
            foreach($cw_pad_kriterias as $cw) {
                $markah_cw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw->id],['fasa','=','verifikasi']])->first();
                $markah_cw_pad_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw->id],['fasa','=','verifikasi']])->first();

                if($markah_cw_pad){
                    if($markah_cw_pad->point_awarded > 0){
                        $cw_pad +=  $markah_cw_pad->point_awarded;
                    }
                } 
                if($markah_cw_pad_r){
                    if($markah_cw_pad_r->point_awarded > 0){
                        $cw_pad_r +=  $markah_cw_pad_r->point_awarded;
                    }
                } 
            }

            
            //Total Design Stage
            $total_ds = $aw_ds + $mw_ds + $ew_ds + $cw_ds;
            //Total Construction Stage 
            $total_cs = $aw_cs + $mw_cs + $ew_cs + $cw_cs; 
            //Total Point Allocated
            $total_pa = $aw_pa + $mw_pa + $ew_pa + $cw_pa;
            //Total Point Awarded
            $total_pad = $aw_pad + $mw_pad + $ew_pad + $cw_pad;

            //Rayuan
            //Total Design Stage
            $total_ds_r = $aw_ds_r + $mw_ds_r + $ew_ds_r + $cw_ds_r;
            //Total Construction Stage 
            $total_cs_r = $aw_cs_r + $mw_cs_r + $ew_cs_r + $cw_cs_r; 
            //Total Point Allocated
            $total_pa_r = $aw_pa_r + $mw_pa_r + $ew_pa_r + $cw_pa_r;
            //Total Point Awarded
            $total_pad_r = $aw_pad_r + $mw_pad_r + $ew_pad_r + $cw_pad_r;

            //Percentage GPSS Score (Point Requested Design)
            //Building Category 1
            $peratus_aw_gpss_ds_1 = ($aw_ds/232) * 0.45 * 100;
            $peratus_mw_gpss_ds_1 = ($mw_ds/232) * 0.20 * 100;
            $peratus_ew_gpss_ds_1 = ($ew_ds/232) * 0.15 * 100;
            $peratus_cw_gpss_ds_1 = ($cw_ds/232) * 0.20 * 100;
            $total_peratus_ds_1 = $peratus_aw_gpss_ds_1 + $peratus_mw_gpss_ds_1 + $peratus_ew_gpss_ds_1 + $peratus_cw_gpss_ds_1;
            //GPSS Star
            if($total_peratus_ds_1 >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_ds_1 >= 70 && $total_peratus_ds_1 <79){
                $bintang = 4;
            }
             elseif($total_peratus_ds_1 >= 60 && $total_peratus_ds_1 <69){
                $bintang = 3;
            }
             elseif($total_peratus_ds_1 >= 50 && $total_peratus_ds_1 <59){
                $bintang = 2;
            }
             elseif($total_peratus_ds_1 >= 40 && $total_peratus_ds_1 <49){
                $bintang = 1;
            }
            elseif($total_peratus_ds_1 <39){
                $bintang = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_ds_1 = $peratus_aw_gpss_ds_1 + $peratus_mw_gpss_ds_1 + $peratus_ew_gpss_ds_1 + $peratus_cw_gpss_ds_1;

            //Percentage GPSS Score (Point Requested Construction)
            //Building Category 1
            $peratus_aw_gpss_cs_1 = ($aw_cs/232) * 0.45 * 100;
            $peratus_mw_gpss_cs_1 = ($mw_cs/232) * 0.20 * 100;
            $peratus_ew_gpss_cs_1 = ($ew_cs/232) * 0.15 * 100;
            $peratus_cw_gpss_cs_1 = ($cw_cs/232) * 0.20 * 100;
            $total_peratus_cs_1 = $peratus_aw_gpss_cs_1 + $peratus_mw_gpss_cs_1 + $peratus_ew_gpss_cs_1 + $peratus_cw_gpss_cs_1;
            //GPSS Star
            if($total_peratus_cs_1 >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_cs_1 >= 70 && $total_peratus_cs_1 <79){
                $bintang = 4;
            }
             elseif($total_peratus_cs_1 >= 60 && $total_peratus_cs_1 <69){
                $bintang = 3;
            }
             elseif($total_peratus_cs_1 >= 50 && $total_peratus_cs_1 <59){
                $bintang = 2;
            }
             elseif($total_peratus_cs_1 >= 40 && $total_peratus_cs_1 <49){
                $bintang = 1;
            }
            elseif($total_peratus_cs_1 <39){
                $bintang = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_cs_1 = $peratus_aw_gpss_cs_1 + $peratus_mw_gpss_cs_1 + $peratus_ew_gpss_cs_1 + $peratus_cw_gpss_cs_1;

            //Percentage GPSS Score (Point Awarded)
            //Building Category 1
            $peratus_aw_gpss_pad_1 = ($aw_pad/232) * 0.45 * 100;
            $peratus_mw_gpss_pad_1 = ($mw_pad/232) * 0.20 * 100;
            $peratus_ew_gpss_pad_1 = ($ew_pad/232) * 0.15 * 100;
            $peratus_cw_gpss_pad_1 = ($cw_pad/232) * 0.20 * 100;
            $total_peratus_pad_1 = $peratus_aw_gpss_pad_1 + $peratus_mw_gpss_pad_1 + $peratus_ew_gpss_pad_1 + $peratus_cw_gpss_pad_1;
            //GPSS Star
            if($total_peratus_pad_1 >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_pad_1 >= 70 && $total_peratus_pad_1 <79){
                $bintang = 4;
            }
             elseif($total_peratus_pad_1 >= 60 && $total_peratus_pad_1 <69){
                $bintang = 3;
            }
             elseif($total_peratus_pad_1 >= 50 && $total_peratus_pad_1 <59){
                $bintang = 2;
            }
             elseif($total_peratus_pad_1 >= 40 && $total_peratus_pad_1 <49){
                $bintang = 1;
            }
            elseif($total_peratus_pad_1 <39){
                $bintang = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_pad_1 = $peratus_aw_gpss_pad_1 + $peratus_mw_gpss_pad_1 + $peratus_ew_gpss_pad_1 + $peratus_cw_gpss_pad_1;

            //Rayuan//
            //Percentage GPSS Score (Point Requested Design)
            //Building Category 1
            $peratus_aw_gpss_ds_1_r = ($aw_ds_r/232) * 0.45 * 100;
            $peratus_mw_gpss_ds_1_r = ($mw_ds_r/232) * 0.20 * 100;
            $peratus_ew_gpss_ds_1_r = ($ew_ds_r/232) * 0.15 * 100;
            $peratus_cw_gpss_ds_1_r = ($cw_ds_r/232) * 0.20 * 100;
            $total_peratus_ds_1_r = $peratus_aw_gpss_ds_1_r + $peratus_mw_gpss_ds_1_r + $peratus_ew_gpss_ds_1_r + $peratus_cw_gpss_ds_1_r;
            //GPSS Star
            if($total_peratus_ds_1_r >= 80){
                $bintang_r = 5;
            }
            elseif($total_peratus_ds_1_r >= 70 && $total_peratus_ds_1_r <79){
                $bintang_r = 4;
            }
             elseif($total_peratus_ds_1_r >= 60 && $total_peratus_ds_1_r <69){
                $bintang_r = 3;
            }
             elseif($total_peratus_ds_1_r >= 50 && $total_peratus_ds_1_r <59){
                $bintang_r = 2;
            }
             elseif($total_peratus_ds_1_r >= 40 && $total_peratus_ds_1_r <49){
                $bintang_r = 1;
            }
            elseif($total_peratus_ds_1_r <39){
                $bintang_r = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_ds_1_r = $peratus_aw_gpss_ds_1_r + $peratus_mw_gpss_ds_1_r + $peratus_ew_gpss_ds_1_r + $peratus_cw_gpss_ds_1_r;

            //Percentage GPSS Score (Point Requested Construction)
            //Building Category 1
            $peratus_aw_gpss_cs_1_r = ($aw_cs_r/232) * 0.45 * 100;
            $peratus_mw_gpss_cs_1_r = ($mw_cs_r/232) * 0.20 * 100;
            $peratus_ew_gpss_cs_1_r = ($ew_cs_r/232) * 0.15 * 100;
            $peratus_cw_gpss_cs_1_r = ($cw_cs_r/232) * 0.20 * 100;
            $total_peratus_cs_1_r = $peratus_aw_gpss_cs_1_r + $peratus_mw_gpss_cs_1_r + $peratus_ew_gpss_cs_1_r + $peratus_cw_gpss_cs_1_r;
            //GPSS Star
            if($total_peratus_cs_1_r >= 80){
                $bintang_r = 5;
            }
            elseif($total_peratus_cs_1_r >= 70 && $total_peratus_cs_1_r <79){
                $bintang_r = 4;
            }
             elseif($total_peratus_cs_1_r >= 60 && $total_peratus_cs_1_r <69){
                $bintang_r = 3;
            }
             elseif($total_peratus_cs_1_r >= 50 && $total_peratus_cs_1_r <59){
                $bintang_r = 2;
            }
             elseif($total_peratus_cs_1_r >= 40 && $total_peratus_cs_1_r <49){
                $bintang_r = 1;
            }
            elseif($total_peratus_cs_1_r <39){
                $bintang_r = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_cs_1_r = $peratus_aw_gpss_cs_1_r + $peratus_mw_gpss_cs_1_r + $peratus_ew_gpss_cs_1_r + $peratus_cw_gpss_cs_1_r;

            //Percentage GPSS Score (Point Awarded)
            //Building Category 1
            $peratus_aw_gpss_pad_1_r = ($aw_pad_r/232) * 0.45 * 100;
            $peratus_mw_gpss_pad_1_r = ($mw_pad_r/232) * 0.20 * 100;
            $peratus_ew_gpss_pad_1_r = ($ew_pad_r/232) * 0.15 * 100;
            $peratus_cw_gpss_pad_1_r = ($cw_pad_r/232) * 0.20 * 100;
            $total_peratus_pad_1_r = $peratus_aw_gpss_pad_1_r + $peratus_mw_gpss_pad_1_r + $peratus_ew_gpss_pad_1_r + $peratus_cw_gpss_pad_1_r;
            //GPSS Star
            if($total_peratus_pad_1_r >= 80){
                $bintang_r = 5;
            }
            elseif($total_peratus_pad_1_r >= 70 && $total_peratus_pad_1_r <79){
                $bintang_r = 4;
            }
             elseif($total_peratus_pad_1_r >= 60 && $total_peratus_pad_1_r <69){
                $bintang_r = 3;
            }
             elseif($total_peratus_pad_1_r >= 50 && $total_peratus_pad_1_r <59){
                $bintang_r = 2;
            }
             elseif($total_peratus_pad_1_r >= 40 && $total_peratus_pad_1_r <49){
                $bintang_r = 1;
            }
            elseif($total_peratus_pad_1_r <39){
                $bintang_r = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_pad_1_r = $peratus_aw_gpss_pad_1_r + $peratus_mw_gpss_pad_1_r + $peratus_ew_gpss_pad_1_r + $peratus_cw_gpss_pad_1_r;

            // dd($aw_cs);
            return view('projek.satu_gpss_bangunan', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans', 'bintang_r',
            'aw_ds', 'mw_ds', 'ew_ds', 'cw_ds', 
            'aw_cs', 'mw_cs', 'ew_cs', 'cw_cs', 
            'aw_pa', 'cw_pa', 'ew_pa', 'mw_pa',
            'aw_pad', 'mw_pad', 'ew_pad', 'cw_pad',  
            'total_ds', 'total_cs', 'total_pa', 'total_pad', 
            'peratus_aw_gpss_ds_1', 'peratus_mw_gpss_ds_1', 'peratus_ew_gpss_ds_1', 'peratus_cw_gpss_ds_1', 'total_peratus_ds_1', 'total_peratus_crest_ds_1',
            'peratus_aw_gpss_cs_1', 'peratus_mw_gpss_cs_1', 'peratus_ew_gpss_cs_1', 'peratus_cw_gpss_cs_1', 'total_peratus_cs_1', 'total_peratus_crest_cs_1',
            'peratus_aw_gpss_pad_1', 'peratus_mw_gpss_pad_1', 'peratus_ew_gpss_pad_1', 'peratus_cw_gpss_pad_1', 'total_peratus_pad_1', 'total_peratus_crest_pad_1',
            'aw_ds_r', 'mw_ds_r', 'ew_ds_r', 'cw_ds_r', 
            'aw_cs_r', 'mw_cs_r', 'ew_cs_r', 'cw_cs_r', 
            'aw_pa_r', 'cw_pa_r', 'ew_pa_r', 'mw_pa_r', 
            'aw_pad_r', 'mw_pad_r', 'ew_pad_r', 'cw_pad_r',
            'total_ds_r', 'total_cs_r', 'total_pa_r', 'total_pad_r',
            'peratus_aw_gpss_ds_1_r', 'peratus_mw_gpss_ds_1_r', 'peratus_ew_gpss_ds_1_r', 'peratus_cw_gpss_ds_1_r', 'total_peratus_ds_1_r', 'total_peratus_crest_ds_1_r',
            'peratus_aw_gpss_cs_1_r', 'peratus_mw_gpss_cs_1_r', 'peratus_ew_gpss_cs_1_r', 'peratus_cw_gpss_cs_1_r', 'total_peratus_cs_1_r', 'total_peratus_crest_cs_1_r',
            'peratus_aw_gpss_pad_1_r', 'peratus_mw_gpss_pad_1_r', 'peratus_ew_gpss_pad_1_r', 'peratus_cw_gpss_pad_1_r', 'total_peratus_pad_1_r', 'total_peratus_crest_pad_1_r'
        )); 
        } elseif ($projek->kategori ==  'GPSS Bangunan 2') {
            // $gpss_kriterias = GpssKriteria::where('borang', 'like', '%CATEGORY 2%')->get();
            $rekabentuk_kriterias = GpssKriteria::where([
                ['borang','=', 'CATEGORY 2'],
                ['fasa','=', 'rekabentuk'],
            ])->get();    

            $verifikasi_kriterias = GpssKriteria::where([
                ['borang','=', 'CATEGORY 2'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $rayuan_kriterias = GpssKriteria::where([
                ['borang','=', 'CATEGORY 2'],
                ['fasa','=', 'verifikasi']
            ])->get();
            
            // Rekabentuk borang CATEGORY 2
            //Point Allocated - Rekabentuk
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 1]])->get();
            $aw_pa = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 2]])->get();
            $mw_pa = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 3]])->get();
            $ew_pa = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 4]])->get();
            $cw_pa = 0;

            //Point Requested (Design) - Rekabentuk
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 1]])->get();
            $aw_ds = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 2]])->get();
            $mw_ds = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 3]])->get();
            $ew_ds = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 4]])->get();
            $cw_ds = 0;

            // Verifikasi borang CATEGORY 2
            //Point Requested (Construction) - Verifikasi
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 1]])->get();
            $aw_cs = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 2]])->get();
            $mw_cs = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 3]])->get();
            $ew_cs = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 4]])->get();
            $cw_cs = 0;

            //Point Awarded - Verifikasi
            $aw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 1]])->get();
            $aw_pad = 0;
            $mw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 2]])->get();
            $mw_pad = 0;
            $ew_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 3]])->get();
            $ew_pad = 0;
            $cw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 4]])->get();
            $cw_pad = 0;

            //Rayuan
            //Point Allocated - Rekabentuk
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 1]])->get();
            $aw_pa_r = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 2]])->get();
            $mw_pa_r = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 3]])->get();
            $ew_pa_r = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 4]])->get();
            $cw_pa_r = 0;

            //Point Requested (Design) - Rekabentuk
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 1]])->get();
            $aw_ds_r = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 2]])->get();
            $mw_ds_r = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 3]])->get();
            $ew_ds_r = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 4]])->get();
            $cw_ds_r = 0;

            //Point Requested (Construction) - Verifikasi
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 1]])->get();
            $aw_cs_r = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 2]])->get();
            $mw_cs_r = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 3]])->get();
            $ew_cs_r = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 4]])->get();
            $cw_cs_r = 0;

            //Point Awarded - Verifikasi
            $aw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 1]])->get();
            $aw_pad_r = 0;
            $mw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 2]])->get();
            $mw_pad_r = 0;
            $ew_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 3]])->get();
            $ew_pad_r = 0;
            $cw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 4]])->get();
            $cw_pad_r = 0;
            

            //Point Requested (Design & Construction) | Point Allocated
            foreach($aw_kriterias as $aw_kriteria) {                
                $markah_aw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_aw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_aw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_aw_ds_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_aw_cs_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_aw_pa_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_aw_ds){
                    if ($markah_aw_ds->point_req_design > 0) {
                        $aw_ds +=  $markah_aw_ds->point_req_design;
                    }                    
                }  
                if($markah_aw_cs){
                    if ($markah_aw_cs->point_req_construction > 0) {
                        $aw_cs +=  $markah_aw_cs->point_req_construction;
                    }                    
                }  
                if($markah_aw_pa){
                    if ($markah_aw_pa->point_allocated > 0) {
                        $aw_pa += $markah_aw_pa->point_allocated;
                    }                    
                } 
                if($markah_aw_ds_r){
                    if ($markah_aw_ds_r->point_req_design > 0) {
                        $aw_ds_r +=  $markah_aw_ds_r->point_req_design;
                    }                    
                }  
                if($markah_aw_cs_r){
                    if ($markah_aw_cs_r->point_req_construction > 0) {
                        $aw_cs_r +=  $markah_aw_cs_r->point_req_construction;
                    }                    
                }  
                if($markah_aw_pa_r){
                    if ($markah_aw_pa_r->point_allocated > 0) {
                        $aw_pa_r += $markah_aw_pa_r->point_allocated;
                    }                    
                }                          
            }
            foreach($mw_kriterias as $mw_kriteria) {                
                $markah_mw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mw_ds_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mw_cs_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mw_pa_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_mw_ds){
                    if($markah_mw_ds->point_req_design > 0){
                        $mw_ds +=  $markah_mw_ds->point_req_design;
                    }                } 
                if($markah_mw_cs){
                    if($markah_mw_cs->point_req_construction > 0){
                        $mw_cs +=  $markah_mw_cs->point_req_construction;
                    }
                }
                if($markah_mw_pa){
                    if($markah_mw_pa->point_allocated > 0){
                        $mw_pa += $markah_mw_pa->point_allocated;
                    }
                    // dd($markah_mw_pa);
                }
                if($markah_mw_ds_r){
                    if ($markah_mw_ds_r->point_req_design > 0) {
                        $mw_ds_r +=  $markah_mw_ds_r->point_req_design;
                    }                    
                }  
                if($markah_mw_cs_r){
                    if ($markah_mw_cs_r->point_req_construction > 0) {
                        $mw_cs_r +=  $markah_mw_cs_r->point_req_construction;
                    }                    
                }  
                if($markah_mw_pa_r){
                    if ($markah_mw_pa_r->point_allocated > 0) {
                        $mw_pa_r += $markah_mw_pa_r->point_allocated;
                    }                    
                }
            }
            foreach($ew_kriterias as $ew_kriteria) {                
                $markah_ew_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_ds_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_cs_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_pa_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_ew_ds){
                    if($markah_ew_ds->point_req_design){
                        $ew_ds +=  $markah_ew_ds->point_req_design;
                    }
                }
                if($markah_ew_cs){
                    if($markah_ew_cs->point_req_construction > 0){
                        $ew_cs +=  $markah_ew_cs->point_req_construction;
                    }
                }
                if($markah_ew_pa){
                    if($markah_ew_pa->point_allocated > 0){
                        $ew_pa += $markah_ew_pa->point_allocated;
                    }
                } 
                if($markah_ew_ds_r){
                    if ($markah_ew_ds_r->point_req_design > 0) {
                        $ew_ds_r +=  $markah_ew_ds_r->point_req_design;
                    }                    
                }  
                if($markah_ew_cs_r){
                    if ($markah_ew_cs_r->point_req_construction > 0) {
                        $ew_cs_r +=  $markah_ew_cs_r->point_req_construction;
                    }                    
                }  
                if($markah_ew_pa_r){
                    if ($markah_ew_pa_r->point_allocated > 0) {
                        $ew_pa_r += $markah_ew_pa_r->point_allocated;
                    }                    
                }
            }
            foreach($cw_kriterias as $cw_kriteria) {                
                $markah_cw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_cw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_cw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_cw_ds_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_cw_cs_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_cw_pa_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_cw_ds){
                    if($markah_cw_ds->point_req_design > 0){
                        $cw_ds +=  $markah_cw_ds->point_req_design;
                    }
                } 
                if($markah_cw_cs){
                    if($markah_cw_cs->point_req_construction > 0){
                        $cw_cs +=  $markah_cw_cs->point_req_construction;
                    }
                }
                if($markah_cw_pa){
                    if($markah_cw_pa->point_allocated > 0){
                        $cw_pa += $markah_cw_pa->point_allocated;
                    }
                    // dd($markah_aw_pa);
                }
                if($markah_cw_ds_r){
                    if ($markah_cw_ds_r->point_req_design > 0) {
                        $cw_ds_r +=  $markah_cw_ds_r->point_req_design;
                    }                    
                }  
                if($markah_cw_cs_r){
                    if ($markah_cw_cs_r->point_req_construction > 0) {
                        $cw_cs_r +=  $markah_cw_cs_r->point_req_construction;
                    }                    
                }  
                if($markah_cw_pa_r){
                    if ($markah_cw_pa_r->point_allocated > 0) {
                        $cw_pa_r += $markah_cw_pa_r->point_allocated;
                    }                    
                }
            }

            // //Point Awarded
            foreach($aw_pad_kriterias as $aw) {
                $markah_aw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw->id],['fasa','=','verifikasi']])->first();
                $markah_aw_pad_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw->id],['fasa','=','verifikasi']])->first();

                if($markah_aw_pad){
                    if($markah_aw_pad->point_awarded > 0){
                        $aw_pad +=  $markah_aw_pad->point_awarded;
                    }
                }
                if($markah_aw_pad_r){
                    if($markah_aw_pad_r->point_awarded > 0){
                        $aw_pad_r +=  $markah_aw_pad_r->point_awarded;
                    }
                }  
            }
            foreach($mw_pad_kriterias as $mw) {
                $markah_mw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw->id],['fasa','=','verifikasi']])->first();
                $markah_mw_pad_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw->id],['fasa','=','verifikasi']])->first();

                if($markah_mw_pad){
                    if($markah_mw_pad->point_awarded > 0){
                        $mw_pad +=  $markah_mw_pad->point_awarded;
                    }
                }
                if($markah_mw_pad_r){
                    if($markah_mw_pad_r->point_awarded > 0){
                        $mw_pad_r +=  $markah_mw_pad_r->point_awarded;
                    }
                }  
            }
            foreach($ew_pad_kriterias as $ew) {
                $markah_ew_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew->id],['fasa','=','verifikasi']])->first();
                $markah_ew_pad_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew->id],['fasa','=','verifikasi']])->first();

                if($markah_ew_pad){
                    if($markah_ew_pad->point_awarded > 0){
                        $ew_pad +=  $markah_ew_pad->point_awarded;
                    }
                } 
                if($markah_ew_pad_r){
                    if($markah_ew_pad_r->point_awarded > 0){
                        $ew_pad_r +=  $markah_ew_pad_r->point_awarded;
                    }
                } 
            }
            foreach($cw_pad_kriterias as $cw) {
                $markah_cw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw->id],['fasa','=','verifikasi']])->first();
                $markah_cw_pad_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw->id],['fasa','=','verifikasi']])->first();

                if($markah_cw_pad){
                    if($markah_cw_pad->point_awarded > 0){
                        $cw_pad +=  $markah_cw_pad->point_awarded;
                    }
                } 
                if($markah_cw_pad_r){
                    if($markah_cw_pad_r->point_awarded > 0){
                        $cw_pad_r +=  $markah_cw_pad_r->point_awarded;
                    }
                } 
            }

            
            //Total Design Stage
            $total_ds = $aw_ds + $mw_ds + $ew_ds + $cw_ds;
            //Total Construction Stage 
            $total_cs = $aw_cs + $mw_cs + $ew_cs + $cw_cs; 
            //Total Point Allocated
            $total_pa = $aw_pa + $mw_pa + $ew_pa + $cw_pa;
            //Total Point Awarded
            $total_pad = $aw_pad + $mw_pad + $ew_pad + $cw_pad;

            //Rayuan
            //Total Design Stage
            $total_ds_r = $aw_ds_r + $mw_ds_r + $ew_ds_r + $cw_ds_r;
            //Total Construction Stage 
            $total_cs_r = $aw_cs_r + $mw_cs_r + $ew_cs_r + $cw_cs_r; 
            //Total Point Allocated
            $total_pa_r = $aw_pa_r + $mw_pa_r + $ew_pa_r + $cw_pa_r;
            //Total Point Awarded
            $total_pad_r = $aw_pad_r + $mw_pad_r + $ew_pad_r + $cw_pad_r;

            //Percentage GPSS Score (Point Requested Design)
            //Building CATEGORY 2
            $peratus_aw_gpss_ds_2 = ($aw_ds/232) * 0.45 * 100;
            $peratus_mw_gpss_ds_2 = ($mw_ds/232) * 0.20 * 100;
            $peratus_ew_gpss_ds_2 = ($ew_ds/232) * 0.15 * 100;
            $peratus_cw_gpss_ds_2 = ($cw_ds/232) * 0.20 * 100;
            $total_peratus_ds_2 = $peratus_aw_gpss_ds_2 + $peratus_mw_gpss_ds_2 + $peratus_ew_gpss_ds_2 + $peratus_cw_gpss_ds_2;
            //GPSS Star
            if($total_peratus_ds_2 >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_ds_2 >= 70 && $total_peratus_ds_2 <79){
                $bintang = 4;
            }
             elseif($total_peratus_ds_2 >= 60 && $total_peratus_ds_2 <69){
                $bintang = 3;
            }
             elseif($total_peratus_ds_2 >= 50 && $total_peratus_ds_2 <59){
                $bintang = 2;
            }
             elseif($total_peratus_ds_2 >= 40 && $total_peratus_ds_2 <49){
                $bintang = 1;
            }
            elseif($total_peratus_ds_2 <39){
                $bintang = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_ds_2 = $peratus_aw_gpss_ds_2 + $peratus_mw_gpss_ds_2 + $peratus_ew_gpss_ds_2 + $peratus_cw_gpss_ds_2;

            //Percentage GPSS Score (Point Requested Construction)
            //Building CATEGORY 2
            $peratus_aw_gpss_cs_2 = ($aw_cs/232) * 0.45 * 100;
            $peratus_mw_gpss_cs_2 = ($mw_cs/232) * 0.20 * 100;
            $peratus_ew_gpss_cs_2 = ($ew_cs/232) * 0.15 * 100;
            $peratus_cw_gpss_cs_2 = ($cw_cs/232) * 0.20 * 100;
            $total_peratus_cs_2 = $peratus_aw_gpss_cs_2 + $peratus_mw_gpss_cs_2 + $peratus_ew_gpss_cs_2 + $peratus_cw_gpss_cs_2;
            //GPSS Star
            if($total_peratus_cs_2 >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_cs_2 >= 70 && $total_peratus_cs_2 <79){
                $bintang = 4;
            }
             elseif($total_peratus_cs_2 >= 60 && $total_peratus_cs_2 <69){
                $bintang = 3;
            }
             elseif($total_peratus_cs_2 >= 50 && $total_peratus_cs_2 <59){
                $bintang = 2;
            }
             elseif($total_peratus_cs_2 >= 40 && $total_peratus_cs_2 <49){
                $bintang = 1;
            }
            elseif($total_peratus_cs_2 <39){
                $bintang = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_cs_2 = $peratus_aw_gpss_cs_2 + $peratus_mw_gpss_cs_2 + $peratus_ew_gpss_cs_2 + $peratus_cw_gpss_cs_2;

            //Percentage GPSS Score (Point Awarded)
            //Building CATEGORY 2
            $peratus_aw_gpss_pad_2 = ($aw_pad/232) * 0.45 * 100;
            $peratus_mw_gpss_pad_2 = ($mw_pad/232) * 0.20 * 100;
            $peratus_ew_gpss_pad_2 = ($ew_pad/232) * 0.15 * 100;
            $peratus_cw_gpss_pad_2 = ($cw_pad/232) * 0.20 * 100;
            $total_peratus_pad_2 = $peratus_aw_gpss_pad_2 + $peratus_mw_gpss_pad_2 + $peratus_ew_gpss_pad_2 + $peratus_cw_gpss_pad_2;
            //GPSS Star
            if($total_peratus_pad_2 >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_pad_2 >= 70 && $total_peratus_pad_2 <79){
                $bintang = 4;
            }
             elseif($total_peratus_pad_2 >= 60 && $total_peratus_pad_2 <69){
                $bintang = 3;
            }
             elseif($total_peratus_pad_2 >= 50 && $total_peratus_pad_2 <59){
                $bintang = 2;
            }
             elseif($total_peratus_pad_2 >= 40 && $total_peratus_pad_2 <49){
                $bintang = 1;
            }
            elseif($total_peratus_pad_2 <39){
                $bintang = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_pad_2 = $peratus_aw_gpss_pad_2 + $peratus_mw_gpss_pad_2 + $peratus_ew_gpss_pad_2 + $peratus_cw_gpss_pad_2;

            //Rayuan//
            //Percentage GPSS Score (Point Requested Design)
            //Building CATEGORY 2
            $peratus_aw_gpss_ds_2_r = ($aw_ds_r/232) * 0.45 * 100;
            $peratus_mw_gpss_ds_2_r = ($mw_ds_r/232) * 0.20 * 100;
            $peratus_ew_gpss_ds_2_r = ($ew_ds_r/232) * 0.15 * 100;
            $peratus_cw_gpss_ds_2_r = ($cw_ds_r/232) * 0.20 * 100;
            $total_peratus_ds_2_r = $peratus_aw_gpss_ds_2_r + $peratus_mw_gpss_ds_2_r + $peratus_ew_gpss_ds_2_r + $peratus_cw_gpss_ds_2_r;
            //GPSS Star
            if($total_peratus_ds_2_r >= 80){
                $bintang_r = 5;
            }
            elseif($total_peratus_ds_2_r >= 70 && $total_peratus_ds_2_r <79){
                $bintang_r = 4;
            }
             elseif($total_peratus_ds_2_r >= 60 && $total_peratus_ds_2_r <69){
                $bintang_r = 3;
            }
             elseif($total_peratus_ds_2_r >= 50 && $total_peratus_ds_2_r <59){
                $bintang_r = 2;
            }
             elseif($total_peratus_ds_2_r >= 40 && $total_peratus_ds_2_r <49){
                $bintang_r = 1;
            }
            elseif($total_peratus_ds_2_r <39){
                $bintang_r = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_ds_2_r = $peratus_aw_gpss_ds_2_r + $peratus_mw_gpss_ds_2_r + $peratus_ew_gpss_ds_2_r + $peratus_cw_gpss_ds_2_r;

            //Percentage GPSS Score (Point Requested Construction)
            //Building CATEGORY 2
            $peratus_aw_gpss_cs_2_r = ($aw_cs_r/232) * 0.45 * 100;
            $peratus_mw_gpss_cs_2_r = ($mw_cs_r/232) * 0.20 * 100;
            $peratus_ew_gpss_cs_2_r = ($ew_cs_r/232) * 0.15 * 100;
            $peratus_cw_gpss_cs_2_r = ($cw_cs_r/232) * 0.20 * 100;
            $total_peratus_cs_2_r = $peratus_aw_gpss_cs_2_r + $peratus_mw_gpss_cs_2_r + $peratus_ew_gpss_cs_2_r + $peratus_cw_gpss_cs_2_r;
            //GPSS Star
            if($total_peratus_cs_2_r >= 80){
                $bintang_r = 5;
            }
            elseif($total_peratus_cs_2_r >= 70 && $total_peratus_cs_2_r <79){
                $bintang_r = 4;
            }
             elseif($total_peratus_cs_2_r >= 60 && $total_peratus_cs_2_r <69){
                $bintang_r = 3;
            }
             elseif($total_peratus_cs_2_r >= 50 && $total_peratus_cs_2_r <59){
                $bintang_r = 2;
            }
             elseif($total_peratus_cs_2_r >= 40 && $total_peratus_cs_2_r <49){
                $bintang_r = 1;
            }
            elseif($total_peratus_cs_2_r <39){
                $bintang_r = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_cs_2_r = $peratus_aw_gpss_cs_2_r + $peratus_mw_gpss_cs_2_r + $peratus_ew_gpss_cs_2_r + $peratus_cw_gpss_cs_2_r;

            //Percentage GPSS Score (Point Awarded)
            //Building CATEGORY 2
            $peratus_aw_gpss_pad_2_r = ($aw_pad_r/232) * 0.45 * 100;
            $peratus_mw_gpss_pad_2_r = ($mw_pad_r/232) * 0.20 * 100;
            $peratus_ew_gpss_pad_2_r = ($ew_pad_r/232) * 0.15 * 100;
            $peratus_cw_gpss_pad_2_r = ($cw_pad_r/232) * 0.20 * 100;
            $total_peratus_pad_2_r = $peratus_aw_gpss_pad_2_r + $peratus_mw_gpss_pad_2_r + $peratus_ew_gpss_pad_2_r + $peratus_cw_gpss_pad_2_r;
            //GPSS Star
            if($total_peratus_pad_2_r >= 80){
                $bintang_r = 5;
            }
            elseif($total_peratus_pad_2_r >= 70 && $total_peratus_pad_2_r <79){
                $bintang_r = 4;
            }
             elseif($total_peratus_pad_2_r >= 60 && $total_peratus_pad_2_r <69){
                $bintang_r = 3;
            }
             elseif($total_peratus_pad_2_r >= 50 && $total_peratus_pad_2_r <59){
                $bintang_r = 2;
            }
             elseif($total_peratus_pad_2_r >= 40 && $total_peratus_pad_2_r <49){
                $bintang_r = 1;
            }
            elseif($total_peratus_pad_2_r <39){
                $bintang_r = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_pad_2_r = $peratus_aw_gpss_pad_2_r + $peratus_mw_gpss_pad_2_r + $peratus_ew_gpss_pad_2_r + $peratus_cw_gpss_pad_2_r;

            // dd($aw_cs);
            return view('projek.satu_gpss_bangunan', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans', 'bintang_r',
            'aw_ds', 'mw_ds', 'ew_ds', 'cw_ds', 
            'aw_cs', 'mw_cs', 'ew_cs', 'cw_cs', 
            'aw_pa', 'cw_pa', 'ew_pa', 'mw_pa',
            'aw_pad', 'mw_pad', 'ew_pad', 'cw_pad',  
            'total_ds', 'total_cs', 'total_pa', 'total_pad', 
            'peratus_aw_gpss_ds_2', 'peratus_mw_gpss_ds_2', 'peratus_ew_gpss_ds_2', 'peratus_cw_gpss_ds_2', 'total_peratus_ds_2', 'total_peratus_crest_ds_2',
            'peratus_aw_gpss_cs_2', 'peratus_mw_gpss_cs_2', 'peratus_ew_gpss_cs_2', 'peratus_cw_gpss_cs_2', 'total_peratus_cs_2', 'total_peratus_crest_cs_2',
            'peratus_aw_gpss_pad_2', 'peratus_mw_gpss_pad_2', 'peratus_ew_gpss_pad_2', 'peratus_cw_gpss_pad_2', 'total_peratus_pad_2', 'total_peratus_crest_pad_2',
            'aw_ds_r', 'mw_ds_r', 'ew_ds_r', 'cw_ds_r', 
            'aw_cs_r', 'mw_cs_r', 'ew_cs_r', 'cw_cs_r', 
            'aw_pa_r', 'cw_pa_r', 'ew_pa_r', 'mw_pa_r', 
            'aw_pad_r', 'mw_pad_r', 'ew_pad_r', 'cw_pad_r',
            'total_ds_r', 'total_cs_r', 'total_pa_r', 'total_pad_r',
            'peratus_aw_gpss_ds_2_r', 'peratus_mw_gpss_ds_2_r', 'peratus_ew_gpss_ds_2_r', 'peratus_cw_gpss_ds_2_r', 'total_peratus_ds_2_r', 'total_peratus_crest_ds_2_r',
            'peratus_aw_gpss_cs_2_r', 'peratus_mw_gpss_cs_2_r', 'peratus_ew_gpss_cs_2_r', 'peratus_cw_gpss_cs_2_r', 'total_peratus_cs_2_r', 'total_peratus_crest_cs_2_r',
            'peratus_aw_gpss_pad_2_r', 'peratus_mw_gpss_pad_2_r', 'peratus_ew_gpss_pad_2_r', 'peratus_cw_gpss_pad_2_r', 'total_peratus_pad_2_r', 'total_peratus_crest_pad_2_r' 
        ));         
        } elseif ($projek->kategori ==  'GPSS Bangunan 3') {
            // $gpss_kriterias = GpssKriteria::where('borang', 'like', '%CATEGORY 3%')->get();
            $rekabentuk_kriterias = GpssKriteria::where([
                ['borang','=', 'CATEGORY 3'],
                ['fasa','=', 'rekabentuk'],
            ])->get();    

            $verifikasi_kriterias = GpssKriteria::where([
                ['borang','=', 'CATEGORY 3'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $rayuan_kriterias = GpssKriteria::where([
                ['borang','=', 'CATEGORY 3'],
                ['fasa', '=', 'verifikasi']
            ])->get();  
            
            // Rekabentuk borang CATEGORY 3
            //Point Allocated - Rekabentuk
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 1]])->get();
            $aw_pa = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 2]])->get();
            $mw_pa = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 3]])->get();
            $ew_pa = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 4]])->get();
            $cw_pa = 0;

            //Point Requested (Design) - Rekabentuk
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 1]])->get();
            $aw_ds = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 2]])->get();
            $mw_ds = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 3]])->get();
            $ew_ds = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 4]])->get();
            $cw_ds = 0;

            // Verifikasi borang CATEGORY 3
            //Point Requested (Construction) - Verifikasi
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 1]])->get();
            $aw_cs = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 2]])->get();
            $mw_cs = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 3]])->get();
            $ew_cs = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 4]])->get();
            $cw_cs = 0;

            //Point Awarded - Verifikasi
            $aw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 1]])->get();
            $aw_pad = 0;
            $mw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 2]])->get();
            $mw_pad = 0;
            $ew_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 3]])->get();
            $ew_pad = 0;
            $cw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 4]])->get();
            $cw_pad = 0;

            //Rayuan
            //Point Allocated - Rekabentuk
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 1]])->get();
            $aw_pa_r = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 2]])->get();
            $mw_pa_r = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 3]])->get();
            $ew_pa_r = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 4]])->get();
            $cw_pa_r = 0;

            //Point Requested (Design) - Rekabentuk
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 1]])->get();
            $aw_ds_r = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 2]])->get();
            $mw_ds_r = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 3]])->get();
            $ew_ds_r = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 4]])->get();
            $cw_ds_r = 0;

            //Point Requested (Construction) - Verifikasi
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 1]])->get();
            $aw_cs_r = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 2]])->get();
            $mw_cs_r = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 3]])->get();
            $ew_cs_r = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 4]])->get();
            $cw_cs_r = 0;

            //Point Awarded - Verifikasi
            $aw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 1]])->get();
            $aw_pad_r = 0;
            $mw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 2]])->get();
            $mw_pad_r = 0;
            $ew_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 3]])->get();
            $ew_pad_r = 0;
            $cw_pad_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 4]])->get();
            $cw_pad_r = 0;
            

            //Point Requested (Design & Construction) | Point Allocated
            foreach($aw_kriterias as $aw_kriteria) {                
                $markah_aw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_aw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_aw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_aw_ds_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_aw_cs_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_aw_pa_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_aw_ds){
                    if ($markah_aw_ds->point_req_design > 0) {
                        $aw_ds +=  $markah_aw_ds->point_req_design;
                    }                    
                }  
                if($markah_aw_cs){
                    if ($markah_aw_cs->point_req_construction > 0) {
                        $aw_cs +=  $markah_aw_cs->point_req_construction;
                    }                    
                }  
                if($markah_aw_pa){
                    if ($markah_aw_pa->point_allocated > 0) {
                        $aw_pa += $markah_aw_pa->point_allocated;
                    }                    
                } 
                if($markah_aw_ds_r){
                    if ($markah_aw_ds_r->point_req_design > 0) {
                        $aw_ds_r +=  $markah_aw_ds_r->point_req_design;
                    }                    
                }  
                if($markah_aw_cs_r){
                    if ($markah_aw_cs_r->point_req_construction > 0) {
                        $aw_cs_r +=  $markah_aw_cs_r->point_req_construction;
                    }                    
                }  
                if($markah_aw_pa_r){
                    if ($markah_aw_pa_r->point_allocated > 0) {
                        $aw_pa_r += $markah_aw_pa_r->point_allocated;
                    }                    
                }                          
            }
            foreach($mw_kriterias as $mw_kriteria) {                
                $markah_mw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mw_ds_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mw_cs_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mw_pa_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_mw_ds){
                    if($markah_mw_ds->point_req_design > 0){
                        $mw_ds +=  $markah_mw_ds->point_req_design;
                    }                } 
                if($markah_mw_cs){
                    if($markah_mw_cs->point_req_construction > 0){
                        $mw_cs +=  $markah_mw_cs->point_req_construction;
                    }
                }
                if($markah_mw_pa){
                    if($markah_mw_pa->point_allocated > 0){
                        $mw_pa += $markah_mw_pa->point_allocated;
                    }
                    // dd($markah_mw_pa);
                }
                if($markah_mw_ds_r){
                    if ($markah_mw_ds_r->point_req_design > 0) {
                        $mw_ds_r +=  $markah_mw_ds_r->point_req_design;
                    }                    
                }  
                if($markah_mw_cs_r){
                    if ($markah_mw_cs_r->point_req_construction > 0) {
                        $mw_cs_r +=  $markah_mw_cs_r->point_req_construction;
                    }                    
                }  
                if($markah_mw_pa_r){
                    if ($markah_mw_pa_r->point_allocated > 0) {
                        $mw_pa_r += $markah_mw_pa_r->point_allocated;
                    }                    
                }
            }
            foreach($ew_kriterias as $ew_kriteria) {                
                $markah_ew_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_ds_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_cs_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_pa_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_ew_ds){
                    if($markah_ew_ds->point_req_design){
                        $ew_ds +=  $markah_ew_ds->point_req_design;
                    }
                }
                if($markah_ew_cs){
                    if($markah_ew_cs->point_req_construction > 0){
                        $ew_cs +=  $markah_ew_cs->point_req_construction;
                    }
                }
                if($markah_ew_pa){
                    if($markah_ew_pa->point_allocated > 0){
                        $ew_pa += $markah_ew_pa->point_allocated;
                    }
                } 
                if($markah_ew_ds_r){
                    if ($markah_ew_ds_r->point_req_design > 0) {
                        $ew_ds_r +=  $markah_ew_ds_r->point_req_design;
                    }                    
                }  
                if($markah_ew_cs_r){
                    if ($markah_ew_cs_r->point_req_construction > 0) {
                        $ew_cs_r +=  $markah_ew_cs_r->point_req_construction;
                    }                    
                }  
                if($markah_ew_pa_r){
                    if ($markah_ew_pa_r->point_allocated > 0) {
                        $ew_pa_r += $markah_ew_pa_r->point_allocated;
                    }                    
                }
            }
            foreach($cw_kriterias as $cw_kriteria) {                
                $markah_cw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_cw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_cw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_cw_ds_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_cw_cs_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_cw_pa_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_cw_ds){
                    if($markah_cw_ds->point_req_design > 0){
                        $cw_ds +=  $markah_cw_ds->point_req_design;
                    }
                } 
                if($markah_cw_cs){
                    if($markah_cw_cs->point_req_construction > 0){
                        $cw_cs +=  $markah_cw_cs->point_req_construction;
                    }
                }
                if($markah_cw_pa){
                    if($markah_cw_pa->point_allocated > 0){
                        $cw_pa += $markah_cw_pa->point_allocated;
                    }
                    // dd($markah_aw_pa);
                }
                if($markah_cw_ds_r){
                    if ($markah_cw_ds_r->point_req_design > 0) {
                        $cw_ds_r +=  $markah_cw_ds_r->point_req_design;
                    }                    
                }  
                if($markah_cw_cs_r){
                    if ($markah_cw_cs_r->point_req_construction > 0) {
                        $cw_cs_r +=  $markah_cw_cs_r->point_req_construction;
                    }                    
                }  
                if($markah_cw_pa_r){
                    if ($markah_cw_pa_r->point_allocated > 0) {
                        $cw_pa_r += $markah_cw_pa_r->point_allocated;
                    }                    
                }
            }

            // //Point Awarded
            foreach($aw_pad_kriterias as $aw) {
                $markah_aw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw->id],['fasa','=','verifikasi']])->first();
                $markah_aw_pad_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw->id],['fasa','=','verifikasi']])->first();

                if($markah_aw_pad){
                    if($markah_aw_pad->point_awarded > 0){
                        $aw_pad +=  $markah_aw_pad->point_awarded;
                    }
                }
                if($markah_aw_pad_r){
                    if($markah_aw_pad_r->point_awarded > 0){
                        $aw_pad_r +=  $markah_aw_pad_r->point_awarded;
                    }
                }  
            }
            foreach($mw_pad_kriterias as $mw) {
                $markah_mw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw->id],['fasa','=','verifikasi']])->first();
                $markah_mw_pad_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw->id],['fasa','=','verifikasi']])->first();

                if($markah_mw_pad){
                    if($markah_mw_pad->point_awarded > 0){
                        $mw_pad +=  $markah_mw_pad->point_awarded;
                    }
                }
                if($markah_mw_pad_r){
                    if($markah_mw_pad_r->point_awarded > 0){
                        $mw_pad_r +=  $markah_mw_pad_r->point_awarded;
                    }
                }  
            }
            foreach($ew_pad_kriterias as $ew) {
                $markah_ew_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew->id],['fasa','=','verifikasi']])->first();
                $markah_ew_pad_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew->id],['fasa','=','verifikasi']])->first();

                if($markah_ew_pad){
                    if($markah_ew_pad->point_awarded > 0){
                        $ew_pad +=  $markah_ew_pad->point_awarded;
                    }
                } 
                if($markah_ew_pad_r){
                    if($markah_ew_pad_r->point_awarded > 0){
                        $ew_pad_r +=  $markah_ew_pad_r->point_awarded;
                    }
                } 
            }
            foreach($cw_pad_kriterias as $cw) {
                $markah_cw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw->id],['fasa','=','verifikasi']])->first();
                $markah_cw_pad_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw->id],['fasa','=','verifikasi']])->first();

                if($markah_cw_pad){
                    if($markah_cw_pad->point_awarded > 0){
                        $cw_pad +=  $markah_cw_pad->point_awarded;
                    }
                } 
                if($markah_cw_pad_r){
                    if($markah_cw_pad_r->point_awarded > 0){
                        $cw_pad_r +=  $markah_cw_pad_r->point_awarded;
                    }
                } 
            }

            
            //Total Design Stage
            $total_ds = $aw_ds + $mw_ds + $ew_ds + $cw_ds;
            //Total Construction Stage 
            $total_cs = $aw_cs + $mw_cs + $ew_cs + $cw_cs; 
            //Total Point Allocated
            $total_pa = $aw_pa + $mw_pa + $ew_pa + $cw_pa;
            //Total Point Awarded
            $total_pad = $aw_pad + $mw_pad + $ew_pad + $cw_pad;

            //Rayuan
            //Total Design Stage
            $total_ds_r = $aw_ds_r + $mw_ds_r + $ew_ds_r + $cw_ds_r;
            //Total Construction Stage 
            $total_cs_r = $aw_cs_r + $mw_cs_r + $ew_cs_r + $cw_cs_r; 
            //Total Point Allocated
            $total_pa_r = $aw_pa_r + $mw_pa_r + $ew_pa_r + $cw_pa_r;
            //Total Point Awarded
            $total_pad_r = $aw_pad_r + $mw_pad_r + $ew_pad_r + $cw_pad_r;

            //Percentage GPSS Score (Point Requested Design)
            //Building CATEGORY 3
            $peratus_aw_gpss_ds_3 = ($aw_ds/232) * 0.45 * 100;
            $peratus_mw_gpss_ds_3 = ($mw_ds/232) * 0.20 * 100;
            $peratus_ew_gpss_ds_3 = ($ew_ds/232) * 0.15 * 100;
            $peratus_cw_gpss_ds_3 = ($cw_ds/232) * 0.20 * 100;
            $total_peratus_ds_3 = $peratus_aw_gpss_ds_3 + $peratus_mw_gpss_ds_3 + $peratus_ew_gpss_ds_3 + $peratus_cw_gpss_ds_3;
            //GPSS Star
            if($total_peratus_ds_3 >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_ds_3 >= 70 && $total_peratus_ds_3 <79){
                $bintang = 4;
            }
             elseif($total_peratus_ds_3 >= 60 && $total_peratus_ds_3 <69){
                $bintang = 3;
            }
             elseif($total_peratus_ds_3 >= 50 && $total_peratus_ds_3 <59){
                $bintang = 2;
            }
             elseif($total_peratus_ds_3 >= 40 && $total_peratus_ds_3 <49){
                $bintang = 1;
            }
            elseif($total_peratus_ds_3 <39){
                $bintang = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_ds_3 = $peratus_aw_gpss_ds_3 + $peratus_mw_gpss_ds_3 + $peratus_ew_gpss_ds_3 + $peratus_cw_gpss_ds_3;

            //Percentage GPSS Score (Point Requested Construction)
            //Building CATEGORY 3
            $peratus_aw_gpss_cs_3 = ($aw_cs/232) * 0.45 * 100;
            $peratus_mw_gpss_cs_3 = ($mw_cs/232) * 0.20 * 100;
            $peratus_ew_gpss_cs_3 = ($ew_cs/232) * 0.15 * 100;
            $peratus_cw_gpss_cs_3 = ($cw_cs/232) * 0.20 * 100;
            $total_peratus_cs_3 = $peratus_aw_gpss_cs_3 + $peratus_mw_gpss_cs_3 + $peratus_ew_gpss_cs_3 + $peratus_cw_gpss_cs_3;
            //GPSS Star
            if($total_peratus_cs_3 >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_cs_3 >= 70 && $total_peratus_cs_3 <79){
                $bintang = 4;
            }
             elseif($total_peratus_cs_3 >= 60 && $total_peratus_cs_3 <69){
                $bintang = 3;
            }
             elseif($total_peratus_cs_3 >= 50 && $total_peratus_cs_3 <59){
                $bintang = 2;
            }
             elseif($total_peratus_cs_3 >= 40 && $total_peratus_cs_3 <49){
                $bintang = 1;
            }
            elseif($total_peratus_cs_3 <39){
                $bintang = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_cs_3 = $peratus_aw_gpss_cs_3 + $peratus_mw_gpss_cs_3 + $peratus_ew_gpss_cs_3 + $peratus_cw_gpss_cs_3;

            //Percentage GPSS Score (Point Awarded)
            //Building CATEGORY 3
            $peratus_aw_gpss_pad_3 = ($aw_pad/232) * 0.45 * 100;
            $peratus_mw_gpss_pad_3 = ($mw_pad/232) * 0.20 * 100;
            $peratus_ew_gpss_pad_3 = ($ew_pad/232) * 0.15 * 100;
            $peratus_cw_gpss_pad_3 = ($cw_pad/232) * 0.20 * 100;
            $total_peratus_pad_3 = $peratus_aw_gpss_pad_3 + $peratus_mw_gpss_pad_3 + $peratus_ew_gpss_pad_3 + $peratus_cw_gpss_pad_3;
            //GPSS Star
            if($total_peratus_pad_3 >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_pad_3 >= 70 && $total_peratus_pad_3 <79){
                $bintang = 4;
            }
             elseif($total_peratus_pad_3 >= 60 && $total_peratus_pad_3 <69){
                $bintang = 3;
            }
             elseif($total_peratus_pad_3 >= 50 && $total_peratus_pad_3 <59){
                $bintang = 2;
            }
             elseif($total_peratus_pad_3 >= 40 && $total_peratus_pad_3 <49){
                $bintang = 1;
            }
            elseif($total_peratus_pad_3 <39){
                $bintang = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_pad_3 = $peratus_aw_gpss_pad_3 + $peratus_mw_gpss_pad_3 + $peratus_ew_gpss_pad_3 + $peratus_cw_gpss_pad_3;

            //Rayuan//
            //Percentage GPSS Score (Point Requested Design)
            //Building CATEGORY 3
            $peratus_aw_gpss_ds_3_r = ($aw_ds_r/232) * 0.45 * 100;
            $peratus_mw_gpss_ds_3_r = ($mw_ds_r/232) * 0.20 * 100;
            $peratus_ew_gpss_ds_3_r = ($ew_ds_r/232) * 0.15 * 100;
            $peratus_cw_gpss_ds_3_r = ($cw_ds_r/232) * 0.20 * 100;
            $total_peratus_ds_3_r = $peratus_aw_gpss_ds_3_r + $peratus_mw_gpss_ds_3_r + $peratus_ew_gpss_ds_3_r + $peratus_cw_gpss_ds_3_r;
            //GPSS Star
            if($total_peratus_ds_3_r >= 80){
                $bintang_r = 5;
            }
            elseif($total_peratus_ds_3_r >= 70 && $total_peratus_ds_3_r <79){
                $bintang_r = 4;
            }
             elseif($total_peratus_ds_3_r >= 60 && $total_peratus_ds_3_r <69){
                $bintang_r = 3;
            }
             elseif($total_peratus_ds_3_r >= 50 && $total_peratus_ds_3_r <59){
                $bintang_r = 2;
            }
             elseif($total_peratus_ds_3_r >= 40 && $total_peratus_ds_3_r <49){
                $bintang_r = 1;
            }
            elseif($total_peratus_ds_3_r <39){
                $bintang_r = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_ds_3_r = $peratus_aw_gpss_ds_3_r + $peratus_mw_gpss_ds_3_r + $peratus_ew_gpss_ds_3_r + $peratus_cw_gpss_ds_3_r;

            //Percentage GPSS Score (Point Requested Construction)
            //Building CATEGORY 3
            $peratus_aw_gpss_cs_3_r = ($aw_cs_r/232) * 0.45 * 100;
            $peratus_mw_gpss_cs_3_r = ($mw_cs_r/232) * 0.20 * 100;
            $peratus_ew_gpss_cs_3_r = ($ew_cs_r/232) * 0.15 * 100;
            $peratus_cw_gpss_cs_3_r = ($cw_cs_r/232) * 0.20 * 100;
            $total_peratus_cs_3_r = $peratus_aw_gpss_cs_3_r + $peratus_mw_gpss_cs_3_r + $peratus_ew_gpss_cs_3_r + $peratus_cw_gpss_cs_3_r;
            //GPSS Star
            if($total_peratus_cs_3_r >= 80){
                $bintang_r = 5;
            }
            elseif($total_peratus_cs_3_r >= 70 && $total_peratus_cs_3_r <79){
                $bintang_r = 4;
            }
             elseif($total_peratus_cs_3_r >= 60 && $total_peratus_cs_3_r <69){
                $bintang_r = 3;
            }
             elseif($total_peratus_cs_3_r >= 50 && $total_peratus_cs_3_r <59){
                $bintang_r = 2;
            }
             elseif($total_peratus_cs_3_r >= 40 && $total_peratus_cs_3_r <49){
                $bintang_r = 1;
            }
            elseif($total_peratus_cs_3_r <39){
                $bintang_r = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_cs_3_r = $peratus_aw_gpss_cs_3_r + $peratus_mw_gpss_cs_3_r + $peratus_ew_gpss_cs_3_r + $peratus_cw_gpss_cs_3_r;

            //Percentage GPSS Score (Point Awarded)
            //Building CATEGORY 3
            $peratus_aw_gpss_pad_3_r = ($aw_pad_r/232) * 0.45 * 100;
            $peratus_mw_gpss_pad_3_r = ($mw_pad_r/232) * 0.20 * 100;
            $peratus_ew_gpss_pad_3_r = ($ew_pad_r/232) * 0.15 * 100;
            $peratus_cw_gpss_pad_3_r = ($cw_pad_r/232) * 0.20 * 100;
            $total_peratus_pad_3_r = $peratus_aw_gpss_pad_3_r + $peratus_mw_gpss_pad_3_r + $peratus_ew_gpss_pad_3_r + $peratus_cw_gpss_pad_3_r;
            //GPSS Star
            if($total_peratus_pad_3_r >= 80){
                $bintang_r = 5;
            }
            elseif($total_peratus_pad_3_r >= 70 && $total_peratus_pad_3_r <79){
                $bintang_r = 4;
            }
             elseif($total_peratus_pad_3_r >= 60 && $total_peratus_pad_3_r <69){
                $bintang_r = 3;
            }
             elseif($total_peratus_pad_3_r >= 50 && $total_peratus_pad_3_r <59){
                $bintang_r = 2;
            }
             elseif($total_peratus_pad_3_r >= 40 && $total_peratus_pad_3_r <49){
                $bintang_r = 1;
            }
            elseif($total_peratus_pad_3_r <39){
                $bintang_r = 0;
            }

            //MyCrest Star (Point Requested Design)
            $total_peratus_crest_pad_3_r = $peratus_aw_gpss_pad_3_r + $peratus_mw_gpss_pad_3_r + $peratus_ew_gpss_pad_3_r + $peratus_cw_gpss_pad_3_r;

            // dd($aw_cs);
            return view('projek.satu_gpss_bangunan', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans', 'bintang_r',
            'aw_ds', 'mw_ds', 'ew_ds', 'cw_ds', 
            'aw_cs', 'mw_cs', 'ew_cs', 'cw_cs', 
            'aw_pa', 'cw_pa', 'ew_pa', 'mw_pa',
            'aw_pad', 'mw_pad', 'ew_pad', 'cw_pad',  
            'total_ds', 'total_cs', 'total_pa', 'total_pad', 
            'peratus_aw_gpss_ds_3', 'peratus_mw_gpss_ds_3', 'peratus_ew_gpss_ds_3', 'peratus_cw_gpss_ds_3', 'total_peratus_ds_3', 'total_peratus_crest_ds_3',
            'peratus_aw_gpss_cs_3', 'peratus_mw_gpss_cs_3', 'peratus_ew_gpss_cs_3', 'peratus_cw_gpss_cs_3', 'total_peratus_cs_3', 'total_peratus_crest_cs_3',
            'peratus_aw_gpss_pad_3', 'peratus_mw_gpss_pad_3', 'peratus_ew_gpss_pad_3', 'peratus_cw_gpss_pad_3', 'total_peratus_pad_3', 'total_peratus_crest_pad_3',
            'aw_ds_r', 'mw_ds_r', 'ew_ds_r', 'cw_ds_r', 
            'aw_cs_r', 'mw_cs_r', 'ew_cs_r', 'cw_cs_r', 
            'aw_pa_r', 'cw_pa_r', 'ew_pa_r', 'mw_pa_r', 
            'aw_pad_r', 'mw_pad_r', 'ew_pad_r', 'cw_pad_r',
            'total_ds_r', 'total_cs_r', 'total_pa_r', 'total_pad_r',
            'peratus_aw_gpss_ds_3_r', 'peratus_mw_gpss_ds_3_r', 'peratus_ew_gpss_ds_3_r', 'peratus_cw_gpss_ds_3_r', 'total_peratus_ds_3_r', 'total_peratus_crest_ds_3_r',
            'peratus_aw_gpss_cs_3_r', 'peratus_mw_gpss_cs_3_r', 'peratus_ew_gpss_cs_3_r', 'peratus_cw_gpss_cs_3_r', 'total_peratus_cs_3_r', 'total_peratus_crest_cs_3_r',
            'peratus_aw_gpss_pad_3_r', 'peratus_mw_gpss_pad_3_r', 'peratus_ew_gpss_pad_3_r', 'peratus_cw_gpss_pad_3_r', 'total_peratus_pad_3_r', 'total_peratus_crest_pad_3_r'
        ));   
        } elseif ($projek->kategori ==  'GPSS Jalan') {
            // $gpss_kriterias = GpssKriteria::where('borang', 'like', 'ROAD')->get();
            $rekabentuk_kriterias = GpssKriteria::where([
                ['borang','=', 'ROAD'],
                ['fasa','=', 'rekabentuk'],
            ])->get();    

            $verifikasi_kriterias = GpssKriteria::where([
                ['borang','=', 'ROAD'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $rayuan_kriterias = GpssKriteria::where([
                ['borang','=', 'ROAD'],
                ['fasa', '=', 'verifikasi']
            ])->get();   
            
            // Rekabentuk borang ROAD
            $rw_kriterias = GpssKriteria::where([['borang','=', 'ROAD'],['element_seq','=', 1]])->get();
            $rw_pa = 0;
            $sw_kriterias = GpssKriteria::where([['borang','=', 'ROAD'],['element_seq','=', 2]])->get();
            $sw_pa = 0;

            $rw_kriterias = GpssKriteria::where([['borang','=', 'ROAD'],['element_seq','=', 1]])->get();
            $rw_ds = 0;
            $sw_kriterias = GpssKriteria::where([['borang','=', 'ROAD'],['element_seq','=', 2]])->get();
            $sw_ds = 0;

            // Verifikasi borang ROAD
            $rw_kriterias = GpssKriteria::where([['borang','=', 'ROAD'],['element_seq','=', 1]])->get();
            $rw_cs = 0;
            $sw_kriterias = GpssKriteria::where([['borang','=', 'ROAD'],['element_seq','=', 2]])->get();
            $sw_cs = 0;

            // Verifikasi Point Awarded
            $rw_kriterias = GpssKriteria::where([['borang','=', 'ROAD'],['element_seq','=', 1]])->get();
            $rw_pad = 0;
            $sw_kriterias = GpssKriteria::where([['borang','=', 'ROAD'],['element_seq','=', 2]])->get();
            $sw_pad = 0;

            //Rayuan
            // Rekabentuk borang ROAD
            $rw_kriterias = GpssKriteria::where([['borang','=', 'ROAD'],['element_seq','=', 1]])->get();
            $rw_pa_r = 0;
            $sw_kriterias = GpssKriteria::where([['borang','=', 'ROAD'],['element_seq','=', 2]])->get();
            $sw_pa_r = 0;

            $rw_kriterias = GpssKriteria::where([['borang','=', 'ROAD'],['element_seq','=', 1]])->get();
            $rw_ds_r = 0;
            $sw_kriterias = GpssKriteria::where([['borang','=', 'ROAD'],['element_seq','=', 2]])->get();
            $sw_ds_r = 0;

            // Verifikasi borang ROAD
            $rw_kriterias = GpssKriteria::where([['borang','=', 'ROAD'],['element_seq','=', 1]])->get();
            $rw_cs_r = 0;
            $sw_kriterias = GpssKriteria::where([['borang','=', 'ROAD'],['element_seq','=', 2]])->get();
            $sw_cs_r = 0;

            // Verifikasi Point Awarded
            $rw_kriterias = GpssKriteria::where([['borang','=', 'ROAD'],['element_seq','=', 1]])->get();
            $rw_pad_r = 0;
            $sw_kriterias = GpssKriteria::where([['borang','=', 'ROAD'],['element_seq','=', 2]])->get();
            $sw_pad_r = 0;

            //Point Allocated
            foreach($rw_kriterias as $rw_kriteria) {
                $markah_rw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $rw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_rw_pa_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $rw_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_rw_pa){
                    if($markah_rw_pa->point_allocated > 0){
                        $rw_pa +=  $markah_rw_pa->point_allocated;
                    }
                }
                if($markah_rw_pa_r){
                    if($markah_rw_pa_r->point_allocated > 0){
                        $rw_pa_r +=  $markah_rw_pa_r->point_allocated;
                    }
                }  
            }
            foreach($sw_kriterias as $sw_kriteria) {
                $markah_sw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $sw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sw_pa_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $sw_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_sw_pa){
                    if($markah_sw_pa->point_allocated > 0){
                        $sw_pa +=  $markah_sw_pa->point_allocated;
                    }
                } 
                if($markah_sw_pa_r){
                    if($markah_sw_pa_r->point_allocated > 0){
                        $sw_pa_r +=  $markah_sw_pa_r->point_allocated;
                    }
                }
            }

            //Point Requested (Design/Construction)
            foreach($rw_kriterias as $rw_kriteria) {                
                $markah_rw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $rw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_rw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $rw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_rw_ds_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $rw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_rw_cs_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $rw_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_rw_ds){
                    if($markah_rw_ds->point_req_design > 0){
                        $rw_ds +=  $markah_rw_ds->point_req_design;
                    }
                } 
                if ($markah_rw_cs){
                    if($markah_rw_cs->point_req_construction > 0){
                        $rw_cs += $markah_rw_cs->point_req_construction;
                    }
                } 
                if($markah_rw_ds_r){
                    if($markah_rw_ds_r->point_req_design > 0){
                        $rw_ds_r +=  $markah_rw_ds_r->point_req_design;
                    }
                } 
                if ($markah_rw_cs_r){
                    if($markah_rw_cs_r->point_req_construction > 0){
                        $rw_cs_r += $markah_rw_cs_r->point_req_construction;
                    }
                }                                
            }
            foreach($sw_kriterias as $sw_kriteria) {                
                $markah_sw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $sw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $sw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sw_ds_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $sw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sw_cs_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $sw_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_sw_ds){
                    if($markah_sw_ds->point_req_design > 0){
                        $sw_ds +=  $markah_sw_ds->point_req_design;
                    }
                } 
                if ($markah_sw_cs){
                    if($markah_sw_cs->point_req_construction > 0){
                        $sw_cs += $markah_sw_cs->point_req_construction;
                    }
                }
                if($markah_sw_ds_r){
                    if($markah_sw_ds_r->point_req_design > 0){
                        $sw_ds_r +=  $markah_sw_ds_r->point_req_design;
                    }
                } 
                if ($markah_sw_cs_r){
                    if($markah_sw_cs_r->point_req_construction > 0){
                        $sw_cs_r += $markah_sw_cs_r->point_req_construction;
                    }
                }
            }

            //Point Awarded
            foreach($rw_kriterias as $rw_kriteria) {
                $markah_rw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $rw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_rw_pad_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $rw_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_rw_pad){
                    if($markah_rw_pad->point_awarded > 0){
                        $rw_pad +=  $markah_rw_pad->point_awarded;
                    }
                }
                if($markah_rw_pad_r){
                    if($markah_rw_pad_r->point_awarded > 0){
                        $rw_pad_r +=  $markah_rw_pad->point_awarded;
                    }
                } 
            }
            foreach($sw_kriterias as $sw_kriteria) {
                $markah_sw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $sw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sw_pad_r = GpssMarkahRayuan::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $sw_kriteria->id],['fasa','=','verifikasi']])->first();

                if($markah_sw_pad){
                    if($markah_sw_pad->point_awarded > 0){
                        $sw_pad +=  $markah_sw_pad->point_awarded;
                    }
                } 
                if($markah_sw_pad_r){
                    if($markah_sw_pad_r->point_awarded > 0){
                        $sw_pad_r +=  $markah_sw_pad_r->point_awarded;
                    }
                }
            }

            //Total Point Allocated
            $total_pa = $rw_pa + $sw_pa;
            //Total Design Stage
            $total_ds = $rw_ds + $sw_ds;
            //Total Construction Stage
            $total_cs = $rw_cs + $sw_cs;
            //Total Point Awarded
            $total_pad = $rw_pad + $sw_pad;

            //Rayuan
            //Total Point Allocated
            $total_pa_r = $rw_pa_r + $sw_pa_r;
            //Total Design Stage
            $total_ds_r = $rw_ds_r + $sw_ds_r;
            //Total Construction Stage
            $total_cs_r = $rw_cs_r + $sw_cs_r;
            //Total Point Awarded
            $total_pad_r = $rw_pad_r + $sw_pad_r;
            
            //Percentage GPSS Score (Point Requested Design)
            //Road
            $peratus_rw_ds = ($rw_ds/232) * 0.33 * 100;
            $peratus_sw_ds = ($sw_ds/232) * 0.33 * 100;
            $total_peratus_road_ds = $peratus_rw_ds + $peratus_sw_ds;

            //GPSS Star
            if($total_peratus_road_ds >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_road_ds >= 70 && $total_peratus_road_ds <79){
                $bintang = 4;
            }
             elseif($total_peratus_road_ds >= 50 && $total_peratus_road_ds <69){
                $bintang = 3;
            }
             elseif($total_peratus_road_ds >= 30 && $total_peratus_road_ds <49){
                $bintang = 2;
            }
             elseif($total_peratus_road_ds >= 10 && $total_peratus_road_ds <29){
                $bintang = 1;
            }
            elseif($total_peratus_road_ds <10){
                $bintang = 0;
            }

            //MyCrest Star
            $total_peratus_crest_ds = $peratus_rw_ds + $peratus_sw_ds;

            //Percentage GPSS Score (Point Requested Construction)
            //Road
            $peratus_rw_cs = ($rw_cs/232) * 0.33 * 100;
            $peratus_sw_cs = ($sw_cs/232) * 0.33 * 100;
            $total_peratus_road_cs = $peratus_rw_cs + $peratus_sw_cs;

            //GPSS Star
            if($total_peratus_road_cs >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_road_cs >= 70 && $total_peratus_road_cs <79){
                $bintang = 4;
            }
             elseif($total_peratus_road_cs >= 50 && $total_peratus_road_cs <69){
                $bintang = 3;
            }
             elseif($total_peratus_road_cs >= 30 && $total_peratus_road_cs <49){
                $bintang = 2;
            }
             elseif($total_peratus_road_cs >= 10 && $total_peratus_road_cs <29){
                $bintang = 1;
            }
            elseif($total_peratus_road_cs <10){
                $bintang = 0;
            }

            //MyCrest Star
            $total_peratus_crest_cs = $peratus_rw_cs + $peratus_sw_cs;

            //Percentage GPSS Score (Point Awarded)
            //Road
            $peratus_rw_pad = ($rw_pad/232) * 0.33 * 100;
            $peratus_sw_pad = ($sw_pad/232) * 0.33 * 100;
            $total_peratus_road_pad = $peratus_rw_pad + $peratus_sw_pad;

            //GPSS Star
            if($total_peratus_road_pad >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_road_pad >= 70 && $total_peratus_road_pad <79){
                $bintang = 4;
            }
             elseif($total_peratus_road_pad >= 50 && $total_peratus_road_pad <69){
                $bintang = 3;
            }
             elseif($total_peratus_road_pad >= 30 && $total_peratus_road_pad <49){
                $bintang = 2;
            }
             elseif($total_peratus_road_pad >= 10 && $total_peratus_road_pad <29){
                $bintang = 1;
            }
            elseif($total_peratus_road_pad <10){
                $bintang = 0;
            }

            //MyCrest Star
            $total_peratus_crest_pad = $peratus_rw_pad + $peratus_sw_pad;

            //Rayuan
            //Percentage GPSS Score (Point Requested Design)
            //Road
            $peratus_rw_ds_r = ($rw_ds_r/232) * 0.33 * 100;
            $peratus_sw_ds_r = ($sw_ds_r/232) * 0.33 * 100;
            $total_peratus_road_ds_r = $peratus_rw_ds_r + $peratus_sw_ds_r;

            //GPSS Star
            if($total_peratus_road_ds_r >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_road_ds_r >= 70 && $total_peratus_road_ds_r <79){
                $bintang = 4;
            }
             elseif($total_peratus_road_ds_r >= 50 && $total_peratus_road_ds_r <69){
                $bintang = 3;
            }
             elseif($total_peratus_road_ds_r >= 30 && $total_peratus_road_ds_r <49){
                $bintang = 2;
            }
             elseif($total_peratus_road_ds_r >= 10 && $total_peratus_road_ds_r <29){
                $bintang = 1;
            }
            elseif($total_peratus_road_ds_r <10){
                $bintang = 0;
            }

            //MyCrest Star
            $total_peratus_crest_ds_r = $peratus_rw_ds_r + $peratus_sw_ds_r;

            //Percentage GPSS Score (Point Requested Construction)
            //Road
            $peratus_rw_cs_r = ($rw_cs_r/232) * 0.33 * 100;
            $peratus_sw_cs_r = ($sw_cs_r/232) * 0.33 * 100;
            $total_peratus_road_cs_r = $peratus_rw_cs_r + $peratus_sw_cs_r;

            //GPSS Star
            if($total_peratus_road_cs_r >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_road_cs_r >= 70 && $total_peratus_road_cs_r <79){
                $bintang = 4;
            }
             elseif($total_peratus_road_cs_r >= 50 && $total_peratus_road_cs_r <69){
                $bintang = 3;
            }
             elseif($total_peratus_road_cs_r >= 30 && $total_peratus_road_cs_r <49){
                $bintang = 2;
            }
             elseif($total_peratus_road_cs_r >= 10 && $total_peratus_road_cs_r <29){
                $bintang = 1;
            }
            elseif($total_peratus_road_cs_r <10){
                $bintang = 0;
            }

            //MyCrest Star
            $total_peratus_crest_cs_r = $peratus_rw_cs_r + $peratus_sw_cs_r;

            //Percentage GPSS Score (Point Awarded)
            //Road
            $peratus_rw_pad_r = ($rw_pad_r/232) * 0.33 * 100;
            $peratus_sw_pad_r = ($sw_pad_r/232) * 0.33 * 100;
            $total_peratus_road_pad_r = $peratus_rw_pad_r + $peratus_sw_pad_r;

            //GPSS Star
            if($total_peratus_road_pad_r >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_road_pad_r >= 70 && $total_peratus_road_pad_r <79){
                $bintang = 4;
            }
             elseif($total_peratus_road_pad_r >= 50 && $total_peratus_road_pad_r <69){
                $bintang = 3;
            }
             elseif($total_peratus_road_pad_r >= 30 && $total_peratus_road_pad_r <49){
                $bintang = 2;
            }
             elseif($total_peratus_road_pad_r >= 10 && $total_peratus_road_pad_r <29){
                $bintang = 1;
            }
            elseif($total_peratus_road_pad_r <10){
                $bintang = 0;
            }

            //MyCrest Star
            $total_peratus_crest_pad_r = $peratus_rw_pad_r + $peratus_sw_pad_r;

            return view('projek.satu_gpss_jalan', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans', 'bintang',
            'rw_pa', 'sw_pa','rw_ds', 'sw_ds', 'rw_cs', 'sw_cs', 'rw_pad', 'sw_pad', 
            'total_ds', 'total_cs', 'total_pad', 'total_pa', 
            'peratus_rw_ds', 'peratus_sw_ds', 'peratus_rw_cs', 'peratus_sw_cs', 'peratus_rw_pad', 'peratus_sw_pad',
            'total_peratus_road_ds', 'total_peratus_crest_ds', 'total_peratus_road_cs', 'total_peratus_crest_cs','total_peratus_road_pad', 'total_peratus_crest_pad',
            'rw_pa_r', 'sw_pa_r','rw_ds_r', 'sw_ds_r', 'rw_cs_r', 'sw_cs_r', 'rw_pad_r', 'sw_pad_r', 
            'total_ds_r', 'total_cs_r', 'total_pad_r', 'total_pa_r', 
            'peratus_rw_ds_r', 'peratus_sw_ds_r', 'peratus_rw_cs_r', 'peratus_sw_cs_r', 'peratus_rw_pad_r', 'peratus_sw_pad_r',
            'total_peratus_road_ds_r', 'total_peratus_crest_ds_r', 'total_peratus_road_cs_r', 'total_peratus_crest_cs_r','total_peratus_road_pad_r', 'total_peratus_crest_pad_r',
        ));       
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

        alert()->success('Lantikan telah dilakukan', 'Berjaya');
        return back();
    }

    //Modul 3 - EPH Bangunan
    public function markah_eph(Request $request) {
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
        $markah->markah_bei = $request->markah_bei;

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

        alert()->success('Markah Disimpan', 'Berjaya');

        return back();
    }    

    public function markah_eph_rayuan(Request $request){
        $user = $request->user();
        $id = (int)$request->route('id');

        // $kriteria = Kriteria::find($id);

        $kriteria = Kriteria::find($request->kriteria);
        if ($request->markah_rekabentuk >$kriteria->maksimum) {
            Alert::error('Salah Markah Rekabentuk', 'Sila letakkan markah kurang dari maksimum');
            return back();
        }
        $kriteria = Kriteria::find($request->kriteria);
        if ($request->markah_verifikasi >$kriteria->maksimum) {
            Alert::error('Salah Markah Verifikasi', 'Sila letakkan markah kurang dari maksimum');
            return back();
        }
        $kriteria = Kriteria::find($request->kriteria);
        if ($request->markah_validasi >$kriteria->maksimum) {
            Alert::error('Salah Markah Validasi', 'Sila letakkan markah kurang dari maksimum');
            return back();
        }
        // if ($request->markah_bei >$kriteria->maksimum) {
        //     Alert::error('Salah Markah BEI', 'Sila letakkan markah kurang dari maksimum');
        //     return back();
        // }

        $markah = New MarkahRayuan;
        $markah->projek_id = $id;
        $markah->user_id = $user->id;
        $markah->kriteria_id = $request->kriteria;
        $markah->ulasan = $request->ulasan;
        $markah->fasa = $request->fasa;
        $markah->markah_rekabentuk = $request->markah_rekabentuk;
        $markah->markah_verifikasi = $request->markah_verifikasi;
        $markah->markah_validasi = $request->markah_validasi;
        $markah->markah_bei_rekabentuk = $request->markah_bei_rekabentuk;
        $markah->markah_bei_verifikasi = $request->markah_bei_verifikasi;
        $markah->markah_bei_validasi = $request->markah_bei_validasi;

        
        if ($request->hasFile('dokumen1')) {
            $markah->dokumen1 = $request->file('dokumen1')->store('jkr-ephjkr/uploads');
        } 
        // else {
        //     if ($request->markah_rekabentuk > 0) {
        //         Alert::error('Dokumen diperlukan', 'Jika markah melebihi 0, silakan letakkan sekurang-kurangnya satu dokumen lampiran');
        //         return back();
        //     }
        //     if ($request->markah_verifikasi > 0) {
        //         Alert::error('Dokumen diperlukan', 'Jika markah melebihi 0, silakan letakkan sekurang-kurangnya satu dokumen lampiran');
        //         return back();
        //     }
        //     if ($request->markah_validasi > 0) {
        //         Alert::error('Dokumen diperlukan', 'Jika markah melebihi 0, silakan letakkan sekurang-kurangnya satu dokumen lampiran');
        //         return back();
        //     }            
        // } 
           
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

        // dd($dokumen1);
        $markah->save();

        alert()->success('Markah Disimpan', 'Berjaya');

        return back(); 
    }

    //Modul 4 - GPSS Bangunan/GPSS Jalan
    public function markah_gpss(Request $request) {
        $user = $request->user();
        $id = (int)$request->route('id');

        $gpss_kriteria = GpssKriteria::find($request->gpss_kriteria);
        if ($request->point_allocated >$gpss_kriteria->maksimum) {
            Alert::error('Salah Markah Point Allocated', 'Sila letakkan markah kurang dari maksimum');
            return back();
        }
        if ($request->point_req_design >$gpss_kriteria->maksimum) {
            Alert::error('Salah Markah Point Requested Design', 'Sila letakkan markah kurang dari maksimum');
            return back();
        }
        if ($request->point_req_construction >$gpss_kriteria->maksimum) {
            Alert::error('Salah Markah Point Requested Construction', 'Sila letakkan markah kurang dari maksimum');
            return back();
        }
        if ($request->point_awarded >$gpss_kriteria->maksimum) {
            Alert::error('Salah Markah Point Awarded', 'Sila letakkan markah kurang dari maksimum');
            return back();
        }

        $markah = New GpssMarkah;
        $markah->projek_id = $id;
        $markah->user_id = $user->id;
        $markah->gpss_kriteria_id = $request->gpss_kriteria;
        $markah->fasa = $request->fasa;
        $markah->point_allocated = $request->point_allocated;
        $markah->point_req_design = $request->point_req_design;
        $markah->point_req_construction = $request->point_req_construction;
        $markah->point_awarded = $request->point_awarded;
        $markah->remarks = $request->remarks;
        $markah->comment_on_appeal = $request->comment_on_appeal;

        if ($request->hasFile('dokumen1')) {
            $markah->dokumen1 = $request->file('dokumen1')->store('jkr-ephjkr/uploads');
        } else {
            if ($request->point_allocated > 0 || $request->point_req_design > 0 || $request->point_req_construction > 0 || $request->point_awarded > 0) {
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

        alert()->success('Markah Disimpan', 'Berjaya');

        return back();
    }

    public function markah_gpss_rayuan(Request $request) {
        $user = $request->user();
        $id = (int)$request->route('id');

        $gpss_kriteria = GpssKriteria::find($request->gpss_kriteria);
        if ($request->point_allocated >$gpss_kriteria->maksimum) {
            Alert::error('Salah Markah Point Allocated', 'Sila letakkan markah kurang dari maksimum');
            return back();
        }
        $gpss_kriteria = GpssKriteria::find($request->gpss_kriteria);
        if ($request->point_req_design >$gpss_kriteria->maksimum) {
            Alert::error('Salah Markah Point Requested Design', 'Sila letakkan markah kurang dari maksimum');
            return back();
        }
        $gpss_kriteria = GpssKriteria::find($request->gpss_kriteria);
        if ($request->point_req_construction >$gpss_kriteria->maksimum) {
            Alert::error('Salah Markah Point Requested Construction', 'Sila letakkan markah kurang dari maksimum');
            return back();
        }
        $gpss_kriteria = GpssKriteria::find($request->gpss_kriteria);
        if ($request->point_awarded >$gpss_kriteria->maksimum) {
            Alert::error('Salah Markah Point Awarded', 'Sila letakkan markah kurang dari maksimum');
            return back();
        }

        $markah = New GpssMarkahRayuan;
        $markah->projek_id = $id;
        $markah->user_id = $user->id;
        $markah->gpss_kriteria_id = $request->gpss_kriteria;
        $markah->fasa = $request->fasa;
        $markah->point_allocated = $request->point_allocated;
        $markah->point_req_design = $request->point_req_design;
        $markah->point_req_construction = $request->point_req_construction;
        $markah->point_awarded = $request->point_awarded;
        $markah->remarks = $request->remarks;
        $markah->comment_on_appeal = $request->comment_on_appeal;

        if ($request->hasFile('dokumen1')) {
            $markah->dokumen1 = $request->file('dokumen1')->store('jkr-ephjkr/uploads');
        // } else {
        //     if ($request->point_allocated > 0 || $request->point_req_design > 0 || $request->point_req_construction > 0 || $request->point_awarded > 0) {
        //         Alert::error('Dokumen diperlukan', 'Jika markah melebihi 0, silakan letakkan sekurang-kurangnya satu dokumen lampiran');
        //         return back();
        //     }            
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

        alert()->success('Markah Disimpan', 'Berjaya');

        return back();
    }

    //Modul 5 - EPH Jalan
    public function markah_eph_jalan(Request $request){
        $user = $request->user();
        $id = (int)$request->route('id');

        $kriteria = Kriteria::find($request->kriteria);
        if ($request->target_point >$kriteria->maksimum) {
            Alert::error('Salah Markah Target Point', 'Sila letakkan markah kurang dari maksimum');
            return back();
        }
        if ($request->assessment_point >$kriteria->maksimum) {
            Alert::error('Salah Markah Assessment Point', 'Sila letakkan markah kurang dari maksimum');
            return back();
        }

        $markah = New Markah;
        $markah->projek_id = $id;
        $markah->user_id = $user->id;
        $markah->kriteria_id = $request->kriteria;
        $markah->target_point = $request->target_point;
        $markah->assessment_point = $request->assessment_point;
        $markah->ulasan = $request->ulasan;
        $markah->comment = $request->comment;
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

        alert()->success('Markah Disimpan', 'Berjaya');

        return back();
    }

    public function markah_eph_jalan_rayuan(Request $request){
        $user = $request->user();
        $id = (int)$request->route('id');

        $kriteria = Kriteria::find($request->kriteria);
        if ($request->target_point >$kriteria->maksimum) {
            Alert::error('Salah Markah Target Point', 'Sila letakkan markah kurang dari maksimum');
            return back();
        }
        if ($request->assessment_point >$kriteria->maksimum) {
            Alert::error('Salah Markah Assessment Point', 'Sila letakkan markah kurang dari maksimum');
            return back();
        }

        $markah = New MarkahRayuan;
        $markah->projek_id = $id;
        $markah->user_id = $user->id;
        $markah->kriteria_id = $request->kriteria;
        $markah->target_point = $request->target_point;
        $markah->assessment_point = $request->assessment_point;
        $markah->ulasan = $request->ulasan;
        $markah->comment_on_appeal = $request->comment_on_appeal;
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

        alert()->success('Markah Disimpan', 'Berjaya');

        return back();
    }

    //Sah Projek
    public function sah_projek(Request $request) {
        $id = (int)$request->route('id');
        $projek = Projek::find($id);
        // if($projek->status == "Menunggu Pengesahan Sekretariat"){
            if($request->sah_projek == "sah"){
                $projek->status = "Proses Pengisian Skor Rekabentuk Bangunan";
                alert()->success('Projek Disahkan', 'Berjaya');
            }
        // }
        // if ($projek->status == "Menunggu Pengesahan Sekretariat"){
        //     $projek->status = "Proses Pengisian Skor Rekabentuk Bangunan";
        //     alert()->success('Projek Disahkan', 'Berjaya');
        // }
        // elseif ($projek->status == "Proses Pengisian Skor Rekabentuk Bangunan"){
        //     $projek->status = "Dalam Pengesahan Skor Rekabentuk Bangunan";
        //     alert()->success('Proses Pengisian Skor Rekabentuk Bangunan', 'Berjaya');
        // }
        elseif ($projek->status == "Dalam Pengesahan Skor Rekabentuk Bangunan"){
            $projek->status = "Selesai Pengesahan Rekabentuk Bangunan";
            alert()->success('Pengesahan Skor Rekabentuk Bangunan Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan Rekabentuk Bangunan"){
            $projek->status = "Proses Pengisian Skor Verifikasi Permarkahan Bangunan";
            alert()->success('Selesai Pengesahan Rekabentuk Bangunan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Pengisian Skor Verifikasi Permarkahan Bangunan"){
            $projek->status = "Dalam Pengesahan Skor Verifikasi Permarkahan Bangunan";
            alert()->success('Proses Pengisian Skor Verifikasi Permarkahan Bangunan telah lengkap', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Skor Verifikasi Permarkahan Bangunan"){
            $projek->status = "Selesai Pengesahan Verifikasi Bangunan";
            alert()->success('Pengesahan Skor Verifikasi Permarkahan Bangunan Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan Verifikasi Bangunan"){
            $projek->status = "Proses Pengisian Skor Validasi Permarkahan Bangunan";
            alert()->success('Selesai Pengesahan Verifikasi Bangunan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Pengisian Skor Validasi Permarkahan Bangunan"){
            $projek->status = "Dalam Pengesahan Skor Validasi Permarkahan Bangunan";
            alert()->success('Proses Pengisian Skor Validasi Permarkahan Bangunan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Skor Validasi Permarkahan Bangunan"){
            $projek->status = "Selesai Pengesahan Validasi Bangunan";
            alert()->success('Dalam Pengesahan Skor Validasi Permarkahan Bangunan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan Validasi Bangunan"){
            $projek->status = "Selesai Validasi Bangunan";
            alert()->success('Selesai Pengesahan Validasi Bangunan', 'Berjaya');
        }

        $projek->save();
        return back();
    }

    public function sah_projek_eph_rayuan(Request $request){
        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        if ($projek->status == "Selesai Pengesahan Validasi Bangunan"){
            $projek->status = "Proses Rayuan Bangunan";
            alert()->success('Rayuan Bangunan sedang Diproses', 'Berjaya');
        }
        elseif ($projek->status == "Proses Rayuan Bangunan"){
            $projek->status = "Dalam Pengesahan Rayuan Bangunan";
            alert()->success('Proses Rayuan Bangunan Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Rayuan Bangunan"){
            $projek->status = "Selesai Pengesahan Rayuan Bangunan";
            alert()->success('Pengesahan Rayuan Bangunan Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan Rayuan Bangunan"){
            $projek->status = "Selesai Rayuan Bangunan";
            alert()->success('Rayuan Bangunan Disahkan', 'Berjaya');
        }

        $projek->save();
        return back();
        
    }

    public function sah_projek_gpss(Request $request){
        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        if ($projek->status == "Menunggu Pengesahan Sekretariat"){
            $projek->status = "Proses Pengisian Skor Rekabentuk GPSS Bangunan";
            alert()->success('Projek Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Bangunan"){
            $projek->status = "Dalam Pengesahan Skor Rekabentuk GPSS Bangunan";
            alert()->success('Skor Rekabentuk GPSS Bangunan Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Skor Rekabentuk GPSS Bangunan"){
            $projek->status = "Selesai Pengesahan Rekabentuk GPSS Bangunan";
            alert()->success('Pengesahan Skor Rekabentuk GPSS Bangunan telah Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan Rekabentuk GPSS Bangunan"){
            $projek->status = "Selesai Jana Keputusan Rekabentuk GPSS Bangunan";
            alert()->success('Selesai Pengesahan Rekabentuk GPSS Bangunan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Bangunan"){
            $projek->status = "Proses Pengisian Skor Verifikasi GPSS Bangunan";
            alert()->success('Selesai Jana Keputusan Rekabentuk GPSS Bangunan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Pengisian Skor Verifikasi GPSS Bangunan"){
            $projek->status = "Dalam Pengesahan Skor Verifikasi GPSS Bangunan";
            alert()->success('Skor Verifikasi GPSS Bangunan Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Bangunan"){
            $projek->status = "Selesai Pengesahan Verifikasi GPSS Bangunan";
            alert()->success('Pengesahan Skor Verifikasi GPSS Bangunan telah Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan Verifikasi GPSS Bangunan"){
            $projek->status = "Selesai Jana Keputusan Verifikasi GPSS Bangunan";
            alert()->success('Selesai Jana Keputusan Verifikasi GPSS Bangunan', 'Berjaya');
        }
        
        $projek->save();
        return back();
    }

    public function sah_projek_gpss_rayuan(Request $request){
        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        if ($projek->status == "Selesai Jana Keputusan Verifikasi GPSS Bangunan"){
            $projek->status = "Proses Rayuan GPSS Bangunan";
            alert()->success('Rayuan GPSS Bangunan sedang Diproses', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Rayuan GPSS Bangunan"){
            $projek->status = "Selesai Pengesahan Rayuan GPSS Bangunan";
            alert()->success('Pengesahan Rayuan GPSS Bangunan telah Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan"){
            $projek->status = "Selesai Jana Keputusan Rayuan GPSS Bangunan";
            alert()->success('Pengesahan Rayuan GPSS Bangunan telah Disahkan', 'Berjaya');
        }
        // elseif ($projek->status == "Selesai Jana Keputusan Rayuan GPSS Bangunan"){
        //     $projek->status = "Selesai Rayuan GPSS Bangunan";
        //     alert()->success('Proses Rayuan GPSS Bangunan Disahkan', 'Berjaya');
        // }

        $projek->save();
        return back();
    }

    public function sah_projek_gpss_jalan(Request $request){
        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        if ($projek->status == "Menunggu Pengesahan Sekretariat"){
            $projek->status = "Proses Pengisian Skor Rekabentuk GPSS Jalan";
            alert()->success('Projek Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Jalan"){
            $projek->status = "Dalam Pengesahan Skor Rekabentuk GPSS Jalan";
            alert()->success('Skor Rekabentuk GPSS Jalan Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Skor Rekabentuk GPSS Jalan"){
            $projek->status = "Selesai Pengesahan Rekabentuk GPSS Jalan";
            alert()->success('Pengesahan Skor Rekabentuk GPSS Jalan telah Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan Rekabentuk GPSS Jalan"){
            $projek->status = "Selesai Jana Keputusan Rekabentuk GPSS Jalan";
            alert()->success('Selesai Pengesahan Rekabentuk GPSS Jalan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Jalan"){
            $projek->status = "Proses Pengisian Skor Verifikasi GPSS Jalan";
            alert()->success('Selesai Jana Keputusan Rekabentuk GPSS Jalan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Pengisian Skor Verifikasi GPSS Jalan"){
            $projek->status = "Dalam Pengesahan Skor Verifikasi GPSS Jalan";
            alert()->success('Skor Verifikasi GPSS Jalan Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Jalan"){
            $projek->status = "Selesai Pengesahan Verifikasi GPSS Jalan";
            alert()->success('Pengesahan Skor Verifikasi GPSS Jalan telah Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan Verifikasi GPSS Jalan"){
            $projek->status = "Selesai Jana Keputusan Verifikasi GPSS Jalan";
            alert()->success('Selesai Jana Keputusan Verifikasi GPSS Jalan', 'Berjaya');
        }

        $projek->save();

        return back();

    }

    public function sah_projek_gpss_jalan_rayuan(Request $request){
        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        if ($projek->status == "Selesai Jana Keputusan Verifikasi GPSS Jalan"){
            $projek->status = "Proses Rayuan GPSS Jalan";
            alert()->success('Rayuan Jalan sedang Diproses', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Rayuan GPSS Jalan"){
            $projek->status = "Selesai Pengesahan Rayuan GPSS Jalan";
            alert()->success('Pengesahan Rayuan GPSS Jalan telah Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan Rayuan GPSS Jalan"){
            $projek->status = "Selesai Jana Keputusan Rayuan GPSS Jalan";
            alert()->success('Pengesahan Rayuan GPSS Jalan telah Disahkan', 'Berjaya');
        }
        // elseif ($projek->status == "Selesai Jana Keputusan Rayuan GPSS Jalan"){
        //     $projek->status = "Selesai Rayuan GPSS Jalan";
        //     alert()->success('Proses Rayuan GPSS Jalan Disahkan', 'Berjaya');
        // }

        $projek->save();
        return back();
    }

    public function sah_projek_eph_jalan_baru(Request $request){
        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        if ($projek->status == "Menunggu Pengesahan Sekretariat"){
            $projek->status = "Proses Pengisian Skor Rekabentuk/Verifikasi Jalan Baru";
            alert()->success('Projek Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Pengisian Skor Rekabentuk/Verifikasi Jalan Baru"){
            $projek->status = "Dalam Pengesahan Skor Rekabentuk/Verifikasi Jalan Baru";
            alert()->success('Proses Pengisian Skor Rekabentuk/Verifikasi Jalan Baru', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Skor Rekabentuk/Verifikasi Jalan Baru"){
            $projek->status = "Proses Jana Keputusan Rekabentuk/Verifikasi Jalan Baru";
            alert()->success('Pengesahan Skor Rekabentuk/Verifikasi Jalan Baru telah Disahkan', 'Berjaya');
        }
        // elseif ($projek->status == "Selesai Pengesahan Rekabentuk/Verifikasi Jalan Baru"){
        //     $projek->status = "Proses Jana Keputusan Rekabentuk/Verifikasi Jalan Baru";
        //     alert()->success('Pengesahan Rekabentuk/Verifikasi Jalan Baru', 'Berjaya');
        // }
        elseif ($projek->status == "Proses Jana Keputusan Rekabentuk/Verifikasi Jalan Baru"){
            $projek->status = "Selesai Jana Keputusan Rekabentuk/Verifikasi Jalan Baru";
            alert()->success('Jana Keputusan Rekabentuk/Verifikasi Jalan Baru', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Jana Keputusan Rekabentuk/Verifikasi Jalan Baru"){
            $projek->status = "Selesai Rekabentuk/Verifikasi Jalan Baru";
            alert()->success('Selesai Jana Keputusan Rekabentuk/Verifikasi Jalan Baru ', 'Berjaya');
        }

        $projek->save();
        return back();


    }

    public function sah_projek_eph_jalan_baru_rayuan(Request $request){
        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        if ($projek->status == "Selesai Jana Keputusan Rekabentuk/Verifikasi Jalan Baru"){
            $projek->status = "Proses Rayuan Rekabentuk/Verifikasi Jalan Baru";
            alert()->success('Rayuan Rekabentuk/Verifikasi Jalan Baru sedang Diproses', 'Berjaya');
        }
        elseif ($projek->status == "Proses Rayuan Rekabentuk/Verifikasi Jalan Baru"){
            $projek->status = "Dalam Pengesahan Rayuan Rekabentuk/Verifikasi Jalan Baru";
            alert()->success('Proses Rayuan Rekabentuk/Verifikasi Jalan Baru Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Rayuan Rekabentuk/Verifikasi Jalan Baru"){
            $projek->status = "Proses Jana Keputusan Rayuan Rekabentuk/Verifikasi Jalan Baru";
            alert()->success('Pengesahan Rayuan Rekabentuk/Verifikasi Jalan Baru Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Jana Keputusan Rayuan Rekabentuk/Verifikasi Jalan Baru"){
            $projek->status = "Selesai Rayuan Rekabentuk/Verifikasi Jalan Baru";
            alert()->success('Rayuan Rekabentuk/Verifikasi Jalan Baru Disahkan', 'Berjaya');
        }

        $projek->save();
        return back();
        
    }

    public function sah_projek_eph_jalan_naiktaraf(Request $request){
        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        if ($projek->status == "Menunggu Pengesahan Sekretariat"){
            $projek->status = "Proses Pengisian Skor Rekabentuk/Verifikasi Jalan Naiktaraf";
            alert()->success('Projek Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Pengisian Skor Rekabentuk/Verifikasi Jalan Naiktaraf"){
            $projek->status = "Dalam Pengesahan Skor Rekabentuk/Verifikasi Jalan Naiktaraf";
            alert()->success('Proses Pengisian Skor Rekabentuk/Verifikasi Jalan Naiktaraf', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Skor Rekabentuk/Verifikasi Jalan Naiktaraf"){
            $projek->status = "Proses Jana Keputusan Rekabentuk/Verifikasi Jalan Naiktaraf";
            alert()->success('Pengesahan Skor Rekabentuk/Verifikasi Jalan Naiktaraf telah Disahkan', 'Berjaya');
        }
        // elseif ($projek->status == "Selesai Pengesahan Rekabentuk/Verifikasi Jalan Naiktaraf"){
        //     $projek->status = "Proses Jana Keputusan Rekabentuk/Verifikasi Jalan Naiktaraf";
        //     alert()->success('Pengesahan Rekabentuk/Verifikasi Jalan Naiktaraf', 'Berjaya');
        // }
        elseif ($projek->status == "Proses Jana Keputusan Rekabentuk/Verifikasi Jalan Naiktaraf"){
            $projek->status = "Selesai Jana Keputusan Rekabentuk/Verifikasi Jalan Naiktaraf";
            alert()->success('Jana Keputusan Rekabentuk/Verifikasi Jalan Naiktaraf', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Jana Keputusan Rekabentuk/Verifikasi Jalan Naiktaraf"){
            $projek->status = "Selesai Rekabentuk/Verifikasi Jalan Naiktaraf";
            alert()->success('Selesai Jana Keputusan Rekabentuk/Verifikasi Jalan Naiktaraf', 'Berjaya');
        }

        $projek->save();
        return back();


    }

    public function sah_projek_eph_jalan_naiktaraf_rayuan(Request $request){
        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        if ($projek->status == "Selesai Jana Keputusan Rekabentuk/Verifikasi Jalan Naiktaraf"){
            $projek->status = "Proses Rayuan Rekabentuk/Verifikasi Jalan Naiktaraf";
            alert()->success('Rayuan Rekabentuk/Verifikasi Jalan Naiktaraf sedang Diproses', 'Berjaya');
        }
        elseif ($projek->status == "Proses Rayuan Rekabentuk/Verifikasi Jalan Naiktaraf"){
            $projek->status = "Dalam Pengesahan Rayuan Rekabentuk/Verifikasi Jalan Naiktaraf";
            alert()->success('Proses Rayuan Rekabentuk/Verifikasi Jalan Naiktaraf Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Rayuan Rekabentuk/Verifikasi Jalan Naiktaraf"){
            $projek->status = "Proses Jana Keputusan Rayuan Rekabentuk/Verifikasi Jalan Naiktaraf";
            alert()->success('Pengesahan Rayuan Rekabentuk/Verifikasi Jalan Naiktaraf Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Jana Keputusan Rayuan Rekabentuk/Verifikasi Jalan Naiktaraf"){
            $projek->status = "Selesai Rayuan Rekabentuk/Verifikasi Jalan Naiktaraf";
            alert()->success('Rayuan Rekabentuk/Verifikasi Jalan Naiktaraf Disahkan', 'Berjaya');
        }

        $projek->save();
        return back();
        
    }


    //Sijil
    public function sijil_eph_bangunan_rekabentuk(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        $date = Carbon::now()->format('Y-m-d');

        if($projek->kategori == "phJKR Bangunan Baru A"){
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'BARU A'],
                ['fasa','=', 'rekabentuk']
            ])->get();

            // Rekabentuk borang BARU A
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 6]])->get();
            $in_mr = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                
                if($markah_tl_mr){
                    if($markah_tl_mr->markah > 0){
                        $tl_mr +=  $markah_tl_mr->markah;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_kt_mr){
                    if($markah_kt_mr->markah > 0){
                        $kt_mr +=  $markah_kt_mr->markah;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                            
                if($markah_sb_mr){
                    if($markah_sb_mr->markah > 0){
                        $sb_mr +=  $markah_sb_mr->markah;
                    }
                } 
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                             
                if($markah_pa_mr){
                    if($markah_pa_mr->markah > 0){
                        $pa_mr +=  $markah_pa_mr->markah;
                    }
                } 
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                               
                if($markah_pd_mr){
                    if($markah_pd_mr->markah > 0){
                        $pd_mr +=  $markah_pd_mr->markah;
                    }
                } 
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                
                if($markah_in_mr){
                    if($markah_in_mr->markah > 0){
                        $in_mr +=  $markah_in_mr->markah;
                    }
                }                           
            }                                 
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $in_mr; 

            $peratusan_mr = $total_mr/101 *100;     
            if($peratusan_mr >= 80) {
                $bintang_mr = 5;
            } elseif($peratusan_mr >= 65 && $peratusan_mr < 80) {
                $bintang_mr = 4;
            } elseif($peratusan_mr >= 45 && $peratusan_mr < 65) {
                $bintang_mr = 3;
            } elseif($peratusan_mr >= 30 && $peratusan_mr < 45) {
                $bintang_mr = 2;
            } else {
                $bintang_mr = 1;
            }
        }
    
        if($projek->kategori == "phJKR Bangunan Baru B"){
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'BARU B'],
                ['fasa','=', 'rekabentuk']
            ])->get(); 

            // Rekabentuk borang BARU B
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 6]])->get();
            $fl_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 7]])->get();
            $in_mr = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                
                if($markah_tl_mr){
                    if($markah_tl_mr->markah > 0){
                        $tl_mr +=  $markah_tl_mr->markah;
                    }
                } 
                                              
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                

                if($markah_kt_mr){
                    if($markah_kt_mr->markah > 0){
                        $kt_mr +=  $markah_kt_mr->markah;
                    }
                }
                
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                                
                if($markah_sb_mr){
                    if($markah_sb_mr->markah > 0){
                        $sb_mr +=  $markah_sb_mr->markah;
                    }
                } 
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                              
                if($markah_pa_mr){
                    if($markah_pa_mr->markah > 0){
                        $pa_mr +=  $markah_pa_mr->markah;
                    }
                } 
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                               
                if($markah_pd_mr){
                    if($markah_pd_mr->markah > 0){
                        $pd_mr +=  $markah_pd_mr->markah;
                    }
                } 
    
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                              
                if($markah_fl_mr){
                    if($markah_fl_mr->markah > 0){
                        $fl_mr +=  $markah_fl_mr->markah;
                    }
                } 
                
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                
                if($markah_in_mr){
                    if($markah_in_mr->markah > 0){
                        $in_mr +=  $markah_in_mr->markah;
                    }
                }                            
            }

            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            
            $peratusan_mr = $total_mr/131 *100;     
            if($peratusan_mr >= 80) {
                $bintang_mr = 5;
            } elseif($peratusan_mr >= 65 && $peratusan_mr < 80) {
                $bintang_mr = 4;
            } elseif($peratusan_mr >= 45 && $peratusan_mr < 65) {
                $bintang_mr = 3;
            } elseif($peratusan_mr >= 30 && $peratusan_mr < 45) {
                $bintang_mr = 2;
            } else {
                $bintang_mr = 1;
            }

        }

        if($projek->kategori == "phJKR Bangunan Baru C"){
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'BARU C'],
                ['fasa','=', 'rekabentuk']
            ])->get(); 

            // Rekabentuk borang BARU C
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 6]])->get();
            $fl_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 7]])->get();
            $in_mr = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                
                if($markah_tl_mr){
                    if($markah_tl_mr->markah > 0){
                        $tl_mr +=  $markah_tl_mr->markah;
                    }
                } 
                                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();   

                if($markah_kt_mr){
                    if($markah_kt_mr->markah > 0){
                        $kt_mr +=  $markah_kt_mr->markah;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                               
                if($markah_sb_mr){
                    if($markah_sb_mr->markah > 0){
                        $sb_mr +=  $markah_sb_mr->markah;
                    }
                } 
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                               
                if($markah_pa_mr){
                    if($markah_pa_mr->markah > 0){
                        $pa_mr +=  $markah_pa_mr->markah;   
                    }
                } 
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                             
                if($markah_pd_mr){
                    if($markah_pd_mr->markah > 0){
                        $pd_mr +=  $markah_pd_mr->markah;
                    }
                } 
                
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                             
                if($markah_fl_mr){
                    if($markah_fl_mr->markah > 0){
                        $fl_mr +=  $markah_fl_mr->markah;
                    }
                } 
                
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                
                if($markah_in_mr){
                    if($markah_in_mr->markah > 0){
                        $in_mr +=  $markah_in_mr->markah;
                    }
                } 
                                          
            } 
    
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            
            $peratusan_mr = $total_mr/159 *100;     
            if($peratusan_mr >= 80) {
                $bintang_mr = 5;
            } elseif($peratusan_mr >= 65 && $peratusan_mr < 80) {
                $bintang_mr = 4;
            } elseif($peratusan_mr >= 45 && $peratusan_mr < 65) {
                $bintang_mr = 3;
            } elseif($peratusan_mr >= 30 && $peratusan_mr < 45) {
                $bintang_mr = 2;
            } else {
                $bintang_mr = 1;
            }
        }

        if($projek->kategori == "phJKR Bangunan Baru D"){
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'BARU D'],
                ['fasa','=', 'rekabentuk'],
            ])->get();

            // Rekabentuk borang BARU D
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 6]])->get();
            $fl_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 7]])->get();
            $in_mr = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                
                if($markah_tl_mr){
                    if($markah_tl_mr->markah > 0){
                        $tl_mr +=  $markah_tl_mr->markah;
                    }
                } 
                                              
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                

                if($markah_kt_mr){
                    if($markah_kt_mr->markah > 0){
                        $kt_mr +=  $markah_kt_mr->markah;
                    }
                }
                
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                              
                if($markah_sb_mr){
                    if($markah_sb_mr->markah > 0){
                        $sb_mr +=  $markah_sb_mr->markah;
                    }
                } 
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                              
                if($markah_pa_mr){
                    if($markah_pa_mr->markah > 0){
                        $pa_mr +=  $markah_pa_mr->markah;
                    }
                } 
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                              
                if($markah_pd_mr){
                    if($markah_pd_mr->markah > 0){
                        $pd_mr +=  $markah_pd_mr->markah;
                    }
                } 
                
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                             
                if($markah_fl_mr){
                    if($markah_fl_mr->markah > 0){
                        $fl_mr +=  $markah_fl_mr->markah;
                    }
                } 
                
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                
                if($markah_in_mr){
                    if($markah_in_mr->markah > 0){
                        $in_mr +=  $markah_in_mr->markah;
                    }
                } 
                                          
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 

            $peratusan_mr = $total_mr/166 * 100;     
            if($peratusan_mr >= 80) {
                $bintang_mr = 5;
            } elseif($peratusan_mr >= 65 && $peratusan_mr < 80) {
                $bintang_mr = 4;
            } elseif($peratusan_mr >= 45 && $peratusan_mr < 65) {
                $bintang_mr = 3;
            } elseif($peratusan_mr >= 30 && $peratusan_mr < 45) {
                $bintang_mr = 2;
            } else {
                $bintang_mr = 1;
            }

        }

        if($projek->kategori == "phJKR Bangunan PUN A"){
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'PUN A'],
                ['fasa','=', 'rekabentuk'],
            ])->get();

            // Rekabentuk borang PUN A
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                
                if($markah_tl_mr){
                    if($markah_tl_mr->markah > 0){
                        $tl_mr +=  $markah_tl_mr->markah;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_kt_mr){
                    if($markah_kt_mr->markah > 0){
                        $kt_mr +=  $markah_kt_mr->markah;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                                
                if($markah_sb_mr){
                    if($markah_sb_mr->markah > 0){
                        $sb_mr +=  $markah_sb_mr->markah;
                    }
                } 
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                              
                if($markah_pa_mr){
                    if($markah_pa_mr->markah > 0){
                        $pa_mr +=  $markah_pa_mr->markah;
                    }
                } 
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                              
                if($markah_pd_mr){
                    if($markah_pd_mr->markah > 0){
                        $pd_mr +=  $markah_pd_mr->markah;
                    }
                } 
                
            }

            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr; 

            $peratusan_mr = $total_mr/73 *100;     
            if($peratusan_mr >= 80) {
                $bintang_mr = 5;
            } elseif($peratusan_mr >= 65 && $peratusan_mr < 80) {
                $bintang_mr = 4;
            } elseif($peratusan_mr >= 45 && $peratusan_mr < 65) {
                $bintang_mr = 3;
            } elseif($peratusan_mr >= 30 && $peratusan_mr < 45) {
                $bintang_mr = 2;
            } else {
                $bintang_mr = 1;
            }

        }

        if($projek->kategori == "phJKR Bangunan PUN B"){
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'PUN B'],
                ['fasa','=', 'rekabentuk']
            ])->get();

            // Rekabentuk borang PUN B
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 6]])->get();
            $fl_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 7]])->get();
            $in_mr = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                
                if($markah_tl_mr){
                    if($markah_tl_mr->markah > 0){
                        $tl_mr +=  $markah_tl_mr->markah;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_kt_mr){
                    if($markah_kt_mr->markah > 0){
                        $kt_mr +=  $markah_kt_mr->markah;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                               
                if($markah_sb_mr){
                    if($markah_sb_mr->markah > 0){
                        $sb_mr +=  $markah_sb_mr->markah;
                    }
                } 
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                              
                if($markah_pa_mr){
                    if($markah_pa_mr->markah > 0){
                        $pa_mr +=  $markah_pa_mr->markah;
                    }
                } 
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                              
                if($markah_pd_mr){
                    if($markah_pd_mr->markah > 0){
                        $pd_mr +=  $markah_pd_mr->markah;
                    }
                } 
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                              
                if($markah_fl_mr){
                    if($markah_fl_mr->markah > 0){
                        $fl_mr +=  $markah_fl_mr->markah;
                    }
                } 
                
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                
                if($markah_in_mr){
                    if($markah_in_mr->markah > 0){
                        $in_mr +=  $markah_in_mr->markah;
                    }
                } 
                                          
            }

            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 

            $peratusan_mr = $total_mr/118 *100;     
            if($peratusan_mr >= 80) {
                $bintang_mr = 5;
            } elseif($peratusan_mr >= 65 && $peratusan_mr < 80) {
                $bintang_mr = 4;
            } elseif($peratusan_mr >= 45 && $peratusan_mr < 65) {
                $bintang_mr = 3;
            } elseif($peratusan_mr >= 30 && $peratusan_mr < 45) {
                $bintang_mr = 2;
            } else {
                $bintang_mr = 1;
            }

        }

        if($projek->kategori == "phJKR Bangunan PUN C"){
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'PUN C'],
                ['fasa','=', 'rekabentuk']
            ])->get();

            // Rekabentuk borang PUN C
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 6]])->get();
            $fl_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 7]])->get();
            $in_mr = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                
                if($markah_tl_mr){
                    if($markah_tl_mr->markah > 0){
                        $tl_mr +=  $markah_tl_mr->markah;
                    }
                } 
                                              
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                

                if($markah_kt_mr){
                    if($markah_kt_mr->markah > 0){
                        $kt_mr +=  $markah_kt_mr->markah;
                    }
                }
                
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                              
                if($markah_sb_mr){
                    if($markah_sb_mr->markah > 0){
                        $sb_mr +=  $markah_sb_mr->markah;
                    }
                } 
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                              
                if($markah_pa_mr){
                    if($markah_pa_mr->markah > 0){
                        $pa_mr +=  $markah_pa_mr->markah;
                    }
                } 
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                               
                if($markah_pd_mr){
                    if($markah_pd_mr->markah > 0){
                        $pd_mr +=  $markah_pd_mr->markah;
                    }
                } 
                
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                              
                if ($markah_fl_mr){
                    if($markah_fl_mr->markah > 0){
                        $fl_mr +=  $markah_fl_mr->markah;
                    }
                } 
                
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                
                if($markah_in_mr){
                    if($markah_in_mr->markah > 0){
                        $in_mr +=  $markah_in_mr->markah;
                    }
                } 
                                          
            } 

            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 

            $peratusan_mr = $total_mr/151 *100;     
            if($peratusan_mr >= 80) {
                $bintang_mr = 5;
            } elseif($peratusan_mr >= 65 && $peratusan_mr < 80) {
                $bintang_mr = 4;
            } elseif($peratusan_mr >= 45 && $peratusan_mr < 65) {
                $bintang_mr = 3;
            } elseif($peratusan_mr >= 30 && $peratusan_mr < 45) {
                $bintang_mr = 2;
            } else {
                $bintang_mr = 1;
            }
        }

        if($projek->kategori == "phJKR Bangunan PUN D"){
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'PUN D'],
                ['fasa','=', 'rekabentuk']
            ])->get();

            // Rekabentuk borang PUN D
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 6]])->get();
            $fl_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 7]])->get();
            $in_mr = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                
                if($markah_tl_mr){
                    if($markah_tl_mr->markah > 0){
                        $tl_mr +=  $markah_tl_mr->markah;
                    }
                } 
                                              
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                

                if($markah_kt_mr){
                    if($markah_kt_mr->markah > 0){
                        $kt_mr +=  $markah_kt_mr->markah;
                    }
                }
                
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                               
                if($markah_sb_mr){
                    $sb_mr +=  $markah_sb_mr->markah;
                } 
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                               
                if($markah_pa_mr){
                    $pa_mr +=  $markah_pa_mr->markah;
                } 
        
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                              
                if($markah_pd_mr){
                    $pd_mr +=  $markah_pd_mr->markah;
                } 

            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                            
                if($markah_fl_mr){
                    $fl_mr +=  $markah_fl_mr->markah;
                } 
        
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                
                if($markah_in_mr){
                    $in_mr +=  $markah_in_mr->markah;
                } 
                                      
            }  

            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 

            $peratusan_mr = $total_mr/156 *100;     
            if($peratusan_mr >= 80) {
                $bintang_mr = 5;
            } elseif($peratusan_mr >= 65 && $peratusan_mr < 80) {
                $bintang_mr = 4;
            } elseif($peratusan_mr >= 45 && $peratusan_mr < 65) {
                $bintang_mr = 3;
            } elseif($peratusan_mr >= 30 && $peratusan_mr < 45) {
                $bintang_mr = 2;
            } else {
                $bintang_mr = 1;
            }

        }

        // $date = Carbon::now()->format('d-m-Y');
        $projek = FacadePdf::loadView('projek.sijil_eph_bangunan_rekabentuk',compact('projek','date', 'peratusan_mr'));
        // dd($projek);
        return $projek->download('ePHJKR_SIJIL_EPH_BANGUNAN.'.'pdf');
    }

    public function sijil_eph_bangunan_verifikasi(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        // dd($projek);
        if($projek->kategori == "phJKR Bangunan Baru A"){
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU A'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            // Verifikasi borang BARU A
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 6]])->get();
            $in_mv = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
        
                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }                           
            }                                  
                 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $in_mv; 

            $peratusan_mv = $total_mv/103 * 100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }
        }
    
        if($projek->kategori == "phJKR Bangunan Baru B"){
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU B'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            // Verifikasi borang BARU B
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
    
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_fl_mv){
                    if($markah_fl_mv->markah > 0){
                        $fl_mv += $markah_fl_mv->markah;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                $markah_in_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    if($markah_in_mr->markah > 0){
                        $in_mr +=  $markah_in_mr->markah;
                    }
                } 
                if ($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                if($markah_in_mr_r){
                    if($markah_in_mr_r->markah_rekabentuk > 0){
                        $in_mr_r +=  $markah_in_mr_r->markah_rekabentuk;
                    }
                } 
                if ($markah_in_mv_r){
                    if($markah_in_mv_r->markah_verifikasi > 0){
                        $in_mv_r += $markah_in_mv_r->markah_verifikasi;
                    }
                } 
                if ($markah_in_ml_r){
                    if($markah_in_ml_r->markah_validasi > 0){
                        $in_ml_r += $markah_in_ml_r->markah_validasi;
                    }
                }                           
            }

            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            
            $peratusan_mv = $total_mv /138 * 100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

        }

        if($projek->kategori == "phJKR Bangunan Baru C"){
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU C'],
                ['fasa','=', 'verifikasi']
            ])->get();

            // Verifikasi borang BARU C
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            foreach($tl_kriterias as $tl_kriteria){                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first(); 
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }                              
                }  
            }
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
             
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
     
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_in_mv){
                    if($markah_in_mv->markah> 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }                           
            }
    
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $in_mv; 
            $peratusan_mv = $total_mv /166 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }
        }

        if($projek->kategori == "phJKR Bangunan Baru D"){
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU D'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            // Verifikasi borang BARU D
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_fl_mv){
                    if($markah_fl_mv->markah > 0){
                        $fl_mv += $markah_fl_mv->markah;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }                          
            }                                  
                 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv;  

            $peratusan_mv = $total_mv /173 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

        }

        if($projek->kategori == "phJKR Bangunan PUN A"){
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN A'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            // Verifikasi borang PUN A
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
            }

            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv; 

            $peratusan_mv = $total_mv /76 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

        }

        if($projek->kategori == "phJKR Bangunan PUN B"){
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN B'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            // Verifikasi borang PUN B
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_fl_mv){
                    if($markah_fl_mv->markah > 0){
                        $fl_mv += $markah_fl_mv->markah;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah; 
                    }
                }                           
            }

            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 

            $peratusan_mv = $total_mv /126 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

        }

        if($projek->kategori == "phJKR Bangunan PUN C"){
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN C'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            // Verifikasi borang PUN C
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                }                                    
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_fl_mv){
                    if($markah_fl_mv->markah > 0){
                        $fl_mv += $markah_fl_mv->markah;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }                           
            } 

            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 

            $peratusan_mv = $total_mv /159 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }
        }

        if($projek->kategori == "phJKR Bangunan PUN D"){
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN D'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            // Verifikasi borang PUN D
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_sb_mv){
                    $sb_mv += $markah_sb_mv->markah;
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_pa_mv){
                    $pa_mv += $markah_pa_mv->markah;
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_pd_mv){
                    $pd_mv += $markah_pd_mv->markah;
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                 
                if ($markah_fl_mv){
                    $fl_mv += $markah_fl_mv->markah;
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_in_mv){
                    $in_mv += $markah_in_mv->markah;
                }                           
            } 

            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 

            $peratusan_mv = $total_mv /164 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }

        }

        if($projek->kategori == "phJKR Bangunan Sedia Ada A"){
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA A'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            // Verifikasi borang SEDIA ADA A
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                                
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                               
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                              
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                              
                if ($markah_fl_mv){
                    if($markah_fl_mv->markah > 0){
                        $fl_mv += $markah_fl_mv->markah;
                    }
                }
            }

            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv; 

            $peratusan_mv = $total_mv/62 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }
        }

        if($projek->kategori == "phJKR Bangunan Sedia Ada B"){
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA B'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            // Verifikasi borang SEDIA ADA B
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                               
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                               
                if ($markah_pa_mv > 0){
                    if($markah_pa_mv->markah){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                              
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }                           
            } 

            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $in_mv; 

            $peratusan_mv = $total_mv/108 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }
        }

        if($projek->kategori == "phJKR Bangunan Sedia Ada C"){
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA C'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            // Verifikasi borang SEDIA ADA C
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                }                             
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                               
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                              
                if ($markah_pa_mv){
                    if($markah_pa_mv->markah > 0){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                              
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                             
                if ($markah_fl_mv){
                    if($markah_fl_mv->markah > 0){
                        $fl_mv += $markah_fl_mv->markah;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }                           
            } 

            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 

            $peratusan_mv = $total_mv/140 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }
        }

        if($projek->kategori == "phJKR Bangunan Sedia Ada D"){
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA D'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            // Verifikasi borang SEDIA ADA D
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_tl_mv){
                    if($markah_tl_mv->markah > 0){
                        $tl_mv += $markah_tl_mv->markah;
                    }
                }                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_kt_mv){
                    if($markah_kt_mv->markah > 0){
                        $kt_mv += $markah_kt_mv->markah;
                    }
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                               
                if ($markah_sb_mv){
                    if($markah_sb_mv->markah > 0){
                        $sb_mv += $markah_sb_mv->markah;
                    }
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                               
                if ($markah_pa_mv > 0){
                    if($markah_pa_mv->markah){
                        $pa_mv += $markah_pa_mv->markah;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                              
                if ($markah_pd_mv){
                    if($markah_pd_mv->markah > 0){
                        $pd_mv += $markah_pd_mv->markah;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                              
                if ($markah_fl_mv){
                    if($markah_fl_mv->markah > 0){
                        $fl_mv += $markah_fl_mv->markah;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                
                if ($markah_in_mv){
                    if($markah_in_mv->markah > 0){
                        $in_mv += $markah_in_mv->markah;
                    }
                }                          
            }

            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 

            $peratusan_mv = $total_mv /145 *100;     
            if($peratusan_mv >= 80) {
                $bintang_mv = 5;
            } elseif($peratusan_mv >= 65 && $peratusan_mv < 80) {
                $bintang_mv = 4;
            } elseif($peratusan_mv >= 45 && $peratusan_mv < 65) {
                $bintang_mv = 3;
            } elseif($peratusan_mv >= 30 && $peratusan_mv < 45) {
                $bintang_mv = 2;
            } else {
                $bintang_mv = 1;
            }
        }

        
        $date = Carbon::now()->format('Y-m-d');
        $projek = FacadePdf::loadView('projek.sijil_eph_bangunan_verifikasi',compact('projek','date', 'peratusan_mv'));
        // dd($projek);
        return $projek->download('ePHJKR_SIJIL_PENILAIAN_REKABENTUK_BANGUNAN.'.'pdf');
    }

    public function sijil_eph_bangunan_validasi(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        // dd($projek);

        if($projek->kategori == "phJKR Bangunan Baru A"){
            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU A'],
                ['fasa','=', 'validasi']
            ])->get();

            // Validasi borang BARU A
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU A'],['borang_seq','=', 6]])->get();
            $in_ml = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                
            }
            foreach($sb_kriterias as $sb_kriteria) {
                
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                
            }
            foreach($in_kriterias as $in_kriteria) {                
                
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                                           
            }                                   
                 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $in_ml; 

            $peratusan_ml = $total_ml/103 * 100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }
        }
    
        if($projek->kategori == "phJKR Bangunan Baru B"){
            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU B'],
                ['fasa','=', 'validasi']
            ])->get();

            // Validasi borang BARU B
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU B'],['borang_seq','=', 7]])->get();
            $in_ml = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                                              
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                
            }
            foreach($sb_kriterias as $sb_kriteria) {
                
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                
            }
            foreach($fl_kriterias as $fl_kriteria) {
                
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_fl_ml){
                    if($markah_fl_ml->markah > 0){
                        $fl_ml += $markah_fl_ml->markah;
                    }
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                                           
            }

            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 
            
            $peratusan_ml = $total_ml /138 * 100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

        }

        if($projek->kategori == "phJKR Bangunan Baru C"){
            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU C'],
                ['fasa','=', 'validasi']
            ])->get();

            // Validasi borang BARU C
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU C'],['borang_seq','=', 7]])->get();
            $in_ml = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                
            }
            foreach($sb_kriterias as $sb_kriteria) {
                
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                              
                
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                
            }
            foreach($fl_kriterias as $fl_kriteria) {
                
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_fl_ml){
                    if($markah_fl_ml->markah > 0){
                        $fl_ml += $markah_fl_ml->markah;
                    }
                }
                
            }
            foreach($in_kriterias as $in_kriteria) {                
                
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                                           
            }  
    
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 
            $peratusan_ml = $total_ml/159 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }
        }

        if($projek->kategori == "phJKR Bangunan Baru D"){
            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU D'],
                ['fasa','=', 'validasi'],
            ])->get();

            // Validasi borang BARU D
            $tl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'BARU D'],['borang_seq','=', 7]])->get();
            $in_ml = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                                              
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                
            }
            foreach($sb_kriterias as $sb_kriteria) {
                
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                
            }
            foreach($fl_kriterias as $fl_kriteria) {
                
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_fl_ml){
                    if($markah_fl_ml->markah > 0){
                        $fl_ml += $markah_fl_ml->markah;
                    }
                }
                
            }
            foreach($in_kriterias as $in_kriteria) {                
               
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                              
            }                                  
                 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + + $fl_ml + $in_ml; 

            $peratusan_ml = $total_ml /173 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

        }

        if($projek->kategori == "phJKR Bangunan PUN A"){
            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN A'],
                ['fasa','=', 'validasi'],
            ])->get();

            // Validasi borang PUN A
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                
            }
            foreach($sb_kriterias as $sb_kriteria) {
                
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                
            }

            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml; 

            $peratusan_ml = $total_ml /76 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

        }

        if($projek->kategori == "phJKR Bangunan PUN B"){
            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN B'],
                ['fasa','=', 'validasi']
            ])->get();

            // Validasi borang PUN B
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN B'],['borang_seq','=', 7]])->get();
            $in_ml = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                                              
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                
            }
            foreach($sb_kriterias as $sb_kriteria) {
                
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                
            }
            foreach($fl_kriterias as $fl_kriteria) {
                
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_fl_ml){
                    if($markah_fl_ml->markah > 0){
                        $fl_ml += $markah_fl_ml->markah;
                    }
                }
                
            }
            foreach($in_kriterias as $in_kriteria) {                
                
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                                          
            }

            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 

            $peratusan_ml = $total_ml /126 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

        }

        if($projek->kategori == "phJKR Bangunan PUN C"){
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN C'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            // Verifikasi borang PUN C
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 1]])->get();
            $tl_mv = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 2]])->get();
            $kt_mv = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 3]])->get();
            $sb_mv = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 4]])->get();
            $pa_mv = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 5]])->get();
            $pd_mv = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN C'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                                              
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
        
            }
            foreach($sb_kriterias as $sb_kriteria) {
               
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                
            }
            foreach($fl_kriterias as $fl_kriteria) {
                
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_fl_ml){
                    if($markah_fl_ml->markah > 0){
                        $fl_ml += $markah_fl_ml->markah;
                    }
                }
                
            }
            foreach($in_kriterias as $in_kriteria) {                
                
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                
                if($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                                          
            }  

            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 

            $peratusan_ml = $total_ml /159 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }
        }

        if($projek->kategori == "phJKR Bangunan PUN D"){
            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN D'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            // Validasi borang PUN D
            $tl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN D'],['borang_seq','=', 7]])->get();
            $in_ml = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mr_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_mv_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                $markah_tl_ml_r = MarkahRayuan::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                
            }
            foreach($sb_kriterias as $sb_kriteria) {
                
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_sb_ml){
                    $sb_ml += $markah_sb_ml->markah;
                }
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pa_ml){
                    $pa_ml += $markah_pa_ml->markah;
                }
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pd_ml){
                    $pd_ml += $markah_pd_ml->markah;
                }
                
            }
            foreach($fl_kriterias as $fl_kriteria) {
               
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_fl_ml){
                    $fl_ml += $markah_fl_ml->markah;
                }
                
            }
            foreach($in_kriterias as $in_kriteria) {                
                
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_in_ml){
                    $in_ml += $markah_in_ml->markah;
                } 
                                           
            }

            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 

            $peratusan_ml = $total_ml /164 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }

        }

        if($projek->kategori == "phJKR Bangunan Sedia Ada A"){
            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA A'],
                ['fasa','=', 'validasi'],
            ])->get();

            // Validasi borang SEDIA ADA A
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 7]])->get();
            $in_ml = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_fl_ml){
                    if($markah_fl_ml->markah > 0){
                        $fl_ml += $markah_fl_ml->markah;
                    }
                }
                
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                                           
            }

            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml; 

            $peratusan_ml = $total_ml/62 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }
        }

        if($projek->kategori == "phJKR Bangunan Sedia Ada B"){
            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA B'],
                ['fasa','=', 'validasi'],
            ])->get();

            // Validasi borang SEDIA ADA B
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 7]])->get();
            $in_ml = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
               
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
            
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                                          
            }  

            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $in_ml; 

            $peratusan_ml = $total_ml/108 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }
        }

        if($projek->kategori == "phJKR Bangunan Sedia Ada C"){
            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA C'],
                ['fasa','=', 'validasi'],
            ])->get();

            // Validasi borang SEDIA ADA C
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA C'],['borang_seq','=', 7]])->get();
            $in_ml = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                 
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                                               
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
                
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_fl_ml){
                    if($markah_fl_ml->markah > 0){
                        $fl_ml += $markah_fl_ml->markah;
                    }
                }
        
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                                          
            }    

            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 

            $peratusan_ml = $total_ml/140 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }
        }

        if($projek->kategori == "phJKR Bangunan Sedia Ada D"){
            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'SEDIA ADA D'],
                ['fasa','=', 'validasi'],
            ])->get();

            // Validasi borang SEDIA ADA D
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 1]])->get();
            $tl_ml = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 2]])->get();
            $kt_ml = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 3]])->get();
            $sb_ml = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 4]])->get();
            $pa_ml = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 5]])->get();
            $pd_ml = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA D'],['borang_seq','=', 7]])->get();
            $in_ml = 0;

            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_tl_ml){
                    if($markah_tl_ml->markah > 0){
                        $tl_ml += $markah_tl_ml->markah;
                    }
                } 
                                             
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_kt_ml){
                    if($markah_kt_ml->markah > 0){
                        $kt_ml += $markah_kt_ml->markah;
                    }
                }
                
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_sb_ml){
                    if($markah_sb_ml->markah > 0){
                        $sb_ml += $markah_sb_ml->markah;
                    }
                }
                
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pa_ml){
                    if($markah_pa_ml->markah > 0){
                        $pa_ml += $markah_pa_ml->markah;
                    }
                }
                
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_pd_ml){
                    if($markah_pd_ml->markah > 0){
                        $pd_ml += $markah_pd_ml->markah;
                    }
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first(); 
                
                if ($markah_fl_ml){
                    if($markah_fl_ml->markah > 0){
                        $fl_ml += $markah_fl_ml->markah;
                    }
                }
                
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                
                if ($markah_in_ml){
                    if($markah_in_ml->markah > 0){
                        $in_ml += $markah_in_ml->markah;
                    }
                } 
                                         
            }

            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 

            $peratusan_ml = $total_ml /145 *100;     
            if($peratusan_ml >= 80) {
                $bintang_ml = 5;
            } elseif($peratusan_ml >= 65 && $peratusan_ml < 80) {
                $bintang_ml = 4;
            } elseif($peratusan_ml >= 45 && $peratusan_ml < 65) {
                $bintang_ml = 3;
            } elseif($peratusan_ml >= 30 && $peratusan_ml < 45) {
                $bintang_ml = 2;
            } else {
                $bintang_ml = 1;
            }
        }

        $date = Carbon::now()->format('Y-m-d');
        $projek = FacadePdf::loadView('projek.sijil_eph_bangunan_validasi',compact('projek','date', 'peratusan_ml'));
        // dd($projek);
        return $projek->download('ePHJKR_SIJIL_PENILAIAN_REKABENTUK_BANGUNAN.'.'pdf');
    }

    public function sijil_eph_bangunan_rayuan(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        // dd($projek);
        

        $date = Carbon::now()->format('Y-m-d');
        $projek = FacadePdf::loadView('projek.sijil_eph_bangunan_rayuan',compact('projek','date'));
        // dd($projek);
        return $projek->download('ePHJKR_SIJIL_PENILAIAN_REKABENTUK_BANGUNAN.'.'pdf');
    }

    public function sijil_eph_jalan_rekabentuk(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        // dd($projek);

        $date = Carbon::now()->format('Y-m-d');
        $projek = FacadePdf::loadView('projek.sijil_eph_jalan_rekabentuk',compact('projek','date'));
        // dd($projek);
        return $projek->download('ePHJKR_SIJIL_PENILAIAN_REKABENTUK_JALAN.'.'pdf');
    }

    public function sijil_eph_jalan_verifikasi(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        // dd($projek);

        $date = Carbon::now()->format('Y-m-d');
        $projek = FacadePdf::loadView('projek.sijil_eph_jalan_verifikasi',compact('projek','date'));
        // dd($projek);
        return $projek->download('ePHJKR_SIJIL_JALAN_VERIFIKASI.'.'pdf');
    }

    public function sijil_eph_jalan_rayuan_rekabentuk(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        // dd($projek);

        $date = Carbon::now()->format('Y-m-d');
        $projek = FacadePdf::loadView('projek.sijil_eph_jalan_rayuan_rekabentuk',compact('projek','date'));
        // dd($projek);
        return $projek->download('ePHJKR_SIJIL_JALAN_RAYUAN_REKABENTUK.'.'pdf');
    }

    public function sijil_eph_jalan_rayuan_verifikasi(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        // dd($projek);

        $date = Carbon::now()->format('Y-m-d');
        $projek = FacadePdf::loadView('projek.sijil_eph_jalan_rayuan_verifikasi',compact('projek','date'));
        // dd($projek);
        return $projek->download('ePHJKR_SIJIL_JALAN_RAYUAN_VERIFIKASI.'.'pdf');
    }

    public function sijil_gpss_bangunan_rekabentuk(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        // dd($projek);

        $date = Carbon::now()->format('Y-m-d');
        $projek = FacadePdf::loadView('projek.sijil_gpss_bangunan_rekabentuk',compact('projek','date'));

            return $projek->download('ePHJKR_SIJIL_GPSS_BANGUNAN_REKABENTUK.'.'pdf');
    }

    public function sijil_gpss_bangunan_verifikasi(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        // dd($projek);

        $date = Carbon::now()->format('Y-m-d');
        $projek = FacadePdf::loadView('projek.sijil_gpss_bangunan_verifikasi',compact('projek','date'));

            return $projek->download('ePHJKR_SIJIL_GPSS_BANGUNAN_VERIFIKASI.'.'pdf');
    }

    public function sijil_gpss_bangunan_rayuan(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        // dd($projek);

        $date = Carbon::now()->format('Y-m-d');
        $projek = FacadePdf::loadView('projek.sijil_gpss_bangunan_rayuan',compact('projek','date'));

            return $projek->download('ePHJKR_SIJIL_GPSS_BANGUNAN_RAYUAN.'.'pdf');
    }

    public function sijil_gpss_jalan_rekabentuk(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        // dd($projek);

        $date = Carbon::now()->format('Y-m-d');
        $projek = FacadePdf::loadView('projek.sijil_gpss_jalan_rekabentuk',compact('projek','date'));

        return $projek->download('ePHJKR_SIJIL_GPSS_JALAN_REKABENTUK.'.'pdf');
    }

    public function sijil_gpss_jalan_verifikasi(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        // dd($projek);

        $date = Carbon::now()->format('Y-m-d');
        $projek = FacadePdf::loadView('projek.sijil_gpss_jalan_verifikasi',compact('projek','date'));

        return $projek->download('ePHJKR_SIJIL_GPSS_JALAN_VERIFIKASI.'.'pdf');
    }

    public function sijil_gpss_jalan_rayuan(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        // dd($projek);

        $date = Carbon::now()->format('Y-m-d');
        $projek = FacadePdf::loadView('projek.sijil_gpss_jalan_rayuan',compact('projek','date'));

        return $projek->download('ePHJKR_SIJIL_GPSS_JALAN_RAYUAN.'.'pdf');
    }

    //SMTP
    public function pengesahan_penilaian(Request $request){
        $user = $request->user();
        $id = (int)$request->route('id');

        $projek = Projek::find($id);
        
        if($projek->status == "Proses Pengisian Skor Rekabentuk Bangunan"){
            $projek->status = "Dalam Pengesahan Skor Rekabentuk Bangunan";
            alert()->success('Sila Tunggu untuk Pengesahan Sekretariat', 'Berjaya');
        }
        elseif($projek->status == "Proses Pengisian Skor Verifikasi Permarkahan Bangunan"){
            $projek->status = "Dalam Pengesahan Skor Verifikasi Permarkahan Bangunan";
            alert()->success('Sila Tunggu untuk Pengesahan Sekretariat', 'Berjaya');
        }
        elseif($projek->status == "Proses Pengisian Skor Validasi Permarkahan Bangunan"){
            $projek->status = "Dalam Pengesahan Skor Validasi Permarkahan Bangunan";
            alert()->success('Sila Tunggu untuk Pengesahan Sekretariat', 'Berjaya');
        }
        elseif($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Bangunan"){
            $projek->status = "Dalam Pengesahan Skor Rekabentuk GPSS Bangunan";
            alert()->success('Sila Tunggu untuk Pengesahan Sekretariat', 'Berjaya');
        }
        elseif($projek->status == "Proses Pengisian Skor Verifikasi GPSS Bangunan"){
            $projek->status = "Dalam Pengesahan Skor Verifikasi GPSS Bangunan";
            alert()->success('Sila Tunggu untuk Pengesahan Sekretariat', 'Berjaya');
        }
        elseif($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Jalan"){
            $projek->status = "Dalam Pengesahan Skor Rekabentuk GPSS Jalan";
            alert()->success('Sila Tunggu untuk Pengesahan Sekretariat', 'Berjaya');
        }
        elseif($projek->status == "Proses Pengisian Skor Verifikasi GPSS Jalan"){
            $projek->status = "Dalam Pengesahan Skor Verifikasi GPSS Jalan";
            alert()->success('Sila Tunggu untuk Pengesahan Sekretariat', 'Berjaya');
        }
        elseif($projek->status == "Proses Pengisian Skor Rekabentuk/Verifikasi Jalan Baru"){
            $projek->status = "Dalam Pengesahan Skor Rekabentuk/Verifikasi Jalan Baru";
            alert()->success('Sila Tunggu untuk Pengesahan Sekretariat', 'Berjaya');
        }
        elseif($projek->status == "Proses Pengisian Skor Rekabentuk/Verifikasi Jalan Naiktaraf"){
            $projek->status = "Dalam Pengesahan Skor Rekabentuk/Verifikasi Jalan Naiktaraf";
            alert()->success('Sila Tunggu untuk Pengesahan Sekretariat', 'Berjaya');
        }
        // elseif($projek->status == "Proses Pengisian Skor Verifikasi Jalan"){
        //     $projek->status = "Dalam Pengesahan Skor Verifikasi Jalan";
        //     alert()->success('Sila Tunggu untuk Pengesahan Sekretariat', 'Berjaya');
        // }
        elseif($projek->status == "Proses Rayuan Bangunan"){
            $projek->status = "Dalam Pengesahan Rayuan Bangunan";
            alert()->success('Sila Tunggu untuk Pengesahan Sekretariat', 'Berjaya');
        }
        elseif($projek->status == "Proses Rayuan GPSS Bangunan"){
            $projek->status = "Dalam Pengesahan Rayuan GPSS Bangunan";
            alert()->success('Sila Tunggu untuk Pengesahan Sekretariat', 'Berjaya');
        }
        elseif($projek->status == "Proses Rayuan GPSS Jalan"){
            $projek->status = "Dalam Pengesahan Rayuan GPSS Jalan";
            alert()->success('Sila Tunggu untuk Pengesahan Sekretariat', 'Berjaya');
        }
        elseif($projek->status == "Proses Rayuan Rekabentuk/Verifikasi Jalan"){
            $projek->status = "Dalam Pengesahan Rayuan Rekabentuk/Verifikasi Jalan";
            alert()->success('Sila Tunggu untuk Pengesahan Sekretariat', 'Berjaya');
        }
        
        
        $projek->save();

        Mail::to('maisarah.musa@pipeline-network.com')->send(new PengesahanPenilaian($projek));

        // $email = Auth::user()->email;
        // Mail::to($user->email)->send(new PengesahanPenilaian($projek));

        return back();
    }

    function append_string ($str1, $str2) {
      
        // Using Concatenation assignment
        // operator (.=)
        $str1 .=$str2;
          
        // Returning the result 
        return $str1;
    }    

    

    




}
