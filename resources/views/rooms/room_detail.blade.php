@extends('layouts.app')
@section('content')
<style>
    .listingRoom #tns1-ow .tns-controls [data-controls=next]{
        right: 25px;
    }
</style>
<main>
    <section class="pt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <h1 class="fs-3">{{ $hotel->name }}</h1>
                    <p class="fw-bold mb-0"><i class="bi bi-geo-alt me-2"></i>{{ $hotel->address }}</p>
                </div>
            </div>
            <div class="tiny-slider arrow-round arrow-blur listingRoom">
                <div class="tns-outer" id="tns1-ow">
                    <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">9 to 10</span>  of 4</div>
                    <div id="tns1-mw" class="tns-ovh">
                        <div class="tns-inner" id="tns1-iw">
                            <div class="tiny-slider-inner  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" data-autoplay="true" data-arrow="true" data-edge="0" data-dots="false" data-items="2" data-items-sm="1" id="tns1" style="transform: translate3d(-66.6667%, 0px, 0px);">
                                @foreach($hotel->property_image as $key => $value)    
                                    <div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                        <a class="w-100 h-100" data-glightbox="" data-gallery="gallery" href="{{ asset($value->url) }}">
                                            <div class="card card-element-hover card-overlay-hover overflow-hidden">
                                                <img src="{{ asset($value->url) }}" class="rounded-3" alt="">
                                                <div class="hover-element w-100 h-100">
                                                    <i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <div class="card bg-transparent p-0">
                        <div class="card-header bg-transparent border-bottom d-sm-flex justify-content-sm-between align-items-center p-0 pb-3">
                            <h4 class="mb-2 mb-sm-0">Select Rooms</h4>
                            <div class="col-sm-4">
                                {{-- <form class="form-control-bg-light">
                                    <label class="form-label" for="options">Options</label>
                                    <select id="options" class="form-select form-select-sm js-choice border-0" aria-label="Select Option">
                                        <option value="">Select Option</option>
                                        <option value="recently">Recently search</option>
                                        <option value="popular">Most popular</option>
                                        <option value="top">Top rated</option>
                                    </select>
                                </form> --}}
                            </div>
                        </div>
                        <div class="card-body p-0 pt-3">
                            <div class="vstack gap-5">
                                @foreach($rooms as $key => $value)    
                                    <div class="card border bg-transparent p-3">
                                        <div class="row g-3 g-md-4">
                                            <div class="col-md-4">
                                                <div class="position-relative">
                                                    <img src="assets/images/category/hotel/4by3/02.jpg" class="card-img" alt="">
                                                    <div class="card-img-overlay">
                                                        <a href="assets/images/gallery/12.jpg" class="badge bg-dark stretched-link" data-glightbox="" data-gallery="gallery">
                                                            5 Photos <i class="bi bi-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                    <a data-glightbox="" data-gallery="gallery" href="assets/images/gallery/11.jpg" class="stretched-link z-index-9"></a>
                                                    <a data-glightbox="" data-gallery="gallery" href="assets/images/gallery/15.jpg"></a>
                                                    <a data-glightbox="" data-gallery="gallery" href="assets/images/gallery/16.jpg"></a>
                                                </div>	
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body d-flex flex-column p-0 h-100">
                                                    <h5 class="card-title">{{ $value->name }}</h5>
                                                    <ul class="nav small nav-divider mb-0">
                                                        {{-- <li class="nav-item mb-0">
                                                            <i class="fa-regular fa-square me-1"></i>315 sq.ft
                                                        </li> --}}
                                                        <li class="nav-item mb-0">
                                                            <i class="fa-solid fa-table-cells-large me-1"></i>City view
                                                        </li>
                                                        <li class="nav-item mb-0">
                                                            <i class="fa-solid fa-bed me-1"></i>King Bed
                                                        </li>
                                                    </ul>
                                                    <div class="d-flex justify-content-between align-items-center mt-2 mt-md-auto">
                                                        <div class="d-flex text-success">
                                                            <h6 class="h5 mb-0 text-success"><i class="fa fa-inr"></i>{{ $value->price_per_night }}</h6>
                                                            <span class="fw-light">/per night</span>
                                                        </div>
                                                        <a href="#" class="btn btn-sm btn-dark mb-0">Select room</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
                    
                    $totalPrice = $value->price_per_night * $rooms;
                    $finalPrice = ($totalPrice - 200) + 100;
                @endphp
                <aside class="col-xl-5 d-none d-xl-block">
                    <div class="card bg-transparent border">
                        <div class="card-header bg-transparent border-bottom">
                            <h4 class="card-title mb-0">Price Summary</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-4 mb-3">
                                <div class="col-md-6">
                                    <div class="bg-light py-3 px-4 rounded-3">
                                        <h6 class="fw-light small mb-1">Check-in</h6>
                                        <h6 class="mb-0">{{ $checkIn }} {{date('Y')}}</h6>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bg-light py-3 px-4 rounded-3">
                                        <h6 class="fw-light small mb-1">Check out</h6>
                                        <h6 class="mb-0">{{ $checkOut }} {{date('Y')}}</h6>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-borderless mb-3">
                                <li class="list-group-item px-2 d-flex justify-content-between">
                                    <span class="h6 fw-light mb-0"><i class="fa fa-inr"></i>{{ $value->price_per_night }} x {{$rooms}} Nights</span>
                                    <span class="h6 fw-light mb-0"><i class="fa fa-inr"></i>{{ $totalPrice }}</span>
                                </li>
                                <li class="list-group-item px-2 d-flex justify-content-between">
                                    <span class="h6 fw-light mb-0">10% campaign discount</span>
                                    <span class="h6 fw-light mb-0">-<i class="fa fa-inr"></i>200</span>
                                </li>
                                <li class="list-group-item px-2 d-flex justify-content-between">
                                    <span class="h6 fw-light mb-0">Services Fee</span>
                                    <span class="h6 fw-light mb-0"><i class="fa fa-inr"></i>100</span>
                                </li>
                                <li class="list-group-item bg-light d-flex justify-content-between rounded-2 px-2 mt-2">
                                    <span class="h5 fw-normal mb-0 ps-1">Total</span>
                                    <span class="h5 fw-normal mb-0"><i class="fa fa-inr"></i>{{ $finalPrice }}</span>
                                </li>
                            </ul>
                            <div class="d-grid gap-2">
                                <a href="{{ route('hotels.hotel_booking', $hotel->id) }}" class="btn btn-dark mb-0">Continue To Book</a>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</main>
@endsection