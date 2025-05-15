<div>
    <!-- Bouton de suppression qui déclenche la modal -->
    @if ($buttonStyle === 'outlined')
        <x-button.outlined
            type="button"
            x-on:click.prevent="$dispatch('open-modal', '{{ $this->modalId }}')"
            :color="$color"
            :icon="$icon"
            :responsive="$responsive">
            {{ $buttonLabel }}
        </x-button.outlined>
    @else
        <x-button.primary
            type="button"
            x-on:click.prevent="$dispatch('open-modal', '{{ $this->modalId }}')"
            :color="$color"
            :icon="$icon"
            :responsive="$responsive">
            {{ $buttonLabel }}
        </x-button.primary>
    @endif

    <!-- Modal de confirmation de suppression -->
    <x-modal name="{{ $this->modalId }}" :show="false">
        <div class="sm:p-6 p-4">
            <!-- Header -->
            <div class="flex items-center gap-4">
                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:size-10">
                    <x-heroicon-o-exclamation-triangle class="size-6 text-red-600" />
                </div>
                <h3 id="modal-title" class="text-base font-semibold text-gray-900 dark:text-white">
                    {{ $this->title }}
                </h3>
            </div>

            <!-- Body -->
            <div class="mt-3 text-sm text-gray-700 dark:text-gray-300">
                <p>{!! $this->body !!}</p>
            </div>

            <!-- Actions -->
            <div class="mt-5 sm:mt-4 flex flex-row-reverse gap-3">
                <x-button.primary
                    type="button"
                    wire:click="delete"
                    x-on:click="$dispatch('close-modal', '{{ $this->modalId }}')"
                    color="red">
                    {{ $buttonLabel }}
                </x-button.primary>
                <x-button.primary
                    type="button"
                    color="gray"
                    x-on:click="$dispatch('close-modal', '{{ $this->modalId }}')">
                    {{ __('Annuler') }}
                </x-button.primary>
            </div>
        </div>
    </x-modal>
</div>
