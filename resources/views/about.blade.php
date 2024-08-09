@extends('layouts.app')

@section('title', 'About Us')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

@section('content')
    <div class="hero container mb-5">
        <div class="hero-box d-flex align-items-center justify-content-between p-5" style="border-radius: unset!important;">
            <div class="hero-content">
                <h1>We provide you the best products</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <a href="#products" class="btn">Buy Now</a>
            </div>
            <div class="hero-image">
                <img src="{{ asset('images/about/about_us_banner.jpg') }}" alt="Product" class="img-fluid" style="border-radius: unset!important;">
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
        <h2>Contact Us</h2>
    </div>

    <div class="container contact">
        <div class="row mb-5">
            <div class="col-md-6 contact-info">
                <div class="contact-info-box">
                    <div class="contact-icons">
                    <p>
                        <i class="bi bi-envelope-fill"></i> Email: <a href="mailto:well@personalcare.com">well@personalcare.com</a>
                    </p>
                    <p>
                        <i class="bi bi-telephone-fill"></i> Phone: +1 204-400-1234
                    </p>
                    <p>
                        <i class="bi bi-globe"></i> Website: <a href="http://www.wellcare.com" target="_blank">www.wellcare.com</a>
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
                <form action="#">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="name" placeholder="Full Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="phone" placeholder="Phone">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="4" placeholder="Message"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn-black">Send Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="footer text-center py-3">
        <div class="footer-logo">
            <img src="{{ asset('images/logo.png') }}" alt="Well Logo">
            <p>Wellness Balance provides healthy supplements to maintain your health</p>
        </div>
        <div class="footer-nav">
            <p>
                <i class="bi bi-house-door-fill"></i> Navigation: Home | Shop | About Us | Policy
            </p>
            <p>
                <i class="bi bi-question-circle-fill"></i> Support: Help Centre | Contact Us
            </p>
            <p>
                <i class="bi bi-share-fill"></i> Socials:
                <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white"><i class="bi bi-youtube"></i></a>
                <a href="#" class="text-white"><i class="bi bi-twitter"></i></a>
            </p>
        </div>
        <p>&copy; {{ date('Y') }} Natural Balance Ltd. All rights reserved.</p>
    </div>
@endsection
