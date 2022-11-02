@extends('layouts.app')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <nav style="--falcon-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%23748194'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-dark-green-jkr" style="font-weight: 700" aria-current="page">
                        Senarai Pengguna
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3 class="mb-0 text-primary"><strong>SENARAI PENGGUNA</strong></h3>
        </div>
    </div>

    <hr class="text-primary">

    <div class="row mt-3">
        <div class="col text-end">
            <a href='profil/senaraiPengguna/senarai_tukar_peranan' class="btn btn-primary">senarai tukar peranan</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col text-end">
            <a href="/senarai_pengguna/create" class="btn btn-primary">Tambah</a>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table datatable table-striped" style="width:100%">
                        <thead class="bg-primary">
                            <tr>
                                <th class="sort">Bil.</th>
                                <th class="sort">Nama Pengguna</th>
                                <th class="sort">Nama Syarikat</th>
                                <th class="sort">Nama Cawangan</th>
                                <th class="sort">Nama Negeri</th>
                                <th class="sort">Nama Peranan</th>
                                <th class="sort">Status Pengguna</th>
                                <th class="sort">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($pengguna as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->namaSyarikat }}</td>
                                    <td>{{ $p->namaCawangan }}</td>
                                    <td>{{ $p->negeri }}</td>
                                    <td></td>
                                    <td>
                                        <div
                                            class="col-auto mb-2 px-0"
                                            style="border: 1px solid #F4A258; box-shadow: inset 2px 2px 5px 2px lightgrey; background-color: white; z-index: 2; border-radius:5px;">
                                            
                                                {{-- <button class="btn btn-orange-jkr" type="button">LULUS</button> --}}
                                            
                                                <button class="btn btn-final" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#lulus">Active</button>
                                            
                                                
                                            
                                                {{-- <button class="btn btn-orange-jkr" type="button">GAGAL</button> --}}
                                            
                                                <button class="btn btn-final" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#gagal">Inactive</button>
                                            

                                        </div>
                                    </td>
                                    <td>
                                        <a href="/pengurusan_maklumat/senarai_pengguna/{{ $p->id }}/edit"
                                            class="btn btn-sm btn-primary">Kemaskini</a>

                                        <a href="senarai_pengguna/pengguna_disembunyi/{{ $p->id }}"
                                            class="mt-2 btn btn-sm btn-primary">Sembunyi</a>
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
