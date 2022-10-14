<style>
    .modal {
        position: fixed;
        top: 0;
        right: 0;
        z-index: 10000 !important
            /* width: 100vw;
        height: 100vh; */
    }
    .modal-content {
        z-index: 20000 !important
    }
    .navbar-vertical .navbar-nav .nav-item .nav-link.dropdown-indicator:after {
        border-color: white;
    }
    .navbar-vertical .navbar-nav .nav-item .nav-link:hover.dropdown-indicator:after,
    .navbar-vertical .navbar-nav .nav-item .nav-link:focus.dropdown-indicator:after {
        border-color: white;
    }
    .info-sidebar {
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 600;
        font-size: 10.0013px;
        line-height: 13px;
        color: white;
    }
    /* .profil-icon {
        width: 33.07px;
        height: 33.07px;
    } */
    .profil-bg{
        height: 59.17px;
        width: 59.17px;
    }
</style>
<script>
    var isFluid = JSON.parse(localStorage.getItem('isFluid'));
    if (isFluid) {
        var container = document.querySelector('[data-layout]');
        container.classList.remove('container');
        container.classList.add('container-fluid');
    }
</script>

<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>

    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar" id="checklim">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <div class="row align-items-center mb-3">
                    <div class="col-auto pe-0">
                        <img src="/assets/img/icons/user-icon.png" class="bg-primary p-3" alt="" style="border-radius: 10px;">
                    </div>
                    <div class="col-8">
                        {{-- <p class="info-sidebar mb-0">Nama: {{ $user->name }}</p> --}}
                        <p class="info-sidebar mb-0">No. Kakitangan: </p>
                        <p class="info-sidebar mb-0">Peranan: </p>
                    </div>
                </div>
                <li class="nav-item mx-3 mx-md-0">

                    {{-- dashboard --}}
                    <a class="nav-link py-0 dropdown-indicator {{ Request::is('dashboard/*') ? 'active-main' : '' }}"
                        href="#dashboard" role="button" data-bs-toggle="collapse"
                        aria-expanded="{{ Request::is('dashboard') ? 'true' : 'false' }}" aria-controls="dashboard">
                        <div class="d-flex align-items-center nav-link-side px-0">
                            <span class="px-3"><span class="fas fa-home"></span> Dashboard</span>
                        </div>
                    </a>
                    <ul class="nav-item collapse {{ Request::is('dashboard/*') ? 'show' : 'false' }} my-1"
                        id="dashboard">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard/laman_utama') ? 'active' : '' }} py-0"
                                href="/dashboard/laman_utama">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span
                                        class="px-0 {{ Request::is('dashboard/laman_utama') ? 'text-dark' : '' }}">Laman
                                        Utama</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard/pengesahan_pengguna') ? 'active' : '' }} py-0"
                                href="/dashboard/pengesahan_pengguna">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span
                                        class="px-0 {{ Request::is('dashboard/pengesahan_pengguna') ? 'text-dark' : '' }}">Pengesahan
                                        Pengguna</span>
                                </div>
                            </a>
                        </li>
                        <hr class="navbar-vertical-divider mx-3">
                    </ul>

                    {{-- pengurusan maklumat --}}
                    <a class="nav-link py-0 dropdown-indicator {{ Request::is('pengurusan_maklumat/*') ? 'active-main' : '' }}"
                        href="#pengurusan_maklumat" role="button" data-bs-toggle="collapse"
                        aria-expanded="{{ Request::is('pengurusan_maklumat') ? 'true' : 'false' }}"
                        aria-controls="pengurusan_maklumat">
                        <div class="d-flex align-items-center nav-link-side px-0">
                            <span class="px-3"><span class="fas fa-home"></span> Pengurusan Maklumat</span>
                        </div>
                    </a>
                    <ul class="nav-item collapse {{ Request::is('pengurusan_maklumat/*') ? 'show' : 'false' }} my-1"
                        id="pengurusan_maklumat">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('pengurusan_maklumat/profil_pengguna') || Request::is('pengurusan_maklumat/profil_pengguna/*') ? 'active' : '' }} py-0"
                                href="/pengurusan_maklumat/profil_pengguna">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span
                                        class="px-0 {{ Request::is('pengurusan_maklumat/profil_pengguna') || Request::is('pengurusan_maklumat/profil_pengguna/*') ? 'text-dark' : '' }}">Profil
                                        Pengguna</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('pengurusan_maklumat/senarai_pengguna') ? 'active' : '' }} py-0"
                                href="/pengurusan_maklumat/senarai_pengguna">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span
                                        class="px-0 {{ Request::is('pengurusan_maklumat/senarai_pengguna') ? 'text-dark' : '' }}">Senarai
                                        Pengguna</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-0 dropdown-indicator" href="#selenggara" role="button"
                                data-bs-toggle="collapse"
                                aria-expanded="{{ Request::is('pengurusan_maklumat/selenggara/*') ? 'true' : 'false' }}"
                                aria-controls="selenggara">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Selenggara</span>
                                </div>
                            </a>
                            <ul class="nav-item collapse {{ Request::is('pengurusan_maklumat/selenggara/*') ? 'show' : 'false' }} my-1"
                                id="selenggara">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('pengurusan_maklumat/selenggara/selenggara_peranan') ? 'active' : '' }} py-0"
                                        href="/pengurusan_maklumat/selenggara/selenggara_peranan">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">Selenggara Nama Peranan</span>
                                        </div>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('pengurusan_maklumat/selenggara/selenggara_status') ? 'active' : '' }} py-0"
                                        href="/pengurusan_maklumat/selenggara/selenggara_status">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">Selenggara Status Projek</span>
                                        </div>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('pengurusan_maklumat/selenggara/selenggara_hebahan') ? 'active' : '' }} py-0"
                                        href="/pengurusan_maklumat/selenggara/selenggara_hebahan">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">Selenggara Jenis Hebahan</span>
                                        </div>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('pengurusan_maklumat/selenggara/status_maklum_balas') ? 'active' : '' }} py-0"
                                        href="/pengurusan_maklumat/selenggara/status_maklum_balas">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">Selenggara Status Maklum Balas</span>
                                        </div>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('pengurusan_maklumat/selenggara/kriteria_penilaian') ? 'active' : '' }} py-0"
                                        href="/pengurusan_maklumat/selenggara/kriteria_penilaian">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">Selenggara Kriteria Penilaian</span>
                                        </div>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('pengurusan_maklumat/audit_trail') ? 'active' : '' }} py-0"
                                        href="/pengurusan_maklumat/audit_trail">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">Selenggara Log Audit</span>
                                        </div>
                                    </a>

                                </li> 
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('pengurusan_maklumat/manual_dan_standard') ? 'active' : '' }} py-0"
                                href="/pengurusan_maklumat/manual_dan_standard">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span
                                        class="px-0 {{ Request::is('pengurusan_maklumat/manual_dan_standard') ? 'text-dark' : '' }}">Manual
                                        dan Standard</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('pengurusan_maklumat/hebahan') ? 'active' : '' }} py-0"
                                href="/pengurusan_maklumat/hebahan">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span
                                        class="px-0 {{ Request::is('pengurusan_maklumat/hebahan') ? 'text-dark' : '' }}">Hebahan</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('pengurusan_maklumat/faq') ? 'active' : '' }} py-0"
                                href="/pengurusan_maklumat/faq">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span
                                        class="px-0 {{ Request::is('pengurusan_maklumat/faq') ? 'text-dark' : '' }}">FAQ</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('pengurusan_maklumat/maklum_balas') ? 'active' : '' }} py-0"
                                href="/pengurusan_maklumat/maklum_balas">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span
                                        class="px-0 {{ Request::is('pengurusan_maklumat/maklum_balas') ? 'text-dark' : '' }}">Maklumbalas</span>
                                </div>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link {{ Request::is('pengurusan_maklumat/pendaftaran_projek') ? 'active' : '' }} py-0"
                                href="/pengurusan_maklumat/pendaftaran_projek">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span
                                        class="px-0 {{ Request::is('pengurusan_maklumat/pendaftaran_projek') ? 'text-dark' : '' }}">Pendaftaran
                                        Projek</span>
                                </div>
                            </a>
                        </li> --}}
                        {{-- test --}}
                        <li class="nav-item">
                            <a class="nav-link py-0 dropdown-indicator" href="#pendaftaran_projek" role="button"
                                data-bs-toggle="collapse"
                                aria-expanded="{{ Request::is('pengurusan_maklumat/pendaftaran_projek/*') ? 'true' : 'false' }}"
                                aria-controls="pendaftaran_projek">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Pendaftaran Projek</span>
                                </div>
                            </a>
                        
                            <ul class="nav-item collapse {{ Request::is('pengurusan_maklumat/pendaftaran_projek/*', 'pengurusan_maklumat/pendaftaran_projek', 'pengurusan_maklumat/pemilihan_ahli', 'pengurusan_maklumat/pemilihan_ahli/*') ? 'show' : 'false' }} my-1"
                                id="pendaftaran_projek">
                                {{-- <li class="nav-item">
                                    <a class="nav-link {{ Request::is('pengurusan_maklumat/pendaftaran_projek') ? 'active' : '' }} py-0"
                                        href="/pengurusan_maklumat/pendaftaran_projek">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">Papar Senarai Projek</span>
                                        </div>
                                    </a>

                                </li> --}}

                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('pengurusan_maklumat/pendaftaran_projek/projek/papar') ? 'active' : '' }} py-0"
                                        href="/pengurusan_maklumat/pendaftaran_projek/projek/papar">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">Papar Senarai Projek</span>
                                        </div>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('pengurusan_maklumat/pendaftaran_projek/create') ? 'active' : '' }} py-0"
                                        href="/pengurusan_maklumat/pendaftaran_projek/create">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">Pendaftaran Projek</span>
                                        </div>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('pengurusan_maklumat/pemilihan_ahli', 'pengurusan_maklumat/pemilihan_ahli/*') ? 'active' : '' }} py-0"
                                        href="/pengurusan_maklumat/pemilihan_ahli">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">Pemilihan Ahli Pasukan dan Peranan</span>
                                        </div>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('pengurusan_maklumat/pendaftaran_projek/pengesahan_projek') ? 'active' : '' }} py-0"
                                        href="/pengurusan_maklumat/pendaftaran_projek/pengesahan_projek/projek">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">Pengesahan Pendaftaran Projek</span>
                                        </div>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('pengurusan_maklumat/pendaftaran_projek/show') ? 'active' : '' }} py-0"
                                        href="/pengurusan_maklumat/pendaftaran_projek/show">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">Papar dan Muat Turun Matlumat Projek</span>
                                        </div>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('pengurusan_maklumat/pendaftaran_projek/gugur_projek')? 'active' : '' }} py-0"
                                        href="/pengurusan_maklumat/pendaftaran_projek/gugur_projek/projek">
                                        <div class="d-flex align-items-center nav-link-side">
                                            <span class="px-0">Permohonan Gugur Projek</span>
                                        </div>
                                    </a>

                                </li>
                            </ul>
                        </li>
                    </ul>

                        {{-- BANGUNAN penilaian reka bentuk bangunan --}}
                        {{-- @if(Auth::user()->hasRole('Ketua Pasukan')) --}}

                        <a class="nav-link py-0 dropdown-indicator {{ Request::is('penilaian_reka_bentuk_bangunan/*') ? 'active-main' : '' }}"
                            href="#penilaian_reka_bentuk_bangunan" role="button" data-bs-toggle="collapse"
                            aria-expanded="{{ Request::is('penilaian_reka_bentuk_bangunan') ? 'true' : 'false' }}"
                            aria-controls="penilaian_reka_bentuk_bangunan">
                            <div class="d-flex align-items-center nav-link-side px-0">
                                <span class="px-3"><span class="fas fa-home"></span> Penilaian Reka Bentuk
                                    Bangunan</span>
                            </div>
                        </a>
                        <ul class="nav-item collapse {{ Request::is('penilaian_reka_bentuk_bangunan/*') || Request::is('penilaian_reka_bentuk_bangunan') ? 'show' : 'false' }} my-1"
                            id="penilaian_reka_bentuk_bangunan">
                            {{-- BANGUNAN Senarai Projek Bangunan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_bangunan') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_bangunan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_bangunan') ? 'text-dark' : '' }}">Paparan
                                            Senarai Projek</span>
                                    </div>
                                </a>
                            </li>
                        {{-- @endif <!--Role--> --}}

                            {{-- BANGUNAN Melantik Pemudah Cara --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_bangunan/melantik_pemudah_cara') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_bangunan/melantik_pemudah_cara/">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_bangunan/melantik_pemudah_cara') ? 'text-dark' : '' }}">Melantik
                                            Pemudah Cara</span>
                                    </div>
                                </a>
                            </li>
                            {{-- BANGUNAN Penilaian Reka Bentuk --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_bangunan/skor_penilaian') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_bangunan/skor_penilaian">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_bangunan/skor_penilaian') ? 'text-dark' : '' }}">Penilaian
                                            Reka Bentuk</span>
                                    </div>
                                </a>
                            </li>
                            {{-- BANGUNAN Pengesahan Penilaian Reka Bentuk --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_bangunan/pengesahan_penilaian') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_bangunan/pengesahan_penilaian">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_bangunan/pengesahan_penilaian') ? 'text-dark' : '' }}">Pengesahan
                                            Penilaian
                                            Reka Bentuk</span>
                                    </div>
                                </a>
                            </li>
                            {{-- BANGUNAN Semakan Rawak dan Jana Sijil --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_bangunan/semakan_rawak') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_bangunan/semakan_rawak">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_bangunan/semakan_rawak') ? 'text-dark' : '' }}">Semakan
                                            Rawak dan Jana Sijil</span>
                                    </div>
                                </a>
                            </li>
                
                            {{-- BANGUNAN Papar dan Muat Turun Sijil Penilaian Reka Bentuk --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_bangunan/muat_turun_sijil') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_bangunan/muat_turun_sijil">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_bangunan/muat_turun_sijil') ? 'text-dark' : '' }}">Papar
                                            dan Muat Turun Sijil Penilaian Reka Bentuk</span>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('maisarah_bangunan/baru_a') ? 'active' : '' }} py-0"
                                    href="/maisarah_bangunan/baru_a">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('maisarah_bangunan/muat_turun_sijil') ? 'text-dark' : '' }}">
                                            Pembangunan Baru A</span>
                                    </div>
                                </a>
                            </li>
                            <hr class="navbar-vertical-divider mx-3">
                        </ul>

                        <!--BANGUNAN (Verifikasi Permarkahan Bangunan)-->
                        <a class="nav-link py-0 dropdown-indicator {{ Request::is('verifikasi_permarkahan_bangunan/*') ? 'active-main' : '' }}"
                            href="#verifikasi_permarkahan_bangunan" role="button" data-bs-toggle="collapse"
                            aria-expanded="{{ Request::is('verifikasi_permarkahan_bangunan') ? 'true' : 'false' }}"
                            aria-controls="verifikasi_permarkahan_bangunan">
                            <div class="d-flex align-items-center nav-link-side px-0">
                                <span class="px-3"><span class="fas fa-home"></span> Verifikasi Permarkahan
                                    Bangunan</span>
                            </div>
                        </a>
                        <ul class="nav-item collapse {{ Request::is('verifikasi_permarkahan_bangunan/*') || Request::is('verifikasi_permarkahan_bangunan') ? 'show' : 'false' }} my-1"
                            id="verifikasi_permarkahan_bangunan">
                            {{-- BANGUNAN (Verifikasi) Paparan Senarai Projek Bangunan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_bangunan') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_bangunan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_bangunan') ? 'text-dark' : '' }}">Paparan
                                            Senarai Projek</span>
                                    </div>
                                </a>
                            </li>
                            {{-- BANGUNAN (Verifikasi) Melantik Pemudah Cara --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_bangunan/pemudah_cara/create') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_bangunan/pemudah_cara/create">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_bangunan/pemudah_cara/create') ? 'text-dark' : '' }}">Melantik
                                            Pemudah Cara</span>
                                    </div>
                                </a>
                            </li>

                            {{-- BANGUNAN (Verifikasi) Penilaian Verifikasi --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_bangunan/skor_penilaian') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_bangunan/skor_penilaian">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_bangunan/skor_penilaian') ? 'text-dark' : '' }}">Penilaian 
                                            Verifikasi</span>
                                    </div>
                                </a>
                            </li>

                            {{-- BANGUNAN (Verifikasi) Pengesahan Penilaian Verifikasi --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_bangunan/pengesahan_penilaian') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_bangunan/pengesahan_penilaian">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_bangunan/pengesahan_penilaian') ? 'text-dark' : '' }}">Pengesahan
                                            Penilaian Verifikasi</span>
                                    </div>
                                </a>
                            </li>
                            {{-- BANGUNAN (Verifikasi) Jana Keputusan --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_bangunan/jana_keputusan_bangunan') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_bangunan/jana_keputusan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_bangunan/jana_keputusan_bangunan') ? 'text-dark' : '' }}">Jana 
                                            Keputusan
                                            </span>
                                    </div>
                                </a>
                            </li> --}}

                            {{-- BANGUNAN (Verifikasi) Semakan Rawak dan Jana Sijil --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_bangunan/semakan_rawak') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_bangunan/semakan_rawak">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_bangunan/semakan_rawak') ? 'text-dark' : '' }}">Semakan Rawak 
                                            dan Jana Sijil
                                            </span>
                                    </div>
                                </a>
                            </li>

                            {{-- BANGUNAN (Verifikasi) Papar dan Muat Turun Sijil Penilaian Verifikasi Pemarkahan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_bangunan/muat_turun_sijil') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_bangunan/muat_turun_sijil">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_bangunan/muat_turun_sijil') ? 'text-dark' : '' }}">Papar dan Muat Turun Sijil
                                            Penilaian Verifikasi Pemarkahan</span>
                                    </div>
                                </a>
                            </li>
                        
                            {{-- BANGUNAN (Verifikasi) Pengesahan Rayuan --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_bangunan/pengesahan_rayuan') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_bangunan/pengesahan_rayuan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_bangunan/pengesahan_rayuan') ? 'text-dark' : '' }}">Pengesahan 
                                            Rayuan
                                            </span>
                                    </div>
                                </a>
                            </li> --}}

                            {{-- BANGUNAN (Verifikasi) Muat Turun Sijil Validasi --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_bangunan/letaklahviewblade') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_bangunan/letaklahviewblade">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_bangunan/letaklahviewblade') ? 'text-dark' : '' }}">Muat Turun 
                                            Sijil Validasi
                                            </span>
                                    </div>
                                </a>
                            </li> --}}
                            <hr class="navbar-vertical-divider mx-3">
                        </ul>

                        {{--BANGUNAN (Validasi Permarkahan Bangunan)--}}
                        <a class="nav-link py-0 dropdown-indicator {{ Request::is('validasi_permarkahan_bangunan/*') ? 'active-main' : '' }}"
                            href="#validasi_permarkahan_bangunan" role="button" data-bs-toggle="collapse"
                            aria-expanded="{{ Request::is('validasi_permarkahan_bangunan') ? 'true' : 'false' }}"
                            aria-controls="validasi_permarkahan_bangunan">
                            <div class="d-flex align-items-center nav-link-side px-0">
                                <span class="px-3"><span class="fas fa-home"></span> Validasi Permarkahan
                                    Bangunan</span>
                            </div>
                        </a>
                        <ul class="nav-item collapse {{ Request::is('validasi_permarkahan_bangunan/*') || Request::is('validasi_permarkahan_bangunan') ? 'show' : 'false' }} my-1"
                            id="validasi_permarkahan_bangunan">
                            
                            {{-- BANGUNAN (Validasi) Melantik Pasukan Validasi --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('validasi_permarkahan_bangunan/melantik_pasukan_validasi') ? 'active' : '' }} py-0"
                                    href="/validasi_permarkahan_bangunan/melantik_pasukan_validasi">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('validasi_permarkahan_bangunan/melantik_pasukan_validasi') ? 'text-dark' : '' }}">Melantik
                                            Pasukan Validasi</span>
                                    </div>
                                </a>
                            </li>

                            {{-- BANGUNAN (Validasi) Penilaian Validasi --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('validasi_permarkahan_bangunan/penilaian_validasi') ? 'active' : '' }} py-0"
                                    href="/validasi_permarkahan_bangunan/penilaian_validasi">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('validasi_permarkahan_bangunan/penilaian_validasi') ? 'text-dark' : '' }}">Penilaian 
                                            Validasi</span>
                                    </div>
                                </a>
                            </li>

                            {{-- BANGUNAN (Validasi) Borang Validasi --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('validasi_permarkahan_bangunan/borang_validasi') ? 'active' : '' }} py-0"
                                    href="/validasi_permarkahan_bangunan/borang_validasi">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('validasi_permarkahan_bangunan/borang_validasi') ? 'text-dark' : '' }}">Borang
                                            Validasi</span>
                                    </div>
                                </a>
                            </li>

                            {{-- BANGUNAN (Validasi) Pengesahan Penilaian Validasi --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('validasi_permarkahan_bangunan/pengesahan_penilaian_validasi') ? 'active' : '' }} py-0"
                                    href="/validasi_permarkahan_bangunan/pengesahan_penilaian_validasi">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('validasi_permarkahan_bangunan/pengesahan_penilaian_validasi') ? 'text-dark' : '' }}">Pengesahan
                                            Penilaian Validasi</span>
                                    </div>
                                </a>
                            </li>
                            {{-- BANGUNAN (Validasi) Jana Keputusan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('validasi_permarkahan_bangunan/jana_keputusan') ? 'active' : '' }} py-0"
                                    href="/validasi_permarkahan_bangunan/jana_keputusan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('validasi_permarkahan_bangunan/jana_keputusan') ? 'text-dark' : '' }}">Jana 
                                            Keputusan
                                            </span>
                                    </div>
                                </a>
                            </li>
                            {{-- BANGUNAN (Validasi) Papar dan Muat Turun Skor --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('validasi_permarkahan_bangunan/muat_turun_skor') ? 'active' : '' }} py-0"
                                    href="/validasi_permarkahan_bangunan/muat_turun_skor">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('validasi_permarkahan_bangunan/muat_turun_skor') ? 'text-dark' : '' }}">Papar dan Muat 
                                            Turun Skor</span>
                                    </div>
                                </a>
                            </li>

                            {{-- BANGUNAN (Validasi) Permohonan Rayuan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('validasi_permarkahan_bangunan/permohonan_rayuan') ? 'active' : '' }} py-0"
                                    href="/validasi_permarkahan_bangunan/permohonan_rayuan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('validasi_permarkahan_bangunan/permohonan_rayuan') ? 'text-dark' : '' }}">Permohonan
                                            Rayuan
                                            </span>
                                    </div>
                                </a>
                            </li>
                        
                            {{-- BANGUNAN (Validasi) Pengesahan Rayuan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('validasi_permarkahan_bangunan/pengesahan_rayuan') ? 'active' : '' }} py-0"
                                    href="/validasi_permarkahan_bangunan/pengesahan_rayuan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('validasi_permarkahan_bangunan/pengesahan_rayuan') ? 'text-dark' : '' }}">Pengesahan 
                                            Rayuan
                                            </span>
                                    </div>
                                </a>
                            </li>

                            {{-- BANGUNAN (Validasi) Jana Sijil --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('validasi_permarkahan_bangunan/jana_sijil') ? 'active' : '' }} py-0"
                                    href="/validasi_permarkahan_bangunan/jana_sijil">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('validasi_permarkahan_bangunan/jana_sijil') ? 'text-dark' : '' }}">
                                            Jana Sijil
                                            </span>
                                    </div>
                                </a>
                            </li>

                            {{-- BANGUNAN (Validasi) Muat Turun Sijil Validasi --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('validasi_permarkahan_bangunan/sijil_validasi') ? 'active' : '' }} py-0"
                                    href="/validasi_permarkahan_bangunan/sijil_validasi">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('validasi_permarkahan_bangunan/sijil_validasi') ? 'text-dark' : '' }}">Muat Turun 
                                            Sijil Validasi
                                            </span>
                                    </div>
                                </a>
                            </li>
                            <hr class="navbar-vertical-divider mx-3">
                        </ul>


                        {{-- penilaian reka bentuk GPSS --}}
                        <a class="nav-link py-0 dropdown-indicator {{ Request::is('penilaian_reka_bentuk_gpss/*') ? 'active-main' : '' }}"
                            href="#penilaian_reka_bentuk_gpss" role="button" data-bs-toggle="collapse"
                            aria-expanded="{{ Request::is('penilaian_reka_bentuk_gpss') ? 'true' : 'false' }}"
                            aria-controls="penilaian_reka_bentuk_gpss">
                            <div class="d-flex align-items-center nav-link-side px-0">
                                <span class="px-3"><span class="fas fa-home"></span> Penilaian Reka Bentuk
                                    GPSS</span>
                            </div>
                        </a>
                        <ul class="nav-item collapse {{ Request::is('penilaian_reka_bentuk_gpss/*') || Request::is('penilaian_reka_bentuk_gpss') ? 'show' : 'false' }} my-1"
                            id="penilaian_reka_bentuk_gpss">
                            {{-- Senarai Projek GPSS --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_gpss') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_gpss">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_gpss') ? 'text-dark' : '' }}">Paparan
                                            Senarai Projek</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Melantik Pemudah Cara --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_gpss/papar_senarai_pemudah_cara') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_gpss/papar_senarai_pemudah_cara">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_gpss/papar_senarai_pemudah_cara') ? 'text-dark' : '' }}">Melantik
                                            Pemudah Cara</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Penilaian Reka Bentuk --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_gpss/skor_penilaian') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_gpss/skor_penilaian">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_gpss/skor_penilaian') ? 'text-dark' : '' }}">Penilaian
                                            Reka Bentuk</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Pengesahan Penilaian Reka Bentuk --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_gpss/pengesahan_penilaian') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_gpss/pengesahan_penilaian">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_gpss/pengesahan_penilaian') ? 'text-dark' : '' }}">Pengesahan
                                            Penilaian
                                            Reka Bentuk</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Jana Keputusan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_gpss/jana_keputusan') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_gpss/jana_keputusan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_gpss/jana_keputusan') ? 'text-dark' : '' }}">Jana
                                            Keputusan</span>
                                    </div>
                                </a>
                            </li>
                            
                            {{-- Papar dan Muat Turun Skor Kad Penilaian Reka Bentuk --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_gpss/paparan_sijil') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_gpss/paparan_sijil">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_gpss/paparan_sijil') ? 'text-dark' : '' }}">Papar
                                            dan Muat Turun Skor Kad Penilaian Reka Bentuk</span>
                                    </div>
                                </a>
                            </li>
                            <hr class="navbar-vertical-divider mx-3">
                        </ul>

                        {{-- verifikasi permarkahan GPSS --}}
                        <a class="nav-link py-0 dropdown-indicator {{ Request::is('verifikasi_permarkahan_gpss/*') ? 'active-main' : '' }}"
                        href="#verifikasi_permarkahan_gpss" role="button" data-bs-toggle="collapse"
                        aria-expanded="{{ Request::is('verifikasi_permarkahan_gpss') ? 'true' : 'false' }}"
                        aria-controls="verifikasi_permarkahan_gpss">
                        <div class="d-flex align-items-center nav-link-side px-0">
                            <span class="px-3"><span class="fas fa-home"></span> Penilaian Verifikasi Permarkahan GPSS</span>
                        </div>
                        </a>
                        <ul class="nav-item collapse {{ Request::is('verifikasi_permarkahan_gpss/*') || Request::is('verifikasi_permarkahan_gpss') ? 'show' : 'false' }} my-1"
                            id="verifikasi_permarkahan_gpss">
                            {{-- Senarai Projek GPSS --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('papar_verifikasi_gpss') ? 'active' : '' }} py-0"
                                    href="/papar_verifikasi_gpss">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('papar_verifikasi_gpss') ? 'text-dark' : '' }}">Paparan
                                            Senarai Projek</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Melantik Pemudah Cara Verifikasi GPSS --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_gpss/papar_senarai_pemudah_cara_verifikasi') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_gpss/papar_senarai_pemudah_cara_verifikasi">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_gpss/papar_senarai_pemudah_cara_verifikasi') ? 'text-dark' : '' }}">Melantik
                                            Pemudah Cara</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Hantar Skor Kad Verifikasi GPSS --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_gpss/skor_kad') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_gpss/skor_kad">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_gpss/skor_kad') ? 'text-dark' : '' }}">Hantar Skor Kad dan
                                            Muat Naik Dokumen Sokongan</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Melantik Penilai GPSS --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_gpss/papar_senarai_penilai_jalan') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_gpss/papar_senarai_penilai_jalan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_gpss/papar_senarai_penilai_jalan') ? 'text-dark' : '' }}">Melantik Penilai
                                            GPSS</span>
                                    </div>
                                </a>
                            </li>
                             {{-- Penilaian Verifikasi --}}
                             <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_gpss/penilaian_verifikasi') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_gpss/penilaian_verifikasi">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_gpss/penilaian_verifikasi') ? 'text-dark' : '' }}">Penilaian
                                            Verifikasi</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Pengesahan Penilaian Verifikasi GPSS --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_gpss/pengesahan_penilaian_verifikasi') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_gpss/pengesahan_penilaian_verifikasi">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_gpss/pengesahan_penilaian_verifikasi') ? 'text-dark' : '' }}">Pengesahan
                                            Penilaian
                                            Verifikasi</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Menjana Keputusan Verifikasi GPSS --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_gpss/jana_keputusan_skor_kad') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_gpss/jana_keputusan_skor_kad">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_gpss/jana_keputusan_skor_kad') ? 'text-dark' : '' }}">Jana
                                                Keputusan (Skor Kad)</span>
                                    </div>
                                </a>
                            </li>
                            
                            {{-- Permohonan Rayuan GPSS --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_gpss/permohonan_rayuan_verifikasi') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_gpss/permohonan_rayuan_verifikasi">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_gpss/permohonan_rayuan_verifikasi') ? 'text-dark' : '' }}">Permohonan
                                            Rayuan</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Pengesahan Rayuan GPSS --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_gpss/pengesahan_rayuan_verifikasi') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_gpss/pengesahan_rayuan_verifikasi">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_gpss/pengesahan_rayuan_verifikasi') ? 'text-dark' : '' }}">Pengesahan
                                            Rayuan</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Jana Sijil GPSS --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_verifikasi_gpss/jana_sijil_gpss') ? 'active' : '' }} py-0"
                                    href="/penilaian_verifikasi_gpss/jana_sijil_gpss">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_verifikasi_gpss/jana_sijil_gpss') ? 'text-dark' : '' }}">Jana
                                            Sijil</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Papar dan Muat Turun Sijil Verifikasi GPSS --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_verifikasi_gpss/pengesahan_rayuan_gpss') ? 'active' : '' }} py-0"
                                    href="/penilaian_verifikasi_gpss/pengesahan_rayuan_gpss">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_verifikasi_gpss/pengesahan_rayuan_gpss') ? 'text-dark' : '' }}">Papar dan Muat
                                            Turun Sijil Verifikasi</span>
                                    </div>
                                </a>
                            </li>
                            <hr class="navbar-vertical-divider mx-3">
                        </ul>

                        {{-- penilaian reka bentuk Jalan --}}
                        <a class="nav-link py-0 dropdown-indicator {{ Request::is('penilaian_reka_bentuk_jalan/*') ? 'active-main' : '' }}"
                            href="#penilaian_reka_bentuk_jalan" role="button" data-bs-toggle="collapse"
                            aria-expanded="{{ Request::is('penilaian_reka_bentuk_jalan') ? 'true' : 'false' }}"
                            aria-controls="penilaian_reka_bentuk_jalan">
                            <div class="d-flex align-items-center nav-link-side px-0">
                                <span class="px-3"><span class="fas fa-home"></span> Penilaian Reka Bentuk
                                    Jalan</span>
                            </div>
                        </a>
                        <ul class="nav-item collapse {{ Request::is('penilaian_reka_bentuk_jalan/*') || Request::is('penilaian_reka_bentuk_jalan') ? 'show' : 'false' }} my-1"
                            id="penilaian_reka_bentuk_jalan">
                            {{-- Senarai Projek jalan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_jalan') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_jalan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_jalan') ? 'text-dark' : '' }}">Paparan
                                            Senarai Projek</span>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_jalan/pemudah_cara_jalan') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_jalan/pemudah_cara_jalan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_jalan/pemudah_cara_jalan') ? 'text-dark' : '' }}">Melantik
                                            Pemudah Cara</span>
                                    </div>
                                </a>
                            </li>

                            {{-- Melantik Pemudah Cara --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_jalan/isi_skor_kad') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_jalan/isi_skor_kad">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_jalan/isi_skor_kad') ? 'text-dark' : '' }}">Mengisi
                                            Skor Kad dan Muat Naik Dokumen Sokongan</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Penilaian Reka Bentuk --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_jalan/penilai_jalan') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_jalan/penilai_jalan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_jalan/penilai_jalan') ? 'text-dark' : '' }}">Melantik
                                            Penilai Jalan</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Pengesahan Penilaian Reka Bentuk --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_jalan/penilai_reka_bentuk') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_jalan/penilai_reka_bentuk">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_jalan/penilai_reka_bentuk') ? 'text-dark' : '' }}">Penilai
                                            Reka Bentuk</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Jana Keputusan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_jalan/pengesahan_penilaian_jalan') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_jalan/pengesahan_penilaian_jalan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_jalan/pengesahan_penilaian_jalan') ? 'text-dark' : '' }}">Pengesahan
                                            Penilaian</span>
                                    </div>
                                </a>
                            </li>

                            {{-- Jana Keputusan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_jalan/jana_keputusan_jalan') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_jalan/jana_keputusan_jalan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_jalan/jana_keputusan_jalan') ? 'text-dark' : '' }}">Jana
                                            Keputusan</span>
                                    </div>
                                </a>
                            </li>

                            {{-- Jana Keputusan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_jalan/papar_skor_kad') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_jalan/papar_skor_kad">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_jalan/papar_skor_kad') ? 'text-dark' : '' }}">Papar
                                            Skor Kad</span>
                                    </div>
                                </a>
                            </li>
                            
                            {{-- Permohonan Rayuan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_jalan/permohonan_rayuan') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_jalan/permohonan_rayuan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_jalan/permohonan_rayuan') ? 'text-dark' : '' }}">
                                            Permohonan Rayuan</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Pengesahan Rayuan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_jalan/pengesahan_rayuan') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_jalan/pengesahan_rayuan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_jalan/pengesahan_rayuan') ? 'text-dark' : '' }}">Pengesahan
                                            Rayuan</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Jana Keputusan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_jalan/jana_sijil') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_jalan/jana_sijil">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_jalan/jana_sijil') ? 'text-dark' : '' }}">Jana
                                            Sijil</span>
                                    </div>
                                </a>
                            </li>
                            {{-- Jana Keputusan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('penilaian_reka_bentuk_jalan/jana_keputusan') ? 'active' : '' }} py-0"
                                    href="/penilaian_reka_bentuk_jalan/jana_keputusan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('penilaian_reka_bentuk_jalan/jana_keputusan') ? 'text-dark' : '' }}">Muat 
                                            Turun Sijil</span>
                                    </div>
                                </a>
                            </li>
                            <hr class="navbar-vertical-divider mx-3">
                        </ul>
                        
                        {{--  --}}
                        {{-- jalan --}}
                        {{--JALAN (Verifikasi Permarkahan Jalan)--}}
                        <a class="nav-link py-0 dropdown-indicator {{ Request::is('verifikasi_permarkahan_jalan/*') ? 'active-main' : '' }}"
                            href="#verifikasi_permarkahan_jalan" role="button" data-bs-toggle="collapse"
                            aria-expanded="{{ Request::is('verifikasi_permarkahan_jalan') ? 'true' : 'false' }}"
                            aria-controls="verifikasi_permarkahan_jalan">
                            <div class="d-flex align-items-center nav-link-side px-0">
                                <span class="px-3"><span class="fas fa-home"></span> Verifikasi Permarkahan
                                    Jalan</span>
                            </div>
                        </a>
                        <ul class="nav-item collapse {{ Request::is('verifikasi_permarkahan_jalan/*') || Request::is('verifikasi_permarkahan_jalan') ? 'show' : 'false' }} my-1"
                            id="verifikasi_permarkahan_jalan">
                            {{-- JALAN (Verifikasi) Paparan Senarai Projek jalan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_jalan/papar_senarai_projek') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_jalan/papar_senarai_projek">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_jalan/papar_senarai_projek') ? 'text-dark' : '' }}">Paparan
                                            Senarai Projek</span>
                                    </div>
                                </a>
                            </li>
                            {{-- JALAN (Verifikasi) Melantik Pemudah Cara --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_jalan/pemudah_cara') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_jalan/pemudah_cara/create">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_jalan/pemudah_cara') ? 'text-dark' : '' }}">Melantik
                                            Pemudah Cara</span>
                                    </div>
                                </a>
                            </li>

                            {{-- JALAN (Verifikasi) Mengisi Skor Kad dan Muat Naik Dokumen Sokongan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_jalan/isi_skor_kad') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_jalan/isi_skor_kad_verifikasi">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_jalan/isi_skor_kad') ? 'text-dark' : '' }}">Mengisi Skor Kad dan
                                            Muat Naik Dokumen Sokongan</span>
                                    </div>
                                </a>
                            </li>

                            {{-- JALAN (Verifikasi) Melantik Penilai jalan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_jalan/melantik_penilai_jalan') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_jalan/melantik_penilai_jalan/create">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('/verifikasi_permarkahan_jalan/melantik_penilai_jalan') ? 'text-dark' : '' }}">Melantik
                                            Penilai Jalan</span>
                                    </div>
                                </a>
                            </li>

                            {{-- JALAN (Verifikasi) markah penilaian Verifikasi --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_jalan/markah_penilaian') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_jalan/markah_penilaian/create">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_jalan/markah_penilaian') ? 'text-dark' : '' }}">Markah 
                                            Penilaian</span>
                                    </div>
                                </a>
                            </li>

                            {{-- JALAN (Verifikasi) kemaskini penilai jalan Verifikasi --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_jalan/kemaskini_penilai_jalan_verifikasi') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_jalan/kemaskini_penilai_jalan_verifikasi/create">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_jalan/kemaskini_penilai_jalan_verifikasi') ? 'text-dark' : '' }}">Kemaskini 
                                            Penilai Jalan</span>
                                    </div>
                                </a>
                            </li>

                            {{-- JALAN (Verifikasi) Penilaian Verifikasi --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('/verifikasi_permarkahan_jalan/verifikasi_permarkahan') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_jalan/verifikasi_permarkahan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('/verifikasi_permarkahan_jalan/verifikasi_permarkahan') ? 'text-dark' : '' }}">Verifikasi 
                                            Permarkahan</span>
                                    </div>
                                </a>
                            </li>

                            {{-- JALAN(Verifikasi) Pengesahan Penilaian Verifikasi --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('/verifikasi_permarkahan_jalan/verifikasi_permarkahan/create') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_jalan/verifikasi_permarkahan/create">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('/verifikasi_permarkahan_jalan/verifikasi_permarkahan/create') ? 'text-dark' : '' }}">Pengesahan
                                            Penilaian Verifikasi</span>
                                    </div>
                                </a>
                            </li>
                            {{-- JALAN (Verifikasi) Jana Keputusan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('/verifikasi_permarkahan_jalan/jana_keputusan') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_jalan/jana_keputusan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('/verifikasi_permarkahan_jalan/jana_keputusan') ? 'text-dark' : '' }}">Jana 
                                            Keputusan
                                            </span>
                                    </div>
                                </a>
                            </li>

                            {{-- JALAN (Verifikasi) Papar Skor Kad --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('/verifikasi_permarkahan_jalan/papar_skor_kad') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_jalan/papar_skor_kad">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('/verifikasi_permarkahan_jalan/papar_skor_kad') ? 'text-dark' : '' }}">Papar Skor 
                                            Kad
                                            </span>
                                    </div>
                                </a>
                            </li>

                            {{-- JALAN (Verifikasi) Permohonan Rayuan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_jalan/permohonan_rayuan') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_jalan/permohonan_rayuan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_jalan/permohonan_rayuan') ? 'text-dark' : '' }}">Permohonan 
                                            Rayuan
                                            </span>
                                    </div>
                                </a>
                            </li>

                            {{-- JALAN (Verifikasi) Pengesahan Rayuan --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_jalan') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_jalan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_jalan') ? 'text-dark' : '' }}">Pengesahan 
                                            Rayuan
                                            </span>
                                    </div>
                                </a>
                            </li>

                            {{-- JALAN (Verifikasi) Jana Sijil --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_jalan') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_jalan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_jalan') ? 'text-dark' : '' }}">Jana 
                                            Sijil
                                            </span>
                                    </div>
                                </a>
                            </li>

                            {{-- JALAN (Verifikasi) Muat Turun Sijil --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_jalan') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_jalan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_jalan') ? 'text-dark' : '' }}">Muat Turun 
                                            Sijil
                                            </span>
                                    </div>
                                </a>
                            </li>

                            {{-- JALAN (Verifikasi) Papar dan Muat Turun Sijil Penilaian Verifikasi Pemarkahan --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_bangunan/semakan_rawak') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_bangunan/semakan_rawak">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_bangunan/semakan_rawak') ? 'text-dark' : '' }}">Papar dan Muat Turun Sijil
                                            Penilaian Verifikasi Pemarkahan</span>
                                    </div>
                                </a>
                            </li> --}}
                        
                            {{-- JALAN (Verifikasi) Pengesahan Rayuan --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_bangunan/pengesahan_rayuan') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_bangunan/pengesahan_rayuan">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_bangunan/pengesahan_rayuan') ? 'text-dark' : '' }}">Pengesahan 
                                            Rayuan
                                            </span>
                                    </div>
                                </a>
                            </li> --}}

                            {{-- JALAN (Verifikasi) Semakan Rawak dan Jana Sijil --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_bangunan/letaklahviewblade') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_bangunan/letaklahviewblade">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_bangunan/letaklahviewblade') ? 'text-dark' : '' }}">Semakan Rawak 
                                            dan Jana Sijil
                                            </span>
                                    </div>
                                </a>
                            </li> --}}

                            {{-- JALAN (Verifikasi) Muat Turun Sijil Validasi --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link {{ Request::is('verifikasi_permarkahan_bangunan/letaklahviewblade') ? 'active' : '' }} py-0"
                                    href="/verifikasi_permarkahan_bangunan/letaklahviewblade">
                                    <div class="d-flex align-items-center nav-link-side">
                                        <span
                                            class="px-0 {{ Request::is('verifikasi_permarkahan_bangunan/letaklahviewblade') ? 'text-dark' : '' }}">Muat Turun 
                                            Sijil Validasi
                                            </span>
                                    </div>
                                </a>
                            </li> --}}
                            <hr class="navbar-vertical-divider mx-3">
                        </ul>

                        {{-- Modul Laporan --}}
                    <a class="nav-link py-0 dropdown-indicator {{ Request::is('laporan/*') ? 'active-main' : '' }}"
                        href="#laporan" role="button" data-bs-toggle="collapse"
                        aria-expanded="{{ Request::is('laporan') ? 'true' : 'false' }}"
                        aria-controls="laporan">
                        <div class="d-flex align-items-center nav-link-side px-0">
                            <span class="px-3"><span class="fas fa-home"></span> Laporan</span>
                        </div>
                    </a>
                    <ul class="nav-item collapse {{ Request::is('laporan/*') ? 'show' : 'false' }} my-1"
                        id="laporan">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('laporan/keputusan_pemarkahan') || Request::is('laporan/keputusan_permarkahan/*') ? 'active' : '' }} py-0"
                            href="/laporan/keputusan_pemarkahan">
                            <div class="d-flex align-items-center nav-link-side">
                            <span
                                class="px-0 {{ Request::is('laporan/keputusan_pemarkahan') || Request::is('laporan/keputusan_permarkahan/*') ? 'text-dark' : '' }}">Keputusan
                                    Permarkahan</span>
                            </div>
                        </a>
                    </li>
                    <ul class="nav-item collapse {{ Request::is('laporan/*') ? 'show' : 'false' }} my-1"
                        id="analisis_pencapaian">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('laporan/keputusan_permarkahan/papar_senarai_projek') ? 'active' : '' }} py-0"
                                href="/laporan/analisis_pencapaian/papar_senarai_projek">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Papar Senarai Projek</span>
                                </div>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('laporan/analisis_pencapaian/jana_analisis_pencapaian') ? 'active' : '' }} py-0"
                                href="/laporan/analisis_pencapaian/jana_analisis_pencapaian">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Paparan Keputusan</span>
                                </div>
                            </a>

                        </li>

                    <li class="nav-item">
                        <a class="nav-link py-0 dropdown-indicator" href="#analisis_pencapaian" role="button"
                            data-bs-toggle="collapse"
                            aria-expanded="{{ Request::is('laporan/analisis_pencapaian/*') ? 'true' : 'false' }}"
                            aria-controls="analisis_pencapaian">
                            <div class="d-flex align-items-center nav-link-side">
                                <span class="px-0">Analisis Pencapaian</span>
                            </div>
                        </a>
                        <ul class="nav-item collapse {{ Request::is('laporan/analisis_pencapaian/*') ? 'show' : 'false' }} my-1"
                        id="analisis_pencapaian">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('laporan/analisis_pencapaian/papar_senarai_projek') ? 'active' : '' }} py-0"
                                href="/laporan/analisis_pencapaian/papar_senarai_projek">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Papar Senarai Projek</span>
                                </div>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('laporan/analisis_pencapaian/jana_analisis_pencapaian') ? 'active' : '' }} py-0"
                                href="/laporan/analisis_pencapaian/jana_analisis_pencapaian">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Jana Analisis Pencapaian</span>
                                </div>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('laporan/analisis_pencapaian/papar_analisis_pencapaian') ? 'active' : '' }} py-0"
                                href="/laporan/analisis_pencapaian/papar_analisis_pencapaian">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Papar Analisis Pencapaian</span>
                                </div>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('laporan/analisis_pencapaian/muat_turun_analisis_pencapaian') ? 'active' : '' }} py-0"
                                href="/laporan/analisis_pencapaian/muat_turun_analisis_pencapaian">
                                <div class="d-flex align-items-center nav-link-side">
                                    <span class="px-0">Muat Turun Analisis Pencapaian</span>
                                </div>
                            </a>

                        </li>



                </li>
                <hr class="navbar-vertical-divider mx-3">
            </ul>

            </li>
            </ul>
        </div>
    </div>
</nav>