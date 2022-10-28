@extends('layouts.app')
@section('content')

<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col mb-">
                    <h2 class="h2 mb-3">MAKLUMAT MAKLUM BALAS</h2>
                </div>

                <div class="row mx-3 mb-2">
                    
                    <div class="col-4 mb-2">
                        <h5 class="h6">Maklum Balas:</h5>
                    </div>
                    <div class="col-8 mb-2">
                        <h5 class="h6" style="font-weight: 700;">{{$maklum->nama}}</h5>
                    </div>

                    <div class="col-4 mb-2">
                        <h5 class="h6">Kategori:</h5>
                    </div>
                    <div class="col-8 mb-2">
                        <h5 class="h6" style="font-weight: 700;">{{$maklum->nama}}</h5>
                    </div>

                    <div class="col-4 mb-2">
                        <h5 class="h6">Status:</h5>
                    </div>
                    <div class="col-8 mb-2">
                        <h5 class="h6" style="font-weight: 700;">{{$maklum->nama}}</h5>
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
                    <h2 class="h2 mb-3">EDIT MAKLUM BALAS</h2>
                </div>

                <div class="row mt-4 mb-3">
                    <div class="col">
                        <form action="/satu_maklumbalas" method="post" enctype="multipart/form-data">
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



@endsection