@extends('layouts.app')

@section('content')

<main>
    <section class="py-0">
        <div class="container">
            <div class="row mt-4 align-items-center">
                <div class="col-12">
                    <div class="card bg-light overflow-hidden px-sm-5">
                        <div class="row align-items-center g-4">
                            <div class="col-sm-9">
                                <div class="card-body">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-dots mb-0">
                                            <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house me-1"></i> Home</a></li>
                                            <li class="breadcrumb-item">Hotel detail</li>
                                            <li class="breadcrumb-item active">Booking</li>
                                        </ol>
                                    </nav>
                                    <h1 class="m-0 h2 card-title">Review your Booking</h1>
                                </div>
                            </div>	
                            <div class="col-sm-3 text-end d-none d-sm-block">
                                <img src="assets/images/element/17.svg" class="mb-n4" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div id="stepper" class="bs-stepper stepper-outline">
                <div class="bs-stepper-header" role="tablist">
                    <div class="step active" data-target="#step-1">
                        <div class="text-center">
                            <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger1" aria-controls="step-1" aria-selected="true">
                                <span class="bs-stepper-circle">1</span>
                            </button>
                            <h6 class="bs-stepper-label d-none d-md-block">Tour Review</h6>
                        </div>
                    </div>
                    <div class="line"></div>

                    <div class="step" data-target="#step-2">
                        <div class="text-center">
                            <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger2" aria-controls="step-2" aria-selected="false">
                                <span class="bs-stepper-circle">2</span>
                            </button>
                            <h6 class="bs-stepper-label d-none d-md-block">Traveler Info</h6>
                        </div>
                    </div>
                    <div class="line"></div>

                    <div class="step" data-target="#step-3">
                        <div class="text-center">
                            <button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger3" aria-controls="step-3" aria-selected="false">
                                <span class="bs-stepper-circle">3</span>
                            </button>
                            <h6 class="bs-stepper-label d-none d-md-block">Make Payment</h6>
                        </div>
                    </div>
                </div>
                <div class="bs-stepper-content p-0 pt-4">
                    <div class="row g-4">
                        <div class="col-xl-8">
                            <form onsubmit="return false">
                                <div id="step-1" role="tabpanel" class="content fade active dstepper-block" aria-labelledby="steppertrigger1">
                                    <div class="vstack gap-4">
                                        <h4 class="mb-0">Tour Review</h4>
                                        <hr class="my-0">
                                        <div class="card shadow rounded-2 overflow-hidden">
                                            <div class="row g-0">
                                                <div class="col-sm-6 col-md-4">
                                                    <img src="{{ url('/images/tour_1_01.jpg') }}" class="" alt="">
                                                </div>
                                                <div class="col-sm-6 col-md-8">
                                                    <div class="card-body p-3">
                                                        <h5 class="card-title mb-1"><a href="#">Beautiful Bali with Malaysia</a></h5>
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                            <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                            <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                            <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                            <li class="list-inline-item me-0 small"><i class="fa-solid fa-star-half-alt text-warning"></i></li>
                                                        </ul>
                                                        <ul class="nav nav-divider small mb-0 mt-2">
                                                            <li class="nav-item mb-1"><i class="far fa-calendar-alt me-2"></i>April 12-17</li>
                                                            <li class="nav-item mb-1"><i class="fa-solid fa-bed me-2"></i>1 Room</li>
                                                            <li class="nav-item mb-1"><i class="bi bi-people-fill me-2"></i>2 Guests</li>
                                                            <li class="nav-item mb-1"><i class="bi bi-geo-alt-fill me-2"></i>From New York</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        {{-- <div class="card border">
                                            <div class="card-header border-bottom d-flex justify-content-between">
                                                <h5 class="mb-0">Flight Details</h5>
                                                <a href="#" class="btn btn-link p-0 mb-0 text-primary-hover text-reset text-decoration-underline">View details</a>
                                            </div>
                                            <div class="card-body">
                                                <div class="p-3 bg-light rounded-2 d-sm-flex justify-content-sm-between align-items-center mb-4">
                                                    <h6 class="mb-0">New York - Malaysia</h6>
                                                    <h6 class="fw-normal mb-0"><span class="text-body">Date:</span> 12 April 2022</h6>
                                                </div>
                                                <div class="row g-4">
                                                    <div class="col-md-3">
                                                        <img src="https://stackbros.in/bookinga/landing/assets/images/element/09.svg" class="w-80px mb-3" alt="">
                                                        <h6 class="fw-normal small mb-0">Phillippines Airline</h6>
                                                    </div>
                                                    <div class="col-4 col-md-3">
                                                        <h5>CDG</h5>
                                                        <h6 class="mb-0">2:50 pm</h6>
                                                    </div>
                                                    <div class="col-4 col-md-3 text-center">
                                                        <h6>5hr 50min</h6>
                                                        <div class="position-relative my-4">
                                                            <hr class="bg-primary opacity-5 position-relative">
                                                            <div class="icon-md bg-primary text-white rounded-circle position-absolute top-50 start-50 translate-middle">
                                                                <i class="fa-solid fa-fw fa-plane"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-3 text-end">
                                                        <h5>JFK</h5>
                                                        <h6 class="mb-0">7:35 pm</h6>
                                                    </div>
                                                </div>
                                                <div class="p-3 bg-light rounded-2 d-sm-flex justify-content-sm-between align-items-center text-center my-4">
                                                    <h6 class="mb-1 mb-sm-0">Malaysia - New York</h6>
                                                    <h6 class="fw-normal mb-0"><span class="text-body">Date:</span> 18 April 2022</h6>
                                                </div>
                                                <div class="row g-4">
                                                    <div class="col-md-3">
                                                        <img src="https://stackbros.in/bookinga/landing/assets/images/element/09.svg" class="w-80px mb-3" alt="">
                                                        <h6 class="fw-normal small mb-0">Phillippines Airline</h6>
                                                    </div>
                                                    <div class="col-4 col-md-3">
                                                        <h5>JFK</h5>
                                                        <h6 class="mb-0">5:50 am</h6>
                                                    </div>
                                                    <div class="col-4 col-md-3 text-center">
                                                        <h6>5hr 50min</h6>
                                                        <div class="position-relative my-4">
                                                            <hr class="bg-primary opacity-5 position-relative">
                                                            <div class="icon-md bg-primary text-white rounded-circle position-absolute top-50 start-50 translate-middle">
                                                                <i class="fa-solid fa-fw fa-plane"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-3 text-end">
                                                        <h5>CDG</h5>
                                                        <h6 class="mb-0">11:35 am</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="card border">
                                            <div class="card-header border-bottom d-flex justify-content-between">
                                                <h5 class="mb-0">Hotel Details</h5>
                                                <a href="#" class="btn btn-link p-0 mb-0 text-primary-hover text-reset text-decoration-underline">View details</a>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <h6>Courtyard by Marriott New York</h6>
                                                        <h6 class="mb-1 fw-light"><span class="text-secondary">Room:</span> Deluxe Pool View with Breakfast</h6>
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                                            <li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <h6 class="mb-0">12 April 2022</h6>
                                                        <p class="text-success mb-0">Breakfast Included</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <h6>Park Plaza Lodge Hotel</h6>
                                                        <h6 class="mb-1 fw-light"><span class="text-secondary">Room:</span> Deluxe Pool View with Breakfast</h6>
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                                            <li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <h6 class="mb-0">14 April 2022</h6>
                                                        <p class="text-success mb-0">Breakfast Included</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <h6>Pride moon Village Resort &amp; Spa</h6>
                                                        <h6 class="mb-1 fw-light"><span class="text-secondary">Room:</span> Deluxe Pool View with Breakfast</h6>
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                                            <li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <h6 class="mb-0">16 April 2022</h6>
                                                        <p class="text-success mb-0">Breakfast Included</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border">
                                            <div class="card-header border-bottom d-flex justify-content-between">
                                                <h5 class="mb-0">Transfer Details</h5>
                                                <a href="#" class="btn btn-link p-0 mb-0 text-primary-hover text-reset text-decoration-underline">View details</a>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex gap-1 justify-content-between flex-wrap">
                                                    <h6 class="mb-0">Private Transfer</h6>
                                                    <p class="mb-0">Vehicle type: <span class="h6 fw-light">Sedan - AC</span></p>
                                                    <h6 class="mb-0 fw-normal">12 April 2022</h6>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border">
                                            <div class="card-header border-bottom">
                                                <h5 class="mb-0">Cancellation &amp; Date change</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-group list-group-borderless">
                                                    <li class="list-group-item">
                                                        <span class="h6 fw-normal me-1 mb-0"><i class="bi bi-dot"></i>10 days:</span>
                                                        <span>100%</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="h6 fw-normal me-1 mb-0"><i class="bi bi-dot"></i>10 to 15 days:</span>
                                                        <span>75% + Non Refundable Component</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="h6 fw-normal me-1 mb-0"><i class="bi bi-dot"></i>15 to 30 days:</span>
                                                        <span>30% + Non Refundable Component</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="h6 fw-normal me-1 mb-0"><i class="bi bi-dot"></i>10Hotel / Air:</span>
                                                        <span>100% in case of non-refundable ticket / Hotel Room</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="h6 fw-normal me-1 mb-0"><i class="bi bi-dot"></i>10Cruise / Visa:</span>
                                                        <span>On Actuals</span>
                                                    </li>
                                                </ul>
                                                <p class="mt-2">All Prices are in Indian Rupees and are subject to change without prior notice.<br>In the case FIT flight inclusive package, the full amount of the flight will be payable at the time of booking.</p>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button class="btn btn-primary next-btn mb-0">Next</button>
                                        </div>
                                    </div>
                                </div>

                                <div id="step-2" role="tabpanel" class="content fade dstepper-none" aria-labelledby="steppertrigger2">
                                    <div class="vstack gap-4">
                                        <h4 class="mb-0">Traveler Detail</h4>
                                        <hr class="my-0">
                                        <div class="alert alert-warning d-flex" role="alert">
                                            <span class="alert-heading h5 mb-0 me-2"><i class="bi bi-exclamation-octagon-fill"></i></span>
                                            A customer passport is mandatory. The passport must have 2 blank pages and 6-month validity.
                                        </div>
                                        <div class="card border">
                                            <div class="card-header border-bottom">
                                                <h5 class="mb-0">Traveler 1</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row g-4">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Title</label>
                                                        <div class="form-control-bg-light">
                                                            <label class="form-label" for="title">Title</label>

                                                            <select id="title" class="form-select form-select-sm js-choice border-0" aria-label="Select Title">
                                                                <option value="">Select Title</option>
                                                                <option value="Mr" selected>Mr</option>
                                                                <option value="Mrs">Mrs</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-control-bg-light">
                                                            <label class="form-label">First name</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-control-bg-light">
                                                            <label class="form-label">Last name</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-control-bg-light">
                                                            <label class="form-label">Date of birth</label>
                                                            <input type="text" class="form-control flatpickr flatpickr-input" data-date-format="d M Y" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-control-bg-light">
                                                            <label class="form-label">Passport number</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border">
                                            <div class="card-header border-bottom">
                                                <h5 class="mb-0">Traveler 2</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row g-4">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Title</label>
                                                        <div class="form-control-bg-light">
                                                            <select id="title" class="form-select form-select-sm js-choice border-0" aria-label="Select Title">
                                                                <option value="">Select Title</option>
                                                                <option value="Mr" selected>Mr</option>
                                                                <option value="Mrs">Mrs</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-control-bg-light">
                                                            <label class="form-label">First name</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-control-bg-light">
                                                            <label class="form-label">Last name</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-control-bg-light">
                                                            <label class="form-label">Date of birth</label>
                                                            <input type="text" class="form-control flatpickr flatpickr-input" data-date-format="d M Y" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-control-bg-light">
                                                            <label class="form-label">Passport number</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border">
                                            <div class="card-header border-bottom">
                                                <h5 class="mb-0">Your booking detail will be sent here</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row g-4">
                                                    <div class="col-md-6">
                                                        <div class="form-control-bg-light">
                                                            <label class="form-label">Mobile Number</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-control-bg-light">
                                                            <label class="form-label">Email id</label>
                                                            <input type="email" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hstack gap-2 flex-wrap justify-content-between">
                                            <button class="btn btn-secondary prev-btn mb-0">Previous</button>
                                            <button class="btn btn-primary next-btn mb-0">Continue to payment</button>
                                        </div>
                                    </div>	
                                </div>

                                <div id="step-3" role="tabpanel" class="content fade dstepper-none" aria-labelledby="steppertrigger3">
                                    <div class="vstack gap-4">
                                        <h4 class="mb-0">Payment options</h4>
                                        <hr class="my-0">
                                        <div class="card border">
                                            <div class="card-header border-bottom d-sm-flex justify-content-between align-items-center">
                                                <h5 class="mb-2 mb-sm-0">Credit or Debit Card</h5>
                                                <ul class="list-inline my-0">
                                                    <li class="list-inline-item"> <a href="#"><img src="assets/images/element/visa.svg" class="h-30px" alt=""></a></li>
                                                    <li class="list-inline-item"> <a href="#"><img src="assets/images/element/mastercard.svg" class="h-30px" alt=""></a></li>
                                                    <li class="list-inline-item"> <a href="#"><img src="assets/images/element/expresscard.svg" class="h-30px" alt=""></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="row g-4">
                                                    <div class="col-12">
                                                        <label class="form-label">Card Number</label>
                                                        <div class="position-relative form-control-bg-light">
                                                            <input type="text" class="form-control" maxlength="14" placeholder="XXXX XXXX XXXX XXXX">
                                                            <img src="assets/images/element/visa.svg" class="w-30px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block" alt="">
                                                        </div>	
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Expiration Month</label>
                                                        <div class="form-control-bg-light">
                                                            <input type="text" class="form-control" maxlength="2">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Expiration Year</label>
                                                        <div class="form-control-bg-light">
                                                            <input type="text" class="form-control" maxlength="4">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">CVV / CVC</label>
                                                        <div class="form-control-bg-light">
                                                            <input type="text" class="form-control" maxlength="3" placeholder="XXX">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Name of the cardholder</label>
                                                        <div class="form-control-bg-light">
                                                            <input type="text" class="form-control" aria-label="name of the cardholder">
                                                        </div>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border">
                                            <div class="card-header border-bottom">
                                                <h5 class="mb-0">Pay with Paypal</h5>
                                            </div>
                                            <div class="card-body text-center">
                                                <img src="assets/images/element/paypal.svg" class="h-70px mb-3" alt="">
                                                <p class="mb-3"><strong>Tips:</strong> Simply click on the payment button below to proceed to the PayPal payment page.</p>
                                                <a href="#" class="btn btn-sm btn-outline-primary mb-0">Pay with Paypal</a>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-secondary prev-btn mb-0">Previous</button>
                                            <button class="btn btn-success next-btn mb-0">Pay now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <aside class="col-xl-4">
                            <div class="vstack gap-4">
                                <div class="card border">
                                    <div class="card-header border-bottom">
                                        <h5 class="card-title mb-0">Price Summary</h5>
                                    </div>
            
                                    <div class="card-body">
                                        <ul class="list-group list-group-borderless">
                                            <li class="list-group-item d-flex justify-content-between align-items-center pt-0">
                                                <span class="h6 fw-light mb-0">Base Price</span>
                                                <span class="fs-5">$28,660</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span class="h6 fw-light mb-0">Total Discount<span class="badge text-bg-danger smaller mb-0 ms-2">10% off</span></span>
                                                <span class="fs-5 text-success">-$2,560</span>	
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center pb-0">
                                                <span class="h6 fw-light mb-0">Taxes % Fees</span>
                                                <span class="fs-5">$350</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="card-footer border-top">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="h5 mb-0">Payable Now</span>
                                            <span class="h5 mb-0">$22,500</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border">
                                    <div class="card-header border-bottom">
                                        <h5 class="card-title mb-0">Sign In Now To Book An Online </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-control-bg-light">
                                            <label class="form-label">Email id</label>
                                            <input type="email" class="form-control form-control-lg" placeholder="Enter your email">
                                        </div>
                                        <div class="mt-4 form-control-bg-light">
                                            <label class="form-label">Mobile number</label>
                                            <input type="text" class="form-control form-control-lg" placeholder="Enter your mobile number">
                                        </div>
                                        <div class="mt-4 form-check form-check-light mb-0">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">I Already Have Booking Account</label>
                                        </div>
                                        <div class="d-grid mt-4">
                                            <button class="btn btn-primary next-btn mb-0">Book as Guest</button>
                                        </div>
                                        <div class="position-relative my-4">
                                            <hr>
                                            <p class="small position-absolute top-50 start-50 translate-middle bg-mode text-center">Or via social media</p>
                                        </div>
                                        <div class="d-grid gap-2 d-md-block text-center">
                                            <button class="btn btn-sm bg-facebook mb-0" type="button"><i class="fa-brands fa-facebook-f me-2"></i>Facebook</button>
                                            <button class="btn btn-sm bg-google mb-0" type="button"><i class="fa-brands fa-google me-2"></i>Google</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
