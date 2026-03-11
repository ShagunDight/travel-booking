@extends('layouts.admin')
@section('content')

<div class="container py-4">
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
    <h2 class="fw-bold mb-2">Banners</h2>

    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-lg me-1"></i> Add Banner
    </a>
</div>

<div class="card shadow-sm rounded-4 border-0">
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead class="table-dark text-white">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($banners as $banner)
                    <tr class="align-middle">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($banner->image)
                                <img src="{{ asset($banner->image) }}" width="120" class="rounded shadow-sm">
                            @endif
                        </td>
                        <td>{{ $banner->title }}</td>
                        <td>{{ $banner->subtitle }}</td>
                        <td>
                            @if($banner->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.banners.edit',$banner) }}" class="btn btn-sm btn-outline-warning rounded-pill me-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.banners.destroy',$banner) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger rounded-pill"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            No Banners found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($banners->hasPages())
    <div class="card-footer d-flex justify-content-end">
        {{ $banners->links('components.custom_pagination') }}
    </div>
    @endif

</div>
```

</div>

@endsection
