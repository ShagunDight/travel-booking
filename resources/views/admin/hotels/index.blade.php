@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Hotels</h2>
        <a href="{{ route('admin.hotels.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-lg me-1"></i> Add Hotel
        </a>
    </div>
    <div class="card shadow-sm rounded-4 border-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">City</th>
                        <th scope="col">Address</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($hotels as $hotel)
                        <tr class="align-middle">
                            <td class="fw-semibold">{{ $loop->iteration }}</td>
                            <td>{{ $hotel->name }}</td>
                            <td>
                                <span class="badge bg-primary text-white">{{ $hotel->city->name }}</span>
                            </td>
                            <td>{{ $hotel->address }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.hotels.edit', $hotel) }}" class="btn btn-sm btn-outline-warning rounded-pill me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.hotels.destroy', $hotel) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                No hotels found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($hotels->hasPages())
        <div class="card-footer d-flex justify-content-end">
            {{ $hotels->links('components.custom_pagination') }}
        </div>
        @endif
    </div>
</div>
@endsection
