@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="print.css">

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                        <button class="btn btn-primary mx-3 my-3" onclick="printJS('printJS-form', 'html')">Muat Turun Maklumat Projek</button>
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


        @if (!$lantikans->isEmpty())
        <div class="col-12 mt-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered line-table" style="width:100%">
                        <thead>
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

        <div class="tab mt-6">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#tab-1" data-bs-toggle="tab"
                        role="tab">Rumusan</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab"
                        role="tab">Skor Kad</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab"
                        role="tab">Rekabentuk</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-4" data-bs-toggle="tab"
                        role="tab">Verifikasi</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-5" data-bs-toggle="tab"
                        role="tab">Rayuan Rekabentuk</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-6" data-bs-toggle="tab"
                        role="tab">Rayuan Verifikasi</a></li>
                {{-- @role('sekretariat|ketua-pasukan|penolong-ketua-pasukan') --}}
                <li class="nav-item"><a class="nav-link" href="#tab-7" data-bs-toggle="tab"
                        role="tab">Sijil Rekabentuk</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-8" data-bs-toggle="tab"
                        role="tab">Sijil Verifikasi</a></li>
                {{-- @endrole --}}
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
                                                @if ($projek->kategori == 'phJKR Jalan Lama')
                                                    <th colspan="9">NEW ROADS</th>
                                                @elseif ($projek->kategori == 'phJKR Jalan Baru')
                                                    <th colspan="9">UPGRADING ROADS</th>
                                                @endif
                                            </tr>
                                            <tr align="center" style="background-color:#EB5500">
                                                <th colspan="3" rowspan="2">TOTAL POINTS (CORE)</th>
                                                <th colspan="3">DESIGN</th>
                                                <th colspan="3">VERIFICATION</th>
                                            </tr>
                                            <tr>
                                                <th>MAX </th>
                                                <th>TARGET </th>
                                                <th>ASSESSMENT </th>
                                                <th>MAX </th>
                                                <th>TARGET </th>
                                                <th>ASSESSMENT </th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-black">
                                            <tr class="text-black">
                                                <th colspan="1">SM</th>
                                                <th colspan="2">SUSTAINABLE SITE PLANNING AND MANAGEMENT</th>
                                                <th>18</th>
                                                <th value="SM_TOTAL_TARGET_DESIGN">{{$sm_td}}</th>
                                                <th value="SM_TOTAL_ASSESSMENT_DESIGN">{{$sm_ad}}</th>
                                                <th>18</th>
                                                <th value="SM_TOTAL_TARGET_VERIFIKASI">{{$sm_tv}}</th>
                                                <th value="SM_TOTAL_ASSESSMENT_VERIFIKASI">{{$sm_av}}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="1">PT</th>
                                                <th colspan="2">PAVEMENT TECHNOLOGIES</th>
                                                <th>12</th>
                                                <th value="PT_TOTAL_TARGET_DESIGN">{{$pt_td}}</th>
                                                <th value="PT_TOTAL_ASSESSMENT_DESIGN">{{$pt_ad}}</th>
                                                <th>12</th>
                                                <th value="PT_TOTAL_TARGET_VERIFIKASI">{{$pt_tv}}</th>
                                                <th value="PT_TOTAL_ASSESSMENT_VERIFIKASI">{{$pt_av}}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="1">EW</th>
                                                <th colspan="2">ENVIRONMENT & WATER</th>
                                                <th>4</th>
                                                <th value="EW_TOTAL_TARGET_DESIGN">{{$ew_td}}</th>
                                                <th value="EW_TOTAL_ASSESSMENT_DESIGN">{{$ew_ad}}</th>
                                                <th>5</th>
                                                <th value="EW_TOTAL_TARGET_VERIFIKASI">{{$ew_tv}}</th>
                                                <th value="EW_TOTAL_ASSESSMENT_VERIFIKASI">{{$ew_av}}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="1">AE</th>
                                                <th colspan="2">ACCESS & EQUITY</th>
                                                <th>3</th>
                                                <th value="AE_TOTAL_TARGET_DESIGN">{{$ae_td}}</th>
                                                <th value="AE_TOTAL_ASSESSMENT_DESIGN">{{$ae_ad}}</th>
                                                <th>5</th>
                                                <th value="AE_TOTAL_TARGET_VERIFIKASI">{{$ae_tv}}</th>
                                                <th value="AE_TOTAL_ASSESSMENT_VERIFIKASI">{{$ae_av}}</th>
                                            </tr>

                                            <tr>
                                                <th colspan="1">CA</th>
                                                <th colspan="2">CONSTRUCTION ACTIVITIES</th>
                                                <th>19</th>
                                                <th value="ca_td">{{$ca_td}}</th>
                                                <th value="ca_ad">{{$ca_ad}}</th>
                                                <th>22</th>
                                                <th value="ca_tv">{{$ca_tv}}</th>
                                                <th value="ca_av">{{$ca_av}}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="1">MR</th>
                                                <th colspan="2">MATERIAL AND RESOURCES</th>
                                                <th>12</th>
                                                <th value="mr_td">{{$mr_td}}</th>
                                                <th value="mr_ad">{{$mr_ad}}</th>
                                                <th>12</th>
                                                <th value="mr_tv">{{$mr_tv}}</th>
                                                <th value="mr_av">{{$mr_av}}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="1">EC</th>
                                                <th colspan="2">ELECTIVE CRITERIA</th>
                                                <th>27</th>
                                                <th value="ec_td">{{$ec_td}}</th>
                                                <th value="ec_ad">{{$ec_ad}}</th>
                                                <th>27</th>
                                                <th value="ec_tv">{{$ec_tv}}</th>
                                                <th value="ec_av">{{$ec_av}}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="1">IN</th>
                                                <th colspan="2">INOVATION</th>
                                                <th>5</th>
                                                <th value="in_td">{{$in_td}}</th>
                                                <th value="in_ad">{{$in_ad}}</th>
                                                <th>5</th>
                                                <th value="in_tv">{{$in_tv}}</th>
                                                <th value="IN_TOTAL_ASSESSMENT_VERIFIKASI">{{$in_av}}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="3">TOTAL CORE POINTS</th>
                                                <th>68</th>
                                                <th value="TOTALCP_TARGET_DESIGN">{{$totalcp_td}}</th>
                                                <th value="TOTALCP_ASSESSMENT_DESIGN">{{$totalcp_ad}}</th>
                                                <th>74</th>
                                                <th value="TOTALCP_TARGET_VERIFIKASI">{{$totalcp_tv}}</th>
                                                <th value="TOTALCP_ASSESSMENT_VERIFIKASI">{{$totalcp_av}}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="3">TOTAL ELECTIVE & INNOVATION POINTS</th>
                                                <th>12</th>
                                                <th value="totaleip_td">{{$totaleip_td}}</th>
                                                <th value="totaleip_ad">{{$totaleip_ad}}</th>
                                                <th>15</th>
                                                <th value="totaleip_tv">{{$totaleip_tv}}</th>
                                                <th value="totaleip_ad">{{$totaleip_ad}}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="col">
                                        <table class="table table-bordered line-table text-center" style="width: 100%">
                                            <thead class="text-white bg-orange-jkr">
                                                <tr>
                                                    <th></th>
                                                    <th colspan="3" rowspan="3">TARGET SUMMARY</th>
                                                    <th colspan="3" rowspan="3">DESIGN ASSESSMENT SUMMARY</th>
                                                    <th colspan="3" rowspan="3">VERIFICATION ASSESSMENT SUMMARY</th>

                                                </tr>
                                            </thead>
                                            <tbody class="text-black">
                                                <tr>
                                                    <th >TOTAL SCORE (%)</th>
                                                    <th colspan="3" value="final_score">{{$final_score}}</th>
                                                    <th colspan="3" value="final_score2">{{$final_score2}}</th>
                                                    <th colspan="3" value="final_score3">{{$final_score3}}</th>                                               

                                                </tr>
                                                <tr>
                                                    <th colspan="1" rowspan="3">pH JKR RATING</th>
                                                    <th colspan="2">
                                                        <span class="star">
                                                            @if ($bintang_fs == 1)
                                                                1 &starf;
                                                            @elseif ($bintang_fs == 2)
                                                                2 &starf; &starf;
                                                            @elseif ($bintang_fs == 3)
                                                                3 &starf; &starf; &starf;
                                                            @elseif ($bintang_fs == 4)
                                                                4 &starf; &starf; &starf; &starf;  
                                                            @elseif ($bintang_fs == 5)
                                                                5 &starf; &starf; &starf; &starf; &starf;                                                                                               
                                                            @endif                                            
                                                        </span>
                                                    <th colspan="3">
                                                        <span class="star">
                                                            @if ($bintang_fs == 1)
                                                                1 &starf;
                                                            @elseif ($bintang_fs == 2)
                                                                2 &starf; &starf;
                                                            @elseif ($bintang_fs == 3)
                                                                3 &starf; &starf; &starf;
                                                            @elseif ($bintang_fs == 4)
                                                                4 &starf; &starf; &starf; &starf;  
                                                            @elseif ($bintang_fs == 5)
                                                                5 &starf; &starf; &starf; &starf; &starf;                                                                                               
                                                            @endif                                            
                                                        </span>
                                                </tr>
                                                <tr>
                                                    @if ($bintang_fs == 1)
                                                    <th colspan="2">NO RECOGNITION</th>
                                                    @elseif ($bintang_fs == 2)
                                                    <th colspan="2">POTENTIAL RECOGNITION</th>
                                                    @elseif ($bintang_fs == 3)
                                                    <th colspan="2">BEST MANAGEMENT PRACTICES</th>
                                                    @elseif ($bintang_fs == 4)
                                                    <th colspan="2">NATIONAL EXCELLENCE</th>
                                                    @elseif ($bintang_fs == 5)
                                                    <th colspan="2">GLOBAL EXCELLENCE</th>
                                                    @endif
                                                    

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @role('ketua-pasukan')
                                    <div class="row mt-3">
                                        <div class="col text-center">
                                            <button class="btn btn-primary">Muat Turun Rumusan Skor Kad</button>
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
                                                @if ($projek->kategori == 'phJKR Jalan Baru')
                                                    <th colspan="7">UPGRADING ROADS</th>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th rowspan="2">Code</th>
                                                <th rowspan="2">Criteria</th>
                                                <th rowspan="2">Responsibility</th>
                                                @if ($projek->fasa == 'rekabentuk')
                                                <th colspan="4">Design</th>
                                                @elseif ($projek->fasa == 'verifikasi')
                                                <th colspan="4">Verification</th>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>MAX POINT</th>
                                                <th>TARGET POINT</th>
                                                <th>ASSESSMENT POINT</th>
                                                <th>COMMENT BY ASSESSOR</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    @role('sekretariat')
                                    <div class="row mt-3">
                                        <div class="col text-center">
                                            <a href="#" class="btn btn-primary">Sahkan Penilaian</a>
                                        </div>
                                    </div>
                                    @endrole
                                    @role('ketua-pasukan')
                                    <div class="row mt-3">
                                        <div class="col text-center">
                                            <button class="btn btn-primary">Muat Turun Skor Kad</button>
                                        </div>
                                    </div>
                                    @endrole
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--REKABENTUK EPH JALAN-->
                <div class="tab-pane" id="tab-3" role="tabpanel">
                    <div class="card mt-3">
                        <div class="card-body">
                            <form action="/projek/{{ $projek->id }}/markah" method="POST"
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
                                            @foreach ($kriterias as $akriteria)
                                                <option value="{{ $akriteria->id }}">
                                                    {{ $akriteria->kod }} -
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
                            <form action="/projek/{{ $projek->id }}/markah" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="fasa" value="verifikasi">
                                <h4 class="mb-3">VERIFIKASI PERMARKAHAN JALAN</h4>
                                <div class="row mx-3 mb-2">
                                    <div class="col-5 mb-2">
                                        <label class="col-form-label">Criteria:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <select class="form-select form-control" name="kriteria">
                                            @foreach ($kriterias as $akriteria)
                                                <option value="{{ $akriteria->id }}">
                                                    {{ $akriteria->kod }} -
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

                <!--RAYUAN REKABENTUK EPH JALAN-->
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

                <!--RAYUAN VERIFIKASI EPH JALAN-->
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
        var lols = {!! $kriterias !!}
        var kriteriaRekabentuk = document.getElementById("kriteriaRekabentukDipilih").value;
        let selectedKriteria = lols.find(el => el.id == kriteriaRekabentuk);
        document.getElementById("infoKriteriaRekabentukDipilih").innerHTML = selectedKriteria.bukti;
    }


    function kriteriaVerifikasi() {
        var lols = {!! $kriterias !!}
        var kriteriaVerifikasi = document.getElementById("kriteriaVerifikasiDipilih").value;
        let selectedKriteria = lols.find(el => el.id == kriteriaVerifikasi);
        document.getElementById("infoKriteriaVerifikasiDipilih").innerHTML = selectedKriteria.bukti;
    }

    function kriteriaValidasi() {
        var lols = {!! $kriterias !!}
        var kriteriaValidasi = document.getElementById("kriteriaValidasiDipilih").value;
        let selectedKriteria = lols.find(el => el.id == kriteriaValidasi);
        document.getElementById("infoKriteriaValidasiDipilih").innerHTML = selectedKriteria.bukti;
    }

    function kriteriaRayuan() {
        var lols = {!! $kriterias !!}
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
                    data: 'markah_',
                    name: 'markah_'
                },
                {
                    data: 'ulasan_',
                    name: 'ulasan_'
                },
                {
                    data: 'dokumen_',
                    name: 'dokumen_'
                },
                {
                    data: 'ulasan_rayuan',
                    name: 'ulasan_rayuan'
                },

            ]
        });


    });
</script>

@endsection
