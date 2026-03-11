@extends('layouts.admin')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h2 class="fw-bold mb-2">Permissions</h2>
        <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-lg me-1"></i> Add Permission
        </a>
    </div>

    <div class="card shadow-sm rounded-4 border-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark text-white">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $permission)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucfirst($permission->name) }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.permissions.edit',$permission) }}" class="btn btn-sm btn-outline-warning rounded-pill me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.permissions.destroy',$permission) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">No permissions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($permissions->hasPages())
        <div class="card-footer d-flex justify-content-end">
            {{ $permissions->links('components.custom_pagination') }}
        </div>
        @endif
    </div>
</div>
@endsection
