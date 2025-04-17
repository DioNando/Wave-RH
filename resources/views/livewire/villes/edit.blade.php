<x-form submit="update">
    <div class="mt-5 md:max-w-md bg-white dark:bg-gray-900 ring-1 ring-gray-200 dark:ring-gray-700 rounded-lg p-8">
        <div
            class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-8 border-b border-gray-900/10 dark:border-gray-700 pb-12">
            <div class="sm:col-span-full">
                <x-form.group name="form.nom" label="Nom" required>
                    <x-form.input name="form.nom" required :live="true" />
                </x-form.group>
            </div>
            <div class="sm:col-span-full">
                <x-form.group name="form.pays_id" label="Pays" required>
                    <x-form.select name="form.pays_id" :options="$pays->pluck('nom', 'id')->toArray()" required :live="true" />
                </x-form.group>
            </div>
            <div class="col-span-full">
                <x-form.group name="form.region_id" label="Région" required>
                    <x-form.select name="form.region_id" :options="$regions->pluck('nom', 'id')->toArray()" required :live="true" />
                </x-form.group>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-between gap-x-3">
            {{-- @livewire('base.delete', [
                'modelId' => $this->form->ville->id,
                'modelType' => 'ville',
                'redirectRoute' => 'villes',
                'redirectType' => 'index',
                'entity' => $this->form->ville,
            ]) --}}
            <x-button.primary type="submit" color="orange">Mettre à jour</x-button.primary>
        </div>
    </div>
</x-form>
