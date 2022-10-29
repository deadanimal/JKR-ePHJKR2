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

                            <div class="col-3 mb-2">
                                <button class="btn btn-primary my-3" type="submit">Sah Projek</button>
                            </div>

                            <div class="col-3 mb-2">
                                <button class="btn btn-primary my-3" type="submit">Buat Rayuan</button>
                            </div>

                            <div class="col-3 mb-2">
                                <button class="btn btn-primary my-3" type="submit">Jana Sijil</button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            
                {{-- @if ($user_role->role->name == 'ketua-pasukan' || $user_role->role->name == 'penolong-ketua-pasukan') --}}
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
                                                <option value=8>Penilai</option>
                                                <option value=10>Pasukan Validasi</option>
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
     

            <div class="col-12 mt-6">
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

        <div class="tab mt-6">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#tab-1" data-bs-toggle="tab" role="tab">Rumusan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-7" data-bs-toggle="tab" role="tab">Skor Kad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-3" data-bs-toggle="tab" role="tab">Rekabentuk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-4" data-bs-toggle="tab" role="tab">Verifikasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-5" data-bs-toggle="tab" role="tab">Validasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-6" data-bs-toggle="tab" role="tab">Rayuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab">Sijil</a>
                </li>
            </ul>
            <div class="tab-content">

                <div class="tab-pane active" id="tab-1" role="tabpanel">

                    <!--------Rumusan Skor Kad-------->
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4 class="mb-3">RUMUSAN SKOR KAD</h4>

                            <div class="table-responsive scrollbar">
                                <table class="table table-bordered line-table shadow-table-jkr line-corner-table-jkr">
                                    <thead class="text-white line-table">
                                        {{-- <tr align="center" style="background-color:#EB5500">
                                            <th colspan="3">Jenis Pembangunan</th>
                                            <th colspan="20">Pembangunan Baru</th>
                                            <th colspan="20">Pemuliharaan/Ubah Suai/Naik Taraf (PUN)</th>
                                            <th colspan="20">Penarafan Semula/Sedia Ada</th>
                                        </tr> --}}

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
                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada A')
                                            <th colspan="5"> PEMBANGUNAN Sediaada A</th>
                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada B')
                                            <th colspan="5">PEMBANGUNAN Sediaada B</th>
                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada C')
                                            <th colspan="5">PEMBANGUNAN Sediaada C</th>
                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada D')
                                            <th colspan="5">PEMBANGUNAN Sediaada D</th>
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
                                        {{-- @foreach --}}
                                        <th>26</th>
                                        <th>TL MR</th>
                                        <th>24</th>
                                        <th>TL MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                        <th>29</th>
                                        <th>TL_MR</th>
                                        <th>27</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                        <th>29</th>
                                        <th>TL_MR</th>
                                        <th>27</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                        <th>29</th>
                                        <th>TL_MR</th>
                                        <th>27</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        {{-- PUN --}}
                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                        <th>24</th>
                                        <th>TL_MR</th>
                                        <th>23</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                        <th>27</th>
                                        <th>TL_MR</th>
                                        <th>26</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                        <th>27</th>
                                        <th>TL_MR</th>
                                        <th>26</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                        <th>27</th>
                                        <th>TL_MR</th>
                                        <th>26</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        {{-- Sedia Ada --}}
                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada A')
                                        <th>26</th>
                                        <th>TL_MR</th>
                                        <th>MMV</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada B')
                                        <th>26</th>
                                        <th>TL_MR</th>
                                        <th>17</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada C')
                                        <th>26</th>
                                        <th>TL_MR</th>
                                        <th>17</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada D')
                                        <th>26</th>
                                        <th>TL_MR</th>
                                        <th>17</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
                                        @endif
                                    </tr>

                                    <!--KT-->
                                    <tr align="center" class="text-black">
                                        <th>KT</th>
                                        <th colspan="2">Pengurusan Kecekapan Tenaga</th>
                                        @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                        <th>24</th>
                                        <th>KT_MR</th>
                                        <th>26</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                        <th>36</th>
                                        <th>KT_MR</th>
                                        <th>38</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                        <th>52</th>
                                        <th>KT_MR</th>
                                        <th>54</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                        <th>55</th>
                                        <th>KT_MR</th>
                                        <th>57</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>

                                        {{-- PUN --}}
                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                        <th>19</th>
                                        <th>KT_MR</th>
                                        <th>21</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                        <th>30</th>
                                        <th>KT_MR</th>
                                        <th>32</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                        <th>51</th>
                                        <th>KT_MR</th>
                                        <th>53</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                        <th>54</th>
                                        <th>KT_MR</th>
                                        <th>56</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>

                                        {{-- Sedia Ada --}}
                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada A')
                                        <th>0</th>
                                        <th>KT_MR</th>
                                        <th>18</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada B')
                                        <th>0</th>
                                        <th>KT_MR</th>
                                        <th>29</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada C')
                                        <th>0</th>
                                        <th>KT_MR</th>
                                        <th>45</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada D')
                                        <th>0</th>
                                        <th>KT_MR</th>
                                        <th>48</th>
                                        <th>KT_MMV</th>
                                        <th>KT_ML</th>
                                        @endif
                                    </tr>

                                    <!--SB-->
                                    <tr align="center" class="text-black">
                                        <th>SB</th>
                                        <th colspan="2">Pengurusan Sumber dan Bahan</th>
                                        @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                        <th>20</th>
                                        <th>SB_MR</th>
                                        <th>20</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                        <th>20</th>
                                        <th>SB_MR</th>
                                        <th>20</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                        <th>20</th>
                                        <th>SB_MR</th>
                                        <th>20</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                        <th>20</th>
                                        <th>SB_MR</th>
                                        <th>20</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>

                                        {{-- PUN --}}
                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                        <th>15</th>
                                        <th>SB_MR</th>
                                        <th>15</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                        <th>15</th>
                                        <th>SB_MR</th>
                                        <th>15</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                        <th>15</th>
                                        <th>SB_MR</th>
                                        <th>15</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                        <th>15</th>
                                        <th>SB_MR</th>
                                        <th>15</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>

                                        {{-- Sedia Ada --}}
                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada A')
                                        <th>0</th>
                                        <th>SB_MR</th>
                                        <th>4</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada B')
                                        <th>0</th>
                                        <th>SB_MR</th>
                                        <th>4</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada C')
                                        <th>0</th>
                                        <th>SB_MR</th>
                                        <th>4</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada D')
                                        <th>0</th>
                                        <th>SB_MR</th>
                                        <th>4</th>
                                        <th>SB_MMV</th>
                                        <th>SB_ML</th>
                                        @endif
                                    </tr>

                                    <!--PA-->
                                    <tr align="center" class="text-black">
                                        <th>PA</th>
                                        <th colspan="2">Pengurusan Kecekapan Penggunaan Air</th>
                                        @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                        <th>14</th>
                                        <th>TL_MR</th>
                                        <th>14</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                        <th>22</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                        <th>22</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                        <th>22</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        {{-- PUN --}}
                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                        <th>14</th>
                                        <th>TL_MR</th>
                                        <th>14</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                        <th>22</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                        <th>22</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                        <th>22</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        {{-- Sedia Ada --}}
                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada A')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>14</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada B')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada C')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada D')
                                        <th>14</th>
                                        <th>TL_MR</th>
                                        <th>22</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
                                        @endif
                                    </tr>

                                    <!--PD-->
                                    <tr align="center" class="text-black">
                                        <th>PD</th>
                                        <th colspan="2">Pengurusan Kualiti Persekitaran Dalaman</th>
                                        @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                        <th>11</th>
                                        <th>TL_MR</th>
                                        <th>13</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                        <th>13</th>
                                        <th>TL_MR</th>
                                        <th>15</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                        <th>25</th>
                                        <th>TL_MR</th>
                                        <th>27</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                        <th>29</th>
                                        <th>TL_MR</th>
                                        <th>31</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        {{-- PUN --}}
                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                        <th>1</th>
                                        <th>TL_MR</th>
                                        <th>3</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                        <th>13</th>
                                        <th>TL_MR</th>
                                        <th>15</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                        <th>25</th>
                                        <th>TL_MR</th>
                                        <th>27</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                        <th>27</th>
                                        <th>TL_MR</th>
                                        <th>29</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        {{-- Sedia Ada --}}
                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada A')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>3</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada B')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>11</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada C')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>27</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada D')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>29</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
                                        @endif
                                    </tr>

                                    <!--FL-->
                                    <tr align="center" class="text-black">
                                        <th>FL</th>
                                        <th colspan="2">Pengurusan Fasiliti Lestari</th>
                                        @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>0</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                        <th>5</th>
                                        <th>TL_MR</th>
                                        <th>10</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                        <th>5</th>
                                        <th>TL_MR</th>
                                        <th>10</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                        <th>5</th>
                                        <th>TL_MR</th>
                                        <th>10</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        {{-- PUN --}}
                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>0</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                        <th>5</th>
                                        <th>TL_MR</th>
                                        <th>10</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                        <th>5</th>
                                        <th>TL_MR</th>
                                        <th>10</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                        <th>5</th>
                                        <th>TL_MR</th>
                                        <th>10</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        {{-- Sedia Ada --}}
                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada A')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>9</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada B')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>19</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada C')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>19</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada D')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>19</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
                                        @endif
                                    </tr>

                                    <!--IN-->
                                    <tr align="center" class="text-black">
                                        <th>IN</th>
                                        <th colspan="2">Inovasi dalam Reka Bentuk</th>
                                        @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                        <th>6</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                        <th>6</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                        <th>6</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                        <th>6</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        {{-- PUN --}}
                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>0</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                        <th>6</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                        <th>6</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                        <th>6</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        {{-- Sedia Ada --}}
                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada A')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada B')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada C')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada D')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>6</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
                                        @endif
                                    </tr>

                                    <tr align="center" class="text-black">
                                        <th colspan="3">JUMLAH</th>
                                        @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                        <th>101</th>
                                        <th>TL_MR</th>
                                        <th>103</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                        <th>131</th>
                                        <th>TL_MR</th>
                                        <th>138</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                        <th>159</th>
                                        <th>TL_MR</th>
                                        <th>166</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                        <th>166</th>
                                        <th>TL_MR</th>
                                        <th>173</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        {{-- PUN --}}
                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                        <th>73</th>
                                        <th>TL_MR</th>
                                        <th>76</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                        <th>118</th>
                                        <th>TL_MR</th>
                                        <th>126</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                        <th>151</th>
                                        <th>TL_MR</th>
                                        <th>159</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                        <th>156</th>
                                        <th>TL_MR</th>
                                        <th>164</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        {{-- Sedia Ada --}}
                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada A')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>62</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada B')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>108</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada C')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>140</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>

                                        @elseif ($projek->kategori == 'phJKR Bangunan Sediaada D')
                                        <th>0</th>
                                        <th>TL_MR</th>
                                        <th>145</th>
                                        <th>TL_MMV</th>
                                        <th>TL_ML</th>
                                        @endif
                                    </tr>
                                </table>
                                <!--Table-->
                            </div>
                        </div>

                        <div class="mb-3 row mx-3">
                            <table class="table table-bordered line-table shadow-table-jkr">
                                <thead class="text-white line-table">
                                    <tr align="center" style="background-color:#EB5500">
                                        {{-- @if ($projek->kategori == 'phJKR Bangunan Baru A' or 'phJKR Bangunan Baru B' or 'phJKR Bangunan Baru C' or 'phJKR Bangunan Baru D' ) --}}
                                        <th colspan="3">KEPUTUSAN PENARAFAN HIJAU PERINGKAT REKA BENTUK (PRB) | VERIFIKASI PERMARKAHAN BANGUNAN | VALIDASI PERMARKAHAN BANGUNAN</th>
                                        {{-- <th colspan="3">VERIFIKASI PERMARKAHAN BANGUNAN</th>
                                        <th colspan="3">VALIDASI PERMARKAHAN BANGUNAN</th> --}}
                                    </tr>

                                    <tr align="center" style="background-color:#EB5500">
                                        <th colspan="3">MARKAH PENILAIAN</th>
                                    </tr>

                                    <tr align="center" class="text-black">
                                        <th colspan="2">Jumlah Markah</th>
                                        <th colspan="2">TL_MR</th>
                                    </tr>

                                    <tr align="center" class="text-black">
                                        <th colspan="2">Peratusan</th>
                                        {{-- <th colspan="2">{{$kriteria->peratusan}} %</th> --}}
                                        <th colspan="2"> %</th>

                                    </tr>

                                    <tr align="center" class="text-black">
                                        <th colspan="2">Penarafan PH</th>
                                        {{-- <th colspan="2">{{$kriteria->penarafan}}<span class="star">&starf;</span></th> --}}
                                        <th colspan="2"><span class="star">&starf;</span></th>

                                    </tr>

                                    <tr align="center" style="background-color:#EB5500">
                                        <th colspan="2">Petunjuk Penarafan</th>
                                        <th>Sijil Penarafan</th>
                                    </tr>

                                    <tr align="center" class="text-black">
                                        <th><span class="star">&starf; &starf; &starf; &starf; &starf;</span></th>
                                        <th>80 - 100</th>
                                        <th>Kecemerlangan Global</th>
                                    </tr>

                                    <tr align="center" class="text-black">
                                        <th><span class="star">&starf; &starf; &starf; &starf;</span></th>
                                        <th>65 - 79</th>
                                        <th>Kecemerlangan Nasional</th>
                                    </tr>

                                    <tr align="center" class="text-black">
                                        <th><span class="star">&starf; &starf; &starf;</span></th>
                                        <th>45 - 64</th>
                                        <th>Amalan Pengurusan Terbaik</th>
                                    </tr>

                                    <tr align="center" class="text-black">
                                        <th><span class="star">&starf; &starf;</span></th>
                                        <th>30 - 44</th>
                                        <th>Potensi Pengiktirafan</th>
                                    </tr>

                                    <tr align="center" class="text-black">
                                        <th><span class="star">&starf;</span></th>
                                        <th>
                                            < 29</th>
                                        <th>Sijil Penyertaan</th>
                                    </tr>
                                </thead>
                            </table>
                            <!--Table Keputusan Penarafan Hijau Peringkat Reka Bentuk(PRB)-->
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tab-2" role="tabpanel">

                </div>

                <div class="tab-pane" id="tab-3" role="tabpanel">

                    <!--------Borang Penilaian Rekabentuk Bangunan-------->
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
                                            @foreach ($kriterias as $akriteria)
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
                                    <div class="col-5 mb-2">
                                        <label class="col-form-label">Markah:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" type="number" name="markah">
                                    </div>
                                    {{-- Untuk KT9 --}}
                                    <div class="col-5 mb-2">
                                        @if ($projek->kategori == 'phJKR Bangunan Baru C' or 'phJKR Bangunan Baru D' or 'phJKR Bangunan PUN C' or 
                                        'phJKR Bangunan PUN D' or 'phJKR Bangunan Sediaada C' or 'phJKR Bangunan Sediaada D')
                                            <label class="col-form-label">Markah BEI:</label>
                                        @endif
                                    </div>
                                    <div class="col-7 mb-2">
                                        @if ($projek->kategori == 'phJKR Bangunan Baru C' or 'phJKR Bangunan Baru D' or 'phJKR Bangunan PUN C' or 
                                        'phJKR Bangunan PUN D' or 'phJKR Bangunan Sediaada C' or 'phJKR Bangunan Sediaada D')   
                                        <input class="form-control" type="number">
                                        @endif
                                    </div>
                                    <div class="col-5 mb-2">
                                        <label class="col-form-label">Ulasan:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <textarea class="form-control" rows="3" placeholder="Ulasan" name="ulasan"></textarea>
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

                <div class="tab-pane" id="tab-4" role="tabpanel">

                    <!--------Borang Verifikasi Permarkahan Bangunan-------->
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
                                            @foreach ($kriterias as $akriteria)
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
                                        <input class="form-control" type="number" name="markah">
                                    </div>
                                    {{-- Untuk KT9 --}}
                                    <div class="col-5 mb-2">
                                        @if ($projek->kategori == 'phJKR Bangunan Baru C' or 'phJKR Bangunan Baru D' or 'phJKR Bangunan PUN C' or 
                                        'phJKR Bangunan PUN D' or 'phJKR Bangunan Sediaada C' or 'phJKR Bangunan Sediaada D')
                                            <label class="col-form-label">Markah BEI:</label>
                                        @endif
                                    </div>
                                    <div class="col-7 mb-2">
                                        @if ($projek->kategori == 'phJKR Bangunan Baru C' or 'phJKR Bangunan Baru D' or 'phJKR Bangunan PUN C' or 
                                        'phJKR Bangunan PUN D' or 'phJKR Bangunan Sediaada C' or 'phJKR Bangunan Sediaada D')   
                                        <input class="form-control" type="number">
                                        @endif
                                    </div>
                                    <div class="col-5 mb-2">
                                        <label class="col-form-label">Ulasan:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <textarea class="form-control" rows="3" placeholder="Ulasan" name="ulasan"></textarea>
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
                <div class="tab-pane" id="tab-5" role="tabpanel">

                    <!--------Borang Validasi Permarkahan Bangunan-------->
                    {{-- <div class="card mt-3">
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
                                            @foreach ($kriterias as $akriteria)
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
                                        <input class="form-control" type="number" name="markah">
                                    </div>
                                    <div class="col-5 mb-2">
                                        <label class="col-form-label">Ulasan:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <textarea class="form-control" rows="3" placeholder="Ulasan" name="ulasan"></textarea>
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
                    </div> --}}

                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="table-responsive scrollbar">
                                <table id="rekabentuk" class="table table-bordered skor-datatable line-table display">
                                    <thead class="text-white">
                                        <tr class="pg-1" align="center" style="background-color:#EB5500">
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                            <th colspan="9">Pembangunan Baru A</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                            <th colspan="9">Pembangunan Baru B</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                            <th colspan="9">Pembangunan Baru C</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                            <th colspan="9">Pembangunan Baru D</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                            <th colspan="9">Pembangunan PUN A</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                            <th colspan="9">Pembangunan PUN B</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                            <th colspan="9">Pembangunan PUN C</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                            <th colspan="9">Pembangunan PUN D</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sediaada A')
                                            <th colspan="9">Pembangunan Sediaada A</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sediaada B')
                                            <th colspan="9">Pembangunan Sediaada B</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sediaada C')
                                            <th colspan="9">Pembangunan Sediaada C</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sediaada D')
                                            <th colspan="9">Pembangunan Sediaada D</th>
                                            @endif
                                        </tr>
                                        <tr class="pg-1" align="center" style="background-color:#EB5500">
                                            <th>Bil.</th>
                                            <th>Kod</th>
                                            <th>Kriteria</th>
                                            <th>Kategori Bangunan</th>
                                            <th>Markah Maksimum</th>
                                            <th>Markah</th>
                                            <th>Dokumen Pembuktian</th>
                                            <th>Ulasan/Maklumbalas</th>
                                            <th>Dokumen Sokongan</th>
                                        </tr>

                                        @foreach ($kriterias as $k)
                                        {{-- @foreach ($markah as $m) --}}
                                        <tr class="text-black" align="center">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$k->kod}}</td>
                                            <td>{{$k->nama}}</td>
                                            <td>{{$k->borang}}</td>
                                            <td>{{$k->maksimum}}</td>
                                            <td>test</td>
                                            <td>{{$k->bukti}}</td>
                                            <td>Ulasan/Maklumbalas</td>
                                            <td>Dokumen Sokongan</td>
                                        </tr>
                                        {{-- @endforeach --}}
                                        @endforeach
                                    </thead>
                                </table>
                            </div>
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
                                        <select class="form-select form-control" aria-label="Default select example"
                                            name="jenisProjek">
                                            <option selected="">Sila Pilih Kod Kriteria</option>
                                            <option value="TL1">TL1</option>
                                            <option value="TL2">TL2</option>
                                            <option value="TL3">TL3</option>
                                            <option value="TL4">TL4</option>
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
                                        <label class="col-form-label">Ulasan:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ulasan"></textarea>
                                    </div>
                                    <div class="col-5 mb-2">
                                        <label class="col-form-label">Comment on Appeal:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Comment on Appeal"></textarea>
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

                <div class="tab-pane" id="tab-7" role="tabpanel">
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="table-responsive scrollbar">
                                <table id="rekabentuk" class="table table-bordered skor-datatable line-table display">
                                    <thead class="text-white">
                                        <tr class="pg-1" align="center" style="background-color:#EB5500">
                                            @if ($projek->kategori == 'phJKR Bangunan Baru A')
                                            <th colspan="9">Pembangunan Baru A</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru B')
                                            <th colspan="9">Pembangunan Baru B</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru C')
                                            <th colspan="9">Pembangunan Baru C</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Baru D')
                                            <th colspan="9">Pembangunan Baru D</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN A')
                                            <th colspan="9">Pembangunan PUN A</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN B')
                                            <th colspan="9">Pembangunan PUN B</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN C')
                                            <th colspan="9">Pembangunan PUN C</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan PUN D')
                                            <th colspan="9">Pembangunan PUN D</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sediaada A')
                                            <th colspan="9">Pembangunan Sediaada A</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sediaada B')
                                            <th colspan="9">Pembangunan Sediaada B</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sediaada C')
                                            <th colspan="9">Pembangunan Sediaada C</th>
                                            @elseif ($projek->kategori == 'phJKR Bangunan Sediaada D')
                                            <th colspan="9">Pembangunan Sediaada D</th>
                                            @endif
                                        </tr>
                                        <tr class="pg-1" align="center" style="background-color:#EB5500">
                                            <th>Kod</th>
                                            <th>Kriteria</th>
                                            <th>Markah Maksimum</th>
                                            <th>Markah</th>
                                            <th>Ulasan/Maklumbalas</th>
                                            <th>Dokumen Sokongan</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Container-->


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
                    columns: [
                        {
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
