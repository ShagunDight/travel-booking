@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Bookings</h2>
        <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-lg me-1"></i> Add Booking
        </a>
    </div>
    <div class="card shadow-sm rounded-4 border-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark text-white">
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Type</th>
                        <th>Item</th>
                        <th>Guests</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr class="align-middle">
                            <td class="fw-semibold">{{ $loop->iteration }}</td>
                            @php
                                $details = json_decode($booking->traveler_details);
                            @endphp
                            <td>{{ $booking->user ? $booking->user->name : $details->first_name }}</td>
                            <td>
                                {{ class_basename($booking->bookable_type) === 'Property' ? 'Hotel' : class_basename($booking->bookable_type) }}
                            </td>
                            <td>{{ $booking->bookable->name ?? 'N/A' }}</td>
                            <td>{{ $booking->guests }}</td>
                            <td>₹{{ number_format($booking->amount,2) }}</td>
                            <td>
                                <span class="badge 
                                    @if($booking->status=='confirmed') bg-success 
                                    @elseif($booking->status=='success') bg-success
                                    @elseif($booking->status=='pending') bg-warning 
                                    @else bg-danger @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.bookings.edit',$booking) }}" class="btn btn-sm btn-outline-warning rounded-pill me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.bookings.destroy',$booking) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">No bookings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($bookings->hasPages())
        <div class="card-footer d-flex justify-content-end">
            {{ $bookings->links('components.custom_pagination') }}
        </div>
        @endif
    </div>
</div>
@endsection
