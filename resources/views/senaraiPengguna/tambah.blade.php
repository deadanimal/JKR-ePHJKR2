@extends('layouts.app')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <nav style="--falcon-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%23748194'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/senarai_pengguna" class="text-secondary">Senarai Pengguna</a>
                    </li>
                    <li class="breadcrumb-item text-dark-green-jkr" style="font-weight: 700" aria-current="page">
                        Tambah Pengguna
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h3 class="mb-0 text-primary"><strong>Senarai Pengguna</strong></h3>
        </div>
    </div>

    <hr class="text-primary mb-3">

    <div class="row mt-4 mb-3">
        <div class="col">
            <form action="/senaraiPengguna/cipta_pengguna" method="post">
                @csrf
                <div class="row mx-4">
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Nama:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="name"/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Peranan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <select class="form-select form-control" name="nama">
                            <option selected disabled="">Sila Pilih</option>
                            <option value="pengurusan-atasan">Pengurusan Atasan</option>
                            <option value="sekretariat">Sekretariat</option>
                            <option value="ketua-pasukan">Ketua Pasukan</option>
                            <option value="penolong-ketua-pasukan">Penolong Ketua Pasukan</option>
                            <option value="pemudah-cara">Pemudah Cara</option>                            
                            <option value="penilai">Penilai</option>
                            <option value="pasukan-validasi">Pasukan Validasi</option>
                        </select>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">No. Kad Pengenalan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="icPengguna" />
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Emel Pengguna:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="email"/>
                    </div>
                    
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Nama Syarikat:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="nama_Syarikat"/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Alamat Syarikat:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="alamat_Syarikat" />
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Negeri:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <select name="negeri" id="countySel" size="1" class="form-select form-control" aria-label="Default select example" >
                            <option selected>Pilih Negeri</option>
                        </select>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Daerah:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <select name="daerah" id="stateSel" size="1" class="form-select form-control" aria-label="Default select example" >
                            <option selected>Pilih Bandar</option>  
                        </select>
                    </div>
    
                    <div class="col-3 mb-2">
                        <label class="col-form-label">No. Telefon Bimbit:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" id="districtSel" name="telNo" />
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">No. Fax:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="faxNo" />
                    </div>


                    <div class="col-3 mb-2">
                        <label class="col-form-label">Kata Laluan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="password"/>
                    </div>
    
    
                    <div class="col-3 mb-2">
                        
                    </div>
                    <div class="col-7 mb-2">
                        <div class="row mt-4">
                            <div class="col-6">
                                <a href="/senarai_pengguna" class="btn btn-outline-primary">Batal</a>
                            </div>
                            <div class="col-6 text-end">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        var stateObject = {
        "Selangor": { "Subang Jaya": ["111111"],"Klang": ["222222"],"Ampang Jaya": ["333333"],"Shah Alam": ["444444"],"Petaling Jaya": ["11111"],"Cheras": ["11111"],"Kajang": ["11111"],"Selayang": ["11111"],"Rawang": ["11111"],"Taman Greenwood": ["11111"],"Semenyih": ["11111"],"Banting": ["11111"],"Balakong": ["11111"],"Gombak Setia": ["11111"],"Kuala Selangor": ["11111"]
        ,"Serendah": ["11111"],"Bukit Beruntung": ["11111"],"Pengkalan Kundang": ["11111"],"Jenjarom": ["11111"],"Sungai Besar": ["11111"],"Batu Arang": ["11111"],"Tanjung Sepat": ["11111"],"Kuang": ["11111"],"Kuala Kubu Baharu": ["11111"],"Batang Berjuntai": ["11111"],"Bandar Baru Salak Tinggi": ["11111"],"Sekinchan": ["11111"],"Sabak": ["11111"],"Tanjung Karang": ["11111"]
        ,"Tanjung Karang": ["11111"],"Beranang": ["11111"],"Sungai Pelek": ["11111"]
        },
        "Kelantan": { "Kota Bharu": ["111111"],"Pengkalan Kubor": ["222222"],"Tanah Merah": ["333333"],"Peringat": ["444444"],"Wakaf Bharu": ["11111"],"Kadok": ["11111"],"Pasir Mas": ["11111"],"Gua Musang": ["11111"],"Kuala Krai": ["11111"],"Tumpat": ["11111"]
        }, 
        "Johor": { "Johor Bahru": ["111111"],"Terbau": ["222222"],"Pasir Gudang": ["333333"],"Bukit Indah": ["444444"],"Skudai": ["11111"],"Kluang": ["11111"],"Batu Phat": ["11111"],"Muar": ["11111"],"Ulu Tiram": ["11111"],"Senai": ["11111"],"Segamat": ["11111"],"Kulai": ["11111"],"Kota Tinggi": ["11111"],"Pontian Kechil": ["11111"],"Tangkak": ["11111"]
        ,"Bukit Bakri": ["11111"],"Yong Peng": ["11111"],"Pekan Nenas": ["11111"],"Labis": ["11111"],"Mersingr": ["11111"],"Simpang Renggam": ["11111"],"Parit Raja": ["11111"],"Kepala Sawit": ["11111"],"Buloh Kasap": ["11111"],"Chaah": ["11111"]
        }, 
        "Terengganu": { "Kuala Terengganu": ["111111"],"Chukai": ["222222"],"Dungun": ["333333"],"Kerteh": ["444444"],"Kuala Berang": ["11111"],"Marang": ["11111"],"Paka": ["11111"],"Jerteh": ["11111"]
        }, 
        "Melaka": { "Bandaraya Melaka": ["111111"],"Bukit Baru": ["222222"],"Ayer Keroh": ["333333"],"Klebang": ["444444"],"Masjid Tanah": ["11111"],"Sungai Udang": ["11111"],"Batu Berendam": ["11111"],"Alor Gajah": ["11111"],"Bukit Rambai": ["11111"],"Ayer Molek": ["11111"],"Bemban": ["11111"],"Kuala Sungai Baru": ["11111"],"Pulau Sebang": ["11111"]
        }, 
        "Pahang": { "Kuantan": ["111111"],"Temerloh": ["222222"],"Bentong": ["333333"],"Mentakab": ["444444"],"Raub": ["11111"],"Jerantut": ["11111"],"Pekan": ["11111"],"Kuala Lipis": ["11111"],"Bandar Jengka": ["11111"],"Bukit Tinggi": ["11111"]
        }, 
        "Perak": { "Ipoh": ["111111"],"Taiping": ["222222"],"Sitiawan": ["333333"],"Simpang Empat": ["444444"],"Teluk Intan": ["11111"],"Batu Gajah": ["11111"],"Lumut": ["11111"],"Kampung Koh": ["11111"],"Kuala Kangsar": ["11111"],"Sungai Siput": ["11111"],"Tapah": ["11111"],"Bidor": ["11111"],"Parit Buntar": ["11111"],"Ayer Tawar": ["11111"],"Bagan Serai": ["11111"],"Tanjung Malim": ["11111"],"Lawan Kuda Baharu": ["11111"],"Pantai Remis": ["11111"],"Kampar": ["11111"],"Kampung Gajah": ["11111"]
        }, 
        "WP Labuan": { "Bandar Labuan": ["111111"]
        },
        "Negeri Sembilan": { "Seremban": ["111111"],"Port Dickson": ["222222"],"Nilai": ["222222"],"Bahau": ["222222"],"Tampin": ["222222"],"Kuala Pilah": ["222222"]
        },
        "WP Kuala Lumpur": { "Bandar Kuala Lumpur": ["111111"]
        },
        "WP Persekutuan": { "Putrajaya": ["111111"]
        },
        "Pulai Pinang": { "Bukit Mertajam": ["111111"],"Georgetown": ["222222"],"Sungai Ara": ["222222"],"Gelugor": ["222222"],"Air Itam": ["222222"],"Butterworth": ["222222"],"Perai": ["222222"],"Nibong Tebal": ["222222"],"Permatang Pauh": ["222222"],"Tanjung Tokong": ["222222"],"Kepala Batas": ["222222"],"Tanjung Bungah": ["222222"],"Juru": ["222222"]
        },
        "Kedah": { "Sungai Petani": ["111111"],"Alor Setar": ["222222"],"Kulim": ["222222"],"Jitra": ["222222"],"Baling": ["222222"],"Pendang": ["222222"],"Langkawi": ["222222"],"Yan": ["222222"],"Sik": ["222222"],"Kuala Nerang": ["222222"],"Pokok Sena": ["222222"],"Badar Baharu": ["222222"]
        },
        "Perlis": { "Kangar": ["111111"],"Arau": ["111111"],"Padang Besar": ["111111"]
        },
        "Sabah": { "Kota Kinabalu": ["111111"],"Sandakan": ["222222"],"Tawau": ["222222"],"Lahad Datu": ["222222"],"Keningau": ["222222"],"Putatan": ["222222"],"Donggongon": ["222222"],"Semporna": ["222222"],"Kudat": ["222222"],"Kunak": ["222222"],"Papar": ["222222"],"Ranau": ["222222"],"Beaufort": ["222222"],"Kinarut": ["222222"],"Kota Belud": ["222222"]
        },
        "Sarawak": { "Kuching": ["111111"],"Miri": ["222222"],"Sibu": ["222222"],"Bintulu": ["222222"],"Limbang": ["222222"],"Sarikei": ["222222"],"Sri Aman": ["222222"],"Kapit": ["222222"],"Batu Delapan Bazaar": ["222222"],"Kota Samarahan": ["222222"]
        },
        }

        window.onload = function () {
        var countySel = document.getElementById("countySel"),
        stateSel = document.getElementById("stateSel"),
        districtSel = document.getElementById("districtSel");
        for (var zon in stateObject) {
        countySel.options[countySel.options.length] = new Option(zon, zon);
        }
        countySel.onchange = function () {
        stateSel.length = 1; // remove all options bar first
        districtSel.length = 1; // remove all options bar first
        if (this.selectedIndex < 1) return; // done 
        for (var negeri in stateObject[this.value]) {
        stateSel.options[stateSel.options.length] = new Option(negeri, negeri);
        }
        }
        countySel.onchange(); // reset in case page is reloaded
        stateSel.onchange = function () {
        districtSel.length = 1; // remove all options bar first
        if (this.selectedIndex < 1) return; // done 
        var daerah = stateObject[countySel.value][this.value];
        for (var i = 0; i < daerah.length; i++) {
        districtSel.options[districtSel.options.length] = new Option(daerah[i], daerah[i]);
        }
        }
        }
    </script>

@endsection
