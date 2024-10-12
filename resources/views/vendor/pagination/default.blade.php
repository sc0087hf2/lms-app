@if ($paginator->hasPages())
<ul class="flex justify-center mt-6 space-x-2">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
        <span class="px-3 py-2 bg-transparent text-gray-500 rounded cursor-not-allowed">‹</span>
    </li>
    @else
    <li>
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3 py-2 bg-blue-900 text-white rounded hover:bg-blue-700">‹</a>
    </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <li class="disabled" aria-disabled="true"><span class="px-3 py-2 bg-gray-200 text-gray-500 rounded">{{ $element }}</span></li>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == 1 || $page == $paginator->lastPage() || $page == $paginator->currentPage() || ($page >= $paginator->currentPage() - 2 && $page <= $paginator->currentPage() + 2))
        @if ($page == $paginator->currentPage())
        <li class="active" aria-current="page"><span class="px-3 py-2 bg-blue-500 text-white rounded">{{ $page }}</span></li>
        @else
        <li><a href="{{ $url }}" class="px-3 py-2 bg-gray-300 text-black rounded hover:bg-gray-400">{{ $page }}</a></li>
        @endif
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-2 bg-blue-900 text-white rounded hover:bg-blue-700">›</a>
        </li>
        @else
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span class="px-3 py-2 bg-transparent text-gray-500 rounded cursor-not-allowed">›</span>
        </li>
        @endif
</ul>
@endif