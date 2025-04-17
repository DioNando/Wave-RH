<x-form submit="store">
    <div class="mt-5 md:max-w-md bg-white dark:bg-gray-900 ring-1 ring-gray-200 dark:ring-gray-700 rounded-lg p-8">
        <div class="grid grid-cols-1 border-b border-gray-900/10 dark:border-gray-700 pb-12">
            <div class="flex flex-col gap-x-6 gap-y-8">
                <div class="sm:col-span-full">
                    <x-form.group name="form.nom" label="Nom" required>
                        <x-form.input name="form.nom" required :live="true" />
                    </x-form.group>
                </div>
                <div class="sm:col-span-full">
                    <x-form.group name="form.pays_id" label="Pays" required>
                        <x-form.select name="form.pays_id" :options="$pays->pluck('nom', 'id')->toArray()" :selected="old('pays_id')" required
                            :live="true" />
                    </x-form.group>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-start gap-x-6">
            <x-button.primary type="submit" color="blue">Enregistrer</x-button.primary>
        </div>
    </div>
</x-form>
