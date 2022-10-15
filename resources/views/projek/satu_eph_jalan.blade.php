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


            <div class="row mb-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="col mb-">
                                <h2 class="h2 mb-3">RUMUSAN SKOR KAD</h2>
                            </div>
            
                            <div class="col">
                                    <form action="">
                                      <table>
                                        <div class="row3 mx-4 table-responsive scrollbar">
                                            <div class="col">
                                              <table class="table table-bordered line-table text-center" style="width: 100%">
                                                <thead class="text-white bg-orange-jkr">
                                                  <tr>
                                        
                                                    
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
                                                <tbody>
                              
                                
                                                  <tr>
                                                    <td colspan="1">SM</td>
                                                    <td colspan="2">SUSTAINABLE SITE PLANNING AND MANAGEMENT</td>
                                                    {{-- <td></td> --}}
            
                                                    {{-- design --}}
                                                    <td>18</td>
                                                    <td>0</td>
                                                    <td>0</td>
            
                                                    {{-- verifikasi --}}
                                                    <td>18</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                  </tr>
                            
                                                  <tr>
                                                    <td colspan="1">PT</td>
                                                    <td colspan="2">PAVEMENT TECHNOLOGIES</td>
                                                    {{-- <td></td> --}}
            
                                                    <td>12</td>
                                                    <td>0</td>
                                                    <td>0</td>
            
                                                    <td>12</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1">EW</td>
                                                    <td colspan="2">ENVIRONMENT & WATER</td>
                                                    {{-- <td></td> --}}
            
                                                    <td>4</td>
                                                    <td>0</td>
                                                    <td>0</td>
            
                                                    <td>5</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                  </tr>
                            
                                                  <tr>
                                                    <td colspan="1">AE</td>
                                                    <td colspan="2">ACCESS & EQUITY</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>0</td>
            
                                                    <td>5</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                  </tr>
                            
                                                  <tr>
                                                    <td colspan="1">CA</td>
                                                    <td colspan="2">CONSTRUCTION ACTIVITIES</td>
                                                    {{-- <td></td> --}}
                                                    <td>19</td>
                                                    <td>0</td>
                                                    <td>0</td>
            
                                                    <td>22</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                  </tr>
                            
                                                  <tr>
                                                    <td colspan="1">MR</td>
                                                    <td colspan="2">MATERIAL AND RESOURCES</td>
                                                    {{-- <td></td> --}}
                                                    <td>12</td>
                                                    <td>0</td>
                                                    <td>0</td>
            
                                                    <td>12</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                  </tr>
                            
                                                  <tr>
                                                    <td colspan="1">EC</td>
                                                    <td colspan="2">ELECTIVE CRITERIA</td>
                                                    {{-- <td></td> --}}
                                                    <td>27</td>
                                                    <td>0</td>
                                                    <td>0</td>
            
                                                    <td>27</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                  </tr>
                            
                                                  <tr>
                                                    <td colspan="1">IN</td>
                                                    <td colspan="2">INOVATION</td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    <td>0</td>
            
                                                    <td>5</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                  </tr>
                            
                                                  <tr>
                                                    <td colspan="3">TOTAL CORE POINTS	</td>
                                                    {{-- <td></td> --}}
                                                    <td>68</td>
                                                    <td>0</td>
                                                    <td>0</td>
            
                                                    <td>74</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                  </tr>
                            
                                                  <tr>
                                                    <td colspan="3">TOTAL ELECTIVE & INNOVATION POINTS	</td>
                                                    {{-- <td></td> --}}
                                                    <td>12</td>
                                                    <td>0</td>
                                                    <td>0</td>
            
                                                    <td>15</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                  </tr>
                                                  
                              
                                                </tbody>
                            
                                              </table>
                              
                                              
                                    </form>
                                    </div> 
                            
                                    <div>
                                        <form action="" method="POST">
                                          @csrf
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
                                                    <tbody>
                                  
                                    
                                                      <tr>
                                                        <td colspan="1">TOTAL SCORE (%)</td>
                                                        <td colspan="2">0</td>
                                                        <td colspan="2">0</td>
                            
                                                      </tr>
                                
                                                      <tr>
                                                        <td colspan="1" rowspan="3">pH JKR RATING</td>
                                                        <td colspan="2" >0<span class="star">&starf;</span></td>
                                                        <td colspan="2" >0<span class="star">&starf;</span></td>
                                                        
                                                      </tr>
                                                      
                                                      <tr>
                                                          <td colspan="2">NO RECOGNITION</td>
                                                          <td colspan="2">NO RECOGNITION</td>
                                                      </tr> 
                                  
                                                    </tbody>
                                                    
                                                  </table>
                                  
                                                  {{-- <div align="center" class="mt-3">
                                                    <button class="btn btn-primary" type="submit" title="Simpan">Batal</button>
                                                    <a href="/verifikasi_permarkahan_jalan/isi_skor_kad_verifikasi2" type="button" class="btn btn-primary">Simpan</a>          
                                                  </div> --}}
                                        </form>
                                    
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


            <div class="row mb-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="col mb-">
                                <h2 class="h2 mb-3">BORANG PENILAIAN REKA BENTUK JALAN</h2>
                            </div>
                            <div class="col">
                                <div>
                                    <form action="/projek/{{$projek->id}}/eph-jalan/rekabentuk" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <table>
                                        <div class="row3 mx-4 table-responsive scrollbar">
                                            <div class="col">
                                              <table class="table table-bordered line-table text-center" style="width: 100%">
                                                <thead class="text-white bg-orange-jkr">
                                                  <tr>
                                        
                                                    
                                                    <th >Kod</th>
                                                    <th >Kriteria</th>
                                                    <th >Responsibility</th>
                                                    <th colspan="3">Design</th>
                                                    
                                     
                                                  </tr>
                                                  <tr>
                                                    
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th >MAX POINT</th>
                                                    <th >TARGET POINT</th>
                                                    {{-- <th >ASSESSMENT POINT</th> --}}
                                                    <th>COMMENT BY ASSESSOR</th>
                                                  </tr>
                                
                                                </thead>
                                                <tbody>
                              
                                                  <tr>
                                                    <td>SM</td>
                                                    <td colspan="5" align="left">SUSTAINABLE SITE PLANNING AND MANAGEMENT</td>  
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="12">SM1</td>
                                                    <td colspan="2">REQUIREMENT FOR ROAD WORKS DESIGN</td>
                                                    <td>7</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Traffic study</td>
                                                    <td rowspan="7">CJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" id="SM1_1_TP_DESIGN" name="SM1_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" id="SM1_1_COMMENT_DESIGN" name="SM1_1_COMMENT_DESIGN"></td>
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Site investigation data</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" id="SM1_2_TP_DESIGN" name="SM1_2_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" id="SM1_2_COMMENT_DESIGN" name="SM1_2_COMMENT_DESIGN"></td>
                                                   
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Flood records</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" id="SM1_3_TP_DESIGN" name="SM1_3_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" id="SM1_3_COMMENT_DESIGN" name="SM1_3_COMMENT_DESIGN"></td>
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Response to public complaints or requests from public, local authority & etc.</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" id="SM1_4_TP_DESIGN" name="SM1_4_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" id="SM1_4_COMMENT_DESIGN" name="SM1_4_COMMENT_DESIGN"></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Value Management (VM)</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" id="SM1_5_TP_DESIGN" name="SM1_5_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" id="SM1_5_COMMENT_DESIGN" name="SM1_5_COMMENT_DESIGN"></td>
                                               
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Survey Drawing</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" id="SM1_6_TP_DESIGN" name="SM1_6_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" id="SM1_6_COMMENT_DESIGN" name="SM1_6_COMMENT_DESIGN"></td>
                                                    
                                                
                                                  </tr>
                              
                                                  <tr>
                                                    <td >As Built Drawings</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" id="SM1_7_TP_DESIGN" name="SM1_7_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" id="SM1_7_COMMENT_DESIGN" name="SM1_7_COMMENT_DESIGN"></td>
                                              
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Accident Reports</td>
                                                    <td>CSFJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" id="SM1_8_TP_DESIGN" name="SM1_8_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" id="SM1_8_COMMENT_DESIGN" name="SM1_8_COMMENT_DESIGN"></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Structure replacement (Bridge assessment report/ Inventory card)</td>
                                                    <td rowspan="3">CJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" id="SM1_9_TP_DESIGN" name="SM1_9_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" id="SM1_9_COMMENT_DESIGN" name="SM1_9_COMMENT_DESIGN"></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Forensic Report</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" id="SM1_10_TP_DESIGN" name="SM1_10_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" id="SM1_10_COMMENT_DESIGN" name="SM1_10_COMMENT_DESIGN"></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Pavement evaluation (testing & report)</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" id="SM1_11_TP_DESIGN" name="SM1_11_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" d="SM1_11_COMMENT_DESIGN" name="SM1_11_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <td style="display: none">markahSM1<input type="text" name="markahSM1" id="markahSM1" /></td>            
                              
                              
                                                 
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="9">SM2</td>
                                                    <td colspan="2">ROAD ALIGNMENT</td>
                                                    <td>6</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Slope not more than 6 berms</td>
                                                    <td rowspan="7">CJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" id="SM2_1_TP_DESIGN" name="SM2_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" id="SM2_1_COMMENT_DESIGN" name="SM2_1_COMMENT_DESIGN"></td>
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Cut slope not steeper than 1:1.5 or Rock slope not steeper than 4:1 </td>
                                                    {{-- <td rowspan="7">CKG</td> --}}
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" id="SM2_2_TP_DESIGN" name="SM2_2_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" id="SM2_2_COMMENT_DESIGN" name="SM2_2_COMMENT_DESIGN"></td>
                                                   
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Fill slope not steeper than 1:2</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" id="SM2_3_TP_DESIGN" name="SM2_3_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" id="SM2_3_COMMENT_DESIGN" name="SM2_3_COMMENT_DESIGN"></td>
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Height of slope not more than 6m</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" id="SM2_4_TP_DESIGN" name="SM2_4_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" id="SM2_4_COMMENT_DESIGN" name="SM2_4_COMMENT_DESIGN"></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Maximum grade less than 7%</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" id="SM2_5_TP_DESIGN" name="SM2_5_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road"id="SM2_5_COMMENT_DESIGN" name="SM2_5_COMMENT_DESIGN"></td>
                                               
                                                  </tr>
                              
                                                  <tr>
                                                    <td >No reclamation involved existing water bodies</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" id="SM2_6_TP_DESIGN" name="SM2_6_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" id="SM2_6_COMMENT_DESIGN" name="SM2_6_COMMENT_DESIGN"></td>
                                                    
                                                
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provide added uphill lane (climbing lane) where the length of critical grade exceeds 5%</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" id="SM2_7_TP_DESIGN" name="SM2_7_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" id="SM2_7_COMMENT_DESIGN" name="SM2_7_COMMENT_DESIGN"></td>
                                              
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Not in Sensitive Area OR Sensitive area with mitigation plan</td>
                                                    <td>CASKT</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" id="SM2_8_TP_DESIGN" name="SM2_8_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" id="SM2_8_COMMENT_DESIGN" name="SM2_8_COMMENT_DESIGN"></td>
                                                    
                                                  </tr>
                              
                                                  <td style="display: none">markahSM2<input type="text" name="markahSM2" id="markahSM2" /></td>            
                              
                              
                                                
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="7">SM3</td>
                                                    <td colspan="2">SITE VEGETATION</td>
                                                    <td>3</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                 
                                                  </tr>
            
            
                                
                                                  <tr>
                                                    <td >Use non-invasive plant species(example: grass/creeper) </td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" id="SM3_1_TP_DESIGN" name="SM3_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" id="SM3_1_COMMENT_DESIGN" name="SM3_1_COMMENT_DESIGN"></td>
                                                   
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Use bio-engineering techniques (example: vetiver grass, creeper and regeneration of natural plants and material )</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" id="SM3_2_TP_DESIGN" name="SM3_2_TP_DESIGN" ></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" id="SM3_2_COMMENT_DESIGN" name="SM3_2_COMMENT_DESIGN"></td>
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Use native plant species</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" id="SM3_3_TP_DESIGN" name="SM3_3_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" id="SM3_3_COMMENT_DESIGN" name="SM3_3_COMMENT_DESIGN"></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Use of grass/creeper for slope protection /unpaved shoulder</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" id="SM3_4_TP_DESIGN" name="SM3_4_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" id="SM3_4_COMMENT_DESIGN" name="SM3_4_COMMENT_DESIGN"></td>
                                               
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Hydroseeding with Bio-degradable Erosion Control Blanket(BECB) on slope</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" id="SM3_5_TP_DESIGN" name="SM3_5_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" id="SM3_5_COMMENT_DESIGN" name="SM3_5_COMMENT_DESIGN"></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Preservation of existing tree/vegetation</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" id="SM3_6_TP_DESIGN" name="SM3_6_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" id="SM3_6_COMMENT_DESIGN" name="SM3_6_COMMENT_DESIGN"></td>
                                              
                                                  </tr>
                              
                                                  <td style="display: none">markahSM3<input type="text" name="markahSM3" id="markahSM3" /></td>            
                              
                              
                              
                                                 
                              
                              
                                                  <td colspan="1" rowspan="4">SM4</td>
                                                  <td colspan="2">NOISE MITIGATION PLAN</td>
                                                  <td>2</td>
                                                  <td>0</td>
                                                  {{-- <td>0</td> --}}
                                                  <td></td>
                               
                                                </tr>
                              
                                                <tr>
                                                  <td >Supply and install noise barrier including maintenance during the construction and defects liability period (for urban area / residential area)</td>
                                                  <td rowspan="4">CJ</td>
                                                  <td>1</td>
                                                  <td><input onblur="findTargetPointSM4()" type="number" min="0" max="2" class="targetPointSM4" id="SM4_1_TP_DESIGN" name="SM4_1_TP_DESIGN"></td>
                                                  {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                  <td><input onblur="commentSM4()" type="text" min="0" max="2" class="road" id="SM3_1_COMMENT_DESIGN" name="SM3_1_COMMENT_DESIGN"></td>
                                                </tr>
                              
                                                <tr>
                                                  <td >To ensure that all site equipment are in using low decibel to control noise pollution </td>
                                                  <td>1</td>
                                                  <td><input onblur="findTargetPointSM4()" type="number" min="0" max="2" class="targetPointSM4" id="SM4_2_TP_DESIGN" name="SM4_2_TP_DESIGN"></td>
                                                  {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                  <td><input onblur="commentSM4()" type="text" min="0" max="2" class="road" id="SM3_2_COMMENT_DESIGN" name="SM3_2_COMMENT_DESIGN"></td>
                                                 
                                                </tr>
                              
                                                <tr>
                                                  <td >To ensure using all machineryon site are low decibel to minimize the amount of noise generated </td>
                                                  <td>1</td>
                                                  <td><input onblur="findTargetPointSM4()" type="number" min="0" max="2" class="targetPointSM4" id="SM4_3_TP_DESIGN" name="SM4_3_TP_DESIGN"></td>
                                                  {{-- <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td> --}}
                                                  <td><input onblur="commentSM4()" type="text" min="0" max="2" class="road" id="SM3_3_COMMENT_DESIGN" name="SM3_3_COMMENT_DESIGN"></td>
                                                  
                                                </tr>
                              
                                                <td style="display: none">markahSM4<input type="text" name="markahSM4" id="markahSM4" /></td>            
                              
                              
                                                <tr >
                                                  <td colspan="3"> SUB TOTAL SM POINT</td>
                                                  <td>18</td>
                                                  <td></td>
                                                  {{-- <td></td> --}}
                                                  <td></td>
                                                </tr>
            
                                                <tr>
                                                    <td>PT</td>
                                                    <td colspan="5" align="left">PAVEMENT TECHNOLOGIES</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="6">PT1</td>
                                                    <td colspan="2">EXISTING PAVEMENT EVALUATION</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td>Surface Condition Survey</td>
                                                    <td rowspan="5">CSFJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT1()" type="number" min="0" max="2" class="targetPointPT1" id="PT1_1_TP_DESIGN" name="PT1_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointPT1()" type="number" min="0" max="2" class="assessmentPointPT1"></td> --}}
                                                    <td><input onblur="commentPT1()" type="text" min="0" max="2" class="road" id="PT1_1_COMMENT_DESIGN" name="PT1_1_COMMENT_DESIGN"></td>
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Coring & Dynamic Cone Penetrometer test</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT1()" type="number" min="0" max="2" class="targetPointPT1" id="PT1_2_TP_DESIGN" name="PT1_2_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointPT1()" type="number" min="0" max="2" class="assessmentPointPT1"></td> --}}
                                                    <td><input onblur="commentPT1()" type="text" min="0" max="2" class="road" id="PT1_2_COMMENT_DESIGN" name="PT1_2_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Deflection test</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT1()" type="number" min="0" max="2" class="targetPointPT1" id="PT1_3_TP_DESIGN" name="PT1_3_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointPT1()" type="number" min="0" max="2" class="assessmentPointPT1"></td> --}}
                                                    <td><input onblur="commentPT1()" type="text" min="0" max="2" class="road" id="PT1_3_COMMENT_DESIGN" name="PT1_3_COMMENT_DESIGN"></td>
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Trial pit & Laboratory test</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT1()" type="number" min="0" max="2" class="targetPointPT1" id="PT1_4_TP_DESIGN" name="PT1_4_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointPT1()" type="number" min="0" max="2" class="assessmentPointPT1"></td> --}}
                                                    <td><input onblur="commentPT1()" type="text" min="0" max="2" class="road" id="PT1_4_COMMENT_DESIGN" name="PT1_4_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Surface Regularity Test (International Roughness Index, IRI)</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT1()" type="number" min="0" max="2" class="targetPointPT1" id="PT1_5_TP_DESIGN" name="PT1_5_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointPT1()" type="number" min="0" max="2" class="assessmentPointPT1"></td> --}}
                                                    <td><input onblur="commentPT1()" type="text" min="0" max="2" class="road" id="PT1_5_COMMENT_DESIGN" name="PT1_5_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahPT1<input type="text" name="markahPT1" id="markahPT1" /></td>            
                                                  </tr>
                              
                                                  
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="4">PT 2</td>
                                                    <td colspan="2">PERMEABLE PAVEMENT</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  {{-- <tr>
                                                    <td rowspan="9">SM2</td>
                                                    <td colspan="2">Road alignment</td>
                                                    <td>6</td>
                                                    
                                                    <td><input onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></td>
                                                    <td><input onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></td>
                                                    <td><input onblur="roadWorks()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr> --}}
                              
                                                  <tr>
                                                    <td >Use of permeable (porous) pavement mix design with higher range of air void (18 -25%)</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT2()" type="number" min="0" max="2" class="targetPointPT2" id="PT2_1_TP_DESIGN" name="PT2_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointPT2()" type="number" min="0" max="2" class="assessmentPointPT2"></td> --}}
                                                    <td><input onblur="commentPT2()" type="text" min="0" max="2" class="road" id="PT2_1_COMMENT_DESIGN" name="PT2_1_COMMENT_DESIGN"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Pavement crossfall 2.5% and min unpaved shoulder to drain gradient 0.7%-4%</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT2()" type="number" min="0" max="2" class="targetPointPT2" id="PT2_2_TP_DESIGN" name="PT2_2_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointPT2()" type="number" min="0" max="2" class="assessmentPointPT2"></td> --}}
                                                    <td><input onblur="commentPT2()" type="text" min="0" max="2" class="road" id="PT2_2_COMMENT_DESIGN" name="PT2_2_COMMENT_DESIGN"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Drainability of porous asphalt wearing course having a minimum thickness of 50mm shall not be less than 10 litre/minute through a discharge area of 54cm2</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT2()" type="number" min="0" max="2" class="targetPointPT2" id="PT2_3_TP_DESIGN" name="PT2_3_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointPT2()" type="number" min="0" max="2" class="assessmentPointPT2"></td> --}}
                                                    <td><input onblur="commentPT2()" type="text" min="0" max="2" class="road" id="PT2_3_COMMENT_DESIGN" name="PT2_3_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahPT2<input type="text" name="markahPT2" id="markahPT2" /></td>            
                                                  </tr>
                                                  
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">PT 3</td>
                                                    <td colspan="2">PAVEMENT PERFORMANCE TRACKING</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >"Use a process that allows construction quality measurements and long-term pavement performance measurements to be spatially located and correlated to one another
                                                      i. Construction quality measurements must be spatially located such that the location of the quality measurement is known
                                                      ii. Pavement condition measurements must be taken at least every 2 3 years (To be confirm) and must be spatially located to a specific portion of roadway or location within roadway
                                                      iii. An operational system, computer based or otherwise that is capable of storing construction quality measurements, pavement condition measurement and their spatial locations
                                                      iv. The designated system must be demonstrated in operation, be capable of updates and have written plans for its maintenance in perpetuity"</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointPT3()" type="number" min="0" max="2" class="targetPointPT3" id="PT3_1_TP_DESIGN" name="PT3_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointPT3()" type="number" min="0" max="2" class="assessmentPointPT3" id="PT2_2_TP_DESIGN" name="PT2_2_TP_DESIGN"></td> --}}
                                                    <td><input onblur="commentPT3()" type="text" min="0" max="2" class="road" id="PT3_1_COMMENT_DESIGN" name="PT3_1_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahPT3<input type="text" name="markahPT3" id="markahPT3" /></td>            
                                                  </tr>
                                                  
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="5">PT 4</td>
                                                    <td colspan="2">LONG-LIFE PAVEMENT</td>
                                                    {{-- <td></td> --}}
                                                    <td>4</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Meet the requirements of Arahan Teknik Jalan 5/85 (Pindaan 2013): Manual for the structural design of flexible pavement</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT4()" type="number" min="0" max="2" class="targetPointPT4" id="PT4_1_TP_DESIGN" name="PT4_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointPT4()" type="number" min="0" max="2" class="assessmentPointPT4"></td> --}}
                                                    <td><input onblur="commentPT4()" type="text" min="0" max="2" class="road" id="PT4_1_COMMENT_DESIGN" name="PT4_1_COMMENT_DESIGN"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Pavement design is in accordance with a design procedure that is formally recognized, adopted and documented by the agency</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT4()" type="number" min="0" max="2" class="targetPointPT4" id="PT4_2_TP_DESIGN" name="PT4_2_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointPT4()" type="number" min="0" max="2" class="assessmentPointPT4"></td> --}}
                                                    <td><input onblur="commentPT4()" type="text" min="0" max="2" class="road" id="PT4_2_COMMENT_DESIGN" name="PT4_2_COMMENT_DESIGN"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Drainability surface runoff by providing scupper drain with hinge grating or equivalent to  ensure no debris blockage and maintainability</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT4()" type="number" min="0" max="2" class="targetPointPT4" id="PT4_3_TP_DESIGN" name="PT4_3_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointPT4()" type="number" min="0" max="2" class="assessmentPointPT4"></td> --}}
                                                    <td><input onblur="commentPT4()" type="text" min="0" max="2" class="road" id="PT4_3_COMMENT_DESIGN" name="PT4_3_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >"Rigid Pavement > 40 years design life
                                                      OR
                                                      Flexible Pavement > 20 Years  design life
                                                      OR
                                                      To strengthen road based using soil stabilizer method"</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointPT4()" type="number" min="0" max="2" class="targetPointPT4" id="PT4_4_TP_DESIGN" name="PT4_4_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointPT4()" type="number" min="0" max="2" class="assessmentPointPT4"></td> --}}
                                                    <td><input onblur="commentPT4()" type="text" min="0" max="2" class="road" id="PT4_4_COMMENT_DESIGN" name="PT4_4_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahPT4<input type="text" name="markahPT4" id="markahPT4" /></td>            
                                                  </tr>
                              
                                                  <tr >
                                                    <td colspan="3"> SUB TOTAL PT POINT</td>
                                                    <td>12</td>
                                                    <td></td>
                                                    {{-- <td></td> --}}
                                                    <td></td>
                                                  </tr>
            
                                                  <tr>
                                                    <td>EW</td>
                                                    <td colspan="5" align="left">ENVIRONMENT & WATER</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="2">EW1</td>
                                                    <td colspan="2">ENVIRONMENTAL MANAGEMENT SYSTEM</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td>"Provision of EPW in contract  (Design Stage) 
                                                      ISO 14001:2004 certification for main contractor (Verification stage)"</td>
                                                    <td rowspan="1">CSFJ</td>
                                                    <td>3</td>
                                                    <td><input onblur="findTargetPointEW1()" type="number" min="0" max="2" class="targetPointEW1" id="EW1_1_TP_DESIGN" name="EW1_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointEW1()" type="number" min="0" max="2" class="assessmentPointEW1"></td> --}}
                                                    <td><input onblur="commentEW1()" type="text" min="0" max="2" class="road" id="EW1_1_COMMENT_DESIGN" name="EW1_1_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahEW1<input type="text" name="markahEW1" id="markahEW1" /></td>            
                                                  </tr>
                                
                                                  
                              
                                                  
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="3">EW2</td>
                                                    <td colspan="2">STORMWATER MANAGEMENT</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  
                                
                                                  {{-- <tr>
                                                    <td rowspan="9">SM2</td>
                                                    <td colspan="2">Road alignment</td>
                                                    <td>6</td>
                                                    
                                                    <td><input onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></td>
                                                    <td><input onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></td>
                                                    <td><input onblur="roadWorks()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr> --}}
                              
                                                  <tr>
                                                    <td >Develop a stormwater management documents and drawing plans for the site using stormwater best management practices (BMP) for flow control in conformance to the Manual  Saliran Mesra Alam for Malaysia (MSMA) / MSMA 2nd Edition and EMS ISO 14001:2015. Demonstrate that the planned BMPs to conform to all applicable 5% above minimum flow control standards set by MSMA/MSMA 2nd Edition and EMS ISO 14001: 2015</td>
                                                    <td rowspan="2">CKAS</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointEW2()" type="number" min="0" max="2" class="targetPointEW2" id="EW2_1_TP_DESIGN" name="EW2_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointEW2()" type="number" min="0" max="2" class="assessmentPointEW2"></td> --}}
                                                    <td><input onblur="commentEW2()" type="text" min="0" max="2" class="road"id="EW2_2_COMMENT_DESIGN" name="EW2_2_COMMENT_DESIGN"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Develop a stormwater management plan for the site using stormwater best management practices (BMP) for water quality control in conformance to the Stormwater Management Manual for Malaysia (MSMA) and EMS ISO 14001:2004. Demonstrate that the planned BMPs to conform to all applicable 5% above minimum water quality standards set by MSMA and EMS ISO 14001: 2004</td>
                                                    {{-- <td></td> --}}
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointEW2()" type="number" min="0" max="2" class="targetPointEW2" id="EW2_2_TP_DESIGN" name="EW2_2_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointEW2()" type="number" min="0" max="2" class="assessmentPointEW2"></td> --}}
                                                    <td><input onblur="commentEW2()" type="text" min="0" max="2" class="road" id="EW2_2_COMMENT_DESIGN" name="EW2_2_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahEW2<input type="text" name="markahEW2" id="markahEW2" /></td>            
                                                  </tr>
                                                  
                                                  <tr >
                                                    <td colspan="3"> SUB TOTAL EW POINT</td>
                                                    <td>5</td>
                                                    <td></td>
                                                    {{-- <td></td> --}}
                                                    <td></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>AE</td>
                                                    <td colspan="5" align="left">ACCESS & EQUITY</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="5">AE 1</td>
                                                    <td colspan="2">SAFETY AUDIT</td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Road Safety Audit (During Design Stage)</td>
                                                    <td></td>
                                                    <td>3</td>
                                                    <td><input onblur="findTargetPointAE1()" type="number" min="0" max="2" class="targetPointAE1" id="AE1_1_TP_DESIGN" name="AE1_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointAE1()" type="number" min="0" max="2" class="assessmentPointAE1" ></td> --}}
                                                    <td><input onblur="commentAE1()" type="text" min="0" max="2" class="road" id="AE1_1_COMMENT_DESIGN" name="AE1_1_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Road Safety Audit (During Construction Stage)</td>
                                                    <td></td>
                                                    <td>3</td>
                                                    <td><input onblur="findTargetPointAE1()" type="number" min="0" max="2" class="targetPointAE1" id="AE1_2_TP_DESIGN" name="AE1_2_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointAE1()" type="number" min="0" max="2" class="assessmentPointAE1" ></td> --}}
                                                    <td><input onblur="commentAE1()" type="text" min="0" max="2" class="road" id="AE1_2_COMMENT_DESIGN" name="AE1_2_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Additional Audit For Traffic Management Safety Report During Construction</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE1()" type="number" min="0" max="2" class="targetPointAE1" id="AE1_3_TP_DESIGN" name="AE1_3_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointAE1()" type="number" min="0" max="2" class="assessmentPointAE1" ></td> --}}
                                                    <td><input onblur="commentAE1()" type="text" min="0" max="2" class="road" id="AE1_3_COMMENT_DESIGN" name="AE1_3_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Road Safety Audit (During Operational Stage)</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE1()" type="number" min="0" max="2" class="targetPointAE1" id="AE1_4_TP_DESIGN" name="AE1_4_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointAE1()" type="number" min="0" max="2" class="assessmentPointAE1" ></td> --}}
                                                    <td><input onblur="commentAE1()" type="text" min="0" max="2" class="road" id="AE1_4_COMMENT_DESIGN" name="AE1_4_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE1<input type="text" name="markahAE1" id="markahAE1" /></td>            
                                                  </tr>
                              
                                                  <tr >
                                                    <td colspan="3"> SUB TOTAL AE POINT</td>
                                                    <td>5</td>
                                                    <td></td>
                                                    {{-- <td></td> --}}
                                                    <td></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>CA</td>
                                                    <td colspan="5" align="left">CONSTRUCTION ACTIVITY</td>
                                                    
                                                  </tr>
                                                  
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">CA1</td>
                                                    <td colspan="2">REQUIREMENT FOR ROAD WORKS DESIGN</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >MS ISO 9001:2008 or (latest version) certification for main contractor</td>
                                                    <td></td>
                                                    <td>3</td>
                                                    <td><input onblur="findTargetPointCA1()" type="number" min="0" max="2" class="targetPointCA1" id="CA1_1_TP_DESIGN" name="CA1_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointCA1()" type="number" min="0" max="2" class="assessmentPointCA1" ></td> --}}
                                                    <td><input onblur="commentCA1()" type="text" min="0" max="2" class="road" id="CA1_1_COMMENT_DESIGN" name="CA1_1_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA1<input type="text" name="markahCA1" id="markahCA1" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="3">CA2</td>
                                                    <td colspan="2">OCCUPTIONAL HEALTH AND SAFETY MANAGEMENT SYSTEM</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >OHSAS 18001:2007 0r (latest version) certification for main contractor</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA2()" type="number" min="0" max="2" class="targetPointCA2" id="CA2_1_TP_DESIGN" name="CA2_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointCA2()" type="number" min="0" max="2" class="assessmentPointCA2" ></td> --}}
                                                    <td><input onblur="commentCA2()" type="text" min="0" max="2" class="road" id="CA2_1_COMMENT_DESIGN" name="CA2_1_COMMENT_DESIGN"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >To provide site safety and health officer with certification by DOSH</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointCA2()" type="number" min="0" max="2" class="targetPointCA2" id="CA2_2_TP_DESIGN" name="CA2_2_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointCA2()" type="number" min="0" max="2" class="assessmentPointCA2" ></td> --}}
                                                    <td><input onblur="commentCA2()" type="text" min="0" max="2" class="road" id="CA2_1_COMMENT_DESIGN" name="CA2_1_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA2<input type="text" name="markahCA2" id="markahCA2" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="5">CA 3</td>
                                                    <td colspan="2">OCONSTRUCTION WASTE MANAGEMENT PLAN	</td>
                                                    {{-- <td></td> --}}
                                                    <td>4</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Create, establish, implement and maintain a formal construction waste management plan during road construction</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA3()" type="number" min="0" max="2" class="targetPointCA3" id="CA3_1_TP_DESIGN" name="CA3_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointCA3()" type="number" min="0" max="2" class="assessmentPointCA3" ></td> --}}
                                                    <td><input onblur="commentCA3()" type="text" min="0" max="2" class="road" id="CA3_1_COMMENT_DESIGN" name="CA3_1_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provision of Waste Management Plan in the contract (BQ)</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA3()" type="number" min="0" max="2" class="targetPointCA3" id="CA3_2_TP_DESIGN" name="CA3_2_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointCA3()" type="number" min="0" max="2" class="assessmentPointCA3" ></td> --}}
                                                    <td><input onblur="commentCA3()" type="text" min="0" max="2" class="road" id="CA3_2_COMMENT_DESIGN" name="CA3_2_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provide a designated location to segregate construction waste on-site</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointCA3()" type="number" min="0" max="2" class="targetPointCA3" id="CA3_3_TP_DESIGN" name="CA3_3_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointCA3()" type="number" min="0" max="2" class="assessmentPointCA3" ></td> --}}
                                                    <td><input onblur="commentCA3()" type="text" min="0" max="2" class="road" id="CA3_3_COMMENT_DESIGN" name="CA3_3_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Appoint the licensed contractor(s) to collect the construction waste </td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointCA3()" type="number" min="0" max="2" class="targetPointCA3" id="CA3_4_TP_DESIGN" name="CA3_4_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointCA3()" type="number" min="0" max="2" class="assessmentPointCA3" ></td> --}}
                                                    <td><input onblur="commentCA3()" type="text" min="0" max="2" class="road" id="CA3_4_COMMENT_DESIGN" name="CA3_4_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA3<input type="text" name="markahCA3" id="markahCA3" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="4">CA 4</td>
                                                    <td colspan="2">TRAFFIC MANAGEMENT PLAN</td>
                                                    {{-- <td></td> --}}
                                                    <td>4</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Create, establish and implement a formal traffic management plan during Design and road construction stage</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA4()" type="number" min="0" max="2" class="targetPointCA4" id="CA4_1_TP_DESIGN" name="CA4_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointCA4()" type="number" min="0" max="2" class="assessmentPointCA4" ></td> --}}
                                                    <td><input onblur="commentCA4()" type="text" min="0" max="2" class="road" id="CA4_1_COMMENT_DESIGN" name="CA4_1_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provision of Traffic Management Officer in the contract document (BQ)</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointCA4()" type="number" min="0" max="2" class="targetPointCA4" id="CA4_2_TP_DESIGN" name="CA4_2_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointCA4()" type="number" min="0" max="2" class="assessmentPointCA4" ></td> --}}
                                                    <td><input onblur="commentCA4()" type="text" min="0" max="2" class="road" id="CA4_2_COMMENT_DESIGN" name="CA4_2_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provision of third party auditor for Traffic Management Plan (TMP)</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointCA4()" type="number" min="0" max="2" class="targetPointCA4" id="CA4_3_TP_DESIGN" name="CA4_3_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointCA4()" type="number" min="0" max="2" class="assessmentPointCA4" ></td> --}}
                                                    <td><input onblur="commentCA4()" type="text" min="0" max="2" class="road" id="CA4_3_COMMENT_DESIGN" name="CA4_3_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA4<input type="text" name="markahCA4" id="markahCA4" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">CA 5</td>
                                                    <td colspan="2">SITE ROUTINE MAINTENANCE PLAN 	</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Create, establish, implement routine maintenanace for road project </td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA5()" type="number" min="0" max="2" class="targetPointCA5" id="CA5_1_TP_DESIGN" name="CA5_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointCA5()" type="number" min="0" max="2" class="assessmentPointCA5" ></td> --}}
                                                    <td><input onblur="commentCA5()" type="text" min="0" max="2" class="road" id="CA5_1_COMMENT_DESIGN" name="CA5_1_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA5<input type="text" name="markahCA5" id="markahCA5" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">CA 6</td>
                                                    <td colspan="2">HOUSEKEEPING 	</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >"Provision Housekeeping implementation in the contract document/ BQ
                                                      OR
                                                      Establish and implement housekeeping during construction "</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA6()" type="number" min="0" max="2" class="targetPointCA6" id="CA6_1_TP_DESIGN" name="CA6_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointCA6()" type="number" min="0" max="2" class="assessmentPointCA6" ></td> --}}
                                                    <td><input onblur="commentCA6()" type="text" min="0" max="2" class="road" id="CA6_1_COMMENT_DESIGN" name="CA6_1_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA6<input type="text" name="markahCA6" id="markahCA6" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="4">CA 7</td>
                                                    <td colspan="2">HOUSEKEEPING 	</td>
                                                    {{-- <td></td> --}}
                                                    <td>4</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Perform scheduled maintenance of construction machineries</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA7()" type="number" min="0" max="2" class="targetPointCA7" id="CA7_1_TP_DESIGN" name="CA7_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointCA7()" type="number" min="0" max="2" class="assessmentPointCA7" ></td> --}}
                                                    <td><input onblur="commentCA7()" type="text" min="0" max="2" class="road" id="CA7_1_COMMENT_DESIGN" name="CA7_1_COMMENT_DESIGN"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Use high performance machineries with low fuel consumption and low air emission</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA7()" type="number" min="0" max="2" class="targetPointCA7" id="CA7_2_TP_DESIGN" name="CA7_2_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointCA7()" type="number" min="0" max="2" class="assessmentPointCA7" ></td> --}}
                                                    <td><input onblur="commentCA7()" type="text" min="0" max="2" class="road" id="CA7_2_COMMENT_DESIGN" name="CA7_2_COMMENT_DESIGN"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Provision of ESCP and Environmental Monitoring Report (EMR) – (eg. Water/ Air/ Noise Quality ) in the contract</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA7()" type="number" min="0" max="2" class="targetPointCA7" id="CA7_2_TP_DESIGN" name="CA7_2_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointCA7()" type="number" min="0" max="2" class="assessmentPointCA7" ></td> --}}
                                                    <td><input onblur="commentCA7()" type="text" min="0" max="2" class="road" id="CA7_2_COMMENT_DESIGN" name="CA7_2_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA7<input type="text" name="markahCA7" id="markahCA7" /></td>            
                                                  </tr>
                              
                                                 
                              
                                                  <tr >
                                                    <td colspan="3"> SUB TOTAL CA POINT</td>
                                                    <td>22</td>
                                                    <td style="display: none">markahCA<input type="text" name="markahCA" id="markahCA" /></td>            
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
            
                                                  <tr>
                                                    <td>MR</td>
                                                    <td colspan="5" align="left">MATERIAL & RESOURCES</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="6">MR 1</td>
                                                    <td colspan="2">MATERIAL REUSE	</td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td>Reuse at a minimum 30% of existing pavement materials by estimated volume</td>
                                                    <td rowspan="4">CJ</td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointMR1()" type="number" min="0" max="2" class="targetPointMR1" id="MR1_1_TP_DESIGN" name="MR1_1_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointMR1()" type="number" min="0" max="2" class="assessmentPointMR1"></td> --}}
                                                    <td><input onblur="commentMR1()" type="text" min="0" max="2" class="road" id="MR1_1_COMMENT_DESIGN" name="MR1_1_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>Reuse of existing material other than pavement materials </td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR1()" type="number" min="0" max="2" class="targetPointMR1" id="MR1_2_TP_DESIGN" name="MR1_2_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointMR1()" type="number" min="0" max="2" class="assessmentPointMR1"></td> --}}
                                                    <td><input onblur="commentMR1()" type="text" min="0" max="2" class="road" id="MR1_2_COMMENT_DESIGN" name="MR1_2_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>Earthwork balance </td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR1()" type="number" min="0" max="2" class="targetPointMR1" id="MR1_3_TP_DESIGN" name="MR1_3_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointMR1()" type="number" min="0" max="2" class="assessmentPointMR1"></td> --}}
                                                    <td><input onblur="commentMR1()" type="text" min="0" max="2" class="road" id="MR1_3_COMMENT_DESIGN" name="MR1_3_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>Fiber Roll Netting using biodegradable material at site for erosion control (eg. Wooden dust, coconut fiber)</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR1()" type="number" min="0" max="2" class="targetPointMR1" id="MR1_4_TP_DESIGN" name="MR1_4_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointMR1()" type="number" min="0" max="2" class="assessmentPointMR1"></td> --}}
                                                    <td><input onblur="commentMR1()" type="text" min="0" max="2" class="road" id="MR1_4_COMMENT_DESIGN" name="MR1_4_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>To use reusable formwork for structure (eg: steel/ fiber formwork)</td>
                                                    <td ></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR1()" type="number" min="0" max="2" class="targetPointMR1" id="MR1_5_TP_DESIGN" name="MR1_5_TP_DESIGN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointMR1()" type="number" min="0" max="2" class="assessmentPointMR1"></td> --}}
                                                    <td><input onblur="commentMR1()" type="text" min="0" max="2" class="road" id="MR1_5_COMMENT_DESIGN" name="MR1_5_COMMENT_DESIGN"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahMR1<input type="text" name="markahMR1" id="markahMR1" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="5">MR 2</td>
                                                    <td colspan="2">GREEN PRODUCT</td>
                                                    {{-- <td></td> --}}
                                                    <td>4</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Green Products Scoring System (GPSS) of 70% - 100%</td>
                                                    <td rowspan="4">CASKT</td>
                                                    <td>4</td>
                                                    <td><input onblur="findTargetPointMR2()" type="number" min="0" max="2" class="targetPointMR2"></td>
                                                    {{-- <td><input onblur="findAssessmentPointMR2()" type="number" min="0" max="2" class="assessmentPointMR2"></td> --}}
                                                    <td><input onblur="commentMR()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Green Products Scoring System (GPSS) of 50% - 69%</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td><input onblur="findTargetPointMR2()" type="number" min="0" max="2" class="targetPointMR2"></td>
                                                    {{-- <td><input onblur="findAssessmentPointMR2()" type="number" min="0" max="2" class="assessmentPointMR2"></td> --}}
                                                    <td><input onblur="commentMR2()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Green Products Scoring System (GPSS) of 40% - 49%</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointMR2()" type="number" min="0" max="2" class="targetPointMR2"></td>
                                                    {{-- <td><input onblur="findAssessmentPointMR2()" type="number" min="0" max="2" class="assessmentPointMR2"></td> --}}
                                                    <td><input onblur="commentMR2()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Use Green Product Scoring System (GPSS)</td>
                                                    {{-- <td></td> --}}
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR2()" type="number" min="0" max="2" class="targetPointMR2"></td>
                                                    {{-- <td><input onblur="findAssessmentPointMR2()" type="number" min="0" max="2" class="assessmentPointMR2"></td> --}}
                                                    <td><input onblur="commentMR2()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahMR2<input type="text" name="markahMR2" id="markahMR2" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="3">MR 3</td>
                                                    <td colspan="2">ROAD INVENTORIES</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provide updated master inventory of road asset / warranty of material/product after completion of road works</td>
                                                    <td rowspan="2">CSFJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR3()" type="number" min="0" max="2" class="targetPointMR3"></td>
                                                    {{-- <td><input onblur="findAssessmentPointMR3()" type="number" min="0" max="2" class="assessmentPointMR3"></td> --}}
                                                    <td><input onblur="commentMR3()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Provide established master inventory of  road asset / warranty of material/product of existing road </td>
                                                    {{-- <td></td> --}}
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR3()" type="number" min="0" max="2" class="targetPointMR3"></td>
                                                    {{-- <td><input onblur="findAssessmentPointMR3()" type="number" min="0" max="2" class="assessmentPointMR3"></td> --}}
                                                    <td><input onblur="commentMR3()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahMR3<input type="text" name="markahMR3" id="markahMR3" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">MR 4</td>
                                                    <td colspan="2">EFFICIENT ROAD LIGHTINGS</td>
                                                    {{-- <td></td> --}}
                                                    <td>1</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >All systems should be designed to use energy efficient road lightings, while complying to standard and specification for road lightings (eg. MS 825 part 1:2007)</td>
                                                    <td rowspan="1">CKE</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR4()" type="number" min="0" max="2" class="targetPointMR4"></td>
                                                    {{-- <td><input onblur="findAssessmentPointMR4()" type="number" min="0" max="2" class="assessmentPointMR4"></td> --}}
                                                    <td><input onblur="commentMR4()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahMR4<input type="text" name="markahMR4" id="markahMR4" /></td>            
                                                  </tr>
                              
                                                  <tr >
                                                    <td colspan="3"> SUB TOTAL MR POINT</td>
                                                    <td>12</td>
                                                    <td></td>
                                                    <td></td>
                                                    {{-- <td></td> --}}
                                                  </tr>
                              
                                                  <tr >
                                                    <td colspan="3"> TOTAL CORE POINT</td>
                                                    <td>69</td>
                                                    <td></td>
                                                    <td></td>
                                                    {{-- <td></td> --}}
                                                  </tr>
                              
                                                  <tr>
                                                    <td>EC</td>
                                                    <td colspan="6" align="left">ELECTIVE CRITERIAS</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="4">SM 5 - EC</td>
                                                    <td colspan="2">SERVICES FOR DISABLED USERS	</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Crossing for disabled users with noise making devices installed</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM5EC()" type="number" min="0" max="2" class="targetPointSM5EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM5EC()" type="number" min="0" max="2" class="assessmentPointSM5EC"></td> --}}
                                                    <td><input onblur="commentSM5EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Walkway access for disabled users by providing sidewalks sloped for easy access</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM5EC()" type="number" min="0" max="2" class="targetPointSM5EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM5EC()" type="number" min="0" max="2" class="assessmentPointEC"></td> --}}
                                                    <td><input onblur="commentSM5EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Tac tile on the pedestrian pathway and access for disabled users</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM5EC()" type="number" min="0" max="2" class="targetPointSM5EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM5EC()" type="number" min="0" max="2" class="assessmentPointSM5EC"></td> --}}
                                                    <td><input onblur="commentSM5EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahSM5EC<input type="text" name="markahSM5EC" id="markahSM5EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="4">SM 6 - EC</td>
                                                    <td colspan="2">NOISE CONTROL	</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >The pavement mix design  by using quiet pavement</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointSM6EC()" type="number" min="0" max="2" class="targetPointSM6EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM6EC()" type="number" min="0" max="2" class="assessmentPointSM6EC"></td> --}}
                                                    <td><input onblur="commentSM6EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Noise barrier shall be provided in sensitive areas such as housing situated beside busy roads or highways, schools and hospitals</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointSM6EC()" type="number" min="0" max="2" class="targetPointSM6EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM6EC()" type="number" min="0" max="2" class="assessmentPointSM6EC"></td> --}}
                                                    <td><input onblur="commentSM6EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Buffer Zone </td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointSM6EC()" type="number" min="0" max="2" class="targetPointSM6EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointSM6EC()" type="number" min="0" max="2" class="assessmentPointSM6EC"></td> --}}
                                                    <td><input onblur="commentSM6EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahSM6EC<input type="text" name="markahSM6EC" id="markahSM6EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">EW 3 - EC</td>
                                                    <td colspan="2">ECOLOGICAL CONNECTIVITY		</td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >"Provide dedicated wildlife crossing structures and protective fencing as determined by Environmental Impact Assessment (EIA) report 
                                                      OR
                                                      Provide sound barrier at sensitive area for wildlife"</td>
                                                    <td></td>
                                                    <td>5</td>
                                                    <td><input onblur="findTargetPointEW3EC()" type="number" min="0" max="2" class="targetPointEW3EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointEW3EC()" type="number" min="0" max="2" class="assessmentPointEW3EC"></td> --}}
                                                    <td><input onblur="commentEW3EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahEW3EC<input type="text" name="markahEW3EC" id="markahEW3EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">AE 2 - EC</td>
                                                    <td colspan="2"> SCENIC VIEWS </td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >"Provide dedicated wildlife crossing structures and protective fencing as determined by Environmental Impact Assessment (EIA) report 
                                                      OR
                                                      Provide sound barrier at sensitive area for wildlife"</td>
                                                    <td></td>
                                                    <td>5</td>
                                                    <td><input onblur="findTargetPointAE2EC()" type="number" min="0" max="2" class="targetPointAE2EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointAE2EC()" type="number" min="0" max="2" class="assessmentPointAE2EC"></td> --}}
                                                    <td><input onblur="commentAE2EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE2EC<input type="text" name="markahAE2EC" id="markahAE2EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="5">AE 3 - EC</td>
                                                    <td colspan="2"> PEDESTRIAN ACCESS </td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Zebra Crossing or Signalised Pedestrian Crossing  and Refuge Island</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE3EC()" type="number" min="0" max="2" class="targetPointAE3EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointAE3EC()" type="number" min="0" max="2" class="assessmentPointAE3EC"></td> --}}
                                                    <td><input onblur="commentAE3EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Overhead Pedestrian Bridge</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointAE3EC()" type="number" min="0" max="2" class="targetPointAE3EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointAE3EC()" type="number" min="0" max="2" class="assessmentPointAE3EC"></td> --}}
                                                    <td><input onblur="commentAE3EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Sidewalk / Walkway and Raised Crosswalk</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE3EC()" type="number" min="0" max="2" class="targetPointAE3EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointAE3EC()" type="number" min="0" max="2" class="assessmentPointAE3EC"></td> --}}
                                                    <td><input onblur="commentAE3EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Covered walkway</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE3EC()" type="number" min="0" max="2" class="targetPointAE3EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointAE3EC()" type="number" min="0" max="2" class="assessmentPointAE3EC"></td> --}}
                                                    <td><input onblur="commentAE3EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE3EC<input type="text" name="markahAE3EC" id="markahAE3EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="5">AE 4 - EC</td>
                                                    <td colspan="2"> MOTORCYCLE LANE </td>
                                                    {{-- <td></td> --}}
                                                    <td>6</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Paved shoulder, non-exclusive motorcycle lane and end treatment at junction</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE4EC()" type="number" min="0" max="2" class="targetPointAE4EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointEC()" type="number" min="0" max="2" class="assessmentPointEC"></td> --}}
                                                    <td><input onblur="commentAE4EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Exclusive motorcycle lane</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointAE4EC()" type="number" min="0" max="2" class="targetPointAE4EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointEC()" type="number" min="0" max="2" class="assessmentPointEC"></td> --}}
                                                    <td><input onblur="commentAE4EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Overhead motorcycle bridge</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointAE4EC()" type="number" min="0" max="2" class="targetPointAE4EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointEC()" type="number" min="0" max="2" class="assessmentPointEC"></td> --}}
                                                    <td><input onblur="commentAE4EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Motorcycle shelter</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE4EC()" type="number" min="0" max="2" class="targetPointAE4EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointEC()" type="number" min="0" max="2" class="assessmentPointEC"></td> --}}
                                                    <td><input onblur="commentAE4EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE4EC<input type="text" name="markahAE4EC" id="markahAE4EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">AE 5 - EC</td>
                                                    <td colspan="2"> REST AREA </td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provide or maintain existing rest area facilities along the road </td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointAE5EC()" type="number" min="0" max="2" class="targetPointAE5EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointAE5EC()" type="number" min="0" max="2" class="assessmentPointEC"></td> --}}
                                                    <td><input onblur="commentAE5EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE5EC<input type="text" name="markahAE5EC" id="markahAE5EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="3">AE 6 - EC</td>
                                                    <td colspan="2"> BICYCLE ASSESS </td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Implement physical or constructed changes to the roadway structure, dimensions, or form that provide bicycle-only facilities with dedicated access (such as bicycle lane). Lanes shared with motorized vehicles do not meet this requirement </td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE6EC()" type="number" min="0" max="2" class="targetPointAE6EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointAE6EC()" type="number" min="0" max="2" class="assessmentPointEC"></td> --}}
                                                    <td><input onblur="commentAE6EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Implement physical or constructed changes to the roadway structure, dimensions, or form that provide bicycle-only facilities with dedicated access (such as bicycle lane). Lanes shared with motorized vehicles do not meet this requirement</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointAE6EC()" type="number" min="0" max="2" class="targetPointAE6EC"></td>
                                                    {{-- <td><input onblur="findAssessmentPointAE6EC()" type="number" min="0" max="2" class="assessmentPointAE6EC"></td> --}}
                                                    <td><input onblur="commentAE6EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE6EC<input type="text" name="markahAE6EC" id="markahAE6EC" /></td>            
                                                  </tr>
                              
                                                  
                              
                                                  <tr >
                                                    <td colspan="3"> TOTAL ELECTIVE POINT</td>
                                                    <td>27</td>
                                                    <td></td>
                                                    <td></td>
                                                    {{-- <td></td> --}}
                                                  </tr>
            
                                                  <tr>
                                                    <td>IN</td>
                                                    <td colspan="5" align="left">INNOVATION</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="2">IN 1</td>
                                                    <td colspan="2">ANY RELATED INNOVATION</td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td>Come up with an idea for a design or construction best practice for road that is not currently included in Manual pH JKR and is more sustainable than standard or conventional practices</td>
                                                    <td rowspan="1">ANY</td>
                                                    <td>5</td>
                                                    <td><input onblur="findTargetPointIN()" type="number" min="0" max="2" class="targetPointIN"></td>
                                                    {{-- <td><input onblur="findAssessmentPointIN()" type="number" min="0" max="2" class="assessmentPointIN"></td> --}}
                                                    <td><input onblur="commentIN()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td colspan="3"> TOTAL INNOVATION POINT</td>
                                                    {{-- <td><input type="text" name="markahIN" id="markahIN" /></td>  --}}
                                                    <td>5</td> 
                                                    <td>0</td>           
                                                    <td>0</td>
                                                    {{-- <td></td> --}}
                                                  </tr>
                              
                              
                              
                                                </tbody>
                                              </table>
                              
                                              <div align="center" class="mt-3">
                                                <button class="btn btn-primary" type="submit" title="Simpan">Simpan</button>
                                                <button class="btn btn-primary" type="submit" title="Simpan">Sah</button>
                                                <button class="btn btn-primary" type="submit" title="Simpan">Jana Keputusan</button>
                                                <button class="btn btn-primary" type="submit" title="Simpan">Jana Sijil</button>
                                                {{-- <a href="/penilaian_reka_bentuk_jalan/isi_skor_kad_page2" type="button" class="btn btn-primary">Seterusnya</a>           --}}
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



            <div class="row mb-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="col mb-">
                                <h2 class="h2 mb-3">BORANG VERIFIKASI PERMARKAHAN JALAN</h2>
                            </div>
            
                            <div class="col">
                                <div>
                                    <form action="/projek/{{$projek->id}}/eph-jalan/verifikasi" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <table>
                                        <div class="row3 mx-4 table-responsive scrollbar">
                                            <div class="col">
                                              <table class="table table-bordered line-table text-center" style="width: 100%">
                                                <thead class="text-white bg-orange-jkr">
                                                  <tr>
                                        
                                                    
                                                    <th >Kod</th>
                                                    <th >Kriteria</th>
                                                    <th >Responsibility</th>
                                                    <th colspan="4">Design</th>
                                                    
                                     
                                                  </tr>
                                                  <tr>
                                                    
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th >MAX POINT</th>
                                                    <th >TARGET POINT</th>
                                                    <th >ASSESSMENT POINT</th>
                                                    <th>COMMENT BY ASSESSOR</th>
                                                  </tr>
                                
                                                </thead>
                                                <tbody>
                              
                                                  <tr>
                                                    <td>SM</td>
                                                    <td colspan="6" align="left">SUSTAINABLE SITE PLANNING AND MANAGEMENT</td>  
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="12">SM1</td>
                                                    <td colspan="2">REQUIREMENT FOR ROAD WORKS DESIGN</td>
                                                    <td>7</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Traffic study</td>
                                                    <td rowspan="7">CJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Site investigation data</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                   
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Flood records</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Response to public complaints or requests from public, local authority & etc.</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Value Management (VM)</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                               
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Survey Drawing</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                
                                                  </tr>
                              
                                                  <tr>
                                                    <td >As Built Drawings</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                              
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Accident Reports</td>
                                                    <td>CSFJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Structure replacement (Bridge assessment report/ Inventory card)</td>
                                                    <td rowspan="3">CJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Forensic Report</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Pavement Evaluation</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <td style="display: none">markahSM1<input type="text" name="markahSM1" id="markahSM1" /></td>            
                              
                              
                                                 
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="9">SM2</td>
                                                    <td colspan="2">ROAD ALIGNMENT</td>
                                                    <td>6</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Slope not more than 6 berms</td>
                                                    <td rowspan="7">CJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Cut slope not steeper than 1:1.5 or Rock slope not steeper than 4:1 </td>
                                                    {{-- <td rowspan="7">CKG</td> --}}
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                   
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Fill slope not steeper than 1:2</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Height of slope not more than 6m</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Maximum grade less than 7%</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                               
                                                  </tr>
                              
                                                  <tr>
                                                    <td >No reclamation involved existing water bodies</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provide added uphill lane (climbing lane) where the length of critical grade exceeds 5%</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                              
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Not in Sensitive Area OR Sensitive area with mitigation plan</td>
                                                    <td>CASKT</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                              
                                                  <td style="display: none">markahSM2<input type="text" name="markahSM2" id="markahSM2" /></td>            
                              
                              
                                                
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="7">SM3</td>
                                                    <td colspan="2">SITE VEGETATION</td>
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                 
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Use non-invasive plant species(example: grass/creeper) </td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                   
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Use bio-engineering techniques (example: vetiver grass, creeper and regeneration of natural plants and material )</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Use native plant species</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Use of grass/creeper for slope protection /unpaved shoulder</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                               
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Hydroseeding with Bio-degradable Erosion Control Blanket (BECB) on slope (example:  paddy  straw, coconut husk, rice husk etc.)</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Preservation of existing tree/vegetation</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                              
                                                  </tr>
                              
                                                  <td style="display: none">markahSM3<input type="text" name="markahSM3" id="markahSM3" /></td>            
                              
                              
                              
                                                 
                              
                              
                                                  <td colspan="1" rowspan="4">SM4</td>
                                                  <td colspan="2">NOISE MITIGATION PLAN</td>
                                                  <td>2</td>
                                                  <td>0</td>
                                                  <td>0</td>
                                                  <td></td>
                               
                                                </tr>
                              
                                                <tr>
                                                  <td >Supply and install noise barrier including maintenance during the construction and defects liability period (for urban area / residential area)</td>
                                                  <td rowspan="4">CJ</td>
                                                  <td>1</td>
                                                  <td><input onblur="findTargetPointSM4()" type="number" min="0" max="2" class="targetPointSM4" ></td>
                                                  <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                  <td><input onblur="commentSM4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                </tr>
                              
                                                <tr>
                                                  <td >To ensure that all site equipment are in using low decibel to control noise pollution </td>
                                                  <td>1</td>
                                                  <td><input onblur="findTargetPointSM4()" type="number" min="0" max="2" class="targetPointSM4" ></td>
                                                  <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                  <td><input onblur="commentSM4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                 
                                                </tr>
                              
                                                <tr>
                                                  <td >To ensure using all machineryon site are low decibel to minimize the amount of noise generated </td>
                                                  <td>1</td>
                                                  <td><input onblur="findTargetPointSM4()" type="number" min="0" max="2" class="targetPointSM4" ></td>
                                                  <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                  <td><input onblur="commentSM4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  
                                                </tr>
                              
                                                <td style="display: none">markahSM4<input type="text" name="markahSM4" id="markahSM4" /></td>            
                              
                              
                                                <tr >
                                                  <td colspan="3"> SUB TOTAL SM POINT</td>
                                                  <td>18</td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                </tr>
            
                                                <tr>
                                                    <td>PT</td>
                                                    <td colspan="6" align="left">PAVEMENT TECHNOLOGIES</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="6">PT1</td>
                                                    <td colspan="2">EXISTING PAVEMENT EVALUATION</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td>Surface Condition Survey</td>
                                                    <td rowspan="5">CSFJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT1()" type="number" min="0" max="2" class="targetPointPT1" ></td>
                                                    <td><input onblur="findAssessmentPointPT1()" type="number" min="0" max="2" class="assessmentPointPT1"></td>
                                                    <td><input onblur="commentPT1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Coring & Dynamic Cone Penetrometer test</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT1()" type="number" min="0" max="2" class="targetPointPT1" ></td>
                                                    <td><input onblur="findAssessmentPointPT1()" type="number" min="0" max="2" class="assessmentPointPT1"></td>
                                                    <td><input onblur="commentPT1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Deflection test</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT1()" type="number" min="0" max="2" class="targetPointPT1" ></td>
                                                    <td><input onblur="findAssessmentPointPT1()" type="number" min="0" max="2" class="assessmentPointPT1"></td>
                                                    <td><input onblur="commentPT1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Trial pit & Laboratory test</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT1()" type="number" min="0" max="2" class="targetPointPT1" ></td>
                                                    <td><input onblur="findAssessmentPointPT1()" type="number" min="0" max="2" class="assessmentPointPT1"></td>
                                                    <td><input onblur="commentPT1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Surface Regularity Test (International Roughness Index, IRI)</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT1()" type="number" min="0" max="2" class="targetPointPT1" ></td>
                                                    <td><input onblur="findAssessmentPointPT1()" type="number" min="0" max="2" class="assessmentPointPT1"></td>
                                                    <td><input onblur="commentPT1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahPT1<input type="text" name="markahPT1" id="markahPT1" /></td>            
                                                  </tr>
                              
                                                  
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="4">PT 2</td>
                                                    <td colspan="2">PERMEABLE PAVEMENT</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  {{-- <tr>
                                                    <td rowspan="9">SM2</td>
                                                    <td colspan="2">Road alignment</td>
                                                    <td>6</td>
                                                    
                                                    <td><input onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></td>
                                                    <td><input onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></td>
                                                    <td><input onblur="roadWorks()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr> --}}
                              
                                                  <tr>
                                                    <td >Use of permeable (porous) pavement mix design with higher range of air void (18 -25%)</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT2()" type="number" min="0" max="2" class="targetPointPT2" ></td>
                                                    <td><input onblur="findAssessmentPointPT2()" type="number" min="0" max="2" class="assessmentPointPT2"></td>
                                                    <td><input onblur="commentPT2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Pavement crossfall 2.5% and min unpaved shoulder to drain gradient 0.7%-4%</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT2()" type="number" min="0" max="2" class="targetPointPT2" ></td>
                                                    <td><input onblur="findAssessmentPointPT2()" type="number" min="0" max="2" class="assessmentPointPT2"></td>
                                                    <td><input onblur="commentPT2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Drainability of porous asphalt wearing course having a minimum thickness of 50mm shall not be less than 10 litre/minute through a discharge area of 54cm2</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT2()" type="number" min="0" max="2" class="targetPointPT2" ></td>
                                                    <td><input onblur="findAssessmentPointPT2()" type="number" min="0" max="2" class="assessmentPointPT2"></td>
                                                    <td><input onblur="commentPT2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahPT2<input type="text" name="markahPT2" id="markahPT2" /></td>            
                                                  </tr>
                                                  
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">PT 3</td>
                                                    <td colspan="2">PAVEMENT PERFORMANCE TRACKING</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >"Use a process that allows construction quality measurements and long-term pavement performance measurements to be spatially located and correlated to one another
                                                      i. Construction quality measurements must be spatially located such that the location of the quality measurement is known
                                                      ii. Pavement condition measurements must be taken at least every 2 3 years (To be confirm) and must be spatially located to a specific portion of roadway or location within roadway
                                                      iii. An operational system, computer based or otherwise that is capable of storing construction quality measurements, pavement condition measurement and their spatial locations
                                                      iv. The designated system must be demonstrated in operation, be capable of updates and have written plans for its maintenance in perpetuity"</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointPT3()" type="number" min="0" max="2" class="targetPointPT3" name="" id=""></td>
                                                    <td><input onblur="findAssessmentPointPT3()" type="number" min="0" max="2" class="assessmentPointPT3" name="" id=""></td>
                                                    <td><input onblur="commentPT3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahPT3<input type="text" name="markahPT3" id="markahPT3" /></td>            
                                                  </tr>
                                                  
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="5">PT 4</td>
                                                    <td colspan="2">LONG-LIFE PAVEMENT</td>
                                                    {{-- <td></td> --}}
                                                    <td>4</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Meet the requirements of Arahan Teknik Jalan 5/85 (Pindaan 2013): Manual for the structural design of flexible pavement</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT4()" type="number" min="0" max="2" class="targetPointPT4"></td>
                                                    <td><input onblur="findAssessmentPointPT4()" type="number" min="0" max="2" class="assessmentPointPT4"></td>
                                                    <td><input onblur="commentPT4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Pavement design is in accordance with a design procedure that is formally recognized, adopted and documented by the agency</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT4()" type="number" min="0" max="2" class="targetPointPT4"></td>
                                                    <td><input onblur="findAssessmentPointPT4()" type="number" min="0" max="2" class="assessmentPointPT4"></td>
                                                    <td><input onblur="commentPT4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Drainability surface runoff by providing scupper drain with hinge grating or equivalent to  ensure no debris blockage and maintainability</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT4()" type="number" min="0" max="2" class="targetPointPT4"></td>
                                                    <td><input onblur="findAssessmentPointPT4()" type="number" min="0" max="2" class="assessmentPointPT4"></td>
                                                    <td><input onblur="commentPT4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >"Rigid Pavement > 40 years design life
                                                      OR
                                                      Flexible Pavement > 20 Years  design life
                                                      OR
                                                      To strengthen road based using soil stabilizer method"</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointPT4()" type="number" min="0" max="2" class="targetPointPT4"></td>
                                                    <td><input onblur="findAssessmentPointPT4()" type="number" min="0" max="2" class="assessmentPointPT4"></td>
                                                    <td><input onblur="commentPT4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahPT4<input type="text" name="markahPT4" id="markahPT4" /></td>            
                                                  </tr>
                              
                                                  <tr >
                                                    <td colspan="3"> SUB TOTAL PT POINT</td>
                                                    <td>12</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
            
                                                  <tr>
                                                    <td>EW</td>
                                                    <td colspan="6" align="left">ENVIRONMENT & WATER</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="2">EW1</td>
                                                    <td colspan="2">ENVIRONMENTAL MANAGEMENT SYSTEM</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td>"Provision of EPW in contract  (Design Stage) 
                                                      ISO 14001:2004 certification for main contractor (Verification stage)"</td>
                                                    <td rowspan="1">CSFJ</td>
                                                    <td>3</td>
                                                    <td><input onblur="findTargetPointEW1()" type="number" min="0" max="2" class="targetPointEW1" ></td>
                                                    <td><input onblur="findAssessmentPointEW1()" type="number" min="0" max="2" class="assessmentPointEW1"></td>
                                                    <td><input onblur="commentEW1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahEW1<input type="text" name="markahEW1" id="markahEW1" /></td>            
                                                  </tr>
                                
                                                  
                              
                                                  
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="3">EW2</td>
                                                    <td colspan="2">STORMWATER MANAGEMENT</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  
                                
                                                  {{-- <tr>
                                                    <td rowspan="9">SM2</td>
                                                    <td colspan="2">Road alignment</td>
                                                    <td>6</td>
                                                    
                                                    <td><input onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></td>
                                                    <td><input onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></td>
                                                    <td><input onblur="roadWorks()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr> --}}
                              
                                                  <tr>
                                                    <td >Develop a stormwater management documents and drawing plans for the site using stormwater best management practices (BMP) for flow control in conformance to the Manual  Saliran Mesra Alam for Malaysia (MSMA) / MSMA 2nd Edition and EMS ISO 14001:2015. Demonstrate that the planned BMPs to conform to all applicable 5% above minimum flow control standards set by MSMA/MSMA 2nd Edition and EMS ISO 14001: 2015.</td>
                                                    <td rowspan="2">CKAS</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointEW2()" type="number" min="0" max="2" class="targetPointEW2" ></td>
                                                    <td><input onblur="findAssessmentPointEW2()" type="number" min="0" max="2" class="assessmentPointEW2"></td>
                                                    <td><input onblur="commentEW2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Develop a stormwater management plan for the site using stormwater best management practices (BMP) for water quality control in conformance to the Stormwater Management Manual for Malaysia (MSMA) and EMS ISO 14001:2004. Demonstrate that the planned BMPs to conform to all applicable 5% above minimum water quality standards set by MSMA and EMS ISO 14001: 2004</td>
                                                    {{-- <td></td> --}}
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointEW2()" type="number" min="0" max="2" class="targetPointEW2" ></td>
                                                    <td><input onblur="findAssessmentPointEW2()" type="number" min="0" max="2" class="assessmentPointEW2"></td>
                                                    <td><input onblur="commentEW2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahEW2<input type="text" name="markahEW2" id="markahEW2" /></td>            
                                                  </tr>
                                                  
                                                  <tr >
                                                    <td colspan="3"> SUB TOTAL EW POINT</td>
                                                    <td>5</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>AE</td>
                                                    <td colspan="6" align="left">ACCESS & EQUITY</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="5">AE 1</td>
                                                    <td colspan="2">SAFETY AUDIT</td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Road Safety Audit (During Design Stage)</td>
                                                    <td></td>
                                                    <td>3</td>
                                                    <td><input onblur="findTargetPointAE1()" type="number" min="0" max="2" class="targetPointAE1" ></td>
                                                    <td><input onblur="findAssessmentPointAE1()" type="number" min="0" max="2" class="assessmentPointAE1" ></td>
                                                    <td><input onblur="commentAE1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Road Safety Audit (During Construction Stage)</td>
                                                    <td></td>
                                                    <td>3</td>
                                                    <td><input onblur="findTargetPointAE1()" type="number" min="0" max="2" class="targetPointAE1" ></td>
                                                    <td><input onblur="findAssessmentPointAE1()" type="number" min="0" max="2" class="assessmentPointAE1" ></td>
                                                    <td><input onblur="commentAE1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Additional Audit For Traffic Management Safety Report During Construction</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE1()" type="number" min="0" max="2" class="targetPointAE1" ></td>
                                                    <td><input onblur="findAssessmentPointAE1()" type="number" min="0" max="2" class="assessmentPointAE1" ></td>
                                                    <td><input onblur="commentAE1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Road Safety Audit (During Operational Stage)</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE1()" type="number" min="0" max="2" class="targetPointAE1" ></td>
                                                    <td><input onblur="findAssessmentPointAE1()" type="number" min="0" max="2" class="assessmentPointAE1" ></td>
                                                    <td><input onblur="commentAE1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE1<input type="text" name="markahAE1" id="markahAE1" /></td>            
                                                  </tr>
                              
                                                  <tr >
                                                    <td colspan="3"> SUB TOTAL AE POINT</td>
                                                    <td>5</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>CA</td>
                                                    <td colspan="6" align="left">CONSTRUCTION ACTIVITY</td>
                                                    
                                                  </tr>
                                                  
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">CA1</td>
                                                    <td colspan="2">REQUIREMENT FOR ROAD WORKS DESIGN</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >MS ISO 9001:2008 or (latest version) certification for main contractor</td>
                                                    <td></td>
                                                    <td>3</td>
                                                    <td><input onblur="findTargetPointCA1()" type="number" min="0" max="2" class="targetPointCA1"></td>
                                                    <td><input onblur="findAssessmentPointCA1()" type="number" min="0" max="2" class="assessmentPointCA1" ></td>
                                                    <td><input onblur="commentCA1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA1<input type="text" name="markahCA1" id="markahCA1" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="3">CA2</td>
                                                    <td colspan="2">OCCUPTIONAL HEALTH AND SAFETY MANAGEMENT SYSTEM</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >OHSAS 18001:2007 0r (latest version) certification for main contractor</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA2()" type="number" min="0" max="2" class="targetPointCA2"></td>
                                                    <td><input onblur="findAssessmentPointCA2()" type="number" min="0" max="2" class="assessmentPointCA2" ></td>
                                                    <td><input onblur="commentCA2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td >To provide site safety and health officer with certification by DOSH</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointCA2()" type="number" min="0" max="2" class="targetPointCA2"></td>
                                                    <td><input onblur="findAssessmentPointCA2()" type="number" min="0" max="2" class="assessmentPointCA2" ></td>
                                                    <td><input onblur="commentCA2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA2<input type="text" name="markahCA2" id="markahCA2" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="5">CA 3</td>
                                                    <td colspan="2">OCONSTRUCTION WASTE MANAGEMENT PLAN	</td>
                                                    {{-- <td></td> --}}
                                                    <td>4</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Create, establish, implement and maintain a formal construction waste management plan during road construction</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA3()" type="number" min="0" max="2" class="targetPointCA3"></td>
                                                    <td><input onblur="findAssessmentPointCA3()" type="number" min="0" max="2" class="assessmentPointCA3" ></td>
                                                    <td><input onblur="commentCA3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provision of Waste Management Plan in the contract (BQ)</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA3()" type="number" min="0" max="2" class="targetPointCA3"></td>
                                                    <td><input onblur="findAssessmentPointCA3()" type="number" min="0" max="2" class="assessmentPointCA3" ></td>
                                                    <td><input onblur="commentCA3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provide a designated location to segregate construction waste on-site</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointCA3()" type="number" min="0" max="2" class="targetPointCA3"></td>
                                                    <td><input onblur="findAssessmentPointCA3()" type="number" min="0" max="2" class="assessmentPointCA3" ></td>
                                                    <td><input onblur="commentCA3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Appoint the licensed contractor(s) to collect the construction waste </td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointCA3()" type="number" min="0" max="2" class="targetPointCA3"></td>
                                                    <td><input onblur="findAssessmentPointCA3()" type="number" min="0" max="2" class="assessmentPointCA3" ></td>
                                                    <td><input onblur="commentCA3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA3<input type="text" name="markahCA3" id="markahCA3" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="4">CA 4</td>
                                                    <td colspan="2">TRAFFIC MANAGEMENT PLAN</td>
                                                    {{-- <td></td> --}}
                                                    <td>4</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Create, establish and implement a formal traffic management plan during Design and road construction stage</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA4()" type="number" min="0" max="2" class="targetPointCA4"></td>
                                                    <td><input onblur="findAssessmentPointCA4()" type="number" min="0" max="2" class="assessmentPointCA4" ></td>
                                                    <td><input onblur="commentCA4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provision of Traffic Management Officer in the contract document (BQ)</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointCA4()" type="number" min="0" max="2" class="targetPointCA4"></td>
                                                    <td><input onblur="findAssessmentPointCA4()" type="number" min="0" max="2" class="assessmentPointCA4" ></td>
                                                    <td><input onblur="commentCA4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provision of third party auditor for Traffic Management Plan (TMP)</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointCA4()" type="number" min="0" max="2" class="targetPointCA4"></td>
                                                    <td><input onblur="findAssessmentPointCA4()" type="number" min="0" max="2" class="assessmentPointCA4" ></td>
                                                    <td><input onblur="commentCA4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA4<input type="text" name="markahCA4" id="markahCA4" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">CA 5</td>
                                                    <td colspan="2">SITE ROUTINE MAINTENANCE PLAN 	</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Create, establish, implement routine maintenanace for road project </td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA5()" type="number" min="0" max="2" class="targetPointCA5"></td>
                                                    <td><input onblur="findAssessmentPointCA5()" type="number" min="0" max="2" class="assessmentPointCA5" ></td>
                                                    <td><input onblur="commentCA5()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA5<input type="text" name="markahCA5" id="markahCA5" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">CA 6</td>
                                                    <td colspan="2">HOUSEKEEPING 	</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >"Provision Housekeeping implementation in the contract document/ BQ
                                                      OR
                                                      Establish and implement housekeeping during construction "</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA6()" type="number" min="0" max="2" class="targetPointCA6"></td>
                                                    <td><input onblur="findAssessmentPointCA6()" type="number" min="0" max="2" class="assessmentPointCA6" ></td>
                                                    <td><input onblur="commentCA6()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA6<input type="text" name="markahCA6" id="markahCA6" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="4">CA 7</td>
                                                    <td colspan="2">HOUSEKEEPING 	</td>
                                                    {{-- <td></td> --}}
                                                    <td>4</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Perform scheduled maintenance of construction machineries</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA7()" type="number" min="0" max="2" class="targetPointCA7"></td>
                                                    <td><input onblur="findAssessmentPointCA7()" type="number" min="0" max="2" class="assessmentPointCA7" ></td>
                                                    <td><input onblur="commentCA7()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Use high performance machineries with low fuel consumption and low air emission</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA7()" type="number" min="0" max="2" class="targetPointCA7"></td>
                                                    <td><input onblur="findAssessmentPointCA7()" type="number" min="0" max="2" class="assessmentPointCA7" ></td>
                                                    <td><input onblur="commentCA7()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Provision of ESCP and Environmental Monitoring Report (EMR) – (eg. Water/ Air/ Noise Quality ) in the contract</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA7()" type="number" min="0" max="2" class="targetPointCA7"></td>
                                                    <td><input onblur="findAssessmentPointCA7()" type="number" min="0" max="2" class="assessmentPointCA7" ></td>
                                                    <td><input onblur="commentCA7()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA7<input type="text" name="markahCA7" id="markahCA7" /></td>            
                                                  </tr>
                              
                                                 
                              
                                                  <tr >
                                                    <td colspan="3"> SUB TOTAL CA POINT</td>
                                                    <td>22</td>
                                                    <td style="display: none">markahCA<input type="text" name="markahCA" id="markahCA" /></td>            
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
            
                                                  <tr>
                                                    <td>MR</td>
                                                    <td colspan="6" align="left">MATERIAL & RESOURCES</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="6">MR 1</td>
                                                    <td colspan="2">MATERIAL REUSE	</td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td>Reuse at a minimum 30% of existing pavement materials by estimated volume</td>
                                                    <td rowspan="4">CJ</td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointMR1()" type="number" min="0" max="2" class="targetPointMR1"></td>
                                                    <td><input onblur="findAssessmentPointMR1()" type="number" min="0" max="2" class="assessmentPointMR1"></td>
                                                    <td><input onblur="commentMR1()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>Reuse of existing material other than pavement materials </td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR1()" type="number" min="0" max="2" class="targetPointMR1"></td>
                                                    <td><input onblur="findAssessmentPointMR1()" type="number" min="0" max="2" class="assessmentPointMR1"></td>
                                                    <td><input onblur="commentMR1()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>Earthwork balance </td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR1()" type="number" min="0" max="2" class="targetPointMR1"></td>
                                                    <td><input onblur="findAssessmentPointMR1()" type="number" min="0" max="2" class="assessmentPointMR1"></td>
                                                    <td><input onblur="commentMR1()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>Fiber Roll Netting using biodegradable material at site for erosion control (eg. Wooden dust, coconut fiber)</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR1()" type="number" min="0" max="2" class="targetPointMR1"></td>
                                                    <td><input onblur="findAssessmentPointMR1()" type="number" min="0" max="2" class="assessmentPointMR1"></td>
                                                    <td><input onblur="commentMR1()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>To use reusable formwork for structure (eg: steel/ fiber formwork)</td>
                                                    <td ></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR1()" type="number" min="0" max="2" class="targetPointMR1"></td>
                                                    <td><input onblur="findAssessmentPointMR1()" type="number" min="0" max="2" class="assessmentPointMR1"></td>
                                                    <td><input onblur="commentMR1()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahMR1<input type="text" name="markahMR1" id="markahMR1" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="5">MR 2</td>
                                                    <td colspan="2">GREEN PRODUCT</td>
                                                    {{-- <td></td> --}}
                                                    <td>4</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Green Products Scoring System (GPSS) of 70% - 100%</td>
                                                    <td rowspan="4">CASKT</td>
                                                    <td>4</td>
                                                    <td><input onblur="findTargetPointMR2()" type="number" min="0" max="2" class="targetPointMR2"></td>
                                                    <td><input onblur="findAssessmentPointMR2()" type="number" min="0" max="2" class="assessmentPointMR2"></td>
                                                    <td><input onblur="commentMR()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Green Products Scoring System (GPSS) of 50% - 69%</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td><input onblur="findTargetPointMR2()" type="number" min="0" max="2" class="targetPointMR2"></td>
                                                    <td><input onblur="findAssessmentPointMR2()" type="number" min="0" max="2" class="assessmentPointMR2"></td>
                                                    <td><input onblur="commentMR2()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Green Products Scoring System (GPSS) of 40% - 49%</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointMR2()" type="number" min="0" max="2" class="targetPointMR2"></td>
                                                    <td><input onblur="findAssessmentPointMR2()" type="number" min="0" max="2" class="assessmentPointMR2"></td>
                                                    <td><input onblur="commentMR2()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Use Green Product Scoring System (GPSS)</td>
                                                    {{-- <td></td> --}}
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR2()" type="number" min="0" max="2" class="targetPointMR2"></td>
                                                    <td><input onblur="findAssessmentPointMR2()" type="number" min="0" max="2" class="assessmentPointMR2"></td>
                                                    <td><input onblur="commentMR2()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahMR2<input type="text" name="markahMR2" id="markahMR2" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="3">MR 3</td>
                                                    <td colspan="2">ROAD INVENTORIES</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provide updated master inventory of road asset / warranty of material/product after completion of road works</td>
                                                    <td rowspan="2">CSFJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR3()" type="number" min="0" max="2" class="targetPointMR3"></td>
                                                    <td><input onblur="findAssessmentPointMR3()" type="number" min="0" max="2" class="assessmentPointMR3"></td>
                                                    <td><input onblur="commentMR3()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Provide established master inventory of  road asset / warranty of material/product of existing road </td>
                                                    {{-- <td></td> --}}
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR3()" type="number" min="0" max="2" class="targetPointMR3"></td>
                                                    <td><input onblur="findAssessmentPointMR3()" type="number" min="0" max="2" class="assessmentPointMR3"></td>
                                                    <td><input onblur="commentMR3()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahMR3<input type="text" name="markahMR3" id="markahMR3" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">MR 4</td>
                                                    <td colspan="2">EFFICIENT ROAD LIGHTINGS</td>
                                                    {{-- <td></td> --}}
                                                    <td>1</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >All systems should be designed to use energy efficient road lightings, while complying to standard and specification for road lightings (eg. MS 825 part 1:2007)</td>
                                                    <td rowspan="1">CKE</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR4()" type="number" min="0" max="2" class="targetPointMR4"></td>
                                                    <td><input onblur="findAssessmentPointMR4()" type="number" min="0" max="2" class="assessmentPointMR4"></td>
                                                    <td><input onblur="commentMR4()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahMR4<input type="text" name="markahMR4" id="markahMR4" /></td>            
                                                  </tr>
                              
                                                  <tr >
                                                    <td colspan="3"> SUB TOTAL MR POINT</td>
                                                    <td>12</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td colspan="3"> TOTAL CORE POINT</td>
                                                    <td>69</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>EC</td>
                                                    <td colspan="6" align="left">ELECTIVE CRITERIAS</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="4">SM 5 - EC</td>
                                                    <td colspan="2">SERVICES FOR DISABLED USERS	</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Crossing for disabled users with noise making devices installed</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM5EC()" type="number" min="0" max="2" class="targetPointSM5EC"></td>
                                                    <td><input onblur="findAssessmentPointSM5EC()" type="number" min="0" max="2" class="assessmentPointSM5EC"></td>
                                                    <td><input onblur="commentSM5EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Walkway access for disabled users by providing sidewalks sloped for easy access</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM5EC()" type="number" min="0" max="2" class="targetPointSM5EC"></td>
                                                    <td><input onblur="findAssessmentPointSM5EC()" type="number" min="0" max="2" class="assessmentPointEC"></td>
                                                    <td><input onblur="commentSM5EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Tac tile on the pedestrian pathway and access for disabled users</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM5EC()" type="number" min="0" max="2" class="targetPointSM5EC"></td>
                                                    <td><input onblur="findAssessmentPointSM5EC()" type="number" min="0" max="2" class="assessmentPointSM5EC"></td>
                                                    <td><input onblur="commentSM5EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahSM5EC<input type="text" name="markahSM5EC" id="markahSM5EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="4">SM 6 - EC</td>
                                                    <td colspan="2">NOISE CONTROL	</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >The pavement mix design  by using quiet pavement</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointSM6EC()" type="number" min="0" max="2" class="targetPointSM6EC"></td>
                                                    <td><input onblur="findAssessmentPointSM6EC()" type="number" min="0" max="2" class="assessmentPointSM6EC"></td>
                                                    <td><input onblur="commentSM6EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Noise barrier shall be provided in sensitive areas such as housing situated beside busy roads or highways, schools and hospitals</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointSM6EC()" type="number" min="0" max="2" class="targetPointSM6EC"></td>
                                                    <td><input onblur="findAssessmentPointSM6EC()" type="number" min="0" max="2" class="assessmentPointSM6EC"></td>
                                                    <td><input onblur="commentSM6EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Buffer Zone </td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointSM6EC()" type="number" min="0" max="2" class="targetPointSM6EC"></td>
                                                    <td><input onblur="findAssessmentPointSM6EC()" type="number" min="0" max="2" class="assessmentPointSM6EC"></td>
                                                    <td><input onblur="commentSM6EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahSM6EC<input type="text" name="markahSM6EC" id="markahSM6EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">EW 3 - EC</td>
                                                    <td colspan="2">ECOLOGICAL CONNECTIVITY		</td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >"Provide dedicated wildlife crossing structures and protective fencing as determined by Environmental Impact Assessment (EIA) report 
                                                      OR
                                                      Provide sound barrier at sensitive area for wildlife"</td>
                                                    <td></td>
                                                    <td>5</td>
                                                    <td><input onblur="findTargetPointEW3EC()" type="number" min="0" max="2" class="targetPointEW3EC"></td>
                                                    <td><input onblur="findAssessmentPointEW3EC()" type="number" min="0" max="2" class="assessmentPointEW3EC"></td>
                                                    <td><input onblur="commentEW3EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahEW3EC<input type="text" name="markahEW3EC" id="markahEW3EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">AE 2 - EC</td>
                                                    <td colspan="2"> SCENIC VIEWS </td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >"Provide dedicated wildlife crossing structures and protective fencing as determined by Environmental Impact Assessment (EIA) report 
                                                      OR
                                                      Provide sound barrier at sensitive area for wildlife"</td>
                                                    <td></td>
                                                    <td>5</td>
                                                    <td><input onblur="findTargetPointAE2EC()" type="number" min="0" max="2" class="targetPointAE2EC"></td>
                                                    <td><input onblur="findAssessmentPointAE2EC()" type="number" min="0" max="2" class="assessmentPointAE2EC"></td>
                                                    <td><input onblur="commentAE2EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE2EC<input type="text" name="markahAE2EC" id="markahAE2EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="5">AE 3 - EC</td>
                                                    <td colspan="2"> PEDESTRIAN ACCESS </td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Zebra Crossing or Signalised Pedestrian Crossing  and Refuge Island</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE3EC()" type="number" min="0" max="2" class="targetPointAE3EC"></td>
                                                    <td><input onblur="findAssessmentPointAE3EC()" type="number" min="0" max="2" class="assessmentPointAE3EC"></td>
                                                    <td><input onblur="commentAE3EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Overhead Pedestrian Bridge</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointAE3EC()" type="number" min="0" max="2" class="targetPointAE3EC"></td>
                                                    <td><input onblur="findAssessmentPointAE3EC()" type="number" min="0" max="2" class="assessmentPointAE3EC"></td>
                                                    <td><input onblur="commentAE3EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Sidewalk / Walkway and Raised Crosswalk</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE3EC()" type="number" min="0" max="2" class="targetPointAE3EC"></td>
                                                    <td><input onblur="findAssessmentPointAE3EC()" type="number" min="0" max="2" class="assessmentPointAE3EC"></td>
                                                    <td><input onblur="commentAE3EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Covered walkway</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE3EC()" type="number" min="0" max="2" class="targetPointAE3EC"></td>
                                                    <td><input onblur="findAssessmentPointAE3EC()" type="number" min="0" max="2" class="assessmentPointAE3EC"></td>
                                                    <td><input onblur="commentAE3EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE3EC<input type="text" name="markahAE3EC" id="markahAE3EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="5">AE 4 - EC</td>
                                                    <td colspan="2"> MOTORCYCLE LANE </td>
                                                    {{-- <td></td> --}}
                                                    <td>6</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Paved shoulder, non-exclusive motorcycle lane and end treatment at junction</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE4EC()" type="number" min="0" max="2" class="targetPointAE4EC"></td>
                                                    <td><input onblur="findAssessmentPointEC()" type="number" min="0" max="2" class="assessmentPointEC"></td>
                                                    <td><input onblur="commentAE4EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Exclusive motorcycle lane</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointAE4EC()" type="number" min="0" max="2" class="targetPointAE4EC"></td>
                                                    <td><input onblur="findAssessmentPointEC()" type="number" min="0" max="2" class="assessmentPointEC"></td>
                                                    <td><input onblur="commentAE4EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Overhead motorcycle bridge</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointAE4EC()" type="number" min="0" max="2" class="targetPointAE4EC"></td>
                                                    <td><input onblur="findAssessmentPointEC()" type="number" min="0" max="2" class="assessmentPointEC"></td>
                                                    <td><input onblur="commentAE4EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Motorcycle shelter</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE4EC()" type="number" min="0" max="2" class="targetPointAE4EC"></td>
                                                    <td><input onblur="findAssessmentPointEC()" type="number" min="0" max="2" class="assessmentPointEC"></td>
                                                    <td><input onblur="commentAE4EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE4EC<input type="text" name="markahAE4EC" id="markahAE4EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">AE 5 - EC</td>
                                                    <td colspan="2"> REST AREA </td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provide or maintain existing rest area facilities along the road </td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointAE5EC()" type="number" min="0" max="2" class="targetPointAE5EC"></td>
                                                    <td><input onblur="findAssessmentPointAE5EC()" type="number" min="0" max="2" class="assessmentPointEC"></td>
                                                    <td><input onblur="commentAE5EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE5EC<input type="text" name="markahAE5EC" id="markahAE5EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="3">AE 6 - EC</td>
                                                    <td colspan="2"> BICYCLE ASSESS </td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Implement physical or constructed changes to the roadway structure, dimensions, or form that provide bicycle-only facilities with dedicated access (such as bicycle lane). Lanes shared with motorized vehicles do not meet this requirement </td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE6EC()" type="number" min="0" max="2" class="targetPointAE6EC"></td>
                                                    <td><input onblur="findAssessmentPointAE6EC()" type="number" min="0" max="2" class="assessmentPointEC"></td>
                                                    <td><input onblur="commentAE6EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Implement physical or constructed changes to the roadway structure, dimensions, or form that provide bicycle-only facilities with dedicated access (such as bicycle lane). Lanes shared with motorized vehicles do not meet this requirement</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointAE6EC()" type="number" min="0" max="2" class="targetPointAE6EC"></td>
                                                    <td><input onblur="findAssessmentPointAE6EC()" type="number" min="0" max="2" class="assessmentPointAE6EC"></td>
                                                    <td><input onblur="commentAE6EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE6EC<input type="text" name="markahAE6EC" id="markahAE6EC" /></td>            
                                                  </tr>
                              
                                                  
                              
                                                  <tr >
                                                    <td colspan="3"> TOTAL ELECTIVE POINT</td>
                                                    <td>27</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
            
                                                  <tr>
                                                    <td>IN</td>
                                                    <td colspan="6" align="left">INNOVATION</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="2">IN 1</td>
                                                    <td colspan="2">ANY RELATED INNOVATION</td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td>Come up with an idea for a design or construction best practice for road that is not currently included in Manual pH JKR and is more sustainable than standard or conventional practices</td>
                                                    <td rowspan="1">ANY</td>
                                                    <td>5</td>
                                                    <td><input onblur="findTargetPointIN()" type="number" min="0" max="2" class="targetPointIN"></td>
                                                    <td><input onblur="findAssessmentPointIN()" type="number" min="0" max="2" class="assessmentPointIN"></td>
                                                    <td><input onblur="commentIN()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td colspan="3"> TOTAL INNOVATION POINT</td>
                                                    {{-- <td><input type="text" name="markahIN" id="markahIN" /></td>  --}}
                                                    <td>5</td> 
                                                    <td>0</td>           
                                                    <td>0</td>
                                                    <td></td>
                                                  </tr>
                              
                              
                              
                                                </tbody>
                                              </table>
                              
                                              <div align="center" class="mt-3">
                                                <button class="btn btn-primary" type="submit" title="Simpan">Simpan</button>
                                                <button class="btn btn-primary" type="submit" title="Simpan">Sah</button>
                                                <button class="btn btn-primary" type="submit" title="Simpan">Jana Keputusan</button>
                                                <button class="btn btn-primary" type="submit" title="Simpan">Jana Sijil</button>
                                                {{-- <a href="/penilaian_reka_bentuk_jalan/isi_skor_kad_page2" type="button" class="btn btn-primary">Seterusnya</a>           --}}
                                              </div>
                                    </form>
                                    </div> 
                            </div>
                            {{-- <div class="col">
                            </div> --}}
                        </div>
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



            <div class="row mb-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="col mb-">
                                <h2 class="h2 mb-3">BORANG PERMOHONAN RAYUAN JALAN</h2>
                            </div>
            
                            <div class="col">
                                <div>
                                    <form action="/projek/{{$projek->id}}/eph-jalan/rekabentuk" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <table>
                                        <div class="row3 mx-4 table-responsive scrollbar">
                                            <div class="col">
                                              <table class="table table-bordered line-table text-center" style="width: 100%">
                                                <thead class="text-white bg-orange-jkr">
                                                  <tr>
                                        
                                                    
                                                    <th >Kod</th>
                                                    <th >Kriteria</th>
                                                    <th >Responsibility</th>
                                                    <th colspan="4">Design</th>
                                                    
                                     
                                                  </tr>
                                                  <tr>
                                                    
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th >MAX POINT</th>
                                                    <th >TARGET POINT</th>
                                                    <th >ASSESSMENT POINT</th>
                                                    <th>COMMENT BY ASSESSOR</th>
                                                  </tr>
                                
                                                </thead>
                                                <tbody>
                              
                                                  <tr>
                                                    <td>SM</td>
                                                    <td colspan="6" align="left">SUSTAINABLE SITE PLANNING AND MANAGEMENT</td>  
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="12">SM1</td>
                                                    <td colspan="2">REQUIREMENT FOR ROAD WORKS DESIGN</td>
                                                    <td>7</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Traffic study</td>
                                                    <td rowspan="7">CJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Site investigation data</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                   
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Flood records</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Response to public complaints or requests from public, local authority & etc.</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Value Management (VM)</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                               
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Survey Drawing</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                
                                                  </tr>
                              
                                                  <tr>
                                                    <td >As Built Drawings</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                              
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Accident Reports</td>
                                                    <td>CSFJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Structure replacement (Bridge assessment report/ Inventory card)</td>
                                                    <td rowspan="3">CJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Forensic Report</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Pavement evaluation (testing & report)</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM1()" type="number" min="0" max="2" class="targetPointSM1" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <td style="display: none">markahSM1<input type="text" name="markahSM1" id="markahSM1" /></td>            
                              
                              
                                                 
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="9">SM2</td>
                                                    <td colspan="2">ROAD ALIGNMENT</td>
                                                    <td>6</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Slope not more than 6 berms</td>
                                                    <td rowspan="7">CJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Cut slope not steeper than 1:1.5 or Rock slope not steeper than 4:1 </td>
                                                    {{-- <td rowspan="7">CKG</td> --}}
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                   
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Fill slope not steeper than 1:2</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Height of slope not more than 6m</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Maximum grade less than 7%</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                               
                                                  </tr>
                              
                                                  <tr>
                                                    <td >No reclamation involved existing water bodies</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provide added uphill lane (climbing lane) where the length of critical grade exceeds 5%</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                              
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Not in Sensitive Area OR Sensitive area with mitigation plan</td>
                                                    <td>CASKT</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM2()" type="number" min="0" max="2" class="targetPointSM2" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                              
                                                  <td style="display: none">markahSM2<input type="text" name="markahSM2" id="markahSM2" /></td>            
                              
                              
                                                
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="7">SM3</td>
                                                    <td colspan="2">SITE VEGETATION</td>
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                 
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Use non-invasive plant species(example: grass/creeper) </td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                   
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Use bio-engineering techniques (example: vetiver grass, creeper and regeneration of natural plants and material )</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Use native plant species</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Use of grass/creeper for slope protection /unpaved shoulder</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                               
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Hydroseeding with Bio-degradable Erosion Control Blanket(BECB) on slope</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Preservation of existing tree/vegetation</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM3()" type="number" min="0" max="2" class="targetPointSM3" ></td>
                                                    <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                    <td><input onblur="commentSM3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                              
                                                  </tr>
                              
                                                  <td style="display: none">markahSM3<input type="text" name="markahSM3" id="markahSM3" /></td>            
                              
                              
                              
                                                 
                              
                              
                                                  <td colspan="1" rowspan="4">SM4</td>
                                                  <td colspan="2">NOISE MITIGATION PLAN</td>
                                                  <td>2</td>
                                                  <td>0</td>
                                                  <td>0</td>
                                                  <td></td>
                               
                                                </tr>
                              
                                                <tr>
                                                  <td >Supply and install noise barrier including maintenance during the construction and defects liability period (for urban area / residential area)</td>
                                                  <td rowspan="4">CJ</td>
                                                  <td>1</td>
                                                  <td><input onblur="findTargetPointSM4()" type="number" min="0" max="2" class="targetPointSM4" ></td>
                                                  <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                  <td><input onblur="commentSM4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                </tr>
                              
                                                <tr>
                                                  <td >To ensure that all site equipment are in using low decibel to control noise pollution </td>
                                                  <td>1</td>
                                                  <td><input onblur="findTargetPointSM4()" type="number" min="0" max="2" class="targetPointSM4" ></td>
                                                  <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                  <td><input onblur="commentSM4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                 
                                                </tr>
                              
                                                <tr>
                                                  <td >To ensure using all machineryon site are low decibel to minimize the amount of noise generated </td>
                                                  <td>1</td>
                                                  <td><input onblur="findTargetPointSM4()" type="number" min="0" max="2" class="targetPointSM4" ></td>
                                                  <td><input onblur="findAssessmentPointSM()" type="number" min="0" max="2" class="assessmentPointSM"></td>
                                                  <td><input onblur="commentSM4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  
                                                </tr>
                              
                                                <td style="display: none">markahSM4<input type="text" name="markahSM4" id="markahSM4" /></td>            
                              
                              
                                                <tr >
                                                  <td colspan="3"> SUB TOTAL SM POINT</td>
                                                  <td>18</td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                </tr>
            
                                                <tr>
                                                    <td>PT</td>
                                                    <td colspan="6" align="left">PAVEMENT TECHNOLOGIES</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="6">PT1</td>
                                                    <td colspan="2">EXISTING PAVEMENT EVALUATION</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td>Surface Condition Survey</td>
                                                    <td rowspan="5">CSFJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT1()" type="number" min="0" max="2" class="targetPointPT1" ></td>
                                                    <td><input onblur="findAssessmentPointPT1()" type="number" min="0" max="2" class="assessmentPointPT1"></td>
                                                    <td><input onblur="commentPT1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Coring & Dynamic Cone Penetrometer test</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT1()" type="number" min="0" max="2" class="targetPointPT1" ></td>
                                                    <td><input onblur="findAssessmentPointPT1()" type="number" min="0" max="2" class="assessmentPointPT1"></td>
                                                    <td><input onblur="commentPT1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Deflection test</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT1()" type="number" min="0" max="2" class="targetPointPT1" ></td>
                                                    <td><input onblur="findAssessmentPointPT1()" type="number" min="0" max="2" class="assessmentPointPT1"></td>
                                                    <td><input onblur="commentPT1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                
                                                  <tr>
                                                    <td >Trial pit & Laboratory test</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT1()" type="number" min="0" max="2" class="targetPointPT1" ></td>
                                                    <td><input onblur="findAssessmentPointPT1()" type="number" min="0" max="2" class="assessmentPointPT1"></td>
                                                    <td><input onblur="commentPT1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Surface Regularity Test (International Roughness Index, IRI)</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT1()" type="number" min="0" max="2" class="targetPointPT1" ></td>
                                                    <td><input onblur="findAssessmentPointPT1()" type="number" min="0" max="2" class="assessmentPointPT1"></td>
                                                    <td><input onblur="commentPT1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahPT1<input type="text" name="markahPT1" id="markahPT1" /></td>            
                                                  </tr>
                              
                                                  
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="4">PT 2</td>
                                                    <td colspan="2">PERMEABLE PAVEMENT</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  {{-- <tr>
                                                    <td rowspan="9">SM2</td>
                                                    <td colspan="2">Road alignment</td>
                                                    <td>6</td>
                                                    
                                                    <td><input onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></td>
                                                    <td><input onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></td>
                                                    <td><input onblur="roadWorks()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr> --}}
                              
                                                  <tr>
                                                    <td >use of permeable (porous) pavement mix design</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT2()" type="number" min="0" max="2" class="targetPointPT2" ></td>
                                                    <td><input onblur="findAssessmentPointPT2()" type="number" min="0" max="2" class="assessmentPointPT2"></td>
                                                    <td><input onblur="commentPT2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Pavement crossfall 2.5% and min unpaved shoulder to drain</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT2()" type="number" min="0" max="2" class="targetPointPT2" ></td>
                                                    <td><input onblur="findAssessmentPointPT2()" type="number" min="0" max="2" class="assessmentPointPT2"></td>
                                                    <td><input onblur="commentPT2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Drainability of porous asphalt wearing course having a minimum thickness of 50mm</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT2()" type="number" min="0" max="2" class="targetPointPT2" ></td>
                                                    <td><input onblur="findAssessmentPointPT2()" type="number" min="0" max="2" class="assessmentPointPT2"></td>
                                                    <td><input onblur="commentPT2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahPT2<input type="text" name="markahPT2" id="markahPT2" /></td>            
                                                  </tr>
                                                  
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">PT 3</td>
                                                    <td colspan="2">PAVEMENT PERFORMANCE TRACKING</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >"Use a process that allows construction quality measurements and long-term pavement performance measurements to be spatially located and correlated to one another
                                                      i. Construction quality measurements must be spatially located such that the location of the quality measurement is known
                                                      ii. Pavement condition measurements must be taken at least every 2 3 years (To be confirm) and must be spatially located to a specific portion of roadway or location within roadway
                                                      iii. An operational system, computer based or otherwise that is capable of storing construction quality measurements, pavement condition measurement and their spatial locations
                                                      iv. The designated system must be demonstrated in operation, be capable of updates and have written plans for its maintenance in perpetuity"</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointPT3()" type="number" min="0" max="2" class="targetPointPT3" name="" id=""></td>
                                                    <td><input onblur="findAssessmentPointPT3()" type="number" min="0" max="2" class="assessmentPointPT3" name="" id=""></td>
                                                    <td><input onblur="commentPT3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahPT3<input type="text" name="markahPT3" id="markahPT3" /></td>            
                                                  </tr>
                                                  
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="5">PT 4</td>
                                                    <td colspan="2">LONG-LIFE PAVEMENT</td>
                                                    {{-- <td></td> --}}
                                                    <td>4</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Meet the requirements of Arahan Teknik Jalan 5/85 (Pindaan 2013): Manual for the structural design of flexible pavement</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT4()" type="number" min="0" max="2" class="targetPointPT4"></td>
                                                    <td><input onblur="findAssessmentPointPT4()" type="number" min="0" max="2" class="assessmentPointPT4"></td>
                                                    <td><input onblur="commentPT4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Pavement design is in accordance with a design procedure that is formally recognized, adopted and documented by the agency</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT4()" type="number" min="0" max="2" class="targetPointPT4"></td>
                                                    <td><input onblur="findAssessmentPointPT4()" type="number" min="0" max="2" class="assessmentPointPT4"></td>
                                                    <td><input onblur="commentPT4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Drainability surface runoff by providing scupper drain with hinge grating or equivalent to  ensure no debris blockage and maintainability</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointPT4()" type="number" min="0" max="2" class="targetPointPT4"></td>
                                                    <td><input onblur="findAssessmentPointPT4()" type="number" min="0" max="2" class="assessmentPointPT4"></td>
                                                    <td><input onblur="commentPT4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >"Rigid Pavement > 40 years design life
                                                      OR
                                                      Flexible Pavement > 20 Years  design life
                                                      OR
                                                      To strengthen road based using soil stabilizer method"</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointPT4()" type="number" min="0" max="2" class="targetPointPT4"></td>
                                                    <td><input onblur="findAssessmentPointPT4()" type="number" min="0" max="2" class="assessmentPointPT4"></td>
                                                    <td><input onblur="commentPT4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahPT4<input type="text" name="markahPT4" id="markahPT4" /></td>            
                                                  </tr>
                              
                                                  <tr >
                                                    <td colspan="3"> SUB TOTAL PT POINT</td>
                                                    <td>12</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
            
                                                  <tr>
                                                    <td>EW</td>
                                                    <td colspan="6" align="left">ENVIRONMENT & WATER</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="2">EW1</td>
                                                    <td colspan="2">ENVIRONMENTAL MANAGEMENT SYSTEM</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td>"Provision of EPW in contract  (Design Stage) 
                                                      ISO 14001:2004 certification for main contractor (Verification stage)"</td>
                                                    <td rowspan="1">CSFJ</td>
                                                    <td>3</td>
                                                    <td><input onblur="findTargetPointEW1()" type="number" min="0" max="2" class="targetPointEW1" ></td>
                                                    <td><input onblur="findAssessmentPointEW1()" type="number" min="0" max="2" class="assessmentPointEW1"></td>
                                                    <td><input onblur="commentEW1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahEW1<input type="text" name="markahEW1" id="markahEW1" /></td>            
                                                  </tr>
                                
                                                  
                              
                                                  
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="3">EW2</td>
                                                    <td colspan="2">STORMWATER MANAGEMENT</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  
                                
                                                  {{-- <tr>
                                                    <td rowspan="9">SM2</td>
                                                    <td colspan="2">Road alignment</td>
                                                    <td>6</td>
                                                    
                                                    <td><input onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></td>
                                                    <td><input onblur="roadWorks()" type="number" min="0" max="2" class="road" name="" id=""></td>
                                                    <td><input onblur="roadWorks()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr> --}}
                              
                                                  <tr>
                                                    <td >Develop a stormwater management documents and drawing plans for the site using stormwater best management practices (BMP) for flow control in conformance to the Manual  Saliran Mesra Alam for Malaysia (MSMA) / MSMA 2nd Edition and EMS ISO 14001:2015. Demonstrate that the planned BMPs to conform to all applicable 5% above minimum flow control standards set by MSMA/MSMA 2nd Edition and EMS ISO 14001: 2015.</td>
                                                    <td rowspan="2">CKAS</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointEW2()" type="number" min="0" max="2" class="targetPointEW2" ></td>
                                                    <td><input onblur="findAssessmentPointEW2()" type="number" min="0" max="2" class="assessmentPointEW2"></td>
                                                    <td><input onblur="commentEW2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Develop a stormwater management plan for the site using stormwater best management practices (BMP) for water quality control in conformance to the Stormwater Management Manual for Malaysia (MSMA) and EMS ISO 14001:2004. Demonstrate that the planned BMPs to conform to all applicable 5% above minimum water quality standards set by MSMA and EMS ISO 14001: 2004</td>
                                                    {{-- <td></td> --}}
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointEW2()" type="number" min="0" max="2" class="targetPointEW2" ></td>
                                                    <td><input onblur="findAssessmentPointEW2()" type="number" min="0" max="2" class="assessmentPointEW2"></td>
                                                    <td><input onblur="commentEW2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahEW2<input type="text" name="markahEW2" id="markahEW2" /></td>            
                                                  </tr>
                                                  
                                                  <tr >
                                                    <td colspan="3"> SUB TOTAL EW POINT</td>
                                                    <td>5</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>AE</td>
                                                    <td colspan="6" align="left">ACCESS & EQUITY</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="5">AE 1</td>
                                                    <td colspan="2">SAFETY AUDIT</td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Road Safety Audit (During Design Stage)</td>
                                                    <td></td>
                                                    <td>3</td>
                                                    <td><input onblur="findTargetPointAE1()" type="number" min="0" max="2" class="targetPointAE1" ></td>
                                                    <td><input onblur="findAssessmentPointAE1()" type="number" min="0" max="2" class="assessmentPointAE1" ></td>
                                                    <td><input onblur="commentAE1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Road Safety Audit (During Construction Stage)</td>
                                                    <td></td>
                                                    <td>3</td>
                                                    <td><input onblur="findTargetPointAE1()" type="number" min="0" max="2" class="targetPointAE1" ></td>
                                                    <td><input onblur="findAssessmentPointAE1()" type="number" min="0" max="2" class="assessmentPointAE1" ></td>
                                                    <td><input onblur="commentAE1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Additional Audit For Traffic Management Safety Report During Construction</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE1()" type="number" min="0" max="2" class="targetPointAE1" ></td>
                                                    <td><input onblur="findAssessmentPointAE1()" type="number" min="0" max="2" class="assessmentPointAE1" ></td>
                                                    <td><input onblur="commentAE1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Road Safety Audit (During Operational Stage)</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE1()" type="number" min="0" max="2" class="targetPointAE1" ></td>
                                                    <td><input onblur="findAssessmentPointAE1()" type="number" min="0" max="2" class="assessmentPointAE1" ></td>
                                                    <td><input onblur="commentAE1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE1<input type="text" name="markahAE1" id="markahAE1" /></td>            
                                                  </tr>
                              
                                                  <tr >
                                                    <td colspan="3"> SUB TOTAL AE POINT</td>
                                                    <td>5</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>CA</td>
                                                    <td colspan="6" align="left">CONSTRUCTION ACTIVITY</td>
                                                    
                                                  </tr>
                                                  
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">CA1</td>
                                                    <td colspan="2">REQUIREMENT FOR ROAD WORKS DESIGN</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >MS ISO 9001:2008 or (latest version) certification for main contractor</td>
                                                    <td></td>
                                                    <td>3</td>
                                                    <td><input onblur="findTargetPointCA1()" type="number" min="0" max="2" class="targetPointCA1"></td>
                                                    <td><input onblur="findAssessmentPointCA1()" type="number" min="0" max="2" class="assessmentPointCA1" ></td>
                                                    <td><input onblur="commentCA1()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA1<input type="text" name="markahCA1" id="markahCA1" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="3">CA2</td>
                                                    <td colspan="2">OCCUPTIONAL HEALTH AND SAFETY MANAGEMENT SYSTEM</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >OHSAS 18001:2007 0r (latest version) certification for main contractor</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA2()" type="number" min="0" max="2" class="targetPointCA2"></td>
                                                    <td><input onblur="findAssessmentPointCA2()" type="number" min="0" max="2" class="assessmentPointCA2" ></td>
                                                    <td><input onblur="commentCA2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td >To provide site safety and health officer with certification by DOSH</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointCA2()" type="number" min="0" max="2" class="targetPointCA2"></td>
                                                    <td><input onblur="findAssessmentPointCA2()" type="number" min="0" max="2" class="assessmentPointCA2" ></td>
                                                    <td><input onblur="commentCA2()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA2<input type="text" name="markahCA2" id="markahCA2" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="5">CA 3</td>
                                                    <td colspan="2">OCONSTRUCTION WASTE MANAGEMENT PLAN	</td>
                                                    {{-- <td></td> --}}
                                                    <td>4</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Create, establish, implement and maintain a formal construction waste management plan during road construction</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA3()" type="number" min="0" max="2" class="targetPointCA3"></td>
                                                    <td><input onblur="findAssessmentPointCA3()" type="number" min="0" max="2" class="assessmentPointCA3" ></td>
                                                    <td><input onblur="commentCA3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provision of Waste Management Plan in the contract (BQ)</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA3()" type="number" min="0" max="2" class="targetPointCA3"></td>
                                                    <td><input onblur="findAssessmentPointCA3()" type="number" min="0" max="2" class="assessmentPointCA3" ></td>
                                                    <td><input onblur="commentCA3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provide a designated location to segregate construction waste on-site</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointCA3()" type="number" min="0" max="2" class="targetPointCA3"></td>
                                                    <td><input onblur="findAssessmentPointCA3()" type="number" min="0" max="2" class="assessmentPointCA3" ></td>
                                                    <td><input onblur="commentCA3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Appoint the licensed contractor(s) to collect the construction waste </td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointCA3()" type="number" min="0" max="2" class="targetPointCA3"></td>
                                                    <td><input onblur="findAssessmentPointCA3()" type="number" min="0" max="2" class="assessmentPointCA3" ></td>
                                                    <td><input onblur="commentCA3()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA3<input type="text" name="markahCA3" id="markahCA3" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="4">CA 4</td>
                                                    <td colspan="2">TRAFFIC MANAGEMENT PLAN</td>
                                                    {{-- <td></td> --}}
                                                    <td>4</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Create, establish and implement a formal traffic management plan during Design and road construction stage</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA4()" type="number" min="0" max="2" class="targetPointCA4"></td>
                                                    <td><input onblur="findAssessmentPointCA4()" type="number" min="0" max="2" class="assessmentPointCA4" ></td>
                                                    <td><input onblur="commentCA4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provision of Traffic Management Officer in the contract document (BQ)</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointCA4()" type="number" min="0" max="2" class="targetPointCA4"></td>
                                                    <td><input onblur="findAssessmentPointCA4()" type="number" min="0" max="2" class="assessmentPointCA4" ></td>
                                                    <td><input onblur="commentCA4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provision of third party auditor for Traffic Management Plan (TMP)</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointCA4()" type="number" min="0" max="2" class="targetPointCA4"></td>
                                                    <td><input onblur="findAssessmentPointCA4()" type="number" min="0" max="2" class="assessmentPointCA4" ></td>
                                                    <td><input onblur="commentCA4()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA4<input type="text" name="markahCA4" id="markahCA4" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">CA 5</td>
                                                    <td colspan="2">SITE ROUTINE MAINTENANCE PLAN 	</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Create, establish, implement routine maintenanace for road project </td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA5()" type="number" min="0" max="2" class="targetPointCA5"></td>
                                                    <td><input onblur="findAssessmentPointCA5()" type="number" min="0" max="2" class="assessmentPointCA5" ></td>
                                                    <td><input onblur="commentCA5()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA5<input type="text" name="markahCA5" id="markahCA5" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">CA 6</td>
                                                    <td colspan="2">HOUSEKEEPING 	</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >"Provision Housekeeping implementation in the contract document/ BQ
                                                      OR
                                                      Establish and implement housekeeping during construction "</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA6()" type="number" min="0" max="2" class="targetPointCA6"></td>
                                                    <td><input onblur="findAssessmentPointCA6()" type="number" min="0" max="2" class="assessmentPointCA6" ></td>
                                                    <td><input onblur="commentCA6()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA6<input type="text" name="markahCA6" id="markahCA6" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="4">CA 7</td>
                                                    <td colspan="2">HOUSEKEEPING 	</td>
                                                    {{-- <td></td> --}}
                                                    <td>4</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Perform scheduled maintenance of construction machineries</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA7()" type="number" min="0" max="2" class="targetPointCA7"></td>
                                                    <td><input onblur="findAssessmentPointCA7()" type="number" min="0" max="2" class="assessmentPointCA7" ></td>
                                                    <td><input onblur="commentCA7()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Use high performance machineries with low fuel consumption and low air emission</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA7()" type="number" min="0" max="2" class="targetPointCA7"></td>
                                                    <td><input onblur="findAssessmentPointCA7()" type="number" min="0" max="2" class="assessmentPointCA7" ></td>
                                                    <td><input onblur="commentCA7()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Provision of ESCP and Environmental Monitoring Report (EMR) – (eg. Water/ Air/ Noise Quality ) in the contract</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointCA7()" type="number" min="0" max="2" class="targetPointCA7"></td>
                                                    <td><input onblur="findAssessmentPointCA7()" type="number" min="0" max="2" class="assessmentPointCA7" ></td>
                                                    <td><input onblur="commentCA7()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahCA7<input type="text" name="markahCA7" id="markahCA7" /></td>            
                                                  </tr>
                              
                                                 
                              
                                                  <tr >
                                                    <td colspan="3"> SUB TOTAL CA POINT</td>
                                                    <td>22</td>
                                                    <td style="display: none">markahCA<input type="text" name="markahCA" id="markahCA" /></td>            
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
            
                                                  <tr>
                                                    <td>MR</td>
                                                    <td colspan="5" align="left">MATERIAL & RESOURCES</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="6">MR 1</td>
                                                    <td colspan="2">MATERIAL REUSE	</td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td>Reuse at a minimum 30% of existing pavement materials by estimated volume</td>
                                                    <td rowspan="4">CJ</td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointMR1()" type="number" min="0" max="2" class="targetPointMR1"></td>
                                                    <td><input onblur="findAssessmentPointMR1()" type="number" min="0" max="2" class="assessmentPointMR1"></td>
                                                    <td><input onblur="commentMR1()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>Reuse of existing material other than pavement materials </td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR1()" type="number" min="0" max="2" class="targetPointMR1"></td>
                                                    <td><input onblur="findAssessmentPointMR1()" type="number" min="0" max="2" class="assessmentPointMR1"></td>
                                                    <td><input onblur="commentMR1()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>Earthwork balance </td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR1()" type="number" min="0" max="2" class="targetPointMR1"></td>
                                                    <td><input onblur="findAssessmentPointMR1()" type="number" min="0" max="2" class="assessmentPointMR1"></td>
                                                    <td><input onblur="commentMR1()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>Fiber Roll Netting using biodegradable material at site for erosion control (eg. Wooden dust, coconut fiber)</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR1()" type="number" min="0" max="2" class="targetPointMR1"></td>
                                                    <td><input onblur="findAssessmentPointMR1()" type="number" min="0" max="2" class="assessmentPointMR1"></td>
                                                    <td><input onblur="commentMR1()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>To use reusable formwork for structure (eg: steel/ fiber formwork)</td>
                                                    <td ></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR1()" type="number" min="0" max="2" class="targetPointMR1"></td>
                                                    <td><input onblur="findAssessmentPointMR1()" type="number" min="0" max="2" class="assessmentPointMR1"></td>
                                                    <td><input onblur="commentMR1()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahMR1<input type="text" name="markahMR1" id="markahMR1" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="5">MR 2</td>
                                                    <td colspan="2">GREEN PRODUCT</td>
                                                    {{-- <td></td> --}}
                                                    <td>4</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Green Products Scoring System (GPSS) of 70% - 100%</td>
                                                    <td rowspan="4">CASKT</td>
                                                    <td>4</td>
                                                    <td><input onblur="findTargetPointMR2()" type="number" min="0" max="2" class="targetPointMR2"></td>
                                                    <td><input onblur="findAssessmentPointMR2()" type="number" min="0" max="2" class="assessmentPointMR2"></td>
                                                    <td><input onblur="commentMR()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Green Products Scoring System (GPSS) of 50% - 69%</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td><input onblur="findTargetPointMR2()" type="number" min="0" max="2" class="targetPointMR2"></td>
                                                    <td><input onblur="findAssessmentPointMR2()" type="number" min="0" max="2" class="assessmentPointMR2"></td>
                                                    <td><input onblur="commentMR2()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Green Products Scoring System (GPSS) of 40% - 49%</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointMR2()" type="number" min="0" max="2" class="targetPointMR2"></td>
                                                    <td><input onblur="findAssessmentPointMR2()" type="number" min="0" max="2" class="assessmentPointMR2"></td>
                                                    <td><input onblur="commentMR2()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Use Green Product Scoring System (GPSS)</td>
                                                    {{-- <td></td> --}}
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR2()" type="number" min="0" max="2" class="targetPointMR2"></td>
                                                    <td><input onblur="findAssessmentPointMR2()" type="number" min="0" max="2" class="assessmentPointMR2"></td>
                                                    <td><input onblur="commentMR2()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahMR2<input type="text" name="markahMR2" id="markahMR2" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="3">MR 3</td>
                                                    <td colspan="2">ROAD INVENTORIES</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    {{-- <td>0</td> --}}
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provide updated master inventory of road asset / warranty of material/product after completion of road works</td>
                                                    <td rowspan="2">CSFJ</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR3()" type="number" min="0" max="2" class="targetPointMR3"></td>
                                                    <td><input onblur="findAssessmentPointMR3()" type="number" min="0" max="2" class="assessmentPointMR3"></td>
                                                    <td><input onblur="commentMR3()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Provide established master inventory of  road asset / warranty of material/product of existing road </td>
                                                    {{-- <td></td> --}}
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR3()" type="number" min="0" max="2" class="targetPointMR3"></td>
                                                    <td><input onblur="findAssessmentPointMR3()" type="number" min="0" max="2" class="assessmentPointMR3"></td>
                                                    <td><input onblur="commentMR3()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahMR3<input type="text" name="markahMR3" id="markahMR3" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">MR 4</td>
                                                    <td colspan="2">EFFICIENT ROAD LIGHTINGS</td>
                                                    {{-- <td></td> --}}
                                                    <td>1</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >All systems should be designed to use energy efficient road lightings, while complying to standard and specification for road lightings (eg. MS 825 part 1:2007)</td>
                                                    <td rowspan="1">CKE</td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointMR4()" type="number" min="0" max="2" class="targetPointMR4"></td>
                                                    <td><input onblur="findAssessmentPointMR4()" type="number" min="0" max="2" class="assessmentPointMR4"></td>
                                                    <td><input onblur="commentMR4()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahMR4<input type="text" name="markahMR4" id="markahMR4" /></td>            
                                                  </tr>
                              
                                                  <tr >
                                                    <td colspan="3"> SUB TOTAL MR POINT</td>
                                                    <td>12</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td colspan="3"> TOTAL CORE POINT</td>
                                                    <td>69</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td>EC</td>
                                                    <td colspan="5" align="left">ELECTIVE CRITERIAS</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="4">SM 5 - EC</td>
                                                    <td colspan="2">SERVICES FOR DISABLED USERS	</td>
                                                    {{-- <td></td> --}}
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Crossing for disabled users with noise making devices installed</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM5EC()" type="number" min="0" max="2" class="targetPointSM5EC"></td>
                                                    <td><input onblur="findAssessmentPointSM5EC()" type="number" min="0" max="2" class="assessmentPointSM5EC"></td>
                                                    <td><input onblur="commentSM5EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Walkway access for disabled users by providing sidewalks sloped for easy access</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM5EC()" type="number" min="0" max="2" class="targetPointSM5EC"></td>
                                                    <td><input onblur="findAssessmentPointSM5EC()" type="number" min="0" max="2" class="assessmentPointEC"></td>
                                                    <td><input onblur="commentSM5EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Tac tile on the pedestrian pathway and access for disabled users</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointSM5EC()" type="number" min="0" max="2" class="targetPointSM5EC"></td>
                                                    <td><input onblur="findAssessmentPointSM5EC()" type="number" min="0" max="2" class="assessmentPointSM5EC"></td>
                                                    <td><input onblur="commentSM5EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahSM5EC<input type="text" name="markahSM5EC" id="markahSM5EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="4">SM 6 - EC</td>
                                                    <td colspan="2">NOISE CONTROL	</td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >The pavement mix design  by using quiet pavement</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointSM6EC()" type="number" min="0" max="2" class="targetPointSM6EC"></td>
                                                    <td><input onblur="findAssessmentPointSM6EC()" type="number" min="0" max="2" class="assessmentPointSM6EC"></td>
                                                    <td><input onblur="commentSM6EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Noise barrier shall be provided in sensitive areas such as housing situated beside busy roads or highways, schools and hospitals</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointSM6EC()" type="number" min="0" max="2" class="targetPointSM6EC"></td>
                                                    <td><input onblur="findAssessmentPointSM6EC()" type="number" min="0" max="2" class="assessmentPointSM6EC"></td>
                                                    <td><input onblur="commentSM6EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Buffer Zone </td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointSM6EC()" type="number" min="0" max="2" class="targetPointSM6EC"></td>
                                                    <td><input onblur="findAssessmentPointSM6EC()" type="number" min="0" max="2" class="assessmentPointSM6EC"></td>
                                                    <td><input onblur="commentSM6EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahSM6EC<input type="text" name="markahSM6EC" id="markahSM6EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">EW 3 - EC</td>
                                                    <td colspan="2">ECOLOGICAL CONNECTIVITY		</td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >"Provide dedicated wildlife crossing structures and protective fencing as determined by Environmental Impact Assessment (EIA) report 
                                                      OR
                                                      Provide sound barrier at sensitive area for wildlife"</td>
                                                    <td></td>
                                                    <td>5</td>
                                                    <td><input onblur="findTargetPointEW3EC()" type="number" min="0" max="2" class="targetPointEW3EC"></td>
                                                    <td><input onblur="findAssessmentPointEW3EC()" type="number" min="0" max="2" class="assessmentPointEW3EC"></td>
                                                    <td><input onblur="commentEW3EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahEW3EC<input type="text" name="markahEW3EC" id="markahEW3EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">AE 2 - EC</td>
                                                    <td colspan="2"> SCENIC VIEWS </td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >"Provide dedicated wildlife crossing structures and protective fencing as determined by Environmental Impact Assessment (EIA) report 
                                                      OR
                                                      Provide sound barrier at sensitive area for wildlife"</td>
                                                    <td></td>
                                                    <td>5</td>
                                                    <td><input onblur="findTargetPointAE2EC()" type="number" min="0" max="2" class="targetPointAE2EC"></td>
                                                    <td><input onblur="findAssessmentPointAE2EC()" type="number" min="0" max="2" class="assessmentPointAE2EC"></td>
                                                    <td><input onblur="commentAE2EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE2EC<input type="text" name="markahAE2EC" id="markahAE2EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="5">AE 3 - EC</td>
                                                    <td colspan="2"> PEDESTRIAN ACCESS </td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Zebra Crossing or Signalised Pedestrian Crossing  and Refuge Island</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE3EC()" type="number" min="0" max="2" class="targetPointAE3EC"></td>
                                                    <td><input onblur="findAssessmentPointAE3EC()" type="number" min="0" max="2" class="assessmentPointAE3EC"></td>
                                                    <td><input onblur="commentAE3EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Overhead Pedestrian Bridge</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointAE3EC()" type="number" min="0" max="2" class="targetPointAE3EC"></td>
                                                    <td><input onblur="findAssessmentPointAE3EC()" type="number" min="0" max="2" class="assessmentPointAE3EC"></td>
                                                    <td><input onblur="commentAE3EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Sidewalk / Walkway and Raised Crosswalk</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE3EC()" type="number" min="0" max="2" class="targetPointAE3EC"></td>
                                                    <td><input onblur="findAssessmentPointAE3EC()" type="number" min="0" max="2" class="assessmentPointAE3EC"></td>
                                                    <td><input onblur="commentAE3EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Covered walkway</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE3EC()" type="number" min="0" max="2" class="targetPointAE3EC"></td>
                                                    <td><input onblur="findAssessmentPointAE3EC()" type="number" min="0" max="2" class="assessmentPointAE3EC"></td>
                                                    <td><input onblur="commentAE3EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE3EC<input type="text" name="markahAE3EC" id="markahAE3EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="5">AE 4 - EC</td>
                                                    <td colspan="2"> MOTORCYCLE LANE </td>
                                                    {{-- <td></td> --}}
                                                    <td>6</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Paved shoulder, non-exclusive motorcycle lane and end treatment at junction</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE4EC()" type="number" min="0" max="2" class="targetPointAE4EC"></td>
                                                    <td><input onblur="findAssessmentPointEC()" type="number" min="0" max="2" class="assessmentPointEC"></td>
                                                    <td><input onblur="commentAE4EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Exclusive motorcycle lane</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointAE4EC()" type="number" min="0" max="2" class="targetPointAE4EC"></td>
                                                    <td><input onblur="findAssessmentPointEC()" type="number" min="0" max="2" class="assessmentPointEC"></td>
                                                    <td><input onblur="commentAE4EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Overhead motorcycle bridge</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointAE4EC()" type="number" min="0" max="2" class="targetPointAE4EC"></td>
                                                    <td><input onblur="findAssessmentPointEC()" type="number" min="0" max="2" class="assessmentPointEC"></td>
                                                    <td><input onblur="commentAE4EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                                                  <tr>
                                                    <td >Motorcycle shelter</td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE4EC()" type="number" min="0" max="2" class="targetPointAE4EC"></td>
                                                    <td><input onblur="findAssessmentPointEC()" type="number" min="0" max="2" class="assessmentPointEC"></td>
                                                    <td><input onblur="commentAE4EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE4EC<input type="text" name="markahAE4EC" id="markahAE4EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="2">AE 5 - EC</td>
                                                    <td colspan="2"> REST AREA </td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Provide or maintain existing rest area facilities along the road </td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointAE5EC()" type="number" min="0" max="2" class="targetPointAE5EC"></td>
                                                    <td><input onblur="findAssessmentPointAE5EC()" type="number" min="0" max="2" class="assessmentPointEC"></td>
                                                    <td><input onblur="commentAE5EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE5EC<input type="text" name="markahAE5EC" id="markahAE5EC" /></td>            
                                                  </tr>
                              
                                                  <tr>
                                                    <td colspan="1" rowspan="3">AE 6 - EC</td>
                                                    <td colspan="2"> BICYCLE ASSESS </td>
                                                    {{-- <td></td> --}}
                                                    <td>2</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Implement physical or constructed changes to the roadway structure, dimensions, or form that provide bicycle-only facilities with dedicated access (such as bicycle lane). Lanes shared with motorized vehicles do not meet this requirement </td>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td><input onblur="findTargetPointAE6EC()" type="number" min="0" max="2" class="targetPointAE6EC"></td>
                                                    <td><input onblur="findAssessmentPointAE6EC()" type="number" min="0" max="2" class="assessmentPointEC"></td>
                                                    <td><input onblur="commentAE6EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr>
                                                    <td >Implement physical or constructed changes to the roadway structure, dimensions, or form that provide bicycle-only facilities with dedicated access (such as bicycle lane). Lanes shared with motorized vehicles do not meet this requirement</td>
                                                    <td></td>
                                                    <td>2</td>
                                                    <td><input onblur="findTargetPointAE6EC()" type="number" min="0" max="2" class="targetPointAE6EC"></td>
                                                    <td><input onblur="findAssessmentPointAE6EC()" type="number" min="0" max="2" class="assessmentPointAE6EC"></td>
                                                    <td><input onblur="commentAE6EC()" type="text" min="0" max="2" class="road"></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td style="display: none">markahAE6EC<input type="text" name="markahAE6EC" id="markahAE6EC" /></td>            
                                                  </tr>
                              
                                                  
                              
                                                  <tr >
                                                    <td colspan="3"> TOTAL ELECTIVE POINT</td>
                                                    <td>27</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
            
                                                  <tr>
                                                    <td>IN</td>
                                                    <td colspan="5" align="left">INNOVATION</td>
                                                   
                                                    
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td colspan="1" rowspan="2">IN 1</td>
                                                    <td colspan="2">ANY RELATED INNOVATION</td>
                                                    {{-- <td></td> --}}
                                                    <td>5</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td></td>
                                                    
                                                    
                                                  </tr>
                                
                                                  <tr>
                                                    <td>Come up with an idea for a design or construction best practice for road that is not currently included in Manual pH JKR and is more sustainable than standard or conventional practices</td>
                                                    <td rowspan="1">ANY</td>
                                                    <td>5</td>
                                                    <td><input onblur="findTargetPointIN()" type="number" min="0" max="2" class="targetPointIN"></td>
                                                    <td><input onblur="findAssessmentPointIN()" type="number" min="0" max="2" class="assessmentPointIN"></td>
                                                    <td><input onblur="commentIN()" type="text" min="0" max="2" class="road" name="" id=""></td>
                                                  </tr>
                              
                                                  <tr >
                                                    <td colspan="3"> TOTAL INNOVATION POINT</td>
                                                    {{-- <td><input type="text" name="markahIN" id="markahIN" /></td>  --}}
                                                    <td>5</td> 
                                                    <td>0</td>           
                                                    <td>0</td>
                                                    <td></td>
                                                  </tr>
                              
                              
                              
                                                </tbody>
                                              </table>
                              
                                              <div align="center" class="mt-3">
                                                <button class="btn btn-primary" type="submit" title="Simpan">Simpan</button>
                                                <button class="btn btn-primary" type="submit" title="Simpan">Sah</button>
                                                <button class="btn btn-primary" type="submit" title="Simpan">Jana Keputusan</button>
                                                <button class="btn btn-primary" type="submit" title="Simpan">Jana Sijil</button>
                                                {{-- <a href="/penilaian_reka_bentuk_jalan/isi_skor_kad_page2" type="button" class="btn btn-primary">Seterusnya</a>           --}}
                                              </div>
                                    </form>
                                    </div> 
                            </div>
                            {{-- <div class="col">
                            </div> --}}
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