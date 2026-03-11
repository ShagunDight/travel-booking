@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Add Booking</h2>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Bookings
        </a>
    </div>

    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body">
            <form id="bookingForm" action="{{ route('admin.bookings.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">User <span class="text-danger">*</span></label>
                    <select name="user_id" class="form-select rounded-3 shadow-sm" required>
                        @foreach(\App\Models\User::all() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Booking Type <span class="text-danger">*</span></label>
                    <select name="bookable_type" id="bookable_type" class="form-select rounded-3 shadow-sm" required>
                        <option value="">-- Select Booking Type --</option>
                        <option value="App\Models\Room">Room</option>
                        <option value="App\Models\Tour">Tour</option>
                        <option value="App\Models\Package">Package</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Bookable Item <span class="text-danger">*</span></label>
                    <select name="bookable_id" id="bookable_id" class="form-select rounded-3 shadow-sm" required>
                        <option value="">-- Select Item --</option>
                        @if(isset($booking) && $booking->bookable)
                            <option value="{{ $booking->bookable->id }}" selected>{{ $booking->bookable->name }}</option>
                        @endif
                    </select>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Guests <span class="text-danger">*</span></label>
                    <input type="number" name="guests" class="form-control rounded-3 shadow-sm" value="1" min="1" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Amount <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="amount" class="form-control rounded-3 shadow-sm" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select rounded-3 shadow-sm" required>
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Check-in Date</label>
                    <input type="date" name="check_in" class="form-control rounded-3 shadow-sm">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Check-out Date</label>
                    <input type="date" name="check_out" class="form-control rounded-3 shadow-sm">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Booking Date</label>
                    <input type="date" name="booking_date" class="form-control rounded-3 shadow-sm" value="<?php echo date('Y-m-d'); ?>">
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
<script>
    $(document).ready(function () {

        $.validator.addMethod("greaterThan", function (value, element, param) {
            if (!value || !$(param).val()) return true;
            return new Date(value) > new Date($(param).val());
        }, "Check-out date must be after check-in date");

        $("#bookingForm").validate({
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
                user_id: {
                    required: true
                },
                bookable_type: {
                    required: true
                },
                bookable_id: {
                    required: true,
                    digits: true
                },
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
                user_id: {
                    required: "Please select a user"
                },
                bookable_type: {
                    required: "Please select booking type"
                },
                bookable_id: {
                    required: "Please enter Bookable ID",
                    digits: "Only numeric values allowed"
                },
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
                    console.log(res);
                    var html = '<option value="">-- Select Item --</option>';
                    if(res.length > 0){
                        $.each(res, function(i, item){
                            html += '<option value="'+item.id+'">'+item.name+'</option>';
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

    // Trigger change on page load if editing
    @if(isset($booking))
        $('#bookable_type').trigger('change');
    @endif

});
</script>

@endsection
