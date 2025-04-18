<div class="mt-5 bg-white dark:bg-gray-900 ring-1 ring-gray-200 dark:ring-gray-700 rounded-lg">
    <x-form submit="store">
        <div class="space-y-12">
            <div class="p-8 grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 dark:border-gray-700 pb-12 md:grid-cols-3">
                <x-form.section-title title="Informations du document"
                    description="Veuillez renseigner les informations du document administratif." />

                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                    <div class="sm:col-span-3">
                        <x-form.group name="form.type_document_id" label="Type de document" required>
                            <x-form.select name="form.type_document_id" :options="$types_documents->pluck('libelle', 'id')->toArray()" />
                        </x-form.group>
                    </div>

                    <div class="sm:col-span-3">
                        <x-form.group name="form.collaborateur_id" label="Collaborateur" required>
                            <x-form.select name="form.collaborateur_id" :options="$collaborateurs->pluck('nom_complet', 'id')->toArray()" />
                        </x-form.group>
                    </div>

                    <div class="sm:col-span-3">
                        <x-form.group name="form.date_emission" label="Date d'émission">
                            <x-form.input type="date" name="form.date_emission" />
                        </x-form.group>
                    </div>

                    <div class="sm:col-span-3">
                        <x-form.group name="form.date_expiration" label="Date d'expiration" required>
                            <x-form.input type="date" name="form.date_expiration" required />
                        </x-form.group>
                    </div>

                    <div class="sm:col-span-full">
                        <x-form.group name="form.document_path" label="Document" required>
                            <x-form.file name="form.document_path" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" placeholder="Télécharger un document"
                                :file="$this->form->document_path instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile
                                    ? $this->form->document_path->getClientOriginalName()
                                    : (is_string($this->form->document_path) && $this->form->document_path
                                        ? basename($this->form->document_path)
                                        : 'Aucun fichier selectionné')" />
                        </x-form.group>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 pb-6 px-8 flex items-center justify-end gap-x-6">
            <x-button.primary type="submit" color="blue">Enregistrer</x-button.primary>
        </div>
    </x-form>
</div>
