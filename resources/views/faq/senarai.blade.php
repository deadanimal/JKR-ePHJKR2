@extends('layouts.app')

@section('content')
    <div class="card-body position-relative">
        <div class="row">
            <div class="col-lg-8">
                <h2>Senarai FAQ</h2>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            @foreach ($faqs as $faq)
                <h5>{{ $faq->soalan }}</h5>
                <p class="fs--1 mb-0">{{ $faq->jawapan }}</p>
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
                            <h5 class="mb-0">Tambah FAQ</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <div class="tab-content">
                        <div class="tab-pane preview-tab-pane active show">
                            <form action="/faq" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Soalan</label>
                                    <input class="form-control" type="text" name="soalan">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jawapan</label>
                                    <textarea class="form-control" rows="3" name="jawapan"></textarea>
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
