@extends('layouts.app')

@section('content')


    <div class="tab mt-1">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" href="#tab-1" data-bs-toggle="tab" role="tab">Pengguna</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab">Projek</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab" role="tab">Kriteria</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab-4" data-bs-toggle="tab" role="tab">Audit Log</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="tab-1" role="tabpanel">

                <div class="row">
                    <div class="col">
                        <h3 class="mb-0 text-primary"><strong>SELENGGARA PERANAN</strong></h3>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="col mb-">
                                    <h2 class="h2 mb-3">BORANG SELENGGARA PERANAN</h2>
                                </div>

                                <div class="col">
                                    <hr class="text-primary mb-3">

                                    <div class="row mt-4 mb-3">
                                        <div class="col">
                                            <form action="/selenggaraPengguna" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mx-4">
                                                    <div class="col-3 mb-2">
                                                        <label class="col-form-label">Nama Peranan Baru:</label>
                                                    </div>
                                                    <div class="col-7 mb-2">
                                                        <input class="form-control" name="nama" type="text" />
                                                    </div>

                                                    <div class="col-7 mb-2">
                                                        <div class="row mt-4">
                                                            <div class="col-6">
                                                                <a href="/manual" class="btn btn-outline-primary">Batal</a>
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Tambah</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="col mb-">
                                    <h2 class="h2 mb-3">SENARAI SELENGGARA PERANAN</h2>
                                </div>

                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table datatable table-striped" style="width:100%">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th class="sort">Bil.</th>
                                                            <th class="sort">Nama Peranan</th>
                                                            <th class="sort">Tindakan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white">

                                                        {{-- @foreach ($selenggara as $selenggaraPengguna) --}}
                                                        <tr>
                                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                                            {{-- <td>{{ $selenggaraPengguna->nama }}</td> --}}
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        {{-- <a href="/selenggaraPengguna/{{ $selenggaraPengguna->id }}/edit" 
                                                                        class="btn btn-sm btn-primary"><i
                                                                            {{-- class="fas fa-edit"></i></a> --}}
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        {{-- <form action="/selenggaraPengguna/{{ $selenggaraPengguna->id }}" method="post"> --}}
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-outline-primary"><i
                                                                                class="fas fa-trash-alt"></i></button>
                                                                        </form>
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="tab-2" role="tabpanel">
                <div class="row mb-3">
                    <div class="col">
                        <nav style="--falcon-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%23748194'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-dark-green-jkr" style="font-weight: 700"
                                    aria-current="page">
                                    Selenggara
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3 class="mb-0 text-primary"><strong>SELENGGARA PROJEK</strong></h3>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="col mb-">
                                    <h2 class="h2 mb-3">BORANG SELENGGARA PROJEK</h2>
                                </div>

                                <div class="col">
                                    <hr class="text-primary mb-3">

                                    <div class="row mt-4 mb-3">
                                        <div class="col">
                                            <form action="/selenggaraProjek" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mx-4">
                                                    <div class="col-3 mb-2">
                                                        <label class="col-form-label">Nama Status Projek Baru:</label>
                                                    </div>
                                                    <div class="col-7 mb-2">
                                                        <input class="form-control" name="status" type="text" />
                                                    </div>

                                                    <div class="col-7 mb-2">
                                                        <div class="row mt-4">
                                                            <div class="col-6">
                                                                <a href="/selenggaraProjek"
                                                                    class="btn btn-outline-primary">Batal</a>
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Tambah</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="col mb-">
                                    <h2 class="h2 mb-3">SENARAI SELENGGARA STATUS PROJEK</h2>
                                </div>

                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table datatable table-striped" style="width:100%">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th class="sort">Bil.</th>
                                                            <th class="sort">Nama Status Projek</th>
                                                            <th class="sort">Tindakan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white">

                                                        {{-- @foreach ($selenggara as $selenggaraProjek) --}}
                                                        <tr>
                                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                                            {{-- <td>{{ $selenggaraProjek->status }}</td> --}}
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        {{-- <a href="/selenggaraProjek/{{ $selenggaraProjek->id }}/edit" --}}
                                                                        class="btn btn-sm btn-primary"><i
                                                                            class="fas fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        {{-- <form action="/selenggaraProjek/{{ $selenggaraProjek->id }}" method="post"> --}}
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-outline-primary"><i
                                                                                class="fas fa-trash-alt"></i></button>
                                                                        </form>
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="tab-3" role="tabpanel">
                <div class="row mb-3">
                    <div class="col">
                        <nav style="--falcon-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%23748194'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-dark-green-jkr" style="font-weight: 700"
                                    aria-current="page">
                                    Selenggara
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3 class="mb-0 text-primary"><strong>SELENGGARA KRITERIA</strong></h3>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="col mb-">
                                    <h2 class="h2 mb-3">BORANG SELENGGARA KRITERIA</h2>
                                </div>

                                <div class="col">
                                    <hr class="text-primary mb-3">

                                    <div class="row mt-4 mb-3">
                                        <div class="col">
                                            <form action="/selenggaraKriteria" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mx-4">
                                                    <div class="col-3 mb-2">
                                                        <label class="col-form-label">Nama Kriteria:</label>
                                                    </div>
                                                    <div class="col-7 mb-2">
                                                        <input class="form-control" name="nama" type="text" />
                                                    </div>
                                                    <div class="col-3 mb-2">
                                                        <label class="col-form-label">Kod Kriteria:</label>
                                                    </div>
                                                    <div class="col-7 mb-2">
                                                        <input class="form-control" name="kod" type="text" />
                                                    </div>
                                                    <div class="col-3 mb-2">
                                                        <label class="col-form-label">Jenis Kriteria:</label>
                                                    </div>
                                                    <div class="col-7 mb-2">
                                                        <input class="form-control" name="jenis" type="text" />
                                                    </div>
                                                    <div class="col-3 mb-2">
                                                        <label class="col-form-label">Kategori Kriteria:</label>
                                                    </div>
                                                    <div class="col-7 mb-2">
                                                        <input class="form-control" name="kategori" type="text" />
                                                    </div>

                                                    <div class="col-7 mb-2">
                                                        <div class="row mt-4">
                                                            <div class="col-6">
                                                                <a href="/selenggaraKriteria"
                                                                    class="btn btn-outline-primary">Batal</a>
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Tambah</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="col mb-">
                                    <h2 class="h2 mb-3">SENARAI SELENGGARA KRITERIA BARU</h2>
                                </div>

                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table datatable table-striped" style="width:100%">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th class="sort">Bil.</th>
                                                            <th class="sort">Nama Kriteria</th>
                                                            <th class="sort">Jenis Kriteria</th>
                                                            <th class="sort">Kategori Kriteria</th>
                                                            <th class="sort">Tindakan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white">

                                                        {{-- @foreach ($selenggara as $selenggaraKriteria) --}}
                                                        <tr>
                                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                                            {{-- <td>{{ $selenggaraKriteria->nama }}</td> --}}
                                                            {{-- <td>{{ $selenggaraKriteria->jenis }}</td> --}}
                                                            {{-- <td>{{ $selenggaraKriteria->kategori }}</td> --}}
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        {{-- <a href="/selenggaraKriteria/{{ $selenggaraKriteria->id }}/edit" --}}
                                                                        class="btn btn-sm btn-primary"><i
                                                                            class="fas fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        {{-- <form action="/selenggaraKriteria/{{ $selenggaraKriteria->id }}" method="post"> --}}
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-outline-primary"><i
                                                                                class="fas fa-trash-alt"></i></button>
                                                                        </form>
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="tab-4" role="tabpanel">
                <div class="row mb-3">
                    <div class="col">
                        <nav style="--falcon-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%23748194'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-dark-green-jkr" style="font-weight: 700"
                                    aria-current="page">
                                    Selenggara
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3 class="mb-0 text-primary"><strong>SELENGGARA AUDIT LOG</strong></h3>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="col mb-">
                                    <h2 class="h2 mb-3">SENARAI SELENGGARA AUDIT LOG</h2>
                                </div>

                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table datatable table-striped" style="width:100%">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th class="sort">Bil.</th>
                                                            <th class="sort">IC Pengguna </th>
                                                            <th class="sort">Tarikh dan Masa </th>
                                                            <th class="sort">Proses Aktiviti </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white">

                                                        {{-- @foreach ($selenggara as $selenggaraAudit) --}}
                                                        <tr>
                                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                                            {{-- <td>{{ $selenggaraAudit->icPengguna }}</td> --}}
                                                            {{-- <td>{{ $selenggaraAudit->created_at }}</td> --}}
                                                            {{-- <td>{{ $selenggaraAudit->aktiviti }}</td> --}}

                                                        </tr>
                                                        {{-- @endforeach --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
