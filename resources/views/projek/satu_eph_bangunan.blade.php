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
        </div>
    </div>
    <div class="col-12 mt-6">
        <div class="card">
            <div class="card-body">
                <form action="/projek/satu_eph_bangunan/pemudah_cara" method="POST">
                    @csrf

                    <div class="row mx-3 mb-2">
                        <h2 class="mb-3">Pelantikan Pemudah Cara/Penilai Jalan/Pasukan Validasi</h2>
                        <div class="col-5 mb-2">
                            <label class="col-form-label">Nama:</label>
                        </div>
                        <div class="col-7 mb-2">
                            <select class="form-select" aria-label="Default select example" name="jenisProjek">
                                <option selected="">Sila Pilih</option>
                                <option value="Kerajaan">Ahmad Aizat Ramli</option>
                                <option value="Swasta">'Atiah</option>
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
                    <div class="row mt-3">
                        <div class="col text-center">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>

<div class="tab mt-6">
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


            <div class="card mt-3">
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
                                        <th>MR</th>
                                        <th>MMV</th>
                                        <th>MV</th>
                                        <th>ML</th>
            
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
            
                                        <th>MM</th>
                                        <th>MR</th>
                                        <th>MMV</th>
                                        <th>MV</th>
                                        <th>ML</th>
            
                                        {{-- PUN --}}
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
            
                                        {{-- Sedia Ada --}}
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
                                    </tr>
                            </thead>
            
                                    <!--TL-->
                                    <tr align="center" class="text-black" >
                                        <th>TL</th>
                                        <th colspan="2">Perancangan dan Pengurusan Tapak Lestari</th>
                                        <th>26</th>
                                        <th>TL MR</th>
                                        <th>24</th>
                                        <th>TL MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>29</th>
                                        <th>TL_MR</th>
                                        <th>27</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>29</th>
                                        <th>TL_MR</th>
                                        <th>27</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>29</th>
                                        <th>TL_MR</th>
                                        <th>27</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        {{-- PUN --}}
                                        <th>24</th>
                                        <th>TL_MR</th>
                                        <th>23</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>27</th>
                                        <th>TL_MR</th>
                                        <th>26</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>27</th>
                                        <th>TL_MR</th>
                                        <th>26</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>27</th>
                                        <th>TL_MR</th>
                                        <th>26</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>26</th>
                                        <th>TL_MR</th>
                                        <th>MMV</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>26</th>
                                        <th>TL_MR</th>
                                        <th>17</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>26</th>
                                        <th>TL_MR</th>
                                        <th>17</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>26</th>
                                        <th>TL_MR</th>
                                        <th>17</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
                                    </tr>
            
                                    <!--KT-->
                                    <tr align="center" class="text-black" >
                                        <th>KT</th>
                                        <th colspan="2">Pengurusan Kecekapan Tenaga</th>
                                        <th>24</th>
                                        <th>KT_MR</th>
                                        <th>26</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>
            
                                        <th>36</th>
                                        <th>KT_MR</th>
                                        <th>38</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>
            
                                        <th>52</th>
                                        <th>KT_MR</th>
                                        <th>54</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>
            
                                        <th>55</th>
                                        <th>KT_MR</th>
                                        <th>57</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>
            
                                        {{-- PUN --}}
                                        <th>19</th>
                                        <th>KT_MR</th>
                                        <th>21</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>
            
                                        <th>30</th>
                                        <th>KT_MR</th>
                                        <th>32</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>
            
                                        <th>51</th>
                                        <th>KT_MR</th>
                                        <th>53</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>
            
                                        <th>54</th>
                                        <th>KT_MR</th>
                                        <th>56</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>0</th>
                                        <th>KT_MR</th>
                                        <th>18</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>
            
                                        <th>0</th>
                                        <th>KT_MR</th>
                                        <th>29</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>
            
                                        <th>0</th>
                                        <th>KT_MR</th>
                                        <th>45</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>
            
                                        <th>0</th>
                                        <th>KT_MR</th>
                                        <th>48</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>
                                    </tr>
            
                                    <!--SB-->
                                    <tr align="center" class="text-black" >
                                        <th>SB</th>
                                        <th colspan="2">Pengurusan Sumber dan Bahan</th>
                                        <th>20</th>
                                        <th>SB_MR</th>
                                        <th>20</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>
            
                                        <th>20</th>
                                        <th>SB_MR</th>
                                        <th>20</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>
            
                                        <th>20</th>
                                        <th>SB_MR</th>
                                        <th>20</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>
            
                                        <th>20</th>
                                        <th>SB_MR</th>
                                        <th>20</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>
            
                                        {{-- PUN --}}
                                        <th>15</th>
                                        <th>SB_MR</th>
                                        <th>15</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>
            
                                        <th>15</th>
                                        <th>SB_MR</th>
                                        <th>15</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>
            
                                        <th>15</th>
                                        <th>SB_MR</th>
                                        <th>15</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>
            
                                        <th>15</th>
                                        <th>SB_MR</th>
                                        <th>15</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>0</th>
                                        <th>SB_MR</th>
                                        <th>4</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>
            
                                        <th>0</th>
                                        <th>SB_MR</th>
                                        <th>4</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>
            
                                        <th>0</th>
                                        <th>SB_MR</th>
                                        <th>4</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>
            
                                        <th>0</th>
                                        <th>SB_MR</th>
                                        <th>4</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>
                                    </tr>
            
                                    <!--PA-->
                                    <tr align="center" class="text-black" >
                                        <th>PA</th>
                                        <th colspan="2">Pengurusan Kecekapan Penggunaan Air</th>
                                        <th>14</th>
                                        <th>TL_MR</th>
                                        <th>14</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>22</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>22</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>22</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        {{-- PUN --}}
                                        <th>14</th>
                                        <th>TL_MR</th>
                                        <th>14</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>22</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>22</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>22</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>14</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>14</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
                                    </tr>
            
                                    <!--PD-->
                                    <tr align="center" class="text-black" >
                                        <th>PD</th>
                                        <th colspan="2">Pengurusan Kualiti Persekitaran Dalaman</th>
                                        <th>11</th>
                                        <th>TL_MR</th>
                                        <th>13</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>13</th>
                                        <th>TL_MR</th>
                                        <th>15</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>25</th>
                                        <th>TL_MR</th>
                                        <th>27</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>29</th>
                                        <th>TL_MR</th>
                                        <th>31</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        {{-- PUN --}}
                                        <th>1</th>
                                        <th>TL_MR</th>
                                        <th>3</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
                                        
                                        <th>13</th>
                                        <th>TL_MR</th>
                                        <th>15</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>25</th>
                                        <th>TL_MR</th>
                                        <th>27</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>27</th>
                                        <th>TL_MR</th>
                                        <th>29</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>3</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>11</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>27</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>29</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th>FL</th>
                                        <th colspan="2">Pengurusan Fasiliti Lestari</th>
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>0</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>5</th>
                                        <th>TL_MR</th>
                                        <th>10</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>5</th>
                                        <th>TL_MR</th>
                                        <th>10</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>5</th>
                                        <th>TL_MR</th>
                                        <th>10</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        {{-- PUN --}}
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>0</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>5</th>
                                        <th>TL_MR</th>
                                        <th>10</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>5</th>
                                        <th>TL_MR</th>
                                        <th>10</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>5</th>
                                        <th>TL_MR</th>
                                        <th>10</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>9</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>19</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>19</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>19</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th>IN</th>
                                        <th colspan="2">Inovasi dalam Reka Bentuk</th>
                                        <th>6</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>6</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>6</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>6</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        {{-- PUN --}}
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>0</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>6</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>6</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>6</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th colspan="3">JUMLAH</th>
                                        <th>101</th>
                                        <th>TL_MR</th>
                                        <th>103</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>131</th>
                                        <th>TL_MR</th>
                                        <th>138</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>159</th>
                                        <th>TL_MR</th>
                                        <th>166</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>166</th>
                                        <th>TL_MR</th>
                                        <th>173</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        {{-- PUN --}}
                                        <th>73</th>
                                        <th>TL_MR</th>
                                        <th>76</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>118</th>
                                        <th>TL_MR</th>
                                        <th>126</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>151</th>
                                        <th>TL_MR</th>
                                        <th>159</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>156</th>
                                        <th>TL_MR</th>
                                        <th>164</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        {{-- Sedia Ada --}}
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>62</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>0</th>
                                       <th>TL_MR</th>
                                        <th>108</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>140</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
            
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>145</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
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
            
                                    <tr align="center" style="background-color:#EB5500">
                                        <th colspan="3">MARKAH PENILAIAN</th>
                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th colspan="2">Jumlah Markah</th>
                                        <th colspan="2">TL_MR</th>
                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th colspan="2">Peratusan</th>
                                        {{-- <th colspan="2">{{$kriteria->peratusan}} %</th> --}}
                                        <th colspan="2"> %</th>

                                    </tr>
            
                                    <tr align="center" class="text-black" >
                                        <th colspan="2">Penarafan PH</th>
                                        {{-- <th colspan="2">{{$kriteria->penarafan}}<span class="star">&starf;</span></th> --}}
                                        <th colspan="2"><span class="star">&starf;</span></th>

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

            {{-- {{ $kriteria }} --}}

        </div>

        <div class="tab-pane" id="tab-3" role="tabpanel">

                <!--------Borang Penilaian Rekabentuk Bangunan-------->
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="/projek/satu_eph_bangunan/rekabentuk" method="POST">
                            @csrf

                            <h4 class="mb-3">PENILAIAN REKABENTUK BANGUNAN</h4>
                            <div class="row mx-3 mb-2">
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Kriteria:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <select class="form-select form-control" aria-label="Default select example" name="jenisProjek">
                                        <option selected="">Sila Pilih Kod Kriteria</option>
                                        <option value="TL1">TL1</option>
                                        <option value="TL2">TL2</option>
                                        <option value="TL3">TL3</option>
                                        <option value="TL4">TL4</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL6">TL6</option>
                                        <option value="TL7">TL7</option>
                                        <option value="TL8.1">TL8.1</option>
                                        <option value="TL8.2">TL8.2</option>
                                        <option value="TL8.3">TL8.3</option>
                                        <option value="TL8.4">TL8.4</option>
                                        <option value="TL8.5">TL8.5</option>
                                        <option value="TL9">TL9</option>
                                        <option value="TL9.1">TL9.1</option>
                                        <option value="TL9.2">TL9.2</option>
                                        <option value="TL10">TL10</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="KT1">KT1</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>


                                    </select>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Info kriteria:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    letak info kriteria
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Markah:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" type="number">
                                </div>
                                {{-- Untuk KT9 --}}
                                {{-- <div class="col-5 mb-2">
                                    <label class="col-form-label">Markah BEI:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" type="number">
                                </div> --}}
                                {{-- <div class="col-5 mb-2">
                                    <label class="col-form-label">Dokumen Pembuktian:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                                </div> --}}
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Ulasan/Maklumbalas:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ulasan/Maklumbalas"></textarea>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Dokumen Sokongan:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" type="file" id="formFileMultiple" multiple>
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

        <div class="tab-pane" id="tab-4" role="tabpanel">

                <!--------Borang Verifikasi Permarkahan Bangunan-------->
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="/projek/satu_eph_bangunan/verifikasi" method="POST">
                            @csrf

                            <h4 class="mb-3">VERIFIKASI PERMARKAHAN BANGUNAN</h4>
                            <div class="row mx-3 mb-2">
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Kriteria:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <select class="form-select form-control" aria-label="Default select example" name="jenisProjek">
                                        <option selected="">Sila Pilih Kod Kriteria</option>
                                        <option value="TL1">TL1</option>
                                        <option value="TL2">TL2</option>
                                    </select>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Info kriteria:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    letak info kriteria
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Markah:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" type="number">
                                </div>
                                {{-- Untuk KT9 --}}
                                {{-- <div class="col-5 mb-2">
                                    <label class="col-form-label">Markah BEI:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" type="number">
                                </div> --}}
                                {{-- <div class="col-5 mb-2">
                                    <label class="col-form-label">Dokumen Pembuktian:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                                </div> --}}
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Ulasan/Maklumbalas:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ulasan/Maklumbalas"></textarea>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Dokumen Sokongan:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" type="file" id="formFileMultiple" multiple>
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
        <div class="tab-pane" id="tab-5" role="tabpanel">

            <div class="card mt-3">
                <div class="card-body">
                    <form action="/projek/satu_eph_bangunan/validasi" method="POST">
                        @csrf

                        <h4 class="mb-3">VALIDASI PERMARKAHAN BANGUNAN</h4>
                        <div class="row mx-3 mb-2">
                            <div class="col-5 mb-2">
                                <label class="col-form-label">Kriteria:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <select class="form-select form-control" aria-label="Default select example" name="jenisProjek">
                                    <option selected="">Sila Pilih Kod Kriteria</option>
                                    <option value="TL1">TL1</option>
                                    <option value="TL2">TL2</option>
                                </select>
                            </div>
                            <div class="col-5 mb-2">
                                <label class="col-form-label">Info kriteria:</label>
                            </div>
                            <div class="col-7 mb-2">
                                letak info kriteria
                            </div>
                            <div class="col-5 mb-2">
                                <label class="col-form-label">Markah:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" type="number">
                            </div>
                            {{-- Untuk KT9 --}}
                                {{-- <div class="col-5 mb-2">
                                    <label class="col-form-label">Markah BEI:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" type="number">
                                </div> --}}
                            {{-- <div class="col-5 mb-2">
                                <label class="col-form-label">Dokumen Pembuktian:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" type="file" id="formFileMultiple" multiple>
                            </div> --}}
                            <div class="col-5 mb-2">
                                <label class="col-form-label">Ulasan/Maklumbalas:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ulasan/Maklumbalas"></textarea>
                            </div>
                            <div class="col-5 mb-2">
                                <label class="col-form-label">Dokumen Sokongan:</label>
                            </div>
                            <div class="col-7 mb-2">
                                <input class="form-control" type="file" id="formFileMultiple" multiple>
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

        <div class="tab-pane" id="tab-6" role="tabpanel">
                <!----Borang Validasi (Rayuan)----->
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="/projek/satu_eph_bangunan/rayuan" method="POST">
                            @csrf

                            <h4 class="mb-3">RAYUAN</h4>
                            <div class="row mx-3 mb-2">
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Kriteria:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <select class="form-select form-control" aria-label="Default select example" name="jenisProjek">
                                        <option selected="">Sila Pilih Kod Kriteria</option>
                                        <option value="TL1">TL1</option>
                                        <option value="TL2">TL2</option>
                                        <option value="TL3">TL3</option>
                                        <option value="TL4">TL4</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>
                                        <option value="TL5">TL5</option>

                                    </select>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Info kriteria:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    letak info kriteria
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Markah Rekabentuk:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" type="number">
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Markah Verifikasi:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" type="number">
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Markah Validasi:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" type="number">
                                </div>
                                {{-- Untuk KT9 --}}
                                {{-- <div class="col-5 mb-2">
                                    <label class="col-form-label">Markah BEI:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" type="number">
                                </div> --}}
                                {{-- <div class="col-5 mb-2">
                                    <label class="col-form-label">Dokumen Pembuktian:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                                </div> --}}
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Ulasan/Maklumbalas:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ulasan/Maklumbalas"></textarea>
                                </div>
                                <div class="col-5 mb-2">
                                    <label class="col-form-label">Dokumen Sokongan:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" type="file" id="formFileMultiple" multiple>
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