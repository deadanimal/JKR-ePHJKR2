@extends('layouts.app')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <nav style="--falcon-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%23748194'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/pengurusan_maklumat/senarai_pengguna" class="text-secondary">Pendaftaran Projek</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/pengurusan_maklumat/senarai_pengguna" class="text-secondary">Papar Senarai Projek dari Myskala</a>
                    </li>
                    <li class="breadcrumb-item text-dark-green-jkr" style="font-weight: 700" aria-current="page">
                        Daftar Projek
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h3 class="mb-0 text-primary"><strong>PENDAFTARAN PROJEK Ke Sistem</strong></h3>
        </div>
    </div>

    <hr class="text-primary mb-3">

    <div class="row mt-4 mb-3">
        <div class="col">
            <form action="/myskala2/simpan" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mx-4">
                    <div class="card">
                        
                        <div class="card-body row mx-4">
                            <h1>Butiran Projek Persekutuan</h1> 
                            <div class="col-3 mb-2">
                                <label class="col-form-label">Rujukan Skala :</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" name="rujukan_skala" type="text" value="{{ $projek['records']['butiran_projek_persekutuan']['rujukan_skala'] }}" readonly/>
                            </div>
        
                            <div class="col-3 mb-2">
                                <label class="col-form-label">Nama Projek:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" name="tajuk_projek" type="text" value="{{ $projek['records']['butiran_projek_persekutuan']['tajuk_projek'] }}" readonly/>
                            </div>
        
                            <div class="col-3 mb-2">
                                <label class="col-form-label">Lokasi Tapak:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" name="lokasi_tapak" type="text" value="{{ $projek['records']['butiran_projek_persekutuan']['lokasi_tapak'] }}" readonly/>
                            </div>
        
                            <div class="col-3 mb-2">
                                <label class="col-form-label">Kaedah Pelaksanaan:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" name="kaedah_pelaksanaan" type="text" value="{{ $projek['records']['butiran_projek_persekutuan']['kaedah_pelaksanaan'] }}" readonly/>
                            </div>
        
                            <div class="col-3 mb-2">
                                <label class="col-form-label">Jenis Perolehan:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" name="jenis_perolehan" type="text"  value="{{ $projek['records']['butiran_projek_persekutuan']['jenis_perolehan'] }}" readonly/>
                            </div>
        
                            <div class="col-3 mb-2">
                                <label class="col-form-label">Penarafan Hijau:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" name="penarafan_hijau" type="text" value="{{ $projek['records']['butiran_projek_persekutuan']['penarafan_hijau'] }}" readonly/>
                            </div>
        
                            <div class="col-3 mb-2">
                                <label class="col-form-label">Status:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" name="Status" type="text" value="{{ $projek['records']['butiran_projek_persekutuan']['Status'] }}" readonly/>
                            </div>
        
                            <div class="col-3 mb-2">
                                <label class="col-form-label">Kategori IBS:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" name="kategori_ibs" type="text" value="{{ $projek['records']['butiran_projek_persekutuan']['kategori_ibs'] }}" readonly/>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body row mx-4">
                            <h1>Pelanggan Pejabat Bertanggungjawab</h1>
                            <div class="col-3 mb-2">
                                <label class="col-form-label">Pelanggan:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" name="pelanggan" type="text" value="{{ $projek['records']['pelanggan_pejabat_bertanggungjawab']['pelanggan'] }}" readonly/>
                            </div>
        
                            <div class="col-3 mb-2">
                                <label class="col-form-label">Pengurus Program:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" name="pengurus_program" type="text" value="{{ $projek['records']['pelanggan_pejabat_bertanggungjawab']['pengurus_program'] }}" readonly/>
                            </div>
        
                            <div class="col-3 mb-2">
                                <label class="col-form-label">Pejabat Hopt:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" name="pejabat_hopt" type="text" value="{{ $projek['records']['pelanggan_pejabat_bertanggungjawab']['pejabat_hopt'] }}" readonly/>
                            </div>
        
                            <div class="col-3 mb-2">
                                <label class="col-form-label">Nama Hopt:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" name="nama_hopt" type="text" value="{{ $projek['records']['pelanggan_pejabat_bertanggungjawab']['nama_hopt'] }}" readonly/>
                            </div>
        
                            <div class="col-3 mb-2">
                                <label class="col-form-label">Pejabat Selia Tapak:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" name="pejabat_seliatapak" type="text" value="{{ $projek['records']['pelanggan_pejabat_bertanggungjawab']['pejabat_seliatapak'] }}" readonly/>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body row mx-4">
                            <h1>Jenis Rekabentuk</h1>
                            <div class="col-3 mb-2">
                                <label class="col-form-label">Jenis Rekabentuk pap:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" name="rekabentuk_pap" type="text" value="{{ $projek['records']['jenis_rekabentuk']['rekabentuk_pap'] }}" readonly/>
                            </div>
        
                            <div class="col-3 mb-2">
                                <label class="col-form-label">Jenis Rekabentuk bim:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" name="rekabentuk_bim" type="text" value="{{ $projek['records']['jenis_rekabentuk']['rekabentuk_bim'] }}" readonly/>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body row mx-4">
                            <h1>Kos Projek</h1>
                            <div class="col-3 mb-2">
                                <label class="col-form-label">Kos Projek:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" name="kos_projek_semasa" type="text" value="{{ $projek['records']['kos_projek']['kos_projek_semasa'] }}" readonly/>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body row mx-4">
                            <h1>Aktiviti</h1>
                            <div class="card-body row mx-4">
                                <h3 class="mt-2">Tarikh Iklan</h3>
                                <div class="col-3 mb-2">
                                    <label class="col-form-label">Tarikh Pindaan Semasa:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="pindaan_semasa" type="text" value="{{ $projek['records']['aktiviti']['tarikh_iklan']['pindaan_semasa'] }}" readonly/>
                                </div>
            
                                <div class="col-3 mb-2">
                                    <label class="col-form-label">Tarikh Sah Sebenar:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="sah_sebenar" type="text" value="{{ $projek['records']['aktiviti']['tarikh_iklan']['sah_sebenar'] }}"  readonly/>
                                </div>
            
                                <div class="col-3 mb-2">
                                    <label class="col-form-label">Pejabat Bertanggungjawab:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="pejabat_bertanggungjawab" type="text" value="{{ $projek['records']['aktiviti']['tarikh_iklan']['pejabat_bertanggungjawab'] }}" readonly/>
                                </div>
                            </div>
                            <div class="card-body row mx-4">
                                <h3 class="mt-2">Surat Setuju Terima</h3>
                                <div class="col-3 mb-2">
                                    <label class="col-form-label">Surat Setuju Terima:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="pindaan_semasa" type="text" value="{{ $projek['records']['aktiviti']['surat_setuju_terima']['pindaan_semasa'] }}" readonly/>
                                </div>
            
                                <div class="col-3 mb-2">
                                    <label class="col-form-label">Sah Sebenar:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="sah_sebenar" type="text" value="{{ $projek['records']['aktiviti']['surat_setuju_terima']['sah_sebenar'] }}" readonly/>
                                </div>
            
                                <div class="col-3 mb-2">
                                    <label class="col-form-label">Pejabat Bertanggungjawab:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="pejabat_bertanggungjawab" type="text" value="{{ $projek['records']['aktiviti']['surat_setuju_terima']['pejabat_bertanggungjawab'] }}" readonly/>
                                </div>
                            </div> 
                            <div class="card-body row mx-4">
                                <h3 class="mt-2">Perakuan Siap Kerja</h3>
                                <div class="col-3 mb-2">
                                    <label class="col-form-label">Pindaan Semasa:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="pindaan_semasa" type="text" value="{{ $projek['records']['aktiviti']['perakuan_siap_kerja']['pindaan_semasa'] }}" readonly/>
                                </div>
            
                                <div class="col-3 mb-2">
                                    <label class="col-form-label">Sah Sebenar:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="sah_sebenar" type="text" value="{{ $projek['records']['aktiviti']['perakuan_siap_kerja']['sah_sebenar'] }}" readonly/>
                                </div>
            
                                <div class="col-3 mb-2">
                                    <label class="col-form-label">Pejabat Bertanggungjawab:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="pejabat_bertanggungjawab" type="text" value="{{ $projek['records']['aktiviti']['perakuan_siap_kerja']['pejabat_bertanggungjawab'] }}" readonly/>
                                </div>
                            </div> 
                            <div class="card-body row mx-4">
                                <h3 class="mt-2">Penyerahan Projek Kepada Pelanggan</h3>
                                <div class="col-3 mb-2">
                                    <label class="col-form-label">Pindaan Semasa:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="pindaan_semasa" type="text" value="{{ $projek['records']['aktiviti']['penyerahan_projek_kepada_pelanggan']['pindaan_semasa'] }}" readonly/>
                                </div>
            
                                <div class="col-3 mb-2">
                                    <label class="col-form-label">Sah Sebenar:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="sah_sebenar" type="text" value="{{ $projek['records']['aktiviti']['penyerahan_projek_kepada_pelanggan']['sah_sebenar'] }}" readonly/>
                                </div>
            
                                <div class="col-3 mb-2">
                                    <label class="col-form-label">Pejabat Bertanggungjawab:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="pejabat_bertanggungjawab" type="text" value="{{ $projek['records']['aktiviti']['penyerahan_projek_kepada_pelanggan']['pejabat_bertanggungjawab'] }}" readonly/>
                                </div>
                            </div> 
                        </div>
                    </div>                        
                    <div class="col-3 mb-2">
                        
                    </div>
                    <div class="col-7 mb-2">
                        <div class="row mt-4">
                            <div class="col-6">
                                <a href="/senarai" class="btn btn-outline-primary">Batal</a>
                            </div>
                            <div class="col-6 text-end">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
