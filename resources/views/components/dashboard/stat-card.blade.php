@props([
    'title',
    'value',
    'trend' => null,
    'trendType' => 'up',
    'icon' => null,
    'color' => 'blue',
])

@php
    $colors = [
        'blue' => [
            'bg' => 'bg-blue-50 dark:bg-blue-900/20',
            'text' => 'text-blue-600 dark:text-blue-400',
            'ring' => 'ring-blue-500/20',
        ],
        'green' => [
            'bg' => 'bg-green-50 dark:bg-green-900/20',
            'text' => 'text-green-600 dark:text-green-400',
            'ring' => 'ring-green-500/20',
        ],
        'red' => [
            'bg' => 'bg-red-50 dark:bg-red-900/20',
            'text' => 'text-red-600 dark:text-red-400',
            'ring' => 'ring-red-500/20',
        ],
        'yellow' => [
            'bg' => 'bg-yellow-50 dark:bg-yellow-900/20',
            'text' => 'text-yellow-600 dark:text-yellow-400',
            'ring' => 'ring-yellow-500/20',
        ],
        'default' => [
            'bg' => 'bg-white dark:bg-gray-900',
            'text' => 'text-gray-600 dark:text-gray-400',
            'ring' => 'ring-gray-500/20',
        ],
    ];

    $trendColors = [
        'up' => 'text-green-600 dark:text-green-400',
        'down' => 'text-red-600 dark:text-red-400',
    ];
@endphp

<div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 {{ $colors[$color]['bg'] }} px-4 py-8 sm:px-6 xl:px-6 rounded-lg ring-1 {{ $colors[$color]['ring'] }}">
    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $title }}</dt>
    @if($trend)
        <dd class="text-xs font-medium {{ $trendColors[$trendType] }}">
            {{ $trendType === 'up' ? '+' : '-' }}{{ $trend }}
        </dd>
    @endif
    <dd class="w-full flex-none text-2xl font-medium tracking-tight text-gray-900 dark:text-gray-100">
        {{ $value }}
    </dd>
    @if($icon)
        <div class="absolute top-4 right-4 {{ $colors[$color]['text'] }}">
            <x-dynamic-component :component="$icon" class="size-6" />
        </div>
    @endif
</div>
