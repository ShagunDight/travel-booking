@extends('layouts.app')
@section('content')

<main>
    <section class="pt-4 pt-lg-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h1 class="fs-2 mb-0">Privacy & Booking Policy</h1>
                    <img src="{{ asset('/images/terms01.jpg') }}" class="h-lg-400px rounded-3 mt-4" alt="Privacy Policy">
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="vstack gap-4">

                        <div class="card p-0 bg-transparent">
                            <div class="card-header border-bottom bg-transparent px-0">
                                <h4 class="card-title mb-0">Booking Policy</h4>
                            </div>
                            <div class="card-body px-0">
                                <p> By making a booking with us, you agree to the terms and conditions mentioned below.
                                    All bookings are subject to availability and confirmation at the time of reservation.
                                </p>
                                <p> Prices mentioned on the website are subject to change without prior notice.
                                    Final pricing will be confirmed at the time of booking confirmation.
                                </p>
                                <ul class="list-group list-group-borderless mb-3">
                                    <li class="list-group-item d-flex">
                                        <i class="bi bi-check-circle-fill me-2 text-success"></i>
                                        A minimum advance payment is required to confirm your booking.
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <i class="bi bi-check-circle-fill me-2 text-success"></i>
                                        Guests must carry valid government-issued ID proof during check-in.
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <i class="bi bi-check-circle-fill me-2 text-success"></i>
                                        Smoking and alcohol consumption is allowed only where permitted.
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <i class="bi bi-x-circle-fill me-2 text-danger"></i>
                                        Illegal activities, drugs, or misconduct will result in immediate cancellation without refund.
                                    </li>
                                </ul>
                                <div class="bg-warning bg-opacity-10 rounded-2 p-3">
                                    <p class="mb-0 text-warning">
                                        Any damage to property or violation of rules may attract additional charges.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card bg-transparent p-0">
                            <div class="card-header border-bottom bg-transparent px-0">
                                <h4 class="card-title mb-0">Cancellation Policy</h4>
                            </div>
                            <div class="card-body px-0">
                                <p> Cancellation charges depend on the time of cancellation prior to the scheduled travel date.
                                    All cancellations must be made in writing or through official communication channels.
                                </p>
                                <div class="table-responsive-lg">
                                    <table class="table table-bordered rounded-2 mb-0">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Cancellation Period</th>
                                                <th>Refund Policy</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>0 – 24 hours before departure</td>
                                                <td>Non-Refundable</td>
                                            </tr>
                                            <tr>
                                                <td>24 hours – 7 days before departure</td>
                                                <td>30% cancellation charges</td>
                                            </tr>
                                            <tr>
                                                <td>More than 7 days before departure</td>
                                                <td>Full refund (excluding service fees)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <ul class="mt-4 mb-0">
                                    <li>Refunds will be processed within 7–10 working days.</li>
                                    <li>No refund for no-shows or early departures.</li>
                                    <li>Government taxes and third-party charges are non-refundable.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="card bg-transparent p-0">
                            <div class="card-header border-bottom bg-transparent px-0">
                                <h4 class="card-title mb-0">Date Change Policy</h4>
                            </div>
                            <div class="card-body px-0">
                                <p> Date changes are subject to availability and approval.
                                    Any fare difference or service charges applicable at the time of change must be paid by the customer.
                                </p>
                                <ul class="mb-0">
                                    <li>Date change requests must be raised at least 48 hours in advance.</li>
                                    <li>Only one date change is allowed per booking.</li>
                                    <li>Promotional or discounted bookings may not be eligible for date changes.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="card bg-transparent p-0">
                            <div class="card-header border-bottom bg-transparent px-0">
                                <h4 class="card-title mb-0">Special Requests</h4>
                            </div>
                            <div class="card-body px-0">
                                <p> Special requests such as room preferences, meals, early check-in, or late check-out
                                    are subject to availability and cannot be guaranteed.
                                </p>
                                <ul class="mb-0">
                                    <li>Special requests may involve additional charges.</li>
                                    <li>We recommend sharing special requirements at the time of booking.</li>
                                    <li>Fulfillment of requests depends on service providers and operational conditions.</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
