<div class="mt-4 flex justify-center">
    <div class="join">
        <!-- Previous Page Button -->
        @if ($items->onFirstPage())
            <button class="join-item btn btn-disabled">Previous</button>
        @else
            <a href="{{ $items->previousPageUrl() }}?search={{ $search }}" class="join-item btn">Previous</a>
        @endif

        <!-- Page Number Buttons -->
        @foreach ($items->getUrlRange(1, $items->lastPage()) as $page => $url)
            @if ($page == $items->currentPage())
                <button class="join-item btn btn-active btn-primary">{{ $page }}</button>
            @else
                <a href="{{ $url }}" class="join-item btn">{{ $page }}</a>
            @endif
        @endforeach

        <!-- Next Page Button -->
        @if ($items->hasMorePages())
            <a href="{{ $items->nextPageUrl() }}?search={{ $search }}" class="join-item btn">Next</a>
        @else
            <button class="join-item btn btn-disabled">Next</button>
        @endif
    </div>
</div>
