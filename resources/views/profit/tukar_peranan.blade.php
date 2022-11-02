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
                        <a href="/profil/{{ $pengguna->id }}/edit"
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
            <form action="#" method="post">
                @method('PUT')
                @csrf
                <div class="row mx-4">
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Nama:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="name" value="{{ $pengguna->name }}" disabled />
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">e-Mel Pengguna:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="email" value="{{ $pengguna->email }}" disabled />
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Nama Projek:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <select name="projek_id" class="form-select form-control" id="projek">
                            <option value="" selected hidden>Sila Pilih</option>
                            @foreach ($projek as $pr)
                                <option value="{{ $pr->projek->id }}">{{ $pr->projek->namaProjek }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Peranan Sekarang:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input type="text" class="form-control" value="Tiada" disabled id="peranan_sekarang">
                    </div>

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Peranan Baru:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <select name="role" class="form-select form-control">
                            @if ($pengguna->perananPengguna == null)
                                <option value="" selected hidden>Sila Pilih</option>
                            @else
                                <option value="{{ $pengguna->perananPengguna }}" selected hidden>
                                    {{ $pengguna->perananPengguna }}</option>
                            @endif
                            @foreach ($peranan as $pp)
                                <option value="{{ $pp->name }}">{{ $pp->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-3 mb-2">
                        {{-- biar kosong --}}
                    </div>
                    <div class="col-7 mb-2">
                        <div class="row mt-4">
                            <div class="col-6">
                                <a href="/pengurusan_maklumat/profil_pengguna/{{ $pengguna->id }}/edit"
                                    class="btn btn-outline-primary">Batal</a>
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

    <script>
        $('#projek').change(function() {
            var projek_id = $('#projek').val();
            var role = @json($projek->toArray());

            role.forEach(e => {
                if (projek_id == e.projek_id) {
                    $('#peranan_sekarang').val(e.peranan.name);
                }
            });
        });
    </script>
@endsection
