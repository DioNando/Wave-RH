<x-form submit="update">
    <div class="mt-5 md:max-w-md bg-white dark:bg-gray-900 ring-1 ring-gray-200 dark:ring-gray-700 rounded-lg p-8">
        <div class="grid grid-cols-1 border-b border-gray-900/10 dark:border-gray-700 pb-12">
            <div class="flex flex-col gap-x-6 gap-y-8">
                <div class="sm:col-span-full">
                    <x-form.group name="form.libelle" label="Libellé" required>
                        <x-form.input name="form.libelle" required />
                    </x-form.group>
                </div>
                <div class="sm:col-span-full">
                    <x-form.group name="form.description" label="Description">
                        <x-form.textarea name="form.description" rows="2" />
                    </x-form.group>
                </div>
                <div class="sm:col-span-full">
                    <x-form.group name="form.couleur" label="Couleur">
                        <x-form.color-radio name="form.couleur" :value="$this->form->typeDocument->couleur" />
                    </x-form.group>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-between gap-x-3">
            {{-- @livewire('base.delete', [
                'modelId' => $this->form->typeDocument->id,
                'modelType' => 'types_document',
                'redirectRoute' => 'types-documents',
                'redirectType' => 'index',
                'entity' => $this->form->typeDocument,
            ]) --}}
            <x-button.primary type="submit" color="orange">Mettre à jour</x-button.primary>
        </div>
    </div>
</x-form>
