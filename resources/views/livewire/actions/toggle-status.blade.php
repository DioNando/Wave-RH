<div>
    <!-- Bouton pour basculer le statut qui déclenche la modal -->
    @if ($simple)
        <!-- Version simple (juste une icône) -->
        <x-button.action
            type="button"
            simple="true"
            x-on:click.prevent="$dispatch('open-modal', '{{ $this->modalId }}')"
            :color="$this->buttonColor"
            :icon="$this->buttonIcon">
            {{ $entity->statut ? $deactivateLabel : $activateLabel }}
        </x-button.action>
    @elseif ($buttonStyle === 'outlined')
        <!-- Version outlined -->
        <x-button.outlined
            type="button"
            x-on:click.prevent="$dispatch('open-modal', '{{ $this->modalId }}')"
            :color="$this->buttonColor"
            :icon="$this->buttonIcon"
            :responsive="$responsive">
            {{ $entity->statut ? $deactivateLabel : $activateLabel }}
        </x-button.outlined>
    @else
        <!-- Version primary -->
        <x-button.primary
            type="button"
            x-on:click.prevent="$dispatch('open-modal', '{{ $this->modalId }}')"
            :color="$this->buttonColor"
            :icon="$this->buttonIcon"
            :responsive="$responsive">
            {{ $entity->statut ? $deactivateLabel : $activateLabel }}
        </x-button.primary>
    @endif

    <!-- Modal de confirmation -->
    <x-modal name="{{ $this->modalId }}" :show="false">
        <div class="sm:p-6 p-4">
            <!-- Header -->
            <div class="flex items-center gap-4">
                <div
                    class="flex size-12 shrink-0 items-center justify-center rounded-full {{ $entity->statut ? 'bg-red-100' : 'bg-green-100' }} sm:size-10">
                    <x-heroicon-o-exclamation-triangle
                        class="size-6 {{ $entity->statut ? 'text-red-600' : 'text-green-600' }}" />
                </div>
                <h3 id="modal-title"
                    class="text-base font-semibold text-gray-900 dark:text-white">
                    {{ $this->title }}
                </h3>
            </div>

            <!-- Body -->
            <div class="mt-3 text-sm text-gray-700 dark:text-gray-300">
                <p>{{ $this->body }}</p>
            </div>

            <!-- Actions -->
            <div class="mt-5 sm:mt-4 flex flex-row-reverse gap-3">
                <x-button.primary
                    type="button"
                    wire:click="toggleStatus"
                    x-on:click="$dispatch('close-modal', '{{ $this->modalId }}')"
                    :color="$this->confirmButtonColor">
                    {{ $entity->statut ? $deactivateLabel : $activateLabel }}
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
