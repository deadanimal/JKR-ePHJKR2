@extends('layouts.app')

@section('content')
    @role('sekretariat|pentadbir')
    <div class="row my-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="col mb-">
                        <h2 class="h2 mb-3">BORANG FAQ</h2>
                    </div>

                    <div class="col">
                        <hr class="text-primary mb-3">

                        <div class="row mt-4 mb-3">
                            <div class="col">
                                <form action="/faq" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mx-4">
                                        <div class="col-3 mb-2">
                                            <label class="col-form-label">Soalan:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" name="soalan" type="text" />
                                        </div>

                                        <div class="col-3 mb-2">
                                            <label class="col-form-label">Jawapan:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <textarea class="form-control" name="jawapan"></textarea>
                                        </div>

                                        <div class="col-3 mb-2">

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

    <div class="row my-3">
        <div class="col">

            <div class="col mb-">
                <h2 class="h2 mb-3">SENARAI SOALAN LAZIM (FAQ)</h2>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <table class="table datatable table-striped" style="width:100%">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="sort">Bil.</th>
                                        <th class="sort">Soalan</th>
                                        <th class="sort">Jawapan</th>
                                        @role('sekretariat|pentadbir')
                                        <th class="sort">Tindakan</th>
                                        @endrole
                                    </tr>
                                </thead>
                                <tbody class="bg-white">

                                    @foreach ($faqs as $faq)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $faq->soalan }}</td>
                                            <td>{{ $faq->jawapan }}</td>


                                            <td>
                                                @role('sekretariat|pentadbir')
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <a href="/faq/{{ $faq->id }}"
                                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                    </div>
                                                    
                                                    <div class="col-auto">
                                                        <form action="/faq/{{ $faq->id }}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-outline-primary"><i
                                                                    class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </div>
                                                    @endrole
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
            <div class="row mt-4">
                <div class="col-6">
                    <a href="/dashboard" class="btn btn-outline-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
@endsection
