@extends('layouts.app')
@vite('resources/sass/contact.scss')
@section('title', 'Contact Us')

@section('content')

<div class="section-title text-center my-5">
    <h2>Contact Us</h2>
</div>

<div class="container contact">
    <div class="row mb-5">
        <div class="col-md-4 contact-info">
            <!-- Contact Info Section -->
            <div class="contact-info-box">
                <!-- Contact Icons Section -->
                <div class="contact-icons">
                    <p>
                        <img src="{{ asset('images/about/email_icon.png') }}" alt="Email Icon" class="contact-icon"> Email: &nbsp<a href="mailto:well@personalcare.com">well@personalcare.com</a>
                    </p>
                    <p>
                        <img src="{{ asset('images/about/phone_icon.png') }}" alt="Phone Icon" class="contact-icon"> Phone: +1 204-400-1234
                    </p>
                    <p>
                        <img src="{{ asset('images/about/www_icon.png') }}" alt="Website Icon" class="contact-icon"> Website: &nbsp<a href="http://www.wellcare.com" target="_blank">www.wellcare.com</a>
                    </p>
                </div>
                <!-- Social Icons Section -->
                <p class="social-icons">
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-twitter"></i>
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-linkedin"></i>
                </p>
            </div>
        </div>
        <div class="col-md-8">

            <!-- Contact Form -->
            <form method="POST" action="{{ route('contact.submit') }}">
                @csrf
                <div class="row">
                    <!-- Name Field -->
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Full Name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Email Field -->
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <!-- Phone Field -->
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Subject Field -->
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                        @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- Message Field -->
                <div class="form-group">
                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="2" placeholder="Message">{{ old('message') }}</textarea>
                    @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- CAPTCHA Field -->
                @if(app()->environment('production'))
                <div class="form-group">
                    <label for="captcha">CAPTCHA</label>
                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    @error('g-recaptcha-response')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                @endif


                <!-- Submit Button -->
                <div class="text-right">
                    <button type="submit" class="btn-black">Send Now</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<!-- Google reCAPTCHA script -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
