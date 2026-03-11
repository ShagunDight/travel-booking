@extends('layouts.app')
@section('content')

    <main>
        <section class="pt-0 pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 ms-auto position-relative">
                        <img src="{{ asset('/images/texi/texi01.jpg') }}" class="rounded-3" alt="">
                        <div class="col-11 col-sm-10 col-lg-8 col-xl-6 position-lg-middle ms-lg-8 ms-xl-7">
                            <div class="card shadow pb-0 mt-n7 mt-sm-n8 mt-lg-0">
                                <div class="card-header border-bottom p-3 p-sm-4">
                                    <h5 class="card-title mb-0">Book Your Online Taxi</h5>
                                </div>
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <form action="{{ route('taxi.texi_inquery') }}" method="POST" class="card-body form-control-border p-3 p-sm-4">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 mb-4 form-control-bg-light">
                                            <input type="text" name="name" class="form-control" placeholder="Your Name">
                                        </div>
                                        <div class="col-lg-6 mb-4 form-control-bg-light">
                                            <input type="number" name="number" class="form-control" placeholder="Contact Number">
                                        </div>
                                    </div>
                                    <div class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <div class="form-check form-check-inline active" id="cab2-one-way-tab" data-bs-toggle="pill" data-bs-target="#cab2-one-way" role="tab" aria-controls="cab2-one-way" aria-selected="true">
                                            <input class="form-check-input" type="radio" name="trip_type" id="cabRadio1" value="one_way" checked="">
                                            <label class="form-check-label" for="cabRadio1">One Way</label>
                                        </div>
                                        <div class="form-check form-check-inline" id="cab2-round-way-tab" data-bs-toggle="pill" data-bs-target="#cab2-round-way" role="tab" aria-controls="cab2-round-way" aria-selected="false" tabindex="-1">
                                            <input class="form-check-input" type="radio" name="trip_type" id="cabRadio2" value="round_trip">
                                            <label class="form-check-label" for="cabRadio2">Round Trip</label>
                                        </div>
                                    </div>
                                    <div class="tab-content my-4" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="cab2-one-way" role="tabpanel" aria-labelledby="cab2-one-way-tab">
                                            <div class="row g-2 g-md-4">
                                                <div class="col-md-6 position-relative">
                                                    <div class="form-fs-lg form-control-transparent">
                                                        {{-- <label class="form-label small">Pickup</label> --}}
                                                        <input type="text" name="pickup" class="form-control" placeholder="Pickup Location">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-md-end">
                                                    <div class="form-fs-lg form-control-transparent">
                                                        {{-- <label class="form-label small ms-3 ms-md-0 me-md-3">Drop</label> --}}
                                                        <input type="text" name="drop" class="form-control text-md-end" placeholder="Drop location">
                                                    </div>	
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-fs-lg form-control-transparent">
                                                        {{-- <label class="form-label small">Pickup Date</label> --}}
                                                        <input type="text" name="pickupDate" class="form-control flatpickr flatpickr-input" placeholder="Pickup Date" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-md-end">
                                                    <div class="form-fs-lg form-control-transparent">
                                                        {{-- <label class="form-label small ms-3 ms-md-0 me-md-3">Pickup time</label> --}}
                                                        <input type="text" name="pickupTime" class="form-control flatpickr text-md-end flatpickr-input" data-enabletime="true" data-nocalendar="true" placeholder="Pickup Time" readonly="readonly">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="cab2-round-way" role="tabpanel" aria-labelledby="cab2-round-way-tab">
                                            <div class="row g-2 g-md-4">
                                                <div class="col-md-6 position-relative">
                                                    {{-- <label class="form-label small">Pickup</label> --}}
                                                    <select class="form-select js-choice" name="pickup_location" data-search-enabled="true">
                                                        <option value="">Pickup Location</option>
                                                        <option value="New York">New York</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Paris">Paris</option>
                                                    </select>
                                                    <div class="btn-flip-icon z-index-9 mt-2 mt-md-1">
                                                        <button class="btn btn-dark shadow btn-round mb-0"><i class="fa-solid fa-right-left"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 text-sm-end">
                                                    {{-- <label class="form-label small ms-3 ms-md-0 me-md-3">Drop</label> --}}
                                                    <select class="form-select js-choice" name="drop_location" data-search-enabled="true">
                                                        <option value="">Drop Location</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="New York">New York</option>
                                                        <option value="Paris">Paris</option>
                                                    </select>	
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-fs-lg form-control-transparent">
                                                        {{-- <label class="form-label small">Pickup Date</label> --}}
                                                        <input type="text" name="pickupDate2" class="form-control flatpickr flatpickr-input" placeholder="Pickup Date" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 text-sm-end">
                                                    <div class="form-fs-lg form-control-transparent">
                                                        {{-- <label class="form-label small ms-3 ms-md-0 me-md-3">Pickup time</label> --}}
                                                        <input type="text" name="pickupTime2" class="form-control flatpickr text-sm-end flatpickr-input" data-enabletime="true" data-nocalendar="true" placeholder="Pickup Time" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-fs-lg form-control-transparent">
                                                        {{-- <label class="form-label small">Return Date</label> --}}
                                                        <input type="text" name="returnDate" class="form-control flatpickr flatpickr-input" placeholder="Return Date" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 text-sm-end">
                                                    <div class="form-fs-lg form-control-transparent">
                                                        {{-- <label class="form-label small ms-3 ms-md-0 me-md-3">Return time</label> --}}
                                                        <input type="text" name="returnTime" class="form-control flatpickr text-sm-end flatpickr-input" data-enabletime="true" data-nocalendar="true" placeholder="Return Time" readonly="readonly">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 form-control-bg-light">
                                        <textarea class="form-control" rows="4" name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-dark mb-0" type="submit">Send Inquery</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-0 pt-md-5">
            <div class="container">

                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2 class="mb-0">Our Awesome Vehicles</h2>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow text-center align-items-center h-100 p-4">
                            <div class="icon-xxl bg-light rounded-circle">
                                <img src="{{ asset('/images/texi/seadan.svg') }}" class="w-90px" alt="">
                            </div>
                            <div class="card-body px-0 pb-0">
                                <h5 class="card-title"><a href="#" class="stretched-link">Sedan</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow text-center align-items-center h-100 p-4">
                            <div class="icon-xxl bg-light rounded-circle">
                                <img src="{{ asset('/images/texi/micro.svg') }}" class="w-90px" alt="">
                            </div>
                            <div class="card-body px-0 pb-0">
                                <h5 class="card-title"><a href="#" class="stretched-link">Micro</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow text-center align-items-center h-100 p-4">
                            <div class="icon-xxl bg-light rounded-circle">
                                <img src="{{ asset('/images/texi/suv-2.svg') }}" class="w-90px" alt="">
                            </div>
                            <div class="card-body px-0 pb-0">
                                <h5 class="card-title"><a href="#" class="stretched-link">CUV</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow text-center align-items-center h-100 p-4">
                            <div class="icon-xxl bg-light rounded-circle">
                                <img src="{{ asset('/images/texi/suv.svg') }}" class="w-90px" alt="">
                            </div>
                            <div class="card-body px-0 pb-0">
                                <h5 class="card-title"><a href="#" class="stretched-link">SUV</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-0 pt-xl-5">
            <div class="container">
                <div class="row mb-3 mb-sm-4">
                    <div class="col-12 text-center">
                        <h2>Why Choose Us</h2>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-body shadow p-4 h-100">
                            <div class="icon-lg bg-primary bg-opacity-10 text-primary rounded-circle mb-4"><i class="bi bi-lightning-fill fs-5"></i></div>
                            <h5>Advance Booking</h5>
                            <p class="mb-0">Happiness prosperous impression had conviction For every delay in they Extremity now. </p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-body shadow p-4 h-100">
                            <div class="icon-lg bg-success bg-opacity-10 text-success rounded-circle mb-4"><i class="fa-solid fa-leaf fs-5"></i></div>
                            <h5>Economical Trip</h5>
                            <p class="mb-0">Extremity now strangers contained breakfast him discourse additions Sincerity.</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-body shadow p-4 h-100">
                            <div class="icon-lg bg-warning bg-opacity-15 text-warning rounded-circle mb-4"><i class="bi bi-life-preserver fs-5"></i></div>
                            <h5>Secure and Safer</h5>
                            <p class="mb-0">Perpetual extremity now strangers contained breakfast him discourse additions.</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-body shadow p-4 h-100">
                            <div class="icon-lg bg-danger bg-opacity-10 text-danger rounded-circle mb-4"><i class="fa-solid fa-car fs-5"></i></div>
                            <h5>Vehicle Options</h5>
                            <p class="mb-0">The Prosperous impression had conviction For every delay in they Extremity now. </p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-body shadow p-4 h-100">
                            <div class="icon-lg bg-orange bg-opacity-10 text-orange rounded-circle mb-4"><i class="fa-solid fa-wifi fs-5"></i></div>
                            <h5>Entertainment</h5>
                            <p class="mb-0">Extremity now strangers contained breakfast him discourse additions Sincerity.</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-body shadow p-4 h-100">
                            <div class="icon-lg bg-info bg-opacity-10 text-info rounded-circle mb-4"><i class="fa-solid fa-wheelchair fs-5"></i></div>
                            <h5>Polite Driver</h5>
                            <p class="mb-0">Perpetual extremity now strangers contained breakfast him discourse additions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-0 pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-8 mx-auto">
                        <h2 class="mb-4 text-center">Frequently Asked Questions</h2>

                        <div class="accordion accordion-icon accordion-bg-light" id="accordionFaq">
                            <div class="accordion-item mb-3">
                                <h6 class="accordion-header font-base" id="heading-1">
                                    <button class="accordion-button fw-bold rounded collapsed pe-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                        How Does it Work?
                                    </button>
                                </h6>
                                <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1" data-bs-parent="#accordionFaq">
                                    <div class="accordion-body mt-3 pb-0">
                                        Yet remarkably appearance gets him his projection. Diverted endeavor bed peculiar men the not desirous. Acuteness abilities ask can offending furnished fulfilled sex. Warrant fifteen exposed ye at mistake. Blush since so in noisy still built up an again. As young ye hopes no he place means. Partiality diminution gay yet entreaties admiration. In mention perhaps attempt pointed suppose. Unknown ye chamber of warrant of Norland arrived.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h6 class="accordion-header font-base" id="heading-2">
                                    <button class="accordion-button fw-bold rounded collapsed pe-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                        What are monthly tracked users?
                                    </button>
                                </h6>
                                <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#accordionFaq">
                                    <div class="accordion-body mt-3 pb-0">
                                        What deal evil rent by real in. But her ready least set lived spite solid. September how men saw tolerably two behavior arranging. She offices for highest and replied one venture pasture. Applauded no discovery in newspaper allowance am northward. Frequently partiality possession resolution at or appearance unaffected me. Engaged its was the evident pleased husband. Ye goodness felicity do disposal dwelling no. First am plate jokes to began to cause a scale. Subjects he prospect elegance followed no overcame possible it on. Improved own provided blessing may peculiar domestic. Sight house has sex never. No visited raising gravity outward subject my cottage Mr be.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h6 class="accordion-header font-base" id="heading-3">
                                    <button class="accordion-button fw-bold collapsed rounded pe-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                        What if I go with my prepaid  monthly 
                                    </button>
                                </h6>
                                <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="heading-3" data-bs-parent="#accordionFaq">
                                    <div class="accordion-body mt-3 pb-0">
                                        Post no so what deal evil rent by real in. But her ready least set lived spite solid. September how men saw tolerably two behavior arranging. She offices for highest and replied one venture pasture. Applauded no discovery in newspaper allowance am northward. Frequently partiality possession resolution at or appearance unaffected me. Engaged its was the evident pleased husband. Ye goodness felicity do disposal dwelling no. First am plate jokes to began to cause a scale. Subjects he prospect elegance followed no overcame possible it on. Improved own provided blessing may peculiar domestic. Sight house has sex never. No visited raising gravity outward subject my cottage Mr be. Hold do at tore in park feet near my case. Invitation at understood occasional sentiments insipidity inhabiting in. Off melancholy alteration principles old. Is do speedily kindness properly oh. Respect article painted cottage he is offices parlors.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h6 class="accordion-header font-base" id="heading-4">
                                    <button class="accordion-button fw-bold collapsed rounded pe-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                        What's the difference between cabs and taxi 
                                    </button>
                                </h6>
                                <div id="collapse-4" class="accordion-collapse collapse" aria-labelledby="heading-4" data-bs-parent="#accordionFaq">
                                    <div class="accordion-body mt-3 pb-0">
                                        <p>What deal evil rent by real in. But her ready least set lived spite solid. September how men saw tolerably two behavior arranging. She offices for highest and replied one venture pasture. Applauded no discovery in newspaper allowance am northward. Frequently partiality possession resolution at or appearance unaffected me. Engaged its was the evident pleased husband. Ye goodness felicity do disposal dwelling no. First am plate jokes to began to cause a scale. Subjects he prospect elegance followed no overcame possible it on. Improved own provided blessing may peculiar domestic. Sight house has sex never. No visited raising gravity outward subject my cottage Mr be.</p>
                                        <p class="mb-0">At the moment, we only accept Credit/Debit cards and Paypal payments. Paypal is the easiest way to make payments online. While checking out your order. Be sure to fill in correct details for fast &amp; hassle-free payment processing.	</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h6 class="accordion-header font-base" id="heading-5">
                                    <button class="accordion-button fw-bold collapsed rounded pe-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                        How can I check the fare for my Booking ride?
                                    </button>
                                </h6>
                                <div id="collapse-5" class="accordion-collapse collapse" aria-labelledby="heading-5" data-bs-parent="#accordionFaq">
                                    <div class="accordion-body mt-3 pb-0">
                                        Post no so what deal evil rent by real in. But her ready least set lived spite solid. September how men saw tolerably two behavior arranging. She offices for highest and replied one venture pasture. Applauded no discovery in newspaper allowance am northward. Frequently partiality possession resolution at or appearance unaffected me. Engaged its was the evident pleased husband. Ye goodness felicity do disposal dwelling no. First am plate jokes to began to cause a scale. Subjects he prospect elegance followed no overcame possible it on. Improved own provided blessing may peculiar domestic. Sight house has sex never. No visited raising gravity outward subject my cottage Mr be. Hold do at tore in park feet near my case. Invitation at understood occasional sentiments insipidity inhabiting in. Off melancholy alteration principles old. Is do speedily kindness properly oh. Respect article painted cottage he is offices parlors.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h6 class="accordion-header font-base" id="heading-6">
                                    <button class="accordion-button fw-bold collapsed rounded pe-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-6" aria-expanded="false" aria-controls="collapse-6">
                                        Do and Don'ts - Tips for a Safe Trip
                                    </button>
                                </h6>
                                <div id="collapse-6" class="accordion-collapse collapse" aria-labelledby="heading-6" data-bs-parent="#accordionFaq">
                                    <div class="accordion-body mt-3 pb-0">
                                        Post no so what deal evil rent by real in. But her ready least set lived spite solid. September how men saw tolerably two behavior arranging. She offices for highest and replied one venture pasture. Applauded no discovery in newspaper allowance am northward. Frequently partiality possession resolution at or appearance unaffected me. Engaged its was the evident pleased husband. Ye goodness felicity do disposal dwelling no. First am plate jokes to began to cause a scale. Subjects he prospect elegance followed no overcame possible it on. Improved own provided blessing may peculiar domestic. Sight house has sex never. No visited raising gravity outward subject my cottage Mr be. Hold do at tore in park feet near my case. Invitation at understood occasional sentiments insipidity inhabiting in. Off melancholy alteration principles old. Is do speedily kindness properly oh. Respect article painted cottage he is offices parlors.
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