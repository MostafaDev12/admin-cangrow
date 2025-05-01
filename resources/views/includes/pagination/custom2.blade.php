@if ($paginator->hasPages())
    <div id="pagination" class="flex my-10 justify-center space-x-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button class="px-4 py-2 bg-primary mx-4 text-white rounded hover:bg-primary disabled:bg-gray-400" disabled>
                @lang('السابق')
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 bg-primary mx-4  rounded hover:bg-primary">
                @lang('السابق')
            </a>
        @endif

        {{-- Pagination Elements --}}
        @php
            $currentPage = $paginator->currentPage();
            $lastPage = $paginator->lastPage();
            $startPage = max(1, $currentPage - 1);
            $endPage = min($lastPage, $currentPage + 1);
        @endphp

        {{-- First Page --}}
        @if ($startPage > 1)
            <a href="{{ $paginator->url(1) }}" class="px-4 py-2 rounded bg-primary  hover:bg-primary">1</a>
            @if ($startPage > 2)
                <button class="px-4 py-2 rounded bg-primary  hover:bg-primary" disabled>...</button>
            @endif
        @endif

        {{-- Page Numbers --}}
        @for ($page = $startPage; $page <= $endPage; $page++)
            @if ($page == $currentPage)
                <button class="px-4 py-2 rounded bg-primary text-white hover:bg-primary disabled:bg-gray-400" disabled>
                    {{ $page }}
                </button>
            @else
                <a href="{{ $paginator->url($page) }}" class="px-4 py-2 rounded bg-primary  hover:bg-primary">
                    {{ $page }}
                </a>
            @endif
        @endfor

        {{-- Last Page --}}
        @if ($endPage < $lastPage)
            @if ($endPage < $lastPage - 1)
                <button class="px-4 py-2 rounded bg-primary  hover:bg-primary" disabled>...</button>
            @endif
            <a href="{{ $paginator->url($lastPage) }}" class="px-4 py-2 rounded bg-primary  hover:bg-primary">
                {{ $lastPage }}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 bg-primary  rounded hover:bg-primary">
                @lang('التالى')
            </a>
        @else
            <button class="px-4 py-2 bg-primary text-white rounded hover:bg-primary disabled:bg-gray-400" disabled>
                @lang('التالى')
            </button>
        @endif
    </div>
@endif