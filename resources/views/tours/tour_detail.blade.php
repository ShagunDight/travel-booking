@extends('layouts.app')
@section('content')

<main>
	<section class="pt-4 pt-lg-5">
		<div class="container position-relative">
			<div class="row">
				<div class="col-12">
					<div class="d-md-flex justify-content-md-between">
						<div>
							<h1 class="fs-2">{{ $tour->name }}</h1>
							<ul class="nav nav-divider h6 text-body mb-0">
								<li class="nav-item">{{ $tour->duration }}</li>
								<li class="nav-item">1 Country - 2 Cities</li>
							</ul>
						</div>
						{{-- <ul class="list-inline text-end">
							<li class="list-inline-item">
								<a href="#" class="btn btn-sm btn-light px-2"><i class="fa-solid fa-fw fa-heart"></i></a>
							</li>
							<li class="list-inline-item dropdown">
								<a href="#" class="btn btn-sm btn-light px-2" role="button" id="dropdownShare" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fa-solid fa-fw fa-share-alt"></i>
								</a>
								<ul class="dropdown-menu dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare">
									<li><a class="dropdown-item" href="#"><i class="fab fa-twitter-square me-2"></i>Twitter</a></li>
									<li><a class="dropdown-item" href="#"><i class="fab fa-facebook-square me-2"></i>Facebook</a></li>
									<li><a class="dropdown-item" href="#"><i class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
									<li><a class="dropdown-item" href="#"><i class="fa-solid fa-copy me-2"></i>Copy link</a></li>
								</ul>
							</li>
						</ul> --}}
					</div>
				</div>
			</div>
			<div class="row mt-md-5">
				<div class="col-12">
					<div class="splide splide-main mb-3 splide--fade splide--ltr splide--draggable is-active" data-splide="{&quot;type&quot; : &quot;fade&quot;,&quot;autoplay&quot;: true,&quot;heightRatio&quot;:0.5,&quot;pagination&quot;:false,&quot;arrows&quot;:false,&quot;cover&quot;:true,&quot;lazyLoad&quot;:&quot;sequential&quot;}" id="splide02" style="visibility: visible;">
						<div class="splide__track" id="splide02-track" style="">
							<ul class="splide__list" id="splide02-list">
								<li class="splide__slide rounded" id="splide02-slide01" aria-hidden="true" tabindex="-1" style="width: 1170px; height: 585px; transition: opacity 400ms cubic-bezier(0.42, 0.65, 0.27, 0.99); background: url(&quot;{{ asset($tour->tour_images->url)}}&quot;) center center / cover no-repeat;">
									<img src="{{ asset($tour->tour_images->url ?? 'images/tours/default.jpg')}}" alt="{{$tour->tour_images->alt}}" style="display: none;">
									<a href="assets/images/gallery/04.jpg" class="stretched-link" data-glightbox="" data-gallery="banner"></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="splide splide-thumb splide--slide splide--ltr splide--draggable splide--nav is-active" data-splide="{&quot;rewind&quot;:true,&quot;fixedWidth&quot;:200,&quot;fixedHeight&quot;:120,&quot;isNavigation&quot;:true,&quot;gap&quot;:20,&quot;focus&quot;:&quot;center&quot;,&quot;pagination&quot;:false,&quot;cover&quot;:true,&quot;lazyLoad&quot;:&quot;sequential&quot;,&quot;breakpoints&quot;:{&quot;600&quot;:{&quot;fixedWidth&quot;:150,&quot;fixedHeight&quot;:80}}}" id="splide01" style="visibility: visible;">
						<div class="splide__track" id="splide01-track">
							<ul class="splide__list" id="splide01-list" style="transform: translateX(-570px);">
								<li class="splide__slide" id="splide01-slide01" aria-hidden="true" tabindex="-1" role="button" aria-label="Go to slide 1" aria-controls="splide02-slide01" style="margin-right: 20px; width: 200px; height: 120px; background: url(&quot;{{ asset($tour->tour_images->url)}}&quot;) center center / cover no-repeat;">
									<img src="{{ asset($tour->tour_images->url)}}" alt="{{ url($tour->tour_images->alt)}}" style="display: none;">
								</li>
							</ul>
						</div>
						<div class="splide__arrows">
							<button class="splide__arrow  splide__arrow--prev p-splide__arrow--prev bg-primary" aria-controls="splide01-track" aria-label="Previous slide"><span class="spi-angle-left text-white"><i class="fa-solid fa-fw fa-angle-left"></i></span></button>
							<button class="splide__arrow splide__arrow--next p-splide__arrow--next bg-primary" aria-controls="splide01-track" aria-label="Go to first slide"><span class="spi-angle-right text-white"><i class="fa-solid fa-fw fa-angle-right"></i></span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="py-0">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<ul class="nav nav-pills nav-justified nav-responsive bg-primary bg-opacity-10 rounded p-2" id="tour-pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link mb-0" id="tour-pills-tab-1" data-bs-toggle="pill" data-bs-target="#tour-pills-tab1" type="button" role="tab" aria-controls="tour-pills-tab1" aria-selected="false" tabindex="-1">Overview</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link mb-0 active" id="tour-pills-tab-2" data-bs-toggle="pill" data-bs-target="#tour-pills-tab2" type="button" role="tab" aria-controls="tour-pills-tab2" aria-selected="true">Itinerary</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link mb-0" id="tour-pills-tab-3" data-bs-toggle="pill" data-bs-target="#tour-pills-tab3" type="button" role="tab" aria-controls="tour-pills-tab3" aria-selected="false" tabindex="-1">Inclusions &amp; Exclusion</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link mb-0" id="tour-pills-tab-4" data-bs-toggle="pill" data-bs-target="#tour-pills-tab4" type="button" role="tab" aria-controls="tour-pills-tab4" aria-selected="false" tabindex="-1">Tour Policy</button>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	
	<section class="pt-4 pt-md-5">
		<div class="container">
			<div class="row g-4 g-md-5">
				<div class="col-xl-8">
					<div class="tab-content mb-0" id="tour-pills-tabContent">
						<div class="tab-pane fade" id="tour-pills-tab1" role="tabpanel" aria-labelledby="tour-pills-tab-1">
							<div class="card bg-transparent p-0">
								<div class="card-header bg-transparent border-bottom p-0 pb-3">
									<h3 class="mb-0">Overview</h3>
								</div>
								<div class="card-body p-0 pt-3">
									<p class="mb-4">{{ $tour->description }}</p>
									<h5>Tour Info</h5>
									<ul class="list-group list-group-borderless mb-4">
										<li class="list-group-item">
											<span class="h6 mb-0 me-1">Place Covered:</span>
											<span class="h6 fw-light mb-0">{{ $tour->name }}</span>
										</li>
										<li class="list-group-item">
											<span class="h6 mb-0 me-1">Duration:</span>
											<span class="h6 fw-light mb-0">{{ $tour->duration }}</span>
										</li>
										{{-- <li class="list-group-item">
											<span class="h6 mb-0 me-1">Start Point:</span>
											<span class="h6 fw-light mb-0">Ngurah International Airport</span>
										</li>
										<li class="list-group-item">
											<span class="h6 mb-0 me-1">End Point:</span>
											<span class="h6 fw-light mb-0">Ngurah International Airport</span>
										</li> --}}
									</ul>
									<h5>Tour Highlights</h5>
									<ul class="list-group list-group-borderless mb-4">
										<li class="list-group-item h6 fw-light d-flex mb-0">
											<i class="bi bi-arrow-right me-2"></i>Experience a delightful tropical getaway with a luxurious stay and witness the picture-perfect beaches, charming waterfalls and so much more
										</li>
										<li class="list-group-item h6 fw-light d-flex mb-0">
											<i class="bi bi-arrow-right me-2"></i>Dependent on so extremely delivered by. Yet &#xFEFF;no jokes worse her why. Bed one supposing breakfast day fulfilled off depending questions.
										</li>
										<li class="list-group-item h6 fw-light d-flex mb-0">
											<i class="bi bi-arrow-right me-2"></i>Whatever boy her exertion his extended. Ecstatic followed handsome drawings entirely Mrs one yet outweigh. 
										</li>
										<li class="list-group-item h6 fw-light d-flex mb-0">
											<i class="bi bi-arrow-right me-2"></i>Meant balls it if up doubt small purse. Required his you put the outlived answered position. A pleasure exertion if believed provided to. 
										</li>
										<li class="list-group-item h6 fw-light d-flex mb-0">
											<i class="bi bi-arrow-right me-2"></i>All led out world this music while asked. Paid mind even sons does he door no. Attended overcame repeated it is perceived Marianne in.
										</li>
									</ul>
									<h5>More About The Beautiful Bali with Malaysia Tour</h5>
									<ul class="list-group list-group-borderless mb-0">
										<li class="list-group-item h6 fw-light d-flex mb-0">
											<i class="fa-solid fa-check-circle text-success me-2"></i>Guidelines issued by the State-Government are to be followed. Social distancing to be maintained. Frequent hand sanitization and use of mask recommended.
										</li>
										<li class="list-group-item h6 fw-light d-flex mb-0">
											<i class="fa-solid fa-check-circle text-success me-2"></i>No purse as fully me or point. Kindness owns whatever betrayed her moreover procured replying for and. 
										</li>
										<li class="list-group-item h6 fw-light d-flex mb-0">
											<i class="fa-solid fa-check-circle text-success me-2"></i>International / Domestic flights are not included in the package.
										</li>
										<li class="list-group-item h6 fw-light d-flex mb-0">
											<i class="fa-solid fa-check-circle text-success me-2"></i>Started several mistakes joy say painful removed reached end. State burst think end are its.
										</li>
										<li class="list-group-item h6 fw-light d-flex mb-0">
											<i class="fa-solid fa-check-circle text-success me-2"></i>Yet remarkably appearance gets him his projection. Diverted endeavor bed peculiar men the not desirous.
										</li>
										<li class="list-group-item h6 fw-light d-flex mb-0">
											<i class="fa-solid fa-check-circle text-success me-2"></i>Acuteness abilities ask can offending furnished fulfilled sex. The difference in the cost shall be borne by the client in case of any amendment in the package due to an increase in the number of guests
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="tab-pane fade active show" id="tour-pills-tab2" role="tabpanel" aria-labelledby="tour-pills-tab-2">
							<div class="card bg-transparent p-0">
								<div class="card-header bg-transparent border-bottom p-0 pb-3">
									<h3 class="mb-0">Itinerary</h3>
								</div>
								<div class="card-body p-0 pt-3">
									<div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
										@foreach($tour->itineraries as $key => $value)
											<div class="accordion-item mb-3">
												<h6 class="accordion-header font-base" id="heading-{{$key}}">
													<button class="accordion-button rounded d-inline-block collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$key}}" aria-expanded="false" aria-controls="collapse-{{$key}}">
														<span class="lead me-1 fw-normal">Day {{$value->day}}:</span>{{ $value->title }}
													</button>
												</h6>
												<div id="collapse-{{$key}}" class="accordion-collapse collapse" aria-labelledby="heading-{{$key}}" data-bs-parent="#accordionExample2" style="">
													<div class="accordion-body mt-3">
												        {{ $value->description }}
											        </div>
												</div>
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tour-pills-tab3" role="tabpanel" aria-labelledby="tour-pills-tab-3">
							<div class="card bg-transparent p-0">
								<div class="card-header bg-transparent border-bottom p-0 pb-3">
									<h3 class="mb-0">Inclusions &amp; Exclusions</h3>
								</div>
								<div class="card-body p-0 pt-3">
									<h5>Inclusion</h5>
									<ul class="list-group list-group-borderless mb-3">
										{!! $tour->inclusions[0]->text !!}
										{{-- <li class="list-group-item d-flex mb-0"><i class="fa-solid fa-check text-success me-2"></i>
											<span class="h6 fw-normal">{!! $tour->inclusions[0]->text !!}</span>
										</li> --}}
									</ul>
									<h5>Exclusion</h5>
									<ul class="list-group list-group-borderless mb-3">
										{!! $tour->exclusions[0]->text !!}
										{{-- <li class="list-group-item d-flex mb-0"><i class="fa-solid fa-times text-danger me-2"></i>
											<span class="h6 fw-normal">Lunch and dinner are not included in CP plans</span>
										</li> --}}
									</ul>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tour-pills-tab4" role="tabpanel" aria-labelledby="tour-pills-tab-4">
							<div class="card bg-transparent p-0">
								<div class="card-header bg-transparent border-bottom p-0 pb-3">
									<h3 class="mb-0">Tour Policy</h3>
								</div>
								<div class="card-body p-0 pt-3">
									<h5 class="mt-4">Cancellation Policy:</h5>
									{!! $tour->policies->cancellation !!}
									{{-- <ul class="list-group list-group-borderless">
										<li class="list-group-item">
											<span class="h6 fw-normal me-1 mb-0"><i class="bi bi-dot"></i>10 days:</span>
											<span>100%</span>
										</li>
										
									</ul> --}}
									<h5 class="mt-4">Refund Policy:</h5>
									<p class="mb-2">{!! $tour->policies->refund !!}</p>
								</div>
							</div>
						</div>
					</div>	
				</div>
				<aside class="col-xl-4">
					<div class="row g-4">
						<div class="col-md-6 col-xl-12">
							<div class="card card-body border bg-transparent">
								<div class="hstack gap-2 mb-1">
									<h3 class="card-title mb-0">&#x20b9; {{ $tour->price }}</h3>
									<span class="fs-5">/person</span>
								</div>
								<div class="d-flex justify-content-between mb-4">
									<ul class="list-inline mb-0">
										<li class="list-inline-item me-1 h6 mb-0">4.5</li>
										<li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
										<li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
										<li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
										<li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
										<li class="list-inline-item me-0 small"><i class="fa-solid fa-star-half-alt text-warning"></i></li>
									</ul>
								</div>
								<div class="d-grid gap-2">
									<a href="{{ route('tours.tour_booking', $tour->id) }}" class="btn btn-primary">Book Now</a>
									{{-- <button class="btn btn-outline-primary mb-0" type="button" data-bs-toggle="modal" data-bs-target="#inquiryForm">
										<i class="bi bi-eye fa-fw me-2"></i>Send Inquiry
									</button> --}}
								</div>
							</div>
						</div>
						<div class="col-md-6 col-xl-12">
							<div class="card card-body bg-light p-4">
								<h4 class="card-title">Need Help?</h4>
								<ul class="list-group list-group-borderless">
									<li class="list-group-item py-3">
										<a href="#" class="h6 mb-0">
											<i class="bi fa-fw bi-telephone-forward text-primary fs-5 me-2"></i>
											<span class="fw-light me-1">Call us on:</span>+31 123 456 789
										</a>
									</li>
									<li class="list-group-item py-0"><hr class="my-0"></li>
									<li class="list-group-item py-3">
										<h6 class="mb-0">
											<i class="bi fa-fw bi-alarm text-primary fs-5 me-2"></i>
											<span class="h6 fw-light me-1 mb-0">Timing:</span>10AM to 7PM
										</h6>
									</li>
									<li class="list-group-item py-0"><hr class="my-0"></li>
									<li class="list-group-item py-3">
										<a href="#" class="h6 mb-0">
											<i class="bi fa-fw bi-headset text-primary fs-5 me-2"></i>Let Us Call You
										</a>
									</li>
									<li class="list-group-item py-0"><hr class="my-0"></li>
									<li class="list-group-item pt-3 pb-0">
										<a href="contact.html" class="h6 mb-0">
											<i class="bi fa-fw bi-calendar-check text-primary fs-5 me-2"></i>Book Appointments
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</section>
</main>

@endsection