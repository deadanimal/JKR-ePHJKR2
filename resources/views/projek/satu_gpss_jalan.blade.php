@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="print.css">

@section('content')

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <div class="card">
                <div class="card-body" id="printJS-form">
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
                            <h5 class="h6">Jenis Perolehan:</h5>
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
                    {{-- @elseif ($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Jalan")
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
                        <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Jana Keputusan Verifikasi GPSS Jalan</button> --}}
                    @endif
                </form>
                {{-- <form action="/projek/{{$projek->id}}/sah-gpss-jalan-rayuan" method="POST" enctype="multipart/form-data">
                    @if ($projek->status == "Selesai Pengesahan Jana Sijil Verifikasi GPSS Jalan")    
                        <button class="btn btn-primary mx-3 my-3" type="submit">Proses Rayuan GPSS Jalan</button>
                    @elseif ($projek->status == "Proses Rayuan GPSS Jalan")    
                        <button class="btn btn-primary mx-3 my-3" type="submit">Dalam Pengesahan Rayuan GPSS Jalan</button>
                    @elseif ($projek->status == "Dalam Pengesahan Rayuan GPSS Jalan")    
                        <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Pengesahan Rayuan GPSS Jalan</button>
                    @elseif ($projek->status == "Selesai Pengesahan Rayuan GPSS Jalan")    
                        <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Rayuan GPSS Jalan</button>
                    @endif
                </form> --}}
                @endrole 
                @role('ketua-pasukan|pentadbir|sekretariat')
                <div class="row mt-3">
                    <div class="col text-center">
                        <button class="btn btn-primary" type="submit" onclick="printJS('printJS-form', 'html')">Muat Turun</button>
                    </div>
                </div>
                @endrole 
                <form action="/projek/{{$projek->id}}/sah-gpss-jalan-rayuan" method="POST" enctype="multipart/form-data">
                    @csrf
                    @role('ketua-pasukan|penolong-ketua-pasukan')
                    @if($projek->status == "Selesai Pengesahan Verifikasi GPSS Jalan")
                        <button class="btn btn-primary" type="submit">Membuat Rayuan GPSS Jalan</button>
                    @endif
                    @endrole
                    {{-- @role('sekretariat')
                    @if ($projek->status == "Dalam Pengesahan Skor Rekabentuk GPSS Jalan")
                        <button class="btn btn-primary" type="submit">Sah</button>
                    @elseif ($projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Jalan")
                    <button class="btn btn-primary" type="submit">Sah</button>
                    @elseif ($projek->status == "Proses Jana Keputusan Rekabentuk GPSS Jalan")
                    <div class="col text-center">
                        <button class="btn btn-primary">Jana Keputusan</button>
                    </div>
                    @elseif ($projek->status == "Proses Jana Keputusan Verifikasi GPSS Jalan")
                    <div class="col text-center">
                        <button class="btn btn-primary">Jana Keputusan</button>
                    </div>
                    @endif
                    @endrole --}}
                    {{-- @role('sekretariat')
                    @if ($projek->status == "Proses Rayuan GPSS Jalan")
                        <button class="btn btn-primary" type="submit">Sahkan Rayuan GPSS Jalan</button>
                    @endif
                    @endrole --}}
                </form>
            </div>
        </div>
    </div>  

    @if($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Jalan" ||
    $projek->status == "Dalam Pengesahan Skor Rekabentuk GPSS Jalan" ||
    $projek->status == "Selesai Pengesahan Rekabentuk GPSS Jalan" ||
    $projek->status == "Proses Jana Keputusan Rekabentuk GPSS Jalan" ||
    $projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Jalan" ||
    $projek->status == "Proses Pengisian Skor Verifikasi GPSS Jalan" ||
    $projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Jalan" ||
    $projek->status == "Proses Jana Keputusan Verifikasi GPSS Jalan" ||
    $projek->status == "Selesai Jana Keputusan Verifikasi GPSS Jalan" ||
    $projek->status == "Selesai Pengesahan Jana Sijil Verifikasi GPSS Jalan")   
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
                            @role('sekretariat')
                            <div class="col-7 mb-2">
                                <select class="form-select" name="role_id">
                                    <option value=3 selected>Ketua Pasukan</option>
                                    <option value=4>Penolong Ketua Pasukan</option>
                                </select>
                            </div>
                            @endrole
                            @role('ketua-pasukan|penolong-ketua-pasukan')
                            <div class="col-7 mb-2">
                                <select class="form-select" name="role_id">
                                    <option value=12 selected>Ketua Pemudah Cara</option>
                                    <option value=6>Pemudah Cara</option>
                                    <option value=8>Ketua Penilai</option>
                                    <option value=7>Penilai</option>
                                </select>
                            </div>
                            @endrole
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
                    <h2 class="mb-3">Senarai Pelantikan</h2>
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
                                <td style="text-align: center; vertical-align: middle;">{{ $lantikan->role->display_name }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        @endif
    @endif

    @if (!$lantikans->isEmpty())
    @if($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Jalan" ||
    $projek->status == "Dalam Pengesahan Skor Rekabentuk GPSS Jalan" ||
    $projek->status == "Selesai Pengesahan Rekabentuk GPSS Jalan" ||
    $projek->status == "Proses Jana Keputusan Rekabentuk GPSS Jalan" ||
    $projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Jalan" ||
    $projek->status == "Proses Pengisian Skor Verifikasi GPSS Jalan" ||
    $projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Jalan" ||
    $projek->status == "Proses Jana Keputusan Verifikasi GPSS Jalan" ||
    $projek->status == "Selesai Jana Keputusan Verifikasi GPSS Jalan" ||
    $projek->status == "Selesai Pengesahan Jana Sijil Verifikasi GPSS Jalan" ||
    $projek->status == "Selesai Pengesahan Verifikasi GPSS Jalan" ||
    $projek->status == "Proses Rayuan GPSS Jalan" ||
    $projek->status == "Selesai Pengesahan Rayuan GPSS Jalan" ||
    $projek->status == "Selesai Rayuan GPSS Jalan")
        <div class="tab mt-6">
            <ul class="nav nav-tabs" role="tablist">
                @if($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Jalan")
                @role('pemudah-cara|ketua-pemudah-cara')
                <li class="nav-item"><a class="nav-link active" href="#tab-1" data-bs-toggle="tab" role="tab">Rekabentuk</a></li>
                @endrole
                @endif
                @if($projek->status == "Proses Pengisian Skor Verifikasi GPSS Bangunan")
                @role('pemudah-cara|ketua-pemudah-cara|ketua-penilai|penilai') 
                <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab">Verifikasi</a></li>
                @endrole
                @endif
                @role('ketua-pasukan|penolong-ketua-pasukan')
                @if($projek->status == "Proses Rayuan GPSS Jalan")
                <li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab" role="tab">Rayuan</a></li>
                @endif
                @endrole
                @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                <li class="nav-item"><a class="nav-link" href="#tab-4" data-bs-toggle="tab" role="tab">Sijil</a></li>
                @endrole
                <li class="nav-item"><a class="nav-link" href="#tab-5" data-bs-toggle="tab" role="tab">Skor Kad</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-6" data-bs-toggle="tab" role="tab">Rumusan Skor Kad</a></li>
                @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                @if($projek->status == "Proses Rayuan GPSS Jalan" || $projek->status == "Selesai Rayuan GPSS Jalan")
                <li class="nav-item"><a class="nav-link" href="#tab-7" data-bs-toggle="tab" role="tab">Skor Kad Rayuan</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-8" data-bs-toggle="tab" role="tab">Rumusan Skor Kad Rayuan</a></li>
                @endif
                @endrole
            </ul>
            <div class="tab-content">
                <!--REKABENTUK GPSS JALAN-->
                @if($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Jalan")
                @role('pemudah-cara|ketua-pemudah-cara')
                <div class="tab-pane active" id="tab-1" role="tabpanel">
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
                                                name="gpss_kriteria" onchange="kriteriaRekabentuk()" required>
                                                @foreach ($rekabentuk_kriterias as $akriteria)
                                                    <option value="{{ $akriteria->id }}">{{ $akriteria->elemen }} >
                                                        {{ $akriteria->komponen }} > {{$akriteria->produk}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    {{-- <div class="col-5 mb-2">
                                        <label class="col-form-label">Maximum Marks:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <div class="col-7 mb-2" id="infoKriteriaRekabentukDipilih"></div>
                                    </div> --}}
                                    <div class="col-5 mb-2">
                                        <label class="col-form-label">Point Allocated:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <select class="form-select form-control" name="point_allocated" aria-label="Default select example">
                                            <option selected>Sila Pilih</option>
                                            <option value="0">0</option>
                                            <option value="2">2</option>
                                        </select>                                
                                    </div>
                                    <div class="col-5 mb-2">
                                        <label class="col-form-label">Point Requested (Design):</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input name="point_req_design" type="number" maxlength="1" min="0" max="2" oninput="this.value=this.value.replace(/[^0-9]/g,'');" />
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
                @endrole
                @endif

                <!--VERIFIKASI GPSS JALAN-->
                @if($projek->status == "Proses Pengisian Skor Verifikasi GPSS Bangunan")
                @role('pemudah-cara|ketua-pemudah-cara|penilai|ketua-penilai')
                <div class="tab-pane" id="tab-2" role="tabpanel">
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
                                                name="gpss_kriteria" onchange="kriteriaVerifikasi()" required>
                                                @foreach ($verifikasi_kriterias as $akriteria)
                                                    <option value="{{ $akriteria->id }}">{{ $akriteria->elemen }} >
                                                        {{ $akriteria->komponen }} > {{$akriteria->produk}}</option>
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
                                    @role('pemudah-cara|ketua-pemudah-cara')
                                    <div class="col-5 mb-2">
                                        <label class="col-form-label">Point Requested (Construction):</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input name="point_req_construction" type="number" maxlength="1" min="0" max="2" oninput="this.value=this.value.replace(/[^0-9]/g,'');" />
                                    </div> 
                                    @endrole
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
                @endrole 
                @endif

                <!--RAYUAN GPSS JALAN-->
                @role('ketua-pasukan|penolong-ketua-pasukan')
                @if($projek->status == "Proses Rayuan GPSS Jalan")
                <div class="tab-pane" id="tab-3" role="tabpanel">
                    <div class="card mt-3">
                        <div class="card-body"> 
                            <form action="/projek/{{ $projek->id }}/markah-gpss-rayuan" method="POST" enctype="multipart/form-data">
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
                                                    <option value="{{ $akriteria->id }}">{{ $akriteria->elemen }} >
                                                        {{ $akriteria->komponen }} > {{$akriteria->produk}}</option>
                                                @endforeach
                                            </select>
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
                                    {{-- <div class="col-5 mb-2">
                                        <label class="col-form-label">Remarks:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <textarea class="form-control" rows="3" name="remarks" type="text" placeholder="Remarks"></textarea>
                                    </div> --}}
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
                @endif
                @endrole
                
                <!--SIJIL GPSS JALAN-->
                @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                <div class="tab-pane" id="tab-4" role="tabpanel">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4>SIJIL GPSS JALAN</h4>
                            @role('sekretariat')
                            @if($projek->status == "Proses Jana Keputusan Rekabentuk GPSS Jalan")
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        <a class="btn btn-primary" href="/projek/{{ $projek->id }}/sijil-gpss-jalan">Lihat Sijil</a>
                                    </div>
                                </div>
                            @elseif($projek->status == "Proses Jana Keputusan Verifikasi GPSS Jalan")
                            <div class="row mt-3">
                                <div class="col text-center">
                                    <a class="btn btn-primary" href="/projek/{{ $projek->id }}/sijil-gpss-jalan">Lihat Sijil</a>
                                </div>
                            </div>
                            @elseif($projek->status == "Proses Jana Keputusan Rayuan GPSS Jalan")
                            <div class="row mt-3">
                                <div class="col text-center">
                                    <a class="btn btn-primary" href="/projek/{{ $projek->id }}/sijil-gpss-jalan">Lihat Sijil</a>
                                </div>
                            </div>
                            @endif
                            @endrole
                            @role('ketua-pasukan|penolong-ketua-pasukan')
                            @if($projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Jalan" ||
                            $projek->status == "Proses Pengisian Skor Verifikasi GPSS Jalan" ||
                            $projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Jalan" ||
                            $projek->status == "Proses Jana Keputusan Verifikasi GPSS Jalan" ||
                            $projek->status == "Selesai Jana Keputusan Verifikasi GPSS Jalan" ||
                            $projek->status == "Selesai Pengesahan Jana Sijil Verifikasi GPSS Jalan")
                            <h3>Peringkat Rekabentuk</h3>
                            <div class="row mt-3">
                                <div class="col text-center">
                                    <a class="btn btn-primary" href="/projek/{{ $projek->id }}/sijil-gpss-jalan">Muat Turun</a>
                                </div>
                            </div>
                            @elseif($projek->status == "Selesai Jana Keputusan Verifikasi GPSS Jalan" ||
                            $projek->status == "Selesai Pengesahan Jana Sijil Verifikasi GPSS Jalan")
                            <h3>Peringkat Verifikasi</h3>
                            <div class="row mt-3">
                                <div class="col text-center">
                                    <a class="btn btn-primary" href="/projek/{{ $projek->id }}/sijil-gpss-jalan">Muat Turun</a>
                                </div>
                            </div>
                            @elseif($projek->status == "Selesai Jana Keputusan Rayuan GPSS Jalan" || $projek->status == "Selesai Rayuan GPSS Jalan")
                            <h3>Peringkat Rayuan</h3>
                            <div class="row mt-3">
                                <div class="col text-center">
                                    <a class="btn btn-primary" href="/projek/{{ $projek->id }}/sijil-gpss-jalan">Muat Turun</a>
                                </div>
                            </div>
                            @endif
                            @endrole
                        </div>
                    </div>
                </div>
                @endrole

                <!--SKOR KAD GPSS JALAN-->
                <div class="tab-pane" id="tab-5" role="tabpanel">
                    <div class="card mt-3">
                        <div class="card-body" id="skor-kad">
                            <h4 class="mb-3">SKOR KAD GPSS JALAN</h4>
                            <div class="table-responsive scrollbar">
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
                            </div>
                            <form action="/projek/{{$projek->id}}/sah-gpss-jalan" method="POST" enctype="multipart/form-data">
                                @csrf
                                @role('sekretariat')
                                @if ($projek->status == "Dalam Pengesahan Skor Rekabentuk GPSS Jalan")
                                    <button class="btn btn-primary" type="submit">Sah</button>
                                @elseif ($projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Jalan")
                                    <button class="btn btn-primary" type="submit">Sah</button>
                                @endif
                                @endrole
                            </form>
                            @role('sekretariat')
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        <button class="btn btn-primary">Jana Skor Kad</button>
                                    </div>
                                </div>
                            @endrole
                            @role('ketua-pemudah-cara|pemudah-cara|ketua-penilai|penilai')
                            <div class="col text-center">
                                @if($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Jalan")
                                <a href="/projek/{{ $projek->id }}/pengesahan-penilaian" class="btn btn-primary" name="hantar_skorkad" value="hantar" type="submit">Hantar</a>
                                @elseif($projek->status == "Proses Pengisian Skor Verifikasi Permarkahan GPSS Jalan")
                                <a href="/projek/{{ $projek->id }}/pengesahan-penilaian" class="btn btn-primary" name="hantar_skorkad" value="hantar" type="submit">Hantar</a>
                                @endif
                            </div>
                            @endrole
                            @role('ketua-pasukan|penolong-ketua-pasukan')
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        <button class="btn btn-primary" onclick="printJS('skor-kad', 'html')">Muat Turun</button>
                                    </div>
                                </div>
                            @endrole
                        </div>
                    </div>
                </div>

                <!--RUMUSAN SKOR KAD-->
                <div class="tab-pane" id="tab-6" role="tabpanel">
                    <div class="card mt-3">
                        <div class="card-body" id="rumusan_skor_kad">
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
                                                <th colspan="3">Percentage of Green Product Scoring Score %</th>
                                            </tr>
                                            <tr>
                                                <th>Design stage</th>
                                                <th>Construction stage</th>
                                                <th>Construction Stage</th>
                                                <th>Point Requested Design</th>
                                                <th>Point Requested Construction</th>
                                                <th>Point Awarded</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-black">
                                            <tr>
                                                <th>1</th>
                                                <th>Architectural (Aw)</th>
                                                <th>232</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0.00</th> 
                                                <th>0.00</th>
                                            </tr>

                                            <tr>
                                                <th>2</th>
                                                <th>Mechanical (Mw)</th>
                                                <th>34</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0.00</th> 
                                                <th>0.00</th>
                                            </tr>

                                            <tr>
                                                <th>3</th>
                                                <th>Electrical (Ew)</th>
                                                <th>110</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0.00</th>
                                                <th>0.00</th>
                                            </tr>

                                            <tr>
                                                <th>4</th>
                                                <th>Civil & Structural (Cw)</th>
                                                <th>124</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th> 
                                                <th>0</th>
                                                <th>0.00</th> 
                                                <th>0.00</th>
                                            </tr>

                                            <tr>
                                                <th>5</th>
                                                <th>Road & Geotechnial (Rw)</th>
                                                <th>98</th>
                                                <th>{{$rw_pa}}</th>
                                                <th>{{$rw_ds}}</th>
                                                <th>{{$rw_cs}}</th>
                                                <th>{{$rw_pad}}</th>
                                                <th>0.33</th>
                                                <th>{{number_format($peratus_rw_ds,2,".",",")}}</th>
                                                <th>{{number_format($peratus_rw_cs,2,".",",")}}</th>
                                                <th>{{number_format($peratus_rw_pad,2,".",",")}}</th>
                                            </tr>

                                            <tr>
                                                <th>6</th>
                                                <th>Structural(Bridge) (Sw)</th>
                                                <th>12</th>
                                                <th>{{$sw_pa}}</th>
                                                <th>{{$sw_ds}}</th>
                                                <th>{{$sw_cs}}</th>
                                                <th>{{$sw_pad}}</th>
                                                <th>0.33</th>
                                                <th>{{number_format($peratus_sw_ds,2,".",",")}}</th>
                                                <th>{{number_format($peratus_sw_cs,2,".",",")}}</th>
                                                <th>{{number_format($peratus_sw_pad,2,".",",")}}</th>
                                            </tr>

                                            <tr>
                                                <th colspan="2">Total points</th>
                                                <th>610</th>
                                                <th>{{$total_pa}}</th>
                                                <th>{{$total_ds}}</th>
                                                <th>{{$total_cs}}</th>
                                                <th>{{$total_pad}}</th>
                                                <th>0.66</th>
                                                <th>{{number_format($total_peratus_road_ds,2,".",",")}}</th>
                                                <th>{{number_format($total_peratus_road_cs,2,".",",")}}</th>
                                                <th>{{number_format($total_peratus_road_pad,2,".",",")}}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>                                
                            </div>
                            <table class="table table-bordered line-table text-center" style="width: 100%">
                                <thead class="text-white bg-orange-jkr">
                                    <tr>
                                        <th>SUMMARY</th>
                                        <th rowspan="2">Point Requested Design</th>
                                        <th rowspan="2">Point Requested Construction</th>
                                        <th rowspan="2">Point Awarded</th>
                                    </tr>
                                    <tr>
                                        <th>PERCENTAGE OF GPSS SCORE %</th>
                                    </tr>
                                </thead>
                                <tbody class="text-black">
                                    <tr>
                                        <th>GPSS Star (Bangunan) </th>
                                        <th>
                                            <span class="star">0&#160;&starf;</span>
                                        </th>
                                        <th>
                                            <span class="star">0&#160;&starf;</span>
                                        </th>
                                        <th>
                                            <span class="star">0&#160;&starf;</span>
                                        </th>
                                    </tr>
            
                                    <tr>
                                        <th>GPSS Star (Jalan)</th>
                                        <th>
                                            <span class="star">
                                                @if ($total_peratus_road_ds >= 80)
                                                    5&#160;&starf; &starf; &starf; &starf; &starf;
                                                @elseif ($total_peratus_road_ds >= 70 && $total_peratus_road_ds < 79)
                                                    4&#160;&starf; &starf; &starf; &starf;
                                                @elseif ($total_peratus_road_ds >= 60 && $total_peratus_road_ds < 69)
                                                    3&#160;&starf; &starf; &starf;
                                                @elseif ($total_peratus_road_ds >= 50 && $total_peratus_road_ds < 59)
                                                    2&#160;&starf; &starf; 
                                                @elseif ($total_peratus_road_ds >= 40 && $total_peratus_road_ds <49)
                                                    1&#160;&starf;
                                                @elseif ($total_peratus_road_ds <39)
                                                    0&#160;&starf;                                                                                            
                                                @endif
                                            </span>
                                        </th>
                                        <th>
                                            <span class="star">
                                                @if ($total_peratus_road_cs >= 80)
                                                    5&#160;&starf; &starf; &starf; &starf; &starf;
                                                @elseif ($total_peratus_road_cs >= 70 && $total_peratus_road_cs < 79)
                                                    4&#160;&starf; &starf; &starf; &starf;
                                                @elseif ($total_peratus_road_cs >= 60 && $total_peratus_road_cs < 69)
                                                    3&#160;&starf; &starf; &starf;
                                                @elseif ($total_peratus_road_cs >= 50 && $total_peratus_road_cs < 59)
                                                    2&#160;&starf; &starf; 
                                                @elseif ($total_peratus_road_cs >= 40 && $total_peratus_road_cs <49)
                                                    1&#160;&starf;
                                                @elseif ($total_peratus_road_cs <39)
                                                    0&#160;&starf;                                                                                            
                                                @endif
                                            </span>
                                        </th>
                                        <th>
                                            <span class="star">
                                                @if ($total_peratus_road_pad >= 80)
                                                    5&#160;&starf; &starf; &starf; &starf; &starf;
                                                @elseif ($total_peratus_road_pad >= 70 && $total_peratus_road_pad < 79)
                                                    4&#160;&starf; &starf; &starf; &starf;
                                                @elseif ($total_peratus_road_pad >= 60 && $total_peratus_road_pad < 69)
                                                    3&#160;&starf; &starf; &starf;
                                                @elseif ($total_peratus_road_pad >= 50 && $total_peratus_road_pad < 59)
                                                    2&#160;&starf; &starf; 
                                                @elseif ($total_peratus_road_pad >= 40 && $total_peratus_road_pad <49)
                                                    1&#160;&starf;
                                                @elseif ($total_peratus_road_pad <39)
                                                    0&#160;&starf;                                                                                            
                                                @endif
                                            </span>
                                        </th>
                                    </tr>
                                
                                    <tr>
                                    <th>MyCREST</th>
                                    <th>
                                        <span>
                                            @if ($total_peratus_crest_ds >= 80)
                                                    3&#160;Points
                                                @elseif ($total_peratus_crest_ds >= 70 && $total_peratus_crest_ds < 79)
                                                    3&#160;Points
                                                @elseif ($total_peratus_crest_ds >= 50 && $total_peratus_crest_ds < 69)
                                                    2&#160;Points
                                                @elseif ($total_peratus_crest_ds >= 30 && $total_peratus_crest_ds < 49)
                                                    2&#160;Points 
                                                @elseif ($total_peratus_crest_ds >= 10 && $total_peratus_crest_ds <29)
                                                    1&#160;Points  
                                                @elseif ($total_peratus_crest_ds <10)
                                                    0&#160;Point                                                                                          
                                            @endif
                                        </span>
                                    </th>
                                    <th>
                                        <span>
                                            @if ($total_peratus_crest_cs >= 80)
                                                    3&#160;Points
                                                @elseif ($total_peratus_crest_cs >= 70 && $total_peratus_crest_cs < 79)
                                                    3&#160;Points
                                                @elseif ($total_peratus_crest_cs >= 50 && $total_peratus_crest_cs < 69)
                                                    2&#160;Points
                                                @elseif ($total_peratus_crest_cs >= 30 && $total_peratus_crest_cs < 49)
                                                    2&#160;Points 
                                                @elseif ($total_peratus_crest_cs >= 10 && $total_peratus_crest_cs <29)
                                                    1&#160;Points  
                                                @elseif ($total_peratus_crest_cs <10)
                                                    0&#160;Point                                                                                          
                                            @endif
                                        </span>
                                    </th>
                                    <th>
                                        <span>
                                            @if ($total_peratus_crest_pad >= 80)
                                                    3&#160;Points
                                                @elseif ($total_peratus_crest_pad >= 70 && $total_peratus_crest_pad < 79)
                                                    3&#160;Points
                                                @elseif ($total_peratus_crest_pad >= 50 && $total_peratus_crest_pad < 69)
                                                    2&#160;Points
                                                @elseif ($total_peratus_crest_pad >= 30 && $total_peratus_crest_pad < 49)
                                                    2&#160;Points 
                                                @elseif ($total_peratus_crest_pad >= 10 && $total_peratus_crest_pad <29)
                                                    1&#160;Points  
                                                @elseif ($total_peratus_crest_pad <10)
                                                    0&#160;Point                                                                                          
                                            @endif
                                        </span>
                                    </th>
                                    </tr>
                                </tbody> 
                            </table>
                            @role('sekretariat')
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        <button class="btn btn-primary">Jana Keputusan</button>
                                    </div>
                                </div>
                            @endrole
                            @role('ketua-pasukan|penolong-ketua-pasukan')
                            <div class="row mt-3">
                                <div class="col text-center">
                                    <button class="btn btn-primary" onclick="printJS('rumusan_skor_kad', 'html')">Muat Turun</button>
                                </div>
                            </div>
                            @endrole
                        </div>
                    </div>
                </div>

                <!--RUMUSAN SKOR KAD RAYUAN-->
                @if($projek->status == "Proses Rayuan GPSS Jalan" || $projek->status == "Dalam Pengesahan Rayuan GPSS Jalan" 
                || $projek->status == "Selesai Pengesahan Rayuan GPSS Jalan" || $projek->status == "Selesai Rayuan GPSS Jalan")
                @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                <div class="tab-pane" id="tab-8" role="tabpanel">
                    <form action="#" id="rumusan-skor-kad-rayuan">
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
                                                    <th colspan="3">Percentage of Green Product Scoring Score %</th>
                                                </tr>
                                                <tr>
                                                    <th>Design stage</th>
                                                    <th>Construction stage</th>
                                                    <th>Construction Stage</th>
                                                    <th>Point Requested Design</th>
                                                    <th>Point Requested Construction</th>
                                                    <th>Point Awarded</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-black">
                                                <tr>
                                                    <th>1</th>
                                                    <th>Architectural (Aw)</th>
                                                    <th>232</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0.00</th> 
                                                    <th>0.00</th>
                                                </tr>

                                                <tr>
                                                    <th>2</th>
                                                    <th>Mechanical (Mw)</th>
                                                    <th>34</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0.00</th> 
                                                    <th>0.00</th>
                                                </tr>

                                                <tr>
                                                    <th>3</th>
                                                    <th>Electrical (Ew)</th>
                                                    <th>110</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0.00</th>
                                                    <th>0.00</th>
                                                </tr>

                                                <tr>
                                                    <th>4</th>
                                                    <th>Civil & Structural (Cw)</th>
                                                    <th>124</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th> 
                                                    <th>0</th>
                                                    <th>0.00</th> 
                                                    <th>0.00</th>
                                                </tr>

                                                <tr>
                                                    <th>5</th>
                                                    <th>Road & Geotechnial (Rw)</th>
                                                    <th>98</th>
                                                    <th>{{$rw_pa_r}}</th>
                                                    <th>{{$rw_ds_r}}</th>
                                                    <th>{{$rw_cs_r}}</th>
                                                    <th>{{$rw_pad_r}}</th>
                                                    <th>0.33</th>
                                                    <th>{{number_format($peratus_rw_ds_r,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_rw_cs_r,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_rw_pad_r,2,".",",")}}</th>
                                                </tr>

                                                <tr>
                                                    <th>6</th>
                                                    <th>Structural(Bridge) (Sw)</th>
                                                    <th>12</th>
                                                    <th>{{$sw_pa_r}}</th>
                                                    <th>{{$sw_ds_r}}</th>
                                                    <th>{{$sw_cs_r}}</th>
                                                    <th>{{$sw_pad_r}}</th>
                                                    <th>0.33</th>
                                                    <th>{{number_format($peratus_sw_ds_r,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_sw_cs_r,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_sw_pad_r,2,".",",")}}</th>
                                                </tr>

                                                <tr>
                                                    <th colspan="2">Total points</th>
                                                    <th>610</th>
                                                    <th>{{$total_pa_r}}</th>
                                                    <th>{{$total_ds_r}}</th>
                                                    <th>{{$total_cs_r}}</th>
                                                    <th>{{$total_pad_r}}</th>
                                                    <th>0.66</th>
                                                    <th>{{number_format($total_peratus_road_ds_r,2,".",",")}}</th>
                                                    <th>{{number_format($total_peratus_road_cs_r,2,".",",")}}</th>
                                                    <th>{{number_format($total_peratus_road_pad_r,2,".",",")}}</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>                                
                                </div>
                                <table class="table table-bordered line-table text-center" style="width: 100%">
                                    <thead class="text-white bg-orange-jkr">
                                        <tr>
                                            <th>SUMMARY</th>
                                            <th rowspan="2">Point Requested Design</th>
                                            <th rowspan="2">Point Requested Construction</th>
                                            <th rowspan="2">Point Awarded</th>
                                        </tr>
                                        <tr>
                                            <th>PERCENTAGE OF GPSS SCORE %</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-black">
                                        <tr>
                                            <th>GPSS Star (Bangunan) </th>
                                            <th>
                                                <span class="star">0&#160;&starf;</span>
                                            </th>
                                            <th>
                                                <span class="star">0&#160;&starf;</span>
                                            </th>
                                            <th>
                                                <span class="star">0&#160;&starf;</span>
                                            </th>
                                        </tr>
                
                                        <tr>
                                            <th>GPSS Star (Jalan)</th>
                                            <th>
                                                <span class="star">
                                                    @if ($total_peratus_road_ds_r >= 80)
                                                        5&#160;&starf; &starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_road_ds_r >= 70 && $total_peratus_road_ds_r < 79)
                                                        4&#160;&starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_road_ds_r >= 60 && $total_peratus_road_ds_r < 69)
                                                        3&#160;&starf; &starf; &starf;
                                                    @elseif ($total_peratus_road_ds_r >= 50 && $total_peratus_road_ds_r < 59)
                                                        2&#160;&starf; &starf; 
                                                    @elseif ($total_peratus_road_ds_r >= 40 && $total_peratus_road_ds_r <49)
                                                        1&#160;&starf;
                                                    @elseif ($total_peratus_road_ds_r <39)
                                                        0&#160;&starf;                                                                                            
                                                    @endif
                                                </span>
                                            </th>
                                            <th>
                                                <span class="star">
                                                    @if ($total_peratus_road_cs_r >= 80)
                                                        5&#160;&starf; &starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_road_cs_r >= 70 && $total_peratus_road_cs_r < 79)
                                                        4&#160;&starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_road_cs_r >= 60 && $total_peratus_road_cs_r < 69)
                                                        3&#160;&starf; &starf; &starf;
                                                    @elseif ($total_peratus_road_cs_r >= 50 && $total_peratus_road_cs_r < 59)
                                                        2&#160;&starf; &starf; 
                                                    @elseif ($total_peratus_road_cs_r >= 40 && $total_peratus_road_cs_r <49)
                                                        1&#160;&starf;
                                                    @elseif ($total_peratus_road_cs_r <39)
                                                        0&#160;&starf;                                                                                            
                                                    @endif
                                                </span>
                                            </th>
                                            <th>
                                                <span class="star">
                                                    @if ($total_peratus_road_pad_r >= 80)
                                                        5&#160;&starf; &starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_road_pad_r >= 70 && $total_peratus_road_pad_r < 79)
                                                        4&#160;&starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_road_pad_r >= 60 && $total_peratus_road_pad_r < 69)
                                                        3&#160;&starf; &starf; &starf;
                                                    @elseif ($total_peratus_road_pad_r >= 50 && $total_peratus_road_pad_r < 59)
                                                        2&#160;&starf; &starf; 
                                                    @elseif ($total_peratus_road_pad_r >= 40 && $total_peratus_road_pad_r <49)
                                                        1&#160;&starf;
                                                    @elseif ($total_peratus_road_pad_r <39)
                                                        0&#160;&starf;                                                                                            
                                                    @endif
                                                </span>
                                            </th>
                                        </tr>
                                    
                                        <tr>
                                        <th>MyCREST</th>
                                        <th>
                                            <span>
                                                @if ($total_peratus_crest_ds_r >= 80)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_ds_r >= 70 && $total_peratus_crest_ds_r < 79)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_ds_r >= 50 && $total_peratus_crest_ds_r < 69)
                                                        2&#160;Points
                                                    @elseif ($total_peratus_crest_ds_r >= 30 && $total_peratus_crest_ds_r < 49)
                                                        2&#160;Points 
                                                    @elseif ($total_peratus_crest_ds_r >= 10 && $total_peratus_crest_ds_r <29)
                                                        1&#160;Points  
                                                    @elseif ($total_peratus_crest_ds_r <10)
                                                        0&#160;Point                                                                                          
                                                @endif
                                            </span>
                                        </th>
                                        <th>
                                            <span>
                                                @if ($total_peratus_crest_cs_r >= 80)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_cs_r >= 70 && $total_peratus_crest_cs_r < 79)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_cs_r >= 50 && $total_peratus_crest_cs_r < 69)
                                                        2&#160;Points
                                                    @elseif ($total_peratus_crest_cs_r >= 30 && $total_peratus_crest_cs_r < 49)
                                                        2&#160;Points 
                                                    @elseif ($total_peratus_crest_cs_r >= 10 && $total_peratus_crest_cs_r <29)
                                                        1&#160;Points  
                                                    @elseif ($total_peratus_crest_cs_r <10)
                                                        0&#160;Point                                                                                          
                                                @endif
                                            </span>
                                        </th>
                                        <th>
                                            <span>
                                                @if ($total_peratus_crest_pad_r >= 80)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_pad_r >= 70 && $total_peratus_crest_pad_r < 79)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_pad_r >= 50 && $total_peratus_crest_pad_r < 69)
                                                        2&#160;Points
                                                    @elseif ($total_peratus_crest_pad_r >= 30 && $total_peratus_crest_pad_r < 49)
                                                        2&#160;Points 
                                                    @elseif ($total_peratus_crest_pad_r >= 10 && $total_peratus_crest_pad_r <29)
                                                        1&#160;Points  
                                                    @elseif ($total_peratus_crest_pad_r <10)
                                                        0&#160;Point                                                                                          
                                                @endif
                                            </span>
                                        </th>
                                        </tr>
                                    </tbody> 
                                </table>
                                @role('sekretariat')
                                    <div class="row mt-3">
                                        <div class="col text-center">
                                            <button class="btn btn-primary">Jana Keputusan</button>
                                        </div>
                                    </div>
                                @endrole
                            </div>
                        </div>
                        @role('ketua-pasukan|penolong-ketua-pasukan')
                            <div class="row mt-3">
                                <div class="col text-center">
                                    <button class="btn btn-primary" onclick="printJS('rumusan-skor-kad-rayuan', 'html')">Muat Turun</button>
                                </div>
                            </div>
                        @endrole
                    </form>
                </div>

                <!--SKOR KAD GPSS JALAN RAYUAN-->
                <div class="tab-pane" id="tab-7" role="tabpanel">
                    <div class="card mt-3">
                        <div class="card-body" id="skor-kad">
                            <h4 class="mb-3">SKOR KAD GPSS JALAN</h4>
                            <div class="table-responsive scrollbar">
                                <table class="table table-bordered line-table text-center skor-gpss-datatable-1" style="width: 100%">
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
                            </div>
                            <form action="/projek/{{$projek->id}}/sah-gpss-jalan-rayuan" method="POST" enctype="multipart/form-data">
                                @csrf
                                @role('sekretariat')
                                @if ($projek->status == "Dalam Pengesahan Skor Rekabentuk GPSS Jalan")
                                    <button class="btn btn-primary" type="submit">Sah</button>
                                @elseif ($projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Jalan")
                                <button class="btn btn-primary" type="submit">Sah</button>
                                @endif
                                {{-- @if ($projek->status == "Proses Jana Keputusan Rekabentuk GPSS Jalan")
                                <div class="col text-center">
                                    <button class="btn btn-primary">Jana Keputusan</button>
                                </div> --}}
                                @endrole
                            </form>
                            @role('ketua-pemudah-cara|pemudah-cara|ketua-penilai|penilai')
                            <div class="col text-center">
                                @if($projek->status == "Proses Rayuan GPSS Jalan")
                                <a href="/projek/{{ $projek->id }}/pengesahan-penilaian" class="btn btn-primary" name="hantar_skorkad" value="hantar" type="submit">Hantar</a>
                                @endif
                            </div>
                            @endrole
                            @role('ketua-pasukan|penolong-ketua-pasukan')
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        <button class="btn btn-primary" onclick="printJS('skor-kad', 'html')">Muat Turun</button>
                                    </div>
                                </div>
                            @endrole
                        </div>
                    </div>
                </div>
                @endrole
                @endif

                
            </div>
        </div>
    @endif
    @endif
</div> <!--Container-->
    

<!--JavaScript-->
<!--Button Simpan TOOLTIPS-->
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
        })
</script>  

<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.css"></script>

<script>
    kriteriaRekabentuk();
    kriteriaVerifikasi();
    kriteriaRayuan();

    function kriteriaRekabentuk() {
        var lols = {!! $rekabentuk_kriterias !!}
        var kriteriaRekabentuk = document.getElementById("kriteriaRekabentukDipilih").value;
        let selectedKriteria = lols.find(el => el.id == kriteriaRekabentuk);
        document.getElementById("infoKriteriaRekabentukDipilih").innerHTML = selectedKriteria.komponen;
    }


    function kriteriaVerifikasi() {
        var lols = {!! $verifikasi_kriterias !!}
        var kriteriaVerifikasi = document.getElementById("kriteriaVerifikasiDipilih").value;
        let selectedKriteria = lols.find(el => el.id == kriteriaVerifikasi);
        document.getElementById("infoKriteriaVerifikasiDipilih").innerHTML = selectedKriteria.komponen;
    }

    function kriteriaRayuan() {
        var lols = {!! $rayuan_kriterias !!}
        var kriteriaRayuan = document.getElementById("kriteriaRayuanDipilih").value;
        let selectedKriteria = lols.find(el => el.id == kriteriaRayuan);
        document.getElementById("infoKriteriaRayuanDipilih").innerHTML = selectedKriteria.komponen;
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
                    data: 'fasa',
                    name: 'fasa'
                },
                {
                    data: 'markah_point_allocated',
                    name: 'markah_point_allocated'
                },
                {
                    data: 'markah_point_req_design',
                    name: 'markah_point_req_design'
                },
                {
                    data: 'markah_point_req_construction',
                    name: 'markah_point_req_construction'
                },
                {
                    data: 'markah_point_awarded',
                    name: 'markah_point_awarded'
                },
                {
                    data: 'remarks_',
                    name: 'remarks_'
                },
                {
                    data: 'dokumen_',
                    name: 'dokumen_'
                },
            ]
        });


    });
</script>

<script type="text/javascript">
    $(function() {

        var idProjek = {!! json_decode($projek->id) !!}
        console.log(idProjek);
        var url = "/projek/" + idProjek;
        var table = $('.skor-gpss-datatable-1').DataTable({
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
                    data: 'fasa',
                    name: 'fasa'
                },
                {
                    data: 'markah_point_allocated_r',
                    name: 'markah_point_allocated_r'
                },
                {
                    data: 'markah_point_req_design_r',
                    name: 'markah_point_req_design_r'
                },
                {
                    data: 'markah_point_req_construction_r',
                    name: 'markah_point_req_construction_r'
                },
                {
                    data: 'markah_point_awarded_r',
                    name: 'markah_point_awarded_r'
                },
                {
                    data: 'remarks_r',
                    name: 'remarks_r'
                },
                {
                    data: 'dokumen_r',
                    name: 'dokumen_r'
                },
            ]
        });


    });
</script>
    

@endsection