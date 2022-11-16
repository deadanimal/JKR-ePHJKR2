@extends('layouts.app')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <nav style="--falcon-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%23748194'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/profil" class="text-secondary">Paparan Profil</a>
                    </li>
                    <li class="breadcrumb-item text-dark-green-jkr" style="font-weight: 700" aria-current="page">
                        Kemaskini Profil
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h3 class="mb-0 text-primary"><strong>Profil Pengguna</strong></h3>
        </div>
    </div>

    <hr class="text-primary mb-3">

    <div class="row mt-4 mb-3">
        <div class="col">
            <form action="/profil/simpan_kemaskini/{{$pengguna->id}}" method="post">
                @method('PUT')
                @csrf
                <div class="row mx-4">
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Nama:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="name" value="{{ $pengguna->name }}" />
                    </div>
    
                    <div class="col-3 mb-2">
                        <label class="col-form-label">e-Mel Pengguna:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="email" value="{{ $pengguna->email }}" />
                    </div>
    
                    <div class="col-3 mb-2">
                        <label class="col-form-label">No. Telefon Bimbit:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="telNo" value="{{ $pengguna->telNo}}" />
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">No. Fax:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="faxNo" value="{{ $pengguna->faxNo}}" />
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
                        <label class="col-form-label">Daerah:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <select name="daerah" id="stateSel" size="1" class="form-select form-control" aria-label="Default select example" >
                            <option selected>Pilih daerah</option>  
                        </select>
                    </div>
    
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Nama Syarikat:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" id="districtSel" name="nama_syarikat" value="{{ $pengguna->nama_syarikat }}" />
                    </div>
    
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Nama Cawangan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="nama_cawangan" value="{{ $pengguna->nama_cawangan }}" />
                    </div>
    
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Alamat Syarikat:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="alamat_syarikat" value="{{ $pengguna->alamat_syarikat }}" />
                    </div>
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Password:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" type="password" name="password"/>
                    </div>

                    @role('ketua-pasukan|penolong-ketua-pasukan|pemudah-cara|penilai|ketua-penilai|ketua-validasi|pasukan-validasi|ketua-pemudah-cara')
                    <div class="col-10 text-end">
                        <a href="/profil/tukar_peranan2/{{$pengguna->id}}" class="text-primary">Penukaran Peranan</a>
                    </div>
                    @endrole
    
                    <div class="col-3 mb-2">
                        
                    </div>
                    <div class="col-7 mb-2">
                        <div class="row mt-4">
                            <div class="col-6">
                                <a href="/profil" class="btn btn-outline-primary">Batal</a>
                            </div>
                            <div class="col-6 text-end">
                                <button type="submit" class="btn btn-primary">Simpan Kemaskini</button>
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
