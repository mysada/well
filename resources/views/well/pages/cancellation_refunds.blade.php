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
                <li>You may cancel your order within 24 hours of placing it. To request a cancellation, please contact our customer support team at <a href="mailto:support@wellnessbalance.com">support@wellnessbalance.com</a>.</li>
                <li>Note that certain products or services may not be eligible for cancellation.</li>
            </ul>
        </div>

        <div class="policy-section">
            <h2>Refund Policy</h2>
            <ul>
                <li>Refunds are processed within 7-10 business days of receiving your return. To request a refund, please contact our support team.</li>
                <li>Refunds will be issued to the original payment method used for the purchase. Some items are non-refundable.</li>
            </ul>
        </div>

        <div class="policy-section">
            <h2>Return Policy</h2>
            <ul>
                <li>Items can be returned within 30 days of receipt. Ensure that items are unused and in their original packaging.</li>
                <li>Return shipping costs may apply. Contact customer support for instructions on initiating a return.</li>
            </ul>
        </div>

        <div class="policy-section">
            <h2>Exchange Policy</h2>
            <ul>
                <li>Exchanges are available for defective or incorrect items. Follow the return process and specify the item you wish to receive in exchange.</li>
                <li>Exchanges are subject to availability.</li>
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
            <p>Our cancellation and refund policy complies with applicable consumer protection laws. For more details, please refer to the legal requirements governing such policies.</p>
        </div>

        <div class="policy-section">
            <h2>Updates to This Policy</h2>
            <p>We may update this policy periodically. Any changes will be posted on this page with an updated effective date. Please review this policy regularly to stay informed about our cancellation and refund practices.</p>
        </div>
    </div>
@endsection
