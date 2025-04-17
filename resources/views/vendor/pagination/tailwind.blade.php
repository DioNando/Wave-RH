@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 md:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 cursor-default leading-5 rounded-lg dark:text-gray-500 dark:bg-gray-700 dark:border-gray-600">
                    {{-- {!! __('pagination.previous') !!} --}}
                    <span class="sr-only">{!! __('pagination.previous') !!}</span>
                    <div class="flex items-center gap-1">
                        <x-heroicon-o-chevron-left class="size-4" />
                        <span>Précédent</span>
                    </div>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-gray-200 leading-5 rounded-lg hover:bg-blue-50 active:bg-blue-100 active:text-blue-700 dark:bg-gray-800 dark:border-gray-600 dark:text-blue-400 dark:active:bg-gray-700 dark:active:text-blue-300">
                    {{-- {!! __('pagination.previous') !!} --}}
                    <span class="sr-only">{!! __('pagination.previous') !!}</span>
                    <div class="flex items-center gap-1">
                        <x-heroicon-o-chevron-left class="size-4" />
                        <span>Précédent</span>
                    </div>
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-blue-600 bg-white border border-gray-200 leading-5 rounded-lg hover:bg-blue-50 active:bg-blue-100 active:text-blue-700 dark:bg-gray-800 dark:border-gray-600 dark:text-blue-400 dark:active:bg-gray-700 dark:active:text-blue-300">
                    {{-- {!! __('pagination.next') !!} --}}
                    <span class="sr-only">{!! __('pagination.next') !!}</span>
                    <div class="flex items-center gap-1">
                        <span>Suivant</span>
                        <x-heroicon-o-chevron-right class="size-4" />
                    </div>
                </a>
            @else
                <span
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 cursor-default leading-5 rounded-lg dark:text-gray-500 dark:bg-gray-700 dark:border-gray-600">
                    {{-- {!! __('pagination.next') !!} --}}
                    <span class="sr-only">{!! __('pagination.next') !!}</span>
                    <div class="flex items-center gap-1">
                        <span>Suivant</span>
                        <x-heroicon-o-chevron-right class="size-4" />
                    </div>
                </span>
            @endif
        </div>

        <div class="hidden md:flex-1 md:flex md:items-center md:justify-between">
            <div>
                <p class="text-sm text-gray-700 leading-5 dark:text-gray-400">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium text-blue-600 dark:text-blue-400">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium text-blue-600 dark:text-blue-400">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium text-blue-600 dark:text-blue-400">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex rtl:flex-row-reverse">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span
                                class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 cursor-default leading-5 dark:bg-gray-700 dark:border-gray-600"
                                aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-200 leading-5 hover:bg-blue-50 hover:text-blue-600 active:bg-blue-100 active:text-blue-700 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:hover:text-blue-400 dark:active:bg-gray-700"
                            aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-200 cursor-default leading-5 dark:bg-gray-800 dark:border-gray-600">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span
                                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-blue-600 border border-blue-600 cursor-default leading-5 dark:bg-blue-700 dark:border-blue-700">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-200 leading-5 hover:bg-blue-50 hover:text-blue-600 active:bg-blue-100 active:text-blue-700 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:hover:text-blue-400 dark:active:bg-gray-700"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="relative inline-flex items-center px-3 py-2 -ml-px text-sm font-medium text-gray-600 bg-white border border-gray-200 leading-5 hover:bg-blue-50 hover:text-blue-600 active:bg-blue-100 active:text-blue-700 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:hover:text-blue-400 dark:active:bg-gray-700"
                            aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span
                                class="relative inline-flex items-center px-3 py-2 -ml-px text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 cursor-default leading-5 dark:bg-gray-700 dark:border-gray-600"
                                aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
