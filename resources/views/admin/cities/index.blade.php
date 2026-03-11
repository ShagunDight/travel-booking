@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Destinations</h2>
        <a href="{{ route('admin.cities.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-lg me-1"></i> Add Destination
        </a>
    </div>
    <div class="card shadow-sm rounded-4 border-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark text-white">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>State</th>
                        <th>Country</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cities as $city)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $city->name }}</td>
                            <td>{{ $city->state }}</td>
                            <td>{{ $city->country }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.cities.edit',$city) }}" class="btn btn-sm btn-outline-warning rounded-pill me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.cities.destroy',$city) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No Destinations found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($cities->hasPages())
        <div class="card-footer d-flex justify-content-end">
            {{ $cities->links('components.custom_pagination') }}
        </div>
        @endif
    </div>
</div>
@endsection
