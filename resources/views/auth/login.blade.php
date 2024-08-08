@extends('layouts.app')
@vite('resources/sass/login.scss')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center"><strong>{{ __('Login') }}</strong></div>

                <div class="card-body">
                    <p class="text-center">If you have an account with us, please log in.</p>
                    <form method="POST" action="{{ route('login') }}" id="login-form">
                        @csrf

                        <div class="mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="email" class="form-label">{{ __('Email address') }}</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
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
                <p>Don't have an account? <a href="{{ route('register') }}" id="create-account-link">Create an account</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
