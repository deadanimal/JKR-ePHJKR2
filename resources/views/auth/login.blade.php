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
                                        <h3 class="text-primary text-center">Log Masuk</h3>
                                    </div>
                                </div>
                                <form method="POST" action="/login">
                                    @csrf
                                    <div class="mb-3" id="nric">
                                        <label class="form-label text-primary">No.
                                            Kad Pengenalan</label>
                                        <input class="form-control" type="text" name="icPengguna"
                                            :value="old('icPengguna')" maxlength="12" size="12"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                    </div>
                                    
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label text-primary">Kata
                                                Laluan</label>
                                        </div>
                                        <input class="form-control" type="password" name="password" required
                                            autocomplete="current-password" />
                                    </div>
                                    {{-- <div>
                                        <x-input-label for="icPengguna" :value="__('Kad Pengenalan')" />
                                
                                        <x-text-input id="icPengguna" class="block mt-1 w-full" type="text" name="icPengguna" {{--:value="old('email')"-- required autofocus />
                                
                                        <x-input-error :messages="$errors->get('icPengguna')" class="mt-2" />
                                    </div>
                                    
                                    <div class="mt-4">
                                        <x-input-label for="password" :value="__('Password')" />
                                
                                        <x-text-input id="password" class="block mt-1 w-full"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="current-password" />
                                
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div> --}}
                                    <div class="form-check mb-0">
                                        <div class="row">
                                            <div class="col text-end">
                                                <a class="fs--1 text-primary" href="/lupa">Terlupa Kata
                                                    Laluan?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button class="btn btn-primary d-block w-100 mt-3" type="submit"
                                            name="submit">Log Masuk</button>
                                    </div>

                                    <hr class="text-primary mb-3">
                                </form>
                                <div class="row">
                                    <div class="col text-center">
                                        <div class="mb-3">
                                            <a class="btn btn-outline-primary d-block w-100" href="/register">Daftar Akaun</a>
                                            <a class="mt-3" style="color:#5B8E7D" href="/">Anda Pengguna JKR? Daftar Sini.</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection