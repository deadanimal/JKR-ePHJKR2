@extends('layouts.anon')

@section('content')

<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col mb-">
                    <h2 class="h2 mb-3">MAKLUM BALAS</h2>
                </div>

                <div class="col">
                    <hr class="text-primary mb-3">

                    <div class="row mt-4 mb-3">
                        <div class="col">
                            <form action="/maklumbalas/cipta_pengguna_luar" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mx-4">

                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Nama:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="nama" type="text"/>
                                    </div>

                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Email:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="email" type="text"/>
                                    </div>

                
                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Subjek:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <input class="form-control" name="subjek" type="text"/>
                                    </div>

                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Kategori:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <select class="form-select form-control" name="kategori">
                                            <option value="phJKR Bangunan Baru A">phJKR Bangunan Baru A</option>
                                            <option value="phJKR Bangunan Baru B">phJKR Bangunan Baru B</option>
                                            <option value="phJKR Bangunan Baru C">phJKR Bangunan Baru C</option>
                                            <option value="phJKR Bangunan Baru D">phJKR Bangunan Baru D</option>                            
                                            <option value="phJKR Bangunan PUN A">phJKR Bangunan PUN A</option>
                                            <option value="phJKR Bangunan PUN B">phJKR Bangunan PUN B</option>
                                            <option value="phJKR Bangunan PUN C">phJKR Bangunan PUN C</option>
                                            <option value="phJKR Bangunan PUN D">phJKR Bangunan PUN D</option>
                                            <option value="phJKR Bangunan Sedia Ada A">phJKR Bangunan Sedia Ada A</option>
                                            <option value="phJKR Bangunan Sedia Ada B">phJKR Bangunan Sedia Ada B</option>
                                            <option value="phJKR Bangunan Sedia Ada C">phJKR Bangunan Sedia Ada C</option>
                                            <option value="phJKR Bangunan Sedia Ada D">phJKR Bangunan Sedia Ada D</option>                            
                                            <option value="phJKR Jalan Baru">phJKR Jalan Baru</option>
                                            <option value="phJKR Jalan Naiktaraf">phJKR Jalan Naiktaraf</option>
                                            <option value="GPSS Bangunan 1">GPSS Bangunan 1</option>
                                            <option value="GPSS Bangunan 2">GPSS Bangunan 2</option>
                                            <option value="GPSS Bangunan 3">GPSS Bangunan 3</option>
                                            <option value="GPSS Jalan">GPSS Jalan</option>
                                        </select>
                                    </div>

                                    <div class="col-3 mb-2">
                                        <label class="col-form-label">Keterangan:</label>
                                    </div>
                                    <div class="col-7 mb-2">
                                        <textarea class="form-control" name="keterangan"></textarea>
                                    </div>                                    
                
                                    <div class="col-3 mb-2">
                                        
                                    </div>
                                    <div class="col-7 mb-2">
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <a href="/maklumbalas" class="btn btn-outline-primary">Batal</a>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button type="submit" class="btn btn-primary">Hantar</button>
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