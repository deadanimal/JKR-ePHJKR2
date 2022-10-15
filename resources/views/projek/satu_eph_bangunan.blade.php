@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="row mb-3">
    <div class="col-6">
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
                        <h5 class="h6">Status Projek:</h5>
                    </div>
                    <div class="col-8 mb-2">
                        <h5 class="h6" style="font-weight: 700;">{{$projek->status}}</h5>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="card mt-2”>
            <div class="card-body”>
                test
            </div>
        </div> --}}
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="row mx-3 mb-2">
                    <h2 class="mb-3">Lantik PC/PN</h2>
                    <div class="col-5 mb-2">
                        <label class="col-form-label">Nama:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <select class="form-select" aria-label="Default select example" name="jenisProjek">
                            <option selected="">Sila Pilih</option>
                            <option value="Kerajaan">Kerajaan</option>
                            <option value="Swasta">Swasta</option>
                        </select>
                    </div>
                    <div class="col-5 mb-2">
                        <label class="col-form-label">Peranan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <select class="form-select" aria-label="Default select example" name="jenisProjek">
                            <option selected="">Sila Pilih</option>
                            <option value="Kerajaan">Kerajaan</option>
                            <option value="Swasta">Swasta</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="card mt-2">
            <div class="card-body”>
                test
            </div>
        </div> --}}
    </div>
</div>

<div class="tab">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" href="#tab-1" data-bs-toggle="tab" role="tab">Rumusan</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab">Sijil</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab" role="tab">Rekabentuk</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab-4" data-bs-toggle="tab" role="tab">Verifikasi</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab-5" data-bs-toggle="tab" role="tab">Validasi</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab-6" data-bs-toggle="tab" role="tab">Rayuan</a></li>
    </ul>
    <div class="tab-content">

        <div class="tab-pane active" id="tab-1" role="tabpanel">


            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">RUMUSAN SKOR KAD</h4>
            
                    <div class="table-responsive scrollbar">
                        <table class="table table-bordered line-table shadow-table-jkr line-corner-table-jkr">
                            <thead class="text-white line-table">
                                    <tr align="center" style="background-color:#EB5500">
                                        <th colspan="3">Jenis Pembangunan</th>
                                        <th colspan="20">Pembangunan Baru</th>
                                        <th colspan="20">Pemuliharaan/Ubah Suai/Naik Taraf (PUN)</th>
                                        <th colspan="20">Penarafan Semula/Sedia Ada</th>
                                    </tr>
            
                                    <tr align="center" style="background-color:#EB5500">
                                        <th colspan="3">Kategori</th>
                                        <th colspan="5">A</th>
                                        <th colspan="5">B</th>
                                        <th colspan="5">C</th>
                                        <th colspan="5">D</th>
            
                                        <th colspan="5">A</th>
                                        <th colspan="5">B</th>
                                        <th colspan="5">C</th>
                                        <th colspan="5">D</th>
            
                                        <th colspan="5">A</th>
                                        <th colspan="5">B</th>
                                        <th colspan="5">C</th>
                                        <th colspan="5">D</th>
                                    </tr>
                        
                                    <tr align="center" style="background-color:#EB5500">
                                        <th colspan="3">Peratusan Mengikut Kriteria</th>
                                        <th>MM</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MR</th>
                                        <th>MMV</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MV</th>
                                        <th>ML</th>
            
                                        <th>MM</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MR</th>
                                        <th>MMV</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MV</th>
                                        <th>ML</th>
            
                                        <th>MM</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MR</th>
                                        <th>MMV</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MV</th>
                                        <th>ML</th>
            
                                        <th>MM</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MR</th>
                                        <th>MMV</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MV</th>
                                        <th>ML</th>
            
                                        {{-- PUN --}}
                                        <th>MM</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MR</th>
                                        <th>MMV</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MV</th>
                                        <th>ML</th>
            
                                        <th>MM</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MR</th>
                                        <th>MMV</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MV</th>
                                        <th>ML</th>
            
                                        <th>MM</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MR</th>
                                        <th>MMV</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MV</th>
                                        <th>ML</th>
            
                                        <th>MM</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MR</th>
                                        <th>MMV</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MV</th>
                                        <th>ML</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>MM</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MR</th>
                                        <th>MMV</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MV</th>
                                        <th>ML</th>
            
                                        <th>MM</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MR</th>
                                        <th>MMV</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MV</th>
                                        <th>ML</th>
            
                                        <th>MM</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MR</th>
                                        <th>MMV</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MV</th>
                                        <th>ML</th>
            
                                        <th>MM</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MR</th>
                                        <th>MMV</th>
                                        {{-- <th>MS</th> --}}
                                        <th>MV</th>
                                        <th>ML</th>
                                    </tr>
                            </thead>
            
                                    <!--TL-->
                                    <tr align="center" class="text-black" >
                                        <th>TL</th>
                                        <th colspan="2">Perancangan dan Pengurusan Tapak Lestari</th>
                                        <th>26</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MR}}</th> --}}
                                        <th>ls </th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>29</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>29</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>29</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        {{-- PUN --}}
                                        <th>24</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>27</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>27</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>27</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>26</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>26</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>26</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>26</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_TL_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                    </tr>
            
                                    <!--KT-->
                                    <tr align="center" class="text-black" >
                                        <th>KT</th>
                                        <th colspan="2">Pengurusan Kecekapan Tenaga</th>
                                        <th>24</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>36</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>52</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>55</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        {{-- PUN --}}
                                        <th>19</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>30</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>51</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>54</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_KT_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                    </tr>
            
                                    <!--SB-->
                                    <tr align="center" class="text-black" >
                                        <th>SB</th>
                                        <th colspan="2">Pengurusan Sumber dan Bahan</th>
                                        <th>20</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>20</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>20</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>20</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        {{-- PUN --}}
                                        <th>15</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>15</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>15</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>15</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_SB_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                    </tr>
            
                                    <!--PA-->
                                    <tr align="center" class="text-black" >
                                        <th>PA</th>
                                        <th colspan="2">Pengurusan Kecekapan Penggunaan Air</th>
                                        <th>14</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>22</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>22</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>22</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        {{-- PUN --}}
                                        <th>14</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>22</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>22</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>22</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>14</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PA_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                    </tr>
            
                                    <!--PD-->
                                    <tr align="center" class="text-black" >
                                        <th>PD</th>
                                        <th colspan="2">Pengurusan Kualiti Persekitaran Dalaman</th>
                                        <th>11</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>13</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>25</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>29</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        {{-- PUN --}}
                                        <th>1</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        
                                        <th>13</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>25</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>27</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th>FL</th>
                                        <th colspan="2">Pengurusan Fasiliti Lestari</th>
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_FL_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_FL_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>5</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>5</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>5</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        {{-- PUN --}}
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>5</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>5</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>5</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th>IN</th>
                                        <th colspan="2">Inovasi dalam Reka Bentuk</th>
                                        <th>6</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_IN_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_IN_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>6</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>6</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>6</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        {{-- PUN --}}
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>6</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>6</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>6</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahTOTAL_PD_MR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th colspan="3">JUMLAH</th>
                                        <th>101</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>131</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>159</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>166</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        {{-- PUN --}}
                                        <th>73</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>118</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>151</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>156</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
            
                                        <th>0</th>
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMS}}</th> --}}
                                        {{-- <th>{{$kriteria_phjkr_bangunan->markahMR}}</th> --}}
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                    </tr>
            
                                {{-- @endforeach --}}
            
                        </table> <!--Table-->
                    </div>
                </div>
            
                        <div class="mb-3 row mx-3">
                            <table class="table table-bordered line-table shadow-table-jkr">
                                <thead class="text-white line-table">
                                    <tr align="center" style="background-color:#EB5500">
                                        <th colspan="3">KEPUTUSAN PENARAFAN HIJAU PERINGKAT REKA BENTUK (PRB)
                                            | VERIFIKASI PERMARKAHAN BANGUNAN | VALIDASI PERMARKAHAN BANGUNAN
                                        </th>
                                    </tr>
            
                                    {{-- <tr align="center" class="text-black">
                                        <th colspan="3">
                                            <a class="button btn btn-primary" href="/">Semakan Rawak</a>
                                            <a class="button btn btn-secondary" type="submit" href="/penilaian_reka_bentuk_bangunan/jana_sijil/create">Disahkan</a>
                                        </th>
                                    </tr> --}}
            
                                    <tr align="center" style="background-color:#EB5500">
                                        <th colspan="3">MARKAH PENILAIAN</th>
                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th colspan="2">Jumlah Markah</th>
                                        <th colspan="2"></th>
                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th colspan="2">Peratusan</th>
                                        <th colspan="2">80%</th>
                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th colspan="2">Penarafan PH</th>
                                        <th colspan="2">5<span class="star">&starf;</span></th>
                                    </tr>
            
                                    <tr align="center" style="background-color:#EB5500" >
                                        <th colspan="2">Petunjuk Penarafan</th>
                                        <th>Sijil Penarafan</th>
                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th><span class="star">&starf; &starf; &starf; &starf; &starf;</span></th>
                                        <th>80 - 100</th>
                                        <th>Kecemerlangan Global</th>
                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th><span class="star">&starf; &starf; &starf; &starf;</span></th>
                                        <th>65 - 79</th>
                                        <th>Kecemerlangan Nasional</th>
                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th><span class="star">&starf; &starf; &starf;</span></th>
                                        <th>45 - 64</th>
                                        <th>Amalan Pengurusan Terbaik</th>
                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th><span class="star">&starf; &starf;</span></th>
                                        <th>30 - 44</th>
                                        <th>Potensi Pengiktirafan</th>
                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th><span class="star">&starf;</span></th>
                                        <th>< 29</th>
                                        <th>Sijil Penyertaan</th>
                                    </tr>
                                </thead>
                            </table> <!--Table Keputusan Penarafan Hijau Peringkat Reka Bentuk(PRB)-->
                        </div>
            </div>            


        </div>

        <div class="tab-pane" id="tab-2" role="tabpanel">

            {{ $kriteria }}

        </div>

        <div class="tab-pane" id="tab-3" role="tabpanel">


                <div class="card mt-3">
                    <div class="card-body">
                        <div class="table-responsive scrollbar">
                            <h4 class="text-align:center;">Borang Penilaian Rekabentuk Bangunan</h4>
                
                        <!--------------------------------------- MarkahTL ---------------------------------------->
                
                        <form action="/projek/{{ $projek->id }}/eph-bangunan/rekabentuk" method="POST">
                            @csrf

                        <table id="example" class="table table-bordered line-table display">
                            <thead class="text-white">
                                <tr class="pg-1" align="center" style="background-color:#EB5500">
                                    <th rowspan="3">Kod</th>
                                    <th rowspan="3">Kriteria</th>
                                    <th rowspan="3" colspan="6">Kategori Bangunan</th>
                                    <th colspan="2">Pembangunan Baru</th>
                                    <th colspan="2">Pemuliharaan/ Ubahsuai/ Naiktaraf (PUN)</th>
                                    <th rowspan="2">Dokumen Pembuktian</th>
                                    <th rowspan="3" colspan="5">Ulasan/Maklumbalas Rekabentuk</th>
                                    <th rowspan="3" colspan="4">Muat Naik Dokumen Sokongan</th>
                                </tr>
                
                                <tr class="pg-1" align="center" style="background-color:#EB5500">
                                    <th colspan="2">Markah</th>
                                    <th colspan="2">Markah</th>
                                </tr>
                            
                                <tr class="pg-1" align="center" style="background-color:#EB5500">
                                    <th>MM</th>
                                    <th>MR</th>
                                    <th>MM</th>
                                    <th>MR</th>
                                    <th>Rekabentuk (Peringkat 2)</th>
                                </tr>
                
                                <tr class="pg-1" style="background-color:#EB5500">
                                    <th>TL</th>
                                    <th colspan="23">PERANCANGAN & PENGURUSAN TAPAK LESTARI</th>
                                </tr>
                            </thead>
                
                                <!--TL1-->
                                <tr class="pg-1" align="center">
                                    <td>TL1</td>
                                    <td>Perancangan Tapak</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_TL()" class="MR_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL1_MR" name="markahTL1_MR" value="{{$kriteria->markahTL1_MR}}" required/></td>
                                    <td></td>
                                    <td></td>
                                    <td>Rancangan Tempatan yang menunjukkan kawasan pembangunan yang terlibat</td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahTL1_ULASAN_PRB" name="markahTL1_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                                    </td>
                                </tr>
                
                                <!--TL2-->
                                <tr class="pg-1" align="center">
                                    <td>TL2</td>
                                    <td>Sistem Pengurusan Alam Sekitar (SPAS)</td>
                                    <td colspan="6"></td>
                                    <td>3</td>
                                    <td><input onblur="findTotalMR_TL()" class="MR_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL2_MR" name="markahTL2_MR" required/></td>
                                    <td>3</td>
                                    <td><input onblur="findTotalMR_TL_PUN()" class="MR_TL_PUN" type="number" min="0" max="3" autocapitalize="off" id="markahTL2_MR_PUN" name="markahTL2_MR_PUN" required/></td>
                                    <td><span>&#183; Sijil ISO 14001</span><br>
                                        <span>&#183; Senarai kuantiti (BQ) kerja-kerja perlindungan alam sekitar</span>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahTL2_ULASAN_PRB" name="markahTL2_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>                        
                                </tr>
                
                                <!--TL3-->
                                <tr class="pg-1" align="center">
                                    <td rowspan="2">TL3</td>
                                    <td>i. Pemotongan dan Penambakan tanah</td>
                                    <td rowspan="2" colspan="6"></td>                            
                                    <td>3</td>
                                    <td><input onblur="findTotalMR_TL()" class="MR_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL3_MR" name="markahTL3_MR" required/></td>
                                    <td>3</td>
                                    <td><input onblur="findTotalMR_TL_PUN()" class="MR_TL_PUN" type="number" min="0" max="3" autocapitalize="off" id="markahTL3_MR_PUN" name="markahTL3_MR_PUN" required/></td>
                                    <td>
                                        <span>&#183; Laporan rekabentuk tanah</span><br>
                                        <span>&#183; Lukisan pelan tanah</span><br>
                                        <span>&#183; Laporan geoteknikal (jika perlu)</span>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahTL3_ULASAN_PRB" name="markahTL3_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>                        
                                </tr>
                
                                <tr class="pg-1" align="center">
                                    <td>ii. Mengekalkan Topografi Tanah</td>
                                    <td>2</td>
                                    <td><input onblur="findTotalMR_TL()" class="MR_TL" type="number" min="0" max="2" autocapitalize="off" id="markahTL32_MR" name="markahTL32_MR" required/></td>
                                    <td>2</td>
                                    <td><input onblur="findTotalMR_TL_PUN()" class="MR_TL_PUN" type="number" min="0" max="3" autocapitalize="off" id="markahTL32_MR_PUN" name="markahTL32_MR_PUN" required/></td>
                                    <td>
                                        <span>&#183; Pelan Topografi</span><br>
                                        <span>&#183; Laporan geoteknikal</span><br>
                                        <span>&#183; Laporan rekabentuk tanah</span><br>
                                        <span>&#183; Lukisan pelan kerja tanah</span><br>
                                        <span>&#183; Pelan kawalan hakisan kelodak (ESCP)</span>
                
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahTL32_ULASAN_PRB" name="markahTL32_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>
                
                                <!--TL4-->
                                <tr class="pg-1" align="center">
                                    <td>TL4</td>
                                    <td>Pelan Kawalan Hakisan & Kelodak (ESCP)</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_TL()" class="MR_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL4_MR" name="markahTL4_MR" required/></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_TL_PUN()" class="MR_TL_PUN" type="number" min="0" max="1" autocapitalize="off" id="markahTL4_MR_PUN" name="markahTL4_MR_PUN" required/></td>
                                    <td>
                                        <span>&#183; Pelan Kawalan Hakisan & Kelodak (ESCP)</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahTL4_ULASAN_PRB" name="markahTL4_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>                        
                                </tr>
                
                                <!--TL5-->
                                <tr class="pg-1" align="center">
                                    <td>TL5</td>
                                    <td>Pemuliharaan dan Pemeliharaan Cerun</td>
                                    <td colspan="6"></td>                            
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_TL()" class="MR_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL5_MR" name="markahTL5_MR" required/></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_TL_PUN()" class="MR_TL_PUN" type="number" min="0" max="1" autocapitalize="off" id="markahTL5_MR_PUN" name="markahTL5_MR_PUN" required/></td>
                                    <td>
                                        <span>&#183; Laporan penyenggaraan cerun</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahTL5_ULASAN_PRB" name="markahTL5_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                
                                        
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>                        
                                </tr>
                
                                <!--TL6-->
                                <tr class="pg-1" align="center">
                                    <td>TL6</td>
                                    <td>Pengurusan Air Larian Hujan</td>
                                    <td colspan="6"></td>                          
                                    <td>3</td>
                                    <td><input onblur="findTotalMR_TL()" class="MR_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL6_MR" name="markahTL6_MR" required/></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_TL_PUN()" class="MR_TL_PUN" type="number" min="0" max="1" autocapitalize="off" id="markahTL6_MR_PUN" name="markahTL6_MR_PUN" required/></td>
                                    <td>
                                        <span>&#183; Laporan rekabentuk sistem perparitan</span><br>
                                        <span>&#183; Pelan sistem perparitan berdasarkan MSMA</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahTL6_ULASAN_PRB" name="markahTL6_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>
                
                                <!--TL7-->
                                <tr class="pg-1" align="center">
                                    <td>TL7</td>
                                    <td>Rekabentuk, Aksebiliti dan Kemudahan OKU</td>
                                    <td colspan="6"></td>                           
                                    <td>2</td>
                                    <td><input onblur="findTotalMR_TL()" class="MR_TL" type="number" min="0" max="2" autocapitalize="off" id="markahTL7_MR" name="markahTL7_MR" /></td>
                                    <td>2</td>
                                    <td><input onblur="findTotalMR_TL_PUN()" class="MR_TL_PUN" type="number" min="0" max="2" id="markahTL7_MR_PUN" name="markahTL7_MR_PUN"></td>
                                    <td>
                                        <span>&#183; Pelan susunatur (luar bangunan) yang menunjukkan aksesibiliti dan kemudahan OKU dalam pelan tapak</span><br>
                                        <span>&#183; Lukisan terperinci kemudahan OKU dalam bangunan</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahTL7_ULASAN_PRB" name="markahTL7_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>
                
                
                                <!--TL8--> <!--NO INPUT-->
                                <tr class="pg-1" align="center">
                                    <td>TL8</td>
                                    <td>Landskap strategik</td>
                                    <td colspan="6"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="5"></td>
                                    <td colspan="4"></td>
                
                                </tr>
                
                                <!--TL8.1-->
                                <tr class="pg-1" align="center">
                                    <td>TL8.1</td>
                                    <td>Memelihara dan menyenggara pokok yang matang</td>
                                    <td colspan="6"></td>
                                    <td>3</td>
                                    <td><input onblur="findTotalMR_TL()" class="MR_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL81_MR" name="markahTL81_MR" required/></td>
                                    <td>3</td>
                                    <td><input onblur="findTotalMR_TL_PUN()" class="MR_TL_PUN" type="number" min="0" max="3" autocapitalize="off" id="markahTL81_MR_PUN" name="markahTL81_MR_PUN" required/></td>
                                    <td>
                                        <span>&#183; Inventori pokok</span><br>
                                        <span>&#183; Pelan ukur bagi lokasi pokok matang sedia ada</span><br>
                                        <span>&#183; Pelan penanaman pokok</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahTL8_ULASAN_PRB" name="markahTL8_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>
                
                                <!--TL8.2-->
                                <tr class="pg-1" align="center">
                                    <td>TL8.2</td>
                                    <td>Menyediakan kawasan hijau</td>
                                    <td colspan="6"></td>                           
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_TL()" class="MR_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL82_MR" name="markahTL82_MR" required/></td>
                                    <td>2</td>
                                    <td><input onblur="findTotalMR_TL_PUN()" class="MR_TL_PUN" type="number" min="0" max="2" autocapitalize="off" id="markahTL82_MR_PUN" name="markahTL82_MR_PUN" required/></td>
                                    <td>
                                        <span>Laporan cadangan menunjukkan:</span><br>
                                        <span>&#183; 30% kawasan hijau (disahkan oleh arkitek atau jururancang bertauliah)</span><br>
                                        <span>&#183; Pokok, pokok renek, tumbuhan penutup bumi, rumput</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahTL82_ULASAN_PRB" name="markahTL82_ULASAN_PRB"></textarea></td>
                                    <td colspan="4"><input id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                                </tr>
                
                                <!--TL8.3-->
                                <tr class="pg-1" align="center">
                                    <td>TL8.3</td>
                                    <td>Menyedia dan menyenggara penanaman pokok teduhan</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_TL()" class="MR_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL83_MR" name="markahTL83_MR" required/></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_TL_PUN()" class="MR_TL_PUN" type="number" min="0" max="1" autocapitalize="off" id="markahTL83_MR_PUN" name="markahTL83_MR_PUN" required/></td>
                                    <td>
                                        <span>&#183; Penyediaan pelan landskap</span><br>
                                        <span>&#183; Jadual spesis pokok</span><br>
                                        <span>&#183; Anggaran bayang-bayang pokok atau struktur selain bangunan</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahTL83_ULASAN_PRB" name="markahTL83_ULASAN_PRB"></textarea></td>
                                    <td colspan="4"><input id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                                </tr>
                
                                <!--TL8.4-->
                                <tr class="pg-1" align="center">
                                    <td>TL8.4</td>
                                    <td>Pemilihan bahan binaan siarkaki (walkway) yang mempunyai daya pantulan
                                        haba yang tinggi
                                    </td>
                                    <td colspan="6"></td>                            
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_TL()" class="MR_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL84_MR" name="markahTL84_MR" required/></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_TL_PUN()" class="MR_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL84_MR_PUN" name="markahTL84_MR_PUN" required/></td>
                                    <td>
                                        <span>&#183; Lukisan terperinci dengan spesifikasi</span><br>
                                        <span>&#183; Katalog berserta jadual SRI bahan siarkaki</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahTL84_ULASAN_PRB" name="markahTL84_ULASAN_PRB"></textarea></td>
                                    <td colspan="4"><input id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                                </tr>
                
                                <!--TL8.5-->
                                <tr class="pg-1" align="center">
                                    <td>TL8.5</td>
                                    <td>Menyedia dan menyenggara sistem turapan berumput</td>
                                    <td colspan="6"></td>
                                    <td>2</td>
                                    <td><input onblur="findTotalMR_TL()" class="MR_TL" type="number" min="0" max="2" autocapitalize="off" id="markahTL85_MR" name="markahTL85_MR" required/></td>
                                    <td>2</td>
                                    <td><input onblur="findTotalMR_TL_PUN()" class="MR_TL_PUN" type="number" min="0" max="2" autocapitalize="off" id="markahTL85_MR_PUN" name="markahTL85_MR_PUN" required/></td>
                                    <td>
                                        <span>&#183; Lukisan butiran dan spesifikasi sistem turapan</span><br>
                                        <span>&#183; Lukisan susun atur tapak pembangunan</span><br>
                                        <span>&#183; Pengiraan luas zon turapan</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahTL85_ULASAN_PRB" name="markahTL85_ULASAN_PRB"></textarea></td>
                                    <td colspan="4"><input id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                                </tr>
                
                                <!--TL9--><!--NO INPUT-->
                                <tr class="pg-1" align="center">
                                    <td>TL9</td>
                                    <td>Bumbung Hijau & Dinding Hijau</td>
                                    <td colspan="6"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="4"></td>
                                    <td colspan="5"></td>
                                </tr>
                
                                <!--TL9.1-->
                                <tr class="pg-1" align="center">
                                    <td>TL9.1</td>
                                    <td>Indeks Pantulan Suria (SRI) mengikut jenis & kecerunan bumbung
                                    </td>
                                    <td colspan="6"></td>                      
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_TL()" class="MR_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL91_MR" name="markahTL91_MR" required/></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_TL_PUN()" class="MR_TL_PUN" type="number" min="0" max="1" autocapitalize="off" id="markahTL91_MR_PUN" name="markahTL91_MR_PUN" required/></td>
                                    <td>
                                        <span>&#183; Katalog berserta jadual SRI bumbung</span><br>
                                        <span>&#183; Pengiraan keluasan bumbung</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahTL91_ULASAN_PRB" name="markahTL91_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>
                
                                <!--TL9.2-->
                                <tr class="pg-1" align="center">
                                    <td>TL9.2</td>
                                    <td>Menggalakkan rekabentuk bumbung/dinding hijau</td>
                                    <td colspan="6"></td>
                                    <td>3</td>
                                    <td><input onblur="findTotalMR_TL()" class="MR_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL92_MR" name="markahTL92_MR" required/></td>
                                    <td>3</td>
                                    <td><input onblur="findTotalMR_TL_PUN()" class="MR_TL_PUN" type="number" min="0" max="3" autocapitalize="off" id="markahTL92_MR_PUN" name="markahTL92_MR_PUN" required/></td>
                                    <td>
                                        <span>&#183; Pelan konsep rekabentuk</span><br>
                                        <span>&#183; Jadual keluasan kawasan bumbung</span><br>
                                        <span>&#183; Lukisan butiran dan jadual penanaman</span><br>
                                        <span>&#183; Pengiraan</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahTL92_ULASAN_PRB" name="markahTL92_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>  --}}
                                    </td>
                                </tr>
                
                                <!--TL10-->
                                <tr class="pg-1" align="center">
                                    <td>TL10</td>
                                    <td>Tempat Letak Kenderaan</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_TL()" class="MR_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL10_MR" name="markahTL10_MR" /></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_TL_PUN()" class="MR_TL_PUN" type="number" min="0" max="1" id="markahTL10_MR_PUN" name="markahTL10_MR_PUN" ></td>
                                    <td>
                                        <span>&#183; Lukisan susun atur tempat letak kenderaan dan penanda</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahTL10_ULASAN_PRB" name="markahTL10_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>  --}}
                                    </td>
                                </tr>
                
                                <!--JUMLAH MARKAHTL-->
                                <tr class="pg-1" align="center">
                                    <th colspan="6">Jumlah markah TL</th>
                                    <td colspan="3">26</td>
                                    <td><input id="totalMR_TL" type="number" min="0" autocapitalize="off" name="markahTOTAL_TL_MR" id="markahTOTAL_TL_MR"/></td>
                                    <td></td>
                                    <td><input id="totalMR_TL_PUN" type="number" min="0" autocapitalize="off" name="markahTOTAL_TL_MR_PUN" id="markahTOTAL_TL_MR_PUN"/></td>
                                    <td colspan="9"></td>
                                </tr> 
                
                                <thead class="pg-2 text-white" style="background-color:#EB5500">
                                    <th>KT</th>
                                    <th colspan="23">PENGURUSAN KECEKAPAN TENAGA DAN PENGGUNAAN TENAGA BOLEH BAHARU</th>
                                </thead>
                
                                <!--KT1-->
                                <tr align="center">
                                    <td>KT1</td>
                                    <td>Rekabentuk bumbung</td>
                                    <td colspan="6"></td>
                                    <td>2</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="2" id="markahKT1_MR" name="markahKT1_MR" autocapitalize="off" required/></td>
                                    <td>2</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="2" id="markahKT1_MR_PUN" name="markahKT1_MR_PUN" autocapitalize="off" required/></td>
                                    <td>
                                        <span>&#183; Katalog spesifikasi U-Value bahan</span><br>
                                        <span>&#183; Pengiraan U-Value bagi rekabentuk bumbung</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahKT1_ULASAN_PRB" name="markahKT1_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                
                                </tr>
                
                                <!--KT2--><!--NO INPUT-->
                                <tr align="center">
                                    <td>KT2</td>
                                    <td>Orientasi bangunan</td>
                                    <td colspan="6"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="5"></td>
                                    <td colspan="4"></td> 
                                </tr>
                
                                <!--KT2.1-->
                                <tr align="center">
                                    <td>KT2.1</td>
                                    <td>Fasad Utama bangunan yang menghadap orientasi utara-selatan</td>
                                    <td colspan="6"></td>                           
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="1" id="markahKT21_MR" name="markahKT21_MR" autocapitalize="off" required/></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="1" id="markahKT21_MR_PUN" name="markahKT21_MR_PUN" autocapitalize="off" required/></td>
                                    <td>
                                        <span>&#183; Pelan tapak berserta penunjuk arah utara
                                            menunjukkan pelan bangunan dengan meletakkan sun-path diagram</span><br>
                                        <span>&#183; Lukisan siap bina</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahKT21_ULASAN_PRB" name="markahKT21_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>
                
                                <!--KT2.2-->
                                <tr align="center">
                                    <td>KT2.2</td>
                                    <td>Meminimumkan bukaan pada fasad yang menghadap timur dan barat</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="1" id="markahKT22_MR" name="markahKT22_MR" autocapitalize="off" required/></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="1" id="markahKT22_MR_PUN" name="markahKT22_MR_PUN" autocapitalize="off" required/></td>
                                    <td>
                                        <span>&#183; Laporan penyenggaraan cerun</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahKT22_ULASAN_PRB" name="markahKT22_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>
                
                                <!--KT3--><!--NO INPUT-->
                                <tr align="center">
                                    <td>KT3</td>
                                    <td>Rekabentuk fasad</td>
                                    <td colspan="6"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="5"></td>
                                    <td colspan="4"></td> 
                                </tr>
                
                                <!--KT3.1-->
                                <tr align="center">
                                    <td>KT3.1</td>
                                    <td>Dinding luar bangunan</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="1" id="markahKT31_MR" name="markahKT31_MR" autocapitalize="off" required/></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="1" id="markahKT31_MR_PUN" name="markahKT31_MR_PUN" autocapitalize="off" required/></td>
                                    <td>
                                        <span>&#183; Katalog spesifikasi U-Value bahan</span><br>
                                        <span>&#183; Pengiraan U-Value bagi rekabentuk dinding</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahKT31_ULASAN_PRB" name="markahKT31_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>
                
                                <!--KT3.2-->
                                <tr align="center">
                                    <td>KT3.2</td>
                                    <td>Pengadang Suria Luaran</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="1" id="markahKT32_MR" name="markahKT32_MR" autocapitalize="off" required/></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="1" id="markahKT32_MR_PUN" name="markahKT32_MR_PUN" autocapitalize="off" required/></td>
                                    <td>
                                        <span>&#183; Katalog bahan</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahKT32_ULASAN_PRB" name="markahKT32_ULASAN_PRB"></textarea></td>
                                    <td colspan="4">
                                        <input  id="formFileSm" type="file">                                
                                    </td>
                                </tr>
                
                                <!--KT4-->
                                <tr align="center">
                                    <td>KT4</td>
                                    <td>OTTV & RTTV</td>
                                    <td colspan="6"></td>
                                    <td>5</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="5" id="markahKT4_MR" name="markahKT4_MR" autocapitalize="off" required/></td>
                                    <td>5</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="5" id="markahKT4_MR_PUN" name="markahKT4_MR_PUN" autocapitalize="off" required/></td>
                                    <td>
                                        <span>&#183; Pengiraan OTTV dan RTTV yang disahkan</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahKT4_ULASAN_PRB" name="markahKT4_ULASAN_PRB"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                                </tr>
                
                                <!--KT5--><!--NO INPUT-->
                                <tr align="center">
                                    <td>KT5</td>
                                    <td>Kecekapan pencahayaan</td>
                                    <td colspan="6"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="5"></td>
                                    <td colspan="4"></td>
                                </tr>
                
                                <!--KT5.1-->
                                <tr class="pg-2" align="center">
                                    <td>KT5.1</td>
                                    <td>Zon Pencahayaan</td>
                                    <td colspan="6"></td>
                                    <td>3</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="3" id="markahKT51_MR" name="markahKT51_MR" autocapitalize="off" required/></td>
                                    <td>3</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="3" id="markahKT51_MR_PUN" name="markahKT51_MR_PUN" required/></td>
                                    <td>
                                        <span>&#183; Lukisan pelan lantai bagi litar lampu yang telah di zon selari dengan pencahayaan semulajadi</span><br>
                                        <span>&#183; Lukisan pelan lantai bagi lokasi pemasangan sensor</span><br>
                                        <span>&#183; Pengiraan jumlah kawasan yang dikawal oleh pengesan cahaya automatik</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                
                                </tr>
                
                                <!--KT5.2-->
                                <tr align="center">
                                    <td>KT5.2</td>
                                    <td>Kawalan Pencahayaan (M)</td>
                                    <td colspan="6"></td>
                                    <td>6</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="6" id="markahKT52_MR" name="markahKT52_MR" autocapitalize="off" required/></td>
                                    <td>6</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="6" id="markahKT52_MR_PUN" name="markahKT52_MR_PUN" autocapitalize="off" required/></td>
                                    <td>
                                        <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                        <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahKT52_ULASAN_PRB" name="markahKT52_ULASAN_PRB"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                
                                </tr>
                
                                <!--KT5.3-->
                                <tr class="pg-2" align="center">
                                    <td>KT5.3</td>
                                    <td>Lighting Power Density (LPD)</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="1" id="markahKT53_MR" name="markahKT53_MR" autocapitalize="off" /></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="1" id="markahKT53_MR_PUN" name="markahKT53_MR_PUN"></td>
                                    <td>
                                        <span>&#183; Brosur/katalog produk lampu</span><br>
                                        <span>&#183; Pengiraan dan jadual LPD (kaedah manual atau simulasi) bagi setiap ruang</span><br>
                                        <span>&#183; Lukisan pelan elektrik yang menunjukkan bilangan dan jenis lampu</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                                </tr>
                
                                <!--KT6--><!--No input-->
                                <tr class="pg-2" align="center">
                                    <td>KT6</td>
                                    <td>Sistem Penyaman udara dan pengudaraan mekanikal (ACMV)</td>
                                    <td colspan="6"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="5"></td>
                                    <td colspan="4">
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>
                
                                <!--KT6.1-->
                                <tr class="pg-2" align="center">
                                    <td>KT6.1</td>
                                    <td>Coefficient of Performance (COP)</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="1" id="markahKT61_MR" name="markahKT61_MR" autocapitalize="off" /></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="1" id="markahKT61_MR_PUN" name="markahKT61_MR_PUN"></td>
                                    <td>
                                        <span>&#183; Jadual peralatan (equipment schedule)</span><br>
                                        <span>&#183; Pengiraan anggaran COP</span><br>
                                        <span>&#183; Susun atur skematik ACMV</span><br>
                                        <span>&#183; Brosur pembekal</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                                </tr>
                
                                <!--KT6.2-->
                                <tr class="pg-2" align="center">
                                    <td>KT6.2</td>
                                    <td>Green Refrigerant</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="1" id="markahKT62_MR" name="markahKT62_MR" autocapitalize="off" /></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="1" id="markahKT62_MR_PUN" name="markahKT62_MR_PUN"></td>
                                    <td>
                                        <span>&#183; Equipment schedule</span><br>
                                        <span>&#183; Skematik</span><br>
                                        <span>&#183; Brosur pembekal</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                                </tr>
                
                                <!--KT7-->
                                <tr class="pg-2" align="center">
                                    <td>KT7</td>
                                    <td>Penyusupan Udara</td>
                                    <td colspan="6"></td>
                                    <td>3</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="3" id="markahKT7_MR" name="markahKT7_MR" autocapitalize="off" /></td>
                                    <td>3</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="3" id="markahKT7_MR_PUN" name="markahKT7_MR_PUN"></td>
                                    <td>
                                        <span>&#183; Rekabentuk awalan yang menunjukkan zon berhawa dingin</span><br>
                                        <span>&#183; Jadual keperluan ruang (SOA)</span><br>
                                        <span>&#183; Pelan susun atur menunjukkan ante-room, ruang berhawa dingin dan tidak berhawa dingin</span><br>
                                        <span>&#183; Lukisan rekabentuk sistem penghawa dingin</span><br>
                
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                                </tr>
                
                                <!--KT8-->
                                <tr align="center">
                                    <td>KT8</td>
                                    <td>Tenaga Boleh Baharu (TBB)</td>
                                    <td colspan="6"></td>
                                    <td>6</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="6" id="markahKT8_MR" name="markahKT8_MR" autocapitalize="off" required/></td>
                                    <td>6</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="6" id="markahKT8_MR_PUN" name="markahKT8_MR_PUN" autocapitalize="off" required/></td>
                                    <td>
                                        <span>&#183; Mengemukakan lukisan rekabentuk sistem dan simulasi pengiraan
                                            bagi anggaran tenaga baharu yang boleh dihasilkan oleh sistem tersebut</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahKT8_ULASAN_PRB" name="markahKT8_ULASAN_PRB"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                                </tr>
                
                                <!--KT9-->
                                <tr class="pg-2" align="center">
                                    <td>KT9</td>
                                    <td>Prestasi Penggunaan Tenaga</td>
                                    <td colspan="6"></td>
                                    <td>10</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="10" id="markahKT9_MR" name="markahKT9_MR" autocapitalize="off" /></td>
                                    <td>10</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="10" id="markahKT9_MR_PUN" name="markahKT9_MR_PUN"></td>
                                    <td>
                                        <span>&#183; Laporan simulasi pengiraan pengurangan penggunaan tenaga</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                
                                </tr>
                
                                <!--KT10--><!--No input-->
                                <tr class="pg-2" align="center">
                                    <td>KT10</td>
                                    <td>Paparan dan kawalan</td>
                                    <td colspan="6"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="5"></td>
                                    <td colspan="4">
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>
                
                                <!--KT10.1-->
                                <tr class="pg-2" align="center">
                                    <td>KT10.1</td>
                                    <td>Pemasangan sub-meter digital</td>
                                    <td colspan="6"></td>
                                    <td>6</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="6" id="markahKT101_MR" name="markahKT101_MR" autocapitalize="off"/></td>
                                    <td>5</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="5" id="markahKT101_MR_PUN" name="markahKT101_MR_PUN"></td>
                                    <td>
                                        <span>&#41; Baru</span><br>
                                        <span>&#183; Single line drawing</span><br>
                                        <span>&#183; Lukisan skematik</span><br>
                                        <span>&#183; Brosur/katalog produk</span><br>
                                        <span>&#41; Sedia ada</span><br>
                                        <span>&#183; Bukti bergambar</span><br>
                                        <span>&#183; Lukisan siap bina kedudukan sub-meter pada papan suis utama dan
                                            suis kecil, papan agihan bagi setiap servis yang &#8805; 100A (TCL)</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                                </tr>
                
                                <!--KT10.2-->
                                <tr class="pg-2" align="center">
                                    <td>KT10.2</td>
                                    <td>Sistem Pengurusan Kawalan Tenaga</td>
                                    <td colspan="6"></td>
                                    <td>5</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="5" id="markahKT102_MR" name="markahKT102_MR" autocapitalize="off" /></td>
                                    <td>5</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="5" id="markahKT102_MR_PUN" name="markahKT102_MR_PUN"></td>
                                    <td>
                                        <span>&#183; Input/Output (I/O) point</span><br>
                                        <span>&#183; Gambar rajah litar</span><br>
                                        <span>&#183; Brosur dan spesifikasi produk</span><br>
                
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                                </tr>
                
                                <!--KT10.3-->
                                <tr class="pg-2" align="center">
                                    <td>KT10.3</td>
                                    <td>Verifikasi sistem paparan dan kawalan</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="1" id="markahKT103_MR" name="markahKT103_MR" autocapitalize="off" /></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="1" id="markahKT103_MR_PUN" name="markahKT103_MR_PUN"></td>
                                    <td>
                                        <span>&#183; Mengemukakan Pelan Verifikasi</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                                </tr>
                
                                <!--KT11-->
                                <tr class="pg-2" align="center">
                                    <td>KT11</td>
                                    <td>Pengujian dan pentauliahan</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT()" class="MR_KT" type="number" min="0" max="1" id="markahKT11_MR" name="markahKT11_MR" autocapitalize="off" required/></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMR_KT_PUN()" class="MR_KT_PUN" type="number" min="0" max="1" id="markahKT11_MR_PUN" name="markahKT11_MR_PUN" autocapitalize="off" required/></td>
                                    <td>
                                        <span>&#183; Pelan pengujian dan pentauliahan</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahKT11_ULASAN_PRB" name="markahKT11_ULASAN_PRB"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                
                                </tr>
                
                                <!--JUMLAH MARKAHKT-->
                                <tr align="center">
                                    <th colspan="6">Jumlah markah KT</th>
                                    <td colspan="3">24</td>
                                    <td><input id="totalMR_KT" type="number" min="0" autocapitalize="off" id="markahTOTAL_KT_MR" name="markahTOTAL_KT_MR"/></td>
                                    <td></td>
                                    <td><input id="totalMR_KT_PUN" type="number" min="0" autocapitalize="off" id="markahTOTAL_KT_MR_PUN" name="markahTOTAL_KT_MR_PUN"/></td>
                                    <td colspan="9"></td>
                                </tr> 
                
                                <thead class="pg-2 text-white" style="background-color:#EB5500">
                                    <th>SB</th>
                                    <th colspan="23">PENGURUSAN SUMBER DAN BAHAN</th>
                                </thead>
                
                                <!--SB1-->
                                <tr class="pg-3" align="center">
                                    <td>SB1</td>
                                    <td>Sistem Binaan Berindustri (IBS)</td>
                                    <td colspan="6"></td>
                                    <td>5</td>
                                    <td><input onblur="findTotalMR_SB()" class="MR_SB" type="number" min="0" max="5" id="markahSB1_MR" name="markahSB1_MR" autocapitalize="off" required/></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <span>&#183; Cadangan sistem IBS oleh pembekal IBS berdaftar</span><br>
                                        <span>&#183; Laporan Pengiraan Skor IBS</span><br>
                                    </td>
                                    <td colspan="5" colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahSB1_ULASAN_PRB" name="markahSB1_ULASAN_PRB"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                
                                </tr>
                
                                <!--SB2-->
                                <tr class="pg-3" align="center">
                                    <td>SB2</td>
                                    <td>Produk hijau</td>
                                    <td colspan="6"></td>
                                    <td>7</td>
                                    <td><input onblur="findTotalMR_SB()" class="MR_SB" type="number" min="0" max="7" id="markahSB2_MR" name="markahSB2_MR" autocapitalize="off" required/></td>
                                    <td>7</td>
                                    <td><input onblur="findTotalMR_SB_PUN()" class="MR_SB_PUN" type="number" min="0" max="7" id="markahSB2_MR_PUN" name="markahSB2_MR_PUN" autocapitalize="off" required/></td>
                                    <td>
                                        <span>&#183; Sijil Pengesahan produk hijau</span><br>
                                        <span>&#183; spesifikasi produk</span><br>
                                        <span>&#183; Senarai permarkahan produk hijau berdasarkan GPSS</span><br>                    
                                    </td>
                                    <td colspan="5" colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahSB2_ULASAN_PRB" name="markahSB2_ULASAN_PRB"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                                </tr>
                
                                <!--SB3-->
                                <tr class="pg-3" align="center">
                                    <td>SB3</td>
                                    <td>Pengurusan sisa semasa pembinaan</td>
                                    <td colspan="6"></td>
                                    <td>4</td>
                                    <td><input onblur="findTotalMR_SB()" class="MR_SB" type="number" min="0" max="4" id="markahSB3_MR" name="markahSB3_MR" autocapitalize="off" required/></td>
                                    <td>4</td>
                                    <td><input onblur="findTotalMR_SB_PUN()" class="MR_SB_PUN" type="number" min="0" max="4" id="markahSB3_MR_PUN" name="markahSB3_MR_PUN" autocapitalize="off" required/></td>
                                    <td>
                                        <span>&#183; Pelan pengurusan sisa yang meliputi Buangan Terjadual
                                            dan Sisa Bahan Binaan</span><br>
                                        <span>&#183; Lukisan yang menunjukkan ruang pengurusan sisa</span><br>
                                        <span>&#183; Pelan tapak dengan kawasan simpanan sementara</span><br>
                                    </td>
                                    <td colspan="5" colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahSB3_ULASAN_PRB" name="markahSB3_ULASAN_PRB"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td>   --}}
                                </tr>
                
                                <!--SB4-->
                                <tr class="pg-3" align="center">
                                    <td>SB4</td>
                                    <td>3r-Semasa Operasi</td>
                                    <td colspan="6"></td>
                                    <td>4</td>
                                    <td><input onblur="findTotalMR_SB()" class="MR_SB" type="number" min="0" max="4" id="markahSB4_MR" name="markahSB4_MR" autocapitalize="off" required/></td>
                                    <td>4</td>
                                    <td><input onblur="findTotalMR_SB_PUN()" class="MR_SB_PUN" type="number" min="0" max="4" id="markahSB4_MR_PUN" name="markahSB4_MR_PUN" autocapitalize="off" required/></td>
                                    <td>
                                        <span>&#183; Pelan pengurusan sisa domestik</span><br>
                                        <span>&#183; Pelan kedudukan tong 3Rdi semua aras bangunan</span><br>
                                        <span>&#183; Lokasi kebuk sampah</span><br>                    
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahSB4_ULASAN_PRB" name="markahSB4_ULASAN_PRB"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                    {{-- <td colspan="4">
                                        <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form>
                                    </td> --}}
                                <tr>
                
                                    <!--Jumlah MarkahSB-->
                                    <tr class="pg-3" align="center">
                                        <th colspan="6">Jumlah markah SB</th>
                                        <td colspan="3">20</td>
                                        <td><input  id="totalMR_SB" type="number" autocapitalize="off" min="0" max="20" id="markahTOTAL_SB_MR" name="markahTOTAL_SB_MR"/></td>
                                        <td></td>
                                        <td><input  id="totalMV_SB_PUN" type="number" autocapitalize="off" min="0" id="markahTOTAL_SB_MR_PUN" name="markahTOTAL_SB_MR_PUN"/></td>
                                        <td colspan="9"></td>
                                    </tr> 
                
                                    <thead class="pg-2 text-white" style="background-color:#EB5500">
                                        <th>PA</th>
                                        <th colspan="23">PENGURUSAN KECEKAPAN PENGGUNAAN AIR</th>
                                    </thead>
                
                                    <!--PA1-->
                                    <tr class="pg-4" align="center">
                                        <td>PA1</td>
                                        <td>Produk Kecekapan Air</td>
                                        <td colspan="6"></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMR_PA()" class="MR_PA" type="number" min="0" max="3" id="markahPA1_MR" name="markahPA1_MR" autocapitalize="off" required/></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMR_PA_PUN()" class="MR_PA_PUN" type="number" min="0" max="3" id="markahPA1_MR_PUN" name="markahPA1_MR_PUN" autocapitalize="off" required/></td>
                                        <td>
                                                        <span>&#183; Katalog bahan dan sampai yang telah disahkan WELPS dan SPAN</span><br>
                                                        <span>&#183; Pengiraan penjimatan</span><br>
                                        </td>
                                        <td colspan="5" colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahPA1_ULASAN_PRB" name="markahPA1_ULASAN_PRB"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PA2-->
                                    <tr class="pg-4" align="center">
                                        <td>PA2</td>
                                        <td>Penjimatan Penggunaan Air Dalam Bangunan</td>
                                        <td colspan="6"></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMR_PA()" class="MR_PA" type="number" min="0" max="2" id="markahPA2_MR" name="markahPA2_MR" autocapitalize="off" required/></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMR_PA_PUN()" class="MR_PA_PUN" type="number" min="0" max="2" id="markahPA2_MR_PUN" name="markahPA2_MR_PUN" autocapitalize="off" required/></td>
                                        <td>
                                            <span>&#183; Katalog bahan dan sampai yang telah disahkan WELPS dan SPAN</span><br>
                                            <span>&#183; Pengiraan</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahPA2_ULASAN_PRB" name="markahPA2_ULASAN_PRB"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PA3-->
                                    <tr class="pg-4" align="center">
                                        <td rowspan="2">PA3</td>
                                        <td>i. SPAH</td>
                                        <td colspan="6"></td>
                                        <td>4</td>
                                        <td><input onblur="findTotalMR_PA()" class="MR_PA" type="number" min="0" max="4" id="markahPA3_MR" name="markahPA3_MR" autocapitalize="off" required/></td>
                                        <td>4</td>
                                        <td><input onblur="findTotalMR_PA_PUN()" class="MR_PA_PUN" type="number" min="0" max="4" id="markahPA3_MR_PUN" name="markahPA3_MR_PUN" autocapitalize="off" required/></td>
                                        <td>
                                                        <span>&#183; Katalog bahan dan sampai yang telah disahkan WELPS dan SPAN</span><br>
                                                        <span>&#183; Pengiraan</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahPA3_ULASAN_PRB" name="markahPA3_ULASAN_PRB"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <tr class="pg-4" align="center">
                                        <td>ii. Kitar Semula Air Sisa</td>
                                        <td colspan="6"></td>
                                        <td>5</td>
                                        <td><input onblur="findTotalMR_PA()" class="MR_PA" type="number" min="0" max="5" id="markahPA32_MR" name="markahPA32_MR" autocapitalize="off" required/></td>
                                        <td>5</td>
                                        <td><input onblur="findTotalMR_PA_PUN()" class="MR_PA_PUN" type="number" min="0" max="5" id="markahPA32_MR_PUN" name="markahPA32_MR_PUN" autocapitalize="off" required/></td>
                                        <td>
                                                        <span>&#183; Laporan rekabentuk dan pengiraan SPAH atau
                                                            sistem kitar semula air sisa</span><br>
                                                        <span>&#183; Lukisan SPAH atau lukisan sistem kitar semula air sisa</span><br>
                                                        <span>&#183; Bil air domestik</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas" id="markahPA32_ULASAN_PRB" name="markahPA32_ULASAN_PRB"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PA4-->
                                    <tr class="pg-4" align="center">
                                        <td>PA4</td>
                                        <td>Sub-Meter Air</td>
                                        <td colspan="6"></td>
                                        <td>5</td>
                                        <td><input onblur="findTotalMR_PA()" class="MR_PA" type="number" min="0" max="5" id="markahPA4_MR" name="markahPA4_MR" autocapitalize="off" /></td>
                                        <td>5</td>
                                        <td><input onblur="findTotalMR_PA_PUN()" class="MR_PA_PUN" type="number" min="0" max="5" id="markahPA4_MR_PUN" name="markahPA4_MR_PUN"></td>
                                        <td>
                                            <span>&#183; Pelan pemasangan sub-meter air</span><br>
                                            <span>&#183; Lukisan skematik pemasangan sub-meter air</span><br>
                                            <span>&#183; Brosur/katalog produk</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PA5-->
                                    <tr class="pg-4" align="center">
                                        <td>PA5</td>
                                        <td>Sistem Pengesan Kebocoran Air</td>
                                        <td colspan="6"></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMR_PA()" class="MR_PA" type="number" min="0" max="3" id="markahPA5_MR" name="markahPA5_MR" autocapitalize="off" /></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMR_PA_PUN()" class="MR_PA_PUN" type="number" min="0" max="3" id="markahPA5_MR_PUN" name="markahPA5_MR_PUN"></td>
                                        <td>
                                            <span>&#183; Pelan pemasangan sistem pengesan kebocoran air</span><br>
                                            <span>&#183; Lukisan skematik pemasangan sistem pengesan kebocoran air</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!-- Jumlah MarkahPA-->
                                    <tr class="pg-4" align="center">
                                        <th colspan="6">Jumlah markah PA</th>
                                        <td colspan="3">14</td>
                                        <td><input  id="totalMR_PA" type="number"  autocapitalize="off" id="markahTOTAL_PA_MR" name="markahTOTAL_PA_MR"/></td>
                                        <td></td>
                                        <td><input  id="totalMR_PA_PUN" type="number" autocapitalize="off" id="markahTOTAL_PA_MR_PUN" name="markahTOTAL_PA_MR_PUN"/></td>
                                        <td colspan="9"></td>
                                    </tr> 
                
                                    <thead class="pg-2 text-white" style="background-color:#EB5500">
                                        <th>PD</th>
                                        <th colspan="23">PENGURUSAN KUALITI PERSEKITARAN DALAMAN</th>
                                    </thead>
                
                                    <!--PD1-->
                                    <tr class="pg-5" align="center">
                                        <td>PD1</td>
                                        <td>Larangan merokok</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" type="number" min="0" max="1" autocapitalize="off" id="markahPD1_MR" name="markahPD1_MR" required/></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="2" id="markahPD1_MR_PUN" name="markahPD1_MR_PUN" required/></td>
                                        <td><span>&#183; Pelan susun atur lokasi papan tanda</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD2--> <!--NO INPUT-->
                                    <tr class="pg-5" align="center">
                                        <td>PD2</td>
                                        <td>Perancangan ruang</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="5"></td>
                                        <td colspan="4"></td>
                                    </tr>
                
                                    <!--PD2.1--><!--PUN not available-->
                                    <tr class="pg-5" align="center">
                                        <td>PD2.1</td>
                                        <td>Lebar bangunan yang efektif &#40;no deep planning&#41;</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" id="markahPD21_MR" name="markahPD21_MR" type="number" min="0" max="1" autocapitalize="off" /></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span>&#183; Pelan susun atur</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD2.2-->
                                    <tr class="pg-5" align="center">
                                        <td>PD2.2</td>
                                        <td>Susun atur ruang pejabat terbuka sepanjang permukaan fasad</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" id="markahPD22_MR" name="markahPD22_MR" type="number" min="0" max="1" autocapitalize="off" required/></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="1" id="markahPD22_MR_PUN" name="markahPD22_MR_PUN" required/></td>
                                        <td><span>&#183; Rekabentuk awalan yang menunjukkan pembahagian zon antara ruang pejabat
                                            terbuka dengan bilik-bilik</span><br>
                                            <span>&#183; Pelan susun atur</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD2.3-->
                                    <tr class="pg-5" align="center">
                                        <td>PD2.3</td>
                                        <td>Dinding sesekat dalaman yang telus cahaya</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" id="markahPD23_MR" name="markahPD23_MR" type="number" min="0" max="1" autocapitalize="off" /></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="1" id="markahPD23_MR_PUN" name="markahPD23_MR_PUN"></td>
                                        <td>
                                            <span>&#183; Pelan susunatur</span><br>
                                            <span>&#183; Lukisan terperinci dinding sesekat berserta spesifikasi</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD2.4-->
                                    <tr class="pg-5" align="center">
                                        <td>PD2.4</td>
                                        <td>Ketinggian siling yang efektif</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" id="markahPD24_MR" name="markahPD24_MR" type="number" min="0" max="1" autocapitalize="off" required/></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" id="markahPD24_MR_PUN" name="markahPD24_MR_PUN" type="number" min="0" max="1" autocapitalize="off" required/></td>
                                        <td>
                                                        <span>&#183; Lukisan keratan bangunan yang menunjukkan
                                                            ukuran (lantai ke siling)</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD2.5-->
                                    <tr class="pg-5" align="center">
                                        <td>PD2.5</td>
                                        <td>Warna cerah di permukaan dinding dan siling</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" type="number" min="0" max="1"id="markahPD25_MR" name="markahPD25_MR" autocapitalize="off" required/></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="1"id="markahPD25_MR_PUN" name="markahPD25_MR_PUN" autocapitalize="off" required/></td>
                                        <td>
                                                        <span>&#183; Katalog dan sampel menunjukkan warna yang dicadangkan</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD3--> <!--NO INPUT-->
                                    <tr class="pg-5" align="center">
                                        <td>PD3</td>
                                        <td>Kualiti Visual</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="5"></td>
                                        <td colspan="4"></td> 
                                    </tr>
                
                                    <!--PD3.1-->
                                    <tr class="pg-5" align="center">
                                        <td>PD3.1</td>
                                        <td>Faktor Pencahayaan Siang (DF)</td>
                                        <td colspan="6"></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" type="number" min="0" max="2" id="markahPD31_MR" name="markahPD31_MR" autocapitalize="off" required/></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="2" id="markahPD31_MR_PUN" name="markahPD31_MR_PUN" autocapitalize="off" required/></td>
                                        <td>
                                                        <span>&#183; Lukisan tampak dan jadual tingkap</span><br>
                                                        <span>&#183; Pengiraan keluasan lantai yang menunjukkan
                                                            30% daripada NLA yang menunjukkan nilai DF 1.0% - 3.5%</span><br>
                                                        <span>&#183; Laporan simulasi (jika ada)</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD3.2-->
                                    <tr class="pg-5" align="center">
                                        <td>PD3.2</td>
                                        <td>Menggunakan rak cahaya (light shelves)</td>
                                        <td colspan="6"></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" type="number" min="0" max="2" id="markahPD32_MR" name="markahPD32_MR" autocapitalize="off" required/></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="2" id="markahPD32_MR_PUN" name="markahPD32_MR_PUN" autocapitalize="off" required/></td>
                                        <td>
                                                        <span>&#183; Rekabentuk rak cahaya</span><br>
                                                        <span>&#183; Lukisan terperinci</span><br>
                                                        <span>&#183; Laporan simulasi, jika ada</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD3.3-->
                                    <tr class="pg-5" align="center">
                                        <td>PD3.3</td>
                                        <td>Kawalan Tahap Kesilauan</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" type="number" min="0" max="1" id="markahPD33_MR" name="markahPD33_MR" autocapitalize="off" required/></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="1" id="markahPD33_MR_PUN" name="markahPD33_MR_PUN" autocapitalize="off" required/></td>
                                        <td>
                                                        <span>&#183; Katalog dan sampel menunjukkan bidai yang dicadangkan</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD3.4-->
                                    <tr class="pg-5" align="center">
                                        <td>PD3.4</td>
                                        <td>Akses visual kepada pandangan di luar</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" type="number" min="0" max="1" id="markahPD34_MR" name="markahPD34_MR" autocapitalize="off" required/></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="1" id="markahPD34_MR_PUN" name="markahPD34_MR_PUN" autocapitalize="off" required/></td>
                                        <td>
                                                        <span>&#183; Pelan susuratur</span><br>
                                                        <span>&#183; Rekabentuk awalan yang menunjukkan
                                                            pembahagian ruang yang bebas halangan binaan kekal</span><br>
                                                        <span>&#183; Lukisan terperinci dinding sesekat berserta spesifikasi</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4"> 
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD3.5-->
                                    <tr class="pg-5" align="center">
                                        <td>PD3.5</td>
                                        <td>Tahap Pencahayaan (bukan semulajadi) Bilik</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" id="markahPD35_MR" name="markahPD35_MR" type="number" min="0" max="1" autocapitalize="off" /></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="1" id="markahPD35_MR_PUN" name="markahPD35_MR_PUN"></td>
                                        <td>
                                                        <span>&#183; Mengemukakan data tahap pencahayaan bagi
                                                            setiap ruang dengan menggunakan kaedah pengiraan manual atau perisian simulasi</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD4--><!--No input-->
                                    <tr class="pg-5" align="center">
                                        <td>PD4</td>
                                        <td>Prestasi Pengudaraan</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="5"></td>
                                        <td colspan="4">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>
                
                                    </tr>
                
                                    <!--PD4.1-->
                                    <tr class="pg-5" align="center">
                                        <td>PD4.1</td>
                                        <td>Memaksimakan Kawasan Tanpa Keperluan Sistem Penyaman Udara</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" id="markahPD41_MR" name="markahPD41_MR" type="number" min="0" max="1" autocapitalize="off" /></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="1" id="markahPD41_MR_PUN" name="markahPD41_MR_PUN" required/></td>
                                        <td>
                                                        <span>&#183; Mengemukakan lukisan pelan lantai yang menunjukkan
                                                            ruang pengudaraan secara semulajadi</span><br>
                                                        <span>&#183; Laporan simulasi, jika ada</span><br>
                                                        <span>&#183; Pelan susun atur</span><br>
                
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD4.2-->
                                    <tr class="pg-5" align="center">
                                        <td>PD4.2</td>
                                        <td>Prestasi Kualiti Udara Dalaman: ASHRAE 62.1:2007 & 129</td>
                                        <td colspan="6"></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" id="markahPD42_MR" name="markahPD42_MR" type="number" min="0" max="2" autocapitalize="off" /></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="2" id="markahPD42_MR_PUN" name="markahPD42_MR_PUN"></td>
                                        <td>
                                                        <span>&#183; Mengemukakan lukisan pelan lantai yang menunjukkan
                                                            ruang pengudaraan secara semulajadi</span><br>
                                                        <span>&#183; Laporan simulasi, jika ada</span><br>
                                                        <span>&#183; Pelan susun atur</span><br>
                
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD5--><!--No input-->
                                    <tr class="pg-5" align="center">
                                        <td>PD5</td>
                                        <td>Keselesaan Thermal & Kawalan Sistem</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="5"></td>
                                        <td colspan="4">
                                        </td>
                                    </tr>
                
                                    <!--PD5.1-->
                                    <tr class="pg-5" align="center">
                                        <td>PD5.1</td>
                                        <td>Rekabentuk Keselesaan Thermal: ASHRAE 55</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" id="markahPD51_MR" name="markahPD51_MR" type="number" min="0" max="1" autocapitalize="off" /></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="1" id="markahPD51_MR_PUN" name="markahPD51_MR_PUN"></td>
                                        <td>
                                            <span>Laporan ringkas yang mengandungi:</span><br>
                                            <span>&#183; Maklumat berkenaan kaedah yang digunakan untuk
                                                mendapatkan keadaan keselesaan thermal bagi sesebuah projek</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD5.2-->
                                    <tr class="pg-5" align="center">
                                        <td>PD5.2</td>
                                        <td>Kawalan Sistem Pencahayaan & Pengudaraan (Pencahayaan)</td>
                                        <td colspan="6"></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" id="markahPD52_MR" name="markahPD52_MR" type="number" min="0" max="2" autocapitalize="off" /></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="2" id="markahPD52_MR_PUN" name="markahPD52_MR_PUN"></td>
                                        <td>
                                            <span>&#183; Laporan strategi</span><br>
                                            <span>&#183; Lukisan skematik dan pengiraan bagi perkara i &#41;</span><br>
                                            <span>&#183; Lukisan skematik dan pengiraan bagi perkara ii &#41;</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD6--><!--No input-->
                                    <tr class="pg-5" align="center">
                                        <td>PD6</td>
                                        <td>Kualiti Persekitaran Dalaman Dipertingkatkan</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD6.1-->
                                    <tr class="pg-5" align="center">
                                        <td>PD6.1</td>
                                        <td>Kawalan Paras Karbon Dioksida</td>
                                        <td colspan="6"></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" id="markahPD61_MR" name="markahPD61_MR" type="number" min="0" max="3" autocapitalize="off" /></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="3" id="markahPD61_MR_PUN" name="markahPD61_MR_PUN"></td>
                                        <td>
                                            <span>&#183; Pelan pemasangan sistem pemantauan tahap CO2</span><br>
                                            <span>&#183; Lukisan skematik pemasangan sistem pemantauan tahap CO2</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD6.2--><!--PUN not available-->
                                    <tr class="pg-5" align="center">
                                        <td>PD6.2</td>
                                        <td>Kualiti Persekitaran Semasa Pembinaan dan Sebelum diduduki</td>
                                        <td colspan="6"></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" id="markahPD62_MR" name="markahPD62_MR" type="number" min="0" max="1" autocapitalize="off" /></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span>&#183; Pelan pelaksanaan</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD7-->
                                    <tr class="pg-5" align="center">
                                        <td>PD7</td>
                                        <td>Keselesaan Akustik</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" id="markahPD7_MR" name="markahPD7_MR" type="number" min="0" max="1" autocapitalize="off" /></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="1" id="markahPD7_MR_PUN" name="markahPD7_MR_PUN"></td>
                                        <td>
                                            <span>&#183; Laporan strategi rekabentuk untuk memastikan tahap bunyi dalaman
                                                dikekalkan pada tahap yang ditetapkan</span><br>
                                            <span>&#183; Pelan susun atur bangunan yang menunjukkan lokasi teras bangunan (core),
                                                ruang laluan servis mekanikal/elektrikal</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    
                
                                    <!--PD8-->
                                    <tr class="pg-5" align="center">
                                        <td>PD8</td>
                                        <td>Kualiti Udara Dalaman (IAQ)</td>
                                        <td colspan="6"></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" type="number" min="0" max="3" id="markahPD8_MR" name="markahPD8_MR" autocapitalize="off" required/></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="3" id="markahPD8_MR_PUN" name="markahPD8_MR_PUN" autocapitalize="off" required/></td>
                                        <td>
                                                        <span>&#183; Katalog dan sijil pengesahan penarafan eco-label bahan</span><br>
                                                        <span>&#183; Spesifikasi teknikal pembekal</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD9-->
                                    <tr class="pg-5" align="center">
                                        <td>PD9</td>
                                        <td>Pencegahan Kulapok (Mold)</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD()" class="MR_PD" id="markahPD9_MR" name="markahPD9_MR" type="number" min="0" max="1" autocapitalize="off" required/></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" type="number" min="0" max="1" id="markahPD9_MR_PUN" name="markahPD9_MR_PUN" required></td>
                                        <td>
                                            <span>&#183; Laporan ringkas yang menggariskan strategi yang akan dilaksanakan
                                                untuk memenuhi keperluan bagi pencegahan kulapok</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--PD10-->
                                    <tr class="pg-5" align="center">
                                        <td>PD10</td>
                                        <td>Kaji Selidik Keselesaan Penghuni</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td>0</td>
                                        <td><input onblur="findTotalMR_PD_PUN()" class="MR_PD_PUN" id="markahPD10_MR_PUN" name="markahPD10_MR_PUN" type="number" min="0" max="0" autocapitalize="off" required/></td>
                                        <td> 
                                            <span>&#183; Tidak berkaitan (TB)</span>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!-- Jumlah MarkahPD-->
                                    <tr class="pg-5" align="center">
                                        <td colspan="6">Jumlah markah PD</td>
                                        <td colspan="3">11</td>
                                        <td><input  id="totalMR_PD" type="number" autocapitalize="off" id="markahTOTAL_PD_MR" name="markahTOTAL_PD_MR"/></td>
                                        <td></td>
                                        <td><input  id="totalMR_PD_PUN" type="number" autocapitalize="off" id="markahTOTAL_PD_MR_PUN" name="markahTOTAL_PD_MR_PUN"/></td>
                                        <td colspan="9"></td>
                                    </tr> 
                
                                    <thead class="pg-2 text-white" style="background-color:#EB5500">
                                        <th>FL</th>
                                        <th colspan="23">PENGURUSAN FASILITI LESTARI</th>
                                    </thead>
                
                                    <!--FL1--><!--Baru, PUN not available--><!--No Dokumen Pembuktian-->
                                    <tr class="pg-6" align="center">
                                        <td>FL1</td>
                                        <td>Penarafan sedia ada</td>
                                        <td colspan="6">   
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span>&#183; Tidak berkaitan (TB)</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>
                                    </tr>
                
                                    <!--FL2--><!--Baru, PUN not available--><!--No Dokumen Pembuktian--><!--No Ulasan/MaklumBalas-->
                                    <tr class="pg-6" align="center">
                                        <td>FL2</td>
                                        <td>Pengurusan fasiliti bangunan</td>
                                        <td colspan="6">     
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="5"></td>
                                        <td colspan="4">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>
                                    </tr>
                
                                    <!--FL2.1--><!--Baru, PUN not available--><!--No Dokumen Pembuktian-->
                                    <tr class="pg-6" align="center">
                                        <td>FL2.1</td>
                                        <td>Pengurusan data dan ruang</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span>&#183; Tidak berkaitan (TB)</span><br>
                                        </td>
                                        <td colspan="5"></td>
                                        <td colspan="4">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>
                                    </tr>
                
                                    <!--FL2.2--><!--Baru, PUN not available--><!--No Dokumen Pembuktian-->
                                    <tr class="pg-6" align="center">
                                        <td>FL2.2</td>
                                        <td>Pengurusan sistem penyenggaraan</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span>&#183; Tidak berkaitan (TB)</span><br>
                                        </td>
                                        <td colspan="5"></td>
                                        <td colspan="4">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>
                                    </tr>
                
                                    <!--FL2.3--><!--Baru, PUN not available--><!--No Dokumen Pembuktian-->
                                    <tr class="pg-6" align="center">
                                        <td>FL2.3</td>
                                        <td>Prestasi penggurusan</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span>&#183; Tidak berkaitan (TB)</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>
                                    </tr>
                
                                    <!--FL3--><!--Baru, PUN not available--><!--No Dokumen Pembuktian--><!--No Ulasan/MaklumBalas-->
                                    <tr class="pg-6" align="center">
                                        <td>FL3</td>
                                        <td>Penyenggaraan lestari</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="5"></td>
                                        <td colspan="4">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>
                                    </tr>
                
                                    <!--FL3.1-->
                                    <tr class="pg-6" align="center">
                                        <td>FL3.1</td>
                                        <td>Ruang pejabat untuk pasukan penyenggaraan</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_FL()" class="MR_FL" type="number" min="0" max="1" id="markahFL31_MR" name="markahFL31_MR" autocapitalize="off" required/></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMR_FL_PUN()" class="MR_FL_PUN" type="number" min="0" max="1" id="markahFL31_MR_PUN" name="markahFL31_MR_PUN" required/></td>
                                        <td>
                                            <span>&#183; Pelan susun atur yang menunjukkan ruang pejabat penyenggaraan</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--FL3.2--><!--Baru not available-->
                                    <tr class="pg-6" align="center">
                                        <td>FL3.2</td>
                                        <td>Kontraktor pengurusan fasiliti (FM)</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td>0</td>
                                        <td><input onblur="findTotalMR_FL_PUN()" class="MR_FL_PUN" type="number" min="0" max="0" id="markahFL32_MR_PUN" name="markahFL32_MR_PUN" required></td>
                                        <td>
                                            <span>&#183; Tidak berkaitan (TB)</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--FL3.3-->
                                    <tr class="pg-6" align="center">
                                        <td>FL3.3</td>
                                        <td>Pelan Pengurusan Fasiliti (FM)</td>
                                        <td colspan="6"></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMR_FL()" class="MR_FL" type="number" min="0" max="2" id="markahFL33_MR" name="markahFL33_MR"autocapitalize="off" required/></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMR_FL_PUN()" class="MR_FL_PUN" type="number" min="0" max="2" id="markahFL33_MR_PUN" name="markahFL33_MR_PUN" required/></td>
                                        <td>
                                            <span>&#183; Rangka Preventive Maintenance Plan</span><br>
                                            <span>&#183; Surat Komitmen pemilik bangunan untuk menyediakan pelan
                                                strategi pengurusan aset</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!--FL3.4-->
                                    <tr class="pg-6" align="center">
                                        <td>FL3.4</td>
                                        <td>Manual Operasi dan Penyenggaraan Bangunan</td>
                                        <td colspan="6"></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMR_FL()" class="MR_FL" type="number" min="0" max="2" id="markahFL34_MR" name="markahFL34_MR" autocapitalize="off" required/></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMR_FL_PUN()" class="MR_FL_PUN" type="number" min="0" max="2" id="markahFL34_MR_PUN" name="markahFL34_MR_PUN" required></td>
                                        <td> 
                                            <span>&#183; Surat Aku Janji pemilik bangunan untuk menyediakan manual pengguna</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                    <!-- Jumlah MarkahFL-->
                                    <tr class="pg-6" align="center">
                                        <td colspan="6">Jumlah markah FL</td>
                                        <td colspan="3">5</td>
                                        <td><input  id="totalMR_FL" type="number" min="0" max="5" autocapitalize="off" id="markahTOTAL_FL_MR" name="markahTOTAL_FL_MR"/></td>
                                        <td>5</td>
                                        <td><input  id="totalMR_FL_PUN" type="number" min="0" max="5" autocapitalize="off" id="markahTOTAL_FL_MR_PUN" name="markahTOTAL_FL_MR_PUN"/></td>
                                        <td></td>
                                        <td></td>
                                    </tr> 
                
                                    <thead class="pg-2 text-white" style="background-color:#EB5500">
                                        <th>IN</th>
                                        <th colspan="23">INOVASI DALAM REKABENTUK</th>
                                    </thead>
                
                                    <!--IN1-->
                                    <tr class="pg-7" align="center">
                                        <td>IN1</td>
                                        <td>Reka Bentuk Inovasi</td>
                                        <td colspan="6"></td>
                                        <td>6</td>
                                        <td><input onblur="findTotalMR_IN()" class="MR_IN" type="number" min="0" max="6" id="markahIN1_MR" name="markahIN1_MR" autocapitalize="off" required/></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                        <span>&#183; Laporan cadangan inovasi</span><br>
                                        <span>&#183; Laporan kajian Return of Investment</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input id="formFileSm" type="file"></td>
                
                                        {{-- <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td> --}}
                                    </tr>
                
                                        <!-- Jumlah MarkahIN-->
                                        <tr class="pg-7" align="center">
                                            <td colspan="6">Jumlah markah IN</td>
                                            <td colspan="3">6</td>
                                            <td><input  id="totalMR_IN" type="number" min="0" max="6" autocapitalize="off" id="markahTOTAL_IN_MR" name="markahTOTAL_IN_MR"/></td>
                                            <td></td>
                                            <td colspan="9"></td>
                                        </tr> 
                
                                        
                        </table>
                
                
                    </div>
                                    <div align="center" class="mt-3">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button class="btn btn-primary">Sah</button>
                                        <button class="btn btn-primary">Jana Keputusan</button>
                                        <button class="btn btn-primary">Jana Sijil</button>
                                    </div>
                                </div>

                            </form>
                </div>
                                                

        </div>

        <div class="tab-pane" id="tab-4" role="tabpanel">



                <div class="card mt-3">
                    <div class="card-body">
                        <div class="table-responsive scrollbar">
                            <h4 class="text-align:center;">Borang Verifikasi Permarkahan Bangunan</h4>

                            <!--------------------------------------- MarkahTL ---------------------------------------->

                        <table id="example" class="table table-bordered line-table display">
                            <thead class="text-white">
                                <tr class="pg-1" align="center" style="background-color:#EB5500">
                                    <th rowspan="3">Kod</th>
                                    <th rowspan="3">Kriteria</th>
                                    <th rowspan="3" colspan="6">Kategori bangunan</th>
                                    <th colspan="4">Pembangunan Baru</th>
                                    <th colspan="4">Pemuliharaan/ Ubahsuai/ Naiktaraf (PUN)</th>
                                    <th colspan="2">Sedia Ada</th>
                                    <th rowspan="2">Dokumen Pembuktian</th>
                                    <th rowspan="3" colspan="5">Ulasan/Maklumbalas Verifikasi</th>
                                    <th rowspan="3" colspan="4">Muat Naik Dokumen Sokongan</th>

                                </tr>
                
                                <tr class="pg-1" align="center" style="background-color:#EB5500">
                                    <th colspan="4">Markah</th>
                                    <th colspan="4">Markah</th>
                                    <th colspan="2">Markah</th>

                                </tr>
                            
                                <tr class="pg-1" align="center" style="background-color:#EB5500">
                                    <th>MM</th>
                                    <th>MR</th>
                                    <th>MMV</th>
                                    <th>MV</th>
                                    <th>MM</th>
                                    <th>MR</th>
                                    <th>MMV</th>
                                    <th>MV</th>
                                    <th>MMV</th>
                                    <th>MV</th>
                                    <th>Verifikasi (Peringkat 3)</th>
                
                                </tr>
                
                                <tr class="pg-1" style="background-color:#EB5500">
                                    <th>TL</th>
                                    <th colspan="30">PERANCANGAN & PENGURUSAN TAPAK LESTARI</th>
                                </tr>
                            </thead>
                
                                <!--TL1--><!--BARU SHJ-->
                                <tr class="pg-1" align="center">
                                    <td>TL1</td>
                                    <td>Perancangan Tapak</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td></td>
                                    <td>0</td>
                                    <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="0" autocapitalize="off" id="markahTL1_MMV" name="markahTL1_MMV" required/></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Tidak Berkenaan</td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4">
                                    <form class="form"><input  id="formFileSm" type="file">
                                        {{-- <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label> --}}
                                    </form>
                                    </td>
                    
                                </tr>
                
                                <!--TL2-->
                                <tr class="pg-1" align="center">
                                    <td>TL2</td>
                                    <td>Sistem Pengurusan Alam Sekitar (SPAS)</td>
                                    <td colspan="6"></td>
                                    <td>3</td>
                                    <td></td>
                                    <td>3</td>
                                    <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL2_MMV" name="markahTL2_MMV" required/></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <span>&#183; Laporan Pelan Pengurusan Alam Sekitar</span><br>
                                        <span>&#183; Borang SPAS (Peringkat pembinaan)</span>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file">
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                        </td>                        
                                </tr>

                                <!--TL3-->
                                <tr class="pg-1" align="center">
                                    <td rowspan="2">TL3</td>
                                    <td>i. Pemotongan dan Penambakan tanah</td>
                                    <td rowspan="2" colspan="6"></td>  
                                    <td>3</td>
                                    <td></td>
                                    <td>3</td>
                                    <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL3_MMV" name="markahTL3_MMV" required/></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <span>&#183; Laporan kuantiti tanah yang diimport atau eksport</span><br>
                                        <span>&#183; Bukti bergambar</span><br>
                                        <span>&#183; Pengesahan kuantiti tanah potong/tambak sebenar oleh PD/SO 
                                            atau setaraf
                                        </span>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file">
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                        </td>                        
                                    </tr>
                
                                <tr class="pg-1" align="center">
                                    <td>ii. Mengekalkan Topografi Tanah</td>
                                    <td>2</td>
                                    <td></td>
                                    <td>2</td>
                                    <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="2" autocapitalize="off" id="markahTL32_MMV" name="markahTL32_MMV" required/></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <span>&#183; Bukti bergambar</span><br>
                                        <span>&#183; Pengesahan kuantiti tanah potong/tambak sebenar oleh PD/SO atau setaraf</span><br>
                                        <span>&#183; Pengesahan pelaksanaan ESCP di tapak</span>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file">
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>
                
                                <!--TL4-->
                                <tr class="pg-1" align="center">
                                    <td>TL4</td>
                                    <td>Pelan Kawalan Hakisan & Kelodak (ESCP)</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL4_MMV" name="markahTL4_MMV" required/></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <span>&#183; Pengesahan pelaksanaan ESCP di tapak</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file">
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>                        
                                </tr>
                
                                <!--TL5--><!--Baru shj-->
                                <tr class="pg-1" align="center">
                                    <td>TL5</td>
                                    <td>Pemuliharaan dan Pemeliharaan Cerun</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td></td>
                                    <td>0</td>
                                    <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="0" autocapitalize="off" id="markahTL5_MMV" name="markahTL5_MMV" required/></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <span>Tidak Berkenaan</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file">
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                        </td>                        
                                </tr>

                                <!--TL6-->
                                <tr class="pg-1" align="center">
                                    <td>TL6</td>
                                    <td>Pengurusan Air Larian Hujan</td>
                                    <td colspan="6"></td>
                                    <td>3</td>
                                    <td></td>
                                    <td>3</td>
                                    <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL6_MMV" name="markahTL6_MMV" required/></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <span> &#40;a&#41; Baru</span><br>
                                        <span>&#183; Laporan sistem perparitan</span><br>
                                        <span>&#183; Bukti bergambar</span><br>
                                        <span> &#40;b&#41; Sedia ada</span><br>
                                        <span>&#183; Laporan penyenggaraan sistem perparitan berkala</span><br>
                                        <span>&#183; Bukti bergambar</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file">
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>

                                <!--TL8--><!--NO INPUT-->
                                <tr class="pg-1" align="center">
                                    <td>TL8</td>
                                    <td>Landskap strategik</td>
                                    <td colspan="6"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="5"></td>
                                    <td colspan="4"></td>
                                </tr>
                
                                <!--TL8.1-->
                                <tr class="pg-1" align="center">
                                    <td>TL8.1</td>
                                    <td>Memelihara dan menyenggara pokok yang matang</td>
                                    <td colspan="6"></td>
                                    <td>3</td>
                                    <td></td>
                                    <td>3</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL81_MMV" name="markahTL81_MMV" required/></td>
                                    <td>
                                        <span> &#40;a&#41; Lukisan siap bina landskap</span><br>
                                        <span>&#183; Bukti bergambar pokok tidak ditebang dan disenggara dengan baik</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file">
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>
                
                                <!--TL8.2-->
                                <tr class="pg-1" align="center">
                                    <td>TL8.2</td>
                                    <td>Menyediakan kawasan hijau</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL82_MMV" name="markahTL82_MMV" required/></td>
                                    <td>
                                        <span> &#40;a&#41; Pelan tapak siap bina yang telah disahkan oleh Arkitek Bertauliah</span><br>
                                        Nyatakan sekiranya ada perubahan
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file">
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>

                                <!--TL8.3-->
                                <tr class="pg-1" align="center">
                                    <td>TL8.3</td>
                                    <td>Menyedia dan menyenggara penanaman pokok teduhan</td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL83_MMV" name="markahTL83_MMV" required/></td>
                                    <td>
                                        <span> &#183; Pelan landskap siap bina</span><br>
                                        <span> &#183; Inventori pokok</span><br>
                                        <span> &#183; Bukti bergambar</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file">
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>

                                <!--TL8.4-->
                                <tr class="pg-1" align="center">
                                    <td>TL8.4</td>
                                    <td>Pemilihan bahan binaan siarkaki (walkway) yang mempunyai daya pantulan
                                        haba yang tinggi
                                    </td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL84_MMV" name="markahTL84_MMV" required/></td>
                                    <td>
                                        <span> &#183; Bukti bergambar</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file">
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>

                                <!--TL8.5-->
                                <tr class="pg-1" align="center">
                                    <td>TL8.5</td>
                                    <td>Menyedia dan menyenggara sistem turapan berumput</td>
                                    <td colspan="6"></td>
                                    <td>2</td>
                                    <td></td>
                                    <td>2</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="2" autocapitalize="off" id="markahTL85_MMV" name="markahTL85_MMV" required/></td>
                                    <td>
                                        <span> &#183; Lukisan siap bina</span><br>
                                        <span> &#183; Bukti bergambar</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4">
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>

                                <!--TL9--><!--NO INPUT-->
                                <tr class="pg-1" align="center">
                                    <td>TL9</td>
                                    <td>Bumbung Hijau & Dinding Hijau</td>
                                    <td colspan="6"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="5"></td>
                                    <td colspan="4"></td>
                                </tr>

                                <!--TL9.1-->
                                <tr class="pg-1" align="center">
                                    <td>TL9.1</td>
                                    <td>Indeks Pantulan Suria (SRI) mengikut jenis & kecerunan bumbung
                                    </td>
                                    <td colspan="6"></td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                    <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL91_MMV" name="markahTL91_MMV" required/></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <span>&#183; Method statement yang telah disahkan oleh
                                            pegawai penguasa (SO)</span><br>
                                        <span>&#183; Bukti bergambar</span><br>
                                        <span>&#183; Lukisan siap bina</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file">
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                    </td>
                                </tr>

                                <!--TL9.2-->
                                <tr class="pg-1" align="center">
                                    <td>TL9.2</td>
                                    <td>Menggalakkan rekabentuk bumbung/dinding hijau</td>
                                    <td colspan="6"></td>
                                    <td>3</td>
                                    <td></td>
                                    <td>3</td>
                                    <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL92_MMV" name="markahTL92_MMV" required/></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <span>&#183; Bukti bergambar</span><br>
                                        <span>&#183; Lukisan siap bina</span><br>
                                        <span>&#183; Rekod Senggaraan</span><br>
                                    </td>
                                    <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                    <td colspan="4"><input  id="formFileSm" type="file">
                                        {{-- <form class="form">
                                            <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label>
                                        </form> --}}
                                        
                                    </td>
                
                                </tr>

                                <!--JUMLAH MARKAHTL-->
                                <tr class="pg-1" align="center">
                                    <td colspan="6">Jumlah markah TL</td>
                                    <td colspan="3">26</td>
                                    <td></td>
                                    <td>24</td>
                                    <td><input id="totalMMV_TL" type="number" min="0" max="24" id="markahTOTAL_TL_MMV" name="markahTOTAL_TL_MMV"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="9"></td>
                                </tr> 

                                <thead class="pg-2 text-white" style="background-color:#EB5500">
                                    <th>KT</th>
                                    <th colspan="30">PENGURUSAN KECEKAPAN TENAGA DAN PENGGUNAAN TENAGA BOLEH BAHARU</th>
                                </thead>

                                <!--KT1-->
                            <tr class="pg-2" align="center">
                                <td>KT1</td>
                                <td>Rekabentuk bumbung</td>
                                <td colspan="6"></td>
                                <td>2</td>
                                <td></td>
                                <td>2</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahKT1_MMV" name="markahKT1_MMV" /></td>
                                <td>2</td>
                                <td></td>
                                <td>2</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahKT1_MMV_PUN" name="markahKT1_MMV_PUN" /></td>
                                <td>2</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahKT1_MMV_SEDIA" name="markahKT1_MMV_SEDIA" /></td>
                                <td>
                                    <span>&#183; Katalog bahan dan sampel yang diluluskan</span><br>
                                    <span>&#183; Lukisan siap bina</span><br>
                                    <span>&#183; Bukti bergambar</span>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT2--><!--NO INPUT-->
                            <tr class="pg-2" align="center">
                                <td>KT2</td>
                                <td>Orientasi bangunan</td>
                                <td colspan="6"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="5"></td>
                                <td colspan="4"></td>

                            </tr>

                            <!--KT2.1-->
                            <tr class="pg-2" align="center">
                                <td>KT2.1</td>
                                <td>Fasad Utama bangunan yang menghadap orientasi utara-selatan</td>
                                <td colspan="6"></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT21_MMV" name="markahKT21_MMV" /></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT21_MMV_PUN" name="markahKT21_MMV_PUN" /></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT21_MMV_SEDIA" name="markahKT21_MMV_SEDIA" /></td>
                                <td>
                                    <span>&#183; Lukisan siap bina</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT2.2-->
                            <tr class="pg-2" align="center">
                                <td>KT2.2</td>
                                <td>Meminimumkan bukaan pada fasad yang menghadap timur dan barat</td>
                                <td colspan="6"></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT22_MMV" name="markahKT22_MMV" /></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT22_MMV_PUN" name="markahKT22_MMV_PUN" /></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT22_MMV_SEDIA" name="markahKT22_MMV_SEDIA" /></td>
                                <td>
                                    <span> &#183; Lukisan siap bina</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT3--><!--NO INPUT-->
                            <tr class="pg-2" align="center">
                                <td>KT3</td>
                                <td>Rekabentuk fasad</td>
                                <td colspan="6"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="5"></td>
                                <td colspan="4"></td>
                            </tr>

                            <!--KT3.1--><!--Baru | PUN-->
                            <tr class="pg-2" align="center">
                                <td>KT3.1</td>
                                <td>Dinding luar bangunan</td>
                                <td colspan="6"></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT31_MMV" name="markahKT31_MMV" /></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT31_MMV_PUN" name="markahKT31_MMV_PUN" /></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <span>&#183; Katalog bahan yang diluluskan untuk pembinaan</span><br>
                                    <span>&#183; Pengiraan U-Value yang disahkan</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT3.2-->
                            <tr class="pg-2" align="center">
                                <td>KT3.2</td>
                                <td>Pengadang Suria Luaran</td>
                                <td colspan="6"></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT32_MMV" name="markahKT32_MMV" /></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT32_MMV_PUN" name="markahKT32_MMV_PUN" /></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT32_MMV_SEDIA" name="markahKT32_MMV_SEDIA" /></td>
                                <td>
                                    <span>&#183; Bukti bergambar</span><br>
                                    <span>&#183; Lukisan siap bina</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT4-->
                            <tr class="pg-2" align="center">
                                <td>KT4</td>
                                <td>OTTV & RTTV</td>
                                <td colspan="6"></td>
                                <td>5</td>
                                <td></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT4_MMV" name="markahKT4_MMV" /></td>
                                <td>5</td>
                                <td></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT4_MMV_PUN" name="markahKT4_MMV_PUN" /></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <span>&#183; Pengiraan OTTV dan RTTV yang disahkan</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT5--><!--NO INPUT-->
                            <tr class="pg-2" align="center">
                                <td>KT5</td>
                                <td>Kecekapan pencahayaan</td>
                                <td colspan="6"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="5"></td>
                                <td colspan="4"></td>
                            </tr>

                            <!--KT5.1-->
                            <tr class="pg-2" align="center">
                                <td>KT5.1</td>
                                <td>Zon Pencahayaan</td>
                                <td colspan="6"></td>
                                <td>3</td>
                                <td></td>
                                <td>3</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT51_MMV" name="markahKT51_MMV" /></td>
                                <td>3</td>
                                <td></td>
                                <td>3</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT51_MMV_PUN" name="markahKT51_MMV_PUN" /></td>
                                <td>3</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT51_MMV_SEDIA" name="markahKT51_MMV_SEDIA" /></td>
                                {{-- <td>
                                    <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                    <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                </td> --}}
                                <td>
                                    <span> &#183; Lukisan siap bina litar lampu yang telah di zon dan lokasi pemasangan sensor</span><br>
                                    <span> &#183; Bukti bergambar</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT5.2-->
                            <tr class="pg-2" align="center">
                                <td>KT5.2</td>
                                <td>Kawalan Pencahayaan</td>
                                <td colspan="6"></td>
                                <td>6</td>
                                <td></td>
                                <td>6</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT52_MMV" name="markahKT52_MMV" /></td>
                                <td>6</td>
                                <td></td>
                                <td>6</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT52_MMV_PUN" name="markahKT52_MMV_PUN" /></td>
                                <td>6</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT52_MMV_SEDIA" name="markahKT52_MMV_SEDIA" /></td>
                                {{-- <td>
                                    <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                    <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                </td> --}}
                                <td>
                                    <span> &#183; Lukisan siap bina yang menunjukkan lokasi suis</span><br>
                                    <span> &#183; Bukti bergambar</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT5.3-->
                            <tr class="pg-2" align="center">
                                <td>KT5.3</td>
                                <td>Lighting Power Density (LPD)</td>
                                <td colspan="6"></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT53_MMV" name="markahKT53_MMV" /></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT53_MMV_PUN" name="markahKT53_MMV_PUN" /></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT53_MMV_SEDIA" name="markahKT53_MMV_SEDIA" /></td>
                                {{-- <td>
                                    <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                    <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                </td> --}}
                                <td>
                                    <span> &#183; Laporan pengambilan data mengikut spesifikasi</span><br>
                                    <span> &#183; Lukisan siap bina</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>
                            
                            <!--KT6--><!--No input-->
                            <tr class="pg-2" align="center">
                                <td>KT6</td>
                                <td>Sistem penyaman udara dan pengudaraan mekanikal (ACMV)</td>
                                <td colspan="6"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    {{-- <span> &#183; Lukisan siap bina yang menunjukkan lokasi suis</span><br>
                                    <span> &#183; Bukti bergambar</span><br> --}}
                                </td>
                                <td colspan="5"></td>
                                <td colspan="4">
                                    {{-- <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form> --}}
                                </td>
                            </tr>

                            <!--KT6.1-->
                            <tr class="pg-2" align="center">
                                <td>KT6.1</td>
                                <td>Coefficient of Performance (COP)</td>
                                <td colspan="6"></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT61_MMV" name="markahKT61_MMV" /></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT61_MMV_PUN" name="markahKT61_MMV_PUN" /></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT61_MMV_SEDIA" name="markahKT61_MMV_SEDIA" /></td>
                                {{-- <td>
                                    <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                    <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                </td> --}}
                                <td>
                                    <span> &#183; Laporan pengukuran dan verifikasi</span><br>
                                    <span> &#183; Pengiraan COP</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT6.2-->
                            <tr class="pg-2" align="center">
                                <td>KT6.2</td>
                                <td>Green Refrigerant</td>
                                <td colspan="6"></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT62_MMV" name="markahKT62_MMV" /></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT62_MMV_PUN" name="markahKT62_MMV_PUN" /></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT62_MMV_SEDIA" name="markahKT62_MMV_SEDIA" /></td>
                                {{-- <td>
                                    <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                    <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                </td> --}}
                                <td>
                                    <span> &#183; Rekod penyenggaraan peralatan</span><br>
                                    <span> &#183; Brosur pembekal</span><br>
                                    <span> &#183; Rekod inventori</span>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT7-->
                            <tr class="pg-2" align="center">
                                <td>KT7</td>
                                <td>Penyusupan udara</td>
                                <td colspan="6"></td>
                                <td>3</td>
                                <td></td>
                                <td>3</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT7_MMV" name="markahKT7_MMV" /></td>
                                <td>3</td>
                                <td></td>
                                <td>3</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT7_MMV_PUN" name="markahKT7_MMV_PUN" /></td>
                                <td>3</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT7_MMV_SEDIA" name="markahKT7_MMV_SEDIA" /></td>
                                <td>
                                    <span> &#183; Lukisan butiran</span><br>
                                    <span> &#183; Lukisan siap bina</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT8-->
                            <tr class="pg-2" align="center">
                                <td>KT8</td>
                                <td>Tenaga Boleh Baharu (TBB)</td>
                                <td colspan="6"></td>
                                <td>6</td>
                                <td></td>
                                <td>6</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT8_MMV" name="markahKT8_MMV" /></td>
                                <td>6</td>
                                <td></td>
                                <td>6</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT8_MMV_PUN" name="markahKT8_MMV_PUN" /></td>
                                <td>6</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT8_MMV_SEDIA" name="markahKT8_MMV_SEDIA" /></td>
                                {{-- <td colspan="2">
                                    <span>&#183; Mengemukakan lukisan rekabentuk sistem dan simulasi pengiraan
                                        bagi anggaran tenaga baharu yang boleh dihasilkan oleh sistem tersebut</span><br>
                                </td> --}}
                                <td>
                                    <span> &#183; Salinan lukisan siap bina dan laporan uji terima yang mematuhi kehendak rekabentuk</span><br>
                                    <span> &#183; Pengiraan penjanaan tenaga boleh baharu berbanding jumlah penggunaan tenaga tahunan bangunan</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT9-->
                            <tr class="pg-2" align="center">
                                <td>KT9</td>
                                <td>Prestasi Penggunaan Tenaga</td>
                                <td colspan="6"></td>
                                <td>10</td>
                                <td></td>
                                <td>10</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="10" autocapitalize="off" id="markahKT9_MMV" name="markahKT9_MMV" /></td>
                                <td>10</td>
                                <td></td>
                                <td>10</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="10" autocapitalize="off" id="markahKT9_MMV_PUN" name="markahKT9_MMV_PUN" /></td>
                                <td>10</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="10" autocapitalize="off" id="markahKT9_MMV_SEDIA" name="markahKT9_MMV_SEDIA" /></td>
                                {{-- <td>
                                    <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                    <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                </td> --}}
                                <td>
                                    <span> &#183; Pengiraan semula berdasarkan bacaan meter</span><br>
                                    <span> &#183; Bil elektrik 12 bulan (jika berkaitan)</span><br>
                                    <span> &#183; Lukisan siap bina yang berkaitan</span>
                                    <span> &#183; Pengiraan peratus pengurangan</span>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT10--><!--No input-->
                            <tr class="pg-2" align="center">
                                <td>KT10</td>
                                <td>Paparan dan kawalan</td>
                                <td colspan="6"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    {{-- <span> &#183; Lukisan siap bina yang menunjukkan lokasi suis</span><br>
                                    <span> &#183; Bukti bergambar</span><br> --}}
                                </td>
                                <td colspan="5"></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT10.1-->
                            <tr class="pg-2" align="center">
                                <td>KT10.1</td>
                                <td>Pemasangan sub-meter digital</td>
                                <td colspan="6"></td>
                                <td>6</td>
                                <td></td>
                                <td>6</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT101_MMV" name="markahKT101_MMV" /></td>
                                <td>5</td>
                                <td></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT101_MMV_PUN" name="markahKT101_MMV_PUN" /></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT101_MMV_SEDIA" name="markahKT101_MMV_SEDIA" /></td>
                                {{-- <td>
                                    <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                    <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                </td> --}}
                                <td>
                                    <span> &#183; Lukisan siap bina yang menunjukkan lokasi suis</span><br>
                                    <span> &#183; Bukti bergambar</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT10.2-->
                            <tr class="pg-2" align="center">
                                <td>KT10.2</td>
                                <td>Sistem Pengurusan Kawalan Tenaga</td>
                                <td colspan="6"></td>
                                <td>5</td>
                                <td></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT102_MMV" name="markahKT102_MMV" /></td>
                                <td>5</td>
                                <td></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT102_MMV_PUN" name="markahKT102_MMV_PUN" /></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT102_MMV_SEDIA" name="markahKT102_MMV_SEDIA" /></td>
                                <td>
                                    <span> a &#41; Baru</span><br>
                                    <span> &#183; Lukisan siap bina</span><br>
                                    <span> &#183; Gambar rajah litar</span><br>
                                    <span> &#183; Rekod Pengujian dan Pentauliahan</span><br>
                                    <span> &#183; Sijil pengiktirafan MS ISO 50001</span><br>
                                    <span> b &#41; Sedia ada</span><br>
                                    <span> &#183; Lukisan siap bina</span><br>
                                    <span> &#183; Gambar rajah litar</span><br>
                                    <span> &#183; Laporan BEMS</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT10.3-->
                            <tr class="pg-2" align="center">
                                <td>KT10.3</td>
                                <td>Verifikasi sistem paparan dan kawalan</td>
                                <td colspan="6"></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT103_MMV" name="markahKT103_MMV" /></td>
                                <td>1</td>
                                <td></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT103_MMV_PUN" name="markahKT103_MMV_PUN" /></td>
                                <td>1</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT103_MMV_SEDIA" name="markahKT103_MMV_SEDIA" /></td>
                                {{-- <td>
                                    <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                    <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                </td> --}}
                                <td>
                                    <span> &#183; Senarai penggunaan tenaga berdasarkan bil elektrik bulanan</span><br>
                                    <span> &#183; Laporan verifikasi dan pelan penambahbaikan</span><br>
                                    <span> &#183; Manual Operasi dan Penyenggaraan</span>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--KT11-->
                            <tr class="pg-2" align="center">
                                <td>KT11</td>
                                <td>Pengujian dan pentauliahan</td>
                                <td colspan="6"></td>
                                <td>1</td>
                                <td></td>
                                <td>3</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT11_MMV" name="markahKT11_MMV" /></td>
                                <td>1</td>
                                <td></td>
                                <td>3</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT11_MMV_PUN" name="markahKT11_MMV_PUN" /></td>
                                <td>3</td>
                                <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT11_MMV_SEDIA" name="markahKT11_MMV_SEDIA" /></td>
                                {{-- <td colspan="2">
                                    <span>&#183; Pelan pengujian dan pentauliahan</span><br>
                                </td> --}}
                                <td>
                                    <span>&#183; Dokumen lengkap pengujian dan pentauliahan yang telah disahkan</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--JUMLAH MARKAHKT-->
                            <tr class="pg-2" align="center">
                                <td colspan="6">Jumlah markah KT</td>
                                <td colspan="3">55</td>
                                <td></td>
                                <td>57</td>
                                <td><input type="number" min="0" max="57" id="markahTOTAL_TL_MMV" name="markahTOTAL_TL_MMV"></td>
                                <td>54</td>
                                <td></td>
                                <td>56</td>
                                {{-- <td colspan="2"></td> --}}
                                <td><input type="number" min="0" max="56" id="markahTOTAL_TL_MMV_PUN"></td>
                                <td>48</td>
                                <td><input type="number" min="0" max="48" id="markahTOTAL_TL_MMV_SEDIA" name="markahTOTAL_TL_MMV_SEDIA"></td>
                                <td></td>
                                <td></td>
                            </tr> 

                            <thead class="pg-2 text-white" style="background-color:#EB5500">
                                <th>SB</th>
                                <th colspan="30">PENGURUSAN SUMBER DAN BAHAN</th>
                            </thead>

                            <!--SB1--><!--Baru dan PUN shj-->
                            <tr class="pg-3" align="center">
                                <td>SB1</td>
                                <td>Sistem Binaan Berindustri (IBS)</td>
                                <td colspan="6"></td>
                                <td>5</td>
                                <td></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="7" autocapitalize="off" id="markahSB1_MMV" name="markahSB1_MMV" /></td>
                                <td>7</td>
                                <td></td>
                                <td>7</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="7" autocapitalize="off" id="markahSB1_MMV_PUN" name="markahSB1_MMV_PUN" /></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <span>&#183; Lukisan pembinaan IBS</span><br>
                                    <span>&#183; Lukisan siap bina</span><br>      
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--SB2--><!--Baru dan PUN shj-->
                            <tr class="pg-3" align="center">
                                <td>SB2</td>
                                <td>Produk hijau</td>
                                <td colspan="6"></td>
                                <td>7</td>
                                <td></td>
                                <td>7</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="7" autocapitalize="off" id="markahSB2_MMV" name="markahSB2_MMV" /></td>
                                <td>7</td>
                                <td></td>
                                <td>7</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="7" autocapitalize="off" id="markahSB1_MMV_PUN" name="markahSB1_MMV_PUN" /></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <span>&#183; Brosur pembekal</span><br>
                                    <span>&#183; Bukti bergambar</span><br>
                                    <span>&#183; Borang pengiraan skor GPSS</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--SB3--><!--Baru dan PUN shj-->
                            <tr class="pg-3" align="center">
                                <td>SB3</td>
                                <td>Pengurusan sisa semasa pembinaan</td>
                                <td colspan="6"></td>
                                <td>4</td>
                                <td></td>
                                <td>4</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="7" autocapitalize="off" id="markahSB3_MMV" name="markahSB3_MMV" /></td>
                                <td>4</td>
                                <td></td>
                                <td>4</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="7" autocapitalize="off" id="markahSB3_MMV_PUN" name="markahSB3_MMV_PUN" /></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <span>&#183; Dokumen bukti proses penyimpanan</span><br>
                                    <span>&#183; Dokumen bukti proses penghantaran ke tapak pelupusan</span><br>
                                    <span>&#183; Dokumen bukti proses pelupusan sisa berjadual seperti resit
                                        dan borang semasa audit dijalankan
                                    </span><br>
                                    <span>&#183; Bukti bergambar</span><br>
                                    <span>&#183; Pengiraan kitar semula (jika ada)</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>        
                            </tr>

                            <!--SB4-->
                            <tr class="pg-3" align="center">
                                <td>SB4</td>
                                <td>3r-Semasa Operasi</td>
                                <td colspan="6"></td>
                                <td>4</td>
                                <td></td>
                                <td>4</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="4" autocapitalize="off" id="markahSB4_MMV" name="markahSB4_MMV" /></td>
                                <td>4</td>
                                <td></td>
                                <td>4</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="4" autocapitalize="off" id="markahSB4_MMV_PUN" name="markahSB4_MMV_PUN" /></td>
                                <td>4</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="4" autocapitalize="off" id="markahSB4_MMV_SEDIA" name="markahSB4_MMV_SEDIA" /></td>
                                <td>
                                    <span>&#183; Pematuhan pelan pengurusan sisa domestik</span><br>
                                    <span>&#183; Bukti bergambar</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            <tr>

                                <!--JUMLAH MARKAHSB-->
                                <tr class="pg-3" align="center">
                                    <td colspan="6">Jumlah markah SB</td>
                                    <td colspan="3">20</td>
                                    <td></td>
                                    <td>20</td>
                                    <td><input type="number" min="0" max="20" id="markahTOTAL_SB_MMV" name="markahTOTAL_SB_MMV"></td>
                                    <td>15</td>
                                    <td></td>
                                    <td>15</td>
                                    <td><input type="number" min="0" max="15" id="markahTOTAL_SB_MMV_PUN" name="markahTOTAL_SB_MMV_PUN"></td>
                                    <td>4</td>
                                    <td><input type="number" min="0" max="4" id="markahTOTAL_SB_MMV_SEDIA" name="markahTOTAL_SB_MMV_SEDIA"></td>
                                    <td></td>
                                    <td></td>
                                </tr> 

                                <thead class="pg-2 text-white" style="background-color:#EB5500">
                                    <th>PA</th>
                                    <th colspan="30">PENGURUSAN KECEKAPAN PENGGUNAAN AIR</th>
                                </thead>

                                <!--PA1-->
                            <tr class="pg-4" align="center">
                                <td>PA1</td>
                                <td>Produk Kecekapan Air</td>
                                <td colspan="6"></td>
                                <td>3</td>
                                <td></td>
                                <td>3</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="3" autocapitalize="off" id="markahPA1_MMV" name="markahPA1_MMV" /></td>
                                <td>3</td>
                                <td></td>
                                <td>3</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="3" autocapitalize="off" id="markahPA1_MMV_PUN" name="markahPA1_MMV_PUN" /></td>
                                <td>3</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="3" autocapitalize="off" id="markahPA1_MMV_PUN" name="markahPA1_MMV_PUN" /></td>
                                <td>
                                    <span>&#183; Bukti bergambar</span><br>
                                    <span>&#183; Pensijilan WELPS</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--PA2-->
                            <tr class="pg-4" align="center">
                                <td>PA2</td>
                                <td>Penjimatan Penggunaan Air Dalam Bangunan</td>
                                <td colspan="6"></td>
                                <td>2</td>
                                <td></td>
                                <td>2</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPA2_MMV" name="markahPA2_MMV" /></td>
                                <td>2</td>
                                <td></td>
                                <td>2</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPA2_MMV_PUN" name="markahPA2_MMV_PUN" /></td>
                                <td>2</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPA2_MMV_SEDIA" name="markahPA2_MMV_SEDIA" /></td>
                                <td>
                                    <span>&#183; Bukti bergambar</span><br>
                                    <span>&#183; Pensijilan WELPS</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--PA3-->
                            <tr class="pg-4" align="center">
                                <td rowspan="2">PA3</td>
                                <td>i. SPAH</td>
                                <td colspan="6"></td>
                                <td>4</td>
                                <td></td>
                                <td>4</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="4" autocapitalize="off" id="markahPA3_MMV" name="markahPA3_MMV" /></td>
                                <td>4</td>
                                <td></td>
                                <td>4</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="4" autocapitalize="off" id="markahPA3_MMV_PUN" name="markahPA3_MMV_PUN" /></td>
                                <td>4</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="4" autocapitalize="off" id="markahPA3_MMV_SEDIA" name="markahPA3_MMV_SEDIA" /></td>
                                <td>
                                    <span>&#183; Bukti bergambar</span><br>
                                    <span>&#183; Pensijilan WELPS</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <tr class="pg-4" align="center">
                                <td>ii. Kitar Semula Air Sisa</td>
                                <td colspan="6"></td>
                                <td>5</td>
                                <td></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="5" autocapitalize="off" id="markahPA32_MMV" name="markahPA32_MMV" /></td>
                                <td>5</td>
                                <td></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="5" autocapitalize="off" id="markahPA32_MMV_PUN" name="markahPA32_MMV_PUN" /></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="5" autocapitalize="off" id="markahPA32_MMV_SEDIA" name="markahPA32_MMV_SEDIA" /></td>
                                <td>
                                    <span>&#183; Laporan pengujian sistem</span><br>
                                    <span>&#183; Bukti bergambar</span><br>
                                    <span>&#183; Lukisan siap bina</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--PA4-->
                            <tr class="pg-4" align="center">
                                <td>PA4</td>
                                <td>Sub-Meter Air</td>
                                <td colspan="6"></td>
                                <td>5</td>
                                <td></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="5" autocapitalize="off" id="markahPA4_MMV" name="markahPA4_MMV" /></td>
                                <td>5</td>
                                <td></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="5" autocapitalize="off" id="markahPA4_MMV_PUN" name="markahPA4_MMV_PUN" /></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="5" autocapitalize="off" id="markahPA4_MMV_SEDIA" name="markahPA4_MMV_SEDIA" /></td>
                                <td>
                                    <span>&#183; Lukisan siap bina</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>

                            <!--PA5-->
                            <tr class="pg-4" align="center">
                                <td>PA5</td>
                                <td>Sub-Meter Air</td>
                                <td colspan="6"></td>
                                <td>5</td>
                                <td></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="5" autocapitalize="off" id="markahPA5_MMV" name="markahPA5_MMV" /></td>
                                <td>5</td>
                                <td></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="5" autocapitalize="off" id="markahPA5_MMV_PUN" name="markahPA5_MMV_PUN" /></td>
                                <td>5</td>
                                <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="5" autocapitalize="off" id="markahPA5_MMV_SEDIA" name="markahPA5_MMV_SEDIA" /></td>
                                <td>
                                    <span>&#183; Lukisan siap bina</span><br>
                                </td>
                                <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                <td colspan="4">
                                    <form class="form">
                                        <label for="form__input" class="form__label">
                                            <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                            <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                            <span id="custom-text">No file chosen, yet.</span>
                                        </label>
                                    </form>
                                </td>
                            </tr>


                            <!-- Jumlah MarkahPA-->
                            <tr class="pg-4" align="center">
                                <th colspan="6">Jumlah markah PA</th>
                                <td colspan="3">20</td>
                                <td></td>
                                <td>22</td>
                                <td><input type="number" min="0" max="22" id="markahTOTAL_PA_MMV" name="markahTOTAL_PA_MMV"></td>
                                <td>22</td>
                                <td></td>
                                <td>22</td>
                                <td><input type="number" min="0" max="22" id="markahTOTAL_PA_MMV_PUN" name="markahTOTAL_PA_MMV_PUN"></td>
                                <td>22</td>
                                <td><input type="number" min="0" max="22" id="markahTOTAL_PA_MMV_SEDIA" name="markahTOTAL_PA_MMV_SEDIA"></td>
                                <td></td>
                                <td></td>
                            </tr> 

                            <thead class="pg-2 text-white" style="background-color:#EB5500">
                                <th>PD</th>
                                <th colspan="32">PENGURUSAN KUALITI PERSEKITARAN DALAMAN</th>
                            </thead>

                            <!--PD1-->
                        <tr class="pg-5" align="center">
                            <td>PD1</td>
                            <td>Larangan merokok</td>
                            <td colspan="6"></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="7" autocapitalize="off" id="markahPD1_MMV" name="markahPD1_MMV" /></td>
                            <td>2</td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="7" autocapitalize="off" id="markahPD1_MMV_PUN" name="markahPD1_MMV_PUN" /></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="7" autocapitalize="off" id="markahPD1_MMV_PUN" name="markahPD1_MMV_PUN" /></td>
                            <td>
                                <span> a &#41; Baru</span><br>
                                <span> &#183; Gambar papan tanda dan lokasi larangan merokok</span><br>
                                <span> b &#41; Sedia ada</span><br>
                                <span> &#183; Gambar papan tanda dan lokasi larangan merokok</span><br>
                                <span> &#183; Rekod pelaksanaan program kesedaran atau langkah penguatkuasaan</span><br>                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD2--><!--NO INPUT-->
                        <tr class="pg-5" align="center">
                            <td>PD2</td>
                            <td>Perancangan ruang</td>
                            <td colspan="6"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="5"></td>
                            <td colspan="4"></td>
                        </tr>

                        <!--PD2.1--><!--BARU SHJ-->
                        <tr class="pg-5" align="center">
                            <td>PD2.1</td>
                            <td>Lebar bangunan yang efektif &#40;no deep planning&#41;</td>
                            <td colspan="6"></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="7" autocapitalize="off" id="markahPD21_MMV" name="markahPD21_MMV" /></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <span>&#183; Lukisan siap bina</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD2.2-->
                        <tr class="pg-5" align="center">
                            <td>PD2.2</td>
                            <td>Susun atur ruang pejabat terbuka sepanjang permukaan fasad</td>
                            <td colspan="6"></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD22_MMV" name="markahPD22_MMV" /></td>
                            <td>2</td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD22_MMV_PUN" name="markahPD22_MMV_PUN" /></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD22_MMV_PUN" name="markahPD22_MMV_PUN" /></td>
                            <td>
                                <span>&#183; Lukisan siap bina</span><br>
                                <span>&#183; Bukti bergambar</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD2.3-->
                        <tr class="pg-5" align="center">
                            <td>PD2.3</td>
                            <td>Dinding sesekat dalaman yang telus cahaya</td>
                            <td colspan="6"></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD23_MMV" name="markahPD23_MMV" /></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD23_MMV_PUN" name="markahPD23_MMV_PUN" /></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD23_MMV_PUN" name="markahPD23_MMV_PUN" /></td>
                            <td>
                                <span>&#183; Lukisan siap bina</span><br>
                                <span>&#183; Bukti bergambar</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>


                        <!--PD2.4-->
                        <tr class="pg-5" align="center">
                            <td>PD2.4</td>
                            <td>Ketinggian siling yang efektif</td>
                            <td colspan="6"></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD22_MMV" name="markahPD22_MMV" /></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD12_MMV_PUN" name="markahPD22_MMV_PUN" /></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD22_MMV_PUN" name="markahPD22_MMV_PUN" /></td>
                            <td>
                                <span>&#183; Lukisan siap bina</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD2.5-->
                        <tr class="pg-5" align="center">
                            <td>PD2.5</td>
                            <td>Warna cerah di permukaan dinding dan siling</td>
                            <td colspan="6"></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD25_MMV" name="markahPD25_MMV" /></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD25_MMV_PUN" name="markahPD25_MMV_PUN" /></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD25_MMV_SEDIA" name="markahPD25_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Bukti bergambar bagi mengesahkan skima warna yang digunakan</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD3--><!--NO INPUT-->
                        <tr class="pg-5" align="center">
                            <td>PD3</td>
                            <td>Kualiti Visual</td>
                            <td colspan="6"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="5"></td>
                            <td colspan="4"></td>
                        </tr>

                        <!--PD3.1-->
                        <tr class="pg-5" align="center">
                            <td>PD3.1</td>
                            <td>Faktor Pencahayaan Siang (DF)</td>
                            <td colspan="6"></td>
                            <td>2</td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" clas2="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD31_MMV" name="markahPD31_MMV" /></td>
                            <td>2</td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" clas2="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD31_MMV_PUN" name="markahPD31_MMV_PUN" /></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" clas2="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD31_MMV_SEDIA" name="markahPD31_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Lukisan siap bina</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD3.2-->
                        <tr class="pg-5" align="center">
                            <td>PD3.2</td>
                            <td>Menggunakan rak cahaya (light shelves)</td>
                            <td colspan="6"></td>
                            <td>2</td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD32_MMV" name="markahPD32_MMV" /></td>
                            <td>2</td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD32_MMV_PUN" name="markahPD32_MMV_PUN" /></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD32_MMV_SEDIA" name="markahPD32_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Lukisan pemasangan</span><br>
                                <span>&#183; Lukisan siap bina</span><br>
                                <span>&#183; Bukti bergambar</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD3.3-->
                        <tr class="pg-5" align="center">
                            <td>PD3.3</td>
                            <td>Kawalan Tahap Kesilauan</td>
                            <td colspan="6"></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD33_MMV" name="markahPD33_MMV" /></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD33_MMV_PUN" name="markahPD33_MMV_PUN" /></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD33_MMV_SEDIA" name="markahPD33_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Lukisan siap bina dan bukti bergambar
                                    bagi mengesahkan bidai yang digunakan</span><br>
                                <span>&#183; Laporan prestasi pencahayaan (jika ada)</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD3.4-->
                        <tr class="pg-5" align="center">
                            <td>PD3.4</td>
                            <td>Akses visual kepada pandangan di luar</td>
                            <td colspan="6"></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD34_MMV" name="markahPD34_MMV" /></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD34_MMV_PUN" name="markahPD34_MMV_PUN" /></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD34_MMV_SEDIA" name="markahPD34_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Katalog dan sample bahan yang diluluskan oleh S.O.</span><br>
                                <span>&#183; Lukisan Siap Bina</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD3.5-->
                        <tr class="pg-5" align="center">
                            <td>PD3.5</td>
                            <td>Tahap Pencahayaan (bukan semulajadi) Bilik</td>
                            <td colspan="6"></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD35_MMV" name="markahPD35_MMV" /></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD35_MMV_PUN" name="markahPD35_MMV_PUN" /></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD35_MMV_SEDIA" name="markahPD35_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Pengiraan dan lukisan terpasang bagi siling yang menunjukkan susun atur lampu</span><br>
                                <span>&#183; Laporan Pengujian dan Pentauliahan</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD4--><!--No input-->
                        <tr class="pg-5" align="center">
                            <td>PD4</td>
                            <td>Prestasi Pengudaraan</td>
                            <td colspan="6"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="5"></td>
                            <td colspan="4"></td>
                        </tr>

                        <!--PD4.1-->
                        <tr class="pg-5" align="center">
                            <td>PD4.1</td>
                            <td>Memaksimakan Kawasan Tanpa Keperluan Sistem Penyaman Udara</td>
                            <td colspan="6"></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD41_MMV" name="markahPD41_MMV" /></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD41_MMV_PUN" name="markahPD41_MMV_PUN" /></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD41_MMV_SEDIA" name="markahPD41_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Mengemukakan lukisan siap bina yang menunjukkan ruang
                                    pengudaraan secara semula jadi</span><br>
                                <span>&#183; Pelan susun atur</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD4.2-->
                        <tr class="pg-5" align="center">
                            <td>PD4.2</td>
                            <td>Prestasi Kualiti Udara Dalaman: ASHRAE 62.1:2007 & 129</td>
                            <td colspan="6"></td>
                            <td>2</td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD42_MMV" name="markahPD42_MMV" /></td>
                            <td>2</td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD42_MMV_PUN" name="markahPD42_MMV_PUN" /></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD42_MMV_SEDIA" name="markahPD42_MMV_SEDIA" /></td>
                            <td>
                                            <span>&#183; Mengemukakan lukisan pelan lantai yang menunjukkan
                                                ruang pengudaraan secara semulajadi</span><br>
                                            <span>&#183; Laporan simulasi, jika ada</span><br>
                                            <span>&#183; Pelan susun atur</span><br>

                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD5--><!--No input-->
                        <tr class="pg-5" align="center">
                            <td>PD5</td>
                            <td>Keselesaan Thermal & Kawalan Sistem</td>
                            <td colspan="6"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="5"></td>
                            <td colspan="4"></td>
                            </td>
                        </tr>

                        <!--PD5.1-->
                        <tr class="pg-5" align="center">
                            <td>PD5.1</td>
                            <td>Rekabentuk Keselesaan Thermal: ASHRAE 55</td>
                            <td colspan="6"></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD51_MMV" name="markahPD51_MMV" /></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD51_MMV_PUN" name="markahPD51_MMV_PUN" /></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD51_MMV_SEDIA" name="markahPD51_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Laporan Post Occupancy Evaluation (POE)</span><br>
                                <span>&#183; Lukisan siap bina dan bukti bergambar bagi setiap
                                    jenis sensor dan kawalan keselesaan thermal</span><br>
                                <span>&#183; Menyediakan kaji selidik tahap keselesaan pengguna</span><br>

                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD5.2-->
                        <tr class="pg-5" align="center">
                            <td>PD5.2</td>
                            <td>Kawalan Sistem Pencahayaan & Pengudaraan (Pencahayaan)</td>
                            <td colspan="6"></td>
                            <td>2</td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD52_MMV" name="markahPD52_MMV" /></td>
                            <td>2</td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD52_MMV_PUN" name="markahPD52_MMV_PUN" /></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD52_MMV_SEDIA" name="markahPD52_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Bukti bergambar</span><br>
                                <span>&#183; Lukisan siap bina</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD6--><!--No input-->
                        <tr class="pg-5" align="center">
                            <td>PD6</td>
                            <td>Kualiti Persekitaran Dalaman Dipertingkatkan</td>
                            <td colspan="6"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="5"></td>
                            <td colspan="4"></td>
                        </tr>

                        <!--PD6.1-->
                        <tr class="pg-5" align="center">
                            <td>PD6.1</td>
                            <td>Kawalan Paras Karbon Dioksida</td>
                            <td colspan="6"></td>
                            <td>3</td>
                            <td></td>
                            <td>3</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD61_MMV" name="markahPD61_MMV" /></td>
                            <td>3</td>
                            <td></td>
                            <td>3</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD61_MMV_PUN" name="markahPD61_MMV_PUN" /></td>
                            <td>3</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD61_MMV_SEDIA" name="markahPD61_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Lukisan siap bina</span><br>
                                <span>&#183; Bukti bergambar</span><br>
                                <span>&#183; Rekod kalibrasi berkala</span><br>
                                <span>&#183; Rekod senggara sistem pemantauan dan kawalan CO2</span><br>

                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD6.2--><!--PUN | Sedia Ada not available-->
                        <tr class="pg-5" align="center">
                            <td>PD6.2</td>
                            <td>Kualiti Persekitaran Semasa Pembinaan dan Sebelum diduduki</td>
                            <td colspan="6"></td>
                            <td>2</td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="2" autocapitalize="off" id="markahPD52_MMV" name="markahPD52_MMV" /></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <span>&#183; Laporan bergambar berkala tahap kebersihan tapak</span><br>
                                <span>&#183; Laporan flush out</span>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD7-->
                        <tr class="pg-5" align="center">
                            <td>PD7</td>
                            <td>Keselesaan Akustik</td>
                            <td colspan="6"></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD7_MMV" name="markahPD7_MMV" /></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD7_MMV_PUN" name="markahPD7_MMV_PUN" /></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="1" autocapitalize="off" id="markahPD7_MMV_SEDIA" name="markahPD7_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Laporan ukuran tahap bunyi dan penjelasan mengenai langkah-langkah
                                    yang telah dilaksanakan untuk mencapai tahap bunyi yang ditetapkan</span><br>
                                <span>&#183; Lukisan siap bina yang menunjukkan ciri-ciri kawalan bunyi yang telah dilaksanakan</span><br>
                                <span>&#183; Manufacturer's data sheets untuk bahan-bahan akustik 
                                    yang telah digunakan dalam bangunan</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD8-->
                        <tr class="pg-5" align="center">
                            <td>PD8</td>
                            <td>Kualiti Udara Dalaman (IAQ)</td>
                            <td colspan="6"></td>
                            <td>3</td>
                            <td></td>
                            <td>3</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="3" autocapitalize="off" id="markahPD8_MMV" name="markahPD8_MMV" /></td>
                            <td>3</td>
                            <td></td>
                            <td>3</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="3" autocapitalize="off" id="markahPD8_MMV_PUN" name="markahPD8_MMV_PUN" /></td>
                            <td>3</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="3" autocapitalize="off" id="markahPD8_MMV_SEDIA" name="markahPD8_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Katalog dan kaedah pemasangan (method statement) yang telah
                                    disahkan oleh Pegawai yang kompeten</span><br>
                                <span>&#183; Gambar semasa kerja pemasangan</span><br>
                                <span>&#183; Lukisan siap bina</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD9-->
                        <tr class="pg-5" align="center">
                            <td>PD9</td>
                            <td>Pencegahan Kulapok (Mold)</td>
                            <td colspan="6"></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahTL9_MMV" name="markahTL9_MMV" /></td>
                            <td>1</td>
                            <td></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahTL9_MMV_PUN" name="markahTL9_MMV_PUN" /></td>
                            <td>1</td>
                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahTL9_MMV_SEDIA" name="markahTL9_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Laporan ringkas yang menggariskan strategi yang akan dilaksanakan
                                    untuk memenuhi keperluan bagi pencegahan kulapok</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--PD10--><!--Baru not available-->
                        <tr class="pg-5" align="center">
                            <td>PD10</td>
                            <td>Kaji Selidik Keselesaan Penghuni</td>
                            <td colspan="6"></td>
                            <td></td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahTL10_MMV" name="markahTL10_MMV" /></td>
                            <td>0</td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahTL10_MMV_PUN" name="markahTL10_MMV_PUN" /></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahTL10_MMV_SEDIA" name="markahTL10_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Laporan maklumbalas kaji selidik</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!-- Jumlah MarkahPD-->
                        <tr class="pg-5" align="center">
                            <td colspan="6">Jumlah markah PD</td>
                            <td colspan="3">29</td>
                            <td></td>
                            <td>31</td>
                            <td><input type="number" min="0" max="31" id="markahTOTAL_PD_MMV" name="markahTOTAL_PD_MMV"></td>
                            <td>27</td>
                            <td></td>
                            <td>29</td>
                            <td><input type="number" min="0" max="29" id="markahTOTAL_PD_MMV_PUN" name="markahTOTAL_PD_MMV_PUN"></td>
                            <td>29</td>
                            <td><input type="number" min="0" max="29" id="markahTOTAL_PD_MMV_SEDIA" name="markahTOTAL_PD_MMV_SEDIA"></td>
                        </tr>  

                        <thead class="pg-2 text-white" style="background-color:#EB5500">
                            <th>FL</th>
                            <th colspan="30">PENGURUSAN FASILITI LESTARI</th>
                        </thead>

                        <!--FL1-->
                        <tr class="pg-6" align="center">
                            <td>FL1</td>
                            <td>Penarafan sedia ada</td>
                            <td colspan="6"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahTL4_MMV_PUN" name="markahTL4_MMV_PUN" /></td>
                            <td>
                                <span>&#183; Sijil Penarafan Hijau yang masih dalam tempoh sahlaku</span><br>
                                <span>&#183; Laporan Audit Tenaga untuk audit yang telah dijalankan sekiranya terdapat perubahan
                                    ketara pada penggunaan tenaga elektrik bangunan</span><br>
                            </td>
                            <td colspan="5"></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--FL2-->
                        <tr class="pg-6" align="center">
                            <td>FL2</td>
                            <td>Pengurusan fasiliti bangunan</td>
                            <td colspan="6"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="5"></td>
                            <td colspan="4">
                                {{-- <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form> --}}
                            </td>
                        </tr>

                        <!--FL2.1--><!--Baru, PUN, Sedia Ada Not Available-->
                        <tr class="pg-6" align="center">
                            <td>FL2.1</td>
                            <td>Pengurusan data dan ruang</td>
                            <td colspan="6"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <span>&#183; Cetakan templat untuk setiap pengurusan data dan ruang</span><br>
                                <span>&#183; Demonstrasi sistem pengurusan fasiliti bangunan yang disediakan</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--FL2.2-->
                        <tr class="pg-6" align="center">
                            <td>FL2.2</td>
                            <td>Pengurusan sistem penyenggaraan</td>
                            <td colspan="6"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <span>&#183; Contoh salinan print out daripada sistem
                                    CMMS/eSPFB</span><br>
                                <span>&#183; Demonstrasi sistem pengurusan fasiliti bangunan yang disediakan</span><br>
                            </td>
                            <td colspan="5"></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--FL2.3-->
                        <tr class="pg-6" align="center">
                            <td>FL2.3</td>
                            <td>Prestasi penggurusan</td>
                            <td colspan="6"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <span>&#183; Senarai petunjuk prestasi utama di dalam kontrak</span><br>
                                <span>&#183; Laporan prestasi bulanan</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--FL3-->
                        <tr class="pg-6" align="center">
                            <td>FL2.1</td>
                            <td>Penyenggaraan Lestari</td>
                            <td colspan="6"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{-- <span>&#183; Cetakan templat untuk setiap pengurusan data dan ruang</span><br> --}}
                                {{-- <span>&#183; Demonstrasi sistem pengurusan fasiliti bangunan yang disediakan</span><br> --}}
                            </td>
                            <td colspan="5"></td>
                            <td colspan="4">
                                {{-- <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form> --}}
                            </td>
                        </tr>

                        <!--FL3.1-->
                        <tr class="pg-6" align="center">
                            <td>FL3.1</td>
                            <td>Ruang pejabat untuk pasukan penyenggaraan</td>
                            <td colspan="6"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <span>&#183; Lukisan siap bina</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--FL3.2-->
                        <tr class="pg-6" align="center">
                            <td>FL3.2</td>
                            <td>Prestasi pengurusan</td>
                            <td colspan="6"></td>
                            <td></td>
                            <td></td>
                            <td>5</td>
                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahFL32_MMV" name="markahFL32_MMV" /></td>
                            <td>0</td>
                            <td></td>
                            <td>5</td>
                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahFL32_MMV_PUN" name="markahFL32_MMV_PUN" /></td>
                            <td>5</td>
                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahFL32_MMV_SEDIA" name="markahFL32_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Salinan surat tawaran kepada pasukan penyenggaraan 
                                    dan REEM yang berjaya dilantik
                                </span>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!--FL3.3-->
                        <tr class="pg-6" align="center">
                            <td>FL3.3</td>
                            <td>Pelan Pengurusan Fasiliti (FM)</td>
                            <td colspan="6"></td>
                            <td>2</td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahFL33_MMV" name="markahFL33_MMV" /></td>
                            <td>2</td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahFL33_MMV_PUN" name="markahFL33_MMV_PUN" /></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahFL33_MMV_SEDIA" name="markahFL33_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Tatacara pelaksanaan pengurusan aset</span>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>

                        </tr>

                        <!--FL3.4-->
                        <tr class="pg-6" align="center">
                            <td>FL3.4</td>
                            <td>Manual Operasi dan Penyenggaraan Bangunan</td>
                            <td colspan="6"></td>
                            <td>2</td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahFL34_MMV" name="markahFL34_MMV" /></td>
                            <td>2</td>
                            <td></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahFL34_MMV_PUN" name="markahFL34_MMV_PUN" /></td>
                            <td>2</td>
                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahFL34_MMV_SEDIA" name="markahFL34_MMV_SEDIA" /></td>
                            <td>
                                <span>&#183; Manual operasi dan penyenggaraan bangunan</span><br>
                                <span>&#183; Latihan penggunaan sistem kepada pemilik bangunan</span><br>
                                <span>&#183; Lukisan siap bina</span><br>
                                <span>&#183; Kad pendaftaran aset tak pilih & Laporan daftar aset khusus</span><br>
                                <span>&#183; Pelan kedudukan kunci</span><br>
                                <span>&#183; Sijil Testing & Commisioning</span><br>
                                <span>&#183; Sijil jaminan (jika berkenaan)</span><br>
                                <span>&#183; Sijil siap kerja</span><br>
                                <span>&#183; Sijil siap membaiki kecacatan</span><br>
                                <span>&#183; Completion Compliance Certificate (CCC)</span><br>
                                <span>&#183; Sijil Kerja Awam, Arkitek, Elektrikal & Mekanikal</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>
                        </tr>

                        <!-- Jumlah MarkahFL-->
                        <tr class="pg-6" align="center">
                            <td colspan="6">Jumlah markah FL</td>
                            <td colspan="3">5</td>
                            <td></td>
                            <td>10</td>
                            <td><input type="number" min="0" max="10" id="markahTOTAL_FL_MMV" name="markahTOTAL_FL_MMV"></td>
                            <td>5</td>
                            <td></td>
                            <td>10</td>
                            <td><input type="number" min="0" max="10" id="markahTOTAL_FL_MMV_PUN" name="markahTOTAL_FL_MMV_PUN"></td>
                            <td>19</td>
                            <td><input type="number" min="0" max="19" id="markahTOTAL_FL_MMV_SEDIA" name="markahTOTAL_FL_MMV_SEDIA"></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <thead class="pg-2 text-white" style="background-color:#EB5500">
                            <th>IN</th>
                            <th colspan="30">INOVASI DALAM REKABENTUK</th>
                        </thead>

                        <!--IN1-->
                        <tr class="pg-7" align="center">
                            <td>IN1</td>
                            <td>Reka Bentuk Inovasi</td>
                            <td colspan="6"></td>
                            <td>6</td>
                            <td></td>
                            <td>6</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="6" autocapitalize="off" id="markahIN1_MMV" name="markahIN1_MMV" /></td>
                            <td>6</td>
                            <td></td>
                            <td>6</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="6" autocapitalize="off" id="markahIN1_MMV_PUN" name="markahIN1_MMV_PUN" /></td>
                            <td>6</td>
                            <td><input onblur="findTotalMV_SB()" class="sum_mv_sb" type="number" min="0" max="6" autocapitalize="off" id="markahIN1_MMV_PUN" name="markahIN1_MMV_PUN" /></td>
                            <td>
                                <span>&#183; Lukisan siap bina dan bukti bergambar</span><br>
                                <span>&#183; Laporan prestasi inovasi</span><br>
                            </td>
                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                            <td colspan="4">
                                <form class="form">
                                    <label for="form__input" class="form__label">
                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </label>
                                </form>
                            </td>

                        </tr>

                            <!-- Jumlah MarkahIN-->
                            <tr class="pg-7" align="center">
                                <td colspan="6">Jumlah markah IN</td>
                                <td colspan="3">6</td>
                                <td></td>
                                <td>6</td>
                                <td><input type="number" min="0" max="6" id="markahTOTAL_IN_MMV" name="markahTOTAL_IN_MMV"></td>
                                <td>6</td>
                                <td></td>
                                <td>6</td>
                                <td><input type="number" min="0" max="6" id="markahTOTAL_IN_MMV_PUN" name="markahTOTAL_IN_MMV_PUN"></td>
                                <td>6</td>
                                <td><input type="number" min="0" max="6" id="markahTOTAL_IN_MMV_SEDIA" name="markahTOTAL_IN_MMV_SEDIA"></td>
                                <td></td>
                                <td></td>
                            </tr> 
                                


                        </table>

                        </div>

                        <div align="center" class="mt-3">
                            <button class="btn btn-primary">Simpan</button>
                            <button class="btn btn-primary">Sah</button>
                            <button class="btn btn-primary">Jana Keputusan</button>
                            <button class="btn btn-primary">Jana Sijil</button>
                        </div>
                    </div>

                </div>
                        


        </div>    

        <div class="tab-pane" id="tab-5" role="tabpanel">



            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-responsive scrollbar">
                        <h4 class="text-align:center;">Borang Validasi Permarkahan Bangunan</h4>
        
            
                                <table id="validasiTable" class="table table-bordered line-table display">
                                    <thead class="text-white">
                                        <tr class="pg-1" align="center" style="background-color:#EB5500">
                                            <th rowspan="3">Kod</th>
                                            <th rowspan="3">Kriteria</th>
                                            <th rowspan="3" colspan="6">Kategori bangunan</th>
                                            <th colspan="5">Pembangunan Baru</th>
                                            <th colspan="5">Pemuliharaan/ Ubahsuai/ Naiktaraf (PUN)</th>
                                            <th colspan="3">Sedia Ada</th>
                                            <th rowspan="2">Dokumen Pembuktian</th>
                                            <th rowspan="3" colspan="5">Ulasan/Maklumbalas Verifikasi</th>
                                            <th rowspan="3" colspan="4">Muat Naik Dokumen Sokongan</th>
            
                                        </tr>
                        
                                        <tr class="pg-1" align="center" style="background-color:#EB5500">
                                            <th colspan="5">Markah</th>
                                            <th colspan="5">Markah</th>
                                            <th colspan="3">Markah</th>
            
                                        </tr>
                                    
                                        <tr class="pg-1" align="center" style="background-color:#EB5500">
                                            <th>MM</th>
                                            <th>MR</th>
                                            <th>MMV</th>
                                            <th>MV</th>
                                            <th>ML</th>
                                            <th>MM</th>
                                            <th>MR</th>
                                            <th>MMV</th>
                                            <th>MV</th>
                                            <th>ML</th>
                                            <th>MMV</th>
                                            <th>MV</th>
                                            <th>ML</th>
                                            <th>Verifikasi (Peringkat 3)</th>
                        
                                        </tr>
                        
                                        <tr class="pg-1" style="background-color:#EB5500">
                                            <th>TL</th>
                                            <th colspan="30">PERANCANGAN & PENGURUSAN TAPAK LESTARI</th>
                                        </tr>
                                    </thead>
                        
                                        <!--TL1--><!--BARU SHJ-->
                                        <tr class="pg-1" align="center">
                                            <td>TL1</td>
                                            <td>Perancangan Tapak</td>
                                            <td colspan="6"></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>0</td>
                                            <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="0" autocapitalize="off" id="markahTL1_MMV" name="markahTL1_MMV" required/></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Tidak Berkenaan</td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                            <form class="form"><input  id="formFileSm" type="file">
                                                {{-- <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label> --}}
                                            </form>
                                            </td>
                            
                                        </tr>
                        
                                        <!--TL2-->
                                        <tr class="pg-1" align="center">
                                            <td>TL2</td>
                                            <td>Sistem Pengurusan Alam Sekitar (SPAS)</td>
                                            <td colspan="6"></td>
                                            <td>3</td>
                                            <td></td>
                                            <td>3</td>
                                            <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL2_MMV" name="markahTL2_MMV" required/></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span>&#183; Laporan Pelan Pengurusan Alam Sekitar</span><br>
                                                <span>&#183; Borang SPAS (Peringkat pembinaan)</span>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4"><input  id="formFileSm" type="file">
                                                {{-- <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form> --}}
                                                </td>                        
                                        </tr>
            
                                        <!--TL3-->
                                        <tr class="pg-1" align="center">
                                            <td rowspan="2">TL3</td>
                                            <td>i. Pemotongan dan Penambakan tanah</td>
                                            <td rowspan="2" colspan="6"></td>  
                                            <td>3</td>
                                            <td></td>
                                            <td>3</td>
                                            <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL3_MMV" name="markahTL3_MMV" required/></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span>&#183; Laporan kuantiti tanah yang diimport atau eksport</span><br>
                                                <span>&#183; Bukti bergambar</span><br>
                                                <span>&#183; Pengesahan kuantiti tanah potong/tambak sebenar oleh PD/SO 
                                                    atau setaraf
                                                </span>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4"><input  id="formFileSm" type="file">
                                                {{-- <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form> --}}
                                                </td>                        
                                            </tr>
                        
                                        <tr class="pg-1" align="center">
                                            <td>ii. Mengekalkan Topografi Tanah</td>
                                            <td>2</td>
                                            <td></td>
                                            <td>2</td>
                                            <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="2" autocapitalize="off" id="markahTL32_MMV" name="markahTL32_MMV" required/></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span>&#183; Bukti bergambar</span><br>
                                                <span>&#183; Pengesahan kuantiti tanah potong/tambak sebenar oleh PD/SO atau setaraf</span><br>
                                                <span>&#183; Pengesahan pelaksanaan ESCP di tapak</span>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4"><input  id="formFileSm" type="file">
                                                {{-- <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form> --}}
                                            </td>
                                        </tr>
                        
                                        <!--TL4-->
                                        <tr class="pg-1" align="center">
                                            <td>TL4</td>
                                            <td>Pelan Kawalan Hakisan & Kelodak (ESCP)</td>
                                            <td colspan="6"></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL4_MMV" name="markahTL4_MMV" required/></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span>&#183; Pengesahan pelaksanaan ESCP di tapak</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4"><input  id="formFileSm" type="file">
                                                {{-- <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form> --}}
                                            </td>                        
                                        </tr>
                        
                                        <!--TL5--><!--Baru shj-->
                                        <tr class="pg-1" align="center">
                                            <td>TL5</td>
                                            <td>Pemuliharaan dan Pemeliharaan Cerun</td>
                                            <td colspan="6"></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>0</td>
                                            <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="0" autocapitalize="off" id="markahTL5_MMV" name="markahTL5_MMV" required/></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span>Tidak Berkenaan</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4"><input  id="formFileSm" type="file">
                                                {{-- <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form> --}}
                                                </td>                        
                                        </tr>
            
                                        <!--TL6-->
                                        <tr class="pg-1" align="center">
                                            <td>TL6</td>
                                            <td>Pengurusan Air Larian Hujan</td>
                                            <td colspan="6"></td>
                                            <td>3</td>
                                            <td></td>
                                            <td>3</td>
                                            <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL6_MMV" name="markahTL6_MMV" required/></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span> &#40;a&#41; Baru</span><br>
                                                <span>&#183; Laporan sistem perparitan</span><br>
                                                <span>&#183; Bukti bergambar</span><br>
                                                <span> &#40;b&#41; Sedia ada</span><br>
                                                <span>&#183; Laporan penyenggaraan sistem perparitan berkala</span><br>
                                                <span>&#183; Bukti bergambar</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4"><input  id="formFileSm" type="file">
                                                {{-- <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form> --}}
                                            </td>
                                        </tr>
            
                                        <!--TL8--><!--NO INPUT-->
                                        <tr class="pg-1" align="center">
                                            <td>TL8</td>
                                            <td>Landskap strategik</td>
                                            <td colspan="6"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td colspan="5"></td>
                                            <td colspan="4"></td>
                                        </tr>
                        
                                        <!--TL8.1-->
                                        <tr class="pg-1" align="center">
                                            <td>TL8.1</td>
                                            <td>Memelihara dan menyenggara pokok yang matang</td>
                                            <td colspan="6"></td>
                                            <td>3</td>
                                            <td></td>
                                            <td>3</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL81_MMV" name="markahTL81_MMV" required/></td>
                                            <td>
                                                <span> &#40;a&#41; Lukisan siap bina landskap</span><br>
                                                <span>&#183; Bukti bergambar pokok tidak ditebang dan disenggara dengan baik</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4"><input  id="formFileSm" type="file">
                                                {{-- <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form> --}}
                                            </td>
                                        </tr>
                        
                                        <!--TL8.2-->
                                        <tr class="pg-1" align="center">
                                            <td>TL8.2</td>
                                            <td>Menyediakan kawasan hijau</td>
                                            <td colspan="6"></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL82_MMV" name="markahTL82_MMV" required/></td>
                                            <td>
                                                <span> &#40;a&#41; Pelan tapak siap bina yang telah disahkan oleh Arkitek Bertauliah</span><br>
                                                Nyatakan sekiranya ada perubahan
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4"><input  id="formFileSm" type="file">
                                                {{-- <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form> --}}
                                            </td>
                                        </tr>
            
                                        <!--TL8.3-->
                                        <tr class="pg-1" align="center">
                                            <td>TL8.3</td>
                                            <td>Menyedia dan menyenggara penanaman pokok teduhan</td>
                                            <td colspan="6"></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL83_MMV" name="markahTL83_MMV" required/></td>
                                            <td>
                                                <span> &#183; Pelan landskap siap bina</span><br>
                                                <span> &#183; Inventori pokok</span><br>
                                                <span> &#183; Bukti bergambar</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4"><input  id="formFileSm" type="file">
                                                {{-- <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form> --}}
                                            </td>
                                        </tr>
            
                                        <!--TL8.4-->
                                        <tr class="pg-1" align="center">
                                            <td>TL8.4</td>
                                            <td>Pemilihan bahan binaan siarkaki (walkway) yang mempunyai daya pantulan
                                                haba yang tinggi
                                            </td>
                                            <td colspan="6"></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL84_MMV" name="markahTL84_MMV" required/></td>
                                            <td>
                                                <span> &#183; Bukti bergambar</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4"><input  id="formFileSm" type="file">
                                                {{-- <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form> --}}
                                            </td>
                                        </tr>
            
                                        <!--TL8.5-->
                                        <tr class="pg-1" align="center">
                                            <td>TL8.5</td>
                                            <td>Menyedia dan menyenggara sistem turapan berumput</td>
                                            <td colspan="6"></td>
                                            <td>2</td>
                                            <td></td>
                                            <td>2</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="2" autocapitalize="off" id="markahTL85_MMV" name="markahTL85_MMV" required/></td>
                                            <td>
                                                <span> &#183; Lukisan siap bina</span><br>
                                                <span> &#183; Bukti bergambar</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                {{-- <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form> --}}
                                            </td>
                                        </tr>
            
                                        <!--TL9--><!--NO INPUT-->
                                        <tr class="pg-1" align="center">
                                            <td>TL9</td>
                                            <td>Bumbung Hijau & Dinding Hijau</td>
                                            <td colspan="6"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td colspan="5"></td>
                                            <td colspan="4"></td>
                                        </tr>
            
                                        <!--TL9.1-->
                                        <tr class="pg-1" align="center">
                                            <td>TL9.1</td>
                                            <td>Indeks Pantulan Suria (SRI) mengikut jenis & kecerunan bumbung
                                            </td>
                                            <td colspan="6"></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL91_MMV" name="markahTL91_MMV" required/></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span>&#183; Method statement yang telah disahkan oleh
                                                    pegawai penguasa (SO)</span><br>
                                                <span>&#183; Bukti bergambar</span><br>
                                                <span>&#183; Lukisan siap bina</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4"><input  id="formFileSm" type="file">
                                                {{-- <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form> --}}
                                            </td>
                                        </tr>
            
                                        <!--TL9.2-->
                                        <tr class="pg-1" align="center">
                                            <td>TL9.2</td>
                                            <td>Menggalakkan rekabentuk bumbung/dinding hijau</td>
                                            <td colspan="6"></td>
                                            <td>3</td>
                                            <td></td>
                                            <td>3</td>
                                            <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL92_MMV" name="markahTL92_MMV" required/></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span>&#183; Bukti bergambar</span><br>
                                                <span>&#183; Lukisan siap bina</span><br>
                                                <span>&#183; Rekod Senggaraan</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4"><input  id="formFileSm" type="file">
                                                {{-- <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form> --}}
                                                
                                            </td>
                        
                                        </tr>
            
                                        <!--JUMLAH MARKAHTL-->
                                        <tr class="pg-1" align="center">
                                            <td colspan="6">Jumlah markah TL</td>
                                            <td colspan="3">26</td>
                                            <td></td>
                                            <td>24</td>
                                            <td><input id="totalMMV_TL" type="number" min="0" max="24" id="markahTOTAL_TL_MMV" name="markahTOTAL_TL_MMV"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td colspan="9"></td>
                                        </tr> 
            
                                        <thead class="pg-2 text-white" style="background-color:#EB5500">
                                            <th>KT</th>
                                            <th colspan="30">PENGURUSAN KECEKAPAN TENAGA DAN PENGGUNAAN TENAGA BOLEH BAHARU</th>
                                        </thead>
            
                                        <!--KT1-->
                                        <tr class="pg-2" align="center">
                                            <td>KT1</td>
                                            <td>Rekabentuk bumbung</td>
                                            <td colspan="6"></td>
                                            <td>2</td>
                                            <td></td>
                                            <td>2</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahKT1_MMV" name="markahKT1_MMV" /></td>
                                            <td>2</td>
                                            <td></td>
                                            <td>2</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahKT1_MMV_PUN" name="markahKT1_MMV_PUN" /></td>
                                            <td>2</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahKT1_MMV_SEDIA" name="markahKT1_MMV_SEDIA" /></td>
                                            <td>
                                                <span>&#183; Katalog bahan dan sampel yang diluluskan</span><br>
                                                <span>&#183; Lukisan siap bina</span><br>
                                                <span>&#183; Bukti bergambar</span>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT2--><!--NO INPUT-->
                                        <tr class="pg-2" align="center">
                                            <td>KT2</td>
                                            <td>Orientasi bangunan</td>
                                            <td colspan="6"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td colspan="5"></td>
                                            <td colspan="4"></td>
            
                                        </tr>
            
                                        <!--KT2.1-->
                                        <tr class="pg-2" align="center">
                                            <td>KT2.1</td>
                                            <td>Fasad Utama bangunan yang menghadap orientasi utara-selatan</td>
                                            <td colspan="6"></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT21_MMV" name="markahKT21_MMV" /></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT21_MMV_PUN" name="markahKT21_MMV_PUN" /></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT21_MMV_SEDIA" name="markahKT21_MMV_SEDIA" /></td>
                                            <td>
                                                <span>&#183; Lukisan siap bina</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT2.2-->
                                        <tr class="pg-2" align="center">
                                            <td>KT2.2</td>
                                            <td>Meminimumkan bukaan pada fasad yang menghadap timur dan barat</td>
                                            <td colspan="6"></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT22_MMV" name="markahKT22_MMV" /></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT22_MMV_PUN" name="markahKT22_MMV_PUN" /></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT22_MMV_SEDIA" name="markahKT22_MMV_SEDIA" /></td>
                                            <td>
                                                <span> &#183; Lukisan siap bina</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT3--><!--NO INPUT-->
                                        <tr class="pg-2" align="center">
                                            <td>KT3</td>
                                            <td>Rekabentuk fasad</td>
                                            <td colspan="6"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td colspan="5"></td>
                                            <td colspan="4"></td>
                                        </tr>
            
                                        <!--KT3.1--><!--Baru | PUN-->
                                        <tr class="pg-2" align="center">
                                            <td>KT3.1</td>
                                            <td>Dinding luar bangunan</td>
                                            <td colspan="6"></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT31_MMV" name="markahKT31_MMV" /></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT31_MMV_PUN" name="markahKT31_MMV_PUN" /></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span>&#183; Katalog bahan yang diluluskan untuk pembinaan</span><br>
                                                <span>&#183; Pengiraan U-Value yang disahkan</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT3.2-->
                                        <tr class="pg-2" align="center">
                                            <td>KT3.2</td>
                                            <td>Pengadang Suria Luaran</td>
                                            <td colspan="6"></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT32_MMV" name="markahKT32_MMV" /></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT32_MMV_PUN" name="markahKT32_MMV_PUN" /></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT32_MMV_SEDIA" name="markahKT32_MMV_SEDIA" /></td>
                                            <td>
                                                <span>&#183; Bukti bergambar</span><br>
                                                <span>&#183; Lukisan siap bina</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT4-->
                                        <tr class="pg-2" align="center">
                                            <td>KT4</td>
                                            <td>OTTV & RTTV</td>
                                            <td colspan="6"></td>
                                            <td>5</td>
                                            <td></td>
                                            <td>5</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT4_MMV" name="markahKT4_MMV" /></td>
                                            <td>5</td>
                                            <td></td>
                                            <td>5</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT4_MMV_PUN" name="markahKT4_MMV_PUN" /></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span>&#183; Pengiraan OTTV dan RTTV yang disahkan</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT5--><!--NO INPUT-->
                                        <tr class="pg-2" align="center">
                                            <td>KT5</td>
                                            <td>Kecekapan pencahayaan</td>
                                            <td colspan="6"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td colspan="5"></td>
                                            <td colspan="4"></td>
                                        </tr>
            
                                        <!--KT5.1-->
                                        <tr class="pg-2" align="center">
                                            <td>KT5.1</td>
                                            <td>Zon Pencahayaan</td>
                                            <td colspan="6"></td>
                                            <td>3</td>
                                            <td></td>
                                            <td>3</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT51_MMV" name="markahKT51_MMV" /></td>
                                            <td>3</td>
                                            <td></td>
                                            <td>3</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT51_MMV_PUN" name="markahKT51_MMV_PUN" /></td>
                                            <td>3</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT51_MMV_SEDIA" name="markahKT51_MMV_SEDIA" /></td>
                                            {{-- <td>
                                                <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                                <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                            </td> --}}
                                            <td>
                                                <span> &#183; Lukisan siap bina litar lampu yang telah di zon dan lokasi pemasangan sensor</span><br>
                                                <span> &#183; Bukti bergambar</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT5.2-->
                                        <tr class="pg-2" align="center">
                                            <td>KT5.2</td>
                                            <td>Kawalan Pencahayaan</td>
                                            <td colspan="6"></td>
                                            <td>6</td>
                                            <td></td>
                                            <td>6</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT52_MMV" name="markahKT52_MMV" /></td>
                                            <td>6</td>
                                            <td></td>
                                            <td>6</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT52_MMV_PUN" name="markahKT52_MMV_PUN" /></td>
                                            <td>6</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT52_MMV_SEDIA" name="markahKT52_MMV_SEDIA" /></td>
                                            {{-- <td>
                                                <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                                <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                            </td> --}}
                                            <td>
                                                <span> &#183; Lukisan siap bina yang menunjukkan lokasi suis</span><br>
                                                <span> &#183; Bukti bergambar</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT5.3-->
                                        <tr class="pg-2" align="center">
                                            <td>KT5.3</td>
                                            <td>Lighting Power Density (LPD)</td>
                                            <td colspan="6"></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT53_MMV" name="markahKT53_MMV" /></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT53_MMV_PUN" name="markahKT53_MMV_PUN" /></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT53_MMV_SEDIA" name="markahKT53_MMV_SEDIA" /></td>
                                            {{-- <td>
                                                <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                                <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                            </td> --}}
                                            <td>
                                                <span> &#183; Laporan pengambilan data mengikut spesifikasi</span><br>
                                                <span> &#183; Lukisan siap bina</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
                                        
                                        <!--KT6--><!--No input-->
                                        <tr class="pg-2" align="center">
                                            <td>KT6</td>
                                            <td>Sistem penyaman udara dan pengudaraan mekanikal (ACMV)</td>
                                            <td colspan="6"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                {{-- <span> &#183; Lukisan siap bina yang menunjukkan lokasi suis</span><br>
                                                <span> &#183; Bukti bergambar</span><br> --}}
                                            </td>
                                            <td colspan="5"></td>
                                            <td colspan="4">
                                                {{-- <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form> --}}
                                            </td>
                                        </tr>
            
                                        <!--KT6.1-->
                                        <tr class="pg-2" align="center">
                                            <td>KT6.1</td>
                                            <td>Coefficient of Performance (COP)</td>
                                            <td colspan="6"></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT61_MMV" name="markahKT61_MMV" /></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT61_MMV_PUN" name="markahKT61_MMV_PUN" /></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT61_MMV_SEDIA" name="markahKT61_MMV_SEDIA" /></td>
                                            {{-- <td>
                                                <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                                <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                            </td> --}}
                                            <td>
                                                <span> &#183; Laporan pengukuran dan verifikasi</span><br>
                                                <span> &#183; Pengiraan COP</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT6.2-->
                                        <tr class="pg-2" align="center">
                                            <td>KT6.2</td>
                                            <td>Green Refrigerant</td>
                                            <td colspan="6"></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT62_MMV" name="markahKT62_MMV" /></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT62_MMV_PUN" name="markahKT62_MMV_PUN" /></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT62_MMV_SEDIA" name="markahKT62_MMV_SEDIA" /></td>
                                            {{-- <td>
                                                <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                                <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                            </td> --}}
                                            <td>
                                                <span> &#183; Rekod penyenggaraan peralatan</span><br>
                                                <span> &#183; Brosur pembekal</span><br>
                                                <span> &#183; Rekod inventori</span>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT7-->
                                        <tr class="pg-2" align="center">
                                            <td>KT7</td>
                                            <td>Penyusupan udara</td>
                                            <td colspan="6"></td>
                                            <td>3</td>
                                            <td></td>
                                            <td>3</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT7_MMV" name="markahKT7_MMV" /></td>
                                            <td>3</td>
                                            <td></td>
                                            <td>3</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT7_MMV_PUN" name="markahKT7_MMV_PUN" /></td>
                                            <td>3</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT7_MMV_SEDIA" name="markahKT7_MMV_SEDIA" /></td>
                                            <td>
                                                <span> &#183; Lukisan butiran</span><br>
                                                <span> &#183; Lukisan siap bina</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT8-->
                                        <tr class="pg-2" align="center">
                                            <td>KT8</td>
                                            <td>Tenaga Boleh Baharu (TBB)</td>
                                            <td colspan="6"></td>
                                            <td>6</td>
                                            <td></td>
                                            <td>6</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT8_MMV" name="markahKT8_MMV" /></td>
                                            <td>6</td>
                                            <td></td>
                                            <td>6</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT8_MMV_PUN" name="markahKT8_MMV_PUN" /></td>
                                            <td>6</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT8_MMV_SEDIA" name="markahKT8_MMV_SEDIA" /></td>
                                            {{-- <td colspan="2">
                                                <span>&#183; Mengemukakan lukisan rekabentuk sistem dan simulasi pengiraan
                                                    bagi anggaran tenaga baharu yang boleh dihasilkan oleh sistem tersebut</span><br>
                                            </td> --}}
                                            <td>
                                                <span> &#183; Salinan lukisan siap bina dan laporan uji terima yang mematuhi kehendak rekabentuk</span><br>
                                                <span> &#183; Pengiraan penjanaan tenaga boleh baharu berbanding jumlah penggunaan tenaga tahunan bangunan</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT9-->
                                        <tr class="pg-2" align="center">
                                            <td>KT9</td>
                                            <td>Prestasi Penggunaan Tenaga</td>
                                            <td colspan="6"></td>
                                            <td>10</td>
                                            <td></td>
                                            <td>10</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="10" autocapitalize="off" id="markahKT9_MMV" name="markahKT9_MMV" /></td>
                                            <td>10</td>
                                            <td></td>
                                            <td>10</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="10" autocapitalize="off" id="markahKT9_MMV_PUN" name="markahKT9_MMV_PUN" /></td>
                                            <td>10</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="10" autocapitalize="off" id="markahKT9_MMV_SEDIA" name="markahKT9_MMV_SEDIA" /></td>
                                            {{-- <td>
                                                <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                                <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                            </td> --}}
                                            <td>
                                                <span> &#183; Pengiraan semula berdasarkan bacaan meter</span><br>
                                                <span> &#183; Bil elektrik 12 bulan (jika berkaitan)</span><br>
                                                <span> &#183; Lukisan siap bina yang berkaitan</span>
                                                <span> &#183; Pengiraan peratus pengurangan</span>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT10--><!--No input-->
                                        <tr class="pg-2" align="center">
                                            <td>KT10</td>
                                            <td>Paparan dan kawalan</td>
                                            <td colspan="6"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                {{-- <span> &#183; Lukisan siap bina yang menunjukkan lokasi suis</span><br>
                                                <span> &#183; Bukti bergambar</span><br> --}}
                                            </td>
                                            <td colspan="5"></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT10.1-->
                                        <tr class="pg-2" align="center">
                                            <td>KT10.1</td>
                                            <td>Pemasangan sub-meter digital</td>
                                            <td colspan="6"></td>
                                            <td>6</td>
                                            <td></td>
                                            <td>6</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT101_MMV" name="markahKT101_MMV" /></td>
                                            <td>5</td>
                                            <td></td>
                                            <td>5</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT101_MMV_PUN" name="markahKT101_MMV_PUN" /></td>
                                            <td>5</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT101_MMV_SEDIA" name="markahKT101_MMV_SEDIA" /></td>
                                            {{-- <td>
                                                <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                                <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                            </td> --}}
                                            <td>
                                                <span> &#183; Lukisan siap bina yang menunjukkan lokasi suis</span><br>
                                                <span> &#183; Bukti bergambar</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT10.2-->
                                        <tr class="pg-2" align="center">
                                            <td>KT10.2</td>
                                            <td>Sistem Pengurusan Kawalan Tenaga</td>
                                            <td colspan="6"></td>
                                            <td>5</td>
                                            <td></td>
                                            <td>5</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT102_MMV" name="markahKT102_MMV" /></td>
                                            <td>5</td>
                                            <td></td>
                                            <td>5</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT102_MMV_PUN" name="markahKT102_MMV_PUN" /></td>
                                            <td>5</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT102_MMV_SEDIA" name="markahKT102_MMV_SEDIA" /></td>
                                            <td>
                                                <span> a &#41; Baru</span><br>
                                                <span> &#183; Lukisan siap bina</span><br>
                                                <span> &#183; Gambar rajah litar</span><br>
                                                <span> &#183; Rekod Pengujian dan Pentauliahan</span><br>
                                                <span> &#183; Sijil pengiktirafan MS ISO 50001</span><br>
                                                <span> b &#41; Sedia ada</span><br>
                                                <span> &#183; Lukisan siap bina</span><br>
                                                <span> &#183; Gambar rajah litar</span><br>
                                                <span> &#183; Laporan BEMS</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT10.3-->
                                        <tr class="pg-2" align="center">
                                            <td>KT10.3</td>
                                            <td>Verifikasi sistem paparan dan kawalan</td>
                                            <td colspan="6"></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT103_MMV" name="markahKT103_MMV" /></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT103_MMV_PUN" name="markahKT103_MMV_PUN" /></td>
                                            <td>1</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT103_MMV_SEDIA" name="markahKT103_MMV_SEDIA" /></td>
                                            {{-- <td>
                                                <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                                <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                            </td> --}}
                                            <td>
                                                <span> &#183; Senarai penggunaan tenaga berdasarkan bil elektrik bulanan</span><br>
                                                <span> &#183; Laporan verifikasi dan pelan penambahbaikan</span><br>
                                                <span> &#183; Manual Operasi dan Penyenggaraan</span>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--KT11-->
                                        <tr class="pg-2" align="center">
                                            <td>KT11</td>
                                            <td>Pengujian dan pentauliahan</td>
                                            <td colspan="6"></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>3</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT11_MMV" name="markahKT11_MMV" /></td>
                                            <td>1</td>
                                            <td></td>
                                            <td>3</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT11_MMV_PUN" name="markahKT11_MMV_PUN" /></td>
                                            <td>3</td>
                                            <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT11_MMV_SEDIA" name="markahKT11_MMV_SEDIA" /></td>
                                            {{-- <td colspan="2">
                                                <span>&#183; Pelan pengujian dan pentauliahan</span><br>
                                            </td> --}}
                                            <td>
                                                <span>&#183; Dokumen lengkap pengujian dan pentauliahan yang telah disahkan</span><br>
                                            </td>
                                            <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                            <td colspan="4">
                                                <form class="form">
                                                    <label for="form__input" class="form__label">
                                                        <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                        <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                        <span id="custom-text">No file chosen, yet.</span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
            
                                        <!--JUMLAH MARKAHKT-->
                                        <tr class="pg-2" align="center">
                                            <td colspan="6">Jumlah markah KT</td>
                                            <td colspan="3">55</td>
                                            <td></td>
                                            <td>57</td>
                                            <td><input type="number" min="0" max="57" id="markahTOTAL_TL_MMV" name="markahTOTAL_TL_MMV"></td>
                                            <td>54</td>
                                            <td></td>
                                            <td>56</td>
                                            {{-- <td colspan="2"></td> --}}
                                            <td><input type="number" min="0" max="56" id="markahTOTAL_TL_MMV_PUN"></td>
                                            <td>48</td>
                                            <td><input type="number" min="0" max="48" id="markahTOTAL_TL_MMV_SEDIA" name="markahTOTAL_TL_MMV_SEDIA"></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                </table>
                    </div>
            
                    <div align="center" class="mt-3">
                        <button class="btn btn-primary">Simpan</button>
                        <button class="btn btn-primary">Sah</button>
                        <button class="btn btn-primary">Jana Keputusan</button>
                        <button class="btn btn-primary">Jana Sijil</button>
                    </div>
                </div>
            </div>
                        

        </div>        

        <div class="tab-pane" id="tab-6" role="tabpanel">



                <!----Borang Validasi (Rayuan)----->
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="table-responsive scrollbar">
                            <h4 class="text-align:center;">Borang Rayuan Validasi Permarkahan Bangunan</h4>

                            <!--------------------------------------- MarkahTL ---------------------------------------->

                            <table id="example" class="table table-bordered line-table display">
                                <thead class="text-white">
                                    <tr class="pg-1" align="center" style="background-color:#EB5500">
                                        <th rowspan="3">Kod</th>
                                        <th rowspan="3">Kriteria</th>
                                        <th rowspan="3" colspan="6">Kategori bangunan</th>
                                        <th colspan="5">Pembangunan Baru</th>
                                        <th colspan="5">Pemuliharaan/ Ubahsuai/ Naiktaraf (PUN)</th>
                                        <th colspan="3">Sedia Ada</th>
                                        <th rowspan="2">Dokumen Pembuktian</th>
                                        <th rowspan="3" colspan="5">Ulasan/Maklumbalas Verifikasi</th>
                                        <th rowspan="3" colspan="4">Muat Naik Dokumen Sokongan</th>

                                    </tr>
                    
                                    <tr class="pg-1" align="center" style="background-color:#EB5500">
                                        <th colspan="5">Markah</th>
                                        <th colspan="5">Markah</th>
                                        <th colspan="3">Markah</th>

                                    </tr>
                                
                                    <tr class="pg-1" align="center" style="background-color:#EB5500">
                                        <th>MM</th>
                                        <th>MR</th>
                                        <th>MMV</th>
                                        <th>MV</th>
                                        <th>ML</th>
                                        <th>MM</th>
                                        <th>MR</th>
                                        <th>MMV</th>
                                        <th>MV</th>
                                        <th>ML</th>
                                        <th>MMV</th>
                                        <th>MV</th>
                                        <th>ML</th>
                                        <th>Verifikasi (Peringkat 3)</th>
                    
                                    </tr>
                    
                                    <tr class="pg-1" style="background-color:#EB5500">
                                        <th>TL</th>
                                        <th colspan="30">PERANCANGAN & PENGURUSAN TAPAK LESTARI</th>
                                    </tr>
                                </thead>
                    
                                    <!--TL1--><!--BARU SHJ-->
                                    <tr class="pg-1" align="center">
                                        <td>TL1</td>
                                        <td>Perancangan Tapak</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>0</td>
                                        <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="0" autocapitalize="off" id="markahTL1_MMV" name="markahTL1_MMV" required/></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Tidak Berkenaan</td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                        <form class="form"><input  id="formFileSm" type="file">
                                            {{-- <label for="form__input" class="form__label">
                                                <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                <span id="custom-text">No file chosen, yet.</span>
                                            </label> --}}
                                        </form>
                                        </td>
                        
                                    </tr>
                    
                                    <!--TL2-->
                                    <tr class="pg-1" align="center">
                                        <td>TL2</td>
                                        <td>Sistem Pengurusan Alam Sekitar (SPAS)</td>
                                        <td colspan="6"></td>
                                        <td>3</td>
                                        <td></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL2_MMV" name="markahTL2_MMV" required/></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span>&#183; Laporan Pelan Pengurusan Alam Sekitar</span><br>
                                            <span>&#183; Borang SPAS (Peringkat pembinaan)</span>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                            </td>                        
                                    </tr>

                                    <!--TL3-->
                                    <tr class="pg-1" align="center">
                                        <td rowspan="2">TL3</td>
                                        <td>i. Pemotongan dan Penambakan tanah</td>
                                        <td rowspan="2" colspan="6"></td>  
                                        <td>3</td>
                                        <td></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL3_MMV" name="markahTL3_MMV" required/></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span>&#183; Laporan kuantiti tanah yang diimport atau eksport</span><br>
                                            <span>&#183; Bukti bergambar</span><br>
                                            <span>&#183; Pengesahan kuantiti tanah potong/tambak sebenar oleh PD/SO 
                                                atau setaraf
                                            </span>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                            </td>                        
                                        </tr>
                    
                                    <tr class="pg-1" align="center">
                                        <td>ii. Mengekalkan Topografi Tanah</td>
                                        <td>2</td>
                                        <td></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="2" autocapitalize="off" id="markahTL32_MMV" name="markahTL32_MMV" required/></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span>&#183; Bukti bergambar</span><br>
                                            <span>&#183; Pengesahan kuantiti tanah potong/tambak sebenar oleh PD/SO atau setaraf</span><br>
                                            <span>&#183; Pengesahan pelaksanaan ESCP di tapak</span>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>
                                    </tr>
                    
                                    <!--TL4-->
                                    <tr class="pg-1" align="center">
                                        <td>TL4</td>
                                        <td>Pelan Kawalan Hakisan & Kelodak (ESCP)</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL4_MMV" name="markahTL4_MMV" required/></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span>&#183; Pengesahan pelaksanaan ESCP di tapak</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>                        
                                    </tr>
                    
                                    <!--TL5--><!--Baru shj-->
                                    <tr class="pg-1" align="center">
                                        <td>TL5</td>
                                        <td>Pemuliharaan dan Pemeliharaan Cerun</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>0</td>
                                        <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="0" autocapitalize="off" id="markahTL5_MMV" name="markahTL5_MMV" required/></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span>Tidak Berkenaan</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                            </td>                        
                                    </tr>

                                    <!--TL6-->
                                    <tr class="pg-1" align="center">
                                        <td>TL6</td>
                                        <td>Pengurusan Air Larian Hujan</td>
                                        <td colspan="6"></td>
                                        <td>3</td>
                                        <td></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL6_MMV" name="markahTL6_MMV" required/></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span> &#40;a&#41; Baru</span><br>
                                            <span>&#183; Laporan sistem perparitan</span><br>
                                            <span>&#183; Bukti bergambar</span><br>
                                            <span> &#40;b&#41; Sedia ada</span><br>
                                            <span>&#183; Laporan penyenggaraan sistem perparitan berkala</span><br>
                                            <span>&#183; Bukti bergambar</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>
                                    </tr>

                                    <!--TL8--><!--NO INPUT-->
                                    <tr class="pg-1" align="center">
                                        <td>TL8</td>
                                        <td>Landskap strategik</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="5"></td>
                                        <td colspan="4"></td>
                                    </tr>
                    
                                    <!--TL8.1-->
                                    <tr class="pg-1" align="center">
                                        <td>TL8.1</td>
                                        <td>Memelihara dan menyenggara pokok yang matang</td>
                                        <td colspan="6"></td>
                                        <td>3</td>
                                        <td></td>
                                        <td>3</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL81_MMV" name="markahTL81_MMV" required/></td>
                                        <td>
                                            <span> &#40;a&#41; Lukisan siap bina landskap</span><br>
                                            <span>&#183; Bukti bergambar pokok tidak ditebang dan disenggara dengan baik</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>
                                    </tr>
                    
                                    <!--TL8.2-->
                                    <tr class="pg-1" align="center">
                                        <td>TL8.2</td>
                                        <td>Menyediakan kawasan hijau</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL82_MMV" name="markahTL82_MMV" required/></td>
                                        <td>
                                            <span> &#40;a&#41; Pelan tapak siap bina yang telah disahkan oleh Arkitek Bertauliah</span><br>
                                            Nyatakan sekiranya ada perubahan
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>
                                    </tr>

                                    <!--TL8.3-->
                                    <tr class="pg-1" align="center">
                                        <td>TL8.3</td>
                                        <td>Menyedia dan menyenggara penanaman pokok teduhan</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL83_MMV" name="markahTL83_MMV" required/></td>
                                        <td>
                                            <span> &#183; Pelan landskap siap bina</span><br>
                                            <span> &#183; Inventori pokok</span><br>
                                            <span> &#183; Bukti bergambar</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>
                                    </tr>

                                    <!--TL8.4-->
                                    <tr class="pg-1" align="center">
                                        <td>TL8.4</td>
                                        <td>Pemilihan bahan binaan siarkaki (walkway) yang mempunyai daya pantulan
                                            haba yang tinggi
                                        </td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL84_MMV" name="markahTL84_MMV" required/></td>
                                        <td>
                                            <span> &#183; Bukti bergambar</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>
                                    </tr>

                                    <!--TL8.5-->
                                    <tr class="pg-1" align="center">
                                        <td>TL8.5</td>
                                        <td>Menyedia dan menyenggara sistem turapan berumput</td>
                                        <td colspan="6"></td>
                                        <td>2</td>
                                        <td></td>
                                        <td>2</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="2" autocapitalize="off" id="markahTL85_MMV" name="markahTL85_MMV" required/></td>
                                        <td>
                                            <span> &#183; Lukisan siap bina</span><br>
                                            <span> &#183; Bukti bergambar</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>
                                    </tr>

                                    <!--TL9--><!--NO INPUT-->
                                    <tr class="pg-1" align="center">
                                        <td>TL9</td>
                                        <td>Bumbung Hijau & Dinding Hijau</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="5"></td>
                                        <td colspan="4"></td>
                                    </tr>

                                    <!--TL9.1-->
                                    <tr class="pg-1" align="center">
                                        <td>TL9.1</td>
                                        <td>Indeks Pantulan Suria (SRI) mengikut jenis & kecerunan bumbung
                                        </td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="1" autocapitalize="off" id="markahTL91_MMV" name="markahTL91_MMV" required/></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span>&#183; Method statement yang telah disahkan oleh
                                                pegawai penguasa (SO)</span><br>
                                            <span>&#183; Bukti bergambar</span><br>
                                            <span>&#183; Lukisan siap bina</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>
                                    </tr>

                                    <!--TL9.2-->
                                    <tr class="pg-1" align="center">
                                        <td>TL9.2</td>
                                        <td>Menggalakkan rekabentuk bumbung/dinding hijau</td>
                                        <td colspan="6"></td>
                                        <td>3</td>
                                        <td></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMMV_TL()" class="MMV_TL" type="number" min="0" max="3" autocapitalize="off" id="markahTL92_MMV" name="markahTL92_MMV" required/></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span>&#183; Bukti bergambar</span><br>
                                            <span>&#183; Lukisan siap bina</span><br>
                                            <span>&#183; Rekod Senggaraan</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4"><input  id="formFileSm" type="file">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                            
                                        </td>
                    
                                    </tr>

                                    <!--JUMLAH MARKAHTL-->
                                    <tr class="pg-1" align="center">
                                        <td colspan="6">Jumlah markah TL</td>
                                        <td colspan="3">26</td>
                                        <td></td>
                                        <td>24</td>
                                        <td><input id="totalMMV_TL" type="number" min="0" max="24" id="markahTOTAL_TL_MMV" name="markahTOTAL_TL_MMV"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="9"></td>
                                    </tr> 

                                    <thead class="pg-2 text-white" style="background-color:#EB5500">
                                        <th>KT</th>
                                        <th colspan="30">PENGURUSAN KECEKAPAN TENAGA DAN PENGGUNAAN TENAGA BOLEH BAHARU</th>
                                    </thead>

                                    <!--KT1-->
                                    <tr class="pg-2" align="center">
                                        <td>KT1</td>
                                        <td>Rekabentuk bumbung</td>
                                        <td colspan="6"></td>
                                        <td>2</td>
                                        <td></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahKT1_MMV" name="markahKT1_MMV" /></td>
                                        <td>2</td>
                                        <td></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahKT1_MMV_PUN" name="markahKT1_MMV_PUN" /></td>
                                        <td>2</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="2" autocapitalize="off" id="markahKT1_MMV_SEDIA" name="markahKT1_MMV_SEDIA" /></td>
                                        <td>
                                            <span>&#183; Katalog bahan dan sampel yang diluluskan</span><br>
                                            <span>&#183; Lukisan siap bina</span><br>
                                            <span>&#183; Bukti bergambar</span>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT2--><!--NO INPUT-->
                                    <tr class="pg-2" align="center">
                                        <td>KT2</td>
                                        <td>Orientasi bangunan</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="5"></td>
                                        <td colspan="4"></td>

                                    </tr>

                                    <!--KT2.1-->
                                    <tr class="pg-2" align="center">
                                        <td>KT2.1</td>
                                        <td>Fasad Utama bangunan yang menghadap orientasi utara-selatan</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT21_MMV" name="markahKT21_MMV" /></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT21_MMV_PUN" name="markahKT21_MMV_PUN" /></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT21_MMV_SEDIA" name="markahKT21_MMV_SEDIA" /></td>
                                        <td>
                                            <span>&#183; Lukisan siap bina</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT2.2-->
                                    <tr class="pg-2" align="center">
                                        <td>KT2.2</td>
                                        <td>Meminimumkan bukaan pada fasad yang menghadap timur dan barat</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT22_MMV" name="markahKT22_MMV" /></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT22_MMV_PUN" name="markahKT22_MMV_PUN" /></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT22_MMV_SEDIA" name="markahKT22_MMV_SEDIA" /></td>
                                        <td>
                                            <span> &#183; Lukisan siap bina</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT3--><!--NO INPUT-->
                                    <tr class="pg-2" align="center">
                                        <td>KT3</td>
                                        <td>Rekabentuk fasad</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="5"></td>
                                        <td colspan="4"></td>
                                    </tr>

                                    <!--KT3.1--><!--Baru | PUN-->
                                    <tr class="pg-2" align="center">
                                        <td>KT3.1</td>
                                        <td>Dinding luar bangunan</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT31_MMV" name="markahKT31_MMV" /></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT31_MMV_PUN" name="markahKT31_MMV_PUN" /></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span>&#183; Katalog bahan yang diluluskan untuk pembinaan</span><br>
                                            <span>&#183; Pengiraan U-Value yang disahkan</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT3.2-->
                                    <tr class="pg-2" align="center">
                                        <td>KT3.2</td>
                                        <td>Pengadang Suria Luaran</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT32_MMV" name="markahKT32_MMV" /></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT32_MMV_PUN" name="markahKT32_MMV_PUN" /></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT32_MMV_SEDIA" name="markahKT32_MMV_SEDIA" /></td>
                                        <td>
                                            <span>&#183; Bukti bergambar</span><br>
                                            <span>&#183; Lukisan siap bina</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT4-->
                                    <tr class="pg-2" align="center">
                                        <td>KT4</td>
                                        <td>OTTV & RTTV</td>
                                        <td colspan="6"></td>
                                        <td>5</td>
                                        <td></td>
                                        <td>5</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT4_MMV" name="markahKT4_MMV" /></td>
                                        <td>5</td>
                                        <td></td>
                                        <td>5</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT4_MMV_PUN" name="markahKT4_MMV_PUN" /></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <span>&#183; Pengiraan OTTV dan RTTV yang disahkan</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT5--><!--NO INPUT-->
                                    <tr class="pg-2" align="center">
                                        <td>KT5</td>
                                        <td>Kecekapan pencahayaan</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="5"></td>
                                        <td colspan="4"></td>
                                    </tr>

                                    <!--KT5.1-->
                                    <tr class="pg-2" align="center">
                                        <td>KT5.1</td>
                                        <td>Zon Pencahayaan</td>
                                        <td colspan="6"></td>
                                        <td>3</td>
                                        <td></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT51_MMV" name="markahKT51_MMV" /></td>
                                        <td>3</td>
                                        <td></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT51_MMV_PUN" name="markahKT51_MMV_PUN" /></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT51_MMV_SEDIA" name="markahKT51_MMV_SEDIA" /></td>
                                        {{-- <td>
                                            <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                            <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                        </td> --}}
                                        <td>
                                            <span> &#183; Lukisan siap bina litar lampu yang telah di zon dan lokasi pemasangan sensor</span><br>
                                            <span> &#183; Bukti bergambar</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT5.2-->
                                    <tr class="pg-2" align="center">
                                        <td>KT5.2</td>
                                        <td>Kawalan Pencahayaan</td>
                                        <td colspan="6"></td>
                                        <td>6</td>
                                        <td></td>
                                        <td>6</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT52_MMV" name="markahKT52_MMV" /></td>
                                        <td>6</td>
                                        <td></td>
                                        <td>6</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT52_MMV_PUN" name="markahKT52_MMV_PUN" /></td>
                                        <td>6</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT52_MMV_SEDIA" name="markahKT52_MMV_SEDIA" /></td>
                                        {{-- <td>
                                            <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                            <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                        </td> --}}
                                        <td>
                                            <span> &#183; Lukisan siap bina yang menunjukkan lokasi suis</span><br>
                                            <span> &#183; Bukti bergambar</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT5.3-->
                                    <tr class="pg-2" align="center">
                                        <td>KT5.3</td>
                                        <td>Lighting Power Density (LPD)</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT53_MMV" name="markahKT53_MMV" /></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT53_MMV_PUN" name="markahKT53_MMV_PUN" /></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT53_MMV_SEDIA" name="markahKT53_MMV_SEDIA" /></td>
                                        {{-- <td>
                                            <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                            <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                        </td> --}}
                                        <td>
                                            <span> &#183; Laporan pengambilan data mengikut spesifikasi</span><br>
                                            <span> &#183; Lukisan siap bina</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>
                                    
                                    <!--KT6--><!--No input-->
                                    <tr class="pg-2" align="center">
                                        <td>KT6</td>
                                        <td>Sistem penyaman udara dan pengudaraan mekanikal (ACMV)</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            {{-- <span> &#183; Lukisan siap bina yang menunjukkan lokasi suis</span><br>
                                            <span> &#183; Bukti bergambar</span><br> --}}
                                        </td>
                                        <td colspan="5"></td>
                                        <td colspan="4">
                                            {{-- <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form> --}}
                                        </td>
                                    </tr>

                                    <!--KT6.1-->
                                    <tr class="pg-2" align="center">
                                        <td>KT6.1</td>
                                        <td>Coefficient of Performance (COP)</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT61_MMV" name="markahKT61_MMV" /></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT61_MMV_PUN" name="markahKT61_MMV_PUN" /></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT61_MMV_SEDIA" name="markahKT61_MMV_SEDIA" /></td>
                                        {{-- <td>
                                            <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                            <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                        </td> --}}
                                        <td>
                                            <span> &#183; Laporan pengukuran dan verifikasi</span><br>
                                            <span> &#183; Pengiraan COP</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT6.2-->
                                    <tr class="pg-2" align="center">
                                        <td>KT6.2</td>
                                        <td>Green Refrigerant</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT62_MMV" name="markahKT62_MMV" /></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT62_MMV_PUN" name="markahKT62_MMV_PUN" /></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT62_MMV_SEDIA" name="markahKT62_MMV_SEDIA" /></td>
                                        {{-- <td>
                                            <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                            <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                        </td> --}}
                                        <td>
                                            <span> &#183; Rekod penyenggaraan peralatan</span><br>
                                            <span> &#183; Brosur pembekal</span><br>
                                            <span> &#183; Rekod inventori</span>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT7-->
                                    <tr class="pg-2" align="center">
                                        <td>KT7</td>
                                        <td>Penyusupan udara</td>
                                        <td colspan="6"></td>
                                        <td>3</td>
                                        <td></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT7_MMV" name="markahKT7_MMV" /></td>
                                        <td>3</td>
                                        <td></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT7_MMV_PUN" name="markahKT7_MMV_PUN" /></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT7_MMV_SEDIA" name="markahKT7_MMV_SEDIA" /></td>
                                        <td>
                                            <span> &#183; Lukisan butiran</span><br>
                                            <span> &#183; Lukisan siap bina</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT8-->
                                    <tr class="pg-2" align="center">
                                        <td>KT8</td>
                                        <td>Tenaga Boleh Baharu (TBB)</td>
                                        <td colspan="6"></td>
                                        <td>6</td>
                                        <td></td>
                                        <td>6</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT8_MMV" name="markahKT8_MMV" /></td>
                                        <td>6</td>
                                        <td></td>
                                        <td>6</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT8_MMV_PUN" name="markahKT8_MMV_PUN" /></td>
                                        <td>6</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT8_MMV_SEDIA" name="markahKT8_MMV_SEDIA" /></td>
                                        {{-- <td colspan="2">
                                            <span>&#183; Mengemukakan lukisan rekabentuk sistem dan simulasi pengiraan
                                                bagi anggaran tenaga baharu yang boleh dihasilkan oleh sistem tersebut</span><br>
                                        </td> --}}
                                        <td>
                                            <span> &#183; Salinan lukisan siap bina dan laporan uji terima yang mematuhi kehendak rekabentuk</span><br>
                                            <span> &#183; Pengiraan penjanaan tenaga boleh baharu berbanding jumlah penggunaan tenaga tahunan bangunan</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT9-->
                                    <tr class="pg-2" align="center">
                                        <td>KT9</td>
                                        <td>Prestasi Penggunaan Tenaga</td>
                                        <td colspan="6"></td>
                                        <td>10</td>
                                        <td></td>
                                        <td>10</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="10" autocapitalize="off" id="markahKT9_MMV" name="markahKT9_MMV" /></td>
                                        <td>10</td>
                                        <td></td>
                                        <td>10</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="10" autocapitalize="off" id="markahKT9_MMV_PUN" name="markahKT9_MMV_PUN" /></td>
                                        <td>10</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="10" autocapitalize="off" id="markahKT9_MMV_SEDIA" name="markahKT9_MMV_SEDIA" /></td>
                                        {{-- <td>
                                            <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                            <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                        </td> --}}
                                        <td>
                                            <span> &#183; Pengiraan semula berdasarkan bacaan meter</span><br>
                                            <span> &#183; Bil elektrik 12 bulan (jika berkaitan)</span><br>
                                            <span> &#183; Lukisan siap bina yang berkaitan</span>
                                            <span> &#183; Pengiraan peratus pengurangan</span>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT10--><!--No input-->
                                    <tr class="pg-2" align="center">
                                        <td>KT10</td>
                                        <td>Paparan dan kawalan</td>
                                        <td colspan="6"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            {{-- <span> &#183; Lukisan siap bina yang menunjukkan lokasi suis</span><br>
                                            <span> &#183; Bukti bergambar</span><br> --}}
                                        </td>
                                        <td colspan="5"></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT10.1-->
                                    <tr class="pg-2" align="center">
                                        <td>KT10.1</td>
                                        <td>Pemasangan sub-meter digital</td>
                                        <td colspan="6"></td>
                                        <td>6</td>
                                        <td></td>
                                        <td>6</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="6" autocapitalize="off" id="markahKT101_MMV" name="markahKT101_MMV" /></td>
                                        <td>5</td>
                                        <td></td>
                                        <td>5</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT101_MMV_PUN" name="markahKT101_MMV_PUN" /></td>
                                        <td>5</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT101_MMV_SEDIA" name="markahKT101_MMV_SEDIA" /></td>
                                        {{-- <td>
                                            <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                            <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                        </td> --}}
                                        <td>
                                            <span> &#183; Lukisan siap bina yang menunjukkan lokasi suis</span><br>
                                            <span> &#183; Bukti bergambar</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT10.2-->
                                    <tr class="pg-2" align="center">
                                        <td>KT10.2</td>
                                        <td>Sistem Pengurusan Kawalan Tenaga</td>
                                        <td colspan="6"></td>
                                        <td>5</td>
                                        <td></td>
                                        <td>5</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT102_MMV" name="markahKT102_MMV" /></td>
                                        <td>5</td>
                                        <td></td>
                                        <td>5</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT102_MMV_PUN" name="markahKT102_MMV_PUN" /></td>
                                        <td>5</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="5" autocapitalize="off" id="markahKT102_MMV_SEDIA" name="markahKT102_MMV_SEDIA" /></td>
                                        <td>
                                            <span> a &#41; Baru</span><br>
                                            <span> &#183; Lukisan siap bina</span><br>
                                            <span> &#183; Gambar rajah litar</span><br>
                                            <span> &#183; Rekod Pengujian dan Pentauliahan</span><br>
                                            <span> &#183; Sijil pengiktirafan MS ISO 50001</span><br>
                                            <span> b &#41; Sedia ada</span><br>
                                            <span> &#183; Lukisan siap bina</span><br>
                                            <span> &#183; Gambar rajah litar</span><br>
                                            <span> &#183; Laporan BEMS</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT10.3-->
                                    <tr class="pg-2" align="center">
                                        <td>KT10.3</td>
                                        <td>Verifikasi sistem paparan dan kawalan</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT103_MMV" name="markahKT103_MMV" /></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT103_MMV_PUN" name="markahKT103_MMV_PUN" /></td>
                                        <td>1</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="1" autocapitalize="off" id="markahKT103_MMV_SEDIA" name="markahKT103_MMV_SEDIA" /></td>
                                        {{-- <td>
                                            <span>&#183; Lukisan pelan lantai yang menunjukkan lokasi dan bilangan suis</span><br>
                                            <span>&#183; Lukisan skematik rekabentuk pendawaian</span><br>
                                        </td> --}}
                                        <td>
                                            <span> &#183; Senarai penggunaan tenaga berdasarkan bil elektrik bulanan</span><br>
                                            <span> &#183; Laporan verifikasi dan pelan penambahbaikan</span><br>
                                            <span> &#183; Manual Operasi dan Penyenggaraan</span>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--KT11-->
                                    <tr class="pg-2" align="center">
                                        <td>KT11</td>
                                        <td>Pengujian dan pentauliahan</td>
                                        <td colspan="6"></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT11_MMV" name="markahKT11_MMV" /></td>
                                        <td>1</td>
                                        <td></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT11_MMV_PUN" name="markahKT11_MMV_PUN" /></td>
                                        <td>3</td>
                                        <td><input onblur="findTotalMV_TL()" class="sum_mv_tl" type="number" min="0" max="3" autocapitalize="off" id="markahKT11_MMV_SEDIA" name="markahKT11_MMV_SEDIA" /></td>
                                        {{-- <td colspan="2">
                                            <span>&#183; Pelan pengujian dan pentauliahan</span><br>
                                        </td> --}}
                                        <td>
                                            <span>&#183; Dokumen lengkap pengujian dan pentauliahan yang telah disahkan</span><br>
                                        </td>
                                        <td colspan="5"><textarea maxlength="255" rows="5" cols="5" class="form-control" placeholder="Ulasan/Maklumbalas"></textarea></td>
                                        <td colspan="4">
                                            <form class="form">
                                                <label for="form__input" class="form__label">
                                                    <input class="form__input" type="file" name="dokumenSokongan" id="form__input" value="{{$dokumen_sokongan ?? ''}}">
                                                    <img src="/assets/img/illustrations/Group9047.png" alt="Error" class="form__icon">
                                                    <span id="custom-text">No file chosen, yet.</span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>

                                    <!--JUMLAH MARKAHKT-->
                                    <tr class="pg-2" align="center">
                                        <td colspan="6">Jumlah markah KT</td>
                                        <td colspan="3">55</td>
                                        <td></td>
                                        <td>57</td>
                                        <td><input type="number" min="0" max="57" id="markahTOTAL_TL_MMV" name="markahTOTAL_TL_MMV"></td>
                                        <td>54</td>
                                        <td></td>
                                        <td>56</td>
                                        {{-- <td colspan="2"></td> --}}
                                        <td><input type="number" min="0" max="56" id="markahTOTAL_TL_MMV_PUN"></td>
                                        <td>48</td>
                                        <td><input type="number" min="0" max="48" id="markahTOTAL_TL_MMV_SEDIA" name="markahTOTAL_TL_MMV_SEDIA"></td>
                                        <td></td>
                                        <td></td>
                                    </tr> 

                                </table>
                        </div>

                        <div align="center" class="mt-3">
                            <button class="btn btn-primary">Simpan</button>
                            <button class="btn btn-primary">Sah</button>
                            <button class="btn btn-primary">Jana Keputusan</button>
                            <button class="btn btn-primary">Jana Sijil</button>
                        </div>


                    </div>
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
    
    
            <!--MARKAH REKABENTUK (MR) CALCULATION-->
                <!--MR_TL : MARKAH REKABENTUK TL-->
                <!--MR_KT : MARKAH REKABENTUK KT-->
                <!--MR_SB : MARKAH REKABENTUK SB-->
                <!--MR_PA : MARKAH REKABENTUK PA-->
                <!--MR_PD : MARKAH REKABENTUK PD-->
                <!--MR_FL : MARKAH REKABENTUK FL-->
                <!--MR_IN : MARKAH REKABENTUK IN-->
                <script>
                    function findTotalMR_TL(){
                        var totalMR_TL = document.getElementById('totalMR_TL');
                        var MR_TL = document.getElementsByClassName('MR_TL');
                        var sumMR_TL = 0;
    
                        for( var i = 0; i < MR_TL.length; i++ ){
                            sumMR_TL += Number(MR_TL[i].value);
    
                        //display the total of inputs
                        totalMR_TL.value = sumMR_TL;
                    }
                        document.getElementById('totalMR_TL').value = sumMR_TL;
                    }
    
                    function findTotalMR_KT(){
                        var totalMR_KT = document.getElementById('totalMR_KT');
                        var MR_KT = document.getElementsByClassName('MR_KT');
                        var sumMR_KT = 0;
    
                        for( var i = 0; i < MR_KT.length; i++ ){
                            sumMR_KT += Number(MR_KT[i].value);
    
                        //display the total of inputs
                        totalMR_KT.value = sumMR_KT;
                        }
                        document.getElementById('totalMR_KT').value = sumMR_KT;
                    }
    
                    function findTotalMR_SB(){
                        var totalMR_SB = document.getElementById('totalMR_SB');
                        var MR_SB = document.getElementsByClassName('MR_SB');
                        var sumMR_SB = 0;
    
                        for( var i = 0; i < MR_SB.length; i++ ){
                            sumMR_SB += Number(MR_SB[i].value);
    
                        //display the total of inputs
                        totalMR_SB.value = sumMR_SB;
                        }
                        document.getElementById('totalMR_SB').value = sumMR_SB;
                    }
    
                    function findTotalMR_PA(){
                        var totalMR_PA = document.getElementById('totalMR_PA');
                        var MR_PA = document.getElementsByClassName('MR_PA');
                        var sumMR_PA = 0;
    
                        for( var i = 0; i < MR_PA.length; i++ ){
                            sumMR_PA += Number(MR_PA[i].value);
    
                        //display the total of inputs
                        totalMR_PA.value = sumMR_PA;
                        }
                        document.getElementById('totalMR_PA').value = sumMR_PA;
                    }
    
                    function findTotalMR_PD(){
                        var totalMR_PD = document.getElementById('totalMR_PD');
                        var MR_PD = document.getElementsByClassName('MR_PD');
                        var sumMR_PD = 0;
    
                        for( var i = 0; i < MR_PD.length; i++ ){
                            sumMR_PD += Number(MR_PD[i].value);
    
                        //display the total of inputs
                        totalMR_PD.value = sumMR_PD;
                        }
                        document.getElementById('totalMR_PD').value = sumMR_PD;
                    }
    
                    function findTotalMR_FL(){
                        var totalMR_FL = document.getElementById('totalMR_FL');
                        var MR_FL = document.getElementsByClassName('MR_FL');
                        var sumMR_FL = 0;
    
                        for( var i = 0; i < MR_FL.length; i++ ){
                            sumMR_FL += Number(MR_FL[i].value);
    
                        //display the total of inputs
                        totalMR_FL.value = sumMR_FL;
                        }
                        document.getElementById('totalMR_FL').value = sumMR_FL;
                    }
    
                    function findTotalMR_IN(){
                        var totalMR_IN = document.getElementById('totalMR_IN');
                        var MR_IN = document.getElementsByClassName('MR_IN');
                        var sumMR_IN = 0;
    
                        for( var i = 0; i < MR_IN.length; i++ ){
                            sumMR_IN += Number(MR_IN[i].value);
    
                        //display the total of inputs
                        totalMR_IN.value = sumMR_IN;
                        }
                        document.getElementById('totalMR_IN').value = sumMR_IN;
                    }
    
                    function findTotalMR(){
                        var TL = totalMR_TL.value || 0;
                        var KT = totalMR_KT.value || 0;
                        var SB = totalMR_SB.value || 0;
                        var PA = totalMR_PA.value || 0;
                        var PD = totalMR_PD.value || 0;
                        var FL = totalMR_FL.value || 0;
                        var IN = totalMR_IN.value || 0;
                        document.getElementById('totalMR').value = Number(TL) + Number(KT) + Number(SB) 
                        + Number(PA) + Number(PD) + Number(FL) + Number(IN);
                        // document.getElementById('totalMR').value = Number(TL);
                    }
    
                    document.addEventListener('keyup', function(){
                        findTotalMR_TL();
                        findTotalMR_KT();
                        findTotalMR_SB();
                        findTotalMR_PA();
                        findTotalMR_PD();
                        findTotalMR_FL();
                        findTotalMR_IN();
                        findTotalMR();
                    });
                </script>

            <!--MARKAH REKABENTUK (MR) PUN CALCULATION-->
            <!--MR_TL_PUN : MARKAH REKABENTUK TL-->
            <!--MR_KT_PUN : MARKAH REKABENTUK KT-->
            <!--MR_SB_PUN : MARKAH REKABENTUK SB-->
            <!--MR_PA_PUN : MARKAH REKABENTUK PA-->
            <!--MR_PD_PUN : MARKAH REKABENTUK PD-->
            <!--MR_FL_PUN : MARKAH REKABENTUK FL-->
            <!--MR_IN_PUN : MARKAH REKABENTUK IN-->
            <script>
                function findTotalMR_TL_PUN(){
                    var totalMR_TL_PUN = document.getElementById('totalMR_TL_PUN');
                    var MR_TL_PUN = document.getElementsByClassName('MR_TL_PUN');
                    var sumMR_TL_PUN = 0;

                    for( var i = 0; i < MR_TL_PUN.length; i++ ){
                        sumMR_TL_PUN += Number(MR_TL_PUN[i].value);

                    //display the total of inputs
                    totalMR_TL_PUN.value = sumMR_TL_PUN;
                }
                    document.getElementById('totalMR_TL_PUN').value = sumMR_TL_PUN;
                }

                function findTotalMR_KT_PUN(){
                    var totalMR_KT_PUN = document.getElementById('totalMR_KT_PUN');
                    var MR_KT_PUN = document.getElementsByClassName('MR_KT_PUN');
                    var sumMR_KT_PUN = 0;

                    for( var i = 0; i < MR_KT_PUN.length; i++ ){
                        sumMR_KT_PUN += Number(MR_KT_PUN[i].value);

                    //display the total of inputs
                    totalMR_KT_PUN.value = sumMR_KT_PUN;
                    }
                    document.getElementById('totalMR_KT_PUN').value = sumMR_KT_PUN;
                }

                function findTotalMR_SB_PUN(){
                    var totalMR_SB_PUN = document.getElementById('totalMR_SB_PUN');
                    var MR_SB_PUN = document.getElementsByClassName('MR_SB_PUN');
                    var sumMR_SB_PUN = 0;

                    for( var i = 0; i < MR_SB_PUN.length; i++ ){
                        sumMR_SB_PUN += Number(MR_SB_PUN[i].value);

                    //display the total of inputs
                    totalMR_SB_PUN.value = sumMR_SB_PUN;
                    }
                    document.getElementById('totalMR_SB_PUN').value = sumMR_SB_PUN;
                }

                function findTotalMR_PA_PUN(){
                    var totalMR_PA_PUN = document.getElementById('totalMR_PA_PUN');
                    var MR_PA_PUN = document.getElementsByClassName('MR_PA_PUN');
                    var sumMR_PA_PUN = 0;

                    for( var i = 0; i < MR_PA_PUN.length; i++ ){
                        sumMR_PA_PUN += Number(MR_PA_PUN[i].value);

                    //display the total of inputs
                    totalMR_PA_PUN.value = sumMR_PA_PUN;
                    }
                    document.getElementById('totalMR_PA_PUN').value = sumMR_PA_PUN;
                }

                function findTotalMR_PD_PUN(){
                    var totalMR_PD_PUN = document.getElementById('totalMR_PD_PUN');
                    var MR_PD_PUN = document.getElementsByClassName('MR_PD_PUN');
                    var sumMR_PD_PUN = 0;

                    for( var i = 0; i < MR_PD_PUN.length; i++ ){
                        sumMR_PD_PUN += Number(MR_PD_PUN[i].value);

                    //display the total of inputs
                    totalMR_PD_PUN.value = sumMR_PD_PUN;
                    }
                    document.getElementById('totalMR_PD_PUN').value = sumMR_PD_PUN;
                }

                function findTotalMR_FL_PUN(){
                    var totalMR_FL_PUN = document.getElementById('totalMR_FL_PUN');
                    var MR_FL_PUN = document.getElementsByClassName('MR_FL_PUN');
                    var sumMR_FL_PUN = 0;

                    for( var i = 0; i < MR_FL_PUN.length; i++ ){
                        sumMR_FL_PUN += Number(MR_FL_PUN[i].value);

                    //display the total of inputs
                    totalMR_FL_PUN.value = sumMR_FL_PUN;
                    }
                    document.getElementById('totalMR_FL_PUN').value = sumMR_FL_PUN;
                }

                function findTotalMR_IN_PUN(){
                    var totalMR_IN_PUN = document.getElementById('totalMR_IN_PUN');
                    var MR_IN_PUN = document.getElementsByClassName('MR_IN_PUN');
                    var sumMR_IN_PUN = 0;

                    for( var i = 0; i < MR_IN_PUN.length; i++ ){
                        sumMR_IN_PUN += Number(MR_IN_PUN[i].value);

                    //display the total of inputs
                    totalMR_IN_PUN.value = sumMR_IN_PUN;
                    }
                    document.getElementById('totalMR_IN_PUN').value = sumMR_IN_PUN;
                }

                function findTotalMR_PUN(){
                    var TL_PUN = totalMR_TL_PUN.value || 0;
                    var KT_PUN = totalMR_KT_PUN.value || 0;
                    var SB_PUN = totalMR_SB_PUN.value || 0;
                    var PA_PUN = totalMR_PA_PUN.value || 0;
                    var PD_PUN = totalMR_PD_PUN.value || 0;
                    var FL_PUN = totalMR_FL_PUN.value || 0;
                    var IN_PUN = totalMR_IN_PUN.value || 0;
                    document.getElementById('totalMR_PUN').value = Number(TL_PUN) + Number(KT_PUN) + Number(SB_PUN) 
                    + Number(PA_PUN) + Number(PD_PUN) + Number(FL_PUN) + Number(IN_PUN);
                    // document.getElementById('totalMR').value = Number(TL);
                }

                document.addEventListener('keyup', function(){
                    findTotalMR_TL_PUN();
                    findTotalMR_KT_PUN();
                    findTotalMR_SB_PUN();
                    findTotalMR_PA_PUN();
                    findTotalMR_PD_PUN();
                    findTotalMR_FL_PUN();
                    findTotalMR_IN_PUN();
                    findTotalMR_PUN();
                });
            </script>

            <!--MARKAH VERIFIKASI (MMV) VERIFIKASI CALCULATION-->
            <!--MMV_TL : MARKAH VERIFIKASI TL-->
            <!--MMV_KT : MARKAH VERIFIKASI KT-->
            <!--MMV_SB : MARKAH VERIFIKASI SB-->
            <!--MMV_PA : MARKAH VERIFIKASI PA-->
            <!--MMV_PD : MARKAH VERIFIKASI PD-->
            <!--MMV_FL : MARKAH VERIFIKASI FL-->
            <!--MMV_IN : MARKAH VERIFIKASI IN-->
            <script>
                function findTotalMMV_TL(){
                    var totalMMV_TL = document.getElementById('totalMMV_TL');
                    var MMV_TL = document.getElementsByClassName('MMV_TL');
                    var sumMMV_TL = 0;

                    for( var i = 0; i < MMV_TL.length; i++ ){
                        sumMMV_TL += Number(MMV_TL[i].value);

                    //display the total of inputs
                    totalMMV_TL.value = sumMMV_TL;
                    }
                    document.getElementById('totalMMV_TL').value = sumMMV_TL;
                }

                function findTotalMMV_KT(){
                    var totalMMV_KT = document.getElementById('totalMMV_KT');
                    var MMV_KT = document.getElementsByClassName('MMV_KT');
                    var sumMMV_KT = 0;

                    for( var i = 0; i < MMV_KT.length; i++ ){
                        sumMMV_KT += Number(MMV_KT[i].value);

                    //display the total of inputs
                    totalMMV_KT.value = sumMMV_KT;
                    }
                    document.getElementById('totalMMV_KT').value = sumMMV_KT;
                }

                function findTotalMMV_SB(){
                    var totalMMV_SB = document.getElementById('totalMMV_SB');
                    var MMV_SB = document.getElementsByClassName('MMV_SB');
                    var sumMMV_SB = 0;

                    for( var i = 0; i < MMV_SB.length; i++ ){
                        sumMMV_SB += Number(MMV_SB[i].value);

                    //display the total of inputs
                    totalMMV_SB.value = sumMMV_SB;
                    }
                    document.getElementById('totalMMV_SB').value = sumMMV_SB;
                }

                function findTotalMMV_PA(){
                    var totalMMV_PA = document.getElementById('totalMMV_PA');
                    var MMV_PA = document.getElementsByClassName('MMV_PA');
                    var sumMMV_PA = 0;

                    for( var i = 0; i < MMV_PA.length; i++ ){
                        sumMMV_PA += Number(MMV_PA[i].value);

                    //display the total of inputs
                    totalMMV_PA.value = sumMMV_PA;
                    }
                    document.getElementById('totalMMV_PA').value = sumMMV_PA;
                }

                function findTotalMMV_PD(){
                    var totalMMV_PD = document.getElementById('totalMMV_PD');
                    var MMV_PD = document.getElementsByClassName('MMV_PD');
                    var sumMMV_PD = 0;

                    for( var i = 0; i < MMV_PD.length; i++ ){
                        sumMMV_PD += Number(MMV_PD[i].value);

                    //display the total of inputs
                    totalMMV_PD.value = sumMMV_PD;
                    }
                    document.getElementById('totalMMV_PD').value = sumMMV_PD;
                }

                function findTotalMMV_FL(){
                    var totalMMV_FL = document.getElementById('totalMMV_FL');
                    var MMV_FL = document.getElementsByClassName('MMV_FL');
                    var sumMMV_FL = 0;

                    for( var i = 0; i < MMV_FL.length; i++ ){
                        sumMMV_FL += Number(MMV_FL[i].value);

                    //display the total of inputs
                    totalMMV_FL.value = sumMMV_FL;
                    }
                    document.getElementById('totalMMV_FL').value = sumMMV_FL;
                }

                function findTotalMMV_IN(){
                    var totalMMV_IN = document.getElementById('totalMMV_IN');
                    var MMV_IN = document.getElementsByClassName('MMV_IN');
                    var sumMMV_IN = 0;

                    for( var i = 0; i < MMV_IN.length; i++ ){
                        sumMMV_IN += Number(MMV_IN[i].value);

                    //display the total of inputs
                    totalMMV_IN.value = sumMMV_IN;
                    }
                    document.getElementById('totalMMV_IN').value = sumMMV_IN;
                }

                function findTotalMMV(){
                    var TL = totalMMV_TL.value || 0;
                    var KT = totalMMV_KT.value || 0;
                    var SB = totalMMV_SB.value || 0;
                    var PA = totalMMV_PA.value || 0;
                    var PD = totalMMV_PD.value || 0;
                    var FL = totalMMV_FL.value || 0;
                    var IN = totalMMV_IN.value || 0;
                    document.getElementById('totalMMV').value = Number(TL) + Number(KT)
                    + Number(SB) + Number(PA) + Number(PD) + Number(FL) + Number(IN);
                }

                document.addEventListener('keyup', function(){
                    findTotalMMV_TL();
                    findTotalMMV_KT();
                    findTotalMMV_SB();
                    findTotalMMV_PA();
                    findTotalMMV_PD();
                    findTotalMMV_FL();
                    findTotalMMV_IN();
                    findTotalMMV();
                });
            </script>

            <!--MARKAH VERIFIKASI (MV) PUN CALCULATION-->
            <!--MV_TL : MARKAH VERIFIKASI TL-->
            <!--MV_KT : MARKAH VERIFIKASI KT-->
            <!--MV_SB : MARKAH VERIFIKASI SB-->
            <!--MV_PA : MARKAH VERIFIKASI PA-->
            <!--MV_PD : MARKAH VERIFIKASI PD-->
            <!--MV_FL : MARKAH VERIFIKASI FL-->
            <!--MV_IN : MARKAH VERIFIKASI IN-->
            <script>
                function findTotalMV_TL_PUN(){
                    var totalMV_TL_PUN = document.getElementById('totalMV_TL_PUN');
                    var MV_TL_PUN = document.getElementsByClassName('MV_TL_PUN');
                    var sumMV_TL_PUN = 0;

                    for( var i = 0; i < MV_TL_PUN.length; i++ ){
                        sumMV_TL_PUN += Number(MV_TL_PUN[i].value);

                    //display the total of inputs
                    totalMV_TL_PUN.value = sumMV_TL_PUN;
                }
                    document.getElementById('totalMV_TL_PUN').value = sumMV_TL_PUN;
                }

                function findTotalMV_KT_PUN(){
                    var totalMV_KT_PUN = document.getElementById('totalMV_KT_PUN');
                    var MV_KT_PUN = document.getElementsByClassName('MV_KT_PUN');
                    var sumMV_KT_PUN = 0;

                    for( var i = 0; i < MV_KT_PUN.length; i++ ){
                        sumMV_KT_PUN += Number(MV_KT_PUN[i].value);

                    //display the total of inputs
                    totalMV_KT_PUN.value = sumMV_KT_PUN;
                    }
                    document.getElementById('totalMV_KT_PUN').value = sumMV_KT_PUN;
                }

                function findTotalMV_SB_PUN(){
                    var totalMV_SB_PUN = document.getElementById('totalMV_SB_PUN');
                    var MV_SB_PUN = document.getElementsByClassName('MV_SB_PUN');
                    var sumMV_SB_PUN = 0;

                    for( var i = 0; i < MV_SB_PUN.length; i++ ){
                        sumMV_SB_PUN += Number(MV_SB_PUN[i].value);

                    //display the total of inputs
                    totalMV_SB_PUN.value = sumMV_SB_PUN;
                    }
                    document.getElementById('totalMV_SB_PUN').value = sumMV_SB_PUN;
                }

                function findTotalMV_PA_PUN(){
                    var totalMV_PA_PUN = document.getElementById('totalMV_PA_PUN');
                    var MV_PA = document.getElementsByClassName('MV_PA_PUN');
                    var sumMV_PA_PUN = 0;

                    for( var i = 0; i < MV_PA_PUN.length; i++ ){
                        sumMV_PA_PUN += Number(MV_PA_PUN[i].value);

                    //display the total of inputs
                    totalMV_PA_PUN.value = sumMV_PA_PUN;
                    }
                    document.getElementById('totalMV_PA_PUN').value = sumMV_PA_PUN;
                }

                function findTotalMV_PD_PUN(){
                    var totalMV_PD_PUN = document.getElementById('totalMV_PD_PUN');
                    var MV_PD = document.getElementsByClassName('MV_PD_PUN');
                    var sumMV_PD_PUN = 0;

                    for( var i = 0; i < MV_PD_PUN.length; i++ ){
                        sumMV_PD_PUN += Number(MV_PD_PUN[i].value);

                    //display the total of inputs
                    totalMV_PD_PUN.value = sumMV_PD_PUN;
                    }
                    document.getElementById('totalMV_PD_PUN').value = sumMV_PD_PUN;
                }

                function findTotalMV_FL_PUN(){
                    var totalMV_FL_PUN = document.getElementById('totalMV_FL_PUN');
                    var MV_FL_PUN = document.getElementsByClassName('MV_FL_PUN');
                    var sumMV_FL_PUN = 0;

                    for( var i = 0; i < MV_FL_PUN.length; i++ ){
                        sumMV_FL_PUN += Number(MV_FL_PUN[i].value);

                    //display the total of inputs
                    totalMV_FL_PUN.value = sumMV_FL_PUN;
                    }
                    document.getElementById('totalMV_FL_PUN').value = sumMV_FL_PUN;
                }

                function findTotalMV_IN_PUN(){
                    var totalMV_IN_PUN = document.getElementById('totalMV_IN_PUN');
                    var MV_IN_PUN = document.getElementsByClassName('MV_IN_PUN');
                    var sumMV_IN_PUN = 0;

                    for( var i = 0; i < MV_IN_PUN.length; i++ ){
                        sumMV_IN_PUN += Number(MV_IN_PUN[i].value);

                    //display the total of inputs
                    totalMV_IN_PUN.value = sumMV_IN_PUN;
                    }
                    document.getElementById('totalMV_IN_PUN').value = sumMV_IN_PUN;
                }

                function findTotalMV(){
                    var TL = totalMMV_TL_PUN.value || 0;
                    var KT = totalMMV_KT_PUN.value || 0;
                    var SB = totalMMV_SB_PUN.value || 0;
                    var PA = totalMMV_PA_PUN.value || 0;
                    var PD = totalMMV_PD_PUN.value || 0;
                    var FL = totalMMV_FL_PUN.value || 0;
                    var IN = totalMMV_IN_PUN.value || 0;
                    document.getElementById('totalMV_PUN').value = Number(TL) + Number(KT) + Number(SB) 
                    + Number(PA) + Number(PD) + Number(FL) + Number(IN);
                }

                document.addEventListener('keyup', function(){
                    findTotalMV_TL_PUN();
                    findTotalMV_KT_PUN();
                    findTotalMV_SB_PUN();
                    findTotalMV_PA_PUN();
                    findTotalMV_PD_PUN();
                    findTotalMV_FL_PUN();
                    findTotalMV_IN_PUN();
                    findTotalMV();
                });
            </script>

            <!--MARKAH VERIFIKASI (MV) SEDIA_ADA CALCULATION-->
            <!--MV_TL : MARKAH VERIFIKASI TL-->
            <!--MV_KT : MARKAH VERIFIKASI KT-->
            <!--MV_SB : MARKAH VERIFIKASI SB-->
            <!--MV_PA : MARKAH VERIFIKASI PA-->
            <!--MV_PD : MARKAH VERIFIKASI PD-->
            <!--MV_FL : MARKAH VERIFIKASI FL-->
            <!--MV_IN : MARKAH VERIFIKASI IN-->
            <script>
                function findTotalMV_TL_SEDIA_ADA(){
                    var totalMV_TL_SEDIA_ADA = document.getElementById('totalMV_TL_SEDIA_ADA');
                    var MV_TL_SEDIA_ADA = document.getElementsByClassName('MV_TL_SEDIA_ADA');
                    var sumMV_TL_SEDIA_ADA = 0;

                    for( var i = 0; i < MV_TL_SEDIA_ADA.length; i++ ){
                        sumMV_TL_SEDIA_ADA += Number(MV_TL_SEDIA_ADA[i].value);

                    //display the total of inputs
                    totalMV_TL_SEDIA_ADA.value = sumMV_TL_SEDIA_ADA;
                }
                    document.getElementById('totalMV_TL_SEDIA_ADA').value = sumMV_TL_SEDIA_ADA;
                }

                function findTotalMV_KT_SEDIA_ADA(){
                    var totalMV_KT_SEDIA_ADA = document.getElementById('totalMV_KT_SEDIA_ADA');
                    var MV_KT_SEDIA_ADA = document.getElementsByClassName('MV_KT_SEDIA_ADA');
                    var sumMV_KT_SEDIA_ADA = 0;

                    for( var i = 0; i < MV_KT_SEDIA_ADA.length; i++ ){
                        sumMV_KT_SEDIA_ADA += Number(MV_KT_SEDIA_ADA[i].value);

                    //display the total of inputs
                    totalMV_KT_SEDIA_ADA.value = sumMV_KT_SEDIA_ADA;
                    }
                    document.getElementById('totalMV_KT_SEDIA_ADA').value = sumMV_KT_SEDIA_ADA;
                }

                function findTotalMV_SB_SEDIA_ADA(){
                    var totalMV_SB_SEDIA_ADA = document.getElementById('totalMV_SB_SEDIA_ADA');
                    var MV_SB_SEDIA_ADA = document.getElementsByClassName('MV_SB_SEDIA_ADA');
                    var sumMV_SB_SEDIA_ADA = 0;

                    for( var i = 0; i < MV_SB_SEDIA_ADA.length; i++ ){
                        sumMV_SB_SEDIA_ADA += Number(MV_SB_SEDIA_ADA[i].value);

                    //display the total of inputs
                    totalMV_SB_SEDIA_ADA.value = sumMV_SB_SEDIA_ADA;
                    }
                    document.getElementById('totalMV_SB_SEDIA_ADA').value = sumMV_SB_SEDIA_ADA;
                }

                function findTotalMV_PA_SEDIA_ADA(){
                    var totalMV_PA_SEDIA_ADA = document.getElementById('totalMV_PA_SEDIA_ADA');
                    var MV_PA = document.getElementsByClassName('MV_PA_SEDIA_ADA');
                    var sumMV_PA_SEDIA_ADA = 0;

                    for( var i = 0; i < MV_PA_SEDIA_ADA.length; i++ ){
                        sumMV_PA_SEDIA_ADA += Number(MV_PA_SEDIA_ADA[i].value);

                    //display the total of inputs
                    totalMV_PA_SEDIA_ADA.value = sumMV_PA_SEDIA_ADA;
                    }
                    document.getElementById('totalMV_PA_SEDIA_ADA').value = sumMV_PA_SEDIA_ADA;
                }

                function findTotalMV_PD_SEDIA_ADA(){
                    var totalMV_PD_SEDIA_ADA = document.getElementById('totalMV_PD_SEDIA_ADA');
                    var MV_PD = document.getElementsByClassName('MV_PD_SEDIA_ADA');
                    var sumMV_PD_SEDIA_ADA = 0;

                    for( var i = 0; i < MV_PD_SEDIA_ADA.length; i++ ){
                        sumMV_PD_SEDIA_ADA += Number(MV_PD_SEDIA_ADA[i].value);

                    //display the total of inputs
                    totalMV_PD_SEDIA_ADA.value = sumMV_PD_SEDIA_ADA;
                    }
                    document.getElementById('totalMV_PD_SEDIA_ADA').value = sumMV_PD_SEDIA_ADA;
                }

                function findTotalMV_FL_SEDIA_ADA(){
                    var totalMV_FL_SEDIA_ADA = document.getElementById('totalMV_FL_SEDIA_ADA');
                    var MV_FL_SEDIA_ADA = document.getElementsByClassName('MV_FL_SEDIA_ADA');
                    var sumMV_FL_SEDIA_ADA = 0;

                    for( var i = 0; i < MV_FL_SEDIA_ADA.length; i++ ){
                        sumMV_FL_SEDIA_ADA += Number(MV_FL_SEDIA_ADA[i].value);

                    //display the total of inputs
                    totalMV_FL_SEDIA_ADA.value = sumMV_FL_SEDIA_ADA;
                    }
                    document.getElementById('totalMV_FL_SEDIA_ADA').value = sumMV_FL_SEDIA_ADA;
                }

                function findTotalMV_IN_SEDIA_ADA(){
                    var totalMV_IN_SEDIA_ADA = document.getElementById('totalMV_IN_SEDIA_ADA');
                    var MV_IN_SEDIA_ADA = document.getElementsByClassName('MV_IN_SEDIA_ADA');
                    var sumMV_IN_SEDIA_ADA = 0;

                    for( var i = 0; i < MV_IN_SEDIA_ADA.length; i++ ){
                        sumMV_IN_SEDIA_ADA += Number(MV_IN_SEDIA_ADA[i].value);

                    //display the total of inputs
                    totalMV_IN_SEDIA_ADA.value = sumMV_IN_SEDIA_ADA;
                    }
                    document.getElementById('totalMV_IN_SEDIA_ADA').value = sumMV_IN_SEDIA_ADA;
                }

                function findTotalMV(){
                    var TL = totalMMV_TL_SEDIA_ADA.value || 0;
                    var KT = totalMMV_KT_SEDIA_ADA.value || 0;
                    var SB = totalMMV_SB_SEDIA_ADA.value || 0;
                    var PA = totalMMV_PA_SEDIA_ADA.value || 0;
                    var PD = totalMMV_PD_SEDIA_ADA.value || 0;
                    var FL = totalMMV_FL_SEDIA_ADA.value || 0;
                    var IN = totalMMV_IN_SEDIA_ADA.value || 0;
                    document.getElementById('totalMV_SEDIA_ADA').value = Number(TL) + Number(KT) + Number(SB) 
                    + Number(PA) + Number(PD) + Number(FL) + Number(IN);
                }

                document.addEventListener('keyup', function(){
                    findTotalMV_TL_SEDIA_ADA();
                    findTotalMV_KT_SEDIA_ADA();
                    findTotalMV_SB_SEDIA_ADA();
                    findTotalMV_PA_SEDIA_ADA();
                    findTotalMV_PD_SEDIA_ADA();
                    findTotalMV_FL_SEDIA_ADA();
                    findTotalMV_IN_SEDIA_ADA();
                    findTotalMV();
                });
            </script>


            <!--MARKAH VALIDASI (ML) CALCULATION-->
            <!--ML_TL : MARKAH VALIDASI TL-->
            <!--ML_KT : MARKAH VALIDASI KT-->
            <!--ML_SB : MARKAH VALIDASI SB-->
            <!--ML_PA : MARKAH VALIDASI PA-->
            <!--ML_PD : MARKAH VALIDASI PD-->
            <!--ML_FL : MARKAH VALIDASI FL-->
            <!--ML_IN : MARKAH VALIDASI IN-->
            <script>
                function findTotalML_TL(){
                    var totalML_TL = document.getElementById('totalML_TL');
                    var ML_TL = document.getElementsByClassName('ML_TL');
                    var sumML_TL = 0;

                    for( var i = 0; i < ML_TL.length; i++ ){
                        sumML_TL += Number(ML_TL[i].value);

                    //display the total of inputs
                    totalML_TL.value = sumML_TL;
                }
                    document.getElementById('totalML_TL').value = sumML_TL;
                }

                function findTotalML_KT(){
                    var totalML_KT = document.getElementById('totalML_KT');
                    var ML_KT = document.getElementsByClassName('ML_KT');
                    var sumML_KT = 0;

                    for( var i = 0; i < ML_KT.length; i++ ){
                        sumML_KT += Number(ML_KT[i].value);

                    //display the total of inputs
                    totalML_KT.value = sumML_KT;
                    }
                    document.getElementById('totalML_KT').value = sumML_KT;
                }

                function findTotalML_SB(){
                    var totalML_SB = document.getElementById('totalML_SB');
                    var ML_SB = document.getElementsByClassName('ML_SB');
                    var sumML_SB = 0;

                    for( var i = 0; i < ML_SB.length; i++ ){
                        sumML_SB += Number(ML_SB[i].value);

                    //display the total of inputs
                    totalML_SB.value = sumML_SB;
                    }
                    document.getElementById('totalML_SB').value = sumML_SB;
                }

                function findTotalML_PA(){
                    var totalML_PA = document.getElementById('totalML_PA');
                    var ML_PA = document.getElementsByClassName('ML_PA');
                    var sumML_PA = 0;

                    for( var i = 0; i < ML_PA.length; i++ ){
                        sumML_PA += Number(ML_PA[i].value);

                    //display the total of inputs
                    totalML_PA.value = sumML_PA;
                    }
                    document.getElementById('totalML_PA').value = sumML_PA;
                }

                function findTotalML_PD(){
                    var totalML_PD = document.getElementById('totalML_PD');
                    var ML_PD = document.getElementsByClassName('ML_PD');
                    var sumML_PD = 0;

                    for( var i = 0; i < ML_PD.length; i++ ){
                        sumML_PD += Number(ML_PD[i].value);

                    //display the total of inputs
                    totalML_PD.value = sumML_PD;
                    }
                    document.getElementById('totalML_PD').value = sumML_PD;
                }

                function findTotalML_FL(){
                    var totalML_FL = document.getElementById('totalML_FL');
                    var ML_FL = document.getElementsByClassName('ML_FL');
                    var sumML_FL = 0;

                    for( var i = 0; i < ML_FL.length; i++ ){
                        sumML_FL += Number(ML_FL[i].value);

                    //display the total of inputs
                    totalML_FL.value = sumML_FL;
                    }
                    document.getElementById('totalML_FL').value = sumML_FL;
                }

                function findTotalML_IN(){
                    var totalML_IN = document.getElementById('totalML_IN');
                    var ML_IN = document.getElementsByClassName('ML_IN');
                    var sumML_IN = 0;

                    for( var i = 0; i < ML_IN.length; i++ ){
                        sumML_IN += Number(ML_IN[i].value);

                    //display the total of inputs
                    totalML_IN.value = sumML_IN;
                    }
                    document.getElementById('totalML_IN').value = sumML_IN;
                }

                function findTotalML(){
                    var TL = totalML_TL.value || 0;
                    var KT = totalML_KT.value || 0;
                    var SB = totalML_SB.value || 0;
                    var PA = totalML_PA.value || 0;
                    var PD = totalML_PD.value || 0;
                    var FL = totalML_FL.value || 0;
                    var IN = totalML_IN.value || 0;
                    document.getElementById('totalML').value = Number(TL) + Number(KT) + Number(SB) 
                    + Number(PA) + Number(PD) + Number(FL) + Number(IN);
                }

                document.addEventListener('keyup', function(){
                    findTotalML_TL();
                    findTotalML_KT();
                    findTotalML_SB();
                    findTotalML_PA();
                    findTotalML_PD();
                    findTotalML_FL();
                    findTotalML_IN();
                    findTotalML();
                });
            </script>

            <!--MARKAH VALIDASI (ML) PUN CALCULATION-->
            <!--MV_TL : MARKAH VALIDASI TL-->
            <!--MV_KT : MARKAH VALIDASI KT-->
            <!--MV_SB : MARKAH VALIDASI SB-->
            <!--MV_PA : MARKAH VALIDASI PA-->
            <!--MV_PD : MARKAH VALIDASI PD-->
            <!--MV_FL : MARKAH VALIDASI FL-->
            <!--MV_IN : MARKAH VALIDASI IN-->
            <script>
                function findTotalML_TL_PUN(){
                    var totalML_TL_PUN = document.getElementById('totalML_TL_PUN');
                    var ML_TL_PUN = document.getElementsByClassName('ML_TL_PUN');
                    var sumML_TL_PUN = 0;

                    for( var i = 0; i < ML_TL_PUN.length; i++ ){
                        sumML_TL_PUN += Number(ML_TL_PUN[i].value);

                    //display the total of inputs
                    totalML_TL_PUN.value = sumML_TL_PUN;
                }
                    document.getElementById('totalML_TL_PUN').value = sumML_TL_PUN;
                }

                function findTotalML_KT_PUN(){
                    var totalML_KT_PUN = document.getElementById('totalML_KT_PUN');
                    var ML_KT_PUN = document.getElementsByClassName('ML_KT_PUN');
                    var sumML_KT_PUN = 0;

                    for( var i = 0; i < ML_KT_PUN.length; i++ ){
                        sumML_KT_PUN += Number(ML_KT_PUN[i].value);

                    //display the total of inputs
                    totalML_KT_PUN.value = sumML_KT_PUN;
                    }
                    document.getElementById('totalML_KT_PUN').value = sumML_KT_PUN;
                }

                function findTotalML_SB_PUN(){
                    var totalML_SB_PUN = document.getElementById('totalML_SB_PUN');
                    var ML_SB_PUN = document.getElementsByClassName('ML_SB_PUN');
                    var sumML_SB_PUN = 0;

                    for( var i = 0; i < ML_SB_PUN.length; i++ ){
                        sumML_SB_PUN += Number(ML_SB_PUN[i].value);

                    //display the total of inputs
                    totalML_SB_PUN.value = sumML_SB_PUN;
                    }
                    document.getElementById('totalML_SB_PUN').value = sumML_SB_PUN;
                }

                function findTotalML_PA_PUN(){
                    var totalML_PA_PUN = document.getElementById('totalML_PA_PUN');
                    var ML_PA = document.getElementsByClassName('ML_PA_PUN');
                    var sumML_PA_PUN = 0;

                    for( var i = 0; i < ML_PA_PUN.length; i++ ){
                        sumML_PA_PUN += Number(ML_PA_PUN[i].value);

                    //display the total of inputs
                    totalML_PA_PUN.value = sumML_PA_PUN;
                    }
                    document.getElementById('totalML_PA_PUN').value = sumML_PA_PUN;
                }

                function findTotalML_PD_PUN(){
                    var totalML_PD_PUN = document.getElementById('totalML_PD_PUN');
                    var ML_PD = document.getElementsByClassName('ML_PD_PUN');
                    var sumML_PD_PUN = 0;

                    for( var i = 0; i < ML_PD_PUN.length; i++ ){
                        sumML_PD_PUN += Number(ML_PD_PUN[i].value);

                    //display the total of inputs
                    totalML_PD_PUN.value = sumML_PD_PUN;
                    }
                    document.getElementById('totalML_PD_PUN').value = sumML_PD_PUN;
                }

                function findTotalML_FL_PUN(){
                    var totalML_FL_PUN = document.getElementById('totalML_FL_PUN');
                    var ML_FL_PUN = document.getElementsByClassName('ML_FL_PUN');
                    var sumML_FL_PUN = 0;

                    for( var i = 0; i < ML_FL_PUN.length; i++ ){
                        sumML_FL_PUN += Number(ML_FL_PUN[i].value);

                    //display the total of inputs
                    totalML_FL_PUN.value = sumML_FL_PUN;
                    }
                    document.getElementById('totalML_FL_PUN').value = sumML_FL_PUN;
                }

                function findTotalML_IN_PUN(){
                    var totalML_IN_PUN = document.getElementById('totalML_IN_PUN');
                    var ML_IN_PUN = document.getElementsByClassName('ML_IN_PUN');
                    var sumML_IN_PUN = 0;

                    for( var i = 0; i < ML_IN_PUN.length; i++ ){
                        sumML_IN_PUN += Number(ML_IN_PUN[i].value);

                    //display the total of inputs
                    totalML_IN_PUN.value = sumML_IN_PUN;
                    }
                    document.getElementById('totalML_IN_PUN').value = sumML_IN_PUN;
                }

                function findTotalML(){
                    var TL = totalMML_TL_PUN.value || 0;
                    var KT = totalMML_KT_PUN.value || 0;
                    var SB = totalMML_SB_PUN.value || 0;
                    var PA = totalMML_PA_PUN.value || 0;
                    var PD = totalMML_PD_PUN.value || 0;
                    var FL = totalMML_FL_PUN.value || 0;
                    var IN = totalMML_IN_PUN.value || 0;
                    document.getElementById('totalML_PUN').value = Number(TL) + Number(KT) + Number(SB) 
                    + Number(PA) + Number(PD) + Number(FL) + Number(IN);
                }

                document.addEventListener('keyup', function(){
                    findTotalML_TL_PUN();
                    findTotalML_KT_PUN();
                    findTotalML_SB_PUN();
                    findTotalML_PA_PUN();
                    findTotalML_PD_PUN();
                    findTotalML_FL_PUN();
                    findTotalML_IN_PUN();
                    findTotalML();
                });
            </script>

            <!--MARKAH VALIDASI (ML) SEDIA ADA CALCULATION-->
            <!--MV_TL : MARKAH VALIDASI TL-->
            <!--MV_KT : MARKAH VALIDASI KT-->
            <!--MV_SB : MARKAH VALIDASI SB-->
            <!--MV_PA : MARKAH VALIDASI PA-->
            <!--MV_PD : MARKAH VALIDASI PD-->
            <!--MV_FL : MARKAH VALIDASI FL-->
            <!--MV_IN : MARKAH VALIDASI IN-->
            <script>
                function findTotalML_TL_SEDIA_ADA(){
                    var totalML_TL_SEDIA_ADA = document.getElementById('totalML_TL_SEDIA_ADA');
                    var ML_TL_SEDIA_ADA = document.getElementsByClassName('ML_TL_SEDIA_ADA');
                    var sumML_TL_SEDIA_ADA = 0;

                    for( var i = 0; i < ML_TL_SEDIA_ADA.length; i++ ){
                        sumML_TL_SEDIA_ADA += Number(ML_TL_SEDIA_ADA[i].value);

                    //display the total of inputs
                    totalML_TL_SEDIA_ADA.value = sumML_TL_SEDIA_ADA;
                }
                    document.getElementById('totalML_TL_SEDIA_ADA').value = sumML_TL_SEDIA_ADA;
                }

                function findTotalML_KT_SEDIA_ADA(){
                    var totalML_KT_SEDIA_ADA = document.getElementById('totalML_KT_SEDIA_ADA');
                    var ML_KT_SEDIA_ADA = document.getElementsByClassName('ML_KT_SEDIA_ADA');
                    var sumML_KT_SEDIA_ADA = 0;

                    for( var i = 0; i < ML_KT_SEDIA_ADA.length; i++ ){
                        sumML_KT_SEDIA_ADA += Number(ML_KT_SEDIA_ADA[i].value);

                    //display the total of inputs
                    totalML_KT_SEDIA_ADA.value = sumML_KT_SEDIA_ADA;
                    }
                    document.getElementById('totalML_KT_SEDIA_ADA').value = sumML_KT_SEDIA_ADA;
                }

                function findTotalML_SB_SEDIA_ADA(){
                    var totalML_SB_SEDIA_ADA = document.getElementById('totalML_SB_SEDIA_ADA');
                    var ML_SB_SEDIA_ADA = document.getElementsByClassName('ML_SB_SEDIA_ADA');
                    var sumML_SB_SEDIA_ADA = 0;

                    for( var i = 0; i < ML_SB_SEDIA_ADA.length; i++ ){
                        sumML_SB_SEDIA_ADA += Number(ML_SB_SEDIA_ADA[i].value);

                    //display the total of inputs
                    totalML_SB_SEDIA_ADA.value = sumML_SB_SEDIA_ADA;
                    }
                    document.getElementById('totalML_SB_SEDIA_ADA').value = sumML_SB_SEDIA_ADA;
                }

                function findTotalML_PA_SEDIA_ADA(){
                    var totalML_PA_SEDIA_ADA = document.getElementById('totalML_PA_SEDIA_ADA');
                    var ML_PA = document.getElementsByClassName('ML_PA_SEDIA_ADA');
                    var sumML_PA_SEDIA_ADA = 0;

                    for( var i = 0; i < ML_PA_SEDIA_ADA.length; i++ ){
                        sumML_PA_SEDIA_ADA += Number(ML_PA_SEDIA_ADA[i].value);

                    //display the total of inputs
                    totalML_PA_SEDIA_ADA.value = sumML_PA_SEDIA_ADA;
                    }
                    document.getElementById('totalML_PA_SEDIA_ADA').value = sumML_PA_SEDIA_ADA;
                }

                function findTotalML_PD_SEDIA_ADA(){
                    var totalML_PD_SEDIA_ADA = document.getElementById('totalML_PD_SEDIA_ADA');
                    var ML_PD = document.getElementsByClassName('ML_PD_SEDIA_ADA');
                    var sumML_PD_SEDIA_ADA = 0;

                    for( var i = 0; i < ML_PD_SEDIA_ADA.length; i++ ){
                        sumML_PD_SEDIA_ADA += Number(ML_PD_SEDIA_ADA[i].value);

                    //display the total of inputs
                    totalML_PD_SEDIA_ADA.value = sumML_PD_SEDIA_ADA;
                    }
                    document.getElementById('totalML_PD_SEDIA_ADA').value = sumML_PD_SEDIA_ADA;
                }

                function findTotalML_FL_SEDIA_ADA(){
                    var totalML_FL_SEDIA_ADA = document.getElementById('totalML_FL_SEDIA_ADA');
                    var ML_FL_SEDIA_ADA = document.getElementsByClassName('ML_FL_SEDIA_ADA');
                    var sumML_FL_SEDIA_ADA = 0;

                    for( var i = 0; i < ML_FL_SEDIA_ADA.length; i++ ){
                        sumML_FL_SEDIA_ADA += Number(ML_FL_SEDIA_ADA[i].value);

                    //display the total of inputs
                    totalML_FL_SEDIA_ADA.value = sumML_FL_SEDIA_ADA;
                    }
                    document.getElementById('totalML_FL_SEDIA_ADA').value = sumML_FL_SEDIA_ADA;
                }

                function findTotalML_IN_SEDIA_ADA(){
                    var totalML_IN_SEDIA_ADA = document.getElementById('totalML_IN_SEDIA_ADA');
                    var ML_IN_SEDIA_ADA = document.getElementsByClassName('ML_IN_SEDIA_ADA');
                    var sumML_IN_SEDIA_ADA = 0;

                    for( var i = 0; i < ML_IN_SEDIA_ADA.length; i++ ){
                        sumML_IN_SEDIA_ADA += Number(ML_IN_SEDIA_ADA[i].value);

                    //display the total of inputs
                    totalML_IN_SEDIA_ADA.value = sumML_IN_SEDIA_ADA;
                    }
                    document.getElementById('totalML_IN_SEDIA_ADA').value = sumML_IN_SEDIA_ADA;
                }

                function findTotalML(){
                    var TL = totalMML_TL_SEDIA_ADA.value || 0;
                    var KT = totalMML_KT_SEDIA_ADA.value || 0;
                    var SB = totalMML_SB_SEDIA_ADA.value || 0;
                    var PA = totalMML_PA_SEDIA_ADA.value || 0;
                    var PD = totalMML_PD_SEDIA_ADA.value || 0;
                    var FL = totalMML_FL_SEDIA_ADA.value || 0;
                    var IN = totalMML_IN_SEDIA_ADA.value || 0;
                    document.getElementById('totalML_SEDIA_ADA').value = Number(TL) + Number(KT) + Number(SB) 
                    + Number(PA) + Number(PD) + Number(FL) + Number(IN);
                }

                document.addEventListener('keyup', function(){
                    findTotalML_TL_SEDIA_ADA();
                    findTotalML_KT_SEDIA_ADA();
                    findTotalML_SB_SEDIA_ADA();
                    findTotalML_PA_SEDIA_ADA();
                    findTotalML_PD_SEDIA_ADA();
                    findTotalML_FL_SEDIA_ADA();
                    findTotalML_IN_SEDIA_ADA();
                    findTotalML();
                });
            </script>




@endsection