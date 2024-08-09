@extends('layouts.app')
@vite('resources/sass/privacy_policy.scss')
@section('title', 'Privacy Policy - Wellness Balance')
@section('content')

    <!-- Privacy Policy Section -->
    <div class="policy-container mt-5">
        <h1 class="text-center mb-4">Privacy Policy</h1>

        <div class="policy-section">
            <p>Welcome to Wellness Balance, where your privacy and trust are our top priorities. This Privacy Policy explains how we collect, use, share, and protect your personal information when you use our website. By accessing or using our services, you agree to the practices described in this policy.</p>
        </div>

        <div class="policy-section">
            <h2>Information We Collect</h2>
            <ul>
                <li><strong>Personal Identification Information:</strong> Includes your name, email address, phone number, shipping and billing addresses, and payment details.</li>
                <li><strong>Order Information:</strong> Details of the products you purchase, including order history and preferences.</li>
                <li><strong>Non-Personal Identification Information:</strong> Includes data on how you interact with our website, such as IP address, browser type, and pages visited.</li>
                <li><strong>Cookies:</strong> Small data files stored on your device to improve your browsing experience and provide personalized content.</li>
            </ul>
        </div>

        <div class="policy-section">
            <h2>How We Use Your Information</h2>
            <ul>
                <li>To process and manage your orders, including payment processing and shipping.</li>
                <li>To provide customer support and respond to your inquiries promptly.</li>
                <li>To enhance our website and services based on user feedback and usage patterns.</li>
                <li>To send updates on your orders, promotions, and newsletters if you opt-in.</li>
                <li>To analyze trends and conduct research to improve our offerings and business operations.</li>
            </ul>
        </div>

        <div class="policy-section">
            <h2>Sharing Your Information</h2>
            <ul>
                <li><strong>Service Providers:</strong> We may share your information with trusted third-party partners who assist in operating our website, processing payments, and delivering products. These partners are required to protect your information and comply with applicable privacy laws.</li>
                <li><strong>Legal Compliance:</strong> We may disclose your information to comply with legal obligations or protect the rights, property, or safety of Wellness Balance, our users, or others.</li>
            </ul>
        </div>

        <div class="policy-section">
            <h2>Your Rights and Choices</h2>
            <ul>
                <li>Access, update, or delete your personal information by contacting us directly.</li>
                <li>Opt-out of receiving marketing communications by following the unsubscribe instructions in our emails.</li>
                <li>Manage cookies through your browser settings or opt-out of targeted advertising using industry tools.</li>
            </ul>
        </div>

        <div class="policy-section">
            <h2>Security Measures</h2>
            <p>We implement robust technical and administrative measures to protect your personal information from unauthorized access, loss, or misuse. However, please note that no method of transmission over the internet is completely secure.</p>
        </div>

        <div class="policy-section">
            <h2>Updates to This Policy</h2>
            <p>We may update this Privacy Policy periodically. Any changes will be posted on this page with an updated effective date. We encourage you to review this policy regularly to stay informed about how we protect your information.</p>
        </div>

        <div class="policy-section">
            <h2>Contact Us</h2>
            <p>If you have any questions or concerns about this Privacy Policy or our data practices, please reach out to us at:</p>
            <p>Email: <a href="mailto:grievance@wellnessbalance.com">grievance@wellnessbalance.com</a><br>
                Phone Number: 9664165687</p>
        </div>

        <div class="policy-section">
            <h2>Governing Law</h2>
            <p>This Privacy Policy is governed by the laws of Canada. Any disputes arising under this policy will be subject to the exclusive jurisdiction of the courts of Canada.</p>
        </div>

        <div class="policy-section">
            <h2>Compliance with Canadian Laws</h2>
            <p>Wellness Balance complies with the Personal Information Protection and Electronic Documents Act (PIPEDA) and other relevant Canadian privacy legislation. Canadian residents have the right to access their personal information, request corrections, and obtain information about how their data is handled. For more details, please visit the official PIPEDA website.</p>
        </div>
    </div>
@endsection
