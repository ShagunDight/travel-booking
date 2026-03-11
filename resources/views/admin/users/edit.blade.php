@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Edit User</h2>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Users
        </a>
    </div>
    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body">
            <form id="userEditForm" action="{{ route('admin.users.update',$user->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control rounded-3 shadow-sm" value="{{ old('name',$user->name) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control rounded-3 shadow-sm" value="{{ old('email',$user->email) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control rounded-3 shadow-sm">
                    <small class="text-muted">Leave blank to keep current password</small>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control rounded-3 shadow-sm">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Assign Roles</label>
                    <select name="roles" class="form-select">
                        <option value="">Select Role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ $user->roles->pluck('name')->contains($role->name) ? "selected" : ""}} >{{ $role->name }}</option>
                        @endforeach
                    </select>
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

    $("#userEditForm").validate({
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
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            },
            password_confirmation: {
                required: true,
                equalTo: "input[name='password']"
            }
        },

        messages: {
            name: {
                required: "Please enter user name",
                minlength: "Name must be at least 2 characters",
                maxlength: "Name cannot exceed 255 characters"
            },
            email: {
                required: "Please enter email",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please enter password",
                minlength: "Password must be at least 6 characters"
            },
            password_confirmation: {
                required: "Please confirm password",
                equalTo: "Passwords do not match"
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
