<footer class="bg-dark pt-5">
	<div class="container">
		<div class="row g-4">
			<div class="col-lg-3">
				<a href="index.html">
					<img class="h-120px" src="{{ asset('/images/zakaru.png')}}" alt="logo">
				</a>
				<p class="my-3 text-body-secondary">Departure defective arranging rapturous did believe him all had supported.</p>
				<p class="mb-2"><a href="#" class="text-body-secondary text-primary-hover"><i class="bi bi-telephone me-2"></i>+1234 568 963</a> </p>
				<p class="mb-0"><a href="#" class="text-body-secondary text-primary-hover"><i class="bi bi-envelope me-2"></i>example@gmail.com</a></p>
			</div>
			<div class="col-lg-8 ms-auto">
				<div class="row g-4">
					<div class="col-6 col-md-3">
						<h5 class="text-white mb-2 mb-md-4">Page</h5>
						<ul class="nav flex-column text-primary-hover">
							<li class="nav-item"><a class="nav-link text-body-secondary" href="{{ url('/about-us') }}">About us</a></li>
							<li class="nav-item"><a class="nav-link text-body-secondary" href="{{ url('/contact-us') }}">Contact us</a></li>
						</ul>
					</div>
					<div class="col-6 col-md-3">
						<h5 class="text-white mb-2 mb-md-4">Link</h5>
						<ul class="nav flex-column text-primary-hover">
							<li class="nav-item"><a class="nav-link text-body-secondary" href="{{ url('/register') }}">Sign up</a></li>
							<li class="nav-item"><a class="nav-link text-body-secondary" href="{{ url('/login') }}">Sign in</a></li>
							<li class="nav-item"><a class="nav-link text-body-secondary" href="{{ route('privacyPolicy') }}">Privacy Policy</a></li>
							<li class="nav-item"><a class="nav-link text-body-secondary" href="{{ url('terms') }}">Terms</a></li>
						</ul>
					</div>
					<div class="col-6 col-md-3">
						<h5 class="text-white mb-2 mb-md-4">Global</h5>
						<ul class="nav flex-column text-primary-hover">
							<li class="nav-item"><a class="nav-link text-body-secondary" href="#">India</a></li>
							<li class="nav-item"><a class="nav-link text-body-secondary" href="#">Canada</a></li>
							<li class="nav-item"><a class="nav-link text-body-secondary" href="#">Malaysia</a></li>
						</ul>
					</div>
					<div class="col-6 col-md-3">
						<h5 class="text-white mb-2 mb-md-4">Booking</h5>
						<ul class="nav flex-column text-primary-hover">
							<li class="nav-item">
								<a class="nav-link text-body-secondary" href="{{ url('/hotels') }}"><i class="fa-solid fa-hotel me-2"></i>Hotel</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-body-secondary" href="{{ url('/tours') }}"><i class="fa-solid fa-globe-americas me-2"></i>Tour</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-4 justify-content-between mt-0 mt-md-2">
			<div class="col-sm-7 col-md-6 col-lg-4">
				{{-- <h5 class="text-white mb-2">Payment &amp; Security</h5>
				<ul class="list-inline mb-0 mt-3">
					<li class="list-inline-item"> <a href="#"><img src="assets/images/element/paypal.svg" class="h-30px" alt=""></a></li>
					<li class="list-inline-item"> <a href="#"><img src="assets/images/element/visa.svg" class="h-30px" alt=""></a></li>
					<li class="list-inline-item"> <a href="#"><img src="assets/images/element/mastercard.svg" class="h-30px" alt=""></a></li>
					<li class="list-inline-item"> <a href="#"><img src="assets/images/element/expresscard.svg" class="h-30px" alt=""></a></li>
				</ul> --}}
			</div>
			<div class="col-sm-5 col-md-6 col-lg-3 text-sm-end">
				<h5 class="text-white mb-2">Follow us on</h5>
				<ul class="list-inline mb-0 mt-3">
					<li class="list-inline-item"> <a class="btn btn-sm px-2 bg-facebook mb-0" href="#"><i class="fab fa-fw fa-facebook-f"></i></a> </li>
					<li class="list-inline-item"> <a class="btn btn-sm shadow px-2 bg-instagram mb-0" href="#"><i class="fab fa-fw fa-instagram"></i></a> </li>
					<li class="list-inline-item"> <a class="btn btn-sm shadow px-2 bg-twitter mb-0" href="#"><i class="fab fa-fw fa-twitter"></i></a> </li>
					<li class="list-inline-item"> <a class="btn btn-sm shadow px-2 bg-linkedin mb-0" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a> </li>
				</ul>	
			</div>
		</div>
		<hr class="mt-4 mb-0">
		<div class="row">
			<div class="container">
				<div class="align-items-center py-3 text-center">
					<div class="text-body-secondary text-primary-hover"> Copyrights ©<?php echo date('Y'); ?> Zakaru International. Build by 
						<a href="#" class="text-body-secondary">DightInfotech</a>. 
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
