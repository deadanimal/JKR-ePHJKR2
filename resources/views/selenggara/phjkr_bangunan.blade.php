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
                            <form action="/selenggara/simpankemaskini_kriteria/{{$kriteria->id}}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row mx-4">
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Nama Borang:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="borang" type="text" value="{{$kriteria->borang}}"/>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Borang Seq:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="borang_seq" type="number" value="{{$kriteria->borang_seq}}"/>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Kategori:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="kategori" type="text" value="{{$kriteria->kategori}}"/>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Kategori Seq:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="kategori_seq" type="number" value="{{$kriteria->kategori_seq}}"/>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Kod Kriteria:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="kod" type="text" value="{{$kriteria->kod}}"/>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Markah Maksimum:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="maksimum" type="number" value="{{$kriteria->maksimum}}"/>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Bukti:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="bukti" type="text" value="{{$kriteria->bukti}}"/>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Nama Kriteria:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="nama" type="text" value="{{$kriteria->nama}}"/>
                                    </div>
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Jenis Kriteria:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <select class="form-select form-control" name="fasa" value="{{$kriteria->fasa}}">
                                            <option selected disabled="">Sila Pilih</option>
                                            <option value="rekaBentuk">RekaBentuk</option>
                                            <option value="verifikasi">Verifikasi</option>
                                        </select>
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