@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Packages</h2>
        <a href="{{ route('admin.packages.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-lg me-1"></i> Add Package
        </a>
    </div>
    <div class="card shadow-sm rounded-4 border-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark text-white">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Rooms</th>
                        <th>Tours</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($packages as $package)
                        <tr class="align-middle">
                            <td class="fw-semibold">{{ $loop->iteration }}</td>
                            <td>{{ $package->name }}</td>
                            <td>₹{{ number_format($package->price,2) }}</td>
                            <td>
                                @foreach($package->rooms as $room)
                                    <span class="badge bg-info text-dark">{{ $room->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($package->tours as $tour)
                                    <span class="badge bg-primary">{{ $tour->name }}</span>
                                @endforeach
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.packages.edit',$package) }}" class="btn btn-sm btn-outline-warning rounded-pill me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.packages.destroy',$package) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No packages found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($packages->hasPages())
        <div class="card-footer d-flex justify-content-end">
            {{ $packages->links('components.custom_pagination') }}
        </div>
        @endif
    </div>
</div>
@endsection
