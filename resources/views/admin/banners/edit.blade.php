@extends('layouts.admin')
@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Edit Banner</h2>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Banners
        </a>
    </div>

    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body">

            <form id="bannerEditForm" action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf 
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Type <span class="text-danger">*</span></label>
                    <select name="type" id="type" class="form-select rounded-3 shadow-sm" required>
                        <option value="">-- Select Type --</option>
                        <option value="Home" {{ $banner->type=='Home'?'selected':'' }}>Home</option>
                        <option value="Hotel" {{ $banner->type=='Hotel'?'selected':'' }}>Hotel</option>
                        <option value="Tour" {{ $banner->type=='Tour'?'selected':'' }}>Tour</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control rounded-3 shadow-sm" value="{{ old('title', $banner->title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Subtitle</label>
                    <input type="text" name="subtitle" class="form-control rounded-3 shadow-sm" value="{{ old('subtitle', $banner->subtitle) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select rounded-3 shadow-sm">
                        <option value="1" {{ old('status', $banner->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $banner->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Image</label>
                    @if($banner->image)
                        <div class="mb-2">
                            <img src="{{ asset($banner->image) }}" class="img-thumbnail" style="max-height:120px">
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control rounded-3 shadow-sm" accept="image/*">
                    <small class="text-muted">JPG, PNG, WEBP allowed, max 2MB. Upload only if you want to replace existing image.</small>
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script>
$(document).ready(function () {

    $("#bannerEditForm").validate({
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
            type: {
                required: true
            },
            title: {
                required: true,
                minlength: 2
            },
            image: {
                extension: "jpg|jpeg|png|webp"
            }
        },
        messages: {
            type: {
                required: "Please select type"
            },
            title: {
                required: "Please enter banner title",
                minlength: "Title must be at least 2 characters"
            },
            image: {
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