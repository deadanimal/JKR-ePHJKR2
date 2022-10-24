@extends('layouts.app')

@section('content')
    <div class="card-body position-relative">
        <div class="row">
            <div class="col-lg-8">
                <h2>Senarai Hebahan</h2>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            @foreach ($hebahans as $hebahan)
                <h5>{{ $hebahan->tajuk }}</h5>
                <p class="fs--1 mb-0">{{ $hebahan->isi }}</p>
                <hr class="my-3">
            @endforeach

        </div>
    </div>

    <div class="row">
        <div class="col-6">

            <div class="card mb-3">
                <div class="card-header">
                    <div class="row flex-between-end">
                        <div class="col-auto align-self-center">
                            <h5 class="mb-0">Tambah hebahan</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <div class="tab-content">
                        <div class="tab-pane preview-tab-pane active show">
                            <form action="/hebahan" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Tajuk</label>
                                    <input class="form-control" type="text" name="tajuk">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Isi</label>
                                    <textarea class="form-control" rows="3" name="isi"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-6">
        </div>
    </div>
@endsection
