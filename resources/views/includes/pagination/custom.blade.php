@if ($paginator->hasPages())
    <nav aria-label="..." class="flex justify-center items-center">
        <ul class="flex gap-2 items-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-2 text-[#333333] opacity-50 cursor-not-allowed" aria-disabled="true" aria-label="@lang('السابق')">
                    <span>@lang('السابق')</span>
                </li>
            @else
                <li>
                    <a class="px-3 py-2 text-[#333333] hover:bg-[#333333] hover:text-white transition-colors" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('السابق')">@lang('السابق')</a>
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
                <li><a class="px-3 py-2 text-[#333333] hover:bg-[#333333] hover:text-white transition-colors" href="{{ $paginator->url(1) }}">1</a></li>
                @if ($startPage > 2)
                    <li class="px-3 py-2 text-[#333333] opacity-50 cursor-not-allowed"><span>...</span></li>
                @endif
            @endif

            {{-- Page Numbers --}}
            @for ($page = $startPage; $page <= $endPage; $page++)
                @if ($page == $currentPage)
                    <li class="px-3 py-2 bg-[#333333] text-white" aria-current="page"><span>{{ $page }}</span></li>
                @else
                    <li><a class="px-3 py-2 text-[#333333] hover:bg-[#333333] hover:text-white transition-colors" href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
                @endif
            @endfor

            {{-- Last page --}}
            @if ($endPage <= $lastPage)
                @if ($endPage <= $lastPage - 1)
                    <li class="px-3 py-2 text-[#333333] opacity-50 cursor-not-allowed"><span>...</span></li>
                @endif
                <li><a class="px-3 py-2 text-[#333333] hover:bg-[#333333] hover:text-white transition-colors" href="{{ $paginator->url($lastPage) }}">{{ $lastPage }}</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="px-3 py-2 text-[#333333] hover:bg-[#333333] hover:text-white transition-colors" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('التالى')">@lang('التالى')</a>
                </li>
            @else
                <li class="px-3 py-2 text-[#333333] opacity-50 cursor-not-allowed" aria-disabled="true" aria-label="@lang('التالى')">
                    <span>@lang('التالى')</span>
                </li>
            @endif
        </ul>
    </nav>
@endif