@if ($paginator->hasPages())
    <nav aria-label="..." class="d-flex justify-content-center">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item" aria-disabled="true" aria-label="@lang('السابق')">
                    <a class="page-link" aria-hidden="true">@lang('السابق')</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('السابق')">@lang('السابق')</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @php
                $currentPage = $paginator->currentPage();
                $lastPage = $paginator->lastPage();
                $startPage = max(1, $currentPage - 1);
                $endPage = min($lastPage, $currentPage + 1);
            @endphp

            {{-- First page --}}
            @if ($startPage > 1)
                <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
                @if ($startPage > 2)
                    <li class="page-item disabled"><a class="page-link">...</a></li>
                @endif
            @endif

            {{-- Page Numbers --}}
            @for ($page = $startPage; $page <= $endPage; $page++)
                @if ($page == $currentPage)
                    <li class="page-item active" aria-current="page"><a class="page-link">{{ $page }}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
                @endif
            @endfor

            {{-- Last page --}}
            @if ($endPage <= $lastPage)
                @if ($endPage <= $lastPage - 1)
                    <li class="page-item disabled"><a class="page-link">...</a></li>
                @endif
                <li class="page-item"><a class="page-link" href="{{ $paginator->url($lastPage) }}">{{ $lastPage }}</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('التالى')">@lang('التالى')</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('التالى')">
                    <a class="page-link" aria-hidden="true">@lang('التالى')</a>
                </li>
            @endif
        </ul>
    </nav>
@endif
