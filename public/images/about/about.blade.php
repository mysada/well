@extends('layouts.app')

@section('title', 'About Us')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@section('content')


    <div class="hero container mb-5">
        <div class="hero-box d-flex align-items-center justify-content-between p-5" style="border-radius: 10px;">
            <div class="hero-content">
                <h1>We provide you the best products</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <a href="#products" class="btn">Buy Now</a>
            </div>
            <div class="hero-image">
                <img src="{{ asset('images/product.jpg') }}" alt="Product" class="img-fluid" style="border-radius: 10px;">
            </div>
        </div>
    </div>

    <div class="section-title text-center my-5">
        <h2>Meet Us</h2>
    </div>

    <div class="container content">
        <div class="row mb-5">
            <div class="col-md-6">
                <img src="{{ asset('images/who_we_are.jpg') }}" alt="Who We Are" class="img-fluid">
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
                <img src="{{ asset('images/what_we_do.jpg') }}" alt="What We Do" class="img-fluid">
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
                    <p><i class="fas fa-envelope"></i> Email: <a href="mailto:well@personalcare.com">well@personalcare.com</a></p>
                    <p><i class="fas fa-phone"></i> Phone: +1 204-400-1234</p>
                    <p><i class="fas fa-globe"></i> Website: <a href="http://www.wellcare.com" target="_blank">www.wellcare.com</a></p>
                    <p class="social-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-linkedin"></i>
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
            <p><i class="fas fa-home"></i> Navigation: Home | Shop | About Us | Policy</p>
            <p><i class="fas fa-question-circle"></i> Support: Help Centre | Contact Us</p>
            <p><i class="fas fa-share-alt"></i> Socials:
                <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
            </p>
        </div>
        <p>&copy; {{ date('Y') }} Natural Balance Ltd. All rights reserved.</p>
    </div>
@endsection
