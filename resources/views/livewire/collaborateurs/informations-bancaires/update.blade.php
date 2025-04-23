<x-form submit="update" class="px-4 sm:px-0">
    <div x-data="{ showForm: false }">
        <div x-show="showForm" class="grid grid-cols-1 border-b border-gray-900/10 dark:border-gray-700 pb-12">
            <div class="flex flex-col gap-x-6 gap-y-8">
                <div class="sm:col-span-full">
                    <x-form.group name="form.nom_banque" label="Nom de la banque" required>
                        <x-form.input name="form.nom_banque" required :live="true" />
                    </x-form.group>
                </div>
                <div class="sm:col-span-full">
                    <x-form.group name="form.iban" label="IBAN" required>
                        <x-form.input name="form.iban" required maxlength="34" :live="true" />
                    </x-form.group>
                </div>
                <div class="sm:col-span-full">
                    <x-form.group name="form.code_swift" label="Code SWIFT">
                        <x-form.input name="form.code_swift" maxlength="11" :live="true" />
                    </x-form.group>
                </div>
                <div class="sm:col-span-full">
                    <x-form.group name="form.titulaire_compte" label="Titulaire du compte" required>
                        <x-form.input name="form.titulaire_compte" required :live="true" />
                    </x-form.group>
                </div>
            </div>
        </div>
        <div x-show="showForm" class="mt-6 flex items-center justify-end gap-x-3 mb-4 md:mb-0">
            <div @click="showForm = false">
                <x-button.outlined type="button" color="gray">
                    Annuler
                </x-button.outlined>
            </div>
            <div>
                <x-button.primary type="submit" color="blue">Enregistrer</x-button.primary>
            </div>
        </div>
        <div x-show="!showForm" class="flex justify-end mb-4 md:mb-0">
            <div @click="showForm = true">
                <x-button.primary type="button" color="green" icon="heroicon-o-plus">
                    Ajouter une information bancaire
                </x-button.primary>
            </div>
        </div>
    </div>
</x-form>
