@props([
    'href' => '#',
    'type' => 'link',
    'color' => 'blue',
    'size' => 'md',
    'class' => '',
    'icon' => null,
    'responsive' => false,
    'disabled' => false,
    'wire:navigate' => true,
])

<x-button.button
    :href="$href"
    :type="$type"
    variant="outlined"
    :color="$color"
    :size="$size"
    :class="$class"
    :icon="$icon"
    :responsive="$responsive"
    :disabled="$disabled"
    :wire:navigate="$attributes->get('wire:navigate')"
    {{ $attributes }}
>
    {{ $slot }}
</x-button.button>
