@extends('layouts.app')
@section('content')

<main>
    <section class="pt-3">
        <div class="container">
            <div class="row g-2 g-lg-4">
                <div class="col-lg-12 col-xl-12 ps-xl-5">
                    <div class="card border bg-transparent">
                        <div class="card-header bg-transparent border-bottom">
                            <h4 class="card-header-title">My Bookings</h4>
                        </div>

                        <div class="card-body p-0">
                            <ul class="nav nav-tabs nav-bottom-line nav-responsive nav-justified" role="tablist">
                                <li class="nav-item" role="presentation"> 
                                    <a class="nav-link mb-0 active" data-bs-toggle="tab" href="#tab-1" aria-selected="true" role="tab"><i class="bi bi-briefcase-fill fa-fw me-1"></i>Upcoming Booking</a> 
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link mb-0" data-bs-toggle="tab" href="#tab-2" aria-selected="false" tabindex="-1" role="tab"><i class="bi bi-x-octagon fa-fw me-1"></i>Canceled Booking</a> 
                                    </li>
                                <li class="nav-item" role="presentation"> 
                                    <a class="nav-link mb-0" data-bs-toggle="tab" href="#tab-3" aria-selected="false" tabindex="-1" role="tab"><i class="bi bi-patch-check fa-fw me-1"></i>Completed Booking</a> 
                                </li>
                            </ul>

                            <div class="tab-content p-2 p-sm-4" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                                    <h6>Completed booking (2)</h6>
                                    <div class="card border mb-4">
                                        <div class="card-header border-bottom d-md-flex justify-content-md-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="icon-lg bg-light rounded-circle flex-shrink-0">
                                                    <i class="fa-solid fa-plane"></i>
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="card-title mb-0">France to New York</h6>
                                                    <ul class="nav nav-divider small">
                                                        <li class="nav-item">Booking ID: CGDSUAHA12548</li>
                                                        <li class="nav-item">Business class</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            {{-- <div class="mt-2 mt-md-0">
                                                <a href="#" class="btn btn-primary-soft mb-0">Manage Booking</a>
                                            </div> --}}
                                        </div>
        
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-sm-6 col-md-4">
                                                    <span>Departure time</span>
                                                    <h6 class="mb-0">Tue 05 Aug 12:00 AM</h6>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <span>Arrival time</span>
                                                    <h6 class="mb-0">Tue 06 Aug 4:00 PM</h6>
                                                </div>
                                                <div class="col-md-4">
                                                    <span>Booked by</span>
                                                    <h6 class="mb-0">Frances Guerrero</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card border">
                                        <div class="card-header border-bottom d-md-flex justify-content-md-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="icon-lg bg-light rounded-circle flex-shrink-0">
                                                    <i class="fa-solid fa-car"></i>
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="card-title mb-0">Chicago to San Antonio</h6>
                                                    <ul class="nav nav-divider small">
                                                        <li class="nav-item">Booking ID: CGDSUAHA12548</li>
                                                        <li class="nav-item">Camry, Accord</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            {{-- <div class="mt-2 mt-md-0">
                                                <a href="#" class="btn btn-primary-soft mb-0">Manage Booking</a>
                                            </div> --}}
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-sm-6 col-md-4">
                                                    <span>Pickup address</span>
                                                    <h6 class="mb-0">40764 Winchester Rd</h6>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <span>Drop address</span>
                                                    <h6 class="mb-0">11185 Mary Ball Rd</h6>
                                                </div>
                                                <div class="col-md-4">
                                                    <span>Booked by</span>
                                                    <h6 class="mb-0">Frances Guerrero</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <h6>Cancelled booking (1)</h6>
                                    <div class="card border">
                                        <div class="card-header border-bottom d-md-flex justify-content-md-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="icon-lg bg-light rounded-circle flex-shrink-0">
                                                    <i class="fa-solid fa-hotel"></i>
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="card-title mb-0">Courtyard by Marriott New York</h6>
                                                    <ul class="nav nav-divider small">
                                                        <li class="nav-item">Booking ID: CGDSUAHA12548</li>
                                                        <li class="nav-item">AC</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mt-2 mt-md-0">
                                                {{-- <a href="#" class="btn btn-primary-soft mb-0">Manage Booking</a> --}}
                                                <p class="text-danger text-md-end mb-0">Booking cancelled</p>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-sm-6 col-md-4">
                                                    <span>Check in time</span>
                                                    <h6 class="mb-0">Tue 05 Aug 12:00 AM</h6>
                                                </div>
        
                                                <div class="col-sm-6 col-md-4">
                                                    <span>Check out time</span>
                                                    <h6 class="mb-0">Tue 12 Aug 4:00 PM</h6>
                                                </div>
        
                                                <div class="col-md-4">
                                                    <span>Booked by</span>
                                                    <h6 class="mb-0">Frances Guerrero</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <h6>Completed Booking (1)</h6>
                                    <div class="card border">
                                        <div class="card-header border-bottom d-md-flex justify-content-md-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="icon-lg bg-light rounded-circle flex-shrink-0">
                                                    <i class="fa-solid fa-hotel"></i>
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="card-title mb-0">Courtyard by Marriott New York</h6>
                                                    <ul class="nav nav-divider small">
                                                        <li class="nav-item">Booking ID: CGDSUAHA12548</li>
                                                        <li class="nav-item">AC</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mt-2 mt-md-0">
                                                {{-- <a href="#" class="btn btn-primary-soft mb-0">Manage Booking</a> --}}
                                                {{-- <p class="text-danger text-md-end mb-0">Booking cancelled</p> --}}
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-sm-6 col-md-4">
                                                    <span>Check in time</span>
                                                    <h6 class="mb-0">Tue 05 Aug 12:00 AM</h6>
                                                </div>
        
                                                <div class="col-sm-6 col-md-4">
                                                    <span>Check out time</span>
                                                    <h6 class="mb-0">Tue 12 Aug 4:00 PM</h6>
                                                </div>
        
                                                <div class="col-md-4">
                                                    <span>Booked by</span>
                                                    <h6 class="mb-0">Frances Guerrero</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection