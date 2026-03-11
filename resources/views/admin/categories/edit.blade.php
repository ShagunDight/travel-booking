@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Edit Category</h2>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Categories
        </a>
    </div>
    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body">
            <form id="categoryEditForm" action="{{ route('admin.categories.update',$category->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Category Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control rounded-3 shadow-sm" value="{{ old('name',$category->name) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Places</label>
                    <input type="text" name="places" class="form-control rounded-3 shadow-sm" value="{{ old('places', $category->places) }}" placeholder="Enter only number of places">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Image URL</label>
                    <input type="file" name="image_url" class="form-control rounded-3 shadow-sm" value="{{ old('image_url',$category->image_url) }}">
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

    $("#categoryEditForm").validate({
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
                maxlength: 100
            },
            places: {
                required: true,
                maxlength: 255
            },
            image_url: {
                extension: "jpg|jpeg|png|webp|gif"
            }
        },

        messages: {
            name: {
                required: "Please enter category name",
                minlength: "Category name must be at least 2 characters",
                maxlength: "Category name cannot exceed 100 characters"
            },
            places: {
                required: "Please enter number of places",
                maxlength: "Places cannot exceed 255 characters"
            },
            image_url: {
                extension: "Only image files are allowed (jpg, jpeg, png, webp, gif)"
            }
        },

        submitHandler: function (form) {
            $('button[type="submit"]').prop('disabled', true);
            form.submit();
        }
    });

});
</script>

@endsection
