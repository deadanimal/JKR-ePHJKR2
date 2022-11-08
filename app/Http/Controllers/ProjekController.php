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
use App\Models\GpssKriteria;
use App\Models\Markah;
use App\Models\GpssMarkah;
use App\Models\ProjekRoleUser;
use Illuminate\Support\Facades\Http;

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

        $projeks = Projek::all();

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
    // public function gugur_projek(Request $request) {
    //     $id = (int)$request->route('id'); 
    //     $projek = Projek::find($id);
    //     return view('projek.gugur_projek', compact('projek'));
    // }

    // public function senarai_gugur_projek(Request $request) { 
    //     $projek = Projek::all();
    //     return view('projek.senarai_gugur_projek', compact('projek'));
    // }
    public function senarai_gugur_projek(Request $request) {
        return view('projek.senarai_gugur_projek');
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

        if($request->ajax() && $projek->kategori ==  'phJKR Bangunan Baru A') {
            $kriterias = Kriteria::where('borang', 'BARU A')->get();

            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
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
                $html_button1 = '?';
                $markah = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                ])->first();       
                if($markah) {
                    $html_button1 = $markah->ulasan_rayuan;
                }         
                return $html_button1;
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
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
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Baru B') {
            $kriterias = Kriteria::where('borang', 'BARU B')->get();
            return DataTables::collection($kriterias)
            // ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
            //     $kriteria_id = $kriteria->id;
            //     $html_button1 = '?';
            //     $html_button2 = '?';
            //     $html_button3 = '?';
            //     $markah1 = Markah::where([
            //         ['projek_id', '=', $projek->id],
            //         ['kriteria_id', '=', $kriteria_id],
            //         ['fasa', '=', 'rekabentuk'],
            //     ])->first();       
            //     if($markah1) {
            //         $html_button1 = $markah1->markah;
            //     }    
            //     $markah2 = Markah::where([
            //         ['projek_id', '=', $projek->id],
            //         ['kriteria_id', '=', $kriteria_id],
            //         ['fasa', '=', 'verifikasi'],
            //     ])->first();       
            //     if($markah2) {
            //         $html_button2 = $markah2->markah;
            //     }  
            //     $markah3 = Markah::where([
            //         ['projek_id', '=', $projek->id],
            //         ['kriteria_id', '=', $kriteria_id],
            //         ['fasa', '=', 'validasi'],
            //     ])->first();       
            //     if($markah3) {
            //         $html_button3 = $markah3->markah;
            //     }                                       
            //     $html_button = $html_button1.' - '.$html_button2.' - '.$html_button3;
            //     return $html_button;
            // })
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
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
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Baru C') {
            $kriterias = Kriteria::where('borang', 'BARU C')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
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
            ->rawColumns(['markah_', 'markah_rayuan','ulasan_', 'dokumen_', 'ulasan_rayuan', 'dokumen_rayuan'])
            ->make(true);
        } 
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Baru D') {
            $kriterias = Kriteria::where('borang', 'BARU D')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
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
            ->rawColumns(['markah_', 'markah_rayuan','ulasan_', 'dokumen_', 'ulasan_rayuan', 'dokumen_rayuan'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan PUN A') {
            $kriterias = Kriteria::where('borang', 'PUN A')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
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
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan PUN B') {
            $kriterias = Kriteria::where('borang', 'PUN B')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
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
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan PUN C') {
            $kriterias = Kriteria::where('borang', 'PUN C')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
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
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan PUN D') {
            $kriterias = Kriteria::where('borang', 'PUN D')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
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
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Sedia Ada A') {
            $kriterias = Kriteria::where('borang', 'SEDIA ADA A')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
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
        elseif($request->ajax() && $projek->kategori ==  'phJKR Bangunan Sedia Ada B') {
            $kriterias = Kriteria::where('borang', 'SEDIA ADA B')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
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
            $gpss_kriteria = GpssKriteria::where('borang', 'CATEGORY 1')->get();
            return DataTables::collection($gpss_kriteria)
            ->addIndexColumn()    
            ->addColumn('markah_gpss', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button1 = '?';
                $html_button2 = '?';
                $markah1 = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                    ['fasa', '=', 'rekabentuk'],
                ])->first();       
                if($markah1) {
                    $html_button1 = $markah1->point_allocated;
                } 
                $markah2 = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                    ['fasa', '=', 'verifikasi'],
                ])->first();
                if($markah2) {
                    $html_button2 = $markah2->point_allocated;
                }  
                $html_button = $html_button1.' - '.$html_button2;     
                return $html_button;
            })
            ->addColumn('remarks_gpss', function (GpssKriteria $gpss_kriteria) use ($projek) {
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
            ->addColumn('dokumen_gpss', function (GpssKriteria $gpss_kriteria) use ($projek) {
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })                        
            ->rawColumns(['markah_gpss', 'remarks_gpss', 'dokumen_gpss'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'GPSS Bangunan 2') {
            $gpss_kriteria = GpssKriteria::where('borang', 'CATEGORY 2')->get();
            return DataTables::collection($gpss_kriteria)
            ->addIndexColumn()    
            ->addColumn('markah_gpss', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button1 = '?';
                $html_button2 = '?';
                $markah1 = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                    ['fasa', '=', 'rekabentuk'],
                ])->first();       
                if($markah1) {
                    $html_button1 = $markah1->point_allocated;
                } 
                $markah2 = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                    ['fasa', '=', 'verifikasi'],
                ])->first();
                if($markah2) {
                    $html_button2 = $markah2->point_allocated;
                }  
                $html_button = $html_button1.' - '.$html_button2;     
                return $html_button;
            })
            ->addColumn('remarks_gpss', function (GpssKriteria $gpss_kriteria) use ($projek) {
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
            ->addColumn('dokumen_gpss', function (GpssKriteria $gpss_kriteria) use ($projek) {
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })                        
            ->rawColumns(['markah_gpss', 'remarks_gpss', 'dokumen_gpss'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'GPSS Bangunan 3') {
            $gpss_kriteria = GpssKriteria::where('borang', 'CATEGORY 3')->get();
            return DataTables::collection($gpss_kriteria)
            ->addIndexColumn()    
            ->addColumn('markah_gpss', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button1 = '?';
                $html_button2 = '?';
                $markah1 = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                    ['fasa', '=', 'rekabentuk'],
                ])->first();       
                if($markah1) {
                    $html_button1 = $markah1->point_allocated;
                } 
                $markah2 = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                    ['fasa', '=', 'verifikasi'],
                ])->first();
                if($markah2) {
                    $html_button2 = $markah2->point_allocated;
                }  
                $html_button = $html_button1.' - '.$html_button2;     
                return $html_button;
            })
            ->addColumn('remarks_gpss', function (GpssKriteria $gpss_kriteria) use ($projek) {
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
            ->addColumn('dokumen_gpss', function (GpssKriteria $gpss_kriteria) use ($projek) {
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })                        
            ->rawColumns(['markah_gpss', 'remarks_gpss', 'dokumen_gpss'])
            ->make(true);
        }
        elseif($request->ajax() && $projek->kategori ==  'GPSS Jalan') {
            $gpss_kriteria = GpssKriteria::where('borang', 'ROAD')->get();
            return DataTables::collection($gpss_kriteria)
            ->addIndexColumn()    
            ->addColumn('markah_gpss', function (GpssKriteria $gpss_kriteria) use ($projek) {
                $gpss_kriteria_id = $gpss_kriteria->id;
                $html_button1 = '?';
                $html_button2 = '?';
                $markah1 = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                    ['fasa', '=', 'rekabentuk'],
                ])->first();       
                if($markah1) {
                    $html_button1 = $markah1->point_allocated;
                } 
                $markah2 = GpssMarkah::where([
                    ['projek_id', '=', $projek->id],
                    ['gpss_kriteria_id', '=', $gpss_kriteria_id],
                    ['fasa', '=', 'verifikasi'],
                ])->first();
                if($markah2) {
                    $html_button2 = $markah2->point_allocated;
                }  
                $html_button = $html_button1.' - '.$html_button2;     
                return $html_button;
            })
            ->addColumn('remarks_gpss', function (GpssKriteria $gpss_kriteria) use ($projek) {
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
            ->addColumn('dokumen_gpss', function (GpssKriteria $gpss_kriteria) use ($projek) {
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
                    }                                                                                        
                }         
                return $html_button;
            })                        
            ->rawColumns(['markah_gpss', 'remarks_gpss', 'dokumen_gpss'])
            ->make(true);
        } 
        elseif($request->ajax() && $projek->kategori ==  'phJKR Jalan Baru') {
            $kriterias = Kriteria::where('borang', 'NEW ROADS')->get();
            return DataTables::collection($kriterias)
            ->addColumn('markah_', function (Kriteria $kriteria) use ($projek) {
                $kriteria_id = $kriteria->id;
                $html_button1 = '?';
                $html_button2 = '?';
                $markah1 = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                    ['fasa', '=', 'rekabentuk'],
                ])->first();       
                if($markah1) {
                    $html_button1 = $markah1->markah;
                }    
                $markah2 = Markah::where([
                    ['projek_id', '=', $projek->id],
                    ['kriteria_id', '=', $kriteria_id],
                    ['fasa', '=', 'verifikasi'],
                ])->first();       
                if($markah2) {
                    $html_button2 = $markah2->markah;
                }                                       
                $html_button = $html_button1.' - '.$html_button2;
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
                        $html_button += '<a href="'.$url.'">Dokumen 2</a>';
                    } 
                    if($markah->dokumen3) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen3;
                        $html_button += '<a href="'.$url.'">Dokumen 3</a>';
                    }   
                    if($markah->dokumen4) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen4;
                        $html_button += '<a href="'.$url.'">Dokumen 4</a>';
                    } 
                    if($markah->dokumen5) {
                        $url = 'https://pipeline-apps.sgp1.digitaloceanspaces.com/'.$markah->dokumen5;
                        $html_button += '<a href="'.$url.'">Dokumen 5</a>';
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
           


        if ($projek->kategori ==  'phJKR Bangunan Baru A') {
            $kriterias = Kriteria::where('borang', 'BARU A')->get();    

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


            // dd($tl_mr);   
            return view('projek.satu_eph_bangunan', compact(
                'projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans',
                'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
                'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'in_mr','total_mr', 
                'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'in_mv','total_mv',
                'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'in_ml','total_ml',
            ));             
        } elseif ($projek->kategori ==  'phJKR Bangunan Baru B') {
            $kriterias = Kriteria::where('borang', 'BARU B')->get();
        
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
                elseif ($markah_pa_mv){
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
        ));             
        } elseif ($projek->kategori ==  'phJKR Bangunan Baru C') {
            $kriterias = Kriteria::where('borang', 'BARU C')->get(); 
            
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan Baru D') {
            $kriterias = Kriteria::where('borang', 'BARU D')->get();   
            
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan PUN A') {
            $kriterias = Kriteria::where('borang', 'PUN A')->get(); 
            
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan PUN B') {
            $kriterias = Kriteria::where('borang', 'PUN B')->get(); 
            
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan PUN C') {
            $kriterias = Kriteria::where('borang', 'PUN C')->get();
            
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan PUN D') {
            $kriterias = Kriteria::where('borang', 'PUN D')->get(); 
            
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan Sedia Ada A') {
            $kriterias = Kriteria::where('borang', 'SEDIA ADA A')->get(); 

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


            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan Sedia Ada B') {
            $kriterias = Kriteria::where('borang', 'SEDIA ADA B')->get(); 
            
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan Sedia Ada C') {
            $kriterias = Kriteria::where('borang', 'SEDIA ADA C')->get(); 
            
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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
        )); 
        } elseif ($projek->kategori ==  'phJKR Bangunan Sedia Ada D') {
            $kriterias = Kriteria::where('borang', 'SEDIA ADA D')->get(); 

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

            return view('projek.satu_eph_bangunan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans',
            'peratusan_mr', 'peratusan_mv', 'peratusan_ml', 'bintang_mr', 'bintang_mv', 'bintang_ml',
            'tl_mr','kt_mr','sb_mr','pa_mr','pd_mr', 'fl_mr','in_mr','total_mr', 
            'tl_mv','kt_mv','sb_mv','pa_mv','pd_mv', 'fl_mv','in_mv','total_mv',
            'tl_ml','kt_ml','sb_ml','pa_ml','pd_ml', 'fl_ml','in_ml','total_ml',
        )); 
        } elseif ($projek->kategori ==  'phJKR Jalan Baru') {
            $kriterias = Kriteria::where('borang', 'NEW ROADS')->get();   


            return view('projek.satu_eph_jalan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans')); 
        } elseif ($projek->kategori ==  'phJKR Jalan Naiktaraf') {
            $kriterias = Kriteria::where('borang', 'UPGRADING ROADS')->get();            
            return view('projek.satu_eph_jalan', compact('projek', 'user', 'user_role' ,'kriterias', 'users', 'lantikans')); 
        } elseif ($projek->kategori ==  'GPSS Bangunan 1') {
            $gpss_kriterias = GpssKriteria::where('borang', 'CATEGORY 1')->get();            
            // $gpss_kriterias = GpssKriteria::where('borang', 'like', '%CATEGORY 1%')->get();                      
            // dd($gpss_kriterias);

            // Rekabentuk borang CATEGORY 1
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 1]])->get();
            $aw_ds = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 2]])->get();
            $mw_ds = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 3]])->get();
            $ew_ds = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 4]])->get();
            $cw_ds = 0;

            $aw_pa_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 1]])->get();
            $aw_pa = 0;
            $mw_pa_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 2]])->get();
            $mw_pa = 0;
            $ew_pa_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 3]])->get();
            $ew_pa = 0;
            $cw_pa_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 4]])->get();
            $cw_pa = 0;

            // Verifikasi borang CATEGORY 1
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 1]])->get();
            $aw_cs = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 2]])->get();
            $mw_cs = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 3]])->get();
            $ew_cs = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 4]])->get();
            $cw_cs = 0;
            // $rw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 3]])->get();
            // $rw_ds = 0;
            // $sw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 1'],['element_seq','=', 4]])->get();
            // $sw_ds = 0;

            foreach($aw_pa_kriterias as $aw_pa_kriteria){
                $markah_aw_pa = GpssMarkah::where([['projek_id', '=', $projek->id], ['gpss_kriteria_id', '=', $aw_pa_kriteria->id], ['fasa', '=', 'rekabentuk']])->first();
                if($aw_pa){
                    $aw_pa += $markah_aw_pa->point_allocated;
                }
            }
            foreach($mw_pa_kriterias as $mw_pa_kriteria){
                $markah_mw_pa = GpssMarkah::where([['projek_id', '=', $projek->id], ['gpss_kriteria_id', '=', $mw_pa_kriteria->id], ['fasa', '=', 'rekabentuk']])->first();
                if($mw_pa){
                    $mw_pa += $markah_mw_pa->point_allocated;
                }
            }
            foreach($ew_pa_kriterias as $ew_pa_kriteria){
                $markah_ew_pa = GpssMarkah::where([['projek_id', '=', $projek->id], ['gpss_kriteria_id', '=', $ew_pa_kriteria->id], ['fasa', '=', 'rekabentuk']])->first();
                if($ew_pa){
                    $ew_pa += $markah_ew_pa->point_allocated;
                }
            }
            foreach($cw_pa_kriterias as $cw_pa_kriteria){
                $markah_cw_pa = GpssMarkah::where([['projek_id', '=', $projek->id], ['gpss_kriteria_id', '=', $cw_pa_kriteria->id], ['fasa', '=', 'rekabentuk']])->first();
                if($cw_pa){
                    $cw_pa += $markah_cw_pa->point_allocated;
                }
            }

            foreach($aw_kriterias as $aw_kriteria) {                
                $markah_aw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_aw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();
                // $markah_aw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_aw_ds){
                    $aw_ds +=  $markah_aw_ds->point_req_design;
                } 
                elseif ($markah_aw_cs){
                    $aw_cs += $markah_aw_cs->point_req_construction;
                }
                // elseif ($markah_aw_pa){
                //     $aw_pa += $markah_aw_pa->point_allocated;
                // }                                 
            }
            foreach($mw_kriterias as $mw_kriteria) {                
                $markah_mw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();
                // $markah_mw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_mw_ds){
                    $mw_ds +=  $markah_mw_ds->point_req_design;
                } 
                elseif ($markah_mw_cs){
                    $mw_cs += $markah_mw_cs->point_req_construction;
                }
                // elseif ($markah_mw_pa){
                //     $mw_pa += $markah_mw_pa->point_allocated;
                // }
            }
            foreach($ew_kriterias as $ew_kriteria) {                
                $markah_ew_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                // $markah_ew_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_ew_ds){
                    $ew_ds +=  $markah_ew_ds->point_req_design;
                } 
                elseif ($markah_ew_cs){
                    $ew_cs += $markah_ew_cs->point_req_construction;
                }
                // elseif ($markah_ew_pa){
                //     $ew_pa += $markah_ew_pa->point_allocated;
                // }
            }
            foreach($cw_kriterias as $cw_kriteria) {                
                $markah_cw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_cw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();
                // $markah_cw_pa = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','rekabentuk']])->first();

                if($markah_cw_ds){
                    $cw_ds +=  $markah_cw_ds->point_req_design;
                } 
                elseif ($markah_cw_cs){
                    $cw_cs += $markah_cw_cs->point_req_construction;
                }
                // elseif ($markah_cw_pa){
                //     $cw_pa += $markah_cw_pa->point_allocated;
                // }
            }
            
            $total_ds = $aw_ds + $mw_ds + $ew_ds + $cw_ds; 
            // + $rw_ds + $sw_ds;
            $total_cs = $aw_cs + $mw_cs + $ew_cs + $cw_cs; 
            // + $rw_cs + $sw_cs;
            $total_pa = $aw_pa + $mw_pa + $ew_pa + $cw_pa;

            //Peratus Design Stage

            // $peratusan_ds = $total_ds /610 * 100;
            // if($peratusan_ds >= 80){
            //     $bintang_ds = 5;
            // }
            // elseif($peratusan_ds >= 70 && $peratusan_ds < 80){
            //     $bintang_ds = 4;
            // }
            // elseif($peratusan_ds >= 60 && $peratusan_ds < 70){
            //     $bintang_ds = 3;
            // }
            // elseif($peratusan_ds >= 50 && $peratusan_ds < 60){
            //     $bintang_ds = 2;
            // }
            // elseif($peratusan_ds >= 40 && $peratusan_ds < 50){
            //     $bintang_ds = 1;
            // }

            //Peratus Construction Stage
            // $peratusan_cs = $total_cs /610 * 100;
            // if($peratusan_cs >= 80){
            //     $bintang_cs = 5;
            // }
            // elseif($peratusan_cs >= 70 && $peratusan_cs < 80){
            //     $bintang_cs = 4;
            // }
            // elseif($peratusan_cs >= 60 && $peratusan_cs < 70){
            //     $bintang_cs = 3;
            // }
            // elseif($peratusan_cs >= 50 && $peratusan_cs < 60){
            //     $bintang_cs = 2;
            // }
            // elseif($peratusan_cs >= 40 && $peratusan_cs < 50){
            //     $bintang_cs = 1;
            // }


            // // Weightage Category 1
            // $peratusan_ds = $total_ds * 0.45;
            // $peratusan_cs = $total_cs * 0.15;

        


            return view('projek.satu_gpss_bangunan', compact('projek', 'user', 'user_role' ,'gpss_kriterias', 'users', 'lantikans',
            'aw_ds', 'mw_ds', 'ew_ds', 'cw_ds', 'aw_cs', 'mw_cs', 'ew_cs', 'cw_cs', 'aw_pa', 'ew_pa', 'cw_pa', 'ew_pa', 'mw_pa',
            // 'peratusan_ds', 'peratusan_cs', 
            'total_ds', 'total_cs', 'total_pa',
            // 'bintang_ds', 'bintang_cs',
        )); 
        } elseif ($projek->kategori ==  'GPSS Bangunan 2') {
            $gpss_kriterias = GpssKriteria::where('borang', 'like', '%CATEGORY 2%')->get();
            
            // Rekabentuk borang CATEGORY 2
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 1]])->get();
            $aw_ds = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 2]])->get();
            $mw_ds = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 3]])->get();
            $ew_ds = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 4]])->get();
            $cw_ds = 0;

            // Verifikasi borang CATEGORY 2
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 1]])->get();
            $aw_cs = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 2]])->get();
            $mw_cs = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 3]])->get();
            $ew_cs = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 2'],['element_seq','=', 4]])->get();
            $cw_cs = 0;

            foreach($aw_kriterias as $aw_kriteria) {                
                $markah_aw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_aw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();
                if($markah_aw_ds){
                    $aw_ds +=  $markah_aw_ds->point_req_design;
                } 
                elseif ($markah_aw_cs){
                    $aw_cs += $markah_aw_cs->point_req_construction;
                }                                 
            }
            foreach($mw_kriterias as $mw_kriteria) {                
                $markah_mw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();
                if($markah_mw_ds){
                    $mw_ds +=  $markah_mw_ds->point_req_design;
                } 
                elseif ($markah_mw_cs){
                    $mw_cs += $markah_mw_cs->point_req_construction;
                }
            }
            foreach($ew_kriterias as $ew_kriteria) {                
                $markah_ew_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                if($markah_ew_ds){
                    $ew_ds +=  $markah_ew_ds->point_req_design;
                } 
                elseif ($markah_ew_cs){
                    $ew_cs += $markah_ew_cs->point_req_construction;
                }
            }
            foreach($cw_kriterias as $cw_kriteria) {                
                $markah_cw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_cw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();
                if($markah_cw_ds){
                    $cw_ds +=  $markah_cw_ds->point_req_design;
                } 
                elseif ($markah_cw_cs){
                    $cw_cs += $markah_cw_cs->point_req_construction;
                }
            }

            $total_ds = $aw_ds + $mw_ds + $ew_ds + $cw_ds;
            $total_cs = $aw_cs + $mw_cs + $ew_cs + $cw_cs;

            //Peratus Design Stage

            // $peratusan_ds = $total_ds /610 * 100;
            // if($peratusan_ds >= 80){
            //     $bintang_ds = 5;
            // }
            // elseif($peratusan_ds >= 70 && $peratusan_ds < 80){
            //     $bintang_ds = 4;
            // }
            // elseif($peratusan_ds >= 60 && $peratusan_ds < 70){
            //     $bintang_ds = 3;
            // }
            // elseif($peratusan_ds >= 50 && $peratusan_ds < 60){
            //     $bintang_ds = 2;
            // }
            // elseif($peratusan_ds >= 40 && $peratusan_ds < 50){
            //     $bintang_ds = 1;
            // }

            //Peratus Construction Stage
            // $peratusan_cs = $total_cs /610 * 100;
            // if($peratusan_cs >= 80){
            //     $bintang_cs = 5;
            // }
            // elseif($peratusan_cs >= 70 && $peratusan_cs < 80){
            //     $bintang_cs = 4;
            // }
            // elseif($peratusan_cs >= 60 && $peratusan_cs < 70){
            //     $bintang_cs = 3;
            // }
            // elseif($peratusan_cs >= 50 && $peratusan_cs < 60){
            //     $bintang_cs = 2;
            // }
            // elseif($peratusan_cs >= 40 && $peratusan_cs < 50){
            //     $bintang_cs = 1;
            // }


            // // Weightage Category 1
            // $peratusan_ds = $total_ds * 0.45;
            // $peratusan_cs = $total_cs * 0.15;

            return view('projek.satu_gpss_bangunan', compact('projek', 'user', 'user_role' ,'gpss_kriterias', 'users', 'lantikans',
            'aw_ds', 'mw_ds', 'ew_ds', 'cw_ds', 'aw_cs', 'mw_cs', 'ew_cs', 'cw_cs',
            // 'peratusan_ds', 'peratusan_cs', 
            'total_ds', 'total_cs', 
            // 'bintang_ds', 'bintang_cs',
        ));         
        } elseif ($projek->kategori ==  'GPSS Bangunan 3') {
            $gpss_kriterias = GpssKriteria::where('borang', 'like', '%CATEGORY 3%')->get();  
            
            // Rekabentuk borang CATEGORY 3
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 1]])->get();
            $aw_ds = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 2]])->get();
            $mw_ds = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 3]])->get();
            $ew_ds = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 4]])->get();
            $cw_ds = 0;
            // $rw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 1]])->get();
            // $rw_ds = 0;
            // $sw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 2]])->get();
            // $sw_ds = 0;

            // Verifikasi borang CATEGORY 3
            $aw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 1]])->get();
            $aw_cs = 0;
            $mw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 2]])->get();
            $mw_cs = 0;
            $ew_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 3]])->get();
            $ew_cs = 0;
            $cw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 4]])->get();
            $cw_cs = 0;
            // $rw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 1]])->get();
            // $rw_cs = 0;
            // $sw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 2]])->get();
            // $sw_cs = 0;

            foreach($aw_kriterias as $aw_kriteria) {                
                $markah_aw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_aw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $aw_kriteria->id],['fasa','=','verifikasi']])->first();
                if($markah_aw_ds){
                    $aw_ds +=  $markah_aw_ds->point_req_design;
                } 
                elseif ($markah_aw_cs){
                    $aw_cs += $markah_aw_cs->point_req_construction;
                }                                 
            }
            foreach($mw_kriterias as $mw_kriteria) {                
                $markah_mw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_mw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $mw_kriteria->id],['fasa','=','verifikasi']])->first();
                if($markah_mw_ds){
                    $mw_ds +=  $markah_mw_ds->point_req_design;
                } 
                elseif ($markah_mw_cs){
                    $mw_cs += $markah_mw_cs->point_req_construction;
                }
            }
            foreach($ew_kriterias as $ew_kriteria) {                
                $markah_ew_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_ew_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $ew_kriteria->id],['fasa','=','verifikasi']])->first();
                if($markah_ew_ds){
                    $ew_ds +=  $markah_ew_ds->point_req_design;
                } 
                elseif ($markah_ew_cs){
                    $ew_cs += $markah_ew_cs->point_req_construction;
                }
            }
            foreach($cw_kriterias as $cw_kriteria) {                
                $markah_cw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','rekabentuk']])->first();
                $markah_cw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $cw_kriteria->id],['fasa','=','verifikasi']])->first();
                if($markah_cw_ds){
                    $cw_ds +=  $markah_cw_ds->point_req_design;
                } 
                elseif ($markah_cw_cs){
                    $cw_cs += $markah_cw_cs->point_req_construction;
                }
            }
            // foreach($rw_kriterias as $rw_kriteria) {                
            //     $markah_rw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $rw_kriteria->id],['fasa','=','rekabentuk']])->first();
            //     $markah_rw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $rw_kriteria->id],['fasa','=','verifikasi']])->first();
            //     if($markah_rw_ds){
            //         $rw_ds +=  $markah_rw_ds->point_req_design;
            //     } 
            //     elseif ($markah_rw_cs){
            //         $rw_cs += $markah_rw_cs->point_req_construction;
            //     }
            // }
            // foreach($sw_kriterias as $sw_kriteria) {                
            //     $markah_sw_ds = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $sw_kriteria->id],['fasa','=','rekabentuk']])->first();
            //     $markah_sw_cs = GpssMarkah::where([['projek_id','=', $projek->id], ['gpss_kriteria_id','=', $sw_kriteria->id],['fasa','=','verifikasi']])->first();
            //     if($markah_sw_ds){
            //         $sw_ds +=  $markah_sw_ds->point_req_design;
            //     } 
            //     elseif ($markah_sw_cs){
            //         $sw_cs += $markah_sw_cs->point_req_construction;
            //     }
            // }

            $total_ds = $aw_ds + $mw_ds + $ew_ds + $cw_ds;
            //  + $rw_ds + $sw_ds;
            $total_cs = $aw_cs + $mw_cs + $ew_cs + $cw_cs;
            //  + $rw_cs + $sw_cs;

            //Peratus Design Stage

            // $peratusan_ds = $total_ds /610 * 100;
            // if($peratusan_ds >= 80){
            //     $bintang_ds = 5;
            // }
            // elseif($peratusan_ds >= 70 && $peratusan_ds < 80){
            //     $bintang_ds = 4;
            // }
            // elseif($peratusan_ds >= 60 && $peratusan_ds < 70){
            //     $bintang_ds = 3;
            // }
            // elseif($peratusan_ds >= 50 && $peratusan_ds < 60){
            //     $bintang_ds = 2;
            // }
            // elseif($peratusan_ds >= 40 && $peratusan_ds < 50){
            //     $bintang_ds = 1;
            // }

            //Peratus Construction Stage
            // $peratusan_cs = $total_cs /610 * 100;
            // if($peratusan_cs >= 80){
            //     $bintang_cs = 5;
            // }
            // elseif($peratusan_cs >= 70 && $peratusan_cs < 80){
            //     $bintang_cs = 4;
            // }
            // elseif($peratusan_cs >= 60 && $peratusan_cs < 70){
            //     $bintang_cs = 3;
            // }
            // elseif($peratusan_cs >= 50 && $peratusan_cs < 60){
            //     $bintang_cs = 2;
            // }
            // elseif($peratusan_cs >= 40 && $peratusan_cs < 50){
            //     $bintang_cs = 1;
            // }


            // // Weightage Category 1
            // $peratusan_ds = $total_ds * 0.45;
            // $peratusan_cs = $total_cs * 0.15;

            return view('projek.satu_gpss_bangunan', compact('projek', 'user', 'user_role' ,'gpss_kriterias', 'users', 'lantikans',
            'aw_ds', 'mw_ds', 'ew_ds', 'cw_ds', 'aw_cs', 'mw_cs', 'ew_cs', 'cw_cs', 
            // 'rw_ds', 'rw_cs', 'sw_ds', 'sw_cs',
            // 'peratusan_ds', 'peratusan_cs', 
            'total_ds', 'total_cs', 
            // 'bintang_ds', 'bintang_cs',
        ));   
        }  elseif ($projek->kategori ==  'GPSS Jalan') {
            $gpss_kriterias = GpssKriteria::where('borang', 'like', 'ROAD')->get();   
            
            // Rekabentuk borang CATEGORY 3
            $rw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 1]])->get();
            $rw_ds = 0;
            $sw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 2]])->get();
            $sw_ds = 0;

            // Verifikasi borang CATEGORY 3
            $rw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 1]])->get();
            $rw_cs = 0;
            $sw_kriterias = GpssKriteria::where([['borang','=', 'CATEGORY 3'],['element_seq','=', 2]])->get();
            $sw_cs = 0;

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

            $total_ds = $rw_ds + $sw_ds;
            $total_cs = $rw_cs + $sw_cs;

            //Peratus Design Stage

            // $peratusan_ds = $total_ds /610 * 100;
            // if($peratusan_ds >= 80){
            //     $bintang_ds = 5;
            // }
            // elseif($peratusan_ds >= 70 && $peratusan_ds < 80){
            //     $bintang_ds = 4;
            // }
            // elseif($peratusan_ds >= 60 && $peratusan_ds < 70){
            //     $bintang_ds = 3;
            // }
            // elseif($peratusan_ds >= 50 && $peratusan_ds < 60){
            //     $bintang_ds = 2;
            // }
            // elseif($peratusan_ds >= 40 && $peratusan_ds < 50){
            //     $bintang_ds = 1;
            // }

            //Peratus Construction Stage
            // $peratusan_cs = $total_cs /610 * 100;
            // if($peratusan_cs >= 80){
            //     $bintang_cs = 5;
            // }
            // elseif($peratusan_cs >= 70 && $peratusan_cs < 80){
            //     $bintang_cs = 4;
            // }
            // elseif($peratusan_cs >= 60 && $peratusan_cs < 70){
            //     $bintang_cs = 3;
            // }
            // elseif($peratusan_cs >= 50 && $peratusan_cs < 60){
            //     $bintang_cs = 2;
            // }
            // elseif($peratusan_cs >= 40 && $peratusan_cs < 50){
            //     $bintang_cs = 1;
            // }


            // // Weightage Category 1
            // $peratusan_ds = $total_ds * 0.45;
            // $peratusan_cs = $total_cs * 0.15;

            return view('projek.satu_gpss_jalan', compact('projek', 'user', 'user_role' ,'gpss_kriterias', 'users', 'lantikans',
            'total_ds', 'total_cs', 'rw_ds', 'rw_ds', 'sw_cs', 'rw_cs',
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
        $markah->ulasan_rayuan = $request->ulasan_rayuan;
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

        if ($request->hasFile('dokumen_rayuan1')) {
            $markah->dokumen1 = $request->file('dokumen1')->store('jkr-ephjkr/uploads');
        } else {
            if ($request->markah > 0) {
                Alert::error('Dokumen diperlukan', 'Jika markah melebihi 0, silakan letakkan sekurang-kurangnya satu dokumen lampiran');
                return back();
            }            
        }    
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
            alert()->success('Pengisian Skor Verifikasi GPSS Bangunan Disahkan', 'Berjaya');
        }
        elseif ($projek->status == "Selesai Pengesahan Verifikasi GPSS Bangunan"){
            alert()->success('Selesai Pengesahan Verifikasi GPSS Bangunan', 'Berjaya');
        }


        $projek->save();
        return back();
    }

    public function sah_projek_gpss_jalan(Request $request){

    }

    // public function sah_penilaian(Request $request){

    // }

    // public function cetak_maklumat(Request $request){

    // }

    




}
