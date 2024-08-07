@extends('layouts.app')

@section('content')
    <!-- FAQ Section -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Frequently Asked Questions</h2>
        <div class="accordion" id="faqAccordion">
            <div class="card rounded-lg shadow-sm mb-3">
                <div class="card-header bg-light" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                            What is your return policy?
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        Our return policy allows for returns within 30 days of purchase. Items must be in their original condition.
                    </div>
                </div>
            </div>
            <div class="card rounded-lg shadow-sm mb-3">
                <div class="card-header bg-light" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                            Do you offer international shipping?
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        Yes, we offer international shipping to most countries. Shipping rates and delivery times vary by location.
                    </div>
                </div>
            </div>
            <div class="card rounded-lg shadow-sm mb-3">
                <div class="card-header bg-light" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree">
                            How can I track my order?
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        After your order has shipped, you will receive a tracking number via email. You can use this number to track your order on our website.
                    </div>
                </div>
            </div>
            <div class="card rounded-lg shadow-sm mb-3">
                <div class="card-header bg-light" id="headingFour">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#collapseFour"
                                aria-expanded="false" aria-controls="collapseFour">
                            Can I modify or cancel my order after placing it?
                        </button>
                    </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                    <div class="card-body">
                        If you need to modify or cancel your order, please contact our customer service team as soon as possible. We can make changes or cancel your order if it has not yet been processed.
                    </div>
                </div>
            </div>
            <div class="card rounded-lg shadow-sm mb-3">
                <div class="card-header bg-light" id="headingFive">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#collapseFive"
                                aria-expanded="false" aria-controls="collapseFive">
                            Do you offer gift cards?
                        </button>
                    </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faqAccordion">
                    <div class="card-body">
                        Yes, we offer gift cards in various denominations. You can purchase them on our website or in-store.
                    </div>
                </div>
            </div>
            <div class="card rounded-lg shadow-sm mb-3">
                <div class="card-header bg-light" id="headingSix">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-dark font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#collapseSix"
                                aria-expanded="false" aria-controls="collapseSix">
                            What payment methods do you accept?
                        </button>
                    </h5>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#faqAccordion">
                    <div class="card-body">
                        We accept various payment methods, including major <strong>Credit Cards, PayPal, and Apple Pay</strong>. You can choose your preferred payment method at checkout.
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <!-- Footer -->
    <footer class="footer bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="font-weight-bold">About Us</h5>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis vulputate lorem sit amet facilisis.</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="font-weight-bold">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">Shop</a></li>
                        <li><a href="#" class="text-white">About Us</a></li>
                        <li><a href="#" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="font-weight-bold">Contact Us</h5>
                    <p class="text-muted"><i class="fas fa-map-marker-alt"></i> 123 Main Street, Anytown, USA</p>
                    <p class="text-muted"><i class="fas fa-phone"></i> (123) 456-7890</p>
                    <p class="text-muted"><i class="fas fa-envelope"></i> info@yourcompany.com</p>
                </div>
            </div>
            <div class="text-center mt-4">
                <p class="text-muted">&copy; 2024 Your Company. All rights reserved.</p>
            </div>
        </div>
    </footer>
@endsection
