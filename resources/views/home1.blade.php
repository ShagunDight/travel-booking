@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/home_custom.css') }}">

@section('content')

<main>
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1>Corporate and MICE Tours</h1>
                    <p>Discover unforgettable travel experiences with India's leading tour operator. We specialize in corporate retreats, incentive programs, and MICE tours.</p>
                    <button class="btn btn-explore">Book Now</button>
                </div>
                <div class="col-lg-6">
                    <div class="hero-slider" id="slider">
                        <div class="slider-container">
                            <div class="slide active">
                                <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=600&h=400&fit=crop" alt="Corporate Tours">
                            </div>
                            <div class="slide">
                                <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=600&h=400&fit=crop" alt="MICE Tours">
                            </div>
                        </div>
                        <button class="slider-arrow slider-prev">❮</button>
                        <button class="slider-arrow slider-next">❯</button>
                        <div class="slider-controls">
                            <span class="slider-dot active" data-slide="0"></span>
                            <span class="slider-dot" data-slide="1"></span>
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
            <h2>Explore Categories</h2>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="category-card">
                            <img src="{{ asset($category->image_url) }}" alt="{{ $category->name }}" class="category-image">
                            <div class="category-info">
                                <h5>{{ $category->name }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="light-bg">
        <div class="container">
            <h2>Popular Holiday Packages</h2>
            <div class="row">
                @foreach($packages as $package)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="package-card">
                            @if($package->package_images)
                                <img src="{{ asset($package->package_images->url) }}" alt="{{ $package->name }}" class="package-image">
                            @else
                                <img src="{{ asset('/images/hotel_1_06.jpg') }}" alt="{{ $package->name }}" class="package-image">
                            @endif
                            <div class="package-info">
                                <h6 class="package-title">{{ $package->name }}</h6>
                                <div class="rating">
                                    {{-- <span class="star">★ ★ ★ ★ ★</span> --}}
                                    <span>{{ $package->duration }}</span>
                                    {{-- <span>({{ $package->reviews_count }})</span> --}}
                                </div>
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
                @foreach($cities as $city)
                    <div class="col-6 col-md-3 mb-3">
                        <div class="destination-card">
                            <div class="destination-emoji">🏖️</div>
                            <p class="destination-name">{{ $city->name }}</p>
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
            </div>
        </div>
    </section>

    <section class="hero-section">
        <div class="container">
            <div class="text-center">
                <h2 class="text-white mb-4">BOOKING A LUXURY JUST A CLICK AWAY!</h2>
                <button class="btn btn-explore">Book Now</button>
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
                @foreach($testimonials as $review)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="{{ $review->user->profile_image ?? 'default.jpg' }}" 
                                        alt="{{ $review->user->name }}" 
                                        class="rounded-circle me-3" 
                                        style="width: 60px; height: 60px; object-fit: cover;">
                                    <div>
                                        <h6 class="mb-0">{{ $review->user->name }}</h6>
                                        <small class="text-muted">Customer</small>
                                    </div>
                                </div>
                                <p class="mb-3"><em>"{{ $review->comment }}"</em></p>
                                <div>
                                    <span class="star">★ ★ ★ ★ ★</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
<script src="{{ asset('/assets/js/home_custom.js')}}"></script>
@endsection
