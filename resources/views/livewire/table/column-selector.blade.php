<div x-data="{ open: false }" class="relative inline-block text-left">
    <div @click="open = !open">
        <x-button.outlined type="button" color="gray" responsive icon="heroicon-o-adjustments-vertical">
            Colonnes</x-button.outlined>
    </div>

    <!-- Menu Dropdown -->
    <div x-show="open" x-cloak @keydown.escape.window="open = false" @click.outside="open = false"
        class="absolute right-0 z-10 mt-2 w-auto origin-top-right rounded-md shadow-md bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 focus:outline-none">

        <div class="p-6 flex flex-col space-y-4" role="menu" aria-haspopup="true" aria-expanded="false">
            <fieldset class="sm:col-span-full border-b pb-4 border-gray-200 dark:border-gray-700 ">
                <legend class="text-sm/6 font-semibold text-gray-900 dark:text-gray-100">Ordre</legend>
                <div class="mt-4 flex gap-6">
                    <x-form.radio name="sortDirection" value="asc" label="Croissant" direction="asc" />
                    <x-form.radio name="sortDirection" value="desc" label="Décroissant" direction="desc" />
                </div>

            </fieldset>
            <fieldset class="sm:col-span-full">
                <legend class="text-sm/6 font-semibold text-gray-900 dark:text-gray-100">Colonnes à afficher</legend>
                <div class="mt-4 space-y-4 flex flex-col w-full">
                    <x-form.checkbox name="filterFields" value="nom" label="Nom" :live="true" />
                    <x-form.checkbox name="filterFields" value="poste" label="Poste" :live="true" />
                    <x-form.checkbox name="filterFields" value="matricule_interne" label="Matricule Interne"
                        :live="true" />
                    <x-form.checkbox name="filterFields" value="informations_bancaires" label="Informations Bancaires"
                        :live="true" />
                    <x-form.checkbox name="filterFields" value="contact" label="Contact" :live="true" />
                    <x-form.checkbox name="filterFields" value="ville" label="Ville" :live="true" />
                    <x-form.checkbox name="filterFields" value="date_embauche" label="Date d'embauche"
                        :live="true" />
                    <x-form.checkbox name="filterFields" value="created_at" label="Création" :live="true" />
                    <x-form.checkbox name="filterFields" value="updated_at" label="Modification" :live="true" />
                </div>
            </fieldset>

        </div>
    </div>
</div>
