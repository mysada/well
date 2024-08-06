@extends('layouts.app')
@vite('resources/sass/contact.scss')
@section('title', 'Contact Us')

@section('content')

<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<div class="section-title text-center my-5">
    <h2>Contact Us</h2>
</div>

<div class="container contact">
    <div class="row mb-5">
        <div class="col-md-6 contact-info">
            <div class="contact-info-box">
                <div class="contact-icons">
                    <p>
                        <i class="bi bi-envelope-fill"></i> Email:  <a href="mailto:well@personalcare.com">well@personalcare.com</a>
                    </p>
                    <p>
                        <i class="bi bi-telephone-fill"></i> Phone:  +1 204-400-1234
                    </p>
                    <p>
                        <i class="bi bi-globe"></i> Website:  <a href="http://www.wellcare.com" target="_blank">www.wellcare.com</a>
                    </p>
                </div>
                <p class="social-icons">
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-twitter"></i>
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-linkedin"></i>
                </p>
            </div>
        </div>
        <div class="col-md-6">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <form method="POST" action="{{ route('contact.submit') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Full Name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                        @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="4" placeholder="Message">{{ old('message') }}</textarea>
                    @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-right">
                    <button type="submit" class="btn-black">Send Now</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
