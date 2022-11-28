
<!DOCTYPE html>
<html>

<head>
    <style>
        @font-face{
            font-family: 'Montserrat-SemiBold';
            src: url(assets/fonts/Montserrat-SemiBold.ttf);
            font-family: 'Montserrat-ExtraBold';
            src: url(assets/fonts/Montserrat-ExtraBold.ttf);
            font-family: 'Saira_SemiCondensed-Bold';
            src: url(assets/fonts/Saira_SemiCondensed-Bold.ttf);
            font-family: 'Lato-BoldItalic';
            src: url(assets/fonts/Lato-BoldItalic.ttf);
            font-family: 'Lato-Regular';
            src: url(assets/fonts/Lato-Regular.ttf);
            font-family: 'Lato-Regular1';
            src: url(assets/fonts/Lato-Regular.ttf);
            font-family: 'Lato-Regular2';
            src: url(assets/fonts/Lato-Regular.ttf);
            font-family: 'Lato-Regular3';
            src: url(assets/fonts/Lato-Regular.ttf);
            font-family: 'Oswald-Bold';
            src: url(assets/fonts/Oswald-Bold.ttf);
            font-family: 'Montserrat-VariableFont';
            src: url(assets/fonts/Montserrat-VariableFont_wght.ttf);
        }

        .pensijilan{
            font-family: 'Montserrat-SemiBold', sans-serif;
            font-size: 20pt;
            position: relative;
            top: 5em;
            text-align: center;
        }

        .pHJKR{
            font-family: 'Montserrat-ExtraBold', sans-serif;
            font-size: 50pt;
            position: relative;
            top: 2em;
            text-align: center;
            color: #8c9401;
        }

        .peringkat-rekabentuk{
            font-family: 'Saira_SemiCondensed-Bold', sans-serif;
            font-size: 45pt;
            position: relative;
            top: 1.5em;
            text-align: center;
            color: #269d8b;
        }

        .anugerah{
            font-family: 'Lato-BoldItalic', sans-serif;
            font-size: 12pt;
            position: relative;
            top: 5em;
            text-align: center;
            color: #737373;
        }

        .projek{
            font-family: 'Montserrat-SemiBold', sans-serif;
            font-size: 20pt;
            position: relative;
            top: 5em;
            text-align: center;
        }

        .bintang{
            position: relative;
            top: 0.5em;
            right: 0.3em;
        }

        .potensi-pengiktirafan{
            font-family: 'Oswald-Bold', sans-serif;
            font-size: 20pt;
            position: relative;
            top: 0.5em;
            left: 5em;
            text-align: center;
            color: #09927d;
        }

        .sektor{
            font-family: 'Montserrat-VariableFont', sans-serif;
            font-size: 20pt;
            position: relative;
            top: 0.5em;
            left: 5em;
            text-align: center;
        }

        .bangunan{
            font-family: 'Montserrat-SemiBold', sans-serif;
            font-size: 20pt;
            position: relative;
            top: 0.2em;
            left: 5em;
            text-align: center;
        }

        .kategori{
            font-family: 'Montserrat-VariableFont', sans-serif;
            font-size: 20pt;
            position: relative;
            top: 0.5em;
            left: 5em;
            text-align: center;
        }

        .kategori1{
            font-family: 'Montserrat-SemiBold', sans-serif;
            font-size: 20pt;
            position: relative;
            top: 0.2em;
            left: 5em;
            text-align: center;
        }

        .ketua-pengarah{
            font-family: 'Montserrat-SemiBold', sans-serif;
            font-size: 14pt;
            position: relative;
            bottom: 0.005em;
            text-align: center;
        }

        .tarikh{
            font-family: 'Montserrat-SemiBold', sans-serif;
            font-size: 12pt;
            position: relative;
            bottom: 0.001em;
            text-align: center;
        }

        p{
            font-size:12pt;
            font-family: 'Arial', Times, sans-serif;
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
        background-image: url("assets/img/Sijil_PRB_pHJKR.png");

        /* Full height */
        /* height: 100%;  */
        min-height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        }

        .topleft1 {
        font-family: 'Lato-Regular', sans-serif;
        position: absolute;
        top: 50px;
        left: 50px;
        font-size: 20px;
        color: #8c9401;
        }

        .topleft2 {
        font-family: 'Lato-Regular2', sans-serif;
        position: absolute;
        top: 80px;
        left: 50px;
        font-size: 20px;
        font-family: Arial;
        }

        .topright1 {
        font-family: 'Lato-Regular3', sans-serif;
        position: absolute;
        top: 50px;
        right: 50px;
        font-size: 20px;
        color: #8c9401;
        }

        .topright2 {
        font-family: 'Lato-Regular4', sans-serif;
        position: absolute;
        top: 80px;
        right: 50px;
        font-size: 20px;
        }

        .parent {
        position: relative;
        top: 0;
        left: 0;
        }

        .img2{
        position: relative;
        top: 130px;
        right: 20px;
        }

        .img3{
        position: relative;
        top: 130px;
        right: 0px;
        }

        .img4{
        position: relative;
        top: 200px;
        right: 0px;
        }

        /* .img5{
        position: relative;
        top: 10em;
        left: 30px;
        } */

        .img5{
        position: relative;
        top: 200px;
        left: 5em;
        }

        .img6{
        position: relative;
        top: 150px;
        left: 1em;
        }




        </style>

    <title>SIJIL ePHJKR JALAN RAYUAN VERIFIKASI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <div class="bg">
        <div class="container">
            <div class="topleft1">NO. PENDAFTARAN</div>
            <div class="topleft2">{{$projek->id}}</div>
            <div class="topright1">TARIKH PENSIJILAN</div>
            <div class="topright2">{{$date}}</div>
            <div class="row">
                <div class="parent">
                  <img class="img2" src="assets/img/JATA_NEGARA_MALAYSIA.png" alt="Jata Negara" width="120" height="100">
                  <img class="img3" src="assets/img/JKR_LOGO.png" alt="Logo JKR" width="120" height="100">
                </div>
            </div>
            <div class="pensijilan">PENSIJILAN</div>
            <div class="pHJKR">pHJKR</div>
            <div class="peringkat-rekabentuk">PERINGKAT RAYUAN VERIFIKASI JALAN</div>
            <div class="anugerah">TELAH DIANUGERAHKAN KEPADA</div>
            <div class="projek">{{$projek->nama}}</div>
            {{-- <img class="img5" src="assets/img/EPHJKR_LOGO1.png" alt="Logo Penarafan" width="250" height="200">
            @if ($peratusan_mr >= 80 && $peratusan_mr <= 100)
            <img class="img6" src="assets/img/5bintang.png" alt="Bintang Penarafan" width="500" height="300">
            @elseif ($peratusan_mr >= 65 && $peratusan_mr < 80)
            <img class="img6" src="assets/img/4bintang.png" alt="Bintang Penarafan" width="500" height="300">
            @elseif ($peratusan_mr >= 45 && $peratusan_mr < 65)
            <img class="img6" src="assets/img/3bintang.png" alt="Bintang Penarafan" width="500" height="300">
            @elseif ($peratusan_mr >= 30 && $peratusan_mr < 45)
            <img class="img6" src="assets/img/2bintang.png" alt="Bintang Penarafan" width="500" height="300">
            @elseif ($peratusan_mr <= 29)
            <img class="img6" src="assets/img/1bintang.png" alt="Bintang Penarafan" width="500" height="300">
            @endif  --}}
            <div class="potensi-pengiktirafan">POTENSI PENGIKTIRAFAN</div>
            <div class="sektor">SEKTOR</div>
            <div class="bangunan">BANGUNAN</div>
            <div class="kategori">KATEGORI</div>
            <div class="kategori1">{{$projek->kategori}}</div>
            <div class="ketua-pengarah">Ketua Pengarah Kerja Raya Malaysia</div>
            <div class="tarikh">{{$date}}</div>
          </div>
    </div>
</body>

</html>