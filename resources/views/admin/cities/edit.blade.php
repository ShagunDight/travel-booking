@extends('layouts.admin')
@section('content')
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Edit Destination</h2>
        <a href="{{ route('admin.cities.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Destinations
        </a>
    </div>
    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body">
            <form id="cityEditForm" action="{{ route('admin.cities.update', $city->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf 
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control rounded-3 shadow-sm" value="{{ old('name', $city->name) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">State</label>
                    <input type="text" name="state" class="form-control rounded-3 shadow-sm" value="{{ old('state', $city->state) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Country</label>
                    <select name="country" class="form-select rounded-3 shadow-sm">
                        <option value="">-- Select Country --</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->country_code }}"
                                {{ old('country', $city->country) == $country->country_code ? 'selected' : '' }}>
                                {{ $country->country_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Emoji</label>
                    @php
                        $emojiList = ['🏛️','🏙️','🌆','🏖️','🎭','🕌','🏔️','🏰','🛕','🚤'];
                    @endphp
                    <select name="emoji" class="form-select rounded-3 shadow-sm">
                        <option value="">-- Select Emoji --</option>
                        @foreach($emojiList as $emoji)
                            <option value="{{ $emoji }}" {{ old('emoji', $city->emoji) == $emoji ? 'selected' : '' }}>{{ $emoji }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Image</label>
                    @if($city->image)
                        <div class="mb-2">
                            <img src="{{ asset($city->image) }}" class="img-thumbnail" style="max-height:120px">
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control rounded-3 shadow-sm" accept="image/*">
                    <small class="text-muted">JPG, PNG, WEBP allowed, max 2MB</small>
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

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#country').select2({
            theme: 'bootstrap-5',
            placeholder: "Search Country",
            allowClear: true,
            width: '100%'
        });
    });
</script>
<script>
$(document).ready(function () {

    // Initialize form validation
    $("#cityEditForm").validate({
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
                minlength: 2
            },
            country: {
                required: true,
            },
            image: {
                extension: "jpg|jpeg|png|webp"
            }
        },
        messages: {
            name: {
                required: "Please enter city name",
                minlength: "City name must be at least 2 characters"
            },
            country: {
                required: "Please select country",
            },
            image: {
                extension: "Only JPG, PNG, or WEBP images are allowed"
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
