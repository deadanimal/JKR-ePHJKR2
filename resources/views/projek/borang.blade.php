@extends('layouts.app')
@section('content')
<div class="row mt-4 mb-3">
        <div class="col">
            <form action="/projek" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mx-4">
   

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Nama:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="nama" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Alamat:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="alamat" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Negeri:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <select name="negeri" id="countySel" size="1" class="form-select form-control" aria-label="Default select example" >
                            <option selected>Pilih negeri</option>
                            
                        </select>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Bandar:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <select name="bandar" id="stateSel" size="1" class="form-select form-control" aria-label="Default select example" >
                            <option selected>Pilih bandar</option>
                            
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
                        <select class="form-select" aria-label="Default select example" name="jenisProjek">
                            <option value="Kerajaan">Kerajaan</option>
                            <option value="Swasta">Swasta</option>
                        </select>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Kategori:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <select class="form-select" name="kategori">
                            <option value="phJKR Bangunan Baru A">phJKR Bangunan Baru A</option>
                            <option value="phJKR Bangunan Baru B">phJKR Bangunan Baru B</option>
                            <option value="phJKR Bangunan Baru C">phJKR Bangunan Baru C</option>
                            <option value="phJKR Bangunan Baru D">phJKR Bangunan Baru D</option>                            
                            <option value="phJKR Bangunan PUN A">phJKR Bangunan PUN A</option>
                            <option value="phJKR Bangunan PUN B">phJKR Bangunan PUN B</option>
                            <option value="phJKR Bangunan PUN C">phJKR Bangunan PUN C</option>
                            <option value="phJKR Bangunan PUN D">phJKR Bangunan PUN D</option>
                            <option value="phJKR Bangunan Sediaada A">phJKR Bangunan Sediaada A</option>
                            <option value="phJKR Bangunan Sediaada B">phJKR Bangunan Sediaada B</option>
                            <option value="phJKR Bangunan Sediaada C">phJKR Bangunan Sediaada C</option>
                            <option value="phJKR Bangunan Sediaada D">phJKR Bangunan Sediaada D</option>                            
                            <option value="phJKR Jalan Baru">phJKR Jalan Baru</option>
                            <option value="phJKR Jalan Lama">phJKR Jalan Lama</option>
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

        //untuk test 2 pilihan
        // var stateObject = {
        // "Selangor": ['shah alam','Puncak alam','denai','subang'],
        // "Kelantan": ['kota baharu','perupok','pasir mas','wakaf baharu','bachok']
        // }

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
        //test utk 2 pilihan
        // window.onload = function () {
        // var negeriSel = document.getElementById("negeriSel"),
        // bandarSel = document.getElementById("bandarSel");
        // for (var negeri in stateObject) {
        // negeriSel.options[negeriSel.options.length] = new Option(negeri, negeri);
        // }
        // negeriSel.onchange(); // reset in case page is reloaded
        // negeriSel.onchange = function () {
        // negeriSel.length = 1;
        // bandarSel.length = 1; // remove all options bar first
        // if (this.selectedIndex < 1) return; // done 
        // var bandar = stateObject[negeriSel.value][this.value];
        // for (var i = 0; i < bandar.length; i++) {
        // bandarSel.options[bandarSel.options.length] = new Option(bandar[i], bandar[i]);
        // }
        // }
        // }
    </script>

@endsection