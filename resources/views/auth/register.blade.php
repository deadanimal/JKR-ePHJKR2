@extends('layouts.landing-base')
@section('content')
    <div class="container mt-4">
        <div class="row text-orange">
            <div class="col text-center">
                DAFTAR AKAUN
                <hr class="text-orange">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <label>Nama Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        {{-- <div class="col-3">
                            <label>Peranan Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="perananPengguna" class="form-control">
                        </div> --}}
                        <div class="col-3">
                            <label>No. Kad Pengenalan Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            {{-- <input type="number" maxlength="12" name="icPengguna" class="form-control" placeholder="Contoh: 921110035305" required> --}}
                            <input type="text" class="form-control" name="icPengguna" placeholder=" e.g 000000000000"
                                    maxlength="12" size="12"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                        <div class="col-3">
                            <label>Emel Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-3">
                            <label>No. Tel Bimbit Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" class="form-control" name="telNo" placeholder=" e.g 00000000000"
                                    maxlength="11" size="11"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            {{-- <input type="number" name="telNo" class="form-control" maxlength="11" required> --}}
                        </div>
                        <div class="col-3">
                            <label>No. Fax Bimbit Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" class="form-control" name="faxNo" placeholder=" e.g 0000000000"
                                    maxlength="10" size="10"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            {{-- <input type="number" name="faxNo" class="form-control" maxlength="10" required> --}}
                        </div>
                        <div class="col-3">
                            <label>Nama Syarikat:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="nama_syarikat" id="districtSel" class="form-control" required>
                        </div>
                        <div class="col-3">
                            <label>Alamat Syarikat:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="alamat_syarikat" class="form-control" required>
                        </div>
                        <div class="col-3">
                            <label>Negeri:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <select name="negeri" id="countySel" size="1" class="form-select form-control" aria-label="Default select example" required>
                                <option selected>Pilih Negeri</option> 
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Daerah:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <select name="daerah" id="stateSel" size="1" class="form-select form-control" aria-label="Default select example" required>
                                <option selected>Pilih Daerah</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label>Kata Laluan:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input class="form-control" type="password" name="password" id="pswd1" required>
                        </div>
                        <div class="col-3">
                            <label>Pengesahan Kata Laluan:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input class="form-control" type="password" name="password_confirmation" id="pswd2" required>
                            <p id="validate-status"></p>
                        </div>
                        
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-9">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-orange">Hantar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!--JavaScript-->
<!--Negeri & Bandar-->
<script>
    var stateObject = {
    "Selangor": { "Petaling": ["111111"],"Hulu Langat": ["222222"],"Klang": ["333333"],"Gombak": ["444444"],"Kuala Langat": ["11111"],"Sepang": ["11111"],"Kuala Selangor": ["11111"],"Hulu Selangor": ["11111"],"Sabak Bernam": ["11111"]
    },
    "Kelantan": { "Kota Bharu": ["111111"],"Pasir Mas": ["222222"],"Tumpat": ["333333"],"Bachok": ["444444"],"Tanah Merah": ["11111"],"Pasir Puteh": ["11111"],"Kuala Krai": ["11111"],"Machang": ["11111"],"Gua Musang": ["11111"],"Jeli": ["11111"]
    }, 
    "Johor": { "Johor Bahru": ["111111"],"Batu Pahat": ["222222"],"Kluang": ["333333"],"Kulai Jaya": ["444444"],"Muar": ["11111"],"Kota Tinggi": ["11111"],"Segamat": ["11111"],"Pontian": ["11111"],"Ledang": ["11111"],"Mersing": ["11111"]
    }, 
    "Terengganu": { "Kuala Terengganu": ["111111"],"Kemaman": ["222222"],"Dungun": ["333333"],"Besut": ["444444"],"Marang": ["11111"],"Hulu Terengganu": ["11111"],"Setiu": ["11111"],"Kuala Nerus": ["11111"]
    }, 
    "Melaka": { "Melaka Tengah": ["111111"],"Alor Gajah": ["222222"],"Jasin": ["333333"]
    }, 
    "Pahang": { "Kuantan": ["111111"],"Temerloh": ["222222"],"Bentong": ["333333"],"Maran": ["444444"],"Rompin": ["11111"],"Bera": ["11111"],"Pekan": ["11111"],"Raub": ["11111"],"Jerantut": ["11111"],"Lipis": ["11111"],"Cameron Highlands": ["11111"]
    }, 
    "Perak": { "Kinta": ["111111"],"Larut": ["222222"],"Matang": ["333333"],"Manjung": ["444444"],"Hilir Perak": ["11111"],"Kerian": ["11111"],"Batang Padang": ["11111"],"Kuala Kangsar": ["11111"],"Perak Tengah": ["11111"],"Hulu Perak": ["11111"],"Kampar": ["11111"],"Selama": ["11111"]
    }, 
    "Wilayah Persekutuan Labuan": { "Labuan": ["111111"]
    },
    "Wilayah Persekutuan Kuala Lumpur": { "Bukit Bintang": ["111111"],"Bandar Tun Razak": ["111111"],"Cheras": ["111111"],"Setiawangsa": ["111111"],"Kepong": ["111111"],"Lembah Pantai": ["111111"],"Batu": ["111111"],"Seputeh": ["111111"],"Segambut": ["111111"],"Titiwangsa": ["111111"],"Wangsa Maju": ["111111"],
    },
    "Wilayah Persekutuan Putrajaya": { "Putrajaya": ["111111"]
    },
    "Pulau Pinang": { "Timur Laut Pulau Pinang": ["111111"],"Seberang Perai Tengah": ["222222"],"Seberang Perai Utara": ["222222"],"Barat Daya Pulau Pinang": ["222222"],"Seberang Perai Selatan": ["222222"]
    },
    "Kedah": { "Kuala Muda": ["111111"],"Kota Setar": ["222222"],"Kulim": ["222222"],"Kubang Pasu": ["222222"],"Baling": ["222222"],"Langkawi": ["222222"],"Yan": ["222222"],"Sik": ["222222"],"Padang Terap": ["222222"],"Pokok Sena": ["222222"],"Pendang": ["222222"],"Bandar Baharu": ["222222"]
    },
    "Perlis": { "Perlis": ["111111"]
    },
    "Sabah": { "Kota Kinabalu": ["111111"],"Tawau": ["222222"],"Sandakan": ["222222"],"Lahad Datu": ["222222"],"Keningau": ["222222"],"Kinabatangan": ["222222"],"Semporna": ["222222"],"Papar": ["222222"],"Penampung": ["222222"],"Beluran": ["222222"],"Tuaran": ["222222"],"Ranau": ["222222"],
    "Kota Belud": ["222222"],"Kudat": ["222222"],"Kota Marudu": ["222222"],"Beaufort": ["222222"],"Kunak": ["222222"],"Tenom": ["222222"],"Putatan": ["222222"],"Pitas": ["222222"],"Tambunan": ["222222"],"Tongod": ["222222"],"Sipitang": ["222222"],"Nabawan": ["222222"],"Kuala Penyu": ["222222"]
    },
    "Sarawak": { "Kuching": ["111111"],"Miri": ["222222"],"Sibu": ["222222"],"Bintulu": ["222222"],"Serian": ["222222"],"Kota Samarahan": ["222222"],"Sri Aman": ["222222"],"Marudi": ["222222"],"Betong": ["222222"],"Sarikei": ["222222"],"Kapit": ["222222"],"Bau": ["222222"],"Limbang": ["222222"],
    "Saratok": ["222222"],"Mukah": ["222222"],"Simunjan": ["222222"],"Lawas": ["222222"],"Belaga": ["222222"],"Lundu": ["222222"],"Asajaya": ["222222"],"Daro": ["222222"],"Tatau": ["222222"],"Maradong": ["222222"],"Kanowit": ["222222"],"Lubok Antu": ["222222"],"Selangau": ["222222"],
    "Song": ["222222"],"Dalat": ["222222"],"Matu": ["222222"],"Julau": ["222222"],"Pakan": ["222222"],"Tanjung Manis": ["222222"],"Bukit Mabong": ["222222"],"Telang Usan": ["222222"],"Tebedu": ["222222"],"Subis": ["222222"],"Sebauh": ["222222"],"Marudi": ["222222"],"Beluru": ["222222"],
    "Kabong": ["222222"],"Gedong": ["222222"],"Siburan": ["222222"],"Pantu": ["222222"],"Lingga": ["222222"],"Sebuyau": ["222222"]
    },
    "Negeri Sembilan": { "Seremban": ["111111"],"Port Dickson": ["111111"],"Jempol": ["111111"],"Tampin": ["111111"],"Kuala Pilah": ["111111"],"Rembau": ["111111"],"Jelebu": ["111111"]
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

<!--Password Confirmation Validation-->
<script>
    $(document).ready(function() {
    $("#pswd2").keyup(validate);  
    });


    function validate() {
    var pswd1 = $("#pswd1").val();
    var pswd2 = $("#pswd2").val();

    
 
    if(pswd1 == pswd2) {
       $("#validate-status").text("**Kata Laluan Sepadan");        
    }
    else {
        $("#validate-status").text("**Kata Laluan Tidak Sepadan");  
    }
    
}

</script>
@endsection