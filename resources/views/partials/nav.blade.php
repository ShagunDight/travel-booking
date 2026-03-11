<nav class="navbar navbar-expand-lg bg-light border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">Zakaru International</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ url('/hotels') }}">Hotels</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/tours') }}">Tours</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Flights</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Cabs</a></li>
            </ul>
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-sm btn-outline-danger">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Sign in</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign up</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
