<x-form submit="store" class="px-4 sm:px-0">
    <div x-data="{ showForm: false }">
        <div x-show="showForm" class="grid grid-cols-1 border-b border-gray-900/10 dark:border-gray-700 pb-12">
            <h4 class="mb-4 text-lg font-medium text-green-700 dark:text-green-600">Nouveau contrat de travail</h4>
            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                    <x-form.group name="form.type_contrat" label="Type de contrat" required>
                        <x-form.enum-select name="form.type_contrat" :enum="\App\Enums\TypeContratTravail::class" :selected="$this->form->type_contrat"
                            placeholder="Choisir un type de contrat" :live="true" />
                    </x-form.group>
                </div>
                <div class="sm:col-span-full">
                    <x-form.group name="form.date_debut" label="Date de début" required>
                        <x-form.input type="date" name="form.date_debut" required :live="true" />
                    </x-form.group>
                </div>
                <div class="sm:col-span-full">
                    <x-form.group name="form.date_fin" label="Date de fin">
                        <x-form.input type="date" name="form.date_fin" :live="true" />
                    </x-form.group>
                </div>
                <div class="sm:col-span-full">
                    <x-form.group name="form.salaire" label="Salaire">
                        <x-form.input type="number" name="form.salaire" step="0.01" min="0"
                            max="9999999.99" :live="true" />
                    </x-form.group>
                </div>
                <div class="sm:col-span-full">
                    <x-form.group name="form.document_path" label="Document">
                        <x-form.file name="form.document_path" accept=".pdf,.doc,.docx"
                            placeholder="Télécharger un document" :file="$this->form->document_path
                                ? $this->form->document_path->getClientOriginalName()
                                : 'Aucun fichier selectionné'" />
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
                    Ajouter un contrat de travail
                </x-button.primary>
            </div>
        </div>
    </div>
</x-form>
