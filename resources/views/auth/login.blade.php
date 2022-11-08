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
                                {{-- <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <!-- Email Address -->
                                    <div>
                                        <x-input-label for="email" :value="__('Email')" />

                                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-input-label for="password" :value="__('Password')" />

                                        <x-text-input id="password" class="block mt-1 w-full"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="current-password" />

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <!-- Remember Me -->
                                    <div class="block mt-4">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif

                                        <x-primary-button class="ml-3">
                                            {{ __('Log in') }}
                                        </x-primary-button>
                                    </div>
                                </form> --}}
                                <form method="POST" action="/login">
                                    @csrf
                                    <div>
                                        <x-input-label for="email" :value="__('Email')" />
                                
                                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    {{-- <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label text-primary">Peranan Pengguna</label>
                                        </div>
                                        <input type="text" name="peranan_pengguna" id="peranan_pengguna" class="form-control">
                                    </div> --}}
                                    <div class="mt-4">
                                        <x-input-label for="password" :value="__('Password')" />
                                
                                        <x-text-input id="password" class="block mt-1 w-full"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="current-password" />
                                
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="form-check mb-0">
                                        <div class="row">
                                            <div class="col text-end">
                                                <a class="fs--1 text-primary" href="/forgot-password">Terlupa Kata
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
                                            <a class="mt-3" style="color:#5B8E7D" href="/loginjkr">Anda Pengguna JKR? Klik Sini.</a>
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