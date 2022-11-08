@extends('layouts.app')

@section('content')
<div class="row mb-3">
    <div class="col">
        <nav style="--falcon-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%23748194'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/projek" class="text-secondary">Senarai Projek</a>
                </li>
                <li class="breadcrumb-item text-dark-green-jkr" style="font-weight: 700" aria-current="page">
                    Permohonan Gugur Projek
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col">
        <h3 class="mb-0 text-primary"><strong>PERMOHONAN GUGUR PROJEK</strong></h3>
    </div>
</div>

<hr class="text-primary">
<div class="row mt-4 mb-3">
        <div class="col">
            <form action="/permohonan/gugur_projek/{{$projek->id}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row mx-4">
                    <div class="col-3 mb-2">
                        <label class="col-form-label">Alasan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <textarea class="form-control" rows="4" name="alasan" type="text" required ></textarea>
                    </div>
                </div>
            
                <div class="col-7 mb-2">
                    <div class="row mt-4">
                        <div class="col-6">
                            <a href="/projek" class="btn btn-outline-primary">Batal</a>
                        </div>
                        <div class="col-6 text-end">
                            <button type="submit" class="btn btn-primary">Hantar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection