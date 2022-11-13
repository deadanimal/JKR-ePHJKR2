
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

        body, html {
        height: 100%;
        margin: 0;
        }

        .bg {
        /* The image used */
        background-image: url("/assets/img/Sijil_PRB_pHJKR.png");

        /* Full height */
        height: 100%; 

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        }


        </style>

    <title>Sijil ePHJKR GPSS Jalan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <div class="content-wrapper" style="width:100%;">
        <div class="content" style=" background:url(/assets/img/Sijil_PRB_pHJKR.png)no-repeat center;">
            <div class="container-fluid">
                <div class="row" style="margin: 25px 10px;">
                    <div class="col" style="text-align: center">
                        <img src="/assets/img/JKR_LOGO.png" alt="JKR" height="100">
                        <p style="text-align: center;color: rgb(8, 8, 8);font-size:20pt;"><i>PENSIJILAN</i></p>
                        <p style="text-transform:uppercase;color:rgb(18, 192, 27);font-size:30pt;"><i style="inline-size: 0%">pHJKR<br>PERINGKAT REKA BENTUK</i></p>
                    </div>
                </div>
                <div class=" row">
                    <div class=" col">
                        <div class="card">
                            <div class="card-body">
                                <p style="text-align:center" class="mx-6">
                                    TELAH DIANUGERAHKAN KEPADA
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" row mt-3" style="margin: 25px 10px">
                    <div class=" col mt-3" style="text-align: center;color:blue;font-size:4pt;">
                        <div class="card">

                            <div class="card-body mt-3">
                                <p style="text-transform:uppercase"><i style="inline-size: 0%">{{$projek->nama}}</i></p>
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
                                   <b> {{$projek->nama}}</b>
                                <br><br>
                                    Telah Dianugerahkan
                                <br><br>
                                   <b> <span style="text-transform:capitalize"> Kategori {{$projek->kategori}}</span></b>
                                <br><br>
                                    Anjuran
                                <br><br>
                                <b>JKR</b>
                                <br><br>
                                Di
                                <br><br>
                               <b> {{$projek->alamat}} <br> {{$projek->poskod}}</b>
                                <br><br>
                                 Pada
                                <br><br>
                                <b>{{$date}}</b>
                                <br><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
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