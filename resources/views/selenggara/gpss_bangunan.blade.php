@extends('layouts.app')

@section('content')
<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col mb-">
                    <h2 class="h2 mb-3">BORANG SELENGGARA KRITERIA</h2>
                </div>

                <div class="col">
                    <hr class="text-primary mb-3">

                    <div class="row mt-4 mb-3">
                        <div class="col">
                            <form action="/selenggara/simpankemaskini_gpss_kriteria/{{$gpss_kriteria->id}}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row mx-4">
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Nama Borang:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="borang" type="text" />
                                    </div>
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Fasa:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <select class="form-select form-control" name="fasa">
                                            <option selected disabled="">Sila Pilih</option>
                                            <option value="rekaBentuk">RekaBentuk</option>
                                            <option value="verifikasi">Verifikasi</option>
                                        </select>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Elemen:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="elemen" type="text" />
                                    </div>
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Turutan Elemen:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="element_seq" type="number" />
                                    </div>
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Komponen:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="komponen" type="text" />
                                    </div>
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Produk:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="produk" type="text" />
                                    </div>
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Markah Maksimum:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="maksimum" type="number" />
                                    </div>

                                    <div class="col-7 mb-2">
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <a href="/selenggara"
                                                    class="btn btn-outline-primary">Batal</a>
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