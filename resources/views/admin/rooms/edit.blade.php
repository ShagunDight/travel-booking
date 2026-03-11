@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Edit Room</h2>
        <a href="{{ route('admin.rooms.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Rooms
        </a>
    </div>
    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body">

            <form id="roomEditForm" action="{{ route('admin.rooms.update',$room->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Hotel <span class="text-danger">*</span></label>
                    <select name="property_id" class="form-select rounded-3 shadow-sm @error('property_id') is-invalid @enderror" required>
                        <option value="">Select Hotel</option>
                        @foreach($hotels as $hotel)
                            <option value="{{ $hotel->id }}" {{ old('property_id',$room->property_id) == $hotel->id ? 'selected' : '' }}>
                                {{ $hotel->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('property_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Room Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control rounded-3 shadow-sm @error('name') is-invalid @enderror"
                           value="{{ old('name',$room->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Capacity <span class="text-danger">*</span></label>
                    <input type="number" name="capacity" class="form-control rounded-3 shadow-sm @error('capacity') is-invalid @enderror"
                           value="{{ old('capacity',$room->capacity) }}" min="1" required>
                    @error('capacity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Price <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="price_per_night" class="form-control rounded-3 shadow-sm @error('price_per_night') is-invalid @enderror"
                           value="{{ old('price_per_night',$room->price_per_night) }}" required>
                    @error('price_per_night')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Description</label>
                    <textarea name="description" class="form-control rounded-3 shadow-sm @error('description') is-invalid @enderror"
                              rows="4">{{ old('description',$room->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Features</label>
                    @php
                        $options = ['WiFi','AC','Breakfast','Pool','Parking'];
                        $selected = old('features', $room->features ?? []);
                    @endphp
                    @foreach($options as $option)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="features[]" value="{{ $option }}"
                                {{ in_array($option, $selected) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $option }}</label>
                        </div>
                    @endforeach
                </div>

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

    $("#roomEditForm").validate({
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "div",

        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            if(element.prop("type") === "checkbox") {
                element.closest(".mb-3").append(error);
            } else {
                element.closest(".mb-3").append(error);
            }
        },

        highlight: function (element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },

        unhighlight: function (element) {
            $(element).removeClass("is-invalid").addClass("is-valid");
        },

        rules: {
            property_id: {
                required: true
            },
            name: {
                required: true,
                minlength: 2,
                maxlength: 255
            },
            capacity: {
                required: true,
                number: true,
                min: 1
            },
            price_per_night: {
                required: true,
                number: true,
                min: 0
            }
        },

        messages: {
            property_id: {
                required: "Please select a hotel"
            },
            name: {
                required: "Please enter room name",
                minlength: "Room name must be at least 2 characters",
                maxlength: "Room name cannot exceed 255 characters"
            },
            capacity: {
                required: "Please enter capacity",
                number: "Capacity must be a number",
                min: "Capacity cannot be less than 1"
            },
            price_per_night: {
                required: "Please enter price per night",
                number: "Price must be a valid number",
                min: "Price cannot be negative"
            }
        },

        submitHandler: function(form) {
            $('button[type="submit"]').prop('disabled', true);
            form.submit();
        }
    });

});
</script>
@endsection
