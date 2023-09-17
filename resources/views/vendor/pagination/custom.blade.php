<div class="pagination mt-14">
    <ul class=" flex justify-center space-x-3">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class="inline-flex">
                <a href="#" class="flex w-12 h-12 flex-col items-center justify-center bg-[#ECECEC] rounded font-semibold">
                    <iconify-icon icon="heroicons:chevron-double-left-20-solid" class=" text-2xl"></iconify-icon>
                </a>
            </li>
        @else
            <li class="inline-flex">
                <a href="{{ $paginator->previousPageUrl() }}" class="flex w-12 h-12 flex-col items-center justify-center bg-[#ECECEC] rounded font-semibold">
                    <iconify-icon icon="heroicons:chevron-double-left-20-solid" class=" text-2xl"></iconify-icon>
                </a>
            </li>
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <li class="inline-flex">
                    <span class="flex w-12 h-12 flex-col items-center justify-center bg-[#ECECEC] rounded font-semibold">{{ $element }}</span>
                </li>
            @endif

            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="inline-flex">
                            <a href="#" class="flex w-12 h-12 flex-col items-center justify-center bg-primary text-white rounded font-semibold">{{ $page }}</a>
                        </li>
                    @else
                        <li class="inline-flex">
                            <a href="{{ $url }}" class="flex w-12 h-12 flex-col items-center justify-center bg-[#ECECEC] rounded font-semibold">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li class="inline-flex">
                <a href="{{ $paginator->nextPageUrl() }}" class="flex w-12 h-12 flex-col items-center justify-center bg-[#ECECEC] rounded font-semibold">
                    <iconify-icon icon="heroicons:chevron-double-right-20-solid" class=" text-2xl"></iconify-icon>
                </a>
            </li>
        @else
            <li class="inline-flex">
                <a href="#" class="flex w-12 h-12 flex-col items-center justify-center bg-[#ECECEC] rounded font-semibold">
                    <iconify-icon icon="heroicons:chevron-double-right-20-solid" class=" text-2xl"></iconify-icon>
                </a>
            </li>
        @endif
    </ul>
</div>