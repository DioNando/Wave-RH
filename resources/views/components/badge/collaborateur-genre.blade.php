@props(['value'])

@php
    $color = match($value) {
        App\Enums\CollaborateurGenre::HOMME => 'blue',
        App\Enums\CollaborateurGenre::FEMME => 'pink',
        default => 'neutral',
    };

    $colorClasses = [
        'blue' => 'text-blue-700 dark:text-blue-400',
        'pink' => 'text-pink-700 dark:text-pink-400',
        'neutral' => 'text-neutral-700 dark:text-neutral-400',
    ];
@endphp

<span class="inline-flex items-center rounded-md text-md font-medium {{ $colorClasses[$color] }}">
    {{ $value->label() }}
</span>
