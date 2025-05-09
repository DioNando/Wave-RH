<x-form submit="update">
    <div class="mt-5 md:max-w-lg bg-white dark:bg-gray-900 ring-1 ring-gray-200 dark:ring-gray-700 rounded-lg p-8">
        <div class="grid grid-cols-1 border-b border-gray-900/10 dark:border-gray-700 pb-12">

            <div class="flex flex-col gap-x-6 gap-y-8">
                <div class="sm:col-span-full">
                    <x-form.group name="form.nom" label="Nom" required>
                        <x-form.input name="form.nom" required :live="true" />
                    </x-form.group>
                </div>

                <div class="sm:col-span-full">
                    <x-form.group name="form.categorie" label="Catégorie" required>
                        <x-form.input name="form.categorie" required :live="true" list="categories" />
                        <datalist id="categories">
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie }}">
                            @endforeach
                        </datalist>
                    </x-form.group>
                </div>

                <div class="sm:col-span-full">
                    <x-form.group name="form.description" label="Description">
                        <x-form.textarea name="form.description" :live="true" rows="4" />
                    </x-form.group>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-between gap-x-3">
            {{-- @livewire('base.delete', [
                'modelId' => $this->form->competenceTechnique->id,
                'modelType' => 'competence-technique',
                'redirectRoute' => 'competences-techniques',
                'redirectType' => 'index',
                'entity' => $this->form->competenceTechnique,
            ]) --}}
            <x-button.primary type="submit" color="orange">Mettre à jour</x-button.primary>
        </div>
    </div>
</x-form>
