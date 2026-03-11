@extends('layouts.app')

@section('content')

<main>
	<section class="py-3 py-sm-0">
		<div class="container">
			<button class="btn btn-primary d-sm-none w-100 mb-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditsearch" aria-controls="offcanvasEditsearch">
				<i class="bi bi-pencil-square me-2"></i>Edit Search
			</button>
			<div class="offcanvas-sm offcanvas-top" tabindex="-1" id="offcanvasEditsearch" aria-labelledby="offcanvasEditsearchLabel">
				<div class="offcanvas-header">
					<h5 class="offcanvas-title" id="offcanvasEditsearchLabel">Edit search</h5>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasEditsearch" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body p-2">
					<div class="bg-light p-4 rounded w-100">
						<form class="row g-4" method="POST" action="{{ route('hotel.search') }}">
							@csrf
							<div class="col-md-6 col-lg-4">
								<div class="form-size-lg form-fs-md">
									<label class="form-label" for="location">Location</label>
									<input type="hidden" name="clear_session" id="clear_session" value="0">
									<select id="location" name="location" class="form-select js-choice" data-search-enabled="true"aria-label="Select location">
										<option value="">Select location</option>
										<option value="San Jacinto, USA" {{ ($data['location'] ?? '') == "San Jacinto, USA" ? "selected" : "" }}>San Jacinto, USA</option>
										<option value="Blvd, Los Angeles" {{ ($data['location'] ?? '') == "Blvd, Los Angeles" ? "selected" : "" }}>Blvd, Los Angeles</option>
										<option value="North Dakota, Canada" {{ ($data['location'] ?? '') == "North Dakota, Canada" ? "selected" : "" }}>North Dakota, Canada</option>
										<option value="West Virginia, Paris" {{ ($data['location'] ?? '') == "West Virginia, Paris" ? "selected" : "" }}>West Virginia, Paris</option>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-lg-3">
								<div class="form-fs-md">
									<label class="form-label">Check in - out</label>
									<input type="text" name="date_range" class="form-control form-control-lg flatpickr flatpickr-input" data-mode="range" placeholder="Select date" value="{{ $data['date_range'] ?? '' }}" readonly="readonly">
								</div>
							</div>

							<div class="col-md-6 col-lg-3">
								<div class="form-fs-md">
									<div class="w-100">
										<label class="form-label">Guests &amp; rooms</label>
										<div class="dropdown guest-selector me-2">
											<input type="text" name="guests" class="form-guest-selector form-control form-control-lg selection-result" value="{{ $data['guests'] ?? '0 Guests 0 Rooms' }}" id="dropdownguest" data-bs-auto-close="outside" data-bs-toggle="dropdown">
										
											<ul class="dropdown-menu guest-selector-dropdown" aria-labelledby="dropdownguest">
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
							<div class="col-md-6 col-lg-2 mt-md-auto">
								<button class="btn btn-lg btn-primary w-100 mb-0" type="submit"><i class="bi bi-search fa-fw"></i>Search</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="py-0 pt-sm-5">
		<div class="container position-relative">
			<div class="row mb-3">
				<div class="col-12">
					<div class="d-lg-flex justify-content-lg-between mb-1">
						<div class="mb-2 mb-lg-0">
							<h1 class="fs-2">{{ $hotel->name }}</h1>
							<p class="fw-bold mb-0"><i class="bi bi-geo-alt me-2"></i>{{ $hotel->address }}
								{{-- <a href="#" class="ms-2 text-decoration-underline" data-bs-toggle="modal" data-bs-target="#mapmodal">
									<i class="bi bi-eye-fill me-1"></i>View On Map
								</a> --}}
							</p>
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
		</div>
	</section>

	<section class="card-grid pt-0">
		<div class="container">
			<div class="row g-2">
				<div class="col-md-6">
					<a data-glightbox="" data-gallery="gallery" href="{{ url($hotel->property_image[0]->url) }}">
						<div class="card card-grid-lg card-element-hover card-overlay-hover overflow-hidden" style="background-image:url({{$hotel->property_image[0]->url}}); background-position: center left; background-size: cover;">
							<div class="hover-element position-absolute w-100 h-100">
								<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-6">
					<div class="row g-2">
						{{-- <div class="col-12">
							<a data-glightbox="" data-gallery="gallery" href="assets/images/gallery/13.jpg">
								<div class="card card-grid-sm card-element-hover card-overlay-hover overflow-hidden" style="background-image:url(assets/images/gallery/13.jpg); background-position: center left; background-size: cover;">
									<div class="hover-element position-absolute w-100 h-100">
										<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
									</div>
								</div>
							</a>	
						</div> --}}
						@foreach($hotel->property_image->skip(1) as $key => $value)
							<div class="col-md-6">
								<a data-glightbox="" data-gallery="gallery" href="{{ url($value->url) }}">
									<div class="card card-grid-sm card-element-hover card-overlay-hover overflow-hidden" style="background-image:url({{ $value->url }}); background-position: center left; background-size: cover;">
										<div class="hover-element position-absolute w-100 h-100">
											<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
										</div>
									</div>
								</a>
							</div>
						@endforeach
						{{-- <div class="col-md-6">
							<div class="card card-grid-sm overflow-hidden" style="background-image:url(assets/images/gallery/11.jpg); background-position: center left; background-size: cover;">
								<div class="bg-overlay bg-dark opacity-7"></div>
								@foreach($hotel->property_image as $key => $value)
									<a data-glightbox="" data-gallery="gallery" href="{{ url($value->url) }}" class="stretched-link z-index-9"></a>
								@endforeach
								<div class="card-img-overlay d-flex h-100 w-100">
									<h6 class="card-title m-auto fw-light text-decoration-underline">
										<a href="#" class="text-white">View all</a>
									</h6>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="pt-0">
		<div class="container" data-sticky-container="">
			<div class="row g-4 g-xl-5">
				<div class="col-xl-7 order-1">
					<div class="vstack gap-5">
						<div class="card bg-transparent">
							<div class="card-header border-bottom bg-transparent px-0 pt-0">
								<h3 class="mb-0">About This Hotel</h3>
							</div>
							<div class="card-body pt-4 p-0">
								{{-- <h5 class="fw-light mb-4">Main Highlights</h5> --}}
								{{-- <div class="hstack gap-3 mb-3">
									<div class="icon-lg bg-light h5 rounded-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Free wifi" data-bs-original-title="Free wifi">
										<i class="fa-solid fa-wifi"></i>
									</div>
									<div class="icon-lg bg-light h5 rounded-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Swimming Pool" data-bs-original-title="Swimming Pool">
										<i class="fa-solid fa-swimming-pool"></i>
									</div>
									<div class="icon-lg bg-light h5 rounded-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Central AC" data-bs-original-title="Central AC">
										<i class="fa-solid fa-snowflake"></i>
									</div>
									<div class="icon-lg bg-light h5 rounded-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Free Service" data-bs-original-title="Free Service">
										<i class="fa-solid fa-concierge-bell"></i>
									</div>
								</div> --}}
								<p class="mb-3">{{ $hotel->about }}</p>
								{{-- <p class="mb-0">Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do. Water timed folly right aware if oh truth. Large above be to means. Dashwood does provide stronger is.</p>
								<div class="collapse" id="collapseContent" style="">
									<p class="my-3">We focus a great deal on the understanding of behavioral psychology and influence triggers which are crucial for becoming a well rounded Digital Marketer. We understand that theory is important to build a solid foundation, we understand that theory alone isn't going to get the job done so that's why this rickets is packed with practical hands-on examples that you can follow step by step.</p>
									<p class="mb-0">Behavioral psychology and influence triggers which are crucial for becoming a well rounded Digital Marketer. We understand that theory is important to build a solid foundation, we understand that theory alone isn't going to get the job done so that's why this tickets is packed with practical hands-on examples that you can follow step by step.</p>
								</div>
								<a class="p-0 mb-4 mt-2 btn-more d-flex align-items-center collapsed" data-bs-toggle="collapse" href="#collapseContent" role="button" aria-expanded="false" aria-controls="collapseContent">
									See <span class="see-more ms-1">more</span><span class="see-less ms-1">less</span><i class="fa-solid fa-angle-down ms-2"></i>
								</a> --}}
								<h5 class="fw-light mb-2">Advantages</h5>
								<ul class="list-group list-group-borderless mb-0">
									<li class="list-group-item h6 fw-light d-flex mb-0"><i class="bi bi-patch-check-fill text-success me-2"></i>Every hotel staff to have Proper PPT kit for COVID-19</li>
									<li class="list-group-item h6 fw-light d-flex mb-0"><i class="bi bi-patch-check-fill text-success me-2"></i>Every staff member wears face masks and gloves at all service times.</li>
									<li class="list-group-item h6 fw-light d-flex mb-0"><i class="bi bi-patch-check-fill text-success me-2"></i>Hotel staff ensures to maintain social distancing at all times.</li>
									<li class="list-group-item h6 fw-light d-flex mb-0"><i class="bi bi-patch-check-fill text-success me-2"></i>The hotel has In-Room Dining options available </li>
								</ul>
							</div>
						</div>
						<div class="card bg-transparent">
							<div class="card-header border-bottom bg-transparent px-0 pt-0">
								<h3 class="card-title mb-0">Amenities</h3>
							</div>
							<div class="card-body pt-4 p-0">
								<div class="row g-4">
									<div class="col-sm-6 my-0">
										<ul class="list-group list-group-borderless mt-2 mb-0">
											@foreach($hotel->amenities as $key => $value)
												<li class="list-group-item pb-0">
													<i class="fa-solid fa-check-circle text-success me-2"></i>{{ $value->name }}
												</li>
											@endforeach
										</ul>
									</div>
								</div>
							</div>
						</div>
						
						{{-- <div class="card bg-transparent" id="room-options">
							<div class="card-header border-bottom bg-transparent px-0 pt-0">
								<div class="d-sm-flex justify-content-sm-between align-items-center">
									<h3 class="mb-2 mb-sm-0">Room Options</h3>
									<div class="col-sm-4">
										<form class="form-control-bg-light">
											<select class="form-select form-select-sm js-choice border-0" aria-label="Select option">
												<option value="">Select Option</option>
												<option value="recent">Recently search</option>
												<option value="popular">Most popular</option>
												<option value="top">Top rated</option>
											</select>
										</form>
									</div>
								</div>
							</div>
							<div class="card-body pt-4 p-0">
								<div class="vstack gap-4">
									@foreach($hotel->rooms as $key => $value)							
										<div class="card shadow p-3">
											<div class="row g-4">
												<div class="col-md-5 position-relative">
													<div class="position-absolute top-0 start-0 z-index-1 mt-3 ms-4">
														<div class="badge text-bg-danger">30% Off</div>
													</div>
													<div class="tiny-slider arrow-round arrow-xs arrow-dark overflow-hidden rounded-2">
														<div class="tns-outer" id="tns1-ow">
															<div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">4</span>  of 4</div>
															<div id="tns1-mw" class="tns-ovh">
																<div class="tns-inner" id="tns1-iw">
																	<div class="tiny-slider-inner  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" data-autoplay="true" data-arrow="true" data-dots="false" data-items="1" id="tns1" style="transform: translate3d(-50%, 0px, 0px);">
																		@foreach($hotel->property_image as $key1 => $value1)
																			<div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
																				<img src="{{ asset($value1->url) }}" alt="{{$value1->alt}}">
																			</div>
																		@endforeach
																		<div class="tns-item" id="tns1-item0" aria-hidden="true" tabindex="-1">
																			<img src="assets/images/category/hotel/4by3/04.jpg" alt="Card image">
																		</div>
																		<div class="tns-item" id="tns1-item1" aria-hidden="true" tabindex="-1">
																			<img src="assets/images/category/hotel/4by3/02.jpg" alt="Card image">
																		</div>
																		<div class="tns-item tns-slide-active" id="tns1-item2">
																			<img src="assets/images/category/hotel/4by3/03.jpg" alt="Card image">
																		</div>
																		<div class="tns-item" id="tns1-item3" aria-hidden="true" tabindex="-1">
																			<img src="assets/images/category/hotel/4by3/01.jpg" alt="Card image">
																		</div>
																		<div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
																			<img src="assets/images/category/hotel/4by3/04.jpg" alt="Card image">
																		</div>
																	</div>
																</div>
															</div>
															<div class="tns-controls" aria-label="Carousel Navigation" tabindex="0">
																<button type="button" data-controls="prev" tabindex="-1" aria-controls="tns1"><i class="bi bi-arrow-left"></i></button>
																<button type="button" data-controls="next" tabindex="-1" aria-controls="tns1"><i class="bi bi-arrow-right"></i></button>
															</div>
														</div>
													</div>
													<a href="#" class="btn btn-link text-decoration-underline p-0 mb-0 mt-1" data-bs-toggle="modal" data-bs-target="#roomDetail"><i class="bi bi-eye-fill me-1"></i>View more details</a>
												</div>

												<div class="col-md-7">
													<div class="card-body d-flex flex-column h-100 p-0">
														<h5 class="card-title">
															<a href="#">{{ $value->name }}</a>
														</h5>
														<ul class="nav nav-divider mb-2">
															@foreach($value->features as $key1 => $value1)
																<li class="nav-item">{{ $value1 }}</li>
															@endforeach
														</ul>
														<p class="text-success mb-0">Free Cancellation till {{ date('d M, Y') }}</p>
														<div class="d-sm-flex justify-content-sm-between align-items-center mt-auto">
															<div class="d-flex align-items-center">
																<h5 class="fw-bold mb-0 me-1"><i class="fa fa-inr"></i>750</h5>
																<span class="mb-0 me-2">/day</span>
																<span class="text-decoration-line-through mb-0"><i class="fa fa-inr"></i>1000</span>
															</div>
															<div class="mt-3 mt-sm-0">
																<a href="#" class="btn btn-sm btn-primary mb-0">Select Room</a>    
															</div>                  
														</div>
													</div>
												</div>
											</div>
										</div>
									@endforeach
								</div>
							</div>
						</div> --}}

						<div class="card bg-transparent">
							<div class="card-header border-bottom bg-transparent px-0 pt-0">
								<h3 class="mb-0">Hotel Policies</h3>
							</div>
							<div class="card-body p-0">
								<ul class="list-group list-group-borderless mb-2">
									<li class="list-group-item d-flex">
										<i class="bi bi-check-circle-fill text-success me-2"></i>This is a family farmhouse, hence we request you to not indulge.
									</li>
									<li class="list-group-item d-flex">
										<i class="bi bi-check-circle-fill text-success me-2"></i>Drinking and smoking within controlled limits are permitted at the farmhouse but please do not create a mess or ruckus at the house.
									</li>
									<li class="list-group-item d-flex">
										<i class="bi bi-check-circle-fill text-success me-2"></i>Drugs and intoxicating illegal products are banned and not to be brought to the house or consumed.
									</li>
									<li class="list-group-item d-flex">
										<i class="bi bi-x-circle-fill text-danger me-2"></i>For any update, the customer shall pay applicable cancellation/modification charges.
									</li>
								</ul>
								
								<ul class="list-group list-group-borderless mb-2">
									<li class="list-group-item h6 fw-light d-flex mb-0">
										<i class="bi bi-arrow-right me-2"></i>Check-in: 1:00 pm - 9:00 pm
									</li>
									<li class="list-group-item h6 fw-light d-flex mb-0">
										<i class="bi bi-arrow-right me-2"></i>Check out: 11:00 am
									</li>
									<li class="list-group-item h6 fw-light d-flex mb-0">
										<i class="bi bi-arrow-right me-2"></i>Self-check-in with building staff
									</li>
									<li class="list-group-item h6 fw-light d-flex mb-0">
										<i class="bi bi-arrow-right me-2"></i>No pets
									</li>
									<li class="list-group-item h6 fw-light d-flex mb-0">
										<i class="bi bi-arrow-right me-2"></i>No parties or events
									</li>
									<li class="list-group-item h6 fw-light d-flex mb-0">
										<i class="bi bi-arrow-right me-2"></i>Smoking is allowed
									</li>
								</ul>

								<div class="bg-danger bg-opacity-10 rounded-2 p-3 mb-3">
									<p class="mb-0 text-danger">During the COVID-19 pandemic, all hosts and guests must review and follow Booking social distancing and other COVID-19-related guidelines.</p>
								</div>
								<div class="bg-danger bg-opacity-10 rounded-2 p-3">
									<p class="mb-0 text-danger">Smoke alarm not reported — The host hasn't reported a smoke alarm on the property. We suggest bringing a portable detector for your trip.</p>
								</div>
							</div>
						</div>
					</div>	
				</div>

				<aside class="col-xl-5 order-xl-2">
					<div data-sticky="" data-margin-top="100" data-sticky-for="1199" style="">
						<div class="card card-body border">
							<div class="d-sm-flex justify-content-sm-between align-items-center mb-3">
								<div>
									<span>Price Start at</span>
									<h4 class="card-title mb-0"><i class="fa fa-inr"></i>{{ $hotel->minRoomPrice->price_per_night }}</h4>
								</div>
								<div>
									<h6 class="fw-normal mb-0">1 room per night</h6>
									<small>+ <i class="fa fa-inr"></i>285 taxes &amp; fees</small>
								</div>
							</div>		

							<ul class="list-inline mb-2">
								<li class="list-inline-item me-1 h6 fw-light mb-0"><i class="bi bi-arrow-right me-2"></i>4.5</li>
								<li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
								<li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
								<li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
								<li class="list-inline-item me-0 small"><i class="fa-solid fa-star text-warning"></i></li>
								<li class="list-inline-item me-0 small"><i class="fa-solid fa-star-half-alt text-warning"></i></li>
							</ul>

							<p class="h6 fw-light mb-4"><i class="bi bi-arrow-right me-2"></i>Free breakfast available</p>
							@if(session()->has('searchHotel'))
								<div class="d-grid">
									<a href="{{ route('hotels.room_detail', $hotel->id) }}" class="btn btn-lg btn-primary-soft mb-0">Select Rooms Options</a>
								</div>
							@endif
						</div>
						{{-- <div class="mt-4 d-none d-xl-block">
							<h4>Today's Best Deal</h4>
							<div class="card shadow rounded-3 overflow-hidden">
								<div class="row g-0 align-items-center">
									<div class="col-sm-6 col-md-12 col-lg-6">
										<img src="assets/images/offer/04.jpg" class="card-img rounded-0" alt="">
									</div>
									<div class="col-sm-6 col-md-12 col-lg-6">
										<div class="card-body p-3">
											<h6 class="card-title"><a href="offer-detail.html" class="stretched-link">Travel Plan</a></h6>
											<p class="mb-0">Get up to $10,000 for lifetime limits</p>
										</div>
									</div>
								</div>
							</div>
						</div> --}}
					</div>	
				</aside>
			</div>
		</div>
	</section>
</main>
@endsection
