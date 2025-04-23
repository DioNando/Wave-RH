<x-form submit="store" class="px-4 sm:px-0">
    <div x-data="{ showForm: false }">
        <div x-show="showForm" class="grid grid-cols-1 border-b border-gray-900/10 dark:border-gray-700 pb-12">
            <h4 class="mb-4 text-lg font-medium text-green-700 dark:text-green-600">Nouveau diplôme</h4>
            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                    <x-form.group name="form.titre" label="Titre du diplôme" required>
                        <x-form.input name="form.titre" required :live="true" />
                    </x-form.group>
                </div>
                <div class="col-span-full sm:col-span-3">
                    <x-form.group name="form.etablissement" label="Établissement">
                        <x-form.input name="form.etablissement" :live="true" />
                    </x-form.group>
                </div>
                <div class="col-span-full sm:col-span-3">
                    <x-form.group name="form.pays_id" label="Pays">
                        <x-form.select name="form.pays_id" :options="$pays->pluck('nom', 'id')->toArray()" :selected="old('pays_id')" :live="true" />
                    </x-form.group>
                </div>
                <div class="col-span-full">
                    <x-form.group name="form.date_obtention" label="Date d'obtention">
                        <x-form.input type="date" name="form.date_obtention" :live="true" />
                    </x-form.group>
                </div>
                <div class="col-span-full">
                    <x-form.group name="form.niveau" label="Niveau">
                        <x-form.enum-select name="form.niveau" :enum="\App\Enums\DiplomeNiveau::class" :selected="$this->form->niveau"
                            placeholder="Choisir un niveau" :live="true" />
                    </x-form.group>
                </div>
                <div class="col-span-full">
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
                    Ajouter un diplôme
                </x-button.primary>
            </div>
        </div>
    </div>
</x-form>
