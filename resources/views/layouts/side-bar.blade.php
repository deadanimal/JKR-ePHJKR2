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
    .profil-bg {
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
                            <a href="/profil">
                            <img src="/assets/img/icons/user-icon.png" class="bg-primary p-3" alt=""
                                style="border-radius: 10px;">
                            </a>
                        </div>
                        <div class="col-8">
                            <p class="info-sidebar mb-0">Nama: {{ auth()->user()->name }}</p>
                            <p class="info-sidebar mb-0">No. Kakitangan: {{ auth()->user()->no_kakitangan }}</p>
                        </div>                
        </div>

        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <div class="d-flex align-items-center nav-link-side">
                    <span class="px-0">Dashboard</span>
                </div>
            </a>
        </li>

        @permission('profil')  
        <li class="nav-item">
            <a class="nav-link" href="/profil">
                <div class="d-flex align-items-center nav-link-side">
                    <span class="px-0">Profil</span>
                </div>
            </a>
        </li>
        @endpermission

        @permission('senaraiPengguna')  
        {{-- @role('pentadbir|sekretariat')   --}}
        <li class="nav-item">
            <a class="nav-link" href="/senaraiPengguna">
                <div class="d-flex align-items-center nav-link-side">
                    <span class="px-0">Senarai Pengguna</span>
                </div>
            </a>
        </li>
        {{-- @endrole --}}
        @endpermission

        @permission('laporan')  
        {{-- @role('pentadbir|pengurusan-atasan|sekretariat|ketua-pasukan|penolong-ketua-pasukan') --}}
        <li class="nav-item">
            <a class="nav-link" href="/laporan">
                <div class="d-flex align-items-center nav-link-side">
                    <span class="px-0">Laporan</span>
                </div>
            </a>
        </li>  
        {{-- @endrole --}}
        @endpermission


        @permission('projek')  
        {{-- @role('pentadbir|pengurusan-atasan|pengguna|sekretariat|ketua-pasukan|pemudah-cara|penilai|ketua-validasi|pasukan-validasi|ketua-penilai|ketua-pemudah-cara|penolong-ketua-pasukan') --}}
        {{-- @if($user_role->hasRole('ketua-pasukan|pemudah-cara|penilai|ketua-validasi|pasukan-validasi|ketua-penilai|ketua-pemudah-cara'))   --}}
        <li class="nav-item">
            <a class="nav-link" href="/projek">
                <div class="d-flex align-items-center nav-link-side">
                    <span class="px-0">Projek</span>
                </div>
            </a>
        </li>
        {{-- @endif --}}
        {{-- @endrole --}}
        @endpermission

        @permission('manual')  
        <li class="nav-item">
            <a class="nav-link" href="/manual">
                <div class="d-flex align-items-center nav-link-side">
                    <span class="px-0">Manual & Standard</span>
                </div>
            </a>
        </li>
        @endpermission

        @permission('hebahan')  
        <li class="nav-item">
            <a class="nav-link" href="/hebahan">
                <div class="d-flex align-items-center nav-link-side">
                    <span class="px-0">Hebahan</span>
                </div>
            </a>
        </li>
        @endpermission

        @permission('faq')  
        {{-- @role('pengurusan-atasan')  --}}
        <li class="nav-item">
            <a class="nav-link" href="/faq">
                <div class="d-flex align-items-center nav-link-side">
                    <span class="px-0">FAQ</span>
                </div>
            </a>
        </li>
        {{-- @endrole --}}
        @endpermission

        @permission('maklumbalas')  
        <li class="nav-item">
            <a class="nav-link" href="/maklumbalas">
                <div class="d-flex align-items-center nav-link-side">
                    <span class="px-0">Maklum Balas</span>
                </div>
            </a>
        </li>
        @endpermission

        @permission('selenggara')  
        {{-- @role('pentadbir|sekretariat')   --}}
        <li class="nav-item">
            <a class="nav-link" href="/selenggara">
                <div class="d-flex align-items-center nav-link-side">
                    <span class="px-0">Selenggara</span>
                </div>
            </a>
        </li>              
        {{-- @endrole      --}}
        @endpermission
        
        @permission('cubaan')  
        <li class="nav-item">
            <a class="nav-link" href="/selenggara">
                <div class="d-flex align-items-center nav-link-side">
                    <span class="px-0">Cubaan 1</span>
                </div>
            </a>
        </li>              
        @endpermission
        @permission('cubaan2')  
        <li class="nav-item">
            <a class="nav-link" href="/selenggara">
                <div class="d-flex align-items-center nav-link-side">
                    <span class="px-0">Cubaan 2</span>
                </div>
            </a>
        </li>              
        @endpermission
        @permission('cubaan3')  
        <li class="nav-item">
            <a class="nav-link" href="/selenggara">
                <div class="d-flex align-items-center nav-link-side">
                    <span class="px-0">Cubaan 3</span>
                </div>
            </a>
        </li>              
        @endpermission
        

        </ul>

        </li>
        </ul>
    </div>
    </div>
</nav>
