@props([
    'name' => '',
    'id' => null,
    'disabled' => false,
    'checked' => false,
    'value' => 1,
])

@php
    $id = $id ?? $name;
    $checked = filter_var($checked, FILTER_VALIDATE_BOOLEAN);
@endphp

<div x-data="{ switched: {{ $checked ? 'true' : 'false' }} }" class="relative inline-flex h-6 w-11 shrink-0">
    <input
        type="checkbox"
        id="{{ $id }}"
        name="{{ $name }}"
        value="{{ $value }}"
        @if($checked) checked @endif
        @if($disabled) disabled @endif
        x-model="switched"
        {{ $attributes->class([
            'peer sr-only',
            'focus:outline-none focus:ring-0 focus:ring-offset-0',
        ])->merge() }}
    />

    <span
        x-bind:class="{ 'bg-blue-600': switched, 'bg-gray-300 dark:bg-gray-600': !switched }"
        class="absolute inset-0 cursor-pointer rounded-full transition duration-200 ease-in-out peer-disabled:opacity-50 peer-disabled:cursor-not-allowed"
        role="checkbox"
        tabindex="0"
        aria-checked="false"
        x-on:click="if (!$el.closest('div').querySelector('input').disabled) { switched = !switched }"
        x-on:keydown.space.prevent="if (!$el.closest('div').querySelector('input').disabled) { switched = !switched }"
    ></span>

    <span
        x-bind:class="{ 'translate-x-5': switched, 'translate-x-0': !switched }"
        class="absolute left-0.5 top-0.5 flex h-5 w-5 items-center justify-center rounded-full bg-white transition duration-200 ease-in-out"
    >
        <svg
            x-show="switched"
            class="h-3 w-3 text-blue-600"
            fill="currentColor"
            viewBox="0 0 12 12"
            style="display: none;"
        >
            <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
        </svg>
    </span>
</div>
