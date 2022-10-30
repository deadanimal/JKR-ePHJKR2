@extends('layouts.app')

@section('content')

<div class="row mb-3">
    <div class="col">
        <nav style="--falcon-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%23748194'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-dark-green-jkr" style="font-weight: 700" aria-current="page">
                    Projek
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col">
        <h3 class="mb-0 text-primary"><strong>MYSKALA</strong></h3>
    </div>
</div>

<hr class="text-primary">

<div class="row mt-2">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive scrollbar">
                    <table class="table datatable table-striped" style="width:100%">
                        <thead class="bg-primary">
                            <tr>
                                <th class="sort">Rujukan Skala</th>
                                <th class="sort">Tajuk Projek</th>
                                <th class="sort">Lokasi Tapak</th>
                                <th class="sort">Kaedah Pelaksanaan</th>
                                <th class="sort">Jenis Perolehan</th>
                                <th class="sort">Penarafan Hijau</th>
                                <th class="sort">Status</th>
                                <th class="sort">Kategori Ibs</th>
                                <th class="sort">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            {{-- @foreach ($pendaftaran_projek as $pp) --}}
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    {{-- <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pp->rujukan_skala }}</td>
                                    <td>{{ $pp->tajuk_projek }}</td>
                                    <td>{{ $pp->lokasi_tapak }}</td>
                                    <td>{{ $pp->kaedah_pelaksanaan }}</td>
                                    <td>{{ $pp->jenis_perolehan }}</td>
                                    <td>{{ $pp->penafaran_hijau }}</td>
                                    <td>{{ $pp->Status }}</td>
                                    <td>{{ $pp->kategori_ibs }}</td> --}}
                                    <td>
                                        <div class="row">
                                            <div class="col-auto">
                                                <a href=""
                                                    class="btn btn-sm btn-primary">Daftar Projek Ke Sistem</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection