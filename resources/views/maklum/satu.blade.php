@extends('layouts.app')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="col mb-">
                        <h2 class="h2 mb-3">MAKLUM BALAS</h2>
                    </div>

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
                                                <form action="/maklumbalas/kemaskini/{{ $maklum->id }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="row mx-4">
                
                                                        <div class="col-3 mb-2">
                                                            <label class="col-form-label">Subjek:</label>
                                                        </div>
                                                        <div class="col-7 mb-2">
                                                            <input class="form-control" name="subjek" value="{{ $maklum->subjek }}"
                                                                type="text" />
                                                        </div>
                
                                                        <div class="col-3 mb-2">
                                                            <label class="col-form-label">Kategori:</label>
                                                        </div>
                                                        <div class="col-7 mb-2">
                                                            <input class="form-control" name="kategori" value="{{ $maklum->kategori }}"
                                                                type="text" />
                                                        </div>
                
                                                        <div class="col-3 mb-2">
                                                            <label class="col-form-label">Keterangan:</label>
                                                        </div>
                                                        <div class="col-7 mb-2">
                                                            <textarea class="form-control" name="keterangan">{{ $maklum->keterangan }}</textarea>
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
                                                                    @role('sekretariat')
                                                                        <button type="submit" name="action" value="dalamproses"
                                                                            class="btn btn-warning">Dalam Proses</button>
                                                                        <button type="submit" name="action" value="selesai"
                                                                            class="btn btn-success">Selesai</button>
                                                                    @endrole
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
                </div>
            </div>
        </div>
    </div>
@endsection
