@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Edit Package</h2>
        <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Packages
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body">
            <form id="packageEditForm" action="{{ route('admin.packages.update',$package->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Package Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control rounded-3 shadow-sm @error('name') is-invalid @enderror"
                           value="{{ old('name',$package->name) }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Package Type <span class="text-danger">*</span></label>
                    <select name="type" class="form-select rounded-3 shadow-sm" required>
                        <option value="1" {{ old('type', $package->type ?? '') == 1 ? 'selected' : '' }}>Hotel</option>
                        <option value="2" {{ old('type', $package->type ?? '') == 2 ? 'selected' : '' }}>Tour</option>
                        <option value="3" {{ old('type', $package->type ?? '') == 3 ? 'selected' : '' }}>Combo</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Capmping Type <span class="text-danger">*</span></label>
                    <select name="capmping" class="form-select rounded-3 shadow-sm" required>
                        <option> Select... </option>
                        <option value="1" {{ old('capmping', $package->capmping ?? '') == 1 ? 'selected' : '' }}>Without Capmping</option>
                        <option value="2" {{ old('capmping', $package->capmping ?? '') == 2 ? 'selected' : '' }}>With Capmping</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Package Image</label>

                    @if($package->image)
                        <div class="mb-2">
                            <img src="{{ asset($package->image) }}" class="img-thumbnail" style="max-height:120px">
                        </div>
                    @endif

                    <input type="file" name="image" class="form-control rounded-3 shadow-sm" accept="image/*">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Gallery Images (Multiple)</label>
                    <input type="file" name="gallery[]" class="form-control rounded-3 shadow-sm" accept="image/*" multiple>
                    <small class="text-muted">You can upload multiple images (JPG, PNG, WEBP)</small>
                </div>
                <div class="d-flex flex-wrap gap-2 mt-2" style="max-height:300px; overflow-y:auto;">
                    @forelse($package->images as $img)
                        <div class="position-relative" style="width:120px; height:120px;">
                            <img src="{{ asset($img->url) }}" class="img-fluid rounded" style="width:100%; height:100%; object-fit:cover;">
                            <a href="{{ route('admin.packages.deleteGallery', $img->id) }}" onclick="return confirm('Delete this image?')"
                            class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 p-1" title="Delete"><i class="bi bi-trash"></i></a>
                        </div>
                    @empty
                        <p class="text-muted">No images uploaded yet.</p>
                    @endforelse
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Slug <span class="text-danger">*</span></label>
                    <input type="text" name="slug" class="form-control rounded-3 shadow-sm @error('slug') is-invalid @enderror"
                           value="{{ old('slug',$package->slug) }}" required>
                    @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Price <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="price" class="form-control rounded-3 shadow-sm @error('price') is-invalid @enderror"
                           value="{{ old('price',$package->price) }}" required>
                    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Duration</label>
                    <input type="text" name="duration" class="form-control rounded-3 shadow-sm" value="{{ old('duration',$package->duration ?? '') }}">
                    <small class="text-muted">Format: X Days / Y Nights</small>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Short Description</label>
                    <textarea name="short_description" class="form-control rounded-3 shadow-sm">{{ old('short_description',$package->short_description ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Description</label>
                    <textarea name="description" class="form-control rounded-3 shadow-sm @error('description') is-invalid @enderror"
                              rows="4">{{ old('description',$package->description) }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div id="roomsSection" class="mb-3">
                    <label class="form-label fw-semibold">Select Rooms</label>
                    @foreach($rooms as $room)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="rooms[]" value="{{ $room->id }}"
                                {{ in_array($room->id, old('rooms',$package->rooms->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $room->name }} (Hotel: {{ $room->property->name }})</label>
                        </div>
                    @endforeach
                </div>
                <div id="toursSection" class="mb-3">
                    <label class="form-label fw-semibold">Select Tours</label>
                    @foreach($tours as $tour)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="tours[]" value="{{ $tour->id }}"
                                {{ in_array($tour->id, old('tours',$package->tours->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $tour->name }} ({{ $tour->location }})</label>
                        </div>
                    @endforeach
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Package Visibility</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="popular" id="popular" value="1" {{ old('is_popular', $package->popular) ? 'checked' : '' }}>
                        <label class="form-check-label fw-medium" for="popular">
                            Mark as Popular Package
                        </label>
                    </div>
                    <small class="text-muted">
                        Enable this if you want to show this package in the <b>Popular Packages</b> section.
                    </small>
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
    function toggleSections() {
        const type = document.querySelector('select[name="type"]').value;
        document.getElementById('roomsSection').style.display = (type == 1 || type == 3) ? 'block' : 'none';
        document.getElementById('toursSection').style.display = (type == 2 || type == 3) ? 'block' : 'none';
    }

    document.querySelector('select[name="type"]').addEventListener('change', toggleSections);
    window.addEventListener('DOMContentLoaded', toggleSections);
</script>
<script>
$(document).ready(function () {

    // Custom method for duration
    $.validator.addMethod("durationFormat", function(value, element) {
        if (value === "") return true; // optional
        return /^\d+\s*Days\s*\/\s*\d+\s*Nights$/i.test(value);
    }, "Please enter duration in format: X Days / Y Nights");

    $("#packageEditForm").validate({
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
            type: {
                required: true
            },
            capmping: {
                required: true
            },
            slug: {
                required: true,
                minlength: 2,
                maxlength: 255
            },
            price: {
                required: true,
                number: true,
                min: 0
            },
            duration: {
                required: true,
                durationFormat: true
            },
            'rooms[]': {
                required: function() {
                    const type = $('#packageType').val();
                    return type === 'hotel' || type === 'combo';
                }
            },
            'tours[]': {
                required: function() {
                    const type = $('#packageType').val();
                    return type === 'tour' || type === 'combo';
                }
            }
        },

        messages: {
            name: {
                required: "Please enter package name",
                minlength: "Package name must be at least 2 characters",
                maxlength: "Package name cannot exceed 255 characters"
            },
            type: {
                required: "Please select package type"
            },
            capmping: {
                required: "Please select capmping type"
            },
            slug: {
                required: "Please enter slug",
                minlength: "Slug must be at least 2 characters",
                maxlength: "Slug cannot exceed 255 characters"
            },
            price: {
                required: "Please enter price",
                number: "Enter a valid number",
                min: "Price cannot be negative"
            },
            'rooms[]': {
                required: "Please select at least one room"
            },
            'tours[]': {
                required: "Please select at least one tour"
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
