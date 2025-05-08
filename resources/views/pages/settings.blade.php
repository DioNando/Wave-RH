<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Configurations" />
    </x-slot>
    <div
        class="flex flex-col gap-3 items-start justify-start w-fit p-6 rounded-md bg-gray-50 dark:border-gray-600 dark:bg-gray-900 dark:hover:bg-gray-700 shadow-sm">
        <h3 class="text-lg font-bold text-blue-600 dark:text-blue-400">Thème</h3>
        <x-button.dark-mode />
    </div>
    {{-- <div class="py-3">
        <x-layout.link-primary route="examples.ui" icon="paint-brush" label="Exemples UI" />
    </div> --}}
</x-app-layout>
