@props(['content' => '', 'class' => '', 'align' => 'left'])

<td class="py-5 px-5 text-sm whitespace-nowrap text-{{ $align }} {{ $class }}"
    {{ $attributes->merge(['class' => $class]) }}>
    {!! $content !!}
    {{ $slot }}
</td>
