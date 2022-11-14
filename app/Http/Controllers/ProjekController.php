<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DataTables;
use DateTime;
use Carbon\Carbon;
use Alert;
use App\Mail\GugurProjek;
use App\Models\User;
use App\Models\Projek;
use App\Models\Kriteria;
use App\Models\GpssKriteria;
use App\Models\Markah;
use App\Models\GpssMarkah;
use App\Models\EphBangunanRayuanMarkah;
use App\Mail\ProjekStatusBerubah;
use App\Models\ProjekRoleUser;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Mail;


use App\Models\KriteriaEphBangunan;
use App\Models\KriteriaEphJalan;
use App\Models\KriteriaGpssBangunan;
use App\Models\KriteriaGpssJalan;
use Illuminate\Support\Facades\Auth;

class ProjekController extends Controller
{

    public function senarai_projek(Request $request) {
        
        // $user = $request->user();
        // if($user->hasRole('pentadbir|sekretariat|pengurusan-atasan')) {
        //     $projeks = Projek::all();
        //     //dd($projeks);
        // } else if ($user->hasrole('ketua-pasukan|penolong-ketua-pasukan|pemudah-cara|ketua-penilai|ketua-validasi|pasukan-validasi|ketua-pemudah-cara') ){
        //     $projeks = ProjekRoleUser::where('user_id', Auth::user())->get();
        // }
        // // dd('$projeks');

        $projeks = Projek::all();
        //dd('$projeks');

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
            ->addColumn('gugur', function (Projek $projek) {
                $url = '/projek/gugur_projek/'.$projek->id;
                $html_button = '<a href="'.$url.'"><button class="btn btn-primary">gugur</button></a>';
                return $html_button;
            })
            ->editColumn('created_at', function (Projek $projek) {
                return [
                    'display' => ($projek->created_at && $projek->created_at != '0000-00-00 00:00:00') ? with(new Carbon($projek->created_at))->format('d F Y') : '',
                    'timestamp' => ($projek->created_at && $projek->created_at != '0000-00-00 00:00:00') ? with(new Carbon($projek->created_at))->timestamp : ''
                ];
            })
            ->rawColumns(['tindakan', 'gugur','peranan'])
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
            $projek->jenis_projek = $request->jenis_projek;
            $projek->save();
        // }else{
            // alert()->success('Maklumat tidak melebihi syarat ditetapkan', 'Gagal');
            // return redirect('/projek');
        // }

        alert()->success('Maklumat telah disimpan', 'Berjaya');
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
        $projek->aktif = false;
        $projek->save();

        alert()->success('Maklumat telah disahkan', 'Berjaya');
        return redirect('/projek/gugur/senarai_gugur_projek');
    }

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

        alert('maklumat telah disimpan','Berjaya');
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
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->markah;
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
                if($markah) {
                    $html_button = $markah->markah_bei;
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
                if($markah) {
                    $html_button = $markah->ulasan;
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
            ->rawColumns(['markah_', 'ulasan_', 'dokumen_'])
            ->make(true);
        } 
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Baru B') {
            $kriterias = Kriteria::where('borang', 'BARU B')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->markah;
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
                if($markah) {
                    $html_button = $markah->markah_bei;
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
                if($markah) {
                    $html_button = $markah->ulasan;
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
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Baru C') {
            $kriterias = Kriteria::where('borang', 'BARU C')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->markah;
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
                if($markah) {
                    $html_button = $markah->markah_bei;
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
                if($markah) {
                    $html_button = $markah->ulasan;
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
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_'])
            ->make(true);
        } 
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Baru D') {
            $kriterias = Kriteria::where('borang', 'BARU D')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->markah;
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
                if($markah) {
                    $html_button = $markah->markah_bei;
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
                if($markah) {
                    $html_button = $markah->ulasan;
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
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan PUN A') {
            $kriterias = Kriteria::where('borang', 'PUN A')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->markah;
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
                if($markah) {
                    $html_button = $markah->markah_bei;
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
                if($markah) {
                    $html_button = $markah->ulasan;
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
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan PUN B') {
            $kriterias = Kriteria::where('borang', 'PUN B')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->markah;
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
                if($markah) {
                    $html_button = $markah->markah_bei;
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
                if($markah) {
                    $html_button = $markah->ulasan;
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
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan PUN C') {
            $kriterias = Kriteria::where('borang', 'PUN C')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->markah;
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
                if($markah) {
                    $html_button = $markah->markah_bei;
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
                if($markah) {
                    $html_button = $markah->ulasan;
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
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan PUN D') {
            $kriterias = Kriteria::where('borang', 'PUN D')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->markah;
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
                if($markah) {
                    $html_button = $markah->markah_bei;
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
                if($markah) {
                    $html_button = $markah->ulasan;
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
            ->rawColumns(['markah_', 'markah_bei', 'ulasan_', 'dokumen_'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Sedia Ada A') {
            $kriterias = Kriteria::where('borang', 'SEDIA ADA A')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->markah;
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
                if($markah) {
                    $html_button = $markah->markah_bei;
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
                if($markah) {
                    $html_button = $markah->ulasan;
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
            ->rawColumns(['markah_', 'ulasan_', 'dokumen_'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Sedia Ada B') {
            $kriterias = Kriteria::where('borang', 'SEDIA ADA B')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->markah;
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
                if($markah) {
                    $html_button = $markah->markah_bei;
                }         
                return $html_button;   
            })
            ->addColumn('markah_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                // $html_button2 = '?';
                // $html_button3 = '?';
                $markah1 = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                    ['fasa', '=', 'rekabentuk'],
                    ['fasa', '=', 'verifikasi'],
                    ['fasa', '=', 'validasi'],
                ])->first();       
                if($markah1) {
                    $html_button = $markah1->markah;
                }    
                // $markah2 = Markah::where([
                //     ['projek_id', '=', $projek->id],
                //     ['kriteria_id', '=', $kriteria_id],
                //     ['fasa', '=', 'verifikasi'],
                // ])->first();       
                // if($markah2) {
                //     $html_button2 = $markah2->markah;
                // }  
                // $markah3 = Markah::where([
                //     ['projek_id', '=', $projek->id],
                //     ['kriteria_id', '=', $kriteria_id],
                //     ['fasa', '=', 'validasi'],
                // ])->first();       
                // if($markah3) {
                //     $html_button3 = $markah3->markah;
                // }                                       
                // $html_button = $html_button1;
                return $html_button;
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->ulasan;
                }         
                return $html_button;
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->ulasan_rayuan;
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
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
            
                // Rayuan
                if($markah) {
                    if($markah->dokumen_rayuan1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen_rayuan2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen_rayuan3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen_rayuan4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen_rayuan5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }
                return $html_button;
            })                       
            ->rawColumns(['markah_', 'markah_rayuan', 'ulasan_', 'dokumen_', 'ulasan_rayuan', 'dokumen_rayuan'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Sedia Ada C') {
            $kriterias = Kriteria::where('borang', 'SEDIA ADA C')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->markah;
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
                if($markah) {
                    $html_button = $markah->markah_bei;
                }         
                return $html_button;   
            })
            ->addColumn('markah_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                // $html_button2 = '?';
                // $html_button3 = '?';
                $markah1 = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                    ['fasa', '=', 'rekabentuk'],
                    ['fasa', '=', 'verifikasi'],
                    ['fasa', '=', 'validasi'],
                ])->first();       
                // if($markah1) {
                //     $html_button1 = $markah1->markah;
                // }    
                // $markah2 = Markah::where([
                //     ['projek_id', '=', $projek->id],
                //     ['kriteria_id', '=', $kriteria_id],
                //     ['fasa', '=', 'verifikasi'],
                // ])->first();       
                // if($markah2) {
                //     $html_button2 = $markah2->markah;
                // }  
                // $markah3 = Markah::where([
                //     ['projek_id', '=', $projek->id],
                //     ['kriteria_id', '=', $kriteria_id],
                //     ['fasa', '=', 'validasi'],
                // ])->first();       
                // if($markah3) {
                //     $html_button3 = $markah3->markah;
                // }                                       
                // $html_button = $html_button1;
                return $html_button;
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->ulasan;
                }         
                return $html_button;
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->ulasan_rayuan;
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
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
            
                // Rayuan
                if($markah) {
                    if($markah->dokumen_rayuan1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen_rayuan2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen_rayuan3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen_rayuan4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen_rayuan5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }
                return $html_button;
            })                       
            ->rawColumns(['markah_', 'markah_rayuan', 'ulasan_', 'dokumen_', 'ulasan_rayuan', 'dokumen_rayuan'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Sedia Ada D') {
            $kriterias = Kriteria::where('borang', 'SEDIA ADA D')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->markah;
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
                if($markah) {
                    $html_button = $markah->markah_bei;
                }         
                return $html_button;   
            })
            ->addColumn('markah_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                // $html_button2 = '?';
                // $html_button3 = '?';
                $markah1 = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                    ['fasa', '=', 'rekabentuk'],
                    ['fasa', '=', 'verifikasi'],
                    ['fasa', '=', 'validasi'],
                ])->first();       
                if($markah1) {
                    $html_button = $markah1->markah;
                }    
                // $markah2 = Markah::where([
                //     ['projek_id', '=', $projek->id],
                //     ['kriteria_id', '=', $kriteria_id],
                //     ['fasa', '=', 'verifikasi'],
                // ])->first();       
                // if($markah2) {
                //     $html_button2 = $markah2->markah;
                // }  
                // $markah3 = Markah::where([
                //     ['projek_id', '=', $projek->id],
                //     ['kriteria_id', '=', $kriteria_id],
                //     ['fasa', '=', 'validasi'],
                // ])->first();       
                // if($markah3) {
                //     $html_button3 = $markah3->markah;
                // }                                       
                // $html_button = $html_button1;
                return $html_button;
            })
            ->addColumn('ulasan_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->ulasan;
                }         
                return $html_button;
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->ulasan_rayuan;
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
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first(); 
            
                // Rayuan
                if($markah) {
                    if($markah->dokumen_rayuan1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen_rayuan2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen_rayuan3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen_rayuan4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen_rayuan5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }
                return $html_button;
            })                       
            ->rawColumns(['markah_', 'markah_rayuan', 'ulasan_', 'dokumen_', 'ulasan_rayuan', 'dokumen_rayuan'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'GPSS Bangunan 1') {
            $gpss_kriterias = GpssKriteria::where('borang', 'CATEGORY 1')->get();
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
                    $html_button = $markah->point_allocated;
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
                    $html_button = $markah->point_req_design;
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
                    $html_button = $markah->point_req_construction;
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
                    $html_button = $markah->point_awarded;
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
                    $html_button = $markah->remarks;
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
                    $html_button = $markah->point_allocated;
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
                    $html_button = $markah->point_req_design;
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
                    $html_button = $markah->point_req_construction;
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
                    $html_button = $markah->point_awarded;
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
                    $html_button = $markah->remarks;
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
                    $html_button = $markah->point_allocated;
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
                    $html_button = $markah->point_req_design;
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
                    $html_button = $markah->point_req_construction;
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
                    $html_button = $markah->point_awarded;
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
                    $html_button = $markah->remarks;
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
                    $html_button = $markah->point_allocated;
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
                    $html_button = $markah->point_req_design;
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
                    $html_button = $markah->point_req_construction;
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
                    $html_button = $markah->point_awarded;
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
                    $html_button = $markah->remarks;
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
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->markah;
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
                if($markah) {
                    $html_button = $markah->ulasan;
                }         
                return $html_button;
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->ulasan_rayuan;
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
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],

                ])->first(); 
            
                // Rayuan
                if($markah) {
                    if($markah->dokumen_rayuan1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen_rayuan2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen_rayuan3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen_rayuan4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen_rayuan5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }
                return $html_button;
            })                       
            ->rawColumns(['markah_', 'ulasan_', 'dokumen_', 'ulasan_rayuan', 'dokumen_rayuan'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Jalan Naiktaraf') {
            $kriterias = Kriteria::where('borang', 'NEW ROADS')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->markah;
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
                if($markah) {
                    $html_button = $markah->ulasan;
                }         
                return $html_button;
            })
            ->addColumn('ulasan_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button = $markah->ulasan_rayuan;
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
            ->addColumn('dokumen_rayuan', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],

                ])->first(); 
            
                // Rayuan
                if($markah) {
                    if($markah->dokumen_rayuan1) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen1;
                        $html_button = '<a href="'.$url.'">Dokumen 1</a>';
                    }
                    if($markah->dokumen_rayuan2) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen2;
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen_rayuan3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen_rayuan4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen_rayuan5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }
                return $html_button;
            })                       
            ->rawColumns(['markah_', 'ulasan_', 'dokumen_', 'ulasan_rayuan', 'dokumen_rayuan'])
            ->make(true);
        }
           

        //Calculation Part
        if ($projek->kategori ==  'phJKR Bangunan Baru A') {
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'BARU A'],
                ['fasa','=', 'rekabentuk'],
            ])->get();    

            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU A'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU A'],
                ['fasa','=', 'validasi'],
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'BARU A']
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
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    $tl_mr +=  $markah_tl_mr->markah;
                } 
                elseif ($markah_tl_mv){
                    $tl_mv += $markah_tl_mv->markah;
                } 
                elseif ($markah_tl_ml){
                    $tl_ml += $markah_tl_ml->markah;
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_kt_mr){
                    $kt_mr +=  $markah_kt_mr->markah;
                }
                elseif ($markah_kt_mv){
                    $kt_mv += $markah_kt_mv->markah;
                }
                elseif ($markah_kt_ml){
                    $kt_ml += $markah_kt_ml->markah;
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    $sb_mr +=  $markah_sb_mr->markah;
                } 
                elseif ($markah_sb_mv){
                    $sb_mv += $markah_sb_mv->markah;
                }
                elseif ($markah_sb_ml){
                    $sb_ml += $markah_sb_ml->markah;
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pa_mr){
                    $pa_mr +=  $markah_pa_mr->markah;
                } 
                elseif ($markah_pa_mv){
                    $pa_mv += $markah_pa_mv->markah;
                }
                elseif ($markah_pa_ml){
                    $pa_ml += $markah_pa_ml->markah;
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pd_mr){
                    $pd_mr +=  $markah_pd_mr->markah;
                } 
                elseif ($markah_pd_mv){
                    $pd_mv += $markah_pd_mv->markah;
                }
                elseif ($markah_pd_ml){
                    $pd_ml += $markah_pd_ml->markah;
                }
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    $in_mr +=  $markah_in_mr->markah;
                } 
                elseif ($markah_in_mv){
                    $in_mv += $markah_in_mv->markah;
                }
                elseif ($markah_in_ml){
                    $in_ml += $markah_in_ml->markah;
                }                            
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $in_ml; 

            $peratusan_mr = $total_mr /101 *100;     
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

            $peratusan_mv = $total_mv /103 *100;     
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

            $peratusan_ml = $total_ml /103 *100;     
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


            // dd($kt_mr);   
            return view('projek.satu_eph_bangunan', compact(
                'projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias','rayuan_kriterias', 'users', 'lantikans',
                'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
                'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'in_mr','total_mr', 
                'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'in_mv','total_mv',
                'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'in_ml','total_ml',
            ));             
        } elseif ($projek->kategori ==  'phJKR Bangunan Baru B') {
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'BARU B'],
                ['fasa','=', 'rekabentuk'],
            ])->get();    

            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU B'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU B'],
                ['fasa','=', 'validasi'],
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'BARU B']
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
            
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    $tl_mr +=  $markah_tl_mr->markah;
                } 
                elseif ($markah_tl_mv){
                    $tl_mv += $markah_tl_mv->markah;
                } 
                elseif ($markah_tl_ml){
                    $tl_ml += $markah_tl_ml->markah;
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_kt_mr){
                    $kt_mr +=  $markah_kt_mr->markah;
                }
                elseif ($markah_kt_mv){
                    $kt_mv += $markah_kt_mv->markah;
                }
                elseif ($markah_kt_ml){
                    $kt_ml += $markah_kt_ml->markah;
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    $sb_mr +=  $markah_sb_mr->markah;
                } 
                elseif ($markah_sb_mv){
                    $sb_mv += $markah_sb_mv->markah;
                }
                elseif ($markah_sb_ml){
                    $sb_ml += $markah_sb_ml->markah;
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pa_mr){
                    $pa_mr +=  $markah_pa_mr->markah;
                } 
                elseif ($markah_pa_mv){
                    $pa_mv += $markah_pa_mv->markah;
                }
                elseif ($markah_pa_ml){
                    $pa_ml += $markah_pa_ml->markah;
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pd_mr){
                    $pd_mr +=  $markah_pd_mr->markah;
                }
                elseif ($markah_pd_mv){
                    $pd_mv += $markah_pd_mv->markah;
                }
                elseif ($markah_pd_ml){
                    $pd_ml += $markah_pd_ml->markah;
                } 
            }
            foreach($fl_kriterias as $fl_kriteria) {                
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_fl_mr){
                    $fl_mr +=  $markah_fl_mr->markah;
                } 
                elseif ($markah_fl_mv){
                    $fl_mv += $markah_fl_mv->markah;
                }
                elseif ($markah_fl_mv){
                    $fl_ml += $markah_fl_ml->markah;
                }                                
            }  
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    $in_mr +=  $markah_in_mr->markah;
                } 
                elseif ($markah_in_mv){
                    $in_mv += $markah_in_mv->markah;
                }
                elseif ($markah_in_ml){
                    $in_ml += $markah_in_ml->markah;
                }                               
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 

            $peratusan_mr = $total_mr /131 *100;     
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

            $peratusan_mv = $total_mv /138 *100;     
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

            $peratusan_ml = $total_ml /138 *100;     
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

            // dd($pd_mv);
            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' , 'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
        ));             
        } elseif ($projek->kategori ==  'phJKR Bangunan Baru C') {
            // $kriterias = Kriteria::where('borang', 'BARU C')->get(); 
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'BARU C'],
                ['fasa','=', 'rekabentuk'],
            ])->get();    

            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU C'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'BARU C'],
                ['fasa','=', 'validasi'],
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'BARU C']
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
            
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    $tl_mr +=  $markah_tl_mr->markah;
                } 
                elseif ($markah_tl_mv){
                    $tl_mv += $markah_tl_mv->markah;
                } 
                elseif ($markah_tl_ml){
                    $tl_ml += $markah_tl_ml->markah;
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_kt_mr){
                    $kt_mr +=  $markah_kt_mr->markah;
                }
                elseif ($markah_kt_mv){
                    $kt_mv += $markah_kt_mv->markah;
                }
                elseif ($markah_kt_ml){
                    $kt_ml += $markah_kt_ml->markah;
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    $sb_mr +=  $markah_sb_mr->markah;
                } 
                elseif ($markah_sb_mv){
                    $sb_mv += $markah_sb_mv->markah;
                }
                elseif ($markah_sb_ml){
                    $sb_ml += $markah_sb_ml->markah;
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pa_mr){
                    $pa_mr +=  $markah_pa_mr->markah;
                } 
                elseif ($markah_pa_mv){
                    $pa_mv += $markah_pa_mv->markah;
                }
                elseif ($markah_pa_ml){
                    $pa_ml += $markah_pa_ml->markah;
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pd_mr){
                    $pd_mr +=  $markah_pd_mr->markah;
                } 
                elseif ($markah_pd_mv){
                    $pd_mv += $markah_pd_mv->markah;
                }
                elseif ($markah_pd_ml){
                    $pd_ml += $markah_pd_ml->markah;
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {                
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_fl_mr){
                    $fl_mr +=  $markah_fl_mr->markah;
                } 
                elseif ($markah_fl_mv){
                    $fl_mv += $markah_fl_mv->markah;
                } 
                elseif ($markah_fl_ml){
                    $fl_ml += $markah_fl_ml->markah;
                }                              
            }  
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    $in_mr +=  $markah_in_mr->markah;
                } 
                elseif ($markah_in_mv){
                    $in_mv += $markah_in_mv->markah;
                }
                elseif ($markah_in_ml){
                    $in_ml += $markah_in_ml->markah;
                }
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 

            $peratusan_mr = $total_mr /159 *100;     
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

            $peratusan_ml = $total_ml /166 *100;     
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
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
                ['borang','=', 'BARU D']
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
            
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    $tl_mr +=  $markah_tl_mr->markah;
                } 
                elseif ($markah_tl_mv){
                    $tl_mv += $markah_tl_mv->markah;
                } 
                elseif ($markah_tl_ml){
                    $tl_ml += $markah_tl_ml->markah;
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_kt_mr){
                    $kt_mr +=  $markah_kt_mr->markah;
                }
                elseif ($markah_kt_mv){
                    $kt_mv += $markah_kt_mv->markah;
                }
                elseif ($markah_kt_ml){
                    $kt_ml += $markah_kt_ml->markah;
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    $sb_mr +=  $markah_sb_mr->markah;
                } 
                elseif ($markah_sb_mv){
                    $sb_mv += $markah_sb_mv->markah;
                }
                elseif ($markah_sb_ml){
                    $sb_ml += $markah_sb_ml->markah;
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pa_mr){
                    $pa_mr +=  $markah_pa_mr->markah;
                } 
                elseif ($markah_pa_mv){
                    $pa_mv += $markah_pa_mv->markah;
                }
                elseif ($markah_pa_ml){
                    $pa_ml += $markah_pa_ml->markah;
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pd_mr){
                    $pd_mr +=  $markah_pd_mr->markah;
                } 
                elseif ($markah_pd_mv){
                    $pd_mv += $markah_pd_mv->markah;
                }
                elseif ($markah_pd_ml){
                    $pd_ml += $markah_pd_ml->markah;
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {                
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_fl_mr){
                    $fl_mr +=  $markah_fl_mr->markah;
                } 
                elseif ($markah_fl_mv){
                    $fl_mv += $markah_fl_mv->markah;
                } 
                elseif ($markah_fl_ml){
                    $fl_ml += $markah_fl_ml->markah;
                }                             
            }  
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    $in_mr +=  $markah_in_mr->markah;
                } 
                elseif ($markah_in_mv){
                    $in_mv += $markah_in_mv->markah;
                }
                elseif ($markah_in_ml){
                    $in_ml += $markah_in_ml->markah;
                }                               
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 

            $peratusan_mr = $total_mr /166 *100;     
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
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
                ['borang','=', 'PUN A']
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
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 6]])->get();
            $fl_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 7]])->get();
            $in_mr = 0;

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
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 6]])->get();
            $fl_mv = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 7]])->get();
            $in_mv = 0;

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
            $fl_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 6]])->get();
            $fl_ml = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'PUN A'],['borang_seq','=', 7]])->get();
            $in_ml = 0;
            
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    $tl_mr +=  $markah_tl_mr->markah;
                } 
                elseif ($markah_tl_mv){
                    $tl_mv += $markah_tl_mv->markah;
                } 
                elseif ($markah_tl_ml){
                    $tl_ml += $markah_tl_ml->markah;
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_kt_mr){
                    $kt_mr +=  $markah_kt_mr->markah;
                }
                elseif ($markah_kt_mv){
                    $kt_mv += $markah_kt_mv->markah;
                }
                elseif ($markah_kt_ml){
                    $kt_ml += $markah_kt_ml->markah;
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    $sb_mr +=  $markah_sb_mr->markah;
                } 
                elseif ($markah_sb_mv){
                    $sb_mv += $markah_sb_mv->markah;
                }
                elseif ($markah_sb_ml){
                    $sb_ml += $markah_sb_ml->markah;
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pa_mr){
                    $pa_mr +=  $markah_pa_mr->markah;
                } 
                elseif ($markah_pa_mv){
                    $pa_mv += $markah_pa_mv->markah;
                }
                elseif ($markah_pa_ml){
                    $kt_ml += $markah_kt_ml->markah;
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pd_mr){
                    $pd_mr +=  $markah_pd_mr->markah;
                } 
                elseif ($markah_pd_mv){
                    $pd_mv += $markah_pd_mv->markah;
                }
                elseif ($markah_pa_ml){
                    $pd_ml += $markah_pd_ml->markah;
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {                
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_fl_mr){
                    $fl_mr +=  $markah_fl_mr->markah;
                } 
                elseif ($markah_fl_mv){
                    $fl_mv += $markah_fl_mv->markah;
                } 
                elseif ($markah_fl_ml){
                    $fl_ml += $markah_fl_ml->markah;
                }                             
            }  
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    $in_mr +=  $markah_in_mr->markah;
                } 
                elseif ($markah_in_mv){
                    $in_mv += $markah_in_mv->markah;
                }
                elseif ($markah_in_ml){
                    $in_ml += $markah_in_ml->markah;
                }                              
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 

            $peratusan_mr = $total_mr /73 *100;     
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan PUN B') {
            // $kriterias = Kriteria::where('borang', 'PUN B')->get();
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'PUN B'],
                ['fasa','=', 'rekabentuk'],
            ])->get();    

            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN B'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN B'],
                ['fasa','=', 'validasi'],
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'PUN B']
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
            
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    $tl_mr +=  $markah_tl_mr->markah;
                } 
                elseif ($markah_tl_mv){
                    $tl_mv += $markah_tl_mv->markah;
                } 
                elseif ($markah_tl_ml){
                    $tl_ml += $markah_tl_ml->markah;
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_kt_mr){
                    $kt_mr +=  $markah_kt_mr->markah;
                }
                elseif ($markah_kt_mv){
                    $kt_mv += $markah_kt_mv->markah;
                }
                elseif ($markah_kt_ml){
                    $kt_ml += $markah_kt_ml->markah;
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    $sb_mr +=  $markah_sb_mr->markah;
                } 
                elseif ($markah_sb_mv){
                    $sb_mv += $markah_sb_mv->markah;
                }
                elseif ($markah_sb_ml){
                    $sb_ml += $markah_sb_ml->markah;
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pa_mr){
                    $pa_mr +=  $markah_pa_mr->markah;
                } 
                elseif ($markah_pa_mv){
                    $pa_mv += $markah_pa_mv->markah;
                }
                elseif ($markah_pa_ml){
                    $pa_ml += $markah_pa_ml->markah;
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pd_mr){
                    $pd_mr +=  $markah_pd_mr->markah;
                } 
                elseif ($markah_pd_mv){
                    $pd_mv += $markah_pd_mv->markah;
                }
                elseif ($markah_pd_ml){
                    $pd_ml += $markah_pd_ml->markah;
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {                
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_fl_mr){
                    $fl_mr +=  $markah_fl_mr->markah;
                } 
                elseif ($markah_fl_mv){
                    $fl_mv += $markah_fl_mv->markah;
                } 
                elseif ($markah_fl_ml){
                    $fl_ml += $markah_fl_ml->markah;
                }                             
            }  
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    $in_mr +=  $markah_in_mr->markah;
                } 
                elseif ($markah_in_mv){
                    $in_mv += $markah_in_mv->markah;
                }
                elseif ($markah_in_ml){
                    $in_ml += $markah_in_ml->markah;
                }                              
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 

            $peratusan_mr = $total_mr /118 *100;     
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan PUN C') {
            // $kriterias = Kriteria::where('borang', 'PUN C')->get();
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'PUN C'],
                ['fasa','=', 'rekabentuk'],
            ])->get();    

            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN C'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN C'],
                ['fasa','=', 'validasi'],
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'PUN C']
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
            
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    $tl_mr +=  $markah_tl_mr->markah;
                } 
                elseif ($markah_tl_mv){
                    $tl_mv += $markah_tl_mv->markah;
                } 
                elseif ($markah_tl_ml){
                    $tl_ml += $markah_tl_ml->markah;
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_kt_mr){
                    $kt_mr +=  $markah_kt_mr->markah;
                }
                elseif ($markah_kt_mv){
                    $kt_mv += $markah_kt_mv->markah;
                }
                elseif ($markah_kt_ml){
                    $kt_ml += $markah_kt_ml->markah;
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    $sb_mr +=  $markah_sb_mr->markah;
                } 
                elseif ($markah_sb_mv){
                    $sb_mv += $markah_sb_mv->markah;
                }
                elseif ($markah_sb_ml){
                    $sb_ml += $markah_sb_ml->markah;
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pa_mr){
                    $pa_mr +=  $markah_pa_mr->markah;
                } 
                elseif ($markah_pa_mv){
                    $pa_mv += $markah_pa_mv->markah;
                }
                elseif ($markah_pa_ml){
                    $pa_ml += $markah_pa_ml->markah;
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pd_mr){
                    $pd_mr +=  $markah_pd_mr->markah;
                } 
                elseif ($markah_pd_mv){
                    $pd_mv += $markah_pd_mv->markah;
                }
                elseif ($markah_pd_ml){
                    $pd_ml += $markah_pd_ml->markah;
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {                
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_fl_mr){
                    $fl_mr +=  $markah_fl_mr->markah;
                } 
                elseif ($markah_fl_mv){
                    $fl_mv += $markah_fl_mv->markah;
                }
                elseif ($markah_fl_ml){
                    $fl_ml += $markah_fl_ml->markah;
                }                              
            }  
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    $in_mr +=  $markah_in_mr->markah;
                } 
                elseif ($markah_in_mv){
                    $in_mv += $markah_in_mv->markah;
                }
                elseif ($markah_in_ml){
                    $in_ml += $markah_in_ml->markah;
                }                              
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 

            $peratusan_mr = $total_mr /151 *100;     
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan PUN D') {
            // $kriterias = Kriteria::where('borang', 'PUN D')->get(); 
            $rekabentuk_kriterias = Kriteria::where([
                ['borang','=', 'PUN D'],
                ['fasa','=', 'rekabentuk'],
            ])->get();    

            $verifikasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN D'],
                ['fasa','=', 'verifikasi'],
            ])->get();

            $validasi_kriterias = Kriteria::where([
                ['borang','=', 'PUN D'],
                ['fasa','=', 'validasi'],
            ])->get();

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'PUN D']
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
            
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    $tl_mr +=  $markah_tl_mr->markah;
                } 
                elseif ($markah_tl_mv){
                    $tl_mv += $markah_tl_mv->markah;
                } 
                elseif ($markah_tl_ml){
                    $tl_ml += $markah_tl_ml->markah;
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_kt_mr){
                    $kt_mr +=  $markah_kt_mr->markah;
                }
                elseif ($markah_kt_mv){
                    $kt_mv += $markah_kt_mv->markah;
                }
                elseif ($markah_kt_ml){
                    $kt_ml += $markah_kt_ml->markah;
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    $sb_mr +=  $markah_sb_mr->markah;
                } 
                elseif ($markah_sb_mv){
                    $sb_mv += $markah_sb_mv->markah;
                }
                elseif ($markah_sb_ml){
                    $sb_ml += $markah_sb_ml->markah;
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pa_mr){
                    $pa_mr +=  $markah_pa_mr->markah;
                } 
                elseif ($markah_pa_mv){
                    $pa_mv += $markah_pa_mv->markah;
                }
                elseif ($markah_pa_ml){
                    $pa_ml += $markah_pa_ml->markah;
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pd_mr){
                    $pd_mr +=  $markah_pd_mr->markah;
                }
                elseif ($markah_pd_mv){
                    $pd_mv += $markah_pd_mv->markah;
                }
                elseif ($markah_pd_ml){
                    $pd_ml += $markah_pd_ml->markah;
                } 
            }
            foreach($fl_kriterias as $fl_kriteria) {                
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_fl_mr){
                    $fl_mr +=  $markah_fl_mr->markah;
                } 
                elseif ($markah_fl_mv){
                    $fl_mv += $markah_fl_mv->markah;
                } 
                elseif ($markah_fl_ml){
                    $fl_ml += $markah_fl_ml->markah;
                }                             
            }  
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    $in_mr +=  $markah_in_mr->markah;
                } 
                elseif ($markah_in_mv){
                    $in_mv += $markah_in_mv->markah;
                }
                elseif ($markah_in_ml){
                    $in_ml += $markah_in_ml->markah;
                }                              
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 

            $peratusan_mr = $total_mr /156 *100;     
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'validasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
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
                ['borang','=', 'SEDIA ADA A']
            ])->get(); 

            // Rekabentuk borang SEDIA ADA A
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 6]])->get();
            $fl_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA A'],['borang_seq','=', 7]])->get();
            $in_mr = 0;

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
            
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_tl_mr){
                    $tl_mr +=  $markah_tl_mr->markah;
                } 
                elseif ($markah_tl_mv){
                    $tl_mv += $markah_tl_mv->markah;
                } 
                elseif ($markah_tl_ml){
                    $tl_ml += $markah_tl_ml->markah;
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_kt_mr){
                    $kt_mr +=  $markah_kt_mr->markah;
                }
                elseif ($markah_kt_mv){
                    $kt_mv += $markah_kt_mv->markah;
                }
                elseif ($markah_kt_ml){
                    $kt_ml += $markah_kt_ml->markah;
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_sb_mr){
                    $sb_mr +=  $markah_sb_mr->markah;
                } 
                elseif ($markah_sb_mv){
                    $sb_mv += $markah_sb_mv->markah;
                }
                elseif ($markah_sb_ml){
                    $sb_ml += $markah_sb_ml->markah;
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pa_mr){
                    $pa_mr +=  $markah_pa_mr->markah;
                } 
                elseif ($markah_pa_mv){
                    $pa_mv += $markah_pa_mv->markah;
                }
                elseif ($markah_pa_ml){
                    $pa_ml += $markah_pa_ml->markah;
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();                
                if($markah_pd_mr){
                    $pd_mr +=  $markah_pd_mr->markah;
                }
                elseif ($markah_pd_mv){
                    $pd_mv += $markah_pd_mv->markah;
                }
                elseif ($markah_pd_ml){
                    $pd_ml += $markah_pd_ml->markah;
                } 
            }
            foreach($fl_kriterias as $fl_kriteria) {                
                $markah_fl_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_fl_mr){
                    $fl_mr +=  $markah_fl_mr->markah;
                } 
                elseif ($markah_fl_mv){
                    $fl_mv += $markah_fl_mv->markah;
                } 
                elseif ($markah_fl_ml){
                    $fl_ml += $markah_fl_ml->markah;
                }                             
            }  
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mr = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mr){
                    $in_mr +=  $markah_in_mr->markah;
                } 
                elseif ($markah_in_mv){
                    $in_mv += $markah_in_mv->markah;
                }
                elseif ($markah_in_ml){
                    $in_ml += $markah_in_ml->markah;
                }                              
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 

            $peratusan_mr = $total_mr /1 *100;     
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

            $peratusan_mv = $total_mv /62 *100;     
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


            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role', 'verifikasi_kriterias', 'validasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
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
                ['borang','=', 'SEDIA ADA B']
            ])->get();
            
            // Rekabentuk borang SEDIA ADA B
            $tl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 1]])->get();
            $tl_mr = 0;
            $kt_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 2]])->get();
            $kt_mr = 0;
            $sb_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 3]])->get();
            $sb_mr = 0;
            $pa_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 4]])->get();
            $pa_mr = 0;
            $pd_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 5]])->get();
            $pd_mr = 0;
            $fl_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 6]])->get();
            $fl_mr = 0;
            $in_kriterias = Kriteria::where([['borang','=', 'SEDIA ADA B'],['borang_seq','=', 7]])->get();
            $in_mr = 0;

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
            
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if ($markah_tl_mv){
                    $tl_mv += $markah_tl_mv->markah;
                } 
                elseif ($markah_tl_ml){
                    $tl_ml += $markah_tl_ml->markah;
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();                
                if ($markah_kt_mv){
                    $kt_mv += $markah_kt_mv->markah;
                }
                elseif ($markah_kt_ml){
                    $kt_ml += $markah_kt_ml->markah;
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if ($markah_sb_mv){
                    $sb_mv += $markah_sb_mv->markah;
                }
                elseif ($markah_sb_ml){
                    $sb_ml += $markah_sb_ml->markah;
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();                
                if ($markah_pa_mv){
                    $pa_mv += $markah_pa_mv->markah;
                }
                elseif ($markah_pa_ml){
                    $pa_ml += $markah_pa_ml->markah;
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();                
                if ($markah_pd_mv){
                    $pd_mv +=  $markah_pd_mv->markah;
                } 
                elseif ($markah_pd_ml){
                    $pd_ml += $markah_pd_ml->markah;
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {                
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_fl_mv){
                    $fl_mv +=  $markah_fl_mv->markah;
                } 
                elseif ($markah_fl_ml){
                    $fl_ml += $markah_fl_ml->markah;
                }                              
            }  
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mv){
                    $in_mv +=  $markah_in_mv->markah;
                } 
                elseif ($markah_in_ml){
                    $in_ml += $markah_in_ml->markah;
                }                              
            }                                  
                 
            $total_mr = $tl_mr + $kt_mr + $sb_mr + $pa_mr + $pd_mr + $fl_mr + $in_mr; 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 

            $peratusan_mr = $total_mr /1 *100;     
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

            $peratusan_mv = $total_mv /108 *100;     
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

            $peratusan_ml = $total_ml /108 *100;     
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role', 'verifikasi_kriterias', 'validasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
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
                ['borang','=', 'SEDIA ADA C']
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
            
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if ($markah_tl_mv){
                    $tl_mv += $markah_tl_mv->markah;
                } 
                elseif ($markah_tl_ml){
                    $tl_ml += $markah_tl_ml->markah;
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();                
                if ($markah_kt_mv){
                    $kt_mv += $markah_kt_mv->markah;
                }
                elseif ($markah_kt_ml){
                    $kt_ml += $markah_kt_ml->markah;
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if ($markah_sb_mv){
                    $sb_mv += $markah_sb_mv->markah;
                }
                elseif ($markah_sb_ml){
                    $sb_ml += $markah_sb_ml->markah;
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();                
                if ($markah_pa_mv){
                    $pa_mv += $markah_pa_mv->markah;
                }
                elseif ($markah_pa_ml){
                    $pa_ml += $markah_pa_ml->markah;
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();                
                if ($markah_pd_mv){
                    $pd_mv +=  $markah_pd_mv->markah;
                } 
                elseif ($markah_pd_ml){
                    $pd_ml += $markah_pd_ml->markah;
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {                
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_fl_mv){
                    $fl_mv +=  $markah_fl_mv->markah;
                } 
                elseif ($markah_fl_ml){
                    $fl_ml += $markah_fl_ml->markah;
                }                              
            }  
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mv){
                    $in_mv +=  $markah_in_mv->markah;
                } 
                elseif ($markah_in_ml){
                    $in_ml += $markah_in_ml->markah;
                }                              
            }                                  
                 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 

            $peratusan_mv = $total_mv /108 *100;     
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

            $peratusan_ml = $total_ml /108 *100;     
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' , 'verifikasi_kriterias', 'validasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
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
                ['borang','=', 'SEDIA ADA D']
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
            
            
            foreach($tl_kriterias as $tl_kriteria) {                
                $markah_tl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_tl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $tl_kriteria->id],['fasa','=','validasi']])->first();
                if ($markah_tl_mv){
                    $tl_mv += $markah_tl_mv->markah;
                } 
                elseif ($markah_tl_ml){
                    $tl_ml += $markah_tl_ml->markah;
                }                                
            }  
            foreach($kt_kriterias as $kt_kriteria) {
                $markah_kt_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_kt_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $kt_kriteria->id],['fasa','=','validasi']])->first();                
                if ($markah_kt_mv){
                    $kt_mv += $markah_kt_mv->markah;
                }
                elseif ($markah_kt_ml){
                    $kt_ml += $markah_kt_ml->markah;
                }
            }
            foreach($sb_kriterias as $sb_kriteria) {
                $markah_sb_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sb_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sb_kriteria->id],['fasa','=','validasi']])->first();                
                if ($markah_sb_mv){
                    $sb_mv += $markah_sb_mv->markah;
                }
                elseif ($markah_sb_ml){
                    $sb_ml += $markah_sb_ml->markah;
                }
            }
            foreach($pa_kriterias as $pa_kriteria) {
                $markah_pa_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pa_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pa_kriteria->id],['fasa','=','validasi']])->first();                
                if ($markah_pa_mv){
                    $pa_mv += $markah_pa_mv->markah;
                }
                elseif ($markah_pa_ml){
                    $pa_ml += $markah_pa_ml->markah;
                }
            }
            foreach($pd_kriterias as $pd_kriteria) {
                $markah_pd_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pd_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pd_kriteria->id],['fasa','=','validasi']])->first();                
                if ($markah_pd_mv){
                    $pd_mv +=  $markah_pd_mv->markah;
                } 
                elseif ($markah_pd_ml){
                    $pd_ml += $markah_pd_ml->markah;
                }
            }
            foreach($fl_kriterias as $fl_kriteria) {                
                $markah_fl_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_fl_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $fl_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_fl_mv){
                    $fl_mv +=  $markah_fl_mv->markah;
                } 
                elseif ($markah_fl_ml){
                    $fl_ml += $markah_fl_ml->markah;
                }                              
            }  
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_mv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_ml = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','validasi']])->first();
                if($markah_in_mv){
                    $in_mv +=  $markah_in_mv->markah;
                } 
                elseif ($markah_in_ml){
                    $in_ml += $markah_in_ml->markah;
                }                              
            }                                  
                 
            $total_mv = $tl_mv + $kt_mv + $sb_mv + $pa_mv + $pd_mv + $fl_mv + $in_mv; 
            $total_ml = $tl_ml + $kt_ml + $sb_ml + $pa_ml + $pd_ml + $fl_ml + $in_ml; 

            $peratusan_mv = $total_mv /108 *100;     
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

            $peratusan_ml = $total_ml /108 *100;     
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role', 'verifikasi_kriterias', 'validasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
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

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'NEW ROADS']
            ])->get();  
        
            // Rekabentuk borang NEW ROADS D
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

            // Verifikasi borang NEW ROADS D
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
            
            
            foreach($sm_kriterias as $sm_kriteria) {                
                $markah_sm_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sm_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sm_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sm_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_sm_td){
                    $sm_td += $markah_sm_td->markah;
                } 
                elseif ($markah_sm_ad){
                    $sm_ad += $markah_sm_ad->markah;
                }
                elseif ($markah_sm_tv){
                    $sm_ad += $markah_sm_tv->markah;
                }
                elseif ($markah_sm_av){
                    $sm_ad += $markah_sm_av->markah;
                }                                
            }  
            foreach($pt_kriterias as $pt_kriteria) {                
                $markah_pt_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pt_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pt_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pt_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_pt_td){
                    $pt_td += $markah_pt_td->markah;
                } 
                elseif ($markah_pt_ad){
                    $pt_ad += $markah_pt_ad->markah;
                }
                elseif ($markah_pt_tv){
                    $pt_tv += $markah_pt_tv->markah;
                }
                elseif ($markah_pt_av){
                    $pt_av += $markah_pt_av->markah;
                }                                
            } 
            foreach($ew_kriterias as $ew_kriteria) {                
                $markah_ew_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_ew_td){
                    $ew_td += $markah_ew_td->markah;
                } 
                elseif ($markah_ew_ad){
                    $ew_ad += $markah_ew_ad->markah;
                } 
                elseif ($markah_ew_tv){
                    $ew_tv += $markah_ew_tv->markah;
                }  
                elseif ($markah_ew_av){
                    $ew_av += $markah_ew_av->markah;
                }                             
            } 
            foreach($ae_kriterias as $ae_kriteria) {                
                $markah_ae_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ae_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ae_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ae_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_ae_td){
                    $ae_td += $markah_ae_td->markah;
                } 
                elseif ($markah_ae_ad){
                    $ae_ad += $markah_ae_ad->markah;
                }
                elseif ($markah_ae_tv){
                    $ae_tv += $markah_ae_tv->markah;
                }  
                elseif ($markah_ae_av){
                    $ae_av += $markah_ae_av->markah;
                }                                 
            }
            foreach($ca_kriterias as $ca_kriteria) {                
                $markah_ca_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ca_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ca_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ca_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_ca_td){
                    $ca_td += $markah_ca_td->markah;
                } 
                elseif ($markah_ca_ad){
                    $ca_ad += $markah_ca_ad->markah;
                }   
                elseif ($markah_ca_tv){
                    $ca_tv += $markah_ca_tv->markah;
                }  
                elseif ($markah_ca_av){
                    $ca_av += $markah_ca_av->markah;
                }                              
            } 
            foreach($mr_kriterias as $mr_kriteria) {                
                $markah_mr_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mr_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mr_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mr_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_mr_td){
                    $mr_td += $markah_mr_td->markah;
                } 
                elseif ($markah_mr_ad){
                    $mr_ad += $markah_mr_ad->markah;
                }    
                elseif ($markah_mr_tv){
                    $mr_tv += $markah_mr_tv->markah;
                }  
                elseif ($markah_mr_av){
                    $mr_av += $markah_mr_av->markah;
                }                             
            }
            foreach($ec_kriterias as $ec_kriteria) {                
                $markah_ec_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ec_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ec_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ec_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_ec_td){
                    $ec_td += $markah_ec_td->markah;
                } 
                elseif ($markah_ec_ad){
                    $ec_ad += $markah_ec_ad->markah;
                }
                elseif ($markah_ec_tv){
                    $ec_tv += $markah_ec_tv->markah;
                }  
                elseif ($markah_ec_av){
                    $ec_av += $markah_ec_av->markah;
                }                                 
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_in_td){
                    $in_td += $markah_in_td->markah;
                } 
                elseif ($markah_in_ad){
                    $in_ad += $markah_in_ad->markah;
                }
                elseif ($markah_in_tv){
                    $in_tv += $markah_in_tv->markah;
                }  
                elseif ($markah_in_av){
                    $in_av += $markah_in_av->markah;
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


            //Total Core Point
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
            } elseif($final_score >=40 && $final_score < 49){
                $bintang_fs = 2;
                $bintang_fss = 'POTENTIAL RECOGNITION';
            } else {
                $bintang_fs = 0;
                $bintang_fss = 'NO RECOGNITION';
            }

            //Design Assessment 
            $final_score2 = $totalcp_ad / 68 * 0.85 + ($totaleip_td + $totaleip_ad + $totaleip_tv + $totaleip_av);
            if($final_score2 >=85){
                $bintang_fs2 = 5;
                $bintang_fss2 = 'GLOBAL EXCELLENCE';
            } elseif($final_score2 >=70 && $final_score2 < 84){
                $bintang_fs2 = 4;
                $bintang_fss2 = 'NATIONAL EXCELLENCE';
            } elseif($final_score2 >= 50 && $final_score2 < 69){
                $bintang_fs2 = 3;
                $bintang_fss2 = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score2 >=40 && $final_score2 < 49){
                $bintang_fs2 = 2;
                $bintang_fss2 = 'POTENTIAL RECOGNITION';
            } else {
                $bintang_fs2 = 0;
                $bintang_fss2 = 'NO RECOGNITION';
            }
            
            //Verification Assessment 
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
    

            return view('projek.satu_eph_jalan_baru', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'totalcp_td', 'totaleip_td', 'totalcp_ad', 'totalcp_av','totaleip_ad', 'totaleip_ad', 'totalcp_tv', 'totaleip_ad',
            'totaleip_av', 'totaleip_tv', 'sm_td', 'pt_td', 'ew_td', 'ae_td', 'ca_td', 'mr_td', 'ec_td', 'in_td' ,'sm_ad', 
            'pt_ad', 'ew_ad', 'ae_ad', 'ca_ad', 'mr_ad', 'ec_ad', 'in_ad', 'sm_tv', 'sm_av', 'pt_tv', 'pt_av', 'ew_tv', 'ew_av', 
            'ae_tv', 'ae_av', 'ca_tv', 'ca_av','mr_av', 'mr_tv', 'ec_tv', 'ec_av', 'in_td', 'in_ad', 'in_tv', 'in_av', 'final_score',
            'bintang_fs', 'bintang_fss', 'final_score', 'final_score2', 'final_score3', 'bintang_fss3', 'bintang_fss2',
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

            $rayuan_kriterias = Kriteria::where([
                ['borang','=', 'UPGRADING ROADS']
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
            
            
            foreach($sm_kriterias as $sm_kriteria) {                
                $markah_sm_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sm_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sm_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_sm_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $sm_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_sm_td){
                    $sm_td += $markah_sm_td->markah;
                } 
                elseif ($markah_sm_ad){
                    $sm_ad += $markah_sm_ad->markah;
                }
                elseif ($markah_sm_tv){
                    $sm_ad += $markah_sm_tv->markah;
                }
                elseif ($markah_sm_av){
                    $sm_ad += $markah_sm_av->markah;
                }                                
            }  
            foreach($pt_kriterias as $pt_kriteria) {                
                $markah_pt_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pt_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_pt_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_pt_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $pt_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_pt_td){
                    $pt_td += $markah_pt_td->markah;
                } 
                elseif ($markah_pt_ad){
                    $pt_ad += $markah_pt_ad->markah;
                }
                elseif ($markah_pt_tv){
                    $pt_tv += $markah_pt_tv->markah;
                }
                elseif ($markah_pt_av){
                    $pt_av += $markah_pt_av->markah;
                }                                
            } 
            foreach($ew_kriterias as $ew_kriteria) {                
                $markah_ew_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ew_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_ew_td){
                    $ew_td += $markah_ew_td->markah;
                } 
                elseif ($markah_ew_ad){
                    $ew_ad += $markah_ew_ad->markah;
                } 
                elseif ($markah_ew_tv){
                    $ew_tv += $markah_ew_tv->markah;
                }  
                elseif ($markah_ew_av){
                    $ew_av += $markah_ew_av->markah;
                }                             
            } 
            foreach($ae_kriterias as $ae_kriteria) {                
                $markah_ae_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ae_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ae_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ae_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ae_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_ae_td){
                    $ae_td += $markah_ae_td->markah;
                } 
                elseif ($markah_ae_ad){
                    $ae_ad += $markah_ae_ad->markah;
                }
                elseif ($markah_ae_tv){
                    $ae_tv += $markah_ae_tv->markah;
                }  
                elseif ($markah_ae_av){
                    $ae_av += $markah_ae_av->markah;
                }                                 
            }
            foreach($ca_kriterias as $ca_kriteria) {                
                $markah_ca_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ca_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ca_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ca_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ca_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_ca_td){
                    $ca_td += $markah_ca_td->markah;
                } 
                elseif ($markah_ca_ad){
                    $ca_ad += $markah_ca_ad->markah;
                }   
                elseif ($markah_ca_tv){
                    $ca_tv += $markah_ca_tv->markah;
                }  
                elseif ($markah_ca_av){
                    $ca_av += $markah_ca_av->markah;
                }                              
            } 
            foreach($mr_kriterias as $mr_kriteria) {                
                $markah_mr_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mr_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mr_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_mr_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $mr_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_mr_td){
                    $mr_td += $markah_mr_td->markah;
                } 
                elseif ($markah_mr_ad){
                    $mr_ad += $markah_mr_ad->markah;
                }    
                elseif ($markah_mr_tv){
                    $mr_tv += $markah_mr_tv->markah;
                }  
                elseif ($markah_mr_av){
                    $mr_av += $markah_mr_av->markah;
                }                             
            }
            foreach($ec_kriterias as $ec_kriteria) {                
                $markah_ec_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ec_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ec_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_ec_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $ec_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_ec_td){
                    $ec_td += $markah_ec_td->markah;
                } 
                elseif ($markah_ec_ad){
                    $ec_ad += $markah_ec_ad->markah;
                }
                elseif ($markah_ec_tv){
                    $ec_tv += $markah_ec_tv->markah;
                }  
                elseif ($markah_ec_av){
                    $ec_av += $markah_ec_av->markah;
                }                                 
            }
            foreach($in_kriterias as $in_kriteria) {                
                $markah_in_td = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_ad = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_in_tv = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_in_av = Markah::where([['projek_id','=', $projek->id], ['kriteria_id','=', $in_kriteria->id],['fasa','=','verifikasi']])->first();

                if ($markah_in_td){
                    $in_td += $markah_in_td->markah;
                } 
                elseif ($markah_in_ad){
                    $in_ad += $markah_in_ad->markah;
                }
                elseif ($markah_in_tv){
                    $in_tv += $markah_in_tv->markah;
                }  
                elseif ($markah_in_av){
                    $in_av += $markah_in_av->markah;
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


            //Target Point
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
            } elseif($final_score >=40 && $final_score < 49){
                $bintang_fs = 2;
                $bintang_fss = 'POTENTIAL RECOGNITION';
            } else {
                $bintang_fs = 0;
                $bintang_fss = 'NO RECOGNITION';
            }

            //Design Assessment 
            $final_score2 = $totalcp_ad / 68 * 0.85 + ($totaleip_td + $totaleip_ad + $totaleip_tv + $totaleip_av);
            if($final_score2 >=85){
                $bintang_fs2 = 5;
                $bintang_fss2 = 'GLOBAL EXCELLENCE';
            } elseif($final_score2 >=70 && $final_score2 < 84){
                $bintang_fs2 = 4;
                $bintang_fss2 = 'NATIONAL EXCELLENCE';
            } elseif($final_score2 >= 50 && $final_score2 < 69){
                $bintang_fs2 = 3;
                $bintang_fss2 = 'BEST MANAGEMENT PRACTICES';
            } elseif($final_score2 >=40 && $final_score2 < 49){
                $bintang_fs2 = 2;
                $bintang_fss2 = 'POTENTIAL RECOGNITION';
            } else {
                $bintang_fs2 = 0;
                $bintang_fss2 = 'NO RECOGNITION';
            }
            
            //Verification Assessment 
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
            return view('projek.satu_eph_jalan_naiktaraf', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'totalcp_td', 'totaleip_td', 'totalcp_ad', 'totalcp_av','totaleip_ad', 'totaleip_ad', 'totalcp_tv', 'totaleip_ad',
            'totaleip_av', 'totaleip_tv', 'sm_td', 'pt_td', 'ew_td', 'ae_td', 'ca_td', 'mr_td', 'ec_td', 'in_td' ,'sm_ad', 
            'pt_ad', 'ew_ad', 'ae_ad', 'ca_ad', 'mr_ad', 'ec_ad', 'in_ad', 'sm_tv', 'sm_av', 'pt_tv', 'pt_av', 'ew_tv', 'ew_av', 
            'ae_tv', 'ae_av', 'ca_tv', 'ca_av','mr_av', 'mr_tv', 'ec_tv', 'ec_av', 'in_td', 'in_ad', 'in_tv', 'in_av',
            'final_score', 'bintang_fs', 'bintang_fss', 'final_score3', 'final_score2', 'bintang_fs2', 'bintang_fss2', 'bintang_fs3',
            'bintang_fss3',
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
                ['borang','=', 'CATEGORY 1']
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

            //Point Requested Design & Construction
            foreach($aw_kriterias as $aw_kriteria) {                
                $markah_aw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_aw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_aw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_aw_ds){
                    $aw_ds +=  $markah_aw_ds->point_req_design;
                }  
                elseif($markah_aw_cs){
                    $aw_cs +=  $markah_aw_cs->point_req_construction;
                }  
                elseif($markah_aw_pa){
                    $aw_pa += $markah_aw_pa->point_allocated;
                    // dd($markah_aw_pa);
                }                           
            }
            foreach($mw_kriterias as $mw_kriteria) {                
                $markah_mw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();
                // $markah_mw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_mw_ds){
                    $mw_ds +=  $markah_mw_ds->point_req_design;
                } 
                elseif($markah_mw_cs){
                    $mw_cs +=  $markah_mw_cs->point_req_construction;
                }
            }
            foreach($ew_kriterias as $ew_kriteria) {                
                $markah_ew_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                // $markah_ew_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_ew_ds){
                    $ew_ds +=  $markah_ew_ds->point_req_design;
                }
                elseif($markah_ew_cs){
                    $ew_cs +=  $markah_ew_cs->point_req_construction;
                } 
            }
            foreach($cw_kriterias as $cw_kriteria) {                
                $markah_cw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_cw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();
                // $markah_cw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_cw_ds){
                    $cw_ds +=  $markah_cw_ds->point_req_design;
                } 
                elseif($markah_cw_cs){
                    $cw_cs +=  $markah_cw_cs->point_req_construction;
                }
            }

            //Point Awarded
            foreach($aw_pad_kriterias as $aw) {
                $markah_aw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw->id],['fasa','=','verifikasi']])->first();

                if($markah_aw_pad){
                    $aw_pad +=  $markah_aw_pad->point_awarded;
                }  
            }
            foreach($mw_pad_kriterias as $mw) {
                $markah_mw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw->id],['fasa','=','verifikasi']])->first();

                if($markah_mw_pad){
                    $mw_pad +=  $markah_mw_pad->point_awarded;
                }  
            }
            foreach($ew_pad_kriterias as $ew) {
                $markah_ew_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew->id],['fasa','=','verifikasi']])->first();

                if($markah_ew_pad){
                    $ew_pad +=  $markah_ew_pad->point_awarded;
                }  
            }
            foreach($cw_pad_kriterias as $cw) {
                $markah_cw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw->id],['fasa','=','verifikasi']])->first();

                if($markah_cw_pad){
                    $cw_pad +=  $markah_cw_pad->point_awarded;
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

            //Percentage GPSS Score
            //Building Category 1
            $peratus_aw_gpss_1 = ($aw_ds/232) * 0.45 * 100;
            $peratus_mw_gpss_1 = ($mw_ds/232) * 0.20 * 100;
            $peratus_ew_gpss_1 = ($ew_ds/232) * 0.15 * 100;
            $peratus_cw_gpss_1 = ($cw_ds/232) * 0.20 * 100;
            $total_peratus_1 = $peratus_aw_gpss_1 + $peratus_mw_gpss_1 + $peratus_ew_gpss_1 + $peratus_cw_gpss_1;
            //GPSS Star
            if($total_peratus_1 >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_1 >= 70 && $total_peratus_1 <79){
                $bintang = 4;
            }
             elseif($total_peratus_1 >= 60 && $total_peratus_1 <69){
                $bintang = 3;
            }
             elseif($total_peratus_1 >= 50 && $total_peratus_1 <59){
                $bintang = 2;
            }
             elseif($total_peratus_1 >= 40 && $total_peratus_1 <49){
                $bintang = 1;
            }
            elseif($total_peratus_1 <39){
                $bintang = 0;
            }

            //MyCrest Star
            $total_peratus_crest = $peratus_aw_gpss_1 + $peratus_mw_gpss_1 + $peratus_ew_gpss_1 + $peratus_cw_gpss_1;

            // dd($aw_cs);
            return view('projek.satu_gpss_bangunan', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'aw_ds', 'mw_ds', 'ew_ds', 'cw_ds', 'aw_cs', 'mw_cs', 'ew_cs', 'cw_cs', 'aw_pa', 'ew_pa', 'cw_pa', 'ew_pa', 'mw_pa', 
            'total_ds', 'total_cs', 'total_pa', 'peratus_aw_gpss_1', 'peratus_mw_gpss_1', 'peratus_ew_gpss_1', 'peratus_cw_gpss_1', 'total_peratus_1', 'total_peratus_crest',
            'aw_pad', 'mw_pad', 'ew_pad', 'cw_pad', 'total_pad'
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
                ['borang','=', 'CATEGORY 2']
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

            //Point Requested Design & Construction
            foreach($aw_kriterias as $aw_kriteria) {                
                $markah_aw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_aw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_aw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_aw_ds){
                    $aw_ds +=  $markah_aw_ds->point_req_design;
                }  
                elseif($markah_aw_cs){
                    $aw_cs +=  $markah_aw_cs->point_req_construction;
                }  
                elseif($markah_aw_pa){
                    $aw_pa += $markah_aw_pa->point_allocated;
                    // dd($markah_aw_pa);
                }                           
            }
            foreach($mw_kriterias as $mw_kriteria) {                
                $markah_mw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();
                // $markah_mw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_mw_ds){
                    $mw_ds +=  $markah_mw_ds->point_req_design;
                } 
                elseif($markah_mw_cs){
                    $mw_cs +=  $markah_mw_cs->point_req_construction;
                }
            }
            foreach($ew_kriterias as $ew_kriteria) {                
                $markah_ew_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                // $markah_ew_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_ew_ds){
                    $ew_ds +=  $markah_ew_ds->point_req_design;
                }
                elseif($markah_ew_cs){
                    $ew_cs +=  $markah_ew_cs->point_req_construction;
                } 
            }
            foreach($cw_kriterias as $cw_kriteria) {                
                $markah_cw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_cw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();
                // $markah_cw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_cw_ds){
                    $cw_ds +=  $markah_cw_ds->point_req_design;
                } 
                elseif($markah_cw_cs){
                    $cw_cs +=  $markah_cw_cs->point_req_construction;
                }
            }

            //Point Awarded
            foreach($aw_pad_kriterias as $aw) {
                $markah_aw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw->id],['fasa','=','verifikasi']])->first();

                if($markah_aw_pad){
                    $aw_pad +=  $markah_aw_pad->point_awarded;
                }  
            }
            foreach($mw_pad_kriterias as $mw) {
                $markah_mw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw->id],['fasa','=','verifikasi']])->first();

                if($markah_mw_pad){
                    $mw_pad +=  $markah_mw_pad->point_awarded;
                }  
            }
            foreach($ew_pad_kriterias as $ew) {
                $markah_ew_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew->id],['fasa','=','verifikasi']])->first();

                if($markah_ew_pad){
                    $ew_pad +=  $markah_ew_pad->point_awarded;
                }  
            }
            foreach($cw_pad_kriterias as $cw) {
                $markah_cw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw->id],['fasa','=','verifikasi']])->first();

                if($markah_cw_pad){
                    $cw_pad +=  $markah_cw_pad->point_awarded;
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

            //Percentage GPSS Score
            //Building Category 2
            $peratus_aw_gpss_2 = ($aw_ds/232) * 0.55 * 100;
            $peratus_mw_gpss_2 = ($mw_ds/232) * 0.15 * 100;
            $peratus_ew_gpss_2 = ($ew_ds/232) * 0.10 * 100;
            $peratus_cw_gpss_2 = ($cw_ds/232) * 0.20 * 100;
            $total_peratus_2 = $peratus_aw_gpss_2 + $peratus_mw_gpss_2 + $peratus_ew_gpss_2 + $peratus_cw_gpss_2;
            //GPSS Star
            if($total_peratus_2 >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_2 >= 70 && $total_peratus_2 <79){
                $bintang = 4;
            }
             elseif($total_peratus_2 >= 60 && $total_peratus_2 <69){
                $bintang = 3;
            }
             elseif($total_peratus_2 >= 50 && $total_peratus_2 <59){
                $bintang = 2;
            }
             elseif($total_peratus_2 >= 40 && $total_peratus_2 <49){
                $bintang = 1;
            }
            elseif($total_peratus_2 <39){
                $bintang = 0;
            }

            //MyCrest Star
            $total_peratus_crest_2 = $peratus_aw_gpss_2 + $peratus_mw_gpss_2 + $peratus_ew_gpss_2 + $peratus_cw_gpss_2;


            // dd($aw_cs);
            return view('projek.satu_gpss_bangunan', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'aw_ds', 'mw_ds', 'ew_ds', 'cw_ds', 'aw_cs', 'mw_cs', 'ew_cs', 'cw_cs', 'aw_pa', 'ew_pa', 'cw_pa', 'ew_pa', 'mw_pa', 
            'total_ds', 'total_cs', 'total_pa', 'peratus_aw_gpss_2', 'peratus_mw_gpss_2', 'peratus_ew_gpss_2', 'peratus_cw_gpss_2', 'total_peratus_2', 'total_peratus_crest',
            'aw_pad', 'mw_pad', 'ew_pad', 'cw_pad', 'total_pad' 
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
                ['borang','=', 'CATEGORY 3']
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

            //Point Requested Design & Construction
            foreach($aw_kriterias as $aw_kriteria) {                
                $markah_aw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_aw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();
                $markah_aw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_aw_ds){
                    $aw_ds +=  $markah_aw_ds->point_req_design;
                }  
                elseif($markah_aw_cs){
                    $aw_cs +=  $markah_aw_cs->point_req_construction;
                }  
                elseif($markah_aw_pa){
                    $aw_pa += $markah_aw_pa->point_allocated;
                    // dd($markah_aw_pa);
                }                           
            }
            foreach($mw_kriterias as $mw_kriteria) {                
                $markah_mw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();
                // $markah_mw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_mw_ds){
                    $mw_ds +=  $markah_mw_ds->point_req_design;
                } 
                elseif($markah_mw_cs){
                    $mw_cs +=  $markah_mw_cs->point_req_construction;
                }
            }
            foreach($ew_kriterias as $ew_kriteria) {                
                $markah_ew_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                // $markah_ew_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_ew_ds){
                    $ew_ds +=  $markah_ew_ds->point_req_design;
                }
                elseif($markah_ew_cs){
                    $ew_cs +=  $markah_ew_cs->point_req_construction;
                } 
            }
            foreach($cw_kriterias as $cw_kriteria) {                
                $markah_cw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_cw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();
                // $markah_cw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_cw_ds){
                    $cw_ds +=  $markah_cw_ds->point_req_design;
                } 
                elseif($markah_cw_cs){
                    $cw_cs +=  $markah_cw_cs->point_req_construction;
                }
            }

            //Point Awarded
            foreach($aw_pad_kriterias as $aw) {
                $markah_aw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw->id],['fasa','=','verifikasi']])->first();

                if($markah_aw_pad){
                    $aw_pad +=  $markah_aw_pad->point_awarded;
                }  
            }
            foreach($mw_pad_kriterias as $mw) {
                $markah_mw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw->id],['fasa','=','verifikasi']])->first();

                if($markah_mw_pad){
                    $mw_pad +=  $markah_mw_pad->point_awarded;
                }  
            }
            foreach($ew_pad_kriterias as $ew) {
                $markah_ew_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew->id],['fasa','=','verifikasi']])->first();

                if($markah_ew_pad){
                    $ew_pad +=  $markah_ew_pad->point_awarded;
                }  
            }
            foreach($cw_pad_kriterias as $cw) {
                $markah_cw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw->id],['fasa','=','verifikasi']])->first();

                if($markah_cw_pad){
                    $cw_pad +=  $markah_cw_pad->point_awarded;
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

            //Percentage GPSS Score
            //Building Category 3
            $peratus_aw_gpss_3 = ($aw_ds/232) * 0.60 * 100;
            $peratus_mw_gpss_3 = ($mw_ds/232) * 0.10 * 100;
            $peratus_ew_gpss_3 = ($ew_ds/232) * 0.10 * 100;
            $peratus_cw_gpss_3 = ($cw_ds/232) * 0.20 * 100;
            $total_peratus_3 = $peratus_aw_gpss_3 + $peratus_mw_gpss_3 + $peratus_ew_gpss_3 + $peratus_cw_gpss_3;
            //GPSS Star
            if($total_peratus_3 >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_3 >= 70 && $total_peratus_3 <79){
                $bintang = 4;
            }
             elseif($total_peratus_3 >= 60 && $total_peratus_3 <69){
                $bintang = 3;
            }
             elseif($total_peratus_3 >= 50 && $total_peratus_3 <59){
                $bintang = 2;
            }
             elseif($total_peratus_3 >= 40 && $total_peratus_3 <49){
                $bintang = 1;
            }
            elseif($total_peratus_3 <39){
                $bintang = 0;
            }

            //MyCrest Star
            $total_peratus_crest_3 = $peratus_aw_gpss_3 + $peratus_mw_gpss_3 + $peratus_ew_gpss_3 + $peratus_cw_gpss_3;

            return view('projek.satu_gpss_bangunan', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'aw_ds', 'mw_ds', 'ew_ds', 'cw_ds', 'aw_cs', 'mw_cs', 'ew_cs', 'cw_cs', 'aw_pa', 'ew_pa', 'cw_pa', 'ew_pa', 'mw_pa', 
            'total_ds', 'total_cs', 'total_pa', 'peratus_aw_gpss_3', 'peratus_mw_gpss_3', 'peratus_ew_gpss_3', 'peratus_cw_gpss_3', 'total_peratus_3', 'total_peratus_crest_3',
            'aw_pad', 'mw_pad', 'ew_pad', 'cw_pad', 'total_pad'
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
                ['borang','=', 'ROAD']
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

            //Point Allocated
            foreach($rw_kriterias as $rw_kriteria) {
                $markah_rw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $rw_kriteria->id],['fasa','=','rekabentuk']])->first();
                if($markah_rw_pa){
                    $rw_pa +=  $markah_rw_pa->point_awarded;
                } 
            }
            foreach($sw_kriterias as $sw_kriteria) {
                $markah_sw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $sw_kriteria->id],['fasa','=','rekabentuk']])->first();
                if($markah_sw_pa){
                    $sw_pa +=  $markah_sw_pa->point_awarded;
                } 
            }

            //Point Requested (Design/Construction)
            foreach($rw_kriterias as $rw_kriteria) {                
                $markah_rw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $rw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_rw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $rw_kriteria->id],['fasa','=','verifikasi']])->first();
                if($markah_rw_ds){
                    $rw_ds +=  $markah_rw_ds->point_req_design;
                } 
                elseif ($markah_rw_cs){
                    $rw_cs += $markah_rw_cs->point_req_construction;
                }                                 
            }
            foreach($sw_kriterias as $sw_kriteria) {                
                $markah_sw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $sw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_sw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $sw_kriteria->id],['fasa','=','verifikasi']])->first();
                if($markah_sw_ds){
                    $sw_ds +=  $markah_sw_ds->point_req_design;
                } 
                elseif ($markah_sw_cs){
                    $sw_cs += $markah_sw_cs->point_req_construction;
                }
            }

            //Point Awarded
            foreach($rw_kriterias as $rw_kriteria) {
                $markah_rw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $rw_kriteria->id],['fasa','=','verifikasi']])->first();
                if($markah_rw_pad){
                    $rw_pad +=  $markah_rw_pad->point_awarded;
                } 
            }
            foreach($sw_kriterias as $sw_kriteria) {
                $markah_sw_pad = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $sw_kriteria->id],['fasa','=','verifikasi']])->first();
                if($markah_sw_pad){
                    $sw_pad +=  $markah_sw_pad->point_awarded;
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
            
            //Percentage GPSS Score
            //Road
            $peratus_rw = ($rw_ds/232) * 0.33 * 100;
            $peratus_sw = ($sw_ds/232) * 0.33 * 100;
            $total_peratus_road = $peratus_rw + $peratus_sw;

            //GPSS Star
            if($total_peratus_road >= 80){
                $bintang = 5;
            }
            elseif($total_peratus_road >= 70 && $total_peratus_road <79){
                $bintang = 4;
            }
             elseif($total_peratus_road >= 50 && $total_peratus_road <69){
                $bintang = 3;
            }
             elseif($total_peratus_road >= 30 && $total_peratus_road <49){
                $bintang = 2;
            }
             elseif($total_peratus_road >= 10 && $total_peratus_road <29){
                $bintang = 1;
            }
            elseif($total_peratus_road <10){
                $bintang = 0;
            }

            //MyCrest Star
            $total_peratus_crest = $peratus_rw + $peratus_sw;

            return view('projek.satu_gpss_jalan', compact('projek', 'user', 'user_role' ,'rekabentuk_kriterias', 'verifikasi_kriterias', 'rayuan_kriterias', 'users', 'lantikans',
            'total_ds', 'total_cs', 'rw_ds', 'rw_ds', 'sw_cs', 'rw_cs', 'rw_pad', 'sw_pad', 'total_pad', 'total_pa', 'peratus_rw', 'peratus_sw', 'bintang', 'sw_ds',
            'total_peratus_road', 'total_peratus_crest', 'rw_pa', 'sw_pa'
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

    //Eph Bangunan
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

        // $kriteria = Kriteria::find($request->kriteria);
        // if ($request->markah >$kriteria->maksimum) {
        //     Alert::error('Salah Markah', 'Sila letakkan markah kurang dari maksimum');
        //     return back();
        // }

        $markah = New EphBangunanRayuanMarkah;
        $markah->projek_id = $id;
        $markah->user_id = $user->id;
        $markah->kriteria_id = $request->kriteria;
        $markah->ulasan = $request->ulasan;
        $markah->fasa = $request->fasa;
        $markah->markah_rayuan = $request->markah_rayuan;

        

        if ($request->hasFile('dokumen_rayuan1')) {
            $markah->dokumen1 = $request->file('dokumen1')->store('jkr-ephjkr/uploads');
        } 
        // else {
        //     if ($request->markah > 0) {
        //         Alert::error('Dokumen diperlukan', 'Jika markah melebihi 0, silakan letakkan sekurang-kurangnya satu dokumen lampiran');
        //         return back();
        //     }            
        // } 
           
        if ($request->hasFile('dokumen_rayuan2')) {
            $markah->dokumen2 = $request->file('dokumen2')->store('jkr-ephjkr/uploads');
        }     
        if ($request->hasFile('dokumen_rayuan3')) {
            $markah->dokumen3 = $request->file('dokumen3')->store('jkr-ephjkr/uploads');
        }     
        if ($request->hasFile('dokumen_rayuan4')) {
            $markah->dokumen4 = $request->file('dokumen4')->store('jkr-ephjkr/uploads');
        }     
        if ($request->hasFile('dokumen_rayuan5')) {
            $markah->dokumen5 = $request->file('dokumen5')->store('jkr-ephjkr/uploads');
        }    

        $markah->save();

        alert()->success('Markah Disimpan', 'Berjaya');

        return back(); 
    }

    // Mai tambah
    public function markah_gpss(Request $request) {
        $user = $request->user();
        $id = (int)$request->route('id');

        // $gpss_kriteria = GpssKriteria::find($request->gpss_kriteria);
        // if ($request->markah >$gpss_kriteria->maksimum) {
        //     Alert::error('Salah Markah', 'Sila letakkan markah kurang dari maksimum');
        //     return back();
        // }

        $markah = New GpssMarkah;
        $markah->projek_id = $id;
        $markah->user_id = $user->id;
        $markah->gpss_kriteria_id = $request->gpss_kriteria;
        $markah->fasa = $request->fasa;
        $markah->point_allocated = $request->point_allocated;
        $markah->point_req_design = $request->point_req_design;
        $markah->point_req_construction = $request->point_req_construction;
        $markah->remarks = $request->remarks;
        $markah->comment_on_appeal = $request->comment_on_appeal;

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

    // Mai tambah
    public function markah_gpss_rayuan(Request $request) {
        $user = $request->user();
        $id = (int)$request->route('id');

        // $gpss_kriteria = GpssKriteria::find($request->gpss_kriteria);
        // if ($request->markah >$gpss_kriteria->maksimum) {
        //     Alert::error('Salah Markah', 'Sila letakkan markah kurang dari maksimum');
        //     return back();
        // }

        $markah = New GpssMarkah;
        $markah->projek_id = $id;
        $markah->user_id = $user->id;
        $markah->gpss_kriteria_id = $request->gpss_kriteria;
        $markah->fasa = $request->fasa;
        $markah->point_allocated = $request->point_allocated;
        $markah->point_req_design = $request->point_req_design;
        $markah->point_req_construction = $request->point_req_construction;
        $markah->remarks = $request->remarks;
        $markah->comment_on_appeal = $request->comment_on_appeal;

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

    public function markah_eph_jalan(Request $request){
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
        $markah->ulasan_rayuan = $request->ulasan_rayuan;

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

        if ($request->hasFile('dokumen_rayuan1')) {
            $markah->dokumen_rayuan1 = $request->file('dokumen_rayuan1')->store('jkr-ephjkr/uploads');
        // } else {
        //     if ($request->markah > 0) {
        //         Alert::error('Dokumen diperlukan', 'Jika markah melebihi 0, silakan letakkan sekurang-kurangnya satu dokumen lampiran');
        //         return back();
        //     }            
        }    
        if ($request->hasFile('dokumen_rayuan2')) {
            $markah->dokumen_rayuan2 = $request->file('dokumen2')->store('jkr-ephjkr/uploads');
        }     
        if ($request->hasFile('dokumen_rayuan3')) {
            $markah->dokumen3 = $request->file('dokumen_rayuan3')->store('jkr-ephjkr/uploads');
        }     
        if ($request->hasFile('dokumen_rayuan4')) {
            $markah->dokumen4 = $request->file('dokumen_rayuan4')->store('jkr-ephjkr/uploads');
        }     
        if ($request->hasFile('dokumen_rayuan5')) {
            $markah->dokumen5 = $request->file('dokumen_rayuan5')->store('jkr-ephjkr/uploads');
        }  

        $markah->save();

        alert()->success('Markah Disimpan', 'Berjaya');

        return back();
    }

    //Sah Projek
    public function sah_projek(Request $request) {
        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        if ($projek->status == "Menunggu Pengesahan Sekretariat"){
            $projek->status = "Proses Pengisian Skor Rekabentuk Bangunan";
            alert()->success('Projek Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Pengisian Skor Rekabentuk Bangunan"){
            $projek->status = "Dalam Pengesahan Skor Rekabentuk Bangunan";
            alert()->success('Proses Pengisian Skor Rekabentuk Bangunan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Skor Rekabentuk Bangunan"){
            $projek->status = "Selesai Pengesahan Rekabentuk Bangunan";
            alert()->success('Pengesahan Skor Rekabentuk Bangunan telah Disahkan', 'Berjaya');
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
            alert()->success('Sahkan Pengisian Skor Rekabentuk GPSS Bangunan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Skor Rekabentuk GPSS Bangunan"){
            $projek->status = "Selesai Pengesahan Rekabentuk GPSS Bangunan";
            alert()->success('Pengesahan Skor Rekabentuk GPSS Bangunan telah Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan Rekabentuk GPSS Bangunan"){
            $projek->status = "Proses Jana Keputusan Rekabentuk GPSS Bangunan";
            alert()->success('Selesai Pengesahan Rekabentuk GPSS Bangunan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Jana Keputusan Rekabentuk GPSS Bangunan"){
            $projek->status = "Selesai Jana Keputusan Rekabentuk GPSS Bangunan";
            alert()->success('Sahkan Proses Jana Keputusan Rekabentuk GPSS Bangunan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Bangunan"){
            $projek->status = "Proses Pengisian Skor Verifikasi GPSS Bangunan";
            alert()->success('Selesai Jana Keputusan Rekabentuk GPSS Bangunan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Pengisian Skor Verifikasi GPSS Bangunan"){
            $projek->status = "Selesai Pengesahan Verifikasi GPSS Bangunan";
            alert()->success('Skor Verifikasi GPSS Bangunan Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Bangunan"){
            $projek->status = "Proses Jana Keputusan Verifikasi GPSS Bangunan";
            alert()->success('Pengisian Skor Verifikasi GPSS Bangunan Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Bangunan"){
            $projek->status = "Proses Pengisian Skor Verifikasi GPSS Bangunan";
            alert()->success('Pengisian Skor Verifikasi GPSS Bangunan Disahkan', 'Berjaya');
        }
        


        $projek->save();
        return back();
    }

    public function sah_projek_gpss_rayuan(Request $request){
        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        if ($projek->status == "Selesai Pengesahan Verifikasi GPSS Bangunan"){
            $projek->status = "Proses Rayuan GPSS Bangunan";
            alert()->success('Rayuan Bangunan sedang Diproses', 'Berjaya');
        }
        elseif ($projek->status == "Proses Rayuan GPSS Bangunan"){
            $projek->status = "Dalam Pengesahan Rayuan GPSS Bangunan";
            alert()->success('Proses Rayuan GPSS Bangunan Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Rayuan GPSS Bangunan"){
            $projek->status = "Selesai Pengesahan Rayuan GPSS Bangunan";
            alert()->success('Pengesahan Rayuan GPSS Bangunan telah Disahkan', 'Berjaya');
        }

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
        elseif ($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Bangunan"){
            $projek->status = "Dalam Pengesahan Skor Rekabentuk GPSS Jalan";
            alert()->success('Sahkan Pengisian Skor Rekabentuk GPSS Bangunan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Skor Rekabentuk GPSS Jalan"){
            $projek->status = "Selesai Pengesahan Rekabentuk GPSS Jalan";
            alert()->success('Pengesahan Skor Rekabentuk GPSS Jalan telah Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan Rekabentuk GPSS Jalan"){
            $projek->status = "Proses Jana Keputusan Rekabentuk GPSS Jalan";
            alert()->success('Selesai Pengesahan Rekabentuk GPSS Jalan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Jana Keputusan Rekabentuk GPSS Jalan"){
            $projek->status = "Selesai Jana Keputusan Rekabentuk GPSS Jalan";
            alert()->success('Sahkan Proses Jana Keputusan Rekabentuk GPSS Jalan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Jalan"){
            $projek->status = "Proses Pengisian Skor Verifikasi GPSS Jalan";
            alert()->success('Selesai Jana Keputusan Rekabentuk GPSS Bangunan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Pengisian Skor Verifikasi GPSS Jalan"){
            $projek->status = "Dalam Pengesahan Skor Verifikasi GPSS Jalan";
            alert()->success('Pengisian Skor Verifikasi GPSS Bangunan Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Jalan"){
            $projek->status == "Proses Jana Keputusan Verifikasi GPSS Jalan";
            alert()->success('Pengesahan Skor Verifikasi GPSS Jalan telah Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Jana Keputusan Verifikasi GPSS Jalan"){
            $projek->status == "Selesai Jana Keputusan Verifikasi GPSS Jalan";
            alert()->success('Jana Keputusan Verifikasi GPSS Jalan telah Dijana', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Jana Keputusan Verifikasi GPSS Jalan "){
            $projek->status == "Selesai Pengesahan Jana Sijil Verifikasi GPSS Jalan";
            alert()->success('Keputusan Verifikasi GPSS Jalan telah Dijana', 'Berjaya');
        }

        $projek->save();
        return back();

    }

    public function sah_projek_gpss_jalan_rayuan(Request $request){
        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        if ($projek->status == "Selesai Pengesahan Verifikasi GPSS Jalan"){
            $projek->status = "Proses Rayuan GPSS Jalan";
            alert()->success('Rayuan Bangunan sedang Diproses', 'Berjaya');
        }
        elseif ($projek->status == "Proses Rayuan GPSS Jalan"){
            $projek->status = "Selesai Rayuan GPSS Jalan";
            alert()->success('Proses Rayuan GPSS Jalan Disahkan', 'Berjaya');
        }

        $projek->save();
        return back();
    }

    public function sah_projek_eph_jalan_baru(Request $request){
        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        if ($projek->status == "Menunggu Pengesahan Sekretariat"){
            $projek->status = "Proses Pengisian Skor Rekabentuk Jalan Baru";
            alert()->success('Projek Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Pengisian Skor Rekabentuk Jalan Baru"){
            $projek->status = "Dalam Pengesahan Skor Rekabentuk Jalan Baru";
            alert()->success('Proses Pengisian Skor Rekabentuk Jalan Baru', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Skor Rekabentuk Jalan Baru"){
            $projek->status = "Selesai Pengesahan Rekabentuk Jalan Baru";
            alert()->success('Pengesahan Skor Rekabentuk Jalan Baru telah Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan Rekabentuk Jalan Baru"){
            $projek->status = "Proses Jana Keputusan Rekabentuk Jalan Baru";
            alert()->success('Pengesahan Rekabentuk Jalan Baru', 'Berjaya');
        }
        elseif ($projek->status == "Proses Jana Keputusan Rekabentuk Jalan Baru"){
            $projek->status = "Selesai Jana Keputusan Rekabentuk Jalan Baru";
            alert()->success('Jana Keputusan Rekabentuk Jalan Baru', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Jana Keputusan Rekabentuk Jalan Baru"){
            $projek->status = "Selesai Rekabentuk Jalan Baru";
            alert()->success('Selesai Jana Keputusan Rekabentuk Jalan Baru ', 'Berjaya');
        }

        $projek->save();
        return back();


    }

    public function sah_projek_eph_jalan_baru_rayuan(Request $request){
        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        if ($projek->status == "Selesai Jana Keputusan Rekabentuk Jalan Baru"){
            $projek->status = "Proses Rayuan Rekabentuk Jalan Baru";
            alert()->success('Rayuan Rekabentuk Jalan Baru sedang Diproses', 'Berjaya');
        }
        elseif ($projek->status == "Proses Rayuan Rekabentuk Jalan Baru"){
            $projek->status = "Dalam Pengesahan Rayuan Rekabentuk Jalan Baru";
            alert()->success('Proses Rayuan Rekabentuk Jalan Baru Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Rayuan Rekabentuk Jalan Baru"){
            $projek->status = "Selesai Pengesahan Rayuan Rekabentuk Jalan Baru";
            alert()->success('Pengesahan Rayuan Rekabentuk Jalan Baru Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan Rayuan Rekabentuk Jalan Baru"){
            $projek->status = "Selesai Rayuan Rekabentuk Jalan Baru";
            alert()->success('Rayuan Rekabentuk Jalan Baru Disahkan', 'Berjaya');
        }

        $projek->save();
        return back();
        
    }

    public function sah_projek_eph_jalan_naiktaraf(Request $request){
        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        if ($projek->status == "Menunggu Pengesahan Sekretariat"){
            $projek->status = "Proses Pengisian Skor Rekabentuk Jalan Naiktaraf";
            alert()->success('Projek Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Proses Pengisian Skor Rekabentuk Jalan Naiktaraf"){
            $projek->status = "Dalam Pengesahan Skor Rekabentuk Jalan Naiktaraf";
            alert()->success('Proses Pengisian Skor Rekabentuk Jalan Naiktaraf', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Skor Rekabentuk Jalan Naiktaraf"){
            $projek->status = "Selesai Pengesahan  Rekabentuk Jalan Naiktaraf";
            alert()->success('Pengesahan Skor Rekabentuk Jalan Naiktaraf telah Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan  Rekabentuk Jalan Naiktaraf"){
            $projek->status = "Proses Jana Keputusan Rekabentuk Jalan Naiktaraf";
            alert()->success('Pengesahan Rekabentuk Jalan Naiktaraf', 'Berjaya');
        }
        elseif ($projek->status == "Proses Jana Keputusan Rekabentuk Jalan Naiktaraf"){
            $projek->status = "Selesai Jana Keputusan Rekabentuk Jalan Naiktaraf";
            alert()->success('Jana Keputusan Rekabentuk Jalan Naiktaraf', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Jana Keputusan Rekabentuk Jalan Naiktaraf"){
            $projek->status = "Selesai Rekabentuk Jalan Naiktaraf";
            alert()->success('Selesai Jana Keputusan Rekabentuk Jalan Naiktaraf ', 'Berjaya');
        }

        $projek->save();
        return back();


    }

    public function sah_projek_eph_jalan_naiktaraf_rayuan(Request $request){
        $id = (int)$request->route('id');
        $projek = Projek::find($id);

        if ($projek->status == "Selesai Jana Keputusan Rekabentuk Jalan Naiktaraf"){
            $projek->status = "Proses Rayuan Rekabentuk Jalan Naiktaraf";
            alert()->success('Rayuan Rekabentuk Jalan Naiktaraf sedang Diproses', 'Berjaya');
        }
        elseif ($projek->status == "Proses Rayuan Rekabentuk Jalan Naiktaraf"){
            $projek->status = "Dalam Pengesahan Rayuan Rekabentuk Jalan Naiktaraf";
            alert()->success('Proses Rayuan Rekabentuk Jalan Naiktaraf Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Dalam Pengesahan Rayuan Rekabentuk Jalan Naiktaraf"){
            $projek->status = "Selesai Pengesahan Rayuan Rekabentuk Jalan Naiktaraf";
            alert()->success('Pengesahan Rayuan Rekabentuk Jalan Naiktaraf Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan Rayuan Rekabentuk Jalan Naiktaraf"){
            $projek->status = "Selesai Rayuan Rekabentuk Jalan Naiktaraf";
            alert()->success('Rayuan Rekabentuk Jalan Naiktaraf Disahkan', 'Berjaya');
        }

        $projek->save();
        return back();
        
    }


    public function sijil_eph_bangunan(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        // dd($projek);

        $date = Carbon::now()->format('Y-m-d');
        $projek = FacadePdf::loadView('projek.sijil_eph_bangunan',compact('projek','date'));
        // dd($projek);
        return $projek->download('ePHJKR_SIJIL_EPH_BANGUNAN.'.'pdf');
    }

    public function sijil_gpss_bangunan(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        // dd($projek);

        $date = Carbon::now()->format('Y-m-d');
        $projek = FacadePdf::loadView('projek.sijil_gpss_bangunan',compact('projek','date'));

            return $projek->download('ePHJKR_SIJIL_GPSS_BANGUNAN.'.'pdf');
    }

    public function sijil_gpss_jalan(Request $request){
        // dd('OK');
        $id = (int)$request->route('id'); //cari id dlm route
        $projek = Projek::find($id); //cari id dlm model
        // dd($projek);

        $date = Carbon::now()->format('Y-m-d');
        $projek = FacadePdf::loadView('projek.sijil_gpss_jalan',compact('projek','date'));

        return $projek->download('ePHJKR_SIJIL_GPSS_JALAN.'.'pdf');
    }

    public function projek_status_berubah(Request $request){
        $user = $request->user();
        $id = (int)$request->route('id');

        $projek = Projek::find($id);
        
        if ($request->hantar_skorkad=="hantar"){	
            // Mail::to($user->email)->send(new ProjekStatusBerubah($projek));
            $projek->status == "Sudah Emel";
            alert()->success('Penilaian telah diemelkan ke Sekretariat', 'Berjaya');
        }
        
        

        Mail::to('maisarah.musa@pipeline-network.com')->send(new ProjekStatusBerubah($projek));

        // $email = Auth::user()->email;
        // Mail::to($user->email)->send(new ProjekStatusBerubah($projek));

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
