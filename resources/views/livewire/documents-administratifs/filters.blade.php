<x-form.form submit="filters"
    class="p-6 mb-5 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-900 ring ring-gray-200 dark:ring-gray-700 rounded-lg">
    <div class="flex items-center justify-between pb-2">
        <h3 class="font-medium text-blue-600 dark:text-blue-400">Filtres</h3>
        <x-heroicon-o-x-mark @click="openFilters = false" class="size-4 cursor-pointer" />
    </div>

    <div class="flex flex-wrap gap-x-10 space-y-5">
        <div class="w-full sm:w-64">
            <x-form.group name="type_document_id" label="Type de document">
                <x-form.multiselect name="type_document_id" :options="$typeDocuments->pluck('libelle', 'id')->toArray()" :selected="$type_document_id"
                    placeholder="Sélectionner des types" />
            </x-form.group>
        </div>

        <fieldset class="">
            <legend class="text-sm/6 font-medium text-gray-900 dark:text-gray-100">Statut</legend>
            <div
                class="mt-1 flex gap-4 py-1.5 px-3 rounded-md bg-gray-100 dark:bg-white/5 outline -outline-offset-1 outline-gray-300 dark:outline-white/10">
                <x-form.checkbox name="statut" label="Actif" :value="true" :live="false" />
                <x-form.checkbox name="statut" label="Inactif" :value="false" :live="false" />
            </div>
        </fieldset>

        {{-- <div class="hidden">
            <label class="block text-sm font-medium text-gray-900 dark:text-gray-100">Date d'émission</label>
            <div class="mt-2 flex w-full rounded-md bg-gray-100 dark:bg-white/5 px-3 py-2 text-sm text-gray-900 dark:text-white outline -outline-offset-1 outline-gray-300 dark:outline-white/10">
                <input type="date" wire:model="date_emission_start" name="date_emission_start" class="focus:outline-0">
                <span class="mx-4 text-gray-500">à</span>
                <input type="date" wire:model="date_emission_end" name="date_emission_end" class="focus:outline-0">
            </div>
        </div>

        <div class="hidden">
            <label class="block text-sm font-medium text-gray-900 dark:text-gray-100">Date d'expiration</label>
            <div class="mt-2 flex w-full rounded-md bg-gray-100 dark:bg-white/5 px-3 py-2 text-sm text-gray-900 dark:text-white outline -outline-offset-1 outline-gray-300 dark:outline-white/10">
                <input type="date" wire:model="date_expiration_start" name="date_expiration_start" class="focus:outline-0">
                <span class="mx-4 text-gray-500">à</span>
                <input type="date" wire:model="date_expiration_end" name="date_expiration_end" class="focus:outline-0">
            </div>
        </div> --}}

        <div class="">
            <x-form.group name="collaborateur_id" label="Collaborateur">
                <x-form.select name="collaborateur_id" :options="$collaborateurs->pluck('nom_complet', 'id')->toArray()" :live="false" />
            </x-form.group>
        </div>
    </div>

    <div class="flex justify-end mt-6 md:mt-4 gap-3">
        <x-button.outlined type="button" wire:click="resetFilters" color="gray">Réinitialiser</x-button.outlined>
        <x-button.primary type="submit">Filtrer</x-button.primary>
    </div>
</x-form.form>
