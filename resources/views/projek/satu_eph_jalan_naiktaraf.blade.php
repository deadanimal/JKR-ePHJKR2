@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="print.css">

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body" id="maklumat-projek">
                    <div class="row mx-3 mb-2">
                        <h2 class="mb-3">Maklumat Projek</h2>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Nama Projek:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{ $projek->nama }}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Alamat Projek:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{ $projek->alamat }}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Poskod:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{ $projek->poskod }}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Bandar:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{ $projek->bandar }}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Negeri:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{ $projek->negeri }}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Keluasan Tapak:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{ $projek->keluasanTapak }}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Jumlah Blok Bangunan:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{ $projek->jumlahBlokBangunan }}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Status Projek:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{ $projek->status }}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Tarikh Jangka Mula Pembinaan:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{ $projek->tarikhJangkaMulaPembinaan }}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Tarikh Jangka Siap Pembinaan:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{ $projek->tarikhJangkaSiapPembinaan }}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Kaedah Pelaksanaan:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{ $projek->kaedahPelaksanaan }}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Jenis Pelaksanaan:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{ $projek->jenisPerolehan }}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Kos Projek:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{ $projek->kosProjek }}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Jenis Projek:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{ $projek->jenisProjek }}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Jenis Kategori:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{ $projek->kategori }}</h5>
                        </div>
                    </div>
                </div>
                    @role('sekretariat')
                    <form action="/projek/{{$projek->id}}/sah-eph-jalan-naiktaraf" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($projek->status == "Menunggu Pengesahan Sekretariat")
                            <button class="btn btn-primary mx-3 my-3" type="submit">Sahkan Maklumat Projek</button>
                        @elseif ($projek->status == "Proses Pengisian Skor Rekabentuk Jalan Naiktaraf")
                            <button class="btn btn-primary mx-3 my-3" type="submit">Proses Pengisian Skor Rekabentuk Jalan Naiktaraf Sudah Dinilai</button>
                        @elseif ($projek->status == "Dalam Pengesahan Skor Rekabentuk Jalan Naiktaraf")
                            <button class="btn btn-primary mx-3 my-3" type="submit">Skor Rekabentuk Jalan Naiktaraf Sudah Selesai</button>
                        @elseif ($projek->status == "Selesai Pengesahan Rekabentuk Jalan Naiktaraf") 
                            <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Pengesahan Rekabentuk Jalan Naiktaraf</button>
                        @elseif ($projek->status == "Proses Jana Keputusan Rekabentuk Jalan Naiktaraf")   
                            <button class="btn btn-primary mx-3 my-3" type="submit">Proses Jana Keputusan Rekabentuk Jalan Naiktaraf</button>
                        @elseif ($projek->status == "Selesai Jana Keputusan Rekabentuk Jalan Naiktaraf")  
                            <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Rekabentuk Jalan Naiktaraf</button>
                        @endif
                    </form>
                    @endrole 
                    @role('ketua-pasukan|pentadbir|sekretariat')
                        <button class="btn btn-primary mx-3 my-3" onclick="printJS('maklumat-projek', 'html')">Muat Turun</button>
                    @endrole
                    <form action="/projek/{{$projek->id}}/sah-eph-jalan-rayuan-naiktaraf" method="POST" enctype="multipart/form-data">
                        @csrf
                        @role('ketua-pasukan|penolong-ketua-pasukan')
                        @if($projek->status == "Selesai Jana Keputusan Rekabentuk Jalan Naiktaraf")
                            <button class="btn btn-primary mx-3 my-3" type="submit">Membuat Rayuan Jalan Naiktaraf</button>
                        @endif
                        @endrole
                        @role('sekretariat')
                        @if ($projek->status == "Proses Rayuan Jalan Naiktaraf")
                            <button class="btn btn-primary mx-3 my-3" type="submit">Sahkan Proses Pengisian Rayuan Jalan Naiktaraf</button>
                        @endif
                        @endrole
                    </form>                    
            </div>
        </div>

        @if ($projek->status == "Proses Pengisian Skor Rekabentuk Jalan Naiktaraf" ||
            $projek->status == "Dalam Pengesahan Skor Rekabentuk Jalan Naiktaraf" ||
            $projek->status == "Selesai Pengesahan Rekabentuk Jalan Naiktaraf" ||
            $projek->status == "Proses Jana Keputusan Rekabentuk Jalan Naiktaraf" ||  
            $projek->status == "Selesai Jana Keputusan Rekabentuk Jalan Naiktaraf")  
            @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                <div class="col-12 mt-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="/projek/{{ $projek->id }}/lantik" method="POST">
                                @csrf
                                <div class="row mx-3 mb-2">
                                    <h2 class="mb-3">Pelantikan</h2>
                                    <div class="col-5 mb-2">
                                        <label class="col-form-label">Nama:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <select class="form-select" name="user_id">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-5 mb-2">
                                        <label class="col-form-label">Peranan:</label>
                                    </div>
                                    @role('ketua-pasukan|penolong-ketua-pasukan')
                                    <div class="col-7 mb-2">
                                        <select class="form-select" name="role_id">
                                            <option value=12 selected>Ketua Pemudah Cara</option>
                                            <option value=6>Pemudah Cara</option>
                                        </select>
                                    </div>
                                    @endrole
                                    @role('sekretariat')
                                    <div class="col-7 mb-2">
                                        <select class="form-select" name="role_id">
                                            <option value=3 selected>Ketua Pasukan</option>
                                            <option value=4>Penolong Ketua Pasukan</option>
                                            <option value=8>Ketua Penilai</option>
                                            <option value=7>Penilai</option>
                                        </select>
                                    </div>
                                    @endrole
                                </div>
                                @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        <button class="btn btn-primary" type="submit">Lantik</button>
                                    </div>
                                </div>
                                @endrole
                            </form>
                        </div>
                    </div>
                </div>
            @endrole


            @if (!$lantikans->isEmpty())
            <div class="col-12 mt-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered line-table" style="width:100%">
                            <thead class="text-white bg-orange-jkr">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Peranan</th>
                                </tr>
                            </thead>
                            @foreach ($lantikans as $lantikan)
                                <tr class="text-black">
                                    <td style="text-align: center; vertical-align: middle;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{ $lantikan->user->name }}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{ $lantikan->role->display_name }}
                                    </td>
                                </tr>
                            @endforeach
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        @endif

        @if ($projek->status == "Proses Pengisian Skor Rekabentuk Jalan Naiktaraf" ||
            $projek->status == "Dalam Pengesahan Skor Rekabentuk Jalan Naiktaraf" ||
            $projek->status == "Selesai Pengesahan Rekabentuk Jalan Naiktaraf" ||
            $projek->status == "Proses Jana Keputusan Rekabentuk Jalan Naiktaraf" ||  
            $projek->status == "Selesai Jana Keputusan Rekabentuk Jalan Naiktaraf")
            <div class="tab mt-6">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" href="#tab-1" data-bs-toggle="tab"
                            role="tab">Rumusan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab"
                            role="tab">Skor Kad</a></li>
                    @role('ketua-pemudah-cara|pemudah-cara|ketua-penilai|penilai')
                    <li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab"
                            role="tab">Rekabentuk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab-4" data-bs-toggle="tab"
                            role="tab">Verifikasi</a></li>
                    @endrole
                    @role('ketua-pasukan|penolong-ketua-pasukan')
                    <li class="nav-item"><a class="nav-link" href="#tab-5" data-bs-toggle="tab"
                            role="tab">Rayuan Rekabentuk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab-6" data-bs-toggle="tab"
                            role="tab">Rayuan Verifikasi</a></li>
                    @endrole
                    @role('sekretariat|ketua-pasukan|penolong-ketua-pasukan')
                    <li class="nav-item"><a class="nav-link" href="#tab-7" data-bs-toggle="tab"
                            role="tab">Sijil Rekabentuk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab-8" data-bs-toggle="tab"
                            role="tab">Sijil Verifikasi</a></li>
                    @endrole
                </ul>
                <div class="tab-content">
                    <!--RUMUSAN SKOR KAD-->
                    <div class="tab-pane active" id="tab-1" role="tabpanel">
                        <div class="row mt-3">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-3">RUMUSAN SKOR KAD</h4>
                                        <table class="table table-bordered line-table text-center" style="width: 100%">
                                            <thead class="text-white bg-orange-jkr">
                                                <tr>
                                                    <th colspan="9">UPGRADING ROADS</th>
                                                </tr>
                                                <tr align="center" style="background-color:#EB5500">
                                                    <th colspan="3" rowspan="2">TOTAL POINTS (CORE) / TOTAL ELECTIVE & INNOVATION POINTS</th>
                                                    <th colspan="3">DESIGN</th>
                                                    <th colspan="3">VERIFICATION</th>
                                                </tr>
                                                <tr>
                                                    <th>MAX</th>
                                                    <th>TARGET</th>
                                                    <th>ASSESSMENT</th>
                                                    <th>MAX</th>
                                                    <th>TARGET</th>
                                                    <th>ASSESSMENT</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-black">
                                                <tr class="text-black">
                                                    <th colspan="1">SM</th>
                                                    <th colspan="2">SUSTAINABLE SITE PLANNING AND MANAGEMENT</th>
                                                    <th>18</th>
                                                    <th>{{$sm_td}}</th>
                                                    <th>{{$sm_ad}}</th>
                                                    <th>18</th>
                                                    <th>{{$sm_tv}}</th>
                                                    <th>{{$sm_av}}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">PT</th>
                                                    <th colspan="2">PAVEMENT TECHNOLOGIES</th>
                                                    <th>12</th>
                                                    <th>{{$pt_td}}</th>
                                                    <th>{{$pt_ad}}</th>
                                                    <th>12</th>
                                                    <th>{{$pt_tv}}</th>
                                                    <th>{{$pt_av}}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">EW</th>
                                                    <th colspan="2">ENVIRONMENT & WATER</th>
                                                    <th>4</th>
                                                    <th>{{$ew_td}}</th>
                                                    <th>{{$ew_ad}}</th>
                                                    <th>5</th>
                                                    <th>{{$ew_tv}}</th>
                                                    <th>{{$ew_av}}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">AE</th>
                                                    <th colspan="2">ACCESS & EQUITY</th>
                                                    <th>3</th>
                                                    <th>{{$ae_td}}</th>
                                                    <th>{{$ae_ad}}</th>
                                                    <th>5</th>
                                                    <th>{{$ae_tv}}</th>
                                                    <th>{{$ae_av}}</th>
                                                </tr>

                                                <tr>
                                                    <th colspan="1">CA</th>
                                                    <th colspan="2">CONSTRUCTION ACTIVITIES</th>
                                                    <th>19</th>
                                                    <th>{{$ca_td}}</th>
                                                    <th>{{$ca_ad}}</th>
                                                    <th>22</th>
                                                    <th>{{$ca_tv}}</th>
                                                    <th>{{$ca_av}}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">MR</th>
                                                    <th colspan="2">MATERIAL AND RESOURCES</th>
                                                    <th>12</th>
                                                    <th>{{$mr_td}}</th>
                                                    <th>{{$mr_ad}}</th>
                                                    <th>12</th>
                                                    <th>{{$mr_tv}}</th>
                                                    <th>{{$mr_av}}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">EC</th>
                                                    <th colspan="2">ELECTIVE CRITERIA</th>
                                                    <th>27</th>
                                                    <th>{{$ec_td}}</th>
                                                    <th>{{$ec_ad}}</th>
                                                    <th>27</th>
                                                    <th>{{$ec_tv}}</th>
                                                    <th>{{$ec_av}}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">IN</th>
                                                    <th colspan="2">INOVATION</th>
                                                    <th>5</th>
                                                    <th>{{$in_td}}</th>
                                                    <th>{{$in_ad}}</th>
                                                    <th>5</th>
                                                    <th>{{$in_tv}}</th>
                                                    <th>{{$in_av}}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3">TOTAL CORE POINTS</th>
                                                    <th>68</th>
                                                    <th>{{$totalcp_td}}</th>
                                                    <th>{{$totalcp_ad}}</th>
                                                    <th>74</th>
                                                    <th>{{$totalcp_tv}}</th>
                                                    <th>{{$totalcp_av}}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3">TOTAL ELECTIVE & INNOVATION POINTS</th>
                                                    <th>12</th>
                                                    <th>{{$totaleip_td}}</th>
                                                    <th value="totaleip_ad">{{$totaleip_ad}}</th>
                                                    <th>15</th>
                                                    <th>{{$totaleip_tv}}</th>
                                                    <th>{{$totaleip_ad}}</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="col">
                                            <table class="table table-bordered line-table text-center" style="width: 100%">
                                                <thead class="text-white bg-orange-jkr">
                                                    <tr>
                                                        <th></th>
                                                        <th>TARGET SUMMARY (DESIGN)</th>
                                                        <th>DESIGN ASSESSMENT SUMMARY</th>
                                                        <th>TARGET SUMMARY (VERIFICATION)</th>
                                                        <th>VERIFICATION ASSESSMENT SUMMARY</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-black">
                                                    <tr>
                                                        <th >TOTAL SCORE (%)</th>
                                                        <th>{{number_format($final_score,2,".",",")}}</th>
                                                        <th>{{number_format($final_score3,2,".",",")}}</th>
                                                        <th>{{number_format($final_score2,2,".",",")}}</th>
                                                        <th>{{number_format($final_score4,2,".",",")}}</th>                                               
                                                    </tr>
                                                    <tr>
                                                        <th colspan="1" rowspan="3">pH JKR RATING</th>
                                                        <th>
                                                            <span class="star">
                                                                @if($final_score >=85)
                                                                    5 &starf; &starf; &starf; &starf; &starf;
                                                                @elseif($final_score >=70 && $final_score < 84)
                                                                    4 &starf; &starf; &starf; &starf;
                                                                @elseif($final_score >= 50 && $final_score < 69)
                                                                    3 &starf; &starf; &starf;
                                                                @elseif($final_score >=41 && $final_score < 49)
                                                                    2 &starf; &starf;
                                                                @elseif($final_score < 40)
                                                                    0 &starf;
                                                                @endif                                           
                                                            </span>
                                                        </th>
                                                        <th>
                                                            <span class="star">
                                                                @if($final_score3 >=85)
                                                                    5 &starf; &starf; &starf; &starf; &starf;
                                                                @elseif($final_score3 >=70 && $final_score3 < 84)
                                                                    4 &starf; &starf; &starf; &starf;
                                                                @elseif($final_score3 >= 50 && $final_score3 < 69)
                                                                    3 &starf; &starf; &starf;
                                                                @elseif($final_score3 >=41 && $final_score3 < 49)
                                                                    2 &starf; &starf;
                                                                @elseif($final_score3 < 40)
                                                                    0 &starf;
                                                                @endif                                           
                                                            </span>
                                                        </th>
                                                        <th>
                                                            <span class="star">
                                                                @if($final_score2 >=85)
                                                                    5 &starf; &starf; &starf; &starf; &starf;
                                                                @elseif($final_score2 >=70 && $final_score2 < 84)
                                                                    4 &starf; &starf; &starf; &starf;
                                                                @elseif($final_score2 >= 50 && $final_score2 < 69)
                                                                    3 &starf; &starf; &starf;
                                                                @elseif($final_score2 >=41 && $final_score2 < 49)
                                                                    2 &starf; &starf;
                                                                @elseif($final_score2 < 40)
                                                                    0 &starf;
                                                                @endif                                           
                                                            </span>
                                                        </th>
                                                        <th>
                                                            <span class="star">
                                                                @if($final_score4 >=85)
                                                                    5 &starf; &starf; &starf; &starf; &starf;
                                                                @elseif($final_score4 >=70 && $final_score4 < 84)
                                                                    4 &starf; &starf; &starf; &starf;
                                                                @elseif($final_score4 >= 50 && $final_score4 < 69)
                                                                    3 &starf; &starf; &starf;
                                                                @elseif($final_score4 >=41 && $final_score4 < 49)
                                                                    2 &starf; &starf;
                                                                @elseif($final_score4 < 40)
                                                                    0 &starf;
                                                                @endif                                           
                                                            </span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <span>
                                                                @if($final_score >=85)
                                                                    GLOBAL EXCELLENCE
                                                                @elseif($final_score >=70 && $final_score < 84)
                                                                    NATIONAL EXCELLENCE
                                                                @elseif($final_score >= 50 && $final_score < 69)
                                                                    BEST MANAGEMENT PRACTICES
                                                                @elseif($final_score >=41 && $final_score < 49)
                                                                    POTENTIAL RECOGNITION
                                                                @elseif($final_score < 40)
                                                                    NO RECOGNITION
                                                                @endif                                           
                                                            </span>
                                                        </th>
                                                        <th>
                                                            <span>
                                                                @if($final_score2 >=85)
                                                                    GLOBAL EXCELLENCE
                                                                @elseif($final_score2 >=70 && $final_score2 < 84)
                                                                    NATIONAL EXCELLENCE
                                                                @elseif($final_score2 >= 50 && $final_score2 < 69)
                                                                    BEST MANAGEMENT PRACTICES
                                                                @elseif($final_score2 >=41 && $final_score2 < 49)
                                                                    POTENTIAL RECOGNITION
                                                                @elseif($final_score2 < 40)
                                                                    NO RECOGNITION
                                                                @endif                                           
                                                            </span>
                                                        </th>
                                                        <th>
                                                            <span>
                                                                @if($final_score3 >=85)
                                                                    GLOBAL EXCELLENCE
                                                                @elseif($final_score3 >=70 && $final_score3 < 84)
                                                                    NATIONAL EXCELLENCE
                                                                @elseif($final_score3 >= 50 && $final_score3 < 69)
                                                                    BEST MANAGEMENT PRACTICES
                                                                @elseif($final_score3 >=41 && $final_score3 < 49)
                                                                    POTENTIAL RECOGNITION
                                                                @elseif($final_score3 < 40)
                                                                    NO RECOGNITION
                                                                @endif                                           
                                                            </span>
                                                        </th>
                                                        <th>
                                                            <span>
                                                                @if($final_score4 >=85)
                                                                    GLOBAL EXCELLENCE
                                                                @elseif($final_score4 >=70 && $final_score4 < 84)
                                                                    NATIONAL EXCELLENCE
                                                                @elseif($final_score4 >= 50 && $final_score4 < 69)
                                                                    BEST MANAGEMENT PRACTICES
                                                                @elseif($final_score4 >=41 && $final_score4 < 49)
                                                                    POTENTIAL RECOGNITION
                                                                @elseif($final_score4 < 40)
                                                                    NO RECOGNITION
                                                                @endif                                           
                                                            </span>
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        @role('sekretariat')
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <button class="btn btn-primary">Jana Keputusan</button>
                                            </div>
                                        </div>
                                        @endrole
                                        @role('ketua-pasukan')
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <button class="btn btn-primary">Muat Turun</button>
                                            </div>
                                        </div>
                                        @endrole
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--SKOR KAD EPH JALAN-->
                    <div class="tab-pane" id="tab-2" role="tabpanel">
                        <div class="row mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">SKOR KAD EPH JALAN</h4>
                                    <div class="col">
                                        <table class="table table-bordered line-table text-center skor-datatable" style="width: 100%">
                                            <thead class="text-white bg-orange-jkr">
                                                <tr>
                                                    <th colspan="7">UPGRADING ROADS</th>
                                                </tr>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Criteria</th>
                                                    <th>Phase</th>
                                                    <th>Max Point</th>
                                                    <th>Target Point</th>
                                                    <th>Assessment Point</th>
                                                    <th>Comment by Assessor</th>
                                                    <th>Supporting Documents</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        @role('sekretariat')
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <a href="#" class="btn btn-primary">Sah</a>
                                            </div>
                                        </div>
                                        @endrole
                                        @role('ketua-pasukan|penolong-ketua-pasukan')
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <button class="btn btn-primary">Muat Turun</button>
                                            </div>
                                        </div>
                                        @endrole
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--REKABENTUK EPH JALAN-->
                    @role('ketua-pemudah-cara|pemudah-cara|ketua-penilai|penilai')
                    <div class="tab-pane" id="tab-3" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body">
                                <form action="/projek/{{ $projek->id }}/markah-eph-jalan" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="fasa" value="rekabentuk">
                                    <h4 class="mb-3">PENILAIAN REKABENTUK JALAN</h4>
                                    <div class="row mx-3 mb-2">
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Criteria:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <select class="form-select form-control" name="kriteria">
                                                @foreach ($rekabentuk_kriterias as $akriteria)
                                                <option value="{{ $akriteria->id }}">{{ $akriteria->kod }} -
                                                    {{ $akriteria->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Target Point:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" name="markah" type="number" />
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Assessment Point:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" name="markah" type="number" />
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Comment by Assessor:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <textarea class="form-control" rows="3" name="comment" type="text" placeholder="Comment"></textarea>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Upload File:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" type="file" name="dokumen1">
                                            <input class="form-control" type="file" name="dokumen2">
                                            <input class="form-control" type="file" name="dokumen3">
                                            <input class="form-control" type="file" name="dokumen4">
                                            <input class="form-control" type="file" name="dokumen5">
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--VERIFIKASI EPH JALAN-->
                    <div class="tab-pane" id="tab-4" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body">
                                <form action="/projek/{{ $projek->id }}/markah-eph-jalan" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="fasa" value="verifikasi">
                                    <h4 class="mb-3">VERIFIKASI PERMARKAHAN JALAN</h4>
                                    <div class="row mx-3 mb-2">
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Criteria:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <select class="form-select form-control" name="kriteria">
                                                @foreach ($verifikasi_kriterias as $akriteria)
                                                <option value="{{ $akriteria->id }}">{{ $akriteria->kod }} -
                                                    {{ $akriteria->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Assessment Point:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" name="assessment_point" type="number"/>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Comment by Assessor:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <textarea class="form-control" rows="3" name="comment" type="text" placeholder="Comment"></textarea>
                                        </div>

                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Upload File:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" type="file" name="dokumen1">
                                            <input class="form-control" type="file" name="dokumen2">
                                            <input class="form-control" type="file" name="dokumen3">
                                            <input class="form-control" type="file" name="dokumen4">
                                            <input class="form-control" type="file" name="dokumen5">
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col text-center">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endrole

                    <!--RAYUAN REKABENTUK EPH JALAN-->
                    @if($projek->status == "Proses Rayuan Rekabentuk Jalan Naiktaraf")
                    @role('ketua-pasukan|penolong-ketua-pasukan')
                    <div class="tab-pane" id="tab-5" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body">
                                <form action="/projek/{{ $projek->id }}/markah" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="mb-3">RAYUAN PENILAIAN REKABENTUK JALAN</h4>
                                    <div class="row mx-3 mb-2">
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Criteria:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <select class="form-select form-control" id="kriteriaRayuanDipilih"
                                                name="kriteria" onchange="kriteriaRayuan()">
                                                @foreach ($rayuan_kriterias as $akriteria)
                                                    <option value="{{ $akriteria->id }}">{{ $akriteria->kod }} -
                                                        {{ $akriteria->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Target Point:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" name="markah" type="number" />
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Assessment Point:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" name="markah" type="number" />
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Comment by Assessor:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <textarea class="form-control" rows="3" name="" type="text" placeholder="Comment"></textarea>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Comment on Appeal:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <textarea class="form-control" rows="3" name="" type="text" placeholder="Comment on Appeal"></textarea>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Upload File:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" type="file" name="dokumen1">
                                            <input class="form-control" type="file" name="dokumen2">
                                            <input class="form-control" type="file" name="dokumen3">
                                            <input class="form-control" type="file" name="dokumen4">
                                            <input class="form-control" type="file" name="dokumen5">
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col text-center">
                                                <button type="submit"
                                                    class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!--RAYUAN VERIFIKASI EPH JALAN-->
                    @if($projek->status == "Proses Rayuan Verifikasi Jalan Naiktaraf")
                    <div class="tab-pane" id="tab-6" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body">
                                <form action="/projek/{{ $projek->id }}/markah" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="mb-3">RAYUAN VERIFIKASI PERMARKAHAN JALAN</h4>
                                    <div class="row mx-3 mb-2">
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Criteria:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <select class="form-select form-control" id="kriteriaRayuanDipilih"
                                                name="kriteria" onchange="kriteriaRayuan()">
                                                @foreach ($kriterias as $akriteria)
                                                    <option value="{{ $akriteria->id }}">{{ $akriteria->kod }} -
                                                        {{ $akriteria->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Target Point:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" name="markah" type="number" />
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Assessment Point:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" name="markah" type="number" />
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Comment by Assessor:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <textarea class="form-control" rows="3" name="" type="text" placeholder="Comment"></textarea>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Comment on Appeal:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <textarea class="form-control" rows="3" name="" type="text" placeholder="Comment on Appeal"></textarea>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Upload File:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" type="file" name="dokumen1">
                                            <input class="form-control" type="file" name="dokumen2">
                                            <input class="form-control" type="file" name="dokumen3">
                                            <input class="form-control" type="file" name="dokumen4">
                                            <input class="form-control" type="file" name="dokumen5">
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col text-center">
                                                <button type="submit"
                                                    class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endrole

                    <!--SIJIL REKABENTUK EPH JALAN-->
                    <div class="tab-pane" id="tab-7" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h4>SIJIL PENILAIAN REKABENTUK JALAN</h4>
                            </div>
                        </div>
                    </div>

                    <!--SIJIL VERIFIKASI EPH JALAN-->
                    <div class="tab-pane" id="tab-8" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h4>SIJIL VERIFIKASI PERMARKAHAN JALAN</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<!--JavaScript-->
<!--Button Simpan TOOLTIPS-->
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.css"></script>

<script>
    kriteriaRekabentuk();
    kriteriaVerifikasi();
    kriteriaValidasi();
    kriteriaRayuan();

    function kriteriaRekabentuk() {
        var lols = {!! $rekabentuk_kriterias !!}
        var kriteriaRekabentuk = document.getElementById("kriteriaRekabentukDipilih").value;
        let selectedKriteria = lols.find(el => el.id == kriteriaRekabentuk);
        document.getElementById("infoKriteriaRekabentukDipilih").innerHTML = selectedKriteria.bukti;
    }


    function kriteriaVerifikasi() {
        var lols = {!! $verifikasi_kriterias !!}
        var kriteriaVerifikasi = document.getElementById("kriteriaVerifikasiDipilih").value;
        let selectedKriteria = lols.find(el => el.id == kriteriaVerifikasi);
        document.getElementById("infoKriteriaVerifikasiDipilih").innerHTML = selectedKriteria.bukti;
    }

    function kriteriaRayuan() {
        var lols = {!! $rayuan_kriterias !!}
        var kriteriaRayuan = document.getElementById("kriteriaRayuanDipilih").value;
        let selectedKriteria = lols.find(el => el.id == kriteriaRayuan);
        document.getElementById("infoKriteriaRayuanDipilih").innerHTML = selectedKriteria.bukti;
    }
</script>

<script type="text/javascript">
    $(function() {

        var idProjek = {!! json_decode($projek->id) !!}
        console.log(idProjek);
        var url = "/projek/" + idProjek;
        var table = $('.skor-datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: url,
            columns: [{
                    data: 'kod',
                    name: 'kod'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'fasa',
                    name: 'fasa'
                },
                {
                    data: 'maksimum',
                    name: 'maksimum'
                },
                {
                    data: 'targetpoint_',
                    name: 'targetpoint_'
                },
                {
                    data: 'assessmentpoint_',
                    name: 'assessmentpoint_'
                },
                {
                    data: 'ulasan_',
                    name: 'ulasan_'
                },
                {
                    data: 'dokumen_',
                    name: 'dokumen_'
                },
            ]
        });


    });
</script>

@endsection
