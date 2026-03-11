<div class="card border-0 shadow-lg h-100 dashboard-card">
    <div class="card-body d-flex align-items-center">
        <div class="me-3 text-{{ $color }} fs-2">
            <i class="{{ $icon }}"></i>
        </div>
        <div>
            <p class="mb-1 text-muted small">{{ $label }}</p>
            <h3 class="mb-0 fw-bold">{{ $count ?? 0 }}</h3>
        </div>
    </div>
</div>
