@props([
    'href' => '#',
    'type' => 'link',
    'variant' => 'primary',
    'color' => 'blue',
    'size' => 'md',
    'class' => '',
    'icon' => null,
    'responsive' => false,
    'disabled' => false,
    'wire:navigate' => true,
])

@php
    // Configuration des couleurs pour les variantes primary
    $primaryColors = [
        'red' => [
            'default' => 'bg-red-600 hover:bg-red-700 focus-visible:outline-red-600 text-white',
            'dark' => 'dark:bg-red-500 dark:hover:bg-red-400 dark:focus-visible:outline-red-500 dark:text-gray-50',
            'active' => 'active:bg-red-800 dark:active:bg-red-600',
        ],
        'blue' => [
            'default' => 'bg-blue-600 hover:bg-blue-700 focus-visible:outline-blue-600 text-white',
            'dark' => 'dark:bg-blue-500 dark:hover:bg-blue-400 dark:focus-visible:outline-blue-500 dark:text-gray-50',
            'active' => 'active:bg-blue-800 dark:active:bg-blue-600',
        ],
        'green' => [
            'default' => 'bg-green-600 hover:bg-green-700 focus-visible:outline-green-600 text-white',
            'dark' => 'dark:bg-green-500 dark:hover:bg-green-400 dark:focus-visible:outline-green-500 dark:text-gray-50',
            'active' => 'active:bg-green-800 dark:active:bg-green-600',
        ],
        'orange' => [
            'default' => 'bg-orange-600 hover:bg-orange-700 focus-visible:outline-orange-600 text-white',
            'dark' => 'dark:bg-orange-500 dark:hover:bg-orange-400 dark:focus-visible:outline-orange-500 dark:text-gray-50',
            'active' => 'active:bg-orange-800 dark:active:bg-orange-600',
        ],
        'yellow' => [
            'default' => 'bg-yellow-600 hover:bg-yellow-700 focus-visible:outline-yellow-600 text-white',
            'dark' => 'dark:bg-yellow-500 dark:hover:bg-yellow-400 dark:focus-visible:outline-yellow-500 dark:text-gray-50',
            'active' => 'active:bg-yellow-800 dark:active:bg-yellow-600',
        ],
        'purple' => [
            'default' => 'bg-purple-600 hover:bg-purple-700 focus-visible:outline-purple-600 text-white',
            'dark' => 'dark:bg-purple-500 dark:hover:bg-purple-400 dark:focus-visible:outline-purple-500 dark:text-gray-50',
            'active' => 'active:bg-purple-800 dark:active:bg-purple-600',
        ],
        'indigo' => [
            'default' => 'bg-indigo-600 hover:bg-indigo-700 focus-visible:outline-indigo-600 text-white',
            'dark' => 'dark:bg-indigo-500 dark:hover:bg-indigo-400 dark:focus-visible:outline-indigo-500 dark:text-gray-50',
            'active' => 'active:bg-indigo-800 dark:active:bg-indigo-600',
        ],
        'gray' => [
            'default' => 'bg-gray-600 hover:bg-gray-700 focus-visible:outline-gray-600 text-white',
            'dark' => 'dark:bg-gray-500 dark:hover:bg-gray-400 dark:focus-visible:outline-gray-500 dark:text-gray-50',
            'active' => 'active:bg-gray-800 dark:active:bg-gray-600',
        ],
    ];

    // Configuration des couleurs pour les variantes secondary
    $secondaryColors = [
        'red' => [
            'default' => 'bg-red-100 text-red-700 hover:bg-red-200',
            'dark' => 'dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/30',
            'active' => 'active:bg-red-300 dark:active:bg-red-900/40',
        ],
        'blue' => [
            'default' => 'bg-blue-100 text-blue-700 hover:bg-blue-200',
            'dark' => 'dark:bg-blue-900/20 dark:text-blue-400 dark:hover:bg-blue-900/30',
            'active' => 'active:bg-blue-300 dark:active:bg-blue-900/40',
        ],
        'green' => [
            'default' => 'bg-green-100 text-green-700 hover:bg-green-200',
            'dark' => 'dark:bg-green-900/20 dark:text-green-400 dark:hover:bg-green-900/30',
            'active' => 'active:bg-green-300 dark:active:bg-green-900/40',
        ],
        'orange' => [
            'default' => 'bg-orange-100 text-orange-700 hover:bg-orange-200',
            'dark' => 'dark:bg-orange-900/20 dark:text-orange-400 dark:hover:bg-orange-900/30',
            'active' => 'active:bg-orange-300 dark:active:bg-orange-900/40',
        ],
        'yellow' => [
            'default' => 'bg-yellow-100 text-yellow-700 hover:bg-yellow-200',
            'dark' => 'dark:bg-yellow-900/20 dark:text-yellow-400 dark:hover:bg-yellow-900/30',
            'active' => 'active:bg-yellow-300 dark:active:bg-yellow-900/40',
        ],
        'purple' => [
            'default' => 'bg-purple-100 text-purple-700 hover:bg-purple-200',
            'dark' => 'dark:bg-purple-900/20 dark:text-purple-400 dark:hover:bg-purple-900/30',
            'active' => 'active:bg-purple-300 dark:active:bg-purple-900/40',
        ],
        'indigo' => [
            'default' => 'bg-indigo-100 text-indigo-700 hover:bg-indigo-200',
            'dark' => 'dark:bg-indigo-900/20 dark:text-indigo-400 dark:hover:bg-indigo-900/30',
            'active' => 'active:bg-indigo-300 dark:active:bg-indigo-900/40',
        ],
        'gray' => [
            'default' => 'bg-gray-100 text-gray-700 hover:bg-gray-200',
            'dark' => 'dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700',
            'active' => 'active:bg-gray-300 dark:active:bg-gray-600',
        ],
    ];

    // Configuration des couleurs pour les variantes outlined
    $outlinedColors = [
        'red' => [
            'default' => 'outline outline-red-600 text-red-600 hover:bg-red-50',
            'dark' => 'dark:outline-red-500 dark:text-red-400 dark:hover:bg-red-900/10',
            'active' => 'active:bg-red-100 dark:active:bg-red-900/20',
        ],
        'blue' => [
            'default' => 'outline outline-blue-600 text-blue-600 hover:bg-blue-50',
            'dark' => 'dark:outline-blue-500 dark:text-blue-400 dark:hover:bg-blue-900/10',
            'active' => 'active:bg-blue-100 dark:active:bg-blue-900/20',
        ],
        'green' => [
            'default' => 'outline outline-green-600 text-green-600 hover:bg-green-50',
            'dark' => 'dark:outline-green-500 dark:text-green-400 dark:hover:bg-green-900/10',
            'active' => 'active:bg-green-100 dark:active:bg-green-900/20',
        ],
        'orange' => [
            'default' => 'outline outline-orange-600 text-orange-600 hover:bg-orange-50',
            'dark' => 'dark:outline-orange-500 dark:text-orange-400 dark:hover:bg-orange-900/10',
            'active' => 'active:bg-orange-100 dark:active:bg-orange-900/20',
        ],
        'yellow' => [
            'default' => 'outline outline-yellow-600 text-yellow-600 hover:bg-yellow-50',
            'dark' => 'dark:outline-yellow-500 dark:text-yellow-400 dark:hover:bg-yellow-900/10',
            'active' => 'active:bg-yellow-100 dark:active:bg-yellow-900/20',
        ],
        'purple' => [
            'default' => 'outline outline-purple-600 text-purple-600 hover:bg-purple-50',
            'dark' => 'dark:outline-purple-500 dark:text-purple-400 dark:hover:bg-purple-900/10',
            'active' => 'active:bg-purple-100 dark:active:bg-purple-900/20',
        ],
        'indigo' => [
            'default' => 'outline outline-indigo-600 text-indigo-600 hover:bg-indigo-50',
            'dark' => 'dark:outline-indigo-500 dark:text-indigo-400 dark:hover:bg-indigo-900/10',
            'active' => 'active:bg-indigo-100 dark:active:bg-indigo-900/20',
        ],
        'gray' => [
            'default' => 'outline outline-gray-400 text-gray-600 hover:bg-gray-50',
            'dark' => 'dark:outline-gray-500 dark:text-gray-400 dark:hover:bg-gray-800/50',
            'active' => 'active:bg-gray-100 dark:active:bg-gray-800',
        ],
    ];

    // Sélection du schéma de couleurs en fonction de la variante
    $colors = match ($variant) {
        'secondary' => $secondaryColors,
        'outlined' => $outlinedColors,
        default => $primaryColors,
    };

    $padding = match ($size) {
        'sm' => 'px-2 py-1 text-xs',
        'lg' => 'px-4 py-3 text-lg',
        default => 'px-3 py-2 text-sm',
    };

    $disabledClasses = $disabled ? 'opacity-50 cursor-not-allowed' : '';
@endphp

@if ($type === 'link')
    <a href="{{ $disabled ? '#' : $href }}"
        {{ $disabled ? '' : ($attributes->get('wire:navigate') !== false ? 'wire:navigate' : '') }}
        class="cursor-pointer flex shrink-0 items-center gap-x-1.5 rounded-md {{ $colors[$color]['default'] }} {{ $colors[$color]['dark'] }} {{ $colors[$color]['active'] }} {{ $padding }}
               font-semibold shadow-xs focus-visible:outline-2 focus-visible:outline-offset-2 -outline-offset-1
               {{ $disabledClasses }} {{ $class }}">
        @if ($icon)
            <x-dynamic-component :component="$icon" class="size-5 flex-shrink-0" />
        @endif
        <span @class([$responsive ? 'hidden md:inline' : 'inline'])>{{ $slot }}</span>
    </a>
@else
    <button {{ $attributes }} type="{{ $type }}" {{ $disabled ? 'disabled' : '' }}
        class="cursor-pointer flex shrink-0 items-center gap-x-1.5 rounded-md {{ $colors[$color]['default'] }} {{ $colors[$color]['dark'] }} {{ $colors[$color]['active'] }} {{ $padding }}
               font-semibold shadow-xs focus-visible:outline-2 focus-visible:outline-offset-2 -outline-offset-1
               {{ $disabledClasses }} {{ $class }}">
        @if ($icon)
            <x-dynamic-component :component="$icon" class="size-5 flex-shrink-0" />
        @endif
        <span @class([$responsive ? 'hidden md:inline' : 'inline'])>{{ $slot }}</span>
    </button>
@endif
