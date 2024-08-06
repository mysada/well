@extends('layouts.app')

@push('styles')
    @vite('resources/sass/thank_you.scss')
@endpush

@section('content')
<div class="thank-you-container">
    <h1>Thank You for Your Order!</h1>
    <p>Your order has been successfully placed.</p>
    <p class="order-id">Order ID: #12345678</p>
    <p>We appreciate your business and hope you enjoy your purchase. If you have any questions or need further assistance, please do not hesitate to contact us.</p>
    <a href="{{ route('home') }}" class="btn-home">Back to Home</a>
</div>
@endsection
