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
                            <input type="text" name="name" class="form-control">
                        </div>
                        {{-- <div class="col-3">
                            <label>Peranan Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="perananPengguna" class="form-control">
                        </div> --}}
                        <div class="col-3">
                            <label>No. Kad Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="number" name="icPengguna" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>E-mel Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>No. Tel Bimbit Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="number" name="telNo" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>No. Fax Bimbit Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="number" name="faxNo" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>Nama Syarikat:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="nama_syarikat" id="districtSel" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>Alamat Syarikat:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="alamat_syarikat" class="form-control">
                        </div>

                        <div class="col-3">
                            <label>Negeri:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <select name="negeri" id="countySel" size="1" class="form-select form-control" aria-label="Default select example" >
                                <option selected>Pilih negeri</option> 
                            </select>
                        </div>

                        <div class="col-3">
                            <label>Daerah:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <select name="daerah" id="stateSel" size="1" class="form-select form-control" aria-label="Default select example" >
                                <option selected>Pilih daerah</option>
                            </select>
                        </div>

                        <div class="col-3">
                            <label>Kata Laluan:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>Pengesahan Kata Laluan:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        {{-- <div class="col-3">
                            <label>Sijil Kompeten:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="sijilKompeten" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>Kelayakan Akademik:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="kelayakanAkademik" class="form-control">
                        </div> --}}
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
    <script>
        var stateObject = {
        "Selangor": { "shah alam": ["111111"],"Puncak alam": ["222222"],"denai": ["333333"],"subang": ["444444"],"sepang": ["11111"]
        },
        "Kelantan": {
        "kota baharu": ["16000"],
        "perupok": ["16001"],
        "pasir mas": ["16002"],
        "wakaf baharu": ["16003"],
        "bachok": ["16004"],
        }, 
        "Johor": {
        "johor baharu": ["16000"],
        "batu pahat": ["16001"],
        "kluang": ["16002"],
        "skudai": ["16003"],
        "muar": ["16004"],
        }, 
        "Terengganu": {
        "kuala terengganu": ["16000"],
        "dungun": ["16001"],
        "berang": ["16002"],
        "kemaman": ["16003"],
        "ketereh": ["16004"],
        }, 
        "Melaka": {
        "jasin": ["16000"],
        "alor gajah": ["16001"],
        "bukit katil": ["16002"],
        "klebang": ["16003"],
        "ayer keroh": ["16004"],
        }, 
        "Pahang": {
        "kuantan": ["16000"],
        "pekan": ["16001"],
        "gambang": ["16002"],
        "jerantut": ["16003"],
        "temerloh": ["16004"],
        },
        "Perak": {
        "kuantan": ["16000"],
        "pekan": ["16001"],
        "gambang": ["16002"],
        "jerantut": ["16003"],
        "temerloh": ["16004"],
        },
        "WP Labuan": {
        "kuantan": ["16000"],
        "pekan": ["16001"],
        "gambang": ["16002"],
        "jerantut": ["16003"],
        "temerloh": ["16004"],
        },
        "Negeri Sembilan": {
        "kuantan": ["16000"],
        "pekan": ["16001"],
        "gambang": ["16002"],
        "jerantut": ["16003"],
        "temerloh": ["16004"],
        },
        "WP KL": {
        "kuantan": ["16000"],
        "pekan": ["16001"],
        "gambang": ["16002"],
        "jerantut": ["16003"],
        "temerloh": ["16004"],
        },
        "WP Putrajaya": {
        "kuantan": ["16000"],
        "pekan": ["16001"],
        "gambang": ["16002"],
        "jerantut": ["16003"],
        "temerloh": ["16004"],
        },
        "Pulau Pinang": {
        "kuantan": ["16000"],
        "pekan": ["16001"],
        "gambang": ["16002"],
        "jerantut": ["16003"],
        "temerloh": ["16004"],
        },
        "Kedah": {
        "kuantan": ["16000"],
        "pekan": ["16001"],
        "gambang": ["16002"],
        "jerantut": ["16003"],
        "temerloh": ["16004"],
        },
        "Perlis": {
        "kuantan": ["16000"],
        "pekan": ["16001"],
        "gambang": ["16002"],
        "jerantut": ["16003"],
        "temerloh": ["16004"],
        },
        "Sabah": {
        "kuantan": ["16000"],
        "pekan": ["16001"],
        "gambang": ["16002"],
        "jerantut": ["16003"],
        "temerloh": ["16004"],
        },
        "Sarawak": {
        "kuantan": ["16000"],
        "pekan": ["16001"],
        "gambang": ["16002"],
        "jerantut": ["16003"],
        "temerloh": ["16004"],
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