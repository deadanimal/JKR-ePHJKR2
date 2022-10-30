@extends('layouts.landing-base')
@section('content')
    <div class="container mt-4">
        <div class="row text-orange">
            <div class="col text-center">
                DAFTAR AKAUN
                <hr class="text-orange">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <label>Nama Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="name" class="form-control">
                        </div>
                        {{-- <div class="col-3">
                            <label>Peranan Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="perananPengguna" class="form-control">
                        </div> --}}
                        <div class="col-3">
                            <label>No. Kad Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="icPengguna" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>E-mel Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>No. Tel Bimbit Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="notelbimbitPengguna" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>No. Fax Bimbit Pengguna:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="nofaxPengguna" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>Nama Syarikat:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="namaSyarikat" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>Alamat Syarikat:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="alamatSyarikat" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>Daerah:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="daerah" class="form-control">
                        </div>

                        <div class="col-3">
                            <label>Negeri:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="negeri" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>Kata Laluan:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>Pengesahan Kata Laluan:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>Sijil Kompeten:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="sijilKompeten" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>Kelayakan Akademik:</label>
                        </div>
                        <div class="col-9 mb-2">
                            <input type="text" name="kelayakanAkademik" class="form-control">
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-9">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-orange">Hantar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection