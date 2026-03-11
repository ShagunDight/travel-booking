@extends('layouts.app')
@section('content')

<main>
    <section class="pt-4 pt-lg-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h1 class="fs-2 mb-0">Terms & Services</h1>
                    <img src="{{ asset('/images/terms01.jpg') }}" class="h-lg-400px rounded-3 mt-4" alt="Terms & Services">
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="vstack gap-4">

                        <!-- Introduction -->
                        <div class="card bg-transparent p-0">
                            <div class="card-header border-bottom bg-transparent px-0">
                                <h4 class="card-title mb-0">Introduction</h4>
                            </div>
                            <div class="card-body px-0">
                                <p>Welcome to Zakaru International’s travel booking platform. By accessing or using our website, you agree to comply with and be bound by these Terms & Services. Please read them carefully before making any bookings.</p>
                            </div>
                        </div>

                        <!-- Eligibility -->
                        <div class="card bg-transparent p-0">
                            <div class="card-header border-bottom bg-transparent px-0">
                                <h4 class="card-title mb-0">Eligibility</h4>
                            </div>
                            <div class="card-body px-0">
                                <ul class="mb-0">
                                    <li>You must be at least 18 years old to make a booking.</li>
                                    <li>By using our services, you confirm that all information provided is accurate and complete.</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Booking & Payments -->
                        <div class="card bg-transparent p-0">
                            <div class="card-header border-bottom bg-transparent px-0">
                                <h4 class="card-title mb-0">Booking & Payments</h4>
                            </div>
                            <div class="card-body px-0">
                                <ul class="mb-0">
                                    <li>All bookings are subject to availability.</li>
                                    <li>Prices displayed are in INR (Indian Rupees) unless otherwise stated.</li>
                                    <li>Full payment or deposit must be made at the time of booking.</li>
                                    <li>We reserve the right to cancel bookings if payment is not received within the specified time.</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Cancellations & Refunds -->
                        <div class="card bg-transparent p-0">
                            <div class="card-header border-bottom bg-transparent px-0">
                                <h4 class="card-title mb-0">Cancellations & Refunds</h4>
                            </div>
                            <div class="card-body px-0">
                                <p>Cancellation policies vary depending on the tour, hotel, or texi. Non-refundable components (such as certain texi, visas, or cruises) will not be refunded.</p>
                                <ul class="mb-0">
                                    <li>Refunds, if applicable, will be processed within 7–14 business days.</li>
                                    <li>All cancellations must be made in writing or through official communication channels.</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Travel Documents -->
                        <div class="card bg-transparent p-0">
                            <div class="card-header border-bottom bg-transparent px-0">
                                <h4 class="card-title mb-0">Travel Documents</h4>
                            </div>
                            <div class="card-body px-0">
                                <p>Travelers are responsible for ensuring they have valid passports, visas, and other required documents. Zakaru International is not liable for denied boarding or entry due to incomplete documentation.</p>
                            </div>
                        </div>

                        <!-- Liability -->
                        <div class="card bg-transparent p-0">
                            <div class="card-header border-bottom bg-transparent px-0">
                                <h4 class="card-title mb-0">Liability</h4>
                            </div>
                            <div class="card-body px-0">
                                <ul class="mb-0">
                                    <li>We act as an intermediary between travelers and service providers (hotels, texi, etc.).</li>
                                    <li>Zakaru International is not responsible for delays, cancellations, or changes made by third-party providers.</li>
                                    <li>We are not liable for personal injury, loss, or damage during travel.</li>
                                </ul>
                            </div>
                        </div>

                        <!-- User Responsibilities -->
                        <div class="card bg-transparent p-0">
                            <div class="card-header border-bottom bg-transparent px-0">
                                <h4 class="card-title mb-0">User Responsibilities</h4>
                            </div>
                            <div class="card-body px-0">
                                <ul class="mb-0">
                                    <li>You agree not to misuse the website or provide false information.</li>
                                    <li>Any fraudulent activity will result in cancellation of bookings and possible legal action.</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Privacy -->
                        <div class="card bg-transparent p-0">
                            <div class="card-header border-bottom bg-transparent px-0">
                                <h4 class="card-title mb-0">Privacy</h4>
                            </div>
                            <div class="card-body px-0">
                                <p>Personal information provided during booking will be used only for processing reservations and improving services. We respect your privacy and comply with applicable data protection laws.</p>
                            </div>
                        </div>

                        <!-- Changes to Terms -->
                        <div class="card bg-transparent p-0">
                            <div class="card-header border-bottom bg-transparent px-0">
                                <h4 class="card-title mb-0">Changes to Terms</h4>
                            </div>
                            <div class="card-body px-0">
                                <p>Zakaru International reserves the right to update these Terms & Services at any time. Continued use of the website after changes indicates acceptance of the updated terms.</p>
                            </div>
                        </div>

                        <!-- Contact Us -->
                        <div class="card bg-transparent p-0">
                            <div class="card-header border-bottom bg-transparent px-0">
                                <h4 class="card-title mb-0">Contact Us</h4>
                            </div>
                            <div class="card-body px-0">
                                <p>For questions or concerns regarding these Terms & Services, please contact our support team at <strong>support@zakaru.com</strong>.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
