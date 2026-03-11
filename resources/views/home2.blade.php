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
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="category-card">
                        <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=300&h=250&fit=crop" alt="Historical Sites" class="category-image">
                        <div class="category-info">
                            <h5>Historical Sites</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="category-card">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=250&fit=crop" alt="Beach Resorts" class="category-image">
                        <div class="category-info">
                            <h5>Beach Resorts</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="category-card">
                        <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=300&h=250&fit=crop" alt="Mountain Retreats" class="category-image">
                        <div class="category-info">
                            <h5>Mountain Retreats</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="category-card">
                        <img src="https://images.unsplash.com/photo-1449824913935-59a10b8d2000?w=300&h=250&fit=crop" alt="City Tours" class="category-image">
                        <div class="category-info">
                            <h5>City Tours</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="light-bg">
        <div class="container">
            <h2>Popular Holiday Packages</h2>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="package-card">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=250&h=200&fit=crop" alt="Taj Mahal" class="package-image">
                        <div class="package-info">
                            <h6 class="package-title">Taj Mahal & Agra</h6>
                            <div class="rating">
                                <span class="star">★ ★ ★ ★ ★</span>
                                <span>4.8</span>
                                <span>(256)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="package-card">
                        <img src="https://images.unsplash.com/photo-1512100356356-de1d84291e13?w=250&h=200&fit=crop" alt="Kerala" class="package-image">
                        <div class="package-info">
                            <h6 class="package-title">Kerala Backwaters</h6>
                            <div class="rating">
                                <span class="star">★ ★ ★ ★ ★</span>
                                <span>4.9</span>
                                <span>(312)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="package-card">
                        <img src="https://images.unsplash.com/photo-1521748396819-5c4ddf15320a?w=250&h=200&fit=crop" alt="Rajasthan" class="package-image">
                        <div class="package-info">
                            <h6 class="package-title">Rajasthan Desert</h6>
                            <div class="rating">
                                <span class="star">★ ★ ★ ★ ✩</span>
                                <span>4.7</span>
                                <span>(198)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="package-card">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=250&h=200&fit=crop" alt="Himalayas" class="package-image">
                        <div class="package-info">
                            <h6 class="package-title">Himalayan Trek</h6>
                            <div class="rating">
                                <span class="star">★ ★ ★ ★ ★</span>
                                <span>4.9</span>
                                <span>(267)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="package-card">
                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=250&h=200&fit=crop" alt="Goa" class="package-image">
                        <div class="package-info">
                            <h6 class="package-title">Goa Beach</h6>
                            <div class="rating">
                                <span class="star">★ ★ ★ ★ ✩</span>
                                <span>4.6</span>
                                <span>(341)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="package-card">
                        <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=250&h=200&fit=crop" alt="Varanasi" class="package-image">
                        <div class="package-info">
                            <h6 class="package-title">Varanasi Spiritual</h6>
                            <div class="rating">
                                <span class="star">★ ★ ★ ★ ★</span>
                                <span>4.8</span>
                                <span>(289)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="package-card">
                        <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=250&h=200&fit=crop" alt="Darjeeling" class="package-image">
                        <div class="package-info">
                            <h6 class="package-title">Darjeeling Tea</h6>
                            <div class="rating">
                                <span class="star">★ ★ ★ ★ ✩</span>
                                <span>4.7</span>
                                <span>(156)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="package-card">
                        <img src="https://images.unsplash.com/photo-1444080748397-f442aa95c3e5?w=250&h=200&fit=crop" alt="Jaipur" class="package-image">
                        <div class="package-info">
                            <h6 class="package-title">Jaipur Pink City</h6>
                            <div class="rating">
                                <span class="star">★ ★ ★ ★ ★</span>
                                <span>4.8</span>
                                <span>(224)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <h2>Popular Destinations in India</h2>
            <div class="row">
                <div class="col-6 col-md-3 mb-3">
                    <div class="destination-card">
                        <div class="destination-emoji">🏛️</div>
                        <p class="destination-name">Delhi</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div class="destination-card">
                        <div class="destination-emoji">🏙️</div>
                        <p class="destination-name">Mumbai</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div class="destination-card">
                        <div class="destination-emoji">🌆</div>
                        <p class="destination-name">Bangalore</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div class="destination-card">
                        <div class="destination-emoji">🏖️</div>
                        <p class="destination-name">Chennai</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div class="destination-card">
                        <div class="destination-emoji">🎭</div>
                        <p class="destination-name">Kolkata</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div class="destination-card">
                        <div class="destination-emoji">🕌</div>
                        <p class="destination-name">Hyderabad</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div class="destination-card">
                        <div class="destination-emoji">🏔️</div>
                        <p class="destination-name">Pune</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div class="destination-card">
                        <div class="destination-emoji">🏰</div>
                        <p class="destination-name">Jaipur</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div class="destination-card">
                        <div class="destination-emoji">🕌</div>
                        <p class="destination-name">Lucknow</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div class="destination-card">
                        <div class="destination-emoji">🏛️</div>
                        <p class="destination-name">Chandigarh</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div class="destination-card">
                        <div class="destination-emoji">🛕</div>
                        <p class="destination-name">Ahmedabad</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div class="destination-card">
                        <div class="destination-emoji">🚤</div>
                        <p class="destination-name">Kochi</p>
                    </div>
                </div>
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
@endsection
