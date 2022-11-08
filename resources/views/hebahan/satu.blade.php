@extends('layouts.app')

<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }

    #chartdiv2 {
        width: 100%;
        height: 500px;
    }

    #chartdiv3 {
        width: 100%;
        height: 500px;
    }
</style>


@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="col mb-">
                        <h2 class="h2 mb-3">BORANG HEBAHAN</h2>
                    </div>

                    <div class="col">
                        <hr class="text-primary mb-3">

                        <div class="row mt-4 mb-3">
                            <div class="col">
                                <form action="/hebahan/{{$hebahan->id}}" method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row mx-4">
                                        <div class="col-3 mb-2">
                                            <label class="col-form-label">Nama Hebahan:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <input class="form-control" name="tajuk" type="text" value="{{$hebahan->tajuk}}" />
                                        </div>

                                        <div class="col-3 mb-2">
                                            <label class="col-form-label">Kandungan Hebahan:</label>
                                        </div>
                                        <div class="col-7 mb-2">
                                            <textarea class="form-control" name="isi">{{$hebahan->isi}}</textarea>
                                        </div>

                                        <div class="col-3 mb-2">

                                        </div>
                                        <div class="col-7 mb-2">
                                            <div class="row mt-4">
                                                @role('sekretariat|pentadbir')
                                                <div class="col-6">
                                                    <a href="/hebahan" class="btn btn-outline-primary">Batal</a>
                                                </div>                                                
                                                <div class="col-6 text-end">
                                                    <button type="submit" class="btn btn-primary">Kemaskini</button>
                                                </div>
                                                @endrole
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
