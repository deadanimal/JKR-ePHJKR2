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