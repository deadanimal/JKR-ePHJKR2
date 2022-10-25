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
              <div class="row mx-3 mb-2">
                  <h2 class="mb-3">Pelantikan Pemudah Cara/Penilai Jalan/Pasukan Validasi</h2>
                  <div class="col-5 mb-2">
                      <label class="col-form-label">Nama:</label>
                  </div>
                  <div class="col-7 mb-2">
                      <select class="form-select form-control" aria-label="Default select example" name="jenisProjek">
                          <option selected="">Sila Pilih</option>
                          <option value="Kerajaan">Kerajaan</option>
                          <option value="Swasta">Swasta</option>
                      </select>
                  </div>
                  <div class="col-5 mb-2">
                      <label class="col-form-label">Peranan:</label>
                  </div>
                  <div class="col-7 mb-2">
                      <select class="form-select form-control" aria-label="Default select example" name="jenisProjek">
                          <option selected="">Sila Pilih</option>
                          <option value="Kerajaan">Kerajaan</option>
                          <option value="Swasta">Swasta</option>
                      </select>
                  </div>
              </div>
              <div class="col mb-2">
                <div class="row mt-3">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
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


            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="col mb-">
                                <h4 class="h4 mb-3">RUMUSAN</h4>
                            </div>
            
                            <div class="table-responsive scrollbar col">
                                    
                                      <table>
                                        <div class="row3 mx-4 table-responsive scrollbar">
                                            <div class="col">
                                              <table class="table table-bordered line-table text-center" style="width: 100%">
                                                <thead class="text-white bg-orange-jkr">
                                                  <tr align="center" style="background-color:#EB5500">
                                        
                                                    
                                                    <th colspan="3"></th>
            
                                                    <th colspan="3">DESIGN</th>
                                                   
                                                    <th colspan="3">VERIFICATION</th>
                                                    
                                     
                                                  </tr>
                                                  <tr>
                                                    
                                                    <th colspan="3">TOTAL POINTS (CORE)</th>
                                                    
                                                    <th >MAX </th>
                                                    <th >TARGET </th>
                                                    <th >ASSESSMENT </th>
            
                                                    <th >MAX </th>
                                                    <th >TARGET </th>
                                                    <th >ASSESSMENT </th>
                                                  </tr>
                                
                                                </thead>
                                                <tbody class="text-black">
                              
                                
                                                  <tr class="text-black">
                                                    <th colspan="1">SM</th>
                                                    <th colspan="2">SUSTAINABLE SITE PLANNING AND MANAGEMENT</th>
                                                    {{-- <td></td> --}}
            
                                                    {{-- design --}}
                                                    <th>18</th>
                                                    <th value="SM_TOTAL_TARGET_DESIGN"></th>
                                                    <th value="SM_TOTAL_ASSESSMENT_DESIGN"></th>
            
                                                    {{-- verifikasi --}}
                                                    <th>18</th>
                                                    <th value="SM_TOTAL_TARGET_VERIFIKASI"></th>
                                                    <th value="SM_TOTAL_ASSESSMENT_VERIFIKASI"></th>
                                                  </tr>
                            
                                                  <tr>
                                                    <th colspan="1">PT</th>
                                                    <th colspan="2">PAVEMENT TECHNOLOGIES</th>
                                                    {{-- <th></th> --}}
            
                                                    <th>12</th>
                                                    <th value="PT_TOTAL_TARGET_DESIGN"></th>
                                                    <th value="PT_TOTAL_ASSESSMENT_DESIGN"></th>
            
                                                    <th>12</th>
                                                    <th value="PT_TOTAL_TARGET_VERIFIKASI"></th>
                                                    <th value="PT_TOTAL_ASSESSMENT_VERIFIKASI"></th>
                                                  </tr>
                                
                                                  <tr>
                                                    <th colspan="1">EW</th>
                                                    <th colspan="2">ENVIRONMENT & WATER</th>
                                                    {{-- <th></th> --}}
            
                                                    <th>4</th>
                                                    <th value="EW_TOTAL_TARGET_DESIGN"></th>
                                                    <th value="EW_TOTAL_ASSESSMENT_DESIGN"></th>
            
                                                    <th>5</th>
                                                    <th value="EW_TOTAL_TARGET_VERIFIKASI"></th>
                                                    <th value="EW_TOTAL_ASSESSMENT_VERIFIKASI"></th>
                                                  </tr>
                            
                                                  <tr>
                                                    <th colspan="1">AE</th>
                                                    <th colspan="2">ACCESS & EQUITY</th>
                                                    {{-- <th></th> --}}
                                                    <th>3</th>
                                                    <th value="AE_TOTAL_TARGET_DESIGN"></th>
                                                    <th value="AE_TOTAL_ASSESSMENT_DESIGN"></th>
            
                                                    <th>5</th>
                                                    <th value="AE_TOTAL_TARGET_VERIFIKASI"></th>
                                                    <th value="AE_TOTAL_ASSESSMENT_VERIFIKASI"></th>
                                                  </tr>
                            
                                                  <tr>
                                                    <th colspan="1">CA</th>
                                                    <th colspan="2">CONSTRUCTION ACTIVITIES</th>
                                                    {{-- <th></th> --}}
                                                    <th>19</th>
                                                    <th value="CA_TOTAL_TARGET_DESIGN"></th>
                                                    <th value="CA_TOTAL_ASSESSMENT_DESIGN"></th>
            
                                                    <th>22</th>
                                                    <th value="CA_TOTAL_TARGET_VERIFIKASI"></th>
                                                    <th value="CA_TOTAL_ASSESSMENT_VERIFIKASI"></th>
                                                  </tr>
                            
                                                  <tr>
                                                    <th colspan="1">MR</th>
                                                    <th colspan="2">MATERIAL AND RESOURCES</th>
                                                    {{-- <th></th> --}}
                                                    <th>12</th>
                                                    <th value="MR_TOTAL_TARGET_DESIGN"></th>
                                                    <th value="MR_TOTAL_ASSESSMENT_DESIGN"></th>
            
                                                    <th>12</th>
                                                    <th value="MR_TOTAL_TARGET_VERIFIKASI"></th>
                                                    <th value="MR_TOTAL_ASSESSMENT_VERIFIKASI"></th>
                                                  </tr>
                            
                                                  <tr>
                                                    <th colspan="1">EC</th>
                                                    <th colspan="2">ELECTIVE CRITERIA</th>
                                                    {{-- <th></th> --}}
                                                    <th>27</th>
                                                    <th value="EC_TOTAL_TARGET_DESIGN"></th>
                                                    <th value="EC_TOTAL_ASSESSMENT_DESIGN"></th>
            
                                                    <th>27</th>
                                                    <th value="EC_TOTAL_TARGET_VERIFIKASI"></th>
                                                    <th value="EC_TOTAL_ASSESSMENT_VERIFIKASI"></th>
                                                  </tr>
                            
                                                  <tr>
                                                    <th colspan="1">IN</th>
                                                    <th colspan="2">INOVATION</th>
                                                    {{-- <th></th> --}}
                                                    <th>5</th>
                                                    <th value="IN_TOTAL_TARGET_DESIGN"></th>
                                                    <th value="IN_TOTAL_ASSESSMENT_DESIGN"></th>
            
                                                    <th>5</th>
                                                    <th value="IN_TOTAL_TARGET_VERIFIKASI"></th>
                                                    <th value="IN_TOTAL_ASSESSMENT_VERIFIKASI"></th>
                                                  </tr>
                            
                                                  <tr>
                                                    <th colspan="3">TOTAL CORE POINTS	</th>
                                                    {{-- <th></th> --}}
                                                    <th>68</th>
                                                    <th value="TOTALCP_TARGET_DESIGN"></th>
                                                    <th value="TOTALCP_ASSESSMENT_DESIGN"></th>
            
                                                    <th>74</th>
                                                    <th value="TOTALCP_TARGET_VERIFIKASI"></th>
                                                    <th value="TOTALCP_ASSESSMENT_VERIFIKASI"></th>
                                                  </tr>
                            
                                                  <tr>
                                                    <th colspan="3">TOTAL ELECTIVE & INNOVATION POINTS	</th>
                                                    {{-- <th></th> --}}
                                                    <th>12</th>
                                                    <th value="TOTALEIP_TARGET_DESIGN"></th>
                                                    <th value="TOTALEIP_ASSESSMENT_DESIGN"></th>
            
                                                    <th>15</th>
                                                    <th value="TOTALEIP_TARGET_VERIFIKASI"></th>
                                                    <th value="TOTALEIP_ASSESSMENT_VERIFIKASI"></th>
                                                  </tr>
                                                  
                              
                                                </tbody>
                            
                                              </table>
                              
                                              
                                    
                                    </div> 
                            
                                    <div>
                                        
                                        
                                          <table>
                                            <div class="row3 mx-4 table-responsive scrollbar">
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
                                                        <th colspan="2" value="SM_TOTAL_TARGET_DESIGN"></th>
                                                        <th colspan="2" value="SM_TOTAL_TARGET_DESIGN"></th>
                            
                                                      </tr>
                                
                                                      <tr>
                                                        <th colspan="1" rowspan="3">pH JKR RATING</th>
                                                        <th colspan="2" >0<span class="star">&starf;</span></th>
                                                        <th colspan="2" >0<span class="star">&starf;</span></th>
                                                        
                                                      </tr>
                                                      
                                                      <tr>
                                                          <th colspan="2">NO RECOGNITION</th>
                                                          <th colspan="2">NO RECOGNITION</th>
                                                      </tr> 
                                  
                                                    </tbody>
                                                    
                                                  </table>
                                  
                                                  {{-- <div align="center" class="mt-3">
                                                    <button class="btn btn-primary" type="submit" title="Simpan">Batal</button>
                                                    <a href="/verifikasi_permarkahan_jalan/isi_skor_kad_verifikasi2" type="button" class="btn btn-primary">Simpan</a>          
                                                  </div> --}}
                                        
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>          


        </div>

        <div class="tab-pane" id="tab-2" role="tabpanel">

            {{ $kriteria }}

        </div>

        <div class="tab-pane" id="tab-3" role="tabpanel">

          <div class="row mb-3 mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="col mb-">
                            <h4 class="h4 mb-3">PENILAIAN REKABENTUK JALAN</h4>
                        </div>
        
                        
                          <div class="row mt-4 mb-3">
                            <div class="col">
                                <form action="/pengurusan_maklumat/faq" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mx-4">
                                      <div class="col-3 mb-2">
                                        <label class="col-form-label">Kriteria :</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <select class="form-select form-control" aria-label="Default select example" name="jenisProjek">
                                                <option selected="">Sila Pilih Kod Kriteria</option>
                                                <option value="SM1">SM1</option>
                                                <option value="SM2">SM2</option>
                                                <option value="SM3">SM3</option>
                                                <option value="SM4">SM4</option>
                                                <option value="PT1">PT1</option>
                                                <option value="PT2">PT2</option>
                                                <option value="PT3">PT3</option>
                                                <option value="PT4">PT4</option>
                                                <option value="EW1">EW1</option>
                                                <option value="EW2">EW2</option>
                                                <option value="AE1">AE1</option>
                                                <option value="CA1">CA1</option>
                                                <option value="CA2">CA2</option>
                                                <option value="CA3">CA3</option>
                                                <option value="CA4">CA4</option>
                                                <option value="CA5">CA5</option>
                                                <option value="CA6">CA6</option>
                                                <option value="CA7">CA7</option>
                                                <option value="MR1">MR1</option>
                                                <option value="MR2">MR2</option>
                                                <option value="MR3">MR3</option>
                                                <option value="MR4">MR4</option>
                                                <option value="SM5 - EC">SM5 - EC</option>
                                                <option value="SM6 - EC">SM6 - EC</option>
                                                <option value="EW3 - EC">SM5 - EC</option>
                                                <option value="AE2 - EC">AE2 - EC</option>
                                                <option value="AE3 - EC">AE2 - EC</option>
                                                <option value="AE4 - EC">AE2 - EC</option>
                                                <option value="AE5 - EC">AE2 - EC</option>
                                                <option value="AE6 - EC">AE2 - EC</option>
                                                <option value="IN1">IN1</option>
                                            </select>
                                        </div>

                                        <div class="col-3 mb-2">
                                          <label class="col-form-label">Info kriteria :</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                          Letak info kriteria
                                        </div>
                    
                                        <div class="col-3 mb-2">
                                            <label class="col-form-label">Target Point :</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" name="" type="text"/>
                                        </div>
                    
                                        <div class="col-3 mb-2">
                                            <label class="col-form-label">Comment by Assessor:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <textarea class="form-control" rows="4" name="" type="text" placeholder="Ulasan/Maklumbalas"></textarea>
                                        </div>

                                        <div class="col-3 mb-2">
                                          <label class="col-form-label">Upload File:</label>
                                      </div>
                                      <div class="col-7 mb-2">
                                          <input class="form-control" name="" type="file"/>
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
                            <h2 class="h2 mb-3">VERIFIKASI PERMARKAHAN JALAN</h2>
                        </div>
        
                        <div class="table-responsive scrollbar col">
                          <div class="row mt-4 mb-3">
                            <div class="col">
                                <form action="/pengurusan_maklumat/faq" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mx-4">
                                      <div class="col-3 mb-2">
                                        <label class="col-form-label">Kriteria :</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <select class="form-select form-control" aria-label="Default select example" name="jenisProjek">
                                                <option selected="">Sila Pilih</option>
                                                <option value="SM1">SM1</option>
                                                <option value="SM2">SM2</option>
                                                <option value="SM3">SM3</option>
                                                <option value="SM4">SM4</option>
                                            </select>
                                        </div>
                                        <div class="col-3 mb-2">
                                          <label class="col-form-label">Info kriteria :</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                          Letak info kriteria
                                        </div>
                    
                                        <div class="col-3 mb-2">
                                            <label class="col-form-label">Assessment Point :</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" name="" type="text"/>
                                        </div>
                    
                                        <div class="col-3 mb-2">
                                            <label class="col-form-label">Comment by Assessor:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <textarea class="form-control" rows="4" name="" type="text"  placeholder="Ulasan/Maklumbalas"> </textarea>
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

        <div class="tab-pane" id="tab-5" role="tabpanel">
                        

        </div>        

        <div class="tab-pane" id="tab-6" role="tabpanel">
            
          <div class="row mb-3 mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="col mb-">
                            <h2 class="h2 mb-3">RAYUAN </h2>
                        </div>
        
                        <div class="table-responsive scrollbar col">
                          <div class="row mt-4 mb-3">
                            <div class="col">
                                <form action="/pengurusan_maklumat/faq" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mx-4">
                                      <div class="col-3 mb-2">
                                        <label class="col-form-label">Kriteria :</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <select class="form-select form-control" aria-label="Default select example" name="jenisProjek">
                                                <option selected="">Sila Pilih</option>
                                                <option value="SM1">SM1</option>
                                                <option value="SM2">SM2</option>
                                                <option value="SM3">SM3</option>
                                                <option value="SM4">SM4</option>
                                            </select>
                                        </div>
                                        <div class="col-3 mb-2">
                                          <label class="col-form-label">Info kriteria :</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                          Letak info kriteria
                                        </div>
                    
                                        <div class="col-3 mb-2">
                                            <label class="col-form-label">Target Point :</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" name="" type="text"/>
                                        </div>

                                        <div class="col-3 mb-2">
                                          <label class="col-form-label">Assessment Point :</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                          <input class="form-control" name="" type="text"/>
                                        </div>
                    
                                        <div class="col-3 mb-2">
                                            <label class="col-form-label">Comment by Assessor:</label>
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


</div> 





@endsection