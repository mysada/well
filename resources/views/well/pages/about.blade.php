@extends('layouts.app')
@vite('resources/sass/about.scss')
@section('content')

{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">--}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <div class="hero container mb-5">
        <div class="hero-box d-flex align-items-center justify-content-between p-5" style="border-radius: 10px;">
            <div class="hero-content">
                <h1>We provide you the best products</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <a href="#products" class="btn">Buy Now</a>
            </div>
            <div class="hero-image">
                <img src="{{ asset('images/about/about_us_banner.jpg') }}" alt="Product" class="img-fluid" style="border-radius: 10px;">
            </div>
        </div>
    </div>

    <div class="section-title text-center my-5">
        <h2>Meet Us</h2>
    </div>

    <div class="container content">
        <div class="row mb-5">
            <div class="col-md-6">
                <img src="{{ asset('images/about/wwd_bg.jpg') }}" alt="Who We Are" class="img-fluid">
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div>
                    <h3>Who We Are</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-6 order-md-2">
                <img src="{{ asset('images/about/wwa_bg.jpg') }}" alt="What We Do" class="img-fluid">
            </div>
            <div class="col-md-6 d-flex align-items-center order-md-1">
                <div>
                    <h3>What We Do</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section-title text-center my-5">
        <h2>Reach Us Via</h2>
    </div>

    <div class="container contact">
        <div class="row mb-5">
            <div class="col-md-6 offset-md-3 contact-info">
                <div class="contact-info-box">
                    <div class="contact-icons">
                        <p>
                            <img src="{{ asset('images/about/email_icon.png') }}" alt="Email Icon" class="contact-icon"> Email: <a href="mailto:well@personalcare.com">well@personalcare.com</a>
                        </p>
                        <p>
                            <img src="{{ asset('images/about/phone_icon.png') }}" alt="Phone Icon" class="contact-icon"> Phone: +1 204-400-1234
                        </p>
                        <p>
                            <img src="{{ asset('images/about/www_icon.png') }}" alt="Website Icon" class="contact-icon"> Website: <a href="http://www.wellcare.com" target="_blank">www.wellcare.com</a>
                        </p>
                    </div>
                    <p class="social-icons">
                        <img src="{{ asset('images/about/facebook_icon.png') }}" alt="Facebook Icon" class="social-icon">
                        <img src="{{ asset('images/about/twitter_icon.png') }}" alt="Twitter Icon" class="social-icon">
                        <img src="{{ asset('images/about/instagram_icon.png') }}" alt="Instagram Icon" class="social-icon">
                        <img src="{{ asset('images/about/linkedin_icon.png') }}" alt="LinkedIn Icon" class="social-icon">
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
