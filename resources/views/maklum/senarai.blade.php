@extends('layouts.app')
@section('content')

<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col mb-">
                    <h2 class="h2 mb-3">BORANG MAKLUM BALAS</h2>
                </div>

                <div class="col">
                    <hr class="text-primary mb-3">

                    <div class="row mt-4 mb-3">
                        <div class="col">
                            <form action="/maklum_balas" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mx-4">
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Maklum Balas:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="nama" type="text"/>
                                    </div>

                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">E-mail:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="email" type="text"/>
                                    </div>

                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Keterangan:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="subjek" type="text"/>
                                    </div>
                
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Kategori:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="kategori" type="text"/>
                                    </div>
                
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Status:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="statusMaklumbalas" type="text"/>
                                    </div>
                
                                    
                                    
                
                                    
                    
                                    <div class="col-3 mb-2">
                                        
                                    </div>
                                    <div class="col-7 mb-2">
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <a href="/maklumbalas" class="btn btn-outline-primary">Batal</a>
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
                    <h2 class="h2 mb-3">SENARAI MAKLUM BALAS</h2>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <table class="table datatable table-striped" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th class="sort">Bil.</th>
                                            <th class="sort">Maklum Balas</th>
                                            <th class="sort">Kategori</th>
                                            <th class="sort">Status</th>
                                            <th class="sort">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        
                                        @foreach ($maklums as $maklum)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $maklum->namaFAQ }}</td>
                                                <td>{{ $maklum->soalanFAQ }}</td>
                                                <td>{{ $maklum->JawapanFAQ }}</td>
                                                
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <a href="/maklumbalas/{{ $maklum->id }}/edit"
                                                                class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                        </div>
                                                        <div class="col-auto">
                                                            <form action="/maklumbalas/{{ $maklum->id }}" method="post">
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