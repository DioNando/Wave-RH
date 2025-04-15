@props(['content' => '', 'class' => ''])

<td class="py-5 px-5 text-sm whitespace-nowrap {{ $class }}" {{ $attributes->merge(['class' => $class]) }}>
    {!! $content !!}
    {{ $slot }}
</td>
