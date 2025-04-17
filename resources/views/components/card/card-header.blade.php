@props(['title' => null, 'subtitle' => null, 'action' => null, 'dropdown' => false])

<div class="px-6 py-4 flex items-center gap-4 bg-blue-200 dark:bg-blue-800">
    @if ($dropdown)
    <button @click="open = !open" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
        <x-heroicon-o-chevron-down x-show="open" x-cloak class="size-5" />
        <x-heroicon-o-chevron-right x-show="!open" x-cloak class="size-5" />
    </button>
    @endif
    <div class="flex justify-between items-center">
        <div>
            @if ($title)
                <h3 class="text-lg font-semibold text-blue-900 dark:text-gray-100">{{ $title }}</h3>
            @endif

            @if ($subtitle)
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $subtitle }}</p>
            @endif

            @if ($slot->isNotEmpty())
                {{ $slot }}
            @endif
        </div>

        @if ($action)
            <div>
                {{ $action }}
            </div>
        @endif
    </div>
</div>
