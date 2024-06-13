@extends('auth.layouts.app')

@section('title', 'Login')

@section('content')
<div class="page-header align-items-start min-vh-100" style="background-image: url('{{ asset('HUMG/HUMG.jpeg') }}')">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">{{ __('QUẢN LÝ HỒ SƠ SV5T') }}</h4>                    
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">{{ __('Mật khẩu') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="form-check form-switch d-flex align-items-center mb-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label mb-0 ms-3" for="remember">{{ __('Ghi nhớ đăng nhập') }}</label>
                            </div> --}}
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">{{ __('Đăng nhập') }}</button>
                            </div>
                            <p class="mt-4 text-sm text-center">
                                Chưa có tài khoản?
                                <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Đăng Kí</a>
                            </p>
                            {{-- @if (Route::has('password.request'))
                                <p class="mt-4 text-sm text-center">
                                    <a class="text-primary text-gradient font-weight-bold" href="{{ route('password.request') }}">{{ __('Quên Mật Khẩu?') }}</a>
                                </p>
                            @endif --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
