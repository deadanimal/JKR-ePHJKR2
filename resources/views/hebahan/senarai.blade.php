{{-- @extends('layouts.app')

@section('content')
    <div class="card-body position-relative">
        <div class="row">
            <div class="col-lg-8">
                <h2>Senarai Hebahan</h2>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            @foreach ($hebahans as $hebahan)
                <h5>{{ $hebahan->tajuk }}</h5>
                <p class="fs--1 mb-0">{{ $hebahan->isi }}</p>
                <hr class="my-3">
            @endforeach

        </div>
    </div>

    <div class="row">
        <div class="col-6">

            <div class="card mb-3">
                <div class="card-header">
                    <div class="row flex-between-end">
                        <div class="col-auto align-self-center">
                            <h5 class="mb-0">Tambah hebahan</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <div class="tab-content">
                        <div class="tab-pane preview-tab-pane active show">
                            <form action="/hebahan" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Tajuk</label>
                                    <input class="form-control" type="text" name="tajuk">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Isi</label>
                                    <textarea class="form-control" rows="3" name="isi"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-6">
        </div>
    </div>
@endsection --}}

@extends('layouts.app')
@section('content')

<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col mb-">
                    <h2 class="h2 mb-3">BORANG HEBAHAN</h2>
                </div>

                <div class="col">
                    <hr class="text-primary mb-3">

                    <div class="row mt-4 mb-3">
                        <div class="col">
                            <form action="/hebahan" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mx-4">
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Nama Hebahan:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="tajukHebahan" type="text"/>
                                    </div>
                
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Muat Naik Dokumen Sokongan:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="jenisHebahan" type="file"/>
                                    </div>
                    
                                    <div class="col-3 mb-2">
                                        
                                    </div>
                                    <div class="col-7 mb-2">
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <a href="/hebahan" class="btn btn-outline-primary">Batal</a>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button type="submit" class="btn btn-primary">Tambah</button>
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
                    <h2 class="h2 mb-3">SENARAI HEBAHAN</h2>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <table class="table datatable table-striped" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th class="sort">Bil.</th>
                                            <th class="sort">Tajuk Hebahan</th>
                                            <th class="sort">Kategori</th>
                                            <th class="sort">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        
                                        @foreach ($hebahans as $hebahan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $hebahan->tajuk }}</td>
                                                <td>{{ $hebahan->isi }}</td>
                                                
                                                
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <a href="/hebahan/{{ $hebahan->id }}/edit"
                                                                class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                        </div>
                                                        <div class="col-auto">
                                                            <form action="/hebahan/{{ $hebahan->id }}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-trash-alt"></i></button>
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
            </div>
        </div>
    </div>
</div>

@endsection