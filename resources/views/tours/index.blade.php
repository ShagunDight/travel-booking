@extends('layouts.app')

@section('content')

<main>
  <section class="pt-0">
    <div class="container position-relative">
      <div class="rounded-3 p-4 p-sm-5" style="background-image: url('{{ asset('/images/tours/02.jpg') }}'); background-size: cover;">
        <div class="row justify-content-between pb-5">
          <div class="col-md-12 col-lg-12 pb-9 text-center">
            <h1 class="text-white">Life Is Adventure Make The Best Of It</h1>
            <p class="text-white mb-0">Planning for a trip? we will organize your best trip with the best destination and within the best budgets!</p>
          </div>

          {{-- <div class="col-md-5 col-lg-4">
            <div class="card shadow p-2">
              <div class="position-absolute top-0 start-0 mt-n3 ms-n3 z-index-9">
                <img src="{{ asset('/images/tours/ele_05.svg') }}" class="h-70px" alt="">
                <span class="h5 text-white position-absolute top-50 start-50 translate-middle">40%</span>
              </div>
              <div class="rounded-3 overflow-hidden position-relative">
                <img src="{{ asset('/images/tours/05.jpg') }}" class="card-img" alt="">
                <div class="bg-overlay bg-dark opacity-4"></div>
                <div class="card-img-overlay d-flex">
                  <h6 class="text-white mt-auto mb-0">5 Days / 4 Nights</h6>
                </div>
              </div>
              <div class="card-body px-2">
                <div class="d-flex justify-content-between mb-2">
                  <a href="#" class="badge bg-primary bg-opacity-10 text-primary">Adventure</a>
                  <h6 class="fw-light m-0"><i class="fa-solid fa-star text-warning me-2"></i>4.5</h6>
                </div>
                <h6 class="card-title">
                  <a href="#">Maldives Sightseeing & Adventure Tour</a>
                </h6>
                <div class="d-flex justify-content-between">
                  <h6 class="text-success mb-0">&#x20b9; 3850 <span class="fw-light">/person</span></h6>
                  <span class="text-decoration-line-through">&#x20b9; 4682</span>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </div>

      <div class="row mt-n7">
        <div class="col-11 mx-auto">
          <form class="bg-mode shadow rounded-3 p-4" method="POST" action="{{ route('tour.search') }}">
            @csrf
            <div class="row g-4 align-items-center">
              <div class="col-xl-10">
                <div class="row g-4">
                  <div class="col-md-6 col-lg-4">
                    <label class="h6 fw-normal mb-0"><i class="bi bi-geo-alt text-primary me-1"></i>Location</label>
                    <select name="location" class="form-select js-choice mt-2">
                      <option>Select location</option>
                      @foreach($locations as $key => $location)
                        <option>{{ $location }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <label class="h6 fw-normal mb-0"><i class="bi bi-calendar text-primary me-1"></i>Date</label>
                    <input type="text" name="date" class="form-control flatpickr mt-2 flatpickr-input" placeholder="Choose a date">
                  </div>
                  {{-- <div class="col-md-6 col-lg-4">
                    <label class="h6 fw-normal mb-0"><i class="fa-solid fa-person-skating text-primary me-1"></i>Tour type</label>
                    <select name="trip_type" class="form-select js-choice mt-2">
                      <option>Select type</option>
                      <option>Adventure</option>
                      <option>Beach</option>
                      <option>Desert</option>
                      <option>History</option>
                    </select>
                  </div> --}}
                  <div class="col-md-6 col-lg-4">
                      <label class="form-label">Type</label>
                      <select name="capmping" class="form-select js-choice" data-search-enabled="true">
                          <option value="">Select Type</option>
                          <option value="1">Without Capmping</option>
                          <option value="2">With Capmping</option>
                      </select>
                  </div>
                </div>
              </div>
              <div class="col-xl-2">
                <div class="d-grid">
                  <button class="btn btn-lg btn-dark" type="submit">Take a Tour</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Recent Searches -->
      {{-- <div class="row g-2 mt-6">
        <div class="col-lg-2"><h4>Recent Searches</h4></div>
        <div class="col-lg-10">
          <div class="hstack flex-wrap gap-3">
            @foreach(['Taman Sari','The Grand Palace','Glacier National Park','Machu Picchu','Prambanan Temple','Batu Gong','Borobudur Temple','Great Barrier Reef','Argentine Patagonia'] as $search)
              <div class="alert bg-light small px-3 py-1 mb-0" role="alert">{{ $search }}</div>
            @endforeach
            <button type="button" class="btn btn-sm btn-primary-soft">Clear all</button>
          </div>
        </div>
      </div> --}}
    </div>
  </section>

  <!-- Packages -->
  <section class="pt-5">
    <div class="container text-center">
      <h2>Our Best Packages</h2>
      <div class="row g-4 mt-4">
        @foreach($tours as $key => $tour)
          <div class="col-sm-6 col-xl-3">
            <div class="card card-img-scale overflow-hidden bg-transparent">
              <div class="card-img-scale-wrapper rounded-3">
                <img src="{{ asset($tour->tour_images->url ?? 'images/tours/default.jpg' ) }}" class="card-img" alt="">
                <div class="card-img-overlay d-flex flex-column p-4">
                  <div class="d-flex justify-content-between">
                    {{-- <span class="badge text-bg-dark">{{ $pkg[3] }}</span> --}}
                    <span class="badge text-bg-white"><i class="fa-solid fa-star text-warning me-2"></i>4.3</span>
                  </div>
                  <div class="w-100 mt-auto">
                    <span class="badge text-bg-white fs-6">{{ $tour->duration }}</span>
                  </div>
                </div>
              </div>
              <div class="card-body px-2">
                <h5 class="card-title"><a href="{{ route('tours.tour_detail', $tour->id) }}">{{ $tour->name }}</a></h5>
                <div class="hstack gap-2">
                  <span class="h5 mb-0 text-success">&#x20b9; {{ $tour->price }}</span> 
                  <small>Starting price</small>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Subscribe -->
  {{-- <section class="pt-0 pt-md-5">
    <div class="row">
      <div class="col-md-7 mx-auto text-center py-5">
        <div class="bg-light rounded-3 p-4 text-center">
          <h2>Subscribe And Get a Special Discount</h2>
          <p>Speedily say has suitable disposal add boy. On forth doubt miles of child. Exercise joy man children rejoiced.</p>
          <form class="bg-body shadow rounded-2 p-2">
            <div class="input-group">
              <input class="form-control border-0 me-1" type="email" placeholder="Enter your email">
              <button type="button" class="btn btn-dark rounded-2 mb-0">Subscribe!</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section> --}}

  <!-- Top Categories -->
  <section class="pt-5">
    <div class="container text-center">
      <h2>Top Categories</h2>
      <div class="row g-4 mt-4">
        @foreach($categories as $cat)
        <div class="col-sm-6 col-lg-4 col-xl-3">  
          <div class="row g-2 align-items-center">
            <div class="col-md-6">
              <img src="{{ asset($cat->image_url) }}" class="rounded-3 w-100" alt="{{ $cat->name }}">
            </div>
            <div class="col-md-6">
              <h5 class="mb-1"><a href="#">{{ $cat->name }}</a></h5>
              <span>{{ $cat->places }} Places</span>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Discover Section -->
  <section class="pt-5">
    <div class="container">
      <div class="row g-4 align-items-center">
        <div class="col-lg-4">
          <h2 class="mb-0">Discover the best places to visit 🔥</h2>
          <div class="mt-4">
            <p class="text-muted">“Farther-related bed and passage comfort civility.” — Lori Stevens</p>
          </div>
          <div class="d-sm-flex justify-content-sm-between align-items-center mt-4">
            <!-- Avatar group -->
            {{-- <ul class="avatar-group mb-sm-0 list-unstyled d-flex">
              <li class="avatar me-2">
                <img class="avatar-img rounded-circle" src="{{ asset('assets/images/avatar/01.jpg') }}" alt="avatar">
              </li>
              <li class="avatar me-2">
                <img class="avatar-img rounded-circle" src="{{ asset('assets/images/avatar/02.jpg') }}" alt="avatar">
              </li>
              <li class="avatar me-2">
                <img class="avatar-img rounded-circle" src="{{ asset('assets/images/avatar/03.jpg') }}" alt="avatar">
              </li>
              <li class="avatar me-2">
                <img class="avatar-img rounded-circle" src="{{ asset('assets/images/avatar/04.jpg') }}" alt="avatar">
              </li>
              <li class="avatar">
                <div class="avatar-img rounded-circle bg-dark d-flex align-items-center justify-content-center">
                  <span class="text-white">+5</span>
                </div>
              </li>
            </ul> --}}
          </div>
        </div>

        <div class="col-lg-8">
          <div class="row g-4">
            <div class="col-md-6">
              <div class="card card-element-hover card-overlay-hover overflow-hidden">
                <img src="{{ asset('/images/tours/lalkella.jpg') }}" class="rounded-3 w-100" alt="place">
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-element-hover card-overlay-hover overflow-hidden mb-4">
                <img src="{{ asset('/images/tours/gangaghat.jpg') }}" class="rounded-3 w-100" alt="place">
              </div>
              <div class="card card-element-hover card-overlay-hover overflow-hidden">
                <img src="{{ asset('/images/tours/golden_temple.jpg') }}" class="rounded-3 w-100" alt="place">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

@endsection

