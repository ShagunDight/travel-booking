@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Add Tour</h2>
        <a href="{{ route('admin.tours.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Tours
        </a>
    </div>

    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body">

            <form id="tourForm" action="{{ route('admin.tours.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tour Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control rounded-3 shadow-sm @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tour Image</label>
                    <input type="file" name="image" class="form-control rounded-3 shadow-sm" accept="image/*">
                    <small class="text-muted">JPG, PNG, WEBP allowed</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Capmping Type <span class="text-danger">*</span></label>
                    <select name="capmping" id="capmping" class="form-select rounded-3 shadow-sm" required>
                        <option> Select... </option>
                        <option value="1" {{ old('capmping')== 1 ? 'selected' : '' }}>Without Capmping</option>
                        <option value="2" {{ old('capmping')== 2 ? 'selected' : '' }}>With Capmping</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Slug <span class="text-danger">*</span></label>
                    <input type="text" name="slug" class="form-control rounded-3 shadow-sm @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required>
                    @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Starting Location <span class="text-danger">*</span></label>
                    <input type="text" name="starting_location" class="form-control rounded-3 shadow-sm @error('starting_location') is-invalid @enderror" value="{{ old('starting_location') }}" required>
                    @error('starting_location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Location <span class="text-danger">*</span></label>
                    <input type="text" name="location" class="form-control rounded-3 shadow-sm @error('location') is-invalid @enderror" value="{{ old('location') }}" required>
                    @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Price <span class="text-danger">*</span></label>
                    <input type="number" name="price" class="form-control rounded-3 shadow-sm @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
                    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Duration <span class="text-danger">*</span></label>
                    <input type="text" name="duration" class="form-control rounded-3 shadow-sm" value="{{ old('duration') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Description</label>
                    <textarea name="description" class="form-control rounded-3 shadow-sm @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Features</label>
                    @php $options = ['Guide','Transport','Meals','Tickets']; @endphp
                    @foreach($options as $option)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="features[]" value="{{ $option }}">
                            <label class="form-check-label">{{ $option }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Itinerary (Day-wise)<span class="text-danger">*</span></label>
                    <div id="itinerary-wrapper">
                        <div class="itinerary-item mb-3 d-flex gap-2 align-items-start">
                            <input type="text" name="itinerary[1][title]" class="form-control" placeholder="Day 1 Title">
                            <textarea name="itinerary[1][description]" class="form-control" rows="2" placeholder="Day 1 Description"></textarea>
                            <button type="button" class="btn btn-danger remove-day"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                    <button type="button" id="add-day" class="btn btn-primary btn-sm mt-2">+ Add Day</button>
                </div>

                {{-- <div class="mb-4">
                    <label class="form-label fw-semibold">Tour Stops / Hotels</label>
                    <div id="stops-wrapper">
                        <div class="stop-item mb-3 d-flex gap-2 align-items-start">
                            <input type="text" name="stops[1][location]" class="form-control" placeholder="Day 1 Location">
                            <select name="stops[1][hotel_id]" class="form-select">
                                <option value="">Select Hotel</option>
                                @foreach($hotels as $hotel)
                                    <option value="{{ $hotel->id }}">{{ $hotel->name }} - {{ $hotel->location }}</option>
                                @endforeach
                            </select>
                            <textarea name="stops[1][description]" class="form-control" rows="2" placeholder="Description"></textarea>
                            <button type="button" class="btn btn-danger remove-stop"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                    <button type="button" id="add-stop" class="btn btn-primary btn-sm mt-2">+ Add Stop</button>
                </div> --}}

                <div class="mb-3">
                    <label class="form-label fw-semibold">Inclusions <span class="text-danger">*</span></label>
                    <textarea id="inclusions" name="inclusions[]" class="form-control rounded-3 shadow-sm" rows="2" placeholder="Add inclusion"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Exclusions <span class="text-danger">*</span></label>
                    <textarea id="exclusions" name="exclusions[]" class="form-control rounded-3 shadow-sm" rows="2" placeholder="Add exclusion"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Cancellation Policy</label>
                    <textarea name="policy[cancellation]" class="form-control rounded-3 shadow-sm" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Refund Policy</label>
                    <textarea name="policy[refund]" class="form-control rounded-3 shadow-sm" rows="3"></textarea>
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

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#inclusions')).catch(error => console.error(error));
    ClassicEditor.create(document.querySelector('#exclusions')).catch(error => console.error(error));
</script>

<!-- Dynamic Itinerary & Stops -->
<script>
let dayCount = 1;
document.getElementById('add-day').addEventListener('click', function(){
    dayCount++;
    const wrapper = document.getElementById('itinerary-wrapper');
    const div = document.createElement('div');
    div.classList.add('itinerary-item','mb-3','d-flex','gap-2','align-items-start');
    div.innerHTML = `
        <input type="text" name="itinerary[${dayCount}][title]" class="form-control" placeholder="Day ${dayCount} Title">
        <textarea name="itinerary[${dayCount}][description]" class="form-control" rows="2" placeholder="Day ${dayCount} Description"></textarea>
        <button type="button" class="btn btn-danger remove-day"><i class="bi bi-trash"></i></button>
    `;
    wrapper.appendChild(div);
});

let stopCount = 1;
document.getElementById('add-stop').addEventListener('click', function(){
    stopCount++;
    const wrapper = document.getElementById('stops-wrapper');
    const div = document.createElement('div');
    div.classList.add('stop-item','mb-3','d-flex','gap-2','align-items-start');
    div.innerHTML = `
        <input type="text" name="stops[${stopCount}][location]" class="form-control" placeholder="Day ${stopCount} Location">
        <select name="stops[${stopCount}][hotel_id]" class="form-select">
            <option value="">Select Hotel</option>
            @foreach($hotels as $hotel)
                <option value="{{ $hotel->id }}">{{ $hotel->name }} - {{ $hotel->location }}</option>
            @endforeach
        </select>
        <textarea name="stops[${stopCount}][description]" class="form-control" rows="2" placeholder="Description"></textarea>
        <button type="button" class="btn btn-danger remove-stop"><i class="bi bi-trash"></i></button>
    `;
    wrapper.appendChild(div);
});

// Remove buttons
document.addEventListener('click', function(e){
    if(e.target.classList.contains('remove-day') || e.target.closest('.remove-day')){
        e.target.closest('.itinerary-item').remove();
    }
    if(e.target.classList.contains('remove-stop') || e.target.closest('.remove-stop')){
        e.target.closest('.stop-item').remove();
    }
});
</script>
<script>
    $(document).ready(function () {

        // Validate main form
        $("#tourForm").validate({
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
                name: {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                },
                capmping: {
                    required: true
                },
                slug: {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                },
                starting_location: {
                    required: true,
                    minlength: 2
                },
                location: {
                    required: true,
                    minlength: 2
                },
                price: {
                    required: true,
                    number: true,
                    min: 0
                },
                "itinerary[1][title]": {
                    required: true
                },
                "itinerary[1][description]": {
                    required: true
                },
                inclusions: {
                    required: true
                },
                exclusions: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "Please enter tour name",
                    minlength: "Tour name must be at least 2 characters",
                    maxlength: "Tour name cannot exceed 255 characters"
                },
                capmping: {
                    required: "Please select capmping type"
                },
                slug: {
                    required: "Please enter slug",
                    minlength: "Slug must be at least 2 characters",
                    maxlength: "Slug cannot exceed 255 characters"
                },
                starting_location: {
                    required: "Please enter starting location",
                    minlength: "Starting location must be at least 2 characters"
                },
                location: {
                    required: "Please enter location",
                    minlength: "Location must be at least 2 characters"
                },
                price: {
                    required: "Please enter price",
                    number: "Price must be a number",
                    min: "Price cannot be negative"
                },
                "itinerary[1][title]": {
                    required: "Please enter Day 1 title"
                },
                "itinerary[1][description]": {
                    required: "Please enter Day 1 description"
                },
                inclusions: {
                    required: "Please add at least one inclusion"
                },
                exclusions: {
                    required: "Please add at least one exclusion"
                }
            },

            submitHandler: function(form) {
                $('button[type="submit"]').prop('disabled', true);
                form.submit();
            }
        });

        // Dynamic Itinerary validation
        $('#add-day').click(function(){
            dayCount++;
            // Add rules for new inputs dynamically
            $(`input[name="itinerary[${dayCount}][title]"]`).rules("add", { required: true, messages: { required: `Please enter Day ${dayCount} title` } });
            $(`textarea[name="itinerary[${dayCount}][description]"]`).rules("add", { required: true, messages: { required: `Please enter Day ${dayCount} description` } });
        });

        // Remove itinerary rules when day removed
        $(document).on('click', '.remove-day', function(){
            const titleInput = $(this).siblings('input');
            const descInput = $(this).siblings('textarea');
            titleInput.rules('remove');
            descInput.rules('remove');
            $(this).closest('.itinerary-item').remove();
        });

    });
</script>
@endsection
