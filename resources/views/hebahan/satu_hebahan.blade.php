@extends('layouts.base')
@section('content')

<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col mb-">
                    <h2 class="h2 mb-3">MAKLUMAT HEBAHAN</h2>
                </div>

                <div class="row mx-3 mb-2">
                    
                    <div class="col-4 mb-2">
                        <h5 class="h6">Tajuk Hebahan:</h5>
                    </div>
                    <div class="col-8 mb-2">
                        <h5 class="h6" style="font-weight: 700;">{{$hebahan->tajukHebahan}}</h5>
                    </div>

                    <div class="col-4 mb-2">
                        <h5 class="h6">Muat Naik Dokumen Sokongan:</h5>
                    </div>
                    <div class="col-8 mb-2">
                        <h5 class="h6" style="font-weight: 700;">{{$hebahan->jenisHebahan}}</h5>
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
                    <h2 class="h2 mb-3">EDIT HEBAHAN</h2>
                </div>

                <div class="row mt-4 mb-3">
                    <div class="col">
                        <form action="/satu_hebahan" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mx-4">
                                <div class="col-3 mb-2">
                                    <label class="col-form-label">Tajuk Hebahan:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="tajukHebahan" type="text"/>
                                </div>

                                <div class="col-3 mb-2">
                                    <label class="col-form-label">Muat Naik Dokumen Sokongan:</label>
                                </div>
                                <div class="col-7 mb-2">
                                    <input class="form-control" name="jenisHebahan" type="text"/>
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



@endsection