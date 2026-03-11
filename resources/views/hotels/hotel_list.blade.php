@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/nouislider/nouislider.css') }}">
    <main>
        <section class="pt-0">
            <div class="container">
                <div class="rounded-3 p-3 p-sm-5" style="background-image: url({{ asset('/images/05.jpg')}}); background-position: center center; background-repeat: no-repeat; background-size: cover;">
                    <div class="row my-2 my-xl-5"> 
                        <div class="col-md-8 mx-auto"> 
                            <h1 class="text-center text-white">150 Hotels in New York</h1>
                        </div>
                    </div>
                    <form id="search_filter" class="bg-mode shadow rounded-3 position-relative p-4 pe-md-5 pb-5 pb-md-4 mb-4" method="POST" action="{{ route('hotel.search') }}">
                        @csrf
                        <div class="row g-4 align-items-center">
                            <div class="col-lg-4">
                                <div class="form-control-border form-control-transparent form-fs-md d-flex">
                                    <i class="bi bi-geo-alt fs-3 me-2 mt-2"></i>
                                    <div class="flex-grow-1">
                                        <label class="form-label" for="location">Location</label>
                                        <input type="hidden" name="clear_session" id="clear_session" value="0">
                                        <select id="location" name="location" class="form-select js-choice" data-search-enabled="true" aria-label="Select location">
                                            <option value="">Select location</option>
                                            <option value="San Jacinto, USA" {{ ($data['location'] ?? '') == "San Jacinto, USA" ? "selected" : "" }}>San Jacinto, USA</option>
                                            <option value="Blvd, Los Angeles" {{ ($data['location'] ?? '') == "Blvd, Los Angeles" ? "selected" : "" }}>Blvd, Los Angeles</option>
                                            <option value="North Dakota, Canada" {{ ($data['location'] ?? '') == "North Dakota, Canada" ? "selected" : "" }}>North Dakota, Canada</option>
                                            <option value="West Virginia, Paris" {{ ($data['location'] ?? '') == "West Virginia, Paris" ? "selected" : "" }}>West Virginia, Paris</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="d-flex">
                                    <i class="bi bi-calendar fs-3 me-2 mt-2"></i>
                                    <div class="form-control-border form-control-transparent form-fs-md">
                                        <label class="form-label">Check in - out</label>
                                        <input type="text" name="date_range" class="form-control flatpickr flatpickr-input" data-mode="range" placeholder="Select date" value="{{ $data['date_range'] ?? '' }}" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-control-border form-control-transparent form-fs-md d-flex">
                                    <i class="bi bi-person fs-3 me-2 mt-2"></i>
                                    <div class="w-100">
                                        <label class="form-label">Guests &amp; rooms</label>
                                        <div class="dropdown guest-selector me-2">
                                            <input type="text" name="guests" class="form-guest-selector form-control selection-result" value="{{ $data['guests'] ?? '0 Guests 0 Rooms' }}" id="dropdownGuest" data-bs-auto-close="outside" data-bs-toggle="dropdown">
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
                            </div>
                        </div>
                        <div class="btn-position-md-middle">
                            <button class="icon-lg btn btn-round btn-primary mb-0" id="searchFilter" type="submit"><i class="bi bi-search fa-fw"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="pt-0">
            <div class="container">
                <div class="row">
                    {{-- <aside class="col-xl-4 col-xxl-3">
                        <div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Advance Filters</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body flex-column p-3 p-xl-0">
                                <form class="rounded-3 shadow">
                                    <div class="card card-body rounded-0 rounded-top p-4">
                                        <h6 class="mb-2">Hotel Type</h6>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="hotelType1">
                                                <label class="form-check-label" for="hotelType1">All</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="hotelType2">
                                                <label class="form-check-label" for="hotelType2">Hotel</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="hotelType3">
                                                <label class="form-check-label" for="hotelType3">Apartment</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="hotelType4">
                                                <label class="form-check-label" for="hotelType4">Resort</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="hotelType5">
                                                <label class="form-check-label" for="hotelType5">Villa</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="hotelType6">
                                                <label class="form-check-label" for="hotelType6">Lodge</label>
                                            </div>
                                            <div class="multi-collapse collapse" id="hotelType">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="hotelType7">
                                                    <label class="form-check-label" for="hotelType7">Guest House</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="hotelType10">
                                                    <label class="form-check-label" for="hotelType10">Cottage</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="hotelType8">
                                                    <label class="form-check-label" for="hotelType8">Beach Hut</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="hotelType9">
                                                    <label class="form-check-label" for="hotelType9">Farm house</label>
                                                </div>
                                            </div>
                                            <a class="p-0 mb-0 mt-2 btn-more d-flex align-items-center collapsed" data-bs-toggle="collapse" href="#hotelType" role="button" aria-expanded="false" aria-controls="hotelType">
                                                See <span class="see-more ms-1">more</span><span class="see-less ms-1">less</span><i class="fa-solid fa-angle-down ms-2"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <hr class="my-0">
                                    <div class="card card-body rounded-0 p-4">
                                        <h6 class="mb-2">Price range</h6>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="priceRange1">
                                                <label class="form-check-label" for="priceRange1">Up to $500</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="priceRange2">
                                                <label class="form-check-label" for="priceRange2">$500 - $1000</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="priceRange3">
                                                <label class="form-check-label" for="priceRange3">$1000 - $1500</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="priceRange4">
                                                <label class="form-check-label" for="priceRange4">$1500 - $2000</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="priceRange5">
                                                <label class="form-check-label" for="priceRange5">$2000+</label>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-0">
                                    <div class="card card-body rounded-0 p-4">
                                        <h6 class="mb-2">Popular Type</h6>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="popolarType1">
                                                <label class="form-check-label" for="popolarType1">Free Breakfast Included</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="popolarType2">
                                                <label class="form-check-label" for="popolarType2">Pay At Hotel Available</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="popolarType3">
                                                <label class="form-check-label" for="popolarType3">Free Cancellation Available</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <hr class="my-0">
                                    <div class="card card-body rounded-0 p-4">
                                        <h6 class="mb-2">Customer Rating</h6>
                                        <ul class="list-inline mb-0 g-3">
                                            <li class="list-inline-item mb-0">
                                                <input type="checkbox" class="btn-check" id="btn-check-c1">
                                                <label class="btn btn-sm btn-light btn-primary-soft-check" for="btn-check-c1">3+</label>
                                            </li>
                                            <li class="list-inline-item mb-0">
                                                <input type="checkbox" class="btn-check" id="btn-check-c2">
                                                <label class="btn btn-sm btn-light btn-primary-soft-check" for="btn-check-c2">3.5+</label>
                                            </li>
                                            <li class="list-inline-item mb-0">
                                                <input type="checkbox" class="btn-check" id="btn-check-c3">
                                                <label class="btn btn-sm btn-light btn-primary-soft-check" for="btn-check-c3">4+</label>
                                            </li>
                                            <li class="list-inline-item mb-0">
                                                <input type="checkbox" class="btn-check" id="btn-check-c4">
                                                <label class="btn btn-sm btn-light btn-primary-soft-check" for="btn-check-c4">4.5+</label>
                                            </li>
                                        </ul>
                                    </div>

                                    <hr class="my-0">
                                    <div class="card card-body rounded-0 p-4">
                                        <h6 class="mb-2">Rating Star</h6>
                                        <ul class="list-inline mb-0 g-3">
                                            <li class="list-inline-item mb-0">
                                                <input type="checkbox" class="btn-check" id="btn-check-6">
                                                <label class="btn btn-sm btn-light btn-primary-soft-check" for="btn-check-6">1<i class="bi bi-star-fill"></i></label>
                                            </li>
                                            <li class="list-inline-item mb-0">
                                                <input type="checkbox" class="btn-check" id="btn-check-7">
                                                <label class="btn btn-sm btn-light btn-primary-soft-check" for="btn-check-7">2<i class="bi bi-star-fill"></i></label>
                                            </li>
                                            <li class="list-inline-item mb-0">
                                                <input type="checkbox" class="btn-check" id="btn-check-8">
                                                <label class="btn btn-sm btn-light btn-primary-soft-check" for="btn-check-8">3<i class="bi bi-star-fill"></i></label>
                                            </li>
                                            <li class="list-inline-item mb-0">
                                                <input type="checkbox" class="btn-check" id="btn-check-15">
                                                <label class="btn btn-sm btn-light btn-primary-soft-check" for="btn-check-15">4<i class="bi bi-star-fill"></i></label>
                                            </li>
                                            <li class="list-inline-item mb-0">
                                                <input type="checkbox" class="btn-check" id="btn-check-16">
                                                <label class="btn btn-sm btn-light btn-primary-soft-check" for="btn-check-16">5<i class="bi bi-star-fill"></i></label>
                                            </li>
                                        </ul>
                                    </div>

                                    <hr class="my-0">
                                    <div class="card card-body rounded-0 rounded-bottom p-4">
                                        <h6 class="mb-2">Amenities</h6>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="amenitiesType1">
                                                <label class="form-check-label" for="amenitiesType1">All</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="amenitiesType2">
                                                <label class="form-check-label" for="amenitiesType2">Air Conditioning</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="amenitiesType3">
                                                <label class="form-check-label" for="amenitiesType3">Bar</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="amenitiesType4">
                                                <label class="form-check-label" for="amenitiesType4">Bonfire</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="amenitiesType5">
                                                <label class="form-check-label" for="amenitiesType5">Business Services</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="amenitiesType6">
                                                <label class="form-check-label" for="amenitiesType6">Caretaker</label>
                                            </div>
                                            <div class="multi-collapse collapse" id="amenitiesCollapes">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="amenitiesType7">
                                                    <label class="form-check-label" for="amenitiesType7">Dining</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="amenitiesType8">
                                                    <label class="form-check-label" for="amenitiesType8">Free Internet</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="amenitiesType9">
                                                    <label class="form-check-label" for="amenitiesType9">Hair nets</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="amenitiesType10">
                                                    <label class="form-check-label" for="amenitiesType10">Masks</label>
                                                </div>
                                            </div>
                                            <a class="p-0 mb-0 mt-2 btn-more d-flex align-items-center collapsed" data-bs-toggle="collapse" href="#amenitiesCollapes" role="button" aria-expanded="false" aria-controls="amenitiesCollapes">
                                                See <span class="see-more ms-1">more</span><span class="see-less ms-1">less</span><i class="fa-solid fa-angle-down ms-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="d-flex justify-content-between p-2 p-xl-0 mt-xl-4">
                                <button class="btn btn-link p-0 mb-0">Clear all</button>
                                <button class="btn btn-primary mb-0">Filter Result</button>
                            </div>
                        </div>
                    </aside> --}}
                    @if(!empty($data['location']))
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="vstack gap-4">
                                <div class="row g-0">
                                    <div class="d-flex justify-content-end p-2 p-xl-0">
                                        <button class="btn btn-primary" id="clearFilter">Clear Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <style>
                        .listingHotel #tns1-ow .tns-controls [data-controls=next]{
                            right: 25px;
                        }
                    </style>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="vstack gap-4">
                            @forelse($hotels as $key => $hotel)
                                <div class="card shadow p-2">
                                    <div class="row g-0 listingHotel">
                                        <div class="col-md-5 position-relative">
                                            <div class="position-absolute top-0 start-0 z-index-1 m-2">
                                                <div class="badge text-bg-danger">30% Off</div>
                                            </div>
                                            <div class="tiny-slider arrow-round arrow-xs arrow-dark overflow-hidden rounded-2">
                                                <div class="tns-outer" id="tns1-ow">
                                                    <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">2</span>  of 4</div>
                                                    <div id="tns1-mw" class="tns-ovh">
                                                        <div class="tns-inner" id="tns1-iw">
                                                            <div class="tiny-slider-inner tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" data-autoplay="false" data-arrow="true" data-dots="false" data-items="1" id="tns1" style="transition-duration: 0s; transform: translate3d(-16.6667%, 0px, 0px);">
                                                                <div class="tns-item tns-slide-cloned active" aria-hidden="true" tabindex="-1">
                                                                    <img src="{{ asset($hotel->property_image[0]->url)}}" alt="Card image">
                                                                </div>
                                                                @foreach($hotel->property_image->skip(1) as $key => $img)
                                                                    <div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                                                        <img src="{{ asset($img->url)}}" alt="Card image">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="card-body py-md-2 d-flex flex-column h-100 position-relative">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i class="fa-solid fa-star-half-alt text-warning"></i></li>
                                                    </ul>
                                                    <ul class="list-inline mb-0 z-index-2">
                                                        <li class="list-inline-item">
                                                            <a href="#" class="btn btn-sm btn-round btn-light"><i class="fa-solid fa-fw fa-heart"></i></a>
                                                        </li>
                                                        <li class="list-inline-item dropdown">
                                                            <a href="#" class="btn btn-sm btn-round btn-light" role="button" id="dropdownShare" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-solid fa-fw fa-share-alt"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare">
                                                                <li><a class="dropdown-item" href="#"><i class="fab fa-twitter-square me-2"></i>Twitter</a></li>
                                                                <li><a class="dropdown-item" href="#"><i class="fab fa-facebook-square me-2"></i>Facebook</a></li>
                                                                <li><a class="dropdown-item" href="#"><i class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
                                                                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-copy me-2"></i>Copy link</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h5 class="card-title mb-1"><a href="#"> {{ $hotel->name }} </a></h5>
                                                <small><i class="bi bi-geo-alt me-2"></i>{{ $hotel->address }}</small>
                                                <ul class="nav nav-divider mt-3">
                                                    <li class="nav-item">Air Conditioning</li>
                                                    <li class="nav-item">Wifi</li>
                                                    <li class="nav-item">Kitchen</li>
                                                    {{-- <li class="nav-item"><a href="#" class="mb-0 text-primary">More+</a></li> --}}
                                                </ul>
                                                <ul class="list-group list-group-borderless small mb-0 mt-2">
                                                    <li class="list-group-item d-flex text-success p-0">
                                                        <i class="bi bi-patch-check-fill me-2"></i>Free Cancellation till 7 Jan 2022
                                                    </li>
                                                    <li class="list-group-item d-flex text-success p-0">
                                                        <i class="bi bi-patch-check-fill me-2"></i>Free Breakfast
                                                    </li>
                                                </ul>
                                                <div class="d-sm-flex justify-content-sm-between align-items-center mt-3 mt-md-auto">
                                                    <div class="d-flex align-items-center">
                                                        <h5 class="fw-bold mb-0 me-1"><i class="fa fa-inr"></i>{{ $hotel->minRoomPrice->price_per_night }}</h5>
                                                        <span class="mb-0 me-2">/day</span>
                                                        <span class="text-decoration-line-through mb-0"><i class="fa fa-inr"></i>1000</span>
                                                    </div>
                                                    <div class="mt-3 mt-sm-0">
                                                        <a href="{{ route('hotels.property_detail', $hotel->id) }}" class="btn btn-sm btn-dark mb-0 w-100">View Detail</a>    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="card shadow p-3">
                                    <div class="row g-0 text-center text-muted">
                                        <p class="fa-1x">
                                            No Hotel Found 
                                            @if(!empty($data['location']))
                                                for location <strong>{{ $data['location'] }}</strong>
                                            @endif
                                            @if(!empty($data['date_range']))
                                                between <strong>{{ $data['date_range'] }}</strong>
                                            @endif
                                            @if(!empty($data['guests']))
                                                for <strong>{{ $data['guests'] }}</strong>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endforelse
                            @if ($hotels->hasPages())
                                <nav class="d-flex justify-content-center" aria-label="navigation">
                                    <ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                                        
                                        {{-- Previous Page Link --}}
                                        @if ($hotels->onFirstPage())
                                            <li class="page-item mb-0 disabled">
                                                <span class="page-link"><i class="fa-solid fa-angle-left"></i></span>
                                            </li>
                                        @else
                                            <li class="page-item mb-0">
                                                <a class="page-link" href="{{ $hotels->previousPageUrl() }}" rel="prev">
                                                    <i class="fa-solid fa-angle-left"></i>
                                                </a>
                                            </li>
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @foreach ($hotels->links()->elements[0] ?? [] as $page => $url)
                                            @if ($page == $hotels->currentPage())
                                                <li class="page-item mb-0 active">
                                                    <span class="page-link">{{ $page }}</span>
                                                </li>
                                            @else
                                                <li class="page-item mb-0">
                                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach

                                        {{-- Next Page Link --}}
                                        @if ($hotels->hasMorePages())
                                            <li class="page-item mb-0">
                                                <a class="page-link" href="{{ $hotels->nextPageUrl() }}" rel="next">
                                                    <i class="fa-solid fa-angle-right"></i>
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item mb-0 disabled">
                                                <span class="page-link"><i class="fa-solid fa-angle-right"></i></span>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            @endif

                            {{-- <div class="card shadow p-2">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="{{ asset('/images/hotel_1_10.jpg')}}" class="card-img rounded-2" alt="Card image">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body py-md-2 d-flex flex-column h-100">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star-half-alt text-warning"></i></li>
                                                </ul>
                                                <ul class="list-inline mb-0 z-index-2">
                                                    <li class="list-inline-item">
                                                        <a href="#" class="btn btn-sm btn-round btn-light"><i class="fa-solid fa-fw fa-heart"></i></a>
                                                    </li>
                                                    <li class="list-inline-item dropdown">
                                                        <a href="#" class="btn btn-sm btn-round btn-light" role="button" id="dropdownShare2" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-solid fa-fw fa-share-alt"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare2">
                                                            <li><a class="dropdown-item" href="#"><i class="fab fa-twitter-square me-2"></i>Twitter</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fab fa-facebook-square me-2"></i>Facebook</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-copy me-2"></i>Copy link</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="card-title mb-1"><a href="hotel-detail.html">Pride moon Village Resort &amp; Spa</a></h5>
                                            <small><i class="bi bi-geo-alt me-2"></i>31J W Spark Street, California - 24578</small>
                                            <ul class="nav nav-divider mt-3">
                                                <li class="nav-item">Air Conditioning</li>
                                                <li class="nav-item">Wifi</li>
                                                <li class="nav-item">Kitchen</li>
                                                <li class="nav-item">Pool</li>
                                            </ul>
                                            <ul class="list-group list-group-borderless small mb-0 mt-2">
                                                <li class="list-group-item d-flex text-danger p-0">
                                                    <i class="bi bi-patch-check-fill me-2"></i>Non Refundable
                                                </li>
                                            </ul>
                                            <div class="d-sm-flex justify-content-sm-between align-items-center mt-3 mt-md-auto">
                                                <div class="d-flex align-items-center">
                                                    <h5 class="fw-bold mb-0 me-1">$980</h5>
                                                    <span class="mb-0 me-2">/day</span>
                                                </div>
                                                <div class="mt-3 mt-sm-0">
                                                    <a href="hotel-detail.html" class="btn btn-sm btn-dark mb-0 w-100">Select Room</a>    
                                                </div>                  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card shadow p-2">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="{{ asset('/images/hotel_1_11.jpg')}}" class="card-img rounded-2" alt="Card image">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body py-md-2 d-flex flex-column h-100 position-relative">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star-half-alt text-warning"></i></li>
                                                </ul>
                                                <ul class="list-inline mb-0 z-index-2">
                                                    <li class="list-inline-item">
                                                        <a href="#" class="btn btn-sm btn-round btn-light"><i class="fa-solid fa-fw fa-heart"></i></a>
                                                    </li>
                                                    <li class="list-inline-item dropdown">
                                                        <a href="#" class="btn btn-sm btn-round btn-light" role="button" id="dropdownShare3" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-solid fa-fw fa-share-alt"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare3">
                                                            <li><a class="dropdown-item" href="#"><i class="fab fa-twitter-square me-2"></i>Twitter</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fab fa-facebook-square me-2"></i>Facebook</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-copy me-2"></i>Copy link</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="card-title mb-1"><a href="hotel-detail.html">Royal Beach Resort</a></h5>
                                            <small><i class="bi bi-geo-alt me-2"></i>Manhattan street, London - 24578</small>
                                            <ul class="nav nav-divider mt-3">
                                                <li class="nav-item">Air Conditioning</li>
                                                <li class="nav-item">Wifi</li>
                                                <li class="nav-item">Kitchen</li>
                                                <li class="nav-item">Pool</li>
                                                <li class="nav-item"><a href="#" class="mb-0 text-primary">More+</a></li>
                                            </ul>
                                            <ul class="list-group list-group-borderless small mb-0 mt-2">
                                                <li class="list-group-item d-flex text-success p-0">
                                                    <i class="bi bi-patch-check-fill me-2"></i>Free Cancellation till 7 Jan 2022
                                                </li>
                                            </ul>
                                            <div class="d-sm-flex justify-content-sm-between align-items-center mt-3 mt-md-auto">
                                                <div class="d-flex align-items-center">
                                                    <h5 class="fw-bold mb-0 me-1">$540</h5>
                                                    <span class="mb-0 me-2">/day</span>
                                                </div>
                                                <div class="mt-3 mt-sm-0">
                                                    <a href="hotel-detail.html" class="btn btn-sm btn-dark mb-0 w-100">Select Room</a>    
                                                </div>                  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2">
                                <div class="row g-0">
                                    <div class="col-md-5 position-relative">
                                        <div class="tiny-slider arrow-round arrow-xs arrow-dark overflow-hidden rounded-2">
                                            <div class="tns-outer" id="tns2-ow">
                                                <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">2</span>  of 4
                                                </div>
                                                    <div id="tns2-mw" class="tns-ovh">
                                                        <div class="tns-inner" id="tns2-iw">
                                                            <div class="tiny-slider-inner  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" data-autoplay="false" data-arrow="true" data-dots="false" data-items="1" id="tns2" style="transition-duration: 0s; transform: translate3d(-16.6667%, 0px, 0px);">
                                                            <div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                                                <img src="{{ asset('/images/hotel_1_06.jpg') }}" alt="Card image">
                                                            </div>
                                                            <div class="tns-item tns-slide-active" id="tns2-item0">
                                                                <img src="{{ asset('/images/hotel_1_08.jpg')}}" alt="Card image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tns-controls" aria-label="Carousel Navigation" tabindex="0">
                                                    <button type="button" data-controls="prev" tabindex="-1" aria-controls="tns2"><i class="bi bi-arrow-left"></i></button>
                                                    <button type="button" data-controls="next" tabindex="-1" aria-controls="tns2"><i class="bi bi-arrow-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="card-body py-md-2 d-flex flex-column h-100 position-relative">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star-half-alt text-warning"></i></li>
                                                </ul>
                                                <ul class="list-inline mb-0 z-index-2">
                                                    <li class="list-inline-item">
                                                        <a href="#" class="btn btn-sm btn-round btn-light"><i class="fa-solid fa-fw fa-heart"></i></a>
                                                    </li>
                                                    <li class="list-inline-item dropdown">
                                                        <a href="#" class="btn btn-sm btn-round btn-light" role="button" id="dropdownShare4" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-solid fa-fw fa-share-alt"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare4">
                                                            <li><a class="dropdown-item" href="#"><i class="fab fa-twitter-square me-2"></i>Twitter</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fab fa-facebook-square me-2"></i>Facebook</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-copy me-2"></i>Copy link</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="card-title mb-1"><a href="hotel-detail.html">Park Plaza Lodge Hotel</a></h5>
                                            <small><i class="bi bi-geo-alt me-2"></i>5855 W Century Blvd, Los Angeles - 90045</small>
                                            <ul class="nav nav-divider mt-3">
                                                <li class="nav-item">Air Conditioning</li>
                                                <li class="nav-item">Wifi</li>
                                                <li class="nav-item">Kitchen</li>
                                                <li class="nav-item">Pool</li>
                                            </ul>
                                            <ul class="list-group list-group-borderless small mb-0 mt-2">
                                                <li class="list-group-item d-flex text-success p-0">
                                                    <i class="bi bi-patch-check-fill me-2"></i>Free Cancellation till 7 Jan 2022
                                                </li>
                                                <li class="list-group-item d-flex text-success p-0">
                                                    <i class="bi bi-patch-check-fill me-2"></i>Free Breakfast
                                                </li>
                                            </ul>
                                            <div class="d-sm-flex justify-content-sm-between align-items-center mt-3 mt-md-auto">
                                                <div class="d-flex align-items-center">
                                                    <h5 class="fw-bold mb-0 me-1">$845</h5>
                                                    <span class="mb-0 me-2">/day</span>
                                                </div>
                                                <div class="mt-3 mt-sm-0">
                                                    <a href="hotel-detail.html" class="btn btn-sm btn-dark mb-0 w-100">Select Room</a>    
                                                </div>                  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow p-2">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="{{ asset('/images/hotel_1_10.jpg') }}" class="card-img rounded-2" alt="Card image">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body py-md-2 d-flex flex-column h-100 position-relative">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0 small"><i class="fa-solid fa-star-half-alt text-warning"></i></li>
                                                </ul>
                                                <ul class="list-inline mb-0 z-index-2">
                                                    <li class="list-inline-item">
                                                        <a href="#" class="btn btn-sm btn-round btn-light"><i class="fa-solid fa-fw fa-heart"></i></a>
                                                    </li>
                                                    <li class="list-inline-item dropdown">
                                                        <a href="#" class="btn btn-sm btn-round btn-light" role="button" id="dropdownShare5" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-solid fa-fw fa-share-alt"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare5">
                                                            <li><a class="dropdown-item" href="#"><i class="fab fa-twitter-square me-2"></i>Twitter</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fab fa-facebook-square me-2"></i>Facebook</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-copy me-2"></i>Copy link</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="card-title mb-1"><a href="hotel-detail.html">Beverly Hills Marriott</a></h5>
                                            <small><i class="bi bi-geo-alt me-2"></i>31J W Spark Street, California - 24578</small>
                                            <ul class="nav nav-divider mt-3">
                                                <li class="nav-item">Air Conditioning</li>
                                                <li class="nav-item">Wifi</li>
                                                <li class="nav-item">Kitchen</li>
                                                <li class="nav-item">Pool</li>
                                            </ul>
                                            <ul class="list-group list-group-borderless small mb-0 mt-2">
                                                <li class="list-group-item d-flex text-danger p-0">
                                                    <i class="bi bi-patch-check-fill me-2"></i>Non Refundable
                                                </li>
                                            </ul>
                                            <div class="d-sm-flex justify-content-sm-between align-items-center mt-3 mt-md-auto">
                                                <div class="d-flex align-items-center">
                                                    <h5 class="fw-bold mb-0 me-1">$645</h5>
                                                    <span class="mb-0 me-2">/day</span>
                                                </div>
                                                <div class="mt-3 mt-sm-0">
                                                    <a href="#" class="btn btn-sm btn-dark mb-0 w-100">Select Room</a>    
                                                </div>                  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<script src="{{ asset('/assets/vendor/nouislider/nouislider.min.js')}}"></script>
<script>
    const clearBtn = document.getElementById('clearFilter');
    if(clearBtn){
        clearBtn.addEventListener('click', function() {
            const form = document.querySelector('form#search_filter');
            if(form){
                form.reset();
                document.getElementById('clear_session').value = 1;
                form.submit();
            }
        });
    }
</script>
@endsection