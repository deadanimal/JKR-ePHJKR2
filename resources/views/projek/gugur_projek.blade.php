@extends('layouts.app')
@section('content')
<div class="row mt-4 mb-3">
        <div class="col">
            <form action="/projek/{{$projek->id}}/gugur_projek" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mx-4">
   

                    <div class="col-3 mb-2">
                        <label class="col-form-label">Alasan:</label>
                    </div>
                    <div class="col-7 mb-2">
                        <input class="form-control" name="gugur" type="text" required/>
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection