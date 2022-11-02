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
            <form action="/profil/{{$pengguna->id}}" method="post">
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
                        <input class="form-control" name="notelbimbitPengguna" value="{{ $pengguna->notelbimbitPengguna }}" />
                    </div>
    
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Nama Syarikat:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="namaSyarikat" value="{{ $pengguna->namaSyarikat }}" />
                    </div>
    
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Nama Cawangan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="namaCawangan" value="{{ $pengguna->namaCawangan }}" />
                    </div>
    
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Alamat Syarikat:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="alamatSyarikat" value="{{ $pengguna->alamatSyarikat }}" />
                    </div>

                    <div class="col-10 text-end">
                        <a href="/profil_pengguna/{{$pengguna->id}}/penukaran_peranan" class="text-primary">Penukaran Peranan</a>
                    </div>
    
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
@endsection
