@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <div>
            <h3 class="fw-bold mb-1">Settings</h3>
            <p class="text-muted mb-0">Manage your profile & security</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 d-none d-md-block">
            <div class="card shadow-sm rounded-4">
                <div class="list-group list-group-flush">
                    <button class="list-group-item list-group-item-action active" data-bs-toggle="tab" data-bs-target="#profileTab">
                        <i class="bi bi-person me-2"></i> Profile
                    </button>
                    <button class="list-group-item list-group-item-action" data-bs-toggle="tab" data-bs-target="#passwordTab">
                        <i class="bi bi-lock me-2"></i> Password
                    </button>
                    <button class="list-group-item list-group-item-action" data-bs-toggle="tab" data-bs-target="#deleteTab">
                        <i class="bi bi-trash me-2"></i> Delete Account
                    </button>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-9">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="profileTab">
                    <div class="card shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-primary text-white fw-semibold rounded-top-4">
                            <i class="bi bi-person-lines-fill me-2"></i> Profile Information
                        </div>
                        <div class="card-body">
                            <p class="text-muted small mb-3">Update your personal details.</p>
                            <form method="POST" action="{{ route('profile.update') }}" class="needs-validation" novalidate>
                                @csrf
                                @method('patch')
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label fw-semibold">Full Name</label>
                                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                                               class="form-control rounded-3 shadow-sm @error('name') is-invalid @enderror" 
                                               required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label fw-semibold">Email Address</label>
                                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                                               class="form-control rounded-3 shadow-sm @error('email') is-invalid @enderror" 
                                               required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="phone_no" class="form-label fw-semibold">Phone Number</label>
                                    <input type="text" name="phone_no" id="phone_no" value="{{ old('phone_no', $user->phone_no) }}" 
                                           class="form-control rounded-3 shadow-sm @error('phone_no') is-invalid @enderror">
                                    @error('phone_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-3 shadow-sm">
                                        <i class="bi bi-save me-1"></i> Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="passwordTab">
                    <div class="card shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-success text-white fw-semibold rounded-top-4">
                            <i class="bi bi-shield-lock me-2"></i> Change Password
                        </div>
                        <div class="card-body">
                            <p class="text-muted small mb-3">Use a strong password for security.</p>
                            <form method="POST" action="{{ route('password.update') }}" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="current_password" class="form-label fw-semibold">Current Password</label>
                                    <input type="password" name="current_password" id="current_password" 
                                           class="form-control rounded-3 shadow-sm @error('current_password') is-invalid @enderror" required>
                                    @error('current_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-semibold">New Password</label>
                                    <input type="password" name="password" id="password" 
                                           class="form-control rounded-3 shadow-sm @error('password') is-invalid @enderror" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label fw-semibold">Confirm New Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" 
                                           class="form-control rounded-3 shadow-sm" required>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-success btn-lg rounded-3 shadow-sm">
                                        <i class="bi bi-key me-1"></i> Update Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="deleteTab">
                    <div class="card shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-danger text-white fw-semibold rounded-top-4">
                            <i class="bi bi-trash me-2"></i> Delete Account
                        </div>
                        <div class="card-body">
                            <p class="text-muted small mb-3">This action cannot be undone.</p>
                            <button class="btn btn-outline-danger btn-lg rounded-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                                <i class="bi bi-exclamation-triangle me-1"></i> Delete Account
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-sm">
            <div class="modal-header bg-danger text-white rounded-top-4">
                <h5 class="modal-title" id="deleteAccountModalLabel"><i class="bi bi-exclamation-triangle me-2"></i> Confirm Delete</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your account? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-3">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
