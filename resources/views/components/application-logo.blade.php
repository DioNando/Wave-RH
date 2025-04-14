@props(['class' => ''])

<div>
    <img class="w-auto mx-auto block dark:hidden {{ $class}}"
        src="{{ asset('img/Wave-inc-Agence-digitale-expert-en-developpement-web-Maroc-logo-blue.png') }}" alt="Logo Wave">
    <img class="w-auto mx-auto hidden dark:block {{ $class}}"
        src="{{ asset('img/Wave-inc-Agence-digitale-expert-en-developpement-web-Maroc-logo-white.png') }}"
        alt="Logo Wave (dark)">
</div>
