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
                    <li class="breadcrumb-item">
                        <a href="/profil/edit"
                            class="text-secondary">Kemaskini Profil</a>
                    </li>
                    <li class="breadcrumb-item text-dark-green-jkr" style="font-weight: 700" aria-current="page">
                        Penukaran Peranan
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h3 class="mb-0 text-primary"><strong>Penukaran Peranan</strong></h3>
        </div>
    </div>

    <hr class="text-primary mb-3">

    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table datatable table-striped" style="width:100%">
                        <thead class="bg-primary">
                            <tr>
                                <th class="sort">Bil.</th>
                                <th class="sort">Nama Projek</th>
                                <th class="sort">Peranan</th>
                                <th class="sort">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($lantikans as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->projek->nama }}</td>
                                    <td>{{ $p->role->name }}</td>
                                    <td>
                                        <div class="col">
                                            <div class="col-auto">
                                                <form action="/profil/simpan_tukar_peranan/{{ $p->id }}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <button name="name" value="7" type="submit"
                                                    class="btn btn-primary">Ubah Penilai</button>
                                                </form>
                                            </div>
                                            <div class="col-auto">
                                                <form action="/profil/simpan2_tukar_peranan/{{ $p->id }}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <button name="name" value="6" type="submit"
                                                    class="btn btn-primary">Ubah Pemudah-cara</button>
                                                </form>
                                            </div>
                                            <div class="col-auto">
                                                <form action="/profil/simpan3_tukar_peranan/{{ $p->id }}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <button name="name" value="10" type="submit"
                                                    class="btn btn-primary">Ubah Pasukan-validasi</button>
                                                </form>
                                            </div>
                                        </div> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
