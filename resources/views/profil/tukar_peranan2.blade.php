@extends('layouts.app')

@section('content')

<div class="row mb-3">
    <div class="col">
        <nav style="--falcon-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%23748194'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/profil" class="text-secondary">Paparan Profil</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/profil/edit"
                        class="text-secondary">Kemaskini Profil</a>
                </li>
                <li class="breadcrumb-item text-dark-green-jkr" style="font-weight: 700" aria-current="page">
                    Penukaran Peranan
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col">
        <h3 class="mb-0 text-primary"><strong>Penukaran Peranan</strong></h3>
    </div>
</div>

<hr class="text-primary mb-3">

<div class="row mt-4 mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="/profil/simpan_tukar_peranan2/{{$pengguna->id}}" method="post" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="row mx-4">
                        <div class="col-3 mb-2">
                            <label class="col-form-label">Nama:</label>
                        </div>
                        <div class="col-7 mb-2">
                            <input class="form-control" type="text" value="{{ $pengguna->name }}" readonly/>
                            <input class="form-control" name="user_id" type="hidden" value="{{ $pengguna->id }}"/>
                        </div>
                            {{-- <input class="form-control" type="hidden" name="user_id" value="{{ $pengguna->id }}" /> --}}
                        
                            {{-- <input class="form-control" type="hidden" name="role_id_lama" value="{{ $projeks->role->role_id}}" /> --}}

                        <div class="col-3 mb-2">
                            <label class="col-form-label">Nama Projek:</label>
                        </div>
                        <div class="col-7 mb-2">
                            <select name="projek_id" class="form-select form-control" id="projek">
                                <option value="projek_id" selected hidden>Sila Pilih</option>
                                @foreach ($projeks as $pr)
                                    <option value="{{ $pr->projek->id ?? ""}}">{{ $pr->projek->nama ?? ""}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3 mb-2">
                            <label class="col-form-label">Peranan Sekarang:</label>
                        </div>

                        <div class="col-7 mb-2">
                            <input id="nama_peranan" type="text" class="form-control" readonly>
                            <input id="nama_peranan2" name="role_id_lama" type="hidden" class="form-control" readonly>
                        </div>

                        <div class="col-3 mb-2">
                            <label class="col-form-label">Peranan Baru:</label>
                        </div>
                        <div class="col-7 mb-2">
                            <select class="form-select form-control" name="role_id_baru">
                                <option selected disabled="">Sila Pilih</option>
                                <option value="3">Ketua Pasukan</option>
                                <option value="4">Penolong Ketua Pasukan</option>
                                <option value="6">Pemudah Cara</option>
                                <option value="12">Ketua Pemudah Cara</option>                            
                                <option value="8">Ketua Penilai</option>
                                <option value="7">Penilai</option>
                                <option value="9">Ketua Pasukan Validasi</option>
                                <option value="10">Pasukan Validasi</option>
                            </select>
                        </div>

                        <div class="col-3 mb-2">
                            <label class="col-form-label">Dokumen Sokongan:</label>
                        </div>

                        <div class="col-7 mb-2">
                            <input type="file" name="dokumen" class="form-control">
                        </div>

                        <div class="col-7 mb-2">
                            <div class="row mt-4">
                                <div class="col-6">
                                    <a href="/profil" class="btn btn-outline-primary">Batal</a>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="submit" class="btn btn-primary">Simpan Kemaskini</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <div class="row mt-2">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table class="table datatable table-striped" style="width:100%">
                    <thead class="bg-primary">
                        <tr>
                            <th class="sort">Bil.</th>
                            <th class="sort">Nama Projek</th>
                            <th class="sort">Peranan lama</th>
                            <th class="sort">Peranan baru</th>
                            <th class="sort">Dokumen</th>
                            <th class="sort">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($peranans as $p)
                            <tr> --}}
                                {{-- <td></td>
                                <td></td>
                                <td></td>
                                <td></td> --}}

                                {{-- <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->projek_id }}</td>
                                <td>{{ $p->role_id_lama }}</td>
                                <td>{{ $p->role_id_baru }}</td>
                                <td><a href="https://pipeline-apps.sgp1.digitaloceanspaces.com/{{ $p->dokumen }}">Pautan Dokumen</a></td>

                                <td> --}}
                                    {{-- @role('sekretariat') --}}
                                    {{-- <div class="col"> --}}
                                        {{-- <div class="col-auto"> --}}
                                            {{-- <form action="/profil/sah_tukar_peranan2/{{ $p->id }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button name="sah" value="1" type="submit"
                                                class="btn btn-primary">Terima</button>
                                            </form>
                                        </div>
                                        <div class="col-auto">
                                            <form action="/profil/tolak_tukar_peranan2/{{ $p->id }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Tolak</button>
                                            </form>
                                        </div> --}}
                                        {{-- <div class="col-auto">
                                            <form action="/profil/simpan2_tukar_peranan/{{--{{ $p->id }}--}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button name="name" value="0" type="submit"
                                                class="btn btn-primary">Reject</button>
                                            </form>
                                        </div> --}}
                                    {{-- </div> --}}
                                    {{-- @endrole --}}
                                {{-- </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> --}}

<script>
    $('#projek').change(function() {
        var projek_id = $('#projek').val();
        var role = @json($projeks->toArray());

        role.forEach(e => {
            if (projek_id == e.projek_id) {
                $('#nama_peranan').val(e.nama_peranan);
                $('#nama_peranan2').val(e.role_id);
            }
        });
    });
</script>

@endsection