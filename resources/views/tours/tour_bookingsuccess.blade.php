@extends('layouts.app')
@section('content')

<main>
    <section class="pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-xl-8 mx-auto">
                    <div class="card shadow">
                    <img src="{{ asset($tour->image->url ?? 'images/default.jpg') }}"
                            class="card-img-top"
                            alt="{{ $tour->name }}">
                        <div class="card-body text-center p-4">
                            <h1 class="card-title fs-3">🎊 Congratulations! 🎊</h1>
                            <p class="lead mb-3">Your trip has been booked</p>
                            <h5 class="text-primary mb-4">{{ $tour->name ?? 'N/A' }}</h5>

                            <div class="row justify-content-between text-start mb-4">
                                <div class="col-lg-5">
                                    <ul class="list-group list-group-borderless">
                                        <li class="list-group-item d-sm-flex justify-content-between align-items-center">
                                            <span class="mb-0"><i class="bi bi-vr fa-fw me-2"></i>Booking ID:</span>
                                            <span class="h6 fw-normal mb-0">{{ $payment->booking_id}}</span>
                                        </li>
                                        <li class="list-group-item d-sm-flex justify-content-between align-items-center">
                                            <span class="mb-0"><i class="bi bi-person fa-fw me-2"></i>Booked by:</span>
                                            <span class="h6 fw-normal mb-0">{{ $user->name }}</span>
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
                                            <span class="mb-0"><i class="bi bi-calendar fa-fw me-2"></i>Tour Date:</span>
                                            <span class="h6 fw-normal mb-0">{{ \Carbon\Carbon::parse($tour->start_date)->format('d M Y') }}</span>
                                        </li>
                                        <li class="list-group-item d-sm-flex justify-content-between align-items-center">
                                            <span class="mb-0"><i class="bi bi-people fa-fw me-2"></i>Guests:</span>
                                            <span class="h6 fw-normal mb-0">{{ $payment->guests ?? 1 }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
<!-- 
                            <div class="d-sm-flex justify-content-sm-end d-grid">
                                <div class="dropdown me-sm-2 mb-2 mb-sm-0">
                                    <a href="#" class="btn btn-light mb-0 w-100" role="button" id="dropdownShare" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-share me-2"></i>Share
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare">
                                        <li><a class="dropdown-item" href="#"><i class="fab fa-twitter-square me-2"></i>Twitter</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fab fa-facebook-square me-2"></i>Facebook</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-copy me-2"></i>Copy link</a></li>
                                    </ul>
                                </div>
                                <a href="#" class="btn btn-primary mb-0"><i class="bi bi-file-pdf me-2"></i>Download PDF</a>
                            </div> -->

                            <a href="/" class="btn btn-primary mb-0"><i class="bi bi-file-pdf me-2"></i>Back to Home</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection