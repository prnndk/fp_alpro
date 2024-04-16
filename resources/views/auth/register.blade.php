@extends('layouts.auth')
@section('auth','Sign Up')
@section('content')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <h1 class="auth-title">Sign Up</h1>
                <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                <form action="{{route('postRegister')}}" method="post">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" name="email" id="email" value="{{old('email')}}">
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl @error('name') is-invalid @enderror" placeholder="Name" name="name" id="name" value="{{old('name')}}">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" name="password" id="password" >
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Sign Up</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class='text-gray-600'>Already have an account? <a href="{{route('login')}}" class="font-bold">Log
                            in</a>.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>
@endsection
