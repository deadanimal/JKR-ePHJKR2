@extends('layouts.app')
@section('content')

@role('sekretariat|pentadbir')
<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col mb-">
                    <h2 class="h2 mb-3">BORANG MANUAL DAN STANDARD</h2>
                </div>

                <div class="col">
                    <hr class="text-primary mb-3">

                    <div class="row mt-4 mb-3">
                        <div class="col">
                            <form action="/manual" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mx-4">
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Nama Manual & Standard:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="nama" type="text"/>
                                    </div>

                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Muat Naik Dokumen Sokongan:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="dokumen" type="file"/>
                                    </div>

                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Catatan:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <textarea class="form-control" rows="4" name="catatan" type="text" placeholder="Catatan"></textarea>
                                    </div>
                    
                                    <div class="col-7 mb-2">
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <a href="/dashboard" class="btn btn-outline-primary">Batal</a>
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
@endrole

<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col mb-">
                    <h2 class="h2 mb-3">SENARAI MANUAL DAN STANDARD</h2>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <table class="table datatable table-striped" style="width:100%">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th class="sort">Bil.</th>
                                            <th class="sort">Nama Manual</th>
                                            <th class="sort">Dokumen</th>
                                            <th class="sort">Catatan</th>
                                            @role('sekretariat|pentadbir')
                                            <th class="sort">Tindakan</th>
                                            @endrole
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        
                                        @foreach ($manuals as $manual)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $manual->nama }}</td>
                                                {{-- <td>{{ $manual->dokumen }}</td> --}}
                                                

                                                <td><a href="https://pipeline-apps.sgp1.digitaloceanspaces.com/{{ $manual->dokumen }}">Pautan Dokumen</a></td>
                                                <td>{{ $manual->catatan }}</td>
                                                
                                                <td>
                                                    @role('sekretariat|pentadbir')
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <a href="/manual/{{ $manual->id }}"
                                                                class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                        </div>
                                                        <div class="col-auto">
                                                            <form action="/manual/{{ $manual->id }}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-trash-alt"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    @endrole
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