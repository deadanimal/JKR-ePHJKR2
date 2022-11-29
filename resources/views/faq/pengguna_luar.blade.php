@extends('layouts.anon')

@section('content')
    <div class="row my-3">
        <div class="col">

            <div class="col mb-">
                <h2 class="h2 mb-3">SOALAN LAZIM (FAQ)</h2>
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
