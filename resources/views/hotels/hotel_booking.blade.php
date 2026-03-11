@extends('layouts.app')
@section('content')
<main>
    <section class="py-0">
        <div class="container">
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
                        <img src="{{ asset('/images/banner/banner_17.svg') }}" class="mb-n4" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row g-4 g-lg-5">	
                <div class="col-xl-8">
                    <div class="vstack gap-5">
                        <div class="card shadow">
                            <div class="card-header p-4 border-bottom">
                                <h3 class="mb-0"><i class="fa-solid fa-hotel me-2"></i>Hotel Information</h3>
                            </div>
                            <div class="card-body p-4">
                                <div class="card mb-4">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 col-md-3">
                                            @if(count($hotel->property_image) > 0)
                                                <img src="{{ asset($hotel->property_image[0]->url) }}" class="card-img" alt="">
                                            @else
                                                <img src="{{ asset('/images/hotel_1_06.jpg') }}" class="card-img" alt="">
                                            @endif
                                        </div>
                                        <div class="col-sm-6 col-md-9">
                                            <div class="card-body pt-3 pt-sm-0 p-0">
                                                <h5 class="card-title">{{ $hotel->name }}</h5>
                                                <p class="small mb-2"><i class="bi bi-geo-alt me-2"></i>{{ $hotel->address }}</p>
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star-half-alt text-warning"></i></li>
                                                    <li class="list-inline-item ms-2 h6 small fw-bold mb-0">4.5/5.0</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    [$checkIn, $checkOut] = array_map('trim', explode('to', $data['date_range'] ?? ''));
                                    $guestsRaw = $data['guests'] ?? '';
                                    preg_match('/(\d+)\s*Guests?\s*(\d+)\s*Room?/i', $guestsRaw, $matches);
                                    $guests = $matches[1] ?? 0;
                                    $rooms  = $matches[2] ?? 0;

                                    $year = now()->year;
                                    $checkInDate  = \Carbon\Carbon::createFromFormat('d M Y', "$checkIn $year");
                                    $checkOutDate = \Carbon\Carbon::createFromFormat('d M Y', "$checkOut $year");

                                    $nights = $checkInDate->diffInDays($checkOutDate);
                                    $days   = $nights + 1;

                                    $totalPrice = $room->price_per_night * $nights;
                                    $discount = $totalPrice * 0.1;
                                    $priceAfterDiscount = $totalPrice - $discount;
                                    $finalAmount = $priceAfterDiscount + 350;
                                @endphp
                                <div class="row g-4">
                                    <div class="col-lg-4">
                                        <div class="bg-light py-3 px-4 rounded-3">
                                            <h6 class="fw-light small mb-1">Check-in</h6>
                                            <h5 class="mb-1">{{ $checkIn }} {{date('Y')}}</h5>
                                            <small><i class="bi bi-alarm me-1"></i>12:30 pm</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="bg-light py-3 px-4 rounded-3">
                                            <h6 class="fw-light small mb-1">Check out</h6>
                                            <h5 class="mb-1">{{ $checkOut }} {{date('Y')}}</h5>
                                            <small><i class="bi bi-alarm me-1"></i>4:30 pm</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="bg-light py-3 px-4 rounded-3">
                                            <h6 class="fw-light small mb-1">Rooms &amp; Guests</h6>
                                            <h5 class="mb-1">{{ $guestsRaw }}</h5>
                                            <small><i class="bi bi-brightness-high me-1"></i>{{ $nights }} Nights - {{ $days }} Days</small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card border mt-4">
                                    <div class="card-header border-bottom d-md-flex justify-content-md-between">
                                        <h5 class="card-title mb-0">{{ $room->name }}</h5>
                                        {{-- <a href="#" class="btn btn-link p-0 mb-0">View Cancellation Policy</a> --}}
                                    </div>
                                    <div class="card-body">
                                        <h6>Price Included</h6>
                                        <ul class="list-group list-group-borderless mb-0">
                                            <li class="list-group-item h6 fw-light d-flex mb-0">
                                                <i class="bi bi-patch-check-fill text-success me-2"></i>Free Breakfast and Lunch/Dinner.
                                            </li>
                                            <li class="list-group-item h6 fw-light d-flex mb-0">
                                                <i class="bi bi-patch-check-fill text-success me-2"></i>Great Small Breaks.
                                            </li>
                                            <li class="list-group-item h6 fw-light d-flex mb-0">
                                                <i class="bi bi-patch-check-fill text-success me-2"></i>Free Stay for Kids Below the age of 12 years.
                                            </li>
                                            <li class="list-group-item h6 fw-light d-flex mb-0">
                                                <i class="bi bi-patch-check-fill text-success me-2"></i>On Cancellation, You will not get any refund
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow">
                            <div class="card-header border-bottom p-4">
                                <h4 class="card-title mb-0"><i class="bi bi-people-fill me-2"></i>Guest Details</h4>
                            </div>
                            <div class="card-body p-4">
                                <form class="row g-4">
                                    <div class="col-12">
                                        <div class="bg-light rounded-2 px-4 py-3">
                                            <h6 class="mb-0">Main Guest</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-size-lg">
                                            <label class="form-label" for="title">Title</label>
                                            <select id="title" class="form-select js-choice" aria-label="Select title">
                                                <option value="">Select Title</option>
                                                <option value="Mr" selected>Mr</option>
                                                <option value="Mrs">Mrs</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control form-control-lg" placeholder="Enter your name">
                                    </div>

                                    <div class="col-md-5">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control form-control-lg" placeholder="Enter your name">
                                    </div>

                                    {{-- <div class="col-12">
                                        <a href="#" class="btn btn-link mb-0 p-0"><i class="fa-solid fa-plus me-2"></i>Add New Guest</a>
                                    </div> --}}

                                    <div class="col-md-6">
                                        <label class="form-label">Email id</label>
                                        <input type="email" class="form-control form-control-lg" placeholder="Enter your email">
                                        <div id="emailHelp" class="form-text">(Booking Details will be sent to this email ID)</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Mobile number</label>
                                        <input type="text" class="form-control form-control-lg" placeholder="Enter your mobile number">
                                    </div>
                                </form>

                                <div class="alert alert-info my-4" role="alert">
                                    <a href="sign-up.html" class="alert-heading h6">Login</a> to prefill all details and get access to secret deals
                                </div>

                                <div class="card border mt-4">
                                    <div class="card-header border-bottom">
                                        <h5 class="card-title mb-0">Special request</h5>
                                    </div>
                                    <div class="card-body">
                                        <form class="hstack flex-wrap gap-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="hotelType1">
                                                <label class="form-check-label" for="hotelType1">Smoking room</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="hotelType2">
                                                <label class="form-check-label" for="hotelType2">Late check-in</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="hotelType3">
                                                <label class="form-check-label" for="hotelType3">Early check-in</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="hotelType4">
                                                <label class="form-check-label" for="hotelType4">Room on a high floor</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="hotelType5">
                                                <label class="form-check-label" for="hotelType5">Large bed</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="hotelType6">
                                                <label class="form-check-label" for="hotelType6">Airport transfer</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="hotelType8">
                                                <label class="form-check-label" for="hotelType8">Twin beds</label>
                                            </div>
                                        </form>	
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow">
                            <div class="card-header border-bottom p-4">
                                <h4 class="card-title mb-0"><i class="bi bi-wallet-fill me-2"></i>Payment Options</h4>
                            </div>
                            
                            <div class="card-body p-4 pb-0">
                                <div class="bg-primary bg-opacity-10 rounded-3 mb-4 p-3">
                                    <div class="d-md-flex justify-content-md-between align-items-center">
                                        <div class="d-sm-flex align-items-center mb-2 mb-md-0">
                                            <img src="assets/images/element/16.svg" class="h-50px" alt="">
                                            <div class="ms-sm-3 mt-2 mt-sm-0">
                                                <h5 class="card-title mb-0">Get Additional Discount</h5>
                                                <p class="mb-0">Login to access saved payments and discounts!</p>
                                            </div>
                                        </div>
                                        <a href="{{ route('login') }}" class="btn btn-primary mb-0">Login now</a>
                                    </div>
                                </div>
                                <div class="accordion accordion-icon accordion-bg-light" id="accordioncircle">
                                    {{-- <div class="accordion-item mb-3">
                                        <h6 class="accordion-header" id="heading-1">
                                            <button class="accordion-button rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                                                <i class="bi bi-credit-card text-primary me-2"></i>	<span class="me-5">Credit or Debit Card</span>
                                            </button>
                                        </h6>
                                        <div id="collapse-1" class="accordion-collapse collapse" aria-labelledby="heading-1" data-bs-parent="#accordioncircle" style="">
                                            <div class="accordion-body">
                                                <div class="d-sm-flex justify-content-sm-between my-3">
                                                    <h6 class="mb-2 mb-sm-0">We Accept:</h6>
                                                    <ul class="list-inline my-0">
                                                        <li class="list-inline-item"> <a href="#"><img src="assets/images/element/visa.svg" class="h-30px" alt=""></a></li>
                                                        <li class="list-inline-item"> <a href="#"><img src="assets/images/element/mastercard.svg" class="h-30px" alt=""></a></li>
                                                        <li class="list-inline-item"> <a href="#"><img src="assets/images/element/expresscard.svg" class="h-30px" alt=""></a></li>
                                                    </ul>
                                                </div>

                                                <form class="row g-3">
                                                    <div class="col-12">
                                                        <label class="form-label"><span class="h6 fw-normal">Card Number *</span></label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" maxlength="14" placeholder="XXXX XXXX XXXX XXXX">
                                                            <img src="assets/images/element/visa.svg" class="w-30px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block" alt="">
                                                        </div>	
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label"><span class="h6 fw-normal">Expiration date *</span></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" maxlength="2" placeholder="Month">
                                                            <input type="text" class="form-control" maxlength="4" placeholder="Year">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label"><span class="h6 fw-normal">CVV / CVC *</span></label>
                                                        <input type="text" class="form-control" maxlength="3" placeholder="xxx">
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label"><span class="h6 fw-normal">Name on Card *</span></label>
                                                        <input type="text" class="form-control" aria-label="name of card holder" placeholder="Enter card holder name">
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                                                            <div class="d-sm-flex align-items-center mb-3">
                                                                <img src="assets/images/element/12.svg" class="w-40px me-3 mb-2 mb-sm-0" alt=""> 
                                                                <h5 class="alert-heading mb-0">$50,000 Covid Cover &amp; More</h5>
                                                            </div>
                                                            <p class="mb-2">Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                                                            <div class="d-sm-flex align-items-center">
                                                                <a href="#" class="btn btn-sm btn-success mb-2 mb-sm-0 me-3"><i class="fa-regular fa-plus me-2"></i>Add</a>
                                                                <h6 class="mb-0">$69 per person</h6>
                                                            </div>
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="d-sm-flex justify-content-sm-between align-items-center">
                                                            <h4>$1800 <span class="small fs-6">Due now</span></h4>
                                                            <button class="btn btn-primary mb-0">Pay Now</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item mb-3">
                                        <h6 class="accordion-header" id="heading-2">
                                            <button class="accordion-button rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                <i class="bi bi-globe2 text-primary me-2"></i> <span class="me-5">Pay with Net Banking</span>
                                            </button>
                                        </h6>
                                        <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#accordioncircle" style="">
                                            <div class="accordion-body">
                                                <form class="row g-3 mt-1">
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item"> <h6 class="mb-0">Popular Bank:</h6> </li>
                                                        <li class="list-inline-item">
                                                            <input type="radio" class="btn-check" name="options" id="option1">
                                                            <label class="btn btn-light btn-primary-soft-check" for="option1">
                                                                <img src="assets/images/element/13.svg" class="h-20px me-2" alt="">Bank of America
                                                            </label>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <input type="radio" class="btn-check" name="options" id="option2">
                                                            <label class="btn btn-light btn-primary-soft-check" for="option2">
                                                                <img src="assets/images/element/15.svg" class="h-20px me-2" alt="">Bank of Japan
                                                            </label>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <input type="radio" class="btn-check" name="options" id="option3">
                                                            <label class="btn btn-light btn-primary-soft-check" for="option3">
                                                                <img src="assets/images/element/14.svg" class="h-20px me-2" alt="">VIVIV Bank
                                                            </label>
                                                        </li>
                                                    </ul>
                                                    <p class="mb-1">In order to complete your transaction, we will transfer you over to Booking secure servers.</p>
                                                    <p class="my-0">Select your bank from the drop-down list and click proceed to continue with your payment.</p>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="bank">Bank</label>
                                                        <select id="bank" class="form-select form-select-sm js-choice border-0" aria-label="Select Bank">
                                                            <option value="">Please choose one</option>
                                                            <option value="Bank of America">Bank of America</option>
                                                            <option value="Bank of India">Bank of India</option>
                                                            <option value="Bank of London">Bank of London</option>
                                                        </select>
                                                    </div>
                                                    <div class="d-grid">
                                                        <button class="btn btn-success mb-0">Pay $1800</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="accordion-item mb-3">
                                        <h6 class="accordion-header" id="heading-3">
                                            <button class="accordion-button rounded collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                <i class="bi bi-paypal text-primary me-2"></i><span class="me-5">Pay with Razorpay</span>
                                            </button>
                                        </h6>
                                        <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="heading-3" data-bs-parent="#accordioncircle" style="">
                                            <div class="accordion-body">
                                                <div class="card card-body border align-items-center text-center mt-4">
                                                    <img src="assets/images/element/paypal.svg" class="h-70px mb-3" alt="">
                                                    <p class="mb-3"><strong>Tips:</strong> Simply click on the payment button below to proceed to the PayPal payment page.</p>
                                                        <!-- Razorpay Payment Button -->
                                                        <button type="button" id="payBtn" class="btn btn-sm btn-outline-primary mb-0">
                                                            Pay with Razorpay
                                                        </button>
                                                        <input type="hidden" id="payable_id" value="{{ $hotel->id }}">
                                                            <input type="hidden" id="payable_type" value="hotel">
                                                            <input type="hidden" id="final_amount" value="{{ $finalAmount }}">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer p-4 pt-0">
                                <p class="mb-0">By processing, You accept Booking <a href="#">Terms of Services</a> and <a href="#">Policy</a></p>
                            </div>
                        </div>
                    </div>	
                </div>

                <aside class="col-xl-4">
                    <div class="row g-4">
                        <div class="col-md-6 col-xl-12">
                            <div class="card shadow rounded-2">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Price Summary</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-borderless">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0">Room Charges</span>
                                            <span class="fs-5"><i class="fa fa-inr"></i>{{ $totalPrice }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0">Total Discount<span class="badge text-bg-danger smaller mb-0 ms-2">10% off</span></span>
                                            <span class="fs-5 text-success">-<i class="fa fa-inr"></i>{{ $discount }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0">Price after discount</span>
                                            <span class="fs-5"><i class="fa fa-inr"></i>{{ $priceAfterDiscount }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="h6 fw-light mb-0">Taxes % Fees</span>
                                            <span class="fs-5"><i class="fa fa-inr"></i>350</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer border-top">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="h5 mb-0">Payable Now</span>
                                        <span class="h5 mb-0"><i class="fa fa-inr"></i>{{ $finalAmount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-md-6 col-xl-12">
                            <div class="card shadow">
                                <div class="card-header border-bottom">
                                    <div class="cardt-title">
                                        <h5 class="mb-0">Offer &amp; Discount</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="bg-light rounded-2 p-3">
                                        <div class="form-check form-check-inline mb-0">
                                            <input class="form-check-input" type="radio" name="discountOptions" id="discount1" value="option1" checked="">
                                            <label class="form-check-label h5 mb-0" for="discount1">GSTBOOK</label>
                                            <p class="mb-1 small">Congratulations! You have saved <i class="fa fa-inr"></i>230 with GSTBOOK.</p>
                                            <h6 class="mb-0 text-success">-<i class="fa fa-inr"></i>230</h6>
                                        </div>
                                    </div>
                                    <div class="input-group mt-3">
                                        <input class="form-control form-control" placeholder="Coupon code">
                                        <button type="button" class="btn btn-primary">Apply</button>
                                    </div>
                                </div>	
                            </div>
                        </div> --}}
                        <div class="col-md-6 col-xl-12">
                            <div class="card shadow">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-0">Why Sign up or Log in</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-borderless">
                                        <li class="list-group-item d-flex mb-0"><i class="fa-solid fa-check text-success me-2"></i>
                                            <span class="h6 fw-normal">Get Access to Secret Deal</span>
                                        </li>
                                        <li class="list-group-item d-flex mb-0"><i class="fa-solid fa-check text-success me-2"></i>
                                            <span class="h6 fw-normal">Book Faster</span>
                                        </li>
                                        <li class="list-group-item d-flex mb-0"><i class="fa-solid fa-check text-success me-2"></i>
                                            <span class="h6 fw-normal">Manage Your Booking</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</main>

<!-- Payment -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>

document.getElementById('payBtn').onclick = function(){

var amount = document.getElementById('final_amount').value;
var payable_id = document.getElementById('payable_id').value;
var payable_type = document.getElementById('payable_type').value;

// 1️⃣ Create order from server
fetch("{{ route('create.order') }}", {
    method: 'POST',
    headers: {
        'Content-Type':'application/json',
        'X-CSRF-TOKEN':"{{ csrf_token() }}"
    },
    body: JSON.stringify({ amount: amount })
})
.then(res => res.json())
.then(function(data){

    var options = {
        "key": data.key,
        "amount": data.amount * 100,
        "currency": "INR",
        "name": payable_type.charAt(0).toUpperCase() + payable_type.slice(1) + " Booking",
        "description": "Payment for " + payable_type,
        "order_id": data.order_id,
        "handler": function(response){
            
            // 2️⃣ Verify payment server side
            fetch("{{ route('verify.payment') }}", {
                method: 'POST',
                headers: {
                    'Content-Type':'application/json',
                    'X-CSRF-TOKEN':"{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    razorpay_payment_id: response.razorpay_payment_id,
                    razorpay_order_id: response.razorpay_order_id,
                    razorpay_signature: response.razorpay_signature,
                    amount: amount,
                    payable_id: payable_id,
                    payable_type: payable_type
                })
            })
            .then(res => res.json())
            .then(function(res){
                if(res.status === 'success'){
                    window.location.href = res.redirect;
                } else {
                    alert('Payment Failed: ' + res.error);
                }
            });

        }
    };

    var rzp = new Razorpay(options);
    rzp.open();

});

}
</script>
@endsection