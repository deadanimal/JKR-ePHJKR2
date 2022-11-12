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
                                    <td></td>
                                    <td>
                                        <div class="col">
                                            <div class="col-auto">
                                                <form action="/senaraiPengguna/simpan_tukar_status/{{ $p->id }}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <button name="aktif" value="0" type="submit"
                                                    class="btn btn-primary">Active</button>
                                                </form>
                                            </div>
                                            <div class="col-auto">
                                                <form action="/senaraiPengguna/simpan2_tukar_status/{{ $p->id }}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <button name="aktif" value="1" type="submit"
                                                    class="btn btn-primary">Deactive</button>
                                                </form>
                                            </div>
                                        </div>
                                        {{-- <div class="col">
                                            <div class="col-auto mb-2 px-0"
                                                style="border: 1px solid #F4A258; box-shadow: inset 2px 2px 5px 2px lightgrey; background-color: white; z-index: 2; border-radius:5px;">
                                                @if ($p->aktif == '0')
                                                    <button class="btn btn-orange-jkr" type="button">Active</button>
                                                @else
                                                    <button class="btn btn-final" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#lulus">Active</button>
                                                        <form method="POST" action="simpan_status">
                                                            @csrf
                                                            <input type="hidden" name="name" value="{{$p->id}}">
                                                            <input type="hidden" name="aktif" value="1">
                                                            <button class="btn btn-final" type="submit">Active</button>
                                                        </form>
                                                @endif
                                                |
                                                @if ($p->aktif == '1')
                                                    <button class="btn btn-orange-jkr" type="button">Inactive</button>
                                                @else
                                                    <button class="btn btn-final" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#tolak">Inactive</button>
                                                @endif

                                            </div> --}}


                                           {{-- class="col-auto mb-2 px-0"
                                            style="border: 1px solid #F4A258; box-shadow: inset 2px 2px 5px 2px lightgrey; background-color: white; z-index: 2; border-radius:5px;"> --}}
                                            
                                            {{-- <div class="col">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-secondary active">
                                                    <form method="POST" action="simpan_status">
                                                        @csrf
                                                        <input type=hidden name="staffId" value="{{$p->id}}">
                                                        <input type=hidden name="status" value="0">
                                                        <input type="radio" name="aktif"  class="ubahStatus" checked> Active
                                                    </form>
                                                </label>
                                                <label class="btn btn-secondary">
                                                    <form method="POST" action="simpan_status">
                                                        @csrf
                                                        <input type=hidden name="staffId" value="{{$p->id}}">
                                                        <input type=hidden name="status" value="1">
                                                        <input type="radio" name="aktif"  class="ubahStatus"> Inactive
                                                    </form>
                                                </label>
                                            </div> --}}
                                              {{-- </div>href="#" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Inactive</a> --}}
                                                {{-- <button class="btn btn-orange-jkr" type="button">LULUS</button> --}}
                                            
                                                {{-- <button class="btn btn-final" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#lulus">Active</button> --}}
                                            
                                                
                                            
                                                {{-- <button class="btn btn-orange-jkr" type="button">GAGAL</button> --}}
                                            
                                                {{-- <button class="btn btn-final" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#gagal">Inactive</button> --}}
                                            

                                        {{-- </div> --}}
                                    </td>
                                    <td>
                                        <a href="/senaraiPengguna/kemaskini_pengguna/{{ $p->id }}"
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
