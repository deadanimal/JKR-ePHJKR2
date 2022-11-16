@extends('layouts.anon')
<style>
    /* .container {
        position: relative;
        text-align: left;
      } */
    * {
       box-sizing: border-box;
     }
     
     .img-container {
       float: left;
       width: 30%;
     }
     
     .clearfix::after {
       content: "";
       clear: both;
       display: table;
     }
      .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    }
    .inline-div {
      display: block;
      text-align: center;
    }
  
    /* h4
    {
      display: inline-block;
      text-align: center;
    } */
  </style>
@section('content')

<h1 class="mt-3">VISI & MISI CASKT JKR</h1>

<div class="col" style="background-color: #0F5E31">
    <div class="row">
      <div class="col-6">
        <h3 class="text-white mt-4 mb-3">Visi</h3>
        <p class="text-white justify">Cawangan Alam Sekitar & Kecekapan Tenaga (CASKT) terdiri daripada pelbagai disiplin dan 
            kepakaran komited dengan hasrat jabatan dalam melaksanakan Polisi 
            Pembangunan Lestari JKR Malaysia demi kelestarian pembangunan negara. 
        </p>
      </div>
      <div class="col-6">
        <img src="/assets/img/20.png" alt="Error" width="300" height="300">
      </div>
    </div>
  </div>
  <div class="col" style="background-color: #EB5500">
    <div class="row">
      <div class="col-6">
        <img src="/assets/img/21.png" alt="Error" width="300" height="300">
      </div>
      <div class="col-6">
        <h3 class="text-white mt-4">Misi</h3>
        <p class="text-white justify">CASKT sentiasa berusaha:<br>
          •	Melengkapkan nilaitambah terhadap Tahap Penyampaian Perkhidmatan JKR melalui 
          Pemeliharaan Alam Sekitar dan
          Pembangunan Secara Lestari
          <br>
          •	CASKT akan dan sedang berusaha:
          <br>
          •	Meningkatkan penerimaan dan pelaksanaan Pembangunan Lestari JKR
          <br>
          •	Menjadi Pusat Kecemerlangan bagi Pembangunan Lestari
          <br>
          •	Memastikan Pemeliharaan Alam Sekitar dan Pembangunan Secara Lestari dilaksana secara sistematik dan berkesan<br>
          </p>
      </div>
  </div>
</div>
<br>
<a href="/about"><button class="btn btn-primary">Kembali</button></a>


@endsection