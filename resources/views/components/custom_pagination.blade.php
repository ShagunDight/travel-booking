@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center mb-0">
            {{-- Previous --}}
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link rounded-circle shadow-sm" href="{{ $paginator->previousPageUrl() }}">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </li>

            {{-- Pages --}}
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                            <a class="page-link rounded-circle shadow-sm" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                <a class="page-link rounded-circle shadow-sm" href="{{ $paginator->nextPageUrl() }}">
                    <i class="bi bi-arrow-right"></i>
                </a>
            </li>
        </ul>
    </nav>
@endif
