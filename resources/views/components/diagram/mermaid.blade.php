@props(['id' => 'mermaid-' . uniqid(), 'caption' => null, 'class' => ''])

<div class="my-6 {{ $class }}">
    @if($caption)
        <div class="text-center mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
            {{ $caption }}
        </div>
    @endif

    <div class="bg-white dark:bg-gray-900 rounded-lg p-4 overflow-auto">
        <pre class="mermaid text-center flex items-center justify-center" id="{{ $id }}">{{ $slot }}</pre>
    </div>
</div>

@push('scripts')
<script>
    // Ensure diagrams are reinitialized when Livewire updates the DOM
    document.addEventListener("livewire:navigated", function() {
        if (window.initMermaid) {
            window.initMermaid();
        }
    });

    // Also initialize when this component is first rendered
    document.addEventListener("DOMContentLoaded", function() {
        if (window.initMermaid) {
            window.initMermaid();
        }
    });
</script>
@endpush
