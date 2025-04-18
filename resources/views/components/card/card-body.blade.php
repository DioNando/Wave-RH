@props(['divider' => null])

<div x-show="open" x-cloak {{ $attributes->merge(['class' => 'p-6 ' . ($divider ? 'divide-y divide-gray-200 dark:divide-gray-700' : '')]) }}>
    {{ $slot }}
</div>
