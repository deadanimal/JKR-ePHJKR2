@extends('layouts.app')
@section('content')
<div class="row mt-4 mb-3">
        <div class="col">
            <form action="/projek" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mx-4">
   

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Nama:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="nama" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Alamat:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="alamat" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Poskod:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="poskod" type="number" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Bandar:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="bandar" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Negeri:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="negeri" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Keluasan Tapak:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="keluasanTapak" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Jumlah Blok Bangunan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="jumlahBlokBangunan" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Tarikh Jangka Mula Pembinaan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="tarikhJangkaMulaPembinaan" type="date" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Tarikh Jangka Siap Pembinaan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="tarikhJangkaSiapPembinaan" type="date" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Kaedah Pelaksanaan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="kaedahPelaksanaan" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Jenis Perolehan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="jenisPerolehan" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Kos Projek:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="kosProjek" type="text" required/>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Jenis Projek:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <select class="form-select" aria-label="Default select example" name="jenisProjek">
                            <option value="Kerajaan">Kerajaan</option>
                            <option value="Swasta">Swasta</option>
                        </select>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Kategori:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <select class="form-select" name="kategori">
                            <option value="phJKR Bangunan Baru A">phJKR Bangunan Baru A</option>
                            <option value="phJKR Bangunan Baru B">phJKR Bangunan Baru B</option>
                            <option value="phJKR Bangunan Baru C">phJKR Bangunan Baru C</option>
                            <option value="phJKR Bangunan Baru D">phJKR Bangunan Baru D</option>                            
                            <option value="phJKR Bangunan PUN A">phJKR Bangunan PUN A</option>
                            <option value="phJKR Bangunan PUN B">phJKR Bangunan PUN B</option>
                            <option value="phJKR Bangunan PUN C">phJKR Bangunan PUN C</option>
                            <option value="phJKR Bangunan PUN D">phJKR Bangunan PUN D</option>
                            <option value="phJKR Bangunan Sediaada A">phJKR Bangunan Sediaada A</option>
                            <option value="phJKR Bangunan Sediaada B">phJKR Bangunan Sediaada B</option>
                            <option value="phJKR Bangunan Sediaada C">phJKR Bangunan Sediaada C</option>
                            <option value="phJKR Bangunan Sediaada D">phJKR Bangunan Sediaada D</option>                            
                            <option value="phJKR Jalan Baru">phJKR Jalan Baru</option>
                            <option value="phJKR Jalan Lama">phJKR Jalan Lama</option>
                            <option value="GPSS Bangunan 1">GPSS Bangunan 1</option>
                            <option value="GPSS Bangunan 2">GPSS Bangunan 2</option>
                            <option value="GPSS Bangunan 3">GPSS Bangunan 3</option>
                            <option value="GPSS Jalan">GPSS Jalan</option>
                        </select>
                    </div>

                   

                    
    
                    <div class="col-3 mb-2">
                        
                    </div>
                    <div class="col-7 mb-2">
                        <div class="row mt-4">
                            <div class="col-6">
                                <a href="/pengurusan_maklumat/senarai_pengguna" class="btn btn-outline-primary">Batal</a>
                            </div>
                            <div class="col-6 text-end">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection