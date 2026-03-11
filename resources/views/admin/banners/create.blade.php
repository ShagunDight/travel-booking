@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Add Banner</h2>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Banners
        </a>
    </div>
    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body">
            <form id="bannerForm" action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control rounded-3 shadow-sm" value="{{ old('title') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Subtitle</label>
                    <input type="text" name="subtitle" class="form-control rounded-3 shadow-sm" value="{{ old('subtitle') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Image <span class="text-danger">*</span></label>
                    <input type="file" name="image" class="form-control rounded-3 shadow-sm" accept="image/*" required>
                    <small class="text-muted">JPG, PNG, WEBP allowed</small>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select rounded-3 shadow-sm">
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script>
$(document).ready(function () {

    $("#bannerForm").validate({
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
            title: {
                required: true,
                minlength: 2
            },
            image: {
                required: true,
                extension: "jpg|jpeg|png|webp"
            }
        },
        messages: {
            title: {
                required: "Please enter banner title",
                minlength: "Title must be at least 2 characters"
            },
            image: {
                required: "Please upload an image",
                extension: "Only JPG, PNG, or WEBP images are allowed"
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