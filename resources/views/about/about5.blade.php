@extends('layouts.anon')
<link rel="stylesheet" type="text/css" href="print.css">

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
<div class="col mt-2 text-center">
    <h3 class="mt-5">Piagam Pelanggan</h3>
    <p>Laporan pencapaian piagam pelanggan bagi Jabatan Kerja Raya Malaysia akan dikemaskini pada setiap sukuan tahun.</p>
  </div>

  <div class="col" style="background-color: rgb(20, 64, 8)">
      <div class="col">
          <img src="/assets/img/Piagam.png" alt="error" width="600" height="900">
      </div>
      <div class="col mt-4 text-center">
          <p class="text-white mb-3">Sila muat turun di sini</p>
          <button class="btn btn-primary mb-3" onclick="printJS('/assets/img/Piagam.png', 'image')">Muat Turun</button>
      </div>
  </div>
<br>
<a href="/about"><button class="btn btn-primary">Kembali</button></a>

<!--Javascript-->
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.css"></script>

@endsection