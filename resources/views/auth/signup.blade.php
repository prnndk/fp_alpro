@extends('layouts.auth')
@section('auth', 'Sign Up')

@section('content')
    <div class="row h-100">
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">
            </div>
        </div>
        <div class="col-lg-5 col-12">
            <div id="auth-left">

                <div class="auth-logo">
                    <a href="/"><img src="{{ asset('assets/static/images/logo/logo.svg') }}" alt="Logo"></a>
                </div>
                <h1 class="auth-title">Sign Up.</h1>
                <p class="auth-subtitle mb-5">Create an account with your information to complete the registration
                    process.</p>
                <form action="{{route('postSignUp')}}" method="POST">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl @error('name') is-invalid @enderror"
                               placeholder="Input Name Here" name="name" id="name" required>
                        <div class="form-control-icon">
                            <i class="bi bi-text-paragraph"></i>
                        </div>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl @error('email') is-invalid @enderror"
                               placeholder="Email Address" name="email" id="email" required>
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password"
                               class="form-control form-control-xl @error('password') is-invalid @enderror"
                               placeholder="Password" name="password" required>
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">Already have an account? <a href="/login" class="font-bold">Log in</a>.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
