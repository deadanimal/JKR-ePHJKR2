@extends('layouts.app')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"> --}}

@section('content')

<h1>Senarai Projek</h1>

<div class="row mb-3">
    @role('ketua-pasukan|penolong-ketua-pasukan')
    <div class="col text-end">
        <a href="/projek/borang" class="btn btn-primary">Tambah</a>
    </div>
    @endrole
</div>
<div class="row mb-3">
    @role('ketua-pasukan|penolong-ketua-pasukan')
    <div class="col text-end">
        <a href="/myskala" class="btn btn-primary">Skala</a>
    </div>
    @endrole
</div>
<div class="row mb-3">

    @role('ketua-pasukan|penolong-ketua-pasukan|sekretariat')

    <div class="col text-end">
        <a href="/projek/gugur/senarai_gugur_projek" class="btn btn-primary">Gugur Projek</a>
    </div>
    @endrole
</div>

    <table class="table table-bordered projek-datatable line-table" style="width:100%">
        <thead class="text-white bg-orange-jkr">
            <tr>
                <th class="text-center">Nama</th>
                <th class="text-center">Alamat</th>
                {{-- <th class="text-center">Peranan</th> --}}
                <th class="text-center">Status</th>
                <th class="text-center">Jenis Kategori</th>

                <th class="text-center">Tindakan</th> 
                {{-- @role('ketua-pasukan|penolong-ketua-pasukan') --}}
                <th class="text-center">Gugur Projek</th>
                {{-- @endrole --}}
            </tr>
        </thead>
     </table>

<!--JavaScript-->
{{-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css"></script> --}}
<script type="text/javascript">
    $(function() {

        var table = $('.projek-datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "/projek",
            columns: [
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                // {
                //     data: 'peranan',
                //     name: 'peranan'
                // },                
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
                {
                    data: 'gugur',
                    name: 'gugur'
                },                                                                 

            ]
        });
    
    });
</script>


@endsection

{{-- @section('scripts') --}}
{{-- <script type="text/javascript">
    $(function() {

        var table = $('.projek-datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "/projek",
            columns: [
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                {
                    data: 'peranan',
                    name: 'peranan'
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
                {
                    data: 'gugur',
                    name: 'gugur'
                },                                                                 

            ]
        });


    });
</script> --}}
{{-- @endsection --}}