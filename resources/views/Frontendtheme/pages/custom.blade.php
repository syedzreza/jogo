@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#"  tabindex="-1">Previous</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" data-page="{{ $paginator->currentPage()-1 }}" href="javascript:void(0);">Previous</a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link active" data-page="{{ $page }}"  href="javascript:void(0);">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" data-page="{{ $page }}" href="javascript:void(0);">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" data-page="{{ $paginator->currentPage()+1 }}" href="javascript:void(0);" rel="next">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" data-page="{{ $paginator->currentPage() }}"href="javascript:void(0);">Next</a>
                </li>
            @endif
        </ul>
    </nav>
@endif
