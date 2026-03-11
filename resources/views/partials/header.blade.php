<header>
	<div class="top-header-item">
		<div class="container">
			<div class="row">
				<div class="top-header-part">
					<div class="mein-side-contant">
						<a href="#"  class="menu-list-drop"> <span class="icon-item-top"><i class="fa-solid fa-phone"></i></span>9988776655</a>
					</div>
					<div class="mein-side-contant">
						<a href="#" class="menu-list-drop"> <span class="icon-item-top"><i class="fa-solid fa-phone"></i></span>demotest@gmail.com</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="header-nav-bar">
				<div class="right-side-menu">
					<ul class="menu-list-item">
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a href="{{ url('/about-us') }}">About</a></li>
						<li><a href="{{ url('/contact-us') }}">Contact</a></li>
					</ul>
				</div>
				<div class="center-side-logo">
					<a class="navbar-brand" href="{{ url('/') }}">
						<img class="light-mode-item navbar-brand-item h-40" src="{{ asset('/images/zakaru.png')}}" alt="logo">
						<img class="dark-mode-item navbar-brand-item" src="{{ asset('/images/zakaru.png')}}" alt="logo">
					</a>
				</div>
				<div class="right-side-menu-drop">
					<div class="menu-drop-down">
						<div class="menu-list-item-nav">
							<ul class="menu-list-item">
								<li><a href="{{ url('/hotels') }}">Hostel</a></li>
								<li><a href="{{ url('/tours') }}">Tour</a></li>
								<li><a href="{{ url('/texi') }}">Texi</a></li>
								@guest
									<li><a href="{{ url('/login') }}">Login</a></li>
								@endguest
							</ul>
						</div>
						<div class="nev-drop-user">
							<ul class="nav flex-row align-items-center list-unstyled ms-xl-auto">
								<li class="nav-item ms-3 dropdown user-drop-down">
									<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
										<img class="avatar-img rounded-2" src="{{ auth()->check() && auth()->user()->image ? asset(auth()->user()->image) : 'https://www.pngkey.com/png/full/73-730434_04-dummy-avatar.png' }}" alt="avatar">
									</a>
									<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
										<li class="px-3 mb-3">
											<div class="d-flex align-items-center">
												<div class="avatar me-3">
													<img class="avatar-img rounded-circle shadow" src="{{ auth()->check() && auth()->user()->image ? asset(auth()->user()->image) : 'https://www.pngkey.com/png/full/73-730434_04-dummy-avatar.png' }}" alt="avatar">
												</div>
												<div>
													<a class="h6 mt-2 mt-sm-0" href="#">{{ auth()->user()->name ?? 'Lori Ferguson' }}</a>
													<p class="small m-0">{{ auth()->user()->email ?? 'example@gmail.com' }}</p>
												</div>
											</div>
										</li>
										<li> <hr class="dropdown-divider"></li>
										<li>
											<a class="dropdown-item" href="{{ route('mybooking') }}"><i class="bi bi-bookmark-check fa-fw me-2"></i>My Bookings</a>
										</li>
										{{-- <li>
												<a class="dropdown-item" href="#"><i class="bi bi-heart fa-fw me-2"></i>My Wishlist</a>
											</li> --}}
										<li>
											<a class="dropdown-item" href="{{ route('myprofile') }}"><i class="bi bi-gear fa-fw me-2"></i>Settings</a>
										</li>
										{{-- <li>
												<a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help Center</a>
											</li> --}}
										@auth
											<li> <hr class="dropdown-divider"></li>
											<li>
												<a href="#" class="dropdown-item bg-danger-soft-hover" onclick="event.preventDefault(); event.stopPropagation(); document.getElementById('logoutForm').submit();">
													<i class="bi bi-power me-2"></i> Sign Out
												</a>
												<form id="logoutForm" method="POST" action="{{ route('logout') }}" class="d-none">
													@csrf
												</form>
											</li>
										@endauth
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>