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
                            <h5 class="h6">Jenis Perolehan:</h5>
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
                @role('sekretariat|ketua-pasukan|penolong-ketua-pasukan')
                <div class="col mx-3 my-3">
                    @role('sekretariat')
                    <form action="/projek/{{$projek->id}}/sah" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($projek->status == "Menunggu Pengesahan Sekretariat")
                            <button class="btn btn-primary mx-3 my-3" name="sah_projek" value="sah" type="submit">Sah Projek</button>
                        {{-- @elseif ($projek->status == "Proses Pengisian Skor Rekabentuk Bangunan")
                            <button class="btn btn-primary mx-3 my-3" type="submit">Pengisian Skor Rekabentuk Bangunan Sudah Diproses</button> --}}
                        {{-- @elseif ($projek->status == "Dalam Pengesahan Skor Rekabentuk Bangunan")
                            <button class="btn btn-primary mx-3 my-3" type="submit">Skor Rekabentuk Bangunan Sudah Selesai</button> --}}
                        @elseif ($projek->status == "Selesai Pengesahan Rekabentuk Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Pengesahan Rekabentuk Bangunan</button>
                        @elseif ($projek->status == "Proses Pengisian Skor Verifikasi Permarkahan Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Proses Pengisian Skor Verifikasi Permarkahan Bangunan</button>
                        @elseif ($projek->status == "Dalam Pengesahan Skor Verifikasi Permarkahan Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Dalam Pengesahan Skor Verifikasi Permarkahan Bangunan</button>
                        @elseif ($projek->status == "Selesai Pengesahan Verifikasi Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Pengesahan Verifikasi Bangunan</button>
                        @elseif ($projek->status == "Proses Pengisian Skor Validasi Permarkahan Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Proses Pengisian Skor Validasi Permarkahan Bangunan</button>
                        @elseif ($projek->status == "Dalam Pengesahan Skor Validasi Permarkahan Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Dalam Pengesahan Skor Validasi Permarkahan Bangunan</button>
                        @elseif ($projek->status == "Selesai Pengesahan Validasi Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Pengesahan Validasi Bangunan</button>
                        @endif
                    </form>
                    {{-- <form action="/projek/{{$projek->id}}/sah-eph-rayuan">
                        @if ($projek->status == "Proses Rayuan Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Proses Rayuan Bangunan</button>
                        @elseif ($projek->status == "Dalam Pengesahan Rayuan Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Pengesahan Rayuan Bangunan</button>
                        @elseif ($projek->status == "Selesai Pengesahan Rayuan Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Rayuan Bangunan</button> --}}
                        {{-- @elseif ($projek->status == "Selesai Rayuan Bangunan")    
                            <button class="btn btn-primary mx-3 my-3" type="submit">Selesai Rayuan Bangunan</button> --}}
                        {{-- @endif
                    </form> --}}
                    @endrole
                    @role('ketua-pasukan|pentadbir|sekretariat')
                        <button class="btn btn-primary mx-3 my-3" onclick="printJS('maklumat-projek', 'html')">Muat Turun</button>
                    @endrole  
                    <form action="/projek/{{$projek->id}}/sah-eph-rayuan" method="POST" enctype="multipart/form-data">
                        @csrf
                        @role('ketua-pasukan|penolong-ketua-pasukan')
                        @if($projek->status == "Selesai Pengesahan Validasi Bangunan")
                            <button class="btn btn-primary mx-3 my-3" type="submit">Membuat Rayuan Bangunan</button>
                        @endif
                        @endrole
                        {{-- @role('sekretariat')
                        @if ($projek->status == "Proses Rayuan Bangunan")
                            <button class="btn btn-primary mx-3 my-3" type="submit">Sahkan Proses Pengisian Rayuan Bangunan</button>
                        @endif
                        @endrole --}}
                    </form>
                </div>
                @endrole                  
            </div>
        </div>

        @if($projek->status == "Proses Pengisian Skor Rekabentuk Bangunan" ||
            $projek->status == "Dalam Pengesahan Skor Rekabentuk Bangunan" ||
            $projek->status == "Selesai Pengesahan Rekabentuk Bangunan" ||
            $projek->status == "Proses Pengisian Skor Verifikasi Permarkahan Bangunan" ||
            $projek->status == "Dalam Pengesahan Skor Verifikasi Permarkahan Bangunan" ||
            $projek->status == "Selesai Pengesahan Verifikasi Bangunan" ||
            $projek->status == "Proses Pengisian Skor Validasi Permarkahan Bangunan" ||
            $projek->status == "Dalam Pengesahan Skor Validasi Permarkahan Bangunan" ||
            $projek->status == "Selesai Pengesahan Validasi Bangunan" ||
            $projek->status == "Proses Rayuan Bangunan" ||
            $projek->status == "Dalam Pengesahan Rayuan Bangunan" ||
            $projek->status == "Selesai Pengesahan Rayuan Bangunan")
            {{-- @if ($user_role->role->name == 'ketua-pasukan' || $user_role->role->name == 'penolong-ketua-pasukan') --}}
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
                                            <option value=3>Ketua Pasukan</option>
                                            <option value=4>Penolong Ketua Pasukan</option>
                                            @if($projek->status == "Proses Pengisian Skor Validasi Permarkahan Bangunan")
                                            <option value=9>Ketua Pasukan Validasi</option>
                                            <option value=10>Pasukan Validasi</option>
                                            @endif
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
            {{-- @endif --}}

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
                                    <td style="text-align: center; vertical-align: middle;">
                                        {{ $lantikan->role->display_name }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            @endif
        @endif
    </div>

    @if (!$lantikans->isEmpty())
        @if($projek->status == "Proses Pengisian Skor Rekabentuk Bangunan" ||
            $projek->status == "Dalam Pengesahan Skor Rekabentuk Bangunan" ||
            $projek->status == "Selesai Pengesahan Rekabentuk Bangunan" ||
            $projek->status == "Proses Pengisian Skor Verifikasi Permarkahan Bangunan" ||
            $projek->status == "Dalam Pengesahan Skor Verifikasi Permarkahan Bangunan" ||
            $projek->status == "Selesai Pengesahan Verifikasi Bangunan" ||
            $projek->status == "Proses Pengisian Skor Validasi Permarkahan Bangunan" ||
            $projek->status == "Dalam Pengesahan Skor Validasi Permarkahan Bangunan" ||
            $projek->status == "Selesai Pengesahan Validasi Bangunan" ||
            $projek->status == "Proses Rayuan Bangunan" ||
            $projek->status == "Dalam Pengesahan Rayuan Bangunan" ||
            $projek->status == "Selesai Pengesahan Rayuan Bangunan")
            <div class="tab mt-6">
                <ul class="nav nav-tabs" role="tablist">
                    @if($projek->status == "Proses Pengisian Skor Rekabentuk Bangunan")
                    @role('pemudah-cara|ketua-pemudah-cara')
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab-1" data-bs-toggle="tab" role="tab">Rekabentuk</a>
                    </li>
                    @endrole
                    @endif
                    @if($projek->status == "Proses Pengisian Skor Verifikasi Permarkahan Bangunan")
                    @role('pemudah-cara|ketua-pemudah-cara')
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab-2" data-bs-toggle="tab" role="tab">Verifikasi</a>
                    </li>
                    @endrole
                    @endif
                    @if($peratusan_mv >= 65 && $peratusan_mv < 80 || $peratusan_ml >= 80)
                    @role('pasukan-validasi|ketua-pasukan-validasi')
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab-3" data-bs-toggle="tab" role="tab">Validasi</a>
                    </li>
                    @endrole
                    @endif
                    @role('ketua-pasukan|penolong-ketua-pasukan')
                    @if($projek->status == "Proses Rayuan Bangunan")
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab-4" data-bs-toggle="tab" role="tab">Rayuan</a>
                    </li>
                    @endif
                    @endrole
                    @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-5" data-bs-toggle="tab" role="tab">Sijil</a>
                        </li>
                    @endrole
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-6" data-bs-toggle="tab" role="tab">Skor Kad</a>
                    </li>
                    @if($projek->status == "Proses Rayuan Bangunan" || $projek->status == "Dalam Pengesahan Rayuan Bangunan" || $projek->status == "Selesai Rayuan Bangunan")
                    @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-8" data-bs-toggle="tab" role="tab">Skor Kad Rayuan</a>
                    </li>
                    @endrole
                    @endif
                    @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat|ketua-pemudah-cara|pemudah-cara|ketua-pasukan-validasi|pasukan-validasi')
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-7" data-bs-toggle="tab" role="tab">Rumusan Skor Kad</a>
                    </li>
                    @endrole
                    @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                    <li class="nav-item">
                        @if($projek->status == "Proses Rayuan Bangunan" || $projek->status == "Dalam Pengesahan Rayuan Bangunan" || $projek->status == "Selesai Rayuan Bangunan")
                        <a class="nav-link" href="#tab-9" data-bs-toggle="tab" role="tab">Rumusan Skor Kad Rayuan</a>
                        @endif
                    </li>
                    @endrole
                </ul>
                <div class="tab-content">
                    <!--REKABENTUK BANGUNAN-->
                    @if($projek->status == "Proses Pengisian Skor Rekabentuk Bangunan")
                    @role('pemudah-cara|ketua-pemudah-cara')
                    <div class="tab-pane active" id="tab-1" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body">
                                <form action="/projek/{{ $projek->id }}/markah" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="fasa" value="rekabentuk">
                                    <h4 class="mb-3">PENILAIAN REKABENTUK BANGUNAN</h4>
                                    <div class="row mx-3 mb-2">
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Kriteria:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <select class="form-select form-control" id="kriteriaRekabentukDipilih"
                                                name="kriteria" onchange="kriteriaRekabentuk()">
                                                @foreach ($rekabentuk_kriterias as $akriteria)
                                                    <option value="{{ $akriteria->id }}">{{ $akriteria->kod }} -
                                                        {{ $akriteria->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Info kriteria:</label>
                                        </div>
                                        <div class="col-7 mb-2" id="infoKriteriaRekabentukDipilih">
                                        </div>
                                        {{-- <div class="col-5 mb-2">
                                            <label class="col-form-label">Markah Maksimum:</label>
                                        </div>
                                        <div class="col-7 mb-2" id="infoKriteriaRekabentukMaksimum">
                                        </div> --}}
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Markah:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" type="number" name="markah" required>
                                        </div>
                                        {{-- Untuk KT9 --}}
                                        @if ($projek->kategori == 'phJKR Bangunan Baru C' || $projek->kategori == 'phJKR Bangunan Baru D'
                                            || $projek->kategori == 'phJKR Bangunan PUN C' || $projek->kategori == 'phJKR Bangunan PUN D'
                                            || $projek->kategori == 'phJKR Bangunan Sedia Ada C' || $projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Markah BEI:</label>
                                        </div>
                                        @endif
                                        @if ($projek->kategori == 'phJKR Bangunan Baru C' || $projek->kategori == 'phJKR Bangunan Baru D'
                                            || $projek->kategori == 'phJKR Bangunan PUN C' || $projek->kategori == 'phJKR Bangunan PUN D'
                                            || $projek->kategori == 'phJKR Bangunan Sedia Ada C' || $projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                        <div class="col-7 mb-2">
                                            <input class="form-control" type="number" name="markah_bei" oninput="input(this)" required>
                                        </div>
                                        @endif
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Ulasan:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <textarea class="form-control" rows="3" placeholder="Ulasan" name="ulasan" required></textarea>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Dokumen Sokongan:</label>
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
                                                <button class="btn btn-primary" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endrole
                    @endif

                    <!--VERIFIKASI BANGUNAN-->
                    @if($projek->status == "Proses Pengisian Skor Verifikasi Permarkahan Bangunan")
                    @role('pemudah-cara|ketua-pemudah-cara')
                    <div class="tab-pane active" id="tab-2" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body">
                                <form action="/projek/{{ $projek->id }}/markah" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="fasa" value="verifikasi">
                                    <h4 class="mb-3">VERIFIKASI BANGUNAN</h4>
                                    <div class="row mx-3 mb-2">
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Kriteria:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <select class="form-select form-control" id="kriteriaVerifikasiDipilih"
                                                name="kriteria" onchange="kriteriaVerifikasi()">
                                                @foreach ($verifikasi_kriterias as $akriteria)
                                                    <option value="{{ $akriteria->id }}">{{ $akriteria->kod }} -
                                                        {{ $akriteria->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Info kriteria:</label>
                                        </div>
                                        <div class="col-7 mb-2" id="infoKriteriaVerifikasiDipilih">
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Markah:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input type="hidden" name="fasa" value="verifikasi">
                                            <input class="form-control" type="number" name="markah" required>
                                        </div>
                                        {{-- Untuk KT9 --}}
                                        @if ($projek->kategori == 'phJKR Bangunan Baru C' || $projek->kategori == 'phJKR Bangunan Baru D'
                                            || $projek->kategori == 'phJKR Bangunan PUN C' || $projek->kategori == 'phJKR Bangunan PUN D'
                                            || $projek->kategori == 'phJKR Bangunan Sedia Ada C' || $projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Markah BEI:</label>
                                        </div>
                                        @endif
                                        @if ($projek->kategori == 'phJKR Bangunan Baru C' || $projek->kategori == 'phJKR Bangunan Baru D'
                                            || $projek->kategori == 'phJKR Bangunan PUN C' || $projek->kategori == 'phJKR Bangunan PUN D'
                                            || $projek->kategori == 'phJKR Bangunan Sedia Ada C' || $projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                        <div class="col-7 mb-2">
                                            <input class="form-control" type="number" name="markah_bei" oninput="input(this)" required>
                                        </div>
                                        @endif
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Ulasan:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <textarea class="form-control" rows="3" placeholder="Ulasan" name="ulasan" required></textarea>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Dokumen Sokongan:</label>
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
                                                <button class="btn btn-primary" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endrole
                    @endif

                    <!--VALIDASI BANGUNAN-->
                    @if($peratusan_mv >= 65 && $peratusan_mv < 80 || $peratusan_mv >= 80)
                    @role('pasukan-validasi|ketua-pasukan-validasi')
                    <div class="tab-pane active" id="tab-3" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body">
                                <form action="/projek/{{ $projek->id }}/markah" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="fasa" value="validasi">
                                    <h4 class="mb-3">VALIDASI BANGUNAN</h4>
                                    <div class="row mx-3 mb-2">
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Kriteria:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <select class="form-select form-control" id="kriteriaValidasiDipilih"
                                                name="kriteria" onchange="kriteriaValidasi()">
                                                @foreach ($validasi_kriterias as $akriteria)
                                                    <option value="{{ $akriteria->id }}">{{ $akriteria->kod }} -
                                                        {{ $akriteria->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Info kriteria:</label>
                                        </div>
                                        <div class="col-7 mb-2" id="infoKriteriaValidasiDipilih">
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Markah:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input type="hidden" name="fasa" value="validasi">
                                            <input class="form-control" type="number" name="markah" required>
                                        </div>
                                        @if ($projek->kategori == 'phJKR Bangunan Baru C' || $projek->kategori == 'phJKR Bangunan Baru D'
                                            || $projek->kategori == 'phJKR Bangunan PUN C' || $projek->kategori == 'phJKR Bangunan PUN D'
                                            || $projek->kategori == 'phJKR Bangunan Sedia Ada C' || $projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Markah BEI:</label>
                                        </div>
                                        @endif
                                        @if ($projek->kategori == 'phJKR Bangunan Baru C' || $projek->kategori == 'phJKR Bangunan Baru D'
                                            || $projek->kategori == 'phJKR Bangunan PUN C' || $projek->kategori == 'phJKR Bangunan PUN D'
                                            || $projek->kategori == 'phJKR Bangunan Sedia Ada C' || $projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                        <div class="col-7 mb-2">
                                            <input class="form-control" type="number" name="markah_bei" oninput="input(this)" required>
                                        </div>
                                        @endif
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Ulasan:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <textarea class="form-control" rows="3" placeholder="Ulasan" name="ulasan" required></textarea>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Dokumen Sokongan:</label>
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
                                                <button class="btn btn-primary" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endrole
                    @endif

                    <!--RAYUAN EPH BANGUNAN-->
                    @role('ketua-pasukan|penolong-ketua-pasukan')
                    @if($projek->status == "Proses Rayuan Bangunan")
                    <div class="tab-pane active" id="tab-4" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body">
                                <form action="/projek/{{ $projek->id }}/markah-eph-rayuan" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="mb-3">RAYUAN</h4>
                                    <div class="row mx-3 mb-2">
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Kriteria:</label>
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
                                            <label class="col-form-label">Info kriteria:</label>
                                        </div>
                                        <div class="col-7 mb-2" id="infoKriteriaRayuanDipilih">
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Markah Rekabentuk:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input type="hidden" name="fasa" value="rekabentuk">
                                            <input class="form-control" type="number" name="markah_rekabentuk" required>
                                        </div>
                                        @if ($projek->kategori == 'phJKR Bangunan Baru C' || $projek->kategori == 'phJKR Bangunan Baru D'
                                            || $projek->kategori == 'phJKR Bangunan PUN C' || $projek->kategori == 'phJKR Bangunan PUN D'
                                            || $projek->kategori == 'phJKR Bangunan Sedia Ada C' || $projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Markah BEI (Rekabentuk):</label>
                                        </div>
                                        @endif
                                        @if ($projek->kategori == 'phJKR Bangunan Baru C' || $projek->kategori == 'phJKR Bangunan Baru D'
                                            || $projek->kategori == 'phJKR Bangunan PUN C' || $projek->kategori == 'phJKR Bangunan PUN D'
                                            || $projek->kategori == 'phJKR Bangunan Sedia Ada C' || $projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                        <div class="col-7 mb-2">
                                            <input class="form-control" type="number" nama="markah_bei_rekabentuk" oninput="input(this)" required>
                                        </div>
                                        @endif
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Markah Verifikasi:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input type="hidden" name="fasa" value="verifikasi">
                                            <input class="form-control" type="number" name="markah_verifikasi" required>
                                        </div>
                                        @if ($projek->kategori == 'phJKR Bangunan Baru C' || $projek->kategori == 'phJKR Bangunan Baru D'
                                            || $projek->kategori == 'phJKR Bangunan PUN C' || $projek->kategori == 'phJKR Bangunan PUN D'
                                            || $projek->kategori == 'phJKR Bangunan Sedia Ada C' || $projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Markah BEI (Verifikasi):</label>
                                        </div>
                                        @endif
                                        @if ($projek->kategori == 'phJKR Bangunan Baru C' || $projek->kategori == 'phJKR Bangunan Baru D'
                                            || $projek->kategori == 'phJKR Bangunan PUN C' || $projek->kategori == 'phJKR Bangunan PUN D'
                                            || $projek->kategori == 'phJKR Bangunan Sedia Ada C' || $projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                        <div class="col-7 mb-2">
                                            <input type="hidden" name="fasa" value="verifikasi">
                                            <input class="form-control" type="number" nama="markah_bei_verifikasi" oninput="input(this)" required>
                                        </div>
                                        @endif
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Markah Validasi:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input type="hidden" name="fasa" value="validasi">
                                            <input class="form-control" type="number" name="markah_validasi" required>
                                        </div>
                                        @if ($projek->kategori == 'phJKR Bangunan Baru C' || $projek->kategori == 'phJKR Bangunan Baru D'
                                            || $projek->kategori == 'phJKR Bangunan PUN C' || $projek->kategori == 'phJKR Bangunan PUN D'
                                            || $projek->kategori == 'phJKR Bangunan Sedia Ada C' || $projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Markah BEI (Validasi):</label>
                                        </div>
                                        @endif
                                        @if ($projek->kategori == 'phJKR Bangunan Baru C' || $projek->kategori == 'phJKR Bangunan Baru D'
                                            || $projek->kategori == 'phJKR Bangunan PUN C' || $projek->kategori == 'phJKR Bangunan PUN D'
                                            || $projek->kategori == 'phJKR Bangunan Sedia Ada C' || $projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                        <div class="col-7 mb-2">
                                            <input type="hidden" name="fasa" value="validasi">
                                            <input class="form-control" type="number" nama="markah_bei_validasi" required>
                                        </div>
                                        @endif
                                        @role('ketua-pasukan|penolong-ketua-pasukan')
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Ulasan Rayuan:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input type="hidden" name="fasa" value="validasi">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ulasan Rayuan" name="ulasan" required></textarea>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label class="col-form-label">Dokumen Rayuan:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" type="file" name="dokumen1" required>
                                            <input class="form-control" type="file" name="dokumen2">
                                            <input class="form-control" type="file" name="dokumen3">
                                            <input class="form-control" type="file" name="dokumen4">
                                            <input class="form-control" type="file" name="dokumen5">
                                        </div>
                                        @endrole
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <button class="btn btn-primary" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endrole

                    <!--SIJIL EPH BANGUNAN-->
                    @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                    <div class="tab-pane" id="tab-5" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h4>SIJIL ePHJKR BANGUNAN</h4>
                                @role('ketua-pasukan|penolong-ketua-pasukan')
                                    <div class="col text-center">
                                        <a class="btn btn-primary" href="/projek/{{ $projek->id }}/sijil-eph-bangunan">Muat Turun</a>
                                    </div>
                                @endrole
                                @role('sekretariat')
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        <button class="btn btn-primary" type="submit">Jana Sijil</button>
                                    </div>
                                </div>
                                @endrole
                            </div>
                        </div>
                    </div>
                    @endrole

                    <!--SKOR KAD EPH BANGUNAN-->
                    <div class="tab-pane" id="tab-6" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body" id="skor_kad">
                                <h4 class="h4 mb-3">SKOR KAD EPH BANGUNAN</h4>
                                <div class="table-responsive scrollbar">
                                    <table class="table table-bordered skor-datatable line-table display">
                                        <thead class="text-white">
                                            <tr class="pg-1" align="center" style="background-color:#EB5500">
                                                @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                    <th colspan="14">Pembangunan Baru A</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                    <th colspan="14">Pembangunan Baru B</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                    <th colspan="15">Pembangunan Baru C</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                    <th colspan="15">Pembangunan Baru D</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                    <th colspan="14">Pembangunan PUN A</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                    <th colspan="14">Pembangunan PUN B</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                    <th colspan="15">Pembangunan PUN C</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                    <th colspan="15">Pembangunan PUN D</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                    <th colspan="14">Pembangunan Sedia Ada A</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                    <th colspan="15">Pembangunan Sedia Ada B</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                    <th colspan="15">Pembangunan Sedia Ada C</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                    <th colspan="15">Pembangunan Sedia Ada D</th>
                                                @endif
                                            </tr>
                                            <tr class="pg-1" align="center" style="background-color:#EB5500">
                                                <th>Kod</th>
                                                <th>Kriteria</th>
                                                <th>Fasa</th>
                                                <th>Markah Terkini</th>
                                                {{-- @if ($projek->kategori == 'phJKR Bangunan Baru C' || $projek->kategori == 'phJKR Bangunan Baru D'
                                                || $projek->kategori == 'phJKR Bangunan PUN C' || $projek->kategori == 'phJKR Bangunan PUN D'
                                                || $projek->kategori == 'phJKR Bangunan Sedia Ada C' || $projek->kategori == 'phJKR Bangunan Sedia Ada D') --}}
                                                <th>Markah BEI (Untuk KT9 Sahaja)</th>
                                                {{-- @endif --}}
                                                <th>Ulasan/Maklumbalas</th>
                                                <th>Dokumen Sokongan</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    @role('sekretariat')
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <input type="hidden" name="fasa" value="rekabentuk">
                                                <button class="btn btn-primary">Sah</button>
                                            </div>
                                        </div>
                                    @endrole
                                </div>
                                @role('ketua-pemudah-cara|pemudah-cara')
                                    <div class="row mt-3">
                                        <div class="col text-center">
                                            @if($projek->status == "Proses Pengisian Skor Rekabentuk Bangunan")
                                            <a href="/projek/{{ $projek->id }}/pengesahan-penilaian" class="btn btn-primary" name="hantar_skorkad" value="hantar" type="submit">Hantar</a>
                                            @elseif($projek->status == "Proses Pengisian Skor Verifikasi Permarkahan Bangunan")
                                            <a href="/projek/{{ $projek->id }}/pengesahan-penilaian" class="btn btn-primary" name="hantar_skorkad" value="hantar" type="submit">Hantar</a>
                                            @endif
                                        </div>
                                    </div>
                                @endrole
                                @role('ketua-pasukan|penolong-ketua-pasukan')
                                <div class="row mt-3">
                                    <div class="col text-center">
                                        <button class="btn btn-primary" onclick="printJS('skor_kad', 'html')">Muat Turun</button>
                                    </div>
                                </div>
                                @endrole
                            </div>
                        </div>
                    </div>

                    <!--SKOR KAD RAYUAN EPH BANGUNAN-->
                    @if($projek->status == "Proses Rayuan Bangunan" || $projek->status == "Dalam Pengesahan Rayuan Bangunan" || $projek->status == "Selesai Rayuan Bangunan")
                    @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                    <div class="tab-pane" id="tab-8" role="tabpanel">
                        <div class="card mt-3">
                            <div class="card-body" id="skor-kad-1">
                                <h4 class="h4 mb-3">SKOR KAD RAYUAN EPH BANGUNAN</h4>
                                <div class="table-responsive scrollbar">
                                    <table id="SkorKad" class="table table-bordered skor-datatable-1 line-table display">
                                        <thead class="text-white">
                                            <tr class="pg-1" align="center" style="background-color:#EB5500">
                                                @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                    <th colspan="11">Pembangunan Baru A</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                    <th colspan="11">Pembangunan Baru B</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                    <th colspan="11">Pembangunan Baru C</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                    <th colspan="11">Pembangunan Baru D</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                    <th colspan="11">Pembangunan PUN A</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                    <th colspan="11">Pembangunan PUN B</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                    <th colspan="11">Pembangunan PUN C</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                    <th colspan="11">Pembangunan PUN D</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                    <th colspan="11">Pembangunan Sedia Ada A</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                    <th colspan="11">Pembangunan Sedia Ada B</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                    <th colspan="11">Pembangunan Sedia Ada C</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                    <th colspan="11">Pembangunan Sedia Ada D</th>
                                                @endif
                                            </tr>
                                            <tr class="pg-1" align="center" style="background-color:#EB5500">
                                                <th>Kod</th>
                                                <th>Kriteria</th>
                                                <th>Fasa</th>
                                                <th>Markah Rayuan (Rekabentuk)</th>
                                                <th>Markah Rayuan (Rekabentuk - KT9)</th>
                                                <th>Markah Rayuan (Verifikasi)</th>
                                                <th>Markah Rayuan (Verifikasi - KT9)</th>
                                                <th>Markah Rayuan (Validasi)</th>
                                                <th>Markah Rayuan (Validasi - KT9)</th>
                                                <th>Ulasan Rayuan</th>
                                                <th>Dokumen Rayuan</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    @role('sekretariat')
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <input type="hidden" name="fasa" value="rekabentuk">
                                                @if($projek->status == "Dalam Pengesahan Rayuan Bangunan")
                                                <button class="btn btn-primary">Sah</button>
                                                @endif
                                            </div>
                                        </div>
                                    @endrole
                                    @role('ketua-pasukan|penolong-ketua-pasukan')
                                    @if($projek->status == "Proses Rayuan Bangunan")
                                        <div class="row mt-3">
                                            {{-- @if($projek->fasa == "rekabentuk") --}}
                                            <div class="col text-center">
                                                <input type="hidden" name="fasa" value="rekabentuk">
                                                <a href="/projek/{{ $projek->id }}/pengesahan-penilaian" class="btn btn-primary" name="hantar_skorkad" value="hantar" type="submit">Hantar</a>
                                                {{-- <button class="btn btn-primary" name="hantar_skorkad" value="hantar" type="submit">Penilaian Diemel ke Sekretariat</button> --}}
                                            </div>
                                        </div>
                                    @endif
                                    @endrole
                                    @role('ketua-pasukan|penolong-ketua-pasukan')
                                    @if($projek->status == "Selesai Pengesahan Rayuan Bangunan" || $projek->status = "Selesai Rayuan Bangunan") 
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                {{-- <a class="btn btn-primary" href="/projek/sijil_eph_bangunan">Muat turun</a> --}}
                                                <button class="btn btn-primary" onclick="printJS('skor-kad-1', 'html')">Muat Turun</button>
                                            </div>
                                        </div>
                                    @endif
                                    @endrole
                                </div>
                            </div>
                        </div>
                    </div>
                    @endrole
                    @endif

                    <!--RUMUSAN SKOR KAD-->
                    @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat|ketua-pemudah-cara|pemudah-cara|ketua-pasukan-validasi|pasukan-validasi')
                    <div class="tab-pane" id="tab-7" role="tabpanel">
                        <form action="#" id="rumusan_skor_kad">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h4 class="mb-3">RUMUSAN SKOR KAD</h4>
                                    <table class="table table-bordered line-table shadow-table-jkr line-corner-table-jkr">
                                        <thead class="text-white line-table">
                                            <tr align="center" style="background-color:#EB5500">
                                                <th colspan="3">Kategori</th>
                                                @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                    <th colspan="5"> PEMBANGUNAN BARU A</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                    <th colspan="5">PEMBANGUNAN BARU B</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                    <th colspan="5">PEMBANGUNAN BARU C</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                    <th colspan="5">PEMBANGUNAN BARU D</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                    <th colspan="5"> PEMBANGUNAN PUN A</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                    <th colspan="5">PEMBANGUNAN PUN B</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                    <th colspan="5">PEMBANGUNAN PUN C</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                    <th colspan="5">PEMBANGUNAN PUN D</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                    <th colspan="5"> PEMBANGUNAN SEDIA ADA A</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                    <th colspan="5">PEMBANGUNAN SEDIA ADA B</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                    <th colspan="5">PEMBANGUNAN SEDIA ADA C</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                    <th colspan="5">PEMBANGUNAN SEDIA ADA D</th>
                                                @endif
                                            </tr>
    
                                            <tr align="center" style="background-color:#EB5500">
                                                <th colspan="3">Peratusan Mengikut Kriteria</th>
                                                <th>MM</th>
                                                <th>MR</th>
                                                <th>MMV</th>
                                                <th>MV</th>
                                                <th>ML</th>
                                            </tr>
                                        </thead>
    
                                        <!--TL-->
                                        <tr align="center" class="text-black">
                                            <th>TL</th>
                                            <th colspan="2">Perancangan dan Pengurusan Tapak Lestari</th>
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                <th>26</th>
                                                <th>{{$tl_mr}}</th>
                                                <th>24</th>
                                                <th>{{$tl_mv}}</th>
                                                <th>{{$tl_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                <th>29</th>
                                                <th>{{$tl_mr_r}}</th>
                                                <th>27</th>
                                                <th>{{$tl_mv}}</th>
                                                <th>{{$tl_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                <th>29</th>
                                                <th>{{$tl_mr}}</th>
                                                <th>27</th>
                                                <th>{{$tl_mv}}</th>
                                                <th>{{$tl_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                <th>29</th>
                                                <th>{{$tl_mr}}</th>
                                                <th>27</th>
                                                <th>{{$tl_mv}}</th>
                                                <th>{{$tl_ml}}</th>
    
                                                {{-- PUN --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                <th>24</th>
                                                <th>{{$tl_mr}}</th>
                                                <th>23</th>
                                                <th>{{$tl_mv}}</th>
                                                <th>{{$tl_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                <th>27</th>
                                                <th>{{$tl_mr}}</th>
                                                <th>26</th>
                                                <th>{{$tl_mv}}</th>
                                                <th>{{$tl_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                <th>27</th>
                                                <th>{{$tl_mr}}</th>
                                                <th>26</th>
                                                <th>{{$tl_mv}}</th>
                                                <th>{{$tl_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                <th>27</th>
                                                <th>{{$tl_mr}}</th>
                                                <th>26</th>
                                                <th>{{$tl_mv}}</th>
                                                <th>{{$tl_ml}}</th>
    
                                                {{-- Sedia Ada --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>14</th>
                                                <th>{{$tl_mv}}</th>
                                                <th>{{$tl_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>17</th>
                                                <th>{{$tl_mv}}</th>
                                                <th>{{$tl_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>17</th>
                                                <th>{{$tl_mv}}</th>
                                                <th>{{$tl_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>17</th>
                                                <th>{{$tl_mv}}</th>
                                                <th>{{$tl_ml}}</th>
                                            @endif
                                        </tr>
    
                                        <!--KT-->
                                        <tr align="center" class="text-black">
                                            <th>KT</th>
                                            <th colspan="2">Pengurusan Kecekapan Tenaga</th>
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                <th>24</th>
                                                <th>{{$kt_mr}}</th>
                                                <th>26</th>
                                                <th>{{$kt_mv}}</th>
                                                <th>{{$kt_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                <th>36</th>
                                                <th>{{$kt_mr}}</th>
                                                <th>38</th>
                                                <th>{{$kt_mv}}</th>
                                                <th>{{$kt_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                <th>52</th>
                                                <th>{{$kt_mr}}</th>
                                                <th>54</th>
                                                <th>{{$kt_mv}}</th>
                                                <th>{{$kt_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                <th>55</th>
                                                <th>{{$kt_mr}}</th>
                                                <th>57</th>
                                                <th>{{$kt_mv}}</th>
                                                <th>{{$kt_ml}}</th>
    
                                                {{-- PUN --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                <th>19</th>
                                                <th>{{$kt_mr}}</th>
                                                <th>21</th>
                                                <th>{{$kt_mv}}</th>
                                                <th>{{$kt_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                <th>30</th>
                                                <th>{{$kt_mr}}</th>
                                                <th>32</th>
                                                <th>{{$kt_mv}}</th>
                                                <th>{{$kt_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                <th>51</th>
                                                <th>{{$kt_mr}}</th>
                                                <th>53</th>
                                                <th>{{$kt_mv}}</th>
                                                <th>{{$kt_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                <th>54</th>
                                                <th>{{$kt_mr}}</th>
                                                <th>56</th>
                                                <th>{{$kt_mv}}</th>
                                                <th>{{$kt_ml}}</th>
    
                                                {{-- Sedia Ada --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>18</th>
                                                <th>{{$kt_mv}}</th>
                                                <th>{{$kt_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>29</th>
                                                <th>{{$kt_mv}}</th>
                                                <th>{{$kt_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>45</th>
                                                <th>{{$kt_mv}}</th>
                                                <th>{{$kt_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>48</th>
                                                <th>{{$kt_mv}}</th>
                                                <th>{{$kt_ml}}</th>
                                            @endif
                                        </tr>
    
                                        <!--SB-->
                                        <tr align="center" class="text-black">
                                            <th>SB</th>
                                            <th colspan="2">Pengurusan Sumber dan Bahan</th>
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                <th>20</th>
                                                <th>{{$sb_mr}}</th>
                                                <th>20</th>
                                                <th>{{$sb_mv}}</th>
                                                <th>{{$sb_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                <th>20</th>
                                                <th>{{$sb_mr}}</th>
                                                <th>20</th>
                                                <th>{{$sb_mv}}</th>
                                                <th>{{$sb_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                <th>20</th>
                                                <th>{{$sb_mr}}</th>
                                                <th>20</th>
                                                <th>{{$sb_mv}}</th>
                                                <th>{{$sb_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                <th>20</th>
                                                <th>{{$sb_mr}}</th>
                                                <th>20</th>
                                                <th>{{$sb_mv}}</th>
                                                <th>{{$sb_ml}}</th>
    
                                                {{-- PUN --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                <th>15</th>
                                                <th>{{$sb_mr}}</th>
                                                <th>15</th>
                                                <th>{{$sb_mv}}</th>
                                                <th>{{$sb_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                <th>15</th>
                                                <th>{{$sb_mr}}</th>
                                                <th>15</th>
                                                <th>{{$sb_mv}}</th>
                                                <th>{{$sb_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                <th>15</th>
                                                <th>{{$sb_mr}}</th>
                                                <th>15</th>
                                                <th>{{$sb_mv}}</th>
                                                <th>{{$sb_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                <th>15</th>
                                                <th>{{$sb_mr}}</th>
                                                <th>15</th>
                                                <th>{{$sb_mv}}</th>
                                                <th>{{$sb_ml}}</th>
    
                                                {{-- Sedia Ada --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>4</th>
                                                <th>{{$sb_mv}}</th>
                                                <th>{{$sb_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>4</th>
                                                <th>{{$sb_mv}}</th>
                                                <th>{{$sb_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>4</th>
                                                <th>{{$sb_mv}}</th>
                                                <th>{{$sb_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>4</th>
                                                <th>{{$sb_mv}}</th>
                                                <th>{{$sb_ml}}</th>
                                            @endif
                                        </tr>
    
                                        <!--PA-->
                                        <tr align="center" class="text-black">
                                            <th>PA</th>
                                            <th colspan="2">Pengurusan Kecekapan Penggunaan Air</th>
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                <th>14</th>
                                                <th>{{$pa_mr}}</th>
                                                <th>14</th>
                                                <th>{{$pa_mv}}</th>
                                                <th>{{$pa_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                <th>22</th>
                                                <th>{{$pa_mr}}</th>
                                                <th>22</th>
                                                <th>{{$pa_mv}}</th>
                                                <th>{{$pa_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                <th>22</th>
                                                <th>{{$pa_mr}}</th>
                                                <th>22</th>
                                                <th>{{$pa_mv}}</th>
                                                <th>{{$pa_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                <th>22</th>
                                                <th>{{$pa_mr}}</th>
                                                <th>22</th>
                                                <th>{{$pa_mv}}</th>
                                                <th>{{$pa_ml}}</th>
    
                                                {{-- PUN --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                <th>14</th>
                                                <th>{{$pa_mr}}</th>
                                                <th>14</th>
                                                <th>{{$pa_mv}}</th>
                                                <th>{{$pa_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                <th>22</th>
                                                <th>{{$pa_mr}}</th>
                                                <th>22</th>
                                                <th>{{$pa_mv}}</th>
                                                <th>{{$pa_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                <th>22</th>
                                                <th>{{$pa_mr}}</th>
                                                <th>22</th>
                                                <th>{{$pa_mv}}</th>
                                                <th>{{$pa_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                <th>22</th>
                                                <th>{{$pa_mr}}</th>
                                                <th>22</th>
                                                <th>{{$pa_mv}}</th>
                                                <th>{{$pa_ml}}</th>
    
                                                {{-- Sedia Ada --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>14</th>
                                                <th>{{$pa_mv}}</th>
                                                <th>{{$pa_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>22</th>
                                                <th>{{$pa_mv}}</th>
                                                <th>{{$pa_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>22</th>
                                                <th>{{$pa_mv}}</th>
                                                <th>{{$pa_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                <th>14</th>
                                                <th>0</th>
                                                <th>22</th>
                                                <th>{{$pa_mv}}</th>
                                                <th>{{$pa_ml}}</th>
                                            @endif
                                        </tr>
    
                                        <!--PD-->
                                        <tr align="center" class="text-black">
                                            <th>PD</th>
                                            <th colspan="2">Pengurusan Kualiti Persekitaran Dalaman</th>
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                <th>11</th>
                                                <th>{{$pd_mr}}</th>
                                                <th>13</th>
                                                <th>{{$pd_mv}}</th>
                                                <th>{{$pd_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                <th>13</th>
                                                <th>{{$pd_mr}}</th>
                                                <th>15</th>
                                                <th>{{$pd_mv}}</th>
                                                <th>{{$pd_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                <th>25</th>
                                                <th>{{$pd_mr}}</th>
                                                <th>27</th>
                                                <th>{{$pd_mv}}</th>
                                                <th>{{$pd_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                <th>29</th>
                                                <th>{{$pd_mr}}</th>
                                                <th>31</th>
                                                <th>{{$pd_mv}}</th>
                                                <th>{{$pd_ml}}</th>
    
                                                {{-- PUN --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                <th>1</th>
                                                <th>{{$pd_mr}}</th>
                                                <th>3</th>
                                                <th>{{$pd_mv}}</th>
                                                <th>{{$pd_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                <th>13</th>
                                                <th>{{$pd_mr}}</th>
                                                <th>15</th>
                                                <th>{{$pd_mv}}</th>
                                                <th>{{$pd_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                <th>25</th>
                                                <th>{{$pd_mr}}</th>
                                                <th>27</th>
                                                <th>{{$pd_mv}}</th>
                                                <th>{{$pd_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                <th>27</th>
                                                <th>{{$pd_mr}}</th>
                                                <th>29</th>
                                                <th>{{$pd_mv}}</th>
                                                <th>{{$pd_ml}}</th>
    
                                                {{-- Sedia Ada --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>3</th>
                                                <th>{{$pd_mv}}</th>
                                                <th>{{$pd_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>11</th>
                                                <th>{{$pd_mv}}</th>
                                                <th>{{$pd_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>27</th>
                                                <th>{{$pd_mv}}</th>
                                                <th>{{$pd_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>29</th>
                                                <th>{{$pd_mv}}</th>
                                                <th>{{$pd_ml}}</th>
                                            @endif
                                        </tr>
    
                                        <!--FL-->
                                        <tr align="center" class="text-black">
                                            <th>FL</th>
                                            <th colspan="2">Pengurusan Fasiliti Lestari</th>
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                <th>5</th>
                                                <th>{{$fl_mr}}</th>
                                                <th>10</th>
                                                <th>{{$fl_mv}}</th>
                                                <th>{{$fl_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                <th>5</th>
                                                <th>{{$fl_mr}}</th>
                                                <th>10</th>
                                                <th>{{$fl_mv}}</th>
                                                <th>{{$fl_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                <th>5</th>
                                                <th>{{$fl_mr}}</th>
                                                <th>10</th>
                                                <th>{{$fl_mv}}</th>
                                                <th>{{$fl_ml}}</th>
    
                                                {{-- PUN --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                <th>5</th>
                                                <th>{{$fl_mr}}</th>
                                                <th>10</th>
                                                <th>{{$fl_mv}}</th>
                                                <th>{{$fl_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                <th>5</th>
                                                <th>{{$fl_mr}}</th>
                                                <th>10</th>
                                                <th>{{$fl_mv}}</th>
                                                <th>{{$fl_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                <th>5</th>
                                                <th>{{$fl_mr}}</th>
                                                <th>10</th>
                                                <th>{{$fl_mv}}</th>
                                                <th>{{$fl_ml}}</th>
    
                                                {{-- Sedia Ada --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>9</th>
                                                <th>{{$fl_mv}}</th>
                                                <th>{{$fl_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>19</th>
                                                <th>{{$fl_mv}}</th>
                                                <th>{{$fl_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>19</th>
                                                <th>{{$fl_mv}}</th>
                                                <th>{{$fl_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>19</th>
                                                <th>{{$fl_mv}}</th>
                                                <th>{{$fl_ml}}</th>
                                            @endif
                                        </tr>
    
                                        <!--IN-->
                                        <tr align="center" class="text-black">
                                            <th>IN</th>
                                            <th colspan="2">Inovasi dalam Reka Bentuk</th>
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                <th>6</th>
                                                <th>{{$in_mr}}</th>
                                                <th>6</th>
                                                <th>{{$in_mv}}</th>
                                                <th>{{$in_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                <th>6</th>
                                                <th>{{$in_mr}}</th>
                                                <th>6</th>
                                                <th>{{$in_mv}}</th>
                                                <th>{{$in_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                <th>6</th>
                                                <th>{{$in_mr}}</th>
                                                <th>6</th>
                                                <th>{{$in_mv}}</th>
                                                <th>{{$in_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                <th>6</th>
                                                <th>{{$in_mr}}</th>
                                                <th>6</th>
                                                <th>{{$in_mv}}</th>
                                                <th>{{$in_ml}}</th>
    
                                                {{-- PUN --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                <th>6</th>
                                                <th>{{$in_mr}}</th>
                                                <th>6</th>
                                                <th>{{$in_mv}}</th>
                                                <th>{{$in_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                <th>6</th>
                                                <th>{{$in_mr}}</th>
                                                <th>6</th>
                                                <th>{{$in_mv}}</th>
                                                <th>{{$in_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                <th>6</th>
                                                <th>{{$in_mr}}</th>
                                                <th>6</th>
                                                <th>{{$in_mv}}</th>
                                                <th>{{$in_ml}}</th>
    
                                                {{-- Sedia Ada --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>6</th>
                                                <th>{{$in_mv}}</th>
                                                <th>{{$in_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>6</th>
                                                <th>{{$in_mv}}</th>
                                                <th>{{$in_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>6</th>
                                                <th>{{$in_mv}}</th>
                                                <th>{{$in_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>6</th>
                                                <th>{{$in_mv}}</th>
                                                <th>{{$in_ml}}</th>
                                            @endif
                                        </tr>
    
                                        <!--JUMLAH-->
                                        <tr align="center" class="text-black">
                                            <th colspan="3">JUMLAH</th>
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                <th>101</th>
                                                <th>{{$total_mr}}</th>
                                                <th>103</th>
                                                <th>{{$total_mv}}</th>
                                                <th>{{$total_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                <th>131</th>
                                                <th>{{$total_mr}}</th>
                                                <th>138</th>
                                                <th>{{$total_mv}}</th>
                                                <th>{{$total_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                <th>159</th>
                                                <th>{{$total_mr}}</th>
                                                <th>166</th>
                                                <th>{{$total_mv}}</th>
                                                <th>{{$total_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                <th>166</th>
                                                <th>{{$total_mr}}</th>
                                                <th>173</th>
                                                <th>{{$total_mv}}</th>
                                                <th>{{$total_ml}}</th>
    
                                                {{-- PUN --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                <th>73</th>
                                                <th>{{$total_mr}}</th>
                                                <th>76</th>
                                                <th>{{$total_mv}}</th>
                                                <th>{{$total_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                <th>118</th>
                                                <th>{{$total_mr}}</th>
                                                <th>126</th>
                                                <th>{{$total_mv}}</th>
                                                <th>{{$total_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                <th>151</th>
                                                <th>{{$total_mr}}</th>
                                                <th>159</th>
                                                <th>{{$total_mv}}</th>
                                                <th>{{$total_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                <th>156</th>
                                                <th>{{$total_mr}}</th>
                                                <th>164</th>
                                                <th>{{$total_mv}}</th>
                                                <th>{{$total_ml}}</th>
    
                                                {{-- Sedia Ada --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>62</th>
                                                <th>{{$total_mv}}</th>
                                                <th>{{$total_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>108</th>
                                                <th>{{$total_mv}}</th>
                                                <th>{{$total_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>140</th>
                                                <th>{{$total_mv}}</th>
                                                <th>{{$total_ml}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>145</th>
                                                <th>{{$total_mv}}</th>
                                                <th>{{$total_ml}}</th>
                                            @endif
                                        </tr>
                                    </table><!--Table-->
                                </div>
    
                                <div class="mb-3 row mx-3" id="rumusan-skor-kad">
                                    <table class="table table-bordered line-table shadow-table-jkr" id="rumusan_skor_kad">
                                        <thead class="text-white line-table">
                                            <tr align="center" style="background-color:#EB5500">
                                                <th colspan="8">KEPUTUSAN PENARAFAN HIJAU PERINGKAT REKA BENTUK (PRB) |
                                                    VERIFIKASI PERMARKAHAN BANGUNAN | VALIDASI PERMARKAHAN BANGUNAN</th>
                                            </tr>
    
                                            <tr align="center" style="background-color:#EB5500">
                                                <th colspan="8">MARKAH PENILAIAN</th>
                                            </tr>
    
                                            <tr align="center" style="background-color:#EB5500">
                                                <th colspan="2">PERINGKAT</th>
                                                <th colspan="2">REKABENTUK</th>
                                                <th colspan="2">VERIFIKASI PERMARKAHAN BANGUNAN</th>
                                                <th colspan="2">VALIDASI PERMARKAHAN BANGUNAN</th>
                                            </tr>
    
                                            <tr align="center" class="text-black">
                                                <th colspan="2">Jumlah Markah</th>
                                                @if($projek->kategori == 'phJKR Bangunan Baru A' || 'phJKR Bangunan Baru B' || 'phJKR Bangunan Baru C' || 'phJKR Bangunan Baru D'
                                                || 'phJKR Bangunan PUN A' || 'phJKR Bangunan PUN B' || 'phJKR Bangunan PUN C' || 'phJKR Bangunan PUN D')
                                                <th colspan="2">{{$total_mr}}</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A' || 'phJKR Bangunan Sedia Ada B' || 'phJKR Bangunan Sedia Ada C' || 'phJKR Bangunan Sedia Ada D')
                                                <th colspan="2">0</th>
                                                @endif
                                                <th colspan="2">{{$total_mv}}</th>
                                                <th colspan="2">{{$total_ml}}</th>
                                            </tr>
    
                                            <tr align="center" class="text-black">
                                                <th colspan="2">Peratusan</th>
                                                @if($projek->kategori == 'phJKR Bangunan Baru A' || 'phJKR Bangunan Baru B' || 'phJKR Bangunan Baru C' || 'phJKR Bangunan Baru D'
                                                || 'phJKR Bangunan PUN A' || 'phJKR Bangunan PUN B' || 'phJKR Bangunan PUN C' || 'phJKR Bangunan PUN D')
                                                <th colspan="2"> {{number_format($peratusan_mr,2,".",",")}}%</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A' || 'phJKR Bangunan Sedia Ada B' || 'phJKR Bangunan Sedia Ada C' || 'phJKR Bangunan Sedia Ada D')
                                                <th colspan="2"> 0%</th>
                                                @endif
                                                <th colspan="2"> {{number_format($peratusan_mv,2,".",",")}}%</th>
                                                <th colspan="2"> {{number_format($peratusan_ml,2,".",",")}}%</th>
                                            </tr>
    
                                            <tr align="center" class="text-black">
                                                <th colspan="2">Penarafan PH</th>
                                                <th colspan="2">
                                                    <input type="hidden" name="fasa" value="rekabentuk">
                                                    <span class="star">
                                                        @if ($peratusan_mr >= 80)
                                                            5 &starf; &starf; &starf; &starf; &starf;
                                                        @elseif ($peratusan_mr >= 65 && $peratusan_mr < 80)
                                                            4 &starf; &starf; &starf; &starf;
                                                        @elseif ($peratusan_mr >= 45 && $peratusan_mr < 65)
                                                            3 &starf; &starf; &starf;
                                                        @elseif ($peratusan_mr >= 30 && $peratusan_mr < 45)
                                                            2 &starf; &starf; 
                                                        @elseif ($peratusan_mr <= 29)
                                                            1 &starf;                                                                                            
                                                        @endif                                            
                                                    </span>
                                                </th>
                                                <th colspan="2">
                                                    <input type="hidden" name="fasa" value="verifikasi">
                                                    <span class="star">
                                                        @if ($peratusan_mv >= 80)
                                                            5 &starf; &starf; &starf; &starf; &starf;
                                                        @elseif ($peratusan_mv >= 65 && $peratusan_mv < 80)
                                                            4 &starf; &starf; &starf; &starf;
                                                        @elseif ($peratusan_mv >= 45 && $peratusan_mv < 65)
                                                            3 &starf; &starf; &starf;
                                                        @elseif ($peratusan_mv >= 30 && $peratusan_mv < 45)
                                                            2 &starf; &starf;   
                                                        @elseif ($peratusan_mv <= 29)
                                                            1 &starf;                                                                                                
                                                        @endif                                            
                                                    </span>
                                                </th>
                                                <th colspan="2">
                                                    <input type="hidden" name="fasa" value="validasi">
                                                    <span class="star">
                                                        @if ($peratusan_ml >= 80)
                                                            5 &starf; &starf; &starf; &starf; &starf;
                                                        @elseif ($peratusan_ml >= 65 && $peratusan_ml < 80)
                                                            4 &starf; &starf; &starf; &starf;
                                                        @elseif ($peratusan_ml >= 45 && $peratusan_ml < 65)
                                                            3 &starf; &starf; &starf;
                                                        @elseif ($peratusan_ml >= 30 && $peratusan_ml < 45)
                                                            2 &starf; &starf;  
                                                        @elseif ($peratusan_ml <= 29)
                                                            1 &starf;                                                                                             
                                                        @endif                                            
                                                    </span>
                                                </th>
                                            </tr>
    
                                            <tr align="center" style="background-color:#EB5500">
                                                <th colspan="2">Petunjuk Penarafan</th>
                                                <th colspan="6">Sijil Penarafan</th>
                                            </tr>
    
                                            <tr align="center" class="text-black">
                                                <th><span class="star">&starf; &starf; &starf; &starf; &starf;</span></th>
                                                <th>80 - 100</th>
                                                <th colspan="6">Kecemerlangan Global</th>
                                            </tr>
    
                                            <tr align="center" class="text-black">
                                                <th><span class="star">&starf; &starf; &starf; &starf;</span></th>
                                                <th>65 - 79</th>
                                                <th colspan="6">Kecemerlangan Nasional</th>
                                            </tr>
    
                                            <tr align="center" class="text-black">
                                                <th><span class="star">&starf; &starf; &starf;</span></th>
                                                <th>45 - 64</th>
                                                <th colspan="6">Amalan Pengurusan Terbaik</th>
                                            </tr>
    
                                            <tr align="center" class="text-black">
                                                <th><span class="star">&starf; &starf;</span></th>
                                                <th>30 - 44</th>
                                                <th colspan="6">Potensi Pengiktirafan</th>
                                            </tr>
    
                                            <tr align="center" class="text-black">
                                                <th><span class="star">&starf;</span></th>
                                                <th>< 29</th>
                                                <th colspan="6">Sijil Penyertaan</th>
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
                                    @role('ketua-pasukan|penolong-ketua-pasukan')
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <button class="btn btn-primary" onclick="printJS('rumusan_skor_kad', 'html')">Muat Turun</button>
                                            </div>
                                        </div>
                                    @endrole
                                </div>
                            </div>
                        </form>
                    </div>
                    @endrole

                    <!--RUMUSAN SKOR KAD RAYUAN-->
                    @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')
                    @if($projek->status == "Proses Rayuan Bangunan")
                    <div class="tab-pane" id="tab-9" role="tabpanel">
                        <form action="#" id="rumusan-skor-kad-rayuan">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h4 class="mb-3">RUMUSAN SKOR KAD RAYUAN</h4>
                                    <table class="table table-bordered line-table shadow-table-jkr line-corner-table-jkr">
                                        <thead class="text-white line-table">
                                            <tr align="center" style="background-color:#EB5500">
                                                <th colspan="3">Kategori</th>
                                                @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                    <th colspan="5"> PEMBANGUNAN BARU A</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                    <th colspan="5">PEMBANGUNAN BARU B</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                    <th colspan="5">PEMBANGUNAN BARU C</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                    <th colspan="5">PEMBANGUNAN BARU D</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                    <th colspan="5"> PEMBANGUNAN PUN A</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                    <th colspan="5">PEMBANGUNAN PUN B</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                    <th colspan="5">PEMBANGUNAN PUN C</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                    <th colspan="5">PEMBANGUNAN PUN D</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                    <th colspan="5"> PEMBANGUNAN SEDIA ADA A</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                    <th colspan="5">PEMBANGUNAN SEDIA ADA B</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                    <th colspan="5">PEMBANGUNAN SEDIA ADA C</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                    <th colspan="5">PEMBANGUNAN SEDIA ADA D</th>
                                                @endif
                                            </tr>

                                            <tr align="center" style="background-color:#EB5500">
                                                <th colspan="3">Peratusan Mengikut Kriteria</th>
                                                <th>MM</th>
                                                <th>MR</th>
                                                <th>MMV</th>
                                                <th>MV</th>
                                                <th>ML</th>
                                            </tr>
                                        </thead>

                                        <!--TL-->
                                        <tr align="center" class="text-black">
                                            <th>TL</th>
                                            <th colspan="2">Perancangan dan Pengurusan Tapak Lestari</th>
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                <th>26</th>
                                                <th>{{$tl_mr_r}}</th>
                                                <th>24</th>
                                                <th>{{$tl_mv_r}}</th>
                                                <th>{{$tl_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                <th>29</th>
                                                <th>{{$tl_mr_r}}</th>
                                                <th>27</th>
                                                <th>{{$tl_mv_r}}</th>
                                                <th>{{$tl_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                <th>29</th>
                                                <th>{{$tl_mr_r}}</th>
                                                <th>27</th>
                                                <th>{{$tl_mv_r}}</th>
                                                <th>{{$tl_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                <th>29</th>
                                                <th>{{$tl_mr_r}}</th>
                                                <th>27</th>
                                                <th>{{$tl_mv_r}}</th>
                                                <th>{{$tl_ml_r}}</th>

                                                {{-- PUN --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                <th>24</th>
                                                <th>{{$tl_mr_r}}</th>
                                                <th>23</th>
                                                <th>{{$tl_mv_r}}</th>
                                                <th>{{$tl_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                <th>27</th>
                                                <th>{{$tl_mr_r}}</th>
                                                <th>26</th>
                                                <th>{{$tl_mv_r}}</th>
                                                <th>{{$tl_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                <th>27</th>
                                                <th>{{$tl_mr_r}}</th>
                                                <th>26</th>
                                                <th>{{$tl_mv_r}}</th>
                                                <th>{{$tl_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                <th>27</th>
                                                <th>{{$tl_mr_r}}</th>
                                                <th>26</th>
                                                <th>{{$tl_mv_r}}</th>
                                                <th>{{$tl_ml_r}}</th>

                                                {{-- Sedia Ada --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>14</th>
                                                <th>{{$tl_mv_r}}</th>
                                                <th>{{$tl_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>17</th>
                                                <th>{{$tl_mv_r}}</th>
                                                <th>{{$tl_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>17</th>
                                                <th>{{$tl_mv_r}}</th>
                                                <th>{{$tl_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>17</th>
                                                <th>{{$tl_mv_r}}</th>
                                                <th>{{$tl_ml_r}}</th>
                                            @endif
                                        </tr>

                                        <!--KT-->
                                        <tr align="center" class="text-black">
                                            <th>KT</th>
                                            <th colspan="2">Pengurusan Kecekapan Tenaga</th>
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                <th>24</th>
                                                <th>{{$kt_mr_r}}</th>
                                                <th>26</th>
                                                <th>{{$kt_mv_r}}</th>
                                                <th>{{$kt_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                <th>36</th>
                                                <th>{{$kt_mr_r}}</th>
                                                <th>38</th>
                                                <th>{{$kt_mv_r}}</th>
                                                <th>{{$kt_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                <th>52</th>
                                                <th>{{$kt_mr_r}}</th>
                                                <th>54</th>
                                                <th>{{$kt_mv_r}}</th>
                                                <th>{{$kt_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                <th>55</th>
                                                <th>{{$kt_mr_r}}</th>
                                                <th>57</th>
                                                <th>{{$kt_mv_r}}</th>
                                                <th>{{$kt_ml_r}}</th>

                                                {{-- PUN --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                <th>19</th>
                                                <th>{{$kt_mr_r}}</th>
                                                <th>21</th>
                                                <th>{{$kt_mv_r}}</th>
                                                <th>{{$kt_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                <th>30</th>
                                                <th>{{$kt_mr_r}}</th>
                                                <th>32</th>
                                                <th>{{$kt_mv_r}}</th>
                                                <th>{{$kt_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                <th>51</th>
                                                <th>{{$kt_mr_r}}</th>
                                                <th>53</th>
                                                <th>{{$kt_mv_r}}</th>
                                                <th>{{$kt_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                <th>54</th>
                                                <th>{{$kt_mr_r}}</th>
                                                <th>56</th>
                                                <th>{{$kt_mv_r}}</th>
                                                <th>{{$kt_ml_r}}</th>

                                                {{-- Sedia Ada --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>18</th>
                                                <th>{{$kt_mv_r}}</th>
                                                <th>{{$kt_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>29</th>
                                                <th>{{$kt_mv_r}}</th>
                                                <th>{{$kt_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>45</th>
                                                <th>{{$kt_mv_r}}</th>
                                                <th>{{$kt_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>48</th>
                                                <th>{{$kt_mv_r}}</th>
                                                <th>{{$kt_ml_r}}</th>
                                            @endif
                                        </tr>

                                        <!--SB-->
                                        <tr align="center" class="text-black">
                                            <th>SB</th>
                                            <th colspan="2">Pengurusan Sumber dan Bahan</th>
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                <th>20</th>
                                                <th>{{$sb_mr_r}}</th>
                                                <th>20</th>
                                                <th>{{$sb_mv_r}}</th>
                                                <th>{{$sb_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                <th>20</th>
                                                <th>{{$sb_mr_r}}</th>
                                                <th>20</th>
                                                <th>{{$sb_mv_r}}</th>
                                                <th>{{$sb_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                <th>20</th>
                                                <th>{{$sb_mr_r}}</th>
                                                <th>20</th>
                                                <th>{{$sb_mv_r}}</th>
                                                <th>{{$sb_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                <th>20</th>
                                                <th>{{$sb_mr_r}}</th>
                                                <th>20</th>
                                                <th>{{$sb_mv_r}}</th>
                                                <th>{{$sb_ml_r}}</th>

                                                {{-- PUN --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                <th>15</th>
                                                <th>{{$sb_mr_r}}</th>
                                                <th>15</th>
                                                <th>{{$sb_mv_r}}</th>
                                                <th>{{$sb_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                <th>15</th>
                                                <th>{{$sb_mr_r}}</th>
                                                <th>15</th>
                                                <th>{{$sb_mv_r}}</th>
                                                <th>{{$sb_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                <th>15</th>
                                                <th>{{$sb_mr_r}}</th>
                                                <th>15</th>
                                                <th>{{$sb_mv_r}}</th>
                                                <th>{{$sb_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                <th>15</th>
                                                <th>{{$sb_mr_r}}</th>
                                                <th>15</th>
                                                <th>{{$sb_mv_r}}</th>
                                                <th>{{$sb_ml_r}}</th>

                                                {{-- Sedia Ada --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>4</th>
                                                <th>{{$sb_mv_r}}</th>
                                                <th>{{$sb_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>4</th>
                                                <th>{{$sb_mv_r}}</th>
                                                <th>{{$sb_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>4</th>
                                                <th>{{$sb_mv_r}}</th>
                                                <th>{{$sb_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>4</th>
                                                <th>{{$sb_mv_r}}</th>
                                                <th>{{$sb_ml_r}}</th>
                                            @endif
                                        </tr>

                                        <!--PA-->
                                        <tr align="center" class="text-black">
                                            <th>PA</th>
                                            <th colspan="2">Pengurusan Kecekapan Penggunaan Air</th>
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                <th>14</th>
                                                <th>{{$pa_mr_r}}</th>
                                                <th>14</th>
                                                <th>{{$pa_mv_r}}</th>
                                                <th>{{$pa_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                <th>22</th>
                                                <th>{{$pa_mr_r}}</th>
                                                <th>22</th>
                                                <th>{{$pa_mv_r}}</th>
                                                <th>{{$pa_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                <th>22</th>
                                                <th>{{$pa_mr_r}}</th>
                                                <th>22</th>
                                                <th>{{$pa_mv_r}}</th>
                                                <th>{{$pa_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                <th>22</th>
                                                <th>{{$pa_mr_r}}</th>
                                                <th>22</th>
                                                <th>{{$pa_mv_r}}</th>
                                                <th>{{$pa_ml_r}}</th>

                                                {{-- PUN --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                <th>14</th>
                                                <th>{{$pa_mr_r}}</th>
                                                <th>14</th>
                                                <th>{{$pa_mv_r}}</th>
                                                <th>{{$pa_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                <th>22</th>
                                                <th>{{$pa_mr_r}}</th>
                                                <th>22</th>
                                                <th>{{$pa_mv_r}}</th>
                                                <th>{{$pa_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                <th>22</th>
                                                <th>{{$pa_mr_r}}</th>
                                                <th>22</th>
                                                <th>{{$pa_mv_r}}</th>
                                                <th>{{$pa_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                <th>22</th>
                                                <th>{{$pa_mr_r}}</th>
                                                <th>22</th>
                                                <th>{{$pa_mv_r}}</th>
                                                <th>{{$pa_ml_r}}</th>

                                                {{-- Sedia Ada --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>14</th>
                                                <th>{{$pa_mv_r}}</th>
                                                <th>{{$pa_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>22</th>
                                                <th>{{$pa_mv_r}}</th>
                                                <th>{{$pa_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>22</th>
                                                <th>{{$pa_mv_r}}</th>
                                                <th>{{$pa_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                <th>14</th>
                                                <th>0</th>
                                                <th>22</th>
                                                <th>{{$pa_mv_r}}</th>
                                                <th>{{$pa_ml_r}}</th>
                                            @endif
                                        </tr>

                                        <!--PD-->
                                        <tr align="center" class="text-black">
                                            <th>PD</th>
                                            <th colspan="2">Pengurusan Kualiti Persekitaran Dalaman</th>
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                <th>11</th>
                                                <th>{{$pd_mr_r}}</th>
                                                <th>13</th>
                                                <th>{{$pd_mv_r}}</th>
                                                <th>{{$pd_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                <th>13</th>
                                                <th>{{$pd_mr_r}}</th>
                                                <th>15</th>
                                                <th>{{$pd_mv_r}}</th>
                                                <th>{{$pd_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                <th>25</th>
                                                <th>{{$pd_mr_r}}</th>
                                                <th>27</th>
                                                <th>{{$pd_mv_r}}</th>
                                                <th>{{$pd_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                <th>29</th>
                                                <th>{{$pd_mr_r}}</th>
                                                <th>31</th>
                                                <th>{{$pd_mv_r}}</th>
                                                <th>{{$pd_ml_r}}</th>

                                                {{-- PUN --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                <th>1</th>
                                                <th>{{$pd_mr_r}}</th>
                                                <th>3</th>
                                                <th>{{$pd_mv_r}}</th>
                                                <th>{{$pd_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                <th>13</th>
                                                <th>{{$pd_mr_r}}</th>
                                                <th>15</th>
                                                <th>{{$pd_mv_r}}</th>
                                                <th>{{$pd_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                <th>25</th>
                                                <th>{{$pd_mr_r}}</th>
                                                <th>27</th>
                                                <th>{{$pd_mv_r}}</th>
                                                <th>{{$pd_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                <th>27</th>
                                                <th>{{$pd_mr_r}}</th>
                                                <th>29</th>
                                                <th>{{$pd_mv_r}}</th>
                                                <th>{{$pd_ml_r}}</th>

                                                {{-- Sedia Ada --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>3</th>
                                                <th>{{$pd_mv_r}}</th>
                                                <th>{{$pd_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>11</th>
                                                <th>{{$pd_mv_r}}</th>
                                                <th>{{$pd_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>27</th>
                                                <th>{{$pd_mv_r}}</th>
                                                <th>{{$pd_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>29</th>
                                                <th>{{$pd_mv_r}}</th>
                                                <th>{{$pd_ml_r}}</th>
                                            @endif
                                        </tr>

                                        <!--FL-->
                                        <tr align="center" class="text-black">
                                            <th>FL</th>
                                            <th colspan="2">Pengurusan Fasiliti Lestari</th>
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                <th>5</th>
                                                <th>{{$fl_mr_r}}</th>
                                                <th>10</th>
                                                <th>{{$fl_mv_r}}</th>
                                                <th>{{$fl_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                <th>5</th>
                                                <th>{{$fl_mr_r}}</th>
                                                <th>10</th>
                                                <th>{{$fl_mv_r}}</th>
                                                <th>{{$fl_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                <th>5</th>
                                                <th>{{$fl_mr_r}}</th>
                                                <th>10</th>
                                                <th>{{$fl_mv_r}}</th>
                                                <th>{{$fl_ml_r}}</th>

                                                {{-- PUN --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>0</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                <th>5</th>
                                                <th>{{$fl_mr_r}}</th>
                                                <th>10</th>
                                                <th>{{$fl_mv_r}}</th>
                                                <th>{{$fl_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                <th>5</th>
                                                <th>{{$fl_mr_r}}</th>
                                                <th>10</th>
                                                <th>{{$fl_mv_r}}</th>
                                                <th>{{$fl_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                <th>5</th>
                                                <th>{{$fl_mr_r}}</th>
                                                <th>10</th>
                                                <th>{{$fl_mv_r}}</th>
                                                <th>{{$fl_ml_r}}</th>

                                                {{-- Sedia Ada --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>9</th>
                                                <th>{{$fl_mv_r}}</th>
                                                <th>{{$fl_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>19</th>
                                                <th>{{$fl_mv_r}}</th>
                                                <th>{{$fl_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>19</th>
                                                <th>{{$fl_mv_r}}</th>
                                                <th>{{$fl_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>19</th>
                                                <th>{{$fl_mv_r}}</th>
                                                <th>{{$fl_ml_r}}</th>
                                            @endif
                                        </tr>

                                        <!--IN-->
                                        <tr align="center" class="text-black">
                                            <th>IN</th>
                                            <th colspan="2">Inovasi dalam Reka Bentuk</th>
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                <th>6</th>
                                                <th>{{$in_mr_r}}</th>
                                                <th>6</th>
                                                <th>{{$in_mv_r}}</th>
                                                <th>{{$in_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                <th>6</th>
                                                <th>{{$in_mr_r}}</th>
                                                <th>6</th>
                                                <th>{{$in_mv_r}}</th>
                                                <th>{{$in_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                <th>6</th>
                                                <th>{{$in_mr_r}}</th>
                                                <th>6</th>
                                                <th>{{$in_mv_r}}</th>
                                                <th>{{$in_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                <th>6</th>
                                                <th>{{$in_mr_r}}</th>
                                                <th>6</th>
                                                <th>{{$in_mv_r}}</th>
                                                <th>{{$in_ml_r}}</th>

                                                {{-- PUN --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                <th>0</th>
                                                <th>{{$in_mr_r}}</th>
                                                <th>0</th>
                                                <th>{{$in_mv_r}}</th>
                                                <th>{{$in_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                <th>6</th>
                                                <th>{{$in_mr_r}}</th>
                                                <th>6</th>
                                                <th>{{$in_mv_r}}</th>
                                                <th>{{$in_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                <th>6</th>
                                                <th>{{$in_mr_r}}</th>
                                                <th>6</th>
                                                <th>{{$in_mv_r}}</th>
                                                <th>{{$in_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                <th>6</th>
                                                <th>{{$in_mr_r}}</th>
                                                <th>6</th>
                                                <th>{{$in_mv_r}}</th>
                                                <th>{{$in_ml_r}}</th>

                                                {{-- Sedia Ada --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>6</th>
                                                <th>{{$in_mv_r}}</th>
                                                <th>{{$in_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>6</th>
                                                <th>{{$in_mv_r}}</th>
                                                <th>{{$in_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>6</th>
                                                <th>{{$in_mv_r}}</th>
                                                <th>{{$in_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>6</th>
                                                <th>{{$in_mv_r}}</th>
                                                <th>{{$in_ml_r}}</th>
                                            @endif
                                        </tr>

                                        <!--JUMLAH-->
                                        <tr align="center" class="text-black">
                                            <th colspan="3">JUMLAH</th>
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                                <th>101</th>
                                                <th>{{$total_mr_r}}</th>
                                                <th>103</th>
                                                <th>{{$total_mv_r}}</th>
                                                <th>{{$total_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                                <th>131</th>
                                                <th>{{$total_mr_r}}</th>
                                                <th>138</th>
                                                <th>{{$total_mv_r}}</th>
                                                <th>{{$total_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                                <th>159</th>
                                                <th>{{$total_mr_r}}</th>
                                                <th>166</th>
                                                <th>{{$total_mv_r}}</th>
                                                <th>{{$total_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                                <th>166</th>
                                                <th>{{$total_mr_r}}</th>
                                                <th>173</th>
                                                <th>{{$total_mv_r}}</th>
                                                <th>{{$total_ml_r}}</th>

                                                {{-- PUN --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                                <th>73</th>
                                                <th>{{$total_mr_r}}</th>
                                                <th>76</th>
                                                <th>{{$total_mv_r}}</th>
                                                <th>{{$total_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                                <th>118</th>
                                                <th>{{$total_mr_r}}</th>
                                                <th>126</th>
                                                <th>{{$total_mv_r}}</th>
                                                <th>{{$total_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                                <th>151</th>
                                                <th>{{$total_mr_r}}</th>
                                                <th>159</th>
                                                <th>{{$total_mv_r}}</th>
                                                <th>{{$total_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                                <th>156</th>
                                                <th>{{$total_mr_r}}</th>
                                                <th>164</th>
                                                <th>{{$total_mv_r}}</th>
                                                <th>{{$total_ml_r}}</th>

                                                {{-- Sedia Ada --}}
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>62</th>
                                                <th>{{$total_mv_r}}</th>
                                                <th>{{$total_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada B')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>108</th>
                                                <th>{{$total_mv_r}}</th>
                                                <th>{{$total_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada C')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>140</th>
                                                <th>{{$total_mv_r}}</th>
                                                <th>{{$total_ml_r}}</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada D')
                                                <th>0</th>
                                                <th>0</th>
                                                <th>145</th>
                                                <th>{{$total_mv_r}}</th>
                                                <th>{{$total_ml_r}}</th>
                                            @endif
                                        </tr>
                                    </table><!--Table-->
                                </div>

                                <div class="mb-3 row mx-3">
                                    <table class="table table-bordered line-table shadow-table-jkr">
                                        <thead class="text-white line-table">
                                            <tr align="center" style="background-color:#EB5500">
                                                <th colspan="8">KEPUTUSAN PENARAFAN HIJAU PERINGKAT REKA BENTUK (PRB) |
                                                    VERIFIKASI PERMARKAHAN BANGUNAN | VALIDASI PERMARKAHAN BANGUNAN</th>
                                            </tr>

                                            <tr align="center" style="background-color:#EB5500">
                                                <th colspan="8">MARKAH PENILAIAN</th>
                                            </tr>

                                            <tr align="center" style="background-color:#EB5500">
                                                <th colspan="2">PERINGKAT</th>
                                                <th colspan="2">REKABENTUK</th>
                                                <th colspan="2">VERIFIKASI PERMARKAHAN BANGUNAN</th>
                                                <th colspan="2">VALIDASI PERMARKAHAN BANGUNAN</th>
                                            </tr>

                                            <tr align="center" class="text-black">
                                                <th colspan="2">Jumlah Markah</th>
                                                @if($projek->kategori == 'phJKR Bangunan Baru A' || 'phJKR Bangunan Baru B' || 'phJKR Bangunan Baru C' || 'phJKR Bangunan Baru D'
                                                || 'phJKR Bangunan PUN A' || 'phJKR Bangunan PUN B' || 'phJKR Bangunan PUN C' || 'phJKR Bangunan PUN D')
                                                <th colspan="2">{{$total_mr_r}}</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A' || 'phJKR Bangunan Sedia Ada B' || 'phJKR Bangunan Sedia Ada C' || 'phJKR Bangunan Sedia Ada D')
                                                <th colspan="2">0</th>
                                                @endif
                                                <th colspan="2">{{$total_mv_r}}</th>
                                                <th colspan="2">{{$total_ml_r}}</th>
                                            </tr>

                                            <tr align="center" class="text-black">
                                                <th colspan="2">Peratusan</th>
                                                {{-- <th colspan="2">{{$kriteria->peratusan}} %</th> --}}
                                                @if($projek->kategori == 'phJKR Bangunan Baru A' || 'phJKR Bangunan Baru B' || 'phJKR Bangunan Baru C' || 'phJKR Bangunan Baru D'
                                                || 'phJKR Bangunan PUN A' || 'phJKR Bangunan PUN B' || 'phJKR Bangunan PUN C' || 'phJKR Bangunan PUN D')
                                                <th colspan="2"> {{number_format($peratusan_mr_r,2,".",",")}}%</th>
                                                @elseif ($projek->kategori == 'phJKR Bangunan Sedia Ada A' || 'phJKR Bangunan Sedia Ada B' || 'phJKR Bangunan Sedia Ada C' || 'phJKR Bangunan Sedia Ada D')
                                                <th colspan="2"> 0 %</th>
                                                @endif
                                                <th colspan="2"> {{number_format($peratusan_mv_r,2,".",",")}}%</th>
                                                <th colspan="2"> {{number_format($peratusan_ml_r,2,".",",")}}%</th>
                                            </tr>

                                            <tr align="center" class="text-black">
                                                <th colspan="2">Penarafan PH</th>
                                                {{-- <th colspan="2">{{$kriteria->penarafan}}<span class="star">&starf;</span></th> --}}
                                                <th colspan="2">
                                                    <input type="hidden" name="fasa" value="rekabentuk">
                                                    <span class="star">
                                                        @if ($peratusan_mr_r >= 80)
                                                            5 &starf; &starf; &starf; &starf; &starf;
                                                        @elseif ($peratusan_mr_r >= 65 && $peratusan_mr_r < 80)
                                                            4 &starf; &starf; &starf; &starf;
                                                        @elseif ($peratusan_mr_r >= 45 && $peratusan_mr_r < 65)
                                                            3 &starf; &starf; &starf;
                                                        @elseif ($peratusan_mr_r >= 30 && $peratusan_mr_r < 45)
                                                            2 &starf; &starf; 
                                                        @elseif ($peratusan_mr_r <= 29)
                                                            1 &starf;                                                                                            
                                                        @endif                                            
                                                    </span>
                                                </th>
                                                <th colspan="2">
                                                    <input type="hidden" name="fasa" value="verifikasi">
                                                    <span class="star">
                                                        @if ($peratusan_mv_r >= 80)
                                                            5 &starf; &starf; &starf; &starf; &starf;
                                                        @elseif ($peratusan_mv_r >= 65 && $peratusan_mv_r < 80)
                                                            4 &starf; &starf; &starf; &starf;
                                                        @elseif ($peratusan_mv_r >= 45 && $peratusan_mv_r < 65)
                                                            3 &starf; &starf; &starf;
                                                        @elseif ($peratusan_mv_r >= 30 && $peratusan_mv_r < 45)
                                                            2 &starf; &starf;   
                                                        @elseif ($peratusan_mv_r <= 29)
                                                            1 &starf;                                                                                                
                                                        @endif                                            
                                                    </span>
                                                </th>
                                                <th colspan="2">
                                                    <input type="hidden" name="fasa" value="validasi">
                                                    <span class="star">
                                                        @if ($peratusan_ml_r >= 80)
                                                            5 &starf; &starf; &starf; &starf; &starf;
                                                        @elseif ($peratusan_ml_r >= 65 && $peratusan_ml_r < 80)
                                                            4 &starf; &starf; &starf; &starf;
                                                        @elseif ($peratusan_ml_r >= 45 && $peratusan_ml_r < 65)
                                                            3 &starf; &starf; &starf;
                                                        @elseif ($peratusan_ml_r >= 30 && $peratusan_ml_r < 45)
                                                            2 &starf; &starf;  
                                                        @elseif ($peratusan_ml_r <= 29)
                                                            1 &starf;                                                                                             
                                                        @endif                                            
                                                    </span>
                                                </th>

                                            </tr>

                                            <tr align="center" style="background-color:#EB5500">
                                                <th colspan="2">Petunjuk Penarafan</th>
                                                <th colspan="6">Sijil Penarafan</th>
                                            </tr>

                                            <tr align="center" class="text-black">
                                                <th><span class="star">&starf; &starf; &starf; &starf; &starf;</span></th>
                                                <th>80 - 100</th>
                                                <th colspan="6">Kecemerlangan Global</th>
                                            </tr>

                                            <tr align="center" class="text-black">
                                                <th><span class="star">&starf; &starf; &starf; &starf;</span></th>
                                                <th>65 - 79</th>
                                                <th colspan="6">Kecemerlangan Nasional</th>
                                            </tr>

                                            <tr align="center" class="text-black">
                                                <th><span class="star">&starf; &starf; &starf;</span></th>
                                                <th>45 - 64</th>
                                                <th colspan="6">Amalan Pengurusan Terbaik</th>
                                            </tr>

                                            <tr align="center" class="text-black">
                                                <th><span class="star">&starf; &starf;</span></th>
                                                <th>30 - 44</th>
                                                <th colspan="6">Potensi Pengiktirafan</th>
                                            </tr>

                                            <tr align="center" class="text-black">
                                                <th><span class="star">&starf;</span></th>
                                                <th>< 29</th>
                                                <th colspan="6">Sijil Penyertaan</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    @role('sekretariat')
                                    {{-- smtp --}}
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <button class="btn btn-primary">Jana Keputusan</button>
                                            </div>
                                        </div>
                                    @endrole
                                    @role('ketua-pasukan|penolong-ketua-pasukan')
                                        <div class="row mt-3">
                                            <div class="col text-center">
                                                <button class="btn btn-primary" onclick="printJS('rumusan-skor-kad-rayuan', 'html')">Muat Turun</button>
                                            </div>
                                        </div>
                                    @endrole
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                    @endrole
            
                </div>
            </div>
        @endif
    @endif

</div><!--Container-->


<!--JavaScript-->
<!--Button Simpan TOOLTIPS-->
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.css"></script>

{{-- <script>
    window.onload = function(){
        document.getElementById("download")
        .addEventListener("click",()=>{
            const skorkadpenilaian = this.document.getElementById("skorkadpenilaian");
            console.log(skorkadpenilaian); 
            console.log(window);
            
            var opt = {
                margin:       0.5,
                filename:     'myfile.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(skorkadpenilaian).set(opt).save(); 
        })
        
    }
</script> --}}

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

    function kriteriaValidasi() {
        var lols = {!! $validasi_kriterias !!}
        var kriteriaValidasi = document.getElementById("kriteriaValidasiDipilih").value;
        let selectedKriteria = lols.find(el => el.id == kriteriaValidasi);
        document.getElementById("infoKriteriaValidasiDipilih").innerHTML = selectedKriteria.bukti;
    }

    function kriteriaRayuan() {
        var lols = {!! $rayuan_kriterias !!}
        var kriteriaRayuan = document.getElementById("kriteriaRayuanDipilih").value;
        let selectedKriteria = lols.find(el => el.id == kriteriaRayuan);
        document.getElementById("infoKriteriaRayuanDipilih").innerHTML = selectedKriteria.bukti;
    }

    
</script>

{{-- For KT9 read in 2 decimal points --}}
<script>
    var delayTimer;
    function input(ele) {
    clearTimeout(delayTimer);
    delayTimer = setTimeout(function() {
       ele.value = parseFloat(ele.value).toFixed(2).toString();
    }, 800); 
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
                    data: 'markah_bei',
                    name: 'markah_bei'
                },
                {
                    data: 'ulasan_',
                    name: 'ulasan_'
                },
                {
                    data: 'dokumen_',
                    name: 'dokumen_'
                },
                // {
                //     data: 'markah_rekabentuk_',
                //     name: 'markah_rekabentuk_'
                // },
                // {
                //     data: 'markah_bei_rekabentuk',
                //     name: 'markah_bei_rekabentuk'
                // },
                // {
                //     data: 'markah_verifikasi_',
                //     name: 'markah_verifikasi_'
                // },
                // {
                //     data: 'markah_bei_verifikasi',
                //     name: 'markah_bei_verifikasi'
                // }
                // {
                //     data: 'markah_validasi_',
                //     name: 'markah_validasi_'
                // },
                // {
                //     data: 'markah_bei_validasi',
                //     name: 'markah_bei_validasi'
                // },
                // {
                //     data: 'ulasan_rayuan',
                //     name: 'ulasan_rayuan'
                // },
                // {
                //     data: 'dokumen_rayuan',
                //     name: 'dokumen_rayuan'
                // },

            ]
        });


    });
</script>

<script type="text/javascript">
    $(function() {

        var idProjek1 = {!! json_decode($projek->id) !!}
        console.log(idProjek1);
        var url = "/projek/" + idProjek1;
        var table = $('.skor-datatable-1').DataTable({
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
                    data: 'markah_rekabentuk_',
                    name: 'markah_rekabentuk_'
                },
                {
                    data: 'markah_bei_rekabentuk',
                    name: 'markah_bei_rekabentuk'
                },
                {
                    data: 'markah_verifikasi_',
                    name: 'markah_verifikasi_'
                },
                {
                    data: 'markah_bei_verifikasi',
                    name: 'markah_bei_verifikasi'
                },
                {
                    data: 'markah_validasi_',
                    name: 'markah_validasi_'
                },
                {
                    data: 'markah_bei_validasi',
                    name: 'markah_bei_validasi'
                },
                {
                    data: 'ulasan_rayuan',
                    name: 'ulasan_rayuan'
                },
                {
                    data: 'dokumen_rayuan',
                    name: 'dokumen_rayuan'
                },
            ]
        });


    });
</script>

@endsection
