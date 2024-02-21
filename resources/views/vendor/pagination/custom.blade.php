<nav>
    <div style="display:flex;flex-direction:row;justify-content:space-between">
        <div class="pagination">
            {{-- Page Range Labels --}}
            @php
            $currentPage = $paginator->currentPage();
            $itemsPerPage = $paginator->perPage();
            $startItem = ($currentPage - 1) * $itemsPerPage + 1;
            $endItem = min($currentPage * $itemsPerPage, $paginator->total());
            @endphp
            <li>
                <span>{{ $startItem }} to {{ $endItem }} Records</span>
            </li>
        </div>
        <div style="display: flex;">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <div class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true"><button type="button" class="btn btn-light">Prev</button></span>
            </div>
            @else
            <div>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                <button type="button" class="btn btn-primary">Prev</button>
                </a>
            </div>
            @endif
            {{-- Next Page link --}}
            @if ($paginator->hasMorePages())
            <div>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                <button type="button" class="btn btn-primary">Next</button>
                </a>
            </div>
            @else
            <div class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true"><button type="button" class="btn btn-light">Next</button></span>
            </div>
            @endif
        </div>
    </div>
</nav>

