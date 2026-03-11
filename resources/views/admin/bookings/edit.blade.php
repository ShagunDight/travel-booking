@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Edit Booking</h2>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Bookings
        </a>
    </div>

    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body">
            <form id="bookingEditForm" action="{{ route('admin.bookings.update',$booking->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <!-- User -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">User <span class="text-danger">*</span></label>
                    <select name="user_id" class="form-select rounded-3 shadow-sm" required>
                        @foreach(\App\Models\User::all() as $user)
                            <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Booking Type -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Booking Type <span class="text-danger">*</span></label>
                    <select name="bookable_type" id="bookable_type" class="form-select rounded-3 shadow-sm" required>
                        <option value="">-- Select Booking Type --</option>
                        <option value="App\Models\Room" {{ $booking->bookable_type=='App\Models\Room'?'selected':'' }}>Room</option>
                        <option value="App\Models\Tour" {{ $booking->bookable_type=='App\Models\Tour'?'selected':'' }}>Tour</option>
                        <option value="App\Models\Package" {{ $booking->bookable_type=='App\Models\Package'?'selected':'' }}>Package</option>
                    </select>
                </div>

                <!-- Bookable ID -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Bookable Item <span class="text-danger">*</span></label>
                    <select name="bookable_id" id="bookable_id" class="form-select rounded-3 shadow-sm" required>
                        <option value="">-- Select Item --</option>
                        @if($booking->bookable)
                            <option value="{{ $booking->bookable->id }}" selected>{{ $booking->bookable->name }}</option>
                        @endif
                    </select>
                </div>

                <!-- Guests -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Guests <span class="text-danger">*</span></label>
                    <input type="number" name="guests" class="form-control rounded-3 shadow-sm" value="{{ old('guests',$booking->guests) }}" min="1" required>
                </div>

                <!-- Amount -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Amount <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="amount" class="form-control rounded-3 shadow-sm" value="{{ old('amount',$booking->amount) }}" required>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select rounded-3 shadow-sm" required>
                        <option value="pending" {{ old('status',$booking->status)=='pending'?'selected':'' }}>Pending</option>
                        <option value="confirmed" {{ old('status',$booking->status)=='confirmed'?'selected':'' }}>Confirmed</option>
                        <option value="cancelled" {{ old('status',$booking->status)=='cancelled'?'selected':'' }}>Cancelled</option>
                    </select>
                </div>

                <!-- Check-in Date -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Check-in Date</label>
                    <input type="date" name="check_in" class="form-control rounded-3 shadow-sm" value="{{ old('check_in', $booking->check_in ? date('Y-m-d', strtotime($booking->check_in)) : '') }}">
                </div>

                <!-- Check-out Date -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Check-out Date</label>
                    <input type="date" name="check_out" class="form-control rounded-3 shadow-sm" value="{{ old('check_out', $booking->check_out ? date('Y-m-d', strtotime($booking->check_out)) : '') }}">
                </div>

                <!-- Booking Date -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Booking Date</label>
                    <input type="date" name="booking_date" class="form-control rounded-3 shadow-sm" value="{{ old('booking_date', $booking->booking_date ? date('Y-m-d', strtotime($booking->booking_date)) : '') }}">
                </div>

                <!-- Submit -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success btn-lg rounded-3 shadow-sm">
                        <i class="bi bi-check-circle me-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    
    // Custom method for check-out > check-in
    $.validator.addMethod("greaterThan", function (value, element, param) {
        if (!value || !$(param).val()) return true;
        return new Date(value) > new Date($(param).val());
    }, "Check-out date must be after check-in date");

    $("#bookingEditForm").validate({
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "div",

        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".mb-3").append(error);
        },

        highlight: function (element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },

        unhighlight: function (element) {
            $(element).removeClass("is-invalid").addClass("is-valid");
        },

        rules: {
            guests: {
                required: true,
                digits: true,
                min: 1
            },
            amount: {
                required: true,
                number: true,
                min: 0
            },
            status: {
                required: true
            },
            check_in: {
                required: true,
                date: true
            },
            check_out: {
                required: true,
                date: true,
                greaterThan: "input[name='check_in']"
            },
            booking_date: {
                date: true
            }
        },

        messages: {
            guests: {
                required: "Please enter number of guests",
                digits: "Guests must be a number",
                min: "At least 1 guest is required"
            },
            amount: {
                required: "Please enter booking amount",
                number: "Enter a valid amount",
                min: "Amount cannot be negative"
            },
            status: {
                required: "Please select booking status"
            },
            check_out: {
                greaterThan: "Check-out date must be after check-in date"
            }
        },

        submitHandler: function (form) {
            $('button[type="submit"]').prop('disabled', true);
            form.submit();
        }
    });

});
</script>
<script>
$(document).ready(function() {

    $('#bookable_type').on('change', function() {
        var type = $(this).val();
        $('#bookable_id').html('<option value="">Loading...</option>');

        if(type) {
            $.ajax({
                url: "{{ route('admin.bookings.items') }}",
                type: "POST",
                data: { type: type },
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                dataType: "json",
                success: function(res) {
                    var html = '<option value="">-- Select Item --</option>';
                    if(res.length > 0){
                        $.each(res, function(i, item){
                            html += '<option value="'+item.id+'" '+(item.id == {{ $booking->bookable_id ?? 0 }} ? 'selected' : '')+'>'+item.name+'</option>';
                        });
                    }
                    $('#bookable_id').html(html);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        } else {
            $('#bookable_id').html('<option value="">-- Select Item --</option>');
        }
    });

    // Trigger change on page load to populate Bookable items for the selected type
    $('#bookable_type').trigger('change');

});
</script>

@endsection
