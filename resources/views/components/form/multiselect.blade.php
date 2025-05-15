@props([
    'name',
    'options' => [],
    'selected' => [],
    'placeholder' => 'Sélectionner des options',
    'size' => 'md',
    'class' => '',
])

@php
    $sizes = [
        'sm' => 'px-2.5 py-1.5 text-sm',
        'md' => 'px-3 py-1.5 text-base',
        'lg' => 'px-4 py-2 text-lg',
    ];

    $inputClasses =
        'col-start-1 row-start-1 w-full appearance-none rounded-md bg-gray-100 dark:bg-white/5 py-1.5 pr-8 pl-3 text-base text-gray-900 dark:text-white outline-1 -outline-offset-1 *:bg-gray-200 dark:*:bg-gray-800 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500 sm:text-sm/6' .
        ' ' .
        ($errors->has($name) ? 'outline-red-500 dark:outline-red-400' : 'outline-gray-300 dark:outline-white/10') .
        ' ' .
        $sizes[$size] .
        ' ' .
        $class;

    $id = str_replace('.', '_', $name);
    $selectedValues = is_array($selected) ? $selected : [$selected];
@endphp

<div x-data="multiselect{{ $id }}" class="relative" @click.away="open = false">
    <!-- Input field that triggers dropdown -->
    <div class="mt-2 grid grid-cols-1">
        <input type="text" x-ref="searchInput" placeholder="{{ $placeholder }}" @click="toggleDropdown"
            @keydown.escape.stop="open = false" @keydown.tab="open = false"
            @keydown.enter.prevent="selectOption(highlightedIndex)" @keydown.arrow-up.prevent="navigateOptions(-1)"
            @keydown.arrow-down.prevent="navigateOptions(1)" class="{{ $inputClasses }}" autocomplete="off" />
        <x-heroicon-o-chevron-up-down
            class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-400 sm:size-4" />
    </div>

    <!-- Selected items as badges -->
    <div class="mt-2 flex flex-wrap gap-2" x-show="selectedOptions.length > 0">
        <template x-for="(item, index) in selectedOptions" :key="item.value">
            <span
                class="inline-flex items-center rounded-md bg-blue-50 dark:bg-blue-900/20 px-2 py-1 text-xs font-medium text-blue-700 dark:text-blue-400 ring-1 ring-inset ring-blue-700/10 dark:ring-blue-400/30 group">
                <span x-text="item.label"></span>
                <button type="button" @click.stop="removeOption(item.value)"
                    class="ml-1 group-hover:text-blue-900 dark:group-hover:text-blue-200">
                    <span class="sr-only">Remove</span>
                    <svg class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </span>
        </template>
    </div>

    <!-- Hidden input for storing all selected values as JSON -->
    <input type="hidden" id="{{ $name }}_values" name="{{ $name }}" wire:model="{{ $name }}" x-bind:value="JSON.stringify(selectedValues)" />

    <!-- Dropdown menu -->
    <div x-show="open" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md text-base shadow-lg bg-white dark:bg-gray-800  ring-gray-900/5 focus:outline-hidden
                         dark:ring-gray-700 dark:shadow-gray-900 sm:text-sm"
        x-cloak>
        <!-- Search results/options -->
        <template x-for="(option, index) in filteredOptions" :key="option.value">
            <div @click="selectOption(index)"
                :class="{
                    'bg-blue-100 dark:bg-blue-900/50 text-blue-900 dark:text-blue-100': highlightedIndex === index,
                    'text-gray-900 dark:text-white': highlightedIndex !== index
                }"
                class="relative cursor-pointer select-none py-2 pl-3 pr-9 hover:bg-blue-50 dark:hover:bg-blue-900/30">
                <div class="flex items-center">
                    <span x-text="option.label" class="block truncate font-normal"></span>
                </div>
                <!-- Show check mark if selected -->
                <span x-show="isSelected(option.value)"
                    class="absolute inset-y-0 right-0 flex items-center pr-4 text-blue-600 dark:text-blue-400">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </div>
        </template>
        <div x-show="filteredOptions.length === 0"
            class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-500 dark:text-gray-400">
            Aucun résultat trouvé
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('multiselect{{ $id }}', () => ({
            open: false,
            search: '',
            highlightedIndex: 0,
            options: @js(collect($options)->map(fn($label, $value) => ['value' => $value, 'label' => $label])->values()->all()),
            selectedValues: @js($selectedValues),

            get selectedOptions() {
                return this.options.filter(option => this.selectedValues.includes(option.value));
            },

            get filteredOptions() {
                const searchLower = this.search.toLowerCase();
                return this.options.filter(option =>
                    option.label.toLowerCase().includes(searchLower)
                );
            },

            init() {
                // Only update Livewire on form submission, not on every change
                this.$watch('selectedValues', () => {
                    // Update the hidden field silently
                    document.getElementById('{{ $name }}_values').dispatchEvent(
                        new CustomEvent('input', {
                            bubbles: true,
                            detail: {
                                selectedValues: this.selectedValues
                            }
                        })
                    );
                });

                // Handle input from parent, for instance when resetting the form
                this.$el.addEventListener('multiselect:reset', (event) => {
                    this.selectedValues = [];
                });

                this.$watch('search', () => {
                    this.highlightedIndex = 0;
                });
            },

            toggleDropdown() {
                this.open = !this.open;
                if (this.open) {
                    this.$nextTick(() => {
                        this.$refs.searchInput.focus();
                    });
                }
            },

            selectOption(index) {
                if (index < 0 || index >= this.filteredOptions.length) return;

                const option = this.filteredOptions[index];

                // Toggle selection
                if (this.isSelected(option.value)) {
                    this.selectedValues = this.selectedValues.filter(v => v !== option.value);
                } else {
                    this.selectedValues = [...this.selectedValues, option.value];
                }

                this.search = '';
                this.$refs.searchInput.focus();
            },

            removeOption(value) {
                this.selectedValues = this.selectedValues.filter(v => v !== value);
            },

            isSelected(value) {
                return this.selectedValues.includes(value);
            },

            navigateOptions(direction) {
                this.open = true;
                this.highlightedIndex = Math.max(0, Math.min(this.filteredOptions.length - 1, this
                    .highlightedIndex + direction));
            }
        }))
    });
</script>
