@extends('layouts.app')

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

    {{-- @role('pentadbir|pengurusan-atasan|sekretariat|ketua-pemudah-cara|
    pemudah-cara|ketua-penilai|penilai|ketua-validasi|
    pasukan-validasi')
    <table class="table table-bordered projek-datatable line-table" style="width:100%">
        <thead class="text-white bg-orange-jkr">
            <tr>
                <th class="text-center">Nama</th>
                <th class="text-center">Alamat</th> --}}
                {{-- <th class="text-center">Peranan</th> --}}
                {{-- <th class="text-center">Status</th>
                <th class="text-center">Jenis Kategori</th>
                <th class="text-center">Tindakan</th> 
            </tr>
        </thead>
    </table>
    @endrole --}}

    {{-- @role('ketua-pasukan|penolong-ketua-pasukan') --}}
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
     {{-- @endrole  --}}


<!--JavaScript-->
@role('ketua-pasukan|penolong-ketua-pasukan')
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
@else
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
@endrole


{{-- <script type="text/javascript">
    $(function() {

        var table = $('.projek-datatable-1').DataTable({
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
            ]
        });
    
    });
</script> --}}


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