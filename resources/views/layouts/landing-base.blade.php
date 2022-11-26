<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>JKR | epHJKR</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="../../../img/risda_logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../img/risda_logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../img/risda_logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../img/risda_logo.png">
    <link rel="manifest" href="../../../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../../../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../../../assets/js/config.js"></script>
    <script src="../../../vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="../../../vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="../../../assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="../../../assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="../../../assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="../../../assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>


<body>
    @include('sweetalert::alert')
    <style>
        .jkr-header {
            /* font-family: 'Montserrat'; */
            font-style: normal;
            font-weight: 700;
            font-size: 18px;
            line-height: 22px;
            /* identical to box height */
            text-align: center;

            /* ORANGE */
            color: #F4A258;
        }

        body {
            background-color: white !important;
        }

        .form-control {
            border-color: #F4A258;
            -moz-box-shadow: inset 0 0 5px rgba(173, 173, 173, 0.658);
            -webkit-box-shadow: inset 0 0 5px rgba(173, 173, 173, 0.658);
            box-shadow: inset 0 0 5px rgba(173, 173, 173, 0.658);
        }

        .btn-orange {
            color: white;
            background-color: #F4A258;
        }

        /* primary blue to green */
        .text-primary {
            color: #5B8E7D !important;
        }

        .btn-primary {
            background-color: #5B8E7D !important;
            border-color: #5B8E7D !important;
        }

        .btn-outline-primary {
            background-color: white;
            border-color: #5B8E7D !important;
            color: #5B8E7D;
        }

        .btn-outline-primary:hover {
            color: #fff;
            background-color: #5B8E7D;
            border-color: #5B8E7D;
        }

        /* orange */
        .text-orange {
            color: #EB5500 !important;
        }

        .btn-orange-header {
            color: #F4A258;
            background-color: transparent;
            border-color: transparent;
        }

        .btn-orange-header:hover {
            color: #fff;
            background-color: #F4A258;
            border-color: #F4A258;
        }

        footer {
            background-color: #EDEEED;
        }
    </style>

    {{-- start header --}}
    <header>
        <nav class="navbar navbar-expand p-3">

            <div class="col-3 text-center" style="filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));">
                <img src="/assets/img/JATA_NEGARA_MALAYSIA.png" alt="Jata Negara"
                    style="width: 82.45px; height: 64.3px;">
                <img src="/assets/img/JKR_LOGO.png" alt="JKR" style="width: 81.46px; height: 54.93px;">
                <img src="/assets/img/EPHJKR_LOGO.png" alt="EPHJKR" style="width: 95.73px; height: 87.31px;">
            </div>

            <div class="col-1 text-end">
                <a href="/" class="jkr-header">UTAMA</a>
            </div>
            <div class="col-2 text-end">
                <a href="/about" class="jkr-header">MENGENAI KAMI</a>
            </div>
            <div class="col-2 text-end">
                <a href="/contact" class="jkr-header">HUBUNGI KAMI</a>
            </div>
            <div class="col-2 text-end">
                <a href="pengguna_luar" class="jkr-header">SOALAN LAZIM</a>
            </div>
            <div class="col-2 text-end">
                    <a href="/login" class="btn jkr-header" style="border-color: #F4A258;">LOG MASUK</a>
            </div>
        </nav>
    </header>
    {{-- end header --}}

    {{-- main content start --}}
    <main class="main" id="top">
        @yield('content')
    </main>
    {{-- end main content --}}

    {{-- start footer --}}
    <footer>
        <div class="row mt-6">
            <div class="col-4"></div>
            <div class="col-4"></div>
            <div class="col-4"></div>
        </div>
    </footer>
    {{-- end footer --}}


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="../../../vendors/popper/popper.min.js"></script>
    <script src="../../../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../../../vendors/anchorjs/anchor.min.js"></script>
    <script src="../../../vendors/is/is.min.js"></script>
    <script src="../../../vendors/fontawesome/all.min.js"></script>
    <script src="../../../vendors/lodash/lodash.min.js"></script>
    <script src="../../../vendors/list.js/list.min.js"></script>
    <script src="../../../assets/js/theme.js"></script>
</body>

</html>