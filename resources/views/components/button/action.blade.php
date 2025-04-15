@props([
    'route' => null,
    'id' => null,
    'params' => [],
    'href' => null,
    'type' => 'link',
    'icon' => 'pencil-square',
    'color' => 'orange',
    'confirm' => false,
    'confirmMessage' => 'Êtes-vous sûr de vouloir effectuer cette action?',
    'paramName' => null
])

@php
    $colors = [
        'orange' => 'bg-orange-600 hover:bg-orange-700 dark:bg-orange-700 dark:hover:bg-orange-800 active:bg-orange-800 dark:active:bg-orange-900',
        'red' => 'bg-red-600 hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800 active:bg-red-800 dark:active:bg-red-900',
        'blue' => 'bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 active:bg-blue-800 dark:active:bg-blue-900',
        'green' => 'bg-green-600 hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-800 active:bg-green-800 dark:active:bg-green-900',
        'purple' => 'bg-purple-600 hover:bg-purple-700 dark:bg-purple-700 dark:hover:bg-purple-800 active:bg-purple-800 dark:active:bg-purple-900',
        'gray' => 'bg-gray-600 hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-800 active:bg-gray-800 dark:active:bg-gray-900',
    ];

    $baseClass = 'inline-flex items-center p-2 text-sm text-white rounded-lg ' . ($colors[$color] ?? $colors['orange']);

    if ($route && $id) {
        // Déterminer le nom du paramètre
        $routeName = $route;
        $paramKey = $paramName ?: Str::singular(explode('.', $routeName)[0]);

        if (is_array($params)) {
            $params = array_merge([$paramKey => $id], $params);
        } else {
            $params = [$paramKey => $id];
        }
        $url = route($route, $params);
    } elseif ($href) {
        $url = $href;
    } else {
        $url = '#';
    }

    $iconComponent = 'heroicon-o-' . $icon;
@endphp

@if($type === 'link')
    <a
        href="{{ $url }}"
        @if($confirm)
            onclick="return confirm('{{ $confirmMessage }}')"
        @endif
        {{ $attributes->merge(['class' => $baseClass]) }}
    >
        <x-dynamic-component :component="$iconComponent" class="size-4" />
        {{ $slot }}
    </a>
@else
    <button
        type="button"
        @if($confirm)
            onclick="if(confirm('{{ $confirmMessage }}')){{ $attributes->get('onclick', '') }}"
        @endif
        {{ $attributes->merge(['class' => $baseClass]) }}
    >
        <x-dynamic-component :component="$iconComponent" class="size-4" />
        {{ $slot }}
    </button>
@endif
