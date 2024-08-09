@extends('layouts.app')
@vite(['resources/sass/faq.scss', 'resources/js/app.js'])

@section('content')
    <!-- FAQ Section -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Frequently Asked Questions</h2>
        <div class="row">
            <!-- General FAQ Section -->
            <div class="col-md-6">
                <h3 class="text-center mb-4">General FAQs</h3>
                <div class="accordion" id="faqAccordion">
                    <div class="card   mb-3">
                        <div class="card-header bg-light" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                    What is your return policy?
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="card-body">
                                Our return policy allows for returns within 30 days of purchase. Items must be in their original condition.
                            </div>
                        </div>
                    </div>
                    <div class="card   mb-3">
                        <div class="card-header bg-light" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                    Do you offer international shipping?
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="card-body">
                                Yes, we offer international shipping to most countries. Shipping rates and delivery times vary by location.
                            </div>
                        </div>
                    </div>
                    <div class="card   mb-3">
                        <div class="card-header bg-light" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                    How can I track my order?
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="card-body">
                                After your order has shipped, you will receive a tracking number via email. You can use this number to track your order on our website.
                            </div>
                        </div>
                    </div>
                    <div class="card   mb-3">
                        <div class="card-header bg-light" id="headingFour">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">
                                    Can I modify or cancel my order after placing it?
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="card-body">
                                If you need to modify or cancel your order, please contact our customer service team as soon as possible. We can make changes or cancel your order if it has not yet been processed.
                            </div>
                        </div>
                    </div>
                    <div class="card   mb-3">
                        <div class="card-header bg-light" id="headingFive">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                        aria-expanded="false" aria-controls="collapseFive">
                                    Do you offer gift cards?
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="card-body">
                                Yes, we offer gift cards in various denominations. You can purchase them on our website or in-store.
                            </div>
                        </div>
                    </div>
                    <div class="card   mb-3">
                        <div class="card-header bg-light" id="headingSix">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                        aria-expanded="false" aria-controls="collapseSix">
                                    What payment methods do you accept?
                                </button>
                            </h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                            <div class="card-body">
                                We accept various payment methods, including major <strong>Credit Cards, PayPal, and Apple Pay</strong>. You can choose your preferred payment method at checkout.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Health & Personal Care FAQ Section -->
            <div class="col-md-6">
                <h3 class="text-center mb-4">Health & Personal Care FAQs</h3>
                <div class="accordion" id="healthCareAccordion">
                    <div class="card   mb-3">
                        <div class="card-header bg-light" id="headingSeven">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                        aria-expanded="true" aria-controls="collapseSeven">
                                    What ingredients are used in your supplements?
                                </button>
                            </h5>
                        </div>
                        <div id="collapseSeven" class="collapse show" aria-labelledby="headingSeven" data-bs-parent="#healthCareAccordion">
                            <div class="card-body">
                                Our supplements are made from high-quality, natural ingredients. Each product has a detailed list on the label.
                            </div>
                        </div>
                    </div>
                    <div class="card   mb-3">
                        <div class="card-header bg-light" id="headingEight">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight"
                                        aria-expanded="false" aria-controls="collapseEight">
                                    Are your products cruelty-free?
                                </button>
                            </h5>
                        </div>
                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-bs-parent="#healthCareAccordion">
                            <div class="card-body">
                                Yes, all our products are cruelty-free and not tested on animals.
                            </div>
                        </div>
                    </div>
                    <div class="card   mb-3">
                        <div class="card-header bg-light" id="headingNine">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine"
                                        aria-expanded="false" aria-controls="collapseNine">
                                    Do you offer organic skincare products?
                                </button>
                            </h5>
                        </div>
                        <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-bs-parent="#healthCareAccordion">
                            <div class="card-body">
                                Yes, we offer certified organic skincare products free from synthetic chemicals.
                            </div>
                        </div>
                    </div>
                    <div class="card   mb-3">
                        <div class="card-header bg-light" id="headingTen">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen"
                                        aria-expanded="false" aria-controls="collapseTen">
                                    How should I store my supplements?
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-bs-parent="#healthCareAccordion">
                            <div class="card-body">
                                Store supplements in a cool, dry place. Follow the storage instructions on the label.
                            </div>
                        </div>
                    </div>
                    <div class="card   mb-3">
                        <div class="card-header bg-light" id="headingEleven">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven"
                                        aria-expanded="false" aria-controls="collapseEleven">
                                    Are products suitable for sensitive skin?
                                </button>
                            </h5>
                        </div>
                        <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-bs-parent="#healthCareAccordion">
                            <div class="card-body">
                                Many of our products are designed for sensitive skin. Check product details for compatibility.
                            </div>
                        </div>
                    </div>
                    <div class="card   mb-3">
                        <div class="card-header bg-light" id="headingTwelve">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve"
                                        aria-expanded="false" aria-controls="collapseTwelve">
                                    Can I use supplements with medications?
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-bs-parent="#healthCareAccordion">
                            <div class="card-body">
                                Consult with your healthcare provider before using supplements with prescription medications.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
