@extends('layouts.app')

@section('content')
<div class="row my-3">
    <div class="col">

        <div class="col mb-">
            <h2 class="h2 mb-3">SENARAI GUGUR PROJEK</h2>
        </div>

        <div class="row mt-2">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable table-striped" style="width:100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="sort">Bil.</th>
                                    <th class="sort">Nama Projek</th>
                                    <th class="sort">Alasan</th>
                                    <th class="sort">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">

                                @foreach ($projek as $projek)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $projek->nama }}</td>
                                        <td>{{ $projek->alasan }}</td>


                                        <td>
                                            <div class="row">
                                                @role('sekretariat')
                                                <div class="col-auto">
                                                    <form action="/Pengesahan/{{ $projek->id }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary">Pengesahan</button>
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