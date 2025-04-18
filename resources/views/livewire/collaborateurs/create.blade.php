<div class="mt-5 bg-white dark:bg-gray-900 ring-1 ring-gray-200 dark:ring-gray-700 rounded-lg">
    <x-form submit="store">

        <div class="space-y-12">
            <div
                class="p-8 grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 dark:border-gray-700 pb-12 md:grid-cols-3">
                <x-form.section-title title="Informations Personnelles"
                    description="Veuillez renseigner les informations de base du collaborateur." />

                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                    <div class="sm:col-span-3">
                        <x-form.group name="form.nom" label="Nom" required>
                            <x-form.input name="form.nom" required :live="true" />
                        </x-form.group>
                    </div>
                    <div class="sm:col-span-3">
                        <x-form.group name="form.prenom" label="Prénom" required>
                            <x-form.input name="form.prenom" required :live="true" />
                        </x-form.group>
                    </div>
                    <div class="sm:col-span-full">
                        <x-form.group name="form.photo_profil" label="Photo de profil">
                            <div class="flex gap-4 items-center">
                                <div
                                    class="overflow-hidden h-24 w-24 rounded-full outline outline-gray-300 dark:outline-white/10 flex items-center justify-center">
                                    @if ($this->form->photo_profil)
                                        <img src="{{ $this->form->photo_profil->temporaryUrl() }}" alt="Photo de profil"
                                            class="h-full w-full object-cover" />
                                    @else
                                        <div
                                            class="bg-gray-100 dark:bg-white/5 text-gray-300 dark:text-white/10 h-full w-full flex items-center justify-center">
                                            <x-heroicon-s-user class="size-13" />
                                        </div>
                                    @endif
                                </div>
                                <x-form.photo name="form.photo_profil" label="Photo de profil"
                                    placeholder="Ajouter une photo" />
                            </div>
                        </x-form.group>
                    </div>

                    <fieldset class="sm:col-span-full">
                        <legend class="text-sm/6 font-semibold text-gray-900 dark:text-gray-100">Genre</legend>
                        <div class="mt-2 flex gap-5">
                            @foreach (\App\Enums\CollaborateurGenre::cases() as $genre)
                                <x-form.radio name="form.genre" value="{{ $genre->value }}" label="{{ $genre->label() }}" />
                            @endforeach
                        </div>
                    </fieldset>

                    <div class="sm:col-span-2">
                        <x-form.group name="form.date_naissance" label="Date de naissance" required>
                            <x-form.input type="date" name="form.date_naissance" required :live="true" />
                        </x-form.group>
                    </div>
                    <div class="sm:col-span-2">
                        <x-form.group name="form.pays_id" label="Pays" required>
                            <x-form.select name="form.pays_id" :options="$pays->pluck('nom', 'id')->toArray()" :selected="old('pays_id')" required
                                :live="true" />
                        </x-form.group>
                    </div>
                    <div class="sm:col-span-2">
                        <x-form.group name="form.lieu_naissance_id" label="Ville" required>
                            <x-form.select name="form.lieu_naissance_id" :options="$villes->pluck('nom', 'id')->toArray()" :selected="old('lieu_naissance_id')" required
                                :live="true" />
                        </x-form.group>
                    </div>

                    <div class="sm:col-span-3">
                        <x-form.group name="form.cin" label="Numéro CIN" required>
                            <x-form.input name="form.cin" required :live="true" />
                        </x-form.group>
                    </div>
                    <div class="sm:col-span-3">
                        <x-form.group name="form.cnss" label="Numéro CNSS" required>
                            <x-form.input name="form.cnss" required :live="true" />
                        </x-form.group>
                    </div>

                    <fieldset class="sm:col-span-full">
                        <legend class="text-sm/6 font-semibold text-gray-900 dark:text-gray-100">Statut Marital</legend>
                        <div class="mt-2 space-y-4">
                            @foreach (\App\Enums\CollaborateurStatutMarital::cases() as $statut_marital)
                                <x-form.radio name="form.statut_marital" value="{{ $statut_marital->value }}" label="{{ $statut_marital->label() }}" />
                            @endforeach
                        </div>
                    </fieldset>
                    <div class="sm:col-span-2">
                        <x-form.group name="form.nombre_enfants" label="Nombre d'enfants">
                            <x-form.input type="number" name="form.nombre_enfants" :live="true" />
                        </x-form.group>
                    </div>

                </div>
            </div>

        </div>

        <div
            class="p-8 grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 dark:border-gray-700 pb-12 md:grid-cols-3">
            <x-form.section-title title="Coordonnées"
                description="Informations de contact professionnelles et personnelles du collaborateur." />

            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                <div class="sm:col-span-3">
                    <x-form.group name="form.email_professionnel" label="Email professionnel" required>
                        <x-form.input type="email" name="form.email_professionnel" required :live="true" />
                    </x-form.group>
                </div>
                <div class="sm:col-span-2">
                    <x-form.group name="form.telephone_professionnel" label="Téléphone professionnel" required>
                        <x-form.input name="form.telephone_professionnel" required :live="true" />
                    </x-form.group>
                </div>
                <div class="sm:col-span-3">
                    <x-form.group name="form.email_personnel" label="Email personnel">
                        <x-form.input type="email" name="form.email_personnel" :live="true" />
                    </x-form.group>
                </div>
                <div class="sm:col-span-2">
                    <x-form.group name="form.telephone_personnel" label="Téléphone personnel">
                        <x-form.input name="form.telephone_personnel" :live="true" />
                    </x-form.group>
                </div>
                <div class="sm:col-span-4">
                    <x-form.group name="form.adresse_complete" label="Adresse complète">
                        <x-form.input name="form.adresse_complete" :live="true" />
                    </x-form.group>
                </div>
                <div class="sm:col-span-2">
                    <x-form.group name="form.ville_id" label="Ville" required>
                        <x-form.select name="form.ville_id" :options="$villes_all->pluck('nom', 'id')->toArray()" :selected="old('ville_id')" required
                            :live="true" />
                    </x-form.group>
                    {{-- <x-form.group name="form.ville_id" label="Ville *">
                        <x-form.comboboxes name="form.ville_id" autocomplete="off" :options="$villes_all->pluck('nom', 'id')->toArray()" />
                    </x-form.group> --}}
                </div>

            </div>
        </div>
        <div
            class="p-8 grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 dark:border-gray-700 pb-12 md:grid-cols-3">
            <x-form.section-title title="Informations professionnelles"
                description="Détails concernant l'embauche et le statut professionnel du collaborateur." />

            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                <div class="sm:col-span-3">
                    <x-form.group name="form.date_embauche" label="Date d'embauche" required>
                        <x-form.input type="date" name="form.date_embauche" required :live="true" />
                    </x-form.group>
                </div>
                <div class="sm:col-span-3">
                    <x-form.group name="form.matricule_interne" label="Matricule interne" required>
                        <x-form.input name="form.matricule_interne" required :live="true" />
                    </x-form.group>
                </div>
                <div class="sm:col-span-2">
                    <x-form.group name="form.solde_conge" label="Solde de congé">
                        <x-form.input type="number" name="form.solde_conge" :live="true" />
                    </x-form.group>
                </div>
            </div>
        </div>
        <div
            class="p-8 grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 dark:border-gray-700 pb-12 md:grid-cols-3">
            <x-form.section-title title="Compétences et qualifications"
                description="Documents et informations relatifs aux compétences professionnelles du collaborateur." />
            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                <div class="sm:col-span-full">
                    <x-form.group name="form.document_cv" label="CV">
                        <x-form.file name="form.document_cv" accept=".pdf,.doc,.docx" placeholder="Télécharger un CV"
                            :file="$this->form->document_cv instanceof
                            \Livewire\Features\SupportFileUploads\TemporaryUploadedFile
                                ? $this->form->document_cv->getClientOriginalName()
                                : (is_string($this->form->document_cv) && $this->form->document_cv
                                    ? basename($this->form->document_cv)
                                    : 'Aucun fichier selectionné')" />
                    </x-form.group>
                </div>

                <div class="sm:col-span-3">
                    <x-form.dynamic-list name="form.langues" label="Langues" :items="$this->form->langues"
                        placeholder="Ex: Français, Anglais, etc." addText="Ajouter une langue" addMethod="addLangue"
                        removeMethod="removeLangue" />
                </div>

                <div class="sm:col-span-3">
                    <x-form.dynamic-list name="form.competences_techniques" label="Compétences techniques"
                        :items="$this->form->competences_techniques" placeholder="Ex: Laravel, Livewire, etc."
                        addText="Ajouter une compétence technique" addMethod="addCompetence"
                        removeMethod="removeCompetence" />
                </div>
            </div>
        </div>
        <div
            class="p-8 grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 dark:border-gray-700 pb-12 md:grid-cols-3">
            <x-form.section-title title="Informations santé"
                description="Données médicales importantes pour le suivi du collaborateur." />

            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                <div class="col-span-full">
                    <x-form.group name="form.situation_medicale" label="Situation médicale">
                        <x-form.textarea name="form.situation_medicale" :live="true" />
                    </x-form.group>
                </div>
            </div>
        </div>
        <div
            class="p-8 grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 dark:border-gray-700 pb-12 md:grid-cols-3">
            <x-form.section-title title="Autres informations"
                description="Notes complémentaires et informations diverses sur le collaborateur." />

            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                <div class="col-span-full">
                    <x-form.group name="form.notes_diverses" label="Notes diverses">
                        <x-form.textarea name="form.notes_diverses" placeholder="A propos" :live="true" />
                    </x-form.group>
                </div>
            </div>
        </div>

        <div class="mt-6 pb-6 px-8 flex items-center justify-end gap-x-6">
            <x-button.primary type="submit" color="blue">Enregistrer</x-button.primary>
        </div>
    </x-form>
</div>
