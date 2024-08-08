@extends('layouts.app')
@vite('resources/sass/cancellation_refunds.scss') <!-- Link to the relevant SCSS file -->
@section('content')

    <!-- Cancellation and Refunds Section -->
    <div class="policy-container mt-5">
        <h1 class="text-center mb-4">Cancellation and Refunds</h1>

        <div class="policy-section">
            <p>Welcome to Wellness Balance's Cancellation and Refunds Policy. This page outlines how you can cancel your order and request a refund, as well as our return and exchange policies.</p>
        </div>

        <div class="policy-section">
            <h2>Cancellation Policy</h2>
            <ul>
                <li>You may cancel your order within <strong>24 hours</strong> of placing it. To request a cancellation, please contact our customer support team at <a href="mailto:support@wellnessbalance.com">support@wellnessbalance.com</a>.</li>
                <li>Note that certain products or services may not be eligible for cancellation.</li>
                <li>Orders canceled after <strong>24 hours</strong> may be subject to a <strong>restocking fee</strong>.</li>
            </ul>
        </div>

        <div class="policy-section">
            <h2>Refund Policy</h2>
            <ul>
                <li>Refunds are processed within <strong>7-10 business days</strong> of receiving your return. To request a refund, please contact our support team.</li>
                <li>Refunds will be issued to the <strong>original payment method</strong> used for the purchase. Some items are non-refundable unless defective.</li>
                <li>Return shipping costs may apply, and items should be returned in their <strong>original packaging</strong>.</li>
            </ul>
        </div>

        <div class="policy-section">
            <h2>Return Policy</h2>
            <ul>
                <li>Items can be returned within <strong>30 days</strong> of receipt. Ensure that items are <strong>unused</strong> and in their original packaging.</li>
                <li>Return shipping costs may apply. Contact customer support for instructions on initiating a return.</li>
            </ul>
        </div>

        <div class="policy-section">
            <h2>Exchange Policy</h2>
            <ul>
                <li>Exchanges are available for <strong>defective or incorrect items</strong>. Follow the return process and specify the item you wish to receive in exchange.</li>
                <li>Exchanges are subject to <strong>availability</strong>.</li>
            </ul>
        </div>

        <div class="policy-section">
            <h2>Contact Information</h2>
            <p>If you have any questions or need assistance with cancellations, refunds, or returns, please contact us:</p>
            <p>Email: <a href="mailto:support@wellnessbalance.com">support@wellnessbalance.com</a><br>
                Phone: 9664165687</p>
        </div>

        <div class="policy-section">
            <h2>Legal and Compliance</h2>
            <p>Our cancellation and refund policy complies with applicable <strong>consumer protection laws</strong>. For more details, please refer to the legal requirements governing such policies.</p>
        </div>

        <div class="policy-section">
            <h2>Updates to This Policy</h2>
            <p>We may update this policy periodically. Any changes will be posted on this page with an updated <strong>effective date</strong>. Please review this policy regularly to stay informed about our cancellation and refund practices.</p>
        </div>

        <div class="policy-section">
            <h2>Additional Information</h2>
            <p>For further assistance and detailed answers to common questions, please visit our <a href="{{ route('faq') }}">FAQ page</a>. Here, you’ll find answers to frequently asked questions about our services and policies.</p>
            <p>To understand how we handle your personal information and protect your privacy, please review our <a href="{{ route('privacy_policy') }}">Privacy Policy</a>. This document outlines how we collect, use, and safeguard your data.</p>
        </div>
    </div>
@endsection
