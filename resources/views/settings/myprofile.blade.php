@extends('layouts.app')
@section('content')
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<main>
    <section class="pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="vstack gap-4">
                        <div class="card border">
                            <div class="card-header border-bottom">
                                <h4 class="card-header-title">Personal Information</h4>
                            </div>

                            <div class="card-body">
                                <form class="row g-3" method="POST" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-12">
                                        <label class="form-label">Upload your profile photo<span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center">
                                            <label class="position-relative me-4" for="image" title="Replace this pic">
                                                <span class="avatar avatar-xl">
                                                    <img id="image-preview" class="avatar-img rounded-circle border border-white border-3 shadow"
                                                        src="{{ $user->image ? asset($user->image) : 'https://www.pngkey.com/png/full/73-730434_04-dummy-avatar.png' }}" alt="">
                                                </span>
                                            </label>
                                            <label class="btn btn-sm btn-primary-soft mb-0" for="image">Change</label>
                                            <input id="image" name="image" class="form-control d-none" type="file">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Full Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email address<span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Mobile number<span class="text-danger">*</span></label>
                                        <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $user->mobile) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Nationality<span class="text-danger">*</span></label>
                                        <select name="nationality" id="nationality" class="form-select">
                                            <option value="">Select your country</option>
                                            @foreach($countries as $key => $country)
                                                <option value="{{ $country->country_name }}" {{ old('nationality', $user->nationality) == $country->country_name ? 'selected' : '' }}>{{ $country->country_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Date of Birth<span class="text-danger">*</span></label>
                                        <input type="text" name="dob" class="form-control flatpickr" value="{{ old('dob', $user->dob) }}" data-date-format="Y-m-d">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Select Gender<span class="text-danger">*</span></label>
                                        <div class="d-flex gap-4">
                                            <div class="form-check radio-bg-light">
                                                <input class="form-check-input" type="radio" name="gender" value="Male" {{ old('gender', $user->gender) == 'Male' ? 'checked' : '' }}>
                                                <label class="form-check-label">Male</label>
                                            </div>
                                            <div class="form-check radio-bg-light">
                                                <input class="form-check-input" type="radio" name="gender" value="Female" {{ old('gender', $user->gender) == 'Female' ? 'checked' : '' }}>
                                                <label class="form-check-label">Female</label>
                                            </div>
                                            <div class="form-check radio-bg-light">
                                                <input class="form-check-input" type="radio" name="gender" value="Other" {{ old('gender', $user->gender) == 'Other' ? 'checked' : '' }}>
                                                <label class="form-check-label">Others</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control" rows="3">{{ old('address', $user->address) }}</textarea>
                                    </div>
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary mb-0">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card border">
                            <div class="card-header border-bottom">
                                <h4 class="card-header-title">Update Password</h4>
                                <p class="mb-0">Your current email address is <span class="text-primary">{{ $user->email ?? 'example@gmail.com' }}</span></p>
                            </div>

                            <form class="card-body" method="POST" action="{{ route('password.update') }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label">Current password</label>
                                    <input class="form-control" type="password" name="current_password" id="current_password" placeholder="Enter current password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Enter new password</label>
                                    <div class="input-group">
                                        <input class="form-control fakepassword" placeholder="Enter new password" type="password" name="password" id="psw-input">
                                        <span class="input-group-text p-0 bg-transparent">
                                            <i class="fakepasswordicon fas fa-eye-slash cursor-pointer p-2"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm new password</label>
                                    <input class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm new password">
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary mb-0">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#nationality').select2({
            theme: 'bootstrap-5',
            allowClear: true,
            width: '100%'
        });
    });
</script>
@endsection