@extends('layouts.app')
@section('content')

<main>
    <section class="pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-xl-8 mx-auto">
                    <div class="card shadow">
                        <img src="{{ asset($hotel->image ?? 'images/default.jpg') }}" class="card-img-top" alt="{{ $hotel->name }}">
                        <div class="card-body text-center p-4">
                            <h1 class="card-title fs-3">🎊 Congratulations! 🎊</h1>
                            <p class="lead mb-3">Your hotel has been booked</p>
                            <h5 class="text-primary mb-4">{{ $hotel->name ?? 'N/A' }}</h5>

                            <div class="row justify-content-between text-start mb-4">
                                <div class="col-lg-5">
                                    <ul class="list-group list-group-borderless">
                                        <li class="list-group-item d-sm-flex justify-content-between align-items-center">
                                            <span class="mb-0"><i class="bi bi-vr fa-fw me-2"></i>Booking ID:</span>
                                            <span class="h6 fw-normal mb-0">{{ $payment->booking_id }}</span>
                                        </li>
                                        <li class="list-group-item d-sm-flex justify-content-between align-items-center">
                                            <span class="mb-0"><i class="bi bi-person fa-fw me-2"></i>Booked by:</span>
                                            <span class="h6 fw-normal mb-0">{{ $user->first_name }} {{ $user->last_name }}</span>
                                        </li>
                                        <li class="list-group-item d-sm-flex justify-content-between align-items-center">
                                            <span class="mb-0"><i class="bi bi-currency-dollar fa-fw me-2"></i>Total Price:</span>
                                            <span class="h6 fw-normal mb-0">${{ number_format($payment->amount, 2) }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-5">
                                    <ul class="list-group list-group-borderless">
                                        <li class="list-group-item d-sm-flex justify-content-between align-items-center">
                                            <span class="mb-0"><i class="bi bi-calendar fa-fw me-2"></i>Date:</span>
                                            <span class="h6 fw-normal mb-0">{{ $payment->created_at->format('d M Y') }}</span>
                                        </li>
                                        <li class="list-group-item d-sm-flex justify-content-between align-items-center">
                                            <span class="mb-0"><i class="bi bi-calendar fa-fw me-2"></i>Check-in:</span>
                                            <span class="h6 fw-normal mb-0">{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</span>
                                        </li>
                                        <li class="list-group-item d-sm-flex justify-content-between align-items-center">
                                            <span class="mb-0"><i class="bi bi-calendar fa-fw me-2"></i>Check-out:</span>
                                            <span class="h6 fw-normal mb-0">{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</span>
                                        </li>
                                        <li class="list-group-item d-sm-flex justify-content-between align-items-center">
                                            <span class="mb-0"><i class="bi bi-people fa-fw me-2"></i>Guests:</span>
                                            <span class="h6 fw-normal mb-0">{{ $payment->guests ?? 1 }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <a href="{{ url('/') }}" class="btn btn-primary mb-0"><i class="bi bi-file-pdf me-2"></i>Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection