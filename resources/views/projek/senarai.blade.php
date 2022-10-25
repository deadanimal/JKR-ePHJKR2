@extends('layouts.app')

@section('content')

<h1>Senarai Projek</h1>

<div class="row mb-3">
    <div class="col text-end">
        <a href="/projek/borang" class="btn btn-primary">Tambah</a>
    </div>
</div>

    <table class="table table-bordered projek-datatable line-table" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">ID Projek</th>
                <th class="text-center">Nama Projek</th>
                <th class="text-center">Alamat Projek</th>
                <th class="text-center">Status</th>
                <th class="text-center">Jenis Kategori</th>
                <th class="text-center">Tindakan</th> 

            </tr>
        </thead>

        <tbody id="projekTable">

            {{-- @foreach($projeks as $projek)
                <tr class="text-black">
                    <td style="text-align: center; vertical-align: middle;">{{ $projek->id }}</td>
                    <td style="text-align: center; vertical-align: middle;">{{ $projek->nama }}</td>
                    <td style="text-align: center; vertical-align: middle;">{{ $projek->alamat }}</td>
                    <td style="text-align: center; vertical-align: middle;">{{ $projek->status }}</td>
                    <td style="text-align: center; vertical-align: middle;">{{ $projek->kategori }}</td>
                    <td style="text-align: center; vertical-align: middle;">
                        <a class="btn btn-primary" href="/projek/{{ $projek->id }}" role="button"
                        data-toggle="tooltip" data-placement="bottom" title="Pilih Projek">Pilih</a>
                    </td>
                </tr>
            @endforeach --}}
            
        </tbody>
     </table> 




@endsection

@section('scripts')
<script type="text/javascript">
    $(function() {

        var table = $('.projek-datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "/projek",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'kategori',
                    name: 'kategori'
                },
                {
                    data: 'tindakan',
                    name: 'tindakan'
                },                                                                

            ]
        });


    });
</script>
@endsection