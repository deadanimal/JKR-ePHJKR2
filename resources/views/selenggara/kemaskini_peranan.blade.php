@extends('layouts.app')

@section('content')
<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col mb-">
                    <h2 class="h2 mb-3">BORANG SELENGGARA PERANAN</h2>
                </div>

                <div class="col">
                    <hr class="text-primary mb-3">

                    <div class="row mt-4 mb-3">
                        <div class="col">
                            <form action="/selenggaraPengguna" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mx-4">
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Nama Peranan Baru:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="nama" type="text"  value="{{->nama}}"/>
                                    </div>

                                    <div class="col-7 mb-2">
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <a href="/manual" class="btn btn-outline-primary">Batal</a>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button type="submit"
                                                    class="btn btn-primary">Tambah</button>
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

@endsection

