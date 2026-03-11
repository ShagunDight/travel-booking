@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <h2 class="fw-bold mb-0 text-gradient">Zakaru International Overview</h2>
        <span class="badge bg-primary fs-6 shadow-sm">Admin Dashboard</span>
    </div>
    <div class="row g-4">

        <div class="col-12 col-sm-6 col-lg-3">
            <x-dashboard-card icon="bi bi-building" color="primary" label="Total Hotels" :count="$properties_count" />
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <x-dashboard-card icon="bi bi-door-open" color="success" label="Total Rooms" :count="$rooms_count" />
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <x-dashboard-card icon="bi bi-map" color="info" label="Total Tours" :count="$tours_count" />
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <x-dashboard-card icon="bi bi-box-seam" color="warning" label="Total Packages" :count="$packages_count" />
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <x-dashboard-card icon="bi bi-calendar-check" color="secondary" label="Total Bookings" :count="$bookings_count" />
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <x-dashboard-card icon="bi bi-chat-dots" color="danger" label="Total Reviews" :count="$reviews_count" />
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <x-dashboard-card icon="bi bi-geo-alt" color="dark" label="Total Cities" :count="$cities_count" />
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <x-dashboard-card icon="bi bi-people" color="primary" label="Total Users" :count="$users_count" />
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <x-dashboard-card icon="bi bi-shield-lock" color="info" label="Total Roles" :count="$roles_count" />
        </div>

        <!-- Permissions -->
        {{-- <div class="col-12 col-sm-6 col-lg-3">
            <x-dashboard-card icon="bi bi-key" color="secondary" label="Total Permissions" :count="$permissions_count" />
        </div> --}}
    </div>
</div>
@endsection
