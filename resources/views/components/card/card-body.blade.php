<div  x-show="open" x-cloak {{ $attributes->merge(['class' => 'p-6']) }}>
    {{ $slot }}
</div>
