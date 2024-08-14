@extends('layouts.app')
@vite('resources/sass/login.scss')
@section('content')
<div class="container">
    <div class="row">
        <!-- Left side: Image (40%) -->
        <div class="col-md-5 d-none d-md-block">
            <div class="image-container">
                <img src="/images/login.jpg" alt="Side Image" class="img-fluid">
            </div>
        </div>

        <!-- Right side: Login Form (60%) -->
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center"><strong>{{ __('Login') }}</strong></div>

                <div class="card-body">
                    <!-- <p class="text-center">If you have an account with us, please log in.</p> -->
                    <form method="POST" action="{{ route('login') }}" id="login-form">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark btn-block" id="login-button">
                                {{ __('Sign in') }}
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                        <div class="mt-3 text-center">
                            <a class="btn btn-link" href="{{ route('password.request') }}" id="forgot-password-link">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
            <div class="mt-3 text-center">
                <p><a href="{{ route('register') }}" id="create-account-link">Create an account</a></p>
            </div>
        </div>
    </div>
</div>

@endsection
