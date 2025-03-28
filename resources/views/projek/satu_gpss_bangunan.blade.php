@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="print.css">

@section('content')

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <div class="card">
                <div class="card-body" id="maklumat-projek">
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
                @role('sekretariat|ketua-pasukan|penolong-ketua-pasukan|pentadbir')
                <div class="col mx-3 my-3">
                    @role('sekretariat')
                    <form action="/projek/{{$projek->id}}/sah-gpss-bangunan" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($projek->status == "Menunggu Pengesahan Sekretariat")
                        <div class="col text-center">
                            <button class="btn btn-primary" type="submit">Sah Projek</button>
                        </div>
                        {{-- @elseif ($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Bangunan")
                            <button class="btn btn-primary mx-3 my-3" type="submit">Proses Pengisian Skor Rekabentuk GPSS Bangunan Sudah Diproses</button>
                        @elseif ($projek->status == "Dalam Pengesahan Skor Rekabentuk GPSS Bangunan")
                            <button class="btn btn-primary mx-3 my-3" type="submit">Skor Rekabentuk GPSS Bangunan Sudah Selesai</button>
                        @elseif ($projek->status == "Selesai Pengesahan Rekabentuk GPSS Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Pengesahan Rekabentuk GPSS Bangunan</button>
                        @elseif ($projek->status == "Proses Jana Keputusan Rekabentuk GPSS Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Jana Keputusan Rekabentuk GPSS Bangunan</button>
                        @elseif ($projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Jana Keputusan Rekabentuk GPSS Bangunan</button>
                        @elseif ($projek->status == "Proses Pengisian Skor Verifikasi GPSS Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Proses Pengisian Skor Verifikasi GPSS Bangunan Sudah Diproses</button>
                        @elseif ($projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Dalam Pengesahan Skor Verifikasi GPSS Bangunan</button>
                        @elseif ($projek->status == "Proses Jana Keputusan Verifikasi GPSS Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Dalam Pengesahan Skor Validasi Permarkahan Bangunan</button>
                        @elseif ($projek->status == "Selesai Jana Keputusan Verifikasi GPSS Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Pengesahan Validasi Bangunan</button>
                        @elseif ($projek->status == "Selesai Pengesahan Verifikasi GPSS Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Proses Rayuan Bangunan</button>
                        @elseif ($projek->status == "Proses Rayuan GPSS Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Dalam Pengesahan Rayuan Bangunan</button>
                        @elseif ($projek->status == "Dalam Pengesahan Rayuan GPSS Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Pengesahan Rayuan Bangunan</button>
                        @elseif ($projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Rayuan Bangunan</button> --}}
                        @endif
                    </form>
                    {{-- <form action="/projek/{{$projek->id}}/sah-gpss-rayuan">
                        @if ($projek->status == "Proses Rayuan Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Proses Rayuan Bangunan</button>
                        @elseif ($projek->status == "Dalam Pengesahan Rayuan Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Pengesahan Rayuan Bangunan</button>
                        @elseif ($projek->status == "Selesai Pengesahan Rayuan Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Rayuan Bangunan</button>
                        @endif
                    </form> --}}
                    @endrole 
                    @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat|pentadbir')
                    <div class="row mt-3">
                        <div class="col text-center">
                            <button class="btn btn-primary" type="submit" onclick="printJS('maklumat-projek', 'html')">Muat Turun</button>
                        </div>
                    </div>
                    @endrole
                    <form action="/projek/{{$projek->id}}/sah-gpss-bangunan-rayuan" method="POST" enctype="multipart/form-data">
                        @csrf
                        @role('ketua-pasukan|penolong-ketua-pasukan')
                        @if($projek->status == "Selesai Pengesahan Verifikasi GPSS Bangunan")
                            <button class="btn btn-primary" type="submit">Membuat Rayuan GPSS Bangunan</button>
                        @endif
                        @endrole
                    </form>
                </div>
                @endrole
            </div>
        </div>

        @if($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Bangunan" || 
            $projek->status == "Dalam Pengesahan Skor Rekabentuk GPSS Bangunan" ||
            $projek->status == "Selesai Pengesahan Rekabentuk GPSS Bangunan" ||
            $projek->status == "Proses Jana Keputusan Rekabentuk GPSS Bangunan" ||
            $projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Bangunan" ||
            $projek->status == "Proses Pengisian Skor Verifikasi GPSS Bangunan" ||
            $projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Bangunan" ||
            $projek->status == "Proses Jana Keputusan Verifikasi GPSS Bangunan" ||
            $projek->status == "Selesai Jana Keputusan Verifikasi GPSS Bangunan" ||
            $projek->status == "Selesai Pengesahan Verifikasi GPSS Bangunan" ||
            $projek->status == "Proses Rayuan GPSS Bangunan" ||
            $projek->status == "Dalam Pengesahan Rayuan GPSS Bangunan" ||
            $projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan")
            @role('ketua-pasukan|sekretariat|penolong-ketua-pasukan')
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
                                        <option value=8 selected>Ketua Penilai</option>
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
    </div>

    @if (!$lantikans->isEmpty())
    @if($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Bangunan" || 
        $projek->status == "Dalam Pengesahan Skor Rekabentuk GPSS Bangunan" ||
        $projek->status == "Selesai Pengesahan Rekabentuk GPSS Bangunan" ||
        $projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Bangunan" ||
        $projek->status == "Proses Pengisian Skor Verifikasi GPSS Bangunan" ||
        $projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Bangunan" ||
        $projek->status == "Proses Jana Keputusan Verifikasi GPSS Bangunan" ||
        $projek->status == "Selesai Jana Keputusan Verifikasi GPSS Bangunan" ||
        $projek->status == "Selesai Pengesahan Verifikasi GPSS Bangunan" ||
        $projek->status == "Proses Rayuan GPSS Bangunan" ||
        $projek->status == "Dalam Pengesahan Rayuan GPSS Bangunan" ||
        $projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan"||
        $projek->status == "Selesai Jana Keputusan Rayuan GPSS Bangunan")
            <div class="tab mt-6">
                <ul class="nav nav-tabs" role="tablist" id="myTab">
                    @if($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Bangunan")
                    @role('pemudah-cara|ketua-pemudah-cara')      
                    <li class="nav-item"><a class="nav-link active" href="#tab-1" data-bs-toggle="tab" role="tab">Rekabentuk</a></li>
                    @endrole
                    @endif
                    @if($projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Bangunan" ||
                        $projek->status == "Proses Pengisian Skor Verifikasi GPSS Bangunan")
                    @role('pemudah-cara|ketua-pemudah-cara|ketua-penilai|penilai') 
                    <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab">Verifikasi</a></li>
                    @endrole
                    @endif
                    @if($projek->status == "Proses Rayuan GPSS Bangunan")
                    @role('ketua-pasukan|penolong-ketua-pasukan')
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab-3" data-bs-toggle="tab" role="tab">Rayuan</a>
                    </li>
                    @endrole
                    @endif
                    @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                    <li class="nav-item"><a class="nav-link" href="#tab-4" data-bs-toggle="tab" role="tab">Sijil</a></li>
                    @endrole
                    <li class="nav-item"><a class="nav-link" href="#tab-5" data-bs-toggle="tab" role="tab">Skor Kad</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab-6" data-bs-toggle="tab" role="tab">Rumusan Skor Kad</a></li>
                    @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                    @if($projek->status == "Proses Rayuan GPSS Bangunan" || 
                        $projek->status == "Dalam Pengesahan Rayuan GPSS Bangunan" || 
                        $projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan" || 
                        $projek->status == "Selesai Jana Keputusan Rayuan GPSS Bangunan" || 
                        $projek->status == "Selesai Rayuan GPSS Bangunan")
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-7" data-bs-toggle="tab" role="tab">Skor Kad Rayuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-8" data-bs-toggle="tab" role="tab">Rumusan Skor Kad Rayuan</a>
                    </li> 
                    @endif
                    @endrole
                </ul>
                <div class="tab-content"> 
                    <!--REKABENTUK GPSS BANGUNAN-->
                    @if($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Bangunan")
                    @role('pemudah-cara|ketua-pemudah-cara')
                    <div class="tab-pane active" id="tab-1" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body">
                                <form action="/projek/{{ $projek->id }}/markah-gpss" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="fasa" value="rekabentuk">
                                    <h4 class="mb-3">PENILAIAN REKABENTUK GPSS BANGUNAN</h4>
                                    <div class="row mx-3 mb-2">
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Element > Component > Product:</label>
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
                                            <input name="point_req_design" type="number" maxlength="1" min="0" max="2" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required/>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Remarks:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <textarea class="form-control" rows="3" name="remarks" type="text" placeholder="Remarks" required></textarea>
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

                    <!--VERIFIKASI GPSS BANGUNAN-->
                    @if($projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Bangunan" ||
                        $projek->status == "Proses Pengisian Skor Verifikasi GPSS Bangunan")
                    @role('pemudah-cara|ketua-pemudah-cara|penilai|ketua-penilai')
                    <div class="tab-pane" id="tab-2" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body">
                                @if($projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Bangunan")
                                <form action="/projek/{{$projek->id}}/sah-gpss-bangunan" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @role('ketua-pemudah-cara|pemudah-cara|ketua-penilai|penilai')
                                        <div class="col text-center">
                                            <button class="btn btn-primary" type="submit">Isi Skor Kad Verifikasi</button>
                                        </div>
                                    @endrole
                                </form>
                                @endif
                                @if($projek->status == "Proses Pengisian Skor Verifikasi GPSS Bangunan")
                                    <h4 class="mb-3">VERIFIKASI PERMARKAHAN GPSS BANGUNAN</h4>
                                    <form action="/projek/{{ $projek->id }}/markah-gpss" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="fasa" value="verifikasi">
                                        <div class="row mx-3 mb-2">
                                            <div class="col-5 mb-2">
                                                <label class="col-form-label">Element > Component > Product:</label>
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
                                            @role('pemudah-cara|ketua-pemudah-cara')
                                            <div class="col-5 mb-2">
                                                <label class="col-form-label">Point Requested (Construction):</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                <input name="point_req_construction" type="number" maxlength="1" min="0" max="2" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required/>
                                                {{-- <input class="form-control" name="markah" type="number" min="0" max="2"/> --}}
                                            </div>
                                            @endrole 
                                            <div class="col-5 mb-2">
                                                <label class="col-form-label">Remarks:</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                <textarea class="form-control" rows="3" name="remarks" type="text" placeholder="Remarks" required></textarea>
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
                                @endif
                            </div>
                        </div>
                    </div> 
                    @endrole
                    @endif

                    <!--RAYUAN GPSS BANGUNAN-->
                    @role('ketua-pasukan|penolong-ketua-pasukan')
                    @if($projek->status == "Proses Rayuan GPSS Bangunan")
                    <div class="tab-pane" id="tab-3" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body"> 
                                <form action="/projek/{{ $projek->id }}/markah-gpss-rayuan" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="mb-3">RAYUAN</h4>
                                    <div class="row mx-3 mb-2">
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Element > Component > Product:</label>
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
                                            <select class="form-select form-control" name="point_allocated" aria-label="Default select example">
                                                <option selected>Sila Pilih</option>
                                                <option value="0">0</option>
                                                <option value="2">2</option>
                                            </select>
                                            {{-- <input class="form-control" name="markah" type="number"/> --}}
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Point Requested (Design):</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input type="hidden" name="fasa" value="verifikasi">
                                            <input name="point_req_design" type="number" maxlength="1" min="0" max="2" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required/>
                                            {{-- <input class="form-control" name="markah" type="number"/> --}}
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Point Requested (Construction):</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input name="point_req_construction" type="number" maxlength="1" min="0" max="2" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required/>
                                            {{-- <input class="form-control" name="markah" type="number" min="0" max="2"/> --}}
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
                                            <textarea class="form-control" rows="3" name="remarks" type="text" placeholder="Remarks" required></textarea>
                                        </div> --}}
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Comment on Appeal:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <textarea class="form-control" rows="3" name="comment_on_appeal" type="text" placeholder="Comment on Appeal" required></textarea>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Upload File:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" type="file" name="dokumen1" required>
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

                    <!--SIJIL GPSS BANGUNAN-->
                    @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                    <div class="tab-pane" id="tab-4" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h4>SIJIL GPSS BANGUNAN</h4>
                                {{-- @role('sekretariat')
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        <a class="btn btn-primary" href="/projek/{{ $projek->id }}/sijil-gpss-bangunan">Jana</a>
                                    </div>
                                </div>
                                @endrole --}}
                                @role('ketua-pasukan|penolong-ketua-pasukan|pentadbir')
                                @if($projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Bangunan" ||
                                    $projek->status == "Proses Pengisian Skor Verifikasi GPSS Bangunan" ||
                                    $projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Bangunan" ||
                                    $projek->status == "Selesai Pengesahan Verifikasi GPSS Bangunan" ||
                                    $projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Bangunan" ||
                                    $projek->status == "Selesai Jana Keputusan Verifikasi GPSS Bangunan" ||
                                    $projek->status == "Proses Rayuan GPSS Bangunan" ||
                                    $projek->status == "Dalam Pengesahan Rayuan GPSS Bangunan" ||
                                    $projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan" ||
                                    $projek->status == "Selesai Jana Keputusan Rayuan GPSS Bangunan")
                                    <div class="col text-center">
                                        <h3>Peringkat Rekabentuk</h3>
                                        <a class="btn btn-primary" href="/projek/{{ $projek->id }}/sijil-gpss-bangunan-rekabentuk">Muat Turun</a>
                                    </div>
                                @endif
                                @if($projek->status == "Selesai Jana Keputusan Verifikasi GPSS Bangunan" ||
                                    $projek->status == "Proses Rayuan GPSS Bangunan" ||
                                    $projek->status == "Dalam Pengesahan Rayuan GPSS Bangunan" ||
                                    $projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan" ||
                                    $projek->status == "Selesai Jana Keputusan Rayuan GPSS Bangunan")
                                    <div class="col text-center">
                                        <h3>Peringkat Verifikasi</h3>
                                        <a class="btn btn-primary" href="/projek/{{ $projek->id }}/sijil-gpss-bangunan-verifikasi">Muat Turun</a>
                                    </div>
                                @endif
                                @if($projek->status == "Selesai Jana Keputusan Rayuan GPSS Bangunan")
                                    <div class="col text-center">
                                        <h3>Peringkat Rayuan</h3>
                                        <a class="btn btn-primary" href="/projek/{{ $projek->id }}/sijil-gpss-bangunan-rayuan">Muat Turun</a>
                                    </div>
                                @endif
                                @endrole
                                @role('sekretariat')
                                @if($projek->status == "Selesai Pengesahan Rekabentuk GPSS Bangunan" ||
                                    $projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Bangunan" ||
                                    $projek->status == "Proses Pengisian Skor Verifikasi GPSS Bangunan" ||
                                    $projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Bangunan" ||
                                    $projek->status == "Selesai Pengesahan Verifikasi GPSS Bangunan" ||
                                    $projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Bangunan" ||
                                    $projek->status == "Selesai Jana Keputusan Verifikasi GPSS Bangunan" ||
                                    $projek->status == "Proses Rayuan GPSS Bangunan" ||
                                    $projek->status == "Dalam Pengesahan Rayuan GPSS Bangunan" ||
                                    $projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan" ||
                                    $projek->status == "Selesai Jana Keputusan Rayuan GPSS Bangunan")
                                    <h3>Peringkat Rekabentuk</h3>
                                    <a class="btn btn-primary" href="/projek/{{ $projek->id }}/sijil-gpss-bangunan-rekabentuk">Lihat Sijil</a>
                                @endif
                                @if($projek->status == "Selesai Pengesahan Rekabentuk GPSS Bangunan")
                                    <form action="/projek/{{$projek->id}}/sah-gpss-bangunan" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if($projek->status == "Selesai Pengesahan Rekabentuk GPSS Bangunan")
                                            <div class="col text-center">
                                                <button class="btn btn-primary" type="submit">Jana</button>
                                            </div>
                                        @endif
                                    </form>
                                @endif
                                @if($projek->status == "Selesai Pengesahan Verifikasi GPSS Bangunan" ||
                                        $projek->status == "Selesai Jana Keputusan Verifikasi GPSS Bangunan" ||
                                        $projek->status == "Proses Rayuan GPSS Bangunan" ||
                                        $projek->status == "Dalam Pengesahan Rayuan GPSS Bangunan" ||
                                        $projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan" ||
                                        $projek->status == "Selesai Jana Keputusan Rayuan GPSS Bangunan")
                                        <h3>Peringkat Verifikasi</h3>
                                        <a class="btn btn-primary" href="/projek/{{ $projek->id }}/sijil-gpss-bangunan-verifikasi">Lihat Sijil</a>
                                @endif
                                @if($projek->status == "Selesai Pengesahan Verifikasi GPSS Bangunan")
                                    <form action="/projek/{{$projek->id}}/sah-gpss-bangunan" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if($projek->status == "Selesai Pengesahan Verifikasi GPSS Bangunan")
                                            <div class="col text-center">
                                                <button class="btn btn-primary" type="submit">Jana</button>
                                            </div>
                                        @endif
                                    </form>
                                @endif
                                @if($projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan" || $projek->status == "Selesai Jana Keputusan Rayuan GPSS Bangunan")
                                <h3>Peringkat Rayuan</h3>
                                    <a class="btn btn-primary" href="/projek/{{ $projek->id }}/sijil-gpss-bangunan-rayuan">Lihat Sijil</a>
                                @endif
                                @if($projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan")
                                    <form action="/projek/{{$projek->id}}/sah-gpss-bangunan-rayuan" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if($projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan")
                                            <div class="col text-center">
                                                <button class="btn btn-primary" type="submit">Jana</button>
                                            </div>
                                        @endif
                                    </form>
                                @endif
                                @endrole
                            </div>
                        </div>
                    </div>
                    @endrole

                    <!--SKOR KAD GPSS BANGUNAN-->
                    <div class="tab-pane" id="tab-5" role="tabpanel">
                        <div class="card mt-3">
                            <form action="#" id="skor-kad-gpss-bangunan">
                                <div class="card-body">
                                    <h4 class="mb-3">SKOR KAD GPSS BANGUNAN</h4>
                                    <div class="table-responsive scrollbar">
                                        <table class="table table-bordered line-table text-center skor-gpss-datatable" style="width: 100%">
                                            <thead class="text-white bg-orange-jkr">
                                                <tr>          
                                                    <th colspan="10">Green Product Scoring Sheet</th>
                                                </tr>
                                                <tr>  
                                                    @if ($projek->kategori == 'GPSS Bangunan 1')        
                                                        <th colspan="10">CATEGORY 1</th>
                                                    @elseif ($projek->kategori == 'GPSS Bangunan 2')
                                                        <th colspan="10">CATEGORY 2</th>
                                                    @elseif ($projek->kategori == 'GPSS Bangunan 3')
                                                        <th colspan="10">CATEGORY 3</th>
                                                    @endif
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
                                    <div class="col text-center">
                                        @if($projek->status == "Proses Pengisian Skor Rekabentuk GPSS Bangunan")
                                        @role('ketua-pemudah-cara|pemudah-cara|ketua-penilai|penilai')
                                        <a href="/projek/{{ $projek->id }}/pengesahan-penilaian" class="btn btn-primary" name="hantar_skorkad" value="hantar" type="submit">Hantar</a>
                                        @endrole
                                        @endif
                                        @if($projek->status == "Proses Pengisian Skor Verifikasi Permarkahan GPSS Bangunan")
                                        @role('ketua-pemudah-cara|pemudah-cara|ketua-penilai|penilai')
                                        {{-- <button>TEST</button> --}}
                                        <a href="/projek/{{ $projek->id }}/pengesahan-penilaian" class="btn btn-primary" name="hantar_skorkad" value="hantar" type="submit">Hantar</a>
                                        @endrole
                                        @endif
                                    </div>
                                    {{-- @role('ketua-pasukan|penolong-ketua-pasukan')
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <button class="btn btn-primary" onclick="printJS('skor-kad-gpss-bangunan', 'html')">Muat Turun</button>
                                            </div>
                                        </div>
                                    @endrole --}}
                                </div>
                            </form>
                            @role('sekretariat')
                            <form action="/projek/{{$projek->id}}/sah-gpss-bangunan" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        @if($projek->status == "Dalam Pengesahan Skor Rekabentuk GPSS Bangunan")
                                            <button class="btn btn-primary" type="submit">Sah</button>
                                            {{-- <a href="/projek/{{$projek->id}}/sah-gpss-bangunan" class="btn btn-primary" type="submit">Sah</a> --}}
                                        @endif
                                    </div>
                                </div>
                            </form>
                            @endrole
                            @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                            @if($projek->status == "Selesai Pengesahan Rekabentuk GPSS Bangunan" ||
                                $projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Bangunan" ||
                                $projek->status == "Proses Pengisian Skor Verifikasi GPSS Bangunan" ||
                                $projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Bangunan" ||
                                $projek->status == "Selesai Pengesahan Verifikasi GPSS Bangunan" ||
                                $projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Bangunan" ||
                                $projek->status == "Selesai Jana Keputusan Verifikasi GPSS Bangunan" ||
                                $projek->status == "Proses Rayuan GPSS Bangunan" ||
                                $projek->status == "Dalam Pengesahan Rayuan GPSS Bangunan" ||
                                $projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan" ||
                                $projek->status == "Selesai Jana Keputusan Rayuan GPSS Bangunan")
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        <button class="btn btn-primary" onclick="printJS('skor-kad-gpss-bangunan', 'html')">Muat Turun</button>
                                    </div>
                                </div>
                            @endif
                            @endrole
                        </div>
                    </div>

                    <!--SKOR KAD GPSS BANGUNAN RAYUAN-->
                    @if($projek->status == "Proses Rayuan GPSS Bangunan" || $projek->status == "Dalam Pengesahan Rayuan GPSS Bangunan" || 
                    $projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan" || $projek->status == "Proses Jana Keputusan Rayuan GPSS Bangunan" ||
                    $projek->status == "Selesai Jana Keputusan Rayuan GPSS Bangunan" || $projek->status == "Selesai Rayuan GPSS Bangunan")
                    @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                    <div class="tab-pane" id="tab-7" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body" id="skor-kad">
                                <h4 class="mb-3">SKOR KAD RAYUAN GPSS BANGUNAN</h4>
                                <div class="table-responsive scrollbar">
                                    <table class="table table-bordered line-table text-center skor-gpss-datatable-1" style="width: 100%">
                                        <thead class="text-white bg-orange-jkr">
                                            <tr>          
                                                <th colspan="10">Green Product Scoring Sheet</th>
                                            </tr>
                                            <tr>  
                                                @if ($projek->kategori == 'GPSS Bangunan 1')        
                                                    <th colspan="10">CATEGORY 1</th>
                                                @elseif ($projek->kategori == 'GPSS Bangunan 2')
                                                    <th colspan="10">CATEGORY 2</th>
                                                @elseif ($projek->kategori == 'GPSS Bangunan 3')
                                                    <th colspan="10">CATEGORY 3</th>
                                                @endif
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
                                <form action="/projek/{{$projek->id}}/sah-gpss-bangunan-rayuan" method="POST" enctype="multipart/form-data">
                                    @csrf
                                @role('sekretariat')
                                @if ($projek->status == "Dalam Pengesahan Skor Rekabentuk GPSS Bangunan")
                                    <button class="btn btn-primary" type="submit">Sah</button>
                                @elseif ($projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Bangunan")
                                    <button class="btn btn-primary" type="submit">Sah</button>
                                @endif
                                {{-- <div class="row mt-3">
                                    <div class="col text-center">
                                        <button class="btn btn-primary">Jana Skor Kad</button>
                                    </div>
                                </div> --}}
                                @endrole
                                @role('ketua-pemudah-cara|pemudah-cara|ketua-penilai|penilai')
                                <div class="col text-center">
                                    @if($projek->status == "Proses Rayuan GPSS Bangunan")
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

                    <!--RUMUSAN SKOR KAD-->
                    {{-- @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat') --}}
                    <div class="tab-pane" id="tab-6" role="tabpanel">
                        <div class="card mt-3">
                            <form action="#" id="rumusan-skor-kad-gpss"></form>
                                <div class="card-body">
                                    <h4 class="h4 mb-3">RUMUSAN SKOR KAD</h4>
                                    <div class="table-responsive scrollbar">
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
                                                    <th>Design Stage</th>
                                                    <th>Construction Stage</th>
                                                    <th>Construction Stage</th>
                                                    <th>Point Requested Design</th>
                                                    <th>Point Requested Construction</th>
                                                    <th>Point Awarded</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-black">
                                                <!--Aw-->
                                                <tr>
                                                    <th>1</th>
                                                    <th>Architectural (Aw)</th>
                                                    <th>232</th>
                                                    <th>{{$aw_pa}}</th>
                                                    <th>{{$aw_ds}}</th>
                                                    <th>{{$aw_cs}}</th>
                                                    <th>{{$aw_pad}}</th>
                                                    @if($projek->kategori == 'GPSS Bangunan 1')
                                                    <th>0.45</th>
                                                    @elseif($projek->kategori == 'GPSS Bangunan 2')
                                                    <th>0.55</th>
                                                    @elseif($projek->kategori == 'GPSS Bangunan 3')
                                                    <th>0.60</th>
                                                    @endif
                                                    @if($projek->kategori == 'GPSS Bangunan 1')
                                                    <th>{{number_format($peratus_aw_gpss_ds_1,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_aw_gpss_cs_1,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_aw_gpss_pad_1,2,".",",")}}</th>
                                                    @elseif($projek->kategori == 'GPSS Bangunan 2')
                                                    <th>{{number_format($peratus_aw_gpss_ds_2,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_aw_gpss_cs_2,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_aw_gpss_pad_2,2,".",",")}}</th>
                                                    @elseif($projek->kategori == 'GPSS Bangunan 3')
                                                    <th>{{number_format($peratus_aw_gpss_ds_3,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_aw_gpss_cs_3,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_aw_gpss_pad_3,2,".",",")}}</th>
                                                    @endif
                                                </tr>

                                                <!--Mw-->
                                                <tr>
                                                    <th>2</th>
                                                    <th>Mechanical (Mw)</th>
                                                    <th>34</th>
                                                    <th>{{$mw_pa}}</th>
                                                    <th>{{$mw_ds}}</th>
                                                    <th>{{$mw_cs}}</th>
                                                    <th>{{$mw_pad}}</th>
                                                    @if($projek->kategori == 'GPSS Bangunan 1')
                                                    <th>0.20</th>
                                                    @elseif($projek->kategori == 'GPSS Bangunan 2')
                                                    <th>0.15</th>
                                                    @elseif($projek->kategori == 'GPSS Bangunan 3')
                                                    <th>0.10</th>
                                                    @endif
                                                    @if($projek->kategori == 'GPSS Bangunan 1')
                                                    <th>{{number_format($peratus_mw_gpss_ds_1,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_mw_gpss_cs_1,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_mw_gpss_pad_1,2,".",",")}}</th>
                                                    @elseif($projek->kategori == 'GPSS Bangunan 2')
                                                    <th>{{number_format($peratus_mw_gpss_ds_2,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_mw_gpss_cs_2,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_mw_gpss_pad_2,2,".",",")}}</th>
                                                    @elseif($projek->kategori == 'GPSS Bangunan 3')
                                                    <th>{{number_format($peratus_mw_gpss_ds_3,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_mw_gpss_cs_3,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_mw_gpss_pad_3,2,".",",")}}</th>
                                                    @endif   
                                                </tr>

                                                <!--Ew-->
                                                <tr>
                                                    <th>3</th>
                                                    <th>Electrical (Ew)</th>
                                                    <th>110</th>
                                                    <th>{{$ew_pa}}</th>
                                                    <th>{{$ew_ds}}</th>
                                                    <th>{{$ew_cs}}</th>
                                                    <th>{{$ew_pad}}</th>
                                                    @if($projek->kategori == 'GPSS Bangunan 1')
                                                    <th>0.15</th>
                                                    @elseif($projek->kategori == 'GPSS Bangunan 2')
                                                    <th>0.10</th>
                                                    @elseif($projek->kategori == 'GPSS Bangunan 3')
                                                    <th>0.10</th>
                                                    @endif
                                                    @if($projek->kategori == 'GPSS Bangunan 1')
                                                    <th>{{number_format($peratus_ew_gpss_ds_1,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_ew_gpss_cs_1,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_ew_gpss_pad_1,2,".",",")}}</th>
                                                    @elseif($projek->kategori == 'GPSS Bangunan 2')
                                                    <th>{{number_format($peratus_ew_gpss_ds_2,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_ew_gpss_cs_2,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_ew_gpss_pad_2,2,".",",")}}</th>
                                                    @elseif($projek->kategori == 'GPSS Bangunan 3')
                                                    <th>{{number_format($peratus_ew_gpss_ds_3,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_ew_gpss_cs_3,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_ew_gpss_pad_3,2,".",",")}}</th>
                                                    @endif
                                                </tr>

                                                <!--Cw-->
                                                <tr>
                                                    <th>4</th>
                                                    <th>Civil & Structural (Cw)</th>
                                                    <th>124</th>
                                                    <th>{{$cw_pa}}</th>
                                                    <th>{{$cw_ds}}</th>
                                                    <th>{{$cw_cs}}</th>
                                                    <th>{{$cw_pad}}</th>
                                                    @if($projek->kategori == 'GPSS Bangunan 1')
                                                    <th>0.20</th>
                                                    @elseif($projek->kategori == 'GPSS Bangunan 2')
                                                    <th>0.20</th>
                                                    @elseif($projek->kategori == 'GPSS Bangunan 3')
                                                    <th>0.20</th>
                                                    @endif
                                                    @if($projek->kategori == 'GPSS Bangunan 1')
                                                    <th>{{number_format($peratus_cw_gpss_ds_1,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_cw_gpss_cs_1,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_cw_gpss_pad_1,2,".",",")}}</th>
                                                    @elseif($projek->kategori == 'GPSS Bangunan 2')
                                                    <th>{{number_format($peratus_cw_gpss_ds_2,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_cw_gpss_cs_2,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_cw_gpss_pad_2,2,".",",")}}</th>
                                                    @elseif($projek->kategori == 'GPSS Bangunan 3')
                                                    <th>{{number_format($peratus_cw_gpss_ds_3,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_cw_gpss_cs_3,2,".",",")}}</th>
                                                    <th>{{number_format($peratus_cw_gpss_pad_3,2,".",",")}}</th>
                                                    @endif
                                                </tr>

                                                <!--Rw-->
                                                <tr>
                                                    <th>5</th>
                                                    <th>Road & Geotechnial (Rw)</th>
                                                    <th>98</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0.00</th>
                                                    <th>0.00</th>
                                                    <th>0.00</th>
                                                </tr>

                                                <!--Sw-->
                                                <tr>
                                                    <th>6</th>
                                                    <th>Structural(Bridge) (Sw)</th>
                                                    <th>12</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0</th>
                                                    <th>0.00</th>
                                                    <th>0.00</th>
                                                    <th>0.00</th>
                                                </tr>

                                                <!--Total Points-->
                                                <tr>
                                                    <th colspan="2">Total points</th>
                                                    <th>610</th>
                                                    <th>{{$total_pa}}</th>
                                                    <th>{{$total_ds}}</th>
                                                    <th>{{$total_cs}}</th>
                                                    <th>{{$total_pad}}</th>
                                                    <th>1.00</th>
                                                    @if($projek->kategori == "GPSS Bangunan 1")
                                                    <th>{{number_format($total_peratus_ds_1,2,".",",")}}</th>
                                                    @elseif($projek->kategori == "GPSS Bangunan 2")
                                                    <th>{{number_format($total_peratus_ds_2,2,".",",")}}</th>
                                                    @elseif($projek->kategori == "GPSS Bangunan 3")
                                                    <th>{{number_format($total_peratus_ds_3,2,".",",")}}</th>
                                                    @endif
                                                    @if($projek->kategori == "GPSS Bangunan 1")
                                                    <th>{{number_format($total_peratus_cs_1,2,".",",")}}</th>
                                                    @elseif($projek->kategori == "GPSS Bangunan 2")
                                                    <th>{{number_format($total_peratus_cs_2,2,".",",")}}</th>
                                                    @elseif($projek->kategori == "GPSS Bangunan 3")
                                                    <th>{{number_format($total_peratus_cs_3,2,".",",")}}</th>
                                                    @endif
                                                    @if($projek->kategori == "GPSS Bangunan 1")
                                                    <th>{{number_format($total_peratus_pad_1,2,".",",")}}</th>
                                                    @elseif($projek->kategori == "GPSS Bangunan 2")
                                                    <th>{{number_format($total_peratus_pad_2,2,".",",")}}</th>
                                                    @elseif($projek->kategori == "GPSS Bangunan 3")
                                                    <th>{{number_format($total_peratus_pad_3,2,".",",")}}</th>
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
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
                                                <th>GPSS Star (Bangunan)</th>
                                                <th>
                                                    <input type="hidden" name="fasa" value="rekabentuk">
                                                    @if($projek->kategori == "GPSS Bangunan 1")
                                                    <span class="star">
                                                        @if ($total_peratus_ds_1 >= 80)
                                                            5&#160;&starf; &starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_ds_1 >= 70 && $total_peratus_ds_1 < 79)
                                                            4&#160;&starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_ds_1 >= 60 && $total_peratus_ds_1 < 69)
                                                            3&#160;&starf; &starf; &starf;
                                                        @elseif ($total_peratus_ds_1 >= 50 && $total_peratus_ds_1 < 59)
                                                            2&#160;&starf; &starf; 
                                                        @elseif ($total_peratus_ds_1 >= 40 && $total_peratus_ds_1 <49)
                                                            1&#160;&starf;
                                                        @elseif ($total_peratus_ds_1 <39)
                                                            0&#160;&starf;                                                                                            
                                                        @endif
                                                    </span>
                                                    @elseif($projek->kategori == "GPSS Bangunan 2")
                                                    <span class="star">
                                                        @if ($total_peratus_ds_2 >= 80)
                                                            5&#160;&starf; &starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_ds_2 >= 70 && $total_peratus_ds_2 < 79)
                                                            4&#160;&starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_ds_2 >= 60 && $total_peratus_ds_2 < 69)
                                                            3&#160;&starf; &starf; &starf;
                                                        @elseif ($total_peratus_ds_2 >= 50 && $total_peratus_ds_2 < 59)
                                                            2&#160;&starf; &starf; 
                                                        @elseif ($total_peratus_ds_2 >= 40 && $total_peratus_ds_2 <49)
                                                            1&#160;&starf;
                                                        @elseif ($total_peratus_ds_2 <39)
                                                            0&#160;&starf;                                                                                            
                                                        @endif
                                                    </span>
                                                    @elseif($projek->kategori == "GPSS Bangunan 3")
                                                    <span class="star">
                                                        @if ($total_peratus_ds_3 >= 80)
                                                            5&#160;&starf; &starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_ds_3 >= 70 && $total_peratus_ds_3 < 79)
                                                            4&#160;&starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_ds_3 >= 60 && $total_peratus_ds_3 < 69)
                                                            3&#160;&starf; &starf; &starf;
                                                        @elseif ($total_peratus_ds_3 >= 50 && $total_peratus_ds_3 < 59)
                                                            2&#160;&starf; &starf; 
                                                        @elseif ($total_peratus_ds_3 >= 40 && $total_peratus_ds_3 <49)
                                                            1&#160;&starf;
                                                        @elseif ($total_peratus_ds_3 <39)
                                                            0&#160;&starf;                                                                                            
                                                        @endif
                                                    </span>
                                                    @endif
                                                </th>
                                                <th>
                                                    <input type="hidden" name="fasa" value="verifikasi">
                                                    @if($projek->kategori == "GPSS Bangunan 1")
                                                    <span class="star">
                                                        @if ($total_peratus_cs_1 >= 80)
                                                            5&#160;&starf; &starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_cs_1 >= 70 && $total_peratus_cs_1 < 79)
                                                            4&#160;&starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_cs_1 >= 60 && $total_peratus_cs_1 < 69)
                                                            3&#160;&starf; &starf; &starf;
                                                        @elseif ($total_peratus_cs_1 >= 50 && $total_peratus_cs_1 < 59)
                                                            2&#160;&starf; &starf; 
                                                        @elseif ($total_peratus_cs_1 >= 40 && $total_peratus_cs_1 <49)
                                                            1&#160;&starf;
                                                        @elseif ($total_peratus_cs_1 <39)
                                                            0&#160;&starf;                                                                                            
                                                        @endif
                                                    </span>
                                                    @elseif($projek->kategori == "GPSS Bangunan 2")
                                                    <span class="star">
                                                        @if ($total_peratus_cs_2 >= 80)
                                                            5&#160;&starf; &starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_cs_2 >= 70 && $total_peratus_cs_2 < 79)
                                                            4&#160;&starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_cs_2 >= 60 && $total_peratus_cs_2 < 69)
                                                            3&#160;&starf; &starf; &starf;
                                                        @elseif ($total_peratus_cs_2 >= 50 && $total_peratus_cs_2 < 59)
                                                            2&#160;&starf; &starf; 
                                                        @elseif ($total_peratus_cs_2 >= 40 && $total_peratus_cs_2 <49)
                                                            1&#160;&starf;
                                                        @elseif ($total_peratus_cs_2 <39)
                                                            0&#160;&starf;                                                                                            
                                                        @endif
                                                    </span>
                                                    @elseif($projek->kategori == "GPSS Bangunan 3")
                                                    <span class="star">
                                                        @if ($total_peratus_cs_3 >= 80)
                                                            5&#160;&starf; &starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_cs_3 >= 70 && $total_peratus_cs_3 < 79)
                                                            4&#160;&starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_cs_3 >= 60 && $total_peratus_cs_3 < 69)
                                                            3&#160;&starf; &starf; &starf;
                                                        @elseif ($total_peratus_cs_3 >= 50 && $total_peratus_cs_3 < 59)
                                                            2&#160;&starf; &starf; 
                                                        @elseif ($total_peratus_cs_3 >= 40 && $total_peratus_cs_3 <49)
                                                            1&#160;&starf;
                                                        @elseif ($total_peratus_cs_3 <39)
                                                            0&#160;&starf;                                                                                            
                                                        @endif
                                                    </span>
                                                    @endif
                                                </th>
                                                <th>
                                                    @if($projek->kategori == "GPSS Bangunan 1")
                                                    <span class="star">
                                                        @if ($total_peratus_pad_1 >= 80)
                                                            5&#160;&starf; &starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_pad_1 >= 70 && $total_peratus_pad_1 < 79)
                                                            4&#160;&starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_pad_1 >= 60 && $total_peratus_pad_1 < 69)
                                                            3&#160;&starf; &starf; &starf;
                                                        @elseif ($total_peratus_pad_1 >= 50 && $total_peratus_pad_1 < 59)
                                                            2&#160;&starf; &starf; 
                                                        @elseif ($total_peratus_pad_1 >= 40 && $total_peratus_pad_1 <49)
                                                            1&#160;&starf;
                                                        @elseif ($total_peratus_pad_1 <39)
                                                            0&#160;&starf;                                                                                            
                                                        @endif
                                                    </span>
                                                    @elseif($projek->kategori == "GPSS Bangunan 2")
                                                    <span class="star">
                                                        @if ($total_peratus_pad_2 >= 80)
                                                            5&#160;&starf; &starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_pad_2 >= 70 && $total_peratus_pad_2 < 79)
                                                            4&#160;&starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_pad_2 >= 60 && $total_peratus_pad_2 < 69)
                                                            3&#160;&starf; &starf; &starf;
                                                        @elseif ($total_peratus_pad_2 >= 50 && $total_peratus_pad_2 < 59)
                                                            2&#160;&starf; &starf; 
                                                        @elseif ($total_peratus_pad_2 >= 40 && $total_peratus_pad_2 <49)
                                                            1&#160;&starf;
                                                        @elseif ($total_peratus_pad_2 <39)
                                                            0&#160;&starf;                                                                                            
                                                        @endif
                                                    </span>
                                                    @elseif($projek->kategori == "GPSS Bangunan 3")
                                                    <span class="star">
                                                        @if ($total_peratus_pad_3 >= 80)
                                                            5&#160;&starf; &starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_pad_3 >= 70 && $total_peratus_pad_3 < 79)
                                                            4&#160;&starf; &starf; &starf; &starf;
                                                        @elseif ($total_peratus_pad_3 >= 60 && $total_peratus_pad_3 < 69)
                                                            3&#160;&starf; &starf; &starf;
                                                        @elseif ($total_peratus_pad_3 >= 50 && $total_peratus_pad_3 < 59)
                                                            2&#160;&starf; &starf; 
                                                        @elseif ($total_peratus_pad_3 >= 40 && $total_peratus_pad_3 <49)
                                                            1&#160;&starf;
                                                        @elseif ($total_peratus_pad_3 <39)
                                                            0&#160;&starf;                                                                                            
                                                        @endif
                                                    </span>
                                                    @endif
                                                </th>
                                            </tr>
                    
                                            <tr>
                                                <th>GPSS Star (Jalan)</th>
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
                                            <th>MyCREST</th>
                                            <th>
                                                <input type="hidden" name="fasa" value="rekabentuk">
                                                @if($projek->kategori == "GPSS Bangunan 1")
                                                <span>
                                                    @if ($total_peratus_crest_ds_1 >= 80)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_ds_1 >= 70 && $total_peratus_crest_ds_1 < 79)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_ds_1 >= 60 && $total_peratus_crest_ds_1 < 69)
                                                            2&#160;Points
                                                        @elseif ($total_peratus_crest_ds_1 >= 50 && $total_peratus_crest_ds_1 < 59)
                                                            2&#160;Points 
                                                        @elseif ($total_peratus_crest_ds_1 >= 40 && $total_peratus_crest_ds_1 <49)
                                                            1&#160;Points  
                                                        @elseif ($total_peratus_crest_ds_1 <39)
                                                            0&#160;Point                                                                                          
                                                    @endif
                                                </span>
                                                @elseif($projek->kategori == "GPSS Bangunan 2")
                                                <span>
                                                    @if ($total_peratus_crest_ds_2 >= 80)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_ds_2 >= 70 && $total_peratus_crest_ds_2 < 79)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_ds_2 >= 60 && $total_peratus_crest_ds_2 < 69)
                                                            2&#160;Points
                                                        @elseif ($total_peratus_crest_ds_2 >= 50 && $total_peratus_crest_ds_2 < 59)
                                                            2&#160;Points 
                                                        @elseif ($total_peratus_crest_ds_2 >= 40 && $total_peratus_crest_ds_2 <49)
                                                            1&#160;Points  
                                                        @elseif ($total_peratus_crest_ds_2 <39)
                                                            0&#160;Point                                                                                          
                                                    @endif
                                                </span>
                                                @elseif($projek->kategori == "GPSS Bangunan 3")
                                                <span>
                                                    @if ($total_peratus_crest_ds_3 >= 80)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_ds_3 >= 70 && $total_peratus_crest_ds_3 < 79)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_ds_3 >= 60 && $total_peratus_crest_ds_3 < 69)
                                                            2&#160;Points
                                                        @elseif ($total_peratus_crest_ds_3 >= 50 && $total_peratus_crest_ds_3 < 59)
                                                            2&#160;Points 
                                                        @elseif ($total_peratus_crest_ds_3 >= 40 && $total_peratus_crest_ds_3 <49)
                                                            1&#160;Points  
                                                        @elseif ($total_peratus_crest_ds_3 <39)
                                                            0&#160;Point                                                                                          
                                                    @endif
                                                </span>
                                                @endif
                                            </th>
                                            <th>
                                                @if($projek->kategori == "GPSS Bangunan 1")
                                                <span>
                                                    @if ($total_peratus_crest_cs_1 >= 80)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_cs_1 >= 70 && $total_peratus_crest_cs_1 < 79)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_cs_1 >= 60 && $total_peratus_crest_cs_1 < 69)
                                                            2&#160;Points
                                                        @elseif ($total_peratus_crest_cs_1 >= 50 && $total_peratus_crest_cs_1 < 59)
                                                            2&#160;Points 
                                                        @elseif ($total_peratus_crest_cs_1 >= 40 && $total_peratus_crest_cs_1 <49)
                                                            1&#160;Points  
                                                        @elseif ($total_peratus_crest_cs_1 <39)
                                                            0&#160;Point                                                                                          
                                                    @endif
                                                </span>
                                                @elseif($projek->kategori == "GPSS Bangunan 2")
                                                <span>
                                                    @if ($total_peratus_crest_cs_2 >= 80)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_cs_2 >= 70 && $total_peratus_crest_cs_2 < 79)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_cs_2 >= 60 && $total_peratus_crest_cs_2 < 69)
                                                            2&#160;Points
                                                        @elseif ($total_peratus_crest_cs_2 >= 50 && $total_peratus_crest_cs_2 < 59)
                                                            2&#160;Points 
                                                        @elseif ($total_peratus_crest_cs_2 >= 40 && $total_peratus_crest_cs_2 <49)
                                                            1&#160;Points  
                                                        @elseif ($total_peratus_crest_cs_2 <39)
                                                            0&#160;Point                                                                                          
                                                    @endif
                                                </span>
                                                @elseif($projek->kategori == "GPSS Bangunan 3")
                                                <span>
                                                    @if ($total_peratus_crest_cs_3 >= 80)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_cs_3 >= 70 && $total_peratus_crest_cs_3 < 79)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_cs_3 >= 60 && $total_peratus_crest_cs_3 < 69)
                                                            2&#160;Points
                                                        @elseif ($total_peratus_crest_cs_3 >= 50 && $total_peratus_crest_cs_3 < 59)
                                                            2&#160;Points 
                                                        @elseif ($total_peratus_crest_cs_3 >= 40 && $total_peratus_crest_cs_3 <49)
                                                            1&#160;Points  
                                                        @elseif ($total_peratus_crest_cs_3 <39)
                                                            0&#160;Point                                                                                          
                                                    @endif
                                                </span>
                                                @endif
                                            </th>
                                            <th>
                                                @if($projek->kategori == "GPSS Bangunan 1")
                                                <span>
                                                    @if ($total_peratus_crest_pad_1 >= 80)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_pad_1 >= 70 && $total_peratus_crest_pad_1 < 79)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_pad_1 >= 60 && $total_peratus_crest_pad_1 < 69)
                                                            2&#160;Points
                                                        @elseif ($total_peratus_crest_pad_1 >= 50 && $total_peratus_crest_pad_1 < 59)
                                                            2&#160;Points 
                                                        @elseif ($total_peratus_crest_pad_1 >= 40 && $total_peratus_crest_pad_1 <49)
                                                            1&#160;Points  
                                                        @elseif ($total_peratus_crest_pad_1 <39)
                                                            0&#160;Point                                                                                          
                                                    @endif
                                                </span>
                                                @elseif($projek->kategori == "GPSS Bangunan 2")
                                                <span>
                                                    @if ($total_peratus_crest_pad_2 >= 80)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_pad_2 >= 70 && $total_peratus_crest_pad_2 < 79)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_pad_2 >= 60 && $total_peratus_crest_pad_2 < 69)
                                                            2&#160;Points
                                                        @elseif ($total_peratus_crest_pad_2 >= 50 && $total_peratus_crest_pad_2 < 59)
                                                            2&#160;Points 
                                                        @elseif ($total_peratus_crest_pad_2 >= 40 && $total_peratus_crest_pad_2 <49)
                                                            1&#160;Points  
                                                        @elseif ($total_peratus_crest_pad_2 <39)
                                                            0&#160;Point                                                                                          
                                                    @endif
                                                </span>
                                                @elseif($projek->kategori == "GPSS Bangunan 3")
                                                <span>
                                                    @if ($total_peratus_crest_pad_3 >= 80)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_pad_3 >= 70 && $total_peratus_crest_pad_3 < 79)
                                                            3&#160;Points
                                                        @elseif ($total_peratus_crest_pad_3 >= 60 && $total_peratus_crest_pad_3 < 69)
                                                            2&#160;Points
                                                        @elseif ($total_peratus_crest_pad_3 >= 50 && $total_peratus_crest_pad_3 < 59)
                                                            2&#160;Points 
                                                        @elseif ($total_peratus_crest_pad_3 >= 40 && $total_peratus_crest_pad_3 <49)
                                                            1&#160;Points  
                                                        @elseif ($total_peratus_crest_pad_3 <39)
                                                            0&#160;Point                                                                                          
                                                    @endif
                                                </span>
                                                @endif
                                            </th>
                                            </tr>
                                        </tbody> 
                                    </table>
                                    {{-- @role('sekretariat')
                                    <div class="row mt-3">
                                        <div class="col text-center">
                                            <a href="#" class="btn btn-primary">Jana Keputusan</a>
                                        </div>
                                    </div>
                                    @endrole --}}
                                    @role('ketua-pasukan|penolong-ketua-pasukan')
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <button class="btn btn-primary" onclick="printJS('rumusan-skor-kad-gpss', 'html')">Muat Turun</button>
                                            </div>
                                        </div>
                                    @endrole
                                    @role('sekretariat')
                                    @if($projek->status == "Selesai Pengesahan Rekabentuk GPSS Bangunan" ||
                                        $projek->status == "Selesai Jana Keputusan Rekabentuk GPSS Bangunan" ||
                                        $projek->status == "Proses Pengisian Skor Verifikasi GPSS Bangunan" ||
                                        $projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Bangunan" ||
                                        $projek->status == "Selesai Pengesahan Verifikasi GPSS Bangunan" ||
                                        $projek->status == "Dalam Pengesahan Skor Verifikasi GPSS Bangunan" ||
                                        $projek->status == "Selesai Jana Keputusan Verifikasi GPSS Bangunan" ||
                                        $projek->status == "Proses Rayuan GPSS Bangunan" ||
                                        $projek->status == "Dalam Pengesahan Rayuan GPSS Bangunan" ||
                                        $projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan" ||
                                        $projek->status == "Selesai Jana Keputusan Rayuan GPSS Bangunan")
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <button class="btn btn-primary" onclick="printJS('rumusan-skor-kad-gpss', 'html')">Muat Turun</button>
                                            </div>
                                        </div>
                                    @endif
                                    @endrole
                                </div>
                            </form>
                        </div>
                    </div> 
                    {{-- @endrole --}}
                    
                    <!--RUMUSAN SKOR KAD RAYUAN-->
                    @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                    @if($projek->status == "Proses Rayuan GPSS Bangunan" || $projek->status == "Dalam Pengesahan Rayuan GPSS Bangunan" || 
                    $projek->status == "Selesai Pengesahan Rayuan GPSS Bangunan" || $projek->status = "Proses Jana Keputusan Rayuan GPSS Bangunan" ||
                    $projek->status == "Selesai Jana Keputusan Rayuan GPSS Bangunan" || $projek->status == "Selesai Rayuan GPSS Bangunan")
                    <div class="tab-pane" id="tab-8" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h4 class="h4 mb-3">RUMUSAN SKOR KAD RAYUAN</h4>
                                <div class="table-responsive scrollbar">
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
                                                <th>Design Stage</th>
                                                <th>Construction Stage</th>
                                                <th>Construction Stage</th>
                                                <th>Point Requested Design</th>
                                                <th>Point Requested Construction</th>
                                                <th>Point Awarded</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-black">
                                            <!--Aw-->
                                            <tr>
                                                <th>1</th>
                                                <th>Architectural (Aw)</th>
                                                <th>232</th>
                                                <th>{{$aw_pa_r}}</th>
                                                <th>{{$aw_ds_r}}</th>
                                                <th>{{$aw_cs_r}}</th>
                                                <th>{{$aw_pad_r}}</th>
                                                @if($projek->kategori == 'GPSS Bangunan 1')
                                                <th>0.45</th>
                                                @elseif($projek->kategori == 'GPSS Bangunan 2')
                                                <th>0.55</th>
                                                @elseif($projek->kategori == 'GPSS Bangunan 3')
                                                <th>0.60</th>
                                                @endif
                                                @if($projek->kategori == 'GPSS Bangunan 1')
                                                <th>{{number_format($peratus_aw_gpss_ds_1_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_aw_gpss_cs_1_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_aw_gpss_pad_1_r,2,".",",")}}</th>
                                                @elseif($projek->kategori == 'GPSS Bangunan 2')
                                                <th>{{number_format($peratus_aw_gpss_ds_2_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_aw_gpss_cs_2_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_aw_gpss_pad_2_r,2,".",",")}}</th>
                                                @elseif($projek->kategori == 'GPSS Bangunan 3')
                                                <th>{{number_format($peratus_aw_gpss_ds_3_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_aw_gpss_cs_3_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_aw_gpss_pad_3_r,2,".",",")}}</th>
                                                @endif
                                            </tr>

                                            <!--Mw-->
                                            <tr>
                                                <th>2</th>
                                                <th>Mechanical (Mw)</th>
                                                <th>34</th>
                                                <th>{{$mw_pa_r}}</th>
                                                <th>{{$mw_ds_r}}</th>
                                                <th>{{$mw_cs_r}}</th>
                                                <th>{{$mw_pad_r}}</th>
                                                @if($projek->kategori == 'GPSS Bangunan 1')
                                                <th>0.20</th>
                                                @elseif($projek->kategori == 'GPSS Bangunan 2')
                                                <th>0.15</th>
                                                @elseif($projek->kategori == 'GPSS Bangunan 3')
                                                <th>0.10</th>
                                                @endif
                                                @if($projek->kategori == 'GPSS Bangunan 1')
                                                <th>{{number_format($peratus_mw_gpss_ds_1_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_mw_gpss_cs_1_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_mw_gpss_pad_1_r,2,".",",")}}</th>
                                                @elseif($projek->kategori == 'GPSS Bangunan 2')
                                                <th>{{number_format($peratus_mw_gpss_ds_2_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_mw_gpss_cs_2_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_mw_gpss_pad_2_r,2,".",",")}}</th>
                                                @elseif($projek->kategori == 'GPSS Bangunan 3')
                                                <th>{{number_format($peratus_mw_gpss_ds_3_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_mw_gpss_cs_3_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_mw_gpss_pad_3_r,2,".",",")}}</th>
                                                @endif   
                                            </tr>

                                            <!--Ew-->
                                            <tr>
                                                <th>3</th>
                                                <th>Electrical (Ew)</th>
                                                <th>110</th>
                                                <th>{{$ew_pa_r}}</th>
                                                <th>{{$ew_ds_r}}</th>
                                                <th>{{$ew_cs_r}}</th>
                                                <th>{{$ew_pad_r}}</th>
                                                @if($projek->kategori == 'GPSS Bangunan 1')
                                                <th>0.15</th>
                                                @elseif($projek->kategori == 'GPSS Bangunan 2')
                                                <th>0.10</th>
                                                @elseif($projek->kategori == 'GPSS Bangunan 3')
                                                <th>0.10</th>
                                                @endif
                                                @if($projek->kategori == 'GPSS Bangunan 1')
                                                <th>{{number_format($peratus_ew_gpss_ds_1_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_ew_gpss_cs_1_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_ew_gpss_pad_1_r,2,".",",")}}</th>
                                                @elseif($projek->kategori == 'GPSS Bangunan 2')
                                                <th>{{number_format($peratus_ew_gpss_ds_2_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_ew_gpss_cs_2_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_ew_gpss_pad_2_r,2,".",",")}}</th>
                                                @elseif($projek->kategori == 'GPSS Bangunan 3')
                                                <th>{{number_format($peratus_ew_gpss_ds_3_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_ew_gpss_cs_3_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_ew_gpss_pad_3_r,2,".",",")}}</th>
                                                @endif
                                            </tr>

                                            <!--Cw-->
                                            <tr>
                                                <th>4</th>
                                                <th>Civil & Structural (Cw)</th>
                                                <th>124</th>
                                                <th>{{$cw_pa_r}}</th>
                                                <th>{{$cw_ds_r}}</th>
                                                <th>{{$cw_cs_r}}</th>
                                                <th>{{$cw_pad_r}}</th>
                                                @if($projek->kategori == 'GPSS Bangunan 1')
                                                <th>0.20</th>
                                                @elseif($projek->kategori == 'GPSS Bangunan 2')
                                                <th>0.20</th>
                                                @elseif($projek->kategori == 'GPSS Bangunan 3')
                                                <th>0.20</th>
                                                @endif
                                                @if($projek->kategori == 'GPSS Bangunan 1')
                                                <th>{{number_format($peratus_cw_gpss_ds_1_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_cw_gpss_cs_1_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_cw_gpss_pad_1_r,2,".",",")}}</th>
                                                @elseif($projek->kategori == 'GPSS Bangunan 2')
                                                <th>{{number_format($peratus_cw_gpss_ds_2_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_cw_gpss_cs_2_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_cw_gpss_pad_2_r,2,".",",")}}</th>
                                                @elseif($projek->kategori == 'GPSS Bangunan 3')
                                                <th>{{number_format($peratus_cw_gpss_ds_3_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_cw_gpss_cs_3_r,2,".",",")}}</th>
                                                <th>{{number_format($peratus_cw_gpss_pad_3_r,2,".",",")}}</th>
                                                @endif
                                            </tr>

                                            <!--Rw-->
                                            <tr>
                                                <th>5</th>
                                                <th>Road & Geotechnial (Rw)</th>
                                                <th>98</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0.00</th>
                                                <th>0.00</th>
                                                <th>0.00</th>
                                            </tr>

                                            <!--Sw-->
                                            <tr>
                                                <th>6</th>
                                                <th>Structural(Bridge) (Sw)</th>
                                                <th>12</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0.00</th>
                                                <th>0.00</th>
                                                <th>0.00</th>
                                            </tr>

                                            <!--Total Points-->
                                            <tr>
                                                <th colspan="2">Total points</th>
                                                <th>610</th>
                                                <th>{{$total_pa_r}}</th>
                                                <th>{{$total_ds_r}}</th>
                                                <th>{{$total_cs_r}}</th>
                                                <th>{{$total_pad_r}}</th>
                                                <th>1.00</th>
                                                @if($projek->kategori == "GPSS Bangunan 1")
                                                <th>{{number_format($total_peratus_ds_1_r,2,".",",")}}</th>
                                                @elseif($projek->kategori == "GPSS Bangunan 2")
                                                <th>{{number_format($total_peratus_ds_2_r,2,".",",")}}</th>
                                                @elseif($projek->kategori == "GPSS Bangunan 3")
                                                <th>{{number_format($total_peratus_ds_3_r,2,".",",")}}</th>
                                                @endif
                                                @if($projek->kategori == "GPSS Bangunan 1")
                                                <th>{{number_format($total_peratus_cs_1_r,2,".",",")}}</th>
                                                @elseif($projek->kategori == "GPSS Bangunan 2")
                                                <th>{{number_format($total_peratus_cs_2_r,2,".",",")}}</th>
                                                @elseif($projek->kategori == "GPSS Bangunan 3")
                                                <th>{{number_format($total_peratus_cs_3_r,2,".",",")}}</th>
                                                @endif
                                                @if($projek->kategori == "GPSS Bangunan 1")
                                                <th>{{number_format($total_peratus_pad_1_r,2,".",",")}}</th>
                                                @elseif($projek->kategori == "GPSS Bangunan 2")
                                                <th>{{number_format($total_peratus_pad_2_r,2,".",",")}}</th>
                                                @elseif($projek->kategori == "GPSS Bangunan 3")
                                                <th>{{number_format($total_peratus_pad_3_r,2,".",",")}}</th>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
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
                                            <th>GPSS Star (Bangunan)</th>
                                            <th>
                                                <input type="hidden" name="fasa" value="rekabentuk">
                                                @if($projek->kategori == "GPSS Bangunan 1")
                                                <span class="star">
                                                    @if ($total_peratus_ds_1_r >= 80)
                                                        5&#160;&starf; &starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_ds_1_r >= 70 && $total_peratus_ds_1_r < 79)
                                                        4&#160;&starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_ds_1_r >= 60 && $total_peratus_ds_1_r < 69)
                                                        3&#160;&starf; &starf; &starf;
                                                    @elseif ($total_peratus_ds_1_r >= 50 && $total_peratus_ds_1_r < 59)
                                                        2&#160;&starf; &starf; 
                                                    @elseif ($total_peratus_ds_1_r >= 40 && $total_peratus_ds_1_r <49)
                                                        1&#160;&starf;
                                                    @elseif ($total_peratus_ds_1_r <39)
                                                        0&#160;&starf;                                                                                            
                                                    @endif
                                                </span>
                                                @elseif($projek->kategori == "GPSS Bangunan 2")
                                                <span class="star">
                                                    @if ($total_peratus_ds_2_r >= 80)
                                                        5&#160;&starf; &starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_ds_2_r >= 70 && $total_peratus_ds_2_r < 79)
                                                        4&#160;&starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_ds_2_r >= 60 && $total_peratus_ds_2_r < 69)
                                                        3&#160;&starf; &starf; &starf;
                                                    @elseif ($total_peratus_ds_2_r >= 50 && $total_peratus_ds_2_r < 59)
                                                        2&#160;&starf; &starf; 
                                                    @elseif ($total_peratus_ds_2_r >= 40 && $total_peratus_ds_2_r <49)
                                                        1&#160;&starf;
                                                    @elseif ($total_peratus_ds_2_r <39)
                                                        0&#160;&starf;                                                                                            
                                                    @endif
                                                </span>
                                                @elseif($projek->kategori == "GPSS Bangunan 3")
                                                <span class="star">
                                                    @if ($total_peratus_ds_3_r >= 80)
                                                        5&#160;&starf; &starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_ds_3_r >= 70 && $total_peratus_ds_3_r < 79)
                                                        4&#160;&starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_ds_3_r >= 60 && $total_peratus_ds_3_r < 69)
                                                        3&#160;&starf; &starf; &starf;
                                                    @elseif ($total_peratus_ds_3_r >= 50 && $total_peratus_ds_3_r < 59)
                                                        2&#160;&starf; &starf; 
                                                    @elseif ($total_peratus_ds_3_r >= 40 && $total_peratus_ds_3_r <49)
                                                        1&#160;&starf;
                                                    @elseif ($total_peratus_ds_3_r <39)
                                                        0&#160;&starf;                                                                                            
                                                    @endif
                                                </span>
                                                @endif
                                            </th>
                                            <th>
                                                <input type="hidden" name="fasa" value="verifikasi">
                                                @if($projek->kategori == "GPSS Bangunan 1")
                                                <span class="star">
                                                    @if ($total_peratus_cs_1_r >= 80)
                                                        5&#160;&starf; &starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_cs_1_r >= 70 && $total_peratus_cs_1_r < 79)
                                                        4&#160;&starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_cs_1_r >= 60 && $total_peratus_cs_1_r < 69)
                                                        3&#160;&starf; &starf; &starf;
                                                    @elseif ($total_peratus_cs_1_r >= 50 && $total_peratus_cs_1_r < 59)
                                                        2&#160;&starf; &starf; 
                                                    @elseif ($total_peratus_cs_1_r >= 40 && $total_peratus_cs_1_r <49)
                                                        1&#160;&starf;
                                                    @elseif ($total_peratus_cs_1_r <39)
                                                        0&#160;&starf;                                                                                            
                                                    @endif
                                                </span>
                                                @elseif($projek->kategori == "GPSS Bangunan 2")
                                                <span class="star">
                                                    @if ($total_peratus_cs_2_r >= 80)
                                                        5&#160;&starf; &starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_cs_2_r >= 70 && $total_peratus_cs_2_r < 79)
                                                        4&#160;&starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_cs_2_r >= 60 && $total_peratus_cs_2_r < 69)
                                                        3&#160;&starf; &starf; &starf;
                                                    @elseif ($total_peratus_cs_2_r >= 50 && $total_peratus_cs_2_r < 59)
                                                        2&#160;&starf; &starf; 
                                                    @elseif ($total_peratus_cs_2_r >= 40 && $total_peratus_cs_2_r <49)
                                                        1&#160;&starf;
                                                    @elseif ($total_peratus_cs_2_r <39)
                                                        0&#160;&starf;                                                                                            
                                                    @endif
                                                </span>
                                                @elseif($projek->kategori == "GPSS Bangunan 3")
                                                <span class="star">
                                                    @if ($total_peratus_cs_3_r >= 80)
                                                        5&#160;&starf; &starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_cs_3_r >= 70 && $total_peratus_cs_3_r < 79)
                                                        4&#160;&starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_cs_3_r >= 60 && $total_peratus_cs_3_r < 69)
                                                        3&#160;&starf; &starf; &starf;
                                                    @elseif ($total_peratus_cs_3_r >= 50 && $total_peratus_cs_3_r < 59)
                                                        2&#160;&starf; &starf; 
                                                    @elseif ($total_peratus_cs_3_r >= 40 && $total_peratus_cs_3_r <49)
                                                        1&#160;&starf;
                                                    @elseif ($total_peratus_cs_3_r <39)
                                                        0&#160;&starf;                                                                                            
                                                    @endif
                                                </span>
                                                @endif
                                            </th>
                                            <th>
                                                @if($projek->kategori == "GPSS Bangunan 1")
                                                <span class="star">
                                                    @if ($total_peratus_pad_1_r >= 80)
                                                        5&#160;&starf; &starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_pad_1_r >= 70 && $total_peratus_pad_1_r < 79)
                                                        4&#160;&starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_pad_1_r >= 60 && $total_peratus_pad_1_r < 69)
                                                        3&#160;&starf; &starf; &starf;
                                                    @elseif ($total_peratus_pad_1_r >= 50 && $total_peratus_pad_1_r < 59)
                                                        2&#160;&starf; &starf; 
                                                    @elseif ($total_peratus_pad_1_r >= 40 && $total_peratus_pad_1_r <49)
                                                        1&#160;&starf;
                                                    @elseif ($total_peratus_pad_1_r <39)
                                                        0&#160;&starf;                                                                                            
                                                    @endif
                                                </span>
                                                @elseif($projek->kategori == "GPSS Bangunan 2")
                                                <span class="star">
                                                    @if ($total_peratus_pad_2_r >= 80)
                                                        5&#160;&starf; &starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_pad_2_r >= 70 && $total_peratus_pad_2_r < 79)
                                                        4&#160;&starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_pad_2_r >= 60 && $total_peratus_pad_2_r < 69)
                                                        3&#160;&starf; &starf; &starf;
                                                    @elseif ($total_peratus_pad_2_r >= 50 && $total_peratus_pad_2_r < 59)
                                                        2&#160;&starf; &starf; 
                                                    @elseif ($total_peratus_pad_2_r >= 40 && $total_peratus_pad_2_r <49)
                                                        1&#160;&starf;
                                                    @elseif ($total_peratus_pad_2_r <39)
                                                        0&#160;&starf;                                                                                            
                                                    @endif
                                                </span>
                                                @elseif($projek->kategori == "GPSS Bangunan 3")
                                                <span class="star">
                                                    @if ($total_peratus_pad_3_r >= 80)
                                                        5&#160;&starf; &starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_pad_3_r >= 70 && $total_peratus_pad_3_r < 79)
                                                        4&#160;&starf; &starf; &starf; &starf;
                                                    @elseif ($total_peratus_pad_3_r >= 60 && $total_peratus_pad_3_r < 69)
                                                        3&#160;&starf; &starf; &starf;
                                                    @elseif ($total_peratus_pad_3_r >= 50 && $total_peratus_pad_3_r < 59)
                                                        2&#160;&starf; &starf; 
                                                    @elseif ($total_peratus_pad_3_r >= 40 && $total_peratus_pad_3_r <49)
                                                        1&#160;&starf;
                                                    @elseif ($total_peratus_pad_3_r <39)
                                                        0&#160;&starf;                                                                                            
                                                    @endif
                                                </span>
                                                @endif
                                            </th>
                                        </tr>
                
                                        <tr>
                                            <th>GPSS Star (Jalan)</th>
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
                                        <th>MyCREST</th>
                                        <th>
                                            <input type="hidden" name="fasa" value="rekabentuk">
                                            @if($projek->kategori == "GPSS Bangunan 1")
                                            <span>
                                                @if ($total_peratus_crest_ds_1_r >= 80)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_ds_1_r >= 70 && $total_peratus_crest_ds_1_r < 79)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_ds_1_r >= 60 && $total_peratus_crest_ds_1_r < 69)
                                                        2&#160;Points
                                                    @elseif ($total_peratus_crest_ds_1_r >= 50 && $total_peratus_crest_ds_1_r < 59)
                                                        2&#160;Points 
                                                    @elseif ($total_peratus_crest_ds_1_r >= 40 && $total_peratus_crest_ds_1_r <49)
                                                        1&#160;Points  
                                                    @elseif ($total_peratus_crest_ds_1_r <39)
                                                        0&#160;Point                                                                                          
                                                @endif
                                            </span>
                                            @elseif($projek->kategori == "GPSS Bangunan 2")
                                            <span>
                                                @if ($total_peratus_crest_ds_2_r >= 80)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_ds_2_r >= 70 && $total_peratus_crest_ds_2_r < 79)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_ds_2_r >= 60 && $total_peratus_crest_ds_2_r < 69)
                                                        2&#160;Points
                                                    @elseif ($total_peratus_crest_ds_2_r >= 50 && $total_peratus_crest_ds_2_r < 59)
                                                        2&#160;Points 
                                                    @elseif ($total_peratus_crest_ds_2_r >= 40 && $total_peratus_crest_ds_2_r <49)
                                                        1&#160;Points  
                                                    @elseif ($total_peratus_crest_ds_2_r <39)
                                                        0&#160;Point                                                                                          
                                                @endif
                                            </span>
                                            @elseif($projek->kategori == "GPSS Bangunan 3")
                                            <span>
                                                @if ($total_peratus_crest_ds_3_r >= 80)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_ds_3_r >= 70 && $total_peratus_crest_ds_3_r < 79)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_ds_3_r >= 60 && $total_peratus_crest_ds_3_r < 69)
                                                        2&#160;Points
                                                    @elseif ($total_peratus_crest_ds_3_r >= 50 && $total_peratus_crest_ds_3_r < 59)
                                                        2&#160;Points 
                                                    @elseif ($total_peratus_crest_ds_3_r >= 40 && $total_peratus_crest_ds_3_r <49)
                                                        1&#160;Points  
                                                    @elseif ($total_peratus_crest_ds_3_r <39)
                                                        0&#160;Point                                                                                          
                                                @endif
                                            </span>
                                            @endif
                                        </th>
                                        <th>
                                            @if($projek->kategori == "GPSS Bangunan 1")
                                            <span>
                                                @if ($total_peratus_crest_cs_1_r >= 80)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_cs_1_r >= 70 && $total_peratus_crest_cs_1_r < 79)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_cs_1_r >= 60 && $total_peratus_crest_cs_1_r < 69)
                                                        2&#160;Points
                                                    @elseif ($total_peratus_crest_cs_1_r >= 50 && $total_peratus_crest_cs_1_r < 59)
                                                        2&#160;Points 
                                                    @elseif ($total_peratus_crest_cs_1_r >= 40 && $total_peratus_crest_cs_1_r <49)
                                                        1&#160;Points  
                                                    @elseif ($total_peratus_crest_cs_1_r <39)
                                                        0&#160;Point                                                                                          
                                                @endif
                                            </span>
                                            @elseif($projek->kategori == "GPSS Bangunan 2")
                                            <span>
                                                @if ($total_peratus_crest_cs_2_r >= 80)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_cs_2_r >= 70 && $total_peratus_crest_cs_2_r < 79)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_cs_2_r >= 60 && $total_peratus_crest_cs_2_r < 69)
                                                        2&#160;Points
                                                    @elseif ($total_peratus_crest_cs_2_r >= 50 && $total_peratus_crest_cs_2_r < 59)
                                                        2&#160;Points 
                                                    @elseif ($total_peratus_crest_cs_2_r >= 40 && $total_peratus_crest_cs_2_r <49)
                                                        1&#160;Points  
                                                    @elseif ($total_peratus_crest_cs_2_r <39)
                                                        0&#160;Point                                                                                          
                                                @endif
                                            </span>
                                            @elseif($projek->kategori == "GPSS Bangunan 3")
                                            <span>
                                                @if ($total_peratus_crest_cs_3_r >= 80)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_cs_3_r >= 70 && $total_peratus_crest_cs_3_r < 79)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_cs_3_r >= 60 && $total_peratus_crest_cs_3_r < 69)
                                                        2&#160;Points
                                                    @elseif ($total_peratus_crest_cs_3_r >= 50 && $total_peratus_crest_cs_3_r < 59)
                                                        2&#160;Points 
                                                    @elseif ($total_peratus_crest_cs_3_r >= 40 && $total_peratus_crest_cs_3_r <49)
                                                        1&#160;Points  
                                                    @elseif ($total_peratus_crest_cs_3_r <39)
                                                        0&#160;Point                                                                                          
                                                @endif
                                            </span>
                                            @endif
                                        </th>
                                        <th>
                                            @if($projek->kategori == "GPSS Bangunan 1")
                                            <span>
                                                @if ($total_peratus_crest_pad_1_r >= 80)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_pad_1_r >= 70 && $total_peratus_crest_pad_1_r < 79)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_pad_1_r >= 60 && $total_peratus_crest_pad_1_r < 69)
                                                        2&#160;Points
                                                    @elseif ($total_peratus_crest_pad_1_r >= 50 && $total_peratus_crest_pad_1_r < 59)
                                                        2&#160;Points 
                                                    @elseif ($total_peratus_crest_pad_1_r >= 40 && $total_peratus_crest_pad_1_r <49)
                                                        1&#160;Points  
                                                    @elseif ($total_peratus_crest_pad_1_r <39)
                                                        0&#160;Point                                                                                          
                                                @endif
                                            </span>
                                            @elseif($projek->kategori == "GPSS Bangunan 2")
                                            <span>
                                                @if ($total_peratus_crest_pad_2_r >= 80)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_pad_2_r >= 70 && $total_peratus_crest_pad_2_r < 79)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_pad_2_r >= 60 && $total_peratus_crest_pad_2_r < 69)
                                                        2&#160;Points
                                                    @elseif ($total_peratus_crest_pad_2_r >= 50 && $total_peratus_crest_pad_2_r < 59)
                                                        2&#160;Points 
                                                    @elseif ($total_peratus_crest_pad_2_r >= 40 && $total_peratus_crest_pad_2_r <49)
                                                        1&#160;Points  
                                                    @elseif ($total_peratus_crest_pad_2_r <39)
                                                        0&#160;Point                                                                                          
                                                @endif
                                            </span>
                                            @elseif($projek->kategori == "GPSS Bangunan 3")
                                            <span>
                                                @if ($total_peratus_crest_pad_3_r >= 80)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_pad_3_r >= 70 && $total_peratus_crest_pad_3_r < 79)
                                                        3&#160;Points
                                                    @elseif ($total_peratus_crest_pad_3_r >= 60 && $total_peratus_crest_pad_3_r < 69)
                                                        2&#160;Points
                                                    @elseif ($total_peratus_crest_pad_3_r >= 50 && $total_peratus_crest_pad_3_r < 59)
                                                        2&#160;Points 
                                                    @elseif ($total_peratus_crest_pad_3_r >= 40 && $total_peratus_crest_pad_3_r <49)
                                                        1&#160;Points  
                                                    @elseif ($total_peratus_crest_pad_3_r <39)
                                                        0&#160;Point                                                                                          
                                                @endif
                                            </span>
                                            @endif
                                        </th>
                                        </tr>
                                    </tbody> 
                                </table>
                                @role('sekretariat')
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        <a href="#" class="btn btn-primary">Jana Keputusan</a>
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
                    @endif
                    @endrole
                    
                </div><!--tab content-->
            </div><!--tab-->
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.css"></script>

<script>
    kriteriaRekabentuk();
    kriteriaVerifikasi();
    kriteriaRayuan();

    function kriteriaRekabentuk() {
        var lols = {!! $rekabentuk_kriterias !!}
        // console.log(lols);
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

<script>
    $(document).ready(function(){
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });
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