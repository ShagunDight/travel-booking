<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('/images/zakaru.png') }}">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <!-- jQuery Validation -->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

        <!-- Additional Methods (for extension, etc.) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>

        <style>
            body {
                background: #f5f6fa;
                overflow-x: hidden;
            }

            /* Sidebar */
            .sidebar {
                width: 250px;
                height: 100vh;
                position: fixed;
                left: 0;
                top: 0;
                background: #1e1e2d;
                padding-top: 20px;
                transition: all 0.3s ease;
                z-index: 1050;
            }

            .sidebar h4 {
                font-weight: 700;
            }

            .sidebar a {
                color: #cfd1d8;
                padding: 12px 20px;
                display: block;
                text-decoration: none;
                font-size: 15px;
                white-space: nowrap;
            }

            .sidebar a i {
                margin-right: 8px;
            }

            .sidebar a:hover,
            .sidebar a.active {
                background: #34344a;
                color: #fff;
            }

            /* Content */
            .content {
                margin-left: 260px;
                padding: 20px;
                transition: all 0.3s ease;
            }

            /* Topbar */
            .topbar {
                background: #fff;
                padding: 12px 20px;
                border-bottom: 1px solid #ddd;
                position: sticky;
                top: 0;
                z-index: 1000;
            }

            .sidebar-toggle {
                display: none;
            }

            /* Mobile */
            @media (max-width: 768px) {
                .sidebar {
                    left: -260px;
                }

                .sidebar.show {
                    left: 0;
                }

                .content {
                    margin-left: 0;
                    padding: 15px;
                }

                .sidebar-toggle {
                    display: inline-block;
                }

                body.sidebar-open {
                    overflow: hidden;
                }
            }
        </style>
    </head>

    <body>
        <!-- Sidebar -->
        <div class="sidebar bg-dark vh-100 d-flex flex-column py-3 shadow-lg">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center px-3 mb-4">
                <h4 class="text-white fw-bold m-0">
                    <i class="bi bi-speedometer2 me-2"></i> Admin Panel
                </h4>
                <button class="btn btn-sm btn-outline-light d-md-none" id="sidebarClose">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="nav flex-column px-2">
                <a href="{{ url('/admin/dashboard') }}" class="nav-link text-white rounded-3 mb-2 {{ request()->is('admin/dashboard') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>

                <a href="/admin/banners" class="nav-link text-white rounded-3 mb-2 {{ request()->is('admin/banners*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-image me-2"></i> Banners
                </a>

                <a href="/admin/hotels" class="nav-link text-white rounded-3 mb-2 {{ request()->is('admin/hotels*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-building me-2"></i> Hotels
                </a>

                <a href="/admin/rooms" class="nav-link text-white rounded-3 mb-2 {{ request()->is('admin/rooms*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-door-open me-2"></i> Rooms
                </a>

                <a href="/admin/categories" class="nav-link text-white rounded-3 mb-2 {{ request()->is('admin/categories*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-key me-2"></i> Categories
                </a>

                <a href="/admin/tours" class="nav-link text-white rounded-3 mb-2 {{ request()->is('admin/tours*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-map me-2"></i> Tours
                </a>

                <a href="/admin/taxi" class="nav-link text-white rounded-3 mb-2 {{ request()->is('admin/taxi*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-map me-2"></i> Taxi-inquiries
                </a>

                {{-- <a href="/admin/packages" class="nav-link text-white rounded-3 mb-2 {{ request()->is('admin/packages*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-box-seam me-2"></i> Packages
                </a> --}}

                <a href="/admin/cities" class="nav-link text-white rounded-3 mb-2 {{ request()->is('admin/cities*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-geo-alt me-2"></i> Destinations
                </a>

                <a href="/admin/countries" class="nav-link text-white rounded-3 mb-2 {{ request()->is('admin/countries*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-geo-alt me-2"></i> Country
                </a>

                <a href="/admin/bookings" class="nav-link text-white rounded-3 mb-2 {{ request()->is('admin/bookings*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-calendar-check me-2"></i> Bookings
                </a>

                <a href="/admin/reviews" class="nav-link text-white rounded-3 mb-2 {{ request()->is('admin/reviews*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-chat-dots me-2"></i> Reviews
                </a>

                <a href="/admin/users" class="nav-link text-white rounded-3 mb-2 {{ request()->is('admin/users*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-people me-2"></i> Users
                </a>

                <a href="/admin/roles" class="nav-link text-white rounded-3 mb-2 {{ request()->is('admin/roles*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-shield-lock me-2"></i> Roles
                </a>
                {{-- <a href="/admin/permissions" class="nav-link text-white rounded-3 mb-2 {{ request()->is('admin/permissions*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-key me-2"></i> Permissions
                </a> --}}
            </nav>
        </div>


        <!-- Content -->
        <div class="content">
            <div class="topbar d-flex justify-content-between align-items-center px-3 py-2 border-bottom bg-white">
                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-light btn-sm sidebar-toggle" id="sidebarToggle"><i class="bi bi-list"></i></button>
                    <h6 class="m-0 fw-semibold">Admin Panel</h6>
                </div>
                <div class="dropdown">
                    <a href="#" class="text-decoration-none text-dark fw-semibold dropdown-toggle" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li class="px-3 py-2 text-muted small">
                            {{ auth()->user()->email }}
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">Settings</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Page Content -->
            <div class="mt-4">
                @yield('content')
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        @stack('scripts')
    </body>

    <script>
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarClose  = document.getElementById('sidebarClose');
        const sidebar = document.querySelector('.sidebar');

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.add('show');
                document.body.classList.add('sidebar-open');
            });
        }

        if (sidebarClose) {
            sidebarClose.addEventListener('click', () => {
                sidebar.classList.remove('show');
                document.body.classList.remove('sidebar-open');
            });
        }
    </script>
</html>
