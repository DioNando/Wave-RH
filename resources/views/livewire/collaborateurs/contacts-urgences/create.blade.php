<x-form submit="store" class="px-4 sm:px-0">
    <div x-data="{ showForm: false }">
        <div x-show="showForm" class="grid grid-cols-1 border-b border-gray-900/10 dark:border-gray-700 pb-12">
            <h4 class="mb-4 text-lg font-medium text-green-700 dark:text-green-600">Nouveau contact d'urgence</h4>
            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                    <x-form.group name="form.nom" label="Nom" required>
                        <x-form.input name="form.nom" required :live="true" />
                    </x-form.group>
                </div>
                <div class="col-span-full sm:col-span-3">
                    <x-form.group name="form.telephone" label="Téléphone" required>
                        <x-form.input name="form.telephone" type="tel" required :live="true" />
                    </x-form.group>
                </div>
                <div class="col-span-full sm:col-span-3">
                    <x-form.group name="form.email" label="Email">
                        <x-form.input name="form.email" type="email" :live="true" />
                    </x-form.group>
                </div>
                <div class="col-span-full">
                    <x-form.group name="form.relation" label="Lien avec le collaborateur">
                        <x-form.input name="form.relation" :live="true" />
                    </x-form.group>
                </div>
                <div class="col-span-full sm:col-span-3">
                    <x-form.group name="form.adresse_complete" label="Adresse">
                        <x-form.input name="form.adresse" :live="true" />
                    </x-form.group>
                </div>
                <div class="col-span-full sm:col-span-3">
                    <x-form.group name="form.ville_id" label="Ville">
                        <x-form.select name="form.ville_id" :options="$villes->pluck('nom', 'id')->toArray()" :selected="old('ville_id')" :live="true" />
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
                    Ajouter un contact d'urgence
                </x-button.primary>
            </div>
        </div>
    </div>
</x-form>
