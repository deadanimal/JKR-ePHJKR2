@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <h3 class="mb-0 text-primary"><strong>Maklum Balas</strong></h3>
    </div>
</div>

<hr class="text-primary mb-3">

<div class="row mt-4 mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row mx-4">
                    <div class="col-4 mb-2">
                        <h5 class="h6">Subjek:</h5>
                    </div>
                    <div class="col-8 mb-2">
                        <h5 class="h6" style="font-weight: 700;">{{ $maklum['subjek'] }}</h5>
                    </div>

                    <div class="col-4 mb-2">
                        <h5 class="h6">Kategori:</h5>
                    </div>
                    <div class="col-8 mb-2">
                        <h5 class="h6" style="font-weight: 700;">{{ $maklum['kategori'] }}</h5>
                    </div>

                    <div class="col-4 mb-2">
                        <h5 class="h6">Keterangan:</h5>
                    </div>
                    <div class="col-8 mb-2">
                        <h5 class="h6" style="font-weight: 700;"> {{ $maklum['keterangan'] }}</h5>
                    </div>

                    <div class="col-4 mb-2">
                        <h5 class="h6">Status:</h5>
                    </div>
                    <div class="col-8 mb-2">
                        <h5 class="h6" style="font-weight: 700;"> {{ $maklum['status'] }}</h5>
                    </div>

                    <div class="col-4 mb-2">
                        <h5 class="h6">Jawapan:</h5>
                    </div>
                    <div class="col-8 mb-2">
                        <h5 class="h6" style="font-weight: 700;"> {{ $maklum->mbmesej['mesej'] ?? ""}}</h5>
                        {{-- {{$mb}}; --}}
                    </div>

                    
                </div>
                <div class="col text-center">
                    <a href="/maklumbalas" class="btn btn-outline-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@role('sekretariat|pentadbir')
<div class="row mt-4 mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-0 text-primary"><strong>Borang Maklum Balas</strong></h3>
                        </div>
                    </div>
                    <hr class="text-primary mb-3">

                    <div class="row mt-4 mb-3">
                        <div class="col">
                            <form action="/maklumbalas/{{ $maklum->id }}/mesej" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row mx-4">

                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Mesej:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <textarea class="form-control" name="mesej"></textarea>
                                    </div>

                                    <div class="col-3 mb-2">

                                    </div>
                                    <div class="col-7 mb-2">
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <a href="/maklumbalas" class="btn btn-outline-primary">Batal</a>

                                            </div>
                                            <div class="col-6 text-end">
                                                <button type="submit" class="btn btn-primary">Kemaskini</button>
                                                {{-- @role('sekretariat') --}}
                                                    <button type="submit" name="action" value="dalamproses"
                                                        class="btn btn-warning">Dalam Proses</button>
                                                    <button type="submit" name="action" value="selesai"
                                                        class="btn btn-success">Selesai</button>
                                                {{-- @endrole --}}
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
@endsection