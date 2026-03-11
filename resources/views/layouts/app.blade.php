<!doctype html>
<html lang="en">
<head>
	<title>Zakaru International</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Zakaru International">
	<meta name="description" content="Zakaru International">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')
 
		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
		}

		const setTheme = function (theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
		    var el = document.querySelector('.theme-icon-active');
			if(el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
				const activeThemeIcon = document.querySelector('.theme-icon-active use')
				const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
				const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

				document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
					element.classList.remove('active')
				})

				btnToActive.classList.add('active')
				activeThemeIcon.setAttribute('href', svgOfActiveBtn)
			}

			window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
				if (storedTheme !== 'light' || storedTheme !== 'dark') {
					setTheme(getPreferredTheme())
				}
			})

			showActiveTheme(getPreferredTheme())

			document.querySelectorAll('[data-bs-theme-value]')
				.forEach(toggle => {
					toggle.addEventListener('click', () => {
						const theme = toggle.getAttribute('data-bs-theme-value')
						localStorage.setItem('theme', theme)
						setTheme(theme)
						showActiveTheme(theme)
					})
				})

			}
		})
		
	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('/images/zakaru.png')}}">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;family=Poppins:wght@400;500;700&amp;display=swap">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

	<!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/font-awesome/css/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/tiny-slider/tiny-slider.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/glightbox/css/glightbox.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/flatpickr/css/flatpickr.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/choices/css/choices.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/stepper/css/bs-stepper.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/splide-master/css/splide.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/nouislider/nouislider.css')}}">
	
	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/custom.css')}}">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

  	@include('partials.header')

	@yield('content')

  	@include('partials.footer')

  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  	<script src="{{ asset('/assets/vendor/tiny-slider/tiny-slider.js')}}"></script>
  	<script src="{{ asset('/assets/vendor/glightbox/js/glightbox.js')}}"></script>
  	<script src="{{ asset('/assets/vendor/flatpickr/js/flatpickr.min.js')}}"></script>
  	<script src="{{ asset('/assets/vendor/choices/js/choices.min.js')}}"></script>
	<script src="{{ asset('/assets/vendor/stepper/js/bs-stepper.min.js')}}"></script>
	<script src="{{ asset('/assets/vendor/splide-master/js/splide.min.js')}}"></script>
	<script src="{{ asset('/assets/vendor/sticky-js/sticky.min.js')}}"></script>
	<script src="{{ asset('/assets/vendor/nouislider/nouislider.min.js')}}"></script>
	<script src="{{ asset('/assets/js/functions.js')}}"></script>
</body>
</html>
