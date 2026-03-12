@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/home_custom.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

@section('content')

<main>
    <section id="home" class="hero-section section-hero">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">
                @forelse($banners as $key => $value)
                    <div class="swiper-slide">
                        <img src="{{ asset($value->image) }}" class="hero-image" alt="Mountain">
                        <div class="herooverlay"></div>
                        <div class="hero-content">
                            <div class="container text-center text-white main-contan-open">
                                <div class="main-contant-slider">
                                    <h1 class="display-3 fw-bold mb-4 animate-fade-in">{{ $value->title }}</h1>
                                    <p>{{ $value->subtitle }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="swiper-slide">
                        <img src="https://images.pexels.com/photos/20628922/pexels-photo-20628922/free-photo-of-a-person-standing-near-a-lake-with-view-of-the-chaukhamba-massif-in-the-himalayas-india.jpeg" class="hero-image" alt="Mountain">
                        <div class="herooverlay"></div>
                        <div class="hero-content">
                            <div class="container text-center text-white main-contan-open">
                                <div class="main-contant-slider">
                                    <h1 class="display-3 fw-bold mb-4 animate-fade-in">Corporate and MICE Tours</h1>
                                    <p>Discover unforgettable travel experiences with India's leading tour operator. We specialize in corporate retreats, incentive programs, and MICE tours.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="https://images.pexels.com/photos/15603666/pexels-photo-15603666/free-photo-of-lake-in-a-mountain-valley.jpeg" class="hero-image" alt="Nainital">
                        <div class="herooverlay"></div>
                            <div class="hero-content">
                                <div class="container text-center text-white">
                                    <div class="main-contant-slider">
                                    <h1 class="display-3 fw-bold mb-4 animate-fade-in"> Corporate and MICE Tours </h1>
                                    <p>Discover unforgettable travel experiences with India's leading tour operator. We specialize in corporate retreats, incentive programs, and MICE tours.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
    <section class="custom-booking-wrapper light-bg">
        <div class="container lest-booking">
            <div class="custom-booking-form">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="text-center mb-4">Plan Your Journey</h2>
                        <ul class="nav nav-tabs justify-content-center mb-4 tab-button-test" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active button-slider-item" data-bs-toggle="tab" data-bs-target="#hotel"> Hotel </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link button-slider-item" data-bs-toggle="tab" data-bs-target="#tour"> Tour </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="hotel">
                                <form class="row g-3" method="POST" action="{{ route('hotel.search') }}">
                                    @csrf
                                    <div class="col-md-6 col-lg">
                                        <label class="form-label">Destination</label>
                                        <select id="location" name="location" class="form-select js-choice" data-search-enabled="true" aria-label="Select location">
                                            <option value="">Select location</option>
                                            <option value="San Jacinto, USA" selected>San Jacinto, USA</option>
                                            <option value="Blvd, Los Angeles" >Blvd, Los Angeles</option>
                                            <option value="North Dakota, Canada" >North Dakota, Canada</option>
                                            <option value="West Virginia, Paris" >West Virginia, Paris</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 col-lg">
                                        <label class="form-label">Check in - out</label>
                                        <input type="text" name="date_range" class="form-control flatpickr flatpickr-input" data-mode="range" placeholder="Select date" value="" readonly="readonly">
                                    </div>

                                    <div class="col-md-6 col-lg">
                                        <div class="w-100">
                                            <label class="form-label">Guests &amp; rooms</label>
                                            <div class="dropdown guest-selector me-2">
                                                <input type="text" name="guests" class="form-guest-selector form-control selection-result" value="2 Guests 1 Rooms" id="dropdownGuest" data-bs-auto-close="outside" data-bs-toggle="dropdown">
                                                <ul class="dropdown-menu guest-selector-dropdown" aria-labelledby="dropdownGuest">
                                                    <li class="d-flex justify-content-between">
                                                        <div>
                                                            <h6 class="mb-0">Adults</h6>
                                                            <small>Ages 13 or above</small>
                                                        </div>
                                                        <div class="hstack gap-1 align-items-center">
                                                            <button type="button" class="btn btn-link adult-remove p-0 mb-0"><i class="bi bi-dash-circle fs-5 fa-fw"></i></button>
                                                            <h6 class="guest-selector-count mb-0 adults">2</h6>
                                                            <button type="button" class="btn btn-link adult-add p-0 mb-0"><i class="bi bi-plus-circle fs-5 fa-fw"></i></button>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-divider"></li>
                                                    <li class="d-flex justify-content-between">
                                                        <div>
                                                            <h6 class="mb-0">Child</h6>
                                                            <small>Ages 13 below</small>
                                                        </div>
                                                        <div class="hstack gap-1 align-items-center">
                                                            <button type="button" class="btn btn-link child-remove p-0 mb-0"><i class="bi bi-dash-circle fs-5 fa-fw"></i></button>
                                                            <h6 class="guest-selector-count mb-0 child">0</h6>
                                                            <button type="button" class="btn btn-link child-add p-0 mb-0"><i class="bi bi-plus-circle fs-5 fa-fw"></i></button>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-divider"></li>
                                                    <li class="d-flex justify-content-between">
                                                        <div>
                                                            <h6 class="mb-0">Rooms</h6>
                                                            <small>Max room 8</small>
                                                        </div>
                                                        <div class="hstack gap-1 align-items-center">
                                                            <button type="button" class="btn btn-link room-remove p-0 mb-0"><i class="bi bi-dash-circle fs-5 fa-fw"></i></button>
                                                            <h6 class="guest-selector-count mb-0 rooms">1</h6>
                                                            <button type="button" class="btn btn-link room-add p-0 mb-0"><i class="bi bi-plus-circle fs-5 fa-fw"></i></button>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-auto d-grid ">
                                        <label class="form-label d-none d-lg-block">&nbsp;</label>
                                        <button class="icon-md btn btn-round custom-search-btn mb-0" type="submit"><i class="bi bi-search fa-fw"></i></button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="tour">
                                <form class="row g-3" method="POST" action="{{ route('tour.search') }}">
                                    @csrf
                                    <div class="col-md-4 col-lg">
                                        <label class="form-label">Location</label>
                                        <select name="location" class="form-select js-choice" data-search-enabled="true">
                                            <option value="">Select location</option>
                                            @foreach($locations as $key => $location)
                                                <option>{{ $location }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 col-lg">
                                        <label class="form-label">Date</label>
                                        <input type="text" name="date" class="form-control flatpickr flatpickr-input" value="{{ date('d M Y') }}" placeholder="Choose a date" data-date-format="d M Y" readonly="readonly">
                                    </div>
                                    <div class="col-md-4 col-lg">
                                        <label class="form-label">Type</label>
                                        <select name="capmping" class="form-select js-choice" data-search-enabled="true">
                                            <option value="">Select Type</option>
                                            <option value="1">Without Capmping</option>
                                            <option value="2">With Capmping</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-auto d-grid">
                                        <label class="form-label d-none d-lg-block">&nbsp;</label>
                                        <button class="icon-md btn btn-round custom-search-btn mb-0" type="submit"><i class="bi bi-search fa-fw"></i></button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="light-bg">
        <div class="container">
            <h2>Recent Booking Highlights</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="card-icon">📍</div>
                            <h5 class="card-title">International Tours</h5>
                            <p class="card-text">Explore across 50+ countries with our expert guides</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="card-icon">⭐</div>
                            <h5 class="card-title">5-Star Facilities</h5>
                            <p class="card-text">Premium accommodation and transportation included</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="card-icon">🎯</div>
                            <h5 class="card-title">Customized Packages</h5>
                            <p class="card-text">Tailored solutions for your specific requirements</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <h2>Explore Hotels</h2>
            <div class="row">
                @foreach($hotels as $key => $value)
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="category-card">
                            <img src="{{ asset($value->image) }}" alt="{{ $value->name }}" class="category-image">
                            <div class="category-info">
                                <h5>{{ $value->name }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="packages" class="py-5 section-packages light-bg">
        <div class="container">
            <h2 class="text-center mb-5">Top-Selling Holiday Packages</h2>
            <div class="row g-4">
                @foreach($packages as $package)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm hover-card">

                            <img src="{{ asset($package->package_images->url ?? 'images/default.jpg') }}" class="card-img-top package-img" alt="{{ $package->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $package->name }}</h5>
                                <div class="rating-plan">
                                    <div class="rating-day">
                                        <p class="text-muted">{{ $package->duration }}</p>
                                    </div>
                                    <div class="mb-2">
                                        <span class="text-warning">★★★★★</span>
                                        <span class="text-muted small">(4.8)</span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-price-primary mb-0">
                                        <i class="fa fa-inr"></i>{{ $package->price }}
                                    </h4>
                                    <small class="text-muted">per person</small>
                                </div>

                                <button type="button" onclick="window.location.href='{{ route('tour.booking',$package->id) }}'" class="btn bg-custom-blue custom-number-name w-100">
                                        Book Now
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <h2>Popular Destinations in India</h2>
            <div class="row">

                @foreach($indianDestinations as $key => $value)
                    <div class="col-6 col-md-3 mb-3">
                        <div class="destination-card text-center">
                            <div class="destination-emoji fs-2"> {{ $value->emoji }} </div>
                            <p class="destination-name mt-1"> {{ $value->name }} </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="light-bg">
        <div class="container">
            <h2>International Destinations</h2>
            <div class="row">
                @forelse($internationalDestinations as $key => $value)
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="category-card">
                            <img src="{{ asset($value->image ?? '/images/cities/default.jpg') }}" alt="{{ $value->name }}" class="category-image">
                            <div class="category-info">
                                <h5>{{ $value->name }}</h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="category-card">
                            <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=300&h=250&fit=crop" alt="Europe" class="category-image">
                            <div class="category-info">
                                <h5>Europe</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="category-card">
                            <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=300&h=250&fit=crop" alt="Southeast Asia" class="category-image">
                            <div class="category-info">
                                <h5>Southeast Asia</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="category-card">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=250&fit=crop" alt="Middle East" class="category-image">
                            <div class="category-info">
                                <h5>Middle East</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="category-card">
                            <img src="https://images.unsplash.com/photo-1449824913935-59a10b8d2000?w=300&h=250&fit=crop" alt="Americas" class="category-image">
                            <div class="category-info">
                                <h5>Americas</h5>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="py-5 bg-custom-blue text-white text-center section-promo">
        <div class="container">
            <div class="section-booking-right">
                <h2 class="mb-4">Booking a Luxury is Just a Click Away</h2>
                <p class="lead mb-4">Experience seamless booking with our user-friendly platform. Choose from hundreds of curated packages.</p>
                <a href="#packages" class="btn btn-warning btn-lg px-5">Explore Packages</a>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <h2>Why Choose Us?</h2>
            <div class="row">
                <div class="col-md-3 mb-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div style="font-size: 2.5rem; margin-bottom: 1rem;">👥</div>
                            <h5 class="card-title">Expert Team</h5>
                            <p class="card-text">20+ years of experience in travel industry</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div style="font-size: 2.5rem; margin-bottom: 1rem;">🏆</div>
                            <h5 class="card-title">Award Winning</h5>
                            <p class="card-text">Recognized for excellence in service</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div style="font-size: 2.5rem; margin-bottom: 1rem;">❤️</div>
                            <h5 class="card-title">Customer Care</h5>
                            <p class="card-text">24/7 customer support and assistance</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 text-center">
                    <div class="card">
                        <div class="card-body">
                            <div style="font-size: 2.5rem; margin-bottom: 1rem;">⚡</div>
                            <h5 class="card-title">Quick Booking</h5>
                            <p class="card-text">Fast and easy booking process</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="light-bg" id="testimonials">
        <div class="container">
            <h2>What Our Clients Say</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop" alt="Raj Kumar" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                <div>
                                    <h6 class="mb-0">Raj Kumar</h6>
                                    <small class="text-muted">Tech Corp</small>
                                </div>
                            </div>
                            <p class="mb-3"><em>"Excellent service and amazing tour experience. Highly recommended!"</em></p>
                            <div>
                                <span class="star">★ ★ ★ ★ ★</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop" alt="Priya Sharma" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                <div>
                                    <h6 class="mb-0">Priya Sharma</h6>
                                    <small class="text-muted">Finance Ltd</small>
                                </div>
                            </div>
                            <p class="mb-3"><em>"Best corporate travel partner. Professional and reliable service."</em></p>
                            <div>
                                <span class="star">★ ★ ★ ★ ★</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="{{ asset('/assets/js/home_custom.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    const heroSwiper = new Swiper('.hero-swiper', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true,
        },
        speed: 1000,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    const testimonialSwiper = new Swiper('.testimonial-swiper', {
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        speed: 800,
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
            el: '.testimonial-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.testimonial-next',
            prevEl: '.testimonial-prev',
        },
        breakpoints: {
            768: {
            slidesPerView: 2,
            spaceBetween: 30,
            },
            1024: {
            slidesPerView: 3,
            spaceBetween: 30,
            },
        },
    });

</script>
@endsection
