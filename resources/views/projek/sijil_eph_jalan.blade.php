
<!DOCTYPE html>
<html>

<head>
    <style>
        p{
            font-size:12pt;
            font-family: 'Times New Roman', Times, serif;
            font-style: oblique;
            line-height: 1.5;
        }


        .parent {
            /* inline-block hack */
            font-size: 0;
            text-align: center;
        }

        .child {
        /* inline-block hack */
        display: inline-block;
        font-size: medium;
        text-align: left;
        }

        .picture{
            text-align:right;
            padding-right:80px;
            /* margin-top: 10px; */
        }


        </style>

    <title>Sijil Kursus ePHJKR JALAN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    
    <div class="content-wrapper" style="width:100%;" >
        <div class="content" style=" background:url(/assets/img/sijil3_jkr.png)no-repeat center;">
            <div class=" container-fluid" >
                <div class="row" style="margin: 25px 10px;">
                    <div class="col " style="text-align: center">
                        <div class="picture">
                            <img src="/assets/img/JKR_LOGO.png" alt="JKR" height="100" style="padding-right:30px;">
                            <img src="/assets/img/JATA_NEGARA_MALAYSIA.png" alt="Malaysia" height="100" >
                        </div>
                        <div class="card-body" style="padding-right:80px;">
                            <p style="text-align:end;color:#8c9401;" class="mx-6">
                                NO. PENDAFTARAN
                            </p>
                            <p style="text-align:end" class="mx-6">
                                <b>KJ2/01/16</b>
                            </p>
                        </div>
                        <div class="card-body" style="padding-right:80px;">
                            <p style="text-align:end;color:#8c9401;" class="mx-6">
                                TEMPOH PENSIJILAN
                            </p>
                            <p style="text-align:end" class="mx-6">
                                <b>13 JUN 2022 - 12 JUN 2025</b>
                            </p>
                        </div>
                        
                        <p style="text-align: center;color: rgb(8, 8, 8);font-size:20pt;"><i>TELAH DIANUGERAHKAN DENGAN</i></p>
                        <p style="text-transform:uppercase;color:#8c9401;font-size:30pt;"><i style="inline-size: 0%">PENSIJILAN<br>PENARAFAN HIJAU JKR</i></p>
                    </div>
                    
                </div>
                <div class=" row">
                    <div class=" col">
                        <div class="card">

                            <div class="card-body">
                                <p style="text-align:center" class="mx-6">
                                    SEKTOR
                                </p>
                                <p style="text-align:center" class="mx-6">
                                    <b>BANGUNAN</b>
                                </p>
                            </div>
                            <div class="card-body">
                                <p style="text-align:center" class="mx-6">
                                    KATEGORI
                                </p>
                                <p style="text-align:center" class="mx-6">
                                    <b>PEMBANGUNAN BARU</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" row mt-3" style="margin: 25px 10px">
                    <div class=" col mt-3" style="text-align: center;color:blue;font-size:4pt;">
                        <div class="card">

                            <div class="card-body mt-3">
                                <p style="text-transform:uppercase"><i style="inline-size: 0%">CADANGAN PEMBINAAN POLITEKNIK HULU<br>TERENGGANU (REKA BENTUK)</i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" row mt-3" style="margin: 25px 10px">
                    <div class=" col mt-3" style="text-align: center;color:rgb(246, 238, 10);font-size:4pt;">
                        <div class="card">

                            <div class="card-body mt-3">
                                <p><i><span class="star">&starf;&starf;&starf;&starf;&starf;</span></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                        

                <div class=" row">
                    <div class=" col">
                        <div class="card">

                            <div class="card-body">
                                <p style="text-align:center" class="mx-6">
                                    
                                <br><br>
                                   <b> MOHAMAD HARIS BIN MOHD ZAHARI</b>
                                <br><br>
                                    Telah Menghadiri
                                <br><br>
                                   <b> <span style="text-transform:capitalize"> Kursus ePHJKR JALAN</span></b>
                                <br><br>
                                    Anjuran
                                <br><br>
                                <b>JKR</b>
                                <br><br>
                                Di
                                <br><br>
                               <b> LOT 1708 TEPI BANGUNAN UMNO KUALA LUMPUR <br>42000</b>
                                <br><br>
                                 Pada
                                <br><br>
                                <b>18/10/2022</b>
                                
                                {{-- @if ($jadual->bilangan_hari=="1")
                                    <b>{{date('d-m-Y', strtotime($jadual->tarikh_mula))}}
                                @else
                                    <b>{{date('d-m-Y', strtotime($jadual->tarikh_mula))}} hingga {{date('d-m-Y', strtotime($jadual->tarikh_tamat))}}</b>
                                @endif --}}

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>



                <div class="parent">
                    <div class="child">Cop Rasmi JKR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="child">
                  Pengarah<br>Bahagian JKR <br>JKR
                    </div>
                  </div>

            </div>
        </div>
    </div>
</body>

</html>