@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Add Country</h2>
        <a href="{{ route('admin.countries.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Countries
        </a>
    </div>
    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body">
            <form id="countryFrom" action="{{ route('admin.countries.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Country Code <span class="text-danger">*</span></label>
                    <input type="text" name="country_code" class="form-control rounded-3 shadow-sm" value="{{ old('country_code') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Country Name</label>
                    <input type="text" name="country_name" class="form-control rounded-3 shadow-sm" value="{{ old('country_name') }}">
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

    // Initialize form validation
    $("#countryFrom").validate({
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
            country_code: {
                required: true,
                minlength: 2,
                maxlength: 10
            },
            country_name: {
                required: true,
            }
        },
        messages: {
            country_code: {
                required: "Please enter country code",
                minlength: "Country code must be at least 2 characters",
                maxlength: "Country code cannot exceed 10 characters"
            },
            country_name: {
                required: "Please enter country name",
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
