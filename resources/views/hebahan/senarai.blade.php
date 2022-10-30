@extends('layouts.anon')

<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }

    #chartdiv2 {
        width: 100%;
        height: 500px;
    }

    #chartdiv3 {
        width: 100%;
        height: 500px;
    }
</style>


@section('content')

    @role('sekretariat')
    <div class="row my-3">
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
                                            <input class="form-control" name="tajuk" type="text" />
                                        </div>

                                        <div class="col-3 mb-2">
                                            <label class="col-form-label">Kandungan Hebahan:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <textarea class="form-control" name="isi"></textarea>
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
    @endrole

    <div class="row my-3">
        <div class="col">

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
                                                        <a href="/hebahan/{{ $hebahan->id }}"
                                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                    </div>
                                                    @role('sekretariat')
                                                    <div class="col-auto">
                                                        <form action="/hebahan/{{ $hebahan->id }}" method="post">
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

        </div>
    </div>
@endsection
