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
    // Ensure selected values are properly initialized and converted to integers for consistency
    $selectedValues = is_array($selected) ? array_map('intval', $selected) : (empty($selected) ? [] : [intval($selected)]);
    // Format options for JS to ensure values are integers
    $optionsForJS = collect($options)->map(fn($label, $value) => ['value' => intval($value), 'label' => $label])->values()->all();
@endphp

<div id="{{ $id }}_container" class="multiselect-container relative">
    <!-- Input field that triggers dropdown -->
    <div class="mt-2 grid grid-cols-1">
        <input
            type="text"
            id="{{ $id }}_input"
            placeholder="{{ $placeholder }}"
            class="{{ $inputClasses }}"
            autocomplete="off" />
        <span class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-400 sm:size-4">
            <x-heroicon-o-chevron-up-down />
        </span>
    </div>

    <!-- Selected items as badges -->
    <div id="{{ $id }}_selected_items" class="mt-2 flex flex-wrap gap-2">
        <!-- Selected badges will be added here dynamically -->
    </div>

    <!-- Hidden input for storing all selected values as JSON, bound to Livewire -->
    <input type="hidden" id="{{ $id }}_values" name="{{ $name }}" wire:model="{{ $name }}" />

    <!-- Dropdown menu -->
    <div id="{{ $id }}_dropdown" class="hidden absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md text-base shadow-lg bg-white dark:bg-gray-800 ring-gray-900/5 dark:ring-gray-700 dark:shadow-gray-900 sm:text-sm">
        <!-- Options will be populated here -->
    </div>
</div>

<script>
    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the multiselect component
        initMultiselect('{{ $id }}', @json($optionsForJS), @json($selectedValues));

        // Listen for Livewire updates to sync the component's state
        document.addEventListener('livewire:initialized', function() {
            if (window.Livewire) {
                // Listen for updates from Livewire to the selected values
                window.Livewire.on('{{ $name }}Updated', function(newValues) {
                    // Update the multiselect when the Livewire property changes
                    updateSelectedValues('{{ $id }}', Array.isArray(newValues) ? newValues.map(Number) : []);
                });
            }
        });
    });

    // Main initialization function
    function initMultiselect(id, options, selectedValues) {
        // Store state
        const state = {
            options: options,
            selectedValues: selectedValues || [],
            isOpen: false,
            highlightedIndex: -1,
            search: '',
        };

        // Cache DOM elements
        const container = document.getElementById(`${id}_container`);
        const input = document.getElementById(`${id}_input`);
        const hiddenInput = document.getElementById(`${id}_values`);
        const dropdown = document.getElementById(`${id}_dropdown`);
        const selectedItemsContainer = document.getElementById(`${id}_selected_items`);

        // Set initial value for hidden input
        hiddenInput.value = JSON.stringify(state.selectedValues);

        // Initial render of selected items and dropdown options
        renderSelectedItems();
        renderDropdownOptions();

        // Event handlers
        input.addEventListener('click', toggleDropdown);
        input.addEventListener('input', handleSearch);
        input.addEventListener('keydown', handleKeyDown);

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!container.contains(event.target)) {
                closeDropdown();
            }
        });

        // Handle multiselect reset event
        container.addEventListener('multiselect:reset', function() {
            state.selectedValues = [];
            state.search = '';
            input.value = '';
            renderSelectedItems();
            updateHiddenInput();
        });

        // Handle Livewire updates
        hiddenInput.addEventListener('input', function(event) {
            if (event.isTrusted) {  // Only handle "real" input events, not programmatic ones
                try {
                    // This receives data from Livewire updates
                    const newValues = JSON.parse(hiddenInput.value);
                    if (JSON.stringify(newValues) !== JSON.stringify(state.selectedValues)) {
                        state.selectedValues = Array.isArray(newValues) ? newValues.map(Number) : [];
                        renderSelectedItems();
                    }
                } catch (e) {
                    console.error('Error parsing multiselect values', e);
                }
            }
        });

        // Core functions
        function toggleDropdown() {
            state.isOpen = !state.isOpen;
            if (state.isOpen) {
                renderDropdownOptions();
                dropdown.classList.remove('hidden');
                input.focus();
            } else {
                dropdown.classList.add('hidden');
            }
        }

        function closeDropdown() {
            state.isOpen = false;
            dropdown.classList.add('hidden');
        }

        function handleSearch(event) {
            state.search = event.target.value.toLowerCase();
            state.highlightedIndex = -1;
            renderDropdownOptions();

            // Open dropdown on search
            if (!state.isOpen && state.search) {
                state.isOpen = true;
                dropdown.classList.remove('hidden');
            }
        }

        function handleKeyDown(event) {
            // Handle keyboard navigation
            if (event.key === 'ArrowDown') {
                event.preventDefault();
                navigateOptions(1);
            } else if (event.key === 'ArrowUp') {
                event.preventDefault();
                navigateOptions(-1);
            } else if (event.key === 'Enter' && state.highlightedIndex >= 0) {
                event.preventDefault();
                const filteredOptions = getFilteredOptions();
                if (filteredOptions[state.highlightedIndex]) {
                    toggleOptionSelection(filteredOptions[state.highlightedIndex].value);
                }
            } else if (event.key === 'Escape') {
                event.preventDefault();
                closeDropdown();
            }
        }

        function navigateOptions(direction) {
            const filteredOptions = getFilteredOptions();

            if (!state.isOpen && filteredOptions.length) {
                state.isOpen = true;
                renderDropdownOptions();
                dropdown.classList.remove('hidden');
            }

            if (filteredOptions.length) {
                state.highlightedIndex = Math.max(
                    -1,
                    Math.min(
                        filteredOptions.length - 1,
                        state.highlightedIndex + direction
                    )
                );
                renderDropdownOptions();
            }
        }

        function getFilteredOptions() {
            if (!state.search) {
                return state.options;
            }
            return state.options.filter(option =>
                option.label.toLowerCase().includes(state.search.toLowerCase())
            );
        }

        function toggleOptionSelection(value) {
            // Convert to number to ensure consistent type comparison
            const numericValue = parseInt(value);

            if (state.selectedValues.includes(numericValue)) {
                state.selectedValues = state.selectedValues.filter(v => v !== numericValue);
            } else {
                state.selectedValues = [...state.selectedValues, numericValue];
            }

            input.value = '';  // Clear the search input
            state.search = '';

            renderSelectedItems();
            renderDropdownOptions();
            updateHiddenInput();
        }

        function removeOption(value) {
            // Convert to number to ensure consistent type comparison
            const numericValue = parseInt(value);
            state.selectedValues = state.selectedValues.filter(v => v !== numericValue);

            renderSelectedItems();
            renderDropdownOptions();
            updateHiddenInput();
        }

        function updateHiddenInput() {
            // Update the hidden input value and trigger a change event for Livewire
            hiddenInput.value = JSON.stringify(state.selectedValues);

            // Dispatch an input event to notify Livewire of the change
            hiddenInput.dispatchEvent(new Event('input', { bubbles: true }));
        }

        function renderSelectedItems() {
            // Clear current selection
            selectedItemsContainer.innerHTML = '';

            // Get selected options
            const selectedOptions = state.options.filter(option =>
                state.selectedValues.includes(option.value)
            );

            // No need to show container if empty
            if (selectedOptions.length === 0) {
                selectedItemsContainer.style.display = 'none';
                return;
            }

            selectedItemsContainer.style.display = 'flex';

            // Add selected items as badges
            selectedOptions.forEach(option => {
                const badge = document.createElement('span');
                badge.className = 'inline-flex items-center rounded-md bg-blue-50 dark:bg-blue-900/20 px-2 py-1 text-xs font-medium text-blue-700 dark:text-blue-400 ring-1 ring-inset ring-blue-700/10 dark:ring-blue-400/30 group';

                const label = document.createElement('span');
                label.textContent = option.label;
                badge.appendChild(label);

                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'ml-1 group-hover:text-blue-900 dark:group-hover:text-blue-200';
                button.innerHTML = `
                    <span class="sr-only">Remove</span>
                    <svg class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                            clip-rule="evenodd" />
                    </svg>
                `;
                button.addEventListener('click', (e) => {
                    e.stopPropagation();
                    removeOption(option.value);
                });

                badge.appendChild(button);
                selectedItemsContainer.appendChild(badge);
            });
        }

        function renderDropdownOptions() {
            // Clear current options
            dropdown.innerHTML = '';

            const filteredOptions = getFilteredOptions();

            // Show a message if no options match the search
            if (filteredOptions.length === 0) {
                const noResults = document.createElement('div');
                noResults.className = 'relative cursor-default select-none py-2 pl-3 pr-9 text-gray-500 dark:text-gray-400';
                noResults.textContent = 'Aucun résultat trouvé';
                dropdown.appendChild(noResults);
                return;
            }

            // Add each option to the dropdown
            filteredOptions.forEach((option, index) => {
                const optionElement = document.createElement('div');
                optionElement.className = 'relative cursor-pointer select-none py-2 pl-3 pr-9 hover:bg-blue-50 dark:hover:bg-blue-900/30';

                // Add highlight for the currently focused option
                if (index === state.highlightedIndex) {
                    optionElement.classList.add('bg-blue-100', 'dark:bg-blue-900/50', 'text-blue-900', 'dark:text-blue-100');
                } else {
                    optionElement.classList.add('text-gray-900', 'dark:text-white');
                }

                // Add label
                const labelContainer = document.createElement('div');
                labelContainer.className = 'flex items-center';

                const label = document.createElement('span');
                label.className = 'block truncate font-normal';
                label.textContent = option.label;

                labelContainer.appendChild(label);
                optionElement.appendChild(labelContainer);

                // Add check mark if selected
                if (state.selectedValues.includes(option.value)) {
                    const checkmark = document.createElement('span');
                    checkmark.className = 'absolute inset-y-0 right-0 flex items-center pr-4 text-blue-600 dark:text-blue-400';
                    checkmark.innerHTML = `
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd" />
                        </svg>
                    `;
                    optionElement.appendChild(checkmark);
                }

                // Add click handler
                optionElement.addEventListener('click', () => {
                    toggleOptionSelection(option.value);
                });

                dropdown.appendChild(optionElement);
            });
        }

        // Expose methods for external use
        window.multiselect = window.multiselect || {};
        window.multiselect[id] = {
            reset: function() {
                state.selectedValues = [];
                state.search = '';
                input.value = '';
                renderSelectedItems();
                updateHiddenInput();
            },
            updateSelectedValues: function(newValues) {
                if (JSON.stringify(newValues) !== JSON.stringify(state.selectedValues)) {
                    state.selectedValues = newValues.map(Number);
                    renderSelectedItems();
                    updateHiddenInput();
                }
            }
        };
    }

    // Helper function to update selected values from outside
    function updateSelectedValues(id, newValues) {
        if (window.multiselect && window.multiselect[id]) {
            window.multiselect[id].updateSelectedValues(newValues);
        }
    }
</script>
