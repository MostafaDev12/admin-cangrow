@if ($paginator->hasPages())
    <nav aria-label="Pagination" class="d-flex justify-content-center">
        <ul class="pagination">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">@lang('السابق')</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link"
                       href="{{ $paginator->previousPageUrl() }}"
                       rel="prev">
                        @lang('السابق')
                    </a>
                </li>
            @endif

            @php
                $currentPage = $paginator->currentPage();
                $lastPage = $paginator->lastPage();

                $startPage = max(1, $currentPage - 1);
                $endPage = min($lastPage, $currentPage + 1);
            @endphp

            {{-- First Page --}}
            @if ($startPage > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url(1) }}">
                        1
                    </a>
                </li>

                @if ($startPage > 2)
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                @endif
            @endif


            {{-- Current Range --}}
            @for ($page = $startPage; $page <= $endPage; $page++)

                @if ($page == $currentPage)
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">
                            {{ $page }}
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link"
                           href="{{ $paginator->url($page) }}">
                            {{ $page }}
                        </a>
                    </li>
                @endif

            @endfor


            {{-- Last Page --}}
            @if ($endPage < $lastPage)

                @if ($endPage < $lastPage - 1)
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                @endif

                <li class="page-item">
                    <a class="page-link"
                       href="{{ $paginator->url($lastPage) }}">
                        {{ $lastPage }}
                    </a>
                </li>

            @endif


            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link"
                       href="{{ $paginator->nextPageUrl() }}"
                       rel="next">
                        @lang('التالى')
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">
                        @lang('التالى')
                    </span>
                </li>
            @endif

        </ul>
    </nav>
@endif