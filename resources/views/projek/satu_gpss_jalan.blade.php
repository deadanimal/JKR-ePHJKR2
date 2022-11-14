@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row mx-3 mb-2">
                        <h2 class="mb-3">Maklumat Projek</h2>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Nama Projek:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{$projek->nama}}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Alamat Projek:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{$projek->alamat}}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Poskod:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{$projek->poskod}}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Bandar:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{$projek->bandar}}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Negeri:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{$projek->negeri}}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Keluasan Tapak:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{$projek->keluasanTapak}}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Jumlah Blok Bangunan:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{$projek->jumlahBlokBangunan}}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Status Projek:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{$projek->status}}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Tarikh Jangka Mula Pembinaan:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{$projek->tarikhJangkaMulaPembinaan}}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Tarikh Jangka Siap Pembinaan:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{$projek->tarikhJangkaSiapPembinaan}}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Kaedah Pelaksanaan:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{$projek->kaedahPelaksanaan}}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Jenis Pelaksanaan:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{$projek->jenisPerolehan}}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Kos Projek:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{$projek->kosProjek}}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Jenis Projek:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{$projek->jenisProjek}}</h5>
                        </div>
                        <div class="col-4 mb-2">
                            <h5 class="h6">Jenis Kategori:</h5>
                        </div>
                        <div class="col-8 mb-2">
                            <h5 class="h6" style="font-weight: 700;">{{$projek->kategori}}</h5>
                        </div>
                    </div>
                </div>
                @role('sekretariat')
                <form action="/projek/{{$projek->id}}/sah-gpss-jalan" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($projek->status == "Menunggu Pengesahan Sekretariat")
                        <button class="btn btn-primary mx-3 my-3" type="submit">Sah Projek</button>
                    @elseif ($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Jalan")
                        <button class="btn btn-primary mx-3 my-3" type="submit">Proses Pengisian Skor Rekabentuk GPSS Jalan Sudah Diproses</button>
                    @elseif ($projek->status == "Dalam Pengesahan Skor Rekabentuk GPSS Jalan")
                        <button class="btn btn-primary mx-3 my-3" type="submit">Skor Rekabentuk GPSS Jalan Sudah Selesai</button>
                    @elseif ($projek->status == "Selesai Pengesahan Rekabentuk GPSS Jalan")    
                        <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Pengesahan Rekabentuk GPSS Jalan</button>
                    @elseif ($projek->status == "Proses Jana Keputusan Rekabentuk GPSS Jalan")    
                        <button class="btn btn-primary mx-3 my-3" type="submit">Jana Keputusan Rekabentuk GPSS Jalan</button>
                    @elseif ($projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Jalan")    
                        <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Jana Keputusan Rekabentuk GPSS Jalan</button>
                    @elseif ($projek->status == "Proses Pengisian Skor Verifikasi GPSS Jalan")    
                        <button class="btn btn-primary mx-3 my-3" type="submit">Proses Pengisian Skor Verifikasi GPSS Jalan Sudah Diproses</button>
                    @elseif ($projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Jalan")    
                        <button class="btn btn-primary mx-3 my-3" type="submit">Dalam Pengesahan Skor Verifikasi GPSS Jalan</button>
                    @elseif ($projek->status == "Proses Jana Keputusan Verifikasi GPSS Jalan")    
                        <button class="btn btn-primary mx-3 my-3" type="submit">Proses Jana Keputusan Verifikasi GPSS Jalan</button>
                    @elseif ($projek->status == "Selesai Jana Keputusan Verifikasi GPSS Jalan")    
                        <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Jana Keputusan Verifikasi GPSS Jalan</button>
                    @endif
                </form>
                <form action="/projek/{{$projek->id}}/sah-gpss-jalan-rayuan" method="POST" enctype="multipart/form-data">
                    @if ($projek->status == "Selesai Pengesahan Jana Sijil Verifikasi GPSS Jalan")    
                        <button class="btn btn-primary mx-3 my-3" type="submit">Proses Rayuan GPSS Jalan</button>
                    @elseif ($projek->status == "Proses Rayuan GPSS Bangunan")    
                        <button class="btn btn-primary mx-3 my-3" type="submit">Dalam Pengesahan Rayuan Bangunan</button>
                    @elseif ($projek->status == "Dalam Pengesahan Rayuan GPSS Bangunan")    
                        <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Pengesahan Rayuan Bangunan</button>
                    @elseif ($projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan")    
                        <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Rayuan Bangunan</button>
                    @endif
                </form>
                @endrole 
                @role('ketua-pasukan')
                    <button class="btn btn-primary mx-3 my-3" type="submit">Muat Turun Maklumat Projek</button>
                @endrole 
            </div>
        </div>
    </div>     
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
    @endrole

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
            <li class="nav-item"><a class="nav-link active" href="#tab-1" data-bs-toggle="tab" role="tab">Rumusan</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab">Skor Kad</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab" role="tab">Rekabentuk</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab-4" data-bs-toggle="tab" role="tab">Verifikasi</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab-5" data-bs-toggle="tab" role="tab">Rayuan</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab-6" data-bs-toggle="tab" role="tab">Sijil</a></li>
        </ul>
        <div class="tab-content">
            <!--RUMUSAN SKOR KAD-->
            <div class="tab-pane active" id="tab-1" role="tabpanel">
                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="mb-3">RUMUSAN SKOR KAD</h4>
                        <div class="col table-responsive scrollbar text-center">
                            <div class="col">
                                <table class="table table-bordered line-table text-center" style="width: 100%">
                                    <thead class="text-white bg-orange-jkr">
                                        <tr> 
                                            <th rowspan="2">No.</th>
                                                <th rowspan="2">Work Element</th>
                                                <th rowspan="2">Total Point Allocated</th>
                                                <th rowspan="2">Current Point Allocated</th>
                                                <th colspan="2">Total Points Requested</th>
                                                <th>Total Points Awarded</th>
                                                <th rowspan="2">Weightage (Refer Annex C)</th>
                                                <th rowspan="2">Percentage of Green Product Scoring Score %</th>
                                        </tr>
                                        <tr>
                                            <th>Design stage</th>
                                            <th>Construction stage</th>
                                            <th>Construction Stage</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-black">
                                        <tr>
                                        <th >1</th>
                                        <th >Architectural (Aw)</th>
                                        <th>232</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        </tr>

                                        <tr>
                                        <th >2</th>
                                        <th >Mechanical (Mw)</th>
                                        <th>34</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        </tr>

                                        <tr>
                                        <th >3</th>
                                        <th >Electrical (Ew)</th>
                                        <th>110</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        </tr>

                                        <tr>
                                        <th >4</th>
                                        <th >Civil & Structural (Cw)</th>
                                        <th>124</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th> 
                                        <th>0</th>                                           
                                        </tr>

                                        <tr>
                                        <th>5</th>
                                        <th>Road & Geotechnial (Rw)</th>
                                        <th>98</th>
                                        <th>RW_DS</th>
                                        <th>RW_CS</th>
                                        <th>RW_TPA</th>
                                        <th>RW_W</th>
                                        <th>RW_GPSS</th>
                                        </tr>

                                        <tr>
                                        <th>6</th>
                                        <th>Structural(Bridge) (Sw)</th>
                                        <th>12</th>
                                        <th>SW_DS</th>
                                        <th>SW_CS</th>
                                        <th>SW_TPA</th>
                                        <th>SW_W</th>
                                        <th>SW_GPSS</th>
                                        </tr>

                                        <tr>
                                        <th colspan="2">Total points</th>
                                        <th>610</th>
                                        <th>DS_TP</th>
                                        <th>CS_TP</th>
                                        <th>TPA_TP</th>
                                        <th>W_TP</th>
                                        <th>GPSS_TP</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                                
                        </div>
                        <table class="table table-bordered line-table text-center" style="width: 100%">
                            <thead class="text-white bg-orange-jkr">
                                <tr>
                                    <th colspan="2">SUMMARY</th>
                                </tr>
                            </thead>
                            <tbody class="text-black">
                                <tr>
                                    <th>GPSS Star (Bangunan) </th>
                                    <th>0<span class="star">&#160;&starf;</span></th>
                                </tr>
        
                                <tr>
                                    <th>GPSS Star (Jalan)</th>
                                    <th>0<span class="star">&#160;&starf;</span></th>
                                </tr>
                            
                                <tr>
                                <th>MyCREST</th>
                                <th>0<span>&#160;Points</span></th>
                                </tr>
                            </tbody> 
                        </table>
                    </div>
                </div>
            </div>

            <!--SKOR KAD GPSS JALAN-->
            <div class="tab-pane" id="tab-2" role="tabpanel">
                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="mb-3">SKOR KAD GPSS JALAN</h4>
                        <table class="table table-bordered line-table text-center skor-gpss-datatable" style="width: 100%">
                            <thead class="text-white bg-orange-jkr">
                                <tr>          
                                    <th colspan="10">Green Product Scoring Sheet</th>
                                </tr>
                                <tr>  
                                    <th colspan="10">ROAD</th>
                                </tr>
                                <tr>
                                    <th>Element</th>
                                    <th>Component</th>
                                    <th>Product</th>
                                    <th>Phase</th>
                                    <th>Point Allocated</th>
                                    <th>Point Requested (Design)</th>
                                    <th>Point Requested (Construction)</th>
                                    <th>Point Awarded</th>
                                    <th>Remarks</th>
                                    <th>Supporting Documents</th>
                                </tr>
                            </thead>
                        </table>
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
                                    <button class="btn btn-primary">Muat Turun Skor Kad</button>
                                </div>
                            </div>
                        @endrole
                    </div>
                </div>
            </div>

            <!--REKABENTUK GPSS JALAN-->
            <div class="tab-pane" id="tab-3" role="tabpanel">
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="/projek/{{ $projek->id }}/markah-gpss" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="fasa" value="rekabentuk">
                            <h4 class="mb-3">PENILAIAN REKABENTUK GPSS JALAN</h4>
                            <div class="row mx-3 mb-2">
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Component:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <select class="form-select form-control" id="kriteriaRekabentukDipilih"
                                        name="gpss_kriteria" onchange="kriteriaRekabentuk()">
                                        @foreach ($rekabentuk_kriterias as $akriteria)
                                            <option value="{{ $akriteria->id }}">{{ $akriteria->kod }} -
                                                {{ $akriteria->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Maximum Marks:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <div class="col-7 mb-2" id="infoKriteriaRekabentukDipilih"></div>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Point Allocated:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="markah" type="number"/>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Point Requested (Design):</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="markah" type="number" min="0" max="2"/>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Remarks:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <textarea class="form-control" rows="3" name="remarks" type="text" placeholder="Remarks"></textarea>
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

            <!--VERIFIKASI GPSS JALAN-->
            <div class="tab-pane" id="tab-4" role="tabpanel">
                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="mb-3">VERIFIKASI PERMARKAHAN GPSS JALAN</h4>
                        <form action="/projek/{{ $projek->id }}/markah-gpss" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mx-3 mb-2">
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Component:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <select class="form-select form-control" id="kriteriaVerifikasiDipilih"
                                        name="gpss_kriteria" onchange="kriteriaVerifikasi()">
                                        @foreach ($verifikasi_kriterias as $akriteria)
                                            <option value="{{ $akriteria->id }}">{{ $akriteria->kod }} -
                                                {{ $akriteria->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @role('penilai|ketua-penilai')
                                    <div class="col-5 mb-2">
                                        <label class="col-form-label">Point Awarded:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <select class="form-select form-control" name="point_awarded" aria-label="Default select example">
                                            <option selected>Sila Pilih</option>
                                            <option value="0">0</option>
                                            <option value="2">2</option>
                                        </select>
                                        {{-- <input name="point_awarded" type="number" maxlength="1" min="0" max="2" oninput="this.value=this.value.replace(/[^0-9]/g,'');" /> --}}
                                    </div>
                                @endrole
                                {{-- <div class="col-5 mb-2">
                                    <label class="col-form-label">Maximum Marks:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <div class="col-7 mb-2" id="infoKriteriaVerifikasiDipilih"></div>
                                </div> --}}
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Point Requested (Construction):</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="point_req_construction" type="number" min="0" max="2"/>
                                </div> 
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Remarks:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <textarea class="form-control" rows="3" name="remarks" type="text" placeholder="Remarks"></textarea>
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

            <!--RAYUAN GPSS JALAN-->
            <div class="tab-pane" id="tab-5" role="tabpanel">
                <div class="card mt-3">
                    <div class="card-body"> 
                        <form action="/projek/{{ $projek->id }}/markah" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h4 class="mb-3">RAYUAN</h4>
                            <div class="row mx-3 mb-2">
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Component:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <select class="form-select form-control" id="kriteriaRayuanDipilih"
                                        name="gpss_kriteria" onchange="kriteriaRayuan()">
                                        @foreach ($rayuan_kriterias as $akriteria)
                                            <option value="{{ $akriteria->id }}">{{ $akriteria->elemen }} -
                                                {{ $akriteria->komponen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Maximum Marks:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <div class="col-7 mb-2" id="infoKriteriaRayuanDipilih"></div>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Point Allocated:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="point_allocated" type="number"/>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Point Requested (Design):</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="point_req_design" type="number" min="0" max="2"/>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Point Requested (Construction):</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="point_req_construction" type="number" min="0" max="2"/>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Remarks:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <textarea class="form-control" rows="3" name="remarks" type="text" placeholder="Remarks"></textarea>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Comment on Appeal:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <textarea class="form-control" rows="3" name="comment_on_appeal" type="text" placeholder="Comment on Appeal"></textarea>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Upload File:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" type="file" name="dokumen1">
                                    <input class="form-control" type="file" name="dokumen2">
                                    <input class="form-control" type="file" name="dokumen3">
                                    <input class="form-control" type="file" name="dokumen4">
                                    <input class="form-control" type="file" name="dokumen5">                                </div>
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
            
            <!--SIJIL GPSS JALAN-->
            <div class="tab-pane" id="tab-6" role="tabpanel">
                <div class="card mt-3">
                    <div class="card-body">
                        <h4>SIJIL GPSS JALAN</h4>
                        @role('ketua-pasukan|penolong-ketua-pasukan')
                        <div class="row mt-3">
                            <div class="col text-center">
                                <a class="btn btn-primary" href="/projek/{{ $projek->id }}/sijil-gpss-jalan">Muat Turun Sijil</a>
                            </div>
                        </div>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!--Container-->
    

<!--JavaScript-->
<!--Button Simpan TOOLTIPS-->
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
        })
</script>  

<script>
    kriteriaRekabentuk();
    kriteriaVerifikasi();
    kriteriaRayuan();

    function kriteriaRekabentuk() {
        var lols = {!! $rekabentuk_kriterias !!}
        var kriteriaRekabentuk = document.getElementById("kriteriaRekabentukDipilih").value;
        let selectedKriteria = lols.find(el => el.id == kriteriaRekabentuk);
        document.getElementById("infoKriteriaRekabentukDipilih").innerHTML = selectedKriteria.maksimum;
    }


    function kriteriaVerifikasi() {
        var lols = {!! $verifikasi_kriterias !!}
        var kriteriaVerifikasi = document.getElementById("kriteriaVerifikasiDipilih").value;
        let selectedKriteria = lols.find(el => el.id == kriteriaVerifikasi);
        document.getElementById("infoKriteriaVerifikasiDipilih").innerHTML = selectedKriteria.maksimum;
    }

    function kriteriaRayuan() {
        var lols = {!! $rayuan_kriterias !!}
        var kriteriaRayuan = document.getElementById("kriteriaRayuanDipilih").value;
        let selectedKriteria = lols.find(el => el.id == kriteriaRayuan);
        document.getElementById("infoKriteriaRayuanDipilih").innerHTML = selectedKriteria.maksimum;
    }
</script>

<script type="text/javascript">
    $(function() {

        var idProjek = {!! json_decode($projek->id) !!}
        console.log(idProjek);
        var url = "/projek/" + idProjek;
        var table = $('.skor-gpss-datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: url,
            columns: [{
                    data: 'elemen',
                    name: 'elemen'
                },
                {
                    data: 'komponen',
                    name: 'komponen'
                },
                {
                    data: 'produk',
                    name: 'produk'
                },
                {
                    data: 'maksimum',
                    name: 'maksimum'
                },
                {
                    data: 'markah_gpss',
                    name: 'markah_gpss'
                },
                {
                    data: 'ulasan_gpss',
                    name: 'ulasan_gpss'
                },
                {
                    data: 'dokumen_gpss',
                    name: 'dokumen_gpss'
                },
            ]
        });


    });
</script>
    

@endsection