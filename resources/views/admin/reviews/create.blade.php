@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Add Review</h2>
        <a href="{{ route('admin.reviews.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Reviews
        </a>
    </div>
    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body">
            <form action="{{ route('admin.reviews.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">User</label>
                    <select name="user_id" class="form-select rounded-3 shadow-sm" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Booking</label>
                    <select name="booking_id" class="form-select rounded-3 shadow-sm" required>
                        @foreach($bookings as $booking)
                            <option value="{{ $booking->id }}">Booking #{{ $booking->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Rating</label>
                    <select name="rating" class="form-select rounded-3 shadow-sm" required>
                        @for($i=1;$i<=5;$i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Comment</label>
                    <textarea name="comment" class="form-control rounded-3 shadow-sm" rows="4">{{ old('comment') }}</textarea>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success btn-lg rounded-3 shadow-sm">
                        <i class="bi bi-check-circle me-1"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
