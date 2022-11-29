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
                        <input class="form-control" name="name" value="{{ $pengguna->name }}" required/>
                    </div>
    
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Emel Pengguna:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="email" value="{{ $pengguna->email }}" required/>
                    </div>
    
                    <div class="col-3 mb-2">
                        <label class="col-form-label">No. Telefon Bimbit:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="telNo" value="{{ $pengguna->telNo}}" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">No. Fax:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="faxNo" value="{{ $pengguna->faxNo}}" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Nama Syarikat:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" id="districtSel" name="nama_syarikat" value="{{ $pengguna->nama_syarikat }}" required/>
                    </div>
    
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Nama Cawangan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="nama_cawangan" value="{{ $pengguna->nama_cawangan }}" required/>
                    </div>
    
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Alamat Syarikat:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="alamat_syarikat" value="{{ $pengguna->alamat_syarikat }}" required/>
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
                            <option selected>Pilih Daerah</option>  
                        </select>
                    </div>
    
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Kata Laluan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" type="password" name="password" required/>
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
        "Negeri Sembilan": { "Seremban": ["111111"],"Port Dickson": ["222222"],"Jempol": ["222222"],"Tampin": ["222222"],"Kuala Pilah": ["222222"],"Rembau": ["222222"],"Jelebu": ["222222"]
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
