@extends('layouts.app')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <nav style="--falcon-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%23748194'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-dark-green-jkr" style="font-weight: 700" aria-current="page">
                        Senarai Pengguna
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3 class="mb-0 text-primary"><strong>SENARAI PENGGUNA</strong></h3>
        </div>
    </div>

    <hr class="text-primary">

    @role('sekretariat|pentadbir|ketua-pasukan')
    <div class="row mt-3">
        <div class="col text-end">
            <a href='senaraiPengguna/senarai_tukar_peranan' class="btn btn-primary">senarai tukar peranan</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col text-end">
            <a href="senaraiPengguna/sembunyi"
                class="mt-2 btn btn-sm btn-primary">Sembunyi</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col text-end">
            <a href="senaraiPengguna/pengesahan_akaun_baru"
                class="mt-2 btn btn-sm btn-primary">Pengesahan Akaun Baru</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col text-end">
            <a href="/senaraiPengguna/cipta" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    @endrole

    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table datatable table-striped" style="width:100%">
                        <thead class="bg-primary">
                            <tr>
                                <th class="sort">Bil.</th>
                                <th class="sort">Nama Pengguna</th>
                                <th class="sort">Nama Syarikat</th>
                                <th class="sort">Nama Cawangan</th>
                                <th class="sort">Nama Negeri</th>
                                <th class="sort">Nama Peranan</th>
                                <th class="sort">Status Pengguna</th>
                                <th class="sort">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($pengguna as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->nama_syarikat }}</td>
                                    <td>{{ $p->nama_cawangan }}</td>
                                    <td>{{ $p->negeri }}</td>
                                    <td>{{ $p->cubacuba->display_name ?? ""}}</td>
                                    <td>
                                        <div class="col-10 mb-2 px-1 mx-6"
                                            style="border: 1px solid #F4A258; box-shadow: inset 2px 2px 5px 2px lightgrey; background-color: white; z-index: 2; border-radius:5px;">
                                            @if ($p->aktif == '1')
                                                <button class="btn btn-orange-jkr" type="button">Aktif</button>
                                            @else
                                                <button class="btn btn-final" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#lulus">Aktif</button>
                                            @endif
                                            |
                                            @if ($p->aktif == '0')
                                                <button class="btn btn-orange-jkr" type="button">Nyahaktif</button>
                                            @else
                                                <button class="btn btn-final" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#tolak">Nyahaktif</button>
                                            @endif

                                        </div>

                                        {{-- lulus modal --}}
                                        <div class="modal fade" id="lulus" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                                                <div class="modal-content position-relative">
                                                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                                        {{-- <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                            data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                                    </div>
                                                    <div class="modal-body p-0">

                                                        <div class="p-4 text-center">
                                                            <h5 class="h5 text-green-jkr">Adakah anda pasti ingin meluluskan pendaftaran
                                                                pengguna ini?</h5>
                                                            <form action="/senaraiPengguna/simpan_tukar_status/{{ $p->id }}" method="post">
                                                                @method('PUT')
                                                                @csrf
                                                                <input type="hidden" name="aktif" value="1">
                                                                <button class="btn btn-outline-green-jkr mt-3" type="button"
                                                                    data-bs-dismiss="modal">Tidak</button>
                                                                <button class="btn btn-green-jkr mt-3" type="submit">Ya</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- tolak modal --}}
                                        <div class="modal fade" id="tolak" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                                                <div class="modal-content position-relative">
                                                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                                        {{-- <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                            data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                                    </div>
                                                    <div class="modal-body p-0">

                                                        <div class="p-4 text-center">
                                                            <h5 class="h5 text-green-jkr">Adakah anda pasti ingin menolak pendaftaran
                                                                pengguna ini?</h5>
                                                            <form action="/senaraiPengguna/simpan2_tukar_status/{{ $p->id }}"
                                                                method="post">
                                                                @method('PUT')
                                                                @csrf
                                                                <input type="hidden" name="aktif" value="0">
                                                                <button class="btn btn-outline-green-jkr mt-3" type="button"
                                                                    data-bs-dismiss="modal">Tidak</button>
                                                                <button class="btn btn-green-jkr mt-3" type="submit">Ya</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- <td>
                                        @role('sekretariat|pentadbir')
                                        <div class="col">
                                            <div class="col-auto">
                                                <form action="/senaraiPengguna/simpan_tukar_status/{{ $p->id }}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <button name="aktif" value="1" type="submit"
                                                    class="btn btn-primary">Aktif</button>
                                                </form>
                                            </div>
                                            <div class="col-auto">
                                                <form action="/senaraiPengguna/simpan2_tukar_status/{{ $p->id }}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <button name="aktif" value="0" type="submit"
                                                    class="btn btn-primary">Nyahaktif</button>
                                                </form>
                                            </div>
                                        </div>
                                        @endrole
                                    </td> --}}
                                    <td>
                                        <a href="/senaraiPengguna/papar/{{ $p->id }}"
                                            class="btn btn-sm btn-primary">Papar</a>

                                        {{-- <a href="senaraiPengguna.sembunyi/{{ $p->id }}"
                                            class="mt-2 btn btn-sm btn-primary">Sembunyi</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(
            $(document).on('click','.ubahStatus',function(){
                alert('asd');
            });
        );
    </script>
{{-- <script>
   $.ajax({
                method: "POST",
                url: "{{ url('get_agensi_organisasi_by_sektor') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "sektor": $(this).val(),
                },
            }).done(function(response) {
                var data = jQuery.parseJSON(response);
                $('#agensi_organisasi').html('');
                $('#agensi_organisasi').append('<option value="">Pilih...</option>');
                $.each(data.aos, function(index, value) {
                    $('#agensi_organisasi').append('<option value="' + value.id + '" data-name="' +
                        value.name + '">' + value.name + '</option>');
                });

                $('#bahagian').html('');
                $('#bahagian').append('<option value="">Pilih...</option>');
            }); 
</script> --}}
@endsection
