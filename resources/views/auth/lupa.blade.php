@extends('layouts.auth-base')

@section('content')
<div class="container-fluid">
    <div class="row min-vh-100 flex-center g-0">
        <div class="col-lg-6 col-xxl-5 py-3 position-relative">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row g-0 h-100 d-flex flex-center">
                        <div class="col-lg-8 d-flex flex-center">
                            <div class="p-4 p-md-5 flex-grow-1">
                                <div class="row flex-between-center">
                                    <div class="col mb-3">
                                        <h3 class="text-primary text-center">Tukar Kata laluan</h3>
                                    </div>
                                </div>
                                <form method="POST" action="/lupa">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
                                    </div>

                                    <div class="mb-3 text-center">
                                        <button type="submit" class="btn btn-lg btn-primary">Tukar Katalaluan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection