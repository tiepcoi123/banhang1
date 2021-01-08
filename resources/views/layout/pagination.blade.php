@if ($paginator->hasPages())
<nav aria-label="..." style="float: right">
    <ul class="pagination">
         {{-- Previous Page Link --}}
         @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1">Previous</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage() - 1 )
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @elseif ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link" href="javascript:void(0)">{{ $page }}</a></li>
                    @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @elseif ($page == $paginator->lastPage() - 1)
                        <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">...</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a>
        </li>
        @elseif ($page == $paginator->lastPage())
            <li class="page-item disabled">
                <a class="page-link" href="javascript:void(0)">Next</a>
            </li>
        @endif
    </ul>
</nav>
@endif

