@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Add Hotel</h2>
        <a href="{{ route('admin.hotels.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Hotels
        </a>
    </div>
    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body">

            <form id="hotelForm" action="{{ route('admin.hotels.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Hotel Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control rounded-3 shadow-sm @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Slug <span class="text-danger">*</span></label>
                    <input type="text" name="slug" class="form-control rounded-3 shadow-sm @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required>
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">City <span class="text-danger">*</span></label>
                    <select name="city_id" class="form-select rounded-3 shadow-sm @error('city_id') is-invalid @enderror" required>
                        <option value="">Select City</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Address</label>
                    <input type="text" name="address" class="form-control rounded-3 shadow-sm @error('address') is-invalid @enderror" value="{{ old('address') }}">
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">About</label>
                    <textarea name="about" class="form-control rounded-3 shadow-sm @error('about') is-invalid @enderror" rows="4">{{ old('about') }}</textarea>
                    @error('about')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Hotel Visibility</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                        <label class="form-check-label fw-medium" for="featured">
                            Mark as Featured Hotel
                        </label>
                    </div>
                    <small class="text-muted">
                        Enable this if you want to show this hotel in the <b>Featured Hotels</b> section.
                    </small>
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

    $("#hotelForm").validate({
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
            name: {
                required: true,
                minlength: 2,
                maxlength: 255
            },
            slug: {
                required: true,
                minlength: 2,
                maxlength: 255
            },
            city_id: {
                required: true,
                digits: true
            },
            address: {
                required: true,
                maxlength: 500
            },
            about: {
                maxlength: 1000
            }
        },

        messages: {
            name: {
                required: "Please enter hotel name",
                minlength: "Hotel name must be at least 2 characters",
                maxlength: "Hotel name cannot exceed 255 characters"
            },
            slug: {
                required: "Please enter slug",
                minlength: "Slug must be at least 2 characters",
                maxlength: "Slug cannot exceed 255 characters"
            },
            city_id: {
                required: "Please select a city",
                digits: "Invalid city selection"
            },
            address: {
                required: "Please enter the address",
                maxlength: "Address cannot exceed 500 characters"
            },
            about: {
                maxlength: "About section cannot exceed 1000 characters"
            }
        },

        submitHandler: function(form) {
            $('button[type="submit"]').prop('disabled', true); // prevent multiple clicks
            form.submit();
        }

    });

});
</script>
@endsection
