@props([
    'user' => [
        'name' => '',
        'avatar' => null,
    ],
    'time' => '',
    'action' => '',
    'highlight' => null,
    'type' => 'info',
])

@php
    $colors = [
        'info' => 'text-blue-800 dark:text-blue-300',
        'success' => 'text-green-800 dark:text-green-300',
        'warning' => 'text-yellow-800 dark:text-yellow-300',
        'error' => 'text-red-800 dark:text-red-300',
    ];
@endphp

<li class="px-4 py-4 sm:px-6 lg:px-8">
    <div class="flex items-center gap-x-3">
        @if($user['avatar'])
            <img src="{{ $user['avatar'] }}" alt="" class="size-6 flex-none rounded-full bg-gray-700">
        @else
            <div class="size-6 flex-none rounded-full bg-gray-700 flex items-center justify-center text-white text-xs font-medium">
                {{ strtoupper(substr($user['name'], 0, 1)) }}
            </div>
        @endif
        <h3 class="flex-auto truncate text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $user['name'] }}</h3>
        <time datetime="{{ $time }}" class="flex-none text-xs text-gray-900 dark:text-gray-400">{{ $time }}</time>
    </div>
    <p class="mt-3 truncate text-sm text-gray-900 dark:text-gray-400">
        {{ $action }}
        @if($highlight)
            <span class="{{ $colors[$type] }}">{{ $highlight }}</span>
        @endif
    </p>
</li>
