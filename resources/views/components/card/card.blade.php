@props(['defaultOpen' => true])

<div x-data="{ open: {{ $defaultOpen }} }" x-cloak
    {{ $attributes->merge(['class' => 'rounded-lg shadow-sm border ' . $typeClass() . ' ' . $class]) }}>
    {{ $slot }}
</div>
