@extends('layouts.app')
@section('content')

<div class="header">
    <b class="text-dark-green-jkr">Projek Baharu</b>

<h1 class="jkr-header-title">
    Penambahan Projek
</h1>
<hr class="line-horizontal-jkr">

</div>
<div class="row mt-4 mb-3">
        <div class="col">
            <form action="/projek" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mx-4">
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Nama Projek:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="nama" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Alamat Projek:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="alamat" type="text" required/>
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
                        <label class="col-form-label">Bandar:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <select name="bandar" id="stateSel" size="1" class="form-select form-control" aria-label="Default select example" >
                            <option selected>Pilih Bandar</option>
                            
                        </select>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Poskod:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" id="districtSel" name="poskod" type="number" required/>
                        {{-- <select name="poskod" id="districtSel" size="1" class="form-select form-control" aria-label="Default select example" >
                            <option selected>Pilih Poskod</option>
                            
                        </select> --}}
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Keluasan Tapak:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="keluasanTapak" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Jumlah Blok Bangunan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="jumlahBlokBangunan" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Tarikh Jangka Mula Pembinaan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="tarikhJangkaMulaPembinaan" type="date" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Tarikh Jangka Siap Pembinaan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="tarikhJangkaSiapPembinaan" type="date" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Kaedah Pelaksanaan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="kaedahPelaksanaan" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Jenis Perolehan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="jenisPerolehan" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Kos Projek:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="kosProjek" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Jenis Projek:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <select class="form-select" aria-label="Default select example" name="jenisProjek" required>
                            <option value="Kerajaan">Kerajaan</option>
                            <option value="Swasta">Swasta</option>
                        </select>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Kategori:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <select class="form-select" name="kategori" required>
                            <option value="phJKR Bangunan Baru A">phJKR Bangunan Baru A</option>
                            <option value="phJKR Bangunan Baru B">phJKR Bangunan Baru B</option>
                            <option value="phJKR Bangunan Baru C">phJKR Bangunan Baru C</option>
                            <option value="phJKR Bangunan Baru D">phJKR Bangunan Baru D</option>                            
                            <option value="phJKR Bangunan PUN A">phJKR Bangunan PUN A</option>
                            <option value="phJKR Bangunan PUN B">phJKR Bangunan PUN B</option>
                            <option value="phJKR Bangunan PUN C">phJKR Bangunan PUN C</option>
                            <option value="phJKR Bangunan PUN D">phJKR Bangunan PUN D</option>
                            <option value="phJKR Bangunan Sedia Ada A">phJKR Bangunan Sedia Ada A</option>
                            <option value="phJKR Bangunan Sedia Ada B">phJKR Bangunan Sedia Ada B</option>
                            <option value="phJKR Bangunan Sedia Ada C">phJKR Bangunan Sedia Ada C</option>
                            <option value="phJKR Bangunan Sedia Ada D">phJKR Bangunan Sedia Ada D</option>                            
                            <option value="phJKR Jalan Baru">phJKR Jalan Baru</option>
                            <option value="phJKR Jalan Naiktaraf">phJKR Jalan Naiktaraf</option>
                            <option value="GPSS Bangunan 1">GPSS Bangunan 1</option>
                            <option value="GPSS Bangunan 2">GPSS Bangunan 2</option>
                            <option value="GPSS Bangunan 3">GPSS Bangunan 3</option>
                            <option value="GPSS Jalan">GPSS Jalan</option>
                        </select>
                    </div>

                    <div class="col-3 mb-2">
                        
                    </div>
                    <div class="col-7 mb-2">
                        <div class="row mt-4">
                            <div class="col-6">
                                <a href="/pengurusan_maklumat/senarai_pengguna" class="btn btn-outline-primary">Batal</a>
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


<!--JavaScript-->
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