<div class="mt-4 flex justify-center">
    <div class="join">
        <!-- Page Number Buttons -->
        @foreach ($items->getUrlRange(1, $items->lastPage()) as $page => $url)
            @if ($page == $items->currentPage())
                <button class="join-item btn btn-active btn-primary">{{ $page }}</button>
            @else
                <a href="{{ $url }}" class="join-item btn">{{ $page }}</a>
            @endif
        @endforeach
    </div>
</div>
