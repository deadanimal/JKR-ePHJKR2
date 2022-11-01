@extends('layouts.app')

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
            </div>
        </div>
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
                            <div class="col-7 mb-2">
                                <select class="form-select" name="role_id">
                                    <option value=6 selected>Pemudah Cara</option>
                                    <option value=8>Ketua Penilai</option>
                                    <option value=7>Penilai</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col text-center">
                                <button class="btn btn-primary" type="submit">Lantik</button>
                            </div>
                        </div>
                    </form>
                </div>
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
                        role="tab">Rayuan</a></li>
                @role('sekretariat|ketua-pasukan|penolong-ketua-pasukan')
                <li class="nav-item"><a class="nav-link" href="#tab-6" data-bs-toggle="tab"
                        role="tab">Sijil</a></li>
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
                                                <th value="SM_TOTAL_TARGET_DESIGN">SM_TD</th>
                                                <th value="SM_TOTAL_ASSESSMENT_DESIGN">SM_AD</th>
                                                <th>18</th>
                                                <th value="SM_TOTAL_TARGET_VERIFIKASI">SM_TV</th>
                                                <th value="SM_TOTAL_ASSESSMENT_VERIFIKASI">SM_AV</th>
                                            </tr>
                                            <tr>
                                                <th colspan="1">PT</th>
                                                <th colspan="2">PAVEMENT TECHNOLOGIES</th>
                                                <th>12</th>
                                                <th value="PT_TOTAL_TARGET_DESIGN">PT_TD</th>
                                                <th value="PT_TOTAL_ASSESSMENT_DESIGN">PT_AD</th>
                                                <th>12</th>
                                                <th value="PT_TOTAL_TARGET_VERIFIKASI">PT_TV</th>
                                                <th value="PT_TOTAL_ASSESSMENT_VERIFIKASI">PT_AV</th>
                                            </tr>
                                            <tr>
                                                <th colspan="1">EW</th>
                                                <th colspan="2">ENVIRONMENT & WATER</th>
                                                <th>4</th>
                                                <th value="EW_TOTAL_TARGET_DESIGN">EW_TD</th>
                                                <th value="EW_TOTAL_ASSESSMENT_DESIGN">EW_AD</th>
                                                <th>5</th>
                                                <th value="EW_TOTAL_TARGET_VERIFIKASI">EW_TV</th>
                                                <th value="EW_TOTAL_ASSESSMENT_VERIFIKASI">EW_AV</th>
                                            </tr>
                                            <tr>
                                                <th colspan="1">AE</th>
                                                <th colspan="2">ACCESS & EQUITY</th>
                                                <th>3</th>
                                                <th value="AE_TOTAL_TARGET_DESIGN">AE_TD</th>
                                                <th value="AE_TOTAL_ASSESSMENT_DESIGN">AE_AD</th>
                                                <th>5</th>
                                                <th value="AE_TOTAL_TARGET_VERIFIKASI">AE_TV</th>
                                                <th value="AE_TOTAL_ASSESSMENT_VERIFIKASI">AE_AV</th>
                                            </tr>

                                            <tr>
                                                <th colspan="1">CA</th>
                                                <th colspan="2">CONSTRUCTION ACTIVITIES</th>
                                                <th>19</th>
                                                <th value="CA_TOTAL_TARGET_DESIGN">CA_TD</th>
                                                <th value="CA_TOTAL_ASSESSMENT_DESIGN">CA_AD</th>
                                                <th>22</th>
                                                <th value="CA_TOTAL_TARGET_VERIFIKASI">CA_TV</th>
                                                <th value="CA_TOTAL_ASSESSMENT_VERIFIKASI">CA_AV</th>
                                            </tr>
                                            <tr>
                                                <th colspan="1">MR</th>
                                                <th colspan="2">MATERIAL AND RESOURCES</th>
                                                <th>12</th>
                                                <th value="MR_TOTAL_TARGET_DESIGN">MR_TD</th>
                                                <th value="MR_TOTAL_ASSESSMENT_DESIGN">MR_AD</th>
                                                <th>12</th>
                                                <th value="MR_TOTAL_TARGET_VERIFIKASI">MR_TV</th>
                                                <th value="MR_TOTAL_ASSESSMENT_VERIFIKASI">MR_AV</th>
                                            </tr>
                                            <tr>
                                                <th colspan="1">EC</th>
                                                <th colspan="2">ELECTIVE CRITERIA</th>
                                                <th>27</th>
                                                <th value="EC_TOTAL_TARGET_DESIGN">EC_TD</th>
                                                <th value="EC_TOTAL_ASSESSMENT_DESIGN">EC_AD</th>
                                                <th>27</th>
                                                <th value="EC_TOTAL_TARGET_VERIFIKASI">EC_TV</th>
                                                <th value="EC_TOTAL_ASSESSMENT_VERIFIKASI">EC_AV</th>
                                            </tr>
                                            <tr>
                                                <th colspan="1">IN</th>
                                                <th colspan="2">INOVATION</th>
                                                <th>5</th>
                                                <th value="IN_TOTAL_TARGET_DESIGN">IN_TD</th>
                                                <th value="IN_TOTAL_ASSESSMENT_DESIGN">IN_AD</th>
                                                <th>5</th>
                                                <th value="IN_TOTAL_TARGET_VERIFIKASI">IN_TV</th>
                                                <th value="IN_TOTAL_ASSESSMENT_VERIFIKASI">IN_AV</th>
                                            </tr>
                                            <tr>
                                                <th colspan="3">TOTAL CORE POINTS</th>
                                                <th>68</th>
                                                <th value="TOTALCP_TARGET_DESIGN">TCP_TD</th>
                                                <th value="TOTALCP_ASSESSMENT_DESIGN">TCP_AD</th>
                                                <th>74</th>
                                                <th value="TOTALCP_TARGET_VERIFIKASI">TCP_TV</th>
                                                <th value="TOTALCP_ASSESSMENT_VERIFIKASI">TCP_AV</th>
                                            </tr>
                                            <tr>
                                                <th colspan="3">TOTAL ELECTIVE & INNOVATION POINTS</th>
                                                <th>12</th>
                                                <th value="TOTALEIP_TARGET_DESIGN">TEIP_TD</th>
                                                <th value="TOTALEIP_ASSESSMENT_DESIGN">TEIP_AD</th>
                                                <th>15</th>
                                                <th value="TOTALEIP_TARGET_VERIFIKASI">TEIP_TV</th>
                                                <th value="TOTALEIP_ASSESSMENT_VERIFIKASI">TEIP_AV</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="col">
                                        <table class="table table-bordered line-table text-center" style="width: 100%">
                                            <thead class="text-white bg-orange-jkr">
                                                <tr>
                                                    <th></th>
                                                    <th colspan="3" rowspan="3">TARGET SUMMARY</th>
                                                    <th colspan="3" rowspan="3">SCORING VERIFICATION SUMMARY</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-black">
                                                <tr>
                                                    <th colspan="1">TOTAL SCORE (%)</th>
                                                    <th colspan="2" value="SM_TOTAL_TARGET_DESIGN">SM_TOT_TD</th>
                                                    <th colspan="2" value="SM_TOTAL_TARGET_DESIGN">SM_TOT_TD</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="1" rowspan="3">pH JKR RATING</th>
                                                    <th colspan="2">0<span class="star">&starf;</span></th>
                                                    <th colspan="2">0<span class="star">&starf;</span></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">NO RECOGNITION</th>
                                                    <th colspan="2">NO RECOGNITION</th>
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
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">SKOR KAD EPH JALAN</h4>
                                        <div class="col">
                                            <table class="table table-bordered line-table text-center" style="width: 100%">
                                                <thead class="text-white bg-orange-jkr">
                                                    <tr>
                                                        @if ($projek->kategori == 'phJKR Jalan Lama')
                                                            <th colspan="7">NEW ROADS</th>
                                                        @elseif ($projek->kategori == 'phJKR Jalan Baru')
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
                                        <label class="col-form-label">Criteria Info:</label>
                                    </div>
                                    <div class="col-7 mb-2" id="infoKriteriaRekabentukDipilih">
                                    </div>
                                    <div class="col-5 mb-2">
                                        <label class="col-form-label">Target Point:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="markah" type="number" />
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
                                            <button type="submit"
                                                class="btn btn-primary">Simpan</button>
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
                                        <label class="col-form-label">Criteria Info:</label>
                                    </div>
                                    <div class="col-7 mb-2" id="infoKriteriaVerifikasiDipilih">
                                    </div>
                                    <div class="col-5 mb-2">
                                        <label class="col-form-label">Assessment Point:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="markah" type="number"/>
                                    </div>
                                    <div class="col-5 mb-2">
                                        <label class="col-form-label">Comment by Assessor:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <textarea class="form-control" rows="3" name="ulasan" type="text" placeholder="Comment"></textarea>
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

                <!--RAYUAN EPH JALAN-->
                <div class="tab-pane" id="tab-5" role="tabpanel">
                    <div class="card mt-3">
                        <div class="card-body">
                            <form action="/projek/{{ $projek->id }}/markah" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <h4 class="mb-3">RAYUAN</h4>
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
                                        <label class="col-form-label">Criteria Info:</label>
                                    </div>
                                    <div class="col-7 mb-2" id="infoKriteriaRayuankDipilih">
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

                <!--SIJIL EPH JALAN-->
                <div class="tab-pane" id="tab-6" role="tabpanel">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4>SIJIL EPH JALAN</h4>
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
                    data: 'maksimum',
                    name: 'maksimum'
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

            ]
        });


    });
</script>

@endsection
