@extends('layouts.app')
@section('content')

<main>
    <section class="pt-0">
        <div class="container">
            <div class="p-3 p-sm-5 rounded-3" style="background-image: url(/images/04.jpg); background-position: center center; background-repeat: no-repeat; background-size: cover;">
                <!-- Banner title -->
                <div class="row"> 
                    <div class="col-md-8 mx-auto my-5"> 
                        <h1 class="text-center text-dark">{{ $data['location'] ? $data['location'] : 'Maldives' }}</h1>
                        <ul class="nav nav-divider h6 text-dark mb-0 justify-content-center">
                            <li class="nav-item">1 Destination</li>
                            <li class="nav-item">115 Package</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row mt-n4 mt-sm-n7">
                <div class="col-11 mx-auto">
                    <div class="bg-mode shadow p-4 rounded-3">
                        <form class="form-control-bg-transparent bg-mode rounded-3" method="POST" action="{{ route('tour.search') }}">
                            @csrf
                            <div class="row g-4 align-items-center">
                                <div class="col-xl-10">
                                    <div class="row g-4">
                                        <div class="col-md-6 col-lg-4">
                                            <label class="h6 fw-normal mb-0"><i class="bi bi-geo-alt text-primary me-1"></i>Location</label>
                                            <div class="form-border-bottom form-control-transparent form-fs-lg mt-2">
                                                <select name="location" class="form-select js-choice" data-search-enabled="true">
                                                    <option value="">Select location</option>
                                                    @foreach($locations as $key => $location)
                                                        <option {{ ($data['location'] ?? '') == $location ? "selected" : "" }}>{{ $location }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label class="h6 fw-normal mb-0"><i class="bi bi-calendar text-primary me-1"></i>Date</label>
                                            <div class="form-border-bottom form-control-transparent form-fs-lg mt-2">
                                                <input type="text" name="date" class="form-control flatpickr flatpickr-input" value="{{ $data['date'] ?? '' }}" placeholder="Choose a date" data-date-format="d M Y" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label class="h6 fw-normal mb-0"><i class="bi bi-geo-alt text-primary me-1"></i>Type</label>
                                            <div class="form-border-bottom form-control-transparent form-fs-lg mt-2">
                                                <select name="capmping" class="form-select js-choice" data-search-enabled="true">
                                                    <option value="">Select Type</option>
                                                    <option value="1" {{ ($data['capmping'] ?? '') == 1 ? "selected" : "" }}>Without Capmping</option>
                                                    <option value="2" {{ ($data['capmping'] ?? '') == 2 ? "selected" : "" }}>With Capmping</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-lg btn-dark mb-0">Take a Tour</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-0">
        <div class="container">
            <div class="row g-4 align-items-center justify-content-between mb-4">
                <div class="col-12 col-xl-8">
                    <h5 class="mb-0">Showing {{ count($packages) }} results</h5>
                </div>
                <div class="col-xl-2">
                </div>
            </div>
            <div class="row g-4">
                @forelse($packages as $key => $value)
                    <div class="col-md-6 col-xl-4">
                        <div class="card card-hover-shadow pb-0 h-100">
                            <div class="position-relative">
                                <img src="{{ asset($value->image ?? "/images/tours/default.jpg") }}" class="card-img-top" alt="Card image">
                                <div class="card-img-overlay d-flex flex-column p-4 z-index-1">
                                    <div class="w-100 mt-auto">
                                        <span class="badge text-bg-white fs-6">{{ $value->duration }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body px-3">
                                <h5 class="card-title mb-0"><a href="{{ route('tours.tour_detail', $value->id) }}" class="stretched-link">{{ $value->name }}</a></h5>
                                {{-- <span class="small"><i class="far fa-calendar-alt me-2"></i>April 12-17</span> --}}

                                <ul class="nav nav-divider mt-3 mb-0">
                                    <li class="nav-item h6 fw-normal mb-0">
                                        <i class="fa-solid fa-hotel text-info me-2"></i>1 Hotel
                                    </li>
                                    <li class="nav-item h6 fw-normal mb-0">
                                        <i class="fa-solid fa-person-skating text-danger me-2"></i>2 Activities
                                    </li>
                                </ul>
                            </div>

                            <div class="card-footer pt-0">
                                <div class="d-sm-flex justify-content-sm-between align-items-center flex-wrap">
                                    <div class="hstack gap-2">
                                        <h5 class="fw-normal text-success mb-0"><i class="fa fa-inr"></i>{{ $value->price }}</h5>
                                        <small>/per person</small>
                                        {{-- <span class="text-decoration-line-through"><i class="fa fa-inr"></i>1800</span> --}}
                                    </div>
                                    <div class="mt-2 mt-sm-0">
                                        <a href="{{ route('tours.tour_detail', $value->id) }}" class="btn btn-sm btn-primary mb-0">View Details</a>    
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
                                    On <strong>{{ $data['date_range'] }}</strong>
                                @endif
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="row">
                <div class="col-12">
                    @if ($packages->hasPages())
                        <nav class="d-flex justify-content-center" aria-label="navigation">
                            <ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                                
                                {{-- Previous Page Link --}}
                                @if ($packages->onFirstPage())
                                    <li class="page-item mb-0 disabled">
                                        <span class="page-link"><i class="fa-solid fa-angle-left"></i></span>
                                    </li>
                                @else
                                    <li class="page-item mb-0">
                                        <a class="page-link" href="{{ $packages->previousPageUrl() }}" rel="prev">
                                            <i class="fa-solid fa-angle-left"></i>
                                        </a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($packages->links()->elements[0] ?? [] as $page => $url)
                                    @if ($page == $packages->currentPage())
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
                                @if ($packages->hasMorePages())
                                    <li class="page-item mb-0">
                                        <a class="page-link" href="{{ $packages->nextPageUrl() }}" rel="next">
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
                </div>
            </div>
        </div>
    </section>

</main>
@endsection