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
            </div>
        </div>
        </div>
        @role('ketua-pasukan')
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
        @endrole

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
        <li class="nav-item"><a class="nav-link active" href="#tab-1" data-bs-toggle="tab" role="tab">Rumusan</a></li>  
        <li class="nav-item"><a class="nav-link" href="#tab-5" data-bs-toggle="tab" role="tab">Skor Kad</a></li>      
        <li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab" role="tab">Rekabentuk</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab-4" data-bs-toggle="tab" role="tab">Verifikasi</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab-6" data-bs-toggle="tab" role="tab">Rayuan</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab">Sijil</a></li>
    </ul>
    <div class="tab-content">

        <div class="tab-pane active" id="tab-1" role="tabpanel">
            <div class="col mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="col mb-3">
                            <h4 class="h4 mb-3">RUMUSAN</h4>
                        </div>
                        <div class="col table-responsive scrollbar text-center">
                            <form action= "/penilaian_reka_bentuk_gpss/skor_penilaian_arkitek/{id}" method="post" enctype="multipart/form-data">
                                @method('POST')
                                  @csrf
                                        <div>
                                            <div>
                                                {{-- <form action="calculation"> --}}
                                                  <table>
                                                    <div class="row3 mx-4 table-responsive scrollbar">
                                                        <div class="col">
                                                          <table class="table table-bordered line-table text-center" style="width: 100%">
                                                            <thead class="text-white bg-orange-jkr">
                                                              <tr> 
                                                                <th >No.</th>
                                                                <th >Work Element</th>
                                                                <th >Total Point Allocated</th>
                                                                <th colspan="2">Total Points Requested</th>
                                                                <th >Total Points Awarded</th>
                                                                <th>Weightage (Refer Annex C)</th>
                                                                <th>Percentage of Green Product Scoring Score</th>
                                                                <th >Remarks</th>
                                                              </tr>
                                                              <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th >Design stage</th>
                                                                <th >Construction stage</th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                              </tr>
                                            
                                                            </thead>
                                                            <tbody class="text-black">
                                            
                                                              <tr>
                                                                <th >1</th>
                                                                <th >Architectural (Aw)</th>
                                                                <th>232</th>
                                                                <th></th>
                                                                {{-- <th>{{ $gpss_bangunan->markahPRAwRoof + $gpss_bangunan->markahPRAwWall 
                                                                    + $gpss_bangunan->markahPRAwWindow + $gpss_bangunan->markahPRAwDoor+ $gpss_bangunan->markahPRAwFloor
                                                                    + $gpss_bangunan->markahPRAwSystem
                                                                    + $gpss_bangunan->markahPRAwSanitary}} </th> --}}
                                                                <th onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></th>
                                                                <th onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></th>
                                                                <th>0.00</th>
                                                                <th>0.00%</th>
                                                                <th><input onblur="roadWorks()" type="text" min="0" max="2" class="road" name="" id=""></th>
                                                                
                                                              </tr>
                
                                                              <tr>
                                                                <th >2</th>
                                                                <th >Mechanical (Mw)</th>
                                                                <th>34</th>
                                                                <th></th>
                                                                {{-- <th>{{ $gpss_bangunan->markahPRMw }} </th> --}}
                                                                <th onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></th>
                                                                <th onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></th>
                                                                <th>0.00</th>
                                                                <th>0.00%</th>
                                                                <th><input onblur="roadWorks()" type="text" min="0" max="2" class="road" name="" id=""></th>
                                                                
                                                              </tr>
                
                                                              <tr>
                                                                <th >3</th>
                                                                <th >Electrical (Ew)</th>
                                                                <th>110</th>
                                                                <th></th>
                                                                {{-- <th>{{ $gpss_bangunan->markahPREw }}</th> --}}
                                                                <th onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></th>
                                                                <th onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></th>
                                                                <th>0.33</th>
                                                                <th>0.00%</th>
                                                                <th><input onblur="roadWorks()" type="text" min="0" max="2" class="road" name="" id=""></th>
                                                                
                                                              </tr>
                
                                                              <tr>
                                                                <th >4</th>
                                                                <th >Civil & Structural (Cw)</th>
                                                                <th>124</th>
                                                                <th></th>
                                                                {{-- <th>{{ $gpss_bangunan->markahPRCw }}</th> --}}
                                                                <th onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></th>
                                                                <th onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></th>
                                                                <th>0.00</th>
                                                                <th>0.00%</th>
                                                                <th><input onblur="roadWorks()" type="text" min="0" max="2" class="road" name="" id=""></th>
                                                                
                                                              </tr>
                
                                                              <tr>
                                                                <th >5</th>
                                                                <th >Road & Geotechnial (Rw)</th>
                                                                <th>98</th>
                                                                <th onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></th>
                                                                <th onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></th>
                                                                <th onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></th>
                                                                <th>0.33</th>
                                                                <th>0.00%</th>
                                                                <th><input onblur="roadWorks()" type="text" min="0" max="2" class="road" name="" id=""></th>
                                                                
                                                              </tr>
                
                                                              <tr>
                                                                <th >6</th>
                                                                <th >Structural(Bridge) (Sw)</th>
                                                                <th>12</th>
                                                                <th></th>
                                                                {{-- <th>{{ $gpss_bangunan->markahPRSw }}</th> --}}
                                                                <th onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></th>
                                                                <th onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></th>
                                                                <th>0.33</th>
                                                                <th>0.00%</th>
                                                                <th><input onblur="roadWorks()" type="text" min="0" max="2" class="road" name="" id=""></th>
                                                              </tr>
                
                                                              <tr>
                                                                <th ></th>
                                                                <th >Total points</th>
                                                                <th>610</th>
                                                                <th></th>
                                                                {{-- <th> {{$gpss_bangunan->markahPRAwRoof + $gpss_bangunan->markahPRAwWall + $gpss_bangunan->markahPRAwWindow + $gpss_bangunan->markahPRAwDoor + $gpss_bangunan->markahPRAwSystem + $gpss_bangunan->markahPRAwSanitary + $gpss_bangunan->markahPRMw + $gpss_bangunan->markahPREw + $gpss_bangunan->markahPRCw + $gpss_bangunan->markahPRSw}} </th> --}}
                                                                <th onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></th>
                                                                <th onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></th>
                                                                <th></th>
                                                                <th>0.00%</th>
                                                                <th><input onblur="roadWorks()" type="text" min="0" max="2" class="road" name="" id=""></th>
                                                              </tr>
                                            
                                                            </tbody>
                                                          </table>
                
                                                          {{-- <div>
                                                            <!-- Design stage -->
                                                          <div class="mb-3 form-group row">
                                                            <label class="col-sm-5 col-form-label text-black">Check by: (Project Manager)</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" autocapitalize="off" name="namaProjek"/>
                                                                </div>
                                                        </div>
                                                        <!-- Construction stage -->
                                                        <div class="mb-3 form-group row">
                                                            <label class="col-sm-5 col-form-label text-black">Verified by: (Secretariat)</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" autocapitalize="off" name="namaProjek"/>
                                                                </div>
                                                        </div>
                                                        <!-- Checked -->
                                                        <div class="mb-3 form-group row">
                                                            <label class="col-sm-5 col-form-label text-black">Muat Naik Dokumen Sokongan</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="file" autocapitalize="off" name="namaProjek"/>
                                                                </div>
                                                        </div>
                                                          </div>
                                          
                                                          <div align="right" >
                                                            <button class="btn btn-primary" type="submit" title="Simpan">Jana</button>
                                                          </div> --}}
                                                        </div>
                                                    </table>
                                
                                                    </tbody>
                                                    
                                                    </table>
                            
                                  </div>
                              </form>
                        </div>
                        <div>
                            <table>
                                <div class="row3 mx-4 table-responsive scrollbar">
                                    <div class="col">
                                      <table class="table table-bordered line-table text-center" style="width: 100%">
                                        <thead class="text-white bg-orange-jkr">
                                         
                                          <tr>
                                             <th></th>
                                            <th colspan="3" rowspan="3">SUMMARY</th>
                                            
                                            
                                            
                                          </tr>
                        
                                        </thead>
                                        <tbody class="text-black">
                      
                        
                                          <tr>
                                            <th colspan="1">GPSS Star (Bangunan) </th>
                                            <th colspan="2" >0<span class="star">&starf;</span></th>
                                            
                
                                          </tr>
                    
                                          <tr>
                                            <th colspan="1" >GPSS Star (Jalan)</th>
                                            <th colspan="2" >0<span class="star">&starf;</span></th>
                                            
                                            
                                          </tr>
                                          
                                          <tr>
                                              <th colspan="1"> MyCREST</th>
                                              <th colspan="1" >0<br>Points</th>
                                              
                                          </tr> 
                      
                                        </tbody>
                                        
                                      </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="tab-pane" id="tab-2" role="tabpanel">
        </div>

        <div class="tab-pane" id="tab-3" role="tabpanel">
            <div class="row mb-3 mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="col mb-">
                                <h4 class="h4 mb-3">PENILAIAN REKABENTUK GPSS BANGUNAN</h4>
                            </div>
                            <div class="table-responsive scrollbar col">
                              <div class="row mt-4 mb-3">
                                <div class="col">
                                    <form action="/pengurusan_maklumat/faq" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mx-4">
                                          <div class="col-3 mb-2">
                                            <label class="col-form-label">Component :</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                <select class="form-select form-control" aria-label="Default select example" name="jenisProjek">
                                                    <option selected="">Sila Pilih</option>
                                                    <option value="Generator set">Generator set</option>
                                                    <option value="Transformer">Transformer</option>
                                                    <option value="Surge Protective Device (SPD)">Surge Protective Device (SPD)</option>
                                                    <option value="Protection relays">Protection relays</option>
                                                    <option value="Circuit breaker">Circuit breaker</option>
                                                </select>
                                            </div>
                                            <div class="col-3 mb-2">
                                                <label class="col-form-label">Info Component :</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                js
                                            </div>
                        
                                            <div class="col-3 mb-2">
                                                <label class="col-form-label">Point allocated :</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                <input class="form-control" name="" type="text"/>
                                            </div>

                                            <div class="col-3 mb-2">
                                                <label class="col-form-label">Point requested (Design) :</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                <input class="form-control" name="" type="text"/>
                                            </div>
                        
                                            <div class="col-3 mb-2">
                                                <label class="col-form-label">Remark :</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                <textarea class="form-control" rows="4" name="" type="text" placeholder="Ulasan/Maklumbalas"> </textarea>
                                            </div>
    
                                            <div class="col-3 mb-2">
                                              <label class="col-form-label">Upload File:</label>
                                          </div>
                                          <div class="col-7 mb-2">
                                              <input class="form-control" name="" type="file"/>
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
                        </div>
                    </div>
                </div>
              </div>
        </div>

        <div class="tab-pane" id="tab-4" role="tabpanel">
            <div class="row mb-3 mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="col mb-">
                                <h4 class="h4 mb-3">VERIFIKASI PERMARKAHAN GPSS BANGUNAN</h4>
                            </div>
            
                            <div class="table-responsive scrollbar col">
                              <div class="row mt-4 mb-3">
                                <div class="col">
                                    <form action="/pengurusan_maklumat/faq" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mx-4">
                                          <div class="col-3 mb-2">
                                            <label class="col-form-label">Component :</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                <select class="form-select form-control" aria-label="Default select example" name="jenisProjek">
                                                    <option selected="">Sila Pilih</option>
                                                    <option value="Generator set">Generator set</option>
                                                    <option value="Transformer">Transformer</option>
                                                    <option value="Surge Protective Device (SPD)">Surge Protective Device (SPD)</option>
                                                    <option value="Protection relays">Protection relays</option>
                                                    <option value="Circuit breaker">Circuit breaker</option>
                                                </select>
                                            </div>
                                            <div class="col-3 mb-2">
                                                <label class="col-form-label">Info Component :</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                Letak info Component
                                            </div>
                        
                                            <div class="col-3 mb-2">
                                                <label class="col-form-label">Point requested (Construction) :</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                <input class="form-control" name="" type="text"/>
                                            </div>
                        
                                            <div class="col-3 mb-2">
                                                <label class="col-form-label">Remark :</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                <textarea class="form-control" rows="4" name="" type="text" placeholder="Ulasan/Maklumbalas"> </textarea>
                                            </div>
    
                                            <div class="col-3 mb-2">
                                              <label class="col-form-label">Upload File:</label>
                                          </div>
                                          <div class="col-7 mb-2">
                                              <input class="form-control" name="" type="file"/>
                                          </div>
                        
                                            
                            
                                            
                                            
                                            <div class="row mt-4">
                                                <div class="col-6 text-end">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>     
                            </div>
                        </div>
                    </div>
                </div>
              </div>  
        </div>
       

        <div class="tab-pane" id="tab-5" role="tabpanel">
            <div class="row mb-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="col mb-">
                                <h2 class="h2 mb-3">BORANG GPSS BANGUNAN</h2>
                            </div>
            
                            <div class="col">
                                <div class="card-body">
                                    <div class="row3 mx-1 table-responsive scrollbar text-center">
                                      {{-- <form action= "/penilaian_reka_bentuk_gpss/simpan_skor_penilaian_arkitek/{id}" method="post" enctype="multipart/form-data"> --}}
                                        {{-- @method('POST') --}}
                                        {{-- @csrf --}}
                                        <div class="col">
                                          <table class="table table-bordered line-table text-center" style="width: 100%">
                                            <thead class="text-white bg-orange-jkr">
                                              <tr>          
                                                <th colspan="8">Green Product Scoring Sheet</th>
                                              </tr>
                                              <tr>
                                                <th colspan="8">List of products for architectural works - Roof</th>
                                              </tr>
                                              <tr>
                                                <th>No.</th>
                                                <th >Component</th>
                                                <th>Product</th>
                                                <th>Point Allocated</th>
                                                <th>Point Requested (design)</th>
                                                {{-- <th>Point Requested (construction)</th> --}}
                                                {{-- <th>Point Awarded</th> --}}
                                                <th >Remark</th>
                                                <th >Supporting Documents</th>
                                              </tr>
                                            </thead>
                                          </table>
                                        </div>
                                      {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>        

        <div class="tab-pane" id="tab-6" role="tabpanel">
            <div class="row mb-3 mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="col mb-">
                                <h4 class="h4 mb-3">RAYUAN</h4>
                            </div>
            
                            <div class="table-responsive scrollbar col">
                              <div class="row mt-4 mb-3">
                                <div class="col">
                                    <form action="/pengurusan_maklumat/faq" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mx-4">
                                          <div class="col-3 mb-2">
                                            <label class="col-form-label">Component :</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                <select class="form-select form-control" aria-label="Default select example" name="jenisProjek">
                                                    <option selected="">Sila Pilih</option>
                                                    <option value="Generator set">Generator set</option>
                                                    <option value="Transformer">Transformer</option>
                                                    <option value="Surge Protective Device (SPD)">Surge Protective Device (SPD)</option>
                                                    <option value="Protection relays">Protection relays</option>
                                                    <option value="Circuit breaker">Circuit breaker</option>
                                                </select>
                                            </div>
                                            <div class="col-3 mb-2">
                                                <label class="col-form-label">Info Component :</label>
                                              </div>
                                              <div class="col-7 mb-2">
                                                Letak info Component
                                              </div>
                        
                                            <div class="col-3 mb-2">
                                                <label class="col-form-label">Point allocated :</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                <input class="form-control" name="" type="text"/>
                                            </div>

                                            <div class="col-3 mb-2">
                                                <label class="col-form-label">Point requested (Design) :</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                <input class="form-control" name="" type="text"/>
                                            </div>

                                            <div class="col-3 mb-2">
                                                <label class="col-form-label">Point requested (Construction) :</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                <input class="form-control" name="" type="text"/>
                                            </div>
                        
                                            <div class="col-3 mb-2">
                                                <label class="col-form-label">Remark :</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                <textarea class="form-control" rows="4" name="" type="text" placeholder="Ulasan/Maklumbalas"> </textarea>
                                            </div>

                                            <div class="col-3 mb-2">
                                                <label class="col-form-label">Comment on Appeal:</label>
                                            </div>
                                            <div class="col-7 mb-2">
                                                <textarea class="form-control" rows="4" name="" type="text" placeholder="Comment on Appeal"> </textarea>
                                            </div>
    
                                            <div class="col-3 mb-2">
                                              <label class="col-form-label">Upload File:</label>
                                          </div>
                                          <div class="col-7 mb-2">
                                              <input class="form-control" name="" type="file"/>
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

    <script>
        kriteriaRekabentuk();
        kriteriaVerifikasi();
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

        function kriteriaRayuan() {
            var lols = {!! $kriterias !!}
            var kriteriaRayuan = document.getElementById("kriteriaRayuanDipilih").value;
            let selectedKriteria = lols.find(el => el.id == kriteriaRayuan);
            document.getElementById("infoKriteriaRayuanDipilih").innerHTML = selectedKriteria.bukti;
        }
    </script>
    





@endsection