@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Tours</h2>
        <a href="{{ route('admin.tours.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-lg me-1"></i> Add Tour
        </a>
    </div>

    <div class="card shadow-sm rounded-4 border-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Location</th>
                        <th scope="col">Price</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tours as $tour)
                        <tr class="align-middle">
                            <td class="fw-semibold">{{ $loop->iteration }}</td>
                            <td>{{ $tour->name }}</td>
                            <td><span class="badge bg-success">{{ $tour->location }}</span></td>
                            <td>₹{{ $tour->price }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.tours.edit', $tour) }}" 
                                   class="btn btn-sm btn-outline-warning rounded-pill me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.tours.destroy', $tour) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle me-1"></i> No tours found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($tours->hasPages())
        <div class="card-footer d-flex justify-content-end">
            {{ $tours->links('components.custom_pagination') }}
        </div>
        @endif
    </div>
</div>
@endsection
