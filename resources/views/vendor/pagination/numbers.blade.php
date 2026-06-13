@php
    $currentPage = $paginator->currentPage();
    $lastPage = $paginator->lastPage();

    if ($currentPage + 2 > $lastPage) {
        $start = max(1, $lastPage - 2);
    } else {
        $start = $currentPage;
    }
    $end = min($lastPage, $start + 2);
@endphp

<ul class="pagination">
    @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <span class="page-link">&laquo;</span>
        </li>
    @else
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}">&laquo;</a>
        </li>
    @endif

    @foreach ($elements as $element)
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page >= $start && $page <= $end)
                    <li class="page-item @if ($page == $currentPage) active @endif">
                        @if ($page == $currentPage)
                            <span class="page-link">{{ $page }}</span>
                        @else
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}">&raquo;</a>
        </li>
    @else
        <li class="page-item disabled">
            <span class="page-link">&raquo;</span>
        </li>
    @endif
</ul>
