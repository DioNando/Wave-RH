<x-modal name="update-contact-{{ $contactUrgence->id }}" wire:model.defer="show" :title="'Modifier le contact d\'urgence'"
    submitLabel="Mettre à jour">
    <x-form submit="update" class="p-8">
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
                    <x-form.input name="form.adresse_complete" :live="true" />
                </x-form.group>
            </div>
            <div class="col-span-full sm:col-span-3">
                <x-form.group name="form.ville_id" label="Ville">
                    <x-form.select name="form.ville_id" :options="$villes->pluck('nom', 'id')->toArray()" :live="true" />
                </x-form.group>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-3 mb-4 md:mb-0">
            <x-button.primary type="submit" color="blue">Enregistrer</x-button.primary>
        </div>
    </x-form>
</x-modal>
